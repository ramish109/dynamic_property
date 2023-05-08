{{--@extends('layouts.app')--}}

{{--@section('content')--}} 
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}
{{--                        --}}{{--<input type="hidden" name="type" value="agent">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name:</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ old('f_name') }}" autocomplete="name" autofocus>--}}

{{--                                @error('f_name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}"  autocomplete="name" autofocus>--}}

{{--                                @error('l_name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">User Name:</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="name" autofocus>--}}

{{--                                @error('username')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}


    <!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/agent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css')}}">
</head>

<body>
@include('frontend.includes.header')
<section class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    Register
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="slice bg-white voffset-bottom-0">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="wp-block default user-form no-margin">
                        <div class="form-header">
                            <h2>Create your own account</h2>
                        </div>
                        <div class="form-body">
                             <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <fieldset class="no-padding">
                                <section>
                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">First Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input id="name" type="text" class="form-control" name="f_name" value="{{ old('f_name') }}" maxlength="50">
                                                @error('f_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">Last Name</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input id="name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ old('l_name') }}" maxlength="50" >
                                                @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">Username</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-user"></i>
                                                <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" maxlength="50">
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">Email</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-envelope"></i>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  maxlength="100">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">Password</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-lock"></i>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   maxlength="50">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col-xs-12">
                                            <label class="label">Confirm Password</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-lock"></i>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  maxlength="50" >
                                            </label>
                                        </section>
                                    </div>


                                    <div class="row">
                                       <section class="col-xs-12"> 
                                           <label class="label"><strong>Account Type</strong></label>
                                           <div class="radio-container p-2">
                                                <div class="row">
                                                    <input type="radio" id="individual" name="type" value="individual">
                                                    <label class="individual"  for="individual">Individual</label>
                                                </div>
                                                <div class="row">
                                                    <input type="radio" id="property_owner" name="type" value="owner">
                                                    <label class="property-owner" for="html">Property Owner</label>
                                                </div>
                                                
                                                <div class="row">
                                                    <input type="radio" id="estate_agent" name="type" value="user">
                                                    <label class="estate-agent"  for="html">Estate Agent</label>
                                                </div>
                                                <div class="row">
                                                    <input type="radio" id="property_developer" name="type" value="builder">
                                                    <label class="property-developer"  for="html">Property Builder</label>
                                                </div>
                                            </div>
                                       </section> 
                                    </div>
                              
                                    <button class="btn btn-base btn-icon btn-icon-right btn-icon-go" type="submit" style=" background-color: #0D6EFD !important; border-color: #0D6EFD !important;">
                                        <span>Register Now</span>
                                    </button>
                                    <!-- <div class="col-md-12 f90p">By registering you accept our <a target="_blank" href="#" class="text-primary">Terms of Use</a>
                                        and <a href="#" target="_blank" class="text-primary">Privacy</a> and agree that we
                                        and our selected partners may contact you with relevant offers and services.
                                    </div> -->
                                </section>
                            </fieldset>
                        </form>
                        </div>
                        <!-- <div class="form-footer">
                            <p>Already have an account? <a href="#" style="color: #0D6EFD !important;">Click here to sign in.</a></p>
                        </div> -->
                    </div>
                    <!-- <div class="panel-body text-center announcement voffset-20">
                        <h4 class="title voffset-bottom-0">Need help? Contact Us.</h4>
                        <p class="voffset-10">
                            <i class="fa fa-paper-plane fa-fw"></i> <strong>Telegram:</strong> <a target="_blank"
                                                                                                  class="underline"
                                                                                                  href="#">@nigeriapropertycentre</a>
                        </p>
                        <i class="fa fa-envelope fa-fw"></i> <a target="_blank"
                                                                href="#"
                                                                class="underline">support@nigeriapropertycentre.com</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="container hidden-xs hidden-sm hidden-ma">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">
                            <span>/ Register</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section> -->
@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>


</html>
