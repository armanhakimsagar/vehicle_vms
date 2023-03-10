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
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/global/base/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/menu/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/brand/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/aside/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/enduser/playback-custom.css')}}" rel="stylesheet" />
    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/angular.min.js')}}"></script>
    <link href="{{asset('assets/js/leaflet.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/leaflet.js')}}"></script>
    <!--  <script src="{{asset('assets/js/leaflet.rotatedMarker.js')}}"></script> -->
    <script src="{{asset('assets/js/marker.rotate.js')}}"></script>
    <script src="{{asset('assets/js/MovingMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.movingRotatedMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.markercluster-src.js')}}"></script>
    <script src="{{asset('assets/js/L.Control.ZoomMin.js')}}"></script>
    <script src="{{asset('assets/js/Leaflet.Control.Custom.js')}}"></script>
    <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
    <!-- <script src="{{asset('assets/js/leaflet-realtime.js')}}"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvX5ZoFwodbDqQWw1DPTp8Fk9jf3Uuv68"></script>
    <script src="{{asset('assets/js/google.js')}}"></script>
    <script src="{{asset('assets/js/bing_map.js')}}"></script>



</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" id="playback_monitor" ng-app="playbackApp" ng-controller="playbackCtrl" ng-cloak>

    <!-- begin:: Page -->

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
                        <a href="javascript:;">
                            <img alt="Logo" src="{{asset('assets/media/logos/crm-logo-black.png')}}" />
                        </a>
                    </div>

                </div>

                <!-- end:: Aside -->


                <!-- begin:: Aside Menu -->

                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <div class="custom-tabs">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#history" class="nav-link active">History</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#setting" class="nav-link">Setting</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#place" class="nav-link">Place</a></li>
                            </ul>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="history" role="tabpanel">
                                <div class="filtering-area" style="padding:0;">
                                    <div class="mt-2" style="width: 22vw;">

                                        <div id="playback_list" style="height: 77vh; overflow: auto;"></div>
                                        <!-- <div id="playback_graph"></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="setting" role="tabpanel">
                                settings

                            </div>
                            <div class="tab-pane" id="place" role="tabpanel">
                                place
                            </div>
                        </div>
                    </div>
                </div>


                <!-- end:: Aside Menu -->

            </div>


            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper custom-kt-wrapper" id="kt_wrapper">

                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed custom-kt-header-fixed">

                    <!-- begin:: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <form action="" class="filteringSection">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Device:</label>
                                            <div class="col-10">
                                                <select name="device_id" id="device_id" class=" form-control kt-select2-2">
                                                    <option value="0">Select Device</option>
                                                    @foreach($device_list as $d)
                                                    <option value="{{$d->imei}}" {{($selected_device!='' && $selected_device->imei==$d->imei) ? 'selected' :''}}>
                                                        {{$d->device_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Filter:</label>
                                            <div class="col-10">
                                                <select name="filter" class="form-control kt-select2-2" id="dayFilter">
                                                    <option value="0">Select Date</option>
                                                    <option value="1">Today</option>
                                                    <option value="2">Yesterday</option>
                                                    <option value="3">Last 3 days</option>
                                                    <option value="4">This week</option>
                                                    <option value="5">Last week</option>
                                                    <option value="6">This Month</option>
                                                    <option value="7">Last Month</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">Stops:</label>
                                            <div class="col-10">
                                                <select name="" class="form-control kt-select2-2">
                                                    <option value="1">> 1 min</option>
                                                    <option value="2">> 2 min</option>
                                                    <option value="5" selected="selected">> 5 min</option>
                                                    <option value="10">> 10 min</option>
                                                    <option value="20">> 20 min</option>
                                                    <option value="30">> 30 min</option>
                                                    <option value="60">> 1 hour</option>
                                                    <option value="120">> 2 hours</option>
                                                    <option value="300">> 5 hours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">From:</label>
                                            <div class="col-10">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" name="start_date" class="form-control text-center datePicker" id="start_date" />
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-6 custom-select-2">
                                                                <select name="start_hour" id="start_hour" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">{{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-6 custom-select-2">
                                                                <select name="start_min" id="start_min" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=59; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">{{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label">To:</label>
                                            <div class="col-10">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" name="end_date" class="form-control text-center datePicker" id="end_date" />
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <div class="col-6 custom-select-2">
                                                                <select name="end_hour" id="end_hour" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}" {{($i==23) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col-6 custom-select-2">
                                                                <select name="end_min" id="end_min" class="form-control kt-select2-2">
                                                                    @for($i=0; $i<=59; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}" {{($i==59) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                                        @endfor
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <!-- <button type="button" name="playback_button" id="playback_button" class=" playnow btn btn-warning btn-sm">Show Playback</button> -->
                                            <button type="button" name="playback_button" id="playback_button" class=" playnow btn btn-warning btn-sm">Show Playback</button>
                                            <!-- <button type="button" name="animate_marker" id="animate_marker" class=" playnow btn btn-warning btn-sm">Play Now</button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- end:: Header Menu -->

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
                                                <div id="show_loader" class="col-sm-12 text-center d-none" style="position: absolute;    left: 0%; align-items: center; justify-content: center; z-index: 999999;    height: calc(100vh - 51px);  width: 100%;  padding-top: 15%; background:rgba(255,255,255,0.8);"><img src="{{asset('assets/images/loading.gif')}}" style="width:140px; height:auto;"></div>
                                                <div class="kt-widget15__map" id="show_output">
                                                    <div id="kt_chart_latest_trends_map" class="g-map-2 mapSection"></div>
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
                <div class="kt-portlet__body toggleSection resizable-buttom-section d-none" id="resizable">
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
                                    <div class="paly-button">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <i class="fas fa-play mr-3" title="Play" id="play_button"></i>
                                                <i class="fas fa-pause mr-3" title="Pause" id="pause_button"></i>
                                                <i class="fas fa-stop mr-3" title="Stop" id="stop_button"></i>
                                                <span>Speed</span>
                                                <select name="speed" id="playback_speed">
                                                    <option value="1">x1</option>
                                                    <option value="2">x2</option>
                                                    <option value="3">x3</option>
                                                    <option value="4">x4</option>
                                                    <option value="5">x5</option>
                                                    <option value="6">x6</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-8">
                                                <!-- <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 75%; background: #FF9951" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> -->
                                            </div>
                                        </div>


                                    </div>
                                    <div class="dataListSection">
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Total Distance</span>
                                            <span class="dataItemValue">@{{playback_result.route_length}} km</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-safari"></i></span>
                                            <span class="dataItemName">Travel Time</span>
                                            <span class="dataItemValue"> @{{playback_result.drives_duration}} </span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-sim-card"></i></span>
                                            <span class="dataItemName">Stop Duration</span>
                                            <span class="dataItemValue">@{{playback_result.stops_duration}}</span>
                                        </div>

                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Stop Count</span>
                                            <span class="dataItemValue">@{{playback_result.stops.length}} times</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fab fa-acquisitions-incorporated"></i></span>
                                            <span class="dataItemName">Top Speed</span>
                                            <span class="dataItemValue">@{{playback_result.top_speed}} kmh</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-toggle-on"></i></span>
                                            <span class="dataItemName">Avg Speed</span>
                                            <span class="dataItemValue">@{{playback_result.avg_speed}} kmh</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Engine Works</span>
                                            <span class="dataItemValue">@{{playback_result.engine_work}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-battery-three-quarters"></i></span>
                                            <span class="dataItemName">Engine Idle</span>
                                            <span class="dataItemValue">@{{playback_result.engine_idle}}</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Fuel Consumption</span>
                                            <span class="dataItemValue">@{{playback_result.fuel_consumption}} L</span>
                                        </div>
                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="dataItemName">Cost/km</span>
                                            <span class="dataItemValue">@{{playback_result.fuel_consumption_per_100km}} </span>
                                        </div>

                                        <div class="dataListItem">
                                            <span class="dataItemIcon"><i class="fas fa-bolt"></i></span>
                                            <span class="dataItemName">Fuel Cost</span>
                                            <span class="dataItemValue">@{{playback_result.fuel_cost}}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="graph" role="tabpanel">
                                    <div id="playback_graph"></div>

                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    world
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="sectionShow d-none" title="Maximize"> <i class="fas fa-expand-arrows-alt"></i></span>
                <!-- <div class="navbar navbar-fixed-bottom">
                    <div class="navbar-inner">
                        <div class="container" style="width: auto; padding-left: 20px;">
                            <a id="bottom-branding" class="brand" title="View Splash Screen" href="#"><i class="icon-leaf"></i> Leaflet Playback</a>
                            <ul class="nav">
                                <li class="btn">
                                    <a id="play-pause" href="#"><i id="play-pause-icon" class=" fa fa-play icon-play icon-large"></i></a>
                                </li>
                                <li>
                                    <div id="time-slider"></div>
                                </li>
                                <li class="btn dropup">
                                    <a id="clock-btn" class="clock" data-toggle="dropdown" href="#">
                                        <span id="cursor-date"></span><br />
                                        <span id="cursor-time"></span>
                                    </a>
                                    <div class="dropdown-menu" role="menu" aria-labelledby="clock-btn">
                                        <label>Playback Cursor Time</label>
                                        <div class="input-append bootstrap-timepicker">
                                            <input id="timepicker" type="text" class="input-small span2">
                                            <span class="add-on"><i class="icon-time"></i></span>
                                        </div>
                                        <div id="calendar"></div>
                                        <div class="input-append">
                                            <input id="date-input" type="text" class="input-small">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="btn dropup">
                                    <a id="speed-btn" data-toggle="dropdown" href="#"><i class="icon-dashboard icon-large"></i> <span id="speed-icon-val" class="speed">1</span>x</a>
                                    <div class="speed-menu dropdown-menu" role="menu" aria-labelledby="speed-btn">
                                        <label>Playback<br />Speed</label>
                                        <input id="speed-input" class="span1 speed" type="text" value="1" />
                                        <div id="speed-slider"></div>
                                    </div>
                                </li>

                            </ul>
                            <ul class="nav pull-right">
                                <li class="btn"><a id="view-all-fences-btn" href="#"><i class="icon-bell icon-large"></i> View All Fences</a></li>
                                <li class="btn"><a id="load-tracks-btn" href="#"><i class="icon-file-alt icon-large"></i> Load Tracks</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



    <!-- end:: Page -->


    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->
    <!-- begin::Global Config(global config for global JS sciprts) -->
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
    <script src="{{asset('assets/js/global/gmaps.js')}}"></script>

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
    <!--    <script src="{{asset('assets/js/playback/Util.js')}}"></script>
    <script src="{{asset('assets/js/playback/MoveableMarker.js')}}"></script>
    <script src="{{asset('assets/js/playback/TickPoint.js')}}"></script>
    <script src="{{asset('assets/js/playback/Tick.js')}}"></script>
    <script src="{{asset('assets/js/playback/Clock.js')}}"></script>
    <script src="{{asset('assets/js/playback/Playback.js')}}"></script> -->
    <script src="{{asset('assets/js/optional/raphael.js')}}"></script>
    <script src="{{asset('assets/js/optional/morris.js')}}"></script>
    <script src="{{asset('assets/js/global/dashboard.js')}}"></script>
    <script>
        $(document).ready(function(){
            // y = time
            //a = max limit
            // b = current speed
            window.playback_graph_chart = Morris.Line({
                element: 'playback_graph',
                data: angular.element(document.getElementById('playback_monitor')).scope().graph_data,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Series A', 'Series B'],
                resize: true
            });

        });
        var app = angular.module('playbackApp', []);
        app.controller('playbackCtrl', function($scope, $http, $window, $interval) {
            console.log("angular is working");

            angular.element(document).ready(function() {
                window.polylinePoints = [];
                window.map_type = "ROADMAP";
                window.ggl;
                window.controlLayers;
                window.deviceGroup;
                window.mstart;
                window.mend;
                $scope.selected_device;
                var polylinePoints = [];
                load_map();
                window.playback;
                window.myMovingMarker;
                window.moving_speed = 20000;
                window.route_start_icon = "{{asset('assets/images/route_start.png')}}";
                window.route_end_icon = "{{asset('assets/images/route_end.png')}}";
                window.route_parking_icon = "{{asset('assets/images/playback_stop_icon.png')}}";
                window.device_icon = "{{asset('assets/images/playback_running.png')}}";

                var selectedDevice = $('#device_id').val();
                if (selectedDevice == 0) {
                    $('#playback_button').attr('disabled', true);

                }

                var start_date = moment().format('YYYY-MM-DD');
                var end_date = moment().format('YYYY-MM-DD');
                $('#start_date').val(start_date);
                $('#end_date').val(end_date);

                $('.datePicker').datepicker({
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd'
                });

                $('.kt-select2-2').select2({
                    placeholder: "Select"
                });

                /* for playback control panel  */

                $('#bottom-branding').on('click', function(e) {
                    $('header').fadeIn();
                });

                $('.close-header').on('click', function(e) {
                    $('header').fadeOut();
                });

                $('#play-demo-btn').on('click', function(e) {
                    playback.start();
                    //geoTriggers.startPolling();
                    $('#play-pause-icon').removeClass('icon-play');
                    $('#play-pause-icon').addClass('icon-pause');
                    isPlaying = true;
                });

                isPlaying = false;
                $('#play-pause').click(function() {
                    if (isPlaying === false) {
                        playback.start();
                        //geoTriggers.startPolling();
                        $('#play-pause-icon').removeClass('icon-play');
                        $('#play-pause-icon').addClass('icon-pause');
                        isPlaying = true;
                    } else {
                        playback.stop();
                        //geoTriggers.stopPolling();
                        $('#play-pause-icon').removeClass('icon-pause');
                        $('#play-pause-icon').addClass('icon-play');
                        isPlaying = false;
                    }
                });

            });

            function load_map() {
                window.map = new L.Map('kt_chart_latest_trends_map', {
                    center: [23.8103, 90.4125],
                    zoom: 5,
                    minZoom: 4,
                    maxZoom: 16,
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

                controlLayers = L.control.layers(baseLayers, null, {
                    collapsed: false
                });
                controlLayers.addTo(map);

                map.addControl(new L.Control.ZoomMin());

                map.addLayer(ggl);
                window.eventGroup = L.layerGroup();
                //deviceGroup = L.layerGroup(); //L.markerClusterGroup(); // L.layerGroup();
                //map.addLayer(deviceGroup);
                map.addLayer(eventGroup);
                L.control.custom({
                        position: 'topleft',
                        content: '<a href="#" class="btn btn-default leaflet_button"  onClick="toggleMarkers()">' +
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
                            //margin: '12px',
                            padding: '0px 0 0 0',
                            cursor: 'pointer'
                        },
                        datas: {
                            'foo': 'bar',
                        }
                    })
                    .addTo(map);
            }

            $("#playback_button_old").click(function() {
                load_spinner('show', 'show_loader', 'show_output');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dashboard/showplayback') }}",
                    data: {
                        'device_id': $("#device_id").val(),
                        'start_date': $("#start_date").val() + " " + $("#start_hour").val() + ":" + $("#start_min").val() + ":00",
                        'end_date': $("#end_date").val() + " " + $("#end_hour").val() + ":" + $("#end_min").val() + ":00",
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        //$(" label:first").click();
                        //$(".leaflet-control-layers-selector input[type='radio']")[0].prop('checked', true);
                        $('.leaflet-control-layers-base input[type=radio]:first').trigger('click');
                        //console.log($('.leaflet-control-layers-base input[type=radio]:first'));
                        /* map.eachLayer(function(layer){
                            if(map.hasLayer(layer)){
                                map.removeLayer(layer);
                            }

                        }); */

                        //map.removeLayer(myMovingMarker);

                        map.removeControl(controlLayers);
                        controlLayers.addTo(map);

                        if (response.length > 0) {
                            polylinePoints = [];
                            for (var i = 0; i < response.length; i++) {
                                polylinePoints.push([JSON.parse(response[i].lat), JSON.parse(response[i].lng)]);
                            }

                            var playback_lines = {
                                "type": "Feature",
                                "geometry": {
                                    "type": "MultiPoint",
                                    "coordinates": polylinePoints
                                },
                                "properties": {
                                    "time": [ /*array of UNIX timestamps*/ ]
                                }
                            };

                            // playback = new L.Playback(map, polylinePoints, clockCallback);

                            var start_icon, end_icon;

                            // here is the line you draw (if you want to see the animated marker path on the map)
                            L.polyline(polylinePoints).addTo(map);

                            start_icon = L.icon({
                                iconUrl: route_start_icon,
                                iconSize: [38, 38],
                                iconAnchor: [20, 20],
                                popupAnchor: [-2, -25]
                            });
                            end_icon = L.icon({
                                iconUrl: route_end_icon,
                                iconSize: [38, 38],
                                iconAnchor: [20, 20],
                                popupAnchor: [-2, -25]
                            });

                            mstart = L.marker(polylinePoints[0], {
                                icon: start_icon
                            }).addTo(map);
                            mend = L.marker(polylinePoints[polylinePoints.length - 1], {
                                icon: end_icon
                            }).addTo(map);
                            // here is the moving marker (6 seconds animation)
                            myMovingMarker = L.Marker.movingMarker(polylinePoints, moving_speed, {
                                autostart: false,
                                icon: device_icon
                            });
                            map.addLayer(myMovingMarker);

                            map.fitBounds(polylinePoints);
                            load_spinner('hide', 'show_loader', 'show_output');
                        } else {
                            errorMsg('No Data Found');
                            load_spinner('hide', 'show_loader', 'show_output');
                        }
                    },
                    error: function(reject) {
                        errorMsg();
                        load_spinner('hide', 'show_loader', 'show_output');
                    }
                });
            });

            $("#playback_button").click(function() {
                load_spinner('show', 'show_loader', 'show_output');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dashboard/showplaybackv2') }}",
                    data: {
                        'device_id': $("#device_id").val(),
                        'start_date': $("#start_date").val() + " " + $("#start_hour").val() + ":" + $("#start_min").val() + ":00",
                        'end_date': $("#end_date").val() + " " + $("#end_hour").val() + ":" + $("#end_min").val() + ":00",
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        console.log(response);
                        $('.leaflet-control-layers-base input[type=radio]:first').trigger('click');
                        map.removeControl(controlLayers);
                        controlLayers.addTo(map);

                        if (response.route.length > 0) {
                            polylinePoints = [];
                            for (var i = 0; i < response.route.length; i++) {
                                polylinePoints.push([JSON.parse(response.route[i][1]), JSON.parse(response.route[i][2])]);
                            }
                            $scope.playback_result = response;
                            //console.log($scope.playback_result);
                            //$scope.start_location = response.drives[0][3];
                            //$scope.end_location = response.stops[(response.stops.length) - 1][7];

                            $scope.$apply();
                            $("#playback_list").html(response.playback_list);

                            var playback_lines = {
                                "type": "Feature",
                                "geometry": {
                                    "type": "MultiPoint",
                                    "coordinates": polylinePoints
                                },
                                "properties": {
                                    "time": [ /*array of UNIX timestamps*/ ]
                                }
                            };

                            var start_icon, end_icon, device_icon_image;

                            L.polyline(polylinePoints).addTo(map);

                            start_icon = L.icon({
                                iconUrl: route_start_icon,
                                iconSize: [30, 30],
                                iconAnchor: [15, 30],
                                popupAnchor: [-2, -25]
                            });
                            parking_icon = L.icon({
                                iconUrl: route_parking_icon,
                                iconSize: [30, 30],
                                iconAnchor: [15, 30],
                                popupAnchor: [3, 0]
                            });
                            end_icon = L.icon({
                                iconUrl: route_end_icon,
                                iconSize: [30, 30],
                                iconAnchor: [15, 30],
                                popupAnchor: [-2, -25]
                            });

                            device_icon_image = L.icon({
                                iconUrl: device_icon,
                                iconSize: [50, 50],
                                iconAnchor: [25, 50],
                                popupAnchor: [-2, -25]
                            });

                            mstart = L.marker(polylinePoints[0], {
                                icon: start_icon
                            }).addTo(map);
                            mend = L.marker(polylinePoints[polylinePoints.length - 1], {
                                icon: end_icon
                            }).addTo(map);

                            for (var x = 0; x < response.stops.length - 1; x++) {
                                L.marker([JSON.parse(response.stops[x][2]), JSON.parse(response.stops[x][3])], {
                                    icon: parking_icon
                                }).addTo(map);
                            }

                            // here is the moving marker (6 seconds animation)
                            myMovingMarker = L.Marker.movingMarker(polylinePoints, moving_speed, {
                                autostart: false,
                                icon: device_icon_image
                                //rotationAngle:45
                            }).addTo(map).bindPopup('Playback', {
                                autoPan: true,
                                //autoClose: false,
                                closeOnClick: false,
                            });
                            map.addLayer(myMovingMarker);

                            map.fitBounds(polylinePoints);
                            load_spinner('hide', 'show_loader', 'show_output');
                        } else {
                            errorMsg('No Data Found');
                            load_spinner('hide', 'show_loader', 'show_output');
                        }
                        $scope.graph_data = [{
                        y: '2006',
                        a: 100,
                        b: 90
                    },
                    {
                        y: '2007',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2008',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2009',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2010',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2011',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2012',
                        a: 100,
                        b: 90
                    }
                ];
                    },
                    error: function(reject) {
                        errorMsg();
                        load_spinner('hide', 'show_loader', 'show_output');
                    }
                });
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                console.log('tab clicked');
                playback_graph_chart.redraw();
            });

            $("#play_button").click(function() {
                myMovingMarker.start();

            });

            $("#pause_button").click(function() {
                myMovingMarker.pause();

            });

            $("#stop_button").click(function() {
                myMovingMarker.stop();

            });

            $("#playback_speed").on('change', function() {
                //myMovingMarker.setSpeed(this.value);
                //myMovingMarker.start();
                //myMovingMarker.options.speed(this.value);
                changeDuration(myMovingMarker, this.value);
                console.log('speed: ' + this.value);
            });

            $(document).on('change', '#device_id', function() {
                if (this.value > 0) {
                    $('#playback_button').attr('disabled', false);
                } else {
                    $('#playback_button').attr('disabled', true);
                }
            });

            $('.playnow').click(function(e) {
                $('.toggleSection').removeClass('d-none');
                $('.mapSection').removeClass('g-map-2');
                $('.mapSection').addClass('g-map');
                $('.sectionShow').addClass('d-none');
            });

            $('.sectionHide').click(function(e) {
                $('.toggleSection').addClass('d-none');
                $('.sectionShow').removeClass('d-none');
                $('.mapSection').removeClass('g-map');
                $('.mapSection').addClass('g-map-2');
            });

            $('.sectionShow').click(function(e) {
                $('.toggleSection').removeClass('d-none');
                $('.sectionShow').addClass('d-none');
                $('.mapSection').removeClass('g-map-2');
                $('.mapSection').addClass('g-map');
            });

            $(document).on('change', '#dayFilter', function() {
                var start_date = '';
                var end_date = '';
                if (this.value == 0 || this.value == 1) {
                    start_date = moment().format('YYYY-MM-DD');
                    end_date = moment().format('YYYY-MM-DD');

                } else if (this.value == 2) {
                    start_date = moment().subtract(1, 'days').format('YYYY-MM-DD');
                    end_date = moment().subtract(1, 'days').format('YYYY-MM-DD');

                } else if (this.value == 3) {
                    start_date = moment().subtract(2, 'days').format('YYYY-MM-DD');
                    end_date = moment().format('YYYY-MM-DD');

                } else if (this.value == 4) {
                    start_date = moment().startOf('week').format('YYYY-MM-DD');
                    end_date = moment().endOf('week').format('YYYY-MM-DD');

                } else if (this.value == 5) {
                    start_date = moment().subtract(1, 'week').startOf('week').format('YYYY-MM-DD');
                    end_date = moment().subtract(1, 'week').endOf('week').format('YYYY-MM-DD');

                } else if (this.value == 6) {
                    start_date = moment().startOf('month').format('YYYY-MM-DD');
                    end_date = moment().endOf('month').format('YYYY-MM-DD');

                } else if (this.value == 7) {
                    start_date = moment().subtract(1, 'months').startOf('month').format('YYYY-MM-DD');
                    end_date = moment().subtract(1, 'months').endOf('month').format('YYYY-MM-DD');

                }
                $('#start_date').val(start_date);
                $('#end_date').val(end_date);
            });
        }); //end of angular module

        function show_in_map(latitude, longitude) {
            //var item = JSON.parse(data);
            map.setView({
                lat: latitude,
                lng: longitude
            }, 14, {
                animate: true,
                duration: 0.7
            });
            L.marker([latitude, longitude], {
                //icon: end_icon
            }).addTo(map).bindPopup('Test Pop', {}).openPopup();

            // eventGroup.clearLayers();
            /* var event_content = "<h5 class='popover-header text-center'>" + item.time + "</h5>";
            event_content += '<table class="table table-hover table-striped">';
            event_content += '<tr><td>Duration: </td><td>' + item.duration + '</td></tr>';
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

            var myEvent = L.marker([item.lat, item.lng], {}).addTo(map).bindPopup(event_content, {
                autoPan: true,
                //autoClose: false,
                closeOnClick: false,
            }).openPopup(); */
            //eventGroup.addLayer(myEvent);
        }

        function changeDuration(marker, duration) {
            marker.pause();
            marker._currentDuration = duration;
            marker.start();
        }

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

        function errorMsg(msg = null) {
            if (msg == null) {
                return toastr.error('Something went wrong', 'Error', {
                    progressBar: true,
                    closeButton: true,
                    hideDuration: "600",
                    timeOut: "3500",
                });
            } else {
                return toastr.error(msg, 'Opps!!!', {
                    progressBar: true,
                    closeButton: true,
                    hideDuration: "600",
                    timeOut: "3500",
                });
            }


        }

        function warningMsg(msg) {
            return toastr.warning(msg, 'Oops...', {
                progressBar: true,
                closeButton: true,
                hideDuration: "600",
                timeOut: "3500",
            });
        }

        function load_spinner(type, hide_element, show_element) {
            if (type == 'hide') {
                $("#" + hide_element).removeClass('show');
                $("#" + hide_element).addClass('d-none');
                $("#" + show_element).removeClass('d-none');
                $("#" + show_element).addClass('show');
            }
            if (type == 'show') {
                $("#" + hide_element).removeClass('d-none');
                $("#" + hide_element).addClass('show');
            }

        }


        $(function() {
            $(document).tooltip();

        });

        function clockCallback(ms) {
            $('#cursor-date').html(L.Playback.Util.DateStr(ms));
            $('#cursor-time').html(L.Playback.Util.TimeStr(ms));
            $('#time-slider').slider('value', ms);
            // $('#timepicker').timepicker('setTime', new Date(ms).toTimeString());
        }

        function speedToSliderVal(speed) {
            if (speed < 1) return -10 + speed * 10;
            return speed - 1;
        }

        function sliderValToSpeed(val) {
            if (val < 0) return parseFloat((1 + val / 10).toFixed(2));
            return val + 1;
        }

        function triggerFired(trigger) {
            console.log('triggerFired');
            console.log(trigger);

            var html =
                '<div class="accordion-inner">' +
                '  <strong>' + trigger.place.name + '</strong>' +
                '  <span class="broadcast-time">' + trigger.display_date + '</span>' +
                '  <br/>' +
                trigger.trigger.text + '<br/>' +
                '  <button class="btn btn-info btn-small view-notification"><i class="icon-eye-open"></i> View</button>' +
                '</div>';

            $('#notifications').prepend(html);
            var count = $('#notifications').children().length;
            $('#notification-count').html('<span class="badge badge-important pull-right">' + count + '</span>');
            var $btn = $('#notifications').find('button').first();
            $btn.data('trigger', trigger);
            $btn.on('click', function(e) {
                console.log('view trigger');
                var lat = trigger.place.latitude;
                var lng = trigger.place.longitude;
                var radius = trigger.place.radius * 1.5;
                var circle = new L.Circle([lat, lng], radius);
                var bounds = circle.getBounds();
                map.fitBounds(bounds);
            });
        }

        function combineDateAndTime(date, time) {
            var yr = date.getFullYear();
            var mo = date.getMonth();
            var dy = date.getDate();
            // the calendar uses hour and the timepicker uses hours...
            var hr = time.hours || time.hour;
            if (time.meridian == 'PM' && hr != 12) hr += 12;
            var min = time.minutes || time.minute;
            var sec = time.seconds || time.second;
            return new Date(yr, mo, dy, hr, min, sec).getTime();
        }

        function loadTracksFromFile(file) {
            var reader = new FileReader();
            reader.readAsText(file);
            reader.onload = function(e) {
                var tracks = JSON.parse(e.target.result);
                playback.addTracks(tracks);
                samples.addData(tracks);
                $('#load-tracks-modal').modal('hide');
            }
        }

        function save(data, name) {
            var json = JSON.stringify(data, null, 2);
            var blob = new Blob([json], {
                type: 'text/plain'
            });
            var downloadLink = document.createElement("a");
            var url = (window.webkitURL != null ? window.webkitURL : window.URL);
            downloadLink.href = url.createObjectURL(blob);
            downloadLink.download = name || 'data.json';
            downloadLink.click();
        }

        function sliceData(data, start, end) {
            end = end || data.geometry.coordinates.length - 1;
            data.geometry.coordinates = data.geometry.coordinates.slice(start, end);
            data.properties.time = data.properties.time.slice(start, end);
            data.properties.speed = data.properties.speed.slice(start, end);
            data.properties.altitude = data.properties.altitude.slice(start, end);
            data.properties.heading = data.properties.heading.slice(start, end);
            data.properties.horizontal_accuracy = data.properties.horizontal_accuracy.slice(start, end);
            data.properties.vertical_accuracy = data.properties.vertical_accuracy.slice(start, end);
            save(data, 'sliced-data.json');
        }
    </script>
</body>

<!-- end::Body -->

</html>