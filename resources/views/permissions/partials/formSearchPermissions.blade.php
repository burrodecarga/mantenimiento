
<div class="col">
    <form class="form-inline my-2 float-right">
        @csrf @method('post')
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="{{__('Search')}}"
            aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('Search')}} </button>
    </form>
</div>
