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
                    <a href="" class="kt-subheader__breadcrumbs-link">Document Type</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid driver_data_list">
       
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Document type list
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#DocTypeModal" class="btn btn-success btn-sm" data-toggle="modal"><i
                            class="la la-plus mr-2"></i>Add Type</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="doc_list_table">
                    <thead>
                        <tr>
                            <th width="30px">SL</th>
                            <th>Name</th>
                            <th width="40px">Action</th>
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
<div class="modal" id="DocTypeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Document Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveDocTypeForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="driver_name" class="col-lg-3 col-form-label"> Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="name" name="name">
                            <small id="name-error" class="text-danger"></small>

                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submitDocTypeLog" class="btn btn-success btn-sm float-right">Save</button>
                    <!-- <button type="button" id="submitDocTypeLog" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    doc_type_datalist ();
    $('.custom-button-class').removeClass('btn-secondary ');
});

function doc_type_datalist () {
    var table = $('#doc_list_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('dashboard/docTypeList') }}",
            data: function (d) {
                d._token = '{!! csrf_token() !!}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
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
    table.buttons().container().appendTo('#doc_list_table_length');
}

$('#submitDocTypeLog').click(function(event) {
    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveDocTypeData') }}/" + id,
        data: $('#saveDocTypeForm').serialize(),
        success: function(response) {
            successMsg('Document type added successfully.');
            $('#DocTypeModal').modal('hide');
            $('#doc_list_table').DataTable().ajax.reload();
            $('#saveDocTypeForm')[0].reset();
        },
        error: function(reject) {
            errorMsg();
            if (reject.status === 422 || reject.status === 403) {
                var errors = $.parseJSON(reject.responseText);
                $.each(errors.error.message, function(key, val) {
                    $("small#" + key + "-error").text(val[0]);
                });
            }
        }
    });
})

</script>
@endsection