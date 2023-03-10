<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Maintenance
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:;" class="btn btn-info btn-sm" id="addMaintenance"><i
                                class="la la-plus mr-2"></i>Add </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="maintenance_table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Maintenance type</th>
                        <th>Maintenance name</th>
                        <th>Last date</th>
                        <th>Next date</th>
                        <th>Maintenance aleart</th>
                        <th>Remaining</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="maintenanceModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Maintenance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveMaintenanceForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <input type="hidden" id="maintenance_id" value="0">
                        <input type="hidden" name="vehicle_no" id="vehicle_no" value="{{$vehicle_id}}">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="vehicle_no_display" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Maintenance Type</label>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-10 col-sm-9">
                                    <select name="maintenance_type" id="maintenance_type_list"
                                        class="form-control kt-select2-2">
                                        <option value="">Select</option>
                                        @foreach($main_type as $mt)
                                        <option value="{{$mt->id}}">{{$mt->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <a href="#MainTypeModal" data-toggle="modal" class="btn btn-success btn-sm"
                                        style="width:100%"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>

                            <small id="maintenance_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Maintenance Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="maintenance_name" id="maintenance_name">
                            <small id="maintenance_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Last Maintenance Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="last_main_date" class="form-control datepicker" id="last_main_date"
                                    placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="last_main_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Next Maintenance Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="next_main_date" class="form-control datepicker" id="next_main_date"
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
                                <input type="number" class="form-control" id="maintenance_aleart" name="maintenance_aleart" value="30">
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
                            <textarea class="form-control" id="note" name="note" rows="2"></textarea>
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

<!-- Modal -->
<div class="modal fade" id="MainTypeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Maintenance Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveMainTypeForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="driver_name" class="col-lg-3 col-form-label"> Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="name" name="name">
                            <small id="name-error" class="text-danger"></small>

                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submitMainType" class="btn btn-success btn-sm float-right">Save</button>
                    <!-- <button type="button" id="submitMainType" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $('#vehicle_no_display').val($('#show_vehicle_no').text());

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    // $('.datePicker1').datepicker({
    //     todayBtn: "linked",
    //     clearBtn: true,
    //     todayHighlight: true,
    //     autoclose: true,
    //     format: 'yyyy-mm-dd'
    // }).on('changeDate', function() {
    //     $('#end_date').focus();
    //     console.log('closed');

    // });
    // $('.datePicker2').datepicker({
    //     todayBtn: "linked",
    //     clearBtn: true,
    //     todayHighlight: true,
    //     autoclose: true,
    //     format: 'yyyy-mm-dd'
    // });

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });



    $('.custom-button-class').removeClass('btn-secondary ');
});

$(function() {

    var table = $('#maintenance_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ url('dashboard/vehicle_wise_datatable/maintenance/'.$vehicle_id) }}",
            data: function(d) {
                d._token = '{!! csrf_token() !!}';
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
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

});

function edit_data(id) {

    $.ajax({
        type: "json",
        url: "{{ url('dashboard/editMaintenanceData') }}/" + id,
        type: "GET",
        success: function(data) {
            console.log( data);
            $('#modal_title').text('Edit Maintenance');
            $('#maintenance_id').val(data.id);
            $('#maintenance_type_list').val(data.main_type_id);
            $('.kt-select2-2').trigger('change');
            $('#maintenance_name').val(data.main_name);
            $('#next_main_date').val(moment(data.next_main_date).format('DD MMM YYYY'));
            $('#last_main_date').val(moment(data.last_main_date).format('DD MMM YYYY'));
            $('#maintenance_aleart').val(data.main_aleart);
            $('#note').html(data.note);
            $('#maintenanceModal').modal('show');

        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
}

$('#saveMaintenanceForm').submit(function(event) {
    event.preventDefault();
    var id = $("#maintenance_id").val();
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveMaintenanceData') }}/" + id,
        data: $('#saveMaintenanceForm').serialize(),
        success: function(response) {
            successMsg('Maintenance added successfully.');
            $('#maintenanceModal').modal('hide');
            $('#maintenance_table').DataTable().ajax.reload();
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

$('#submitMainType').click(function(event) {
    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveMainTypeData') }}/" + id,
        data: $('#saveMainTypeForm').serialize(),
        success: function(response) {
            successMsg('Maintenance type added successfully.');
            $('#MainTypeModal').modal('hide');
            $('#saveMainTypeForm')[0].reset();
            fatchMainTypeList(response);
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

function fatchMainTypeList(lastInsertId = null) {
    $.ajax({
        type: "json",
        url: "{{ url('dashboard/commonFunction/maintenance_types/name') }}",
        type: "GET",
        success: function(data) {
            $('#maintenance_type_list').html(data);
            $('#maintenance_type_list').val(lastInsertId);
            $('#maintenance_type_list').trigger('change');
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
}

$("#MainTypeModal").on('show.bs.modal', function() {
    $("#maintenanceModal").addClass("d-none");
});

$("#MainTypeModal").on('hide.bs.modal', function() {
    $("#maintenanceModal").removeClass("d-none");
});

$("#addMaintenance").click(function() {
    formReset();
});

function formReset() {
    $('#saveMaintenanceForm')[0].reset();
    $('#modal_title').text('Add Maintenance');
    $('.text-danger').text(' ');
    $('#vehicle_no_display').val($('#show_vehicle_no').text());
    $('#maintenanceModal').modal('show');
}

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".vehicle_data_list").css('display', 'block');
    $('.vehicle_detail').css('display', 'none');

});
</script>