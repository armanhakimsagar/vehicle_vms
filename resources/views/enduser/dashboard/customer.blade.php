@extends('layouts.enduser.dashboard.master')

@section('content')
<link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
<script src="{{asset('assets/js/jquery.easy-autocomplete.min.js')}}"></script>
<link href="{{asset('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" />
<style>
.kt-menu__nav {
    padding: 0px 0px 0px 13px !important;
}

.easy-autocomplete input {
    border-color: #ccc;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
    color: #555;
    float: none;
    padding: 6px 12px;
    width: 250px !important;
}

.easy-autocomplete-container {
    left: 0;
    position: absolute;
    width: 250px !important;
    z-index: 2;
}

.crm_status_badge {
    height: 10px;
    width: 10px;
}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Customer </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid customer_data_list">


        <!--Begin::Row-->
        <div class="row all_client">
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">At a glance</h5>
                        </div>
                    </div>


                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card custom-card"
                                    style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center"></i>Total Customer</h5>
                                        <h5 class="card-title text-center"></h5>
                                    </div>
                                </div>

                            </div>
                            @php
                            $i = 0;
                            $img =['b.png', 'v.png', 'br.png', 'r.png', 'bg-7.jpg'];
                            @endphp

                        </div>
                    </div>
                </div>
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Filter customer list</h5>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form id="filterForm">
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <select class="form-control kt-select2-status" name="status" id="filter_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <select class="form-control kt-select2-2" name="global_status"
                                        id="filter_global_status">
                                        @php generate_simple_dropdown('combo_data', 'name', 'type=1') @endphp

                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <select class="form-control kt-select2-employee" id="employee_list">
                                        @php generate_simple_dropdown('users', 'name') @endphp

                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <select class="form-control kt-select2-district" name="district" id="district_list">
                                        @php generate_simple_dropdown('districts', 'name') @endphp


                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <select class="form-control kt-select2-thana" name="thana" id="thana_list">
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="start_date" id="start_date"
                                                class=" form-control text-center  datePicker1" autocomplete="off"
                                                placeholder="AC opening from" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="end_date" id="end_date"
                                                class=" form-control text-center datePicker2" autocomplete="off"
                                                placeholder="AC opening to" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-danger btn-sm mr-3" id="filterReset">Reset</button>
                                <button type="button" class="btn btn-success btn-sm" id="filterButton"> Show customer
                                    list </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Customer list
                                <!-- <button type='button'
                                    class='btn btn-brand btn-sm ml-3' data-toggle='modal' data-target='#assignModal'
                                    onclick='assign_user()'><i class='fas fa-exchange-alt mr-2'></i>Batch move
                                    client</button> -->
                            </h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable"
                            id="customer_table">
                            <thead>
                                <tr>
                                    <th width="2%" data-orderable="false">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" id="all_selected_customer" />
                                            <span></span>
                                        </label>
                                    </th>
                                    <th width="20px">SL</th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>User Type</th>
                                    <th>Sms</th>
                                    <th>User ID</th>
                                    <th>District</th>
                                    <th width="90px">Action</th>
                                </tr>
                            </thead>
                        </table>

                        <!--end: Datatable -->

                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>

        <!--End::Row-->

    </div>

    <!-- end:: Content -->
    <div class="customer_detail" id="load_content">

    </div>
</div>


<script>
$(document).ready(function() {

    $('.kt-select2-status').select2({
        placeholder: "Select status"
    });

    $('.kt-select2-district').select2({
        placeholder: "Select district"
    });

    $('.kt-select2-thana').select2({
        placeholder: "Select thana"
    });
    $('.kt-select2-employee').select2({
        placeholder: "Select employee"
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
    load_customer_table();
});

function load_customer_table() {
    var table = $('#customer_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/customer_datalist') }}",
            // data: $('#customerFilterForm').serialize(),
            data: {
                status: $('#filter_status').val(),
                global_status: $('#filter_global_status').val(),
                district: $('#district_list').val(),
                thana: $('#thana_list').val(),
                employee: $('#employee_list').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: '{!! csrf_token() !!}',
            },
        },
        columnDefs: [{
            orderable: false,
            className: 'all_customer_checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        columns: [{
                data: 'checkCustomer',
                name: 'checkCustomer',
                searchable: false,
                orderable: false
            },
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'customer_id',
                name: 'customer_id',
                className: 'text-center'
            },
            {
                data: 'customer_name',
                name: 'customer_name'
            },
            {
                data: 'actor_type',
                name: 'actor_type'
            },
            {
                data: 'phone',
                name: 'phone',
                className: 'text-center'
            },
            {
                data: 'hosting_company',
                name: 'hosting_company'
            },
            {
                data: 'distName',
                name: 'distName'
            },
            {
                data: 'action',
                name: 'action',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
        ],
        "aoColumnDefs": [{
            "aTargets": [0],
            "mRender": function(data, type, full) {
                return '<input type="checkbox" class="selected_customer" value="' + data + '">';
            }
        }],

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
    table.buttons().container().appendTo('#customer_table_length');
    $("#all_selected_customer").click(function() {
        $("input[class='selected_customer']").attr("checked", this.checked);
    });
}


function save_user_movement() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('admin/userMovement') }}",
        data: {
            'moving_to_user': $("#user_moving_to").val(),
            'moving_users': selected_batch_items,
            _token: "{{ csrf_token() }}",
            _method: "POST"
        },
        success: function(response) {
            if (response == 1) {
                successMsg('User has been moved successfully');
                $("#assignModal").modal('hide');
                load_customer_table();
            } else {
                errorMsg();
            }
        },
        error: function(reject) {
            errorMsg();

        }
    });
}


function save_device_movement() {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('admin/movedevice') }}",
        data: {
            'previous_customer_id': $("#previous_customer_id").val(),
            'previous_crm_exist': $("#previous_crm_exist").val(),
            'moving_to_user': $("#user_moving_to").val(),
            'moving_devices': selected_batch_items,
            _token: "{{ csrf_token() }}",
            _method: "POST"
        },
        success: function(response) {
            if (response == 1) {
                successMsg('Device has been moved successfully');
                $("#assignModal").modal('hide');
                load_customer_table();
            } else {
                errorMsg();
            }
        },
        error: function(reject) {
            errorMsg();

        }
    });
}


function reset_password(id) {
    $("#load_modal_content").load("{{ url('client_reset_password') }}/" + id);
}

$('#filterButton').click(function(e) {
    e.preventDefault;
    console.log('filter clicked');
    load_customer_table();
});

$('#filterReset').click(function(e) {
    e.preventDefault;
    $('#filterForm')[0].reset();
    $('#filter_status').trigger('change');
    $('#filter_global_status').trigger('change');
    $('#district_list').trigger('change');
    $('#thana_list').trigger('change');
    $('#employee_list').trigger('change');
});

$(document).on('change', '#district_list', function() {
    var disId = $('#district_list').val();
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('dashboard/getThana')}}",
        data: {
            disId: disId
        },
        success: function(result) {
            if (result) {
                $('#thana_list').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});

function view_data(id) {
    $(".customer_data_list").css('display', 'none');
    $('.customer_detail').css('display', 'block');
    $("#load_content").load("{{ url('dashboard/customer_detail') }}/" + id);
}
</script>
<script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>
@endsection