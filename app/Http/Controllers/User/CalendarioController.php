<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DB;
use Carbon\Carbon;
use App\Calendario;
use App\Task;
use App\Costo;
use App\Plan;
use Yajra\DataTables\Facades\DataTables;

class CalendarioController extends Controller
{

    public function index(Request $request){

     if(request()->ajax()){
         if(!empty($request->plan) && !empty($request->frecuencia)){
            $data=DB::table('calendarios')->select('id','plan','periocidad','fecha_inicio', 'equipo_text', 'tarea','responsable','plan_id','frecuencia')
            ->where('plan_id',$request->plan)
            ->where('frecuencia',$request->frecuencia)
            ->get();
         }else{
            $data=DB::table('calendarios')->select('id','plan','periocidad','fecha_inicio', 'equipo_text', 'tarea','responsable','plan_id','frecuencia')
            ->get();
         }
          return datatables()->of($data)
          ->addColumn('btn', 'calendarios.actions')
          ->rawColumns(['btn'])
         ->toJson();
      }
        $plans=Plan::orderBy('name')->get();
        return view('calendarios.index',compact('plans'));

    }


    public function show($id){
    $task  = Calendario::find($id);
    return $task;
    }

    public function showCostos($id){
        $task  = Calendario::find($id);
        $costos=Costo::where('task_id','=',$task->task_id)->get();
        return $costos;
    }



    public function listadoDeTareas(){
         $eventos=Calendario::all();
          $tareas=[];
          foreach($eventos as $e){
            $star=new Carbon($e->fecha_inicio.' '.$e->hora_inicio);
            //$star->toIso8601String();
            $end=new Carbon($e->fecha_inicio.' '.$e->hora_fin);
            //$end->toIso8601String();
           $tarea=[
               'id'=>$e->id,
               'title'=>$e->id.'-'.$e->title,
               'start'=>$star,
               'end'=>$end,

           ];
           array_push($tareas,$tarea);
          }
         return json_encode($tareas);
    }

    public function eventUpdate(Request $request){
        $evento=Calendario::where('id','=',$request->id)->first();
        $evento->fill([
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        $evento->save();
        return response()->json(true);
    }

}



