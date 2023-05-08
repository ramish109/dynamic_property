@extends('admin.main') 
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">

                        <div class="act-title d-flex justify-content-between">
                            <h5>Owners Management</h5><br>
                            <a href="{{route('admin.ownercreate')}}" class="btn v3">Add Owner</a>

                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">
                                    
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th>SI</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Credits</th>
                                            <th>Role Type</th>
                                            <th>Number of Properties</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @php $i=1; @endphp
                                    @foreach($owners as $owner)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$owner->username}}</td>
                                            <td>{{$owner->email}}</td>
                                            <td>{{$owner->mobile}}</td>
                                            <td>{{$owner->packageUser->sum('price')}}</td>
                                            <td>{{$owner->type}}</td>
                                            <td>{{$owner->properties->count()}}</td>
                                            <th>{{date('d-m-Y', strtotime($owner->created_at))}}</th>
                                            <td>                                          
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{route('admin.owneredit',$owner->id)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 
                                                    | <form action="{{route('admin.ownerdestroy',$owner->id)}}" method="GET">
                                                        {{csrf_field()}}
                                                        {{method_field("DELETE")}}
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                                                    </form>
                                                </div>
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