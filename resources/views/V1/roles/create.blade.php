<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addRole">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add role</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route("admin.roles.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
        @if($errors->has('name'))
            <em class="invalid-feedback">
                {{ $errors->first('name') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('cruds.role.fields.title_helper') }}
        </p>
    </div>
    <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
        <label for="permission">{{ trans('cruds.role.fields.permissions') }}*
            <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
            <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
        <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
            @foreach($permissions as $id => $permissions)
                <option value="{{ $id }}" {{ (in_array($id, old('permission', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
            @endforeach
        </select>
        @if($errors->has('permission'))
            <em class="invalid-feedback">
                {{ $errors->first('permission') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('cruds.role.fields.permissions_helper') }}
        </p>
    </div>
    <div>
        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
