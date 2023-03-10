@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Expense Log</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid driver_data_list">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter Expense Log</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form action="" id="filterForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-vehicle" name="vehicle_id" id="vehicleList">
                                <option value="0">Select vehicle</option>
                                @foreach($vehicles as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->vehicle_no}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select name="expense_type" id="expenseType" class="form-control kt-select2-fuel-type">
                                <option value="0">Select expense type</option>
                                <option value="1">Fuel</option>
                                <option value="2">Maintenance and repairs</option>
                                <option value="3">Insurance</option>
                                <option value="4">License and Registration fees</option>
                                <option value="5">Service labour costs</option>
                                <option value="6">Replacement parts</option>
                                <option value="7">Parking and tolls</option>
                                <option value="8">Road Tax</option>
                                <option value="9">Tyres</option>
                                <option value="10">GPS expense</option>
                                <option value="11">Battery expense</option>
                                <option value="12">Miscellaneous expense</option>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                            <input type="text" name="start_date" class="form-control text-center datePicker1" id="start_date" placeholder="Enter start date" autocomplete="off" />
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                            <input type="text" name="end_date" class="form-control text-center datePicker2" id="end_date" placeholder="Enter end date" autocomplete="off" />
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 py-3">
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

                        <button type="button" id="reset_expense_log" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_expense_log" class="btn btn-success btn-sm">View expense log</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid  " id="at_a_glance">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Todays Expense</h5>
                                <h5 class="card-title text-center" id="todays_amount">0</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">This Month Expense</h5>
                                <h5 class="card-title text-center" id="this_month_amount">0</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Previous Month Expense</h5>
                                <h5 class="card-title text-center" id="last_month_amount">0</h5>

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
                        Expense Log
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" class="btn btn-success btn-sm" id="add_expense_log"><i class="la la-plus mr-2"></i>Add
                        Expense</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="expense_log_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date & Time</th>
                            <th>Vehicle</th>
                            <th>Driver</th>
                            <th>Expense Type</th>
                            <th>Expense Amount</th>
                            <th>Note </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Expense Amount</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

                <!--end: Datatable -->
            </div>
        </div>

        <div class="fuel_detail" id="load_content">

        </div>
    </div>

    <!-- end:: Content -->
</div>





<!-- Modal -->
<div class="modal fade" id="expenseModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width:45%">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveExpenseLogForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <input type="hidden" id="expense_log_id" value="0">
                            <select name="vehicle_no" id="vehicle_no" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($vehicles as $vehicle)
                                <option value="{{$vehicle->id}}">{{$vehicle->vehicle_no}}</option>
                                @endforeach
                            </select>
                            <small id="vehicle_no-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="driver_name" class="col-lg-3 col-form-label">Driver Name</label>
                        <div class="col-lg-9">
                            <select class="form-control kt-select2-2" name="vehicle_staff" id="vehicle_staff_list">
                            </select>
                            <input type="hidden" id="vehicle_staff_id">
                            <input type="hidden" id="object_id" name="object_id">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Expense Type</label>
                        <div class="col-lg-9">
                            <select name="expense_type" class="form-control kt-select2-2" id="expense_type_id">
                                <option value="1">Fuel</option>
                                <option value="2">Maintenance and repairs</option>
                                <option value="3">Insurance</option>
                                <option value="4">License and Registration fees</option>
                                <option value="5">Service labour costs</option>
                                <option value="6">Replacement parts</option>
                                <option value="7">Parking and tolls</option>
                                <option value="8">Road Tax</option>
                                <option value="9">Tyres</option>
                                <option value="10">GPS expense</option>
                                <option value="11">Battery expense</option>
                                <option value="12">Miscellaneous expense</option>
                            </select>
                            <small id="expense_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mother_name" class="col-lg-3 col-form-label">Cost Value</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control calculatePrice" id="cost_value" name="cost_value" placeholder="Enter cost value">
                                <div class="input-group-append">
                                    <div class="input-group-text">BDT</div>
                                </div>
                            </div>
                            <small id="cost_value-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Expense Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="expense_date" id="expense_date" class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" value="{{date('d M Y')}}"/>
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="expense_date-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Note</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="note" id="note" placeholder="Enter note"rows="2"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submitExpenseLog" class="btn btn-success btn-sm float-right">Save</button>
                    <!-- <button type="button" id="submitExpenseLog" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // expense_datatable();
        // get_vehicle_list();

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });
        $('.kt-select2-vehicle').select2({
            placeholder: "Select vehicle"
        });

        $('.kt-select2-fuel-type').select2({
            placeholder: "Select fuel type"
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

    function expense_datatable() {
        var table = $('#expense_log_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                type: "POST",
                url: "{{ url('dashboard/expenseLogData') }}",
                data: {
                    vehicle_id: $('#vehicleList').val(),
                    expense_type: $('#expenseType').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val(),
                    _token: '{!! csrf_token() !!}',
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'expense_date',
                    name: 'expense_date',
                    className: 'text-center'
                },
                {
                    data: 'vehicle_no',
                    name: 'vehicle_no'
                },
                {
                    data: 'staff_name',
                    name: 'staff_name'
                },
                {
                    data: 'expense_type',
                    name: 'expense_type',
                    className: 'text-center'
                },
                {
                    data: 'cost_value',
                    name: 'cost_value',
                    className: 'text-center'
                },
                {
                    data: 'note',
                    name: 'note',
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
            footerCallback: function(row, data, start, end, display) {

                var expense_amunt = 5;
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                        'number' ? i : 0;
                };


                var pageTotalExpenseAmount = api.column(expense_amunt, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                // Update footer
                $(api.column(expense_amunt).footer()).html('Total amount </br>' + '&#2547; ' + KTUtil
                    .numberString(pageTotalExpenseAmount.toFixed(2)));

            },
        });
        table.buttons().container().appendTo('#expense_log_table_length');
    }

    function at_a_glance() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/expense_at_a_glance')}}",
            data: {
                vehicle_id: $('#vehicleList').val(),
                expense_type: $('#expenseType').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: '{!! csrf_token() !!}',
            },

            success: function(result) {
                $('#todays_amount').html('&#2547; ' + result.todays_amount);
                $('#this_month_amount').html('&#2547; ' + result.this_month_amount);
                $('#last_month_amount').html('&#2547; ' + result.last_month_amount);
            },
        });
    }
    $('#submitExpenseLog').click(function(event) {
        event.preventDefault();
        let id = $('#expense_log_id').val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveExpenseCostData') }}/" + id,
            data: $('#saveExpenseLogForm').serialize(),
            success: function(response) {
                $('#expenseModal').modal('hide');
                $('#saveExpenseLogForm')[0].reset();
                at_a_glance();

                if (id > 0) {
                    successMsg('Expense updated successfully.');
                    $('#expense_log_table').DataTable().ajax.reload(null, false);
                } else {
                    successMsg('Expense added successfully.');
                    $('#expense_log_table').DataTable().ajax.reload();
                }
            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    })

    $('#show_expense_log').click(function(event) {
        event.preventDefault();
        at_a_glance();
        expense_datatable();
    });

    $('#reset_expense_log').click(function(event) {
        $('#all_expense_log').click();
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

    $('#add_expense_log').click(function(event) {
        $('#saveExpenseLogForm')[0].reset();
        $('.kt-select2-2').trigger('change');
        $('#vehicle_staff_list').children().remove();
        $('#modal_title').text('Add Expense');
        $('#expenseModal').modal('show');
    });

    function edit_data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('dashboard/expense-log-detail')}}/" + id,
            success: function(result) {
                console.log(result);
                $('#expense_log_id').val(result.expense_log.id);
                $('#expense_date').val(moment(result.expense_log.expense_date).format('DD MMM YYYY'));
                $('#vehicle_staff_id').val(result.expense_log.vehicle_staff_id);
                $('#vehicle_no').val(result.expense_log.vehicle_id).trigger('change');
                $('#object_id').val(result.expense_log.object_id);
                $('#expense_type_id').val(result.expense_log.expense_type).trigger('change');
                $('#cost_value').val(result.expense_log.cost_value);
                $('#note').val(result.expense_log.note);
                $('#modal_title').text('Edit Expense');
                $('#expenseModal').modal('show');
            }
        });
    }

    $(document).on('change', '#vehicle_no', function() {
        if (this.value > 0) {
            let staff = ($('#vehicle_staff_id').val()) ? $('#vehicle_staff_id').val() : 0;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{url('dashboard/getVehicleInfo')}}/" + this.value + "/" + staff,
                success: function(result) {
                    console.log(result);
                    $('#object_id').val(result.object_id);
                    $('#vehicle_staff_list').html(result.assign_staff);
                }
            });
        }

    });


    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#fuelLogRange span').html(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        }

        $('#fuelLogRange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            }
        }, cb);

        // cb(start, end);

    });
</script>

@endsection