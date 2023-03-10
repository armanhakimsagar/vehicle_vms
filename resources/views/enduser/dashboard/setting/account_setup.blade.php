@extends('layouts.enduser.dashboard.master')

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
                    <a href="" class="kt-subheader__breadcrumbs-link">Account setup</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid vehicle_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Account Setup List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addCOA" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add
                        COA</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="account_setup_table">
                    <thead>
                        <tr>
                            <th width='20px'>SL</th>
                            <th>Title</th>
                            <th>Code No</th>
                            <th>Parent</th>
                            <th>Description</th>
                            <th width='50px'>Action </th>
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
<div class="modal fade" id="coaModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add COA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveCOAForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="account_id" value="0">

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Account Type</label>
                        <div class="col-lg-9">
                            <select name="account_type" id="account_type" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                <option value="1">Asset</option>
                                <option value="2">Liability</option>
                                <option value="3">Income</option>
                                <option value="4">Expense</option>
                            </select>
                            <small id="account_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Parent</label>
                        <div class="col-lg-9">
                            <select name="parent" id="parent" class="form-control kt-select2-2">
                                @php generate_simple_dropdown('chart_of_accounts', 'title') @endphp
                            </select>
                            <small id="parent-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            <small id="title-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Code No</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="code_no" id="code_no"
                                placeholder="Enter code no">
                            <small id="code_no-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Description </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description" cols="30" rows="2" id="description"
                                placeholder="Enter description"></textarea>
                            <small id="description-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Transactional</label>
                        <div class="col-lg-9">
                            <select name="transactional" id="transactional" class="form-control kt-select2-2">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <small id="transactional-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                            <select name="status" id="status" class="form-control kt-select2-2">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <small id="status-error" class="text-danger"></small>
                        </div>
                    </div>

                </div>

                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="viewMasterSettingModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">View Master Setting Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body  text-dark">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Module</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_module_name"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Name</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_name">hello</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Status</label>
                    <div class="col-lg-9">
                        <div id="view_status"> </div>
                    </div>
                </div>

            </div>

            <div class="form-button">
                <button type="button" id="cancle" class="btn btn-danger btn-sm float-right"
                    data-dismiss="modal">Cancel</button>
                <!-- <button type="submit" class="btn btn-success btn-sm float-right">Save</button> -->
            </div>

        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    account_setup_datatable();
    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });
});

$('#addCOA').click(function() {
    $('#modal_title').text('Add COA');
    $('#saveCOAForm')[0].reset();
    $(".kt-select2-2").trigger('change');
    $('#coaModal').modal('show');
});

$('#account_type').change(function(event) {
    event.preventDefault();
    var typeId = $('#account_type').val();
    var where = "parent_id=" + typeId;

    if (typeId > 0) {
        if (typeId == 1) {
            var option = '<option value="1">Asset</option>';
        } else if (typeId == 2) {
            var option = '<option value="2">Liability</option>';
        } else if (typeId == 3) {
            var option = '<option value="3">Income</option>';
        } else if (typeId == 4) {
            var option = '<option value="4">Expense</option>';
        }

        $.ajax({
            url: "{{url('customer/commonFunction/chart_of_accounts/title')}}/" + where,
            type: "GET",
            dataType: "html",
            success: function(data) {
                var final_option = data + option;
                $('#parent').html(final_option);
            },
            error: function(data) {
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                } else {
                    errorMsg();
                }
            }
        });
    }

});

function view_data(id) {
    $.ajax({
        url: "{{url('customer/masterSettingTypeSingleData')}}/" + id,
        type: "GET",

        success: function(data) {
            console.log(data);
            $('#view_name').text(data.name);
            $('#view_module_name').text(data.module_name);
            if (data.status == 1) {
                $('#view_status').html('<span class="badge btn-success">&nbsp; </span>');
            } else {
                $('#view_status').html('<span class="badge btn-danger">&nbsp; </span>');
            }

            $('#viewMasterSettingModal').modal('show');
        },
        error: function(data) {
            console.log('Error:', data);
            if (data.status === 500) {
                warningMsg('Data ID not exist!');
            }
        }
    });
}

function edit_data(id) {

    $.ajax({
        url: "{{url('customer/account_setup_data')}}/" + id,
        type: "GET",
        // dataType: "json",
        success: function(data) {
            $('#modal_title').text('Edit COA');
            $('#account_id').val(data.account.id);
            $('#parent').val(data.account.parent_id);
            $('#title').val(data.account.title);
            $('#code_no').val(data.account.code_no);
            $('#description').val(data.account.description);
            $('#transactional').val(data.account.transactional);
            $('#status').val(data.account.status);
            $(".kt-select2-2").trigger('change');
            // $("#module_id").trigger('change');
            // $('#status').val(data.status);
            $('#coaModal').modal('show');
        },
        error: function(data) {
            console.log('Error:', data);
            // $('#coaModal').modal('show');
            if (data.status === 500) {
                warningMsg('Data ID not exist!');
            }
        }
    });
}

function account_setup_datatable() {
    var table = $('#account_setup_table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ url('customer/account_setup_datatable') }}",
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
                data: 'title',
                name: 'title'
            },
            {
                data: 'code_no',
                name: 'code_no',
                className: 'text-center',
            },
            {
                data: 'parent_name',
                name: 'parent_name'
            },
            {
                data: 'description',
                name: 'description'
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
    table.buttons().container().appendTo('#account_setup_table_length');
}

$('#saveCOAForm').submit(function(event) {

    event.preventDefault();
    var id = $('#account_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('customer/save_account_setup_data')}}/" + id,
        data: $('#saveCOAForm').serialize(),
        success: function(response) {
            successMsg('Master setting Type updated successfully.');
            $('#saveCOAForm')[0].reset();
            $('#coaModal').modal('hide');
            if (id > 0) {
                $('#account_setup_table').DataTable().ajax.reload(null, false);
            } else {
                $('#account_setup_table').DataTable().ajax.reload();
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

// $('#coaModal').on('hidden.bs.modal', function(e) {
//     $('#saveCOAForm')[0].reset();
//     $(".kt-select2-2").trigger('change');
// });
</script>
@endsection