@extends('admin.main')
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 
       
            <div class="row text-dark">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Property Detail</h5><br>
                        </div>

                        <div class="invoice-body">
                            
                            <div class="card" >
                                @foreach($properties as $property)
                                <div class="card-header">
                                <h1 style="font-weight:bold"><i class="las la-map-marker"></i> {{$property->city->name}}, {{$property->state->name}}, {{$property->country->name}}</h1>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="10" class="mb-4">            
                                        <tr>
                                            <td><strong><i class="las la-money-bill"></i> Price:</strong> {{$property->budget}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="las la-building"></i> Type:</strong> {{$property->type}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="las la-home"></i> Category:</strong> {{$property->category->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="las la-bed"></i> Bed:</strong> {{$property->bed}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong><i class="las la-comment"></i> Description:</strong> {{$property->comments}}</td>
                                        </tr>
                                    </table>
                                <!-- </div> -->
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h1 class="mb-2">Property Requester</h1>
                                        <ul>
                                            <li><strong><i class="las la-user"></i> Name </strong>{{ $property->name }}</li>
                                            <li><strong><i class="las la-user-tag"></i> Role </strong>{{ $property->user_type }}</li>
                                            <li><strong><i class="las la-envelope"></i> Email </strong>{{ $property->email }}</li>
                                            <li><strong><i class="las la-phone-volume"></i> Phone </strong>{{ $property->phone }}</li>
                                        </ul>
                                    </li>
                                </ul>
                                </div>

                                <!-- <div class="card-body">
                                </div> -->
                                <!-- <div class="card-body text-center">
                                <input type="text" class="form-control mb-2" placeholder="Enter Message to Requester">
                                    <a href="#" class="card-link btn btn-sm btn-primary">Send Message</a>
                                </div> -->
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
