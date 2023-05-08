@extends('admin.main') 
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">

                        <div class="act-title d-flex justify-content-between">
                            <h5>Useful links</h5><br>
                            <a href="{{route('admin.contentcreate', 'otherlink')}}" class="btn v3"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Link</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">

                                    <thead>
                                        <tr class="invoice-headings">
                                            <th>SI</th>
                                            <th>Title</th>
                                            <th>Permalink</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($links as $link)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$link->title}}</td>
                                            <td>{{$link->link}}</td>
                                            <td>
                                                @if($link->status == 1)
                                                <span class="badge badge-primary">Active</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>                                          
                                            <div class="d-flex justify-content-center">
                                                    <form action="{{route('admin.linkdestroy',$link->id)}}" method="GET">
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