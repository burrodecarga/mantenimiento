<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Herramienta;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HerramientasImport;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas=Herramienta::orderBy('name','asc')->get();
        return view('herramientas.index',compact('herramientas'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $herramienta= new Herramienta;
       $btn="save";
       return view('herramientas.create',compact('herramienta','btn'));
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
            $herramienta=Herramienta::create([
                'name'=>$request->name,
                'precio'=>$precio,
                 'existencia'=>$existencia,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);
            return redirect()->route('herramientas.index')->with('message','herramienta '.$herramienta->name.' fue cfreado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Herramienta $herramienta)
    {
        $btn='modify';
        return view('herramientas.edit',compact('herramienta','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, herramienta $herramienta)
    {
        if(PUNTO_DECIMAL==','){$regex='regex:/^\d*(\,\d{2})?$/';}else{'regex:/^\d*(\.\d{2})?$/';}
        $this->validate($request, [
            'name' => 'required|unique:herramientas,name,'.$herramienta->id,
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
            $herramienta->update([
                'name'=>$request->name,
                'precio'=>$precio,
                 'existencia'=>$existencia,
                 'proveedor'=>$request->proveedor,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);

            return redirect()->route('herramientas.index')->with('message','herramienta '.$herramienta->name.' fue actualizado correctamente');


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Herramienta $herramienta)
    {
        $herramienta->delete();
        return redirect()->route('herramientas.index')->with('message','herramienta '.$herramienta->name.' fue Eliminada correctamente');

    }

    public function formImportExcel(){
        return view('herramientas.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'herramientas.xlsx'){
        return redirect()->route('herramientas.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new herramientasImport,$file);
     return redirect()->route('herramientas.index')->with('message','Los datos se importaron correctamente');
    }

    public function vaciar(){
        Herramienta::where('id','<>',0)->delete();
        return redirect()->route('herramientas.index')->with('message','Los datos se eliminaron correctamente');
    }

}
