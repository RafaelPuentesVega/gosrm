<?php

namespace App\Http\Controllers;

use App\Models\BuscarOrden;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExportOrdenGeneral;

class BuscarOrdenController extends Controller
{

    protected $numpaginate = 50;
    // protected $idTecnico = '';
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportFile($data)
    {
        return Excel::download(new ExcelExportOrdenGeneral($data), 'OrdenGeneral '.date('Y-m-d H:i:s').'.xlsx');
    }
    public function index(Request $request)
    {
        $btnExport = $request->get("export");
        setlocale(LC_ALL, 'es_ES');

        $tecnico  = User::where('rol','Tecnico')
        ->orWhere('rol', 'Coordinador Técnico')->get();
        //orden de servicio
        $ordenServicio = DB::table('orden_servicio as orden')
        ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
        ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
        ->select('cliente.*', 'equipo.*','users.name', 'orden.*' )->orderByDesc('orden.id_orden');
        //Filtros de busqueda avanzada
        if($request->get("idTecnico")) {
            $ordenServicio = $ordenServicio->where('users.id', $request->get("idTecnico"));
        }
        if($request->get("numOrden")) {
            $ordenServicio = $ordenServicio->where('orden.id_orden', $request->get("numOrden"));
        }
        if($request->get("estado")) {
            switch ($request->get("estado")) {
                case 1://Orden entregada
                    $ordenServicio = $ordenServicio->where('orden.estadoOrden', '3');
                    break;
                case '2': //Pendiente de facturar
                    $ordenServicio = $ordenServicio
                    ->where('orden.estadoOrden', '3')
                    ->where('orden.factura_numero_orden', null);
                    break;
                case '3':///Lista para entrega
                    $ordenServicio = $ordenServicio->where('orden.estadoOrden', '2');
                    break;
                case '4':///Vencida
                    $ordenServicio = $ordenServicio
                    ->where('orden.fecha_estimada_orden', '<=', date('Y-m-d H:i:s'))
                    ->where('orden.estadoOrden',  '1');
                    break;
                case '5':///Lista para entrega
                    $ordenServicio = $ordenServicio->where('orden.estadoOrden', '1');
                    break;
                default:
                    break;
        }
        }

        if($request->get("cedula")) {
            $ordenServicio = $ordenServicio->where('cliente.cliente_documento', 'like','%'. $request->get("cedula").'%');
        }
        if($request->get("serial")) {
            $ordenServicio = $ordenServicio->where('equipo.equipo_serial', 'like','%'. $request->get("serial").'%');
        }
        if($request->get("nombres")) {
            $ordenServicio = $ordenServicio->where('cliente.cliente_nombres', 'like','%'. $request->get("nombres").'%');
        }
        $requestFechainicio = '';
        $requestFechafin ='';
        if($request->get("dateinicioEntrada") && $request->get("datefinEntrada")) {

            $dateinicioEntrada = date($request->get('dateinicioEntrada')." 00:00:01");
            $datefinEntrada = date($request->get('datefinEntrada')." 23:59:59");
            $ordenServicio = $ordenServicio->whereBetween('orden.fecha_creacion_orden', [$dateinicioEntrada, $datefinEntrada]);
            $arrafechaentradainicio = explode("-", $request->get("dateinicioEntrada"));
            $requestFechainicio = $arrafechaentradainicio[1].'/'.$arrafechaentradainicio[2].'/'.$arrafechaentradainicio[0];
            $arrafechaentradafin = explode("-", $request->get("datefinEntrada"));
            $requestFechafin = $arrafechaentradafin[1].'/'.$arrafechaentradafin[2].'/'.$arrafechaentradafin[0];

        }
        $requestFechainicioentrega = '';
        $requestFechafinentrega ='';
        if($request->get("dateinicioEntrega") && $request->get("datefinEntrega")) {

            $dateinicioEntrega = date($request->get('dateinicioEntrega')." 00:00:01");
            $datefinEntrega = date($request->get('datefinEntrega')." 23:59:59");
            $ordenServicio = $ordenServicio->whereBetween('orden.fecha_entrega_orden', [$dateinicioEntrega, $datefinEntrega]);
            $arrafechaentregainicio = explode("-", $request->get("dateinicioEntrega"));
            $requestFechainicioentrega = $arrafechaentregainicio[1].'/'.$arrafechaentregainicio[2].'/'.$arrafechaentregainicio[0];
            $arrafechaentregafin = explode("-", $request->get("datefinEntrega"));
            $requestFechafinentrega = $arrafechaentregafin[1].'/'.$arrafechaentregafin[2].'/'.$arrafechaentregafin[0];

        }
        if($request->get("export")){
            //Descargamos el Excel
            $data = $ordenServicio->get();
            return $this->exportFile($data);
        }
        $totalCount = count($ordenServicio->get());
        if($request->get("paginate")) {
            if($request->get("paginate") == 'all'){
            $this->numpaginate = $totalCount;
            }else{
            $this->numpaginate = $request->get("paginate");
            }
        }
        $ordenServicio = $ordenServicio->paginate($this->numpaginate);

        $dataRequest = array(
            'idTecnico' => $request->get("idTecnico"),
            'numOrden' => $request->get("numOrden"),
            'estado' => $request->get("estado"),
            'cedula' => $request->get("cedula"),
            'nombres' => $request->get("nombres"),
            'requestFechainicio' => $requestFechainicio,
            'requestFechafin' => $requestFechafin,
            'requestFechainicioentrega' => $requestFechainicioentrega,
            'requestFechafinentrega' => $requestFechafinentrega,
            'serial' => $request->get("serial"),

        );
         return view('modulos.ordenServicio.orden_general')->with('ordenServicio',  $ordenServicio)
         ->with('tecnico',  $tecnico)
         ->with('numpaginate',  $this->numpaginate)
         ->with('totalCount',  $totalCount)
         ->with('dataRequest',  $dataRequest);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function show(BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function edit(BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuscarOrden $buscarOrden)
    {
        //
    }
}
