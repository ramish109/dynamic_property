<!DOCTYPE html>
<html lang="en">
 
<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/post-a-request.css')}}"> 
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
</head>
 
<body>
@include('frontend.includes.header')

<div class="pg-opt">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <h1 class="page-title">Create Property Request<span></span></h1>
            </div>
        </div>
    </div>
</div>

<section class="slice bg-white">
    <div class="wp-section">
        <div class="container">
            @if (\Session::has('success'))
            <div class="row">
                <div class="col-md-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Property Request</strong> {!! \Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
            <form action="{{route('property-request.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    @if(Auth::check())
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    @else
                    <input type="hidden" name="user_id" value="">
                    @endif
                    <div class="wp-block default user-form no-margin">
                        <div class="form-header">
                            <h2>Request Details</h2>
                        </div>
                        <div class="form-body">
                            <fieldset>
                                @php 
                                $user = Auth::user()
                                @endphp
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <label class="select">
                                                <select name="category_id" id="cid" class="form-control">
                                                    <option value="0" selected="selected">Select category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ old('category_id') == $category->category_id ? "selected" : "" }}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <label class="select">
                                            <select name="type" class="listing-input hero__form-input  form-control custom-select" required>
                                                <option value="">Select</option>
                                                <option value="{{'sale'}}" {{ old('type') == 'sale' ? "selected" : "" }}>Sale</option>
                                                <option value="{{'rent'}}" {{ old('type') == 'rent' ? "selected" : "" }}>Rent</option>
                                            </select>
                                                <i></i>
                                            </label>
                                        </div>
                                    </div>

                                    <section class="col-sm-4 col-xs-12">
                                        <label>Bedrooms (optional)</label>
                                        <label class="select">
                                            <div id="bedroomsPanel"><select name="bed" id="bedrooms" class="form-control">
                                                    <option value="0" selected="selected">Select no. of bedrooms</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select></div>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>


                                <div class="row">
                                    <section class="col-sm-4 col-xs-12">
                                        <label>Country</label>
                                        <label class="select">
                                            <select name="country_id" id="country" class="form-control">
                                                <option value="0" selected="selected">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ old('country_id') == $country->id ? "selected" : "" }}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col-sm-4 col-xs-12">
                                        <label>State</label>
                                        <label class="select">
                                            <select name="state_id" id="state" class="form-control">
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                    <section class="col-sm-4 col-xs-12">
                                        <label>Locality (optional)</label>
                                        <label class="select">
                                            <select name="city_id" id="city" class="form-control">
                                            </select>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                            
                                    <section class="col-sm-4 col-xs-6" id="budgetPanel">
                                        <label>Budget</label>
                                        <label class="input">
                                            <i class="icon-prepend">₦</i>
                                            <input type="text" inputmode="numeric" min="0" id="budget" name="budget" placeholder="" class="form-control" value="" required>
                                        </label>
                                    </section>
                                    <section class="col-xs-12">
                                        <label class="label">Comments</label>
                                        <label class="textarea">
                                            <textarea rows="10" name="comments" id="text" placeholder="" required></textarea>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <section class="col-sm-8 col-xs-12">
                                        <label class="label">Name</label>
                                        <label class="input">
                                            <input type="text" name="name" id="name" class="form-control" value="" required>
                                        </label>
                                    </section>
                                    <section class="col-sm-4 col-xs-12">
                                        <label>I am a/an...</label>
                                        <label class="select">
                                            <div>

                                                @if(Auth::check() && Auth::user()->is_email_verified == 1)
                                                <input type="hidden" name="user_type" value="{{Auth::user()->type}}">
                                                <input type="text" name="user_type" value="{{Auth::user()->type}}" disabled>
                                                @else
                                                <select name="user_type" class="form-control">
                                                    <option value="individual" selected>Individual</option>
                                                    <option value="agent">Agent</option>
                                                    <option value="builder">Builder</option>
                                                </select>
                                                @endif
                                            </div>
                                            <i></i>
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col-sm-6 col-xs-12">
                                        <label class="label">Email</label>
                                        <label class="input">
                                        @if(Auth::check() && Auth::user()->is_email_verified == 1)
                                            <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" disabled>
                                            <input type="hidden" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                                        @else
                                            <input type="email" name="email" id="email" class="form-control" value="">
                                        @endif
                                        </label>
                                    </section>
                                    <section class="col-sm-6 col-xs-12">
                                        <label class="label">Phone No.</label>
                                        <label class="input">
                                            <input type="text" name="phone" id="phone" class="form-control" value="" inputmode="numeric" required>
                                        </label>
                                    </section>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-base btn-icon btn-icon-right voffset-bottom-10 save-request-button bg-primary" type="submit" style="border-color: #0D6EFD !important;">
                                        <span>Create Request</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@include('frontend.includes.footer')

<script>
    $(document).on('change','#country',function(){
        var country = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('get.state.request')}}',
            data: {country:country,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                console.log(response);
                $('#state').html(response);
                $('#state').selectpicker('refresh');
            }
        });
    });
</script>

<script>
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('get.city.request')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>

</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>
