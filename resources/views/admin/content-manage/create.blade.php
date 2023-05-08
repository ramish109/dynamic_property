@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="db-add-list-wrap">
                        <div class="act-title">
                            <h5>
                                Create 
                                @if(isset($value) && $value == "otherlink")
                                    <strong>Useful Link</strong>:
                                @else
                                    <strong>{{$value}} Link:</strong>
                                @endif
                            </h5>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <div class="db-add-listing">
                            <form action="{{route('admin.contentstore')}}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="{{$value}}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" name="title" class="form-control filter-input" placeholder="Title" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Link:</label>
                                            <input type="text" name="link" class="form-control filter-input" placeholder="link" required>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Content:</label>
                                            <textarea name="content" class="form-control filter-input" id="" cols="30" rows="5" placeholder="Content here"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-5">
                                        <div class="add-btn">
                                            <button class="btn v3">Add Content</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection