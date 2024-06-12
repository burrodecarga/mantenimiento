<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Protocolo;
use App\Tipo;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProtocolosImport;

class ProtocoloController extends Controller
{
   public function index(){
      $protocolos=Protocolo::orderBy('tipo_text','asc')
                             ->orderBy('frecuencia','asc')
                             ->orderBy('tarea_posicion','asc')
                             ->get();
      return view('protocolos.index',compact('protocolos'));
   }

   public function create(){
    $protocolo=new Protocolo;
    $tipos=tipo_de_protocolo();
    $tareas=tipo_de_tarea();
    $permisos=autorizacion();
    $especialidad=especialidad();
    $frecuencia=frecuencia();
    $seguridad=seguridad();
    $condiciones=condiciones();
    $btn='save';
    $tipos_text=Tipo::orderBy('name','asc')->get();
    return view('protocolos.create',compact('btn','protocolo','tipos','tipos_text','tareas','permisos','especialidad','frecuencia','seguridad','condiciones'));
   }

   public function store(Request $request){

    //dd($request->all());
    $request->validate([
        'protocolo' => 'required',
        'tipo_id'=>'required',
        'tarea' => 'required',
        'protocolo' => 'required',
        'especialidad' => 'required',
        'frecuencia' => 'required|min:1|max:360',
        'duracion' => 'required|min:1|max:24',
        'permisos' => 'required',
        'seguridad' => 'required',
        'condiciones' => 'required',
        'tarea_posicion'=>'required',
        'tarea_restriccion'=>'required',

    ]);
    if($request->tarea_posicion<$request->tarea_restriccion){$request->merge(['tarea_restriccion' => "0"]);}
    $tipo_text=Tipo::find($request->tipo_id);
    $request->merge(['tipo_text'=>$tipo_text->name]);
    $potocolo=Protocolo::create($request->all());
    return redirect()->route('protocolos.index')->with('message','El protocolo  '.$request->tarea.', ha sido creado correctamente');
   }

   public function edit(Protocolo $protocolo){

    $tipos=tipo_de_protocolo();
    $tareas=tipo_de_tarea();
    $permisos=autorizacion();
    $especialidad=especialidad();
    $frecuencia=frecuencia();
    $seguridad=seguridad();
    $condiciones=condiciones();
    $btn='modify';
    $tipos_text=Tipo::orderBy('name','asc')->get();
    return view('protocolos.edit',compact('btn','protocolo','tipos','tipos_text','tareas','permisos','especialidad','frecuencia','seguridad','condiciones'));
   }

   public function update(Request $request, Protocolo $protocolo){
   $request->validate([
      'protocolo' => 'required',
      'tarea' => 'required',
      'protocolo' => 'required',
      'especialidad' => 'required',
      'frecuencia' => 'required|min:1|max:360',
      'duracion' => 'required|min:1|max:24',
      'permisos' => 'required',
      'seguridad' => 'required',
      'condiciones' => 'required',
      'tarea_posicion'=>'required',
      'tarea_restriccion'=>'required',
  ]);
  if($request->tarea_posicion<$request->tarea_restriccion){$request->merge(['tarea_restriccion' => "0"]);}
  $tipo_text=Tipo::find($request->tipo_id);
  $request->merge(['tipo_text'=>$tipo_text->name]);
  $protocolo->update($request->all());
  $protocolo->fill(['tarea_posicion'=>$request->tarea_posicion,'tarea_restriccion'=>$request->tarea_restriccion]);
  $protocolo->save();
  return redirect()->route('protocolos.index')->with('message','El protocolo  '.$protocolo->tarea.', ha sido creado correctamente');
 }

 public function destroy(Protocolo $protocolo){
     $protocolo->delete();
     return redirect()->route('protocolos.index')->with('message','El protocolo '.$protocolo->tarea.' Fue eliminado correctamente');
 }

 public function formImportExcel(){
    return view('protocolos.formImportExcel');
}

public function importExcel(Request $request){

  $file=$request->file('file');
  if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
  $filename =$file->getClientOriginalName();
  if($filename<>'protocolos.xlsx'){
    return redirect()->route('protocolos.formImportExcel')->with('message','El archivo de importación es incorrecto');
}
  $collection=Excel::Import(new ProtocolosImport,$file);
 return redirect()->route('protocolos.index')->with('message','Los datos se importaron correctamente');
}

public function vaciar(){
    Protocolo::where('id','<>',0)->delete();
    return redirect()->route('protocolos.index')->with('message','Los datos se eliminaron correctamente');
}


}
