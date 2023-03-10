@extends('layouts.admin.master')

@section('content')

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
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">New Client </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-primary">
                        Actions &nbsp;

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-link"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--success">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>

                            <!--end::Nav-->
                        </div>
                    </div>
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
                                    <h3 class="kt-portlet__head-title">Enter Client Information</h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right" id="clientForm">
                                @csrf
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body text-dark">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">General</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">Contact details</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Web</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-3" class="nav-link">Platform info</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-4" class="nav-link">Account details</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Customer Group</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="customer_group">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="customer_group-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Customer ID</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="customer_id" placeholder="Enter customer ID">
                                                            <small id="customer_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Distributor</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="distributor">
                                                                <option value="">Select</option>
                                                                @foreach($distributor as $dist)
                                                                <option value="{{$dist->id}}">{{$dist->customer_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small id="distributor-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Employee</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="employee">
                                                                <option value="">Select</option>
                                                                @foreach($users as $user)
                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <small id="employee-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Customer Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="customer_name" placeholder="Enter customer name">
                                                            <small id="customer_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_name" placeholder="Enter company name">
                                                            <small id="company_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Father Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="father_name" placeholder="Enter father name">
                                                            <small id="father_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Mother Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="mother_name" placeholder="Enter mother name">
                                                            <small id="mother_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Date of Birth</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="date_of_birth" class="form-control" id="kt_datepicker_3" placeholder="DD/MM/YYYY"/>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="date_of_birth-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Spouse Name</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="spouse_name" placeholder="Enter spouse name">
                                                            <small id="spouse_name-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Spouse Phone</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="number" class="form-control" name="spouse_phone" placeholder="Enter spouse phone">
                                                            <small id="spouse_phone-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Occupation</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="occupation" placeholder="Enter occupation">
                                                            <small id="occupation-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Division</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                    
                                                            <select class="form-control kt-select2-2" id="division_id" name="division_id">
                                                                <option value="">Select</option>
                                                                @foreach($divisions as $div)
                                                                <option value="{{$div->id}}">{{$div->name}}</option>
                                                                @endforeach 
                                                            </select>
                                                            <small id="division_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">District</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2 districtList" id="district_id" name="district_id">
                                                                <option value="">Select</option>
                                                            </select>
                                                            <small id="district_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Thana</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2 thanaList" id="thana_id" name="thana_id">
                                                                <option value="">Select</option>
                                                            </select>
                                                            <small id="thana_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">NID No</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="nid_no" placeholder="Enter NID no">
                                                            <small id="nid_no-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Passport No</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="passport_no" placeholder="Enter passport no">
                                                            <small id="passport_no-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Gender</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="gender">
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                            <small id="gender-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Present Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="present_address" placeholder="Enter present address" rows="3"></textarea>
                                                            <small id="present_address-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Permanent  Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="permanent_address" placeholder="Enter permanent address" rows="3"></textarea>
                                                            <small id="permanent_address-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Billing  Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="billing_address" placeholder="Enter billing address" rows="3"></textarea>
                                                            <small id="billing_address-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">SMS Phone</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="sms_phone" placeholder="Enter SMS phone">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                                                            </div>
                                                            <small id="sms_phone-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Emergency Phone</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="emergency_phone" placeholder="Enter emergency phone">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="emergency_phone-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Contact One </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="contact_1" placeholder="Enter contact one">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="contact_1-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Contact Two</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="contact_2" placeholder="Enter contact two">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                                            </div>
                                                            <small id="contact_2-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company Email</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="company_email" placeholder="Enter company email">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-at"></i></span></div>
                                                            </div>
                                                            <small id="company_email-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company  Address</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="company_address" placeholder="Enter company address" rows="3"></textarea>
                                                            <small id="company_address-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company Fax</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="company_fax" placeholder="Enter company fax">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-fax"></i></span></div>
                                                            </div>
                                                            <small id="company_fax-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company City</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_city" placeholder="Enter company city">
                                                            <small id="company_city-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Company Country</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="company_country">
                                                                <option value="1">Bangladesh</option>
                                                                <option value="2">Others</option>
                                                            </select>
                                                            <small id="company_country-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company VAT</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_vat" placeholder="Enter company VAT">
                                                            <small id="company_vat-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class=" col-form-label col-lg-3 col-sm-12">Language</label>
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
                                                        <label class="col-form-label col-lg-3 col-sm-12">Currency</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="currency">
                                                                <option value="bdt">BDT</option>
                                                                <option value="usd">USD</option>
                                                            </select>
                                                            <small id="currency-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Latitude</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="latitude" placeholder="Enter google latitude">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-google"></i></span></div>
                                                            </div>
                                                            <small id="latitude-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Longitude</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="longitude" placeholder="Enter google longitude">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-google"></i></span></div>
                                                            </div>
                                                            <small id="longitude-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Short Note</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="short_note" placeholder="Enter short note" rows="3"></textarea>
                                                            <small id="short_note-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Company Website</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="company_website" placeholder="Enter company website">
                                                            <small id="company_website-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Skype ID</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="skype_id" placeholder="Enter skype ID">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-skype"></i></span></div>
                                                            </div>
                                                            <small id="skype_id-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Facebook URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="facebook_url" placeholder="Enter facebook url">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-facebook"></i></span></div>
                                                            </div>
                                                            <small id="facebook_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Twitter URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="twitter_url" placeholder="Enter twitter url">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-twitter"></i></span></div>
                                                            </div>
                                                            <small id="twitter_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Linkedin URL</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="linkedin_url" placeholder="Enter linkedin url">
                                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-linkedin"></i></span></div>
                                                            </div>
                                                            <small id="linkedin_url-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Platform Username</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="platform_username" placeholder="Enter platform username">
                                                            <small id="platform_username-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Platform Password </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"  id="platform_password" name="platform_password" placeholder="Enter platform password">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="plat-pass-tggl"><i id="icon-plat" class="fas fa-lock"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="platform_password-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">System Username </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="system_username"  placeholder="Enter system username">
                                                            <small id="system_username-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">System Password </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control" id="system_password" name="system_password" placeholder="Enter system password">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="sys-pass-tggl"><i id="icon-sys" class="fas fa-lock"></i></span>
                                                                </div>
                                                            </div>
                                                            <small id="system_password-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Port</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="port" placeholder="Enter port">
                                                            <small id="port-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-eg11-4" role="tabpanel">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Package Type</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="package_type">
                                                                <option value="1">Prepaid</option>
                                                                <option value="2">Postpaid</option>
                                                            </select>
                                                            <small id="package_type-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Customer Due Limit</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input type="text" class="form-control" name="customer_due_limit" placeholder="Enter customer due limit">
                                                            <small id="customer_due_limit-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Collection Dealer</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="collection_dealer">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="collection_dealer-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Collection Method</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="collection_method">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="collection_method-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">A/C Opening Date </label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="ac_opening_date" class="form-control" id="kt_datepicker_3" placeholder="DD/MM/YYYY"/>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="ac_opening_date-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Billing Date</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <div class="input-group date">
                                                                <input type="text" name="billing_date" class="form-control" id="kt_datepicker_3" placeholder="DD/MM/YYYY"/>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <small id="billing_date-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Reporter</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="reporter">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="reporter-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Follower</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="follower">
                                                                <option value="">Select</option>
                                                                <option value="01">01</option>
                                                                <option value="02">02</option>
                                                                <option value="03">03</option>
                                                                <option value="04">04</option>
                                                            </select>
                                                            <small id="follower-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Accounts Note</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <textarea class="form-control"  name="accounts_note" placeholder="Enter account note" rows="3"></textarea>
                                                            <small id="accounts_note-error" class="text-danger"></small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Global Status</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <select class="form-control kt-select2-2" name="global_status">
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
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12">Role</label>
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
                                                        <label class="col-form-label col-lg-3 col-sm-12">CRM Status</label>
                                                        <div class="col-lg-5 col-md-9 col-sm-12">
                                                            <input name="crm_status" data-switch="true" type="checkbox" checked="checked"  data-on-text="AC" data-off-text="N AC" data-on-color="success" data-off-color="warning">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-5">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                            <button type="submit" id="clientSubmit" class="btn btn-brand btn-sm float-right">Save</button>
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

    $(document).ready(function(){
        $('#clientSubmit').click( function(event){
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('client.store') }}",
                data: $('#clientForm').serialize(),
                success: function (response) {
                    console.log('Client created');
                    successMsg('Client created successfully.');
                    window.location.href = "{{url('client/create')}}";
                },
                error: function (reject) {
                    errorMsg();
                    if( reject.status === 422 || reject.status === 403 ) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors.error.message, function (key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                        });
                    }
                }
            });
        });
    });



    
    $(document).on('change','#division_id',function(){
      var divId = $('#division_id').val();
      $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('getDistrict')}}",
        data:{divId:divId},
        success: function (result) {
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
    

    $(document).on('change','#district_id',function(){
      var disId = $('#district_id').val();
      $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('getThana')}}",
        data:{disId:disId},
        success: function (result) {
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
    
    $(document).ready(function(){
        $('#plat-pass-tggl').click( function(){
            $('#icon-plat').toggleClass('fa-unlock');
            var pass= $('#platform_password');
            if( pass.attr('type')==='password'){
                pass.attr('type', 'text');
            } else{
                pass.attr('type', 'password');
            }
        });

        $('#sys-pass-tggl').click( function(){
            $('#icon-sys').toggleClass('fa-unlock');
            var passConf= $('#system_password');
            if( passConf.attr('type')==='password'){
                passConf.attr('type', 'text');
            } else{
                passConf.attr('type', 'password');
            }
        });
    });
</script>
@endsection