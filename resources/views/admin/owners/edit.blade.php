@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid"> 
            <div class="row">
                <form action="{{route('admin.ownerupdate',$owner->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') -->
                    <input type="hidden" name="local" value="{{$locale}}">
                    <div class="col-md-12">
                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Edit Owner Profile :</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <!-- Avatar -->
                                        <div class="edit-profile-photo">
                                            @if(file_exists( public_path() . '/images/users/'.$owner->image) && $owner->image != null)
                                                <img loading="lazy" src="{{URL::asset('/images/users/'.$owner->image)}}" alt="user image" class="preview-image-before-upload">
                                            @else
                                                <img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="user image" class="preview-image-before-upload">
                                            @endif
                                            <div class="change-photo-btn">
                                                <div class="contact-form__upload-btn xs-left">
                                                    <input class="contact-form__input-file" type="file" name="image" id="photo-upload" accept="image/png, image/jpeg, image/jpg" value="{{$owner->image}}">
                                                    <span>
                                                    Upload Photos
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" value="{{$owner->type}}" name="type">
                                                <div class="form-group">
                                                    <label>First name</label>
                                                    <input type="text" name="f_name" value="{{$owner->f_name}}" class="form-control filter-input" placeholder="First Name">
                                                    @error('f_name')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last name</label>
                                                    <input type="text" name="l_name" value="{{$owner->l_name}}" class="form-control filter-input" placeholder="Last Name">
                                                    @error('l_name')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>User name</label>
                                                    <input type="text" name="username" value="{{$owner->username}}" class="form-control filter-input" placeholder="User Name">
                                                    @error('username')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company name</label>
                                                    <input type="text" name="company_name" value="{{$owner->company_name}}" class="form-control filter-input" placeholder=" Zillion Properties">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Your Title</label>
                                                    <input type="text" name="title" value="{{$owner->title}}" class="form-control filter-input" placeholder="Real estate Agent">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email id</label>
                                                    <input type="text" name="email" value="{{$owner->email}}" class="form-control filter-input" placeholder="steve@mail.com">
                                                    @error('email')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone(Office)</label>
                                                    <input type="text" name="mobile_office" value="{{$owner->mobile_office}}" class="form-control filter-input" placeholder="+880 252 333">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone(Mobile)</label>
                                                    <input type="text" name="mobile" value="{{$owner->mobile}}" class="form-control filter-input" placeholder="+880 252 333">
                                                    @error('mobile')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea class="form-control chat-msg" name="description" rows="4" placeholder="Write About Yourself ...">{{$owner->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="db-add-list-wrap">
                            <div class="act-title">
                                <h5>Social Networks</h5>
                            </div>
                            <div class="db-add-listing">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Skype url</label>
                                            <input type="text" name="skype" value="{{$owner->skype}}" class="form-control filter-input" placeholder="Skype id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook url</label>
                                            <input type="text" name="fb" value="{{$owner->fb}}" class="form-control filter-input" placeholder="Facebook id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter url</label>
                                            <input type="text" name="twitter" value="{{$owner->twitter}}" class="form-control filter-input" placeholder="Twitter id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Instagram url</label>
                                            <input type="text" name="instagram" value="{{$owner->instagram}}" class="form-control filter-input" placeholder="Instagram id">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn v3">Update</button>
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
<script type="text/javascript">

    (function (e) {
        "use strict";


        $('#photo-upload').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('.preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    })(jQuery);

</script>
@endpush
