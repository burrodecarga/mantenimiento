@can('equipocaracteristica.show')
<a href="{{route('equipocaracteristica.show',$id)}} " class="btn btn-outline-primary text-capitalize mb-1" data-toggle="tooltip" data-placement="top"
title="{{__('equipment show')}} ">
    <i class="fa fa-list" aria-hidden="true"></i>
</a>
@endcan
@can('equipos.edit')
<a href="{{route('equipos.edit',$id)}}" class="btn btn-outline-success text-capitalize mb-1" data-toggle="tooltip" data-placement="top"
title="{{__('edit record')}} ">
    <i class="fa fa-wrench" aria-hidden="true"></i>
</a>
@endcan

@can('equipos.destroy')
<a class="btn btn-outline-danger text-capitalize mb-1" href="#" onclick="event.preventDefault();
document.getElementById({{$id}}).submit();" data-toggle="tooltip"
data-placement="top" title="{{__('delete record')}} ">
<i class="fa fa-trash" aria-hidden="true"></i>
</a>
<form action="{{route('equipos.destroy',[$id])}} " method="post"  id="{{$id}}">
@csrf
@method('delete')
</form>
@endcan

@can('equipocaracteristica.index')
<a href="{{route('equipocaracteristica.index',$id)}}" class="btn btn-outline-dark text-capitalize my-1" data-toggle="tooltip" data-placement="top"
title="{{__('add details')}} ">
<i class="fa fa-folder-plus" aria-hidden="true"></i>
</a>
@endcan
@can('equipocaracteristica.clone')
<a href="{{route('equipocaracteristica.clone',$id)}}" class="btn btn-outline-info text-capitalize my-1" data-toggle="tooltip" data-placement="top"
title="{{__('clone record')}} ">
    <i class="fa fa-copy" aria-hidden="true"></i>
</a>
@endcan
@can('equipocaracteristica.imagen')
<a href="{{route('equipocaracteristica.imagen',$id)}}" class="btn btn-outline-success text-capitalize my-1" data-toggle="tooltip" data-placement="top"
    title="{{__('add image')}} ">
        <i class="fa fa-image" aria-hidden="true"></i>
</a>
@endcan
