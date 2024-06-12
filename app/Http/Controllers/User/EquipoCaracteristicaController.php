<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Equipo;
use App\Tipoc;
use App\Caracteristica;
use App\Image;

class EquipoCaracteristicaController extends Controller
{
   public function index(Equipo $equipo)
   {
    $caracteristicas=$equipo->caracteristicas;
    return view('equipocaracteristica.index',compact('equipo'));
   }

   public function caracteristicas(Equipo $equipo)
    {
        $relaciones=[];
           $tipo_id=$equipo->tipo_id;
           $tipo=mb_strtoupper($equipo->tipo);
           $caracteristicas=Tipoc::where('tipo_id','=',$tipo_id)
                                   ->get();
           if($caracteristicas->isEmpty())
           {
              return redirect()->route('tipos.index')->with('message',$tipo.' no tiene caracteristicas definidas, por favor defínalas primero..');
           }
           else
           {
                foreach ($caracteristicas as $c) {
                $caracteristica=Caracteristica::updateOrCreate([
                                    'name'=>$c->name,
                                    'valor'=>$c->valor,
                                    'unidad'=>$c->unidad,
                                    'tipo_id'=>$c->tipo_id,
                                ],
                                    [
                                      'parametro_id'=>$c->parametro_id,

                                    ]);
                  array_push($relaciones,$caracteristica->id);
            }

           }
    $caracteristicas=$equipo->caracteristicas()->sync($relaciones);
    return view('equipocaracteristica.index',compact('equipo'));
}

public function edit( Equipo $equipo, Caracteristica $caracteristica)
{
    $btn='modify';
    return view('equipocaracteristica.edit',compact('caracteristica','equipo','btn'));
}


public function update(Request $request,Equipo $equipo, Caracteristica $caracteristica){

    $request->validate([
            'valor' => 'required',
        ]);

       $caracteristica=Caracteristica::find($request->id);
       $caracteristica->update([
           'valor'=>$request->valor,
           'unidad'=>$request->unidad,
           'simbolo'=>$request->simbolo,
       ]);
       $caracteristica->save();
       return redirect()->route('equipocaracteristica.index',$equipo->id);
    }


    public function show(Equipo $equipo)
    {
        $caracteristicas=$equipo->caracteristicas;
        $images=$equipo->images;
        return view('equipocaracteristica.show',compact('equipo','caracteristicas','images'));
    }

    public function clone(Equipo $equipo)
    {

        $caracteristicas=$equipo->caracteristicas;
        $newEquipo=$equipo->replicate();
        $newEquipo->save();
        $equipo=$newEquipo;
        $equipo->caracteristicas()->sync($caracteristicas);
        return redirect()->route('equipocaracteristica.index',compact('equipo'))
        ->with('message','El equipo ha sido clonado correctamente, N° de Identificación'.$equipo->id);
    }

    public function imagen(Equipo $equipo)
    {
      return view('equipocaracteristica.imagen',compact('equipo'));
    }

    public function imagenStore(Request $request, Equipo $equipo)
    {
               $this->validate($request, ['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
              if($request->file('file')){
              $path=Storage::disk('equipos')->put('equipos',$request->file('file'));
              if($request->body==null){$body="Sin Comentarios";}else{$body=$request->body;}

              $equipo->images()->create(['url'=>$path,'body'=>$body]);
              return redirect()->route('equipos.index')->with('message','imagen de equipo '.$equipo->name.' almacenada correctamente');
      }
    }


}
