@extends('admin.main') 
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 
            <ul class="act-wrap mt-3"> 
                @can('zeroCredit')
                    <div class="alert alert-warning" role="alert">
                        Please <span class="review-stat">add your credit to create your own posts here:</span>
                        <a href="{{url('admin/credits')}}" style="color:blue">Add Credit</a>
                    </div>
                @endcan         
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">

                        <div class="act-title d-flex justify-content-between">
                            <h5>Project Management</h5><br>
                            @can('hasCredit')<a href="{{route('admin.projects.create')}}" class="btn v3">Add Project</a>@endcan
                            {{-- @can('hasListing')<a href="{{route('admin.projects.create')}}" class="btn v3">Add Project</a>@endcan --}}
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">
                                    
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th>SI</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Beds</th>
                                            <th>Floor</th>
                                            <th>City</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $i=1; @endphp
                                        @foreach($projects as $project)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{($project->title) ? $project->title : 'Null'}}</td>
                                            <td>{{($project->category) ? $project->category->name :'Null' }}</td>
                                            <td>{{($project->bed) ? $project->bed : 'Null'}}</td>
                                            <td>{{($project->floor) ? $project->floor : 'Null'}}</td>
                                            <td>{{($project->city) ? $project->city->name: 'Null' }}</td>
                                            <td>{{($project->price) ? $project->price : 'Null' }}</td>
                                            <th>{{date('d-m-Y', strtotime($project->created_at))}}</th>
                                            <td>
                                                @if($project->status == 1)
                                                    <span class="badge badge-success p-2">Approved</span>
                                                @else
                                                    <span class="badge badge-danger p-2">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php $auth = Auth::user(); @endphp
                                                @can('isBuilder')
                                                <a href="{{route('admin.projects.edit',$project->id)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                                                <form action="{{route('admin.projects.destroy',$project->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    {{method_field("DELETE")}}
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                                                </form>
                                                @endcan
                                                
                                                @can('isAdmin')
                                                    <a href="{{route('admin.projects.edit',$project->id)}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a>
                                                    <form action="{{route('admin.projects.destroy',$project->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field("DELETE")}}
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                                                    </form>
                                                @endcan
                                                
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