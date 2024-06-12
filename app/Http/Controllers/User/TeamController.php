<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;

class TeamController extends Controller
{
  public function index(){
    $teams = Team::orderBy('name','asc')->get();
    $title = "teams of work";
   return view('teams.index', compact('teams', 'title'));
  }

  public function create(){
      $team= New Team;
      $title = "team of work";
      $btn = "save";
      return view('teams.create',compact('team','title','btn'));
  }

  public function store(TeamStoreRequest $request)
  {
      $team = new team;
      if($request->kind==null){$kind=KIND;}else{$kind=$request->kind;}
      $team->name = $request->name;
      $team->kind = $kind;
      $team->description = $request->description;
      $team->save();
      $message=__('team');
      return redirect()->route('teams.index')->with('success', $message.' ' . $team->name . ' creado exitosamente');
  }


  public function edit($id){
      $team=Team::find($id);
      $title = "team of work";
      $btn = "modify";
      return view('teams.edit',compact('team','title','btn'));
     }

  public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index');
    }


    public function assign(Request $request, $id)
    {
        $team = Team::find($id);
        $users = User::orderBy('name')->get();
        $assigns = $team->users()->orderBy('name', 'asc')->get();
        return view('teams.assign', compact('users', 'assigns', 'team'));
    }

    public function team($id, $jd)
    {
        $user = User::find($id);
        $team=Team::find($jd);
        $user->teams()->sync($jd);
        $this->actualizar($jd);
        return redirect()->route('teams.assign', $jd);
    }

    public function noTeam($id, $jd)
    {
        $user = User::find($id);
        $user->teams()->detach($jd);
        $this->actualizar($jd);
        return redirect()->route('teams.assign', $jd);
    }


    public function update(TeamUpdateRequest $request, $id){
        $team=Team::find($id);
        $team->update($request->all());
        $message=__('team');
        return redirect()->route('teams.index')->with('success', $message.' ' . $team->name . ' modificado exitosamente');
    }

    public function actualizar($jd){
        $team=Team::find($jd);
        $users=$team->users;
        $costo=0;
        foreach ($users as $user) {
          if($user->profile){
               $costo=$costo+$user->profile->costo;
            }
        }
        $team->fill(['integrantes'=>$users->count(),'costo'=>$costo])->save();
    }

    public function responsable($id, $jd)
    {
        $user = User::find($id);
        $team=Team::find($jd);
        $team->update([
            'responsable'=>$user->name,
            'responsable_id'=>$user->id,
        ]);
        $team->save();
        return redirect()->route('teams.index')->with('message','Responsable asignado a equipo');
    }



}
