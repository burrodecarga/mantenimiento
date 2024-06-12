@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    {{Session::get('message')}}
</div>
@endif
