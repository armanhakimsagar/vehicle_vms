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
                    <a href="" class="kt-subheader__breadcrumbs-link">Add vehicle</a>
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
                        Add Vehicle
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveVehicleForm">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Vehicle
                                Name <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="vehicle_name"
                                    placeholder="Enter vehicle name">
                                <small id="vehicle_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Plate
                                No <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="vehicle_plate_no"
                                    placeholder="Enter vehicle plate no">
                                <small id="vehicle_plate_no-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Type <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select name="vehicle_type" class="form-control kt-select2-2">
                                    <option value="">Select</option>
                                    @foreach($vehicleType as $v_type)
                                    <option value="{{$v_type->id}}">{{$v_type->name}}</option>
                                    @endforeach
                                </select>
                                <small id="vehicle_type-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Model Name</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="model_name"
                                    placeholder="Enter vehicle model name">
                                <small id="model_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Color</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="vehicle_color"
                                    placeholder="Enter vehicle color">
                                <small id="vehicle_color-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Year <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="vehicle_year"
                                    placeholder="Enter vehicle year">
                                <small id="vehicle_year-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Engine
                                No <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="vehicle_engine_no"
                                    placeholder="Enter vehicle engine no">
                                <small id="vehicle_engine_no-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Avarage Mileage</label>
                            <div class="col-lg-7">
                                <div class="input-group date">
                                    <input type="text" name="avarage_mileage" class="form-control"
                                        placeholder="Enter avarege mileage value" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            Per litter or Galon
                                        </span>
                                    </div>
                                </div>
                                <small id="avarage_mileage-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Ownership <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select name="vehicle_ownership" class="form-control kt-select2-2">
                                    <option value="">Select</option>
                                    @foreach($ownershipType as $w_type)
                                    <option value="{{$w_type->id}}">{{$w_type->name}}</option>
                                    @endforeach
                                </select>
                                <small id="vehicle_ownership-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Group</label>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md-10 col-sm-9">
                                        <select name="vehicle_group" class="form-control kt-select2-2">
                                            @foreach($vehicleGroup as $v_group)
                                            <option value="{{$v_group->id}}">{{$v_group->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <a href="{{url('dashboard/d/vehicle_group')}}" target="_blank"
                                            class="btn btn-success btn-sm" style="width:100%">Add Group</a>
                                    </div>
                                </div>

                                <small id="vehicle_group-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Vehicle Status <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-7">
                                <select name="status" class="form-control kt-select2-2">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <small id="status-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-lg-3 col-form-label">Vehicle Photo</label>
                            <div class="col-lg-7">
                                <div class="row justify-content-center">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                        <div>
                                            <img class="vehicle_photo_holder custom_img_holder2"
                                                src="{{asset('assets/media/cars/private.jpg')}}" alt="image">
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
                                    <small id="vehicle_photo-error" class="text-danger text-center"></small>
                                </div>
                            </div>
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
    $('#vehicle_photo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.vehicle_photo_holder').attr('src', e.target.result);
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

$('#saveVehicleForm').submit(function(event) {

    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveVehicleData')}}/" + id,
        // data: $('#saveVehicleForm').serialize(),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(response) {
            console.log('Vehicle created');
            successMsg('Vehicle created successfully.');
            window.location.href = "{{url('dashboard/d/vehicle_add')}}";
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