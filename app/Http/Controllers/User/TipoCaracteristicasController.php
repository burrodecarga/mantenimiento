<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Tipoc;
use App\Parametro;

class TipoCaracteristicasController extends Controller
{
    public function index($id){
        $tipo=Tipo::find($id);
        $caracteristicasId=$tipo->tipocs->pluck('parametro_id');
        $caracteristicas=Parametro::orderBy('name','asc')
        ->get();
        $btn='save';
        return view('tipocaracteristicas.index',compact('tipo','caracteristicas','caracteristicasId','btn'));
      }

      public function store(Request $request, Tipo $tipo){
        Tipoc::where('tipo_id','=',$tipo->id)->delete();
        $caracteristicasId=$request->id;
        foreach($caracteristicasId as $id){
            $parametro=Parametro::find($id);
            Tipoc::create([
                'name'=>$parametro->name,
                'valor'=>$parametro->valor,
                'unidad'=>$parametro->unidad,
                'simbolo'=>$parametro->simbolo,
                'tipo_id'=>$tipo->id,
                'parametro_id'=>$parametro->id,
                'slug'=>$parametro->slug
            ]);
        }
      return redirect()->route('tipos.index')->with('message','Se asignaron los caracteristicas al tipo de equipo');
      }
}
