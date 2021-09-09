@extends('layouts.admin') 
@section('content')
<div class="card">
   <div class="card-header">
      
    <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-mobile"> B2C file import (CSV) </i></div>
   </div>
   <div class="card-body">
      <div class="card">
         <div class="card-header">
           <a href="{{ route('admin.b2c.sampleFile') }}" class="btn btn-primary btn-xs"><i class="fa fa-download"> Sample csv </i></a>
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
            <form role="form" method="POST" action="{{ route('admin.b2c.b2cFile') }}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">
               <div class="col-md-6">
                  <div class="input-group">
                     
                     <div class="custom-file">
                        <input type="file" required="Please upload a file" title="Please upload a CSV file with phone amount" accept=".csv" name="import_file" class="custom-file-input" id="import_file">
                        <label class="custom-file-label" for="import_file">file header (phone_number)</label>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="input-group">
   
                     <input type="text" name="reference_name" placeholder="Bulk reference name" class="form-control" required="required">
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="input-group">
                     
                     <select class="form-control select2" required="required" name="short_code" id="short_code">
                       <option value="">- select bulk number -</option>
                       @foreach ($bulkNumber as $data)
                          <option value="{{ $data->account }}"> {{ $data->account }} </option>
                       @endforeach
                     </select>
                  </div>
               </div>
               </div>
               <br>
               <div class="row">
               <div class="col-md-12">
                  <div class="input-group">
                     
                     <button type="submit" name="login-submit" id="login-submit" class="btn btn-facebook btn-sm btn-block" tabindex="2"> submit</button>
                  </div>
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