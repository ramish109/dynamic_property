@extends('admin.main')
@section('content')

<!-- <a href="{{route('admin.areas.edit',1)}}">Edit Data</a> -->

    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Areas</h5><br>

                            <a href="{{route('admin.areas.create')}}" class="btn v3">Add Area</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="city_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <!-- <th>Country</th> -->
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th style="max-width:100px">Status</th>
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
        $('#city_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax:{
                url: "{{  route('admin.areas.index') }}"
            },
            columns:[
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                // {
                //     data: 'country',
                //     name: 'country'
                // },

                {
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'city',
                    name: 'city'
                },

                {
                    data: 'state',
                    name: 'state'
                },

                {
                    data: 'status',
                    name: 'status'
                }
            ]
        });
    })(jQuery);
</script>

@endpush