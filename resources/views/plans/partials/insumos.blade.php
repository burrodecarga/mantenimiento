<p>
<a class="btn btn-primary d-block" data-toggle="collapse" href="#collapseInsumos{{$t->id}}" role="button" aria-expanded="false" aria-controls="collapseInsumos">
      insumos
    </a>
   </p>
<div class="collapse" id="collapseInsumos{{$t->id}}">
    <div class="card card-body">
        <ul class="list-group listado">
        @foreach ($t->costos->where('costo_tipo','=','insumos') as $item)
        <li class="list-group-item">{{$item->cantidad.'.- '.$item->name.' total: '.numerico($item->total)}}</li>
        @endforeach
        </ul>

    </div>
  </div>
