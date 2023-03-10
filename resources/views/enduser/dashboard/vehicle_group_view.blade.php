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
                                        <img src="{{asset('assets/media/cars/100_1.jpg')}}" alt="image">
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
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label"></span>
                                            <span class="kt-widget__data"></span>
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
                                                    Vehicle Information
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
                    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid vehicle-group-view">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Vehicle Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="javascript:;" id="vehicleGroupEdit" class="btn btn-info btn-sm"><i
                                        class="far fa-edit mr-2"></i>Edit</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body text-dark">
                                    <div class="row">
                                        <div class="col-lg-9 custom-form-group-border">

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Name </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">{{$vehicle->vehicle_name}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Plate No </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control">{{$vehicle->vehicle_no}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Type </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vt_name}}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Model Name </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->model_name}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Corol </label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vehicle_corol}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Year</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vehicle_year}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Engine No</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vehicle_engine_no}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Ownership</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vehicle_ownership}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Group</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->vehicle_group}} </span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Avarage Mileage</label>
                                                <div class="col-sm-8">
                                                    <span class="form-control"> {{$vehicle->avarage_mileage}} </span>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Assign GPS</label>
                                                <div class="col-sm-8">
                                                    @if($vehicle->object_id>0)
                                                    <span class="form-control"> {{$vehicle->device_name}} - <span
                                                            class="ml-2 mr-2 badge badge-pill badge-{{$vehicle->other_value}}">{{$vehicle->imei_status}}</span>
                                                        {{$vehicle->imei}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Assign Driver</label>
                                                <div class="col-sm-8">
                                                    @if($vehicle->driver_pid>0)
                                                    <span class="form-control"> {{$vehicle->driver_name}}
                                                        <span
                                                            class="ml-2 mr-2 badge badge-pill badge-{{($vehicle->d_status==1) ? 'success':'danger'}}">{{($vehicle->d_status==1) ? 'Active':'Inactive'}}</span>{{$vehicle->d_phone}}</span>
                                                    @else
                                                    <span class="form-control">NA</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-label col-sm-4">Vehicle Status </label>
                                                <div class="col-sm-8">
                                                    @if($vehicle->status==1)
                                                    <span
                                                        class="badge badge-pill badge-success btn-sm ml-3">Active</span>
                                                    @elseif($vehicle->status==0)
                                                    <span
                                                        class="badge badge-pill badge-warning btn-sm ml-3">Inactive</span>
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

                    <div
                        class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none vehicle-group-edit">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Edit Vehicle Information</h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" id="closeEdit" class="btn btn-success btn-sm"><i
                                        class="far fa-eye mr-2"></i>View</a>
                                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>

                            </div>
                        </div>
                        <form class="" id="editVehicleForm">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first px-3">
                                    <div class="form-group row">
                                        <input type="hidden" id="id" value="{{$vehicle->id}}">
                                        <label class="col-md-3 col-form-label">Vehicle Plate No</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="{{$vehicle->vehicle_no}}"
                                                name="vehicle_plate_no">
                                            <small id="vehicle_plate_no-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Type</label>
                                        <div class="col-md-7">
                                            <select name="vehicle_type" class="form-control kt-select2-2">
                                                @foreach($vehicleType as $v_type)
                                                <option value="{{$v_type->id}}"
                                                    {{($vehicle->vehicle_type==$v_type->id) ? 'selected': ''}}>
                                                    {{$v_type->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="vehicle_type-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-md-3 col-form-label">Model Name</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" value="{{$vehicle->model_name}}"
                                                name="model_name">
                                            <small id="model_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Assign GPS</label>
                                        <div class="col-md-7">
                                            <select name="assign_gps" class="form-control kt-select2-2">
                                                <option value="0">Select</option>
                                                @foreach($gs_objects as $gs_object)
                                                <option value="{{$gs_object->gs_id}}"
                                                    {{($vehicle->object_id==$gs_object->gs_id) ? 'selected': ''}}>
                                                    {{$gs_object->device_name}} - {{$gs_object->cd_name}} -
                                                    {{$gs_object->imei}}</option>
                                                @endforeach
                                            </select>
                                            <small id="assign_gps-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Assign Driver</label>
                                        <div class="col-md-7">
                                            <select name="driver_pid" class="form-control kt-select2-2">
                                                <option value="0">Select</option>
                                                @foreach($drivers as $driver)
                                                <option value="{{$driver->id}}"
                                                    {{($vehicle->driver_pid==$driver->id) ? 'selected': ''}}>
                                                    {{$driver->driver_name}} -
                                                    {{($driver->status==1) ? "Active" : "Inactive"}} -
                                                    {{$driver->phone}}</option>
                                                @endforeach
                                            </select>
                                            <small id="driver_pid-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Vehicle Status</label>
                                        <div class="col-md-7">
                                            <select name="status" class="form-control kt-select2-2">
                                                <option value="1" {{($vehicle->status==1) ? 'selected': ''}}>Active
                                                </option>
                                                <option value="0" {{($vehicle->status==0) ? 'selected': ''}}>Inactive
                                                </option>
                                            </select>
                                            <small id="status-error" class="text-danger"></small>
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


$('#vehicleGroupEdit').click(function(e) {
    $('.vehicle-group-view').addClass('d-none');
    $('.vehicle-group-edit').removeClass('d-none');
});

$('#closeEdit').click(function(e) {
    e.preventDefault();

    $('.vehicle-group-view').removeClass('d-none');
    $('.vehicle-group-edit').addClass('d-none');

});

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".vehicle_group_list").css('display', 'block');
    $('.vehicle_group_detail').css('display', 'none');

});


$(document).ready(function(e) {

    $('#driver_image').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.kt-avatar__holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});


$(document).on('submit', 'form#editVehicleForm', function(event) {

    event.preventDefault();
    var id = $('#id').val();
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveVehicleData') }}/" + id,
        data: $('#editVehicleForm').serialize(),
        success: function(response) {
            successMsg('Vehicle updated successfully.');
            view_data(id);
            at_a_glance();
            $('#vehicle_table').DataTable().ajax.reload(null, false);

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