<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">

                <h3 class="kt-portlet__head-title">
                    Document List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="javascript:;" class="btn btn-info btn-sm" id="addDocument"><i
                        class="la la-plus mr-2"></i>Add</a>
                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="document_table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Document type</th>
                        <th>Document name</th>
                        <th>Document number</th>
                        <th>Issue date</th>
                        <th>Expiry date</th>
                        <th>Last renewal</th>
                        <th>Expiry aleart</th>
                        <th>Expiry remaining</th>
                        <th width="50px">Action </th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
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
                        <input type="hidden" name="vehicle_no" id="vehicle_no" value="{{$vehicle_id}}">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="vehicle_no_display" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Document Type</label>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-10 col-sm-9">
                                    <select name="document_type" id="document_type_list" class="form-control kt-select2-2 ">
                                        <!-- <option value="">Select</option> -->
                                        @foreach($doc_type as $dt)
                                        <option value="{{$dt->id}}">{{$dt->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <a href="#documentTypeModal" data-toggle="modal" class="btn btn-success btn-sm"
                                        style="width:100%"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>

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
                                <input type="number" class="form-control" id="expiry_aleart" name="expiry_aleart"
                                    value="30">
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
                    <button type="button"  class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submitDocumentForm"
                        class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="documentTypeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Document Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveDocTypeForm">
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
                    <button type="button"  class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submitDocTypeLog" class="btn btn-success btn-sm float-right">Save</button>
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

$(function() {

    var table = $('#document_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ url('dashboard/vehicle_wise_datatable/document/'.$vehicle_id) }}",
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

});

$('#saveDocumentForm').submit(function(event) {
    event.preventDefault();
    var id = $('#data_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveDocumentData') }}/" + id,
        data: $('#saveDocumentForm').serialize(),
        success: function(response) {
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

$('#submitDocTypeLog').click(function(event) {
    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveDocTypeData') }}/" + id,
        data: $('#saveDocTypeForm').serialize(),
        success: function(response) {
            successMsg('Document type added successfully.');
            $('#documentTypeModal').modal('hide');
            $('#saveDocTypeForm')[0].reset();
            fatchDocTypeList(response);

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

function edit_data(id) {

    $.ajax({
        type: "json",
        url: "{{ url('dashboard/editDocumentData') }}/" + id,
        type: "GET",
        success: function(data) {
            $('#modal_title').text('Edit Document');
            $('#data_id').val(data.id);
            $('#document_type_list').val(data.doc_type_id);
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

function fatchDocTypeList(lastInsertId = null) {
    $.ajax({
        type: "json",
        url: "{{ url('dashboard/commonFunction/doc_types/name') }}",
        type: "GET",
        success: function(data) {
            $('#document_type_list').html(data);
            $('#document_type_list').val(lastInsertId);
            $('#document_type_list').trigger('change');
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
}

$("#documentTypeModal").on('show.bs.modal', function() {
    $("#documentModal").addClass("d-none");
});

$("#documentTypeModal").on('hide.bs.modal', function() {
    $("#documentModal").removeClass("d-none");
});

$("#addDocument").click(function() {
    formReset();
});

function formReset() {
    $('#saveDocumentForm')[0].reset();
    $('#modal_title').text('Add Document');
    $('.text-danger').text(' ');
    $('#vehicle_no_display').val($('#show_vehicle_no').text());
    $('#documentModal').modal('show');
}

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".vehicle_data_list").css('display', 'block');
    $('.vehicle_detail').css('display', 'none');

});
</script>