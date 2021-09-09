@extends('layouts.admin')
@section('styles')

    @include('layouts.dataTableCss')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">

            <div class="float-right"><a href="{{ url('home') }}"> <i class="fa fa-home"> Home</i></a> <i
                    class="fa fa-angle-right" aria-hidden="true"></i> <i class="fa fa-money"> Account statement </i></div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <!-- Button to Open the Top up options Modal -->
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#paymentOptions">
                    <i class="fab fa-amazon-pay"></i> Top up options <i class="fa fa-angle-double-right"></i>
                </button>
                <!-- Button to Open the Balance Alert Modal -->
                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                    data-target="#balanceAlert">
                    <i class="fa fa-bell"></i> Balance alert <i class="fa fa-angle-double-right"></i>
                </button>
                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover']) !!}
            </div>
        </div>
    </div>


    <!--Top Up Modal -->
    <div id="paymentOptions" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <p>You can make a payment by using <strong>M-PESA</strong> or by sending a <strong>wire
                                    transfer</strong> to our bank account. Payments sent to our M-PESA paybill will be
                                automatically credited to your account and available for use.</p>
                            <div id="accordion">

                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#mpesa">
                                            M-PESA
                                        </a>
                                    </div>
                                    <div id="mpesa" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            1. Using your MPesa-enabled phone, select "Pay Bill" from the M-Pesa menu<br>
                                            2. Enter Statum Paybill Number <strong>709345</strong>.<br>
                                            3. Enter your Statum Account Number. Your account number is <strong>
                                                {{ Auth::user()->organization->organization_details->first()->top_up_code }}
                                            </strong>. <br>
                                            4. Enter the Amount of float you want to buy. <br>
                                            5. Confirm that all the details are correct and press OK.<br>
                                            6. Check your statement to see your payment. Your API account will also be
                                            updated.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#bank">
                                            Wire transfer
                                        </a>
                                    </div>
                                    <div id="bank" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            Be sure to send the full transaction details to
                                            <strong>info@statum.co.ke</strong>. We will credit your account upon receipt of
                                            the funds.<br><br>

                                            Bank Name: Equity Bank <br>
                                            Branch: Karen <br>
                                            Account Name: Statum Company Ltd. <br>
                                            Account Number: 1250276831450 <br>
                                            Payment Currency: Kenya Shillings <br>
                                            Bank Code: 68 <br>
                                            Branch Code: 68125 <br>
                                            Bank Routing Method: EFT <br>
                                            Bank Swift Code: EQBLKENA <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!--Balance Alert Modal -->
    <div id="balanceAlert" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <p>We can send you email notifications whenever your account credits go lower than the level you
                                specify
                                below.</p>
                            <br>
                            <form method="post" autocomplete="off" action="{{ route('admin.account-billing.store') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <select name="status" required
                                                class="form-control browser-default custom-select">

                                                @if ($data)
                                                    <option value="{{ $data->status }}">
                                                        @if ($data->status == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </option>
                                                @else
                                                    <option> -- Enable Notification --</option>
                                                @endif
                                                <option value="1"> Yes</option>
                                                <option value="0"> No</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="col-lg-6 col-sm-6 col-xs-6">
                                        <div class="form-group{{ $errors->has('threshold') ? ' has-error' : '' }}">
                                            <input name="threshold" required type="number"
                                                value="{{ old('threshold', isset($data) ? $data->threshold : '') }}"
                                                class="form-control" id='threshold' placeholder="Threshold (in KES)">
                                            @if ($errors->has('threshold'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('threshold') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-group{{ $errors->has('emails') ? ' has-error' : '' }}">
                                            <div class="input-group">
                                                <input type="text" name="emails" required class="form-control"
                                                    value="{{ old('emails', isset($data) ? $data->emails : '') }}"
                                                    id="emails" placeholder="Separate emails by comma">
                                            </div>
                                            @if ($errors->has('emails'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('emails') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    @if ($data)
                                        <div class="col-6">
                                            <a href="{{ route('admin.alertDelete', ['id' => $data->id]) }}"
                                                class="btn btn-danger px-6" role="button">Delete</a>
                                        </div>
                                    @endif
                                    <div class="col-6">
                                        <input type="submit" class="btn btn-primary" value='submit'>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection


@section('scripts')

    @include('layouts.script')

    {!! $dataTable->scripts() !!}

@endsection
