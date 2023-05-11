@extends('admin.main') 
@section('content')
<?php $isAdmin = (Auth::user()->type == 'admin') ? true : false  ?>
    <div class="dash-content"> 
        <div class="container-fluid"> 
 
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">

                        <div class="act-title d-flex justify-content-between">
                            <h5>Customer Management</h5><br>
                            @if($isAdmin)
                            <a href="{{route('admin.individualcreate')}}" class="btn v3">Add Individual</a>
                            @endif
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
                                            @if($isAdmin)
                                                <th>Credits</th>
                                            @endif
                                            <th>Role Type</th>
                                            <th>Number of Properties</th>
                                            <th>Created At</th>
                                            @if($isAdmin)
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @php $i=1; @endphp
                                    @foreach($individuals as $individual)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$individual->username}}</td>
                                            <td>{{$individual->email}}</td>
                                            <td>{{$individual->mobile}}</td>
                                            @if($isAdmin)
                                                <td>{{$individual->packageUser->sum('price')}}</td>
                                            @endif
                                            <td>{{$individual->type}}</td>
                                            <td>{{$individual->properties->count()}}</td>
                                            <th>{{date('d-m-Y', strtotime($individual->created_at))}}</th>
                                            @if($isAdmin)
                                                <td>                                          
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{route('admin.individualedit',$individual->id)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 
                                                        | <form action="{{route('admin.individualdestroy',$individual->id)}}" method="GET">
                                                            {{csrf_field()}}
                                                            {{method_field("DELETE")}}
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                   
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