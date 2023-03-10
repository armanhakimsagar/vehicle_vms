@extends('layouts.enduser.dashboard.master')

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

                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-2" name="complain_sector" id="complain_sector">
                                <option value="0">Select Complain Sector</option>
                                @foreach ($modules as $m)
                                @if ($m->assigned_id < 5 || $m->assigned_id > 9)
                                    <option value="{{$m->assigned_id }}">{{$m->name}}</option>
                                    @endif
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-problem-type" name="complain_type_id" id="complain_type_id">
                                <option value="0">Select Complain Type</option>
                                {{generate_simple_dropdown('complain_types','name', 'parent_id >0')}}
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-status" name="complain_status" id="complain_status">
                                <option value="-1">Select Complain Status</option>
                                <option value="0">Pending</option>
                                <option value="1">In Proccess</option>
                                <option value="2">Solved</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-district-id" name="complain_priority" id="complain_priority">
                                <option value="-1">Select Complain Priority</option>
                                <option value="0">Low</option>
                                <option value="1">Medium</option>
                                <option value="2">High</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-2" name="reporter_id" id="reporter_id">
                                <option value="0">Select Reporter</option>
                                {{generate_simple_dropdown('users','name')}}
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control selector kt-select2-2" name="follower_id" id="follower_id">
                                <option value="0">Select Follower</option>
                                {{generate_simple_dropdown('users','name')}}
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <div class="input-group"><span><strong>Created - Start/End: &nbsp;</strong></span>
                                <button type="button" class="btn btn-default pull-right" id="start_daterange-btn">
                                    <span></span>
                                    <i class="fa fa-caret-down"></i> &nbsp;
                                    <a href="javascript:;" class="btn btn-sm" id="clear_start_date" style="max-width:50px; height: 22px; padding: 0px 5px 5px 5px;"><i class="fa fa-times"> </i></a>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <div class="input-group"><span><strong>Solved - Start/End: &nbsp; </strong> </span>
                                <button type="button" class="btn btn-default pull-right" id="end_daterange-btn">
                                    <span></span>
                                    <i class="fa fa-caret-down"></i> &nbsp;
                                    <a href="javascript:;" class="btn btn-sm" id="clear_end_date" style="max-width:50px; height: 22px; padding: 0px 5px 5px 5px;"><i class="fa fa-times"> </i></a>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">

                        <button type="submit" id="show_complain_list" class="btn btn-success btn-sm  mr-3">View complain</button>
                        <button type="button" id="reset_filter_form" class="btn btn-danger btn-sm">Reset</button>
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
                    <div class="col-md-3">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Complain</h5>
                                <h5 class="card-title text-center" id="total_complain_data">0</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Solved Complain</h5>
                                <h5 class="card-title text-center" id="solved_complain_data">0</h5>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">In Progress</h5>
                                <h5 class="card-title text-center" id="process_complain_data">0</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Pending Complain</h5>
                                <h5 class="card-title text-center" id="pending_complain_data">0</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                    <h3 class="kt-portlet__head-title">
                        Complain List
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Complain Token</th>
                            <th>Sector</th>
                            <th>Complain Of</th>
                            <th>Complain Type</th>
                            <th>Complain Details</th>
                            <th>Created Date</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Solved Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <div class="vehicle_detail" id="load_content">

    </div>
</div>
<!-- end:: Content -->


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
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#start_daterange-btn span').html(start.format('DD.MM.YYYY') + ' - ' + end.format('DD.MM.YYYY'))
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
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
                url: "{{ url('dashboard/getComplainData') }}",
                data: {
                    complain_sector: $('#complain_sector').val(),
                    complain_type_id: $('#complain_type_id').val(),
                    complain_status: $('#complain_status').val(),
                    complain_priority: $('#complain_priority').val(),
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
                    name: 'complain_token',
                    className: 'text-center'
                },
                {
                    data: 'module_name',
                    name: 'module_name'
                },
                {
                    data: 'complain_of_name',
                    name: 'complain_of_name'
                },
                {
                    data: 'ct_name',
                    name: 'ct_name'
                },
                {
                    data: 'complain_details',
                    name: 'complain_details'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'priority',
                    name: 'priority',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'solved_date',
                    name: 'solved_date',
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
            url: "{{ url('dashboard/complain_at_a_glance')}}",
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
                $('#pending_complain_data').html(result.pending_complain);
            },
        });
    }

    $('#show_complain_list').click(function(event) {
        event.preventDefault();
        complain_datatable();
    });

    $('#reset_filter_form').click(function() {
        $('#filterForm')[0].reset();
        $('.selector').trigger('change');
    });

    function get_vehicle_list() {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{ url('dashboard/get_vehicle_list')}}",
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

        $('.kt-select2-status').select2({
            placeholder: "Select complain status"
        });

        $('.kt-select2-district-id').select2({
            placeholder: "Select District"
        });

    });

    $(".add_complain").click(function() {
        var current = moment().format("DD MMM YYYY, hh:mm a");
        $('#generate_date').val(current);
        $('#complainModal').modal('show');

    });

    $(document).on('submit', 'form#saveComplainForm', function(event) {

        event.preventDefault();

        var id = 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveComplain') }}/" + id,
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

    /* $(document).on('change', '#customer_id', function() {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{url('dashboard/get_vehicle_list')}}",
            success: function(result) {
                if (result) {
                    $('#device_name').html(result);
                    return false;
                } else {
                    return false;
                }
            }
        });
        return false;
    });
 */

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


    function view_data(id) {
        $("#load_content").load("{{ url('dashboard/complain_details') }}/" + id);
        $(".complain_data_list").css('display', 'none');
        $('.vehicle_detail').css('display', 'block');
    }
</script>
@endsection