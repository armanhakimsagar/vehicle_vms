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
                    <a href="" class="kt-subheader__breadcrumbs-link">Vehicle</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid vehicle_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("public/assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Vehicle</h5>
                                <h5 class="card-title text-center" id="total_v">0</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("public/assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Assigned Vehicle</h5>
                                <h5 class="card-title text-center" id="assigned_v">0</h5>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card"
                            style="background-image: url('{{asset("public/assets/media/bg/bg-7.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Unassigned Vehicle</h5>
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
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Vehicle List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="{{ url('dashboard/d/vehicle_add')}}" id="addNewVehicle" class="btn btn-success btn-sm"><i
                            class="la la-plus mr-2"></i>Add Vehicle</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="vehicle_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Ownership</th>
                            <th>Vehicle Group</th>
                            <th>Assign Staff</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <div class="vehicle_detail" id="load_content">

    </div>
    <!-- end:: Content -->
</div>

<script>

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

$(document).ready(function() {
    var type = getParameterByName('type');
    var id = getParameterByName('id');
    if (type != undefined && id != undefined) {
        vehicle_datatable(type, id);

    } else {
        vehicle_datatable(null, null);

    }

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

function vehicle_datatable(type=null, id=null) {
    console.log(type);
    var table = $('#vehicle_table').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "{{ url('dashboard/vehicleData') }}/" +type + "/" +id,
            data: function() {
                _token = '{!! csrf_token() !!}';
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'vehicle_photo',
                name: 'vehicle_photo',
                className: 'text-center'
            },
            {
                data: 'vehicle_no',
                name: 'vehicle_no',
            },
            {
                data: 'vehicle_type',
                name: 'vehicle_type'
            },
            {
                data: 'ownership_name',
                name: 'ownership_name'
            },
            {
                data: 'vg_name',
                name: 'vg_name'
            },
            {
                data: 'staff_data',
                name: 'staff_data'
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
    table.buttons().container().appendTo('#vehicle_table_length');

};

$(document).ready(function() {
    at_a_glance();

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


function view_data(id) {
    $("#load_content").load("{{ url('dashboard/vehicle-detail/all') }}/" + id);
    $(".vehicle_data_list").css('display', 'none');
    $('.vehicle_detail').css('display', 'block');
}
$('#addNewVehicle').click(function(event) {
    console.log('clicked');
    $('#vehicle_add').click();
});
</script>
@endsection