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
                <h1 class="page-title">{{$builder->f_name}} {{$builder->l_name}} <a class="badge bg-primary">Builder</a></h1>
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
                            @if($builder->description != null)
                                <p class="description p-2 border" style="font-size: small">{{$builder->description}}</p>
                            @else
                                <div class="wp-block-title-text border text-center p-5">
                                    I am {{$builder->f_name}} {{$builder->l_name}} an builder. You can contact me via my contact info
                                </div>
                            @endif
                        </div>
                    <!-- start -->
                        @foreach($projects as $project)
                            @if($project->count() > 0)
                            <div class="wp-block">
                                <div class="wp-block-title">
                                    <h3>
                                        <a href="">
                                            <a class="card-heading text-primary" href="">{{isset($project->title) ? $project->title : 'title'}}</a>
                                        </a>
                                    </h3>
                                </div>
                                <div class="wp-block-title">
                                    <div class="wp-block-title-inner">
                                        <div class="col-md-6 wp-block-title-images">
                                            <a href="">
                                                <img class="sm-width-min-200-max-250-home xs-width-min-200-max-350" src="{{ asset('images/bedroom.jpeg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-6 wp-block-title-images">
                                            <div class="wp-block-title-text">
                                                <a href="" class="text-primary">{{$project->title}}</a><br/>
                                                <i class="las la-map-marker-alt" aria-hidden="true"></i>
                                                <strong style="font-size: 0.8em">{{$project->country->name ?? $project->country->name ?? null}} , {{$project->state->name ?? $project->state->name ?? null}}, {{$project->city->name ?? $project->city->name ?? null}}</strong>
                                                <p class="description">
                                                    {{$project->description}}
                                                <a href="" class="text-decoration-underline fw-bold">Read more</a>
                                                </p>
                                                <span class="pull-left">
                                            <span content="NGN" class="price text-primary">₦</span><span content="350000000.00" class="price text-primary">{{$project->price}}</span><span class="period"></span> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wp-block-title-footer">
                                    <ul class="aux-info">
                                        <li><i class="fa fa-bed"></i><span>{{$project->bed}}</span> <span>Bedrooms</span></li>
                                        <li><i class="fa fa-bath"></i><span>{{$project->bath}}</span> <span>Bathrooms</span></li>
                                        <li><i class="fa fa-arrows"></i><span>{{$project->room_size}}</span> <span>sq ft</span></li>
                                        <li><i class="fa fa-car"></i><span>{{$project->garage}}</span> <span>Parking Spaces</span></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach
                
 
                </div>
                <div class="col-md-4">

                    <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                        <div class="panel-heading">
                            <h2><i class="fa fa-user"></i>Contact Info</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="address-list list-unstyled" style="font-size: small">
                                @if($builder->company_name)<li><strong>{{trans('file.company')}}:</strong> {{$builder->company_name}}</li>@endif
                                @if($builder->title)<li><strong>{{trans('file.title')}}:</strong> {{$builder->title}}</li>@endif
                                @if($builder->mobile_office)<li><strong>{{trans('file.mobile_office')}}:</strong> {{$builder->mobile_office}}</li>@endif
                                @if($builder->mobile)<li><strong>{{trans('file.mobile')}}:</strong> {{$builder->mobile}}</li>@endif
                                @if($builder->email)<li><strong>{{trans('file.email')}}:</strong> {{$builder->email}}</li>@endif
                                @if($builder->skype)<li><strong>{{trans('file.skype')}}:</strong> {{$builder->skype}}</li>@endif
                            </ul>
                        </div>
                    </div>

                    @if(Auth::user() && Auth::user()->is_email_verified == 1)
                    {{-- @can('isIndividual') --}}
                    <div class="panel panel-default panel-sidebar-1 hidden-ma hidden-xs">
                        <div class="panel-heading">
                            <h2><i class="fa fa-user"></i>Message To Builder</h2>
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
                                <input type="hidden" name="agent" value="{{$builder->id}}">
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
                                            <span>Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    {{-- @endcan --}}
                    @endif



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
                            <span>/ Builder</span>
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