{{--@extends('frontend.main')--}}
{{--@section('content')--}}
{{--    <!--error  start-->--}}
{{--    <div class="error-section mt-150 pb-100">--}}
{{--        <div class="container">--}}
{{--            <div class="row mt-40">--}}
{{--                <div class="col-md-6 offset-md-3  error-text text-center">--}}
{{--                    <div class="error-content">--}}
{{--                        <div class="" id="user-login-popup">--}}

{{--                            <div class="modal-content">--}}

{{--                                <div class="modal-body user-login-section">--}}
{{--                                    <ul class="ui-list nav nav-tabs mb-30" role="tablist">--}}

{{--                                        <li class="nav-item">--}}

{{--                                            <a class="nav-link active" data-toggle="tab" href="#login" role="tab" aria-selected="true">Reset Password</a>--}}

{{--                                        </li>--}}

{{--                                    </ul>--}}
{{--                                    <div class="login-wrapper">--}}

{{--                                        <div class="ui-dash tab-content">--}}

{{--                                            <div class="tab-pane fade show active" id="login" role="tabpanel">--}}
{{--                                                @if(count($errors) > 0)--}}
{{--                                                    @foreach( $errors->all() as $message )--}}
{{--                                                        <div class="alert alert-danger display-hide">--}}
{{--                                                            <button class="close" data-close="alert"></button>--}}
{{--                                                            <span>{{ $message }}</span>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                                <form method="POST" action="{{ route('password.email') }}">--}}
{{--                                                    @csrf--}}

{{--                                                    <div class="form-group">--}}

{{--                                                        <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="email" value="" required="">--}}
{{--                                                        --}}{{-- <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required> --}}
{{--                                                        @error('email')--}}
{{--                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                            <strong>{{ $message }}</strong>--}}
{{--                                                        </span>--}}
{{--                                                        @enderror--}}
{{--                                                    </div>--}}

{{--                                                    <div class="res-box text-center mt-30">--}}
{{--                                                        <button type="submit" class="btn v8"><span class="lnr lnr-exit"></span>Send Password Reset Link</button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--error ends-->--}}
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
                    Forget Password
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
                            <h2>RESET PASSWORD</h2>
                        </div>
                        <div class="form-body">
                            <form action="#" method="post">
                                <!--<form action="{{-- route('password.email')}}" method="post">-->
                                
                                @csrf
                                <fieldset class="no-padding">
                                    <section>
                                            @if(count($errors) > 0)
                                                @foreach( $errors->all() as $message )
                                                    <div class="row">
{{--                                                        <div class="alert alert-danger display-hide">--}}
{{--                                                            <button class="close" data-close="alert"></button>--}}
{{--                                                            <span>{{ $message }}</span>--}}
{{--                                                        </div>--}}
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        <div class="row">
                                            <section class="col-xs-12">
                                                <label class="label">Email</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-envelope"></i>
                                                    <input type="text" name="email" value="" id="email" placeholder="" required="required" maxlength="100" class="form-control ">
                                                </label>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </section>
                                        </div>


                                        <button class="btn btn-base btn-icon btn-icon-right btn-sign-in pull-right"
                                                type="submit">
                                            <span>Send Password Reset Link</span>
                                        </button>
                                    </section>
                                </fieldset>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>


</html>
