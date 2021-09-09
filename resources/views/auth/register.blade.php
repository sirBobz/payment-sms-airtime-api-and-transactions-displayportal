@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                    @endif

                    <form method="POST" autocomplete="off" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <p class="text-muted text-center">Register to create your account</p>

                        <div class="row">
                            <div class="col-md-6">
                            <div class="md-form form-sm">
                                <i class="fa fa-university prefix gray-text icon-resize-small"></i>
                                <input name="organization" required="required" type="text" class="form-control"
                                       id="organization" value="{{old('organization')}}">
                                <label for="organization">Your organization</label>
                                @error('organization')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="md-form form-sm">
                                <i class="fa fa-user-circle-o prefix gray-text"></i>
                                <input name="name" id="name" type="text" required="required" value="{{old('name')}}" class="form-control">
                                <label for="name">Your name</label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                            <div class="md-form form-sm">
                                <i class="fa fa-phone prefix gray-text"></i>
                                <input name="phone_number" id="phone_number" value="{{old('phone_number')}}" type="text" class="form-control" required="required">
                                <label for="phone_number">Your phone number</label>
                                @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        </div>

                       <div class="row">
                           <div class="col-md-6">
                           <div class="md-form form-sm">
                               <i class="fa fa-lock prefix gray-text"></i>
                               <input name="password" id="password" autocomplete="off" type="password" class="form-control"
                                      required="required">
                               <label for="password">Your password</label>
                               @error('password')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           </div>
                           <div class="col-md-6">
                           <div class="md-form form-sm">
                               <i class="fa fa-lock prefix gray-text"></i>
                               <input name="password_confirmation" id="password_confirmation" type="password"
                                      class="form-control" required="required">
                               <label for="password_confirmation">Confirm password</label>
                               @error('password_confirmation')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       </div>
                        <div class="text-muted">
                            <input type="checkbox" required="required" id="agree" class="text-muted" name="terms"
                                   value="1"/> &nbsp; Agree with the <a href="https://www.statum.co.ke/terms-of-use"
                                                                        target="_blank">terms </a> and <a
                                href="https://www.statum.co.ke/privacy-policy" target="_blank"> privacy policy</a>
                            <br><br>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" name="login-submit" id="login-submit"
                                        class="btn btn-facebook btn-sm btn-block" tabindex="2">Register
                                </button>
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
