@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Payment Method</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid vehicle_group_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Payment Method List
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="btn method" style="display:none;"></div>
                <div style="padding-left: 15px; padding-right: 15px;" id="method_list">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered settings_table" cellspacing="0"
                                width="100%" style="border-bottom:none;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">SL</th>
                                        <th>Method Name</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($methods as $m)
                                    <tr>
                                        <td style="text-align:center;">{{$i}}</td>
                                        <td>{{$m->method_name}}</td>
                                        <td style="text-align:center;"> <button type="button" class="custom-button-class mr-2" onclick="edit_data('{{$m->id}}')"> <i class="fas fa-edit"></i> </button> </td>
                                    </tr>
                                    @php $i++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form id="paymentMethodFrom" class="kt-form kt-form--label-right">
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Method Name</label>
                                    <input type="hidden" id="method_id" value="0">
                                    <div class="col-md-8">
                                        <input name="method_name" placeholder="Method Name" class="form-control"
                                            id="method_name" type="text">
                                        <small id="method_name-error" class="text-danger"></small>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-8">
                                        <div class="form-button">
                                            <input type="reset" id="resetMethod" class="btn btn-danger btn-sm"
                                                value="Reset">
                                            <input type="submit" id="submitMethod"
                                                class="btn btn-success btn-sm float-right" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
// $(function() {

//     var table = $('#payment_gateway_table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: {
//             url: "{{ url('dashboard/getPaymentGatewayData') }}",
//             data: function() {
//                 _token = '{!! csrf_token() !!}';
//             }
//         },
//         columns: [{
//                 data: 'DT_RowIndex',
//                 name: 'DT_RowIndex',
//                 className: 'text-center'
//             },
//             {
//                 data: 'gateway_logo',
//                 name: 'gateway_logo',
//                 className: 'text-center'
//             },
//             {
//                 data: 'title',
//                 name: 'title'
//             },
//             {
//                 data: 'description',
//                 name: 'description'
//             },
//             {
//                 data: 'status',
//                 name: 'status',
//                 className: 'text-center'
//             },
//             {
//                 data: 'action',
//                 name: 'action',
//                 className: 'text-center',
//                 orderable: false,
//                 searchable: false
//             },
//         ],

//         dom: 'Blfrtip',
//         buttons: [{
//                 extend: 'copy',
//                 text: '<i class="far fa-copy custom-icon"></i>',
//                 className: 'custom-button-class ml-3 mr-2',
//                 exportOptions: {
//                     columns: ':visible :not(:last-child)'
//                 }
//             },
//             {
//                 extend: 'csv',
//                 text: '<i class="flaticon2-paper custom-icon"></i>',
//                 className: 'custom-button-class mr-2',
//                 exportOptions: {
//                     columns: ':visible :not(:last-child)'
//                 }
//             },
//             {
//                 extend: 'excel',
//                 text: '<i class="far fa-file-excel custom-icon"></i>',
//                 className: 'custom-button-class mr-2',
//                 exportOptions: {
//                     columns: ':visible :not(:last-child)'
//                 }
//             },
//             {
//                 extend: 'pdf',
//                 text: '<i class="far fa-file-pdf custom-icon"></i>',
//                 className: 'custom-button-class mr-2',
//                 exportOptions: {
//                     columns: ':visible :not(:last-child)'
//                 }
//             },
//             {
//                 extend: 'print',
//                 text: '<i class="fas fa-print custom-icon"></i>',
//                 className: 'custom-button-class mr-2',
//                 exportOptions: {
//                     columns: ':visible :not(:last-child)'
//                 }
//             }
//         ]
//     });
//     table.buttons().container().appendTo('#payment_gateway_table_length');

// });


$('#paymentMethodFrom').submit(function(event) {

    event.preventDefault();
    var id = $('#method_id').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/savePaymentMethod')}}/" + id,
        data: $('#paymentMethodFrom').serialize(),
        success: function(response) {
            successMsg('Payment method created successfully.');
            // if (id > 0) {
            //     $('#payment_gateway_table').DataTable().ajax.reload(null, false);
            // } else {
            //     $('#payment_gateway_table').DataTable().ajax.reload();
            // }
            $("#paymentMethodFrom")[0].reset();
            $('#submitMethod').val('Save');
        },
        error: function(reject) {
            errorMsg();
            if (reject.status === 422 || reject.status === 403) {
                var errors = $.parseJSON(reject.responseText);
                $.each(errors.error.message, function(key, val) {
                    console.log(key + ' : ' + val);
                    $("small#" + key + "-error").text(val[0]);
                });
            }
        }
    });
});

function edit_data(id) {
    console.log(id);
    $.ajax({
        url: "{{url('dashboard/payment_method_details')}}/" + id,
        type: "GET",

        success: function(data) {
            $('#method_id').val(data.id);
            $('#method_name').val(data.method_name);
            $('#submitMethod').val('Save Change');
        },
        error: function(data) {
            console.log('Error:', data);
            if (data.status === 500) {
                warningMsg('Data ID not exist!');
            }
        }
    });
}
</script>
@endsection