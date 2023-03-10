@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">New Vendor </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>

            <!--End:: App Aside Mobile Toggle-->

            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="col-xl-12 ">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">Enter Vendor Information</h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right" id="saveVendorForm">
                                @csrf
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body text-dark">
                                            <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line">
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0"
                                                        class="active nav-link">General</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1"
                                                        class="nav-link">Contact details</a></li>
                                                <!-- <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2"
                                                        class="nav-link">Web</a></li> -->
                                                <!-- <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-3"
                                                        class="nav-link">Platform info</a></li> -->
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-4"
                                                        class="nav-link">Account details</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                                    <!-- <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Vendor
                                                            Group <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2"
                                                                name="vendor_group">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="vendor_group-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Vendor
                                                            Type <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2"
                                                                name="vendor_type">
                                                                <option value="">Select</option>
                                                                @foreach($vendorType as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small id="vendor_type-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Vendor
                                                            ID <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="vendor_id"
                                                                placeholder="Enter vendor ID">
                                                            <small id="vendor_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Distributor</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2"
                                                                name="distributor">
                                                                <option value="">Select</option>

                                                            </select>
                                                            <small id="distributor-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Employee</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="employee">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>

                                                            </select>
                                                            <small id="employee-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Vendor
                                                            Name <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="vendor_name"
                                                                placeholder="Enter vendor name">
                                                            <small id="vendor_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            Name <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_name"
                                                                placeholder="Enter company name">
                                                            <small id="company_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Father
                                                            Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="father_name"
                                                                placeholder="Enter father name">
                                                            <small id="father_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Mother
                                                            Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="mother_name"
                                                                placeholder="Enter mother name">
                                                            <small id="mother_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Date of
                                                            Birth <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="date_of_birth"
                                                                    class="form-control datepicker" autocomplete="off"
                                                                    placeholder="DD/MM/YYYY" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="date_of_birth-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Spouse
                                                            Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="spouse_name"
                                                                placeholder="Enter spouse name">
                                                            <small id="spouse_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Spouse
                                                            Phone</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="number" class="form-control"
                                                                name="spouse_phone" placeholder="Enter spouse phone">
                                                            <small id="spouse_phone-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Occupation</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="occupation"
                                                                placeholder="Enter occupation">
                                                            <small id="occupation-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Division <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">

                                                            <select class="form-control kt-select2-2" id="division"
                                                                name="division">
                                                                <option value="">Select</option>
                                                                @foreach($divisions as $div)
                                                                <option value="{{$div->id}}">{{$div->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small id="division-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">District <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2 districtList"
                                                                id="district" name="district">
                                                                <option value="">Select</option>
                                                            </select>
                                                            <small id="district-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Thana <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2 thanaList"
                                                                id="thana" name="thana">
                                                                <option value="">Select</option>
                                                            </select>
                                                            <small id="thana-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">NID No <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="nid_no"
                                                                placeholder="Enter NID no">
                                                            <small id="nid_no-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Passport
                                                            No</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="passport_no"
                                                                placeholder="Enter passport no" autocomplete="off">
                                                            <small id="passport_no-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Gender</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="gender">
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                            <small id="gender-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Present
                                                            Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="present_address"
                                                                placeholder="Enter present address" rows="3"></textarea>
                                                            <small id="present_address-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Permanent
                                                            Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="permanent_address"
                                                                placeholder="Enter permanent address"
                                                                rows="3"></textarea>
                                                            <small id="permanent_address-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Billing
                                                            Address <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="billing_address"
                                                                placeholder="Enter billing address" rows="3"></textarea>
                                                            <small id="billing_address-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">SMS
                                                            Phone <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="sms_phone"
                                                                    placeholder="Enter SMS phone">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-envelope"></i></span></div>
                                                            </div>
                                                            <small id="sms_phone-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Emergency
                                                            Phone</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="emergency_phone"
                                                                    placeholder="Enter emergency phone">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="emergency_phone-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Contact One
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="contact_one" placeholder="Enter contact one">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="contact_one-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Contact Two
                                                        </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="contact_two" placeholder="Enter contact two">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="contact_two-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            Email <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="company_email"
                                                                    placeholder="Enter company email">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-at"></i></span></div>
                                                            </div>
                                                            <small id="company_email-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="company_address"
                                                                placeholder="Enter company address" rows="3"></textarea>
                                                            <small id="company_address-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            Fax</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="company_fax" placeholder="Enter company fax">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fas fa-fax"></i></span></div>
                                                            </div>
                                                            <small id="company_fax-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            City</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_city"
                                                                placeholder="Enter company city">
                                                            <small id="company_city-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Company
                                                            Country</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2"
                                                                name="company_country">
                                                                <option value="1">Bangladesh</option>
                                                                <option value="2">Others</option>
                                                            </select>
                                                            <small id="company_country-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            VAT</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_vat"
                                                                placeholder="Enter company VAT">
                                                            <small id="company_vat-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class=" col-form-label col-lg-3 col-sm-12">Language</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="language">
                                                                <option value="1">Bangla</option>
                                                                <option value="2">English</option>
                                                                <option value="3">Others</option>
                                                            </select>
                                                            <small id="language-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Currency</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="currency">
                                                                <option value="bdt">BDT</option>
                                                                <option value="usd">USD</option>
                                                            </select>
                                                            <small id="currency-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Latitude</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="latitude"
                                                                    placeholder="Enter google latitude">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-google"></i></span></div>
                                                            </div>
                                                            <small id="latitude-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Longitude</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="longitude"
                                                                    placeholder="Enter google longitude">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-google"></i></span></div>
                                                            </div>
                                                            <small id="longitude-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Short
                                                            Note </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="short_note"
                                                                placeholder="Enter short note" rows="3"></textarea>
                                                            <small id="short_note-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company
                                                            Website</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control"
                                                                name="company_website"
                                                                placeholder="Enter company website">
                                                            <small id="company_website-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Skype
                                                            ID</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="skype_id"
                                                                    placeholder="Enter skype ID">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-skype"></i></span></div>
                                                            </div>
                                                            <small id="skype_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Facebook
                                                            URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="facebook_url"
                                                                    placeholder="Enter facebook url">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-facebook"></i></span></div>
                                                            </div>
                                                            <small id="facebook_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Twitter
                                                            URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="twitter_url" placeholder="Enter twitter url">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-twitter"></i></span></div>
                                                            </div>
                                                            <small id="twitter_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Linkedin
                                                            URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    name="linkedin_url"
                                                                    placeholder="Enter linkedin url">
                                                                <div class="input-group-append"><span
                                                                        class="input-group-text"><i
                                                                            class="fab fa-linkedin"></i></span></div>
                                                            </div>
                                                            <small id="linkedin_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Platform
                                                            Username <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control"
                                                                name="platform_username"
                                                                placeholder="Enter platform username">
                                                            <small id="platform_username-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Platform
                                                            Password <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="platform_password" name="platform_password"
                                                                    placeholder="Enter platform password">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        id="plat-pass-tggl"><i id="icon-plat"
                                                                            class="fas fa-lock"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="platform_password-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">System Username
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control"
                                                                name="system_username"
                                                                placeholder="Enter system username">
                                                            <small id="system_username-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">System Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="system_password" name="system_password"
                                                                    placeholder="Enter system password">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="sys-pass-tggl"><i
                                                                            id="icon-sys"
                                                                            class="fas fa-lock"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="system_password-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Port</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="port"
                                                                placeholder="Enter port">
                                                            <small id="port-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-4" role="tabpanel">
                                                   
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">A/C Opening
                                                            Date <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="ac_opening_date"
                                                                    class="form-control datepicker" autocomplete="off"
                                                                    placeholder="DD/MM/YYYY" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="ac_opening_date-error"
                                                                class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Billing
                                                            Date</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="billing_date"
                                                                    class="form-control datepicker" autocomplete="off"
                                                                    placeholder="DD/MM/YYYY" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="billing_date-error" class="text-danger"></small>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Reporter</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="reporter">
                                                                <option value="0">Select</option>
                                                                {{generate_simple_dropdown('users', 'name')}}
                                                            </select>
                                                            <small id="reporter-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-form-label col-lg-3 col-sm-12">Follower</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="follower">
                                                                <option value="0">Select</option>
                                                                {{generate_simple_dropdown('users', 'name')}}
                                                            </select>
                                                            <small id="follower-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Accounts
                                                            Note</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control" name="accounts_note"
                                                                placeholder="Enter account note" rows="3"></textarea>
                                                            <small id="accounts_note-error" class="text-danger"></small>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Global
                                                            Status <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2"
                                                                name="global_status">
                                                                <option value="">Select</option>
                                                                <option value="0">Inactive</option>
                                                                <option value="1">Active</option>
                                                                <option value="2">Overdue</option>
                                                                <option value="3">On Hold</option>
                                                                <option value="4">Stop</option>
                                                            </select>
                                                            <small id="global_status-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Role <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="role">
                                                                <option value="">Select</option>
                                                                <option value="1">Distributor</option>
                                                                <option value="2">Enduser</option>
                                                                <option value="0">Only Viewer</option>
                                                            </select>
                                                            <small id="role-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">CRM
                                                            Status <span class="text-danger">*</span></label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input name="crm_status" data-switch="true" type="checkbox"
                                                                checked="checked" data-on-text="AC" data-off-text="N AC"
                                                                data-on-color="success" data-off-color="warning">
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row mt-5">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                                            <button type="reset"
                                                                class="btn btn-danger btn-sm">Reset</button>
                                                            <button type="submit" id="clientSubmit"
                                                                class="btn btn-success btn-sm float-right">Save</button>
                                                        </div>
                                                    </div>
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

            <!--End:: App Content-->
        </div>

        <!--End::App-->
    </div>

    <!-- end:: Content -->
</div>

<script>
$(document).ready(function() {
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


    $('#saveVendorForm').submit(function(event) {
        event.preventDefault();
        $("[id$=-error]").text('');
        var id = 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveVendor') }}/" + id,
            data: $('#saveVendorForm').serialize(),
            success: function(response) {
                successMsg('Vendor created successfully.');
                window.location.href = "{{ url('dashboard/d/vendor_add')}}";
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
        return false;
    });
});




$(document).on('change', '#division', function() {
    var divId = $('#division').val();
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('dashboard/getDistrict')}}",
        data: {
            divId: divId
        },
        success: function(result) {
            if (result) {
                $('.districtList').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});


$(document).on('change', '#district', function() {
    var disId = $('#district').val();
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('dashboard/getThana')}}",
        data: {
            disId: disId
        },
        success: function(result) {
            if (result) {
                $('.thanaList').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});

$(document).ready(function() {
    $('#plat-pass-tggl').click(function() {
        $('#icon-plat').toggleClass('fa-unlock');
        var pass = $('#platform_password');
        if (pass.attr('type') === 'password') {
            pass.attr('type', 'text');
        } else {
            pass.attr('type', 'password');
        }
    });

    $('#sys-pass-tggl').click(function() {
        $('#icon-sys').toggleClass('fa-unlock');
        var passConf = $('#system_password');
        if (passConf.attr('type') === 'password') {
            passConf.attr('type', 'text');
        } else {
            passConf.attr('type', 'password');
        }
    });
});
</script>
@endsection