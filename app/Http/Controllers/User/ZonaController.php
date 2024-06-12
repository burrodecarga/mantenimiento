<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Zona;

class ZonaController extends Controller
{
    public function index()
    {
        $zonas=Zona::orderBy('name','asc')->get();
        return view('zonas.index',compact('zonas'));
    }

    public function create()
    {
        $zona=new Zona;
        $btn='save';
        return view('zonas.create',compact('zona','btn'));
    }

    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:zonas,name',];
        $this->validate($request, $rules);
        $zona=Zona::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
      return redirect()->route('zonas.index')->with('message','la zona : '.$zona->name.' fue creada correctamente');
    }

    public function edit(Zona $zona)
    {
        if($zona->id<=2){return redirect()->back()->with('message','zona no modificable');}
        if($zona->slug=='no-asignada' OR $zona->slug=='todas-las-zonas'){return redirect()->back()->with('message','zona no modificable');}
        $btn='modify';
       return view('zonas.edit',compact('zona','btn'));
    }

    public function update(Request $request, Zona $zona)
    {
        if($zona->slug=='no-asignada'){return redirect()->back()->with('message','zona no modificable');}
        $rules = ['name' => 'required|unique:zonas,name,'.$zona->name];
        $this->validate($request, $rules);
        $zona->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        $zona->save();
       return redirect()->route('zonas.index')->with('message','la zona : '.$zona->name.' fue modificada correctamente');

    }

    public function destroy(Zona $zona)
    {
        if($zona->slug=='no-asignada'){return redirect()->back()->with('message','zona no modificable');}
        $equipos=$zona->equipos;
        if($equipos->isEmpty()){
            $zona->delete();
        $message="la zona : '.$zona->name.' fue eliminada correctamente";}else{$message="Hay equipos asignados a esa zona";} ;
        return redirect()->route('zonas.index')->with('message',$message);

    }


}
