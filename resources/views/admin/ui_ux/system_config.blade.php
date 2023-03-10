@extends('layouts.admin.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-link">Login page</a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content Head -->

    <!-- begin:: Content -->

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Branding</h5>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row" style="min-height:180px">

                    <div class="col-4">
                        <form class="kt-form" id="light_logo_form">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="light_logo_holder custom_img_holder"
                                            src="{{asset('uploads/system_config/'.$system_config->light_logo)}}"
                                            alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change light logo">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="light_logo" id="light_logo" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel light logo">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row m-2">
                                <small class="text-dark text-center">Light logo. Recommended size 156 x
                                    48 px, png, jpg, jpeg or gif</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="light_logo-error" class="text-danger text-center"></small>
                            </div>
                            <div class="row justify-content-center my-2">
                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                            </div>
                        </form>

                    </div>
                    <div class="col-4">
                        <form class="kt-form" id="dark_logo_form">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="dark_logo_holder custom_img_holder"
                                            src="{{asset('public/uploads/system_config/'.$system_config->dark_logo)}}"
                                            alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change dark logo">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="dark_logo" id="dark_logo" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel dark logo">
                                        <i class="fa fa-times"></i>
                                    </span>

                                </div>
                            </div>
                            <div class="row m-2">
                                <small class="text-dark text-center">Dark logo. Recommended size 156 x
                                    48 px, png, jpg, jpeg or gif</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="dark_logo-error" class="text-danger text-center"></small>
                            </div>
                            <div class="row justify-content-center my-2">
                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                            </div>
                        </form>

                    </div>
                    <div class="col-4">
                        <form class="kt-form" id="favicon_form">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="favicon_holder custom_img_holder"
                                            src="{{asset('uploads/system_config/'.$system_config->favicon)}}"
                                            alt="image">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change favicon">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="favicon" id="favicon" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel favicon">
                                        <i class="fa fa-times"></i>
                                    </span>

                                </div>
                            </div>
                            <div class="row m-2">
                                <small class="text-dark text-center">Favicon. Recommended size
                                    48 x 48 px, png, jpg, jpeg or ico</small>
                            </div>
                            <div class="row justify-content-center">
                                <small id="favicon-error" class="text-danger text-center"></small>
                            </div>
                            <div class="row justify-content-center my-2">
                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Login page</h5>
                </div>
            </div>

            <div class="kt-portlet__body">
                <form class="kt-form kt-form--label-right" id="template_select_form">
                    @csrf
                    <div class="row" style="min-height:180px">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Login Template</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <select name="login_template" id="login_template" class="form-control kt-select2-2">
                                        @foreach($templates as $temp)
                                        <option value="{{$temp->id}}" {{($system_config->login_template_id ==$temp->id) ? 'selected': ''}}>{{$temp->template_name}}</option>
                                        @endforeach
                                    </select>
                                    <small id="admin_title-error" class="text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row justify-content-center">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                    <div>
                                        <img class="template_preview_holder custom_img_holder2"
                                            src="{{asset('uploads/system_config/'.$system_config->template_preview)}}"
                                            alt="image">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-brand btn-sm ">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Titles</h5>
                </div>
            </div>

            <div class="kt-portlet__body">

                <form class="kt-form kt-form--label-right" id="titles_form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Admin title</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="admin_title" placeholder="Enter admin title"
                                value="{{$system_config->admin_title}}">
                            <small id="admin_title-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Customer title</label>
                        <div class="col-lg-5 col-md-9 col-sm-12">
                            <input type="text" class="form-control" name="customer_title"
                                placeholder="Enter customer title" value="{{$system_config->customer_title}}">
                            <small id="customer_title-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" id="clientSubmit"
                                class="btn btn-brand btn-sm float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- end:: Content -->

</div>

<script>
$(document).ready(function(e) {

    $('#light_logo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.light_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#dark_logo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.dark_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#login_bg').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.login_bg_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#login_logo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.login_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#favicon').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.favicon_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#login_template').change(function(event) {
        event.preventDefault();
        var id = $('#login_template').val();
        var imgLink = "{{asset('public/uploads/system_config')}}/"
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('single_login_template') }}/" +id,
            success: function(response) {
                console.log(response);
                $('.template_preview_holder').attr('src', imgLink+response.template_preview);

            },
            error: function(reject) {
                errorMsg();
            }
        });
    });
});

$('#light_logo_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/light_logo') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Loght logo uploaded successfully.');
            window.location.href = "{{url('system_config')}}";

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

$('#dark_logo_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/dark_logo') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Dark logo uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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

$('#favicon_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/favicon') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Favicon uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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

$('#login_bg_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/login_bg') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Favicon uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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

$('#login_logo_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/login_logo') }}",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Favicon uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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

$('#titles_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/titles') }}",
        data: $(this).serialize(),
        success: function(response) {
            successMsg('Titles uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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

$('#template_select_form').submit(function(event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{  url('system_config/template') }}",
        data: $(this).serialize(),
        success: function(response) {
            successMsg('Login template uploaded successfully.');
            window.location.href = "{{url('system_config')}}";
        },
        error: function(reject) {

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