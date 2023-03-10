@extends('layouts.enduser.dashboard.master')

@section('content')
<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
    }

    input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>
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
                    <a href="" class="kt-subheader__breadcrumbs-link">Expense List</a>
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
                        Expense List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addExpense" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add
                        Expense</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="expense_table">
                    <thead>
                        <tr>
                            <th width='20px'>SL</th>
                            <th>Account</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Note</th>
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
<div class="modal fade" id="expenseModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveExpenseForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="expense_id" value="0">

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Type</label>
                        <div class="col-lg-9">
                            <select name="type" id="type" class="form-control kt-select2-2">
                                @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=0') @endphp
                            </select>
                            <small id="type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Account</label>
                        <div class="col-lg-9">
                            <select name="account" id="account" class="form-control kt-select2-2">
                                @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=1') @endphp
                            </select>
                            <small id="account-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Amount</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount">
                            <small id="amount-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" name="date" id="expense_date" class="form-control datepicker" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                            <small id="date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Payment Method</label>
                        <div class="col-lg-9">
                            <select name="payment_method" id="payment_method_id" class="form-control kt-select2-2">
                                @php generate_simple_dropdown('payment_method', 'method_name') @endphp
                            </select>
                            <small id="payment_method-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Note </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="note" id="note" cols="30" rows="2" id="description" placeholder="Enter note"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Reference</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="reference" id="reference" placeholder="Enter reference">
                            <small id="reference-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class=" row form-group">
                        <label for="role" class="col-lg-3 col-form-label">Attachment</label>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="selectedFile" disabled="disabled" placeholder="No File chosen">
                                </div>
                                <div class="col-sm-1">
                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-plus ml-1"></i>
                                    </button>
                                    <input name="attachment" id="attachmentFile" type="file" class="upload">
                                </div>
                            </div>
                            <small id="attachment-error" class="text-danger text-center"></small>
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

<div class="modal fade" id="viewExpenseModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">View Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body  text-dark">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Account</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_account"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Amount</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_amount"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Date</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_expense_date"> </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Payment Method</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_payment_method"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Note</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_note"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Reference</label>
                    <div class="col-lg-9">
                        <span class="form-control" id="view_reference"></span>
                    </div>
                </div>

            </div>

            <div class="form-button">
                <button type="button" id="cancle" class="btn btn-danger btn-sm float-right" data-dismiss="modal">Cancel</button>
                <!-- <button type="submit" class="btn btn-success btn-sm float-right">Save</button> -->
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        expense_datatable();
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

    $('#addExpense').click(function() {
        var current_date = moment().format('D MMM YYYY');
        $('#modal_title').text('Add Expense');
        $('#saveExpenseForm')[0].reset();
        $(".kt-select2-2").trigger('change');
        $('#expense_date').val(current_date);
        $('#expenseModal').modal('show');
    });

    $('#type').change(function(event) {
        event.preventDefault();
        var typeId = $('#type').val();
        var condition = "where parent_id=" + typeId + " and transactional=1";

        if (typeId > 0) {

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ url('dashboard/commonFunction')}}",
                data: {
                    table: 'chart_of_accounts',
                    column: 'title',
                    condition: condition,
                    selected: null,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data) {
                    $('#account').html(data);
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

    $('#attachmentFile').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#selectedFile").val(fileName);
    });


    $('#saveExpenseForm').submit(function(event) {

        event.preventDefault();
        var id = $('#expense_id').val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/save_depositOrExpense_data/expense')}}/" + id,
            // data: $('#saveExpenseForm').serialize(),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {

                $('#saveExpenseForm')[0].reset();
                $('#expenseModal').modal('hide');
                if (id > 0) {
                    successMsg('Expense updated successfully.');
                    $('#expense_table').DataTable().ajax.reload(null, false);
                } else {
                    successMsg('Expense created successfully.');
                    $('#expense_table').DataTable().ajax.reload();
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

    function view_data(id) {
        $.ajax({
            url: "{{url('dashboard/deposit_or_expense_data')}}/" + id,
            type: "GET",

            success: function(data) {
                $('#view_account').text(data.depExp.account_name);
                $('#view_expense_date').text(data.depExp.date);
                $('#view_amount').text(data.depExp.amount);
                $('#view_payment_method').text(data.depExp.method_name);
                $('#view_reference').text(data.depExp.reference_id);
                $('#view_note').text(data.depExp.note);
                $('#viewExpenseModal').modal('show');
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
            url: "{{url('dashboard/deposit_or_expense_data')}}/" + id,
            type: "GET",
            // dataType: "json",
            success: function(data) {
                console.log(data);
                $('#modal_title').text('Edit Expense');
                $('#expense_id').val(data.depExp.id);
                $('#account').val(data.depExp.account_id);
                $('#expense_date').val(data.depExp.date);
                $('#amount').val(data.depExp.amount);
                $('#payment_method_id').val(data.depExp.payment_method_id);
                $('#reference').val(data.depExp.reference_id);
                $('#note').html(data.depExp.note);
                $(".kt-select2-2").trigger('change');
                $('#expenseModal').modal('show');
            },
            error: function(data) {
                console.log('Error:', data);
                // $('#depositModal').modal('show');
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                }
            }
        });
    }

    function expense_datatable() {
        var table = $('#expense_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('dashboard/depositOrExpense_datatable/expense') }}",
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
                    data: 'account_name',
                    name: 'account_name'
                },
                {
                    data: 'debit',
                    name: 'debit',
                    className: 'text-center',
                },
                {
                    data: 'date',
                    name: 'date',
                    className: 'text-center',
                },
                {
                    data: 'method_name',
                    name: 'method_name'
                },
                {
                    data: 'note',
                    name: 'note'
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
        table.buttons().container().appendTo('#expense_table_length');
    }
</script>
@endsection