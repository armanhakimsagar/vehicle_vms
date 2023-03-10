@extends('layouts.enduser.profile.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Profile </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Device</h5>
                                <h5 class="card-title text-center">{{$total_device}}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Active Device</h5>
                                <h5 class="card-title text-center">{{$active_device}}</h5>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Inactive Device</h5>
                                <h5 class="card-title text-center">{{$inactive_device}}</h5>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Servicing Device</h5>
                                <h5 class="card-title text-center">{{$servicing_device}}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Overdue Device</h5>
                                <h5 class="card-title text-center">{{$overdue_device}}</h5>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Sold Device</h5>
                                <h5 class="card-title text-center">{{$sold_device}}</h5>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>

            <!--End:: App Aside Mobile Toggle-->

            <!--Begin:: App Aside-->
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
                                    @if($profile->image)
                                    <img src="{{asset('public/uploads/user/'.$profile->image)}}" alt="image">
                                    @else
                                    <img src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                                    @endif
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="" class="kt-widget__username">
                                            {{$profile->name}}
                                        </a>
                                    </div>
                                    <div class="kt-widget__action">
                                        @if($profile->global_status==0)
                                        <span class="btn btn-warning btn-sm">Inactive</span>
                                        @elseif($profile->global_status==1)
                                        <span class="btn btn-success btn-sm">Active</span>
                                        @elseif($profile->global_status==2)
                                        <span class="btn btn-info btn-sm">Overdue</span>
                                        @elseif($profile->global_status==3)
                                        <span class="btn btn-primary btn-sm">On Hold</span>
                                        @elseif($profile->global_status==4)
                                        <span class="btn btn-danger btn-sm">Stop</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__content">

                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Phone </span>
                                        <span class="kt-widget__data">{{$profile->phone}} </span>
                                    </div>
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Email</span>
                                        <span class="kt-widget__data"> {{$profile->email}}</span>
                                    </div>

                                </div>
                                <div class="kt-widget__items">
                                    <a href="javascript:;" id="profile_information" class="kt-widget__item kt-widget__item--active profile_menu_item" data-rel="profile_information">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <i class="fas fa-info"></i></span>
                                            <span class="kt-widget__desc">
                                                Profile Information
                                            </span>
                                        </span>
                                    </a>
                                    <a href="javascript:;" id="change_pro_info" class="kt-widget__item profile_menu_item" data-rel="change_pro_info">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <i class="fas fa-assistive-listening-systems"></i></span>
                                            <span class="kt-widget__desc">
                                                Change Profile Info
                                            </span>
                                        </span>
                                    </a>
                                    <a href="javascript:;" id="branding_and_ui" class="kt-widget__item profile_menu_item" data-rel="branding_and_ui">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <i class="fas fa-assistive-listening-systems"></i></span>
                                            <span class="kt-widget__desc">
                                                Branding And UI
                                            </span>
                                        </span>
                                    </a>
                                    <a href="javascript:;" id="change_password" class="kt-widget__item profile_menu_item" data-rel="change_password">
                                        <span class="kt-widget__section">
                                            <span class="kt-widget__icon">
                                                <i class="fas fa-assistive-listening-systems"></i></span>
                                            <span class="kt-widget__desc">
                                                Change Password
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
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid profile_item_section  d-none" id="profile_information_section">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Profile Information</h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <div class="row">
                                    <div class="col-lg-6 custom-form-group-border">

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Customer Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Company Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->name}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Father Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->father_name}}</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Mother Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->mother_name}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Date of Birth </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->date_of_birth}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Spouse Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->spouse_name}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Spouse Phone </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->spouse_phone}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Occupation </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->occupation}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">NID No </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->nid_no}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Passport No </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->passport_no}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Gender </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                @if($profile->gender==1)
                                                <span class="form-control">Male</span>
                                                @elseif($profile->gender==2)
                                                <span class="form-control">Female</span>
                                                @endif
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Present Address </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->present_address}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Permanent Address
                                            </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->permanent_address}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Billing Address </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->billing_address}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 custom-form-group-border">

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Invoice Due </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Monthly Due</label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Total Due</label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3"> Due Limit </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->customer_due_limit}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">SMS Phone </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->phone}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Contact One </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->contact_1}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Contact Two </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->contact_2}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Email</label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->email}}</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">A/C Opening Date
                                            </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control">
                                                    {{date('d M yy', strtotime($profile->ac_opening_date))}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Account Note </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->accounts_note}}</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Platform Username
                                            </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->hosting_company}}</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">System Username </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                <span class="form-control"> {{$profile->username}}</span>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">Account Role </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                @if($profile->actor_type==1)
                                                <span class="form-control">Distributor</span>
                                                @elseif($profile->actor_type==2)
                                                <span class="form-control">Enduser</span>
                                                @elseif($profile->actor_type==0)
                                                <span class="form-control">Only Viewer</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4 col-sm-3">CRM To Platform
                                                Connection </label>
                                            <div class="col-lg-7 col-md-8 col-sm-9">
                                                @if($profile->active==1)
                                                <span class="badge badge-pill badge-success ml-3">Connected</span>
                                                @elseif($profile->active==0)
                                                <span class="badge badge-pill badge-warning ml-3">Disconnected</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid profile_item_section d-none" id="change_password_section">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Change Password<small>change your account
                                    password</small></h3>
                        </div>
                    </div>
                    <form class="kt-form kt-form--label-right" id="changePass">
                        @csrf
                        <input type="hidden" name="profile_id" value="{{$profile->id}}">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input name="current_password" id="current_password" placeholder="Current password" type="password" class="form-control">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="curr_pass_tggl"><i id="curr_icon" class="fas fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <small id="current_password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input name="new_password" id="new_password" placeholder="New password" type="password" class="form-control">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="new_pass_tggl"><i id="new_icon" class="fas fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <small id="new_password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input name="password_confirmation" id="password_confirmation" placeholder="Confirm password" type="password" class="form-control">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="conf_pass_tggl"><i id="conf_icon" class="fas fa-eye"></i></span>
                                                </div>
                                            </div>
                                            <small id="password_confirmation-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                        <input type="submit" id="submit" class="btn btn-brand btn-sm float-right" value="Save Change">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid profile_item_section d-none" id="change_pro_info_section">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Personal Information <small>update your profile
                                    info</small></h3>
                        </div>
                    </div>
                    <form class="kt-form kt-form--label-right" id="edit-profile-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    @csrf

                                    <input type="hidden" name="profile_id" value="{{$profile->id}}">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                                <div>
                                                    @if($profile->image)
                                                    <img class="kt-avatar__holder" src="{{asset('public/uploads/user/'.$profile->image)}}" alt="image">
                                                    @else
                                                    <img class="kt-avatar__holder" src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                                                    @endif
                                                </div>
                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </div>
                                            <small id="image-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" name="name" id="name" value="{{$profile->name}}">
                                            <small id="name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                <input type="text" class="form-control" name="phone" id="phone" value="{{$profile->phone}}">
                                            </div>
                                            <small id="phone-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-9">
                                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                        <input type="submit" class="btn btn-brand btn-sm float-right" value="Save Change">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid profile_item_section d-none" id="branding_and_ui_section">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">Company Information <small>update your company
                                    logo</small></h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <div class="col-4">
                                        <form class="kt-form" id="light_logo_form">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                                    <div>
                                                        @if($branding->company_light_logo)
                                                        <img class="light_logo_holder custom_img_holder" src="{{asset('public/uploads/user/logos/'.$branding->company_light_logo)}}" alt="image">
                                                        @else
                                                        <img class="light_logo_holder custom_img_holder" src="{{asset('assets/media/logos/crm-logo-2.png')}}" alt="image">
                                                        @endif
                                                    </div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="light_logo" id="light_logo" accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <small class="text-dark text-center">Light logo. Recommended size 156 x
                                                    48 px, png, jpg, jpeg or gif</small>
                                            </div>
                                            <div class="row justify-content-center">
                                                <small id="light_logo-error" class="text-danger text-center"></small>
                                            </div>
                                            <div class="row justify-content-center my-2">
                                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-4">
                                        <form class="kt-form" id="dark_logo_form">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                                    <div>
                                                        @if($branding->company_dark_logo)
                                                        <img class="dark_logo_holder custom_img_holder" src="{{asset('public/uploads/user/logos/'.$branding->company_dark_logo)}}" alt="image">
                                                        @else
                                                        <img class="dark_logo_holder custom_img_holder" src="{{asset('assets/media/logos/crm-logo-black-2.png')}}" alt="image">
                                                        @endif
                                                    </div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="dark_logo" id="dark_logo" accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <small class="text-dark text-center">Dark logo. Recommended size 156 x
                                                    48 px, png, jpg, jpeg or gif</small>
                                            </div>
                                            <div class="row justify-content-center">
                                                <small id="dark_logo-error" class="text-danger text-center"></small>
                                            </div>
                                            <div class="row justify-content-center my-2">
                                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                                            </div>
                                        </form>

                                    </div>
                                    <!-- <div class="col-4">
                                        <form class="kt-form" id="favicon_form">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                                    <div>
                                                        @if($branding->favicon)
                                                        <img class="favicon_holder custom_img_holder"
                                                            src="{{asset('public/uploads/user/logos/'.$branding->favicon)}}"
                                                            alt="image">
                                                        @else
                                                        <img class="favicon_holder custom_img_holder"
                                                            src="{{asset('assets/media/users/100_3.jpg')}}"
                                                            alt="image">
                                                        @endif
                                                    </div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="favicon" id="favicon"
                                                            accept=".png, .jpg, .jpeg">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                        data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <small class="text-dark text-center">Favicon. Recommended size
                                                    48 x 48 px, png, jpg, jpeg or ico</small>
                                            </div>
                                            <div class="row justify-content-center">
                                                <small id="favicon-error" class="text-danger text-center"></small>
                                            </div>
                                            <div class="row justify-content-center my-2">
                                                <input type="submit" class="btn btn-brand btn-sm " value="Upload">
                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </div>
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
        var current_tab = "{{$data_tab}}";
        tab_section(current_tab);

        $(".profile_menu_item").each(function(index) {
            $(this).on('click', function(e) {
                e.preventDefault();
                var section_part = $(this).data('rel');
                tab_section(section_part);
            });
        });
    });

    function tab_section(part) {
        $(".profile_menu_item").not('#' + part).removeClass('kt-widget__item--active');
        $('#' + part).addClass('kt-widget__item--active');
        $(".profile_item_section").not('#' + part + '_section').addClass('d-none');
        $('#' + part + '_section').removeClass('d-none');
    }



    $(document).ready(function(e) {

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.kt-avatar__holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#light_logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.light_logo_holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#dark_logo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.dark_logo_holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#login_bg').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.login_bg_holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#favicon').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.favicon_holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    $('#edit-profile-form').submit(function(event) {

        event.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{  url('dashboard/change-info/info') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Profile updated successfully.');
                window.location.href = "{{url('dashboard/p/profile/change_pro_info')}}";
            },
            error: function(reject) {

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

    $('#light_logo_form').submit(function(event) {

        event.preventDefault();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{  url('dashboard/branding-info/company_light_logo') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Loght logo uploaded successfully.');
                window.location.href = "{{url('dashboard/p/profile/branding_and_ui')}}";
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

    $('#dark_logo_form').submit(function(event) {

        event.preventDefault();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{  url('dashboard/branding-info/company_dark_logo') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Dark logo uploaded successfully.');
                window.location.href = "{{url('dashboard/p/profile/branding_and_ui')}}";
            },
            error: function(reject) {

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

    $('#changePass').submit(function(event) {

        event.preventDefault();
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/change-info/password') }}",
            data: $('#changePass').serialize(),
            success: function(response) {
                successMsg('Password updated successfully.');
                window.location.href = "{{url('dashboard/p/profile/change_password')}}";
            },
            error: function(reject) {

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


    $(document).ready(function() {
        $('#curr_pass_tggl').click(function() {
            $('#curr_icon').toggleClass('fa-eye-slash');
            var pass = $('#current_password');
            if (pass.attr('type') === 'password') {
                pass.attr('type', 'text');
            } else {
                pass.attr('type', 'password');
            }
        });

        $('#new_pass_tggl').click(function() {
            $('#new_icon').toggleClass('fa-eye-slash');
            var pass = $('#new_password');
            if (pass.attr('type') === 'password') {
                pass.attr('type', 'text');
            } else {
                pass.attr('type', 'password');
            }
        });

        $('#conf_pass_tggl').click(function() {
            $('#conf_icon').toggleClass('fa-eye-slash');
            var passConf = $('#password_confirmation');
            if (passConf.attr('type') === 'password') {
                passConf.attr('type', 'text');
            } else {
                passConf.attr('type', 'password');
            }
        });
    });
</script>
@endsection