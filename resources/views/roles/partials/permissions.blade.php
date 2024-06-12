 <div class="form-group col-md-12">
     <h3 class="display-6 text-capitalize font-weight-bold">{{__('permissions')}}</h3>
     <hr>
 </div>

 <input type="hidden" name="id" value="{{$role->id}}">
 <div class="form-group col-md-12">
     <div class="row">
         @foreach ($permissions as $key => $p)
         <div class="form-check col-md-4">
             <label class="form-check-label">
                 <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $p->name }}"
                {{ in_array($p->id,$permission_id) ? "checked" : "" }}
                 >{{$p->permiso}}
             </label>
         </div>
         @endforeach
     </div>
 </div>
