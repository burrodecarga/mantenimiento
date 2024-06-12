<?php

namespace App\Http\Controllers\User;

use App\Estadistica;
use App\Falla;
use App\Equipo;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EstadisticaController extends Controller
{

    public function graficoLineal(){
        $gastosMantenimiento=Estadistica::select(DB::raw('MONTH(fecha_inicio) as mes'),DB::raw('SUM(repuestos) as repuestos'), DB::raw('SUM(insumos) as insumos'),DB::raw('SUM(servicios) as servicios'),DB::raw('SUM(personal) as personal'),DB::raw('SUM(costo) as costos'))
        ->where('estadisticable_type','=','App\Task')
        ->groupBy('mes')->get()->toArray();

        $gastosFallas=Estadistica::select(DB::raw('MONTH(fecha_inicio) as mes'),DB::raw('SUM(repuestos) as repuestos'), DB::raw('SUM(insumos) as insumos'),DB::raw('SUM(servicios) as servicios'),DB::raw('SUM(personal) as personal'),DB::raw('SUM(costo) as costos'))
        ->where('estadisticable_type','=','App\Falla')
        ->groupBy('mes')->get()->toArray();

        $gastosTotales=Estadistica::select(DB::raw('MONTH(fecha_inicio) as mes'),DB::raw('SUM(repuestos) as repuestos'), DB::raw('SUM(insumos) as insumos'),DB::raw('SUM(servicios) as servicios'),DB::raw('SUM(personal) as personal'),DB::raw('SUM(costo) as costos'))
        ->groupBy('mes')->get()->toArray();


        $array_gastos_falla_costos=array_fill(0,12,0);
        $array_gastos_falla_repuestos=array_fill(0,12,0);
        $array_gastos_falla_servicios=array_fill(0,12,0);
        $array_gastos_falla_insumos=array_fill(0,12,0);
        $array_gastos_falla_personal=array_fill(0,12,0);

        $array_gastos_mant_costos=array_fill(0,12,0);
        $array_gastos_mant_repuestos=array_fill(0,12,0);
        $array_gastos_mant_servicios=array_fill(0,12,0);
        $array_gastos_mant_insumos=array_fill(0,12,0);
        $array_gastos_mant_personal=array_fill(0,12,0);

        $array_gastos_totales_costos=array_fill(0,12,0);
        $array_gastos_totales_repuestos=array_fill(0,12,0);
        $array_gastos_totales_servicios=array_fill(0,12,0);
        $array_gastos_totales_insumos=array_fill(0,12,0);
        $array_gastos_totales_personal=array_fill(0,12,0);

        foreach($gastosMantenimiento as $gm){
            $index=$gm['mes']-1;
        $array_gastos_mant_costos[$index]=$gm['costos'];
        $array_gastos_mant_repuestos[$index]=$gm['repuestos'];
        $array_gastos_mant_servicios[$index]=$gm['servicios'];
        $array_gastos_mant_insumos[$index]=$gm['insumos'];
        $array_gastos_mant_personal[$index]=$gm['personal'];
        }

        foreach($gastosFallas as $gm){
            $index=$gm['mes']-1;
        $array_gastos_falla_costos[$index]=$gm['costos'];
        $array_gastos_falla_repuestos[$index]=$gm['repuestos'];
        $array_gastos_falla_servicios[$index]=$gm['servicios'];
        $array_gastos_falla_insumos[$index]=$gm['insumos'];
        $array_gastos_falla_personal[$index]=$gm['personal'];
        }

        foreach($gastosTotales as $gm){
            $index=$gm['mes']-1;
        $array_gastos_totales_costos[$index]=$gm['costos'];
        $array_gastos_totales_repuestos[$index]=$gm['repuestos'];
        $array_gastos_totales_servicios[$index]=$gm['servicios'];
        $array_gastos_totales_insumos[$index]=$gm['insumos'];
        $array_gastos_totales_personal[$index]=$gm['personal'];
        }

//       dd($gastosTotales,$array_gastos_mant_personal);

        return view('estadisticas.graficoLineal',compact(
            'array_gastos_falla_costos',
            'array_gastos_falla_repuestos',
            'array_gastos_falla_servicios',
            'array_gastos_falla_insumos',
            'array_gastos_falla_personal',

            'array_gastos_mant_costos',
            'array_gastos_mant_repuestos',
            'array_gastos_mant_servicios',
            'array_gastos_mant_insumos',
            'array_gastos_mant_personal',

            'array_gastos_totales_costos',
            'array_gastos_totales_repuestos',
            'array_gastos_totales_servicios',
            'array_gastos_totales_insumos',
            'array_gastos_totales_personal',
        ));
    }


    public function graficoBarras(){
        $now=Carbon::now();
        $start=$now->subYear(2)->format('d-m-Y');
        $end=Carbon::now()->format('d-m-Y');
        return view('estadisticas.graficoBarras',compact('start','end'));

    }

    public function reportesJson(Request $request){
         $start = $request->input('start');
         $end = $request->input('end');
         $start= Carbon::parse($start)->subDays(0)->startOfDay();
         $end= Carbon::parse($end)->endOfDay(); ;
         $categorias=Falla::select('mes')
         ->whereBetween('reportada_fecha',array($start,$end))
         ->groupBy('mes')
         ->pluck('mes');
         $meses=$categorias;
         $data['categories'] = $categorias->map(function ($item, $key) {
            return mes($item);
        });

         $fallasPeriodo=Falla::select('reporte','mes')->whereBetween('reportada_fecha',array($start,$end))->get();

        //  $noFunciona=Falla::where('reporte','=','no funciona')->whereBetween('reportada_fecha',array($start,$end))->get();
        //  $funcionaInadecuadamente=Falla::where('reporte','=','funciona inadecuadamente')->whereBetween('reportada_fecha',array($start,$end))->get();
        //  $fallaRecurrente=Falla::where('reporte','=','falla recurrente')->whereBetween('reportada_fecha',array($start,$end));
        //  $presentaRuido=Falla::where('reporte','=','presenta ruido')->whereBetween('reportada_fecha',array($start,$end));
        //  $presentaVibracion=Falla::where('reporte','=','presenta vibracion')->whereBetween('reportada_fecha',array($start,$end));
        //  $presentaCalentamiento=Falla::where('reporte','=','presenta calentamiento')->whereBetween('reportada_fecha',array($start,$end));
        //  $paralizaProceso=Falla::where('reporte','=','paraliza proceso')->whereBetween('reportada_fecha',array($start,$end));
        //  $fallaReciente=Falla::where('reporte','=','falla reciente')->whereBetween('reportada_fecha',array($start,$end));

        //dd($fallasPeriodo);

        $serie11['name']="no funciona";
        $serie21['name']="funciona inadecuadamente";
        $serie31['name']="falla recurrente";
        $serie41['name']="presenta ruido";
        $serie51['name']="presenta vibracion";
        $serie61['name']="presenta calentamiento";
        $serie71['name']="paraliza proceso";
        $serie81['name']="falla reciente";

        $serie11['data']=[];
        $serie21['data']=[];
        $serie31['data']=[];
        $serie41['data']=[];
        $serie51['data']=[];
        $serie61['data']=[];
        $serie71['data']=[];
        $serie81['data']=[];

        foreach($meses as $mes){
           $f01=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','no funciona')->count();
           $f02=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','funciona inadecuadamente')->count();
           $f03=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','falla recurrente')->count();
           $f04=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','presenta ruido')->count();
           $f05=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','presenta vibracion')->count();
           $f06=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','presenta calentamiento')->count();
           $f07=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','paraliza proceso')->count();
           $f08=$fallasPeriodo->where('mes','0',$mes)->where('reporte','=','falla reciente')->count();
           array_push($serie11['data'] ,intval($f01));
           array_push($serie21['data'] ,intval($f02));
           array_push($serie31['data'] ,intval($f03));
           array_push($serie41['data'] ,intval($f04));
           array_push($serie51['data'] ,intval($f05));
           array_push($serie61['data'] ,intval($f06));
           array_push($serie71['data'] ,intval($f07));
           array_push($serie81['data'] ,intval($f08));

        }

         $series[]=$serie11;
         $series[]=$serie21;
         $series[]=$serie31;
         $series[]=$serie41;
         $series[]=$serie51;
         $series[]=$serie61;
         $series[]=$serie71;
         $series[]=$serie81;

         $data['series']=$series;
         return $data;
    }



    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
