@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-mobile"> Airtime file import
                    (CSV)</i></div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.airtime.sampleFile') }}" class="btn btn-primary btn-xs"> <i
                            class="fa fa-download"> Sample csv</i></a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ route('admin.airtime.airtimeFile') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01"></span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" required="required"
                                               title="Please upload a CSV file with phone_number amount" accept=".csv"
                                               name="import_file" class="custom-file-input" id="import_file">
                                        <label class="custom-file-label" for="import_file">file header (phone_number
                                            amount)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <label>
                                        <input type="text" name="reference_name" placeholder="Bulk reference name"
                                               class="form-control" required="required">
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary px-4" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                    <div class="table-responsive" id="tableHtml">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.shared.fileUploadPreview')
@endsection


