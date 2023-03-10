<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->


    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <script src="{{asset('assets/js/global/webfont.js')}}"></script>

    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/css/optional/fullcalendar.bundle.css')}}" rel="stylesheet" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('assets/css/optional/perfect-scrollbar.css')}}" rel="stylesheet" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{asset('assets/css/optional/tether.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-datepicker3.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-datetimepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-timepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/daterangepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-switch.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/select2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/ion.rangeSlider.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/nouislider.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/owl.carousel.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/owl.theme.default.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/dropzone.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/summernote.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-markdown.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/toastr.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/morris.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/sweetalert2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/socicon.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/line-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/flaticon.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/flaticon2.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/all.min.css')}}" rel="stylesheet" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/css/global/style.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/datatables.bundle.css')}}" rel="stylesheet" />


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/global/base/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/menu/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/brand/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/aside/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/business/business-custom.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/pages/bootstrap-tagsinput.css')}}" rel="stylesheet" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- sideber is included in navber------------ -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="demo1/index.html">
                <img alt="Logo" src="{{asset('assets/media/logos/crm-logo-2.png')}}" style="height:40px" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->

            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{url('/')}}">
                            <img alt="Logo" src="{{asset('assets/media/logos/crm-logo-black.png')}}" />
                        </a>
                    </div>
                </div>

                <!-- end:: Aside -->


                <!-- begin:: Aside Menu -->

                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <div class="row ">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <a href="#" class="btn btn-success btn-sm float-right mr-3 mb-2"><i class="fas fa-plus mr-1"></i>New</a>
                            </div>
                        </div>
                        <div class="custom-tabs">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#users" class="active nav-link">Users</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#expiration" class="nav-link">Expiration</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#offline" class="nav-link">Offline</a>
                                </li>
                            </ul>
                            <div class="custom-sort">
                                <!-- <a href="#" class="custom-sort-menu"><i class="fas fa-sort mr-1"></i>Sort
                    </a> -->
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="custom-sort-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-sort mr-1"></i>Sort

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(32px, 33px, 0px);">
                                        <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Report</a>
                                        <a class="dropdown-item" href="#"><i class="la la-user"></i> Add Customer</a>
                                        <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New
                                            Download</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="users" role="tabpanel" style="padding-right:10px;">

                                <input id="dealer_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                                <div class="clearfix">&nbsp;</div>
                                <div id="dealer_treeview" class="tree_holder"></div>
                            </div>
                            <div class="tab-pane" id="expiration" role="tabpanel">
                                <div id="expired_treeview"></div>
                            </div>
                            <div class="tab-pane" id="offline" role="tabpanel">
                                <div id="offline_treeview"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- end:: Aside Menu -->

            </div>
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                @include('layouts.dealer.top-menu')
                <!-- <link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
                <script src="{{asset('assets/js/global/jquery.min.js')}}"></script> -->
                <!-- <script src="{{asset('assets/js/angular.min.js')}}"></script> -->
                <!-- <script src="{{asset('assets/js/jquery.easy-autocomplete.min.js')}}"></script>
                <link href="{{asset('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" /> -->


                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Content Head -->
                    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <span class="kt-subheader__separator kt-hidden"></span>
                                <div class="kt-subheader__breadcrumbs">
                                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                                        <i class="flaticon2-shelter"></i>
                                    </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Business </a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Content Head -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style=" margin-top: -9px;">

                        <!--Begin::Dashboard 1-->

                        <!--Begin::Row-->
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                                <div class="kt-portlet">

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                            <div id="show_loader" class="col-sm-12 text-center d-none"
                                                    style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                                    <img src="{{asset('assets/images/loading.gif')}}"
                                                        style="width:130px; height:auto;">
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">Account Information - <span id="account_customer_id"></span></a> </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-9">
                                                                <table class="table table-bordered table-success">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <div class="kt-header-menu custom-header-menu my-2">
                                                                                    <input type="hidden" id="dealer_id">
                                                                                    <ul class="nav">

                                                                                        <li class="nav-item ">

                                                                                            <span class="kt-menu__link-text custom-kt-menu__link-text" id="customer_name_value"></span>

                                                                                        </li>
                                                                                        <li class="nav-item ">
                                                                                            <a href="javascript:;" class="nav-link">
                                                                                                <span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-edit mr-1"></i>Edit</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:void(0);" onClick="goto_customer_monitor()" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-tv mr-1"></i>Monitor</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link" id="notification"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-bell mr-1"></i>Notification</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" id="send_message" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-envelope mr-1"></i>Send
                                                                                                    Message</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link" onclick="open_user_movement();"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-user-clock mr-1"></i>Move
                                                                                                    User</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link" onclick="open_reset_password();"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-unlock-alt mr-1"></i>Reset
                                                                                                    Password</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-passport mr-1"></i>Set
                                                                                                    Permission</span></a>
                                                                                        </li>
                                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-comment-medical mr-1"></i>Add
                                                                                                    SMS Balance:
                                                                                                    50</span></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Account:</lable>
                                                                                    <span id="account_value"></span>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">Role:
                                                                                    </lable> <span id="role_value"></span>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">Divce
                                                                                        Quantity:</lable> <span id="device_qty_value"></span>
                                                                                </span>
                                                                            </td>

                                                                            <td colspan="3">
                                                                                <span>
                                                                                    <lable class="custom-table-td">SMS
                                                                                        Balance:</lable> <span id="sms_balance_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Contact:</lable> <span id="contact_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Phone:</lable> <span id="phone_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                            <td>
                                                                                &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Email:</lable> <span id="email_value"></span>
                                                                                </span>
                                                                            </td>
                                                                            <td colspan="3">
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Address:</lable> <span id="address_value"> </span>
                                                                                </span>
                                                                            </td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <table class="table table-bordered table-success ">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Monthly Due:</lable> <span id="monthly_due_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Invoice Due:</lable> <span id="invoice_due_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">Total
                                                                                        Due:</lable> <span id="total_due_value"> </span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <span>
                                                                                    <lable class="custom-table-td">
                                                                                        Platform User ID:</lable><span id="platform_user_id"> 25</span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <ul class="nav nav-tabs">
                                                            <li class="nav-item"><a data-toggle="tab" href="#device_list" class="active nav-link">Device</a></li>
                                                            <li class="nav-item"><a data-toggle="tab" href="#sub-account" class="nav-link">Sub-Account</a>
                                                            </li>
                                                            <li class="nav-item"><a data-toggle="tab" href="#information" class="nav-link">Information</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="device_list" role="tabpanel">
                                                                <div class="kt-header-menu custom-header-menu my-2">
                                                                    <ul class="nav">
                                                                        <li class="nav-item ">
                                                                            <a href="javascript:;" class="nav-link">
                                                                                <span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-dollar-sign mr-1"></i>Batch
                                                                                    Sale</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item ">
                                                                            <a href="javascript:;" class="nav-link" onClick="batch_move();">
                                                                                <span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-arrows-alt mr-1"></i>Batch
                                                                                    Move</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-clock mr-1"></i>Batch
                                                                                    Modify Expiry Date</span></a>
                                                                        </li>
                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-file-invoice mr-1"></i>Batch
                                                                                    Recharge</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!--begin: Datatable -->
                                                                <div class="kt-portlet__body" style="padding:0;">
                                                                    <div class="col-sm-12">
                                                                        <!--begin: Datatable -->
                                                                        <table class="table table-striped- table-bordered table-hover table-checkable dt-responsive" id="dealer_device_table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th width="2%" data-orderable="false">
                                                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                                            <input type="checkbox" class="group-checkable" id="all_selected_device" />
                                                                                            <span></span>
                                                                                        </label>
                                                                                    </th>
                                                                                    <th>SL</th>
                                                                                    <th>TU ID</th>
                                                                                    <th>Device Name</th>
                                                                                    <th>IMEI</th>
                                                                                    <th>SIM</th>
                                                                                    <th>Model</th>
                                                                                    <th>Server</th>
                                                                                    <!-- <th>TU Status</th> -->
                                                                                    <th>Status</th>
                                                                                    <th width="80px">Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>

                                                                        <!--end: Datatable -->
                                                                    </div>

                                                                </div>

                                                                <!--end: Datatable -->
                                                            </div>
                                                            <div class="tab-pane" id="sub-account" role="tabpanel">
                                                                <div class="kt-portlet__body">


                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="information" role="tabpanel">
                                                                <!--begin::Form-->
                                                                <form class="kt-form kt-form--label-right">
                                                                    <div class="kt-portlet__body">

                                                                        <div class="form-group row">
                                                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="email" id="editable_email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-text-input" class="col-md-2 col-form-label">Platform
                                                                                Username</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_hosting_company">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-text-input" class="col-md-2 col-form-label">System
                                                                                Username</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_username">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-tel-input" class="col-md-2 col-form-label">Phone</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_phone">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-tel-input" class="col-md-2 col-form-label">Mobile</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_mobile">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Customer
                                                                                Name</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_customer_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Father
                                                                                Name</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_father_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Mother
                                                                                Name</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_mother_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Date of
                                                                                Birth</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_date_of_birth">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">NID
                                                                                No.</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <input class="form-control" type="text" id="editable_nid_no">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">CRM
                                                                                Status</label>
                                                                            <div class="kt-checkbox-list">
                                                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                                                    <input type="checkbox" name="editable_active" id="editable_active" class="form-control">
                                                                                    <span class=""></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Billing
                                                                                Address</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <textarea class="form-control" id="editable_billing_address"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="example-number-input" class="col-md-2 col-form-label">Global
                                                                                Status</label>
                                                                            <div class="col-md-8 col-lg-6">
                                                                                <select class="form-control kt-select2-2" id="editable_global_status">
                                                                                    @php foreach($global_status_list as
                                                                                    $list) { @endphp
                                                                                    <option value="{{$list->id}}">
                                                                                        {{$list->name}}</option>
                                                                                    @php } @endphp
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kt-portlet__foot">
                                                                        <div class="kt-form__actions">
                                                                            <div class="row">
                                                                                <div class="col-2">
                                                                                </div>
                                                                                <div class="col-md-8 col-lg-6">
                                                                                    <button type="button" class="btn btn-success btn-sm float-right" onClick="update_customer_info()">Update</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Email
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">URL
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="kt-input-icon kt-input-icon--left">
                                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Credit
                                                                Card</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Email
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">URL
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="kt-input-icon kt-input-icon--left">
                                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Credit
                                                                Card</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Email
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">URL
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="kt-input-icon kt-input-icon--left">
                                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Credit
                                                                Card</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab-eg11-4" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Email
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">URL
                                                                *</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="kt-input-icon kt-input-icon--left">
                                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Credit
                                                                Card</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                                <button type="submit" class="btn btn-brand btn-sm float-right">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--End::Row-->

                        <!--End::Dashboard 1-->
                    </div>

                    <!-- end:: Content -->

                </div>

                <!-- begin::Scrolltop -->
                <div id="kt_scrolltop" class="kt-scrolltop">
                    <i class="fa fa-arrow-up"></i>
                </div>

                <!-- end::Scrolltop -->
                <!-- begin::Global Config(global config for global JS sciprts) -->

                <script>
                    $(document).ready(function() {

                        $("#j2_@php echo $first_child; @endphp_anchor").addClass("jstree-clicked");
                        load_dealer(@php echo $first_child; @endphp);
                        load_treeview(1);
                        load_treeview(2);

                        var main_search_options = {
                            data: @php echo $searchTree;@endphp,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $("#dealer_search").getSelectedItemData().id;
                                    $("#dealer_treeview").find("#" + selectedItemValue + "_anchor").click();
                                    $("#dealer_treeview").jstree().deselect_all(true);
                                    $("#dealer_treeview").jstree("select_node", "#" + selectedItemValue);
                                    $("#dealer_treeview").jstree(true)._open_to(selectedItemValue).focus();
                                    load_dealer(selectedItemValue);
                                },
                                onHideListEvent: function() {}
                            }
                        };

                        $("#dealer_search").easyAutocomplete(main_search_options);

                        var search_user_options = {
                            data: @php echo $searchTree;@endphp,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $("#moveuser_search").getSelectedItemData().id;
                                    $("#userMovement_treeview").find("#" + selectedItemValue + "_anchor").click();
                                    $("#userMovement_treeview").jstree().deselect_all(true);
                                    $("#userMovement_treeview").jstree("select_node", "#" +
                                        selectedItemValue);
                                    $("#userMovement_treeview").jstree(true)._open_to(selectedItemValue)
                                        .focus();
                                    $("#moving_to_parent").val(selectedItemValue).trigger("change");
                                },
                                onHideListEvent: function() {}
                            }
                        };

                        $("#moveuser_search").easyAutocomplete(search_user_options);

                        var search_device_options = {
                            data: @php echo $searchTree;@endphp,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $("#movedevice_search").getSelectedItemData()
                                        .id;
                                    $("#deviceMovement_treeview").find("#" + selectedItemValue + "_anchor").click();
                                    $("#deviceMovement_treeview").jstree().deselect_all(true);
                                    $("#deviceMovement_treeview").jstree("select_node", "#" +
                                        selectedItemValue);
                                    $("#deviceMovement_treeview").jstree(true)._open_to(selectedItemValue)
                                        .focus();
                                    $("#device_moving_to").val(selectedItemValue).trigger("change");
                                },
                                onHideListEvent: function() {}
                            }
                        };

                        $("#movedevice_search").easyAutocomplete(search_device_options);
                        $(".kt-select2-2").select2({});

                        $("#send_message").click(function(event) {
                            event.preventDefault();
                            $("#sendMessageModal").modal("show");
                        });

                    });

                    function getParameterByName(name, url) {
                        if (!url) url = window.location.href;
                        name = name.replace(/[\[\]]/g, '\\$&');
                        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                            results = regex.exec(url);
                        if (!results) return null;
                        if (!results[2]) return '';
                        return decodeURIComponent(results[2].replace(/\+/g, ' '));
                    }
                    var clickMe = true;
                    var selected_customer_name;
                    var selected_customer_id;
                    var selected_batch_items = [];
                    var selected_device_with_status = [];

                    function load_treeview(id) {
                        //id=1: user movement
                        //id=2: device movement
                        if (id == 1) {
                            console.log('user treeview');
                            //$('#userMovement_treeview').jstree({}).destroy();
                            $('#userMovement_treeview').jstree({
                                'plugins': ["search", "sort"],
                                'core': {
                                    'data': @php echo $dealerTree;@endphp
                                }
                            }).on('select_node.jstree', function(e, data) {
                                $("#moving_to_parent").val(data.node.original.item_details.id);
                                $("#moveuser_search").val(data.node.original.item_details.name);
                            });
                        } else if (id == 2) {
                            console.log('dealer treeview');
                            $('#deviceMovement_treeview').jstree({
                                'plugins': ["search", "sort"],
                                'core': {
                                    'data': @php echo $dealerTree;@endphp
                                }
                            }).on('select_node.jstree', function(e, data) {
                                $("#device_moving_to").val(data.node.original.item_details.id);
                                $("#movedevice_search").val(data.node.original.item_details.name);
                            });
                        }
                    }

                    function reload_dealerTree() {
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "showTree/@php echo $session_data['id'] @endphp",
                            success: function(response) {
                                $('#dealer_treeview').jstree(true).settings.core.data = response;
                                $('#dealer_treeview').jstree(true).refresh();

                                $('#userMovement_treeview').jstree(true).settings.core.data = response;
                                $('#userMovement_treeview').jstree(true).refresh();

                                $('#deviceMovement_treeview').jstree(true).settings.core.data = response;
                                $('#deviceMovement_treeview').jstree(true).refresh();

                            },
                            error: function(reject) {
                                errorMsg();
                            }
                        });
                    }

                    function load_dealer(id) {
                        load_spinner('show', 'show_loader', '');
                        $("#dealer_id").val(id);
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "{{ url('dealer/dealer_info/') }}/" + id,
                            success: function(response) {
                                selected_customer_name = response.name;
                                selected_customer_id = response.id;
                                $("#customer_name_value").html(response.name +
                                    ' <span class="kt-badge kt-badge--inline kt-badge--' + response
                                    .status_color + '">' + response.global_status_name + '</span>');
                                $("#account_customer_id").text(response.customer_id);
                                $("#account_value").text(response.username);
                                $("#device_qty_value").text(response.total_device);
                                $("#contact_value").text(response.phone);
                                $("#email_value").text(response.email);

                                var monthly_due = (response.monthly_due != null) ? response.monthly_due :
                                    '0.00';
                                var invoice_due = (response.invoice_due != null) ? response.invoice_due :
                                    '0.00';
                                var total_due = parseFloat(monthly_due) + parseFloat(invoice_due);

                                $("#monthly_due_value").text(parseFloat(monthly_due).toFixed(2));
                                $("#invoice_due_value").text(parseFloat(invoice_due).toFixed(2));
                                $("#total_due_value").text(parseFloat(total_due).toFixed(2));

                                var customer_role = "";
                                if (response.actor_type == 1) {
                                    customer_role = 'Distributor';
                                } else if (response.actor_type == 2) {
                                    customer_role = 'End User';
                                } else {
                                    customer_role = "Guest User";
                                }
                                $("#role_value").text(customer_role);
                                $("#phone_value").text(response.mobile);
                                $("#address_value").text(response.billing_address);

                                // for Information tab at below section
                                $("#editable_name").val(response.name);
                                $("#editable_email").val(response.email);
                                $("#editable_hosting_company").val(response.hosting_company);
                                $("#editable_username").val(response.username);
                                $("#editable_phone").val(response.phone);
                                $("#editable_mobile").val(response.mobile);
                                $("#editable_customer_name").val(response.customer_name);
                                $("#editable_father_name").val(response.father_name);
                                $("#editable_mother_name").val(response.mother_name);
                                $("#editable_date_of_birth").val(response.date_of_birth);
                                $("#editable_nid_no").val(response.nid_no);

                                if (response.active == 1) {
                                    $("#editable_active").prop('checked', true);
                                } else {
                                    $("#editable_active").prop('checked', false);
                                }
                                $("#editable_billing_address").val(response.billing_address);
                                $("#editable_global_status").val(response.global_status).trigger("change")

                                //now call device list of selected customer
                                //table.destroy();

                                load_device(id);
                                click_selected_client();
                                load_spinner('hide', 'show_loader', '');
                            },
                            error: function(reject) {
                                console.log('error occured');
                                console.log(reject);
                            }
                        });
                    }

                    function click_selected_client() {
                        var user_id = getParameterByName('user');
                        var user_name = getParameterByName('name');
                        if (user_id != undefined && user_name != undefined && clickMe == true) {
                            $("#dealer_search").val(user_name);
                            $("#dealer_treeview").find("#" + user_id + "_anchor").click();
                            clickMe = false;
                        }
                    }

                    function load_device(id) {
                        var table = $('#dealer_device_table').DataTable({
                            destroy: true,
                            processing: true,
                            serverSide: true,
                            ajax: {
                                url: "{{ url('dealer/getDevice') }}/" + id,
                                data: function(d) {
                                    d._token = '{!! csrf_token() !!}';
                                }
                            },
                            columnDefs: [{
                                orderable: false,
                                className: 'all_device_checkbox',
                                targets: 0
                            }],
                            select: {
                                style: 'os',
                                selector: 'td:first-child'
                            },
                            columns: [{
                                    data: 'checkDevice',
                                    name: 'checkDevice',
                                    searchable: false,
                                    orderable: false
                                },
                                {
                                    data: 'DT_RowIndex',
                                    name: 'DT_RowIndex',
                                    className: 'text-center'
                                },
                                {
                                    data: 'unit_id',
                                    name: 'unit_id'
                                },
                                {
                                    data: 'device_name',
                                    name: 'device_name'
                                },
                                {
                                    data: 'imei',
                                    name: 'imei'
                                },
                                {
                                    data: 'sim_number',
                                    name: 'sim_number'
                                },
                                {
                                    data: 'model_name',
                                    name: 'model_name'
                                },
                                {
                                    data: 'server_name',
                                    name: 'server_name'
                                },
                                /* {
                                    data: 'server_name',
                                    name: 'server_name'
                                }, */
                                {
                                    data: 'unit_status_name',
                                    name: 'unit_status_name',
                                    className: 'text-center'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    className: 'text-center',
                                    orderable: false,
                                    searchable: false
                                },
                            ],
                            "aoColumnDefs": [{
                                "aTargets": [4],
                                "mRender": function(data, type, full) {
                                    var rowData = data.split(",");
                                    var crm_connection = (rowData[0] > 0) ?
                                        '<span class="btn btn-success btn-sm"></span> ' :
                                        '<span class="btn btn-danger btn-sm"></span> ';
                                    return crm_connection + rowData[1] +
                                        ' - <span class="btn" style="padding: 6px;">' + rowData[2] +
                                        '</span>';
                                }
                            }, {
                                "aTargets": [8],
                                "mRender": function(data, type, full) {
                                    var rowData = data.split(",");
                                    //var crm_connection = (rowData[0]>0)?'<span class="btn btn-success btn-sm"></span> ':'<span class="btn btn-danger btn-sm"></span> ';
                                    return ' <span class="btn btn-sm" style="color:#fff; padding: 0px; background-color:' +
                                        rowData[0] + '">' + rowData[1] + '</span>';
                                }
                            }],
                            dom: 'Blfrtip',
                            buttons: [{
                                    extend: 'copy',
                                    text: '<i class="far fa-copy custom-icon"></i>',
                                    className: 'custom-button-class ml-3 mr-2',
                                    exportOptions: {
                                        columns: ':visible :not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class="flaticon2-paper custom-icon"></i>',
                                    className: 'custom-button-class mr-2',
                                    exportOptions: {
                                        columns: ':visible :not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class="far fa-file-excel custom-icon"></i>',
                                    className: 'custom-button-class mr-2',
                                    exportOptions: {
                                        columns: ':visible :not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="far fa-file-pdf custom-icon"></i>',
                                    className: 'custom-button-class mr-2',
                                    exportOptions: {
                                        columns: ':visible :not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'print',
                                    text: '<i class="fas fa-print custom-icon"></i>',
                                    className: 'custom-button-class mr-2',
                                    exportOptions: {
                                        columns: ':visible :not(:last-child)'
                                    }
                                }
                            ]
                        });
                        table.buttons().container().appendTo('#dealer_device_table_length');

                        $("#all_selected_device").click(function() {
                            $("input[class='selected_device']").attr("checked", this.checked);
                        });
                    }

                    function edit_device(id) {
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "{{ url('dealer/getImei') }}/" + id,
                            success: function(response) {
                                console.log(response);
                                $("#edit_device_title").html(response.device_name);
                                $("#edit_device_id").val(id);
                                $("#edit_device_name").val(response.device_name);
                                $("#edit_device_server_name").val(response.server_name);
                                $("#edit_model_name").val(response.model_name);
                                $("#edit_plate_no").val(response.plate_number);
                                $("#edit_imei").val(response.imei);
                                $("#edit_sim_number").val(response.sim_number);
                                $("#edit_opening_date").val(response.opening_date);
                                $("#edit_device_opening_date").val(response.opening_date);
                                $("#edit_battery_voltage").val(response.voltage);
                                $("#edit_battery_voltage").trigger('change');
                                $("#edit_device_sataus").val(response.status);
                                $("#edit_device_sataus").trigger('change');

                                var crm_platform_status = (response.crm_exist > 0) ?
                                    '<span class="kt-badge  kt-badge--success kt-badge--inline"> Connected </span>' :
                                    '<span class="kt-badge  kt-badge--danger kt-badge--inline"> Disconnected </span>';
                                $("#crm_to_platform_status").html(crm_platform_status);

                                var server_platform_status = (response.server_to_platform_status > 0) ?
                                    '<span class="kt-badge  kt-badge--success kt-badge--inline"> Connected </span>' :
                                    '<span class="kt-badge  kt-badge--danger kt-badge--inline"> Disconnected </span>';
                                $("#server_to_platform_status").html(server_platform_status);

                                var tu_imei_status = (response.unit_id > 0) ?
                                    '<span class="kt-badge  kt-badge--success kt-badge--inline"> Connected </span>' :
                                    '<span class="kt-badge  kt-badge--danger kt-badge--inline"> Disconnected </span>';
                                $("#tu_to_imei_status").html(tu_imei_status);

                                $("#edit_device_modal").modal('show');
                            },
                            error: function(reject) {
                                console.log(reject);
                            }
                        });
                    }

                    function save_imei() {
                        console.log("save imei click");
                        var updated_id = $("#edit_device_id").val();
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ url('dealer/saveImei') }}",
                            data: {
                                'id': updated_id,
                                'device_name': $("#edit_device_name").val(),
                                'plate_number': $("#edit_plate_no").val(),
                                'sim_number': $("#edit_sim_number").val(),
                                'status': $("#edit_device_sataus").val(),
                                'voltage': $("#edit_battery_voltage").val(),
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    successMsg('IMEI deleted successfully.');
                                    $("#edit_device_modal").modal('hide');
                                    load_device($("#dealer_id").val());
                                } else {
                                    errorMsg();
                                }

                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });
                    }

                    function formatResult(node) {
                        var $result = $('<span style="padding-left:' + (20 * node.level) + 'px;">' + node.text + '</span>');
                        return $result;
                    };

                    function open_user_movement() {
                        $("#moving_user_name").val(selected_customer_name);
                        $("#move_user_modal").modal('show');
                    }

                    function save_user_movement() {
                        //selected_customer_id
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ url('dealer/moveuser') }}",
                            data: {
                                'moving_user': selected_customer_id,
                                'parent_id': $("#moving_to_parent").val(),
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    successMsg('User has been moved successfully');
                                    $("#move_user_modal").modal('hide');
                                    reload_dealerTree();
                                    load_dealer(selected_customer_id);
                                } else {
                                    errorMsg();
                                }

                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });

                    }

                    function batch_move() {
                        console.log('batch move call');
                        selected_batch_items = [];
                        selected_device_with_status = [];
                        var selected_imei_list = "";
                        $('#dealer_device_table input:checked').each(function() {
                            if ($(this).val() != 'on') {
                                selected_batch_items.push($(this).val());
                                selected_device_with_status.push({
                                    id: $(this).val(),
                                    previous_customer: $(this).data('customer'),
                                    crm_exist: $(this).data('crmexist')
                                });
                                selected_imei_list += $(this).data('rel') + '\n';
                            }
                        });
                        $("#moving_imei_list").html(selected_imei_list);
                        $("#batch_move_modal").modal('show');
                    }

                    function save_device_movement() {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ url('dealer/movedevice') }}",
                            data: {
                                'moving_to_user': $("#device_moving_to").val(),
                                'moving_devices': selected_batch_items,
                                'device_with_crmexist': selected_device_with_status,
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    successMsg('Device has been moved successfully');
                                    $("#batch_move_modal").modal('hide');
                                    reload_dealerTree();
                                    load_device($("#dealer_id").val());
                                } else {
                                    errorMsg();
                                }
                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });
                    }

                    function update_customer_info() {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ url('dealer/updatecustomer') }}",
                            data: {
                                'id': selected_customer_id,
                                'name': $("#editable_name").val(),
                                'email': $("#editable_email").val(),
                                'hosting_company': $("#editable_hosting_company").val(),
                                'username': $("#editable_username").val(),
                                'phone': $("#editable_phone").val(),
                                'mobile': $("#editable_mobile").val(),
                                'customer_name': $("#editable_customer_name").val(),
                                'father_name': $("#editable_father_name").val(),
                                'mother_name': $("#editable_mother_name").val(),
                                'date_of_birth': $("#editable_date_of_birth").val(),
                                'nid_no': $("#editable_nid_no").val(),
                                'active': ($('#editable_active').prop('checked')) ? 1 : 0,
                                'billing_address': $("#editable_billing_address").val(),
                                'global_status': $("#editable_global_status").val(),
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    successMsg('Customer data updated successfully');
                                    load_dealer(selected_customer_id);
                                } else {
                                    errorMsg();
                                }
                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });
                    }

                    function open_reset_password() {
                        $("#reset_password_modal").modal('show');
                    }

                    function save_password() {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ url('dealer/resetPassword') }}",
                            data: {
                                'id': selected_customer_id,
                                'username': $("#editable_username").val(),
                                'password': $("#new_password").val(),
                                _token: "{{ csrf_token() }}",
                                _method: "POST"
                            },
                            success: function(response) {
                                if (response == 1) {
                                    successMsg('Password Reset successfully');
                                    load_dealer(selected_customer_id);
                                    $("#reset_password_modal").modal('hide');
                                } else {
                                    errorMsg();
                                }
                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });
                    }

                    $('#notification').click(function() {
                        $('#notificationModal').modal('show');
                    })

                    function goto_customer_monitor() {
                        var myid = $("#dealer_id").val();
                        window.open("{{URL::to('/dealer/v1/monitor')}}/" + myid, "_blank");
                    }

                    $(document).ready(function() {
                        var allUser = [];
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "showTree/@php echo $session_data['id'] @endphp",
                            success: function(response) {
                                var myData = [];
                                var first_node = {
                                    'id': "@php echo $session_data['id'] @endphp",
                                    'text': "@php echo $session_data['name'] @endphp",
                                    'icon': 'fa fa-users',
                                    'state': {
                                        opened: false
                                    },
                                    'only_name': "@php echo $session_data['name'] @endphp",
                                    'item_details': @php echo json_encode($session_data);@endphp,
                                    'children': response
                                };
                                myData.push(first_node);
                                //response.push(first_node);

                                allUser = response;
                                $('#dealer_treeview').jstree({
                                    'plugins': ['state', 'dnd', 'contextmenu', "themes",
                                        "json_data", "ui", "types", "search", "sort"
                                    ],
                                    "contextmenu": {
                                        "items": function($node) {
                                            //console.log($node);
                                            var tree = $("#dealer_treeview").jstree(true);
                                            return {
                                                "Create": {
                                                    "separator_before": false,
                                                    "separator_after": false,
                                                    "label": "Add User",
                                                    "action": function(obj) {

                                                    }
                                                },
                                                "Update": {
                                                    "separator_before": false,
                                                    "separator_after": false,
                                                    "label": "Edit User",
                                                    "action": function(obj) {

                                                    }
                                                },
                                                "Assign Device": {
                                                    "separator_before": false,
                                                    "separator_after": false,
                                                    "label": "Assign Device",
                                                    "action": function(obj) {
                                                        //$("#assign_device_modal").modal('show');
                                                    }
                                                },
                                                "Remove": {
                                                    "separator_before": false,
                                                    "separator_after": false,
                                                    "label": "Remove",
                                                    "action": function(obj) {
                                                        //tree.delete_node($node);
                                                        alert(
                                                            'user account will be removed'
                                                        );
                                                    }
                                                }
                                            };
                                        }
                                    },
                                    'core': {
                                        'data': myData
                                    }
                                }).on('create_node.jstree', function(e, data) {}).on(
                                    'select_node.jstree',
                                    function(e, data) {

                                        load_dealer(data.node.original.id);
                                    });
                            },
                            error: function(reject) {
                                errorMsg();

                            }
                        });
                        $('#editable_date_of_birth').datepicker({
                            todayHighlight: true,
                            autoclose: true,
                            pickerPosition: 'bottom-left',
                            todayBtn: true,
                            showMeridian: true,
                            format: 'yyyy-mm-dd'
                        });
                    });

                    function load_spinner(type, hide_element, show_element) {
                        if (type == 'hide') {
                            $("#" + hide_element).removeClass('show');
                            $("#" + hide_element).addClass('d-none');
                        }
                        if (type == 'show') {
                            $("#" + hide_element).removeClass('d-none');
                            $("#" + hide_element).addClass('show');
                        }

                    }
                </script>

                <script>
                    var KTAppOptions = {
                        "colors": {
                            "state": {
                                "brand": "#5d78ff",
                                "dark": "#282a3c",
                                "light": "#ffffff",
                                "primary": "#5867dd",
                                "success": "#34bfa3",
                                "info": "#36a3f7",
                                "warning": "#ffb822",
                                "danger": "#fd3995"
                            },
                            "base": {
                                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                            }
                        }
                    };
                </script>

                <!-- The Modal -->
                <div class="modal" id="edit_device_modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="edit_device_title"> </h4>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                                <ul class="nav nav-tabs">
                                                    <!-- <li class="nav-item"><a data-toggle="tab" href="#edit_device_1" class="active nav-link">IMEI info</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#edit_device_2" class="nav-link">IMEI server config</a></li> -->
                                                    <li class="nav-item" class="active"><a data-toggle="tab" href="#edit_device_3" class="nav-link">Device Info</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_4" class="nav-link">Sensor config</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_5" class="nav-link">Command config</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_6" class="nav-link">Overview status</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="edit_device_3" role="tabpanel">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Device
                                                                    Name</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="hidden" class="form-control" name="edit_device_id" id="edit_device_id">
                                                                    <input type="text" class="form-control" name="edit_device_name" id="edit_device_name" value="">
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">TU ID</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control" name="edit_unit_id" id="edit_unit_id">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Vehicle Plate
                                                                    No</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control" name="edit_plate_no" id="edit_plate_no">
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">Model</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control" name="edit_model_name" id="edit_model_name" disabled>
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">IMEI</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control" name="edit_imei" id="edit_imei" disabled>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">SIM No</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="number" class="form-control" name="edit_sim_number" id="edit_sim_number">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Opening
                                                                    Date</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control" name="edit_opening_date" placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">User Block
                                                                    Date</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control" name="platform_expire_date" placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Fuel
                                                                    Consumption</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="fuel_consumption_value" placeholder="Enter fuel consumption value" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">L/100km</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">Fuel Tank
                                                                    Volume</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control" name="fuel_tank_volume" placeholder="Enter fuel tank volume" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">L</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Online
                                                                    Time</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="kt_datepicker_3" name="online_time" placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">User Due</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control" name="user_due" placeholder="Enter user due" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Speeding
                                                                    Value</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control" name="speeding_value" placeholder="Enter speeding value" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                kmh
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">Device
                                                                    Status</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <select name="device_sataus" id="edit_device_sataus" class="form-control kt-select2-2">

                                                                        <option value="">Select</option>
                                                                        @foreach($device_status_list as $dl)
                                                                        <option value="{{$dl->id}}">{{$dl->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Battery
                                                                    Voltage</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <select name="battery_voltage" id="edit_battery_voltage" class="form-control kt-select2-2">
                                                                        <option value="">Select</option>
                                                                        <option value="12">12 V</option>
                                                                        <option value="24">24 V</option>
                                                                        <option value="36">36 V</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="edit_device_4" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-lg-3 col-sm-12">Vehicle
                                                                Plate No</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="server_api_key" placeholder="Enter vehicle plate number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="edit_device_5" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class=" col-form-label col-lg-3 col-sm-12">Model</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                                <input type="text" class="form-control" name="server_api_key" placeholder="Enter ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="edit_device_6" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class=" col-form-label col-lg-3 col-sm-12">CRM to
                                                                Platform Status</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12 col-form-label" id="crm_to_platform_status">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class=" col-form-label col-lg-3 col-sm-12">Server to
                                                                Platform Status</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12 col-form-label" id="server_to_platform_status">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class=" col-form-label col-lg-3 col-sm-12">TU and
                                                                IMEI Status</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12 col-form-label" id="tu_to_imei_status">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class=" col-form-label col-lg-3 col-sm-12">Device
                                                                Status</label>
                                                            <div class="col-lg-5 col-md-9 col-sm-12 col-form-label" id="device_status">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="form-button">
                                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                                <button type="button" id="edit_device_save" onClick="save_imei()" class="btn btn-success btn-sm float-right">Save</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal" id="move_user_modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="edit_device_title"> Move User </h4>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-lg-2 col-form-label">Selected Person</label>
                                                        <div class="col-lg-4 col-md-9 mb-4">
                                                            <input type="text" class="form-control" name="moving_user_name" id="moving_user_name" value="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-lg-2 col-form-label">Move To</label>
                                                        <div class="col-sm-9">
                                                            <input id="moveuser_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                                                            <div class="clearfix">&nbsp;</div>
                                                            <Input type="hidden" id="moving_to_parent">
                                                            <div class="input-group" id="userMovement_treeview" style="height: calc(100vh - 270px);   overflow: auto;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="form-button">
                                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                                <button type="button" id="move_user_save" onClick="save_user_movement()" class="btn btn-success btn-sm float-right">Save</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal" id="batch_move_modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="edit_device_title"> Move Device </h4>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-lg-2 col-form-label">Target User</label>
                                                        <div class="col-sm-9">
                                                            <input id="movedevice_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                                                            <div class="clearfix">&nbsp;</div>
                                                            <input type="hidden" class="form-control" name="device_moving_to" id="device_moving_to">
                                                            <div class="input-group" id="deviceMovement_treeview" style="height: calc(100vh - 270px);   overflow: auto;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-lg-2 col-form-label">IMEI</label>
                                                        <div class="col-lg-4 col-md-9 mb-4">
                                                            <textarea id="moving_imei_list" name="moving_imei_list" class="form-control">

                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="form-button">
                                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                                <button type="button" id="move_device_save" onClick="save_device_movement()" class="btn btn-success btn-sm float-right">Save</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal" id="reset_password_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"> Reset Password </h4>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">New Password</label>
                                                        <div class="col-sm-9">
                                                            <input id="new_password" class="form-control" type="text" placeholder="new pass" style="margin-left:5px;">
                                                            <div class="clearfix">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="form-button">
                                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                                <button type="button" onClick="save_password()" class="btn btn-success btn-sm float-right">Reset Now</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal" id="notificationModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title"> Notification</h4>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @csrf
                                <div class="">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body text-dark">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-7">
                                                        <div class="input-group">
                                                            <input id="email" class="form-control" type="text" placeholder="Enter email address">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-info custom-info btn-sm"><i class="fas fa-plus custom-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a href="javascript:;">Verify</a>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                                    <div class="col-sm-7">
                                                        <input id="mobile" class="form-control" type="text" placeholder="Enter mobile number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Receive notification</label>
                                                    <div class="col-sm-7">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                            <input type="checkbox" checked="checked">
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Aleart duration</label>
                                                    <div class="col-sm-7">
                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                            <input type="checkbox" checked="checked">All day
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">From</label>
                                                            <div class="col-sm-4 custom-select-2">
                                                                <select name="start_hour" id="start_hour" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4 custom-select-2">
                                                                <select name="start_hour" id="start_min" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">To</label>
                                                            <div class="col-sm-4 custom-select-2">
                                                                <select name="start_hour" id="start_hour" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-4 custom-select-2">
                                                                <select name="start_hour" id="start_min" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row custom-table-section">
                                                    <div class="col-sm-12">
                                                        <table class="table">
                                                            <thead class="custom-thead">
                                                                <tr>
                                                                    <th scope="col">Aleart type</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">App</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>SOS</td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Low battery</td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Vibration</td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand mt-2">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="form-button">
                                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                                <button type="button" onClick="save_password()" class="btn btn-success btn-sm float-right">Save</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modals -->
                <div class="modal fade" id="sendMessageModal" data-backdrop="static" data-keyboard="false">
                    <div id="dialog" class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title">Send Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body  text-dark">
                                <div class="row">
                                    <div class="col-5">
                                        <div class=" row form-group">
                                            <label class="col-sm-12 col-form-label">Select Client</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">

                                        <div class=" row justify-content-between">
                                            <label class="col-sm-3 col-form-label">Message</label>
                                            <div class="mr-3">
                                                <div class="dropdown dropdown-inline">
                                                    <button type="button" class="btn btn-brand btn-sm quick-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <!-- <i class="flaticon-more-1"></i> -->
                                                        Select Template
                                                    </button>
                                                    <div class=" dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit dropdown-menu-custom">

                                                        <!--begin::Nav-->
                                                        <ul class="kt-nav" style="max-height: 220px; overflow: auto;">
                                                            <li class="kt-nav__head">
                                                                Template List
                                                            </li>
                                                            <li class="kt-nav__separator"></li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                                    <span class="kt-nav__link-text">Template 1</span>
                                                                </a>
                                                            </li>

                                                        </ul>

                                                        <!--end::Nav-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row form-group">
                                            <label for="username" class="col-lg-3 col-form-label">To
                                            </label>
                                            <div class="col-lg-9">
                                                <select class="form-control" multiple data-role="tagsinput">

                                                </select>
                                                <small id="add_sms_balance-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class=" row form-group">
                                            <label for="username" class="col-lg-3 col-form-label">Content </label>
                                            <div class="col-lg-9">
                                                <textarea name="remark" class="form-control" rows="2"></textarea>
                                                <small class="text-dark">Message content can not be more than 300
                                                    characters.</small>
                                                <small id="remark-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form content end -->
                            </div>
                            <div class="form-button">
                                <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                                <button type="button" class="btn btn-success btn-sm float-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::Global Config -->

                <!--begin:: Global Mandatory Vendors -->
                <script src="{{asset('assets/js/global/popper.min.js')}}"></script>
                <script src="{{asset('assets/js/global/bootstrap.min.js')}}"></script>
                <script src="{{asset('assets/js/global/js.cookie.js')}}"></script>
                <script src="{{asset('assets/js/global/moment.min.js')}}"></script>
                <script src="{{asset('assets/js/global/tooltip.min.js')}}"></script>
                <script src="{{asset('assets/js/global/perfect-scrollbar.js')}}"></script>
                <script src="{{asset('assets/js/global/sticky.min.js')}}"></script>
                <script src="{{asset('assets/js/global/wNumb.js')}}"></script>

                <!--end:: Global Mandatory Vendors -->

                <!--begin:: Global Optional Vendors -->
                <script src="{{asset('assets/js/optional/jquery.form.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.blockUI.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-datepicker.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-datepicker.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-datetimepicker.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-timepicker.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-timepicker.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/daterangepicker.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.bootstrap-touchspin.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-maxlength.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-multiselectsplitter.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-select.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-switch.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-switch.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/select2.full.js')}}"></script>
                <script src="{{asset('assets/js/optional/ion.rangeSlider.js')}}"></script>
                <script src="{{asset('assets/js/optional/typeahead.bundle.js')}}"></script>
                <script src="{{asset('assets/js/optional/handlebars.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.inputmask.bundle.js')}}"></script>
                <script src="{{asset('assets/js/optional/inputmask.date.extensions.js')}}"></script>
                <script src="{{asset('assets/js/optional/inputmask.numeric.extensions.js')}}"></script>
                <script src="{{asset('assets/js/optional/nouislider.js')}}"></script>
                <script src="{{asset('assets/js/optional/owl.carousel.js')}}"></script>
                <script src="{{asset('assets/js/optional/autosize.js')}}"></script>
                <script src="{{asset('assets/js/optional/clipboard.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/dropzone.js')}}"></script>
                <script src="{{asset('assets/js/optional/summernote.js')}}"></script>
                <script src="{{asset('assets/js/optional/markdown.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-markdown.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-markdown.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-notify.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-notify.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.validate.js')}}"></script>
                <script src="{{asset('assets/js/optional/additional-methods.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery-validation.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/toastr.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/raphael.js')}}"></script>
                <script src="{{asset('assets/js/optional/morris.js')}}"></script>
                <script src="{{asset('assets/js/optional/Chart.bundle.js')}}"></script>
                <script src="{{asset('assets/js/optional/bootstrap-session-timeout.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/idle-timer.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.waypoints.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.counterup.js')}}"></script>
                <script src="{{asset('assets/js/optional/promise.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/sweetalert2.min.js')}}"></script>
                <script src="{{asset('assets/js/optional/sweetalert2.init.js')}}"></script>
                <script src="{{asset('assets/js/optional/lib.js')}}"></script>
                <script src="{{asset('assets/js/optional/jquery.input.js')}}"></script>
                <script src="{{asset('assets/js/optional/repeater.js')}}"></script>
                <script src="{{asset('assets/js/optional/purify.js')}}"></script>

                <!--end:: Global Optional Vendors -->

                <!--begin::Global Theme Bundle(used by all pages) -->
                <script src="{{asset('assets/js/global/scripts.bundle.js')}}"></script>
                <script src="{{asset('assets/js/global/form-controls.js')}}"></script>
                <script src="{{asset('assets/js/global/bootbox.min.js')}}"></script>

                <!--end::Global Theme Bundle -->

                <!--begin::Page Vendors(used by this page) -->
                <script src="{{asset('assets/js/global/fullcalendar.bundle.js')}}"></script>
                <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
                <script src="{{asset('assets/js/global/gmaps.js')}}"></script>

                <!--end::Page Vendors -->

                <!--begin::Page Scripts(used by pages) -->
                <script src="{{asset('assets/js/global/dashboard.js')}}"></script>
                <script src="{{asset('assets/js/pages/profile.js')}}"></script>
                <script src="{{asset('assets/js/pages/bootstrap-datepicker.js')}}"></script>
                <script src="{{asset('assets/js/pages/data-local.js')}}"></script>
                <script src="{{asset('assets/js/pages/bootstrap-tagsinput.min.js')}}"></script>
                <script src="{{asset('assets/js/business/treeview.js')}}"></script>
                <script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>

                <!--end::Page Scripts -->

                <!-- begin:: datatables -->
                <script src="{{asset('assets/js/datatables/datatables.bundle.js')}}"></script>
                <script src="{{asset('assets/js/datatables/paginations.js')}}"></script>
                <!-- end:: datatables -->

                <script>
                    function infoMsg(msg) {
                        return toastr.info(msg, 'Note', {
                            progressBar: true,
                            closeButton: true,
                            hideDuration: "600",
                            timeOut: "3500",
                        });
                    }

                    function successMsg(msg) {
                        return toastr.success(msg, 'Success', {
                            progressBar: true,
                            closeButton: true,
                            hideDuration: "600",
                            timeOut: "3500",
                        });
                    }

                    function errorMsg() {
                        return toastr.error('Something went wrong.', 'Error', {
                            progressBar: true,
                            closeButton: true,
                            hideDuration: "600",
                            timeOut: "3500",
                        });
                    }

                    function warningMsg(msg) {
                        return toastr.warning(msg, 'Oops...', {
                            progressBar: true,
                            closeButton: true,
                            titleClass: "toastr-warning-title",
                            messageClass: "toastr-warning-message",
                            hideDuration: "600",
                            timeOut: "3500",
                        });
                    }
                </script>

            </div>


</body>

<!-- end::Body -->

</html>