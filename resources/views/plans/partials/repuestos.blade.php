<p>
<a class="btn btn-primary d-block" data-toggle="collapse" href="#collapseRepuestos{{$t->id}}" role="button" aria-expanded="false" aria-controls="collapseRepuestos">
      repuestos
    </a>
   </p>
<div class="collapse" id="collapseRepuestos{{$t->id}}">
    <div class="card card-body">
        <ul class="list-group listado">
        @foreach ($t->costos->where('costo_tipo','=','repuestos') as $item)
        <li class="list-group-item">{{$item->cantidad.'.- '.$item->name.' total: '.numerico($item->total)}}</li>
        @endforeach
        </ul>

    </div>
  </div>
