<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Parametro;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ParametrosImport;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros=Parametro::orderBy('name','asc')->get();
        $title = "parametro de equipos";
        return view('parametros.index',compact('parametros','title'));
    }

    public function create()
    {
        $parametro= New Parametro;
        $title = "Parametro";
        $btn = "save";
        return view('parametros.create',compact('parametro','title','btn'));
    }


    public function store(Request $request)
    {
       $rules=['name'=>'required|unique:parametros,name'];
       $this->validate($request, $rules);
       $parametro=Parametro::create([
           'name'=>mb_strtoupper($request->name),
           'valor'=>$request->valor,
           'unidad'=>mb_strtoupper($request->unidad),
           'description'=>$request->description,
           'slug'=>Str::slug($request->name),
       ]);
       return redirect()->route('parametros.index')->with('message','El Parametro de Equipo '.$parametro->name. ' fue Creado exitósamente');

    }




    public function edit(Parametro $parametro)
    {
        $title="Editar Parametro";
        $btn="modify";
        return view('parametros.edit',compact('parametro','btn','title'));

    }


    public function update(Request $request, Parametro $parametro)
    {

        $rules=['name'=>'required|unique:parametros,name,'.$parametro->id];
        $this->validate($request, $rules);
        $parametro->update([
            'name'=>strtoupper($request->name),
           'valor'=>$request->valor,
           'unidad'=>strtoupper($request->unidad),
           'description'=>$request->description
        ]);
        $parametro->save();
        return redirect()->route('parametros.index')->with('message','El Parametro de Equipo '.$parametro->name. ' fue Actualizado exitósamente');

    }


    public function destroy($id)
    {
        $parametro=Parametro::findOrFail($id);
        $parametro->delete();
        return redirect()->route('parametros.index')->with('message','El Parametro de Equipo '.$parametro->name. ' fue Eliminado exitósamente');

    }


    public function formImportExcel(){
        return view('parametros.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'parametros.xlsx'){
        return redirect()->route('parametros.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new ParametrosImport,$file);
     return redirect()->route('parametros.index')->with('message','Los datos se importaron correctamente');
    }


    public function vaciar(){
        Parametro::where('id','<>',0)->delete();
        return redirect()->route('parametros.index')->with('message','Los datos se eliminaron correctamente');
    }


}
