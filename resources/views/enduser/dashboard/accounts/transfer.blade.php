@extends('layouts.enduser.dashboard.master')

@section('content')

<style>
    .custom_fieldset {
        border: 1.5px solid #ebedf2;
        padding: 10px;
        margin: 10px;
        position: relative;
    }

    .custom_legent {
        width: auto;
        padding: 10px;
        font-size: 15px;
        text-transform: uppercase;
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
                    <a href="" class="kt-subheader__breadcrumbs-link">Transfer List</a>
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
                        Transfer List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addTransfer" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add
                        Transfer</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="transfer_table">
                    <thead>
                        <tr>
                            <th width='20px'>SL</th>
                            <th>From Account</th>
                            <th>To Account</th>
                            <th>Amount</th>
                            <th>Date</th>
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
<div class="modal fade" id="transferModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveTransferForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="transfer_id" value="0">

                    <fieldset class="custom_fieldset">
                        <legend class="custom_legent ">From</legend>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Type </label>
                            <div class="col-lg-9">
                                <select id="from_type" name="from_type" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=0')
                                    @endphp
                                </select>
                                <small id="from_type-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Account <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select id="from_account" name="from_account" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=1')
                                    @endphp

                                </select>
                                <small id="from_account-error" class="text-danger"></small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="custom_fieldset">
                        <legend class="custom_legent ">To</legend>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Type</label>
                            <div class="col-lg-9">
                                <select id="to_type" name="to_type" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=0')
                                    @endphp

                                </select>
                                <small id="to_type-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Account <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select id="to_account" name="to_account" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=1')
                                    @endphp

                                </select>
                                <small id="to_account-error" class="text-danger"></small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="custom_fieldset">
                        <legend class="custom_legent ">Transfer</legend>

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
                                    <input type="text" name="date" id="transfer_date" class="form-control datepicker" placeholder="Enter date" autocomplete="off" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                                <small id="date-error" class="text-danger"></small>
                            </div>
                        </div>
                    </fieldset>

                </div>

                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        transfer_datatable();

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

    $('#addTransfer').click(function() {
        var current_date = moment().format('D MMM YYYY');
        $('#modal_title').text('Add Transfer');
        $('#saveTransferForm')[0].reset();
        $('#transfer_id').val(0);
        $(".kt-select2-2").trigger('change');
        $('#transfer_date').val(current_date);
        $('#transferModal').modal('show');
    });

    function view_data(id) {
        $.ajax({
            url: "{{url('dashboard/transfer_data')}}/" + id,
            type: "GET",

            success: function(data) {
                console.log(data);

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
            url: "{{url('dashboard/transfer_data')}}/" + id,
            type: "GET",
            // dataType: "json",
            success: function(data) {
                console.log(data);
                $('#modal_title').text('Edit Transfer');
                $('#transfer_id').val(data.transfer.id);
                $('#from_account').val(data.transfer.from_ac);
                $('#to_account').val(data.transfer.to_ac);
                $('#amount').val(data.transfer.amount);
                $('#transfer_date').val(data.transfer.trans_date);
                $(".kt-select2-2").trigger('change');
                $('#transferModal').modal('show');
            },
            error: function(data) {
                console.log('Error:', data);
                // $('#transferModal').modal('show');
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                }
            }
        });
    }

    function transfer_datatable() {
        var table = $('#transfer_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('dashboard/transfer_datatable') }}",
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
                    data: 'f_account_name',
                    name: 'f_account_name'
                },
                {
                    data: 't_account_name',
                    name: 't_account_name'
                },
                {
                    data: 'amount',
                    name: 'amount',
                    className: 'text-center',
                },
                {
                    data: 'trans_date',
                    name: 'trans_date',
                    className: 'text-center',
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
        table.buttons().container().appendTo('#transfer_table_length');
    }

    $('#from_type').change(function(event) {
        event.preventDefault();
        var typeId = $('#from_type').val();
        var where = "where parent_id=" + typeId + " and transactional=1";

        if (typeId > 0) {

            $.ajax({
                url: "{{url('dashboard/commonFunction/chart_of_accounts/title')}}/" + where,
                type: "GET",
                dataType: "html",
                success: function(data) {
                    $('#from_account').html(data);
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

    $('#to_type').change(function(event) {
        event.preventDefault();
        var typeId = $('#to_type').val();
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
                    $('#to_account').html(data);
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

    $('#saveTransferForm').submit(function(event) {

        event.preventDefault();
        var id = $('#transfer_id').val();
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/save_transfer_data')}}/" + id,
            data: $('#saveTransferForm').serialize(),
            success: function(response) {
                $('#saveTransferForm')[0].reset();
                $('#transferModal').modal('hide');
                if (id > 0) {
                    successMsg('Transfer updated successfully.');
                    $('#transfer_table').DataTable().ajax.reload(null, false);
                } else {
                    successMsg('Transfer successful.');
                    $('#transfer_table').DataTable().ajax.reload();
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
</script>
@endsection