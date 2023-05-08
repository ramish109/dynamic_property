@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('admin.property-request.update',$requests[0]->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
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
                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Edit Request :</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Category</label>
                                                <select name="category_id" class="listing-input hero__form-input  form-control custom-select" disabled>
                                                    <option>Select</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}"  {{ $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Type</label><span class="text-danger">*</span>
                                                    <select name="type" class="listing-input hero__form-input  form-control custom-select" disabled>
                                                        <option value="{{'Rent'}}" {{ $requests[0]->type == 'rent' ? 'selected' : ''}}>Rent</option>
                                                        <option value="{{'Sale'}}" {{ $requests[0]->type == 'sale' ? 'selected' : ''}}>Sale</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country:</label>
                                                    <select name="country_id" class="listing-input hero__form-input  form-control custom-select {{ $errors->has('country_id') ? 'has-error' : '' }}" id="country" disabled>
                                                        <option value="">Select</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}" {{ $requests[0]->country_id == $requests[0]->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('country_id'))
                                                        <span class="help-block text-danger">
                                                        <strong> {{ $errors->first('country_id') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>State</label>
                                                <select name="state_id" class="listing-input hero__form-input  form-control custom-select" id="state" disabled>
                                                    <option value="">Select</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->state_id}}" {{ $requests[0]->state_id == $requests[0]->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>City</label>
                                                <select name="city_id" class="listing-input hero__form-input  form-control custom-select" id="city" disabled>
                                                    <option value="">Select</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->city_id}}" {{ $requests[0]->city_id == $requests[0]->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number of Bedrooms</label>
                                                    <input type="text" name="bed" class="form-control filter-input" value="{{isset($requests[0]->bed) ? $requests[0]->bed : ''}}" disabled>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Budget</label>
                                                    <input type="text" name="budget" value="{{isset($requests[0]->budget) ? $requests[0]->budget : ''}}" class="form-control filter-input" placeholder="budget" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" name="date" value="{{isset($requests[0]->created_at) ? $requests[0]->created_at : ''}}" class="form-control filter-input" placeholder="date" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Comment</label>
                                                    <textarea class="form-control chat-msg" name="comment" rows="4" placeholder="Write About Property" disabled>{{$requests[0]->comments}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <input type="text" name="role" value="{{isset($requests[0]->user_type) ? $requests[0]->user_type : ''}}" class="form-control filter-input" placeholder="Role" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Requester Name</label>
                                                    <input type="text" name="requester" value="{{isset($requests[0]->name) ? $requests[0]->name : ''}}" class="form-control filter-input" placeholder="Requester Name" disabled>
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email id</label>
                                                    <input type="text" name="email" value="{{isset($requests[0]->email) ? $requests[0]->email : ''}}" class="form-control filter-input" placeholder="steve@mail.com" disabled>
                                                    @error('email')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone(Mobile)</label>
                                                    <input type="text" name="mobile" value="{{isset($requests[0]->phone) ? $requests[0]->phone : ''}}" class="form-control filter-input" placeholder="+880 252 333" disabled>
                                                    @error('mobile')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label><span class="text-danger">*</span>
                                                    <select name="status" class="listing-input hero__form-input  form-control custom-select">
                                                        <option value="1" {{ $requests[0]->status == 1 ? 'selected' : ''}}>Approve</option>
                                                        <option value="0" {{ $requests[0]->status == 0 ? 'selected' : ''}}>Reject</option>
                                                    </select>
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
                    </div>
           
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

<script>
    $(document).on('change','#country',function(){
        var country = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('admin.get.state')}}',
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
            url: '{{route('admin.get.city')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>

@endpush
