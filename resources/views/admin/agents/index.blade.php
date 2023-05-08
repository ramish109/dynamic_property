@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Agent Management</h5><br>
                            @if($user && $user->type == 'admin')
                            <a href="{{route('admin.agents.create')}}" class="btn v3">Add Agent</a>
                            @endif
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table table-bordered text-center" id="agents_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Sl</th>
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
    (function($){
        "use strict";
        $('#agents_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.agents.index') }}"
            },
            columns:[
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'credits',
                    name: 'credits'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'properties',
                    name: 'properties'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    })(jQuery);
</script>

@endpush