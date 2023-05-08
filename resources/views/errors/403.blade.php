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
                <h1 class="page-title">Dynamic Property <span></span></h1>
            </div>
        </div>
    </div>
</div>
<section class="slice bf-white">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pagination-list">
                    <!-- start -->
                
                    <div class="card ">
                        <div class="card-body p-5 text-center">
                                <h5 class="card-title text-center">Forbidden</h5>
                            <div class="card-text text-center">
                                <span class="display-6"><i class="fa fa-home" aria-hidden="true"></i>403 Code</span><br/>
                            </div></br>
                            <a href="{{url('/')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i><strong>Home</strong></a>
                        </div>
                    </div>
                    
                    <!-- end  -->
                   <div class="container " style="text-align:center">
                        <div class="panel panel-default pt-3 border-0"> 
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