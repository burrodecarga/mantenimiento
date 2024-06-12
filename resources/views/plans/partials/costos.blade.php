<p>
<a class="btn btn-primary d-block" data-toggle="collapse" href="#collapseCostos{{$t->id}}" role="button" aria-expanded="false" aria-controls="collapseCostos">
      costos
    </a>
   </p>
<div class="collapse" id="collapseCostos{{$t->id}}">
    <div class="card card-body">
        <ul class="list-group listado">
        @foreach ($t->costos as $item)
        <li class="list-group-item">{{$item->cantidad.'.- '.$item->name.' total: '.numerico($item->total)}}</li>
        @endforeach
        </ul>

    </div>
  </div>
