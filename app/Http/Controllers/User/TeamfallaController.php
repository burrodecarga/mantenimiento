<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\Falla;
use App\Repuesto;
use App\Servicio;
use App\Insumo;
use App\Recurso;
use App\Image;
use Carbon\Carbon;
use App\Herramienta;
use Illuminate\Support\Facades\Storage;

class TeamfallaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $zona_id=Auth::user()->zona_id;
        if ($zona_id == 1 OR $zona_id==NULL) return redirect()->route('home')->with('status', 'No está asignado a ninguna zona de trabajo...Verifique');
        $team = $user->teams->first();
        if (is_null($team) or $team->count() == 0) return redirect()->route('home')->with('status', 'No está asignado a ningún equipo de trabajo');
        if($zona_id==2){$fallas = $team->fallas->where('condicion', '<>', 'despejada');}else{
            $fallas = $team->fallas->where('condicion', '<>', 'despejada')
                                   ->where('zona_id','=',$zona_id);
        }

        if ($fallas->isEmpty()) return redirect()->route('home')->with('status', 'No tiene asignada ningún tarea de Mantenimiento');
        if($user->area=='tecnica'){
            return view('teamfallas.tecnico', compact('team', 'fallas'));
        }else{
            return view('teamfallas.index', compact('team', 'fallas'));
        }
}


    public function report(Falla $falla)
    {
        $user = Auth::user();
        $team = $user->teams->first();
        $repuestos = $falla->recursos->where('tipo', '=', 'repuestos');
        $servicios = $falla->recursos->where('tipo', '=', 'servicios');
        $insumos = $falla->recursos->where('tipo', '=', 'insumos');
        $imagenes = $falla->images;
        if($user->area=='tecnica'){
            return view('teamfallas.tecnico-report', compact('falla', 'user', 'team', 'repuestos', 'insumos', 'servicios', 'imagenes'));

        }else{
            return view('teamfallas.report', compact('falla', 'user', 'team', 'repuestos', 'insumos', 'servicios', 'imagenes'));

        }
    }

    public function set(Falla $falla, $set)
    {
        $user = Auth::user();
        $condicion = condicion();
        $falla->fill(['condicion' => $condicion[$set]]);
        $falla->save();
        return redirect()->route('teamfallas.index');
    }

    public function recursos($falla_id, $t)
    {
        $user = Auth::user();
        $falla = Falla::find($falla_id);
        if ($t == 1) {
            $tabla = "repuestos";
            $recursos = Repuesto::where('existencia', '<>', 0)->orderBy('name', 'asc')->get();
        }
        if ($t == 3) {
            $tabla = "servicios";
            $recursos = Servicio::orderBy('name', 'asc')->get();
        }
        if ($t == 2) {
            $tabla = "insumos";
            $recursos = Insumo::where('existencia', '<>', 0)->orderBy('name', 'asc')->get();
        }
        $assigns = $falla->recursos->where('tipo', '=', $tabla);
        if($user->area=='tecnica'){
            return view('teamfallas.tecnico-recursos', compact('falla', 'user', 'recursos', 't', 'assigns'));
        }else{
            return view('teamfallas.recursos', compact('falla', 'user', 'recursos', 't', 'assigns'));

        }
    }

    public function asignar($falla_id, $recurso_id, $t)
    {

        if ($t == 1) {
            $tabla = "repuestos";
            $recurso = Repuesto::find($recurso_id);
        }
         if ($t == 2) {
            $tabla = "insumos";
            $recurso = Insumo::find($recurso_id);
        }

        if ($t == 3) {
            $tabla = "servicios";
            $recurso = Servicio::find($recurso_id);
        }
     if (($t == 1 or $t == 2) && ($recurso->existencia <> 0)) {
            $existencia = $recurso->existencia - 1;
            $recurso->fill(['existencia' => $existencia])->save();
        }
        $asignado = Recurso::where('falla_id', '=', $falla_id)
            ->where('tipo_id', '=', $recurso_id)
            ->where('tipo', '=', $tabla)
            ->first();
        if (is_null($asignado)) {
            $nuevo = Recurso::create([
                'name' => $recurso->name,
                'slug' => Str::slug($recurso->name),
                'precio' => $recurso->precio,
                'cantidad' => 1,
                'total' => $recurso->precio,
                'tipo' => $tabla,
                'tipo_id' => $recurso_id,
                'falla_id' => $falla_id,
            ]);
        } else {
            $precio = $asignado->precio;
            $cantidad = $asignado->cantidad + 1;
            $total = $cantidad * $precio;
            $asignado->fill([
                'precio' => $precio,
                'cantidad' => $cantidad,
                'total' => $total,
            ])->save();
        };
        return redirect()->route('teamfallas.recursos', [$falla_id, $t]);
    }

    public function noasignar(Recurso $recurso)
    {

        if ($recurso->tipo == 'repuestos') {
            $t = 1;
            $tabla = Repuesto::find($recurso->tipo_id);
        }
        if ($recurso->tipo == 'servicios') {
            $t = 3;
            Servicio::find($recurso->tipo_id);
        }
        if ($recurso->tipo == 'insumos') {
            $t = 2;
            $tabla = Insumo::find($recurso->tipo_id);
        }
        $existencia = $recurso->cantidad + $tabla->existencia;
        $tabla->fill(['existencia' => $existencia])->save();
        $recurso->delete();
        return redirect()->route('teamfallas.recursos', [$recurso->falla_id, $t]);
    }

    public function imagenStore(Request $request, Falla $falla)
    {
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        if ($request->file('file')) {
            $path = Storage::disk('fallas')->put('fallas', $request->file('file'));
            if ($request->body == null) {
                $body = "Sin Comentarios";
            } else {
                $body = $request->body;
            }
            $falla->images()->create(['url' => $path, 'body' => $body]);
            return redirect()->route('teamfallas.report', $falla->id)->with('message', 'imagen de fallal ' . $falla->name . ' almacenada correctamente');
        }
    }

    public function delete_imagen($falla_id, $id)
    {
        $imagen = Image::find($id);
        $path = Storage::disk('fallas')->delete('fallas', $imagen->url);
        $imagen->delete();
        return redirect()->route('teamfallas.report', $falla_id)->with('message', 'imagen de falla eliminada correctamente');
    }

    public function resumen(Falla $falla)
    {
        if (mb_strtolower($falla->falla) == 'no diagnosticada' or empty($falla->falla)) {
            return redirect()->back()->with('message', 'Debe diagnosticar la falla para despejarla');
        }
        $fechaActual = date('Y-m-d');
        $datetime1=new Carbon($falla->reportada_fecha);
        $datetime2=new Carbon($fechaActual);
        $dias=$datetime1->diffInDays($datetime2);
        $repuestos = $falla->recursos->where('tipo', '=', 'repuestos');
        $servicios = $falla->recursos->where('tipo', '=', 'servicios');
        $insumos = $falla->recursos->where('tipo', '=', 'insumos');
        $costo_repuestos = 0;
        $costo_insumos = 0;
        $costo_servicios = 0;
        $costo_falla = 0;
        $recursos = $falla->recursos;
        $imagenes = $falla->images;
        foreach ($recursos as $r) {
            if ($r->tipo == 'repuestos') {
                $costo_repuestos = $costo_repuestos + $r->total;
            }
            if ($r->tipo == 'insumos') {
                $costo_insumos = $costo_insumos + $r->total;
            }
            if ($r->tipo == 'servicios') {
                $costo_servicios = $costo_servicios + $r->total;
            }
            $costo_falla = $costo_falla + $r->total;
        }

        return view('teamfallas.resumen', compact('falla', 'dias', 'repuestos', 'insumos', 'servicios', 'costo_repuestos', 'costo_insumos', 'costo_servicios', 'costo_falla', 'imagenes'));
    }

    public function update(Request $request, Falla $falla)
    {
        if (mb_strtolower($request->falla) == 'no diagnosticada' or empty($request->falla)) {
            return redirect()->back()->with('message', 'Debe diagnosticar la falla para despejarla');
        }
        $rules = ['falla' => 'required',];
        $this->validate($request, $rules);
        $team = $request->team;
        $integrantes = $request->team_integrantes;
       $costo = $request->team_costo;
        $reparadores = $request->team_reparadores;
        $costo = ($reparadores / $integrantes) * $costo;
        $falla->fill([
            'falla' => $request->falla,
            'detalles' => $request->detalles,
            'team_integrantes' => $integrantes,
            'team_reparadores' => $reparadores,
            'team_costo' => $costo,
            'team'=>$request->team,
            'team_id'=>$request->team_id,
            'despejada_name'=>$request->despejada_name,
            'despejada_id'=>$request->despejada_id,
        ])->save();
        return redirect()->route('teamfallas.report', $falla->id)->with('message', 'datos de falla salvados correctamente');
    }

    public function confirmar(Falla $falla)
    {
        if($falla->team_integrantes==null OR $falla->team_reparadores==null OR $falla->team_id==null){
            return redirect()->back()->with('message','Detalles de la falla no se han guardado..');
        }
        $fechaActual = date('Y-m-d');
        $datetime1=new Carbon($falla->reportada_fecha);
        $datetime2=new Carbon($fechaActual);
        $dias=$datetime1->diffInDays($datetime2);
        $repuestos = $falla->recursos->where('tipo', '=', 'repuestos');
        $servicios = $falla->recursos->where('tipo', '=', 'servicios');
        $insumos = $falla->recursos->where('tipo', '=', 'insumos');
        $costo_repuestos = 0;
        $costo_insumos = 0;
        $costo_servicios = 0;
        $costo_falla = 0;
        $recursos = $falla->recursos;
        $imagenes = $falla->images;
        foreach ($recursos as $r) {
            if ($r->tipo == 'repuestos') {
                $costo_repuestos = $costo_repuestos + $r->total;
            }
            if ($r->tipo == 'insumos') {
                $costo_insumos = $costo_insumos + $r->total;
            }
            if ($r->tipo == 'servicios') {
                $costo_servicios = $costo_servicios + $r->total;
            }
            $costo_falla = $costo_falla + $r->total;
        }
$falla->fill([
            'condicion' => 'despejada',
            'depejada_name' => auth::user()->name,
            'depejada_id' => auth::user()->id,
            'falla_duracion' => $dias,
        ])->save();
    return redirect()->route('teamfallas.index');
    }

    public function edit_recurso($id)
    {
        $recurso = Recurso::find($id);
        $btn = 'modify';
        return view('teamfallas.edit_recurso', compact('recurso', 'btn'));
    }

    public function modifica_recurso(Request $request, $id)
    {
        $rules = ['precio' => 'required', 'cantidad' => 'required'];
        $this->validate($request, $rules);
        $recurso = Recurso::find($id);
        if ($recurso->tipo == 'repuestos') {
            $data = Repuesto::find($recurso->tipo_id);
            $set = 1;
            $existencia=$data->existencia+$recurso->cantidad;

        }
        if ($recurso->tipo == 'insumos') {
            $data = Insumo::find($recurso->tipo_id);
            $set = 2;
            $existencia=$data->existencia+$recurso->cantidad;
        }
        if ($recurso->tipo == 'servicios') {
            $data = Servicio::find($recurso->tipo_id);
            $set = 3;
            $existencia=5000000;
        }
         //dd($existencia,$request->cantidad);
        if ($existencia <= $request->cantidad) {
                $cantidad = $request->cantidad;
                $existencia = 0;
            } else {
                $cantidad = $request->cantidad;
                $existencia = $existencia - $request->cantidad;
            }

            $total = $cantidad * $request->precio;
            $recurso->update([
                'cantidad' => $cantidad,
                'precio' => $request->precio,
                'total' => $total,
            ]);

        if ($recurso->tipo == 'repuestos' or $recurso->tipo == 'insumos') {
            $data->update([
                'precio' => $request->precio,
                'existencia'=>$existencia,
            ]);
        } else {

            $data->update([
                'precio' => $request->precio
            ]);
        }
        return redirect()->route('teamfallas.recursos', [$recurso->falla_id, $set]);
    }

public function asignarRecurso(Request $request,$id){
    if($request->ajax()){
       $ok=$this->asignarAjax($request->falla,$request->recurso,$request->t);
        return $ok;
    }

}

public function asignarAjax($falla_id, $recurso_id, $t)
    {
      if ($t == 1) {
            $tabla = "repuestos";
            $recurso = Repuesto::find($recurso_id);
        }
         if ($t == 2) {
            $tabla = "insumos";
            $recurso = Insumo::find($recurso_id);
        }

        if ($t == 3) {
            $tabla = "servicios";
            $recurso = Servicio::find($recurso_id);
        }
     if (($t == 1 or $t == 2) && ($recurso->existencia <> 0)) {
            $existencia = $recurso->existencia - 1;
            $recurso->fill(['existencia' => $existencia])->save();
        }
        $asignado = Recurso::where('falla_id', '=', $falla_id)
            ->where('tipo_id', '=', $recurso_id)
            ->where('tipo', '=', $tabla)
            ->first();
        if (is_null($asignado)) {
            $nuevo = Recurso::create([
                'name' => $recurso->name,
                'slug' => Str::slug($recurso->name),
                'precio' => $recurso->precio,
                'cantidad' => 1,
                'total' => $recurso->precio,
                'tipo' => $tabla,
                'tipo_id' => $recurso_id,
                'falla_id' => $falla_id,
            ]);
        } else {
            $precio = $asignado->precio;
            $cantidad = $asignado->cantidad + 1;
            $total = $cantidad * $precio;
            $asignado->fill([
                'precio' => $precio,
                'cantidad' => $cantidad,
                'total' => $total,
            ])->save();
        };
        return response()->json([
            'id'=>$asignado->id,
            'name'=>$asignado->name,
            'cantidad'=>$asignado->cantidad,
            'tabla'=>$tabla
        ]);
    }

  public function allRecursos(Falla $falla){
      $repuestos=Repuesto::orderBy('name','asc')->get();
      $insumos=Insumo::orderBy('name','asc')->get();
      $servicios=Servicio::orderBy('name','asc')->get();
      $herramientas=Herramienta::orderBy('name','asc')->get();
      $herramientas_id=$falla->recursos->where('tipo','=','herramientas')->pluck('tipo_id');
      $insumos_id=$falla->recursos->where('tipo','=','insumos')->pluck('tipo_id');
      $servicios_id=$falla->recursos->where('tipo','=','servicios')->pluck('tipo_id');
      $repuestos_id=$falla->recursos->where('tipo','=','repuestos')->pluck('tipo_id');
      //dd($repuestos_id);
     return view('teamfallas.tecnico-all-recursos',compact('repuestos','insumos','servicios','herramientas','repuestos_id','insumos_id','servicios_id','herramientas_id','falla'));
     }

  public function storeAllRecursos(Request $request, Falla $falla){
    $retornar=$falla->recursos;
    foreach($retornar as $r){
        $this->reintegrar($r->tipo,$r->tipo_id,$r->cantidad);
    }

    DB::table('recursos')->where('falla_id', '=', $falla->id)->delete();

        if($request->repuestos<>null){
            foreach($request->repuestos as $r){
            $repuesto=Repuesto::find($r);
            if($repuesto->existencia>0){
               $recurso=Recurso::updateOrCreate([
                'tipo'=>'repuestos',
                'tipo_id'=>$repuesto->id,
                'falla_id'=>$falla->id,
            ],[
                'name'=>$repuesto->name,
                'slug'=>$repuesto->slug,
                'precio'=>$repuesto->precio,
                'cantidad'=>1,
                'total'=>$repuesto->precio,
            ]);
            $existencia=$repuesto->existencia-1;
            $repuesto->fill(['existencia'=>$existencia]);
            $repuesto->save();
            }
        }
        }

        if($request->insumos<>null){
            foreach($request->insumos as $r){
            $insumo=Insumo::find($r);
            if($insumo->existencia>0){
            $recurso=Recurso::updateOrCreate([
                'tipo'=>'insumos',
                'tipo_id'=>$insumo->id,
                'falla_id'=>$falla->id,
            ],[
                'name'=>$insumo->name,
                'slug'=>$insumo->slug,
                'precio'=>$insumo->precio,
                'cantidad'=>1,
                'total'=>$insumo->precio,
            ]);
            $existencia=$insumo->existencia-1;
            $insumo->fill(['existencia'=>$existencia]);
        }}}

        if($request->servicios<>null){
            foreach($request->servicios as $r){
            $servicio=Servicio::find($r);
                $recurso=Recurso::updateOrCreate([
                'tipo'=>'servicios',
                'tipo_id'=>$servicio->id,
                'falla_id'=>$falla->id,
            ],[
                'name'=>$recurso->name,
                'slug'=>$recurso->slug,
                'precio'=>$recurso->precio,
                'cantidad'=>1,
                'total'=>$recurso->precio,
            ]);
        }}

        if($request->herramientas<>null){
            foreach($request->herramientas as $r){
            $herramienta=Herramienta::find($r);
            if($herramienta->existencia){
            $recurso=Recurso::updateOrCreate([
                'tipo'=>'herramientas',
                'tipo_id'=>$herramienta->id,
                'falla_id'=>$falla->id,
            ],[
                'name'=>$recurso->name,
                'slug'=>$recurso->slug,
                'precio'=>$recurso->precio,
                'cantidad'=>1,
                'total'=>$recurso->precio,
            ]);
        $existencia=$herramienta->existencia-1;
        $herramienta->fill(['existencia'=>$existencia]);
        $herramienta->save();
      }} }

     return redirect()->route('teamfallas.report',$falla->id)->with('message','Se registraron los gastos de falla');
    }

    public function reintegrar($t,$recurso_id,$cantidad){

        if ($t == 'herramientas') {
            $tabla = "herramientas";
            $recurso = Repuesto::find($recurso_id);
        }
        if ($t == 'repuestos') {
            $tabla = "repuestos";
            $recurso = Repuesto::find($recurso_id);
        }
         if ($t == 'insumos') {
            $tabla = "insumos";
            $recurso = Insumo::find($recurso_id);
        }

        if ($t == 'servicios') {
            $tabla = "servicios";
            $recurso = Servicio::find($recurso_id);
        }
     if ($t == 'repuestos' or $t == 'insumos' or $t=='herramientas') {
           $existencia = $recurso->existencia+$cantidad;
            $recurso->fill(['existencia' => $existencia])->save();
        }
    }
}
