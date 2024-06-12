<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Calendario;

class EventController extends Controller
{
   public function loadEvent(){
     $eventos=Calendario::where('frecuencia','<>',1)->get();
     $tareas=[];
          foreach($eventos as $e){
            $start=new Carbon($e->fecha_inicio.' '.$e->hora_inicio);
            $end=$start;
            // $star=$e->start;
            // $end=$e->end;
           $tarea=[
               'id'=>$e->id,
               'title'=>$e->periocidad.'-'.$e->id.'-'.$e->title,
               'start'=>$e->start,
               'end'=>$e->end,
               'allDay'=>$e->allDay,
               'color'=>$e->color,

           ];
           array_push($tareas,$tarea);
          }
        return json_encode($tareas);

    }

    public function updateEvent(Request $request){
        $evento=Calendario::where('id','=',$request->id)->first();
        if($request->end==null){
            $end=$request->start;
            $allDay=true;
        }else{
            $end=$request->end;
            $allDay=false;
        }
        $evento->update([
        'start'=>$request->start,
        'end'=>$end,
        'allDay'=>$allDay,
        ]);
        $evento->save();
        //return response()->json(true);
    }
}
