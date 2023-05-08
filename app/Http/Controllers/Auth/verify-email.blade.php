<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/agent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
</head>

<body>
@include('frontend.includes.header')
<div class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">Email Verification<span></span></h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
        <div class="row">

            <div class="col-md-8 p-5">
                <form action="{{route('admin.dashboard.emailtoken')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">Enter Verification Code Sent to email</div>
                        <div class="card-body">
                        
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" name="email" id="staticEmail" value="{{$email}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputToken" class="col-sm-2 col-form-label">Enter Token</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control border" name="token" id="inputToken">
                                </div>
                            </div>

                            <div class="row">
                                <div class="w-25">
                                <input type="submit" class="form-control border bg-primary text-light" id="inputPassword">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('frontend.includes.footer')
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>
