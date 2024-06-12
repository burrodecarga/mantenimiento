<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SistemaStoreRequest;
use App\Http\Requests\SistemaUpdateRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SistemasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Sistema;

class SistemaController extends Controller
{
    public function index(Request $request)
    {
       $a = $request->get('search');
       $sistemas = Sistema::orderBy('name','asc')->get();
       $title = "sistemas";
       return view('sistemas.index', compact('sistemas', 'title'));
    }

    public function create()
    {
        $sistema= New Sistema;
        $title = "sistema";
        $btn = "save";
        return view('sistemas.create',compact('sistema','title','btn'));
    }


    public function store(SistemaStoreRequest $request)
    {
        $data=$request->only('name','description');
        $name=strtolower($request->name);
        $slug=Str::slug($request->name);
        //dd($slug,$name);
        $sistema=Sistema::create([
            'name'=>$name,
            'slug'=>$slug,
            'description'=>$request->description,
        ]);
        return redirect()->route('sistemas.index')->with('message','El Sistema '.$sistema->name. ' fue creado exitósamente');
    }

    public function edit($id)
    {
        $sistema=Sistema::findOrFail($id, ['id', 'name', 'description']);
        $title = "sistema";
        $btn = "modify";
      return view('sistemas.edit',compact('sistema','title','btn'));
    }

    public function update(SistemaUpdateRequest $request,$id)
    {
        $sistema=Sistema::findOrFail($id);
        $name=strtolower($request->name);
        $slug=Str::slug($request->name);
        $sistema->update([
            'name'=>$name,
            'slug'=>$slug,
            'description'=>$request->description,
        ]

        );
        return redirect()->route('sistemas.index')->with('message','El Sistema '.$sistema->name. ' fue actualizado exitósamente');
    }

    public function destroy($id)
    {
        $sistema=Sistema::findOrFail($id);
        $sistema->delete();
        return redirect()->route('sistemas.index')->with('message','El Sistema '.$sistema->name. ' fue eliminado exitósamente');
    }

    public function show(Sistema $sistema)
    {
        $subsistemas=$sistema->subsistemas->sortBy('name');
        $equipos=$sistema->equipos->sortBy('name');
        return view('sistemas.show',compact('sistema','subsistemas','equipos'));
    }
    public function formImportExcel(){
        return view('sistemas.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'sistemas.xlsx'){
        return redirect()->route('sistemas.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new SistemasImport,$file);
     return redirect()->route('sistemas.index')->with('message','Los datos se importaron correctamente');
    }


    public function vaciar(){
        Sistema::where('id','<>',0)->delete();
        return redirect()->route('sistemas.index')->with('message','Los datos se eliminaron correctamente');
    }








}



