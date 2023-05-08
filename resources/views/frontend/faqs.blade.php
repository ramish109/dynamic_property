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
<style>
    ol.ol-default > li > a {
        color: #2f3d46 !important;
    }

</style>
<body>
@include('frontend.includes.header')

<section class="pg-opt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">
                    Frequently Asked Questions
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="slice bb">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                @if(isset($faqs))
                {{$faqs->faqs}}
                @endif
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>
