@extends('admin.main') 
@section('content')

    <div class="dash-content"> 
        <div class="container-fluid"> 

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">

                        <div class="act-title d-flex justify-content-between">
                            <h5>Enroll in <strong>{{$package->name}} Package</strong></h5><br>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">
                                    
                                    <thead>
                                        <tr class="invoice-headings">
                                            <th>SI</th>
                                            <th>Name</th>
                                            <th>Role Type</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Items</th>
                                            <th>Active At</th>
                                            <th>Expire At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @php $i=1; @endphp
                                    @foreach($enrolls as $enroll)
                                        @if(isset($enroll->user))
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$enroll->user->username}}</td>
                                            <td>
                                                @if($enroll->user->type == 'user')
                                                    <span class="badge badge-light border p-2">Agent</span>
                                                @else
                                                    <span class="badge badge-light border p-2">{{$enroll->user->type}}</span>
                                                @endif
                                            </td>
                                            <td>{{$enroll->user->email}}</td>
                                            <td>{{$enroll->user->mobile}}</td>
                                            <td>{{$enroll->item}}</td>
                                            <td>{{date('d-m-Y', strtotime($enroll->active_at))}}</td>
                                            <td>{{date('d-m-Y', strtotime($enroll->expire_at))}}</td>
                                        </tr>
                                        @endif
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