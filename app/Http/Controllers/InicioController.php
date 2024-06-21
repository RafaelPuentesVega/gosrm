<?php

namespace App\Http\Controllers;

use App\Models\inicio;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;
use App\Models\NotificacionesEmail;
use App\Models\User;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
    if(Auth()->user()->rol == 'ADMINISTRATIVO' || Auth()->user()->rol == 'GERENTE' ){

    $vencidas = OrdenServicio::where('estadoOrden', '1')
        ->whereNull('fecha_entrega_orden')
        ->where('fecha_estimada_orden', '<', now()) // Filtra las vencidas
        ->count();
    
    $vigentes = OrdenServicio::where('estadoOrden', '1')
        ->whereNull('fecha_entrega_orden')
        ->where('fecha_estimada_orden', '>=', now()) // Filtra las vigentes o igual a la fecha actual
        ->count();

    $ordenesReparacion = OrdenServicio::where('estadoOrden', '1')
    ->count();
    $anoActual = date('Y');

    $cantOrdenes = OrdenServicio::
    get()->count();

    $Pendientes = OrdenServicio::
    where('estadoOrden', 2)
    ->get()->count();

    $PendienteFacturar = OrdenServicio::
    where('estadoOrden', 3)
    ->whereNull('factura_numero_orden')
    ->get()->count();
    $entregadasOrden = OrdenServicio::
    where('estadoOrden', 3)
    ->get()->count();
    if($entregadasOrden == 0){
        $porcentaje = 0;
    }else{
        $porcentaje = round(($PendienteFacturar * 100)/$entregadasOrden);

    }

    $priceOrdenes = OrdenServicio::
    select(DB::raw('sum(valor_total_orden) as total'))
    ->whereDate('fecha_entrega_orden', '=', now()->toDateString())
    ->get()
    ->toArray();
    $priceOrdenes = $priceOrdenes[0];
    
    $countIngresoDia = OrdenServicio::
    whereDate('fecha_creacion_orden', '=', now()->toDateString())
    ->count();
    
    $entregadasHoy = OrdenServicio::
    whereDate('fecha_entrega_orden', '=', now()->toDateString())
    ->count();
    
    $anoInicial = 2023;//año en la cual inicio refill
    $arrayAnoGrafico = array(2023);
        do {
            $anoInicial ++;
            $arrayAnoGrafico[] = $anoInicial;
        } while ($anoInicial < $anoActual);

            $fechaActual = now()->toDateString();
            return view('modulos.inicio.inicio-administrativo')
            ->with('anoActual' ,$anoActual)
            ->with('cantOrdenes' , $cantOrdenes)
            ->with('priceOrdenes' , $priceOrdenes)
            ->with('PendienteFacturar' , $PendienteFacturar)
            ->with('porcentaje' , $porcentaje)
            ->with('Pendientes' ,$Pendientes)
            ->with('ordenesReparacion' ,$ordenesReparacion)
            ->with('tamañoVencidas' ,$vencidas)
            ->with('tamañovigentes' ,$vigentes)
            ->with('fechaActual' ,$fechaActual)
            ->with('arrayAnoGrafico' ,$arrayAnoGrafico)
            ->with('countIngresoDia' , $countIngresoDia)
            ->with('entregadasHoy' , $entregadasHoy);

        }else{
            $idUsuario = auth()->id();


            $ordenServicio = OrdenServicio:://DB::table('orden_servicio as orden')
            join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
            ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
            ->whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','1')->get()->toArray();

            $ordenServicioListas = OrdenServicio::
            whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','2')->get()->toArray();

                $control = sizeof($ordenServicio) - 1;
                $fechaActual = date('Y-m-d H:i');
                $vencidas[] = null;
                $vigentes[] = null ;
                for ($i = 0; $i <= $control; $i++) {

                $fechaEstimada = $ordenServicio[$i]['fecha_estimada_orden'];

                if($fechaActual >  $fechaEstimada){
                    $vencidas[] = $ordenServicio[$i];
                }
                if($fechaActual <=  $fechaEstimada){
                    $vigentes[] = $ordenServicio[$i];
                }


                }
                $tamañoListas =    sizeof($ordenServicioListas);
                $tamañoVencidas = count($vencidas)-1;
                $tamañovigentes = count($vigentes) -1 ;
              //CONSULTA PARA TRAER LOS TECNICOS A VISTA DE ADMINISTRADORES
               $user = User::where('rol','Tecnico')
               ->orWhere('rol', 'Coordinador Técnico')->get();


            return view('modulos.inicio.inicio-tecnicos')
            ->with('vigentes' ,$vigentes)
            ->with('vencidas' ,$vencidas)->with('user' ,$user)
            ->with('tamañoVencidas' ,$tamañoVencidas)
            ->with('tamañovigentes' ,$tamañovigentes)
            ->with('tamañoListas' ,$tamañoListas) ;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function graficoCantidadAno(Request $request)
    {
        $consultaAno = $request['anoselect'];
        $cantidadOrdenMes = OrdenServicio::
        whereYear('fecha_creacion_orden', $consultaAno)
        ->select(DB::raw(' MONTH(fecha_creacion_orden) as mes,count(*) as cantidad'))
        ->groupBy('mes')
        ->get()->toArray();

        $responseData['enero'] = 0;
        $responseData['febrero'] = 0;
        $responseData['marzo'] = 0;
        $responseData['abril'] = 0;
        $responseData['mayo'] = 0;
        $responseData['junio'] = 0;
        $responseData['julio'] = 0;
        $responseData['agosto'] = 0;
        $responseData['septiembre'] = 0;
        $responseData['octubre'] = 0;
        $responseData['noviembre'] = 0;
        $responseData['diciembre'] = 0;
        for($y=0 ; $y < count($cantidadOrdenMes); $y++){
            switch($cantidadOrdenMes[$y]['mes']){

                case 1:
                    $responseData['enero'] = intval($cantidadOrdenMes[$y]['cantidad']);

                    break;
                case 2:
                    $responseData['febrero'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 3:
                    $responseData['marzo'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 4:
                    $responseData['abril'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 5:
                    $responseData['mayo'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 6:
                    $responseData['junio'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 7:
                    $responseData['julio'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 8:
                    $responseData['agosto'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 9:
                    $responseData['septiembre'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 10:
                    $responseData['octubre'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 11:
                    $responseData['noviembre'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                case 12:
                    $responseData['diciembre'] = intval($cantidadOrdenMes[$y]['cantidad']);
                    break;
                default:
                    break;
            }
        }
        $response['data'] = $responseData;
        return json_encode($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(inicio $inicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inicio $inicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(inicio $inicio)
    {
        //
    }
}
