<?php $__env->startSection('content'); ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="<?php echo e(url('/')); ?>" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Maintenance</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid driver_data_list">
        <!--
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter Maintenance</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form action="" id="filterForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select class="form-control kt-select2-vehicle" name="vehicle_id" id="vehicleList">
                                <option value="0">Select vehicle</option>
                                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->vehicle_no); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                            <select name="fuel_type" id="mainType" class="form-control kt-select2-fuel-type">
                                <option value="0">Select maintenance type</option>
                                <?php $__currentLoopData = $main_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mt->id); ?>"><?php echo e($mt->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                            <input type="text" name="start_date" class="form-control text-center datePicker1"
                                id="start_date" placeholder="Enter start date" autocomplete="off" />
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                            <input type="text" name="end_date" class="form-control text-center datePicker2"
                                id="end_date" placeholder="Enter end date" autocomplete="off" />
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

                    <button type="button" id="reset_maintenance" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_main_list" class="btn btn-success btn-sm">View maintenance</button>
                    </div>
                </form>
            </div>

        </div>
        -->
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Maintenance List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#maintenanceModal" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Maintenance</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="maintenance_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Vehicle</th>
                            <th>Maintenance type</th>
                            <th>Maintenance name</th>
                            <th>Last date</th>
                            <th>Next date</th>
                            <th>Maintenance aleart</th>
                            <th>Remaining</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>

    </div>

    <!-- end:: Content -->
</div>

<!-- Modal -->
<div class="modal fade" id="maintenanceModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Maintenance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveMaintenanceForm">
                <div class="modal-body  text-dark">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <!-- Form content start -->


                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <select name="vehicle_no" id="vehicle_no" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vehicle->id); ?>"><?php echo e($vehicle->vehicle_no); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small id="vehicle_no-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Maintenance Type</label>
                        <div class="col-lg-9">
                            <select name="maintenance_type" id="maintenance_type" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                <?php $__currentLoopData = $main_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mt->id); ?>"><?php echo e($mt->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small id="maintenance_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Maintenance Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="maintenance_name">
                            <small id="maintenance_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Last Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="last_main_date" class="form-control datepicker"
                                    placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="last_main_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Next Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="next_main_date" class="form-control datepicker"
                                    placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="next_main_date-error" class="text-danger"></small>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Maintenance Aleart</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="number" class="form-control" name="maintenance_aleart">
                                <div class="input-group-append">
                                    <div class="input-group-text">Days</div>
                                </div>
                            </div>
                            <small id="maintenance_aleart-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Note</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="note" rows="2"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitMaintenanceForm"
                        class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    main_datatable();
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

$('#reset_maintenance').click(function(event) {
    console.log('clicked');
    $('#maintenance').click();
});

function main_datatable() {
    var table = $('#maintenance_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            type: "POST",
            url: "<?php echo e(url('dashboard/maintenanceDatatable')); ?>",
            data: {
                vehicle_id: $('#vehicleList').val(),
                main_type: $('#mainType').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                _token: '<?php echo csrf_token(); ?>',
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },

            {
                data: 'vehicle_no',
                name: 'vehicle_no'
            },
            {
                data: 'mt_name',
                name: 'mt_name',
            },
            {
                data: 'main_name',
                name: 'main_name',
            },
            {
                data: 'last_main_date',
                name: 'last_main_date',
                className: 'text-center'
            },
            {
                data: 'next_main_date',
                name: 'next_main_date',
                className: 'text-center'
            },
            {
                data: 'main_aleart',
                name: 'main_aleart',
                className: 'text-center'
            },
            {
                data: 'main_rem',
                name: 'main_rem',
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
    table.buttons().container().appendTo('#maintenance_table_length');
}

$(document).on('submit', '#saveMaintenanceForm', function(event) {
    console.log(' Sumited');
    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo e(url('dashboard/saveMaintenanceData')); ?>/" + id,
        data: $('#saveMaintenanceForm').serialize(),
        success: function(response) {
            successMsg('Maintenance added successfully.');
            $('#maintenanceModal').modal('hide');
            $('#maintenance_table').DataTable().ajax.reload();
            $('#saveMaintenanceForm')[0].reset();
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

$('#show_main_list').click(function(event) {
    event.preventDefault();
    // at_a_glance();
    main_datatable();
});

function get_vehicle_list() {
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "<?php echo e(url('dashboard/get_vehicle_list')); ?>",
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

    }  else if (this.value == 4) {
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
    $(".driver_data_list").css('display', 'none');
    $('.driver_detail').css('display', 'block');
    $("#load_content").load("<?php echo e(url('dashboard/driver-detail')); ?>/" + id);
}


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.enduser.dashboard.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/enduser/dashboard/maintenance.blade.php ENDPATH**/ ?>