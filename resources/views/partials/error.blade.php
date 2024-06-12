@if($errors->any())
<ul class="list-group">
    @foreach($errors->all() as $error)
     <li class="list-group-item shadow border-0 mb-2">{{$error}}</li>
    @endforeach
</ul>
@endif
