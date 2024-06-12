<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubsistemaStoreRequest;
use App\Http\Requests\SubsistemaUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SubsistemasImport;
use App\Subsistema;
use App\Sistema;

class SubsistemaController extends Controller
{
    public function index(Request $request)
    {
       $a = $request->get('search');
       $subsistemas = Subsistema::orderBy('name','asc')->get();
       $title = "sub-sistemas";
       return view('subsistemas.index', compact('subsistemas', 'title'));
    }

    public function create()
    {
          $sistemas=Sistema::all(['id','name']);
         if($sistemas->isEmpty()) {
            $title = "Subsistemas";
           return redirect()->route('sistemas.index')->with('success','Se deben crear Sistemas primero');
         }
        $subsistema= New Subsistema;
        $title = "subsistema";
        $btn = "save";
        $sistema_id=0;
        return view('subsistemas.create',compact('subsistema','title','btn','sistema_id','sistemas'));
    }


    public function store(SubsistemaStoreRequest $request)
    {
        $validador=$request->sistema_id.'-'.$request->name;
        $sistema=Sistema::find($request->sistema_id);
        if(Subsistema::where('validador',$validador)->first()) return redirect()->back()->with('success','Existe Subsistema');
        $subsistema=Subsistema::create([
           "name"=>$request->name,
            "sistema"=>$sistema->name,
            "sistema_id"=>$request->sistema_id,

            "validador"=>$validador,
            "description"=>$request->description,
        ]);
        return redirect()->route('subsistemas.index')->with('message','El Subsistema '.$subsistema->name. ' fue creado exitósamente');
    }

    public function edit($id)
    {
        $subsistema=Subsistema::find($id, ['id', 'name', 'description','validador','sistema_id']);
        $sistema_id=$subsistema->sistema_id;
        $sistemas= $sistemas=Sistema::all(['id','name']);
        $title = "subsistema";
        $btn = "modify";
      return view('subsistemas.edit',compact('subsistema','title','btn','sistema_id','sistemas'));
    }

    public function update(SubsistemaUpdateRequest $request,$id)
    {
        $validador=$request->sistema_id.'-'.$request->name;
        $sistema=Sistema::find($request->sistema_id);
        $subsistema=Subsistema::find($id);
        $subsistema->update([
           "name"=>$request->name,
            "sistema_id"=>$request->sistema_id,
            "validador"=>$validador,
           "description"=>$request->description,
           "sistema"=>$sistema->name,
        ]);
        return redirect()->route('subsistemas.index')->with('message','El Subsistema '.$subsistema->name. ' fue actualizado exitósamente');
    }

    public function destroy($id)
    {
        $subsistema=Subsistema::find($id);
        $subsistema->delete();
        return redirect()->route('subsistemas.index')->with('message','El Subsistema '.$subsistema->name. ' fue eliminado exitósamente');
    }

    public function getSubsistemas($id){
        return Subsistema::where('sistema_id',$id)->get(['id','name','sistema']);
      }

      public function show(Subsistema $subsistema)
      {

          $sistema=$subsistema->sistema;
          $equipos=$subsistema->equipos->sortBy('name');
          return view('subsistemas.show',compact('sistema','subsistema','equipos'));
      }

      public function formImportExcel(){
          $sistemas=Sistema::orderBy('name','asc')->get();
        return view('subsistemas.formImportExcel',compact('sistemas'));
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'subsistemas.xlsx'){
        return redirect()->route('subsistemas.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new SubsistemasImport,$file);
     return redirect()->route('subsistemas.index')->with('message','Los datos se importaron correctamente');
    }


    public function vaciar(){
        Subsistema::where('id','<>',0)->delete();
        return redirect()->route('subsistemas.index')->with('message','Los datos se eliminaron correctamente');
    }

}
