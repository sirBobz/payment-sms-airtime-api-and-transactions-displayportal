@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="alert alert-info">
                                {{ Session::get('message') }}
                            </p>
                        @endif
                        <form method="POST" autocomplete=off action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <p class="text-muted text-center">Login to start your session</p><br>

                            <div class="col-md-12">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix gray-text"></i>
                                    <input name="email" id="email" autocomplete="randomString" type="email" value="{{old('email')}}"
                                           pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                                           class="form-control" required="required">
                                    <label for="email">Your email</label>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form form-sm">
                                    <i class="fa fa-lock prefix gray-text"></i>
                                    <input name="password" autocomplete="randomString" type="password" class="form-control">
                                    <label for="email">Your password</label>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" name="login-submit" id="login-submit"
                                            class="btn btn-facebook btn-sm btn-block" tabindex="2">Log in
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="text-muted">Don't have an account yet?
                                <a href="{{ route('register') }}"> Register </a></div>

                            <div class="text-muted"><br>Forgot your password?
                                <a href="{{ route('password.request') }}"> Reset </a></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
