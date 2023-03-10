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
                    <a href="" class="kt-subheader__breadcrumbs-link">Payment Gateway</a>
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
                    Payment Gateway List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addPaymentGateway" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Payment Gateway</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="payment_gateway_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
    <div class="vehicle_group_detail" id="load_content">

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="paymentGatewayModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Add Payment Gateway</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="savePaymentGatewayForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <input type="hidden" id="payment_gateway_id" value="0">
                        <label for="driver_name" class="col-lg-3 col-form-label">Title </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="title" id="title">
                            <small id="title-error" class="text-danger" ></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-lg-3 col-form-label">Description </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description" cols="30" rows="2" id="description"></textarea>
                            <small id="description-error" class="text-danger" ></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                            <select name="status" class="form-control kt-select2-2" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <small id="status-error" class="text-danger" ></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-lg-3 col-form-label">Logo</label>
                        <div class="col-lg-4">
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                <div>
                                    <img class="company_logo_holder" id="img-crop" src="{{asset('assets/media/users/default.jpg')}}" alt="">
                                </div>
                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change logo">
                                    <i class="fa fa-pen"></i>
                                    <input type="file" name="logo" id="image" accept=".png, .jpg, .jpeg">
                                </label>
                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel logo">
                                    <i class="fa fa-times"></i>
                                </span>
                            </div>
                            <small id="logo-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <input type="submit" id="submitDriver" class="btn btn-success btn-sm float-right" value="Save">

                    <!-- <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="AssingGroupModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assign_modal_title">Add Vehicle Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveAssingGroupForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <input type="hidden" id="assign_group_id" value="0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Group Name</label>
                        <div class="col-lg-9">
                            <input type="text" disabled="disabled" class="form-control" id="assign_group_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Choose Vehicle</label>
                        <div class="col-lg-9" id="choose_vehicle">
                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                name="selected_vehicles" id="selected_vehicles">
                                @php
                                echo generate_dropdown('html',true,'vehicle_groups', 'name', 'vehicles',
                                'vehicle_group_id',
                                'vehicle_name','vehicle_no');
                                @endphp
                            </select>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Save</button>

                    <!-- <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(function() {

    var table = $('#payment_gateway_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('dashboard/getPaymentGatewayData') }}",
            data: function() {
                _token = '{!! csrf_token() !!}';
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'gateway_logo',
                name: 'gateway_logo',
                className: 'text-center'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'status',
                name: 'status',
                className: 'text-center'
            },
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
        ],

        dom: 'Blfrtip',
        buttons: [{
                extend: 'copy',
                text: '<i class="far fa-copy custom-icon"></i>',
                className: 'custom-button-class ml-3 mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'csv',
                text: '<i class="flaticon2-paper custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'excel',
                text: '<i class="far fa-file-excel custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="far fa-file-pdf custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            }
        ]
    });
    table.buttons().container().appendTo('#payment_gateway_table_length');

});

$(document).ready(function() {
    $('.custom-button-class').removeClass('btn-secondary ');
    $('.multiselect').find('b').removeClass('caret');
});

$(document).ready(function() {
    $('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.company_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });
});

$('#savePaymentGatewayForm').submit(function(event) {

    event.preventDefault();
    var id = $('#payment_gateway_id').val();
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/savePaymentGateway')}}/" + id,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Vehicle group created successfully.');
            $('#paymentGatewayModal').modal('hide');
            if (id > 0) {
                $('#payment_gateway_table').DataTable().ajax.reload(null, false);
            } else {
                $('#payment_gateway_table').DataTable().ajax.reload();
            }
            $("#savePaymentGatewayForm")[0].reset();
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

$('#saveAssingGroupForm').submit(function(event) {

    event.preventDefault();
    var id = $('#assign_group_id').val();
    $("[id$=-error]").text('');
    var selected_vehicles = $('#selected_vehicles').val().join(',');
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/vehicle-assign-group')}}/" + id,
        // data: $('#saveAssingGroupForm').serialize(),
        data: {
            id:id,
            selected_vehicles: selected_vehicles,
            _token:"{!! csrf_token() !!}"
        },
        success: function(response) {
            successMsg('Vehicle group created successfully.');
            $('#AssingGroupModal').modal('hide');
            $('#payment_gateway_table').DataTable().ajax.reload(null, false);
            $("#saveAssingGroupForm")[0].reset();
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

$('#addPaymentGateway').click(function() {
    $('#payment_gateway_id').val(0);
    $('#savePaymentGatewayForm')[0].reset();
    $('#modal_title').text('Add Payment Gateway');
    $('#paymentGatewayModal').modal('show');
})

function edit_data(id) {
    $.ajax({
        url: "{{url('dashboard/payment_gateway_details')}}/" + id,
        type: "GET",

        success: function(data) {
            console.log(data);
            $('#payment_gateway_id').val(data.id);
            $('#title').val(data.title);
            $('#status').val(data.status);
            $('#status').trigger('change');
            $('#description').text(data.description);
            $('#modal_title').text('Edit Payment Gateway');
            $('#paymentGatewayModal').modal('show');
        },
        error: function(data) {
            console.log('Error:', data);
            if (data.status === 500) {
                warningMsg('Data ID not exist!');
            }
        }
    });
}

function assign_vehicle(id) {
    $.ajax({
        url: "{{url('dashboard/vehicle-assign-group')}}/" + id,
        type: "GET",

        success: function(data) {
            console.log(data);
            $('#assign_group_id').val(data.vehicleGroup.id);
            $('#assign_group_name').val(data.vehicleGroup.name);
            $('#assign_modal_title').text('Assign to ' + data.vehicleGroup.name);
            // $('#choose_vehicle').html(data.vehicleGroups);
            $('#AssingGroupModal').modal('show');
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