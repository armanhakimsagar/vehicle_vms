@extends('layouts.admin.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Complain </a>
                </div>
            </div>
        </div>
    </div>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid complain_data_list">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter Complain</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form action="" id="filterForm">
                    @csrf
                    <div class="form-group row">
                        <!-- <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-vehicle" name="vehicle_id" id="vehicleList">
                                <option value="0">Select vehicle</option>
                                @foreach($devices as $d)
                                <option value="{{$d->id}}">{{$d->device_name }} - {{$d->imei }} - {{$d->cd_name }}
                                </option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-2" name="status" id="status">
                                <option value="0">Open</option>
                                <option value="1">Closed</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-problem-type" name="problem_type_id"
                                id="problem_type_id">
                                <option value="0">Select Problem Type</option>
                                @foreach($tickets as $t)
                                <option value="{{$t->id}}">{{$t->t_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-manual-status" name="manual_status_id"
                                id="manual_status_id">
                                <option value="0">Select Complain Status</option>
                                @foreach($complain_status_list as $t)
                                <option value="{{$t->id}}">{{$t->t_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-district-id" name="district_id" id="district_id">
                                <option value="0">Select District</option>
                                @foreach($district_list as $d)
                                <option value="{{$d->id}}">{{$d->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-2" name="follower_id" id="follower_id">
                                <option value="0">Select Follower</option>
                                @foreach($user_list as $f)
                                <option value="{{$f->id}}">{{$f->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-2" name="reporter_id" id="reporter_id">
                                <option value="0">Select Reporter</option>
                                @foreach($user_list as $r)
                                <option value="{{$r->id}}">{{$r->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <div class="input-group"><span><strong>Open - Start/End: &nbsp;</strong></span>
                                <button type="button" class="btn btn-default pull-right" id="start_daterange-btn">
                                    <span></span>
                                    <i class="fa fa-caret-down"></i> &nbsp;
                                    <a href="javascript:;" class="btn btn-sm" id="clear_start_date"
                                        style="max-width:50px; height: 22px; padding: 0px 5px 5px 5px;"><i
                                            class="fa fa-times"> </i></a>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <div class="input-group"><span><strong>Close - Start/End: &nbsp; </strong> </span>
                                <button type="button" class="btn btn-default pull-right" id="end_daterange-btn">
                                    <span></span>
                                    <i class="fa fa-caret-down"></i> &nbsp;
                                    <a href="javascript:;" class="btn btn-sm" id="clear_end_date"
                                        style="max-width:50px; height: 22px; padding: 0px 5px 5px 5px;"><i
                                            class="fa fa-times"> </i></a>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">

                        <button type="button" id="reset_fuel_log" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_complain_list" class="btn btn-success btn-sm">View
                            complain</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Complain</h5>
                                <h5 class="card-title text-center" id="total_complain_data">0</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Solved Complain</h5>
                                <h5 class="card-title text-center" id="solved_complain_data">0</h5>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">In Progress</h5>
                                <h5 class="card-title text-center" id="process_complain_data">0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Complain List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#" id="new_complain"
                                class=" add_complain btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Code</th>
                            <th>Complain Type</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Device</th>
                            <th>Follower</th>
                            <th>Reporter</th>
                            <th>District</th>
                            <th>Thana</th>
                            <!-- <th>Reminder</th> -->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <div class="complain_detail d-none" id="load_content">

    </div>
</div>
<!-- end:: Content -->


<!-- Modal -->
<div class="modal" id="complainModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Generate complain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveComplainForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <input type="hidden" id="edit_complain_id" name="edit_complain_id">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Generate Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" id="generate_date" class="form-control" disabled="disabled" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Customer</label>
                        <div class="col-lg-9">
                            <select name="customer_id" class="form-control kt-select2-2" id="edit_customer_id">
                                <option value="">Select</option>
                                @foreach($customer_list as $c)
                                <option value="{{$c->id}}">{{$c->name }}</option>
                                @endforeach
                            </select>
                            <small id="customer_id-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Device Name</label>
                        <div class="col-lg-9">
                            <select name="device_name" id="edit_device_name" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($devices as $d)
                                <option value="{{$d->id}}">{{$d->device_name }} - {{$d->imei }} - {{$d->cd_name }}
                                </option>
                                @endforeach
                            </select>
                            <small id="device_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Problem Type</label>
                        <div class="col-lg-9">
                            <select name="problem_type" id="edit_problem_type" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($tickets as $t)
                                <option value="{{$t->id}}">{{$t->t_name}}</option>
                                @endforeach
                            </select>
                            <small id="problem_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Reporter</label>
                        <div class="col-lg-9">
                            <select class="form-control kt-select2-2" name="reporter_id" id="edit_reporter_id">
                                <option value="0">Select Reporter</option>
                                @foreach($user_list as $r)
                                <option value="{{$r->id}}">{{$r->name }}
                                </option>
                                @endforeach
                            </select>
                            <small id="device_name-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Follower</label>
                        <div class="col-lg-9">
                            <select class="form-control kt-select2-2" name="follower_id" id="edit_follower_id">
                                <option value="0">Select Follower</option>
                                @foreach($user_list as $f)
                                <option value="{{$f->id}}">{{$f->name }}
                                </option>
                                @endforeach
                            </select>
                            <small id="device_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="father_name" class="col-lg-3 col-form-label">Problem Details</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="complain_details" id="edit_complain_details"
                                rows="3"></textarea>
                            <small id="complain_details-error" class="text-danger"></small>
                        </div>
                    </div>

                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    at_a_glance();
    complain_datatable();

    //Date range as a button
    $('#start_daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#start_daterange-btn span').html(start.format('DD.MM.YYYY') + ' - ' + end.format(
                'DD.MM.YYYY'))
        }
    );

    $('#clear_start_date').on('click', function() {
        //location.reload();
        $('#start_daterange-btn span').html('');
    });

    //Date range as a button
    $('#end_daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#end_daterange-btn span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'))
        }
    );

    $('#clear_end_date').on('click', function() {
        //location.reload();
        $('#end_daterange-btn span').html('');
    });



});

function edit_data(id) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ url('complain/getComplainData/edit')}}/" + id,
        success: function(result) {
            $("#modal_title").text('Edit complain');
            $("#edit_complain_id").val(result.id);
            $("#generate_date").val(result.created_at);
            $("#edit_customer_id").val(result.customer_id);
            $("#edit_device_name").val(result.object_id);
            $("#edit_problem_type").val(result.complain_type_id);
            $("#edit_report_id").val(result.report_id);
            $("#edit_follower_id").val(result.follower_id);
            $("#edit_complain_details").html(result.complain_details);
            $(".kt-select2-2").trigger('change');
            $("#complainModal").modal('show');
        },
    });
}

function view_data(id) {
    $("#load_content").load("{{ url('complain/getComplainData/view') }}/" + id);
    $(".complain_data_list").addClass('d-none');
    $('.complain_detail').removeClass('d-none');
}

function complain_datatable() {
    var start_date = $('#start_daterange-btn span').html();
    var end_date = $('#end_daterange-btn span').html();

    if (start_date != '') {
        start_date = start_date.split("-");
        var start_start = start_date[0].trim();
        var end_start = start_date[1].trim();

        start_date = start_start + '-' + end_start;
    }
    if (end_date != '') {
        end_date = end_date.split("-");
        var start_end = end_date[0].trim();
        var end_end = end_date[1].trim();

        end_date = start_end + '-' + end_end;
    }

    var table = $('#complain_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            type: "POST",
            url: "{{ url('complain/getComplainData') }}",
            data: {
                status: $('#status').val(),
                problem_type_id: $('#problem_type_id').val(),
                manual_status_id: $('#manual_status_id').val(),
                district_id: $('#district_id').val(),
                follower_id: $('#follower_id').val(),
                reporter_id: $('#reporter_id').val(),
                start_date: start_date,
                end_date: end_date,
                _token: '{!! csrf_token() !!}',
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'complain_token',
                name: 'complain_token'
            },
            {
                data: 'complain_type_name',
                name: 'complain_type_name'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'start_date',
                name: 'start_date'
            },

            {
                data: 'customer_name',
                name: 'customer_name'
            },
            {
                data: 'device_name',
                name: 'device_name'
            },
            {
                data: 'follower_name',
                name: 'follower_name'
            },
            {
                data: 'reporter_name',
                name: 'reporter_name'
            },

            {
                data: 'district_name',
                name: 'district_name'
            },
            {
                data: 'thana_name',
                name: 'thana_name'
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

        "aoColumnDefs": [{
            "aTargets": [4],
            "mRender": function(data, type, full) {
                var rowData = data.split(",");
                return rowData[0] + '<span class="badge badge-pill badge-warning">' + rowData[1] +
                    '</span>';
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
        ],
    });
    table.buttons().container().appendTo('#complain_table_length');
}

function at_a_glance() {
    var start_date = $('#start_daterange-btn span').html();
    var end_date = $('#end_daterange-btn span').html();

    if (start_date != '') {
        start_date = start_date.split("-");
        var start_start = start_date[0].trim();
        var end_start = start_date[1].trim();

        start_date = start_start + '-' + end_start;
    }
    if (end_date != '') {
        end_date = end_date.split("-");
        var start_end = end_date[0].trim();
        var end_end = end_date[1].trim();

        end_date = start_end + '-' + end_end;
    }
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('complain/complain_at_a_glance')}}",
        data: {
            status: $('#status').val(),
            problem_type_id: $('#problem_type_id').val(),
            manual_status_id: $('#manual_status_id').val(),
            district_id: $('#district_id').val(),
            follower_id: $('#follower_id').val(),
            reporter_id: $('#reporter_id').val(),
            start_date: start_date,
            end_date: end_date,
            _token: '{!! csrf_token() !!}',
        },

        success: function(result) {
            $('#total_complain_data').html(result.total_complain);
            $('#solved_complain_data').html(result.solved_complain);
            $('#process_complain_data').html(result.progress_complain);
        },
    });
}

$('#show_complain_list').click(function(event) {
    event.preventDefault();
    at_a_glance();
    complain_datatable();
});

function get_vehicle_list() {
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{ url('complain/get_vehicle_list')}}",
        success: function(result) {
            $('#vehicleList').html(result);
        },
    });
}

$(document).ready(function(e) {

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('.kt-select2-vehicle').select2({
        placeholder: "Select vehicle"
    });

    $('.kt-select2-problem-type').select2({
        placeholder: "Select problem type"
    });

    $('.kt-select2-manual-status').select2({
        placeholder: "Select complain status"
    });

    $('.kt-select2-district-id').select2({
        placeholder: "Select District"
    });

});

$(".add_complain").click(function() {
    var current = moment().format("DD MMM YYYY, hh:mm a");
    $("#modal_title").text('Generate complain');
    $('#saveComplainForm')[0].reset();
    $("#edit_complain_id").val(0);
    $('#generate_date').val(current);
    $(".kt-select2-2").trigger('change');
    $('#complainModal').modal('show');

});

$(document).on('submit', 'form#saveComplainForm', function(event) {

    event.preventDefault();

    var id = $("#edit_complain_id").val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('complain/saveComplain') }}/" + id,
        data: $('#saveComplainForm').serialize(),
        success: function(response) {
            successMsg('Complain generated successfully.');
            $('#complainModal').modal('hide');
            $('#complain_table').DataTable().ajax.reload();
            $('#saveComplainForm')[0].reset();

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

$(document).on('change', '#dayFilter', function() {
    var start_date = '';
    var end_date = '';
    if (this.value == 0) {
        start_date = null;
        end_date = null;

    } else if (this.value == 1) {
        start_date = moment().format('YYYY-MM-DD');
        end_date = moment().format('YYYY-MM-DD');

    } else if (this.value == 2) {
        start_date = moment().subtract(1, 'days').format('YYYY-MM-DD');
        end_date = moment().subtract(1, 'days').format('YYYY-MM-DD');

    } else if (this.value == 3) {
        start_date = moment().subtract(2, 'days').format('YYYY-MM-DD');
        end_date = moment().format('YYYY-MM-DD');

    } else if (this.value == 4) {
        start_date = moment().startOf('week').format('YYYY-MM-DD');
        end_date = moment().endOf('week').format('YYYY-MM-DD');

    } else if (this.value == 5) {
        start_date = moment().subtract(1, 'week').startOf('week').format('YYYY-MM-DD');
        end_date = moment().subtract(1, 'week').endOf('week').format('YYYY-MM-DD');

    } else if (this.value == 6) {
        start_date = moment().startOf('month').format('YYYY-MM-DD');
        end_date = moment().endOf('month').format('YYYY-MM-DD');

    } else if (this.value == 7) {
        start_date = moment().subtract(1, 'months').startOf('month').format('YYYY-MM-DD');
        end_date = moment().subtract(1, 'months').endOf('month').format('YYYY-MM-DD');

    }
    $('#start_date').val(start_date);
    $('#end_date').val(end_date);
});
</script>
@endsection