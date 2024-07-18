<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\DetalleRemisiones;
use App\Models\MovimientosCaja;
use App\Models\Productos;
use App\Models\Remisiones;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;

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
      'message' => 'Se guardo correctamente',
      'data' => []
    ];

    try {

      DB::beginTransaction();

      $productoArray = $request->get('productos');      
      $idCliente = $request->get('cliente');
      $precioTotal = (int) $request->get('productos');

      $dataRemision = [
        "fecha" => now(),
        "total" => $precioTotal,
        "cliente_id" => $idCliente,
        "usuario_creacion" => auth()->user()->id
      ];

      $remision = Remisiones::create($dataRemision);

      $idRemision =  $remision->id;
      foreach ($productoArray as $key => $value) {

        $dataDetalleRemision = [
          'remision_id' => $idRemision,
          'producto_id' => $value['id'],
          'cantidad'  => $value['cantidad'],
          'precio_unitario'  => $value['precio'],
          'subtotal'  => $value['subtotal']
        ];

        DetalleRemisiones::create($dataDetalleRemision);
      }
      
      DB::commit();


    } catch (\Exception $e) {
      DB::rollBack();
      dd($e);
      $response = [
        'success' => false,
        'message' => $e->getMessage(),
        'error' => $e
      ];
    }

    return response()->json($response);

  }

}
