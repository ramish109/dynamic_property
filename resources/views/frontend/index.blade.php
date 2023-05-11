{{--@extends('frontend.main')--}}
{{--@section('content')--}}
{{--    <!--Hero section starts-->--}}
{{--    @include('frontend.includes.hero')--}}
{{--    <!--Hero section ends-->--}}
{{--    <!--Popular Cities starts>--}}
{{--    <!--Popular Cities ends>--}}
{{--    <!--Popular Property starts-->--}}
{{--    @include('frontend.includes.popular-properties')--}}
{{--    @include('frontend.includes.popular-city')--}}

{{--    <!--Popular Property ends-->--}}
{{--    @include('frontend.includes.featured-property')--}}
{{--    <!--Featured Property ends-->--}} 
{{--    <!--Trending events starts-->--}}
{{--    @include('frontend.includes.recent-properties')--}}
{{--    <!--Trending events ends-->--}}
{{--    <!--Team section starts-->--}}
{{--    @include('frontend.includes.agents')--}}
{{--    <!--Team section ends-->--}}
{{--    <!--News section starts-->--}}
{{--    @include('frontend.includes.news')--}}
{{--    <!--News section ends-->--}}
{{--@endsection--}}



    <!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>
    @include('frontend.includes.header')

<div class="banner-property" style="background-image: url({{ asset('/images/header/'.$headerImage->url)}})">
    <div class="col-md-12 text-center">
        <h1 class="c-white strong-400">Find your new property</h1>
    </div>
    <div class="container">
        <form action="{{route('search.property')}}">
            @csrf
            <div class="row">
                <div class="col-xs-12 ">

                    <div class="btn-group w-100 bg-dark text-light" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="property_type" value="sale" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Sale</label>

                        <input type="radio" class="btn-check" name="property_type" value="rent" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Rent</label>

                        <input type="radio" class="btn-check" name="property_type" value="sale" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio3">Short-let</label>
                    </div>

                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="form-group max-width-search">
                                    <!-- <label for="inputlg">Large input</label> -->
                                    <input class="form-control input-lg" id="city_name" type="text" name="title" placeholder="Search by City"  >
                                        <div id="cityList" style="position:absolute; max-height:280px; overflow:scroll; overflow-x:hidden;">
                                        </div>
                                </div>
                        </div>
                        <!--<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">-->
                        <!--        <div class="form-group">-->
                        <!--            <input class="form-control input-lg" id="city_name2" type="text" name="title" placeholder="{{trans('file.city_state')}}">-->
                        <!--            <div id="cityList2" class="" style="position:absolute; "></div>-->
                        <!--        </div>-->
                        <!--</div>-->
                        <!--<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">-->
                        <!--        <div class="form-group">-->
                        <!--            <input class="form-control input-lg" id="city_name3" type="text" name="title" placeholder="{{trans('file.city_state')}}">-->
                        <!--            <div id="cityList3" class="" style="position:absolute; "></div>-->
                        <!--        </div>-->
                        <!--</div>-->

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12 filter-panel">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label class="text-light">Category</label>
                                <select name="category_id" class="hero__form-input  form-control custom-select  mb-20" id="propType">
                                    <option value="">Category Type</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6" >
                            <div class="form-group">
                                <label class="text-light">Bedrooms</label>
                                <select class="hero__form-input  form-control custom-select  mb-20" name="bed">
                                    <option value="">Bed</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label class="text-light">Min price</label>
                                <select name="minPrice" id="minprice" class="form-control">
                                    <option value="" selected="selected">No Min</option>
                                    <option value="0">₦ 0</option>
                                    <option value="100000">₦ 100,000</option>
                                    <option value="200000">₦ 200,000</option>
                                    <option value="250000">₦ 250,000</option>
                                    <option value="300000">₦ 300,000</option>
                                    <option value="400000">₦ 400,000</option>
                                    <option value="500000">₦ 500,000</option>
                                    <option value="600000">₦ 600,000</option>
                                    <option value="700000">₦ 700,000</option>
                                    <option value="750000">₦ 750,000</option>
                                    <option value="800000">₦ 800,000</option>
                                    <option value="900000">₦ 900,000</option>
                                    <option value="1000000">₦ 1 Million</option>
                                    <option value="2000000">₦ 2 Million</option>
                                    <option value="3000000">₦ 3 Million</option>
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
                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label class="text-light">Max price</label>
                                <select name="maxPrice" id="maxprice" class="form-control">
                                    <option value="" selected="selected">No Max</option>
                                    <option value="100000">₦ 100,000</option>
                                    <option value="200000">₦ 200,000</option>
                                    <option value="250000">₦ 250,000</option>
                                    <option value="300000">₦ 300,000</option>
                                    <option value="400000">₦ 400,000</option>
                                    <option value="500000">₦ 500,000</option>
                                    <option value="600000">₦ 600,000</option>
                                    <option value="700000">₦ 700,000</option>
                                    <option value="750000">₦ 750,000</option>
                                    <option value="800000">₦ 800,000</option>
                                    <option value="900000">₦ 900,000</option>
                                    <option value="1000000">₦ 1 Million</option>
                                    <option value="2000000">₦ 2 Million</option>
                                    <option value="3000000">₦ 3 Million</option>
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
                </div> 
            </div>
            <div class="row">
                <div class="col-md-offset-1 col-md-12 col-sm-12 col-xs-12 filter-panel">
                    <div class="row">
                        <!-- <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label class="text-light">City</label>
                                <select name="city_id" class="hero__form-input  form-control custom-select" id="state">
                                <option value="">{{ trans('file.select_city') }}</option>
                                @foreach($city as $city)
                                    <option value="{{$city->id}}">{{$city->cityTranslation->name ?? $city->cityTranslationEnglish->name ?? null}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div> -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="form-group">
                                <label class="text-light">Bathrooms</label>
                                <select class="hero__form-input  form-control custom-select  mb-20" name="bath">
                                    <option value="">Bath</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <!--<div class="col-sm-3 col-xs-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label class="text-light">Type</label>-->
                        <!--        <select class="hero__form-input  form-control custom-select  mb-20" name="property_type">-->
                        <!--            <option value="">Property Type</option>-->
                        <!--            <option value="sale">Sale</option>-->
                        <!--            <option value="rent">Rent</option>-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-sm-12 col-xs-6 pt-2">
                        <button type="submit" class="btn bg-primary text-light float-end"> <span> {{ trans('file.search') }} </span></button>
                    </div>
                </div>
        </form>
    </div>


</div>
<div class="searches-last">
    <div class="container">
        <!--<div class="col-md-12 text-center">-->
        <!--    <h3>-->
        <!--        <i class="fa fa-history"></i> Your Last Searches-->
        <!--    </h3>-->
        <!--</div>-->
        <div class="container">
            <div class="row">
                <div class="main-row-flex">
                    <div class="col-md-5 col-sm-6 col-xs-12 search-history-card  col-md-offset-2">
                        <a href="{{url('/properties/rent')}}" class="search-history-link">
                            <div class="col-md-12 search-history-card-body">
                                <p class="card-title">
                                    <span class="fw-600">Property for Rent in Nigeria</span>
                                </p>
                                <span class="mb-2 text-muted text-left search-history-subtitle">All for rent </span>
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12 search-history-card  col-md-offset-2">
                        <a href="{{ url('/properties/sale') }}" class="search-history-link">
                            <div class="col-md-12 search-history-card-body">
                                <p class="card-title">
                                    <span class="fw-600">Property for Sale in Nigeria</span>
                                </p>
                                <span class="mb-2 text-muted text-left search-history-subtitle">All for rent </span>
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="searches-last">
    <div class="container">
        <div class="col-md-12 text-center">
            <h3>
                Featured Real Estate Companies
            </h3>
        </div>
         <!--  -->

         @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                    {!! \Session::get('success') !!}
            </div>
        @endif


        <!--  -->
        <!-- <div class="col-md-12 image-fade-flex" id="image-fade-flex">
            <div class="col-md-3 images-fade">
                <a href="#">
                    <img src="{{asset('images/18025799774053572262.jfif')}}" alt="">
                </a>
            </div>
            <div class="col-md-3  images-fade">
                <a href="#">
                    <img src="{{ asset('images/12815860285273379304.jfif')}}" alt="">
                </a>
            </div>
            <div class="col-md-3 images-fade">
                <a href="#">
                    <img src="{{ asset('images/images-fade.png')}}" alt="">
                </a>
            </div>
        </div> -->
    </div>
</div>
<!--<div class="container">-->
<!--    <div class="panel panel-default">-->
<!--        <h4 class="panel-title text-center">-->
<!--            <a data-toggle="collapse" data-parent="#browseLocations" href="#collapseOne" class="collapsed"-->
<!--               aria-expanded="false" id="collapse-data-browser">-->
<!--                Browse by state or locality in Nigeria&nbsp; <i style="font-size:120%" class="fa fa-angle-up"></i>-->
<!--            </a>-->
<!--        </h4>-->
<!--    </div>-->
<!--</div>-->
<div class="searches-last">
    <div class="container">
        <div class="col-md-12 text-left">
            <h5>
                Latest Listed Properties
            </h5>
        </div>
        <div class="row">
            @foreach ( $properties as $property )
                <div class="col-md-6 mb-2">
                    <div class="wp-block">
                        <div class="wp-block-title">
                            <h3>
                                <a href="#">
                                        <span class="card-heading">
                                            <!-- 5 Bedroom Detached Duplex with Bq  -->
                                        </span>
                                </a>
                            </h3>
                        </div>
                        <div class="wp-block-title">
                            <div class="wp-block-title-inner">
                                <div class="col-md-6 wp-block-title-images">
                                    <a href="{{route('front.property',['property'=>$property->id])}}">
                                        <img class="sm-width-min-200-max-250-home xs-width-min-200-max-350"
                                            src="{{ asset('/images/thumbnail/'.$property->thumbnail)}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 wp-block-title-images">
                                    <div class="wp-block-title-text">
                                        <h4 class="text-primary">{{$property->propertyTranslation->title}}</h4>
                                        <p class="description">
                                          {{$property->description}}
                                        </p> 

                                        <span class="pull-left">
                                                <span content="NGN" class="price text-primary">₦</span><span content="350000000.00" class="price text-primary ">{{$property->price}}</span><span class="period"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wp-block-title-footer">
                            <ul class="aux-info">
                                <li><i class="fa fa-bed"></i><span>{{$property->propertyDetails->bed}}</span> <span>Bedrooms</span></li>
                                <li><i class="fa fa-bath"></i><span>{{$property->propertyDetails->bath}}</span> <span>Bathrooms</span></li>
                                <li><i class="fa fa-arrows"></i><span>{{$property->propertyDetails->room_size}}</span> <span> Sq ft</span></li>
                                <li><i class="fa fa-car"></i><span>{{$property->propertyDetails->garage}}</span> <span>Park Space</span></li>

                                    
                                @can('isIndividual')
                                    @if(Auth::user() && Auth::user()->is_email_verified == 1)
                                       
                                        @if( in_array( Auth::user()->id , getSaveProperty_toArray($property->id)) )
                                        <li><a href="{{ route('property.not-save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart" ></i><span>Saved</span></a></li>
                                        @else
                                        <li><a href="{{ route('property.save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}" style="color: black"><i class="fa fa-heart" ></i><span>Save</span></a></li>
                                        @endif

                                        <!-- @php $save_property_exist = $property->save_property; @endphp

                                        @if($save_property_exist != null)
                                            @if($property->save_property->status == 1 && $property->save_property->user_id == Auth::user()->id)
                                                <li><a href="{{ route('property.save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}" style="color: black"><i class="fa fa-heart" ></i><span>Save</span></a></li>
                                            @elseif($property->save_property->status == 0)
                                                <li><a href="{{ route('property.not-save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart" ></i><span>Saved</span></a></li>
                                            @elseif($property->save_property->status != 0 || $property->$save_property->status != 1 )
                                            <li><a href="{{ route('property.not-save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart"></i><span>Save</span></a></li>
                                            @endif
                                        @endif --> 
                                    @endif 
                                @endcan
                         
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<section class="slice bb bt light-gray hidden-ma">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wr">
                        <h3 class="section-title left"><span>About Nigeria Property Centre</span></h3>
                    </div>
                    <p>
                    {{(isset($siteInfo->about_us)) ? $siteInfo->about_us : ''}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="milestone-counter">
                        <div class="milestone-count c-gray">{{$agent_developer}}</div>
                        <h4 class="milestone-info c-gray">Agents &amp; Builders</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="milestone-counter">
                        <div class="milestone-count c-gray">{{$property_count}}</div>
                        <h4 class="milestone-info c-gray">Property Listings</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="milestone-counter">
                        <div class="milestone-count c-gray">{{$area_covered}}</div>
                        <h4 class="milestone-info c-gray">Areas Covered</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="slice bb bg-white hidden-ma">-->
<!--    <div class="wp-section">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    <div class="section-title-wr">-->
<!--                        <h3 class="section-title left"><span>How it Works</span></h3>-->

<!--                    </div>-->
<!--                    <div class="embed-responsive embed-responsive-16by9">-->
<!--                        <iframe class="embed-responsive-item"-->
<!--                                src="//www.youtube.com/embed/rMdN--kRx68?showinfo=0&amp;rel=0"-->
<!--                                allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"-->
<!--                                msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen"-->
<!--                                webkitallowfullscreen="webkitallowfullscreen"></iframe>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="slice bg-white hidden-ma">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="">
                        <h3 class="section-title center voffset-bottom-15 fs22"><span>Find new properties anytime,
                                    anywhere!</span></h3>
                        <div class="aux-nav">

                        </div>
                    </div>
                    <!--<p class="f15">Download our <strong>Android app</strong> or <strong>iOS app</strong> to get-->
                    <!--    quick access to property on Nigeria Property Centre from your mobile phone.</p>-->
                    <!--<p class="voffset-40">-->
                    <!--    <img width="470" height="502" class="img-responsive center-block"-->
                    <!--         src="https://images.nigeriapropertycentre.com/nigeria-property-centre-mobile-apps.jpg"-->
                    <!--         alt="Nigeria Property Centre Mobile Apps">-->
                    <!--</p>-->
                    <!--<a target="_blank" rel="nofollow"-->
                    <!--   href="https://play.google.com/store/apps/details?id=com.nigeriapropertycentre.app&amp;utm_source=global_co&amp;utm_medium=prtnr&amp;utm_content=Mar2515&amp;utm_campaign=PartBadge&amp;pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img-->
                    <!--        width="250" alt="Get it on Google Play"-->
                    <!--        src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png"></a>-->
                    <!--<a target="_blank" rel="nofollow"-->
                    <!--   href="https://itunes.apple.com/us/app/nigeria-property-centre/id1125813120"><img class="app-store" width="220"-->
                    <!--                                                                                    alt="Get it on App Store"-->
                    <!--                                                                                    src="https://images.nigeriapropertycentre.com/download-on-the-apple-app-store.svg"></a>-->
                </div>
            </div>
        </div>
    </div>
</section>

@if(! Auth::user())
<section class="slice p-15 base hidden-ma bg-primary">
    <div class="cta-wr">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="text-normal">
                        <strong>Are you an estate agent or developer?</strong> List your property for FREE.
                    </h2>
                </div>
                <div class="col-md-4 register-section">
                    <a href="{{ url('/register') }}"
                       class="btn btn-lg btn-b-white btn-icon btn-icon-right pull-right">
                        <span>Register Now!</span>
                        <i class="fa-solid fa-check"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<script>
    $('#state').on('change', function() {
        $('#city_name').val("");    
    });

    $('#city_name').on('change', function() {
        $('#state').val("");    
    });
</script>

        <script>
            $(document).on('change','#state',function(){
                var state = $(this).val();
                console.log(state);
                $.ajax({
                    method:'post',
                    url: '{{route('state.city')}}',
                    data: {state:state,"_token":"{{csrf_token()}}"},
                    dataType:'html',
                    success:function(response){
                        console.log(response);
                        $('#city').html(response);
                        $('#city').selectpicker('refresh');
                    }
                });
            });
        </script>

        <script>
            $(document).on('change','#propType',function(){
                var propertyType = $(this).val();
                // alert(propertyType);
                if(propertyType == 1)
                {
                    $("#bed").show();
                    $("#bath").show();
                }else{
                    $("#bed").hide();
                    $("#bath").hide();
                }
            });

            $(function() {
                var minPrice = 0;
                var maxPrice = 20000;
                var minArea = 0;
                var maxArea = 500;
                var currentMinArea = $("#minAreaSize").val();;
                var currentMaxArea = $("#maxAreaSize").val();;
                var currentMinValue = $("#minPropPrice").val();
                var currentMaxValue = $("#maxPropPrice").val();

                $( "#slider-range" ).slider({
                    range: true,
                    min: minPrice,
                    max: maxPrice,
                    values: [ currentMinValue, currentMaxValue ],
                    slide: function( event, ui ) {
                        $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                        $("#min").val(ui.values[ 0 ]);
                        $("#max").val(ui.values[ 1 ]);
                        currentMinValue = ui.values[ 0 ];
                        currentMaxValue = ui.values[ 1 ];
                        // alert(currentMinValue,currentMaxValue);
                    },
                    stop: function( event, ui ) {
                        currentMinValue = ui.values[ 0 ];
                        currentMaxValue = ui.values[ 1 ];

                        // console.log(currentMaxValue,currentMinValue);
                    }
                });

                $( "#slider-range_area" ).slider({
                    range: true,
                    min: minArea,
                    max: maxArea,
                    values: [ currentMinArea, currentMaxArea ],
                    slide: function( event, ui ) {
                        $( "#area" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                        $("#minArea").val(ui.values[ 0 ]);
                        $("#maxArea").val(ui.values[ 1 ]);
                        currentMinArea = ui.values[ 0 ];
                        currentMaxArea = ui.values[ 1 ];
                        // alert(currentMinValue,currentMaxValue);
                    },
                    stop: function( event, ui ) {
                        currentMinArea = ui.values[ 0 ];
                        currentMaxArea = ui.values[ 1 ];
                    }
                });

                $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
                    "-" + $( "#slider-range" ).slider( "values", 1 ) );


                $( "#area" ).val($( "#slider-range_area" ).slider( "values", 0 ) +
                    "-" + $( "#slider-range_area" ).slider( "values", 1 ) );

            });

        </script>

    <script>
        $(document).ready(function(){

            $('#city_name3').keyup(function(){
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
                            $('#cityList3').fadeIn();
                            $('#cityList3').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                var text = $(this).text();
                var city = text.substring(0, text.indexOf(','));

                $('#city_name3').val(city);
                $('#cityList3').fadeOut();
            });

            $(document).on("click", function(event){
                var $trigger = $("#city_name3");
                if($trigger !== event.target && !$trigger.has(event.target).length){
                    $("#cityList3").slideUp("fast");
                }
            });

        });
    </script>

    <script>
        $(document).ready(function(){

            $('#city_name2').keyup(function(){
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
                            $('#cityList2').fadeIn();
                            $('#cityList2').html(data);
                        }
                    });
                }
            });

            $(document).on('click', 'li', function(){
                var text = $(this).text();
                var city = text.substring(0, text.indexOf(','));

                $('#city_name2').val(city);
                $('#cityList2').fadeOut();
            });

            $(document).on("click", function(event){
                var $trigger = $("#city_name2");
                if($trigger !== event.target && !$trigger.has(event.target).length){
                    $("#cityList2").slideUp("fast");
                }
            });

        });
    </script>

        <script>
            $(document).ready(function(){

                $('#city_name').keyup(function(){
                    var query = $(this).val();
                    // console.log(query);
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
                    console.log(text);

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

            // 

            $(document).ready(function(){
  setTimeout(function(){
    $('.alert-dismissible').hide();
},5000);
});
        </script>


    @include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>

 