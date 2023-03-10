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
                    <a href="" class="kt-subheader__breadcrumbs-link">Business Setting</a>
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
                        Business Setting
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveEmailSetting">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet light">
                                    <div class="form-body">
                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Business Type</label>
                                            <div class="col-md-8">
                                                <label
                                                    class="btn btn-outline-primary {{($business_settings['business_type']=='1') ? 'active':''}}"
                                                    id="organization"
                                                    style="padding-bottom:7px; margin-bottom: 0;">Organization</label>
                                                <label
                                                    class="btn btn-outline-primary  {{($business_settings['business_type']=='2') ? 'active':''}}"
                                                    id="individual"
                                                    style="padding-bottom:7px; margin-bottom: 0;">Individual</label>
                                                <input type="hidden" name="business_type" id="business_type"
                                                    value="{{$business_settings['business_type']}}">
                                                <small id="business_type-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Business Name</label>
                                            <div class="col-md-8">
                                                <input name="business_name" placeholder="Business Name"
                                                    class="form-control" type="text"
                                                    value="{{$business_settings['business_name']}}">
                                                <small id="business_name-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-form-label col-md-4">First Name</label>
                                            <div class="col-md-8">
                                                <input name="first_name" placeholder="First Name" class="form-control"
                                                    type="text" value="{{$business_settings['first_name']}}">
                                                <small id="first_name-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Last Name</label>
                                            <div class="col-md-8">
                                                <input name="last_name" placeholder="Last Name" class="form-control"
                                                    type="text" value="{{$business_settings['last_name']}}">
                                                <small id="last_name-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Email Address</label>
                                            <div class="col-md-8">
                                                <input name="email" placeholder="Email" class="form-control" type="text"
                                                    value="{{$business_settings['email']}}">
                                                <small id="email-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Website</label>
                                            <div class="col-md-8">
                                                <input name="website" placeholder="Website" class="form-control"
                                                    type="text" value="{{$business_settings['website']}}">
                                                <small id="website-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Tax Id (TIN)</label>
                                            <div class="col-md-8">
                                                <input name="tin" placeholder="TIN" class="form-control" type="text"
                                                    value="{{$business_settings['tin']}}">
                                                <small id="tin-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">VAT Reg. No</label>
                                            <div class="col-md-8">
                                                <input name="vat" placeholder="VAT No." class="form-control" type="text"
                                                    value="{{$business_settings['vat']}}">
                                                <small id="vat-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Business ID No.(BIN)</label>
                                            <div class="col-md-8">
                                                <input name="bin" placeholder="BIN" class="form-control" type="text"
                                                    value="{{$business_settings['bin']}}">
                                                <small id="bin-error" class="text-danger"></small>
                                            </div>
                                        </div>


                                    </div>
                                </div><!-- end of portlet.... -->
                            </div>
                            <div class="col-md-6">
                                <div class="portlet light">
                                    <div class="form-body">
                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Address (Line 1)</label>
                                            <div class="col-md-8">
                                                <input name="address_1" placeholder="Address 1" class="form-control"
                                                    type="text" value="{{$business_settings['address_1']}}">
                                                <small id="address_1-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Address (Line 2)</label>
                                            <div class="col-md-8">
                                                <input name="address_2" placeholder="Address 2" class="form-control"
                                                    type="text" value="{{$business_settings['address_2']}}">
                                                <small id="address_2-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">State</label>
                                            <div class="col-md-8">
                                                <input name="state" placeholder="State" class="form-control" type="text"
                                                    value="{{$business_settings['state']}}">
                                                <small id="state-error" class="text-danger"></small>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">City</label>
                                            <div class="col-md-8">
                                                <input name="city" placeholder="City" class="form-control" type="text"
                                                    value="{{$business_settings['city']}}">
                                                <small id="city-error" class="text-danger"></small>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Zip</label>
                                            <div class="col-md-8">
                                                <input name="zip" placeholder="zip" class="form-control" type="text"
                                                    value="{{$business_settings['zip']}}">
                                                <small id="zip-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row required">
                                            <label class="col-form-label col-md-4">Country</label>
                                            <div class="col-md-8">
                                                <select name="country" id="" class="form-control kt-select2">
                                                    <option value="bangladesh">Bangladesh</option>
                                                    <option value="uk">UK</option>
                                                </select>
                                                <small id="phone-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Phone</label>
                                            <div class="col-md-8">
                                                <input name="phone" placeholder="Phone" class="form-control" type="text"
                                                    value="{{$business_settings['phone']}}">
                                                <small id="phone-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Mobile</label>
                                            <div class="col-md-8">
                                                <input name="mobile" placeholder="Mobile" class="form-control"
                                                    type="text" value="{{$business_settings['mobile']}}">
                                                <small id="mobile-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Fax</label>
                                            <div class="col-md-8">
                                                <input name="fax" placeholder="Fax" class="form-control" type="text"
                                                    value="{{$business_settings['fax']}}">
                                                <small id="fax-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- end of portlet.... -->
                            </div>
                        </div>
                        <div class="row text-center" style="padding-top: 25px;">
                            <div class="col-sm-12">
                                <strong>Business Logo/Branding :</strong>

                                <div id="targetLayer"></div>
                                <div class="kt-avatar kt-avatar--outline kt-avatar" id="kt_apps_user_add_avatar"
                                    style="margin-top:20px">
                                    <input type="hidden" name="old_logo_image" value="{{$business_settings['logo_image']}}">
                                    <div>
                                        @if($business_settings['logo_image'] !=null)
                                        <img class="company_logo_holder" id="img-crop"
                                            src="{{asset('public/uploads/business_logo/'.$business_settings['logo_image'])}}"
                                            alt="">
                                        @else
                                        <img class="company_logo_holder" id="img-crop"
                                            src="{{asset('assets/media/users/default.jpg')}}" alt="">
                                        @endif
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="logo_image" id="photo" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel avatar">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                                <small id="logo_image-error" class="text-danger"></small>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-button">
                                <input type="reset" class="btn btn-danger btn-sm" value="Reset">
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


<script>
$(document).ready(function() {

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('#photo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.company_logo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});

$('#testEmail').click(function() {
    $('#testEmailForm')[0].reset();
    $('#testEmailModal').modal('show');
});

$("#organization").click(function() {
    $("#organization").addClass('active');
    $("#individual").removeClass('active');
    $('#business_type').val('1');
});

$("#individual").click(function() {
    $("#organization").removeClass('active');
    $("#individual").addClass('active');
    $('#business_type').val('2');
});

$('#saveEmailSetting').submit(function(event) {

    event.preventDefault();
    var meta_key = 'business_settings';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveSettings')}}/" + meta_key,
        // data: $('#saveEmailSetting').serialize(),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Business setting updated successfully.');
            window.location.href = "{{url('dashboard/setting/business_setting')}}";
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