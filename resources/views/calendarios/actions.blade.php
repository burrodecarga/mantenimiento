<div class="btn-group btn-outline-light" role="group" >
<a data-id="{{ $id }}" href="{{route('calendarios.show',$id)}}" title="Ver detalles de la tarea" class="btn btn-outline-info btn-xs show-task" data-toggle="modal" data-target="#taskModal">
              <i class="fa fa-eye" aria-hidden="true"></i>
             </a>

<a data-id="{{ $id }}" data-tarea="{{ $tarea }}"  href="{{route('calendarios.showCostos',$id)}}" title="Ver recursos de la tarea" class="btn btn-outline-success btn-xs show-cost" data-toggle="modal" data-target="#costoModal">
                <i class="fa fa-random" aria-hidden="true"></i>
</a>
</div>
