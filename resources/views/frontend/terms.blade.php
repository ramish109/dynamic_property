<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/agent.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css')}}">
</head>

<body>
@include('frontend.includes.header')

<section class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    Terms of Use
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="slice bb">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 voffset-bottom-15">
                @if(isset($terms))
                    {{$terms->terms_condition}}
                @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>
