@extends('layouts.enduser.dashboard.master')

@section('content')

<style>
    .custom_fieldset {
        border: 1.5px solid #ebedf2;
        padding: 10px;
        margin: 10px;
        position: relative;
    }

    .custom_fieldset:hover .closeItemSection {
        opacity: 1;
    }

    .custom_legent {
        width: auto;
        padding: 0px 10px;
        font-size: 12px;
        margin-bottom: 0;
        text-transform: uppercase;
    }

    .closeItemSection {
        opacity: 0;
        position: absolute;
        top: -20px;
        right: -13px;
        background: white;
        height: 2rem !important;
        width: 2rem !important;
    }
</style>
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
                    <a href="" class="kt-subheader__breadcrumbs-link">Vehicle Inspection</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid inspection_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                    <h3 class="kt-portlet__head-title">
                        Vehicle inspection list
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" class="btn btn-success btn-sm add_vehicle_insp"><i class="la la-plus mr-2"></i>Add</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="inspection_table">
                    <thead>
                        <tr>
                            <th width="30px">SL</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Vehicles</th>
                            <th>Status</th>
                            <th>Items</th>
                            <th width="80px">Action</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <div class="vehicle_assign_section" id="load_assign_content">

    </div>
    <!-- end:: Content -->
</div>

<!-- Modal -->
<div class="modal fade" id="VehicleInspectionModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="load_content">
                <!-- dynamic content -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        inspection_datatable();

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

    function inspection_datatable() {
        var table = $('#inspection_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('inspection/get_data/0') }}",
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
                    data: 'inspection_date',
                    name: 'inspection_date',
                    className: 'text-center'
                },
                {
                    data: 'inspection_name',
                    name: 'inspection_name',
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'assigned_vehicle',
                    name: 'Vehicles',
                },
                {
                    data: 'status',
                    name: 'Status',
                    className: 'text-center',
                },
                {
                    data: 'item_details',
                    name: 'item_details'
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
        table.buttons().container().appendTo('#inspection_table_length');
    }

    $(".add_vehicle_insp").click(function() {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{url('dashboard/vehicle_inspection_add')}}",
            success: function(result) {
                $('#load_content').html(result);
                $('#VehicleInspectionModal').modal('show');
            }
        });
    })

    function edit_data(id) {
        $.ajax({
            type: "GET",
            dataType: "html",
            url: "{{url('dashboard/vehicle_inspection_detail')}}/" + id,
            success: function(result) {
                $('#load_content').html(result);
                $('#VehicleInspectionModal').modal('show');
            }
        });
    }
</script>
@endsection