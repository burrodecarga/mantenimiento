<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repuesto;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RepuestosImport;

class RepuestoController extends Controller
{
    public function index()
    {
        $repuestos=Repuesto::orderBy('name','asc')->get();
        return view('repuestos.index',compact('repuestos'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repuesto= new Repuesto;
        $btn="save";
        return view('repuestos.create',compact('repuesto','btn'));
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
            'name' => 'required|unique:herramientas,name',
            'precio' =>$regex,
            'existencia' =>$regex,
            ]);
        if(PUNTO_DECIMAL==','){
            $precio=coma_a_punto($request->precio);
             $existencia=coma_a_punto($request->existencia);
            }
            if(PUNTO_DECIMAL=='.'){
                $precio=punto_a_coma($request->precio);
                 $existencia=punto_a_coma($request->existencia);
            }

            $slug=Str::slug($request->name);
            $repuesto=Repuesto::create([
                'name'=>$request->name,
                'precio'=>$precio,
                 'existencia'=>$existencia,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);

            return redirect()->route('repuestos.index')->with('message','repuesto '.$repuesto->name.' fue creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Repuesto $repuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Repuesto $repuesto)
    {
        $btn='modify';
        return view('repuestos.edit',compact('repuesto','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repuesto $repuesto)
    {
        if(PUNTO_DECIMAL==','){$regex='regex:/^\d*(\,\d{2})?$/';}else{'regex:/^\d*(\.\d{2})?$/';}
        $this->validate($request, [
            'name' => 'required|unique:repuestos,name,'.$repuesto->id,
            'precio' =>$regex,
            ]);
        if(PUNTO_DECIMAL==','){
            $precio=coma_a_punto($request->precio);
            }
            if(PUNTO_DECIMAL=='.'){
                $precio=punto_a_coma($request->precio);
            }
            $slug=Str::slug($request->name);
            $repuesto->update([
                'name'=>$request->name,
                'precio'=>$precio,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);
            return redirect()->route('repuestos.index')->with('message','repuesto '.$repuesto->name.' fue creado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repuesto  $repuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repuesto $repuesto)
    {
        $repuesto->delete();
        return redirect()->route('repuestos.index')->with('message','repuesto '.$repuesto->name.' fue Eliminada correctamente');

    }

    public function formImportExcel(){
        return view('repuestos.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'repuestos.xlsx'){
        return redirect()->route('repuestos.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new RepuestosImport,$file);
     return redirect()->route('repuestos.index')->with('message','Los datos se importaron correctamente');
    }

    public function vaciar(){
        Repuesto::where('id','<>',0)->delete();
        return redirect()->route('repuestos.index')->with('message','Los datos se eliminaron correctamente');
    }
}
