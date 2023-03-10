@extends('layouts.enduser.profile.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Complain </a>
                </div>
            </div>
        </div>
    </div>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
                                <h5 class="card-title text-center"></i>Total Complain</h5>
                                <h5 class="card-title text-center">{{$total_complain}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Solved Complain</h5>
                                <h5 class="card-title text-center">{{$solved_complain}}</h5>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">On Proccess</h5>
                                <h5 class="card-title text-center">{{$proccess_complain}}</h5>
                            </div>
                        </div>
                    </div>
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
                        Complain List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#userModal" data-toggle='modal'
                                class=" add_complain btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date & Time</th>
                            <th>Device</th>
                            <th>Complain Type</th>
                            <th>Complain Details</th>
                            <th>Status</th>
                            <th>Solved Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->


<!-- Modal -->
<div class="modal" id="complainModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Generate complain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveComplainForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Generate Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" id="generate_date" class="form-control" disabled="disabled" />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Device Name</label>
                        <div class="col-lg-9">
                            <select name="device_name" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($devices as $d)
                                <option value="{{$d->id}}">{{$d->device_name }} - {{$d->imei }} - {{$d->cd_name }}
                                </option>
                                @endforeach
                            </select>
                            <small id="device_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Problem Type</label>
                        <div class="col-lg-9">
                            <select name="problem_type" id="problem_type" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($tickets as $t)
                                <option value="{{$t->id}}">{{$t->t_name}}</option>
                                @endforeach
                            </select>
                            <small id="problem_type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_name" class="col-lg-3 col-form-label">Problem Details</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="complain_details" id="complain_details"
                                rows="3"></textarea>
                            <small id="complain_details-error" class="text-danger"></small>
                        </div>
                    </div>

                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(function() {
    // var id = 0;
    var table = $('#complain_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "{{url('dashboard/getComplainData')}}",
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
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'object_id',
                name: 'object_id'
            },
            {
                data: 'ct_name',
                name: 'ct_name'
            },
            {
                data: 'complain_details',
                name: 'complain_details'
            },
            {
                data: 'status',
                name: 'status',
                className: 'text-center'
            },
            {
                data: 'solved_date',
                name: 'solved_date',
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
    table.buttons().container().appendTo('#complain_table_length');

});

$(document).ready(function(e) {

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });
});

$(".add_complain").click(function() {
    var current = moment().format("DD MMM YYYY, hh:mm a");
    $('#generate_date').val(current);
    $('#complainModal').modal('show');

});

$(document).on('submit', 'form#saveComplainForm', function(event) {

    event.preventDefault();

    var id = 0;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveComplain') }}/" + id,
        data: $('#saveComplainForm').serialize(),
        success: function(response) {
            successMsg('Complain generated successfully.');
            $('#complainModal').modal('hide');
            $('#complain_table').DataTable().ajax.reload();
            $('#saveComplainForm')[0].reset();

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