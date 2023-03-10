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
                    <a href="" class="kt-subheader__breadcrumbs-link">Document</a>
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
                    <h5 class="kt-portlet__head-title">Filter Documents</h5>
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
                            <select name="fuel_type" id="docType" class="form-control kt-select2-fuel-type">
                                <option value="0">Select document type</option>
                                @foreach($doc_type as $dt)
                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                @endforeach
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

                        <button type="button" id="reset_document" class="btn btn-danger btn-sm mr-3">Reset</button>
                        <button type="submit" id="show_doc_list" class="btn btn-success btn-sm">View document</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                    <h3 class="kt-portlet__head-title">
                        Document List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#documentModal" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Document</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="document_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Vehicle</th>
                            <th>Document type</th>
                            <th>Document name</th>
                            <th>Document number</th>
                            <th>Issue date</th>
                            <th>Expiry date</th>
                            <th>Last renewal</th>
                            <th>Expiry aleart</th>
                            <th>Expiry remaining</th>
                            <th>Action </th>
                        </tr>
                    </thead>
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
<div class="modal fade" id="documentModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveDocumentForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->


                    <div class="form-group row">
                        <input type="hidden" id="data_id" value="0">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
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
                        <label class="col-lg-3 col-form-label">Document Type</label>
                        <div class="col-lg-9">
                            <select name="document_type" id="document_type" class="form-control kt-select2-2">
                                <!-- <option value="">Select</option> -->
                                @foreach($doc_type as $dt)
                                <option value="{{$dt->id}}">{{$dt->name}}</option>
                                @endforeach
                            </select>
                            <small id="document_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Document Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="document_name" id="document_name">
                            <small id="document_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Document Number</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="document_number" id="document_number">
                            <small id="document_number-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Issue Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="issue_date" id="issue_date" class="form-control datepicker"
                                    placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="issue_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Expiry Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="expiry_date" id="expiry_date" class="form-control datepicker"
                                    placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="expiry_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Last Renewal Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="last_renewal_date" id="last_renewal_date"
                                    class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="last_renewal_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Expiry Aleart</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="expiry_aleart" name="expiry_aleart">
                                <div class="input-group-append">
                                    <div class="input-group-text">Days</div>
                                </div>
                            </div>
                            <small id="expiry_aleart-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Note</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="note" id="note" rows="2"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <label for="role" class="col-lg-3 col-form-label">Document Photo</label>
                        <div class="col-lg-4">
                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                <div>
                                    <img class="kt-avatar__holder" id="img-crop"
                                        src="{{asset('assets/media/images/doc.jpg')}}" alt="" style="border-radius:0">
                                </div>
                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen"></i>
                                    <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                                </label>
                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                    data-original-title="Cancel avatar">
                                    <i class="fa fa-times"></i>
                                </span>
                            </div>
                            <small id="image-error" class="text-danger"></small>
                        </div>
                    </div> -->
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitDocumentForm"
                        class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    doc_datatable();
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

function doc_datatable() {
    var table = $('#document_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            type: "POST",
            url: "{{ url('dashboard/documentDatatable') }}",
            data: {
                vehicle_id: $('#vehicleList').val(),
                doc_type: $('#docType').val(),
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
                data: 'vehicle_no',
                name: 'vehicle_no'
            },
            {
                data: 'dt_name',
                name: 'dt_name',
            },
            {
                data: 'doc_name',
                name: 'doc_name',
            },
            {
                data: 'doc_number',
                name: 'doc_number',
                className: 'text-center'
            },
            {
                data: 'issue_date',
                name: 'issue_date',
                className: 'text-center'
            },
            {
                data: 'expiry_date',
                name: 'expiry_date',
                className: 'text-center'
            },
            {
                data: 'last_renewal_date',
                name: 'last_renewal_date',
                className: 'text-center'
            },
            {
                data: 'expiry_aleart',
                name: 'expiry_aleart',
                className: 'text-center'
            },
            {
                data: 'expiry_rem',
                name: 'expiry_rem',
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
    table.buttons().container().appendTo('#document_table_length');
}


// $(document).ready(function(e) {

//     $('#image').change(function() {
//         let reader = new FileReader();
//         reader.onload = (e) => {
//             $('.kt-avatar__holder').attr('src', e.target.result);
//         }
//         reader.readAsDataURL(this.files[0]);
//     });
// });

$('#saveDocumentForm').submit(function(event) {
    event.preventDefault();
    var id = $('#data_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveDocumentData') }}/" + id,
        data: $('#saveDocumentForm').serialize(),
        success: function(response) {
            $('#saveDocumentForm')[0].reset();
            $('.text-danger').text(' ');
            $('#modal_title').text('Add Document');
            $('#documentModal').modal('hide');
            if (id > 0) {
                successMsg('Document added successfully.');
                $('#document_table').DataTable().ajax.reload(null, false);
            } else {
                successMsg('Document added successfully.');
                $('#document_table').DataTable().ajax.reload();
            }
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

$('#show_doc_list').click(function(event) {
    event.preventDefault();
    // at_a_glance();
    doc_datatable();
});

$('#reset_document').click(function(event) {
    $('#paper_document').click();
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

function edit_data(id) {

    $.ajax({
        type: "json",
        url: "{{ url('dashboard/editDocumentData') }}/" + id,
        type: "GET",
        success: function(data) {
            $('#modal_title').text('Edit Document');
            $('#data_id').val(data.id);
            $('#document_type').val(data.doc_type_id);
            $('#vehicle_no').val(data.vehicle_id);
            $('.kt-select2-2').trigger('change');
            $('#document_name').val(data.doc_name);
            $('#document_number').val(data.doc_number);
            $('#issue_date').val(moment(data.issue_date).format('DD MMM YYYY'));
            $('#expiry_date').val(moment(data.expiry_date).format('DD MMM YYYY'));
            $('#last_renewal_date').val(moment(data.last_renewal_date).format('DD MMM YYYY'));
            $('#expiry_aleart').val(data.expiry_aleart);
            $('#note').html(data.note);
            $('#documentModal').modal('show');

        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
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
@endsection