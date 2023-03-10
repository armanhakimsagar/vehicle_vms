@extends('layouts.enduser.dashboard.master')

@section('content')

<style>
    .sub_table {
        padding: 5px !important;
        border: 2px solid #c1b9f1 !important;
    }

    .selected_table_row {
        background-color: #c1b9f1 !important;
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
                    <a href="" class="kt-subheader__breadcrumbs-link">Trip</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid trip_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
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
                                <h5 class="card-title text-center"></i>Total Trip</h5>
                                <h5 class="card-title text-center" id="total_v">0</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Running Trip</h5>
                                <h5 class="card-title text-center" id="assigned_v">0</h5>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Complete Trip</h5>
                                <h5 class="card-title text-center" id="unassigned_v">0</h5>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="col-md-3">
                        <div class="card custom-card">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">On Hold Client</h5>
                                <h5 class="card-title text-center">0</h5>
                            </div>
                        </div>

                    </div> -->

                </div>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Trip List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ url('dashboard/d/trip_add')}}" target="_blank" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped table-bordered table-hover table-checkable" id="trip_table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Trip ID</th>
                            <th>Sub-trip</th>
                            <!-- <th>Days</th> -->
                            <th>Vehicle</th>
                            <!-- <th>Trip Type</th> -->
                            <th>Trip Amount</th>
                            <th>Customer Paid</th>
                            <th>Customer Due</th>
                            <th>Customer Bill Status</th>
                            <th>Total Trip Expense</th>
                            <th>Trip Expense Due</th>
                            <th>Trip Expense Status</th>
                            <th>Trip Status</th>
                            <th>Trip Profit</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <div class="trip_detail" id="load_content">

    </div>
    <!-- end:: Content -->
</div>

<script>
    $(document).ready(function() {
        at_a_glance();
        trip_datatable();

        $('.custom-button-class').removeClass('btn-secondary ');

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

    function at_a_glance() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('dashboard/vehicle_at_a_glance')}}/",
            success: function(result) {
                $('#total_v').html(result.total_v);
                $('#assigned_v').html(result.assigned_v);
                $('#unassigned_v').html(result.unassigned_v);
            },
        });
    }

    function trip_datatable() {
        var table = $('#trip_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,

            ajax: {
                url: "{{ url('dashboard/tripDatatable') }}",
                data: function() {
                    _token = '{!! csrf_token() !!}';
                }
            },
            columns: [{
                    data: 'collapse',
                    name: 'collapse',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'trip_date',
                    name: 'trip_date',
                    className: 'text-center'
                },
                {
                    data: 'id',
                    name: 'id',
                    className: 'text-center'
                },
                {
                    data: 'sub_trip',
                    name: 'sub_trip',
                    className: 'text-center'
                },
                {
                    data: 'vehicle_no',
                    name: 'vehicle_no',
                },
                {
                    data: 'trip_amount',
                    name: 'trip_amount',
                    className: 'text-center'
                },
                {
                    data: 'customer_paid',
                    name: 'customer_paid',
                    className: 'text-center'
                },
                {
                    data: 'customer_due',
                    name: 'customer_due',
                    className: 'text-center'
                },
                {
                    data: 'customer_bill_status',
                    name: 'customer_bill_status',
                    className: 'text-center'
                },
                {
                    data: 'total_trip_expenses',
                    name: 'total_trip_expenses',
                    className: 'text-center'
                },
                {
                    data: 'trip_expenses_due',
                    name: 'trip_expenses_due',
                    className: 'text-center'
                },
                {
                    data: 'trip_expenses_status',
                    name: 'trip_expenses_status',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'trip_profit',
                    name: 'trip_profit',
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
            ]
        });
        table.buttons().container().appendTo('#trip_table_length');

    };

    function collapse_data(id) {
        let tr = $("#collapsible_row_" + id).closest('tr');
        let table = $('#trip_table').DataTable();
        let row = table.row(tr);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            $("#collapsible_row_" + id).children('i').removeClass('fa-minus').addClass('fa-plus');
        } else {
            // Open this row
            $.ajax({
                type: "GET",
                dataType: "html",
                url: "{{ url('dashboard/get_trip_details_list')}}",
                data: {
                    trip_id: id,
                },
                success: function(result) {
                    row.child(result).show();
                    tr.addClass('shown');
                    $("#collapsible_row_" + id).children('i').removeClass('fa-plus').addClass('fa-minus');
                    $("#sub_table_" + id).parent('td').addClass('sub_table');
                }
            });
        }
    }

    function recollapse_data(id) {
        console.log(id);
        let tr = $("#collapsible_row_" + id).closest('tr');
        let table = $('#trip_table').DataTable();
        let row = table.row(tr);

        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{ url('dashboard/get_trip_details_list')}}",
            data: {
                trip_id: id,
            },
            success: function(result) {
                row.child(result).show();
                tr.addClass('shown');
                $("#collapsible_row_" + id).children('i').removeClass('fa-plus').addClass('fa-minus');
            }
        });
    }

    function view_trip_details(id) {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{ url('dashboard/trip_details_show') }}/" + id,
            success: function(result) {
                $("#load_content").html(result);
                $(".trip_data_list").css('display', 'none');
                $('.trip_detail').css('display', 'block');
                $(".trip_details_row").removeClass('selected_table_row');
                $("#trip_details_row_" + id).parent().parent().addClass('selected_table_row');
            }
        });
    }

    $('#addNewVehicle').click(function(event) {
        console.log('clicked');
        $('#vehicle_add').click();
    });
</script>
@endsection