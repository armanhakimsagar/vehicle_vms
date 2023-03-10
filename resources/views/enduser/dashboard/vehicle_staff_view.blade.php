<style>
.custom-form-group-border>.form-group {
    margin-bottom: 10px !important;
}
</style>

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Row-->

    <div class="row single_client">
        <div class=" col-sm-12 order-lg-3 order-xl-1">


            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

                    <!--begin:: Widgets/Applications/User/Profile1-->
                    <div class="kt-portlet " style="height: calc(100% - 20px);">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">

                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        @if($vehicle_staff->staff_image)
                                        <img src="{{asset('public/uploads/driver/'.$vehicle_staff->staff_image)}}"
                                            alt="image">
                                        @else
                                        <img src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                                        @endif
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="" class="kt-widget__username">{{$vehicle_staff->staff_name}}
                                            </a>
                                        </div>
                                        <div class="kt-widget__action">
                                            @if($vehicle_staff->status==0)
                                            <span class="btn btn-warning btn-sm">Inactive</span>
                                            @elseif($vehicle_staff->status==1)
                                            <span class="btn btn-success btn-sm">Active</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Staff ID </span>
                                            <span class="kt-widget__data"> {{$vehicle_staff->staff_id}}</span>
                                        </div>

                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Phone </span>
                                            <span class="kt-widget__data"> {{$vehicle_staff->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__items">
                                        <a href="javascript:;" id="client_information"
                                            class="kt-widget__item kt-widget__item--active driver_menu_item"
                                            data-rel="driver_information">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <i class="fas fa-info"></i></span>
                                                <span class="kt-widget__desc">
                                                    Staff Information
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" id="complain" class="kt-widget__item driver_menu_item"
                                            data-rel="complain">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <i class="fas fa-assistive-listening-systems"></i></span>
                                                <span class="kt-widget__desc">
                                                    Complain
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" id="single_client_login_history"
                                            class="kt-widget__item driver_menu_item"
                                            data-rel="single_client_login_history">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <i class="fas fa-bacon"></i></span>
                                                <span class="kt-widget__desc">
                                                    Staff Log
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>

                    <!--end:: Widgets/Applications/User/Profile1-->
                </div>

                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid  driver-view">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Staff Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="javascript:;" id="driverEdit" class="btn btn-info btn-sm mr-3"><i
                                        class="far fa-edit mr-2"></i>Edit</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body text-dark">
                                    <div class="row">
                                        <div class="col-lg-6 custom-form-group-border">

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Staff ID </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->staff_id}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Staff Name </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->staff_name}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Father Name </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->father_name}}</span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Mother Name </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->mother_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Date of Birth </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->date_of_birth}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4"> Phone </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->phone}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4"> Email </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->email}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4"> Contact One </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->contact_one}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4"> Contact Two </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->contact_two}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">NID No</label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->nid_no}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 custom-form-group-border">

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Present Address </label>
                                                <div class="col-sm-8">
                                                    <span> </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Permanent Address</label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->permanent_address}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Staff Type </label>
                                                <div class="col-sm-8">
                                                    @if($vehicle_staff->staff_type==1)
                                                    <span>Supervisor</span>
                                                    @elseif($vehicle_staff->staff_type==2)
                                                    <span>Driver</span>
                                                    @elseif($vehicle_staff->staff_type==3)
                                                    <span >Contractor</span>
                                                    @elseif($vehicle_staff->staff_type==4)
                                                    <span>Helper</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if($vehicle_staff->staff_type==2)
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Driving Licence</label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->driving_licence}}</span>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Work Experience </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->work_experience}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Previous Organisation </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->previous_organisation}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Assigned Vehicle </label>
                                                <div class="col-sm-8">
                                                    @if($vehicle_staff->assigned_vehicle)
                                                    <span> {{$vehicle_staff->vehicle_no}} - <span
                                                            class="ml-2 mr-2 badge badge-pill badge-{{($vehicle_staff->v_status==1) ? "success": "danger"}}">{{($vehicle_staff->v_status==1) ? "Active": "Inactive"}}</span></span>
                                                    @else
                                                    <span> NA</span>
                                                    @endif
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Assigned Date </label>
                                                <div class="col-sm-8">
                                                    <span> {{$vehicle_staff->assigned_date}}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Status </label>
                                                <div class="col-sm-8">
                                                    @if($vehicle_staff->status==1)
                                                    <span class="badge badge-pill badge-success ml-3">Active</span>
                                                    @elseif($vehicle_staff->status==0)
                                                    <span class="badge badge-pill badge-warning ml-3">Inactive</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end: client view -->

                    <!-- begin: client edit -->

                    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none driver-edit">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Edit Staff Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" id="closeEdit" class="btn btn-success btn-sm mr-3"><i
                                        class="far fa-eye mr-2"></i>View</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>

                            </div>
                        </div>
                        <form class="" id="editDriverForm">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body text-dark px-3">
                                        <div class="form-group row">
                                            <input type="hidden" id="id" value="{{$vehicle_staff->id}}">
                                            <label for="name" class="col-md-3 col-form-label">Staff ID <span
                                                    class="text-danger">*</span> </label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->staff_id}}" name="staff_id">
                                                <small id="staff_id-error" class="text-danger" for="name"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staff_name" class="col-md-3 col-form-label">Staff Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->staff_name}}" name="staff_name">
                                                <small id="staff_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="father_name" class="col-md-3 col-form-label">Father
                                                Name <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->father_name}}" name="father_name">
                                                <small id="father_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mother_name" class="col-md-3 col-form-label">Mother
                                                Name <span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->mother_name}}" name="mother_name">
                                                <small id="mother_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Phone <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->phone}}" name="phone">
                                                <small id="phone-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->email}}" name="email">
                                                <small id="email-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact One</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->contact_one}}" name="contact_one">
                                                <small id="contact_one-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Contact Two</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->contact_two}}" name="contact_two">
                                                <small id="contact_two-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Date of Birth <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input type="text" name="date_of_birth"
                                                        class="form-control datepicker"
                                                        value="{{$vehicle_staff->date_of_birth}}" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="la la-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <small id="date_of_birth-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">NID No <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->nid_no}}" name="nid_no">
                                                <small id="nid_no-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Present Address <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" name="present_address"
                                                    rows="2">{{$vehicle_staff->present_address}}</textarea>
                                                <small id="present_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Permanent Address <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" name="permanent_address"
                                                    rows="2">{{$vehicle_staff->permanent_address}}</textarea>
                                                <small id="permanent_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Staff Type <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <select name="staff_type" class="form-control kt-select2-2"
                                                    id="staff_type_selector">
                                                    <option value="1"
                                                        {{($vehicle_staff->staff_type==1) ? 'selected': ''}}>
                                                        Supervisor</option>
                                                    <option value="2"
                                                        {{($vehicle_staff->staff_type==2) ? 'selected': ''}}>
                                                        Driver</option>
                                                    <option value="3"
                                                        {{($vehicle_staff->staff_type==3) ? 'selected': ''}}>
                                                        Contractor</option>
                                                    <option value="4"
                                                        {{($vehicle_staff->staff_type==4) ? 'selected': ''}}>
                                                        Helper</option>
                                                </select>
                                                <small id="staff_type-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row d-none" id="driving_licence_field">
                                            <label class="col-md-3 col-form-label">Driving Licence <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->driving_licence}}" name="driving_licence">
                                                <small id="driving_licence-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Work Experience</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->work_experience}}" name="work_experience">
                                                <small id="work_experience-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Previous Organisation</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control"
                                                    value="{{$vehicle_staff->previous_organisation}}"
                                                    name="previous_organisation">
                                                <small id="previous_organisation-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Assigned Vehicle</label>
                                            <div class="col-md-7">
                                                <select name="assigned_vehicle" class="form-control kt-select2-2">
                                                    <option value="0">Select </option>
                                                    @foreach($vehicles as $vehicle)
                                                    <option value="{{$vehicle->id}}"
                                                        {{($vehicle->id==$vehicle_staff->assigned_vehicle) ? 'selected': ''}}>
                                                        {{$vehicle->vehicle_no}} -
                                                        {{($vehicle->status==1) ? 'Active':'Inactive'}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="assigned_vehicle-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Assigned Date</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input type="text" name="assigned_date"
                                                        value="{{$vehicle_staff->assigned_date}}"
                                                        class="form-control datepicker" />
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="la la-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <small id="assigned_date-error" class="text-danger"
                                                    for="password"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Status</label>
                                            <div class="col-md-7">
                                                <select name="status" class="form-control kt-select2-2">
                                                    <option value="1" {{($vehicle_staff->status==1) ? 'selected': ''}}>
                                                        Active</option>
                                                    <option value="0" {{($vehicle_staff->status==0) ? 'selected': ''}}>
                                                        Inactive</option>
                                                </select>
                                                <small id="status-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="role" class="col-md-3 col-form-label">Profile Photo</label>
                                            <div class="col-lg-4">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                    id="kt_apps_user_add_avatar">
                                                    <div>
                                                        @if($vehicle_staff->staff_image)
                                                        <img class="kt-avatar__holder" id="img-crop"
                                                            src="{{asset('public/uploads/driver/'.$vehicle_staff->staff_image)}}"
                                                            alt="">
                                                        @else
                                                        <img class="kt-avatar__holder" id="img-crop"
                                                            src="{{asset('assets/media/users/default.jpg')}}"
                                                            alt="">
                                                        @endif
                                                    </div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="photo" id="staff_image"
                                                            accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                                <small id="image-error" class="text-danger"></small>
                                            </div>
                                            <!-- <div class="col-lg-5">
                                                    <div id="img-crop" style="display: none"></div>
                                                </div> -->
                                        </div>

                                        <div class="form-group row mt-5">
                                            <div class="col-md-10 col-sm-12">
                                                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                <button type="submit"
                                                    class="btn btn-brand btn-sm float-right">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--End::Row-->


</div>
<!-- end:: Content -->


<script>
$(document).ready(function(e) {
    var staff_type = $('#staff_type_selector').val();
    if (staff_type == 2) {
        $('#driving_licence_field').removeClass('d-none');
    }

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

$('#driverEdit').click(function(e) {
    e.preventDefault();

    $('.driver-view').addClass('d-none');
    $('.driver-edit').removeClass('d-none');
});

$('#closeEdit').click(function(e) {
    e.preventDefault();

    $('.driver-view').removeClass('d-none');
    $('.driver-edit').addClass('d-none');

});

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".driver_data_list").css('display', 'block');
    $('.driver_detail').css('display', 'none');

});


$(document).ready(function(e) {

    $('#staff_image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.kt-avatar__holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});


$('#editDriverForm').submit(function(event) {
    event.preventDefault();
    var id = $('#id').val();
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
            successMsg('Staff updated successfully.');
            view_data(id);
            at_a_glance();
            $('#vehicle_staff_table').DataTable().ajax.reload(null, false);
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