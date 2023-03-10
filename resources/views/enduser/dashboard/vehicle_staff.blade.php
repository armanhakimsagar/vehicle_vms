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
                    <a href="" class="kt-subheader__breadcrumbs-link">Vehicle Staff</a>
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
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Staff</h5>
                                <h5 class="card-title text-center" id="total_staff">0</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Total Supervisor</h5>
                                <h5 class="card-title text-center" id="total_supervisor">0</h5>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Total Driver</h5>
                                <h5 class="card-title text-center" id="total_driver">0</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Total Contractor</h5>
                                <h5 class="card-title text-center" id="total_contractor">0</h5>
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
                    Vehicle Staff List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <!-- <a href="#driverModal" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Driver</a> -->

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="vehicle_staff_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th width="56px">Photo</th>
                            <th>Staff ID</th>
                            <th>Staff name</th>
                            <th>Staff type</th>
                            <th>Phone</th>
                            <th>Assigned vehicle</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
    <div class="driver_detail" id="load_content">

    </div>
</div>





<!-- Modal -->
<div class="modal" id="driverModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



        </div>
    </div>
</div>

<script>
function at_a_glance() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ url('dashboard/vehicle_staff_at_a_glance')}}/",
        success: function(result) {
            $('#total_staff').html(result.total_staff);
            $('#total_supervisor').html(result.total_supervisor);
            $('#total_driver').html(result.total_driver);
            $('#total_contractor').html(result.total_contractor);
        },
    });
}

$(function() {

    var table = $('#vehicle_staff_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('dashboard/vehicleStaffDatalist') }}",
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
                data: 'staff_image',
                name: 'staff_image',
                className: 'text-center'
            },
            {
                data: 'staff_id',
                name: 'staff_id',
            },
            {
                data: 'staff_name',
                name: 'staff_name'
            },
            {
                data: 'staff_type_name',
                name: 'staff_type_name',
                className: 'text-center'
            },
            {
                data: 'phone',
                name: 'phone',
                className: 'text-center'
            },
            {
                data: 'assiged_to_vehicle',
                name: 'assiged_to_vehicle',
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
    table.buttons().container().appendTo('#vehicle_staff_table_length');

});

$(document).ready(function(e) {

    $('#image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.kt-avatar__holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});


$(document).ready(function() {
    at_a_glance();

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

$(document).ready(function() {
    $('.custom-button-class').removeClass('btn-secondary ');
});


function view_data(id) {
    $(".driver_data_list").css('display', 'none');
    $('.driver_detail').css('display', 'block');
    $("#load_content").load("{{ url('dashboard/vehicle_staff_detail') }}/" + id);
}
</script>
@endsection