<?php

namespace App\Http\Controllers\User;

use App\Insumo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InsumosImport;


class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $insumos=Insumo::orderBy('name','asc')->get();
       return view('insumos.index',compact('insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $insumo= new Insumo;
       $btn="save";
       return view('insumos.create',compact('insumo','btn'));

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
            'name' => 'required|unique:insumos,name',
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
            $insumo=Insumo::create([
                'name'=>$request->name,
                'precio'=>$precio,
                 'existencia'=>$existencia,
                 'unidad'=>$request->unidad,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);

            return redirect()->route('insumos.index')->with('message','Insumo '.$insumo->name.' fue cfreado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
       $btn='modify';
        return view('insumos.edit',compact('insumo','btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        if(PUNTO_DECIMAL==','){$regex='regex:/^\d*(\,\d{2})?$/';}else{'regex:/^\d*(\.\d{2})?$/';}
        $this->validate($request, [
            'name' => 'required|unique:insumos,name,'.$insumo->id,
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
            $insumo->update([
                'name'=>$request->name,
                'precio'=>$precio,
                 'existencia'=>$existencia,
                 'unidad'=>$request->unidad,
                 'description'=>$request->description,
                 'slug'=>$slug,
            ]);

            return redirect()->route('insumos.index')->with('message','Insumo '.$insumo->name.' fue actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
      $insumo->delete();
      return redirect()->route('insumos.index')->with('message','Insumo '.$insumo->name.' fue eliminado correctamente');

    }

    public function formImportExcel(){
        return view('insumos.formImportExcel');
    }

    public function importExcel(Request $request){

      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'insumos.xlsx'){
        return redirect()->route('insumos.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      $collection=Excel::Import(new InsumosImport,$file);
     return redirect()->route('insumos.index')->with('message','Los datos se importaron correctamente');
    }

    public function vaciar(){
        Insumo::where('id','<>',0)->delete();
        return redirect()->route('insumos.index')->with('message','Los datos se eliminaron correctamente');
    }


}
