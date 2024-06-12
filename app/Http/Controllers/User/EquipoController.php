<?php

namespace App\Http\Controllers\User;

use App\Caracteristica;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EntidadStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EquiposImport;
use App\Imports\GeneralImport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Equipo;
use App\Entidad;
use App\Sistema;
use App\Subsistema;
use App\Tipo;
use App\Tipoc;
use App\Parametro;
use App\Image;
use App\Zona;
use Yajra\DataTables\Contracts\DataTable;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $equipos = Equipo::where('zona_id','=',auth()->user()->zona_id)->orderBy('name','asc')
                      ->get();
       $title = "equipos";
       return view('equipos.index', compact('equipos', 'title'));
    }

    public function indexNew()
    {
       return view('equipos.indexNew');
    }

    public function indexNewSource(){
        $equipos = Equipo::where('zona_id','=',auth()->user()->zona_id)->orderBy('name','asc');
        return datatables()->eloquent($equipos)
         ->addColumn('btn', 'equipos.actions')
         ->rawColumns(['btn'])
        ->toJson();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo= new Equipo;
        $sistemas=Sistema::orderBy('name','asc')->get(['id','name']);
        $tipos=Tipo::orderby('name')->get();
        $zonas=Zona::orderby('name')->get();
        $zona_id=0;
        $title="equipo";
        $tipoN="";
        $sistema_id=0;
        $btn="save";
        return view('equipos.create',compact('equipo','sistemas','sistema_id','title','tipoN','btn','tipos','zonas','zona_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntidadStoreRequest $request)
    {
         $sistema=Sistema::find($request->sistema_id);
         $subsistema=Subsistema::find($request->subsistema_id);
         $tipo=Tipo::find($request->tipo);
         $zona=Zona::find($request->zona_id);
         $equipo=Equipo::create([
              "name"=>$request->name,
              "description"=>$request->description,
              "sistema"=>$sistema->name,
              "subsistema"=>$subsistema->name,
              "sistema_id"=>$request->sistema_id,
              "subsistema_id"=>$request->subsistema_id,
              "validador"=>$subsistema->id.'-'.$subsistema->name,
              "tipo"=>$tipo->name,
              "tipo_id"=>$tipo->id,
              "slug"=>Str::slug($request->name),
              "ubicacion"=>$zona->name,
              "servicio"=>$request->servicio,
              "zona_id"=>$zona->id,
          ]);
          if($request->has('ruta')){
            return redirect()->route('subsistemas.index')->with('message','El Equipo '.$equipo->name. ' fue creado exitósamente');
          }
           return redirect()->route('equipos.index')->with('message','El Equipo '.$equipo->name. ' fue creado exitósamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        $sistemas=Sistema::orderBy('name','asc')->get();
        //$subsistemas=Subsistema::orderBy('name','asc')->get(['id','name']);
        $tipos=Tipo::orderBy('name')->get();
        $title="equipo";
        $tipoN=$equipo->tipo;
        $sistemaId=old('sistema_id',$equipo->sistema_id);
        //dd($sistemaId);
        if('sistemaId'){
           $sistema=Sistema::find($sistemaId);
           $subsistemas=$sistema->subsistemas;
        }else{
            $subsistemas=collect();
        }
        $zonas=Zona::orderby('name')->get();
        $zona_id=$equipo->zona_id;
        $btn="modify";

        return view('equipos.edit',compact('equipo','sistemas','subsistemas','title','tipoN','btn','tipos','zonas','zona_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(EntidadStoreRequest $request, Equipo $equipo)
    {
        $sistema=Sistema::find($request->sistema_id);
        $subsistema=Subsistema::find($request->subsistema_id);
        $zona=Zona::find($request->zona_id);
        $tipo=Tipo::find($request->tipo);
        $equipo->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "sistema"=>$sistema->name,
            "subsistema"=>$subsistema->name,
            "sistema_id"=>$request->sistema_id,
            "subsistema_id"=>$request->subsistema_id,
            "validador"=>$subsistema->id.'-'.$subsistema->name,
            "tipo"=>$tipo->name,
            "tipo_id"=>$tipo->id,
            "slug"=>Str::slug($request->name),
            "ubicacion"=>$zona->name,
            "servicio"=>$request->servicio,
            "zona_id"=>$zona->id,

        ]);
        $equipo->save();
        return redirect()->route('equipos.index')->with('message','El Equipo '.$equipo->name. ' fue Actualizado exitósamente');
    }


    public function destroy(Equipo $equipo)
    {
        $images=Image::where('imageable_id','=',$equipo->id);
        $images->delete();
        $equipo->delete();
        return redirect()->route('equipos.index')->with('message','El Equipo '.$equipo->name. ' fue Eliminado exitósamente');

    }

    public function getSubsistemas($id){
        return Subsistema::where('sistema_id',$id)->get(['id','name','sistema']);
      }


      public function createNew(Sistema $sistema, Subsistema $subsistema)
    {
        $equipo= new Equipo;
        $tipos=Tipo::orderby('name')->get();
        $title="equipo";
        $tipoN="";
        $btn="save";
        $zonas=Zona::orderby('name')->get();
        $zona_id=$equipo->zona_id;
        return view('equipos.createNew',compact('equipo','sistema','subsistema','title','tipoN','btn','tipos','zonas','zona_id'));
    }

    public function formImportExcel(){
        $subsistemas=Subsistema::orderBy('name','asc')->get();
        $tipos=Tipo::orderBy('name','asc')->get();
        return view('equipos.formImportExcel',compact('subsistemas','tipos'));
    }

    public function importExcel(Request $request){
      $file=$request->file('file');
      if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
      $filename =$file->getClientOriginalName();
      if($filename<>'equipos.xlsx'){
        return redirect()->route('equipos.formImportExcel')->with('message','El archivo de importación es incorrecto');
    }
      Excel::Import(new EquiposImport,$file);
      return redirect()->route('equipos.index')->with('message','Los datos se importaron correctamente');
    }


    public function vaciar(){
        Equipo::where('id','<>',0)->delete();
        return redirect()->route('equipos.index')->with('message','Los datos se eliminaron correctamente');
    }

    public function formImportExcelAll(){
        return view('equipos.formImportExcelAll');
    }

    public function importExcelAll(Request $request){
        $file=$request->file('file');
        if(!$file){return redirect()->back()->with('message','debe seleccionar archivo excel');}
        $filename =$file->getClientOriginalName();
        if($filename<>'general.xlsx'){
            return redirect()->route('equipos.formImportExcelAll')->with('message','El archivo de importación es incorrecto');
        }
        Excel::Import(new GeneralImport,$file);
        return redirect()->route('equipos.index')->with('message','Los datos se importaron correctamente');
      }


    public function assign(Equipo $equipo, Request $request){
        $a = $request->get('search');
        $parametros=Parametro::orderBy('name','asc')
        ->orWhere('name', 'like', '%' . $a . '%')
        ->paginate(7);
               $generales=Tipoc::where('tipo_id','=',$equipo->tipo_id)->get();
        $assigns=$equipo->caracteristicas;
        return view('equipos.assign',compact('equipo','assigns','parametros','generales'));
    }

    public function assignTipo($id, $jd){
       $equipo=Equipo::find($id);
       //dd($equipo->caracteristicas);
       $caracteristicasGenerales=Tipoc::where('tipo_id','=',$jd)->get('id');

       foreach ($caracteristicasGenerales as $c) {
           $equipo->caracteristicas->sync($c->id);
       }
       //dd($equipo,$caracteristicasGenerales);
    }







}
