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
                    <a href="" class="kt-subheader__breadcrumbs-link">Inspection item</a>
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

                    <h3 class="kt-portlet__head-title">
                        Inspection item list
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" class="btn btn-success btn-sm add_insp_item"><i class="la la-plus mr-2"></i>Add</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="insp_item_list_table">
                    <thead>
                        <tr>
                            <th width="30px">SL</th>
                            <th>Type</th>
                            <th>Parent</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="60px">Action</th>
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
<div class="modal fade" id="InspectionItemModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Inspection item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveInspectionItemForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="inspectionItemId" value="0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"> Type</label>
                        <div class="col-lg-9">
                            <select name="type" id="type" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($vehicleType as $v_type)
                                <option value="{{$v_type->id}}">{{$v_type->name}}</option>
                                @endforeach
                            </select>
                            <small id="type-error" class="text-danger"></small>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"> Parent</label>
                        <div class="col-lg-9">
                            <select name="parent" id="parent" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($inspectionCategory as $insp_cat)
                                <option value="{{$insp_cat->id}}">{{$insp_cat->inspection_name}}</option>
                                @endforeach
                            </select>
                            <small id="parent-error" class="text-danger"></small>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Title</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                            <small id="title-error" class="text-danger"></small>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Description</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="description" id="description" placeholder="Enter description" rows="2"></textarea>
                            <small id="description-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"> Status</label>
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

<script>
    $(document).ready(function() {
        insp_cat_datalist();
        $('.custom-button-class').removeClass('btn-secondary ');
    });

    function insp_cat_datalist() {
        let table = $('#insp_item_list_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('dashboard/inspection_item_data') }}",
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
                    data: 'vt_name',
                    name: 'vt_name'
                },
                {
                    data: 'ic_name',
                    name: 'ic_name'
                },
                {
                    data: 'item_name',
                    name: 'item_name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'status',
                    name: 'status',
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
            ],
        });
        table.buttons().container().appendTo('#insp_item_list_table_length');
    }

    $('#saveInspectionItemForm').submit(function(event) {
        event.preventDefault();
        let id = $("#inspectionItemId").val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveInspectionItemData') }}/" + id,
            data: $('#saveInspectionItemForm').serialize(),
            success: function(response) {
                successMsg('Inspection item added successfully.');
                $('#InspectionItemModal').modal('hide');
                $('#insp_item_list_table').DataTable().ajax.reload();
                $('#saveInspectionItemForm')[0].reset();
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

    $(".add_insp_item").click(function() {
        $('#saveInspectionItemForm')[0].reset();
        $('#modal_title').text('Add inspection item');
        $('#inspectionItemId').val(0);
        $('.kt-select2-2').trigger('change');
        $('#InspectionItemModal').modal('show');
    })

    $("#type").change(function() {

        let condition = "where type =" + this.value;
        if (this.value) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ url('dashboard/commonFunction')}}",
                data: {
                    table: 'inspection_categories',
                    column: 'inspection_name',
                    condition: condition,
                    selected: null,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(data) {
                    $('#parent').html(data);
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

    function edit_data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{url('dashboard/inspection_item_detail')}}/" + id,
            success: function(result) {
                $('#modal_title').text('Edit inspection item');
                $('#inspectionItemId').val(result.id);
                $('#type').val(result.type).trigger('change');
                $('#parent').val(result.parent_id).trigger('change');
                $('#title').val(result.item_name);
                $('#description').val(result.description);
                $('#status').val(result.status).trigger('change');
                $('#InspectionItemModal').modal('show');
            }
        });
    }
</script>
@endsection