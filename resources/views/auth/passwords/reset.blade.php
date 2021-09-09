@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-group">
            <div class="card ">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <p class="text-muted">Set your new password</p>
                        <div>
                            <input name="token" value="{{ $token }}" type="hidden">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" value="{{ $email ?? old('email') }}" required="required" placeholder="Your email">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" required="required" placeholder="Login password">
                                @if($errors->has('password'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="Login password confirmation">
                                @if($errors->has('password_confirmation'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" name="login-submit" id="login-submit" class="btn btn-facebook btn-sm btn-block" tabindex="2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
