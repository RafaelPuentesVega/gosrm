<?php

namespace App\Http\Controllers;

use App\Models\MovimientosCaja;
use App\Services\MovimientoCajaService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;

class CajaController extends Controller
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
    return view('modulos.caja.index');
  }
  public function saveMovimiento(Request  $request , $typeResponse = false)
  {

    $response = ["status" => true, "message" => "guardado con exito"];
    try {

      $MovimientoCajaService = new MovimientoCajaService();

      $saveData = [
        "valor" => $request->get('valor'),
        "descripcion" => $request->get('descripcion'),
        "tipo" => $request->get('tipo'),
        "orden_id" => $request->get('num_orden'),
        "user_creation" => auth()->user()->name,
        "metodo_pago" => $request->get('metodo_pago'),
      ];

      $MovimientoCajaService->guardarMovimientoCaja($saveData);
      
    } catch (\Exception $e) {
      $response = ["status" => false, "message" => "Ocurrio un error guardando", "error" => $e->getMessage()];
    }
    if($typeResponse == true){
      return $response;
    }else{
      return response()->json($response);

    }
  }

  public function getDataMovimientos(Request $request)
  {
    $response = ["status" => true, "message" => "consultado correctamente", "data" => []];

    try {

      $fechaInicio = $request->get('fechaInicial') . ' 00:00:00';
      $fechaFin = $request->get('fechaFinal') . ' 23:59:59';
      $fechaString = $request->get('fechaInicial') . ' a ' . $request->get('fechaFinal');

      // Convertir las fechas a objetos DateTime
      $fechaInicial = new DateTime($request->get('fechaInicial'));
      $fechaFinal = new DateTime($request->get('fechaFinal'));


      setlocale(LC_TIME, 'es_ES.UTF-8');
      $fechaInicialFormateada = strftime('%d de %B del %Y', $fechaInicial->getTimestamp());
      $fechaFinalFormateada = strftime('%d de %B del %Y', $fechaFinal->getTimestamp());

      $fechaString = $fechaInicialFormateada . ' al ' . $fechaFinalFormateada;


      $valores = MovimientosCaja::selectRaw('
      SUM(CASE WHEN tipo = "ingreso" THEN valor ELSE 0 END) AS ingreso,
      SUM(CASE WHEN tipo = "salida" THEN valor ELSE 0 END) AS egreso')
        ->whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->get();

      $totalValoresBusq = MovimientosCaja::selectRaw('
      SUM(CASE WHEN metodo_pago = "efectivo" THEN valor ELSE 0 END) AS efectivo,
      SUM(CASE WHEN metodo_pago = "transferencia" THEN valor ELSE 0 END) AS transferencia')
        ->whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->get();

      $totalValoresBusqueda = MovimientosCaja::selectRaw('
      SUM(CASE WHEN metodo_pago = "efectivo" AND tipo = "ingreso" THEN valor
               WHEN metodo_pago = "efectivo" AND tipo = "salida" THEN -valor
               ELSE 0 END) AS efectivo,
      SUM(CASE WHEN metodo_pago = "transferencia" AND tipo = "ingreso" THEN valor
               WHEN metodo_pago = "transferencia" AND tipo = "salida" THEN -valor
               ELSE 0 END) AS transferencia')
        ->whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->first();


      $totalValoresHistorico = MovimientosCaja::selectRaw('
      SUM(CASE WHEN metodo_pago = "efectivo" AND tipo = "ingreso" THEN valor
               WHEN metodo_pago = "efectivo" AND tipo = "salida" THEN -valor
               ELSE 0 END) AS efectivo,
      SUM(CASE WHEN metodo_pago = "transferencia" AND tipo = "ingreso" THEN valor
               WHEN metodo_pago = "transferencia" AND tipo = "salida" THEN -valor
               ELSE 0 END) AS transferencia')
        ->first();

    $totalBusqueda= $totalValoresBusqueda->efectivo + $totalValoresBusqueda->transferencia;
    $totalHistoricofin = $totalValoresHistorico->efectivo + $totalValoresHistorico->transferencia;
      $valoresTotales = [
        "efectivoBusqueda" => number_format($totalValoresBusqueda->efectivo, 0, ',', '.'),
        "transferenciaBusqueda" => number_format($totalValoresBusqueda->transferencia, 0, ',', '.'),
        "efectivoHistorico" => number_format($totalValoresHistorico->efectivo, 0, ',', '.'),
        "transferenciaHistorico" => number_format($totalValoresHistorico->transferencia, 0, ',', '.'),
        "totalBusqueda" => number_format($totalBusqueda, 0, ',', '.'),
        "totalHistorico" => number_format($totalHistoricofin, 0, ',', '.'),

      ];


      // Calcular el total
      $total = $valores->sum('ingreso') - $valores->sum('egreso');

      // Formatear los valores a moneda
      $valores->transform(function ($item, $key) {
        $item->ingreso = number_format($item->ingreso, 0, ',', '.');
        $item->egreso = number_format($item->egreso, 0, ',', '.');
        return $item;
      });

      // Formatear el total a moneda
      $total = number_format($total, 2, ',', '.');

      $dataMovimiento = MovimientosCaja::whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->get();

      $response['data'] = $dataMovimiento;
      $response['ingreso'] = $valores[0]->ingreso;
      $response['egreso'] = $valores[0]->egreso;
      $response['total'] = $total;
      $response['valoresTotales'] = $valoresTotales;
      $response['fechas'] = $fechaString;

    } catch (\Exception $e) {
      $response = ["status" => false, "message" => "Ocurrio un error al consultar", "error" => $e->getMessage()];
    }

    return $response;
  }
}
