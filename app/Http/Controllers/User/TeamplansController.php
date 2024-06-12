<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
use App\Task;
use App\Team;

class TeamplansController extends Controller
{
    public function index(){
     $plans=Plan::orderBy('created_at','asc')->paginate(1);
     return view('teamplans.index',compact('plans'));
    }

    public function taskteam(Task $task){
      $teams=Team::all();
     return view('teamplans.taskteam',compact('task','teams'));
    }

    public function store(Request $request,Task $task){
        if(!$request->team_id){return redirect()->back()->with('message','No se ha seleccionado equipo de tarea o los equipos de tarea no tienen responsable');};
        $rules = ['team_id' => 'required',];
        $this->validate($request, $rules);
        $team=Team::find($request->team_id);
        $task->update([
            'team'=>$team->name,
            'team_id'=>$team->id,
            'responsable_id'=>$team->responsable_id,
            'responsable'=>$team->responsable,
        ]);
        $task->save();
        return redirect()->route('teamplans.index')->with('message','El equipo fue asignado a la tarea');
    }
}
