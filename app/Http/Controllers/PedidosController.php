<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\DetallePedidos;
use App\Models\Pedidos;
use App\Models\Proveedores;
use App\Services\MovimientoCajaService;
use App\Services\StockService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->rol != 'ADMINISTRATIVO') {
            return redirect('inicio');
        }

        $categoriasProducto = CategoriaProducto::all();

        return view('modulos.pedidos.index', compact('categoriasProducto'));
    }


    public function guardarPedido(Request $request)
    {

        $response = [
            'success' => true,
            'message' => 'Se guardo correctamente'
        ];

        try {

            DB::beginTransaction();

            $productoArray = $request->get('productos');
            $idProveedor = $request->get('proveedor');
            $precioTotal = (int) $request->get('precioTotal');
            $fechaPedido =  $request->get('fechaPedido');
            $metodoPago =  $request->get('tipoPagoPedido');
            $tipoTransaccion =    $request->get('transaccionPedido');


            $proveedor = Proveedores::findOrFail($idProveedor);
            if ($proveedor == null) {
                throw new Exception("No existe proveedor con ese id");
            }

            $dataPedidos = [
                "fecha" => $fechaPedido,
                "total" => $precioTotal,
                "proveedor_id" => $idProveedor,
                'metodo_pago' => $metodoPago,
                'tipo_transaccion' => $tipoTransaccion,
                "usuario_creacion" => auth()->user()->id
            ];

            $stockService = new StockService();
            $pedidos = Pedidos::create($dataPedidos);

            $idPedido =  $pedidos->id;
            foreach ($productoArray as $key => $value) {

                $stockService->adjustStock($value['id'], $value['cantidad'], 'ingreso');
                $stockService->updateLastValueAndSupplier($value['id'], $value['precio'], $proveedor->nombre);

                $dataDetalleRemision = [
                    'pedido_id' => $idPedido,
                    'producto_id' => $value['id'],
                    'cantidad'  => $value['cantidad'],
                    'precio_unitario'  => $value['precio'],
                    'subtotal'  => $value['subtotal']
                ];

                DetallePedidos::create($dataDetalleRemision);
            }
            $response['idPedido'] = $idPedido;

            if($tipoTransaccion == 'contado' ){
                // Crea el movimiento en la caja
                $movimientoRequest = [
                    'valor' =>  $precioTotal,
                    'descripcion' => 'Pedido realizado en :: ' . $proveedor->nombre,
                    'tipo' => 'salida',
                    'orden_id' => '',
                    'metodo_pago' => $metodoPago,
                    'user_creation' =>  auth()->user()->name
                ];
                $MovimientoCajaService = new MovimientoCajaService();            
                $MovimientoCajaService->guardarMovimientoCaja($movimientoRequest);
            }

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
}
