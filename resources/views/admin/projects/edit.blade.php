@extends('admin.main')
@push('styles')

<style>
    .images-preview-div img
    {
        padding: 10px;
        max-width: 100px;
    }
</style>
@endpush
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <div class="row">
                <form action="{{route('admin.projects.update',$project[0]['id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="local" value="{{$locale}}">
                    
                    @can('isBuilder')
                        <input type="hidden" name="status" value="{{$project[0]['status']}}">
                    @endcan

                    <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Edit Project Information :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="user_id" value="{{$project[0]['user_id']}}">
                                    <input type="hidden" name="package_id" value="{{ $project[0]['package_id']}}">
                                </div>
                                @can('isAdmin')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Project Status</label>
                                            <select name="status" class="listing-input hero__form-input  form-control custom-select">
                                                <option value="">Select</option>
                                                <option value="0" {{ $project[0]['status'] == "0" ? 'selected' : ''}}>Pending</option>
                                                <option value="1" {{ $project[0]['status'] == "1" ? 'selected' : ''}}>Approved</option>
                                            </select>
                                        </div>
                                    </div>
                                @endcan
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Title</label>
                                        <input type="text" name="title" class="form-control filter-input"  value="{{$project[0]['title']}}"  placeholder="Property Title">
                                    </div> 
                                </div>

                                <div class="col-md-6">
                                    <label>Category</label>
                                    <select name="category_id" class="listing-input hero__form-input  form-control custom-select">
                                        <option>Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->category_id}}" {{ $project[0]['category_id'] == $category->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}" id="country">
                                            <option value="">Select</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_id}}" {{ $project[0]['country_id'] == $country->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country_id'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>State</label>
                                    <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state">
                                        <option value="">Select</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->state_id}}" {{ $project[0]['state_id'] == $state->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>City</label>
                                    <select name="city_id" class="listing-input hero__form-input  form-control custom-select" id="city">
                                        <option value="">Select</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->city_id}}" {{ $project[0]['city_id'] == $city->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="lat" class="form-control filter-input" value="{{$project[0]['lat']}}" placeholder="Ex: 1.462260">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="lon" class="form-control filter-input" value="{{$project[0]['lon']}}" placeholder="Ex:103.812530">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" class="form-control filter-input" value="{{$project[0]['price']}}" placeholder="$1500">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <select name="currency_id" class="listing-input hero__form-input  form-control custom-select">
                                            <option value="">Select</option>
                                            @foreach ($currencies as $currency)
                                            <option value="{{$currency->id}}" {{ $project[0]['currency_id'] == $currency->id ? 'selected' : ''}}>{{$currency->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is Featured</label>
                                        <input type="checkbox" name="is_featured" data-toggle="toggle" data-on="featured" data-off="not featured" data-onstyle="success" data-offstyle="danger" {{$project[0]['is_featured'] == 'on' ? 'checked' : ''}}>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Project Details :</h5>
                        </div>
                        <div class="db-add-listing">
                            <div class="row mb-30">
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bedrooms</label>
                                        <input type="number" name="bed" class="form-control filter-input" value="{{isset($project[0]['bed']) ? $project[0]['bed'] : ''}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Number of Bath</label>
                                        <input type="number" name="bath" class="form-control filter-input" value="{{ isset($project[0]['bath']) ? $project[0]['bath'] : ''}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Select Floor</label>
                                    <select name="floor" class="listing-input hero__form-input  form-control custom-select">
                                        <option value="">Select</option>
                                        <option value="First Floor" @if(isset($project[0]['floor'])) {{$project[0]['floor'] == 'First Floor' ? 'selected' : ''}} @endif>First Floor</option>
                                        <option value="Second Floor" @if(isset($project[0]['floor'])) {{$project[0]['floor'] == 'Second Floor' ? 'selected' : ''}} @endif>Second Floor</option>
                                        <option value="Third Floor" @if(isset($project[0]['floor'])) {{$project[0]['floor'] == 'Third Floor' ? 'selected' : ''}} @endif>Third Floor</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Size of Rooms in Sq Ft</label>
                                        <input type="text" name="room_size" class="form-control filter-input" value="{{ isset($project[0]['room_size']) ? $project[0]['room_size'] : '' }}" placeholder="144">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facilities</label>
                                        <div>

                                        @php
                                            $project_facility = $project[0]['facility_id'];
                                            $facility_id = json_decode($project_facility);
                                        @endphp
                                        @foreach($facilities as $facility)
                                            <input id="check-a" type="checkbox" name="facility_id[]" value="{{$facility->facility_id}}"
                                               
                                                    @foreach($facility_id as $f)
                                                        @if($f == $facility->id )
                                                            checked
                                                        @endif 
                                                    @endforeach 

                                            >
                                            <label for="check-a">{{$facility->name}}</label>
                                        @endforeach
                                        </div>
                            
                                        
                                    </div>
                                </div>
                        
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <label for="list_info">Description</label>
                                            <textarea name="description" class="form-control" id="list_info" rows="4" placeholder="Enter your text here">@if(isset($project[0]['description'])) {{$project[0]['description']}} @else "" @endif</textarea>
                                        </div>
                                    </form>
                                </div>
                    
                            </div>
                        </div>
                    </div>
          
                    <div class="db-add-list-wrap">

                        <div class="db-add-listing">
                            <div class="row">

                                <div class="col-md-12 mb-4">
                                    <div class="user-image mb-3 text-center">
                                        @php 
                                            $img1 = json_decode($project[0]['thumbnail'], true);
                                            $img1 = $project[0]->thumbnail;
                                            
                                        @endphp
                                            
                                        <img loading="lazy" src="{{ URL::asset('/images/thumbnail/'.$img1)  }}" alt=""  style="width: 350px;height: 254px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Thumbnail Image</label> <span class="text-danger">*</span>
                                        <input type="file" name="thumbnail" class="form-control" id="photo-upload" value="{{$project[0]['thumbnail']}}" accept="image/png, image/jpeg, image/jpg">
                                        <input type="hidden" name="old_thumbnail" value="{{$project[0]['thumbnail']}}">
                                        @error('thumbnail')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                                                   
                                <div class="col-md-12 mb-5">
                                    <div class="act-title">
                                        <h5>Gallery :</h5>
                                    </div>
                                    @php
                                    $pic = json_decode($project[0]['image_path']) ?? 
                                    $pic = json_decode('["gallery-64141555d9d11.jpg","gallery-6414155601695.jpg"]');
                                        
                                    @endphp
                             
                                    <div class="col-md-12">
                                        <div class="mt-1 text-center">
                                            <div class="images-preview-div">
                                                @foreach($pic as $key=>$p)
                                                <input type="hidden" name="oldImages[]" value="{{$p}}" multiple>
                                                <div class="d-flex" id="{{$key}}">
                                                    <img class="1" loading="lazy" src="{{ URL::asset('images/gallery/'.$p)}}" alt="slide" >
                                                    <span></span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="add-listing__input-file-box">
                                                <input class="add-listing__input-file" type="file" name="images[]" multiple="multiple" id="images" accept="image/png, image/jpeg, image/jpg">
                                                <div class="add-listing__input-file-wrap">
                                                    <i class="lnr lnr-cloud-upload"></i>
                                                    <p>Click here to upload your images</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="db-add-list-wrap">
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12 text-right sm-left">
                                    <button class="btn v3" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
<!--CKEditor JS-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // $('.ckeditor').ckeditor();
    });
</script>

<script>
    $(document).on('change','#country',function(){
        var country = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('admin.get.state')}}',
            data: {country:country,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
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
            url: '{{route('admin.get.city')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                console.log(response)
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>
<script>
    (function($) {
        "use strict";
        // Multiple images preview with JavaScript

        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.old-image').click(function(){

            var image = $(this).attr("data-id");
            var id = $(this).attr("data-property");
            // alert(key);
            $.ajax({
                url: "{{route('admin.destroy.galleryImage')}}",
                method: "GET",
                data: {id:id,image:image},
                success: function (data) {
                    // alert(data);
                    alert(data);
                    location.reload();
                    // if (data =='success') {
                    //     window.location.href = "English";
                    // }
                }
            })
            $(this).parent().parent().remove();

        });
    })(jQuery);
</script>
<script >
    $(function() {
// Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });
    });
</script>
@endpush
