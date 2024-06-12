<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Falla;
use App\Team;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FallaController extends Controller
{
    public function index(){
        if(Auth()->user()->zona_id==1){return redirect()->back()->with('message','No tiene zona asignada, Verifique');}
        if(Auth()->user()->zona_id==2){
            $fallas=Falla::orderBy('equipo_id','asc')
            ->orderBy('reportada_fecha','desc')
            ->where('condicion','<>','despejada')
            ->get();
        }else{
            $fallas=Falla::orderBy('equipo_id','asc')
                  ->orderBy('reportada_fecha','desc')
                  ->where('condicion','<>','despejada')
                  ->where('zona_id','=',Auth()->user()->zona_id)
                  ->get();
        }

    return view('fallas.index',compact('fallas'));
    }

    public function orden(Falla $falla){
      $team=new Team;
      $teamId=0;
      $teams=Team::orderBy('name')->get();
      $btn="save";
      return view('fallas.orden',compact('teams','falla','team','teamId','btn'));
    }

    public function store(Request $request){
        $rules=['team'=>'required','id'=>'required'];
        $this->validate($request, $rules);
        $team=Team::find($request->team);
        $falla=Falla::find($request->id);
        $falla->fill(['team'=>$team->name,'team_id'=>$team->id])->save();
       // dd($team->name,$falla);
        $team->fallas()->attach($request->id);
        return redirect()->route('fallas.index')->with('message','El Equipo '.$team->name. ' fue Asignado para resolver falla de equipo'.$request->equipo);


    }

}
