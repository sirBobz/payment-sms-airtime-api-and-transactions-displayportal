<!-- The Modal -->
<div class="modal" id="addUserModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Add user?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            
         <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.user.fields.name') }}*</label>
                <input type="text" required="required" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" required="required" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                <label for="phone_number">Phone number*</label>
                <input type="text" required="required" id="phone_number" name="phone_number" class="form-control">
                @if($errors->has('phone_number'))
                    <em class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-default" data-dismiss="modal" type="submit" value="Close">
                <input class="btn btn-primary pull-right" type="submit" value="Save">
            </div>
        </form>
         </div>
      </div>
   </div>
</div>
