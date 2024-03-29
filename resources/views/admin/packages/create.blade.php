@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('admin.packages.store')}}" method="POST">
                        @csrf
                        <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>Create Package :</h5>
                        </div> 
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label>Package Name:</label>
                                        <input type="text" name="name" class="form-control filter-input" placeholder="Package Name">
                                        @if($errors->has('name'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input id="stackedCheck1" name="is_free" class="form-check-input" type="checkbox" data-toggle="toggle">
                                        <label for="stackedCheck1" class="form-check-label">Free Package?</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input id="stackedCheck1" name="is_featured" class="form-check-input" type="checkbox" data-toggle="toggle">
                                        <label for="stackedCheck1" class="form-check-label">Featured</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Package Type: </label>
                                    <select class="listing-input hero__form-input form-control custom-select {{ $errors->has('package_type') ? 'has-error' : '' }}" name="package_type">
                                        <option value="">Select</option>
                                        <option value="quarterly">Quarterly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        
                                    </select>
                                    @if($errors->has('package_type'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('package_type') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                        <label>Price</label>
                                        <input type="text" name="price" id="price" class="form-control filter-input" placeholder="Package Price">
                                        @if($errors->has('price'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('credits') ? 'has-error' : '' }}">
                                        <label>Credit/Post: </label>
                                        <input type="number" name="credits" id="price" class="form-control filter-input" placeholder="Credit Per Post">
                                        @if($errors->has('credits'))
                                            <span class="help-block text-danger">
                                            <strong> {{ $errors->first('credits') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Currency</label>
                                    <select class="listing-input hero__form-input  form-control custom-select {{ $errors->has('currency_id') ? 'has-error' : '' }}" name="currency_id">
                                        <option value="">Select</option>
                                        <!-- <option value="1">BDT</option>
                                        <option value="2">USD</option> -->
                                        <option value="3">NAIRA</option>
                                    </select>
                                    @if($errors->has('currency_id'))
                                        <span class="help-block text-danger">
                                            <strong> {{ $errors->first('currency_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label>Validity</label>
                                    <input type="number" name="validity" class="form-control filter-input" placeholder="Package Validity(in days)">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Property Listing:</label>
                                        <input type="text" name="listing" class="form-control filter-input" placeholder="Hom many Listing">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Featured Property: </label>
                                        <input type="text" name="featured" class="form-control filter-input" placeholder="How Many Featured Property">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Status:</label>
                                    <select class="listing-input hero__form-input  form-control custom-select" name="status">
                                        <option value="1">Published</option>
                                        <option value="0">Pending</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Property Gallery</label>
                                    <input type="number" name="gallery_images_limit" class="form-control filter-input" placeholder="Images upload limit ">
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Order:</label>
                                    <input type="number" name="order" class="form-control filter-input">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="db-add-list-wrap">
                        <div class="db-add-listing">
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="add-btn">
                                        <button class="btn v3">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection