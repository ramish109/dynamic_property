@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Payment Details</h5><br>
                           
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="datatable-init nowrap invoice-table table table-bordered text-center" id="agents_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th>Sl</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Package Name</th> 
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                      
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @if( $paymentDetails )
                                            @foreach( $paymentDetails as $key => $paymentDetail )
                                                <tr id="rowID-{{ $key + 1 }}">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ ($paymentDetail->user) ? $paymentDetail->user->username : NULL }}</td>
                                                    <td>{{ ($paymentDetail->user) ? $paymentDetail->user->email : NULL }}</td>
                                                    <td>{{($paymentDetail->package) ? $paymentDetail->package->name : NULL }}</td>
                                                    <td>{{ $paymentDetail->amount.'.00' }}</td>
                                                    <td>{{ $paymentDetail->description }}</td>
                                                    <td>{{ $paymentDetail->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
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
    // (function($){
    //     "use strict";
    //     $('#agents_table').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         responsive: true,
    //         ajax:{
    //             url: "{{  route('admin.payment.detail') }}"
    //         },
    //         columns:[
    //             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //             {
    //                 data: 'user_id',
    //                 name: 'user_id'
    //             },
    //             {
    //                 data: 'amount',
    //                 name: 'amount'
    //             },
    //             {
    //                 data: 'description',
    //                 name: 'description'
    //             },
    //             {
    //                 data: 'package_id',
    //                 name: 'package_id'
    //             },
    //             {
    //                 data: 'type',
    //                 name: 'type'
    //             },
    //             {
    //                 data: 'properties',
    //                 name: 'properties'
    //             },
    //             {
    //                 data: 'created_at',
    //                 name: 'created_at'
    //             },
    //             {
    //                 data: 'action',
    //                 name: 'action',
    //                 orderable: false
    //             }
    //         ]
    //     });
    // })(jQuery);
</script>

@endpush