@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
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

                    @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('verify.store') }}">
                        {{ csrf_field() }}
                        <h5>Two Factor Verification</h5>
                        <br>
                        <p class="text-muted">
                            You have received an email which contains two factor login code.
                            If you haven't received it, click <a href="{{ route('verify.resend') }}">here</a>.
                        </p>

                        <div class="input-group mb-3">
                            <input name="two_factor_code" type="text"
                                class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}"
                                required autofocus placeholder="Two Factor Code">
                            @if($errors->has('two_factor_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('two_factor_code') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">
                                    Verify
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
