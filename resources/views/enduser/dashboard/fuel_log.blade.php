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
                    <a href="" class="kt-subheader__breadcrumbs-link">Fuel Log</a>
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
                    <h5 class="kt-portlet__head-title">Filter Fuel Log</h5>
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
                            <select name="fuel_type" id="fuelType" class="form-control kt-select2-fuel-type">
                                <option value="0">Select fuel type</option>
                                <option value="1">Octane</option>
                                <option value="2">Diesel</option>
                                <option value="3">Gas</option>
                                <option value="4">Petrol</option>
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

                        <button type="button" id="reset_fuel_log" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_fuel_log" class="btn btn-success btn-sm">View fuel log</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid" id="at_a_glance">
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
                                <h5 class="card-title text-center"></i>Total Refill Unit</h5>
                                <h5 class="card-title text-center" id="total_r_u">0</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Total Price</h5>
                                <h5 class="card-title text-center" id="total_p">0</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Average Unit Price</h5>
                                <h5 class="card-title text-center" id="average_u_p">0</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Todays Amount</h5>
                                <h5 class="card-title text-center" id="todays_amount">0</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">This Month</h5>
                                <h5 class="card-title text-center" id="this_month_amount">0</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Previous Month Total</h5>
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
                    <h3 class="kt-portlet__head-title">
                        Fuel Log
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" class="btn btn-success btn-sm" id="add_fuel_log"><i class="la la-plus mr-2"></i>Add
                        Fuel Cost</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="fuel_log_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date & Time</th>
                            <th>Vehicle</th>
                            <th>Driver</th>
                            <th>Fuel Type</th>
                            <th>Refill Unit</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Station Name</th>
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
                            <th>Total units</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
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
<div class="modal fade" id="fuelModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width:45%">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Fuel Cost</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveFuelLogForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Refill Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="hidden" id="fuel_log_id" value="0">
                                <input type="text" name="refill_date" id="refill_date" class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" value="{{date('d M Y')}}" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="refill_date-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <select name="vehicle_no" id="vehicle_no" class="form-control kt-select2-2">
                                <option value="0">Select</option>
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
                        <label class="col-lg-3 col-form-label">Fuel Type</label>
                        <div class="col-lg-9">
                            <select name="fuel_type" id="fuel_type" class="form-control kt-select2-2">
                                <option value="1">Octane</option>
                                <option value="2" selected="selected">Diesel</option>
                                <option value="3">Gas</option>
                                <option value="4">Petrol</option>
                            </select>
                            <small id="fuel_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_name" class="col-lg-3 col-form-label">Refill Unit</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control calculatePrice" id="refill_unit" name="refill_unit" autocomplete="off" placeholder="Enter refill unit">
                                <div class="input-group-append">
                                    <div class="input-group-text">L </div>
                                </div>
                            </div>
                            <small id="refill_unit-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Unit Price</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control calculatePrice" id="unit_price" name="unit_price" placeholder="Enter unit price" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">BDT</div>
                                </div>
                            </div>
                            <small id="unit_price-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Total Price</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control totalPrice" id="total_price" name="total_price" placeholder="Enter total price" autocomplete="off">
                                <div class="input-group-append">
                                    <div class="input-group-text">BDT</div>
                                </div>
                            </div>
                            <small id="total_price-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Fuel Station Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="station_name" id="station_name" placeholder="Enter fuel station name">
                            <small id="station_name-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Receipt No</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="receipt_no" id="receipt_no" placeholder="Enter receipt no">
                            <small id="receipt_no-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Note</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="note" id="note" placeholder="Enter note" rows="2"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <input type="submit" id="submitFuelLog" class="btn btn-success btn-sm float-right" value="Save">
                    <!-- <button type="button" id="submitFuelLog" class="btn btn-success btn-sm float-right">Save</button> -->
                    <!-- <button type="button" id="submitFuelLog" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // fuel_datatable();
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
    });

    function fuel_datatable() {

        var current_date_time = moment().format('LLL');
        var vehicle_id = $('#vehicleList').val();
        var fuel_type = $('#fuelType').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        var table = $('#fuel_log_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                type: "POST",
                url: "{{ url('dashboard/fuelLogData') }}",
                data: {
                    vehicle_id: vehicle_id,
                    fuel_type: fuel_type,
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
                    data: 'refill_date',
                    name: 'refill_date',
                    className: 'text-center'
                },
                {
                    data: 'vehicle_no',
                    name: 'vehicle_no'
                },
                {
                    data: 'vehicle_staff_id',
                    name: 'vehicle_staff_id'
                },
                {
                    data: 'fuel_type',
                    name: 'fuel_type',
                    className: 'text-center'
                },
                {
                    data: 'refill_unit',
                    name: 'refill_unit',
                    className: 'text-center'
                },
                {
                    data: 'unit_price',
                    name: 'unit_price',
                    className: 'text-center'
                },
                {
                    data: 'total_price',
                    name: 'total_price',
                    className: 'text-center'
                },
                {
                    data: 'station_name',
                    name: 'station_name'
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
                    title: 'custom Title',
                    messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.',
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
                    title: 'custom Title',
                    // messageTop: "{{report_template('print', 'header')}}",
                    messageBottom: '<span class="text-danger">Report generated at ' + current_date_time +
                        '</span>',
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
                    title: 'custom Title',
                    messageTop: "{{report_template('print', 'header')}}",
                    messageBottom: '<span class="text-danger">Report generated at ' + current_date_time +
                        '</span>',
                    className: 'custom-button-class mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                }
            ],
            footerCallback: function(row, data, start, end, display) {

                var refill_unit = 5;
                var unit_price = 6;
                var total_price = 7;
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                        'number' ? i : 0;
                };


                var pageTotalUnitPrice = api.column(total_price, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


                // Total over this page
                var pageTotalRefill = api.column(refill_unit, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var pageAveUnitPrice = pageTotalUnitPrice / pageTotalRefill;

                // Update footer
                $(api.column(refill_unit).footer()).html('Total units </br>' + KTUtil.numberString(
                    pageTotalRefill.toFixed(2)) + ' L');

                // Update footer
                $(api.column(unit_price).footer()).html('Average unit price </br>' + '&#2547; ' + KTUtil
                    .numberString(pageAveUnitPrice.toFixed(2)));

                // Update footer
                $(api.column(total_price).footer()).html('Total units price </br>' + ' &#2547; ' + KTUtil
                    .numberString(pageTotalUnitPrice.toFixed(2)));
            },
        });
        table.buttons().container().appendTo('#fuel_log_table_length');
    }

    function at_a_glance() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/fuel_at_a_glance')}}",
            data: {
                vehicle_id: $('#vehicleList').val(),
                fuel_type: $('#fuelType').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: '{!! csrf_token() !!}',
            },

            success: function(result) {
                $('#total_r_u').html(result.total_r_u + ' L');
                $('#total_p').html('&#2547; ' + result.total_p);
                $('#average_u_p').html('&#2547; ' + result.average_u_p);
                $('#todays_amount').html('&#2547; ' + result.todays_amount);
                $('#this_month_amount').html('&#2547; ' + result.this_month_amount);
                $('#last_month_amount').html('&#2547; ' + result.last_month_amount);
            },
        });
    }

    $('#saveFuelLogForm').submit(function(event) {
        event.preventDefault();
        let id = $('#fuel_log_id').val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveFuelCostData') }}/" + id,
            data: $('#saveFuelLogForm').serialize(),
            success: function(response) {
                $('#fuelModal').modal('hide');
                $('#saveFuelLogForm')[0].reset();
                at_a_glance();

                if (id > 0) {
                    successMsg('Fuel cost updated successfully.');
                    $('#fuel_log_table').DataTable().ajax.reload(null, false);
                } else {
                    successMsg('Fuel cost added successfully.');
                    $('#fuel_log_table').DataTable().ajax.reload();
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
    });

    $('#add_fuel_log').click(function(event) {
        $('#saveFuelLogForm')[0].reset();
        $('.kt-select2-2').trigger('change');
        $('#vehicle_staff_list').children().remove();
        $('#modal_title').text('Add Fuel Cost');
        $('#fuelModal').modal('show');
    });

    $('#reset_fuel_log').click(function(event) {
        $('#fuel_log').click();
    });

    $('#show_fuel_log').click(function(event) {
        event.preventDefault();
        at_a_glance();
        fuel_datatable();
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

    function edit_data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('dashboard/fuel-log-detail')}}/" + id,
            success: function(result) {
                console.log(result);
                $('#fuel_log_id').val(result.fuel_log.id);
                $('#refill_date').val(moment(result.fuel_log.refill_date).format('DD MMM YYYY'));
                $('#vehicle_staff_id').val(result.fuel_log.vehicle_staff_id);
                $('#vehicle_no').val(result.fuel_log.vehicle_id).trigger('change');
                $('#object_id').val(result.fuel_log.object_id);
                $('#fuel_type').val(result.fuel_log.fuel_type).trigger('change');
                $('#refill_unit').val(result.fuel_log.refill_unit);
                $('#unit_price').val(result.fuel_log.unit_price);
                $('#total_price').val(result.fuel_log.total_price);
                $('#station_name').val(result.fuel_log.station_name);
                $('#receipt_no').val(result.fuel_log.receipt_no);
                $('#note').val(result.fuel_log.note);
                $('#modal_title').text('Edit Fuel Cost');
                $('#fuelModal').modal('show');
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

    $(document).on('keyup', '.calculatePrice', function() {
        var refill_unit = ($('#refill_unit').val()) ? $('#refill_unit').val() : 1;
        var unit_price = ($('#unit_price').val()) ? $('#unit_price').val() : 1;
        var total_price = parseFloat(refill_unit * unit_price).toFixed(2);
        $('#total_price').val(total_price);
    });

    $(document).on('keyup', '.totalPrice', function() {
        var refill_unit = ($('#refill_unit').val()) ? $('#refill_unit').val() : 1;
        var total_price = ($('#total_price').val()) ? $('#total_price').val() : 1;
        var unit_price = ($('#unit_price').val()) ? $('#unit_price').val() : 1;
        var u_price = parseFloat(total_price / refill_unit).toFixed(2);
        var r_unit = parseFloat(total_price / unit_price).toFixed(2);
        $('#refill_unit').val(r_unit);
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