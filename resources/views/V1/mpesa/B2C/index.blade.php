@extends('layouts.admin')
@section('styles')

    @include('layouts.dataTableCss')

@endsection

@section('content')

    @include('V1.mpesa.B2C.filterModal')

    <div class="card">
        <div class="card-header">

            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-mobile"> M-PESA B2C transactions </i>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="row col-12">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#b2cshortCodeList">
                        <i class="fa fa-list"></i> Shortcodes <i class="fa fa-angle-double-right"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#B2cQueryByParams">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filter transactions <i
                            class="fa fa-angle-double-right"></i></button>

                </div>
                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover']) !!}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="b2cshortCodeList" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Business to Customer shortcodes</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="b2c" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Shortcode</th>
                                    <th>Created on</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shortcodes as $data)
                                    <tr>
                                        <td>{{ $data->account ?? '' }}</td>
                                        <td>{{ $data->created_at ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('scripts')

    @include('layouts.script')

    {!! $dataTable->scripts() !!}


@endsection
