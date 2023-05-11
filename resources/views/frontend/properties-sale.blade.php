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
                <h1 class="page-title">Property for Sale in Nigeria <span></span></h1>
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
      
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Message</strong> {!! \Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @foreach ($properties as $property)
                        <div class="wp-block">
                            <div class="wp-block-title">
                                <h3>
                                    <a href="#">
                                        <a class="card-heading text-primary" href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a>
                                    </a>
                                </h3>
                            </div>
                            <div class="wp-block-title">
                                <div class="wp-block-title-inner">
                                    <div class="col-md-6 wp-block-title-images">
                                        <a href="#"> 
                                            <img class="sm-width-min-200-max-250-home xs-width-min-200-max-350" src="{{ asset('images/bedroom.jpeg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-6 wp-block-title-images">
                                        <div class="wp-block-title-text">
                                            <h4 class="text-primary">{{$property->title}}</h4>
                                            <p class="description">
                                                {{$property->description}}
                                            </p>
                                            <span class="pull-left">
                                    <span content="NGN" class="price text-primary">₦</span><span content="350000000.00" class="price text-primary">{{$property->price}}</span><span class="period"></span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wp-block-title-footer">
                                <ul class="aux-info">
                                    <li><i class="fa fa-bed"></i><span>{{$property->propertyDetails->bed}}</span> <span>Bedrooms</span></li>
                                    <li><i class="fa fa-bath"></i><span>{{$property->propertyDetails->bath}}</span> <span>Bathrooms</span></li>
                                    <li><i class="fa fa-arrows"></i><span>{{$property->propertyDetails->room_size}}</span> <span>sq ft</span></li>
                                    <li><i class="fa fa-car"></i><span>{{$property->propertyDetails->garage}}</span> <span>Parking Spaces</span></li>
                                    @can('isIndividual')
                                        @if(Auth::user()->is_email_verified == 1)
                                            @php $save_property_exist = $property->save_property; @endphp

                                            @if($save_property_exist != null)
                                                @if($property->save_property->status == 1)
                                                    <li><a href="{{ route('property.save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart"></i><span>Saved Property</span></a></li>
                                                @elseif($property->save_property->status == 0)
                                                    <li><a href="{{ route('property.not-save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart"></i><span>Unsaved Property</span></a></li>
                                                @endif
                                            @else
                                                <li><a href="{{ route('property.not-save', ['user_id' => Auth::user()->id, 'property_id'=> $property->id]) }}"><i class="fa fa-heart"></i><span>Save Property</span></a></li>
                                            @endif
                                        @endif
                                    @endcan

                                </ul>
                            </div>
                        </div>
                    @endforeach
                    
                    
                   <div class="container " style="text-align:center">
                        <div class="panel panel-default pt-3 border-0">
                        <?php 
                            if( isset($data) ){ 
                                
                                $url= "&_token=".$data['_token']."&title=".$data['title']."&category_id=".$data['category_id']."&property_type=".$data['property_type']."&bed=".$data['bed']."&bath=".$data['bath']."&minPrice=".$data['minPrice']."&maxPrice=".$data['maxPrice'];
                            } else { $url='';}
                        ?>  
 
                        @if ($properties->hasPages())
                            <nav aria-label="..." >
                                <ul class="pagination pagination" style="display:inline-flex; text-align:left">
                                    {{-- Previous Page Link --}}
                                    @if ($properties->onFirstPage())
                                        <li class="page-item disabled"><a class="page-link">Previous</a></li>
                                    @else
                                        <li class="page-item"><a  class="page-link" href="{{ $properties->previousPageUrl().$url }}" rel="prev">Previous</a></li>
                                    @endif

                                    <?php if(! isset($data)){ ?>
                                        @if($properties->currentPage() > 3)
                                            <li class="page-item hidden-xs"><a class="page-link" href="{{ $properties->url(1) }}">1</a></li>
                                        @endif
                                        @if($properties->currentPage() > 4)
                                            <li class="page-item"><a class="page-link">...</a></li>
                                        @endif
                                        @foreach(range(1, $properties->lastPage()) as $i)
                                            @if($i >= $properties->currentPage() - 2 && $i <= $properties->currentPage() + 2)
                                                @if ($i == $properties->currentPage())
                                                    <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="{{ $properties->url($i) }}">{{ $i }}</a></li>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($properties->currentPage() < $properties->lastPage() - 3)
                                            <li class="page-item"><a class="page-link">...</a></li>
                                        @endif
                                        @if($properties->currentPage() < $properties->lastPage() - 2)
                                            <li class="page-item hidden-xs"><a class="page-link" href="{{ $properties->url($properties->lastPage()) }}">{{ $properties->lastPage() }}</a></li>
                                        @endif
                                    <?php } ?>    

                                    {{-- Next Page Link --}}
                                    @if ($properties->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{$properties->nextPageUrl().$url}}" rel="next">Next Page</a></li>
                                    @else
                                        <li class="page-item disabled"><a class="page-link">Next Page</a></li>
                                    @endif
                                </ul>
                                </nav>
                            @endif
                            
                        </div>
                    </div>
                    
                    
{{--                    <div class="paginations bg-primary">--}}
    {{--                        <li class="page-item previous-page disable bg-primary">--}}
    {{--                            <a href="#" class="page-links"> < </a>--}}
    {{--                        </li>--}}
    {{--                        <li class="page-item current-page active bg-primary">--}}
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
                    <div class="container">
                        <div class="panel panel-default">
                            <h4 class="panel-title text-center">
                                <a data-toggle="collapse" data-parent="#browseLocations" href="#collapseOne"
                                   class="collapsed" aria-expanded="false" id="collapse-data-browser">
                                    FAQs&nbsp; <i style="font-size:120%" class="fa fa-angle-down"></i>
                                </a>
                            </h4>
                            <div class="panel-body text-center">
                                <div class="voffset-30">
                                    <h3 class="section-title text-normal">How many flats, houses, land and
                                        commercial property for sale in Nigeria are available?
                                    </h3>
                                    <div>
                                        <div class="voffset-5">
                                            <!-- There are 861,720 listings and <strong>60,125</strong> available flats,
                                            houses, land and commercial property for sale in Nigeria.
                                            <br>
                                            <p>You can view and filter the list of property by price, furnishing and
                                                recency.
                                            </p> -->
                                            @if(isset($faqs))
                                            {{$faqs}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--<div class="sidebar-section">-->
                    <!--    <div class="panel panel-default light-gray f13">-->
                    <!--        <div class="panel-body">-->
                    <!--            Can't find what you're looking for?&nbsp;-->
                    <!--            <a class="btn btn-alt btn-sm" href="{{ url('/properties/post-request')}}">-->
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
                    <!--                            Land</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">7,727</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Commercial-->
                    <!--                            Land</a>-->
                    <!--                    </td>-->
                    <!--                    <td class="text-center"><a href="#">1,123</a></td>-->
                    <!--                </tr>-->
                    <!--                <tr>-->
                    <!--                    <td><a href="#">Industrial-->
                    <!--                            Land</a>-->
                    <!--                    </td>-->
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
                    <!--                    class="fab fa-whatsapp"></i></a>-->
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
                                        estate agents in Nigeria</a>
                                </li>
                                <!--<li><span class="fa-li"><i class="fa fa-users"></i></span><a href="#">View a list of-->
                                <!--        property developers in Nigeria</a>-->
                                <!--</li>-->
                            </ul>
                        </div>
                    </div>
                    <!-- Start -->
                    <!--<div class="panel panel-default panel-sidebar-1 announcement hidden-ma hidden-xs">-->
                    <!--    <div class="panel-bodys text-center">-->
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
                            <span>/ For Sale</span>
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