@extends('admin.main') 
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 
       
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Property Request Management</h5><br>

                            <!-- <a href="{{route('admin.agents.create')}}" class="btn v3">Add Property</a> -->
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">
                                    
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th>SI</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>City</th>
                                            <th>Beds</th>
                                            <th>Budget</th>
                                            <th>Requester Type</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @php $i=1; @endphp
                                        @foreach($requests as $request)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$request->category->name}}</td>
                                            <td>{{$request->type}}</td>
                                            <td>{{$request->city->name}}</td>
                                            <td>{{$request->bed}}</td>
                                            <td>{{$request->budget}}</td>
                                            <td>{{$request->user_type}}</td>
                                            <td>{{$request->created_at}}</td>
                                            <td>
                                                @if($request->status == 1)
                                                    <span class="badge badge-success p-2">Approve</span>
                                                @else
                                                    <span class="badge badge-danger p-2">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php $auth = Auth::user(); @endphp
                                                @can('isAdmin')
                                                <a href="{{url('/admin/property-request/edit/'.$request->id)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                                                <a href="{{url('/admin/property-request/delete/'.$request->id)}}" class="edit btn btn-danger btn-sm"><i class="la la-trash"></i></a>
                                                @else

                                                <a href="{{url('/admin/property-request/show/'.$request->id)}}" class="edit btn btn-primary btn-sm"><i class="la la-eye"> View</i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function () {
    $('#agents_table').DataTable();
});
</script>
@endpush