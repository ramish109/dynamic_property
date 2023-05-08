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
                <h1 class="page-title">{{$agent->f_name}} {{$agent->l_name}} <a class="badge bg-primary">Agent</a></h1>
            </div>
        </div>
    </div>
</div>
<section class="slice bf-white">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pagination-list">
                        <div class="wp-block border-0 ">
                            <div class="wp-block-title bg-light border">About Me</div>
                            @if($agent->description != null)
                                <p class="description p-2 border" style="font-size: small">{{$agent->description}}</p>
                            @else
                                <div class="wp-block-title-text border text-center p-5">
                                    I am {{$agent->f_name}} {{$agent->l_name}} an agent. You can contact me via my contact info
                                </div>
                            @endif
                        </div>
                        
                        @foreach ($properties as $property)
                        <div class="wp-block">
                            <div class="wp-block-title">
                                <h3>
                                    <a href="{{route('front.property',['property'=>$property->id])}}">
                                        <a class="card-heading text-primary" href="{{route('front.property',['property'=>$property->id])}}">{{isset($property->propertyTranslation->title) ? $property->propertyTranslation->title : 'title'}}</a>
                                    </a>
                                </h3>
                            </div>
                            <div class="wp-block-title">
                                <div class="wp-block-title-inner">
                                    <div class="col-md-6 wp-block-title-images">
                                        <a href="{{route('front.property',['property'=>$property->id])}}">
                                            <img class="sm-width-min-200-max-250-home xs-width-min-200-max-350" src="{{ asset('images/bedroom.jpeg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-6 wp-block-title-images">
                                        <div class="wp-block-title-text">
                                            <a href="{{route('front.property',['property'=>$property->id])}}" class="text-primary">{{$property->title}}</a><br/>
                                            
                                            <i class="las la-map-marker-alt" aria-hidden="true"></i>
                                            <strong style="font-size: 0.8em">{{$property->country->countryTranslation->name ?? $property->country->countryTranslationEnglish->name ?? null}}  {{$property->state->stateTranslation->name ?? $property->state->stateTranslationEnglish->name ?? null}} {{$property->city->cityTranslation->name ?? $property->city->cityTranslationEnglish->name ?? null}}</strong>
                                            
                                            <p class="description">
                                                {{$property->description}}
                                            <a href="{{route('front.property',['property'=>$property->id])}}" class="text-decoration-underline fw-bold">Read more</a>
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
                                </ul>
                            </div>
                        </div> 
                        @endforeach

                </div>
                <div class="col-md-4">

                    <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                        <div class="panel-heading">
                            <h2><i class="fa fa-user"></i>Contact Info</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="address-list list-unstyled" style="font-size: small">
                                @if($agent->company_name)<li><strong>{{trans('file.company')}}:</strong> {{$agent->company_name}}</li>@endif
                                @if($agent->title)<li><strong>{{trans('file.title')}}:</strong> {{$agent->title}}</li>@endif
                                @if($agent->mobile_office)<li><strong>{{trans('file.mobile_office')}}:</strong> {{$agent->mobile_office}}</li>@endif
                                @if($agent->mobile)<li><strong>{{trans('file.mobile')}}:</strong> {{$agent->mobile}}</li>@endif
                                @if($agent->email)<li><strong>{{trans('file.email')}}:</strong> {{$agent->email}}</li>@endif
                                @if($agent->skype)<li><strong>{{trans('file.skype')}}:</strong> {{$agent->skype}}</li>@endif
                            </ul>
                        </div> 
                    </div>

                
                    {{-- @can('isAdmin') --}}
                    @if(Auth::user() && Auth::user()->is_email_verified == 1)
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
                                <input type="hidden" name="agent" value="{{$agent->id}}">
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
                    @endif
                    {{-- @endcan --}}

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
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>City</label>
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
                    <div class="panel panel-default panel-sidebar-1 hidden-ma property-availability-count">
                        <div class="panel-heading">
                            <h2><i class="fa fa-chart-bar"></i>&nbsp; Filter Property</h2>
                        </div>
                        <div class="panel-body">
                            <div class="availability-stats">
                                <ul class="fa-ul loffset-25">
                                    <li><a href="{{ url('/properties/rent')}}" class="text-dark">For Rent</a></li>
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
                            <span>/ Agent</span>
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

<!-- <script type="text/javascript">

    $('#SubmitForm').on('submit',function(e){
        e.preventDefault();

        let id = $('#InputId').val();
        let name = $('#InputName').val();
        let email = $('#InputEmail').val();
        let phone = $('#InputPhone').val();
        let message = $('#message').val();
        // console.log(message);
        $.ajax({
            url: "{{route('messages.store')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
                name:name,
                email:email,
                phone:phone,
                message:message,
            },
            success:function(response){
                // console.log(response);
                $('#successMsg').show();
                // alert(response.errors);
                let html = '';
                if(response.errors)
                {
                    html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                }else if(response.success){
                    // alert('submitted');
                    $('#InputName').val("");
                    $('#InputEmail').val("");
                    $('#InputPhone').val("");
                    $('#message').val("");

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Message Sent!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                console.log(response);
                }

            }
        });
    });
</script> -->

<script type="text/javascript">

    $('#SubmitForm').on('submit',function(e){
        e.preventDefault();

        let id = $('#InputId').val();
        let user = $('#InputUser').val();
        let message = $('#message').val();
        // console.log(message);
        $.ajax({
            url: "{{route('chat.store')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
                user:user,
                message:message,
            },
            success:function(response){
                $('#successMsg').show();
                let html = '';
                if(response.errors)
                {
                    html = '<div class="alert alert-danger">';
                        for (let count = 0; count < response.errors.length; count++) {
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                        $('#alert_message').fadeIn("slow");
                        $('#alert_message').html(html);
                        setTimeout(function() {
                            $('#alert_message').fadeOut("slow");
                        }, 3000);
                }else if(response.success){
                    // alert('submitted');
                    $('#message').val("");

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Message Sent!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                console.log(response);
                }

            }
        });
    });
</script>

</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
</html>