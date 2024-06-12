<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row">
                            <div class="col-12 col-md-6">
                                Plan : <strong>{{$plan->name}}</strong>
                                <hr>
                                fecha de Inicio: {{fecha($plan->fecha_inicio)}}
                                <hr>
                                Inicio de actividades: {{($plan->hora_inicio)}}
                                <hr>
                                Número de turnos laborables: {{($plan->turnos_laborables)}}
                                <hr>
                                Horas de trabajo semanal: {{($plan->jornada_semanal)}} horas/semana
                                <hr>
                                Horas de trabajo diarias: {{($plan->jornada_diaria)}} horas/día
                                <hr>
                                Hora de descanso: {{($plan->hora_descanso)}}
                                <hr>
                                Minutos de Descanso: {{($plan->horas_descanso)}} minutos/día
                                <hr>
                                @if($plan->laborar_sobretiempo) Se laborará Sobretiempo @else Sin labores de
                                Sobretiempo @endif
                                <hr>
                                @if($plan->laborar_feriado) Se laborará en días Feriados @else Sin labores en
                                días Feriados @endif
                                <hr>
                            </div>
                            <div class="col-12 col-md-6">
                            <strong>Equipos asociados al plan:</strong>
                                <hr>

                                @foreach ($plan->equipos->sortBy("tipo") as $p)
                                 <a href="{{route('plans.definicion',[$plan->id,$p->id])}}"  title="Asignación de tareas">
                                <span>
                                   {{$p->name}} {{$p->tipo}}
                                </span>
                                <span class="float-right mr-3" title="Asignación de tareas">
                                     <i class="fas fa-address-book"></i>
                                </span>

                                </a>

                                <hr>
                                @endforeach
                            </div>
                            </div>
                        </div>
