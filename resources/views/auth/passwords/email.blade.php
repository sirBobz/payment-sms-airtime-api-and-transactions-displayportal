@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <p class="text-muted">Enter your registration Email Address and we will send you a password reset link.</p>
                        <div>
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <div class="md-form form-sm">
                                    <i class="fa fa-envelope prefix gray-text"></i>
                                    <input name="email" id="email" autocomplete="randomString" type="email" value="{{old('email')}}"
                                           class="form-control" required="required">
                                    <label for="email">Your valid email</label>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" name="login-submit" id="login-submit" class="btn btn-facebook btn-sm btn-block" tabindex="2">Reset password</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row col-12 text-muted">
                       Already have an account? &nbsp;<a href="{{ route('login') }}"> Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
