@extends('layouts.admin.master')
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
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link"> Client SMS Log</a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter SMS Log</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form action="" id="filterForm">
                    @csrf
                    <div class="form-group row">
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select name="expense_type" id="expenseType" class="form-control kt-select2-type">
                                <option value="0">Select type</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <input type="text" name="start_date" class="form-control text-center datePicker1"
                                id="start_date" placeholder="Enter start date" autocomplete="off" />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <input type="text" name="end_date" class="form-control text-center datePicker2"
                                id="end_date" placeholder="Enter end date" autocomplete="off" />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-2" id="dayFilter">
                                <option value="0">Quick date</option>
                                <option value="1">Today</option>
                                <option value="2">Yesterday</option>
                                <option value="3">Last 3 days</option>
                                <option value="4">This week</option>
                                <option value="5">Last week</option>
                                <option value="6">This month</option>
                                <option value="7">Last month</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">

                        <button type="button" id="reset_sms_log" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_expense_log" class="btn btn-success btn-sm">View
                            log</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Clients SMS Log
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable"
                    id="client_sms_log_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date & Time</th>
                            <th>SMS</th>
                            <th>Account details</th>
                            <th>Income</th>
                            <th>Expenditure</th>
                            <th>SMS balance</th>
                            <th>Remark</th>
                            <th>User</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>

<script>
$(document).ready(function() {


    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('.kt-select2-vehicle').select2({
        placeholder: "Select vehicle"
    });

    $('.kt-select2-type').select2({
        placeholder: "Select type"
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

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });

    $('.custom-button-class').removeClass('btn-secondary ');
    var current_date = moment().format('D MMM YYYY');
    $('#expense_date').val(current_date);

});

$('#reset_sms_log').click(function(event) {
    // $('#all_expense_log').click();
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

$(function() {
    // var id = 0;
    var table = $('#client_sms_log_table').DataTable({
        // destroy: true,
        // processing: true,
        // serverSide: true,
        // ajax: {
        //     type: "GET",
        //     url: "{{url('client_sms_log')}}/",
        //     data: function(d) {
        //         d._token = '{!! csrf_token() !!}';
        //     }
        // },
        // columns: [{
        //     data: 'DT_RowIndex',
        //         name: 'DT_RowIndex',
        //         className: 'text-center'
        //     },
        //     {
        //         data: 'created_at',
        //         name: 'created_at'
        //     },
        //     {
        //         data: 'username',
        //         name: 'username'
        //     },
        //     {
        //         data: 'status',
        //         name: 'status'
        //     },
        //     {
        //         data: 'ip_address',
        //         name: 'ip_address'
        //     },
        //     {
        //         data: 'device_model',
        //         name: 'device_model'
        //     },
        //     {
        //         data: 'browser',
        //         name: 'browser'
        //     },
        // ],

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
    table.buttons().container().appendTo('#client_sms_log_table_length');

});
</script>
@endsection