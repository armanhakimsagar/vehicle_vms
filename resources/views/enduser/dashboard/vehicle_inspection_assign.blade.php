@extends('layouts.enduser.dashboard.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Inspection Assign </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid customer_data_list">


        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter vehicle list</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="filterForm">
                    <div class="form-group row">
                        <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-status" name="status" id="filter_status">
                                <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-vehicle-type" name="vehicle_type" id="filter_vehicle_type">
                                @php generate_simple_dropdown('vehicle_types', 'name') @endphp
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-group" name="group" id="filter_group">
                                @php generate_simple_dropdown('vehicle_groups', 'name') @endphp
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-success btn-sm" id="filterButton"> Show vehicle
                            list </button>
                        <button type="button" class="btn btn-danger btn-sm ml-3" id="filterReset">Reset</button>

                    </div>
                </form>
            </div>

        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Inspection : <b>{{$inspection->inspection_name}}</b></h5>
                </div>
            </div>

            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="vehicle_table">
                    <thead>
                        <tr>
                            <th width="2%" data-orderable="false">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" id="all_selected_vehicle" />
                                    <span></span>
                                </label>
                            </th>
                            <th width="20px">SL</th>
                            <th>Photo</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Ownership</th>
                            <th>Vehicle Group</th>
                            <th>Assign Staff</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
                <div class="row justify-content-center">
                    <a href="javascript:;" onclick="assign_to_insp()" class="btn btn-success btn-sm">Assign vehicle</a>
                </div>
            </div>
        </div>

        <!--End::Row-->

    </div>

</div>

<script>
    $(document).ready(function() {

        $('.kt-select2-status').select2({
            placeholder: "Select status"
        });

        $('.kt-select2-vehicle-type').select2({
            placeholder: "Select vehicle type"
        });

        $('.kt-select2-group').select2({
            placeholder: "Select group"
        });

        $('.datePicker1').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).on('changeDate', function() {
            $('#end_date').focus();
            console.log('closed');

        });

        $('.datePicker2').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        load_vehicle_table();
    });

    function load_vehicle_table() {
        var table = $('#vehicle_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/assign_vehicle_for_insp/'.$inspection->id) }}",
                data: {
                    status: $('#filter_status').val(),
                    vehicle_type: $('#filter_vehicle_type').val(),
                    group: $('#filter_group').val(),
                    _token: '{!! csrf_token() !!}',
                },
            },

            columns: [{
                    data: 'checkBox',
                    name: 'checkBox',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                },
                {
                    data: 'vehicle_photo',
                    name: 'vehicle_photo',
                    className: 'text-center'
                },
                {
                    data: 'vehicle_no',
                    name: 'vehicle_no',
                },
                {
                    data: 'vehicle_type',
                    name: 'vehicle_type'
                },
                {
                    data: 'ownership_name',
                    name: 'ownership_name'
                },
                {
                    data: 'vg_name',
                    name: 'vg_name'
                },
                {
                    data: 'staff_data',
                    name: 'staff_data'
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
        table.buttons().container().appendTo('#vehicle_table_length');
        $("#all_selected_vehicle").click(function() {
            $("input[class='selected_vehicle']").attr("checked", this.checked);
        });
    }


    function assign_to_insp() {
        let selected_vehicle_items = [];
        $('#vehicle_table input:checked').each(function() {
            if ($(this).val() != 'on') {
                selected_vehicle_items.push($(this).val());
            }
        });
        let count = selected_vehicle_items.length;
        let title = "Assign Confirmation";
        let message;
        let buttons = {
            confirm: {
                label: 'Yes',
                className: 'btn-success btn-sm'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger btn-sm'
            }
        };

        if (count > 1) {
            message = "<span class='text-success'>Do you want to assign those vehicles?</span>";
        } else if (count == 1) {
            message = "<span class='text-success'>Do you want to assign this vehicle?</span>";
        } else if (count == 0) {
            message = "<span class='text-danger'>Do you want to unassign all vehicles?</span>";
        }

        bootbox.confirm({
            title: title,
            message: message,
            buttons: buttons,
            callback: function(result) {
                if (result) {
                    // AJAX Request
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('dashboard/assign_vehicle_for_insp_data') }}",
                        data: {
                            vehicle_list: selected_vehicle_items,
                            inspection_id: "{{$inspection->id}}",
                            _token: '{!! csrf_token() !!}',
                        },
                        success: function(response) {
                            if (response) {
                                successMsg('Vehicle assigned successfully.');
                                $('#vehicle_table').DataTable().ajax.reload(null, false);
                            } else {
                                errorMsg();
                            }
                        }
                    });
                }
            }
        });
    }


    $('#filterButton').click(function(e) {
        e.preventDefault;
        console.log('filter clicked');
        load_vehicle_table();
    });

    $('#filterReset').click(function(e) {
        e.preventDefault;
        $('#filterForm')[0].reset();
        $('#filter_status').trigger('change');
        $('#filter_vehicle_type').trigger('change');
        $('#filter_group').trigger('change');
    });


    function view_data(id) {
        $(".customer_data_list").css('display', 'none');
        $('.customer_detail').css('display', 'block');
        $("#load_content").load("{{ url('dashboard/customer_detail') }}/" + id);
    }
</script>
@endsection