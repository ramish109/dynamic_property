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
                    <h1 class="page-title">Real Estate Property Developer in Nigeria<span></span></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="slice bf-white">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 pagination-list">
                        <div class="searches-last">
                            <div class="container">
                                <div class="col-md-12 text-center">
                                    <h3>
                                        Featured Real Estate Companies
                                    </h3>
                                </div>
                                <div class="col-md-12 image-fade-flex" id="image-fade-flex">
                                    <div class="col-md-3 images-fade">
                                        <a href="#">
                                            <img src="images/18025799774053572262.jfif" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-3  images-fade">
                                        <a href="#">
                                            <img src="images/12815860285273379304.jfif" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-3 images-fade">
                                        <a href="#">
                                            <img src="images/images-fade.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form Start -->
                        <!--<div class="voffset-bottom-20">-->
                        <!--    <form class="form-light wp-block default product-list-quick-filters sort-panel light-gray"-->
                        <!--        role="form" name="adminForm" id="adminForm">-->
                        <!--        <div class="row voffset-10">-->
                        <!--            <div class="col-sm-7 col-xs-12">-->
                        <!--                <div class="form-group voffset-bottom-10">-->
                        <!--                    <input type="text" id="search" name="search" class="form-control"-->
                        <!--                        placeholder="Search by location or company name" value="">-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-sm-3 col-xs-8">-->
                        <!--                <div class="form-group voffset-bottom-10">-->
                        <!--                    <select name="verified" id="verified" class="form-control">-->
                        <!--                        <option value="">All</option>-->
                        <!--                        <option value="1">Verified Only</option>-->
                        <!--                    </select>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <div class="col-sm-2 col-xs-4">-->
                        <!--                <div class="form-group voffset-bottom-10">-->
                        <!--                    <button class="btn btn-base btn-block bg-primary" type="button">Search</button>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                        <div class="wp-block default product-list-filters sort-panel light-gray">
                            <div class="row">
                                <div class="col-xs-9">
                                    <span>Total Builders 9</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9 col-xs-12 voffset-10 voffset-bottom-10 agent-list">
                                <div class="property-list">
                                    <h2 itemprop="name"><a itemprop="url"
                                            href="#"><strong>@comfortablehomes
                                                Properties</strong></a></h2>
                                    <br>
                                    <address itemprop="address"><i class="fa fa-map-marker"></i> &nbsp;Lekki, Ajah,
                                        Lagos State, Nigeria</address>
                                    <br>
                                    <br>
                                    <i class="fa fa-building"></i>&nbsp; <a class="underline"
                                        href="#">View
                                        property listings</a>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-xs text-right">
                                <img class="company-logo" itemprop="image"
                                    src="{{ asset('/images/users/tony-stark-2012-01-23-61ece6680e692.jpg') }}"
                                 >
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9 col-xs-12 voffset-10 voffset-bottom-10 agent-list">
                                <div class="property-list">
                                    <h2 itemprop="name"><a itemprop="url"
                                            href="#"><strong>@comfortablehomes
                                                Properties</strong></a></h2>
                                    <br>
                                    <address itemprop="address"><i class="fa fa-map-marker"></i> &nbsp;Lekki, Ajah,
                                        Lagos State, Nigeria</address>
                                    <br>
                                    <br>
                                    <i class="fa fa-building"></i>&nbsp; <a class="underline"
                                        href="#">View
                                        property listings</a>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-xs text-right">
                                <img class="company-logo" itemprop="image"
                                    src="{{ asset('/images/users/tony-stark-2012-01-23-61ece6680e692.jpg') }}"
                                 >
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9 col-xs-12 voffset-10 voffset-bottom-10 agent-list">
                                <div class="property-list">
                                    <h2 itemprop="name"><a itemprop="url"
                                            href="#"><strong>@comfortablehomes
                                                Properties</strong></a></h2>
                                    <br>
                                    <address itemprop="address"><i class="fa fa-map-marker"></i> &nbsp;Lekki, Ajah,
                                        Lagos State, Nigeria</address>
                                    <br>
                                    <br>
                                    <i class="fa fa-building"></i>&nbsp; <a class="underline"
                                        href="#">View
                                        property listings</a>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-xs text-right">
                                <img class="company-logo" itemprop="image"
                                    src="{{ asset('/images/users/tony-stark-2012-01-23-61ece6680e692.jpg') }}"
                                 >
                            </div>
                        </div>
                        <hr>
{{--                        <div class="paginations bg-primary">--}}
{{--                            <li class="page-item previous-page disable">--}}
{{--                                <a href="#" class="page-links">--}}
{{--                                    < </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item current-page active">--}}
{{--                                <a href="#" class="page-links"> 1 </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item current-page">--}}
{{--                                <a href="#" class="page-links"> 2 </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item dots">--}}
{{--                                <a href="#" class="page-links"> .. </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item current-page">--}}
{{--                                <a href="#" class="page-links"> 10 </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item next-page">--}}
{{--                                <a href="#" class="page-links"> > </a>--}}
{{--                            </li>--}}
{{--                        </div>--}}

                    </div>
                    <div class="col-md-4">
                        <!--<div class="sidebar-section">-->
                        <!--    <div class="panel panel-default light-gray f13">-->
                        <!--        <div class="panel-body">-->
                        <!--            Can't find what you're looking for?&nbsp;-->
                        <!--            <a class="btn btn-alt btn-sm" href="#">-->
                        <!--                <span>Post a Request</span>-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
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
                                                    <option value="1">Flat / Apartment</option>
                                                    <option value="2">House</option>
                                                    <option value="5">Land</option>
                                                    <option value="3">Commercial Property</option>
                                                    <option value="6">Event Centre / Venue</option>
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
                                                    <option value="6">6+</option>
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
                                                    <option value="6">6+</option>
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



                        <!--<div class="panel panel-default panel-sidebar-1 hidden-ma property-availability-count">-->
                        <!--    <div class="panel-heading">-->
                        <!--        <h2><i class="fa fa-chart-bar"></i>&nbsp; Available Property</h2>-->
                        <!--    </div>-->
                        <!--    <div class="panel-body">-->
                        <!--        <h3>Currently available for sale in Nigeria</h3>-->
                        <!--        <div class="availability-stats">-->
                        <!--            <table id="allProperty" class="table voffset-20 voffset-bottom-20">-->
                        <!--                <tbody>-->
                        <!--                    <tr>-->
                        <!--                        <th>Property Type</th>-->
                        <!--                        <th class="text-center">Count</th>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Flats</a></td>-->
                        <!--                        <td class="text-center"><a href="#">6,197</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Houses</a></td>-->
                        <!--                        <td class="text-center"><a href="#">37,578</a>-->
                        <!--                        </td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">15,086</a>-->
                        <!--                        </td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Commercial Property</a></td>-->
                        <!--                        <td class="text-center"><a href="#">2,251</a></td>-->
                        <!--                    </tr>-->
                        <!--                </tbody>-->
                        <!--            </table>-->
                        <!--            <table id="flats-houses" class="table">-->
                        <!--                <tbody>-->
                        <!--                    <tr>-->
                        <!--                        <th>Type</th>-->
                        <!--                        <th class="text-center">1 bed</th>-->
                        <!--                        <th class="text-center">2 bed</th>-->
                        <!--                        <th class="text-center">3 bed</th>-->
                        <!--                        <th class="text-center">4 bed</th>-->
                        <!--                        <th class="text-center">5 bed</th>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Flats</a></td>-->
                        <!--                        <td class="text-center"><a href="#">516</a>-->
                        <!--                        </td>-->
                        <!--                        <td class="text-center"><a href="#">2,090</a>-->
                        <!--                        </td>-->
                        <!--                        <td class="text-center"><a href="#">2,854</a>-->
                        <!--                        </td>-->
                        <!--                        <td class="text-center"><a href="#">500</a>-->
                        <!--                        </td>-->
                        <!--                        <td class="text-center"><a href="#">87</a>-->
                        <!--                        </td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Houses</a></td>-->
                        <!--                        <td class="text-center"><a href="#">214</a></td>-->
                        <!--                        <td class="text-center"><a href="#">1,610</a></td>-->
                        <!--                        <td class="text-center"><a href="#">4,606</a></td>-->
                        <!--                        <td class="text-center"><a href="#">16,604</a></td>-->
                        <!--                        <td class="text-center"><a href="#">11,153</a></td>-->
                        <!--                    </tr>-->
                        <!--                </tbody>-->
                        <!--            </table>-->
                        <!--            <table id="land" class="table voffset-20">-->
                        <!--                <tbody>-->
                        <!--                    <tr>-->
                        <!--                        <th>Land Type</th>-->
                        <!--                        <th class="text-center">Count</th>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Residential-->
                        <!--                                Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">7,727</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Commercial-->
                        <!--                                Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">1,123</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Industrial-->
                        <!--                                Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">86</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Mixed-use Land</a>-->
                        <!--                        </td>-->
                        <!--                        <td class="text-center"><a href="#">4,493</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">Other Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">1,189</a></td>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">All Land</a></td>-->
                        <!--                        <td class="text-center"><a href="#">15,086</a>-->
                        <!--                        </td>-->
                        <!--                    </tr>-->
                        <!--                </tbody>-->
                        <!--            </table>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- Start -->
                        <!--<div class="panel panel-default panel-sidebar-1 hidden-xs hidden-ma">-->
                        <!--    <div class="panel-heading">-->
                        <!--        <h2><i class="fa fa-share-alt"></i>&nbsp; Share this property list</h2>-->
                        <!--    </div>-->
                        <!--    <div class="panel-body property-social-icons">-->
                        <!--        <a rel="nofollow" target="_blank" href="#"><i class="fab fa-facebook"></i></a>-->
                        <!--        <a rel="nofollow" target="_blank" href="#"><i class="fab fa-twitter"></i></a>-->
                        <!--        <a rel="nofollow" target="_blank" href="#" data-action="#"><i-->
                        <!--                class="fab fa-whatsapp"></i></a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- End -->
                        <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                            <div class="panel-heading">
                                <h2><i class="fa fa-link"></i>&nbsp; Useful Links</h2>
                            </div>
                            <div class="panel-body">
                                <ul class="fa-ul loffset-25">
                                    <li><span class="fa-li"><i class="fa fa-users"></i></span><a href="{{ url('/agents') }}">View a list of
                                            estate agents in Nigeria</a></li>
                                    <!--<li><span class="fa-li"><i class="fa fa-users"></i></span><a href="#">View a list of-->
                                    <!--        property developers in Nigeria</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <!-- Start -->
                        <div class="panel panel-default panel-sidebar-1 announcement hidden-ma hidden-xs">
                            <div class="panel-body text-center">
                                <a title="Market your property on Nigeria Property Centre" href="#">
                                    <h3 class="title">Advertise/market your property on Nigeria Property Centre</h3>
                                </a>
                                <a title="Market your property on Nigeria Property Centre"
                                    class="btn btn-alt voffset-15" href="#">
                                    <span>Get Started!</span>
                                </a>
                            </div>
                        </div>
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
                                <span>/ Property Developer</span>
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

</html>