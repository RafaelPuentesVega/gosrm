<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\MovimientosCaja;
use App\Models\Productos;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;

class ProductoController extends Controller
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

    return view('modulos.productos.index' ,compact('categoriasProducto') );
  }

  public function getproductos(){
    $response = [
      'success' => true,
      'message' => 'Se consulto correctamente',
      'data' => []
    ];
    try {
        $productos = Productos::select(Productos::getTableName().'.*', DB::raw(CategoriaProducto::getTableName().'.nombre AS nombre_categoria'))
        ->join(CategoriaProducto::getTableName() , CategoriaProducto::getTableName().'.id' ,Productos::getTableName().'.id_categoria' )
        ->orderBy(Productos::getTableName().'.id', 'DESC')
        ->get();

        $response['data'] = $productos;
    } catch (Exception $e) {
      $response = [
        'success' => false,
        'message' => 'Ocurrio un error',
        'data' => [],
        'error' => $e->getMessage()
      ];

    }

    return response()->json($response );
  }

  public function getProductoId(Request $request){
    $response = [
      'success' => true,
      'message' => 'Se consulto correctamente',
      'data' => []
    ];
    try {
      $id = $request->get('id');


      $producto = Productos::where('id' , $id)
      ->first();

      $response['data'] = $producto;
    } catch (Exception $e) {
      $response = [
        'success' => false,
        'message' => 'Ocurrio un error',
        'data' => [],
        'error' => $e->getMessage()
      ];

    }

    return response()->json($response );
  }
  
  public function saveProduct(Request $request){
    $response = [
      'success' => true,
      'message' => 'Se guardo correctamente',
      'data' => []
    ];

    try {

      $validateCodBarras = Productos::where('codigo_barras' , $request['codigoBarrasProducto'])->first();
      if($validateCodBarras){
        throw new Exception("ya existe un producto con el mismo codigo de barras."); 
      }
      $valorcompra = str_replace(['.', ','], '', $request['precioCompraProducto']);
      $valorventa = str_replace(['.', ','], '', $request['precioProducto']);

      $dataRequest = [
        'nombre' => strtoupper($request['nombreProducto']),
        'precio' => $valorventa ,
        'id_categoria' => $request['categoriaProducto'],
        'marca' => strtoupper($request['marcaProducto']),
        'modelo' => strtoupper($request['modeloProducto']),
        'estado' => strtoupper($request['estadoProducto']),
        'cantidad_stock' => $request['cantidadStockProducto'],
        'proveedor' => strtoupper($request['proveedorProducto']),
        'precio_compra' => $valorcompra,
        'codigo_barras' => $request['codigoBarrasProducto']
      ];

      foreach ($dataRequest as $key => $value) {
        if ($key !== 'modelo' && empty($value)) {
          throw new Exception("Hay campos vacios -> " . $key);
        }
      }

      $producto = Productos::create($dataRequest);
      $response['data'] =$producto;
    } catch (\Exception $e) {
      $response = [
        'success' => false,
        'message' =>  $e->getMessage()
      ];
    }

    return response()->json($response );

  }


}
