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
                    <a href="" class="kt-subheader__breadcrumbs-link">Email Setting</a>
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
                    <h3 class="kt-portlet__head-title">
                        Email Setting
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveEmailSetting">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Send Email Using</label>
                            <div class="col-lg-7">
                                <select name="send_email_by" class="form-control kt-select2-2">
                                    <option value="smtp" {{($email_settings['mail_by']=='smtp') ? 'selected':''}}>SMTP
                                    </option>
                                    <option value="php_mail"
                                        {{($email_settings['mail_by']=='php_mail') ? 'selected':''}}>
                                        PHP MAIL</option>
                                    <option value="zoho_mail"
                                        {{($email_settings['mail_by']=='zoho_mail') ? 'selected':''}}>
                                        ZOHO MAIL</option>
                                </select>
                                <small id="send_email_by-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">System Email </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="system_email"
                                    placeholder="Enter system email" value="{{$email_settings['sender']}}">
                                <small id="system_email-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMTP Host</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="smtp_host" placeholder="Enter smtp host"
                                    value="{{$email_settings['smtp_host']}}">
                                <small id="smtp_host-error" class="text-danger"></small>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMTP Username</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="smtp_username"
                                    placeholder="Enter smtp username" value="{{$email_settings['smtp_username']}}">
                                <small id="smtp_username-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMTP Password</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="smtp_password"
                                    placeholder="Enter smtp password" value="{{$email_settings['smtp_password']}}">
                                <small id="smtp_password-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMTP Port</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="smtp_port" placeholder="Enter smtp port"
                                    value="{{$email_settings['smtp_port']}}">
                                <small id="smtp_port-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMTP Secure
                            </label>
                            <div class="col-lg-7">
                                <select name="smtp_secure" class="form-control kt-select2-2">
                                    <option value="SSL" {{($email_settings['smtp_secure']=='SSL') ? 'selected':''}}>
                                        SSL</option>
                                    <option value="TLS" {{($email_settings['smtp_secure']=='TLS') ? 'selected':''}}>
                                        TLS</option>
                                </select>
                                <small id="smtp_secure-error" class="text-danger"></small>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-8">
                            <div class="form-button">
                                <button  type="button" class="btn btn-brand btn-sm" id="testEmail">Test Email</button>
                                <button type="submit" class="btn btn-success btn-sm float-right">Save Changes</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>

<div class="modal fade" id="testEmailModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">Test Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="testEmailForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <input type="hidden" id="id" value="0">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Email Address</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email address">
                            <small id="email-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Send Email</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

});

$('#testEmail').click(function(){
    $('#testEmailForm')[0].reset();
    $('#testEmailModal').modal('show');
});

$('#saveEmailSetting').submit(function(event) {

    event.preventDefault();
    var meta_key = 'email_settings';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveSettings')}}/" + meta_key,
        data: $('#saveEmailSetting').serialize(),
        success: function(response) {
            successMsg('Email setting updated successfully.');
            window.location.href = "{{url('dashboard/setting/email_setting')}}";
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

$('#testEmailForm').submit(function(event) {

    event.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/test_mail')}}",
        data: $('#testEmailForm').serialize(),
        success: function(response) {
            successMsg('Test email sent successfully.');
            $('#testEmailForm')[0].reset();
            $('#testEmailModal').modal('hide');
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