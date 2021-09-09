@extends('layouts.admin')
@section('styles')

    @include('layouts.dataTableCss')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')

    @include('V1.airtime.filterModal')

    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-mobile-alt"> Airtime transactions </i>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">

                <div class="row col-12">
                    <button type="button" class="btn btn-info btn-xs float-right" data-toggle="modal"
                    data-target="#airtimeQueryByParams"><i class="fa fa-filter" aria-hidden="true"></i> Filter
                airtime <i class="fa fa-angle-double-right"></i>
            </button>
                </div>

                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover']) !!}
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    @include('layouts.script')

    {!! $dataTable->scripts() !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@endsection
