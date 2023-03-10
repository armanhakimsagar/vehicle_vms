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


    .customFormGroup .col-form-label {
        margin-bottom: 10px;
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

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid trip-details-view">


    <!--Begin::Row-->
    <div class="row">
        <div class="col-sm-12 order-lg-3 order-xl-1">
            <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                <div class="kt-portlet__head ">
                    <div class="kt-portlet__head-label">
                        <h5 class="kt-portlet__head-title">Trip Detalis</h5>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="javascript:;" id="tripDetailsEdit" class="btn btn-info btn-sm"><i class="far fa-edit mr-2"></i>Edit</a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body text-dark kt-form kt-form--label-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-dark kt-form kt-form--label-right">

                                        <fieldset class="custom_fieldset">
                                            <legend class="custom_legent">Vehicle</legend>

                                            <div class="form-group row ">
                                                <label class="col-lg-2 col-form-label">Trip ID </label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" value="TRP{{ sprintf('%05d', $tripDetail->trip_id) }}" readonly>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Trip Generated Date</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" value="{{date('d M Y h:i a', strtotime($tripDetail->created_at))}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-lg-2 col-form-label">Vehicle </label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" value="{{ $tripDetail->vehicle_no }}" readonly>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Trip Status</label>
                                                <div class="col-lg-4">

                                                    @if($tripDetail->trip_status==0)
                                                    <input type="text" class="form-control" value="Upcoming" readonly>
                                                    @elseif($tripDetail->trip_status==1)
                                                    <input type="text" class="form-control" value="In Progress" readonly>
                                                    @elseif($tripDetail->trip_status==2)
                                                    <input type="text" class="form-control" value="Complete" readonly>
                                                    @endif
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="custom_fieldset">
                                            <legend class="custom_legent "><i class="fas fa-minus mr-2 collapseIcon"></i>Trip Section
                                                <span class="trip_section_counter"></span>
                                            </legend>
                                            <div class="tripSectionWrapper">
                                                <div class="form-group row customFormGroup">
                                                    <label class="col-lg-2 col-form-label">Customer
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->customer_name}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Trip Day</label>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                    <input type="radio" class="selectedTripDay_view" readonly name="trip_day" value="single" checked>
                                                                    Single <span></span> </label>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                    <input type="radio" class="selectedTripDay_view" readonly name="trip_day" value="multi">
                                                                    Multi
                                                                    <span></span> </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label class="col-lg-2 col-form-label">Trip Type </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->trip_type_name}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label total_duration_label_view">Total
                                                        Day</label>
                                                    <div class="col-lg-4">
                                                        <input type="number" class="form-control" readonly name="total_duration" id="total_duration_view" value="{{$tripDetail->total_duration}}" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row customFormGroup">

                                                    <label class="col-lg-2 col-form-label trip_date_label_view d-none">Trip
                                                        Date </label>
                                                    <div class="col-lg-4 d-none" id="single_trip_day_view"> <input type="text" class="form-control dateTimePicker" id="trip_date_view" readonly name="trip_date" placeholder="Choose date" />
                                                    </div>
                                                    <div class="col-lg-4 d-none" id="multi_trip_day_view">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control datePicker1" readonly name="trip_date_from" id="trip_date_from_view" placeholder="From" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control datePicker2 " id="trip_date_to_view" readonly name="trip_date_to" placeholder="To" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <label class="col-lg-2 col-form-label general_contact_person_name_label_view">Contact Person Name
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" id="contact_person_name_view" placeholder="Enter contact person name" value="{{$tripDetail->contact_name}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label general_contact_person_phone_label_view">Contact Person Phone
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_phone" id="contact_person_phone_view" placeholder="Enter contact person phone" value="{{$tripDetail->contact_phone}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_pickup_location_label_view">Pickup
                                                        Location</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="pickup_location" id="pickup_location_view" placeholder="Enter pickup location" value="{{$tripDetail->pickup_location}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_drop_location_label_view">Drop
                                                        Location </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="drop_location" id="drop_location_view" placeholder="Enter drop location" value="{{$tripDetail->drop_location}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_pickup_datetime_label_view">Pickup
                                                        Date &
                                                        Time</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control dateTimePicker" readonly name="pickup_time" id="pickup_time_view" placeholder="Choose pickup date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->pickup_time))}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label general_drop_datetime_label_view">Drop
                                                        Date &
                                                        Time</label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control dateTimePicker" readonly name="drop_time" id="drop_time_view" placeholder="Choose drop date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->drop_time))}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_carrying_label_view">Carrying
                                                        Type
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->carrying_type_name}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Carrying Description
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <textarea readonly name="description" class="form-control" id="description_view" cols="30" rows="1" placeholder="Enter description">{{$tripDetail->carrying_description}}</textarea>
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_trip_rate_label_view">Trip
                                                        Rate </label>
                                                    <div class="col-lg-4">
                                                        <input type="number" class="form-control trip_calculate_view" readonly name="trip_rate" id="trip_rate_view" placeholder="Enter trip rate" value="{{$tripDetail->trip_rate}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label">Extra
                                                        Amount</label>
                                                    <div class="col-lg-4"> <input type="number" class="form-control trip_calculate_view" readonly name="extra_amount" id="extra_amount_view" placeholder="Enter extra amount" value="{{$tripDetail->extra_amount}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label general_trip_package_label_view">Trip Package
                                                        Type
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->trip_package_type_name}}" />
                                                    </div>
                                                </div>
                                                <hr class="down_trip_rel_field_view d-none" style="border-top: 0.07rem dashed #c7c8ca; width:50%">
                                                <div class="form-group row customFormGroup down_trip_rel_field_view d-none">
                                                    <label class="col-lg-2 col-form-label ">Down Contact Person Name
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="down_contact_person_name" id="down_contact_person_name_view" placeholder="Enter contact person name" value="{{$tripDetail->down_contact_name}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label ">Down Contact Person Phone
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="down_contact_person_phone" id="down_contact_person_phone_view" placeholder="Enter contact person phone" value="{{$tripDetail->down_contact_phone}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label ">Down
                                                        Pickup
                                                        Location</label>
                                                    <div class="col-lg-4 ">
                                                        <input type="text" class="form-control " readonly name="down_pickup_location" id="down_pickup_location_view" placeholder="Enter pickup location" value="{{$tripDetail->down_pickup_location}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label ">Down
                                                        Drop Location </label>
                                                    <div class="col-lg-4 ">
                                                        <input type="text" class="form-control " readonly name="down_drop_location" id="down_drop_location_view" placeholder="Enter drop location" value="{{$tripDetail->down_drop_location}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label ">Down
                                                        Pickup Date & Time</label>
                                                    <div class="col-lg-4 ">
                                                        <input type="text" class="form-control dateTimePicker" readonly name="down_pickup_time" id="down_pickup_time_view" placeholder="Choose pickup date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->down_pickup_time))}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label ">Down
                                                        Drop Date & Time</label>
                                                    <div class="col-lg-4 ">
                                                        <input type="text" class="form-control dateTimePicker" readonly name="down_drop_time" id="down_drop_time_view" placeholder="Choose drop date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->down_drop_time))}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label ">Down
                                                        Carrying Type
                                                    </label>
                                                    <div class="col-lg-4 ">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->down_carrying_type_name}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label "> Carrying
                                                        Description
                                                    </label>
                                                    <div class="col-lg-4 ">
                                                        <textarea readonly name="down_description" class="form-control" id="down_description_view" cols="30" rows="1" placeholder="Enter description">{{$tripDetail->down_carrying_description}}</textarea>
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Down
                                                        Trip Rate </label>
                                                    <div class="col-lg-4 down_trip_rel_field_view d-none">
                                                        <input type="number" class="form-control trip_calculate_view" readonly name="down_trip_rate" id="down_trip_rate_view" placeholder="Enter trip rate" value="{{$tripDetail->down_trip_rate}}" />
                                                    </div>

                                                    <label class="col-lg-2 col-form-label">Extra
                                                        Amount</label>
                                                    <div class="col-lg-4"> <input type="number" class="form-control " readonly name="down_extra_amount" id="down_extra_amount_view" placeholder="Enter extra amount" value="{{$tripDetail->down_extra_amount}}" />
                                                    </div>
                                                    <label class="col-lg-2 col-form-label">Down Trip Package
                                                        Type
                                                    </label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->down_trip_package_type_name}}" />
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row customFormGroup">
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <label class="col-lg-4 col-form-label">Total Amount
                                                            </label>
                                                            <div class="col-lg-8"> <input type="text" class="form-control" readonly name="total_amount" id="total_amount_view" placeholder="Total amount" value="{{$tripDetail->total_amount}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Discount
                                                                Amount</label>
                                                            <div class="col-lg-8"> <input type="number" class="form-control trip_calculate_view" readonly name="discount_amount" id="discount_amount_view" placeholder="Enter discount amount" value="{{$tripDetail->discount_amount}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Net Total
                                                                Amount
                                                            </label>
                                                            <div class="col-lg-8"> <input type="text" class="form-control" readonly name="net_total_amount" id="net_total_amount_view" placeholder="Net total amount" value="{{$tripDetail->net_total_amount}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Advance Paid
                                                            </label>
                                                            <div class="col-lg-8"> <input type="text" class="form-control" id="advance_paid_view" readonly name="advance_paid" placeholder="Enter advance paid" value="{{$tripDetail->advance_paid}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Due Amount
                                                            </label>
                                                            <div class="col-lg-8"> <input type="text" class="form-control" id="due_amount_view" readonly name="due_amount" placeholder="Due amount" value="{{$tripDetail->due_amount}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Payment
                                                                Method
                                                            </label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control " readonly name="contact_person_name" placeholder="Enter contact person name" value="{{$tripDetail->payment_method_name}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Payment
                                                                Status
                                                            </label>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="payment_status_view" readonly name="payment_status" placeholder="Payment Status" value="{{$tripDetail->payment_status}}" />
                                                            </div>
                                                            <label class="col-lg-4 col-form-label">Note </label>
                                                            <div class="col-lg-8">
                                                                <textarea readonly name="note" class="form-control" id="note_view" cols="30" rows="2" placeholder="Enter note">{{$tripDetail->trip_note}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Form content end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
    </div>


</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid d-none trip-details-edit">
    <!--Begin::Row-->
    <div class="row">
        <div class="col-sm-12 order-lg-3 order-xl-1">
            <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                <div class="kt-portlet__head ">
                    <div class="kt-portlet__head-label">
                        <h5 class="kt-portlet__head-title">Edit Trip Details</h5>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="javascript:;" id="closeEdit" class="btn btn-success btn-sm"><i class="far fa-eye mr-2"></i>View</a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="saveTripDetailsForm">
                                <div class="text-dark kt-form kt-form--label-right">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" id="parent_trip_id" value="{{$tripDetail->trip_id}}">
                                    <input type="hidden" id="trip_details_id" value="{{$tripDetail->id}}">
                                    <fieldset class="custom_fieldset">
                                        <legend class="custom_legent">Vehicle</legend>

                                        <div class="form-group row ">
                                            <label class="col-lg-2 col-form-label">Trip ID </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="TRP{{ sprintf('%05d', $tripDetail->trip_id) }}" readonly>
                                            </div>
                                            <label class="col-lg-2 col-form-label">Trip Generated Date</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="{{date('d M Y h:i a', strtotime($tripDetail->created_at))}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-lg-2 col-form-label">Vehicle <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="{{ $tripDetail->vehicle_no }}" readonly>
                                            </div>
                                            <label class="col-lg-2 col-form-label">Trip Status</label>
                                            <div class="col-lg-4">

                                                @if($tripDetail->trip_status==0)
                                                <input type="text" class="form-control" value="Upcoming" readonly>
                                                @elseif($tripDetail->trip_status==1)
                                                <input type="text" class="form-control" value="In Progress" readonly>
                                                @elseif($tripDetail->trip_status==2)
                                                <input type="text" class="form-control" value="Complete" readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div id="tripSectionContainer">
                                        <div id="section_0" class="trip_section">
                                            <fieldset class="custom_fieldset">
                                                <legend class="custom_legent "><i class="fas fa-minus mr-2 collapseIcon"></i>Trip Section
                                                    <span class="trip_section_counter"></span>
                                                </legend>
                                                <div class="tripSectionWrapper">
                                                    <div class="form-group row customFormGroup">
                                                        <label class="col-lg-2 col-form-label">Customer <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9">
                                                                    <select name="customer" id="customer_0" class="form-control  customer_filter" style="width:100%;">
                                                                        <option value="{{$tripDetail->customer_id}}">{{$tripDetail->customer_name}}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <a href="javascript:;" id="addCustomer_0" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <small id="customer_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Trip Day</label>
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-4"> <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                        <input type="radio" class="selectedTripDay_0" name="trip_day" value="single" checked>
                                                                        Single <span></span> </label>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label class="kt-radio kt-radio--bold kt-radio--brand">
                                                                        <input type="radio" class="selectedTripDay_0" name="trip_day" value="multi">
                                                                        Multi
                                                                        <span></span> </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label">Trip Type <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <select name="trip_type" id="trip_type_0" class="form-control kt-select2-2">

                                                            </select>
                                                            <small id="trip_type_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label total_duration_label_0">Total
                                                            Day</label>
                                                        <div class="col-lg-4">
                                                            <input type="number" class="form-control" name="total_duration" id="total_duration_0" value="{{$tripDetail->total_duration}}" autocomplete="off" />
                                                            <small id="total_duration_0-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row customFormGroup">

                                                        <label class="col-lg-2 col-form-label trip_date_label_0 d-none">Trip
                                                            Date <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4 d-none" id="single_trip_day_0"> <input type="text" class="form-control dateTimePicker" id="trip_date_0" name="trip_date" autocomplete="off" placeholder="Choose date" />
                                                            <small id="trip_date_0-error" class="text-danger"></small>
                                                        </div>
                                                        <div class="col-lg-4 d-none" id="multi_trip_day_0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control datePicker1" name="trip_date_from" id="trip_date_from_0" autocomplete="off" placeholder="From" />
                                                                    <small id="trip_date_from_0-error" class="text-danger"></small>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control datePicker2 " id="trip_date_to_0" name="trip_date_to" autocomplete="off" placeholder="To" />
                                                                    <small id="trip_date_to_0-error" class="text-danger"></small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label general_contact_person_name_label_0">Contact Person Name
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="contact_person_name" id="contact_person_name_0" autocomplete="off" placeholder="Enter contact person name" value="{{$tripDetail->contact_name}}" /> <small id="contact_person_name_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label general_contact_person_phone_label_0">Contact Person Phone
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="contact_person_phone" id="contact_person_phone_0" autocomplete="off" placeholder="Enter contact person phone" value="{{$tripDetail->contact_phone}}" /> <small id="contact_person_phone_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_pickup_location_label_0">Pickup
                                                            Location</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="pickup_location" id="pickup_location_0" autocomplete="off" placeholder="Enter pickup location" value="{{$tripDetail->pickup_location}}" /> <small id="pickup_location_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_drop_location_label_0">Drop
                                                            Location </label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="drop_location" id="drop_location_0" autocomplete="off" placeholder="Enter drop location" value="{{$tripDetail->drop_location}}" />
                                                            <small id="drop_location_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_pickup_datetime_label_0">Pickup
                                                            Date &
                                                            Time</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control dateTimePicker" name="pickup_time" id="pickup_time_0" autocomplete="off" placeholder="Choose pickup date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->pickup_time))}}" />
                                                            <small id="pickup_time_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label general_drop_datetime_label_0">Drop
                                                            Date &
                                                            Time</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control dateTimePicker" name="drop_time" id="drop_time_0" autocomplete="off" placeholder="Choose drop date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->drop_time))}}" />
                                                            <small id="drop_time_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_carrying_label_0">Carrying
                                                            Type
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9">
                                                                    <select name="carrying_type" id="carrying_type_0" class="form-control carrying_type_filter">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <a href="javascript:;" id="addCarryingType_0" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <small id="carrying_type_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Carrying Description
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <textarea name="description" class="form-control" id="description_0" cols="30" rows="1" placeholder="Enter description">{{$tripDetail->carrying_description}}</textarea>
                                                            <small id="description_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_trip_rate_label_0">Trip
                                                            Rate <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <input type="number" class="form-control trip_calculate_0" autocomplete="off" name="trip_rate" id="trip_rate_0" placeholder="Enter trip rate" value="{{$tripDetail->trip_rate}}" />
                                                            <small id="trip_rate_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label">Extra
                                                            Amount</label>
                                                        <div class="col-lg-4"> <input type="number" class="form-control trip_calculate_0" autocomplete="off" name="extra_amount" id="extra_amount_0" placeholder="Enter extra amount" value="{{$tripDetail->extra_amount}}" />
                                                            <small id="extra_amount_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label general_trip_package_label_0">Trip Package
                                                            Type
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9">
                                                                    <select name="trip_package_type" id="trip_package_type_0" class="form-control trip_package_filter">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <a href="javascript:;" id="addPackageType_0" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <small id="trip_package_type_0-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <hr class="down_trip_rel_field_0 d-none" style="border-top: 0.07rem dashed #c7c8ca; width:50%">
                                                    <div class="form-group row customFormGroup down_trip_rel_field_0 d-none">
                                                        <label class="col-lg-2 col-form-label ">Down Contact Person Name
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="down_contact_person_name" id="down_contact_person_name_0" autocomplete="off" placeholder="Enter contact person name" value="{{$tripDetail->down_contact_name}}" /> <small id="down_contact_person_name_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label ">Down Contact Person Phone
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <input type="text" class="form-control " name="down_contact_person_phone" id="down_contact_person_phone_0" autocomplete="off" placeholder="Enter contact person phone" value="{{$tripDetail->down_contact_phone}}" /> <small id="down_contact_person_phone_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label ">Down
                                                            Pickup
                                                            Location</label>
                                                        <div class="col-lg-4 ">
                                                            <input type="text" class="form-control " name="down_pickup_location" id="down_pickup_location_0" autocomplete="off" placeholder="Enter pickup location" value="{{$tripDetail->down_pickup_location}}" /> <small id="down_pickup_location_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label ">Down
                                                            Drop Location </label>
                                                        <div class="col-lg-4 ">
                                                            <input type="text" class="form-control " name="down_drop_location" id="down_drop_location_0" autocomplete="off" placeholder="Enter drop location" value="{{$tripDetail->down_drop_location}}" />
                                                            <small id="down_drop_location_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label ">Down
                                                            Pickup Date & Time</label>
                                                        <div class="col-lg-4 ">
                                                            <input type="text" class="form-control dateTimePicker" name="down_pickup_time" id="down_pickup_time_0" autocomplete="off" placeholder="Choose pickup date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->down_pickup_time))}}" />
                                                            <small id="down_pickup_time_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label ">Down
                                                            Drop Date & Time</label>
                                                        <div class="col-lg-4 ">
                                                            <input type="text" class="form-control dateTimePicker" name="down_drop_time" id="down_drop_time_0" autocomplete="off" placeholder="Choose drop date & time" value="{{date('d M Y h:i a', strtotime($tripDetail->down_drop_time))}}" />
                                                            <small id="down_drop_time_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label ">Down
                                                            Carrying Type
                                                        </label>
                                                        <div class="col-lg-4 ">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9">
                                                                    <select name="down_carrying_type" id="down_carrying_type_0" class="form-control carrying_type_filter">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <a href="javascript:;" id="addDownCarryingType_0" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <small id="down_carrying_type_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label "> Carrying
                                                            Description
                                                        </label>
                                                        <div class="col-lg-4 ">
                                                            <textarea name="down_description" class="form-control" id="down_description_0" cols="30" rows="1" placeholder="Enter description">{{$tripDetail->down_carrying_description}}</textarea>
                                                            <small id="down_description_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label">Down
                                                            Trip Rate <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4 down_trip_rel_field_0 d-none">
                                                            <input type="number" class="form-control trip_calculate_0" autocomplete="off" name="down_trip_rate" id="down_trip_rate_0" placeholder="Enter trip rate" value="{{$tripDetail->down_trip_rate}}" />
                                                            <small id="down_trip_rate_0-error" class="text-danger"></small>
                                                        </div>

                                                        <label class="col-lg-2 col-form-label">Extra
                                                            Amount</label>
                                                        <div class="col-lg-4"> <input type="number" class="form-control " autocomplete="off" name="down_extra_amount" id="down_extra_amount_0" placeholder="Enter extra amount" value="{{$tripDetail->down_extra_amount}}" />
                                                            <small id="down_extra_amount_0-error" class="text-danger"></small>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label 
                                                        ">Down Trip Package
                                                            Type
                                                        </label>
                                                        <div class="col-lg-4">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9">
                                                                    <select name="down_trip_package_type" id="down_trip_package_type_0" class="form-control trip_package_filter">
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <a href="javascript:;" id="addDownPackageType_0" class="btn btn-outline-success btn-sm" style="width:100%"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <small id="down_trip_package_type_0-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row customFormGroup">
                                                        <div class="col-md-6"></div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <label class="col-lg-4 col-form-label">Total Amount
                                                                </label>
                                                                <div class="col-lg-8"> <input type="text" class="form-control" autocomplete="off" name="total_amount" id="total_amount_0" readonly placeholder="Total amount" value="{{$tripDetail->total_amount}}" />
                                                                    <small id="total_amount_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Discount
                                                                    Amount</label>
                                                                <div class="col-lg-8"> <input type="number" class="form-control trip_calculate_0" autocomplete="off" name="discount_amount" id="discount_amount_0" placeholder="Enter discount amount" value="{{$tripDetail->discount_amount}}" />
                                                                    <small id="discount_amount_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Net Total
                                                                    Amount
                                                                </label>
                                                                <div class="col-lg-8"> <input type="text" class="form-control" autocomplete="off" name="net_total_amount" id="net_total_amount_0" readonly placeholder="Net total amount" value="{{$tripDetail->net_total_amount}}" />
                                                                    <small id="net_total_amount_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Advance Paid
                                                                </label>
                                                                <div class="col-lg-8"> <input type="text" class="form-control" id="advance_paid_0" autocomplete="off" name="advance_paid" placeholder="Enter advance paid" value="{{$tripDetail->advance_paid}}" />
                                                                    <small id="advance_paid_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Due Amount
                                                                </label>
                                                                <div class="col-lg-8"> <input type="text" class="form-control" id="due_amount_0" name="due_amount" autocomplete="off" readonly placeholder="Due amount" value="{{$tripDetail->due_amount}}" />
                                                                    <small id="due_amount_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Payment
                                                                    Method
                                                                </label>
                                                                <div class="col-lg-8"> <select name="payment_method" id="payment_method_0" class="form-control kt-select2-2">
                                                                        <option value="">Select</option>
                                                                    </select> <small id="payment_method_0-error" class="text-danger"></small> </div>
                                                                <label class="col-lg-4 col-form-label">Payment
                                                                    Status
                                                                </label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" class="form-control" id="payment_status_0" name="payment_status" autocomplete="off" readonly placeholder="Payment Status" value="{{$tripDetail->payment_status}}" />
                                                                    <small id="payment_status_0-error" class="text-danger"></small>
                                                                </div>
                                                                <label class="col-lg-4 col-form-label">Note </label>
                                                                <div class="col-lg-8">
                                                                    <textarea name="note" class="form-control" id="note_0" cols="30" rows="2" placeholder="Enter note">{{$tripDetail->trip_note}}</textarea>
                                                                    <small id="note_0-error" class="text-danger"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- Form content end -->
                                </div>

                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="form-button">

                                            <button type="button" id="reset" class="btn btn-danger btn-sm">Reset</button>

                                            <button type="button" class="btn btn-success btn-sm float-right" id="tripDetailsFormSubmit">Save</button>
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
        let trip_type_id = "{{$tripDetail->trip_type}}";
        let carrying_type_id = "{{$tripDetail->carrying_type}}";
        let trip_package_type_id = "{{$tripDetail->trip_package_type}}";
        let payment_method_id = "{{$tripDetail->payment_method}}";
        initTripRelatedFunction();
        isTripTypeUpDown(trip_type_id);
        fetchOptionList('#trip_type_0', 'master_settings', 'name', 'where type=16', trip_type_id);
        fetchOptionList('#carrying_type_0', 'master_settings', 'name', 'where type=15', carrying_type_id);
        fetchOptionList('#trip_package_type_0', 'master_settings', 'name', 'where type=13', trip_package_type_id);
        fetchOptionList('#payment_method_0', 'payment_method', 'method_name', null, payment_method_id);

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

    $("#tripDetailsFormSubmit").click(function(e) {
        e.preventDefault();
        let parent_trip_id = $("#parent_trip_id").val();
        let id = $("#trip_details_id").val();
        $.ajax({
            type: "POST",
            url: "{{url('dashboard/updateTripDetailsData')}}/" + id,
            data: $("#saveTripDetailsForm").serialize(),
            success: function(response) {
                successMsg('Trip Details updated successfully.');
                $('#trip_table').DataTable().ajax.reload(null, false);
                recollapse_data(parent_trip_id);
                view_trip_details(id);
            },
            error: function(error) {
                errorMsg();
            }

        })
    });


    function trip_calculation() {
        let total_duration = ($('#total_duration_0').val()) ? $('#total_duration_0').val() : 0;

        let trip_rate = ($('#trip_rate_0').val()) ? $('#trip_rate_0').val() : 0;

        let down_trip_rate = ($('#down_trip_rate_0').val()) ? $('#down_trip_rate_0').val() : 0;

        let extra_amount = ($('#extra_amount_0').val()) ? $('#extra_amount_0').val() : 0;

        let down_extra_amount = ($('#down_extra_amount_0').val()) ? $('#down_extra_amount_0').val() : 0;

        let discount_amount = ($('#discount_amount_0').val()) ? $('#discount_amount_0').val() : 0;

        let advance_paid = ($('#advance_paid_0').val()) ? $('#advance_paid_0').val() : 0;

        // total_amount = ((tripRate + downTripRate) * totalDay) + extraAmount + downExtraAmount

        let total_amount = parseFloat(parseFloat(total_duration * (parseFloat(trip_rate) + parseFloat(
            down_trip_rate))).toFixed(2)) + parseFloat(extra_amount) + parseFloat(down_extra_amount);

        let net_total_amount = parseFloat(parseFloat(total_amount).toFixed(2) - parseFloat(discount_amount).toFixed(2)).toFixed(2);

        let due_amount = parseFloat(parseFloat(net_total_amount).toFixed(2) - parseFloat(advance_paid).toFixed(2)).toFixed(2);

        $('#total_amount_0').val(total_amount);

        $('#net_total_amount_0').val(net_total_amount);

        $('#due_amount_0').val(due_amount);

        if (net_total_amount > 0 && due_amount == 0) {
            $('#payment_status_0').val('Full paid');
        } else if (net_total_amount > 0 && due_amount == net_total_amount) {
            $('#payment_status_0').val('Full due');
        } else if (net_total_amount > 0 && due_amount > 0 && due_amount < net_total_amount) {
            $('#payment_status_0').val('Parital paid');
        } else if (net_total_amount > 0 && due_amount < 0) {
            $('#payment_status_0').val('Advance paid');
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

        $("#trip_type_0").change(function() {
            let idIndex = $(this).attr('id').substr(10);
            if (this.value == 31) {
                $('.total_duration_label_0').html('Total Hours <span class="text-danger">*</span>');
                $('#total_duration_0').val(6);
            } else if (this.value == 33) {
                $('.total_duration_label_0').html('Total Month');
                $('#total_duration_0').val(1);
            } else {
                $('.total_duration_label_0').html('Total Day');
                $('#total_duration_0').val(1);
            }

            isTripTypeUpDown(this.value);

            trip_calculation();
        });

        $("#addCustomer_0").click(function() {
            let idIndex = 0;
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

        $("#addCarryingType_0").click(function() {
            let idIndex = 0;
            fetch_carrying_type(idIndex);
        });

        $("#addDownCarryingType_0").click(function() {
            let idIndex = '0_down';
            fetch_carrying_type(idIndex);
        });
        $("#addPackageType_0").click(function() {
            let idIndex = 0;
            fetch_package_type(idIndex);
        });

        $("#addDownPackageType_0").click(function() {
            let idIndex = '0_down';
            fetch_package_type(idIndex);
        });

        $("#total_duration_0").keyup(function() {
            trip_calculation();
        });

        $("#trip_rate_0").keyup(function() {
            trip_calculation();
        });

        $("#down_trip_rate_0").keyup(function() {
            trip_calculation();
        });

        $("#extra_amount_0").keyup(function() {
            trip_calculation();
        });

        $("#down_extra_amount_0").keyup(function() {
            trip_calculation();
        });

        $("#discount_amount_0").keyup(function() {
            trip_calculation();
        });

        $("#advance_paid_0").keyup(function() {
            trip_calculation();
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

    function isTripTypeUpDown(typeId) {
        if (typeId == 29) {
            $('.trip_date_label_0').html('Up Trip Date <span class="text-danger">*</span>');
            $('.general_trip_rate_label_0').html('Up Trip Rate <span class="text-danger">*</span>');
            $('.general_contact_person_name_label_0').html('Up Contact Person Name');
            $('.general_contact_person_phone_label_0').html('Up Contact Person Phone');
            $('.general_pickup_location_label_0').html('Up Pickup Location');
            $('.general_drop_location_label_0').html('Up Drop Location');
            $('.general_pickup_datetime_label_0').html('Up Pickup Date & Time');
            $('.general_drop_datetime_label_0').html('Up Drop Date & Time');
            $('.general_carrying_label_0').html('Up Carrying Type');
            $('.general_trip_package_label_0').html('Up Trip Package Type');
            $('.down_trip_rel_field_0').removeClass('d-none');

            $('.trip_date_label_view').html('Up Trip Date');
            $('.general_trip_rate_label_view').html('Up Trip Rate');
            $('.general_contact_person_name_label_view').html('Up Contact Person Name');
            $('.general_contact_person_phone_label_view').html('Up Contact Person Phone');
            $('.general_pickup_location_label_view').html('Up Pickup Location');
            $('.general_drop_location_label_view').html('Up Drop Location');
            $('.general_pickup_datetime_label_view').html('Up Pickup Date & Time');
            $('.general_drop_datetime_label_view').html('Up Drop Date & Time');
            $('.general_carrying_label_view').html('Up Carrying Type');
            $('.general_trip_package_label_view').html('Up Trip Package Type');
            $('.down_trip_rel_field_view').removeClass('d-none');

            let carrying_type_id = "{{$tripDetail->down_carrying_type}}";
            let trip_package_type_id = "{{$tripDetail->down_trip_package_type}}";

            fetchOptionList('#down_carrying_type_0', 'master_settings', 'name', 'where type=15', carrying_type_id);
            fetchOptionList('#down_trip_package_type_0', 'master_settings', 'name', 'where type=13', trip_package_type_id);
        } else {
            $('.trip_date_label_0').html('Trip Date <span class="text-danger">*</span>');
            $('.general_trip_rate_label_0').html('Trip Rate <span class="text-danger">*</span>');
            $('.general_contact_person_name_label_0').html('Contact Person Name');
            $('.general_contact_person_phone_label_0').html('Contact Person Phone');
            $('.general_pickup_location_label_0').html('Pickup Location');
            $('.general_drop_location_label_0').html('Drop Location');
            $('.general_pickup_datetime_label_0').html('Pickup Date & Time');
            $('.general_drop_datetime_label_0').html('Drop Date & Time');
            $('.general_carrying_label_0').html('Carrying Type');
            $('.general_trip_package_label_0').html('Trip Package Type');
            $('.down_trip_rel_field_0').addClass('d-none');
            $('#down_trip_rate_0').val(0);

            $('.trip_date_label_view').html('Trip Date ');
            $('.general_trip_rate_label_view').html('Trip Rate');
            $('.general_contact_person_name_label_view').html('Contact Person Name');
            $('.general_contact_person_phone_label_view').html('Contact Person Phone');
            $('.general_pickup_location_label_view').html('Pickup Location');
            $('.general_drop_location_label_view').html('Drop Location');
            $('.general_pickup_datetime_label_view').html('Pickup Date & Time');
            $('.general_drop_datetime_label_view').html('Drop Date & Time');
            $('.general_carrying_label_view').html('Carrying Type');
            $('.general_trip_package_label_view').html('Trip Package Type');
            $('.down_trip_rel_field_view').addClass('d-none');
            $('#down_trip_rate_view').val(0);
        }
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

    $('#tripDetailsEdit').click(function(e) {
        $('.trip-details-view').addClass('d-none');
        $('.trip-details-edit').removeClass('d-none');
    });

    $('#closeEdit').click(function(e) {
        e.preventDefault();

        $('.trip-details-view').removeClass('d-none');
        $('.trip-details-edit').addClass('d-none');

    });

    $('.back_to_data_list').click(function(e) {
        e.preventDefault();
        $(".trip_data_list").css('display', 'block');
        $('.trip_detail').css('display', 'none');

    });
</script>