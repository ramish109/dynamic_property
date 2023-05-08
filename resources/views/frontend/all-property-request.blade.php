<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
</head>

<body>
@include('frontend.includes.header')
    <div class="pg-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Property for Rent in Nigeria <span></span></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="slice bf-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    @foreach( $posts as $post )
                        <div class="col-sm-4 mb-3">    
                            <div class="card">
                                <div class="card-body">
                                    <ul style="list-style-type: none;">
                                        <li><strong>Type</strong></li>
                                        <li>{{$post->type}}</li>
                                        <li><strong>Bedrooms</strong></li>
                                        <li>{{$post->bed}}</li>
                                        <li><strong>City</strong></li>
                                        <li>{{$post->city->name}}</li>
                                        <li><strong>Budget</strong></li>
                                        <li>{{$post->budget}}</li>
                                        <li><strong>Requester Type</strong></li>
                                        <li>{{$post->user_type}}</li>
                                        <li><strong>Date</strong></li>
                                        <li>{{$post->created_at}}</li>
                                    </ul>
                                </div>
                                <div class="card-footer">Details</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container hidden-xs hidden-sm hidden-ma">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>
                            <a href="#">
                                <span>/ For Rent</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@include('frontend.includes.footer')


</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
</html>