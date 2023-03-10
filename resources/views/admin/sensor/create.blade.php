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
                                    <h3 class="kt-portlet__head-title">Sensor Information</h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right">
                                <div class="kt-portlet__body text-dark">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row" style="margin-bottom:10px;">
                                                <label class="col-lg-5"></label>
                                                <h6 class="col-lg-5 text-info">Sensor</h6>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Model</label>
                                                <div class="col-lg-6">
                                                    <select class="form-control kt-select2-2" name="model_id" id="model_id">
                                                        @php foreach($model_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Server</label>
                                                <div class="col-lg-6">
                                                    <select class="form-control kt-select2-2" name="server_id" id="server_id">
                                                        @php foreach($server_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Sensor Name</label>
                                                <div class="col-lg-6">
                                                    <select class="form-control kt-select2-2" name="sensor_name" id="sensor_name">
                                                        @php foreach($sensor_name_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Sensor Type</label>
                                                <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="sensor_type" id="sensor_type">
                                                        @php foreach($sensor_type_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Sensor Parameter</label>
                                                <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="sensor_parameter" id="sensor_parameter">
                                                        @php foreach($sensor_parameter_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Sensor Default</label>
                                                <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="sensor_default" id="sensor_default">
                                                        <option value="1">Default</option>
                                                        <option value="2">Custom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Result Type</label>
                                                <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="sensor_result_type" id="sensor_result_type">
                                                @php foreach($sensor_result_type_list as $m){ @endphp
                                                        <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                                        @php } @endphp
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Data List</label>
                                                <div class="col-lg-6">
                                                    <div class="kt-checkbox-list">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" class="form-control" checked>
                                                            <span class=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Popup</label>
                                                <div class="col-lg-6">
                                                    <div class="kt-checkbox-list">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" class="form-control">
                                                            <span class=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Fuel Level High</label>
                                                <div class="col-lg-6">
                                                    <div class="kt-checkbox-list">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" class="form-control">
                                                            <span class=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="margin-bottom:10px;">
                                                <label class="col-lg-5"></label>
                                                <h6 class="col-lg-5 text-info">Result</h6>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Type</label>
                                                <div class="col-lg-6">
                                                    <select name="" class="form-control kt-select2-2" id="">
                                                        <option value="">Select</option>
                                                        <option value="">01</option>
                                                        <option value="">02</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Units of measurement</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">If sensor "1" (text)</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">If sensor "0" (text)</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Formula</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Lowest Value</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Highest Value</label>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Ignore if ignition is off</label>
                                                <div class="col-lg-6">
                                                    <div class="kt-checkbox-list">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" class="form-control">
                                                            <span class=""></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row" style="margin-bottom:10px;">
                                                <label class="col-lg-6"></label>
                                                <h6 class="col-lg-5 text-info">Calibration</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group row" style="margin-bottom:10px;">
                                                <label class="col-lg-6"></label>
                                                <h6 class="col-lg-5 text-info">Dictionary</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                <button type="submit" class="btn btn-brand btn-sm float-right">Save</button>
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
@endsection