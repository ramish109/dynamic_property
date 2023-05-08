{{--@extends('frontend.main')--}}
{{--@section('content')--}}
{{--    <!--Breadcrumb section starts-->--}}
{{--    @if(!env('USER_VERIFIED'))--}}
{{--    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/breadcrumb/breadcrumb_2.jpg')}}')">--}}
{{--    @else--}}
{{--    <div class="breadcrumb-section bg-h" style="background-image: url('{{asset('images/header/'.$headerImage->url)}}')">--}}
{{--    @endif--}}
{{--        <div class="overlay op-5"></div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-8 offset-md-2 text-center">--}}
{{--                    <div class="breadcrumb-menu">--}}
{{--                        <h2>{{trans('file.agent_list')}}</h2>--}}
{{--                        <span><a href="">{{trans('file.home')}}</a></span>--}}
{{--                        <span>{{trans('file.agent_list_view')}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--Breadcrumb section ends-->--}}
{{--    <!--Listing Filter starts-->--}}
{{--    <div class="filter-wrapper style1">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-8 order-xl-12 order-xl-2 order-2">--}}
{{--                    <div class="agent-details-wrapper">--}}
{{--                        <div class="row pb-30 align-items-center">--}}
{{--                            <div class="col-lg-3 col-sm-5 col-5">--}}
{{--                                <div class="item-view-mode res-box">--}}
{{--                                    <!-- item-filter-list Menu starts -->--}}
{{--                                    <ul class="nav item-filter-list" role="tablist">--}}
{{--                                        <li><a  data-toggle="tab" href="#grid-view"><i class="las la-th-large"></i></a></li>--}}
{{--                                        <li><a class="active" data-toggle="tab" href="#list-view"><i class="las la-list"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                    <!-- item-filter-list Menu ends -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4 col-sm-7 col-7">--}}
{{--                                <select class="listing-input hero__form-input  form-control custom-select" id="sort">--}}
{{--                                    <option value="1">Sort by Newest</option>--}}
{{--                                    <option value="2">Sort by Oldest</option>--}}
{{--                                    <option>Sort by Featured</option>--}}
{{--                                    <option>Sort by Price(Low to High)</option>--}}
{{--                                    <option>Sort by Price(Low to High)</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-5 col-sm-12">--}}
{{--                                <div class="item-element res-box  text-right sm-left">--}}
{{--                                    <p>Showing <span> {{($agents->currentPage()-1)* $agents->perPage()+($agents->total() ? 1:0)}} to {{($agents->currentPage()-1)*$agents->perPage()+count($agents)}}  of  {{$agents->total()}}</span>  Listings</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-wrapper">--}}
{{--                            <div class="tab-content">--}}
{{--                                <div id="grid-view" class="tab-pane fade agent-grid">--}}
{{--                                    <div class="row">--}}
{{--                                        @foreach($agents as $agent)--}}
{{--                                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12">--}}
{{--                                            <div class="single-team-member agent-item v1">--}}
{{--                                                @if(!env('USER_VERIFIED'))--}}
{{--                                                <img loading="lazy" src="{{'images/users/agent_1.jpg'}}" alt="" width="380" height="400">--}}
{{--                                                @else--}}
{{--                                                <img loading="lazy" src="{!! $agent->photo() !!}" alt="">--}}
{{--                                                @endif--}}
{{--                                                <div class="single-team-info">--}}
{{--                                                    <div class="agent-content">--}}
{{--                                                        <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>--}}
{{--                                                        <span>{{$agent->title}}</span>--}}
{{--                                                        <ul class="list">--}}
{{--                                                            <li>--}}
{{--                                                                <div class="contact-info">--}}
{{--                                                                    <div class="icon">--}}
{{--                                                                        <i class="las la-phone-alt"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="text"><a href="tel:44078767595">{{$agent->mobile}}</a></div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <div class="contact-info">--}}
{{--                                                                    <div class="icon">--}}
{{--                                                                        <i class="las la-envelope"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="text"><a href="#">{{$agent->email}}</a></div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <ul class="social-buttons style2">--}}
{{--                                                            <li><a href="{{$agent->fb}}"><i class="lab la-facebook-f"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->twitter}}"><i class="lab la-twitter"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->instagram}}"><i class="lab la-pinterest-p"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->fb}}"><i class="lab la-youtube"></i></a></li>--}}
{{--                                                        </ul>--}}
{{--                                                        <a href="{{url('/agents/'.$agent->id)}}" class="agent-link">{{trans('file.view_profile')}}</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="list-view" class="tab-pane fade show active agent-list">--}}
{{--                                    @foreach($agents as $agent)--}}
{{--                                    <div class="single-agent-box mb-30">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-5 col-sm-12">--}}
{{--                                                <div class="single-team-member agent-item">--}}
{{--                                                    @if(!env('USER_VERIFIED'))--}}
{{--                                                    <img loading="lazy" src="{{'images/users/agent_1.jpg'}}" alt="" width="380" height="400">--}}
{{--                                                    @else--}}
{{--                                                    <img loading="lazy" src="{!! $agent->photo() !!}" alt="">--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-7 col-sm-12">--}}
{{--                                                <div class="single-team-info">--}}
{{--                                                    <div class="agent-content">--}}
{{--                                                        <h4><a href="{{url('/agents/'.$agent->id)}}">{{$agent->f_name}} {{$agent->l_name}}</a></h4>--}}
{{--                                                        <span>{{$agent->title}}</span>--}}
{{--                                                        <ul class="list">--}}
{{--                                                            <li>--}}
{{--                                                                <div class="contact-info">--}}
{{--                                                                    <div class="icon">--}}
{{--                                                                        <i class="las la-phone-alt"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="text"><a href="tel:44078767595">{{$agent->mobile}}</a></div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}

{{--                                                            <li>--}}
{{--                                                                <div class="contact-info">--}}
{{--                                                                    <div class="icon">--}}
{{--                                                                        <i class="las la-envelope"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="text"><a href="#">{{$agent->email}}</a></div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <ul class="social-buttons style2">--}}
{{--                                                            <li><a href="{{$agent->fb}}"><i class="lab la-facebook-f"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->twitter}}"><i class="lab la-twitter"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->fb}}"><i class="lab la-pinterest-p"></i></a></li>--}}
{{--                                                            <li><a href="{{$agent->fb}}"><i class="lab la-youtube"></i></a></li>--}}
{{--                                                        </ul>--}}
{{--                                                        <a href="{{url('/agents/'.$agent->id)}}" class="agent-link">View Profile</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <!--pagination starts-->--}}
{{--                                    {{ $agents->links('vendor.pagination.custom') }}--}}
{{--                                <!--pagination ends-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 order-xl-12 order-xl-1 order-1">--}}
{{--                    <!--Sidebar starts-->--}}
{{--                    <div class="sidebar-right">--}}
{{--                        <div class="widget categories">--}}
{{--                            <h3 class="widget-title">{{trans('file.property_type')}}</h3>--}}
{{--                            <ul class="icon">--}}
{{--                                @foreach($categories as $category)--}}
{{--                                <li><a href="{{route('get.category',$category->name)}}">{{$category->categoryTranslation->name ?? $category->categoryTranslationEnglish->name ?? null}}</a><span>({{$category->properties->count()}})</span></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="widget recent">--}}
{{--                            <h3 class="widget-title">{{trans('file.recently_added')}}</h3>--}}
{{--                            <ul class="post-list">--}}
{{--                                @foreach($recentlyAdded as $item)--}}
{{--                                <li class="row recent-list">--}}
{{--                                    <div class="col-lg-5 col-4">--}}
{{--                                        <div class="entry-img">--}}
{{--                                            @if(!env('USER_VERIFIED'))--}}
{{--                                            <img loading="lazy" src="{{'images/thumbnail/property_1.jpg'}}" alt="" width="750" height="500">--}}
{{--                                            @else--}}
{{--                                            <img loading="lazy" src="{!! $item->photo() !!}" alt="">--}}
{{--                                            @endif--}}
{{--                                            <span>For {{$item->type =='sale' ? 'Sale' : 'Rent'}}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-7 col-8 no-pad-left">--}}
{{--                                        <div class="entry-text">--}}
{{--                                            <h4 class="entry-title"><a href="{{route('front.property',['property'=>$item->id])}}">{{$item->propertyTranslation->title ?? $item->propertyTranslationEnglish->title ?? null}}</a></h4>--}}
{{--                                            <div class="property-location no-pad-lr d-flex">--}}
{{--                                                <i class="las la-map-marker-alt"></i>--}}
{{--                                                <p>{{$item->state->stateTranslation->name ?? $item->state->stateTranslationEnglish->name ?? null }}, {{$item->city->cityTranslation->name ?? $item->city->cityTranslationEnglish->name ?? null}}</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="trend-open">--}}
{{--                                                @if($item->type == 'rent')<p>${{$item->price}}<span> /month</span></p>@endif--}}
{{--                                                @if($item->type == 'sale')<p><span>starts from/</span> ${{$item->price}}</p>@endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--Sidebar ends-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--Listing Filter ends-->--}}
{{--@endsection--}}
{{--@push('script')--}}
{{--<script>--}}
{{--    $('#sort').on('change',function(){--}}
{{--        var agent = $(this).val();--}}
{{--$('.list-agent').hide();--}}
{{--        $.ajax({--}}
{{--            method:'post',--}}
{{--            url: '{{route('agent.sort')}}',--}}
{{--            data: {agent:agent,"_token":"{{csrf_token()}}"},--}}
{{--            dataType:'html',--}}
{{--            success:function(response){--}}
{{--                $('#list-view').html(response);--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--@endpush--}}

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
                <h1 class="page-title">Real Estate Agents in Nigeria<span></span></h1>
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

                        </div>
                    </div>                    

                    <div class="wp-block default product-list-filters sort-panel light-gray">
                        <div class="row">
                            <div class="col-xs-9">
                                <span>Total Agents {{ count($agents) }}</span>
                            </div>
                        </div>
                    </div>
                    @foreach($agents as $agent)
                        <div class="row p-2">
                            <div class="col-md-9 col-xs-12 voffset-10 voffset-bottom-10 agent-list">
                                <div class="property-list">
                                    <h2 itemprop="name"><a itemprop="url" href="#"><strong>{{"@".$agent->f_name}} {{$agent->l_name}}</strong></a></h2>
                                    <address itemprop="address"></i> &nbsp;{{$agent->title}}</address>
                                    <i class="fa fa-building"></i><a class="underline" href="{{url('/agents/'.$agent->id)}}"> View property listings</a>
                                </div>
                            </div>
                            <div class="col-md-3 hidden-xs text-right">
                                <img class="company-logo" itemprop="image" src="{{ asset('/images/users/tony-stark-2012-01-23-61ece6680e692.jpg') }}">
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <!--pagination starts-->
{{--                    {{ $agents->links('vendor.pagination.custom') }}--}}
                    <!--pagination ends-->

                    <!-- End -->
{{--                    <div class="paginations bg-primary">--}}
{{--                        <li class="page-item previous-page disable">--}}
{{--                            <a href="#" class="page-links">--}}
{{--                                < </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item current-page active">--}}
{{--                            <a href="#" class="page-links"> 1 </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item current-page">--}}
{{--                            <a href="#" class="page-links"> 2 </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item dots">--}}
{{--                            <a href="#" class="page-links"> .. </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item current-page">--}}
{{--                            <a href="#" class="page-links"> 10 </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item next-page">--}}
{{--                            <a href="#" class="page-links"> > </a>--}}
{{--                        </li>--}}
{{--                    </div>--}}

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
                    <div id="advancedSearchFilters" class="panel panel-default panel-sidebar-1 hidden-xs">
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
                                            <select name="type" id="tid" class="form-control">
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
                    </div>


                    <!--<div class="panel panel-default panel-sidebar-1 hidden-ma property-availability-count">-->
                    <!--    <div class="panel-heading">-->
                    <!--        <h2><i class="fa fa-chart-bar"></i>&nbsp; Available Property</h2>-->
                    <!--    </div>-->
                    <!--    <div class="panel-body">-->
                    <!--        <h3>Currently available for sale in Nigeria</h3>-->
                    <!--        <div class="availability-stats">-->
                    <!--            <table id="allProperty" class="table voffset-20 voffset-bottom-20">-->
                    <!--                <tbody>-->
                    <!--                <tr>-->
                    <!--                    <th>Property Type</th>-->
                    <!--                    <th class="text-center">Count</th>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Flats</a></td>-->
                    <!--                    <td class="text-center"><a href="#">6,197</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Houses</a></td>-->
                    <!--                    <td class="text-center"><a href="#">37,578</a>-->
                    <!--                    </td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">15,086</a>-->
                    <!--                    </td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Commercial Property</a></td>-->
                    <!--                    <td class="text-center"><a href="#">2,251</a></td>-->
                    <!--                </tr>-->
                    <!--                </tbody>-->
                    <!--            </table>-->
                    <!--            <table id="flats-houses" class="table">-->
                    <!--                <tbody>-->
                    <!--                <tr>-->
                    <!--                    <th>Type</th>-->
                    <!--                    <th class="text-center">1 bed</th>-->
                    <!--                    <th class="text-center">2 bed</th>-->
                    <!--                    <th class="text-center">3 bed</th>-->
                    <!--                    <th class="text-center">4 bed</th>-->
                    <!--                    <th class="text-center">5 bed</th>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Flats</a></td>-->
                    <!--                    <td class="text-center"><a href="#">516</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">2,090</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">2,854</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">500</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">87</a>-->
                    <!--                    </td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Houses</a></td>-->
                    <!--                    <td class="text-center"><a href="#">214</a></td>-->
                    <!--                    <td class="text-center"><a href="#">1,610</a></td>-->
                    <!--                    <td class="text-center"><a href="#">4,606</a></td>-->
                    <!--                    <td class="text-center"><a href="#">16,604</a></td>-->
                    <!--                    <td class="text-center"><a href="#">11,153</a></td>-->
                    <!--                </tr>-->
                    <!--                </tbody>-->
                    <!--            </table>-->
                    <!--            <table id="land" class="table voffset-20">-->
                    <!--                <tbody>-->
                    <!--                <tr>-->
                    <!--                    <th>Land Type</th>-->
                    <!--                    <th class="text-center">Count</th>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Residential-->
                    <!--                            Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">7,727</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Commercial-->
                    <!--                            Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">1,123</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Industrial-->
                    <!--                            Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">86</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Mixed-use Land</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">4,493</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Other Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">1,189</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">All Land</a></td>-->
                    <!--                    <td class="text-center"><a href="#">15,086</a>-->
                    <!--                    </td>-->
                    <!--                </tr>-->
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
                                
                            </ul>
                        </div>
                    </div>
                    <!-- Start -->
                    <!--<div class="panel panel-default panel-sidebar-1 announcement hidden-ma hidden-xs">-->
                    <!--    <div class="panel-body text-center">-->
                    <!--        <a title="Market your property on Nigeria Property Centre" href="#">-->
                    <!--            <h3 class="title">Advertise/market your property on Nigeria Property Centre</h3>-->
                    <!--        </a>-->
                    <!--        <a title="Market your property on Nigeria Property Centre"-->
                    <!--           class="btn btn-alt voffset-15" href="#">-->
                    <!--            <span>Get Started!</span>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--</div>-->
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
                            <span>/ Agent list</span>
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
