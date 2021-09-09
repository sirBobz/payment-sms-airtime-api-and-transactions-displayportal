@extends('layouts.admin')
@section('styles')

    @include('layouts.dataTableCss')

@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-users"> Users </i> </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <button type="button" class="btn btn-info btn-xs float-right" data-toggle="modal"
                    data-target="#addUserModal"> <i class="fa fa-user" aria-hidden="true"></i> Add user</button>
                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover']) !!}
            </div>

            <div id="confirmModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Are you sure you want to remove this user?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button"
                                class="btn btn-danger pull-right">OK</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- The Modal -->
    <div class="modal" id="addUserModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add user?</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" required="required" id="name" name="name" class="form-control"
                                value="{{ old('name', isset($user) ? $user->name : '') }}">
                            @if ($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">

                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">Email</label>
                            <input type="email" required="required" id="email" name="email" class="form-control"
                                value="{{ old('email', isset($user) ? $user->email : '') }}">
                            @if ($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                            <p class="helper-block">

                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label for="phone_number">Phone number</label>
                            <input type="text" required="required" id="phone_number" name="phone_number"
                                class="form-control">
                            @if ($errors->has('phone_number'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </em>
                            @endif
                            <p class="helper-block">

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


@endsection


@section('scripts')

    @include('layouts.script')

    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "/admin/delete-user/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        location.reload();
                    }, 2000);
                }
            })
        });

    </script>

@endsection
