@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-tasks"> Role settings </i></div>

        </div>
        <div class="card-body">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success btn-sm mx-auto d-block" data-toggle="modal" data-target="#addRole">
                <i class="fab fa-tasks"></i> Add role <i class="fa fa-angle-double-right"></i>
            </button><br>
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Id
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Permissions
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr data-entry-id="{{ $role->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $role->id ?? '' }}
                                </td>
                                <td>
                                    {{ $role->name ?? '' }}
                                </td>
                                <td>
                                    @foreach ($role->permissions()->pluck('name') as $permission)
                                        <span class="badge badge-info">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div id="addRole" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add role</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                            @if ($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">

                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                            <label for="permission">Permissions
                                <span class="btn btn-info btn-xs select-all">Select all</span>
                                <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                            <select name="permission[]" id="permission" class="form-control select2" multiple="multiple"
                                required>
                                @foreach ($permissions as $id => $permissions)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('permission', [])) || (isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                                        {{ $permissions }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('permission'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('permission') }}
                                </em>
                            @endif
                            <p class="helper-block">

                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input class="btn btn-primary float-right" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.roles.mass_destroy') }}",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            $('.datatable-Role:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
