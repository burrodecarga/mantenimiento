<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ServiciosImport;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios=Servicio::orderBy('name','asc')->get();
        return view('servicios.index',compact('servicios'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicio= new Servicio;
        $btn="save";
        return view('servicios.create',compact('servicio','btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(PUNTO_DECIMAL==','){$regex='regex:/^\d*(\,\d{2})?$/';}else{'regex:/^\d*(\.\d{2})?$/';}
        $this->validate($request, [
            'name' => 'required|unique:servicios,name',
            'precio' =>$regex,
            ]);
        if(PUNTO_DECIMAL==','){
            $precio=coma_a_punto($request->precio);
            }
            if(PUNTO_DECIMAL=='.'){
                $precio=punto_a_coma($request->precio);
            }
            $slug=Str::slug($request->name);
            $servicio=Servicio::create([
                'name'=>$request->name,
                'precio'=>$precio,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);
            return redirect()->route('servicios.index')->with('message','servicio '.$servicio->name.' fue creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        $btn='modify';
        return view('servicios.edit',compact('servicio','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        if(PUNTO_DECIMAL==','){$regex='regex:/^\d*(\,\d{2})?$/';}else{'regex:/^\d*(\.\d{2})?$/';}
        $this->validate($request, [
            'name' => 'required|unique:servicios,name,'.$servicio->id,
            'precio' =>$regex,
            ]);
        if(PUNTO_DECIMAL==','){
            $precio=coma_a_punto($request->precio);
            }
            if(PUNTO_DECIMAL=='.'){
                $precio=punto_a_coma($request->precio);
            }
            $slug=Str::slug($request->name);
            $servicio->update([
                'name'=>$request->name,
                'precio'=>$precio,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);
            return redirect()->route('servicios.index')->with('message','servicio '.$servicio->name.' fue creado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')->with('message','servicio '.$servicio->name.' fue Eliminada correctamente');

    }

    public function formImportExcel(){
        return view('servicios.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'servicios.xlsx'){
        return redirect()->route('servicios.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new ServiciosImport,$file);
     return redirect()->route('servicios.index')->with('message','Los datos se importaron correctamente');
    }

    public function vaciar(){
        Servicio::where('id','<>',0)->delete();
        return redirect()->route('servicios.index')->with('message','Los datos se eliminaron correctamente');
    }
}
