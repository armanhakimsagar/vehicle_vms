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
                    <a href="" class="kt-subheader__breadcrumbs-link">Vehicle Group</a>
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
                        Vehicle Group List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addVehicleGroup" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Group</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="vehicle_group_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Group Name</th>
                            <th>Assigned Vehicle</th>
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
<div class="modal fade" id="vehicleGroupModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Add Vehicle Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveVehicleGroupForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <input type="hidden" id="id" value="0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Group Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" id="name">
                            <small id="name-error" class="text-danger"></small>
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
                        <div class="col-lg-9">
                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                name="selected_vehicles" id="selected_vehicles">
                                @php
                                echo generate_dropdown('html',true,'vehicle_groups', 'name', 'vehicles',
                                'vehicle_group_id',
                                'vehicle_name','vehicle_no');
                                @endphp
                            </select>
                            <small id="choose_vehicle-error" class="text-danger"></small>
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

    var table = $('#vehicle_group_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('dashboard/getVehicleGroupData') }}",
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
                data: 'name',
                name: 'name',
            },
            {
                data: 'total_assign_vehicle',
                name: 'total_assign_vehicle',
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
    table.buttons().container().appendTo('#vehicle_group_table_length');

});

$(document).ready(function() {
    $('.custom-button-class').removeClass('btn-secondary ');
});

$(document).ready(function() {
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

$('#saveVehicleGroupForm').submit(function(event) {

    event.preventDefault();
    var id = $('#id').val();
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveVehicleGroup')}}/" + id,
        data: $('#saveVehicleGroupForm').serialize(),
        success: function(response) {
            successMsg('Vehicle group created successfully.');
            $('#vehicleGroupModal').modal('hide');
            if (id > 0) {
                $('#vehicle_group_table').DataTable().ajax.reload(null, false);
            } else {
                $('#vehicle_group_table').DataTable().ajax.reload();
            }
            $("#saveVehicleGroupForm")[0].reset();
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
            choose_vehicle: selected_vehicles,
            _token:"{!! csrf_token() !!}"
        },
        success: function(response) {
            successMsg('Vehicle group created successfully.');
            $('#AssingGroupModal').modal('hide');
            $('#vehicle_group_table').DataTable().ajax.reload(null, false);
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

$('#addVehicleGroup').click(function() {
    $('#id').val(0);
    $("#saveVehicleGroupForm")[0].reset();
    $('#modal_title').text('Add Vehicle Group');
    $('#vehicleGroupModal').modal('show');
})

function edit_data(id) {
    $.ajax({
        url: "{{url('dashboard/vehicle-group-detail')}}/" + id,
        type: "GET",

        success: function(data) {
            console.log(data);
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#modal_title').text('Edit Vehicle Group');
            $('#vehicleGroupModal').modal('show');
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