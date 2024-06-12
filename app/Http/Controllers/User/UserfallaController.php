<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Zona;
use App\Equipo;
use App\Falla;
use Illuminate\Support\Carbon;

class UserfallaController extends Controller
{
    public function index(){
        $user=Auth::user();
        $zona_id=$user->zona_id;
        if(!$zona_id OR $zona_id<=1){return redirect()->route('home')->with('message','Error en zona de asignación...Verifique');};
        $zona=Zona::find($zona_id);
        if($zona_id==2){
            $equipos=Equipo::orderBy('ubicacion','asc')
                             ->orderBy('name','asc')->get();
        }else{
            $equipos=$zona->equipos;}

        if(is_null($equipos)){$equipos=[] ;}
        if($user->area=='operativa'){
            return view('userfallas.operador',compact('user','zona','equipos'));
        }else{
            return view('userfallas.index',compact('user','zona','equipos'));
        }

    }

    public function create(Equipo $equipo){
        $falla=new Falla;
        $tipoFalla=fallas();
        $falla_id=0;
        $btn="save";
        return view('userfallas.create',compact('equipo','falla','tipoFalla','btn'));
    }

    public function store(Request $request){
        $rules=['fallas'=>'required','equipo_id'=>'required'];
        $this->validate($request, $rules);
        $date = Carbon::now();
        $hora = $date->toTimeString();
        $fecha=now();
        $mes=(Carbon::now())->month;
        $reportada_id=Auth::user()->id;
        $reportada_name=Auth::user()->name;
        $equipo=Equipo::find($request->equipo_id);
        $reporte=$request->fallas;
        $links = implode(',', $reporte);
        $falla=Falla::create([
            'falla'=>'no diagnosticada',
            'detalles'=>'sin detalle',
            'condicion'=>'activa',
            'equipo_id'=>$request->equipo_id,
            'equipo_text'=>$equipo->name,
            'equipo_servicio'=>$equipo->servicio,
            'fecha'=>$fecha,
            'mes'=>$mes,
            'hora'=>$hora,
            'reporte'=> $links,
            'reportada_fecha'=>$fecha,
            'reportada_id'=>$reportada_id,
            'reportada_name'=>$reportada_name,
            'zona_text'=>$equipo->zona->name,
            'zona_id'=>$equipo->zona_id,

        ]);

        $equipo=Equipo::find($request->equipo_id);
        $equipo->fill(['falla'=>'activa : '.$fecha])->save();

        $user=Auth::user();
        $zona=$user->zona;
        if(is_null($zona)){$zona= new Zona;}
        $equipos=$zona->equipos;
        if(is_null($equipos)){$equipos=[] ;}
        //dd($equipos);
        return redirect()->route('userfallas.index',compact('user','zona','equipos'))
                         ->with('message','La falla fue reportada exitosamente');
    }

    public function despeje(Equipo $equipo){
       $fallas=$equipo->fallas->where('despejada','<>',1);
       return view('userfallas.despeje',compact('fallas','equipo'));
    }

    public function despejaFallas(Request $request){
       $fallas=$request->fallas;
      if($fallas){
        foreach($fallas as $f){
           $falla=Falla::find($f);
           if($falla->condicion=='despejada'){
           $falla->update([
           'despejada'=>1,
           'reportada_ok'=>now(),
           ]);
           $falla->save();
           $mensaje="Falla despejada y registrada";
           }else{
            $mensaje="La Falla no ha sido despejada y ni registrada por el personal técnico";
           }
           $user=Auth::user();
           $zona=$user->zona;
           $equipos=$zona->equipos;
           if(is_null($equipos)){$equipos=[] ;}
           return redirect()->route('userfallas.index',compact('user','zona','equipos'))
                            ->with('message',$mensaje);

        }
      }
      return redirect()->back()->with('message','No seleccionó falla');
    }
}
