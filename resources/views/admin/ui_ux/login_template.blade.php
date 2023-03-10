@extends('layouts.admin.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Login Template </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Template List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="javascript:;" id='addTemplate'
                                class="btn btn-success btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add Template
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="template_table">
                    <thead>
                        <tr>
                            <th width="25px">SL</th>
                            <th>Preview</th>
                            <th>Template name</th>
                            <th>Apply</th>
                            <th>Status</th>
                            <th width="70px">Actions</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>

<!-- Modals -->
<div class="modal fade" id="templateModal" data-backdrop="static" data-keyboard="false">
    <div id="dialog" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Add Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveTemplateForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <input type="hidden" id="template_id" value="0">
                    <div class=" row form-group">
                        <label class="col-lg-3 col-form-label">Template Name </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="template_name" id="template_name">
                            <small id="template_name-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class=" row form-group">
                        <label class="col-lg-3 col-form-label">Template Slug </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="template_slug" id="template_slug">
                            <small id="template_slug-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class=" row form-group">
                        <label class="col-lg-3 col-form-label">Template Heading</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="template_heading" id="template_heading">
                            <small id="template_heading-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class=" row form-group">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                            <select name="status" id="status" class="form-control kt-select2-2">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <small id="status-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class=" row form-group">
                        <label for="role" class="col-lg-3 col-form-label">Template Preview</label>
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="template_preview_holder custom_img_holder2"
                                            src="{{asset('assets/media/bg/login_preview.png')}}" alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change Template Preview">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="template_preview" id="template_preview"
                                            accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel Template Preview">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row justify-content-center m-2">
                                <small class="text-dark text-center">Recommended size 1920 x
                                    1080 px, png, jpg, jpeg or gif</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="template_preview-error" class="text-danger text-center"></small>
                            </div>
                        </div>
                    </div>
                    <div class=" row form-group">
                        <label for="role" class="col-lg-3 col-form-label">Template Background</label>
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="template_background_holder custom_img_holder2"
                                            src="{{asset('assets/media/bg/login_bg.jpg')}}" alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change Template Background">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="template_background" id="template_background"
                                            accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel Template Background">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row justify-content-center m-2">
                                <small class="text-dark text-center">Recommended size 1920 x
                                    1080 px, png, jpg, jpeg or gif</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="template_background-error" class="text-danger text-center"></small>
                            </div>
                        </div>
                    </div>
                    <div class=" row form-group">
                        <label for="role" class="col-lg-3 col-form-label">Template Logo</label>
                        <div class="col-lg-9">
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="template_logo_holder custom_img_holder2"
                                            src="{{asset('assets/media/logos/crm-logo-black-2.png')}}" alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change Template Logo">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="template_logo" id="template_logo"
                                            accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel Template Logo">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row justify-content-center m-2">
                                <small class="text-dark text-center">Recommended size 156 x
                                    48 px, png, jpg, jpeg or gif</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="template_logo-error" class="text-danger text-center"></small>
                            </div>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
                </div>

            </form>
        </div>
    </div>
</div>


<script>
$(function() {

    var table = $('#template_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('login_template') }}",
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
                data: 'template_preview',
                name: 'template_preview'
            },
            {
                data: 'template_name',
                name: 'template_name'
            },
            {
                data: 'login_template_id',
                name: 'login_template_id',
                className: 'text-center'
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
        ]
    });
    table.buttons().container().appendTo('#template_table_length');

});

$('#addTemplate').click(function(e) {
    var preview = "{{asset('assets/media/bg/login_preview.png')}}";
    var bg = "{{asset('assets/media/bg/login_bg.jpg')}}";
    var logo = "{{asset('assets/media/logos/crm-logo-black-2.png')}}";
    $('#modal_title').text('Add Template');
    $('#saveTemplateForm')[0].reset();
    $('.template_preview_holder').attr('src', preview);
    $('.template_background_holder').attr('src', bg);
    $('.template_logo_holder').attr('src', logo);
    $('#templateModal').modal('show');
});

function edit_data(id) {

    var imgLink = "{{asset('public/uploads/system_config')}}/";
    $.ajax({
        url: "{{url('single_login_template')}}/" + id,
        type: "GET",

        success: function(data) {
            $('#modal_title').text('Edit Template');
            $('#template_id').val(data.id);
            $('#template_name').val(data.template_name);
            $('#template_slug').val(data.template_slug);
            $('#template_heading').val(data.template_heading);
            $('.template_preview_holder').attr('src', imgLink+data.template_preview);
            $('.template_background_holder').attr('src', imgLink+data.template_bg);
            $('.template_logo_holder').attr('src', imgLink+data.template_logo);
            $('#status').val(data.status);
            $('#status').trigger('change');
            $('#templateModal').modal('show');
        },
        error: function(data) {
            console.log('Error:', data);
            if (data.status === 500) {
                warningMsg('Data ID not exist!');
            }
        }
    });
}

function apply(id) {
    bootbox.dialog({
        title: "Confirmation",
        message: "Do you really want to apply this template?",
        buttons: {
            cancel: {
                label: 'Not now',
                className: 'btn-danger btn-sm',
            },
            accept: {
                label: 'Apply',
                className: 'btn-success btn-sm',
                callback: function(result) {
                    if (result) {
                        // AJAX Request
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{  url('system_config/template') }}",
                            data: {
                                login_template: id,
                                _token: '{!! csrf_token() !!}'
                            },
                            success: function(response) {
                                successMsg('Login template applied successfully.');
                                $('#template_table').DataTable().ajax.reload(null, false);
                            },
                            error: function(reject) {
                                errorMsg();
                            }
                        });
                    }
                }
            }
        }

    });
}

$(document).ready(function(e) {

    $('#template_preview').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.template_preview_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#template_background').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.template_background_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#template_logo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.template_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});


$('#saveTemplateForm').submit(function(event) {

    event.preventDefault();
    $("[id$=-error]").text('');
    var id = $('#template_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('store_template')}}/" + id,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            console.log('User created');
            successMsg('Template created successfully.');
            $('#template_table').DataTable().ajax.reload();
            $('#templateModal').modal('hide');
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

$(document).on('click', '.delete_data', function(e) {
    e.preventDefault();
    var el = this;
    var id = $(this).data('id');
    // Confirm box
    bootbox.confirm({
        title: "Delete Confirmation",
        message: "Do you really want to delete this user?",
        callback: function(result) {
            if (result) {
                // AJAX Request
                $.ajax({
                    url: "{{url('user')}}/" + id,
                    type: "DELETE",
                    data: {
                        id: id,
                        _token: '{!! csrf_token() !!}'
                    },
                    success: function(response) {
                        // Removing row from HTML Table
                        if (response) {
                            $(el).closest('tr').css('background', '#FC1361');
                            $(el).closest('tr').fadeOut(800, function() {
                                $(this).remove();
                                successMsg('User deleted successfully.');
                                $('#template_table').DataTable().ajax.reload(
                                    null, false);
                            });
                        } else {
                            errorMsg();
                        }
                    }
                });
            }
        }
    });
});
</script>

@endsection