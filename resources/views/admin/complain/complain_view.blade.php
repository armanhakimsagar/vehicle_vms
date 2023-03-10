<!-- begin:: Content -->
<style>
.custom-form-group-border>.form-group>label {
    padding-top: 5px;
}
</style>
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

                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">

                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">

                                    </div>
                                    <div class="kt-widget__content">
                                        <!-- <div class="kt-widget__section">
                                                <a href="" class="kt-widget__username">Car
                                                </a>
                                            </div> -->
                                        <!-- <div class="kt-widget__action">
                                                <span class="btn btn-success btn-sm">Active</span>
                                            </div> -->
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__items">
                                        <a href="javascript:;" id="complain_details"
                                            class="kt-widget__item kt-widget__item--active driver_menu_item"
                                            data-rel="complain_details">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <i class="fas fa-info"></i></span>
                                                <span class="kt-widget__desc">
                                                    Complain Details
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
                                                    Driver Log
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
                    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid vehicle-view">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Complain Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="javascript:;" id="vehicleEdit" class="btn btn-info btn-sm"><i
                                        class="far fa-edit mr-2"></i>Edit</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body text-dark">
                                    <div class="row">
                                        <div class="col-md-9 custom-form-group-border">

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Code</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        {{$complain->complain_token}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Date</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        @if($complain->start_date)
                                                        {{date('d M yy', strtotime($complain->start_date))}},
                                                        <span
                                                            class='badge badge-pill badge-warning'>{{ get_status_time($complain->total_open_days)}}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Customer Name</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        {{$complain->customer_name}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Complain Type</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        {{$complain->complain_type_name}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Complain Details</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        {{$complain->complain_details}}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Phone </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->phone}}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Device </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->device_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Imei</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->imei}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Follower </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->follower_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Reporter </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->reporter_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">District </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->district_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Thana </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->thana_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Status </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        @if($complain->status==1)
                                                        <span class='badge badge-pill badge-success'> Solved
                                                        </span>
                                                        @else
                                                        <span class='badge badge-pill badge-danger'> In Proccess
                                                        </span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Solved Date</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">
                                                        @if($complain->solved_date)
                                                        {{date('d M yy', strtotime($complain->solved_date))}},
                                                        <span
                                                            class='badge badge-pill badge-warning'>{{ get_status_time($complain->solved_date)}}
                                                        </span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Solved By </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->solved_by_name}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Thana </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$complain->thana_name}} </span>
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

                    <div
                        class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none vehicle-edit">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Edit Complain Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" id="closeEdit" class="btn btn-success btn-sm"><i
                                        class="far fa-eye mr-2"></i>View</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>

                            </div>
                        </div>
                        <form class="" id="editComplainForm">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first px-3">
                                    <!-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Generate Date</label>
                                        <div class="col-lg-9">
                                            <div class="input-group">
                                                <input type="text" id="generate_date" class="form-control"
                                                    disabled="disabled" value=" {{$complain->solved_by_name}}"/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <input type="hidden" id="edited_complain_id" value="{{$complain->id}}">
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Customer</label>
                                        <div class="col-lg-9">
                                            <select name="customer_id" class="form-control kt-select2-2">
                                                <option value="">Select</option>
                                                @foreach($customer_list as $c)
                                                <option value="{{$c->id}}"
                                                    {{($complain->customer_id==$c->id) ?'selected':''}}>{{$c->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <small id="customer_id-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Device Name</label>
                                        <div class="col-lg-9">
                                            <select name="device_name" class="form-control kt-select2-2">
                                                <option value="">Select</option>
                                                @foreach($devices as $d)
                                                <option value="{{$d->id}}"
                                                    {{($complain->object_id==$d->id) ?'selected':''}}>
                                                    {{$d->device_name }} - {{$d->imei }} -
                                                    {{$d->cd_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <small id="device_name-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Problem Type</label>
                                        <div class="col-lg-9">
                                            <select name="problem_type" class="form-control kt-select2-2">
                                                <option value="">Select</option>
                                                @foreach($tickets as $t)
                                                <option value="{{$t->id}}"
                                                    {{($complain->complain_type_id==$t->id) ?'selected':''}}>
                                                    {{$t->t_name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="problem_type-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Reporter</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kt-select2-2" name="reporter_id">
                                                <option value="0">Select Reporter</option>
                                                @foreach($user_list as $r)
                                                <option value="{{$r->id}}"
                                                    {{($complain->reporter_id==$r->id) ?'selected':''}}>{{$r->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <small id="device_name-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label">Follower</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kt-select2-2" name="follower_id">
                                                <option value="0">Select Follower</option>
                                                @foreach($user_list as $f)
                                                <option value="{{$f->id}}"
                                                    {{($complain->follower_id==$f->id) ?'selected':''}}>{{$f->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <small id="device_name-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name" class="col-lg-3 col-form-label">Problem Details</label>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" name="complain_details"
                                                rows="3">{{$complain->complain_details}}</textarea>
                                            <small id="complain_details-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name" class="col-lg-3 col-form-label"> Status</label>
                                        <div class="col-lg-9">
                                            <select class="form-control kt-select2-2" name="follower_id">
                                                <option value="1" {{($complain->status==1) ?'selected':''}}>Solved
                                                </option>
                                                <option value="0" {{($complain->status==0) ?'selected':''}}>In Proccess
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <div class="col-md-12 col-sm-12">
                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            <button type="submit"
                                                class="btn btn-brand btn-sm float-right">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Complain Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" id="closeEdit" class="btn btn-success btn-sm"><i
                                        class="far fa-eye mr-2"></i>View</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>

                            </div>
                        </div>
                        <!-- <form class="" id="editVehicleForm">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first px-3">
                                    <div class="form-group row">
                                        <input type="hidden" id="id" value="">
                                        <label class="col-md-3 col-form-label"> Vehicle Name <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="vehicle_name">
                                            <small id="vehicle_name-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">
                                            Vehicle Plate No <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="vehicle_plate_no">
                                            <small id="vehicle_plate_no-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Type</label>
                                        <div class="col-md-7">
                                            <select name="vehicle_type" class="form-control kt-select2-2">

                                            </select>
                                            <small id="vehicle_type-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label">Model Name</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="model_name">
                                            <small id="model_name-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label">Vehicle Color </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="vehicle_color">
                                            <small id="vehicle_color-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label">Vehicle Year <span
                                                class="text-danger">*</span> </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="vehicle_year">
                                            <small id="vehicle_year-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label"> Vehicle Engine No
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="" name="vehicle_engine_no">
                                            <small id="vehicle_engine_no-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label">Avarage Mileage
                                        </label>
                                        <div class="col-lg-7">
                                            <div class="input-group date">
                                                <input type="text" name="avarage_mileage" class="form-control"
                                                    value="" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        Per litter or Galon
                                                    </span>
                                                </div>
                                            </div>
                                            <small id="avarage_mileage-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Ownership</label>
                                        <div class="col-md-7">
                                            <select name="vehicle_ownership" class="form-control kt-select2-2">

                                            </select>
                                            <small id="vehicle_ownership-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Group</label>
                                        <div class="col-md-7">
                                            <select name="vehicle_group" class="form-control kt-select2-2">

                                            </select>
                                            <small id="vehicle_group-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Status</label>
                                        <div class="col-md-7">
                                            <select name="status" class="form-control kt-select2-2">

                                            </select>
                                            <small id="status-error-edited" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-lg-3 col-form-label">Vehicle Photo</label>
                                        <div class="col-lg-7">
                                            <div class="row justify-content-center">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                                    <div>

                                                    </div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Change Template Logo">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="vehicle_photo" id="vehicle_photo"
                                                            accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Cancel Template Logo">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <small id="vehicle_photo-error-edited" class="text-danger text-center"></small>
                                            </div>
                                        </div>
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
                        </form> -->

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
    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('.kt-select2-vehicle').select2({
        placeholder: "Select vehicle"
    });

    $('.kt-select2-problem-type').select2({
        placeholder: "Select problem type"
    });

    $('.kt-select2-manual-status').select2({
        placeholder: "Select complain status"
    });

    $('.kt-select2-district-id').select2({
        placeholder: "Select District"
    });

});


$('#vehicleEdit').click(function(e) {
    $('.vehicle-view').addClass('d-none');
    $('.vehicle-edit').removeClass('d-none');
});

$('#closeEdit').click(function(e) {
    e.preventDefault();

    $('.vehicle-view').removeClass('d-none');
    $('.vehicle-edit').addClass('d-none');

});

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".complain_data_list").removeClass('d-none');
    $(".complain_detail").addClass('d-none');

});

$('#editComplainForm').submit(function(event) {

    event.preventDefault();

    var id = $("#edited_complain_id").val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('complain/saveComplain') }}/" + id,
        data: $('#editComplainForm').serialize(),
        success: function(response) {
            successMsg('Complain updated successfully.');
            $('#complain_table').DataTable().ajax.reload(null, false);
            view_data(id);
        },
        error: function(reject) {
            errorMsg();
            if (reject.status === 422 || reject.status === 403) {
                var errors = $.parseJSON(reject.responseText);
                $.each(errors.error.message, function(key, val) {
                    console.log(key + ' : ' + val);
                    $("small#" + key + "-error-edited").text(val[0]);
                });
            }
        }
    });
});
</script>