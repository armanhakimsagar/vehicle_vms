@extends('layouts.enduser.dashboard.master')

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
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Complain Type</a>
                </div>
            </div>
        </div>
    </div>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                    <h3 class="kt-portlet__head-title">
                        Complain Type List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#complainTypeModal" data-toggle='modal' class=" add_complain btn btn-success btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_type_table">
                    <thead>
                        <tr>
                            <th width="35px">SL</th>
                            <th>Sector</th>
                            <th>Group</th>
                            <th>Type Name</th>
                            <th width="50px">Action</th>
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
<div class="modal fade" id="complainTypeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Complain Type / Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveComplainTypeForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->

                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label">Complain Sector <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select name="complain_sector" id="complain_sector" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('tbl_modules', 'name')}}
                            </select>
                            <small id="complain_sector-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Type / Group</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand">
                                        <input type="radio" class="typeOrGroup" name="type_or_group" value="type" checked>
                                        Type <span></span> </label>
                                </div>
                                <div class="col-lg-4">
                                    <label class="kt-radio kt-radio--bold kt-radio--brand">
                                        <input type="radio" class="typeOrGroup" name="type_or_group" value="group">
                                        Group
                                        <span></span> </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" id="groupSection">
                        <label class="col-lg-4 col-form-label">Complain Group <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select name="complain_group" id="complain_group" class="form-control kt-select2-2">
                                <option value="">Select</option>
                            </select>
                            <small id="complain_group-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label">Type Name <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="type_name" id="type_name">
                            <small id="type_name-error" class="text-danger"></small>
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

        var table = $('#complain_type_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('dashboard/getComplainTypeDataData') }}",
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
                    data: 'm_name',
                    name: 'm_name',
                },
                {
                    data: 'p_name',
                    name: 'p_name'
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
            ]
        });
        table.buttons().container().appendTo('#complain_type_table_length');

    });

    $(".typeOrGroup").change(function() {
        if (this.value == 'type') {
            $('#groupSection').removeClass('d-none');
        } else {
            $('#groupSection').addClass('d-none');
        }
    });

    $("#complain_sector").change(function() {

        let condition = 'where module_id=' + this.value + ' and parent_id=0';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: 'complain_types',
                column: 'name',
                condition: condition,
                selected: null,
                _token: '{!! csrf_token() !!}',
            },
            success: function(response) {
                $("#complain_group").html(response);
            },
            error: function(reject) {
                console.log(reject);
            }
        });
    });

    $('#saveComplainTypeForm').submit(function(event) {

        event.preventDefault();

        var id = 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveComplainType') }}/" + id,
            data: $('#saveComplainTypeForm').serialize(),
            success: function(response) {
                successMsg('Complain generated successfully.');
                $('#complainTypeModal').modal('hide');
                $('#complain_type_table').DataTable().ajax.reload();
                $('#saveComplainTypeForm')[0].reset();

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