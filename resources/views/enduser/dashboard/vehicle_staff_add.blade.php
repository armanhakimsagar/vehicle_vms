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
                    <a href="" class="kt-subheader__breadcrumbs-link">Add Vehicle Staff</a>
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
                        Enter Staff Information
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="savevehicleStaffForm">
                    <div class="modal-body  text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label">Staff ID <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="staff_id">
                                <small id="staff_id-error" class="text-danger" for="name"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="driver_name" class="col-lg-3 col-form-label">Staff Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="staff_name">
                                <small id="staff_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_name" class="col-lg-3 col-form-label">Father Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="father_name">
                                <small id="father_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-lg-3 col-form-label">Mother Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="mother_name">
                                <small id="mother_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="phone">
                                <small id="phone-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="email">
                                <small id="email-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Contact One</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="contact_one">
                                <small id="contact_one-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Contact Two</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="contact_two">
                                <small id="contact_two-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Date of Birth <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <div class="input-group">
                                    <input type="text" name="date_of_birth" class="form-control datepicker"
                                        placeholder="DD/MM/YYYY" autocomplete="off" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                                <small id="date_of_birth-error" class="text-danger" for="password"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">NID No <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nid_no">
                                <small id="nid_no-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Present Address <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <textarea class="form-control" name="present_address" rows="2"></textarea>
                                <small id="present_address-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Permanent Address <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <textarea class="form-control" name="permanent_address" rows="2"></textarea>
                                <small id="permanent_address-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Staff Type</label>
                            <div class="col-lg-7">
                                <select name="staff_type" class="form-control kt-select2-2" id="staff_type_selector">
                                   <option value="1">Staff</option>
                                   <option value="1">Staff2</option>
                                </select>
                                <small id="staff_type-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="driving_licence_field">
                            <label class="col-lg-3 col-form-label">Driving Licence <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="driving_licence">
                                <small id="driving_licence-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Work Experience</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="work_experience">
                                <small id="work_experience-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Previous Organisation</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="previous_organisation">
                                <small id="previous_organisation-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Assigned Vehicle</label>
                            <div class="col-lg-7">
                                <select name="assigned_vehicle" id="assigned_vehicle" class="form-control kt-select2-2">
                                    <option value="0">Select</option>
                                    @foreach($vehicles_list as $vehicle)
                                    <option value="{{$vehicle->id}}">{{$vehicle->vehicle_no}} -
                                        {{($vehicle->status==1) ? "Active": "Inactive "}} </option>
                                    @endforeach
                                </select>
                                <small id="assigned_vehicle-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row d-none" id="assigned_date_section">
                            <label class="col-lg-3 col-form-label">Assigned Date</label>
                            <div class="col-lg-7">
                                <div class="input-group">
                                    <input type="text" name="assigned_date" class="form-control datepicker"
                                        placeholder="DD/MM/YYYY" autocomplete="off" />
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="pass-tggl"><i class="la la-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <small id="assigned_date-error" class="text-danger" for="password"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Status</label>
                            <div class="col-lg-7">
                                <select name="status" class="form-control kt-select2-2">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <small id="status-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-lg-3 col-form-label">Profile Photo</label>
                            <div class="col-lg-4">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                    id="kt_apps_user_add_avatar">
                                    <div>
                                        <img class="kt-avatar__holder" id="img-crop"
                                            src="{{asset('assets/media/users/default.jpg')}}" alt="">
                                    </div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                        data-original-title="Change avatar">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="photo" id="photo" accept=".png, .jpg, .jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                        data-original-title="Cancel avatar">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                                <small id="photo-error" class="text-danger"></small>
                            </div>
                            <!-- <div class="col-lg-5">
                            <div id="img-crop" style="display: none"></div>
                        </div> -->
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-8">
                            <div class="form-button">

                                <button type="button" id="reset" class="btn btn-danger btn-sm">Reset</button>

                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
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
    $('#photo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.kt-avatar__holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

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

$(document).on("change", "#staff_type_selector", function() {
    if (this.value == 2) {
        $('#driving_licence_field').removeClass('d-none');
    } else {
        $('#driving_licence_field').addClass('d-none');
    }
});

$(document).on("change", "#assigned_vehicle", function() {
    if (this.value >0) {
        $('#assigned_date_section').removeClass('d-none');
    } else {
        $('#assigned_date_section').addClass('d-none');
    }
});

$('#savevehicleStaffForm').submit(function(event) {
    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveVehicleStaffData') }}/" + id,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            successMsg('Vehicle staff created successfully.');
            window.location.href = "{{url('dashboard/d/vehicle_staff_add')}}";
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