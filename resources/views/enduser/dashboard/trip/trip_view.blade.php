@extends('layouts.enduser.dashboard.master')

@section('content')
<style>
    .custom_fieldset {
        border: 1.5px solid #ebedf2;
        padding: 10px;
        margin: 10px;
        position: relative;
    }

    .custom_fieldset:hover .closeTripSection {
        opacity: 1;
    }

    .position_relative {
        position: relative;
    }

    .custom_legent {
        width: auto;
        padding: 10px;
        font-size: 15px;
        text-transform: uppercase;
    }

    .closeTripSection {
        opacity: 0;
        position: absolute;
        top: -40px;
        right: -13px;
        background: white;
        height: 2rem !important;
        width: 2rem !important;
    }

    .closeTripSection i {
        font-size: 15px !important;
        margin-left: 1px !important;
        margin-top: 1px !important;
    }

    #addTableRow {
        position: absolute;
        bottom: 15px;
        left: 1px;
        height: 1.5rem !important;
        width: 1.5rem !important;
    }

    #addTableRow i {
        font-size: 10px;
    }

    .customFormGroup .col-form-label {
        margin-bottom: 10px;
    }

    .tableWithInput tbody tr td,
    .tableWithInput tfoot tr td {
        padding-top: 0;
        padding-bottom: 0;
    }

    .tableWithInput tbody tr td .form-control,
    .tableWithInput tfoot tr td .form-control {
        padding: 0;
        border: none !important;
    }

    .tableWithInput tbody tr td.select_option {
        padding: 0 !important;
    }

    .tableWithInput tbody tr:hover .closeExpenseRow {
        opacity: 1;
    }

    .closeExpenseRow {
        opacity: 0;
        position: absolute;
        top: 6px;
        left: -9px;
        background: white;
        height: 1.5rem !important;
        width: 1.5rem !important;
    }

    .closeExpenseRow i {
        font-size: 10px !important;
        margin-left: 1px !important;
    }

    .select_option .select2-container .select2-selection {
        border: none !important;
    }

    .absoluteIcon {
        position: absolute;
        bottom: 50px;
        left: -12px;
    }

    .absoluteIcon td {
        border: none;
    }

    @media (max-width:1023px) {
        .customFormGroup .col-form-label {
            margin-bottom: 0;
            margin-top: 10px;
        }
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Add Trip </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <!--Begin::Row-->
        <div class="row">
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Add Trip</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="saveTripForm">
                                    <div class="text-dark kt-form kt-form--label-right">
                                        @csrf
                                        @method('POST')
                                        <!-- Form content start -->
                                        <input type="hidden" id="tblTripId" value="{{$trip->id}}">
                                        <input type="hidden" name="trip_detail_id_list" value="{{$tripDetailId->id_list}}">
                                        <input type="hidden" name="trip_expense_id_list" value="{{$tripExpenseId->id_list}}">
                                        <fieldset class="custom_fieldset">
                                            <legend class="custom_legent">Vehicle</legend>

                                            <div class="form-group row ">
                                                <label class="col-lg-2 col-form-label">Trip ID </label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="trip_id" placeholder="TRP{{ sprintf('%05d', $trip->id) }}" readonly>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Trip Generated Date</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" name="trip_id" value="{{date('d M Y h:i a', strtotime($trip->created_at))}}" readonly>
                                                    <small id="vehicle_type-error" class="text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-lg-2 col-form-label">Choose Vehicle <span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <select name="vehicle_id" id="selected_vehicle" class="form-control vehicle_filter">
                                                        <option value="{{$trip->vehicle_id}}">{{$trip->vehicle->vehicle_no}}</option>
                                                    </select>
                                                    <small id="vehicle_type-error" class="text-danger"></small>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Status</label>
                                                <div class="col-lg-4">
                                                    <select name="trip_status" id="trip_status" class="form-control kt-select2-2">
                                                        <option value="0" {{$trip->status==0 ? 'selected' : ''}}>Upcoming</option>
                                                        <option value="1" {{$trip->status==1 ? 'selected' : ''}}>In Progress</option>
                                                        <option value="2" {{$trip->status==2 ? 'selected' : ''}}>Complete</option>
                                                    </select>
                                                    <small id="trip_status-error" class="text-danger"></small>
                                                </div>
                                            </div>
                                        </fieldset>


                                        <div id="tripSectionContainer">
                                            @if($tripDetailCount>0)
                                            @php
                                            $i = 0;
                                            @endphp
                                            @foreach($tripDetail as $td)
                                            <div id="section_{{$i}}" class="trip_section">
                                                <fieldset class="custom_fieldset">
                                                    <legend class="custom_legent "><i class="fas fa-minus mr-2 collapseIcon"></i>Trip Section
                                                        <span class="trip_section_counter"></span>
                                                    </legend>
                                                    <button type="button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeTripSection" title="Add Trip"><i class="fas fa-times"></i></button>

                                                    <input type="hidden" name="trip_detail_id[]" value="{{$td->id}}">

                                                    <div class="tripSectionWrapper">
                                                        <div class="form-group row customFormGroup">
                                                            <label class="col-lg-2 col-form-label">Customer <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <select name="customer[]" id="customer_{{$i}}" class="form-control  customer_filter" style="width:100%;">
                                                                            <option value="{{$td->customer_id}}">{{$td->customer_name}}</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <a href="javascript:;" id="addCustomer_{{$i}}" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <small id="customer_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label">Trip Day</label>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                            <input type="radio" class="selectedTripDay_{{$i}}" name="trip_day[][{{$i}}]" value="single" checked>
                                                                            Single <span></span> </label>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                            <input type="radio" class="selectedTripDay_{{$i}}" name="trip_day[][{{$i}}]" value="multi">
                                                                            Multi
                                                                            <span></span> </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label">Trip Type <span class="text-danger">*</span></label>
                                                            <div class="col-lg-4">
                                                                <select name="trip_type[]" id="trip_type_{{$i}}" class="form-control kt-select2-2">
                                                                    {{generate_simple_dropdown('master_settings','name', 'type=16', $td->trip_type)}}
                                                                </select>
                                                                <small id="trip_type_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label total_duration_label_{{$i}}">Total
                                                                Day</label>
                                                            <div class="col-lg-4">
                                                                <input type="number" class="form-control" name="total_duration[]" id="total_duration_{{$i}}" autocomplete="off" value="{{$td->total_duration}}" />
                                                                <small id="total_duration_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row customFormGroup">

                                                            <label class="col-lg-2 col-form-label trip_date_label_{{$i}} d-none">Trip
                                                                Date <span class="text-danger">*</span></label>
                                                            <div class="col-lg-4 d-none" id="single_trip_day_{{$i}}"> <input type="text" class="form-control dateTimePicker" id="trip_date_{{$i}}" name="trip_date[]" autocomplete="off" placeholder="Choose date" />
                                                                <small id="trip_date_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <div class="col-lg-4 d-none" id="multi_trip_day_{{$i}}">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control datePicker1" name="trip_date_from[]" id="trip_date_from_{{$i}}" autocomplete="off" placeholder="From" />
                                                                        <small id="trip_date_from_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control datePicker2 " id="trip_date_to_{{$i}}" name="trip_date_to[]" autocomplete="off" placeholder="To" />
                                                                        <small id="trip_date_to_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label general_contact_person_name_label_{{$i}}">Contact Person Name
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="contact_person_name[]" id="contact_person_name_{{$i}}" autocomplete="off" placeholder="Enter contact person name" value="{{$td->contact_name}}" />
                                                                <small id="contact_person_name_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label general_contact_person_phone_label_{{$i}}">Contact Person Phone
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="contact_person_phone[]" id="contact_person_phone_{{$i}}" autocomplete="off" placeholder="Enter contact person phone" value="{{$td->contact_phone}}" />
                                                                <small id="contact_person_phone_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_pickup_location_label_{{$i}}">Pickup
                                                                Location</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="pickup_location[]" id="pickup_location_{{$i}}" autocomplete="off" placeholder="Enter pickup location" value="{{$td->pickup_location}}" />
                                                                <small id="pickup_location_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_drop_location_label_{{$i}}">Drop
                                                                Location </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="drop_location[]" id="drop_location_{{$i}}" autocomplete="off" placeholder="Enter drop location" value="{{$td->drop_location}}" />
                                                                <small id="drop_location_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_pickup_datetime_label_{{$i}}">Pickup
                                                                Date &
                                                                Time</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control dateTimePicker" name="pickup_time[]" id="pickup_time_{{$i}}" autocomplete="off" placeholder="Choose pickup date & time" value="{{$td->pickup_time}}" />
                                                                <small id="pickup_time_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label general_drop_datetime_label_{{$i}}">Drop
                                                                Date &
                                                                Time</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control dateTimePicker" name="drop_time[]" id="drop_time_{{$i}}" autocomplete="off" placeholder="Choose drop date & time" value="{{$td->drop_time}}" />
                                                                <small id="drop_time_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_carrying_label_{{$i}}">Carrying
                                                                Type
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <select name="carrying_type[]" id="carrying_type_{{$i}}" class="form-control carrying_type_filter">
                                                                            {{generate_simple_dropdown('master_settings','name', 'type=15', $td->carrying_type)}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <a href="javascript:;" id="addCarryingType_{{$i}}" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <small id="carrying_type_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label">Carrying Description
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <textarea name="description[]" class="form-control" id="description_{{$i}}" cols="30" rows="1" placeholder="Enter description">{{$td->carrying_description}}</textarea>
                                                                <small id="description_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_trip_rate_label_{{$i}}">Trip
                                                                Rate <span class="text-danger">*</span></label>
                                                            <div class="col-lg-4">
                                                                <input type="number" class="form-control trip_calculate_{{$i}}" autocomplete="off" name="trip_rate[]" id="trip_rate_{{$i}}" placeholder="Enter trip rate" value="{{$td->trip_rate}}" />
                                                                <small id="trip_rate_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label">Extra
                                                                Amount</label>
                                                            <div class="col-lg-4"> <input type="number" class="form-control trip_calculate_{{$i}}" autocomplete="off" name="extra_amount[]" id="extra_amount_{{$i}}" placeholder="Enter extra amount" value="{{$td->extra_amount}}" />
                                                                <small id="extra_amount_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label general_trip_package_label_{{$i}}">Trip Package
                                                                Type
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <select name="trip_package_type[]" id="trip_package_type_{{$i}}" class="form-control trip_package_filter">
                                                                            {{generate_simple_dropdown('master_settings','name', 'type=13', $td->trip_package_type)}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <a href="javascript:;" id="addPackageType_{{$i}}" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <small id="trip_package_type_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <hr class="down_trip_rel_field_{{$i}} d-none" style="border-top: 0.07rem dashed #c7c8ca; width:50%">
                                                        <div class="form-group row customFormGroup down_trip_rel_field_{{$i}} d-none">
                                                            <label class="col-lg-2 col-form-label ">Down Contact Person Name
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="down_contact_person_name[]" id="down_contact_person_name_{{$i}}" autocomplete="off" placeholder="Enter contact person name" value="{{$td->down_contact_name}}" />
                                                                <small id="down_contact_person_name_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label ">Down Contact Person Phone
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" class="form-control " name="down_contact_person_phone[]" id="down_contact_person_phone_{{$i}}" autocomplete="off" placeholder="Enter contact person phone" value="{{$td->down_contact_phone}}" /> <small id="down_contact_person_phone_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label ">Down
                                                                Pickup
                                                                Location</label>
                                                            <div class="col-lg-4 ">
                                                                <input type="text" class="form-control " name="down_pickup_location[]" id="down_pickup_location_{{$i}}" autocomplete="off" placeholder="Enter pickup location" value="{{$td->down_pickup_location}}" />
                                                                <small id="down_pickup_location_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label ">Down
                                                                Drop Location </label>
                                                            <div class="col-lg-4 ">
                                                                <input type="text" class="form-control " name="down_drop_location[]" id="down_drop_location_{{$i}}" autocomplete="off" placeholder="Enter drop location" value="{{$td->down_drop_location}}" />
                                                                <small id="down_drop_location_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label ">Down
                                                                Pickup Date & Time</label>
                                                            <div class="col-lg-4 ">
                                                                <input type="text" class="form-control dateTimePicker" name="down_pickup_time[]" id="down_pickup_time_{{$i}}" autocomplete="off" placeholder="Choose pickup date & time" value="{{$td->down_pickup_time}}" />
                                                                <small id="down_pickup_time_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label ">Down
                                                                Drop Date & Time</label>
                                                            <div class="col-lg-4 ">
                                                                <input type="text" class="form-control dateTimePicker" name="down_drop_time[]" id="down_drop_time_{{$i}}" autocomplete="off" placeholder="Choose drop date & time" value="{{$td->down_drop_time}}" />
                                                                <small id="down_drop_time_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label ">Down
                                                                Carrying Type
                                                            </label>
                                                            <div class="col-lg-4 ">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <select name="down_carrying_type[]" id="down_carrying_type_{{$i}}" class="form-control carrying_type_filter">
                                                                            {{generate_simple_dropdown('master_settings','name', 'type=15', $td->down_carrying_type)}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <a href="javascript:;" id="addDownCarryingType_{{$i}}" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <small id="down_carrying_type_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label "> Carrying
                                                                Description
                                                            </label>
                                                            <div class="col-lg-4 ">
                                                                <textarea name="down_description[]" class="form-control" id="down_description_{{$i}}" cols="30" rows="1" placeholder="Enter description">{{$td->down_carrying_description}}</textarea>
                                                                <small id="down_description_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label">Down
                                                                Trip Rate <span class="text-danger">*</span></label>
                                                            <div class="col-lg-4 down_trip_rel_field_{{$i}} d-none">
                                                                <input type="number" class="form-control trip_calculate_{{$i}}" autocomplete="off" name="down_trip_rate[]" id="down_trip_rate_{{$i}}" placeholder="Enter trip rate" value="{{$td->down_trip_rate}}" />
                                                                <small id="down_trip_rate_{{$i}}-error" class="text-danger"></small>
                                                            </div>

                                                            <label class="col-lg-2 col-form-label">Extra
                                                                Amount</label>
                                                            <div class="col-lg-4"> <input type="number" class="form-control " autocomplete="off" name="down_extra_amount[]" id="down_extra_amount_{{$i}}" placeholder="Enter extra amount" value="{{$td->down_extra_amount}}" />
                                                                <small id="down_extra_amount_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label 
                                                                ">Down Trip Package
                                                                Type
                                                            </label>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-sm-9">
                                                                        <select name="down_trip_package_type[]" id="down_trip_package_type_{{$i}}" class="form-control trip_package_filter">
                                                                            {{generate_simple_dropdown('master_settings','name', 'type=13', $td->down_trip_package_type)}}
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-3">
                                                                        <a href="javascript:;" id="addDownPackageType_{{$i}}" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                                <small id="down_trip_package_type_{{$i}}-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row customFormGroup">
                                                            <div class="col-md-6"></div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <label class="col-lg-4 col-form-label">Total Amount
                                                                    </label>
                                                                    <div class="col-lg-8"> <input type="text" class="form-control" autocomplete="off" name="total_amount[]" id="total_amount_{{$i}}" readonly placeholder="Total amount" value="{{$td->total_amount}}" />
                                                                        <small id="total_amount_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Discount
                                                                        Amount</label>
                                                                    <div class="col-lg-8"> <input type="number" class="form-control trip_calculate_{{$i}}" autocomplete="off" name="discount_amount[]" id="discount_amount_{{$i}}" placeholder="Enter discount amount" value="{{$td->discount_amount}}" />
                                                                        <small id="discount_amount_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Net Total
                                                                        Amount
                                                                    </label>
                                                                    <div class="col-lg-8"> <input type="number" class="form-control" autocomplete="off" name="net_total_amount[]" id="net_total_amount_{{$i}}" readonly placeholder="Net total amount" value="{{$td->net_total_amount}}" />
                                                                        <small id="net_total_amount_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Advance Paid
                                                                    </label>
                                                                    <div class="col-lg-8"> <input type="number" class="form-control" id="advance_paid_{{$i}}" autocomplete="off" name="advance_paid[]" placeholder="Enter advance paid" value="{{$td->advance_paid}}" />
                                                                        <small id="advance_paid_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Due Amount
                                                                    </label>
                                                                    <div class="col-lg-8"> <input type="number" class="form-control" id="due_amount_{{$i}}" name="due_amount[]" autocomplete="off" readonly placeholder="Due amount" value="{{$td->due_amount}}" />
                                                                        <small id="due_amount_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Payment
                                                                        Method
                                                                    </label>
                                                                    <div class="col-lg-8"> <select name="payment_method[]" id="payment_method_{{$i}}" class="form-control kt-select2-2">
                                                                            {{generate_simple_dropdown('payment_method','method_name', null, $td->payment_method)}}
                                                                        </select>
                                                                        <small id="payment_method_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                    <label class="col-lg-4 col-form-label">Payment
                                                                        Status
                                                                    </label>
                                                                    <div class="col-lg-8"> <input type="text" class="form-control" id="payment_status_{{$i}}" name="payment_status[]" autocomplete="off" readonly placeholder="Payment Status" value="{{$td->payment_status}}" /> <small id="payment_status_{{$i}}-error" class="text-danger"></small> </div>
                                                                    <label class="col-lg-4 col-form-label">Note </label>
                                                                    <div class="col-lg-8">
                                                                        <textarea name="note[]" class="form-control" id="note_{{$i}}" cols="30" rows="2" placeholder="Enter note">{{$td->trip_note}}</textarea>
                                                                        <small id="note_{{$i}}-error" class="text-danger"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            @php $i++ @endphp
                                            @endforeach
                                            @endif
                                        </div>

                                        <div class="form-group row justify-content-center mt-4">
                                            <div>
                                                <button type="button" id="addTripSection" class="btn btn-outline-success btn-elevate btn-circle btn-icon" title="Add Trip"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <!-- Form content end -->
                                    </div>

                                    <div id="expenseSectionContainer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset class="custom_fieldset">
                                                    <legend class="custom_legent"><i class="fas fa-minus mr-2 collapseIcon"></i>Expense Section
                                                    </legend>
                                                    <div class="tripSectionWrapper">
                                                        <table class="table table-bordered table-checkable tableWithInput">
                                                            <thead>
                                                                <tr>
                                                                    <th width="5%" class="text-center">SL</th>
                                                                    <th width="25%">Expense Type</th>
                                                                    <th width="30%">Description</th>
                                                                    <th width="10%" class="text-center">Quantity</th>
                                                                    <th width="10%" class="text-center">Cost</th>
                                                                    <th width="10%" class="text-center">Total</th>
                                                                    <th width="10%" class="text-center">Paid Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="position:relative" id="tableBody">
                                                                @if($tripExpenseCount>0)
                                                                @php
                                                                $x = 0;
                                                                @endphp
                                                                @foreach($tripExpense as $te)
                                                                <tr>
                                                                    <td class="text-center position_relative">
                                                                        <span class="expense_row_counter"></span>
                                                                        <button type="button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeExpenseRow" title="Close Row">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                    <td class="select_option">
                                                                        <input type="hidden" name="trip_expense_id[]" value="{{$te->id}}">
                                                                        <select class="form-control kt-select2-2  expense_type_list" name="expense_type[]" id="expense_type_{{$x}}">
                                                                            {{generate_simple_dropdown('master_settings','name', 'type=14', $te->expense_type)}}
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="expense_description[]" value="{{$te->description}}">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control text-center" name="expense_quantity[]" id="expense_quantity_{{$x}}" value="{{$te->quantity}}">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control text-center" name="expense_cost[]" id="expense_cost_{{$x}}" value="{{$te->cost}}">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control text-center expense_total_amount" readonly name="expense_total[]" id="expense_total_{{$x}}" value="{{$te->total_amount}}">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control text-center expense_paid_amount" name="expense_paid[]" id="expense_paid_{{$x}}" value="{{$te->paid_amount}}">
                                                                    </td>
                                                                </tr>
                                                                @php $x++ @endphp
                                                                @endforeach
                                                                @endif
                                                            </tbody>
                                                            <button type="button" id="addTableRow" class="btn btn-outline-success btn-elevate btn-circle btn-icon" title="Add Row"><i class="fas fa-plus"></i></button>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="5" class="text-right">Net Amount</th>
                                                                    <td><input type="text" class="form-control text-center" readonly id="net_expense_total" value="00.00"></td>
                                                                    <td><input type="text" class="form-control text-center" readonly id="net_expense_paid" value="00.00"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5" class="text-right">Expense Due</th>
                                                                    <th colspan="2"><span id="expense_due_balance"></span></th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5" class="text-right">Expense Status</th>
                                                                    <th colspan="2"><span id="expense_status"></span></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-12">
                                            <div class="form-button">

                                                <button type="button" id="reset" class="btn btn-danger btn-sm">Reset</button>

                                                <button type="button" class="btn btn-success btn-sm float-right" id="tripFormSubmit">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>


    </div>


</div>

<!-- Modal -->
<div class="modal fade" id="CommonModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="load_common_modal_content"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        initTripRelatedFunction();
        initExpenseRelatedFunction();
        trip_section_counter();
        expense_row_counter();
        net_expense_calculation();

        $(".vehicle_filter").select2({
            placeholder: 'Select a vehicle',
            //theme: "material",
            allowClear: true,
            minimumInputLength: 2,
            ajax: {
                type: "GET",
                url: "{{ url('dashboard/fetch_filtered_data/vehicle') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });


    });

    $('#selected_vehicle').change(function() {
        if (this.value) {
            $.ajax({
                type: "GET",
                url: "{{url('dashboard/assigend_staff')}}/" + this.value,
                dataType: "json",
                success: function(result) {

                }
            })
        }

    });

    $("#tripFormSubmit").click(function(e) {
        e.preventDefault();
        let id = $("#tblTripId").val();
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/saveTripData')}}/" + id,
            data: $("#saveTripForm").serialize(),
            success: function(response) {
                successMsg('Trip updated successfully.');
                window.location.href = "{{url('dashboard/trip_view')}}/" + id;
            },
            error: function(error) {
                errorMsg();
            }

        })
    });

    var section_id = "{{$tripDetailCount}}";
    var row_id = "{{$tripExpenseCount}}";

    $('#addTripSection').click(function(e) {
        e.preventDefault();
        addTripSection(section_id);
        section_id++;
    });

    $('#addTableRow').click(function(e) {
        e.preventDefault();
        addTableRow(row_id);
        row_id++;
    });

    function addTripSection(section_id) {
        let currentSection = parseInt(1 + section_id);
        let section =
            '<div id="section_' + section_id + '" class="trip_section"><fieldset class="custom_fieldset"><legend class="custom_legent "><i class="fas fa-minus mr-2 collapseIcon"></i>Trip Section <span class="trip_section_counter"></span></legend> <button type="button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeTripSection" title="Add Trip"><i class="fas fa-times"></i></button><div class="tripSectionWrapper"><div class="form-group row customFormGroup"> <label class="col-lg-2 col-form-label">Customer <span class="text-danger">*</span> </label><div class="col-lg-4"><div class="row"><div class="col-md-9 col-sm-9"> <select name="customer[]" id="customer_' + section_id + '" class="form-control customer_filter" style="width:100%;"><option value="">Select</option> </select></div><div class="col-md-3 col-sm-3"> <a href="javascript:;" id="addCustomer_' + section_id + '" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a></div></div> <small id="customer_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label">Trip Day</label><div class="col-lg-4"><div class="row"><div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand"> <input type="radio" class="selectedTripDay_' + section_id + '" name="trip_day[][' + section_id + ']" value="single" checked> Single <span></span> </label></div><div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand"> <input type="radio" class="selectedTripDay_' + section_id + '" name="trip_day[][' + section_id + ']" value="multi"> Multi <span></span> </label></div></div></div><label class="col-lg-2 col-form-label">Trip Type <span class="text-danger">*</span></label><div class="col-lg-4"> <select name="trip_type[]" id="trip_type_' + section_id + '" class="form-control kt-select2-2"></select> <small id="trip_type_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label total_duration_label_' + section_id + '">Total Day</label><div class="col-lg-4"> <input type="number" class="form-control" name="total_duration[]" id="total_duration_' + section_id + '" value="1" autocomplete="off" /> <small id="total_duration_' + section_id + '-error" class="text-danger"></small></div></div><hr><div class="form-group row customFormGroup"><label class="col-lg-2 col-form-label trip_date_label_' + section_id + ' d-none">Trip Date <span class="text-danger">*</span></label><div class="col-lg-4 d-none" id="single_trip_day_' + section_id + '"> <input type="text" class="form-control dateTimePicker" id="trip_date_' + section_id + '" name="trip_date[]" autocomplete="off" placeholder="Choose date" /> <small id="trip_date_' + section_id + '-error" class="text-danger"></small></div><div class="col-lg-4 d-none" id="multi_trip_day_' + section_id + '"><div class="row"><div class="col-md-6"> <input type="text" class="form-control datePicker1" name="trip_date_from[]" id="trip_date_from_' + section_id + '" autocomplete="off" placeholder="From" /> <small id="trip_date_from_' + section_id + '-error" class="text-danger"></small></div><div class="col-md-6"> <input type="text" class="form-control datePicker2 " id="trip_date_to_' + section_id + '" name="trip_date_to[]" autocomplete="off" placeholder="To" /> <small id="trip_date_to_' + section_id + '-error" class="text-danger"></small></div></div></div><label class="col-lg-2 col-form-label general_contact_person_name_label_' + section_id + '">Contact Person Name </label><div class="col-lg-4"> <input type="text" class="form-control " name="contact_person_name[]" id="contact_person_name_' + section_id + '" autocomplete="off" placeholder="Enter contact person name" /> <small id="contact_person_name_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label general_contact_person_phone_label_' + section_id + '">Contact Person Phone </label><div class="col-lg-4"> <input type="text" class="form-control " name="contact_person_phone[]" id="contact_person_phone_' + section_id + '" autocomplete="off" placeholder="Enter contact person phone" /> <small id="contact_person_phone_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_pickup_location_label_' + section_id + '">Pickup Location</label><div class="col-lg-4"> <input type="text" class="form-control " name="pickup_location[]" id="pickup_location_' + section_id + '" autocomplete="off" placeholder="Enter pickup location" /> <small id="pickup_location_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_drop_location_label_' + section_id + '">Drop Location </label><div class="col-lg-4"> <input type="text" class="form-control " name="drop_location[]" id="drop_location_' + section_id + '" autocomplete="off" placeholder="Enter drop location" /> <small id="drop_location_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_pickup_datetime_label_' + section_id + '">Pickup Date & Time</label><div class="col-lg-4"> <input type="text" class="form-control dateTimePicker" name="pickup_time[]" id="pickup_time_' + section_id + '" autocomplete="off" placeholder="Choose pickup date & time" /> <small id="pickup_time_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label general_drop_datetime_label_' + section_id + '">Drop Date & Time</label><div class="col-lg-4"> <input type="text" class="form-control dateTimePicker" name="drop_time[]" id="drop_time_' + section_id + '" autocomplete="off" placeholder="Choose drop date & time" /> <small id="drop_time_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_carrying_label_' + section_id + '">Carrying Type </label><div class="col-lg-4"><div class="row"><div class="col-md-9 col-sm-9"> <select name="carrying_type[]" id="carrying_type_' + section_id + '" class="form-control carrying_type_filter"><option value="">Select</option> </select></div><div class="col-md-3 col-sm-3"> <a href="javascript:;" id="addCarryingType_' + section_id + '" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a></div></div> <small id="carrying_type_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label">Carrying Description </label><div class="col-lg-4"><textarea name="description[]" class="form-control" id="description_' + section_id + '" cols="30" rows="1" placeholder="Enter description"></textarea><small id="description_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_trip_rate_label_' + section_id + '">Trip Rate <span class="text-danger">*</span></label><div class="col-lg-4"> <input type="number" class="form-control trip_calculate_' + section_id + '" autocomplete="off" name="trip_rate[]" id="trip_rate_' + section_id + '" placeholder="Enter trip rate" /> <small id="trip_rate_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label">Extra Amount</label><div class="col-lg-4"> <input type="number" class="form-control trip_calculate_' + section_id + '" autocomplete="off" name="extra_amount[]" id="extra_amount_' + section_id + '" placeholder="Enter extra amount" /> <small id="extra_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label general_trip_package_label_' + section_id + '">Trip Package Type </label><div class="col-lg-4"><div class="row"><div class="col-md-9 col-sm-9"> <select name="trip_package_type[]" id="trip_package_type_' + section_id + '" class="form-control trip_package_filter"><option value="">Select</option> </select></div><div class="col-md-3 col-sm-3"> <a href="javascript:;" id="addPackageType_' + section_id + '" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a></div></div> <small id="trip_package_type_' + section_id + '-error" class="text-danger"></small></div></div><hr class="down_trip_rel_field_' + section_id + ' d-none" style="border-top: 0.07rem dashed #c7c8ca; width:50%"><div class="form-group row customFormGroup down_trip_rel_field_' + section_id + ' d-none"> <label class="col-lg-2 col-form-label ">Down Contact Person Name </label><div class="col-lg-4"> <input type="text" class="form-control " name="down_contact_person_name[]" id="down_contact_person_name_' + section_id + '" autocomplete="off" placeholder="Enter contact person name" /> <small id="down_contact_person_name_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label ">Down Contact Person Phone </label><div class="col-lg-4"> <input type="text" class="form-control " name="down_contact_person_phone[]" id="down_contact_person_phone_' + section_id + '" autocomplete="off" placeholder="Enter contact person phone" /> <small id="down_contact_person_phone_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label ">Down Pickup Location</label><div class="col-lg-4 "> <input type="text" class="form-control " name="down_pickup_location[]" id="down_pickup_location_' + section_id + '" autocomplete="off" placeholder="Enter pickup location" /> <small id="down_pickup_location_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label ">Down Drop Location </label><div class="col-lg-4 "> <input type="text" class="form-control " name="down_drop_location[]" id="down_drop_location_' + section_id + '" autocomplete="off" placeholder="Enter drop location" /> <small id="down_drop_location_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label ">Down Pickup Date & Time</label><div class="col-lg-4 "> <input type="text" class="form-control dateTimePicker" name="down_pickup_time[]" id="down_pickup_time_' + section_id + '" autocomplete="off" placeholder="Choose pickup date & time" /> <small id="down_pickup_time_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label ">Down Drop Date & Time</label><div class="col-lg-4 "> <input type="text" class="form-control dateTimePicker" name="down_drop_time[]" id="down_drop_time_' + section_id + '" autocomplete="off" placeholder="Choose drop date & time" /> <small id="down_drop_time_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label ">Down Carrying Type </label><div class="col-lg-4 "><div class="row"><div class="col-md-9 col-sm-9"> <select name="down_carrying_type[]" id="down_carrying_type_' + section_id + '" class="form-control carrying_type_filter"><option value="">Select</option> </select></div><div class="col-md-3 col-sm-3"> <a href="javascript:;" id="addDownCarryingType_' + section_id + '" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a></div></div> <small id="down_carrying_type_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label "> Carrying Description </label><div class="col-lg-4 "><textarea name="down_description[]" class="form-control" id="down_description_' + section_id + '" cols="30" rows="1" placeholder="Enter description"></textarea><small id="down_description_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label">Down Trip Rate <span class="text-danger">*</span></label><div class="col-lg-4 down_trip_rel_field_' + section_id + ' d-none"> <input type="number" class="form-control trip_calculate_' + section_id + '" autocomplete="off" name="down_trip_rate[]" id="down_trip_rate_' + section_id + '" placeholder="Enter trip rate" /> <small id="down_trip_rate_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-2 col-form-label">Extra Amount</label><div class="col-lg-4"> <input type="number" class="form-control " autocomplete="off" name="down_extra_amount[]" id="down_extra_amount_' + section_id + '" placeholder="Enter extra amount" /> <small id="down_extra_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-2 col-form-label ">Down Trip Package Type </label><div class="col-lg-4"><div class="row"><div class="col-md-9 col-sm-9"> <select name="down_trip_package_type[]" id="down_trip_package_type_' + section_id + '" class="form-control trip_package_filter"><option value="">Select</option> </select></div><div class="col-md-3 col-sm-3"> <a href="javascript:;" id="addDownPackageType_' + section_id + '" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a></div></div> <small id="down_trip_package_type_' + section_id + '-error" class="text-danger"></small></div></div><hr><div class="form-group row customFormGroup"><div class="col-md-6"></div><div class="col-md-6"><div class="row"> <label class="col-lg-4 col-form-label">Total Amount </label><div class="col-lg-8"> <input type="number" class="form-control" autocomplete="off" name="total_amount[]" id="total_amount_' + section_id + '" readonly placeholder="Total amount" /> <small id="total_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Discount Amount</label><div class="col-lg-8"> <input type="number" class="form-control trip_calculate_' + section_id + '" autocomplete="off" name="discount_amount[]" id="discount_amount_' + section_id + '" placeholder="Enter discount amount" /> <small id="discount_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Net Total Amount </label><div class="col-lg-8"> <input type="number" class="form-control" autocomplete="off" name="net_total_amount[]" id="net_total_amount_' + section_id + '" readonly placeholder="Net total amount" /> <small id="net_total_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Advance Paid </label><div class="col-lg-8"> <input type="number" class="form-control" id="advance_paid_' + section_id + '" autocomplete="off" name="advance_paid[]" placeholder="Enter advance paid" /> <small id="advance_paid_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Due Amount </label><div class="col-lg-8"> <input type="number" class="form-control" id="due_amount_' + section_id + '" name="due_amount[]" autocomplete="off" readonly placeholder="Due amount" /> <small id="due_amount_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Payment Method </label><div class="col-lg-8"> <select name="payment_method[]" id="payment_method_' + section_id + '" class="form-control kt-select2-2"><option value="">Select</option> </select> <small id="payment_method_' + section_id + '-error" class="text-danger"></small></div><label class="col-lg-4 col-form-label">Payment Status </label><div class="col-lg-8"> <input type="text" class="form-control" id="payment_status_' + section_id + '" name="payment_status[]" autocomplete="off" readonly placeholder="Payment Status" /> <small id="payment_status_' + section_id + '-error" class="text-danger"></small></div> <label class="col-lg-4 col-form-label">Note </label><div class="col-lg-8"><textarea name="note[]" class="form-control" id="note_' + section_id + '" cols="30" rows="2" placeholder="Enter note"></textarea><small id="note_' + section_id + '-error" class="text-danger"></small></div></div></div></div></div></fieldset></div>';

        $("#tripSectionContainer").append(section);

        initTripRelatedFunction();
        trip_section_counter();
        fetchOptionList('#trip_type_' + section_id, 'master_settings', 'name', 'where type=16');
        fetchOptionList('#carrying_type_' + section_id, 'master_settings', 'name', 'where type=15');
        fetchOptionList('#trip_package_type_' + section_id, 'master_settings', 'name', 'where type=13');
        fetchOptionList('#payment_method_' + section_id, 'payment_method', 'method_name');
    }

    function addTableRow(row_id) {

        let tableRow = '<tr><td class="text-center position_relative"> <span class="expense_row_counter"></span> <button type="button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeExpenseRow" title="Close Row"> <i class="fas fa-times"></i> </button></td><td class="select_option"> <select class="form-control kt-select2-2 expense_type_list" name="expense_type[]" id="expense_type_' + row_id + '"></select></td><td> <input type="text" class="form-control" name="expense_description[]"></td><td> <input type="text" class="form-control text-center" name="expense_quantity[]" id="expense_quantity_' + row_id + '"></td><td> <input type="text" class="form-control text-center" name="expense_cost[]" id="expense_cost_' + row_id + '"></td><td> <input type="text" class="form-control text-center expense_total_amount" readonly name="expense_total[]" id="expense_total_' + row_id + '"></td><td> <input type="text" class="form-control text-center expense_paid_amount" name="expense_paid[]" id="expense_paid_' + row_id + '"></td></tr>';

        $("#tableBody").append(tableRow);

        initExpenseRelatedFunction();
        expense_row_counter();
        fetchOptionList('#expense_type_' + row_id, 'master_settings', 'name', 'where type=14');


    }

    function trip_calculation(idIndex) {
        let total_duration = ($('#total_duration_' + idIndex).val()) ? $('#total_duration_' + idIndex)
            .val() : 0;

        let trip_rate = ($('#trip_rate_' + idIndex).val()) ? $('#trip_rate_' + idIndex)
            .val() : 0;

        let down_trip_rate = ($('#down_trip_rate_' + idIndex).val()) ? $('#down_trip_rate_' +
            idIndex).val() : 0;

        let extra_amount = ($('#extra_amount_' + idIndex).val()) ? $('#extra_amount_' +
            idIndex).val() : 0;

        let down_extra_amount = ($('#down_extra_amount_' + idIndex).val()) ? $('#down_extra_amount_' +
            idIndex).val() : 0;

        let discount_amount = ($('#discount_amount_' + idIndex).val()) ? $('#discount_amount_' +
            idIndex).val() : 0;

        let advance_paid = ($('#advance_paid_' + idIndex).val()) ? $('#advance_paid_' +
            idIndex).val() : 0;

        // total_amount = ((tripRate + downTripRate) * totalDay) + extraAmount + downExtraAmount

        let total_amount = parseFloat(parseFloat(total_duration * (parseFloat(trip_rate) + parseFloat(
            down_trip_rate))).toFixed(2)) + parseFloat(extra_amount) + parseFloat(down_extra_amount);

        let net_total_amount = parseFloat(parseFloat(total_amount).toFixed(2) - parseFloat(discount_amount).toFixed(2)).toFixed(2);

        let due_amount = parseFloat(parseFloat(net_total_amount).toFixed(2) - parseFloat(advance_paid).toFixed(2)).toFixed(2);

        $('#total_amount_' + idIndex).val(total_amount);

        $('#net_total_amount_' + idIndex).val(net_total_amount);

        $('#due_amount_' + idIndex).val(due_amount);

        if (net_total_amount > 0 && due_amount == 0) {
            $('#payment_status_' + idIndex).val('Full paid');
        } else if (net_total_amount > 0 && due_amount == net_total_amount) {
            $('#payment_status_' + idIndex).val('Full due');
        } else if (net_total_amount > 0 && due_amount > 0 && due_amount < net_total_amount) {
            $('#payment_status_' + idIndex).val('Parital paid');
        } else if (net_total_amount > 0 && due_amount < 0) {
            $('#payment_status_' + idIndex).val('Advance paid');
        }
    }

    function expense_calculation(idIndex) {
        let expense_quantity = ($('#expense_quantity_' + idIndex).val()) ? $('#expense_quantity_' + idIndex)
            .val() : 0;

        let expense_cost = ($('#expense_cost_' + idIndex).val()) ? $('#expense_cost_' + idIndex)
            .val() : 0;

        let expense_paid = ($('#expense_paid_' + idIndex).val()) ? $('#expense_paid_' + idIndex)
            .val() : 0;

        let expense_total = parseFloat(parseFloat(expense_quantity).toFixed(2) * parseFloat(expense_cost).toFixed(2)).toFixed(2);

        $('#expense_total_' + idIndex).val(expense_total);

        net_expense_calculation();

    }

    function net_expense_calculation() {
        var net_expense_total = 0;
        $('.expense_total_amount').each(function() {
            let totalAmount = ($(this).val()) ? $(this).val() : 0;
            net_expense_total = parseFloat(parseFloat(net_expense_total) + parseFloat(totalAmount)).toFixed(2);
        });

        var net_expense_paid = 0;
        $('.expense_paid_amount').each(function() {
            let paidAmount = ($(this).val()) ? $(this).val() : 0;
            net_expense_paid = parseFloat(parseFloat(net_expense_paid) + parseFloat(paidAmount)).toFixed(2);
        });

        let expense_due_balance = parseFloat(parseFloat(net_expense_total) - parseFloat(net_expense_paid)).toFixed(2);

        $('#net_expense_total').val(net_expense_total);
        $('#net_expense_paid').val(net_expense_paid);
        $('#expense_due_balance').text(expense_due_balance);

        if (net_expense_total > 0 && net_expense_paid == 0) {
            $('#expense_status').text('Full due');
        } else if (net_expense_total > 0 && net_expense_total == net_expense_paid) {
            $('#expense_status').text('Full paid');
        } else if (net_expense_total > 0 && net_expense_paid > 0 && net_expense_paid < net_expense_total) {
            $('#expense_status').text('Parital paid');
        } else if (net_expense_total > 0 && net_expense_paid > 0 && net_expense_paid > net_expense_total) {
            $('#expense_status').text('Advance paid');
        }
    }

    function initTripRelatedFunction() {

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $(".carrying_type_filter").select2({
            placeholder: 'Select a carrying type',
        });

        $(".trip_package_filter").select2({
            placeholder: 'Select a trip package',

        });

        $(".customer_filter").select2({
            placeholder: 'Select a customer',
            //theme: "material",
            allowClear: true,
            minimumInputLength: 3,
            ajax: {
                type: "GET",
                url: "{{ url('dashboard/fetch_filtered_data/customer') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });


        $('.closeTripSection').each(function(index) {
            $(this).click(function() {
                $(this).parent().parent().remove();
                trip_section_counter();
            });
        });

        $(".collapseIcon").each(function(index) {
            $(this).click(function(event) {
                console.log('clicked ' + index);
                if ($(this).hasClass('fa-plus')) {
                    $(this).removeClass('fa-plus');
                    $(this).addClass('fa-minus');
                } else {
                    $(this).removeClass('fa-minus');
                    $(this).addClass('fa-plus');
                }
                let test = $(this).parent().siblings(".tripSectionWrapper");

                if (test.is(':hidden')) {
                    console.log('this is hidden');
                } else {
                    console.log('this is open');
                }
                $(this).parent().siblings(".tripSectionWrapper").slideToggle(
                    "slow");
                return false;
            });
        });


        $("select[id^=trip_type_]").change(function() {
            let idIndex = $(this).attr('id').substr(10);
            if (this.value == 31) {
                $('.total_duration_label_' + idIndex).html('Total Hours <span class="text-danger">*</span>');
                $('#total_duration_' + idIndex).val(6);
            } else if (this.value == 33) {
                $('.total_duration_label_' + idIndex).html('Total Month');
                $('#total_duration_' + idIndex).val(1);
            } else {
                $('.total_duration_label_' + idIndex).html('Total Day');
                $('#total_duration_' + idIndex).val(1);
            }

            if (this.value == 29) {
                $('.trip_date_label_' + idIndex).html('Up Trip Date <span class="text-danger">*</span>');
                $('.general_trip_rate_label_' + idIndex).html('Up Trip Rate <span class="text-danger">*</span>');
                $('.general_contact_person_name_label_' + idIndex).html('Up Contact Person Name');
                $('.general_contact_person_phone_label_' + idIndex).html('Up Contact Person Phone');
                $('.general_pickup_location_label_' + idIndex).html('Up Pickup Location');
                $('.general_drop_location_label_' + idIndex).html('Up Drop Location');
                $('.general_pickup_datetime_label_' + idIndex).html('Up Pickup Date & Time');
                $('.general_drop_datetime_label_' + idIndex).html('Up Drop Date & Time');
                $('.general_carrying_label_' + idIndex).html('Up Carrying Type');
                $('.general_trip_package_label_' + idIndex).html('Up Trip Package Type');
                $('.down_trip_rel_field_' + idIndex).removeClass('d-none');
                fetchOptionList('#down_carrying_type_' + idIndex, 'master_settings', 'name', 'where type=15');
                fetchOptionList('#down_trip_package_type_' + idIndex, 'master_settings', 'name', 'where type=13');
            } else {
                $('.trip_date_label_' + idIndex).html('Trip Date <span class="text-danger">*</span>');
                $('.general_trip_rate_label_' + idIndex).html('Trip Rate <span class="text-danger">*</span>');
                $('.general_contact_person_name_label_' + idIndex).html('Contact Person Name');
                $('.general_contact_person_phone_label_' + idIndex).html('Contact Person Phone');
                $('.general_pickup_location_label_' + idIndex).html('Pickup Location');
                $('.general_drop_location_label_' + idIndex).html('Drop Location');
                $('.general_pickup_datetime_label_' + idIndex).html('Pickup Date & Time');
                $('.general_drop_datetime_label_' + idIndex).html('Drop Date & Time');
                $('.general_carrying_label_' + idIndex).html('Carrying Type');
                $('.general_trip_package_label_' + idIndex).html('Trip Package Type');
                $('.down_trip_rel_field_' + idIndex).addClass('d-none');
                $('#down_trip_rate_' + idIndex).val(0);
            }

            trip_calculation(idIndex);
        });

        $("a[id^=addCustomer_]").click(function() {
            let idIndex = $(this).attr('id').substr(12);
            $.ajax({
                type: "html",
                url: "{{ url('dashboard/fetch_modal_content/add_customer') }}",
                type: "GET",
                data: {
                    idIndex: idIndex
                },
                success: function(data) {
                    $('#load_common_modal_content').html(data);
                    $('#CommonModal').modal('show');

                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });

        });

        $("a[id^=addCarryingType_]").click(function() {
            let idIndex = $(this).attr('id').substr(16);
            fetch_carrying_type(idIndex);
        });

        $("a[id^=addDownCarryingType_]").click(function() {
            let idIndex = $(this).attr('id').substr(20) + '_down';
            fetch_carrying_type(idIndex);
        });
        $("a[id^=addPackageType_]").click(function() {
            let idIndex = $(this).attr('id').substr(15);
            fetch_package_type(idIndex);
        });

        $("a[id^=addDownPackageType_]").click(function() {
            let idIndex = $(this).attr('id').substr(19) + '_down';
            fetch_package_type(idIndex);
        });

        $("input[id^=total_duration_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(15);
            trip_calculation(idIndex);
        });

        $("input[id^=trip_rate_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(10);
            trip_calculation(idIndex);
        });

        $("input[id^=down_trip_rate_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(15);
            trip_calculation(idIndex);
        });

        $("input[id^=extra_amount_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(13);
            trip_calculation(idIndex);
        });

        $("input[id^=down_extra_amount_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(18);
            trip_calculation(idIndex);
        });

        $("input[id^=discount_amount_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(16);
            trip_calculation(idIndex);
        });

        $("input[id^=advance_paid_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(13);
            trip_calculation(idIndex);
        });

        $('form').on('focus', 'input[type=number]', function(e) {
            $(this).on('wheel.disableScroll', function(e) {
                e.preventDefault()
            })
        })

        $('form').on('blur', 'input[type=number]', function(e) {
            $(this).off('wheel.disableScroll')
        })

        $('.datePicker1').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        }).on('changeDate', function() {
            $('.dateTo').focus();
        });

        $('.datePicker2').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });

        $('.dateTimePicker').datetimepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy h:i',
            showMeridian: true,
        });

        $(".timepicker").timepicker({
            defaultTime: "",
            minuteStep: 5,
            showSeconds: false,
            showMeridian: true,
        });
    }

    function initExpenseRelatedFunction() {
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('.closeExpenseRow').each(function(index) {
            $(this).click(function() {
                $(this).parent().parent().remove();
                expense_row_counter();
                net_expense_calculation();
            });
        });

        $("input[id^=expense_quantity_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(17);
            expense_calculation(idIndex);
        });

        $("input[id^=expense_cost_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(13);
            expense_calculation(idIndex);
        });

        $("input[id^=expense_paid_]").keyup(function() {
            let idIndex = $(this).attr('id').substr(13);
            expense_calculation(idIndex);
        });
    }

    function fetch_carrying_type(idIndex) {
        $.ajax({
            type: "html",
            url: "{{ url('dashboard/fetch_modal_content/add_carrying_type') }}",
            type: "GET",
            data: {
                idIndex: idIndex
            },
            success: function(data) {
                $('#load_common_modal_content').html(data);
                $('#CommonModal').modal('show');

            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    }

    function fetch_package_type(idIndex) {
        $.ajax({
            type: "html",
            url: "{{ url('dashboard/fetch_modal_content/add_package_type') }}",
            type: "GET",
            data: {
                idIndex: idIndex
            },
            success: function(data) {
                $('#load_common_modal_content').html(data);
                $('#CommonModal').modal('show');

            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    }

    function fetchOptionList(pushInto, table, column, condition = null, selected = null) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: table,
                column: column,
                condition: condition,
                selected: selected,
                _token: '{!! csrf_token() !!}',
            },
            success: function(data) {
                $(pushInto).html(data);
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

    function trip_section_counter() {
        $(".trip_section_counter").each(function(i, obj) {
            $(this).text(parseInt(i + 1));
        });
    }

    function expense_row_counter() {
        $(".expense_row_counter").each(function(i, obj) {
            $(this).text(parseInt(i + 1));
        });
    }
</script>
@endsection