<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
use App\Equipo;
use App\Tipo;
use App\Planequipo;
use App\Protocolo;
use App\Feriado;
use Illuminate\Support\Carbon;
use App\Rules\Arrayint;
use App\Task;
use App\Team;
use App\Herramienta;
use App\Insumo;
use App\Repuesto;
use App\Servicio;
use App\Costo;
use App\Calendario;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('created_at', 'asc')->paginate(1);
        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        $plan = new Plan;
        $btn = "save";
        return view('plans.create', compact('plan', 'btn'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'fecha_inicio' => 'required',
            'hora_inicio' => 'required',
            'fecha_inicio' => 'required',
            'turnos_laborables' => 'numeric|required|min:1|max:3',
            'jornada_semanal' => 'numeric|required|min:8|max:56',
            'jornada_diaria' => 'numeric|required|min:8|max:16',
            'laborar_feriado' => 'numeric|required|min:0|max:1',
            'laborar_sobretiempo' => 'numeric|required|min:0|max:1',
            'horas_descanso' => 'numeric|required|min:30|max:120',
            'hora_descanso' => 'required',
        ];
        $this->validate($request, $rules);
        $hora_inicio = (new Carbon($request->hora_inicio))->format('g:i A');
        $plan = Plan::create([
            'name' => $request->name,
            'fecha_inicio' => $request->fecha_inicio,
            'hora_inicio' => $request->hora_inicio,
            'turnos_laborables' => $request->turnos_laborables,
            'jornada_semanal' => $request->jornada_semanal,
            'jornada_diaria' => $request->jornada_diaria,
            'laborar_feriado' => $request->laborar_feriado,
            'laborar_sobretiempo' => $request->laborar_sobretiempo,
            'horas_descanso' => $request->horas_descanso,
            'hora_descanso' => $request->hora_descanso,
        ]);
        return redirect()->route('plans.index')->with('message', 'El plan fue creado correctamente');
    }

    public function edit(Plan $plan)
    {
        $btn = "save";
        return view('plans.edit', compact('plan', 'btn'));
    }

    public function update(Request $request, Plan $plan)
    {
        $rules = [
            'name' => 'required',
            'fecha_inicio' => 'required',
            'hora_inicio' => 'required',
            'fecha_inicio' => 'required',
            'turnos_laborables' => 'numeric|required|min:1|max:3',
            'jornada_semanal' => 'numeric|required|min:8|max:56',
            'jornada_diaria' => 'numeric|required|min:8|max:16',
            'laborar_feriado' => 'numeric|required|min:0|max:1',
            'laborar_sobretiempo' => 'numeric|required|min:0|max:1',
            'horas_descanso' => 'numeric|required|min:30|max:120',
            'hora_descanso' => 'required',
        ];
        $this->validate($request, $rules);
        $hora_inicio = (new Carbon($request->hora_inicio))->format('g:i A');
        $plan->update([
            'name' => $request->name,
            'fecha_inicio' => $request->fecha_inicio,
            'hora_inicio' => $request->hora_inicio,
            'turnos_laborables' => $request->turnos_laborables,
            'jornada_semanal' => $request->jornada_semanal,
            'jornada_diaria' => $request->jornada_diaria,
            'laborar_feriado' => $request->laborar_feriado,
            'laborar_sobretiempo' => $request->laborar_sobretiempo,
            'horas_descanso' => $request->horas_descanso,
            'hora_descanso' => $request->hora_descanso,
        ]);
        return redirect()->route('plans.index')->with('message', 'El plan fue actualizado correctamente');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('message', 'El plan fue Eliminado correctamente');
    }

    public function add(Plan $plan)
    {
        $equipos = Equipo::orderBy('zona_id', 'asc')
            ->orderBy('name', 'asc')->get();
        $equipos_id = $plan->equipos->pluck('id')->toArray();
        return view('plans.add', compact('plan', 'equipos', 'equipos_id'));
    }

    public function addStore(Request $request)
    {
        $request->validate([
            'id' => 'required|Integer',
            'equipos_id' => ['required', new Arrayint],
        ]);
        $plan = Plan::find($request->id);
        $plan->equipos()->sync($request->equipos_id);
        return redirect()->route('plans.index')->with('message', 'Los equipos fueron adjuntados al plan de mantenimiento');
    }

    public function creaTarea(Plan $plan)
    {
        $tareas = $plan->tasks;
        foreach ($tareas as $d) {
            $d->delete();
        }
        $equipos = $plan->equipos;
        if ($equipos->isEmpty()) {
            return redirect()->route('plans.index')->with('message', 'No tiene equipos registrados');
        }
        foreach ($equipos as $equipo) {
            $i = 1;
            $tipo_id = $equipo->tipo_id;
            $tipo = Tipo::find($tipo_id);
            if (is_null($tipo)) {
                return redirect()->route('plans.index')->with('message', 'El equipo No tiene clasificación');
            }
            $protocolos = $tipo->protocolos;
            foreach ($protocolos as $protocolo) {
                $fechaInicio = (new Carbon($plan->fecha_inicio . ' ' . $plan->hora_inicio));
                $fecha_inicio = $hora_inicio = $fechaInicio->format('Y-m-d');
                $hora_inicio = $fechaInicio->format('g:i:s');
                $hora_fin = $fechaInicio->addHours($protocolo->duracion)->format('g:i:s');
                $fecha_fin = $fechaInicio->addHours($protocolo->duracion)->format('Y-m-d');
                $periocidad=periocidad($protocolo->frecuencia);
                 Task::create([
                    'plan_id' => $plan->id,
                    'plan' => $plan->name,
                    'equipo_id' => $equipo->id,
                    'tipo_id' => $equipo->tipo_id,
                    'team_id' => 0,
                    'responsable_id' => 0,
                    'tarea_posicion' => $i,
                    'tarea_restriccion' => 0,
                    'equipo_text' => $equipo->name,
                    'zona_id' => $equipo->zona_id,
                    'zona' => $equipo->zona->name,
                    'tipo' => $equipo->tipo,
                    'team' => 'N/A',
                    'responsable' => 'N/A',
                    'tarea_tipo' => $protocolo->tarea_tipo,
                    'tarea' => $protocolo->tarea,
                    'detalles' => $protocolo->description,
                    'protocolo' => $protocolo->protocolo,
                    'especialidad' => $protocolo->especialidad,
                    'frecuencia' => $protocolo->frecuencia,
                    'periocidad'=>$periocidad,
                    'permisos' => $protocolo->permisos,
                    'seguridad' => $protocolo->seguridad,
                    'condiciones' => $protocolo->condiciones,
                    'duracion' => $protocolo->duracion,
                    'fecha_inicio' => $fecha_inicio,
                    'hora_inicio' => $hora_inicio,
                    'fecha_fin' => $fecha_fin,
                    'hora_fin' => $hora_fin,
                ]);
                $i = $i + 1;
            }
        }
        return redirect()->route('plans.index')->with('message', 'Los protocolos fueron adjuntados al plan de mantenimiento');
    }

    public function ajustes(Plan $plan)
    {
        $diario = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 1)->get();
        $semanal = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 7)->get();
        $quincenal = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 15)->get();
        $mensual = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 30)->get();
        $bimensual = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 60)->get();
        $trimestral = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 90)->get();
        $cuatrimestral = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 120)->get();
        $semestral = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 180)->get();
        $anual = Task::orderBy('equipo_text', 'asc')->where('plan_id', $plan->id)->where('frecuencia', 360)->get();
        return view('plans.ajustes', compact('plan', 'diario', 'semanal', 'quincenal', 'mensual', 'bimensual', 'trimestral', 'cuatrimestral', 'semestral', 'anual'));
    }

    public function mdf(Request $request)
    {
        $rules = [
            'pos_' => 'required|Integer|min:1',
            'res_' => 'required|Integer|min:0',
        ];
        $this->validate($request, $rules);
        $task = Task::find($request->id);
        $task->update([
            'tarea_posicion' => $request->pos_,
            'tarea_restriccion' => $request->res_
        ]);
        $task->save();
        return redirect()->back();
    }

    public function definicion(Plan $plan, Equipo $equipo)
    {
        $tasks = $equipo->tareas_de_equipo;
        return view('plans.definicion', compact('plan', 'equipo', 'tasks'));
    }

    public function team(Task $task)
    {
        $teams = Team::all();
        $plan = Plan::find($task->plan_id);
        $btn = "modify";
        return view('plans.team', compact('plan', 'task', 'teams', 'btn'));
    }

    public function operativo(Request $request, Task $task)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'hora_inicio' => ['required'],
            'team_id' => 'required|Integer',
        ]);
        $fechaInicio = (new Carbon($request->fecha_inicio . ' ' . $request->hora_inicio));
        $fecha_inicio = $hora_inicio = $fechaInicio->format('Y-m-d');
        $hora_inicio = $fechaInicio->format('g:i:s');
        $team = Team::find($request->team_id);
        $task->update([
            'fecha_inicio' => $fecha_inicio,
            'hora_inicio' => $hora_inicio,
            'team_id' => $team->id,
            'responsable_id' => $team->responable_id,
            'team' => $team->name,
            "responsable" => $team->responsable,
        ]);
        $task->save();
        $plan = Plan::find($task->plan_id);
        $equipo = Equipo::find($task->equipo_id);
        return redirect()->route('plans.definicion', [$task->plan_id, $task->equipo_id]);
    }

    public function recursos(Task $task)
    {
        $recursos = $task->recursos;
        $herramientas = Herramienta::orderBy('name', 'asc')->get();
        $insumos = Insumo::orderBy('name', 'asc')->get();
        $repuestos = Repuesto::orderBy('name', 'asc')->get();
        $servicios = Servicio::orderBy('name', 'asc')->get();
        $teams = Team::all();
        return view('plans.recursos', compact('task', 'recursos', 'herramientas', 'insumos', 'repuestos', 'servicios', 'teams'));
    }

    public function storeAjustes(Request $request)
    {
        $request->validate([
            'equipo_id' => 'required|Integer',
            'plan_id' => 'required|Integer',
            'team_id' => 'required|Integer',
            'task_id' => 'required|Integer',
        ]);

        DB::table('costos')->where('task_id', '=', $request->task_id)->delete();

        $herramientas_id = $request->herramientas;
        $insumos_id = $request->insumos;
        $repuestos_id = $request->repuestos;
        $servicios_id = $request->servicios;
        if ($herramientas_id <> null) {
            foreach ($herramientas_id as $id) {
                $h = Herramienta::find($id);
                $costo = Costo::create([
                    'task_id' => $request->task_id,
                    'costo_id' => $h->id,
                    'costo_tipo' => 'herramientas',
                    'name' => $h->name,
                    'precio' => $h->precio,
                    'cantidad' => 1,
                    'total' => $h->precio,
                ]);
            }
        }

        if ($insumos_id <> null) {
            foreach ($insumos_id as $id) {
                $h = Insumo::find($id);
                $insumo = Costo::create([
                    'task_id' => $request->task_id,
                    'costo_id' => $h->id,
                    'costo_tipo' => 'insumos',
                    'name' => $h->name,
                    'precio' => $h->precio,
                    'cantidad' => 1,
                    'total' => $h->precio,
                ]);
            }
        }


        if ($repuestos_id <> null) {
            foreach ($repuestos_id as $id) {
                $h = Repuesto::find($id);
                $costo = Costo::create([
                    'task_id' => $request->task_id,
                    'costo_id' => $h->id,
                    'costo_tipo' => 'repuestos',
                    'name' => $h->name,
                    'precio' => $h->precio,
                    'cantidad' => 1,
                    'total' => $h->precio,
                ]);
            }
        }

        if ($servicios_id <> null) {
            foreach ($servicios_id as $id) {
                $h = Servicio::find($id);
                $costo = Costo::create([
                    'task_id' => $request->task_id,
                    'costo_id' => $h->id,
                    'costo_tipo' => 'servicios',
                    'name' => $h->name,
                    'precio' => $h->precio,
                    'cantidad' => 1,
                    'total' => $h->precio,
                ]);
            }
        }
        $team = Team::find($request->team_id);
        $task = Task::find($request->task_id);
        $task->update([
            'team' => $team->name,
            'team_id' => $team->id,
            'responsable' => $team->responsable,
            'responsable_id' => $team->responsable_id,
        ]);
        $task->save();
        return redirect()->route('plans.definicion', [$task->plan_id, $task->equipo_id])->with('message', 'Se agregaron ajustes a la tarea');
    }

    public function recursosEdit(Plan $plan, Equipo $equipo, Task $task)
    {
        $costos = $task->costos;
        return view('plans.recursosEdit', compact('plan', 'equipo', 'task', 'costos'));
    }

    public function recursosStore(Request $request, Equipo $equipo)
    {
        $tarea = $request->tarea;
        $task=Task::find($tarea);
        $recursos = collect($request->only(['recursos']));
        foreach ($recursos->pluck('herramientas') as $key => $r) {
            $ids = array_keys($r);
            $values = array_values($r);
            foreach ($ids as $id) {
                $herramienta = Herramienta::find($id);
                $costo = Costo::where('costo_id', '=', $id)
                ->where('costo_tipo', '=', 'herramientas')
                ->where('task_id', '=', $tarea)->first();
                $cantidad = $r[$id];
                //dd($id,$tarea,$costo->cantidad,$herramienta->existencia,$cantidad);
                $existencia = $herramienta->existencia+$costo->cantidad;
                if ($existencia < $cantidad) {
                    $existencia = 0;
                } else {
                    $existencia = $existencia - $cantidad;
                }

                //dd($id,$r[$id]);
                $herramienta->update(['existencia' => $existencia]);
                $herramienta->save();
                $costo->update(['cantidad' => $cantidad]);
                $costo->save();
            }
        }

        foreach ($recursos->pluck('insumos') as $key => $r) {
            $ids = array_keys($r);
            $values = array_values($r);
            foreach ($ids as $id) {
                $insumo = Insumo::find($id);
                $costo = Costo::where('costo_id', '=', $id)
                    ->where('costo_tipo', '=', 'insumos')
                    ->where('task_id', '=', $tarea)->first();
                $cantidad = $r[$id];
                $existencia = $insumo->existencia+$costo->cantidad;
                if ($existencia < $cantidad) {
                    $existencia = 0;
                } else {
                    $existencia = $existencia - $cantidad;
                }
                $insumo->update(['existencia' => $existencia]);
                $insumo->save();
                $costo->update(['cantidad' => $cantidad]);
                $costo->save();
            }
        }

        foreach ($recursos->pluck('repuestos') as $key => $r) {
            $ids = array_keys($r);
            $values = array_values($r);
            foreach ($ids as $id) {
                $repuesto = Repuesto::find($id);
                $costo = Costo::where('costo_id', '=', $id)
                ->where('costo_tipo', '=', 'repuestos')
                ->where('task_id', '=', $tarea)->first();
                $cantidad = $r[$id];
                $existencia = $repuesto->existencia+$costo->cantidad;
                if ($existencia < $cantidad) {
                    $existencia = 0;
                } else {
                    $existencia = $existencia - $cantidad;
                }
                $repuesto->update(['existencia' => $existencia]);
                $repuesto->save();
                $costo->update(['cantidad' => $cantidad]);
                $costo->save();
            }
        }


        foreach ($recursos->pluck('servicios') as $key => $r) {
            $ids = array_keys($r);
            $values = array_values($r);
            foreach ($ids as $id) {
                $servicio = Servicio::find($id);
                $costo = Costo::where('costo_id', '=', $id)
                ->where('costo_tipo', '=', 'servicios')
                ->where('task_id', '=', $tarea)->first();
                $cantidad = $r[$id];
                $existencia = $servicio->existencia+$costo->cantidad;
                if ($existencia < $cantidad) {
                    $existencia = 0;
                } else {
                    $existencia = $existencia - $cantidad;
                }
                $servicio->update(['existencia' => $existencia]);
                $servicio->save();
                $costo->update(['cantidad' => $cantidad]);
                $costo->save();
            }
        }
        return redirect()->route('plans.definicion', [$task->plan_id, $task->equipo_id])->with('message', 'Se agregaron ajustes a la tarea');
    }

    public function calendario(Plan $plan){
        $viejos=Calendario::where('plan_id','=',$plan->id)->get();
        foreach($viejos as $v){
          $v->delete();
        }
        $tareas=Task::where('plan_id','=',$plan->id)
                     ->where('frecuencia','<>',1)->get();
        $totalTareas=$tareas->count();
         //dd($plan->fecha_inicio);
        $fechaInicio=Carbon::parse($plan->fecha_inicio.' '.$plan->hora_inicio);
        $fechaFin=Carbon::parse($plan->fecha_inicio.' '.$plan->hora_inicio);
        $fechaFin->addYears(1);
        foreach($tareas as $t){
            $dias=rand(1,30);
            $fi=new Carbon($t->fecha_inicio.' '.$t->hora_inicio);
            $fi->addDays($dias);
            $ff=new Carbon($t->fecha_inicio.' '.$t->hora_inicio);

            $fecha_fin=$ff;
            $ff->addDays($dias);
            //$ff->addHours($t->duracion);
            $fecha_inicio=Carbon::createFromFormat('Y-m-d h:i:s',$fi)->format('Y-m-d');
            $hora_inicio=Carbon::createFromFormat('Y-m-d h:i:s',$fi)->format('H:i:s');
            $fecha_fin=Carbon::createFromFormat('Y-m-d h:i:s',$ff)->format('Y-m-d');
            $hora_fin=Carbon::createFromFormat('Y-m-d h:i:s',$ff)->format('H:i:s');
            //dd($fi,$ff,$fecha_inicio,$fecha_fin,$hora_inicio,$hora_fin);
            while($fi<=$fechaFin){
                Calendario::create([
                    'plan_id' => $plan->id,
                    'plan' => $plan->name,
                    'task_id' => $t->id,
                    'equipo_id' => $t->equipo_id,
                    'tipo_id' => $t->tipo_id,
                    'team_id' => $t->team_id,
                    'responsable_id' => $t->responsable_id,
                    'tarea_posicion' => $t->tarea_posicion,
                    'tarea_restriccion' => $t->tarea_restriccion,
                    'equipo_text' => $t->equipo_text,
                    'zona_id' => $t->zona_id,
                    'zona' => $t->zona,
                    'tipo' => $t->tipo_id,
                    'team' => $t->team,
                    'responsable' => $t->responsable,
                    'tarea_tipo' => $t->tarea_tipo,
                    'tarea' => $t->tarea,
                    'detalles' => $t->detalles,
                    'protocolo' => $t->protocolo,
                    'especialidad' => $t->especialidad,
                    'frecuencia' => $t->frecuencia,
                    'periocidad'=>periocidad($t->frecuencia),
                    'color'=>color($t->frecuencia),
                    'permisos' => $t->permisos,
                    'seguridad' => $t->seguridad,
                    'condiciones' => $t->condiciones,
                    'duracion' => $t->duracion,
                    'fecha_inicio' => $fecha_inicio,
                    'hora_inicio' => $hora_inicio,
                    'fecha_fin' => $fecha_fin,
                    'hora_fin' => $hora_fin,
                    'title'=>$t->tarea,
                    'start'=>$fi,
                    'end'=>$ff,
                ]);
                $fi->addDays($t->frecuencia);
            }
        }
        return redirect()->route('plans.index')->with('message', 'Se agregaron ajustes a la tarea');

    }
}
