<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Zona;
use App\User;
use App\Equipo;

class UserzonaController extends Controller
{
    public function index(){
        $zonas=Zona::orderBy('name','asc')->get();
        $users=User::orderBy('name','asc')->get();
        return view('userzonas.index',compact('users','zonas'));
    }

    public function edit(User $user){
        $zona_id=$user->zona_id;
        $zonas=Zona::orderBy('name','asc')->get();
        $btn="save";
        return view('userzonas.edit',compact('user','zonas','zona_id','btn'));
    }

    public function update(Request $request, User $user){
        $zona=Zona::find($request->zona_id);
        $user->update([
            'zona_id'=>$zona->id,
            'zona'=>$zona->name,
        ]);
        $user->save();
        return redirect()->route('userzonas.index')->with('message','El usuario '.$user->name.' fue asignado a zona correctamente');
    }

    public function show(User $user){
        if($user->zona_id==2){$equipos=Equipo::all();
            $zona=Zona::find($user->zona_id);
        }else{
             $zona=Zona::find($user->zona_id);
             $equipos=$zona->equipos;  }
        $btn="save";
        return view('userzonas.show',compact('user','zona','equipos'));
    }

}
