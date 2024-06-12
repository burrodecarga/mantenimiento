<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TiposImport;
use App\Imports\CaracteristicasImport;
use App\Tipo;
use App\Tipoc;
use App\Parametro;
use Illuminate\Support\Str;

class TipoController extends Controller
{

    public function index()
    {
       $title = "tipo de equipos";
       $tipos=Tipo::orderBy('name','asc')->get();
       $texto='';
       return view('tipos.index',compact('tipos','title','texto'));
    }


    public function create()
    {
        $tipo= New Tipo;
        $title = "tipo de equipo";
        $btn = "save";
        return view('tipos.create',compact('tipo','title','btn'));
    }


    public function store(Request $request)
    {
       $rules=['name'=>'required|unique:tipos,name'];
       $this->validate($request, $rules);
       $tipo=Tipo::create([
           'name'=>$request->name,
           'slug'=>Str::slug($request->name),
       ]);
       return redirect()->route('tipos.index')->with('message','El Tipo de Equipo '.$tipo->name. ' fue Creado exitósamente');

    }




    public function edit(Tipo $tipo)
    {
        $title="Editar Tipo";
        $btn="modify";
        return view('tipos.edit',compact('tipo','btn','title'));

    }


    public function update(Request $request, Tipo $tipo)
    {

        $rules=['name'=>'required|unique:tipos,name,'.$tipo->id];
        $this->validate($request, $rules);
        $tipo->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        $tipo->save();
        return redirect()->route('tipos.index')->with('message','El Tipo de Equipo '.$tipo->name. ' fue Actualizado exitósamente');
    }


    public function destroy($id)
    {
        $tipo=Tipo::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tipos.index')->with('message','El Tipo de Equipo '.$tipo->name. ' fue Eliminado exitósamente');
    }

    public function assign(Request $request, Tipo $tipo)
    {
        $assigns = $tipo->tipocs()->orderBy('name', 'asc')->get();
        $parametros = Parametro::orderBy('name','asc')->get();
        return view('tipos.assign', compact('parametros', 'assigns', 'tipo'));
    }


    public function tipo($parametro_id,$tipo_id)
    {
        $parametro = Parametro::find($parametro_id);
        $tipo=Tipo::find($tipo_id);
        $caracteristicas=$tipo->caracteristicas;
        $caracteristica=Tipoc::updateOrcreate([
            'tipo_id'=>$tipo_id,
            'parametro_id'=>$parametro_id
        ],[
            'name'=>$parametro->name,
            'valor'=>$parametro->valor,
            'unidad'=>$parametro->unidad,
            'slug'=>$parametro->slug,
        ]);
        return redirect()->route('tipos.assign', $tipo_id);
    }

    public function noTipo($id)
    {
        $tipo = Tipoc::find($id);
       // dd($tipo->name,$tipo->id);
        $tipo_id=$tipo->tipo_id;
        $tipo->delete();
        return redirect()->route('tipos.assign', $tipo_id);
    }

    public function formImportExcel(){
        return view('tipos.formImportExcel');
    }

    public function importExcel(Request $request){
      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'tipos.xlsx'){
        return redirect()->route('tipos.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      Excel::Import(new TiposImport,$file);
      return redirect()->route('tipos.index')->with('message','Los datos se importaron correctamente');
    }


    public function vaciar(){
        Tipo::where('id','<>',0)->delete();
        return redirect()->route('tipos.index')->with('message','Los datos se eliminaron correctamente');
    }

    public function formImportExcelCaracteristicas(){
        $tipos=Tipo::orderBy('name','asc')->get();
        return view('tipos.formImportExcelCaracteristicas',compact('tipos'));
    }

    public function importExcelCaracteristicas(Request $request){
        $validatedData = $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);
        $file=$request->file('file');
        $filename =$file->getClientOriginalName();
        if($filename<>'caracteristicas.xlsx'){
          return redirect()->route('tipos.formImportExcelCaracteristicas')->with('message','El archivo de importación es incorrecto');
      }
        Excel::Import(new CaracteristicasImport,$file);
        return redirect()->route('tipos.index')->with('message','Los datos se importaron correctamente');
      }




}
