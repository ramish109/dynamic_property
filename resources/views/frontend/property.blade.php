<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <!-- <link href="{{ asset('frontend/css/all.css')}}" rel="stylesheet" type="text/css"> -->
</head>

<style>
    .wp-block.default.product-details-links-panel.light-gray.hidden-ma.hidden-xs>.row>.col-xs-12 {
        padding: 10px;
    }

    .wp-block.default.product-details-links-panel.light-gray.hidden-ma.hidden-xs>.row>.col-xs-12>a>i.fa.fa-chevron-left {
        padding: 10px;
        margin: 0px !important;
    }

    .col-md-8.pagination-list>.row.voffset-bottom-15.hidden-xs {
        margin-top: 20px; 
    }

    span.pull-right.property-details-price {
        float: right;
    }

    .property-details-price .price,
    .wp-block.property.list .wp-block-content .price {
        color: #e23c3c;
        font-size: 22px;
        font-weight: 700;
    }

    .modal-image {
        max-width: 100%;
        height: auto;
    }

    .carousel-inner {
        height: 50vh !important;
    }

    img.d-block.w-100 {
        height: 50vh;
        object-fit: cover;
    }

    .text-normal>p {
        text-align: center;
        font-size: 12px;
        font-weight: 400;
        color: #828b90;
        margin-top: 10px;
    }

    .mt-15 {
        margin-top: 15px;
    }

    ul.aux-info {
        display: table;
        width: 100%;
        border: 1px solid #eaebec;
    }

    .wp-block-footer ul.aux-info {
        width: 100%;
        margin: 0;
        padding: 0;
        display: block;
        background: #fff;
        border-top: 1px solid #eaebec;
        display: flex;
        justify-content: space-between;
        list-style: none;
        /* padding: 30px; */
    }

    ul.aux-info>li {
        border-right: 1px solid #eaebec;
        padding: 30px;
    }

    ul.aux-info>li:nth-child(5) {
        border-right: 0px solid #eaebec;
        padding: 30px;
    }

    ul.aux-info>li>.fa {
        text-align: center;
        width: 100%;
    }

    .wp-block-footer.style2.mt-15.text-center>ul>li#fav-1579133 {
        list-style: none;
    }

    .wp-block-footer.style2.mt-15.text-center {
        border: 1px solid #eaebec;
        padding: 5px;
    }

    .p-details-call-to-action {
        font-size: 130%;
        background-color: #eaebec;
        padding: 25px;
    }

    .wp-block.light p {
        color: #2f3d46;
    }

    a.btn.btn-base {
        color: #fff !important;
        background-color: #0066FF !important;
        border: 1px solid;
        border-color: #0066FF;
    }
    .tabs-boot {
        margin-top: 20px;
    }
    .tabs-boot {
        margin-top: 20px;
        border: 1px solid #eaebec;
    }
    .tab-content > .active{
    background-color:white;
    }
    .tab-content > .active > h2{
    color:black;
    }
    .tab-content > .active > p{
    color:black;
    }
    a.nav-link.active.show{
    border-radius:0px;
    }
</style>

<body>
    @include('frontend.includes.header')
    <div class="pg-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Property<span></span></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="slice bf-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 pagination-list">
                        <!-- <div class="wp-block default product-details-links-panel light-gray hidden-ma hidden-xs">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="#"><i class="fa fa-chevron-left"></i>&nbsp; </a><a class="underline"
                                        href="#">Back to property list</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="row voffset-bottom-15 hidden-xs">
                            <div class="col-sm-8 f15 property-details">
                                <h4 class="content-title">{{$property->propertyTranslation->title ?? $property->propertyTranslationEnglish->title  ?? null }} <span class="btn btn-primary btn-sm rounded-pill"> {{$property->type == 'sale' ? 'For Sale' : 'For Rent'}}</span></h4>
                               
                                @if(isset($property->country->countryTranslation->name))
                                <address><i class="fa fa-map-marker" aria-hidden="true"></i> 
                                    &nbsp;{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name  ?? null }} , {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name  ?? null }}, {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name  ?? null }}
                                </address>
                                @endif
                                
                            </div>
                            <div class="col-sm-4">
                                <span class="pull-right property-details-price">
                                @if($property->type == 'sale')<span class="price">₦</span><span class="price"> {{$property->price}}</span>@endif
                                @if($property->type == 'rent')<span class="price">₦</span><span class="price">{{$property->price}}</span><span class="per_month text-danger fw-bold">&nbsp;/month</span>@endif
                                <span class="period"></span></span>



                            </div>
                        </div>
                        <div id="slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider" data-slide-to="0" class="active"></li>
                                <li data-target="#slider" data-slide-to="1"></li>
                                <li data-target="#slider" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">

                                <!-- <div class="carousel-item active">
                                    <img src="https://images.nigeriapropertycentre.com/properties/images/1579133/063b6fc5ed8e60-self-serviced-5-bedroom-detached-duplex-with-a-room-bq-detached-duplexes-for-sale-osapa-lekki-lagos.jpg"
                                        class="d-block w-100" alt="Image 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.nigeriapropertycentre.com/properties/images/1579133/063b6fc5ed8e60-self-serviced-5-bedroom-detached-duplex-with-a-room-bq-detached-duplexes-for-sale-osapa-lekki-lagos.jpg"
                                        class="d-block w-100" alt="Image 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://images.nigeriapropertycentre.com/properties/images/1579133/063b6fc5ed8e60-self-serviced-5-bedroom-detached-duplex-with-a-room-bq-detached-duplexes-for-sale-osapa-lekki-lagos.jpg"
                                        class="d-block w-100" alt="Image 3">
                                </div> -->
                                @php
                                    $pic = json_decode($property->image->name);
                                @endphp
                                @foreach($pic as $key=>$p)
                                        <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                                    @if(!env('USER_VERIFIED'))
                                    <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                    @else
                                            @if(file_exists( public_path() . '/images/gallery/'.$p))
                                                <img loading="lazy" class="d-block w-100" src="{{ URL::asset('images/gallery/'.$p)}}" alt="slide">
                                            @else
                                                <img loading="lazy" class="d-block w-100" src="{{asset('images/property/property_1.jpg')}}" alt="#">
                                            @endif
                                    @endif
                                        </div>
                                @endforeach
                                
                            </div>
                            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="text-normal voffset-10">
                            <p>
                                Click main picture to view in fullscreen
                            </p>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                            aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="https://images.nigeriapropertycentre.com/properties/images/1579133/063b6fc5ed8e60-self-serviced-5-bedroom-detached-duplex-with-a-room-bq-detached-duplexes-for-sale-osapa-lekki-lagos.jpg"
                                            class="modal-image">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wp-block-footer style2 mt-15">
                            <ul class="aux-info">
                                <li><i class="fa fa-bed"></i>
                                    <div><span>{{$property->propertyDetails->bed}}</span> <span>Bedrooms</span></div>
                                </li>
                                <li><i class="fa fa-bath"></i>
                                    <div><span>{{$property->propertyDetails->bath}}</span> <span>Bathrooms</span></div>
                                </li>
                                <li><i class="fa fa-car" ></i>
                                    <div><span>{{$property->propertyDetails->garage}}</span><span> Garage</span></div>
                                </li>
                                <li><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                    <div><span>{{$property->propertyDetails->room_size}}</span> <span>sqm Room Size</span></div>
                                </li>
                                <!-- <li><i class="fa fa-home"></i>
                                    <div><span>5</span> <span>Bedrooms</span></div>
                                </li> -->
                            </ul>
                        </div>
                        

                        
                        <div class="wp-block hero light p-details-call-to-action text-center">
                            <p class="text-center">
                                Interested in this property?
                            </p>
                            <div class="text-center voffset-20">
                                Call <strong><span>{{$property->user->mobile}}</span></strong> </div>
                        </div>


                        <div class="tabs-boot">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                        <span>Description</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <span>Facility</span>
                                    </a>
                                </li>
                           
                            </ul>

                            <div class="tab-content">
                                <div id="tab1" class="tab-pane active">
                                    <h4 class="text-dark">Description</h4>
                                    <p>{!! $property->propertyDetails->propertyDetailTranslation->content ?? $property->propertyDetails->propertyDetailTranslationEnglish->content  ?? null !!}</p>
                                </div>
                                <div id="tab2" class="tab-pane">
                                    <h4 class="text-dark">Facilities</h4>
                                    <ul class="text-dark list-unstyled">
                                        @foreach($property->facilities as $facility)
                                            <li><i class="fa fa-check-square" aria-hidden="true"></i>{{$facility->facilityTranslation->name ?? $facility->facilityTranslationEnglish->name  ?? null }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- endcode -->
                    <div class="col-md-4">

                        <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                            <div class="panel-heading">
                                <h2><i class="fa fa-user"></i>Contact Agent</h2>
                            </div>
                            <div class="panel-body">
                                <ul class="address-list list-unstyled" style="font-size: small">
                                    <li><h4><a href="{{url('/agents/'.$property->user->id)}}">{{$property->user->f_name}} {{$property->user->l_name}}</a></h4></li>
                                    @if($property->user->mobile != null)<li><i class="fa fa-phone" aria-hidden="true"></i>{{$property->user->mobile}}</li>@endif
                                    @if($property->user->email != null)<li><i class="fa fa-envelope" aria-hidden="true"></i>{{$property->user->email}}</li>@endif
                                    @if($property->user->company_name != null)<li><i class="fa fa-building" aria-hidden="true"></i>{{$property->user->company_name}}</li>@endif
                                    @if($property->user->title != null)<li><i class="fa fa-user" aria-hidden="true"></i>{{$property->user->title}}</li>@endif
                                </ul>
                            </div>
                        </div>

                        @can('isIndividual')
                        <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                            <div class="panel-heading">
                                <h2><i class="fa fa-user"></i>Message To Agent</h2>
                            </div>
                            <div class="panel-body">
                            
                                @if (\Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Message</strong> {!! \Session::get('success') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                @endif

                                <form action="{{route('chat.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="agent" value="{{$property->user->id}}">
                                    <input type="hidden" name="user" value="{{Auth::user()->id}}">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="easy-autocomplete">
                                                    <!-- <input name="phone" placeholder="Enter Email" type="email" class="form-control side-panel-search"> -->
                                                    <textarea name="message"  class="form-control side-panel-search" cols="" rows="" placeholder="Hello, I am interested" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-block btn-base btn-icon btn-icon-right btn-search " style="background-color: #0D6EFD !important; border-color: #0D6EFD !important;">
                                                <span>Send Message</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        @endcan

                        <!-- <div id="advancedSearchFilters" class="panel panel-default panel-sidebar-1 hidden-xs">
                        <div class="panel-heading">
                            <h2><i class="fa fa-filter"></i>&nbsp; Advanced Filter Options</h2>
                        </div>
                        <div class="panel-body">
                            <form name="search_jsForm" id="search_jsForm" class="form-light" action="{{route('search.property')}}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <div class="easy-autocomplete">
                                                <input data-prefix="" name="title" id="city_name" placeholder="Enter a state, locality or area" type="text" class="form-control side-panel-search propertyLocation">
                                                <div id="cityList" class="" style="position:absolute; "></div>
                                            </div>
                                            <em for="propertyLocation" class="invalid hidden" id="no-location-found"></em>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="cid" class="form-control">
                                        <option value="" selected="selected">Property Type</option>
                                        <option value="1" >Residential</option>
                                        <option value="2">Commercial</option>
                                        <option value="3">Land</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select name="property_type" id="tid" class="form-control">
                                                <option value="" selected="selected">All Types</option>
                                                <option value="sale">Sale</option>
                                                <option value="rent">Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                         

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <select name="bed" id="bedrooms" class="form-control">
                                                <option value="" selected="selected">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            <select name="bath" id="bedrooms" class="form-control">
                                                <option value="" selected="selected">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Min price</label>
                                            <select name="minPrice" id="minprice" class="form-control">
                                                <option value="" selected="selected">No Min</option>
                                                <option value="250000">₦ 250,000</option>
                                                <option value="500000">₦ 500,000</option>
                                                <option value="750000">₦ 750,000</option>
                                                <option value="1000000">₦ 1 Million</option>
                                                <option value="2000000">₦ 2 Million</option>
                                                <option value="5000000">₦ 5 Million</option>
                                                <option value="10000000">₦ 10 Million</option>
                                                <option value="20000000">₦ 20 Million</option>
                                                <option value="30000000">₦ 30 Million</option>
                                                <option value="40000000">₦ 40 Million</option>
                                                <option value="60000000">₦ 60 Million</option>
                                                <option value="80000000">₦ 80 Million</option>
                                                <option value="100000000">₦ 100 Million</option>
                                                <option value="150000000">₦ 150 Million</option>
                                                <option value="200000000">₦ 200 Million</option>
                                                <option value="250000000">₦ 250 Million</option>
                                                <option value="300000000">₦ 300 Million</option>
                                                <option value="400000000">₦ 400 Million</option>
                                                <option value="500000000">₦ 500 Million</option>
                                                <option value="600000000">₦ 600 Million</option>
                                                <option value="700000000">₦ 700 Million</option>
                                                <option value="800000000">₦ 800 Million</option>
                                                <option value="900000000">₦ 900 Million</option>
                                                <option value="1000000000">₦ 1 Billion</option>
                                                <option value="2000000000">₦ 2 Billion</option>
                                                <option value="5000000000">₦ 5 Billion</option>
                                                <option value="10000000000">₦ 10 Billion</option>
                                                <option value="20000000000">₦ 20 Billion</option>
                                                <option value="30000000000">₦ 30 Billion</option>
                                                <option value="40000000000">₦ 40 Billion</option>
                                                <option value="50000000000">₦ 50 Billion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Max price</label>
                                            <select name="maxPrice" id="maxprice" class="form-control">
                                                <option value="" selected="selected">No Max</option>
                                                <option value="250000">₦ 250,000</option>
                                                <option value="500000">₦ 500,000</option>
                                                <option value="750000">₦ 750,000</option>
                                                <option value="1000000">₦ 1 Million</option>
                                                <option value="2000000">₦ 2 Million</option>
                                                <option value="5000000">₦ 5 Million</option>
                                                <option value="10000000">₦ 10 Million</option>
                                                <option value="20000000">₦ 20 Million</option>
                                                <option value="30000000">₦ 30 Million</option>
                                                <option value="40000000">₦ 40 Million</option>
                                                <option value="60000000">₦ 60 Million</option>
                                                <option value="80000000">₦ 80 Million</option>
                                                <option value="100000000">₦ 100 Million</option>
                                                <option value="150000000">₦ 150 Million</option>
                                                <option value="200000000">₦ 200 Million</option>
                                                <option value="250000000">₦ 250 Million</option>
                                                <option value="300000000">₦ 300 Million</option>
                                                <option value="400000000">₦ 400 Million</option>
                                                <option value="500000000">₦ 500 Million</option>
                                                <option value="600000000">₦ 600 Million</option>
                                                <option value="700000000">₦ 700 Million</option>
                                                <option value="800000000">₦ 800 Million</option>
                                                <option value="900000000">₦ 900 Million</option>
                                                <option value="1000000000">₦ 1 Billion</option>
                                                <option value="2000000000">₦ 2 Billion</option>
                                                <option value="5000000000">₦ 5 Billion</option>
                                                <option value="10000000000">₦ 10 Billion</option>
                                                <option value="20000000000">₦ 20 Billion</option>
                                                <option value="30000000000">₦ 30 Billion</option>
                                                <option value="40000000000">₦ 40 Billion</option>
                                                <option value="50000000000">₦ 50 Billion</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-block btn-base btn-icon btn-icon-right btn-search " style="background-color: #0D6EFD !important; border-color: #0D6EFD !important;">
                                            <span>Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->

                        <div class="panel panel-default panel-sidebar-1 hidden-ma property-availability-count">
                            <div class="panel-heading">
                                <h2><i class="fa fa-chart-bar"></i>&nbsp; Filter Property</h2>
                            </div>
                            <div class="panel-body">
                                <div class="availability-stats">
                                    <ul class="fa-ul loffset-25">
                                        <li><a href="{{ url('/properties/rent') }}" class="text-dark">For Rent</a></li>
                                        <li><a href="{{ url('/properties/sale') }}" class="text-dark">For Sale</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Start -->
                        <!-- <div class="panel panel-default panel-sidebar-1 announcement hidden-ma hidden-xs">
                            <div class="panel-bodys text-center">
                                <a title="Market your property on Nigeria Property Centre" href="#">
                                    <h3 class="title">Advertise/market your property on Nigeria Property Centre</h3>
                                </a>
                                <a title="Market your property on Nigeria Property Centre"
                                    class="btn btn-alt voffset-15" href="#">
                                    <span>Get Started!</span>
                                </a>
                            </div>
                        </div> -->
                        <!-- End -->
                    </div>
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
                                <span>/ Property</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.includes.footer')

    <script>
    $(document).ready(function(){

        $('#city_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        // console.log(data);
                        $('#cityList').fadeIn();
                        $('#cityList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            var text = $(this).text();
            var city = text.substring(0, text.indexOf(','));

            $('#city_name').val(city);
            $('#cityList').fadeOut();
        });

        $(document).on("click", function(event){
            var $trigger = $("#city_name");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $("#cityList").slideUp("fast");
            }
        });

    });
</script>

</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
<script>
$(document).ready(function() {
    $('#slider').on('click', '.carousel-item', function() {
        var src = $(this).find('img').attr('src');
        $('.modal-image').attr('src', src);
        $('#imageModal').modal('show');
    });
});
</script>

</html>