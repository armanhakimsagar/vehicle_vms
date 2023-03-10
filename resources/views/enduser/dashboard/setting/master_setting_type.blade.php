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
                    <a href="" class="kt-subheader__breadcrumbs-link">Master Settings Type</a>
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
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Master Setting Type List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" id="addMasterSetting" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add New Type</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="master_setting_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Module</th>
                            <th>Type Name</th>
                            <th>Action </th>
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
<div class="modal fade" id="masterSettingModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Master Setting Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveMasterSettingForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="id" value="0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Module</label>
                        <div class="col-lg-9">
                            <select name="module_id" id="module_id" class="form-control kt-select2-2">
                                <option value="">Select Module</option>
                                @foreach($master_setting_module as $m)
                                <option value="{{$m->assigned_id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                            <small id="type-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                            <small id="name-error" class="text-danger"></small>
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
                <button type="button" id="cancle" class="btn btn-danger btn-sm float-right" data-dismiss="modal">Cancel</button>
                <!-- <button type="submit" class="btn btn-success btn-sm float-right">Save</button> -->
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        master_setting_datatable();
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

    $('#addMasterSetting').click(function() {
        $('#modal_title').text('Add master Setting Type');
        $('#saveMasterSettingForm')[0].reset();
        $('#masterSettingModal').modal('show');
    });

    function view_data(id) {
        $.ajax({
            url: "{{url('dashboard/masterSettingTypeSingleData')}}/" + id,
            type: "GET",

            success: function(data) {
                console.log(data);
                $('#view_name').text(data.name);
                $('#view_module_name').text(data.module_name);
                if(data.status==1){
                    $('#view_status').html('<span class="badge btn-success">&nbsp; </span>');
                }
                else{
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
            url: "{{url('dashboard/masterSettingTypeSingleData')}}/" + id,
            type: "GET",

            success: function(data) {
                console.log(data);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#module_id').val(data.module_id);
                $("#module_id").trigger('change');
                $('#status').val(data.status);
                $('#masterSettingModal').modal('show');
            },
            error: function(data) {
                console.log('Error:', data);
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                }
            }
        });
    }

    function master_setting_datatable() {
        var table = $('#master_setting_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('dashboard/masterSettingTypeDatatable') }}",
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
                    data: 'module_name',
                    name: 'Module'
                },
                {
                    data: 'name',
                    name: 'name'
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
        table.buttons().container().appendTo('#master_setting_table_length');
    }

    $('#saveMasterSettingForm').submit(function(event) {

        event.preventDefault();
        $("[id$=-error]").text('');
        var id = $('#id').val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveMasterSettingTypeData')}}/" + id,
            data: $('#saveMasterSettingForm').serialize(),
            success: function(response) {
                successMsg('Master setting Type updated successfully.');
                $('#saveMasterSettingForm')[0].reset();
                $('#masterSettingModal').modal('hide');
                if (id > 0) {
                    $('#master_setting_table').DataTable().ajax.reload(null, false);
                } else {
                    $('#master_setting_table').DataTable().ajax.reload();
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