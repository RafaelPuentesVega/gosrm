<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\Clientes;
use App\Models\DetalleRemisiones;
use App\Models\MovimientosCaja;
use App\Models\OrdenServicio;
use App\Models\ParametrosDetalle;
use App\Models\Productos;
use App\Models\Remisiones;
use App\Services\MovimientoCajaService;
use App\Services\StockService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Exception;

class RemisionController extends Controller
{
  //
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    if(auth()->user()->rol != 'ADMINISTRATIVO'){
      return redirect('inicio');
    }

    $categoriasProducto = CategoriaProducto::all();

    return view('modulos.remisiones.index' ,compact('categoriasProducto'));
  }

  public function autocompleteDocumento(Request  $request)
  {

    $response = ["status" => true, "message" => "consultado con exito"];
    try {

      $term = $request->get('term');
      $productos = Productos::where('nombre', 'LIKE', '%' . $term . '%')->get();
      
      $result = [];
      foreach ($productos as $producto) {
          $result[] = ['label' => $producto->nombre, 'value' => $producto->id];
      }


    } catch (\Exception $e) {
      $response = ["status" => false, "message" => "Ocurrio un error consultando", "error" => $e->getMessage()];
    }

    return response()->json($result);
  }

  public function guardarRemision(Request $request){

    $response = [
      'success' => true,
      'message' => 'Se guardo correctamente'
    ];

    try {

      DB::beginTransaction();

      $productoArray = $request->get('productos');      
      $idCliente = $request->get('cliente');
      $precioTotal = (int) $request->get('precioTotal');
      $tipoPago = $request->get('tipoPago');
      $whatsApp = $request->get('whatsappQuestion');
      $dataRemision = [
        "fecha" => now(),
        "total" => $precioTotal,
        "cliente_id" => $idCliente,
        "usuario_creacion" => auth()->user()->id,
        'tipoPago' => $tipoPago
      ];

      $stockService = new StockService();
      $remision = Remisiones::create($dataRemision);

      $idRemision =  $remision->id;
      foreach ($productoArray as $key => $value) {

        $stockService->adjustStock($value['id'], $value['cantidad'], 'salida' , 'remision' , $idRemision);

        $dataDetalleRemision = [
          'remision_id' => $idRemision,
          'producto_id' => $value['id'],
          'cantidad'  => $value['cantidad'],
          'precio_unitario'  => $value['precio'],
          'subtotal'  => $value['subtotal']
        ];

        DetalleRemisiones::create($dataDetalleRemision);
      }

      $response['idremision'] = $idRemision;
      // Crea el movimiento en la caja
      $movimientoRequest = [
          'valor' =>  $precioTotal,
          'descripcion' => 'Remision N° :: ' . $idRemision,
          'tipo' => 'ingreso',
          'orden_id' => '',
          'metodo_pago' => $tipoPago,
          'user_creation' =>  auth()->user()->name
      ];
      $MovimientoCajaService = new MovimientoCajaService();            
      $MovimientoCajaService->guardarMovimientoCaja($movimientoRequest);

      $dataMedios = [
        'notificar_whatsapp' => $whatsApp,
      ];
    // Manejo de notificaciones
    $this->manejarNotificaciones($idRemision, $dataMedios);
      DB::commit();


    } catch (\Exception $e) {
      DB::rollBack();
      $response = [
        'success' => false,
        'message' => $e->getMessage(),
        'error' => $e
      ];
    }

    return response()->json($response);

  }

  public function imprimirRemision($id , $type = null)
  {

    try {
      $remisiones = Remisiones::join(Clientes::getTableName() , Clientes::getTableName().'.cliente_id' , Remisiones::getTableName().'.cliente_id' )
      ->where(Remisiones::getTableName().'.id' , $id)
      ->first();
      if($remisiones == null){
        throw new Exception("No existe un remision con ese id");        
      }
      Carbon::setLocale('es_ES');        
      $fecha = Carbon::parse($remisiones->fecha)->formatLocalized('%d %b %Y');

      $data = [
        'remision' => $remisiones->id,
        'fecha' =>  $fecha,
        'nombre' => $remisiones->cliente_nombres,
        'documento' => $remisiones->cliente_documento,
        'correo'=> $remisiones->cliente_correo,
        'telefono' => $remisiones->cliente_telefono,
        'celular' => $remisiones->cliente_celular,
        'departamento' => $remisiones->departamento_nombre,
        'municipio' => $remisiones->municipio_nombre,
        'direccion' => $remisiones->cliente_direccion,
        'totalRemision' => (int) $remisiones->total
      ];

      $productos = DetalleRemisiones::
      join(Productos::getTableName() , Productos::getTableName().'.id' , DetalleRemisiones::getTableName().'.producto_id')
      ->where( DetalleRemisiones::getTableName().'.remision_id' , $id)
      ->get();


      if($type == 'notificacion'){
        $data['bodyValidate'] = 'true';
        $pdf = PDF::loadView('modulos.pdf.remision', $data ,  compact('productos')  );

        return $pdf;
      }
      $pdf = PDF::loadView('modulos.pdf.remision', $data ,  compact('productos')  );

      $pdf->setPaper('carta' , 'landscape'); // Establece la orientación horizontal

      return $pdf->stream('Remision ' .$remisiones->cliente_nombres .'.pdf');

    } catch (\Exception $e) {
      return view('errors.404');
    }


  }

  private function manejarNotificaciones($idRemision , $dataMedios){
      // Notificar por WhatsApp
      $notificarWhatsAppQ = $dataMedios['notificar_whatsapp'];
      $nameFilePdf = "remision";
      if ($notificarWhatsAppQ == 'SI') {

        $remision = Remisiones::join(Clientes::getTableName() , Clientes::getTableName().'.cliente_id' , Remisiones::getTableName().'.cliente_id' )
        ->where(Remisiones::getTableName().'.id' , $idRemision)
        ->first();

        $pdf = $this->imprimirRemision($idRemision , 'notificacion');

        $replace = [
            "nombre_cliente" => $remision->cliente_nombres
        ];

        $parametroMsj = ParametrosDetalle::where('nombre' , 'MENSAJE_REMISION')->first();
        // Reemplazar las variables en la plantilla
        $template = $parametroMsj->descripcion;
        foreach ($replace as $key => $value) {
            $template = str_replace("{" . $key . "}", $value, $template);
        }

        $data['dataPdf']['bodyValidate'] = "true";
        
        // Nombre del archivo y ruta donde se guardará

        // Ruta donde se guardará el archivo
        $pathUploads = "/uploads/pdf";
        $destinationPath = public_path($pathUploads);
        
        // Define el nombre del archivo
        $fileName = time() . '_' . $nameFilePdf . '.pdf';
        
        // Guarda el archivo generado en la ruta
        $pdf->save($destinationPath . '/' . $fileName);
        
        // Generar la URL pública del archivo
        $fileUrl = url($pathUploads . '/' . $fileName);

        $sendPdf = [
            'type' => 'pdf',
            'number' =>  $remision->cliente_celular,
            'pdfBase64' => $fileUrl,// 'https://refillmate.com.co/gosrm/public/uploads/soportes/1732053061_Remision%202%20(3).pdf',
            'nameFile' => $nameFilePdf,
        ];
        $servicio = new OrdenServicioController();
        $notWhatsPdf = $servicio->notificarWhatsApp($sendPdf);
        //Log::info('Respuesta de PDF:', ['response' => $notWhatsPdf]);
        
        
        $sendMensaje = [
            'type' => 'texto',
            'number' =>  $remision->cliente_celular,
            'message' => $template
        ];
        $notWhatsMsj = $servicio->notificarWhatsApp($sendMensaje);
        //Log::info('Respuesta de MSJ:', ['response' => $notWhatsMsj]);
        // Define la ruta completa del archivo
        $filePath = $destinationPath . '/' . $fileName;

        // Eliminar el archivo creado temporalmente
        if (file_exists($filePath)) {
           unlink($filePath);
        }
    }
  }

  /* lista las remisiones creadas*/
  public function getRemisiones(Request $request)
  {

    $response = [
      'success' => true,
      'message' => 'Se guardo correctamente'
    ];
    try {
      $fechaInicial = $request->get('fechaInicial');
      $fechaFinal = $request->get('fechaFinal');
      $documento = $request->get('documento');
      $nombres = $request->get('fechaInicial');


      $remisiones = Remisiones::join(Clientes::getTableName() , Clientes::getTableName().'.cliente_id' , Remisiones::getTableName().'.cliente_id' );

      if($fechaInicial != ''){
        $remisiones = $remisiones->where(Remisiones::getTableName() .'fecha' , '>=' , $fechaInicial);
      }

      if($fechaFinal != ''){
        $remisiones = $remisiones->where(Remisiones::getTableName() .'fecha' , '<=' , $fechaFinal);
      }

      if($documento != ''){
        $remisiones = $remisiones->where(Clientes::getTableName() .'cliente_documento' , 'LIKE' , '%'.$documento.'%');
      }
      if($nombres != ''){
        $remisiones = $remisiones->where(Clientes::getTableName() .'cliente_nombres' , 'LIKE' , '%'.$nombres.'%');
      }

      $response['data'] = $remisiones->orderBy(Remisiones::getTableName().'.id' , 'DESC')->get();
    } catch (\Exception $e) {
      $response = [
        'success' => false,
        'message' => $e->getMessage(),
        'error' => $e
      ];
    }
    return response()->json($response);


  }


    /* lista las remisiones creadas*/
    public function listar(Request $request)
    {
      if(auth()->user()->rol != 'ADMINISTRATIVO'){
        return redirect('inicio');
      }
  
      return view('modulos.remisiones.listar.index');
  
  
    }

    public function getDetalleRemision(Request $request){
      
      $response = [];
      try {

        $id = $request->get('id');
        $remision = Remisiones::with(['cliente', 'detalles.producto'])
        ->where(Remisiones::getTableName().'.id' , $id)->first();
       // dd($remision->toArray());
        if (!$remision) {
            return response()->json(['error' => 'Remisión no encontrada'], 404);
        }
        $response = [
            'cliente_documento' => $remision->cliente->cliente_documento,
            'cliente_nombres' => $remision->cliente->cliente_nombres,
            'cliente_correo' => $remision->cliente->cliente_correo,
            'cliente_telefono' => $remision->cliente->cliente_telefono,
            'cliente_celular' => $remision->cliente->cliente_celular,
            'cliente_direccion' => $remision->cliente->cliente_direccion,
            'idRemision' => $remision->id,
            'tipoPago' => $remision->tipoPago,
            'total' =>  $remision->total,
            'productos' => $remision->detalles->map(function ($detalle) {
                return [
                    'producto' => $detalle->producto->nombre. "(".$detalle->producto->marca.")",
                    'cantidad' => $detalle->cantidad,
                    'precio_unitario' => $detalle->precio_unitario,
                    'subtotal' => $detalle->subtotal,
                    'total' => '50000000' 

                ];
            })
        ];

      } catch (\Exception $e) {
        dd( $e);

      }

      return response()->json($response);

    }

}
