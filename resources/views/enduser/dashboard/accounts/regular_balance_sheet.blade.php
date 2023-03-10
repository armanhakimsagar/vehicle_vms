@extends('layouts.enduser.dashboard.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Regular Balance Sheet </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid customer_data_list">


        <!--Begin::Row-->
        <div class="row all_client">
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Filter balance sheet</h5>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <form id="filterForm">
                            <div class="form-group row">
                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="start_date" id="start_date" class=" form-control text-center  datePicker1" autocomplete="off" placeholder="From" />
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="end_date" id="end_date" class=" form-control text-center datePicker2" autocomplete="off" placeholder="To" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-success btn-sm mr-3" id="filterButton"> Show regular balance sheet</button>
                                            <button type="button" class="btn btn-danger btn-sm " id="filterReset">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none" id="datatableSection">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Regular balance sheet</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="regular_balance_sheet_table">
                            <thead>
                                <tr>
                                    <th width="20px">SL</th>
                                    <th>Account</th>
                                    <th>Note</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </tfoot>
                        </table>

                        <!--end: Datatable -->

                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>

        <!--End::Row-->

    </div>

    <!-- end:: Content -->
    <div class="customer_detail" id="load_content">

    </div>
</div>


<script>
    $(document).ready(function() {

        $('.kt-select2-2').select2({
            placeholder: "Select "
        });

        $('.datePicker1').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).on('changeDate', function() {
            $('#end_date').focus();

        });

        $('.datePicker2').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        var current_date = moment().format('YYYY-MM-DD');
        $('#start_date').val(current_date);
        $('#end_date').val(current_date);
        // regular_balance_sheet_table();
    });

    $('#account_type_id').change(function(event) {
        event.preventDefault();
        var typeId = $('#account_type_id').val();
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
                    $('#account_id').html(data);
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

    function regular_balance_sheet_table() {
        var table = $('#regular_balance_sheet_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/regular_balance_datalist') }}",
                // data: $('#customerFilterForm').serialize(),
                data: {
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
                    data: 'account_name',
                    name: 'account_name'
                },
                {
                    data: 'note',
                    name: 'note'
                },
                {
                    data: 'debit',
                    name: 'debit',
                    className: 'text-center'
                },
                {
                    data: 'credit',
                    name: 'credit',
                    className: 'text-center'
                },
                {
                    data: 'balance',
                    name: 'balance',
                    className: 'text-center'
                },
            ],

            dom: 'Blfrtip',

            buttons: [{
                    extend: 'copy',
                    text: '<i class="far fa-copy custom-icon"></i>',
                    className: 'custom-button-class ml-3 mr-2',
                },
                {
                    extend: 'csv',
                    text: '<i class="flaticon2-paper custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                },
                {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                },
                {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                }
            ],
            footerCallback: function(row, data, start, end, display) {

                var debit = 3;
                var credit = 4;
                var balance = 5;
                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                        'number' ? i : 0;
                };

                var pageTotalDebit = api.column(debit, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


                // Total over this page
                var pageTotalCredit = api.column(credit, {
                    page: 'current'
                }).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var pageTotalBalance = pageTotalCredit - pageTotalDebit;

                // Update footer
                $(api.column(debit).footer()).html('&#2547; ' + KTUtil.numberString(
                    pageTotalDebit.toFixed(2)));

                // Update footer
                $(api.column(credit).footer()).html('&#2547; ' + KTUtil
                    .numberString(pageTotalCredit.toFixed(2)));

                // Update footer
                $(api.column(balance).footer()).html('&#2547; ' + KTUtil
                    .numberString(pageTotalBalance.toFixed(2)));
            },
        });
        table.buttons().container().appendTo('#regular_balance_sheet_table_length');
    }


    $('#filterButton').click(function(e) {
        e.preventDefault;
        $('#datatableSection').removeClass('d-none');
        regular_balance_sheet_table();
    });

    $('#filterReset').click(function(e) {
        e.preventDefault;
        $('#filterForm')[0].reset();
        $('.kt-select2-2').trigger('change');
        var current_date = moment().format('YYYY-MM-DD');
        $('#start_date').val(current_date);
        $('#end_date').val(current_date);
    });

    function view_data(id) {
        $(".customer_data_list").css('display', 'none');
        $('.customer_detail').css('display', 'block');
        $("#load_content").load("{{ url('dashboard/customer_detail') }}/" + id);
    }
</script>
<script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>
@endsection