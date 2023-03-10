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
    <link href="{{asset('assets/css/global/datatables.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/pages/jquery-ui.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/global/base/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/menu/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/brand/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/aside/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/monitor/v1/monitor_v1_custom.css')}}" rel="stylesheet" />
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/angular.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet.css" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.2/leaflet-src.js"></script> -->
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet-src.js"></script>
    <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
    <!-- <script src="{{asset('assets/js/leaflet-realtime.js')}}"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvX5ZoFwodbDqQWw1DPTp8Fk9jf3Uuv68"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        .leaflet-map-pane {
            z-index: 2 !important;
        }

        .leaflet-google-layer {
            z-index: 1 !important;
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" ng-app="monitorApp" ng-controller="monitorCtrl" ng-cloak>

    <!-- begin:: Page -->

    <!-- sideber is included in navber------------ -->

    <!-- begin:: Header -->
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
                        <a href="{{route('admin.dashboard')}}">
                            <img alt="Logo" src="{{asset('assets/media/logos/crm-logo-black.png')}}" />
                        </a>
                    </div>

                </div>

                <!-- end:: Aside -->


                <!-- begin:: Aside Menu -->

                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">

                        <!--  customer list of this dealer -->
                        <input id="dealer_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                        <div class="clearfix">&nbsp;</div>
                        <div id="dealer_treeview" class="tree_holder"></div>


                        <div class="custom-tabs">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#objects" class="active nav-link">Objects</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#events" class="nav-link">Events</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#places" class="nav-link">Places</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#history" class="nav-link">History</a></li>
                            </ul>


                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="objects" role="tabpanel">
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                            <input type="text" ng-model="search_device" class="form-control kt-quick-search__input" placeholder="Search device">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    </div>

                                    <div class="custom-buttons ml-1">
                                        <a href="#" class="custom-buttons-list" title="Reload">
                                            <i class="fas fa-sync-alt mr-1 pl-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Add object">
                                            <i class="fas fa-plus pr-2"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="group-heading mt-2">
                                    <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                        <li class="nav-item">
                                            <a class="custom-link-color nav-link active" data-toggle="tab" href="#all_device_tab" role="tab">
                                                All(@{{all_devices.length}})
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="custom-link-color nav-link" data-toggle="tab" href="#online_device_tab" role="tab">
                                                Online(@{{online_devices.length}})
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="custom-link-color nav-link" data-toggle="tab" href="#offline_device_tab" role="tab">
                                                Offline(@{{offline_devices.length}})
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="all_device_tab">
                                        <div ng-repeat="all_groups in all_device_groups" class="accordion mt-2" id="all_group_@{{all_groups.id}}">
                                            <div class="">
                                                <div class="group-heading" id="heading_all_group_@{{all_groups.id}}">
                                                    <h5 class="demo-heading ">

                                                        <label class="kt-checkbox kt-checkbox--solid">
                                                            <input type="checkbox" id="group-checkbox">
                                                            <span></span>
                                                        </label>
                                                        <a href="#collapse1-all_group_@{{all_groups.id}}" class="custom-card-title" data-toggle="collapse">
                                                            @{{all_groups.group_name}}
                                                        </a>
                                                        <a href="#collapse1-all_group_@{{all_groups.id}}" id="collaplse-arrow" class="custom-link-color" data-toggle="collapse">
                                                            <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse1-all_group_@{{all_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_all_group_@{{all_groups.id}}" data-parent="#all_group_@{{all_groups.id}}">
                                                    <div class="">
                                                        <ul class="list-group">
                                                            <li ng-repeat="all_d in all_devices | filter: search_device" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                <span>
                                                                    <label class="kt-checkbox kt-checkbox--solid">
                                                                        <input type="checkbox" class="group-checked">
                                                                        <span></span>
                                                                    </label>
                                                                    <i class="fas fa-car-side mr-2"></i>
                                                                    <a href="javascript:;" class="custom-link custom-link-text" ng-click="openMarkerByID(all_d.imei)">@{{all_d.device_name}} <span class="custom-data-span">10 Jun 2020</span></a>
                                                                </span>
                                                                <span>
                                                                    <a href="javascript:;" class="custom-link">0 kmh</a>
                                                                    <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                                    <a href="#" class="ml-2" data-toggle="dropdown">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                        <ul class="kt-nav">
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                                    <span class="kt-nav__link-text">Members</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="online_device_tab">
                                        <div ng-repeat="online_groups in online_device_groups" class="accordion mt-2" id="online_group_@{{online_groups.id}}">
                                            <div class="">
                                                <div class="group-heading" id="heading_online_group_@{{online_groups.id}}">
                                                    <h5 class="demo-heading ">

                                                        <label class="kt-checkbox kt-checkbox--solid">
                                                            <input type="checkbox" id="group-checkbox">
                                                            <span></span>
                                                        </label>
                                                        <a href="#collapse1-online_group_@{{online_groups.id}}" class="custom-card-title" data-toggle="collapse">
                                                            @{{online_groups.group_name}}
                                                        </a>
                                                        <a href="#collapse1-online_group_@{{online_groups.id}}" id="collaplse-arrow" class="custom-link-color" data-toggle="collapse">
                                                            <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse1-online_group_@{{online_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_online_group_@{{online_groups.id}}" data-parent="#online_group_@{{online_groups.id}}">
                                                    <div class="">
                                                        <ul class="list-group">
                                                            <li ng-repeat="online in online_devices" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                <span>
                                                                    <label class="kt-checkbox kt-checkbox--solid">
                                                                        <input type="checkbox" class="group-checked">
                                                                        <span></span>
                                                                    </label>
                                                                    <i class="fas fa-car-side mr-2"></i>
                                                                    <a href="javascript:;" class="custom-link custom-link-text">@{{online.device_name}}<span class="custom-data-span">10 Jun 2020</span></a>
                                                                </span>
                                                                <span>
                                                                    <a href="javascript:;" class="custom-link">0 kmh</a>
                                                                    <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                                    <a href="#" class="ml-2" data-toggle="dropdown">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                        <ul class="kt-nav">
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                                    <span class="kt-nav__link-text">Members</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="offline_device_tab">
                                        <div ng-repeat="offline_groups in offline_device_groups" class="accordion mt-2" id="offline_group_@{{offline_groups.id}}">
                                            <div class="">
                                                <div class="group-heading" id="heading_offline_group_@{{offline_groups.id}}">
                                                    <h5 class="demo-heading ">

                                                        <label class="kt-checkbox kt-checkbox--solid">
                                                            <input type="checkbox" id="group-checkbox">
                                                            <span></span>
                                                        </label>
                                                        <a href="#collapse1-offline_group_@{{offline_groups.id}}" class="custom-card-title" data-toggle="collapse">
                                                            @{{offline_groups.group_name}}
                                                        </a>
                                                        <a href="#collapse1-offline_group_@{{offline_groups.id}}" id="collaplse-arrow" class="custom-link-color" data-toggle="collapse">
                                                            <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapse1-offline_group_@{{offline_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_offline_group_@{{offline_groups.id}}" data-parent="#offline_group_@{{offline_groups.id}}">
                                                    <div class="">
                                                        <ul class="list-group">
                                                            <li ng-repeat="offline in offline_devices" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                <span>
                                                                    <label class="kt-checkbox kt-checkbox--solid">
                                                                        <input type="checkbox" class="group-checked">
                                                                        <span></span>
                                                                    </label>
                                                                    <i class="fas fa-car-side mr-2"></i>
                                                                    <a href="javascript:;" class="custom-link custom-link-text">@{{offline.device_name}}<span class="custom-data-span">10 Jun 2020</span></a>
                                                                </span>
                                                                <span>
                                                                    <a href="javascript:;" class="custom-link">0 kmh</a>
                                                                    <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                                    <a href="#" class="ml-2" data-toggle="dropdown">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                        <ul class="kt-nav">
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                                    <span class="kt-nav__link-text">Members</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="kt-nav__item">
                                                                                <a href="#" class="kt-nav__link">
                                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="events" role="tabpanel">
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    </div>

                                    <div class="custom-buttons ml-1">
                                        <a href="#" class="custom-buttons-list" title="Reload">
                                            <i class="fas fa-sync-alt mr-1 pl-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Delete all evens">
                                            <i class="fas fa-trash pr-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="group-heading mt-2">
                                    <ul class="list-group">
                                        <li class="list-group-item filter-list-group-item  d-flex justify-content-between  align-items-center">
                                            <a href="#" class="custom-link-color">Time <i class="fas fa-caret-down ml-2"></i></a>
                                            <a href="#" class="custom-link-color">Object</a>
                                            <a href="#" class="custom-link-color">Event</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="places" role="tabpanel">
                                <div class="custom-tabs">
                                    <ul class="nav nav-tabs custom-nav-tabs">
                                        <li class="nav-item"><a data-toggle="tab" href="#market" class="active nav-link">Markets (0)</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#route" class="nav-link">Routes (0)</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#zone" class="nav-link">Zones (0)</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="market" role="tabpanel">
                                            <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                                <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                                        <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                                    </div>
                                                </form>
                                                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                </div>

                                                <div class="custom-buttons ml-1">
                                                    <a href="#" class="custom-buttons-list" title="Reload">
                                                        <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Add matket">
                                                        <i class="fas fa-plus mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Groups">
                                                        <i class="fas fa-object-group mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Import">
                                                        <i class="fas fa-download mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Export">
                                                        <i class="fas fa-upload mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Delete all markets">
                                                        <i class="fas fa-trash pr-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="group-heading mt-2" id="headingOne">
                                                <h5 class="demo-heading ">

                                                    <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                    <a href="#" class="custom-card-title">
                                                        Name
                                                    </a>
                                                    <a href="#" id="collaplse-arrow" class="custom-link-color">
                                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="route" role="tabpanel">
                                            <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                                <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                                        <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                                    </div>
                                                </form>
                                                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                </div>

                                                <div class="custom-buttons ml-1">
                                                    <a href="#" class="custom-buttons-list" title="Reload">
                                                        <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Add route">
                                                        <i class="fas fa-plus mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Groups">
                                                        <i class="fas fa-object-group mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Import">
                                                        <i class="fas fa-download mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Export">
                                                        <i class="fas fa-upload mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Delete all routes">
                                                        <i class="fas fa-trash pr-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="group-heading mt-2" id="headingOne">
                                                <h5 class="demo-heading ">

                                                    <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                    <a href="#" class="custom-card-title">
                                                        Name
                                                    </a>
                                                    <a href="#" id="collaplse-arrow" class="custom-link-color">
                                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="zone" role="tabpanel">
                                            <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                                <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                                        <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                                    </div>
                                                </form>
                                                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                </div>

                                                <div class="custom-buttons ml-1">
                                                    <a href="#" class="custom-buttons-list" title="Reload">
                                                        <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Add zone">
                                                        <i class="fas fa-plus mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Groups">
                                                        <i class="fas fa-object-group mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Import">
                                                        <i class="fas fa-download mr-2"></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Export">
                                                        <i class="fas fa-upload mr-2 "></i>
                                                    </a>
                                                    <a href="#" class="custom-buttons-list" title="Delete all zones">
                                                        <i class="fas fa-trash pr-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="group-heading mt-2" id="headingOne">
                                                <h5 class="demo-heading ">

                                                    <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                    <a href="#" class="custom-card-title">
                                                        Name
                                                    </a>
                                                    <a href="#" id="collaplse-arrow" class="custom-link-color">
                                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="history" role="tabpanel">
                                <div class="filtering-area">
                                    <form action="">
                                        <div class=" row form-group">
                                            <label for="role" class="col-lg-4 col-form-label">Object</label>
                                            <div class="col-lg-8">
                                                <select name="" class="form-control kt-select2-2">
                                                    <option value="1">Selece one</option>
                                                    <option value="2">Select two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" row form-group">
                                            <label for="role" class="col-lg-4 col-form-label">Filter</label>
                                            <div class="col-lg-8">
                                                <select name="" class="form-control kt-select2-2">
                                                    <option value="1">Selece one</option>
                                                    <option value="2">Select two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" row form-group">
                                            <label for="role" class="col-lg-4 col-form-label">Time from</label>
                                            <div class="col-lg-8">
                                                <div class="input-group date">
                                                    <input type="text" name="time_to" class="form-control datetimepicker" placeholder="Select starting time" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row form-group">
                                            <label for="role" class="col-lg-4 col-form-label">Time to</label>
                                            <div class="col-lg-8">
                                                <div class="input-group date">
                                                    <input type="text" name="time_to" class="form-control datetimepicker" placeholder="Select ending time" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" row form-group">
                                            <label for="role" class="col-lg-4 col-form-label">Stops</label>
                                            <div class="col-lg-8">
                                                <select name="" class="form-control kt-select2-2">
                                                    <option value="1">Selece one</option>
                                                    <option value="2">Select two</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <ul class="list-group">
                                                <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                                    <a href="#" class="custom-link-color">Show</a>
                                                    <a href="#" class="custom-link-color">Hide</a>
                                                    <a href="#" class="custom-link-color">Import</a>
                                                    <a href="#" class="custom-link-color">Export</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-2">
                                            <ul class="list-group">
                                                <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                                    <a href="#" class="custom-link-color">Time</a>
                                                    <a href="#" class="custom-link-color">Information</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- end:: Aside Menu -->

            </div>


            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper custom-kt-wrapper" id="kt_wrapper">

                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin:: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                <li class="kt-menu__item kt-menu__item--active  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Monitors</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:200px">
                                        <div class="kt-menu__subnav">
                                            <ul class="kt-menu__content">
                                                <li class="kt-menu__item custom-kt-menu__item">
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text"> Default monitor</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('enduser.v2.monitor')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Classic monitor</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Dashboard</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:200px">
                                        <div class="kt-menu__subnav">
                                            <ul class="kt-menu__content">
                                                <li class="kt-menu__item custom-kt-menu__item">
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text"> VTS overview</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">VMS overview</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                                <li class="kt-menu__item   kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Quick Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:800px">
                                        <div class="kt-menu__subnav">
                                            <ul class="kt-menu__content">
                                                <li class="kt-menu__item custom-kt-menu__item">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Quick Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=moving_overview')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Moving overview</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=mileage_report')}}" target="_blank" class="kt-menu__link " ><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Mileage report</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=engine_overview')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Engine overview</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=engine_report')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Engine report</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=trip_report')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Trip report</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=quick&report_name=moving_overview')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Map with report</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item custom-kt-menu__item ">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Schedule Reports</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_name=schedule_report')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">View schedule report</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=alert&report_name=alert_overview')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Alert overview</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_type=alert&report_name=alert_report')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Alert report</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item custom-kt-menu__item">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('admin/dealer/report?report_name=device_manage')}}" target="_blank" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Device Management</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Alert setting</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">My profile setting</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="kt-menu__item custom-kt-menu__item">
                                                    <h3 class="kt-menu__heading kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">VMS</span><i class="kt-menu__ver-arrow la la-angle-right"></i></h3>
                                                    <ul class="kt-menu__inner">
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Vehicle maintenance</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:;" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Vehicle manager dashboard</span></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="kt-menu__item   kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Apps</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu  kt-menu__submenu--fixed kt-menu__submenu--left" style="width:350px">
                                        <div class="kt-menu__subnav">
                                            <!--begin: Head -->

                                            <div class="kt-head kt-head--skin-dark" style="background-image: url('{{asset('assets/media/misc/bg-1.jpg')}}');">
                                                <h3 class="kt-head__title">
                                                    User Quick Actions
                                                    <span class="kt-space-15"></span>
                                                    <span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
                                                </h3>
                                            </div>
                                            <!--end: Head -->
                                            <!--begin: Grid Nav -->
                                            <div class="kt-grid-nav kt-grid-nav--skin-light">
                                                <div class="kt-grid-nav__row">
                                                    <a href="#" class="kt-grid-nav__item">
                                                        <span class="kt-grid-nav__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                    <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                                    <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" id="C" fill="#000000" />
                                                                </g>
                                                            </svg> </span>
                                                        <span class="kt-grid-nav__title">Accounting</span>
                                                        <span class="kt-grid-nav__desc">eCommerce</span>
                                                    </a>
                                                    <a href="#" class="kt-grid-nav__item">
                                                        <span class="kt-grid-nav__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                    <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                                                    <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" id="Combined-Shape" fill="#000000" />
                                                                </g>
                                                            </svg> </span>
                                                        <span class="kt-grid-nav__title">Administration</span>
                                                        <span class="kt-grid-nav__desc">Console</span>
                                                    </a>
                                                </div>
                                                <div class="kt-grid-nav__row">
                                                    <a href="#" class="kt-grid-nav__item">
                                                        <span class="kt-grid-nav__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                    <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" id="Combined-Shape" fill="#000000" />
                                                                    <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" id="Path" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg> </span>
                                                        <span class="kt-grid-nav__title">Projects</span>
                                                        <span class="kt-grid-nav__desc">Pending Tasks</span>
                                                    </a>
                                                    <a href="#" class="kt-grid-nav__item">
                                                        <span class="kt-grid-nav__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg> </span>
                                                        <span class="kt-grid-nav__title">Customers</span>
                                                        <span class="kt-grid-nav__desc">Latest cases</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end: Grid Nav -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- end:: Header Menu -->

                    <!-- begin:: Header Topbar -->

                    <div class="kt-header__topbar">

                        <!--begin: Search -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-top-unround dropdown-menu-anim dropdown-menu-lg">
                                <div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
                                    <form method="get" class="kt-quick-search__form">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Search -->

                        <!--begin: Notifications -->
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
                                <span class="kt-hidden kt-badge kt-badge--dot kt-badge--notify kt-badge--sm"></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
                                <form>

                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
                                        <h3 class="kt-head__title">
                                            User Notifications
                                            &nbsp;
                                            <span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 new</span>
                                        </h3>
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--end: Head -->
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-line-chart kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-box-1 kt-font-brand"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-chart2 kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Application has been approved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-image-file kt-font-warning"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New file has been uploaded
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            5 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-bar-chart kt-font-info"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New user feedback received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            8 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            System reboot has been successfully completed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            12 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-favourite kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been placed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            15 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item kt-notification__item--read">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-security kt-font-warning"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer comment recieved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                            <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll ps" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-line-chart kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-box-1 kt-font-brand"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-chart2 kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Application has been approved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-image-file kt-font-warning"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New file has been uploaded
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            5 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-bar-chart kt-font-info"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New user feedback received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            8 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            System reboot has been successfully completed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            12 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-favourite kt-font-brand"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New order has been placed
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            15 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item kt-notification__item--read">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-safe kt-font-primary"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Company meeting canceled
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            19 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-psd kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New report has been received
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            23 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-download-1 kt-font-danger"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            Finance report has been generated
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            25 hrs ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon-security kt-font-warning"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer comment recieved
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            2 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="kt-notification__item">
                                                    <div class="kt-notification__item-icon">
                                                        <i class="flaticon2-pie-chart kt-font-success"></i>
                                                    </div>
                                                    <div class="kt-notification__item-details">
                                                        <div class="kt-notification__item-title">
                                                            New customer is registered
                                                        </div>
                                                        <div class="kt-notification__item-time">
                                                            3 days ago
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                            <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                    <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                        All caught up!
                                                        <br>No new notifications.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--end: Notifications -->

                        <!--begin: Quick Actions -->
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="true">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                                <form>

                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-dark" style="background-image: url('{{asset('assets/media/misc/bg-1.jpg')}}');">
                                        <h3 class="kt-head__title">
                                            User Quick Actions
                                            <span class="kt-space-15"></span>
                                            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
                                        </h3>
                                    </div>

                                    <!--end: Head -->

                                    <!--begin: Grid Nav -->
                                    <div class="kt-grid-nav kt-grid-nav--skin-light">
                                        <div class="kt-grid-nav__row">
                                            <a href="#" class="kt-grid-nav__item">
                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                            <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" id="C" fill="#000000"></path>
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-grid-nav__title">Accounting</span>
                                                <span class="kt-grid-nav__desc">eCommerce</span>
                                            </a>
                                            <a href="#" class="kt-grid-nav__item">
                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                            <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" id="Combined-Shape" fill="#000000"></path>
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-grid-nav__title">Administration</span>
                                                <span class="kt-grid-nav__desc">Console</span>
                                            </a>
                                        </div>
                                        <div class="kt-grid-nav__row">
                                            <a href="#" class="kt-grid-nav__item">
                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" id="Combined-Shape" fill="#000000"></path>
                                                            <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-grid-nav__title">Projects</span>
                                                <span class="kt-grid-nav__desc">Pending Tasks</span>
                                            </a>
                                            <a href="#" class="kt-grid-nav__item">
                                                <span class="kt-grid-nav__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"></path>
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-grid-nav__title">Customers</span>
                                                <span class="kt-grid-nav__desc">Latest cases</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!--end: Grid Nav -->
                                </form>
                            </div>
                        </div>

                        <!--end: Quick Actions -->

                        <!--begin: Cart -->
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon"><i class="flaticon2-shopping-cart-1"></i></span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                <form>

                                    <!-- begin:: Mycart -->
                                    <div class="kt-mycart">
                                        <div class="kt-mycart__head kt-head" style="background-image: url('{{asset('assets/media/misc/bg-1.jpg')}}');">
                                            <div class="kt-mycart__info">
                                                <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
                                                <h3 class="kt-mycart__title">My Cart</h3>
                                            </div>
                                            <div class="kt-mycart__button">
                                                <button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
                                            </div>
                                        </div>
                                        <div class="kt-mycart__body kt-scroll ps" data-scroll="true" data-height="245" data-mobile-height="200" style="height: 245px; overflow: hidden;">
                                            <div class="kt-mycart__item">
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <a href="#" class="kt-mycart__title">
                                                            Samsung
                                                        </a>
                                                        <span class="kt-mycart__desc">
                                                            Profile info, Timeline etc
                                                        </span>
                                                        <div class="kt-mycart__action">
                                                            <span class="kt-mycart__price">$ 450</span>
                                                            <span class="kt-mycart__text">for</span>
                                                            <span class="kt-mycart__quantity">7</span>
                                                            <a href="#" class="btn btn-label-success btn-icon">−</a>
                                                            <a href="#" class="btn btn-label-success btn-icon">+</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="kt-mycart__pic">
                                                        <img src="{{asset('assets/media/products/product9.jpg')}}" title="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__item">
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <a href="#" class="kt-mycart__title">
                                                            Panasonic
                                                        </a>
                                                        <span class="kt-mycart__desc">
                                                            For PHoto &amp; Others
                                                        </span>
                                                        <div class="kt-mycart__action">
                                                            <span class="kt-mycart__price">$ 329</span>
                                                            <span class="kt-mycart__text">for</span>
                                                            <span class="kt-mycart__quantity">1</span>
                                                            <a href="#" class="btn btn-label-success btn-icon">−</a>
                                                            <a href="#" class="btn btn-label-success btn-icon">+</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="kt-mycart__pic">
                                                        <img src="{{asset('assets/media/products/product13.jpg')}}" title="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__item">
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <a href="#" class="kt-mycart__title">
                                                            Fujifilm
                                                        </a>
                                                        <span class="kt-mycart__desc">
                                                            Profile info, Timeline etc
                                                        </span>
                                                        <div class="kt-mycart__action">
                                                            <span class="kt-mycart__price">$ 520</span>
                                                            <span class="kt-mycart__text">for</span>
                                                            <span class="kt-mycart__quantity">6</span>
                                                            <a href="#" class="btn btn-label-success btn-icon">−</a>
                                                            <a href="#" class="btn btn-label-success btn-icon">+</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="kt-mycart__pic">
                                                        <img src="{{asset('assets/media/products/product16.jpg')}}" title="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__item">
                                                <div class="kt-mycart__container">
                                                    <div class="kt-mycart__info">
                                                        <a href="#" class="kt-mycart__title">
                                                            Candy Machine
                                                        </a>
                                                        <span class="kt-mycart__desc">
                                                            For PHoto &amp; Others
                                                        </span>
                                                        <div class="kt-mycart__action">
                                                            <span class="kt-mycart__price">$ 784</span>
                                                            <span class="kt-mycart__text">for</span>
                                                            <span class="kt-mycart__quantity">4</span>
                                                            <a href="#" class="btn btn-label-success btn-icon">−</a>
                                                            <a href="#" class="btn btn-label-success btn-icon">+</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="kt-mycart__pic">
                                                        <img src="{{asset('assets/media/products/product15.jpg')}}" title="" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                            </div>
                                        </div>
                                        <div class="kt-mycart__footer">
                                            <div class="kt-mycart__section">
                                                <div class="kt-mycart__subtitel">
                                                    <span>Sub Total</span>
                                                    <span>Taxes</span>
                                                    <span>Total</span>
                                                </div>
                                                <div class="kt-mycart__prices">
                                                    <span>$ 840.00</span>
                                                    <span>$ 72.00</span>
                                                    <span class="kt-font-brand">$ 912.00</span>
                                                </div>
                                            </div>
                                            <div class="kt-mycart__button kt-align-right">
                                                <button type="button" class="btn btn-primary btn-sm">Place Order</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end:: Mycart -->
                                </form>
                            </div>
                        </div>

                        <!--end: Cart-->



                        <!--begin: Language bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                <span class="kt-header__topbar-icon">
                                    <img class="" src="{{asset('assets/media/flags/012-uk.svg')}}" alt="">
                                </span>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                                <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                    <li class="kt-nav__item kt-nav__item--active">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/012-uk.svg')}}" alt=""></span>
                                            <span class="kt-nav__link-text">English</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/016-spain.svg')}}" alt=""></span>
                                            <span class="kt-nav__link-text">Spanish</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <span class="kt-nav__link-icon"><img src="{{asset('assets/media/flags/017-germany.svg')}}" alt=""></span>
                                            <span class="kt-nav__link-text">German</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--end: Language bar -->

                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    @if (Auth::check())
                                    <span class="kt-header__topbar-username kt-hidden-mobile">

                                        {{ Auth::user()->name }}

                                    </span>
                                    <img class="" alt="Pic" src="{{asset('uploads/user/'.Auth::user()->image)}}" />
                                    @endif
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                    <!-- <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span> -->
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url('{{asset('assets/media/misc/bg-1.jpg')}}');">
                                    <div class="kt-user-card__avatar">
                                        @if (Auth::check())


                                        <img class="" alt="Pic" src="{{asset('uploads/user/'.Auth::user()->image)}} " />
                                        @endif
                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <!-- <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span> -->
                                    </div>
                                    <div class="kt-user-card__name">
                                        @if (Auth::check())
                                        {{ Auth::user()->name }}
                                        @endif
                                    </div>
                                    <div class="kt-user-card__badge">
                                        <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
                                    </div>
                                </div>

                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="{{route('profile.index')}}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Profile
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Account settings and more
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-mail kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Messages
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Inbox and tasks
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-rocket-1 kt-font-danger"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Activities
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Logs and notifications
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-hourglass kt-font-brand"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Tasks
                                            </div>
                                            <div class="kt-notification__item-time">
                                                latest tasks and projects
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-cardiogram kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Billing
                                            </div>
                                            <div class="kt-notification__item-time">
                                                billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="kt-notification__custom kt-space-between">
                                        <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                                        </form>

                                        <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>
                    <!-- end:: Header Topbar -->

                </div>

                <!-- end:: Header -->

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Content -->
                    <div class="kt-container custom-kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                        <!--Begin::Dashboard 1-->

                        <!--Begin::Row-->
                        <div class="row">
                            <div class="kt-portlet mirgin-buttom-none custom-container">
                                <div class="kt-portlet__body custom-portlet-body resizable-top-section">
                                    <div class="kt-section--first">
                                        <div class="kt-section__body text-dark">
                                            <div class="kt-widget15">
                                                <div class="kt-widget15__map">
                                                    <div id="kt_chart_latest_trends_map" class="g-map"></div>
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

                <div class="kt-portlet__body toggleSection resizable-buttom-section" id="resizable">
                    <span class="sectionHide" title="Minimize"> <i class="fas fa-times"></i></span>
                    <div class="kt-section--first">
                        <div class="kt-section__body text-dark">
                            <ul class="nav nav-tabs custom-nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#data" class="active nav-link">Data</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#graph" class="nav-link">Graph</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#messages" class="nav-link">Messages</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="data" role="tabpanel">
                                    <div class="dataListSection">
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-safari"></i></span>
                                            <span class="dataItemName">Odometer</span>
                                            <span class="dataItemValue"> n/a </span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-sim-card"></i></span>
                                            <span class="dataItemName">SIM card number</span>
                                            <span class="dataItemValue">@{{selected_device.sim_number}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Status</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-acquisitions-incorporated"></i></span>
                                            <span class="dataItemName">Altitute</span>
                                            <span class="dataItemValue">@{{selected_device.altitude}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Angle</span>
                                            <span class="dataItemValue">@{{selected_device.angle}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Position</span>
                                            <span class="dataItemValue">@{{selected_device.lat}} @{{selected_device.lng}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Speed</span>
                                            <span class="dataItemValue">@{{selected_device.speed}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Battery Level</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-bolt"></i></span>
                                            <span class="dataItemName">Charging Status</span>
                                            <span class="dataItemValue">21015442</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="graph" role="tabpanel">
                                    mr
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    world
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="sectionShow" title="Maximize"> <i class="fas fa-expand-arrows-alt"></i></span>

            </div>
        </div>
    </div>



    <!-- end:: Page -->



    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <script type="text/javascript">
        var app = angular.module('monitorApp', []);
        app.controller('monitorCtrl', function($scope, $http, $window, $interval) {
            console.log("angular is working");

            angular.element(document).ready(function() {
                load_map();
                var to = false;
                $('#dealer_search').keyup(function() {
                    if (to) {
                        clearTimeout(to);
                    }
                    to = setTimeout(function() {
                        var v = $('#dealer_search').val();
                        $('#dealer_treeview').jstree('search', v);
                    }, 250);
                });
            });

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{URL::to('/admin/business/showTree')}}/" + @php echo $customer_id;@endphp,
                success: function(response) {
                    if (response.length > 0) {
                        $('#dealer_treeview').jstree({
                            'plugins': ['state', 'dnd', 'contextmenu', "themes", "json_data", "ui", "types", "search", "sort"],
                            'core': {
                                'data': response
                            }
                        }).on('create_node.jstree', function(e, data) {
                            //console.log(data);
                        }).on('select_node.jstree', function(e, data) {
                            //console.log(data.node.original);
                            $scope.selected_user_details = data.node.original.item_details;
                            console.log($scope.selected_user_details);
                            user_information($scope.selected_user_details.id);
                        });
                    } else {
                        $('#dealer_search').hide();
                        $('#dealer_treeview').hide();
                    }

                },
                error: function(reject) {
                    errorMsg();

                }
            });

            $scope.online_devices = [];
            $scope.offline_devices = [];
            $scope.all_devices = [];
            user_information(@php echo $customer_id; @endphp);
            $scope.current_url = ''; //window.location.href.replace('&' + device_id, '');
            $scope.tracking_url = ''; // window.location.href.replace('monitor.html', 'tracking.html');

            $scope.all_device_groups = [{
                id: 1,
                group_name: 'Default Group'
            }];
            $scope.online_device_groups = [{
                id: 1,
                group_name: 'Default Group'
            }];
            $scope.offline_device_groups = [{
                id: 1,
                group_name: 'Default Group'
            }];

            function user_information(user_id) {
                $http.get("{{URL::to('/admin/business/devices')}}/" + user_id).then(function(response) {
                    $scope.all_devices = response.data;
                    console.log($scope.all_devices);
                    $scope.online_devices = []; // response.data;
                    $scope.offline_devices = []; //response.data;
                    console.log($scope.all_devices);
                    /* for (var i = 0; i < response.length; i++) {
                    	if (response[i].status == 'online') {
                    		if (response[i].disabled == true) {
                    			response[i].active_color = 'badge badge-danger';
                    			response[i].active_label = 'Inactive';
                    		}
                    		if (response[i].disabled == false) {
                    			response[i].active_color = 'badge badge-success';
                    			response[i].active_label = 'Active';
                    		}
                    		response[i].mycolor = 'badge badge-success';
                    		$scope.online_devices.push(response[i]);
                    	} else if (response[i].status == 'offline') {
                    		if (response[i].disabled == true) {
                    			response[i].active_color = 'badge badge-danger';
                    			response[i].active_label = 'Inactive';
                    		}
                    		if (response[i].disabled == false) {
                    			response[i].active_color = 'badge badge-success';
                    			response[i].active_label = 'Active';
                    		}
                    		response[i].mycolor = 'badge badge-secondary';
                    		$scope.offline_devices.push(response[i]);
                    	}

                    	if (device_id != undefined) {
                    		if (response[i].deviceId == only_device_id) {
                    			$scope.device_name = response[i].name;
                    			break;
                    		}
                    	}

                    }  */ //end of loop of all devices
                    load_markers($scope.all_devices);
                });
            }

            $scope.openMarkerByID = function(id) {
                for (var i = 0; i < $scope.all_devices.length; i++) {
                    if ($scope.all_devices[i].imei == id) {
                        $scope.selected_device = $scope.all_devices[i];
                        console.log($scope.selected_device);
                        break;
                    }
                }
                $('.sectionShow').trigger('click');
                markers[id].openPopup();
                var pos = markers[id].getLatLng();
                map.setView(pos, 14, {
                    animate: true,
                    duration: 1.5
                });

            }

            function load_map() {
                window.map = new L.Map('kt_chart_latest_trends_map', {
                    center: [23.8103, 90.4125],
                    zoom: 5,
                    markerZoomAnimation: false,
                    zoomControl: false
                });

                var zoomControl = new L.Control.Zoom({
                    position: 'topright'
                });

                var ggl = new L.Google('ROADMAP'); // Possible types: SATELLITE, ROADMAP, HYBRID, TERRAIN

                var url = 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
                    attr =
                    'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
                    otm = new L.TileLayer(url, {
                        attribution: attr,
                        /*subdomains:"1234"*/
                    });

                var baseLayers = {
                    "Google Map": ggl,
                    "Leaflet Map": otm,
                };

                window.layersControl = L.control.layers(baseLayers, null, {
                    collapsed: false
                });

                layersControl.addTo(map);
                zoomControl.addTo(map);

                map.addLayer(ggl);

                window.mygroup = L.layerGroup();
                map.addLayer(mygroup);
            }

            function load_markers(devices = null) {
                mygroup.clearLayers();
                window.markers = [];
                window.allMarkers = [];
                var allPositions = [];
                var customicon = L.icon({
                    iconUrl: 'https://unpkg.com/leaflet@1.1.0/dist/images/marker-icon.png',
                    iconSize: [30, 30],
                    iconAnchor: [20, 40],
                    popupAnchor: [0, -40]
                });
                if (devices.length > 0) {
                    //var bounds = L.latLngBounds();
                    for (var x = 0; x < devices.length; x++) {
                        //let lat_lng = [devices[x].lat, devices[x].lng];
                        var theMarker = L.marker([devices[x].lat, devices[x].lng], {
                            icon: customicon
                        }).addTo(map).bindPopup(devices[x].device_name);
                        markers[devices[x].imei] = theMarker;
                        mygroup.addLayer(theMarker);
                        //bounds.extend(lat_lng);
                    }
                    //map.fitBounds(bounds);
                }

                //map.fitBounds(mygroup.getBounds());
                //map.setView(markersLayer.getBounds().getCenter());
            }

            var realtime_call = function() {
                user_information($scope.selected_user_details.id);
            }

            $interval(realtime_call, 5000);


        });
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

    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>
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
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
    <script src="{{asset('assets/js/global/gmaps.js')}}"></script> -->

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by pages) -->
    <script src="{{asset('assets/js/global/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/pages/profile.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/select2.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/jquery-resizable.js')}}"></script>
    <script src="{{asset('assets/js/pages/jquery-ui.js')}}"></script>

    <!--end::Page Scripts -->

    <!-- begin:: datatables -->
    <script src="{{asset('assets/js/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/datatables/paginations.js')}}"></script>
    <!-- end:: datatables -->
    <script>
        // $(".resizable-top-section").resizable({
        // handleSelector: ".splitter-section",
        // resizeWidth: false
        // });

        $(document).ready(function(e) {

            $('.datetimepicker').datetimepicker({
                todayHighlight: true,
                autoclose: true,
                pickerPosition: 'bottom-left',
                todayBtn: true,
                showMeridian: true,
                format: 'dd M yyyy  HH:ii p'
            });
        });

        $('.sectionHide').click(function(e) {
            e.preventDefault();
            $('.toggleSection').css('display', 'none');
            $('.sectionShow').css('display', 'block');
            $('.sectionShow').css('z-index', '9999');
            $('.sectionShow').css('left', '22%');
            $('.sectionShow').css('bottom', '5');
            //$('.g-map').css('height', '93vh');
        });
        $('.sectionShow').click(function(e) {
            e.preventDefault();
            $('.toggleSection').css('display', 'block');
            $('.sectionShow').css('display', 'none');
            //$('.g-map').css('height', '65vh');
        });

        // Begin:: Toastr Alert -------------
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
                hideDuration: "600",
                timeOut: "3500",
            });
        }

        //End:: Toastr Alert----

        $(function() {
            $(document).tooltip();
        });
    </script>


</body>

<!-- end::Body -->

</html>