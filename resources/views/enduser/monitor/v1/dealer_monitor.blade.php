<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Monitor | Standared</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="{{asset('assets/css/monitor/v1/monitor_v1_dealer.css')}}" rel="stylesheet" />
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/angular.min.js')}}"></script>
    <script src="{{asset('assets/js/angular-filter.js')}}"></script>
    <link href="{{asset('assets/js/leaflet.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/leaflet.js')}}"></script>
    <script src="{{asset('assets/js/marker.rotate.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.movingRotatedMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.markercluster-src.js')}}"></script>
    <script src="{{asset('assets/js/L.Control.ZoomMin.js')}}"></script>
    <script src="{{asset('assets/js/Leaflet.Control.Custom.js')}}"></script>
    <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvX5ZoFwodbDqQWw1DPTp8Fk9jf3Uuv68"></script>
    <script src="{{asset('assets/js/google.js')}}"></script>
    <script src="{{asset('assets/js/bing_map.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easy-autocomplete.min.js')}}"></script>
    <link href="{{asset('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" />
    <style>
        .btn.btn-default i {
            color: #000;
        }

        .btn.btn-default:hover i {
            color: #ffffff;
        }

        .leaflet-zoom-anim .leaflet-zoom-animated {
            transition: 1.7s;
        }

        .leaflet-left .leaflet-control {
            margin-left: 13px;
        }

        .leaflet-bar a,
        .leaflet-bar a:hover {
            width: 30px;
            height: 30px;
            color: #FF9951;
            padding-top: 3px;
        }

        .leaflet-bar a:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom: none;
        }

        .leaflet-bar {
            box-shadow: none;
            border-radius: 0;
        }

        .leaflet-control-zoom-in,
        .btn.btn-default i,
        .btn.btn-default:hover i {
            color: #FF9951;
        }

        .btn.btn-default:active,
        .btn.btn-default:hover {
            color: #ffffff;
            background: #efefef !important;
            border-color: none !important;
        }

        .easy-autocomplete input {
            border-color: #ccc;
            border-radius: 4px;
            border-style: solid;
            border-width: 1px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
            color: #555;
            float: none;
            padding: 6px 12px;
            width: 250px !important;
        }

        .easy-autocomplete-container {
            left: 0;
            position: absolute;
            width: 250px !important;
            z-index: 2;
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" id="monitor_body" ng-app="monitorApp" ng-controller="monitorCtrl" ng-cloak id="monitor_body">

    <!-- begin:: Page -->

    <!-- sideber is included in navber------------ -->

    <!-- begin:: Header -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed">
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
                        <!-- <div class=" col-sm-12 row" style="padding:0;">
                            <input id="dealer_search" class="form-control col-sm-10" type="text" placeholder="search" style="margin-left:5px;">
                        </div> -->

                        <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                            <div class="kt-quick-search__form custom-kt-quick-search__form1">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                    </div>
                                    <input type="text"  class="form-control kt-quick-search__input" placeholder="Search Account" id="dealer_search">
                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="panel-top">
                            <div id="dealer_treeview" class="tree_holder" style="height:20vh; overflow:auto;"></div>
                        </div>

                        <!-- <div class="splitter-horizontal">
                        </div> -->
                        <div class="panel-bottom">
                            <div class="custom-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a data-toggle="tab" href="#objects" class="active nav-link">Objects</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#events" class="nav-link" ng-click="show_event_list()">Events</a>
                                    </li>
                                    <li class="nav-item"><a data-toggle="tab" href="#places" class="nav-link" ng-click="show_geofence_list()">Places</a>
                                    </li>
                                    <li class="nav-item"><a data-toggle="tab" href="#history" class="nav-link">History</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane active" id="objects" role="tabpanel">
                                <div id="device_list_loader" class="col-sm-12 text-center d-none" style="position: absolute;    left: 0%; align-items: center; justify-content: center; z-index: 999999;    height: calc(100vh - 51px);  width: 100%;  padding-top: 15%; background:rgba(255,255,255,0.8);">
                                                    <img src="{{asset('assets/images/loading.gif')}}" style="width:130px; height:auto;">
                                                </div>
                                    <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                        <form method="get" class="kt-quick-search__form custom-kt-quick-search__form">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                                </div>
                                                <input type="text" ng-model="search_device" class="form-control kt-quick-search__input" placeholder="Search device">
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                            </div>
                                        </form>
                                        <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                        </div>

                                        <div class="custom-buttons ml-1">
                                            <a href="javascript:;" class="custom-buttons-list" title="Reload" ng-click="reload_search()">
                                                <i class="fas fa-sync-alt mr-1 pl-2"></i>
                                            </a>
                                            <a href="javascript:;" class="custom-buttons-list" title="Add object">
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
                                                        <h5 class="demo-heading">

                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" id="group-checkbox">
                                                                <span></span>
                                                            </label>
                                                            <a href="#collapse1-all_group_@{{all_groups.id}}" class="custom-card-title" data-toggle="collapse">
                                                                @{{all_groups.group_name}}
                                                            </a>
                                                            <a href="#collapse1-all_group_@{{all_groups.id}}" id="collaplse-arrow_all_@{{all_groups.id}}" class="collaplse-arrow custom-link-color" data-toggle="collapse">
                                                                <i id="arrow-sign_all_@{{all_groups.id}} " class="arrow-sign fas fa-caret-down"></i>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse1-all_group_@{{all_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_all_group_@{{all_groups.id}}" data-parent="#all_group_@{{all_groups.id}}">
                                                        <div class="">
                                                            <ul class="list-group">
                                                                <li ng-repeat="all_d in all_devices | filterBy: ['device_name','imei','sim_number']: search_device" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                    <span>
                                                                        <!-- <label class="kt-checkbox kt-checkbox--solid">
                                                                            <input type="checkbox" class="group-checked">
                                                                            <span></span>
                                                                        </label> -->
                                                                        <!-- <i class="fas fa-car-side mr-2"></i> -->
                                                                        <img src="@{{all_d.list_device_icon}}" height="25">
                                                                        <a href="javascript:;" class="custom-link custom-link-text" ng-click="openMarkerByID(all_d.imei)">@{{all_d.device_name}}
                                                                            <span class="custom-data-span">@{{all_d.ststr}}</span></a>
                                                                    </span>
                                                                    <span>
                                                                        <a href="javascript:;" class="custom-link">@{{all_d.speed}} kmh</a>
                                                                        <span class="ml-2" ng-if="(all_d.speed<=0)"> <i class="fas fa-wifi"></i></span>
                                                                        <span class="ml-2" ng-if="(all_d.speed>0)"><img src="@{{all_d.wifi_icon}}" style=" width: 18px;height: 18px;"></span>
                                                                        <a href="javascript:;" class="ml-2" data-toggle="dropdown">
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                            <ul class="kt-nav custom-onclick-option">
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_details(all_d.id)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/detail.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Details</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/playback')}}/@{{all_d.imei}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/playback.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Playback</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/report?report_type=quick&report_name=trip_report&imei=')}}@{{all_d.imei}}_@{{all_d.device_name}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Report</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="add_complain(all_d.id, all_d.device_name)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Complain</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_command(all_d)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/command.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Command</span>
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
                                                            <a href="#collapse1-online_group_@{{online_groups.id}}" id="collaplse-arrow_online_@{{online_groups.id}}" class="collaplse-arrow custom-link-color" data-toggle="collapse">
                                                                <i id="arrow-sign_online_@{{online_groups.id}} " class="arrow-sign fas fa-caret-down"></i>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse1-online_group_@{{online_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_online_group_@{{online_groups.id}}" data-parent="#online_group_@{{online_groups.id}}">
                                                        <div class="">
                                                            <ul class="list-group">
                                                                <li ng-repeat="online in online_devices" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                    <span>
                                                                        <img src="@{{online.list_device_icon}}" height="25">
                                                                        <a href="javascript:;" class="custom-link custom-link-text" ng-click="openMarkerByID(online.imei)">@{{online.device_name}}
                                                                            <span class="custom-data-span">@{{online.ststr}}</span></a>

                                                                    </span>
                                                                    <span>
                                                                        <a href="javascript:;" class="custom-link">@{{online.speed}}
                                                                            kmh</a>
                                                                        <span class="ml-2"><img src="@{{online.wifi_icon}}" style="width: 18px; height: 18px; "></span>
                                                                        <a href="javascript:;" class="ml-2" data-toggle="dropdown">
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                            <ul class="kt-nav custom-onclick-option">
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_details(online.id)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/detail.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Details</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/playback')}}/@{{online.imei}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/playback.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Playback</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/report?report_type=quick&report_name=trip_report&imei=')}}@{{online.imei}}_@{{online.device_name}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Report</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="add_complain(online.id, online.device_name)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Complain</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_command(online)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/command.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Command</span>
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
                                                            <a href="#collapse1-offline_group_@{{offline_groups.id}}" id="collaplse-arrow_offline__@{{offline_groups.id}}" class="collaplse-arrow custom-link-color" data-toggle="collapse">
                                                                <i id="arrow-sign_offline__@{{offline_groups.id}} " class="arrow-sign fas fa-caret-down"></i>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse1-offline_group_@{{offline_groups.id}}" class="collapse show groupwise_device_list" aria-labelledby="heading_offline_group_@{{offline_groups.id}}" data-parent="#offline_group_@{{offline_groups.id}}">
                                                        <div class="">
                                                            <ul class="list-group">
                                                                <li ng-repeat="offline in offline_devices" class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                                    <span>
                                                                        <img src="@{{offline.list_device_icon}}" height="25">
                                                                        <a href="javascript:;" class="custom-link custom-link-text" ng-click="openMarkerByID(offline.imei)">@{{offline.device_name}}
                                                                            <span class="custom-data-span">@{{online.ststr}}</span></a>
                                                                    </span>
                                                                    <span>
                                                                        <a href="javascript:;" class="custom-link">@{{offline.speed}}
                                                                            kmh</a>
                                                                        <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                                        <a href="javascript:;" class="ml-2" data-toggle="dropdown">
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                                            <ul class="kt-nav custom-onclick-option">
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_details(offline.id)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/detail.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Details</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/playback')}}/@{{offline.imei}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/playback.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Playback</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="{{url('dashboard/report?report_type=quick&report_name=trip_report&imei=')}}@{{offline.imei}}_@{{offline.device_name}}" target="_blank" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Report</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="add_complain(offline.id, offline.device_name)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/report.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Complain</span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="kt-nav__item">
                                                                                    <a href="javascript:;" ng-click="device_command(offline)" class="kt-nav__link">
                                                                                        <img src="{{asset('assets/media/icons/command.png')}}" alt="">
                                                                                        <span class="kt-nav__link-text">Command</span>
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
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                                </div>
                                                <input type="text" ng-model="search_events" class="form-control kt-quick-search__input" placeholder="Search address">
                                                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                            </div>
                                        </form>
                                        <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                        </div>

                                        <div class="custom-buttons ml-1">
                                            <a href="javascript:;" class="custom-buttons-list" title="Reload" ng-click="reload_search_event()">
                                                <i class="fas fa-sync-alt mr-1 pl-2"></i>
                                            </a>
                                            <a href="javascript:;" class="custom-buttons-list" title="Delete all evens">
                                                <i class="fas fa-trash pr-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="group-heading mt-2">
                                        <ul class="list-group">
                                            <li class="list-group-item filter-list-group-item  d-flex justify-content-between  align-items-center">
                                                <a href="javascript:;" class="collaplse-arrow custom-link-color">Time <i class=" arrow-sign fas fa-caret-down ml-2"></i></a>
                                                <a href="javascript:;" class="custom-link-color">Object</a>
                                                <a href="javascript:;" class="custom-link-color">Event</a>
                                            </li>
                                        </ul>
                                        <div id="show_loader" class="col-sm-12 text-center d-none" style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                            <img src="{{asset('assets/images/loading.gif')}}" style="width:130px; height:auto;">
                                        </div>
                                        <table class="table table-hover table-striped">
                                            <tr ng-repeat=" e in my_event_list | filterBy: ['name','event_desc']: search_events" style="font-size: 11px;" ng-click="show_in_map(e)">
                                                <td>@{{e.dt_tracker}}</td>
                                                <td>@{{e.name}}</td>
                                                <td>@{{e.event_desc}}</td>
                                            </tr>
                                        </table>
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
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    </div>
                                                    <table class="table table-hover table-striped">
                                                        <tr ng-repeat=" g in my_geofence_list | filterBy: ['name']: search_geofence" style="font-size: 11px;" ng-click="go_to_geofence()">
                                                            <td>@{{$index++}}</td>
                                                            <td>@{{g.name}}</td>
                                                        </tr>
                                                    </table>
                                                    <div class="custom-buttons ml-1">
                                                        <a href="javascript:;" class="custom-buttons-list" title="Reload">
                                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Add matket">
                                                            <i class="fas fa-plus mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Groups">
                                                            <i class="fas fa-object-group mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Import">
                                                            <i class="fas fa-download mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Export">
                                                            <i class="fas fa-upload mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Delete all markets">
                                                            <i class="fas fa-trash pr-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="group-heading mt-2" id="headingOne">
                                                    <h5 class="demo-heading ">

                                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                        <a href="javascript:;" class="custom-card-title">
                                                            Name
                                                        </a>
                                                        <a href="javascript:;" id="collaplse-arrow" class="collaplse-arrow custom-link-color">
                                                            <i id="arrow-sign " class=" arrow-sign fas fa-caret-down"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="route" role="tabpanel">
                                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    </div>

                                                    <div class="custom-buttons ml-1">
                                                        <a href="javascript:;" class="custom-buttons-list" title="Reload">
                                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Add route">
                                                            <i class="fas fa-plus mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Groups">
                                                            <i class="fas fa-object-group mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Import">
                                                            <i class="fas fa-download mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Export">
                                                            <i class="fas fa-upload mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Delete all routes">
                                                            <i class="fas fa-trash pr-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="group-heading mt-2" id="headingOne">
                                                    <h5 class="demo-heading ">

                                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                        <a href="javascript:;" class="custom-card-title">
                                                            Name
                                                        </a>
                                                        <a href="javascript:;" id="collaplse-arrow" class="collaplse-arrow custom-link-color">
                                                            <i id="arrow-sign " class="arrow-sign  fas fa-caret-down"></i>
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="zone" role="tabpanel">
                                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    </div>

                                                    <div class="custom-buttons ml-1">
                                                        <a href="javascript:;" class="custom-buttons-list" title="Reload">
                                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Add zone">
                                                            <i class="fas fa-plus mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Groups">
                                                            <i class="fas fa-object-group mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Import">
                                                            <i class="fas fa-download mr-2"></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Export">
                                                            <i class="fas fa-upload mr-2 "></i>
                                                        </a>
                                                        <a href="javascript:;" class="custom-buttons-list" title="Delete all zones">
                                                            <i class="fas fa-trash pr-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="group-heading mt-2" id="headingOne">
                                                    <h5 class="demo-heading ">

                                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                                        <a href="javascript:;" class="custom-card-title">
                                                            Name
                                                        </a>
                                                        <a href="javascript:;" id="collaplse-arrow" class="custom-link-color">
                                                            <i id="arrow-sign " class=" arrow-sign fas fa-caret-down"></i>
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
                                                        <a href="javascript:;" class="custom-link-color">Show</a>
                                                        <a href="javascript:;" class="custom-link-color">Hide</a>
                                                        <a href="javascript:;" class="custom-link-color">Import</a>
                                                        <a href="javascript:;" class="custom-link-color">Export</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mt-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                                        <a href="javascript:;" class="custom-link-color">Time</a>
                                                        <a href="javascript:;" class="custom-link-color">Information</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- end:: Aside Menu -->

            </div>


            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper custom-kt-wrapper" id="kt_wrapper">

                @include('layouts.enduser.top-menu')
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
                                                <div id="show_map_loader" class="col-sm-12 text-center d-none" style="position: absolute;    left: 0%; align-items: center; justify-content: center; z-index: 999999;    height: calc(100vh - 51px);  width: 100%;  padding-top: 15%; background:rgba(255,255,255,0.8);">
                                                    <img src="{{asset('assets/images/loading.gif')}}" style="width:130px; height:auto;">
                                                </div>
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
                    <div id="show_small_loader" class="col-sm-12 text-center d-none" style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                        <img src="{{asset('assets/images/loading.gif')}}" style="width:115px; height:auto;">
                    </div>
                    <span class="sectionHide" title="Minimize"> <i class="fas fa-times"></i></span>
                    <div class="kt-section--first">
                        <div class="kt-section__body text-dark">
                            <ul class="nav nav-tabs custom-nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" id="data_info" href="#data" class="active nav-link">Data</a></li>
                                <!-- <li class="nav-item"><a data-toggle="tab" href="#graph" class="nav-link">Graph</a></li> -->
                                <li class="nav-item"><a data-toggle="tab" id="complain_function" ng-click="complain_data(selected_device.id)" href="#complain" class="nav-link">Complain</a>
                                </li>
                                <li class="nav-item"><a data-toggle="tab" id="vms_rel_function" ng-click="vms_rel_data(selected_device.id)" href="#vms_info" class="nav-link">VMS Info</a></li>
                                <li class="nav-item"><a data-toggle="tab" id="driver_function" ng-click="driver_rel_data(selected_device.id, selected_device.imei, selected_device.device_name)" href="#driver_info" class="nav-link">Driver Info</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="data" role="tabpanel">
                                    <div class="dataListSection">
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-safari"></i></span>
                                            <span class="dataItemName">IMEI</span>
                                            <span class="dataItemValue"> @{{selected_device.imei}} -
                                                @{{selected_device.model_name}} - <span class="badge" style="background-color: @{{selected_device.unit_status_color}} ; color:white;">
                                                    @{{selected_device.imei_status_name}} </span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-sim-card"></i></span>
                                            <span class="dataItemName">SIM Number</span>
                                            <span class="dataItemValue">@{{selected_device.sim_number}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Server</span>
                                            <span class="dataItemValue">@{{selected_device.server_name}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-acquisitions-incorporated"></i></span>
                                            <span class="dataItemName">Server Time</span>
                                            <span class="dataItemValue">@{{selected_device.dt_server}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Device Time</span>
                                            <span class="dataItemValue">@{{selected_device.dt_tracker}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-car"></i></span>
                                            <span class="dataItemName">@{{selected_device.device_name}} <span class="badge" style="background-color:@{{selected_device.unit_status_color}}; color:white;">@{{selected_device.unit_status_name}}</span></span>
                                            <!-- <span class="dataItemValue"><span class="badge" style="background-color:@{{selected_device.unit_status_color}}; color:white;">@{{selected_device.unit_status_name}}</span></span> -->
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Speed</span>
                                            <span class="dataItemValue">@{{selected_device.speed}} kmh</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Console Angle</span>
                                            <span class="dataItemValue">@{{selected_device.angle}}&deg;</span>
                                        </div>

                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Coordinate </span>
                                            <span class="dataItemValue"><a href="http://maps.google.com/maps?q=@{{selected_device.lat}},@{{selected_device.lng}}&amp;t=m" target="_blank">@{{selected_device.lat}}°, @{{selected_device.lng}}°</a>
                                            </span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Address </span>
                                            <span class="dataItemValue" id="myLocation"><button type="button" class="btn load_geo_address" data-lat="@{{selected_device.lat}}" data-lng="@{{selected_device.lng}}" style="padding:0">Show Address</button>
                                            </span>
                                        </div>

                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Battrey Voltage</span>
                                            <span class="dataItemValue">@{{selected_device.voltage}} V</span>
                                        </div>
                                        <div class="dataListItem" ng-repeat="s in selected_device.sensor_list" ng-if="s.is_data_list==1">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">@{{s.sensor_type_name}}</span>
                                            <span class="dataItemValue">@{{s.sensor_value}}
                                                @{{s.unit_of_measurement}}</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="graph" role="tabpanel">
                                    <div class="dataListSection">
                                    </div>
                                </div> -->
                                <div class="tab-pane" id="complain" role="tabpanel">
                                    <div class="ComplainDataSection">
                                        <div class="ComplainDataPart">
                                            <div class="d-flex justify-content-between align-items-center mx-3">
                                                <button type="button" class="custom_button_class" id="add_complain_button" ng-click="add_complain(selected_device.id, selected_device.device_name)"><i class="fas fa-bug mr-2"></i>Add</button>
                                                <span class=""><b>Complain Info</b> </span>
                                            </div>
                                            <table class="table  table-hover " id="complain_table">
                                                <thead>
                                                    <tr>
                                                        <th>Date & Time</th>
                                                        <th>Complain Token</th>
                                                        <th>Device</th>
                                                        <th>Complain Type</th>
                                                        <th>Complain Details</th>
                                                        <th>Status</th>
                                                        <th>Solved Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="load-complain-data">
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="vms_info" role="tabpanel">
                                    <div class="VmsDataSection">
                                        <div class="VmsDataPart">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="custom_button_class" id="add_fuel_button" ng-click="add_fuel(selected_device.id, selected_device.device_name)"><i class="fas fa-gas-pump mr-2"></i>Add</button>
                                                <span class="mr-2"><b>Fuel Refill Info</b> </span>
                                            </div>
                                            <table class="table  table-hover table-striped " id="fuel_table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Quantity</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_fuel_log">

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="VmsDataPart">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <button type="button" class="custom_button_class" id="add_expense_button" ng-click="add_expense(selected_device.id, selected_device.device_name)"><i class="fas fa-donate mr-2"></i>Add</button>
                                                <span class="mr-2"><b>Expense Info</b> </span>
                                            </div>

                                            <table class="table table-hover table-striped" id="expense_table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Expense Type</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_expense_data">

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="VmsDataPart">

                                            <div class="d-flex justify-content-end align-items-center">
                                                <!-- <button type="button" class="custom_button_class" id="add_paper_button" ng-click="add_paper_doc(selected_device.id, selected_device.device_name)"><i class="far fa-sticky-note mr-2"></i>Add</button> -->
                                                <div class="py-2"><b> Document Type</b> </div>
                                            </div>

                                            <table class="table table-hover table-striped" id="paper_doc_table">
                                                <thead>
                                                    <tr>
                                                        <th>Document Type</th>
                                                        <th>Expiry Date</th>
                                                        <th>Remaining</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="doc_type_data">

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="driver_info" role="tabpanel">

                                    <div class="DriverDataSection ">
                                        <span class="d-none text-danger ml-4" id="driver_not_found" style="min-height:145px"> Driver data
                                            not found! Please assign driver from VMS.</span>
                                        <div class="DriverDataPart d-none">
                                            <div class="driver_photo_section">
                                                <img class="custom-image" id="driver_img" src="{{asset('assets/media/users/100_3.jpg')}}" alt="Image">
                                                <a href="javascript:;" ng-click="go_driver_info()" class="driver-view btn btn-success btn-sm"> View details</a>
                                            </div>
                                            <div class="driver_contact_section">
                                                <ul class="list-group ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Driver ID
                                                        <span id="driver_id"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Name
                                                        <span id="driver_name"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Phone
                                                        <span id="driver_phone"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Emergency contact
                                                        <span id="emergency_contact"></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        Driving licence
                                                        <span id="driving_licence"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="DriverDataPart d-none">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="kt-portlet kt-portlet--height-fluid">
                                                        <div class="kt-widget14">

                                                            <div class="kt-widget14__content">
                                                                <div class="c100 p50 big">
                                                                    <span>50%</span>
                                                                    <div class="slice">
                                                                        <div class="bar"></div>
                                                                        <div class="fill"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-widget14__legends">
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                                        <span class="kt-widget14__stats">37% Harsh
                                                                            Break</span>
                                                                    </div>
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                                        <span class="kt-widget14__stats">47% Business
                                                                            Events</span>
                                                                    </div>
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                                        <span class="kt-widget14__stats">19%
                                                                            Others</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="kt-portlet kt-portlet--height-fluid">
                                                        <div class="kt-widget14 my-auto">

                                                            <div class="kt-widget14__content">

                                                                <div class="kt-widget14__legends">
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                                        <span class="kt-widget14__stats">37 Harsh
                                                                            Break</span>
                                                                    </div>
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-warning"></span>
                                                                        <span class="kt-widget14__stats">47 Business
                                                                            Events</span>
                                                                    </div>
                                                                    <div class="kt-widget14__legend">
                                                                        <span class="kt-widget14__bullet kt-bg-brand"></span>
                                                                        <span class="kt-widget14__stats">19
                                                                            Others</span>
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
                            </div>
                        </div>
                    </div>
                </div>
                <span class="sectionShow d-none" title="Maximize"> <i class="fas fa-expand-arrows-alt"></i></span>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="edit_device_modal" data-backdrop="static" data-keyboard="false">
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
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <ul class="nav nav-tabs">
                                    <!-- <li class="nav-item"><a data-toggle="tab" href="#edit_device_1" class="active nav-link">IMEI info</a></li>
                                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_2" class="nav-link">IMEI server config</a></li> -->
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_3" class="nav-link active">Device Info</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_4" class="nav-link">Sensor config</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_5" class="nav-link">Event config</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_6" class="nav-link">Overview status</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_7" class="nav-link">Parameter</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#edit_device_8" class="nav-link">Tu status log</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="edit_device_3" role="tabpanel">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-lg-2 col-form-label">Device Name</label>
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
                                                <label class="col-lg-2 col-form-label">Vehicle Plate No</label>
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
                                                <label class="col-lg-2 col-form-label">Opening Date</label>
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
                                                <label class="col-lg-2 col-form-label">User Block Date</label>
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
                                                <label class="col-lg-2 col-form-label">Fuel Consumption</label>
                                                <div class="col-lg-4 col-md-9 mb-4">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="fuel_consumption_value" placeholder="Enter fuel consumption value" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">L/100km</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label class="col-lg-2 col-form-label">Fuel Tank Volume</label>
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
                                                <label class="col-lg-2 col-form-label">Online Time</label>
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
                                                <label class="col-lg-2 col-form-label">Speeding Value</label>
                                                <div class="col-lg-4 col-md-9 mb-4">
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" name="edit_speeding_value" id="edit_speeding_value" placeholder="Enter speeding value" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                kmh
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_device_4" role="tabpanel">
                                        <div class="form-group row" ng-repeat="s in selected_device.sensor_list">
                                            <label class=" col-form-label col-lg-3 col-sm-12">@{{s.sensor_type_name}}</label>
                                            <div class="col-sm-9">
                                                @{{s.sensor_value}} @{{s.unit_of_measurement}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_device_5" role="tabpanel">
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Model</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="server_api_key" placeholder="Enter ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_device_6" role="tabpanel">
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">CRM to Platform
                                                Status</label>
                                            <div class="col-sm-9" id="crm_to_platform_status">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Server to Platform
                                                Status</label>
                                            <div class="col-sm-9" id="server_to_platform_status">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">TU and IMEI Status</label>
                                            <div class="col-sm-9" id="tu_to_imei_status">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Device Status</label>
                                            <div class="col-sm-9" id="device_status">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_device_7" role="tabpanel">
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Server</label>
                                            <div class="col-sm-9" id="altitude">
                                                @{{selected_device.server_name}}

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Angle</label>
                                            <div class="col-sm-9" id="angle">
                                                @{{selected_device.angle}}&deg;
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Latitude</label>
                                            <div class="col-sm-9" id="latitude">
                                                @{{selected_device.lat}}&deg;
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Longitude</label>
                                            <div class="col-sm-9" id="longitude">
                                                @{{selected_device.lng}}&deg;
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Parameters</label>
                                            <div class="col-sm-9" id="parameters">
                                                <textarea style="border:none" name="" id="" cols="90" rows="3" disabled="disabled">@{{selected_device.params}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Model</label>
                                            <div class="col-sm-9">
                                                @{{selected_device.model_name}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Speed</label>
                                            <div class="col-sm-9" id="speed">
                                                @{{selected_device.speed}} kmh
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Time (Devicce)</label>
                                            <div class="col-sm-9" id="time_position">
                                                @{{selected_device.dt_tracker}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Time (server)</label>
                                            <div class="col-sm-9" id="time_server">
                                                @{{selected_device.dt_server}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit_device_8" role="tabpanel">
                                        <div class="kt-portlet custom-kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
                                            <div class="kt-portlet__head custom-kt-portlet__head2 kt-portlet__head--lg">
                                                <div class="kt-portlet__head-label">
                                                    <span class="kt-portlet__head-icon">
                                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                                    </span>
                                                    <h3 class="kt-portlet__head-title">
                                                        IMEI Status Log
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body custom-kt-portlet__body mt-2">

                                                <!--begin: Datatable -->
                                                <table class="table table-striped- table-bordered table-hover table-checkable" id="single_tu_status_log_table">
                                                    <thead>
                                                        <!-- <th width="2%" data-orderable="false">
                                                            <label
                                                                class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" />
                                                                <span></span>
                                                            </label>
                                                        </th> -->
                                                        <th>SL</th>
                                                        <th>Device name</th>
                                                        <th>Previous Status</th>
                                                        <th>Previous Status Date</th>
                                                        <th>Current Status</th>
                                                        <th>Current Status Days</th>
                                                    </thead>
                                                </table>

                                                <!--end: Datatable -->
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


    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- Modal -->
    <div class="modal" id="fuelModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" style="width:45%">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Add Fuel Cost</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="saveFuelLogForm">
                    <div class="modal-body  text-dark">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Refill Date</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" name="refill_date" class="form-control datepicker" placeholder="DD/MM/YYYY" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                                <small id="refill_date-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="vehicle_name" disabled="disabled">
                                <input type="hidden" id="object_id" name="object_id">
                                <small id="vehicle_no-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Fuel Type</label>
                            <div class="col-lg-9">
                                <select name="fuel_type" class="form-control kt-select2-2">
                                    <option value="1">Octane</option>
                                    <option value="2" selected="selected">Diesel</option>
                                    <option value="3">Gas</option>
                                </select>
                                <small id="fuel_type-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_name" class="col-lg-3 col-form-label">Refill Unit</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="number" class="form-control calculatePrice" id="refill_unit" name="refill_unit">
                                    <div class="input-group-append">
                                        <div class="input-group-text">L </div>
                                    </div>
                                </div>
                                <small id="refill_unit-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-lg-3 col-form-label">Unit Price</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="number" class="form-control calculatePrice" id="unit_price" name="unit_price">
                                    <div class="input-group-append">
                                        <div class="input-group-text">BDT</div>
                                    </div>
                                </div>
                                <small id="unit_price-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-lg-3 col-form-label">Total Price</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="number" class="form-control totalPrice" id="total_price" name="total_price">
                                    <div class="input-group-append">
                                        <div class="input-group-text">BDT</div>
                                    </div>
                                </div>
                                <small id="total_price-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Fuel Station Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="station_name">
                                <small id="station_name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Receipt No</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="receipt_no">
                                <small id="receipt_no-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Note</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="note" rows="2"></textarea>
                                <small id="note-error" class="text-danger"></small>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="expenseModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" style="width:45%">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Add Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="saveExpenseLogForm">
                    <div class="modal-body  text-dark">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                            <div class="col-lg-9">

                                <input type="text" id="expense_vehicle_no" name="expense_vehicle_no" class="form-control" disabled="disabled">
                                <input type="hidden" id="expense_object_id" name="expense_object_id">
                                <small id="expense_vehicle_no-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Expense Type</label>
                            <div class="col-lg-9">
                                <select name="expense_type" class="form-control kt-select2-2" id="expense_type">
                                    <option value="1">Fuel</option>
                                    <option value="2">Maintenance and repairs</option>
                                    <option value="3">Insurance</option>
                                    <option value="4">License and Registration fees</option>
                                    <option value="5">Service labour costs</option>
                                    <option value="6">Replacement parts</option>
                                    <option value="7">Parking and tolls</option>
                                    <option value="8">Road Tax</option>
                                    <option value="9">Tyres</option>
                                    <option value="10">GPS expense</option>
                                    <option value="11">Battery expense</option>
                                    <option value="12">Miscellaneous expense</option>
                                </select>
                                <small id="expense_type-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mother_name" class="col-lg-3 col-form-label">Cost Value</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" class="form-control calculatePrice" id="cost_value" name="cost_value">
                                    <div class="input-group-append">
                                        <div class="input-group-text">BDT</div>
                                    </div>
                                </div>
                                <small id="cost_value-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Expense Date</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" name="expense_date" id="expense_date" class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                                <small id="expense_date-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Note</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="note" rows="2"></textarea>
                                <small id="note-error" class="text-danger"></small>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submitExpenseLog" class="btn btn-success btn-sm float-right">Save</button>
                        <!-- <button type="button" id="submitExpenseLog" class="btn btn-success btn-sm float-right" value="Save"> -->
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="complainModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Generate complain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="saveComplainForm">
                    <div class="modal-body  text-dark">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Generate Date</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <input type="text" id="generate_date" class="form-control" disabled="disabled" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label">Device Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="complain_device_name" disabled="disabled">
                                <input type="hidden" id="complain_object_id" name="device_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Problem Type</label>
                            <div class="col-lg-9">
                                <select name="problem_type" id="problem_type" class="form-control kt-select2-2">
                                    <option value="">Select</option>
                                    @foreach($complain_types as $ct)
                                    <option value="{{$ct->id}}">{{$ct->t_name}}</option>
                                    @endforeach
                                </select>
                                <small id="problem_type-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Problem Details</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="complain_details" id="complain_details" rows="3"></textarea>
                                <small id="complain_details-error" class="text-danger"></small>
                            </div>
                        </div>

                        <!-- Form content end -->
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                        <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="commandModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" style="width:45%">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Command</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body  text-dark">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <ul class="nav nav-tabs position-relative">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">Send command</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tab-eg11-1" class="nav-link">Command history</a>
                                    </li>
                                    <a href="javascript:;" class="schedule-command">Schedule for command</a>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="list-group" id="list-tab" role="tablist" style="height: 60vh; overflow: auto;">

                                                    <a ng-repeat="c in my_command_list" class="list-group-item list-group-item-action" data-toggle="list" href="javascript:;" ng-click="click_push_command(c)" role="tab" aria-controls="home">@{{c.command_name}}</a>

                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel">
                                                        <div class="form-group row">
                                                            <label class="col-12 col-form-label">
                                                                <span class="custom-span-color"> >>
                                                                    <span id="command_name_label"></span>
                                                                </span>
                                                            </label>
                                                        </div>

                                                        <form action="saveCommandForm">
                                                            <div class="form-group row">
                                                                <label class="col-3 col-form-label">Device Name</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" id="selected_device_name" disabled="disabled">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-3 col-form-label">Command</label>
                                                                <div class="col-8">
                                                                    <input type="text" class="form-control" id="selected_command_name" disabled="disabled" style="color: #ccc;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row d-none" id="command_password">
                                                                <label class="col-3 col-form-label">Password</label>
                                                                <div class="col-8">
                                                                    <input type="password" class="form-control" id="command_confirm_pass" placeholder="Please insert your password">
                                                                </div>
                                                                <input type="hidden" id="device_model_id">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-3 col-form-label"></label>
                                                                <div class="col-8">
                                                                    <button type="submit" id="sendCommand" class="btn btn-custom btn-sm"> Send</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="tab-eg11-1" role="tabpanel">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="responseModal">
        <div class="modal-dialog modal-dialog-centered" style="z-index:999999">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Command Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="response">Response will be shown here</span>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var app = angular.module('monitorApp', ['angular.filter']);
        app.controller('monitorCtrl', function($scope, $http, $window, $interval, $timeout) {
            angular.element(document).ready(function() {
                $scope.selected_user_details = {};
                $scope.selected_user_details.id = @php echo $session_data['id'] @endphp;
                window.polylinePoints = [];
                window.map_type = "ROADMAP";
                window.ggl;
                $scope.selected_device;
                var myData = [];
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{URL::to('/dealer/showTree')}}/" + @php echo $customer_id;@endphp,
                    success: function(response) {

                        var first_node = {
                            'id': "@php echo $session_data['id'] @endphp",
                            'text': '{!! $parent_string !!}',
                            'icon': 'fa fa-users',
                            'state': {
                                opened: false
                            },
                            'only_name': "@php echo $session_data['name'] @endphp",
                            'item_details': @php echo json_encode($session_data);@endphp,
                            'children': response
                        };
                        myData.push(first_node);
                        //console.log(myData);
                        $('#dealer_treeview').jstree({
                            'plugins': ['state', 'dnd', 'contextmenu', "themes",
                                "json_data", "ui", "types", "search", "sort"
                            ],
                            'core': {
                                'data': myData,
                                'force_text': false
                            }
                        }).on('create_node.jstree', function(e, data) {
                            //console.log(data);
                        }).on('select_node.jstree', function(e, data) {
                            load_spinner('show','device_list_loader','');
                            $scope.selected_user_details = data.node.original
                                .item_details;
                            console.log($scope.selected_user_details);
                            user_information($scope.selected_user_details.id);
                        });

                    },
                    error: function(reject) {
                        errorMsg();
                    }
                });

                load_map();

                $scope.reload_search = function() {
                    $scope.search_device = '';
                };
                $scope.reload_search_event = function() {
                    $scope.search_events = '';
                };

                $(".leaflet-control-zoom-min").click(function() {
                    $('.sectionHide').trigger('click');
                });

                /* $("#showPlayback").click(function() {
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('dashboard/showplayback') }}",
                        data: {
                            'device_id': '355710099981933',
                            'start_date': '2020-08-20 19:00:00',
                            'end_date': '2020-08-20 23:00:00',
                            _token: "{{ csrf_token() }}",
                            _method: "POST"
                        },
                        success: function(response) {
                            L.Routing.control({
                                waypoints: [
                                    L.latLng(response.start_lat, response
                                        .start_lng),
                                    L.latLng(response.end_lat, response
                                        .end_lng)
                                ]
                            }).addTo(map);
                            // console.log(response);

                        },
                        error: function(reject) {
                            errorMsg();

                        }
                    });
                });
 */
                //user_information(@php echo $customer_id; @endphp);
                var main_search_options = {
                    data: @php echo $searchTree @endphp,
                    getValue: function(element) {
                        return element.name;
                    },
                    list: {
                        match: {
                            enabled: true
                        },
                        onSelectItemEvent: function() {
                            var selectedItemValue = $("#dealer_search").getSelectedItemData().id;
                            document.getElementById(selectedItemValue + "_anchor").scrollIntoView()
                            $("#dealer_treeview").jstree().deselect_all(true);
                            $("#dealer_treeview").jstree("select_node", "#" + selectedItemValue);
                            $("#dealer_treeview").jstree(true)._open_to(selectedItemValue).focus();
                            $scope.selected_user_details.id = selectedItemValue;
                            user_information($scope.selected_user_details.id);
                        },
                        onHideListEvent: function() {

                        }
                    }
                };

                $("#dealer_search").easyAutocomplete(main_search_options);
            });

            $scope.online_devices = [];
            $scope.offline_devices = [];
            $scope.all_devices = [];
            var icon_url = "{{asset('assets/images')}}/";
            var playback_url = "{{url('dashboard/playback')}}/";
            var report_url = "{{url('dashboard/report?report_type=quick&report_name=trip_report&imei=')}}";
            var geofence_url = "{{url('dashboard/geofence')}}/";
            var playback_icon = "{{asset('assets/media/icons/playback.png')}}/";
            var track_icon = "{{asset('assets/media/icons/track.png')}}/";
            var command_icon = "{{asset('assets/media/icons/command.png')}}/";
            var detail_icon = "{{asset('assets/media/icons/detail.png')}}/";
            var geo_icon = "{{asset('assets/media/icons/geo.png')}}/";
            var report_icon = "{{asset('assets/media/icons/report.png')}}/";
            var green_wifi_icon = icon_url + "wifi_green.png";
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
                $http.get("{{url('dealer/devices')}}/" + user_id).then(function(response) {
                    $scope.all_devices = [];
                    for (var i = 0; i < response.data.length; i++) {
                        let list_car_icon = icon_url + "list_car_blue.png";
                        let device_icon = icon_url + "device_blue.png";
                        if (response.data[i].speed > 0) {
                            list_car_icon = icon_url + "list_car_green.png";
                            device_icon = icon_url + "device_green.png";
                            response.data[i].wifi_icon = green_wifi_icon;
                        }

                        response.data[i].list_device_icon = list_car_icon;
                        response.data[i].device_icon = device_icon;

                        $scope.all_devices.push(response.data[i]);

                    } //end of loop of all devices
                    load_markers($scope.all_devices);
                });
            }

            $scope.openMarkerByID = function(id) {
                eventGroup.clearLayers();
                $('#show_small_loader').removeClass('d-none');
                markers[id].openPopup();
                var pos = markers[id].getLatLng();
                map.setView(pos, 14, {
                    animate: true,
                    duration: 0.7
                });

                $('.sectionShow').trigger('click');
                for (var i = 0; i < $scope.all_devices.length; i++) {
                    if ($scope.all_devices[i].imei == id) {
                        $scope.selected_device = $scope.all_devices[i];
                        console.log($scope.selected_device);
                        $('#show_small_loader').addClass('d-none');
                        break;

                    }
                }
                $('#data_info').click();
                $('.DriverDataPart').addClass('d-none');
                $('#driver_not_found').addClass('d-none');
                $('#myLocation').html('<button type="button" class="btn load_geo_address" data-lat="' + $scope.selected_device.lat + '" data-lng="' + $scope.selected_device.lng + '" style="padding:0">Show Address</button>')
            }
            var markerArray = [];
            var group;

            function load_map() {
                load_spinner('show', 'show_map_loader', '');
                window.map = new L.Map('kt_chart_latest_trends_map', {
                    center: [23.8315, 91.2868],
                    zoom: 7,
                    minZoom: 6,
                    maxZoom: 18,
                    markerZoomAnimation: true,
                    zoomControl: false
                });

                ggl = new L.Google(map_type); // Possible types: SATELLITE, ROADMAP, HYBRID, TERRAIN
                var ggl_sat = new L.Google('SATELLITE');
                var ggl_road = new L.Google('ROADMAP');
                var ggl_hybrid = new L.Google('HYBRID');
                var ggl_terrain = new L.Google('TERRAIN');

                var url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    attr =
                    'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
                    otm = new L.TileLayer(url, {
                        attribution: attr,
                        /*subdomains:"1234"*/
                    });

                var BING_KEY = 'AuhiCJHlGzhg93IqUH_oCpl_-ZUrIE6SPftlyGYUvr9Amx5nzA-WqGcPquyFZl4L';
                var bing_map = L.tileLayer.bing(BING_KEY);
                var baseLayers = {
                    "Google Road Map": ggl,
                    "Google Hybrid": ggl_hybrid,
                    "Google Satelite": ggl_sat,
                    "Google Terrain": ggl_terrain,
                    "OSM Map": otm,
                    "bing map": bing_map
                };

                window.layersControl = L.control.layers(baseLayers, null, {
                    collapsed: false
                });

                layersControl.addTo(map);
                //zoomControl.addTo(map);
                map.addControl(new L.Control.ZoomMin());
                //map_changing_button.addTo(map);
                map.addLayer(ggl);

                window.deviceGroup = L.layerGroup(); //L.markerClusterGroup(); // L.layerGroup();
                window.eventGroup = L.layerGroup(); //L.markerClusterGroup(); // L.layerGroup();
                map.addLayer(deviceGroup);
                map.addLayer(eventGroup);
                L.control.custom({
                        position: 'topleft',
                        content: '<a href="javascript:;" class="btn btn-default leaflet_button"  onClick="toggleMarkers()">' +
                            '<i class="fa fa-paper-plane"></i>' +
                            '</a>' +
                            '<button type="button" class="btn btn-default leaflet_button" onClick="toggleLabel()">' +
                            '    <i class="fa fa-font"></i>' +
                            '</button>' +
                            '<button type="button" class="btn btn-default leaflet_button" id="toggleTraffic">' +
                            '    <i class="fa fa-traffic-light"></i>' +
                            '</button>' +
                            '<button type="button" class="btn btn-default leaflet_button">' +
                            '    <i class="fa fa-times"></i>' +
                            '</button>' +
                            '<button type="button" class="btn btn-default leaflet_button" onClick="reload_map()">' +
                            '    <i class="fa fa-check"></i>' +
                            '</button>' +
                            '<button type="button" class="btn btn-default leaflet_button">' +
                            '    <i class="fa fa-exclamation-triangle" id="showPlayback"></i>' +
                            '</button>',
                        classes: 'btn-group-vertical btn-group-sm custom-map-button',
                        style: {
                            margin: '12px',
                            padding: '0px 0 0 0',
                            cursor: 'pointer'
                        },
                        datas: {
                            'foo': 'bar',
                        }
                    })
                    .addTo(map);
            }

            var polyline;
            window.markers = [];
            window.allMarkers = [];
            var allPositions = [];
            var customicon;

            function load_markers(devices = null) {
                deviceGroup.clearLayers();
                if (devices.length > 0) {
                    //var bounds = L.latLngBounds();
                    var pointList;
                    for (var x = 0; x < devices.length; x++) {
                        var mystatus = '';
                        let infoWindow_content = '';
                        let sensList = "";
                        for (var s = 0; s < devices[x].sensor_list.length; s++) {
                            if (devices[x].sensor_list[s].is_popup == 1) {
                                let unit_name = (devices[x].sensor_list[s].unit_of_measurement != null) ? devices[x]
                                    .sensor_list[s].unit_of_measurement : '';
                                let my_value = (devices[x].sensor_list[s].sensor_value != undefined) ? devices[x]
                                    .sensor_list[s].sensor_value : 'N/A';
                                sensList += '<li class="custom_li">' + devices[x].sensor_list[s].sensor_type_name +
                                    ': ' + my_value + ' ' + unit_name + '</li>';
                            }
                        }
                        infoWindow_content = "<h5 class='popover-header text-center'><strong>" + devices[x]
                            .device_name + "</strong> - " + devices[x].ststr +
                            " - <span class='badge ' style='background-color:" + devices[x].unit_status_color +
                            "; color:white;'>" + devices[x].unit_status_name +
                            "</span></h5><ul class='custom_ul'>" +
                            "<li class='custom_li'>Status: " + devices[x].ststr + " </li>" +
                            sensList +
                            "</ul>" +
                            "<div class='icon-list'>" +
                            '<ul class="list-group popup-list-group">' +
                            '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                            '<a href="' + playback_url + devices[x].imei +
                            '" target="_blank"><img class="icon-img playback_image" title="Playback" src="' +
                            playback_icon + '"/> </a>' +
                            '<img class="icon-img" title="Track" src="' + track_icon + '"/> ' +
                            '<img class=icon-img title=Command onClick="open_command_modal(' + devices[x].id + ',' +
                            devices[x].device_model + ', \'' + devices[x].device_name + '\'' + ')" src=' +
                            command_icon + '/>' +
                            '<img class="icon-img" title="Detail" onClick="edit_device(' + devices[x].id +
                            ')" src="' + detail_icon + '"/> ' +
                            '<a href="' + geofence_url +
                            '" target="_blank"><img class="icon-img" title="Geofence" src="' +
                            geo_icon + '"/> </a>' +
                            '<a href="http://maps.google.com/maps?q=' + devices[x].lat + ',' + devices[x].lng + '&amp;t=m' + '" target="_blank" title="Street view"><i class="fa fa-street-view" style="font-size:17px; color:#FF9951;"> </i> </a>' +
                            '<a href="' + report_url + devices[x].imei + '_' + devices[x].device_name +
                            '" target="_blank"><img class="icon-img" title="Report" src="' + report_icon + '"/> </a>' +
                            '</li>' +
                            '</ul>' +

                            "</div>";

                        customicon = L.icon({
                            iconUrl: devices[x].device_icon,
                            iconSize: [38, 38],
                            iconAnchor: [20, 20],
                            popupAnchor: [-2, -25]
                        });

                        if (polylinePoints[devices[x].imei] != undefined) {
                            polylinePoints[devices[x].imei].push(
                                [JSON.parse(devices[x].lat), JSON.parse(devices[x].lng)]
                            );
                        } else {
                            polylinePoints[devices[x].imei] = [
                                [JSON.parse(devices[x].lat), JSON.parse(devices[x].lng)]
                            ];
                        }

                        var theMarker = L.marker([devices[x].lat, devices[x].lng], {
                            icon: customicon,
                            rotationAngle: devices[x].angle,
                            //iconAngle: parseInt(devices[x].angle),
                            className: 'class_' + devices[x].imei,
                            //rotationOrigin: 'center center',
                            imei: devices[x].imei
                        }).on('click', markerOnClick).addTo(map).bindPopup(infoWindow_content, {
                            autoPan: true,
                            //autoClose: false,
                            closeOnClick: false,
                        });

                        markers[devices[x].imei] = theMarker;
                        theMarker.bindTooltip(devices[x].device_name, {
                            permanent: true,
                            direction: 'right',
                            className: 'leaflet_label_class d-none',
                            opacity: 0.8,
                            offset: [10, 0]
                        });

                        deviceGroup.addLayer(theMarker);
                    }

                    position_markers(1);

                } else {
                    load_spinner('hide', 'show_map_loader', '');
                }
                load_spinner('hide','device_list_loader','');
            }

            function position_markers(type = null) {
                $http.get("{{url('dealer/devices')}}/" + $scope.selected_user_details.id).then(function(response) {
                    $scope.all_devices = [];
                    $scope.online_devices = [];
                    $scope.offline_devices = [];
                    for (var i = 0; i < response.data.length; i++) {
                        let list_car_icon = icon_url + "list_car_blue.png";
                        let device_icon = icon_url + "device_blue.png";
                        if (response.data[i].speed > 0) {
                            list_car_icon = icon_url + "list_car_green.png";
                            device_icon = icon_url + "device_green.png";
                        }
                        response.data[i].list_device_icon = list_car_icon;
                        response.data[i].device_icon = device_icon;
                        response.data[i].wifi_icon = green_wifi_icon;

                        if (response.data[i].device_status == 1) {
                            $scope.online_devices.push(response.data[i]);
                        } else {
                            $scope.offline_devices.push(response.data[i]);
                        }

                        $scope.all_devices.push(response.data[i]);

                        var newLatLng = new L.LatLng(response.data[i].lat, response.data[i].lng);
                        markers[response.data[i].imei].setLatLng(newLatLng);
                        markers[response.data[i].imei].setRotationAngle(response.data[i].angle);


                        if (polylinePoints[response.data[i].imei] != undefined) {
                            polylinePoints[response.data[i].imei].push(
                                [JSON.parse(response.data[i].lat), JSON.parse(response.data[i].lng)]
                            );
                        } else {
                            polylinePoints[response.data[i].imei] = [
                                [JSON.parse(response.data[i].lat), JSON.parse(response.data[i].lng)]
                            ];
                        }

                        markerArray.push(L.marker([response.data[i].lat, response.data[i].lng]));

                        if ($scope.selected_device != undefined && $scope.selected_device.imei ==
                            response.data[i].imei) {
                            $scope.selected_device = response.data[i];
                        }
                        L.polyline(polylinePoints[response.data[i].imei], {
                            color: 'green',
                            smoothFactor: 0,
                            weight: 3
                        }).addTo(map);
                        //console.log('total polyline array: '+polylinePoints[response.data[i].imei].length);
                        if (polylinePoints[response.data[i].imei].length == 20) {
                            //polylinePoints[response.data[i].imei] = [];
                            polylinePoints[response.data[i].imei].splice(0, 10);
                        }

                        if (i == (response.data.length - 1)) {
                            if (type == 1) {
                                load_spinner('hide', 'show_map_loader', '');
                            }
                            group = L.featureGroup(markerArray);
                            $timeout(position_markers, 5000);
                        }

                    } //end of loop of all devices

                    /* var devices = $scope.all_devices;
                    if (devices.length > 0) {
                        //var bounds = L.latLngBounds();
                        var pointList;
                        for (var x = 0; x < devices.length; x++) {

                            // markers[devices[x].imei].options.iconAngle = devices[x].angle;

                        }

                        //map.fitBounds(polylinePoints);

                    } */


                });

                map.getBounds();
            }


            $scope.vms_rel_data = function(id) {
                fuel_rel_data(id);
                expense_rel_data(id);
                doc_rel_data(id);
            }

            $scope.driver_rel_data = function(id, imei, device_name) {
                driver_data(id);
                driving_behaviour(imei, device_name);
            }

            $scope.show_in_map = function(item) {
                eventGroup.clearLayers();
                var event_content = "<h5 class='popover-header text-center'>" + item.event_desc + "</h5>";
                event_content += '<table class="table-hover table-striped" style="width:100%;">';
                //event_content+= '<tr><td>Event: </td><td>'+item.event_desc+'</td></tr>';
                event_content += '<tr><td>Time: </td><td>' + item.dt_tracker + '</td></tr>';
                event_content += '<tr><td>Name: </td><td>' + item.name + '</td></tr>';
                event_content += '<tr><td>Location: </td><td>' + item.lat + ', ' + item.lng + '</td></tr>';
                event_content += '<tr><td>Angle : </td><td>' + item.angle + '°' + '</td></tr>';
                event_content += '<tr><td>Speed : </td><td>' + item.speed + '</td></tr>';
                event_content += '</table>';
                map.setView({
                    lat: item.lat,
                    lng: item.lng
                }, 14, {
                    animate: true,
                    duration: 0.7
                });

                var event_icon = L.icon({
                    iconUrl: "{{asset('assets/images/event_icon.png')}}",
                    iconSize: [38, 38],
                    iconAnchor: [20, 20],
                    popupAnchor: [-2, -25]
                });

                var myEvent = L.marker([item.lat, item.lng], {
                    icon: event_icon
                }).addTo(map).bindPopup(event_content, {
                    autoPan: true,
                    closeOnClick: false,
                }).openPopup();
                eventGroup.addLayer(myEvent);
            }

            $scope.go_driver_info = function() {
                var id = 1; // $("#driv").val();
                var driverLink = encodeURIComponent(
                    "{{url('/dashboard/dashboard?type=vehicle_driver&page=driver&driver_id=')}}" + id);
                window.open(encodeURIComponent(driverLink), '_blank');
            }

            $scope.complain_data = function(id) {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "{{url('dashboard/getComplainData')}}/" + id,
                    success: function(response) {
                        $('#load-complain-data').html(response);

                    },
                });
            }

            $scope.add_fuel = function(id, name) {
                $('#vehicle_name').val(name);
                $('#object_id').val(id);
                $('#fuelModal').modal('show');
            }

            $scope.add_expense = function(id, name) {
                $('#expense_vehicle_no').val(name);
                $('#expense_object_id').val(id);
                var current_date = moment().format('D MMM YYYY');
                $('#expense_date').val(current_date);
                $('#expenseModal').modal('show');
            }

            $scope.add_complain = function(id, name) {
                $('#complain_device_name').val(name);
                $('#complain_object_id').val(id);
                $('#complainModal').modal('show');
            }

            function fuel_rel_data(id) {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "{{url('dashboard/getFuelLogData')}}/" + id,
                    success: function(response) {
                        if (response == 0) {
                            $('#add_fuel_button').attr('disabled', true);
                            $('#add_fuel_button').attr('title', 'Button disable for this device');
                            $('#load_fuel_log').html(
                                '<span class="text-danger m-3">No data found! Please assign this device in VMS.</span>'
                            );
                        } else {
                            $('#load_fuel_log').html(response);
                            $('#add_fuel_button').attr('disabled', false);
                            $('#add_fuel_button').attr('title', '');
                        }

                    },
                });
            }

            function driver_data(id) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{url('dealer/getDriverDataByImie')}}/" + id,
                    success: function(response) {
                        console.log(response);
                        if (response == 0) {
                            $('.DriverDataPart').addClass('d-none');
                            $('#driver_not_found').removeClass('d-none');
                        } else {
                            $('.DriverDataPart').removeClass('d-none');
                            $('#driver_not_found').addClass('d-none');
                            var symble = "&";
                            var imgLink = "{{asset('uploads/driver')}}/"
                            var driverLink =
                                "{{url('/dashboard/dashboard?type=vehicle_driver&page=driver&driver_id=')}}"
                            $('#driver_img').attr('src', imgLink + response.driver_image);
                            // $('.driver-view').attr('href', decodeURIComponent(driverLink+response.id));
                            $('#driver_id').html(response.driver_id);
                            $('#driver_name').html(response.driver_name);
                            $('#driver_phone').html(response.phone);
                            $('#emergency_contact').html(response.contact_one);
                            $('#driving_licence').html(response.driving_licence);
                        }
                    },
                });
            }

            function driving_behaviour(imei, device_name) {
                console.log(imei + '_' + device_name);
                var imei_and_name = imei + '_' + device_name;
                // data_type = "json";
                // ajax_url = "{{ url('dashboard/getDrivingBehaviourByImie') }}";
                // post_data = {
                //     'device_list': imei_and_name,
                //     _token: "{{ csrf_token() }}",
                //     _method: "POST"
                // };
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{url('dealer/showreport/drivingbehaviour/2')}}/"+$scope.selected_user_details.id,
                    data: {
                        device_list: imei_and_name,
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        console.log(response);

                    },
                });
            }

            function expense_rel_data(id) {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "{{url('dashboard/getExpenseLogData')}}/" + id,
                    success: function(response) {
                        if (response == 0) {
                            $('#add_expense_button').attr('disabled', true);
                            $('#add_expense_button').attr('title', 'Button disable for this device');
                            $('#load_expense_data').html(
                                '<span class="text-danger m-3">No data found! Please assign this device in VMS.</span>'
                            );
                        } else {
                            $('#load_expense_data').html(response);
                            $('#add_expense_button').attr('disabled', false);
                            $('#add_expense_button').attr('title', '');
                        }

                    },
                });
            }

            function doc_rel_data(id) {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "{{url('dashboard/getDocTypeData')}}/" + id,
                    success: function(response) {
                        if (response == 0) {
                            // $('#add_expense_button').attr('disabled', true);
                            // $('#add_expense_button').attr('title', 'Button disable for this device');
                            $('#load_expense_data').html(
                                '<span class="text-danger m-3">No data found! Please assign this device in VMS.</span>'
                            );
                        } else {
                            $('#doc_type_data').html(response);
                            // $('#add_expense_button').attr('disabled', false);
                            // $('#add_expense_button').attr('title', '');
                        }

                    },
                });
            }
            var realtime_call = function() {
                position_markers();
            }

            //$interval(realtime_call, 5000);
            function load_last_event() {
                $http.get("{{url('dealer/lastEvent')}}/"+$scope.selected_user_details.id).then(function(response) {
                    var eventList = response.data;
                    for (var i = 0; i < response.data.length; i++) {
                        eventMsg('<a href="#" ng-click="show_in_map(' + response.data[i] + ')">' + response.data[i].name + ' ' + response.data[i].event_desc + '</a>');
                    }
                });
            }
            $interval(load_last_event, 60000);

            function change_mapType(type) {
                map_type = type;
                ggl = new L.Google(map_type);
                console.log('map: ' + ggl);
            }

            function markerOnClick(e) {
                $('.sectionShow').trigger('click');
                map.setView(e.latlng, 14, {
                    animate: true,
                    duration: 0.7
                });
                console.log(e.latlng);
                for (var i = 0; i < $scope.all_devices.length; i++) {
                    if ($scope.all_devices[i].imei == this.options.imei) {
                        $scope.selected_device = $scope.all_devices[i];
                        console.log($scope.selected_device);
                        break;
                    }
                }
            }

            $scope.remove_node_selection = function() {
                $("#dealer_treeview").jstree().deselect_all(true);
                //$scope.selected_user_details.id = @php echo $customer_id;@endphp;
                user_information(@php echo $customer_id; @endphp);
                console.log('all selection removed');
            }

            $scope.device_details = function(id) {
                edit_device(id);

            }
            $scope.device_command = function(d) {
                d.device_name = (d.device_name == null) ? '' : d.device_name;
                $scope.show_command_modal(d.id, d.device_model, d.device_name);
            }

            $scope.show_command_modal = function(id, model_id, device_name = null) {
                $("#selected_device_name").val(device_name);
                $("#device_model_id").val(model_id);
                $scope.my_command_list = [];

                $http.get("{{url('devicecommand')}}/" + model_id).then(function(res) {
                    $scope.my_command_list = res.data;
                    $('#list-tab a').first().click();
                    $('#commandModal').modal('show');
                });
            }

            $scope.click_push_command = function(cmd) {
                if (cmd.command_name == 'Reset') {
                    $("#command_password").removeClass('d-none');
                    $("#command_password").addClass('show');
                } else {
                    $("#command_password").removeClass('show');
                    $("#command_password").addClass('d-none');
                }
                $("#command_name_label").text(cmd.command_name);
                $("#selected_command_name").val(cmd.command_text);

            }

            $scope.show_event_list = function() {
                load_spinner('show', 'show_loader', '');
                $http.get("{{url('dealer/getEventList')}}/" + $scope.selected_user_details.id).then(function(response) {
                    $scope.my_event_list = response.data;
                    load_spinner('hide', 'show_loader', '');
                });
            }
            $scope.show_geofence_list = function() {
                load_spinner('show', 'show_loader', '');
                $http.get("{{url('dealer/getGeofenceList')}}/" + $scope.selected_user_details.id).then(function(response) {
                    $scope.my_geofence_list = response.data;
                    load_spinner('hide', 'show_loader', '');
                });
            }

            $scope.go_to_geofence = function() {
                //window.location.href="{{url('dashboard/geofence')}}";
                window.open("{{url('dealer/geofence')}}", '_blank');
            }

            $("body").on('click', '.load_geo_address', function() {
                var address_div = $(this).parent();
                address_div.html('Loading...');
                $.get("{{url('dealer/findAddress')}}/" + $(this).data('lat') + "/" + $(this).data('lng'))
                    .done(function(res) {
                        address_div.html(JSON.parse(res));
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        address_div.html('na');
                    });
            });
        });

        $('#sendCommand').click(function(e) {
            e.preventDefault();
            $('#responseModal').modal('show');
        });

        function toggleLabel() {
            $(".leaflet_label_class").toggleClass('d-none');
        }

        function reload_map() {
            setTimeout(function() {
                map.setView([23.8103, 90.4125]);
            }, 2000);
        }

        function toggleMarkers() {
            if (map.hasLayer(deviceGroup)) {
                map.removeLayer(deviceGroup);
            } else {
                map.addLayer(deviceGroup);
            }
        }

        function edit_device(id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ url('dashboard/getImei') }}/" + id,
                success: function(response) {
                    tu_status_log_datatable(id);
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
                    $("#edit_speeding_value").val(response.speeding_value);
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

        function open_command_modal(id, model_id, device_name = null) {
            angular.element(document.getElementById('monitor_body')).scope().show_command_modal(id, model_id, device_name);
        }

        function push_command(id, command_name) {
            if (command_name == 'Reset') {
                $("#command_password").removeClass('d-none');
                $("#command_password").addClass('show');
            } else {
                $("#command_password").removeClass('show');
                $("#command_password").addClass('d-none');
            }
            $("#command_name_label").text(command_name);
            var model_id = $("#device_model_id").val();
            var modelwise_command_list = @php echo $modelwise_command;
            @endphp;
            for (var i = 0; i < modelwise_command_list.length; i++) {
                if (modelwise_command_list[i].model_id == model_id && modelwise_command_list[i].command_id == id) {
                    $("#selected_command_name").val(modelwise_command_list[i].command_text);
                    break;
                }
            }
        }

        function tu_status_log_datatable(id) {
            var table = $('#single_tu_status_log_table').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url: "{{ url('dashboard/single_tu_status_log') }}/" + id,
                    data: function(d) {
                        d._token = '{!! csrf_token() !!}';
                    }
                },
                columns: [
                    // {
                    //     data: 'checkDevice',
                    //     name: 'checkDevice',
                    //     className: 'text-center',
                    //     orderable: false,
                    //     searchable: false
                    // },
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center'
                    },
                    {
                        data: 'device_name',
                        name: 'device_name'
                    },
                    {
                        data: 'previous_status',
                        name: 'previous_status',
                        className: 'text-center'
                    },
                    {
                        data: 'previous_status_date',
                        name: 'previous_status_date',
                        className: 'text-center'
                    },
                    {
                        data: 'current_status',
                        name: 'current_status',
                        className: 'text-center'
                    },
                    {
                        data: 'last_update',
                        name: 'last_update',
                        className: 'text-center'
                    },
                ],

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
            table.buttons().container().appendTo('#single_tu_status_log_table_length');
        }


        function save_imei() {
            console.log("save imei click");
            var updated_id = $("#edit_device_id").val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/saveImei') }}",
                data: {
                    'id': updated_id,
                    'device_name': $("#edit_device_name").val(),
                    'plate_number': $("#edit_plate_no").val(),
                    'sim_number': $("#edit_sim_number").val(),
                    'speeding_value': $("#edit_speeding_value").val(),
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                },
                success: function(response) {
                    if (response == 1) {
                        successMsg('IMEI deleted successfully.');
                        $("#edit_device_modal").modal('hide');
                        //load_device($("#dealer_id").val());
                    } else {
                        errorMsg();
                    }

                },
                error: function(reject) {
                    errorMsg();

                }
            });
        }

        function load_spinner(type, hide_element, show_element) {
            //console.log('spinner is calling');
            if (type == 'hide') {
                $("#" + hide_element).removeClass('show');
                $("#" + hide_element).addClass('d-none');
                //$("#" + show_element).removeClass('d-none');
                //$("#" + show_element).addClass('show');
                console.log('spinner off');
            }
            if (type == 'show') {
                console.log('spinner on');
                // $("#" + show_element).removeClass('show');
                // $("#" + show_element).addClass('d-none');
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
        $(".panel-top").resizable({
            handleSelector: ".splitter-horizontal",
            resizeWidth: false
        });

        $(document).ready(function(e) {

            $('.datetimepicker').datetimepicker({
                todayHighlight: true,
                autoclose: true,
                pickerPosition: 'bottom-left',
                todayBtn: true,
                showMeridian: true,
                format: 'dd M yyyy  HH:ii p'
            });

            $('.datepicker').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                autoclose: true,
                format: 'dd M yyyy'
            });

            $(".collaplse-arrow").each(function(index) {
                $(this).on('click', function(e) {
                    if ($(this).children().hasClass('fa-caret-down')) {
                        $(this).children().removeClass('fa-caret-down')
                        $(this).children().addClass('fa-caret-up')
                    } else {
                        $(this).children().removeClass('fa-caret-up')
                        $(this).children().addClass('fa-caret-down')
                    }
                });
            });

            $(".custom-card-title").each(function(index) {
                $(this).on('click', function(e) {
                    $(this).next('.collaplse-arrow').click();
                });
            });
        });

        $('.sectionHide').click(function(e) {
            e.preventDefault();
            $('.toggleSection').css('display', 'none');
            $('.sectionShow').removeClass('d-none');
        });

        $('.sectionShow').click(function(e) {
            e.preventDefault();
            $('.toggleSection').css('display', 'block');
            $('.sectionShow').addClass('d-none');
        });

        $('#edit_device_modal, #fuelModal, #commandModal').on('shown.bs.modal', function(e) {
            $('#kt_header').css('z-index', 0)
        });

        $('#edit_device_modal, #fuelModal, #commandModal').on('hidden.bs.modal', function(e) {
            $('#kt_header').css('z-index', 99999)
        });

        $('#complainModal, #expenseModal').on('shown.bs.modal', function(e) {
            $('#kt_header').css('z-index', 0)
        });

        $('#complainModal, #expenseModal').on('hidden.bs.modal', function(e) {
            $('#kt_header').css('z-index', 99999)
        });


        $(document).on('submit', 'form#saveComplainForm', function(event) {

            event.preventDefault();

            var id = 0;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/saveComplain') }}/" + id,
                data: $('#saveComplainForm').serialize(),
                success: function(response) {
                    successMsg('Complain generated successfully.');
                    $('#complainModal').modal('hide');
                    $('#complain_function').click();
                    $('#saveComplainForm')[0].reset();

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

        $(document).on('submit', 'form#saveFuelLogForm', function(event) {

            event.preventDefault();
            var id = $('#object_id').val();
            $("[id$=-error]").text('');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/saveFuelByObject') }}/" + id,
                data: $('#saveFuelLogForm').serialize(),
                success: function(response) {
                    if (response == 1) {
                        successMsg('Fuel cost added successfully.');
                        $('#fuelModal').modal('hide');
                        $('#vms_rel_function').click();
                        $('#saveFuelLogForm')[0].reset();
                    } else {
                        warningMsg('This device is not assigned to VMS!')
                    }

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

        $(document).on('submit', 'form#saveExpenseLogForm', function(event) {

            event.preventDefault();
            var id = $('#expense_object_id').val();
            $("[id$=-error]").text('');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/saveExpenseByObject') }}/" + id,
                data: $('#saveExpenseLogForm').serialize(),
                success: function(response) {
                    if (response == 1) {
                        successMsg('Expense cost added successfully.');
                        $('#expenseModal').modal('hide');
                        $('#vms_rel_function').click();
                        $('#saveExpenseLogForm')[0].reset();
                    } else {
                        warningMsg('This device is not assigned to VMS!')
                    }

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

        $(document).on('keyup', '.calculatePrice', function() {
            var refill_unit = ($('#refill_unit').val() == null) ? 1 : $('#refill_unit').val();
            var unit_price = $('#unit_price').val();
            var total_price = parseFloat(refill_unit * unit_price).toFixed(2);
            console.log(total_price);
            $('#total_price').val(total_price);
        });

        $(document).on('keyup', '.totalPrice', function() {
            var refill_unit = ($('#refill_unit').val() == null) ? 1 : $('#refill_unit').val();
            var total_price = $('#total_price').val();
            var unit_price = parseFloat(total_price / refill_unit).toFixed(2);
            console.log(total_price);
            $('#unit_price').val(unit_price);
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

        function eventMsg(msg) {
            return toastr.warning(msg, '', {
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