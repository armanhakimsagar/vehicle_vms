<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->


    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Report</title>
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
    <link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/optional/bootstrap-multiselect.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/pages/jquery-ui.css')}}" rel="stylesheet" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/css/global/style.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/datatables.bundle.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/report/report-custom.css')}}" rel="stylesheet" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/css/global/base/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/menu/light.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/brand/dark.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/global/aside/dark.css')}}" rel="stylesheet" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/printThis.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <!-- Load c3.css -->
    <link href="{{asset('assets/js/graph/c3.css')}}" rel="stylesheet">

    <!-- Load d3.js and c3.js -->
    <script src="{{asset('assets/js/graph/d3.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('assets/js/graph/c3.min.js')}}"></script>
    <link href="{{asset('assets/js/leaflet.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/leaflet.js')}}"></script>
    <script src="{{asset('assets/js/marker.rotate.js')}}"></script>
    <script src="{{asset('assets/js/MovingMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.movingRotatedMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.markercluster-src.js')}}"></script>
    <script src="{{asset('assets/js/L.Control.ZoomMin.js')}}"></script>
    <script src="{{asset('assets/js/Leaflet.Control.Custom.js')}}"></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"
    ng-app="reportApp" ng-controller="reportCtrl" ng-cloak>

    <!-- begin:: Page -->

    <!-- sideber is included in navber------------ -->

    <!-- begin:: Header -->
    @include('layouts.report.navber')

    <!-- end:: Header -->
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
                        <a href="{{url('dashboard/report')}}" class="kt-subheader__breadcrumbs-link">Report </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link" id="breadcrumb">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" id="main_content_section">

            <!--Begin::Dashboard 1-->

            <!--Begin::Row-->
            <div class="row">
                <div class="col-lg-12 order-lg-3 order-xl-1">
                    <div class="kt-portlet kt-portlet--height-fluid">

                        <!-- Filter section -->

                        <div class="kt-portlet__head custom-kt-portlet__head d-none" id="filterSection">
                            <div class="kt-portlet__head-label">
                                <form action="">
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                            <span class="mr-2">Device</span>
                                            <span class="mr-2 ">
                                                <select class="custom-form-control form-control kt-select2"
                                                    multiple="multiple" id="device_list" name="device_list"
                                                    placeholder="Select Device">
                                                    <option value="0">All device</option>
                                                    @foreach($device_list as $d)
                                                    <option value="{{$d->imei}}_{{$d->device_name}}">
                                                        {{$d->device_name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                            <span class="mr-2 mt-2">
                                                <div class="input-group date">From:
                                                    <input type="text" name="start_date" id="start_date"
                                                        class="ml-2 form-control text-center dateTime datePicker1"
                                                        autocomplete="off" />

                                                </div>
                                            </span>
                                            <span class="mr-2 my-auto">
                                                <select name="start_hour" id="start_hour"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                        {{sprintf("%02d", $i)}}</option>
                                                        @endfor
                                                </select>
                                            </span>
                                            <span class="mr-2 my-auto">
                                                <select name="start_min" id="start_min"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=59; $i++) <option value="{{sprintf('%02d', $i)}}">
                                                        {{sprintf("%02d", $i)}}</option>
                                                        @endfor
                                                </select>
                                            </span>
                                            <span class="mr-2 mt-2">
                                                <div class="input-group date">To:
                                                    <input type="text" name="end_date" id="end_date"
                                                        class="ml-2 form-control text-center dateTime datePicker2"
                                                        autocomplete="off" />
                                                </div>
                                            </span>
                                            <span class="mr-2 my-auto">
                                                <select name="end_hour" id="end_hour" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{sprintf('%02d', $i)}}"
                                                        {{($i==23) ? 'selected': ''}}>{{sprintf("%02d", $i)}}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </span>
                                            <span class="mr-2 my-auto">
                                                <select name="end_min" id="end_min" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=59; $i++) <option value="{{sprintf('%02d', $i)}}"
                                                        {{($i==59) ? 'selected': ''}}>{{sprintf("%02d", $i)}}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </span>
                                            <span class="mr-2">
                                                <input type="hidden" id="current_data_rel">
                                                <button type="button" name="show_report" id="show_report"
                                                    class="check btn btn-warning btn-sm" ng-click="showReport()">Show
                                                    Report</button>
                                            </span>
                                        </li>
                                        <li class="list-group-item custom-list-group-item justify-content-between align-items-center d-none"
                                            id="alert_type_selection">
                                            <span class="mr-2">Alert Type</span>
                                            <span class="mr-2 ">
                                                <select class="custom-form-control form-control kt-select2"
                                                    multiple="multiple" id="alert_type" name="alert_type"
                                                    placeholder="Select Alert Type">
                                                    <option value="0">All Alerts</option>
                                                    @foreach($alert_list as $d)
                                                    <option value="{{$d->name}}">
                                                        {{$d->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-brand btn-sm quick-date" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <!-- <i class="flaticon-more-1"></i> -->
                                        Quick date
                                    </button>
                                    <div
                                        class=" dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit dropdown-menu-custom">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Report Options
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                                    <i class="far fa-clock mr-2"></i>
                                                    <span class="kt-nav__link-text">Today</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="1">
                                                    <i class="fas fa-history mr-2"></i>
                                                    <span class="kt-nav__link-text">Yesterday</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="2">
                                                    <i class="far fa-clock mr-2"></i>
                                                    <span class="kt-nav__link-text">Last 3 Days</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="3">
                                                    <i class="far fa-calendar-alt mr-2"></i>
                                                    <span class="kt-nav__link-text">This Week</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="4">
                                                    <i class="far fa-calendar-alt mr-2"></i>
                                                    <span class="kt-nav__link-text">Last Week</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="5">
                                                    <i class="far fa-calendar-alt mr-2"></i>
                                                    <span class="kt-nav__link-text">This Month</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="6">
                                                    <i class="far fa-calendar-alt mr-2"></i>
                                                    <span class="kt-nav__link-text">Last Month</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic data section -->
                        <div id="show_loader" class="col-sm-12 text-center d-none"
                            style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                            <img src="{{asset('assets/images/loading.gif')}}" style="width:130px; height:auto;">
                        </div>

                        <div class="d-none report_section" id="alert_details_section">
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="alert_details_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Device</th>
                                            <th>Time</th>
                                            <th>Alert Type</th>
                                            <th>Coordinate</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="a in alert_details_result">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{a.name}}</td>
                                            <td>@{{a.dt_tracker}}</td>
                                            <td>@{{a.event_desc}}</td>
                                            <td>
                                                <a href="http://maps.google.com/maps?q=@{{a.lat}}° ,@{{a.lng}}° &amp;t=m"
                                                    target="_blank">@{{a.lat}}° ,@{{a.lng}}°</a>
                                            </td>
                                            <td>
                                                <div class="geoAddress">
                                                    <button type="button" class="btn btn-default load_geo_address"
                                                        data-lat="@{{a.lat}}" data-lng="@{{a.lng}}">Show
                                                        Address</button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="alert_overview_section">
                            <div class="kt-portlet__body">
                                <table class="table table-hover table-striped mt-3 table-bordered text-center"
                                    id="all_event_list">

                                </table>
                            </div>
                        </div>

                        <div class="d-none report_section" id="alert_report_section">
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="alert_report_chart_container"></div>


                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="device_manage_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Device</h5>
                                            <h5 class="card-title text-center" id="t_dvc">0</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center"> Active Device</h5>
                                            <h5 class="card-title text-center" id="t_a_dvc">0</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center"> Servicing Device</h5>
                                            <h5 class="card-title text-center" id="t_s_dvc">0</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">On Hold Device</h5>
                                            <h5 class="card-title text-center" id="t_h_dvc">0</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="kt-portlet__body">

                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="device_manage_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>IMEI</th>
                                            <th>Sim</th>
                                            <th>Status</th>
                                            <th>Speed limit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>

                                <!--end: Datatable -->
                            </div>
                        </div>

                        <div class="d-none report_section" id="device_status_log_section">

                            <div class="kt-portlet__body">

                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="device_status_log_table">
                                    <thead>
                                        <tr>
                                            <!-- <th width="2%" data-orderable="false">
                                        <label
                                            class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" />
                                            <span></span>
                                        </label>
                                    </th> -->
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>IMEI</th>
                                            <th>Sim</th>
                                            <th>Previous Status</th>
                                            <th>Previous Status Date</th>
                                            <th>Current Status</th>
                                            <th>Current Status Days</th>
                                        </tr>
                                    </thead>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>

                        <div class="d-none report_section" id="driving_behaviour_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Harsh Breaking
                                            </h5>
                                            <h5 class="card-title text-center">@{{overall_harshbreak}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Overspeed</h5>
                                            <h5 class="card-title text-center">@{{overall_overspeed}}</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Acceleration </h5>
                                            <h5 class="card-title text-center">@{{overall_acceleration}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Collision</h5>
                                            <h5 class="card-title text-center">@{{overall_collision}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <div id="driving_behaviour_donut_container"></div>
                                <br><br>
                                <div id="driving_behavior_chart_container"></div>
                                <br><br>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="driving_behavior_report_table">
                                    <thead>
                                        <tr style="text-align:center; font-weight:bold;">
                                            <th width="5%">SL</th>
                                            <th width="35%">Device name</th>
                                            <th width="10%">Overspeed</th>
                                            <th width="10%">Harsh break</th>
                                            <th width="10%">Acceleration</th>
                                            <th width="10%">Collition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="c in driving_behaviour_result track by $index"
                                            style="text-align:center;">
                                            <td width="5%">@{{$index+1}}</td>
                                            <td width="35%" style="text-align:left;">@{{c.device_name}}</td>
                                            <td width="10%">@{{c.total_overspeed}}</td>
                                            <td width="10%">@{{c.total_harshbreak}}</td>
                                            <td width="10%">@{{c.total_acceleration}}</td>
                                            <td width="10%">@{{c.total_collision}}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>

                        <div class="d-none report_section" id="engine_overview_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Device
                                                Quantity
                                            </h5>
                                            <h5 class="card-title text-center">@{{engine_overview_result.total_device}}
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total
                                                Engine On Time</h5>
                                            <h5 class="card-title text-center">
                                                @{{engine_overview_result.total_engine_on}}</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Engine Off Time</h5>
                                            <h5 class="card-title text-center">
                                                @{{engine_overview_result.total_engine_off}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <div id="engine_overview_chart"></div>
                                <table class="table table-hover table-striped mt-3 table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Device</th>
                                        <th>Engine On</th>
                                        <th>Engine Off</th>
                                    </tr>
                                    <tr ng-repeat="o in engine_overview_result.engine_overview">
                                        <td>@{{$index+1}}</td>
                                        <td>@{{o.name}}</td>
                                        <td>@{{o.total_engine_on}}</td>
                                        <td>@{{o.total_engine_off}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="d-none report_section" id="engine_report_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center"> Engine On Count</h5>
                                            <h5 class="card-title text-center">@{{total_engine_report_on}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center"> Engine Off Count</h5>
                                            <h5 class="card-title text-center">@{{total_engine_report_off}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>GPS time</th>
                                            <th>Engine status (ACC) </th>
                                            <th>Coordinates</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="r in engine_report_result">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{r.name}}</td>
                                            <td>@{{r.dt_tracker}}</td>
                                            <td>@{{r.event_desc}}</td>
                                            <td>@{{r.lat}}, @{{r.lng}}</td>
                                            <td>
                                                <div class="geoAddress">
                                                    <button type="button" class="btn btn-default load_geo_address"
                                                        data-lat="@{{r.lat}}" data-lng="@{{r.lng}}">Show
                                                        Address</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="geocoding_report_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Geo Fence Zone In
                                            </h5>
                                            <h5 class="card-title text-center">@{{geocoding_result[0].total_zone_in}}
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Geo Fence Zone Out</h5>
                                            <h5 class="card-title text-center">@{{geocoding_result[0].total_zone_out}}
                                            </h5>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="harshbreaking_report_table">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="25%">Device name</th>
                                            <th width="20%">Date & time</th>
                                            <th width="10%">Geo fence</th>
                                            <th width="20%">Zone</th>
                                            <th width="20%">Coordinate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="g in geocoding_result">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{g.name}}</td>
                                            <td>@{{g.dt_tracker}}</td>
                                            <td>@{{g.type}}</td>
                                            <td>@{{g.event_desc}}</td>
                                            <td>
                                                <a href="http://maps.google.com/maps?q=@{{g.lat}},@{{g.lng}}&amp;t=m"
                                                    target="_blank">@{{g.lat}}°, @{{g.lng}}°</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!-- <tbody ng-repeat="g in geocoding_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{g.name}} <a href="javascript:;" id="geo_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_geo_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td colspan='5'></td>

                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div id="geo_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in ov.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="25%">@{{c.device_name}}</td>
                                                            <td width="20%">@{{c.dt_tracker}}</td>
                                                            <td width="10%">@{{c.speed}}</td>
                                                            <td width="20%">
                                                                <a href="http://maps.google.com/maps?q=@{{c.lat}},@{{c.lng}}&amp;t=m"
                                                                    target="_blank">@{{c.lat}}°, @{{c.lng}}°</a>
                                                            </td>
                                                            <td width="20%"><button type="button"
                                                                    class="btn btn-default load_geo_address"
                                                                    data-lat="@{{c.lat}}" data-lng="@{{c.lng}}">Show
                                                                    Address</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody> -->

                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="harsh_breaking_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Device
                                            </h5>
                                            <h5 class="card-title text-center">@{{harshbreak_result.length}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Harsh Breaking Times</h5>
                                            <h5 class="card-title text-center">@{{total_harshbreak_time}}</h5>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="harshbreak_chart_container"></div>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="harshbreaking_report_table">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="25%">Device name</th>
                                            <th width="20%">Harsh Breaking Time</th>
                                            <th width="10%">Speed(kph) </th>
                                            <th width="20%">Coordinate</th>
                                            <th width="20%">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="ov in harshbreak_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{ov.d_name}} <a href="javascript:;" id="hb_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_hb_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td colspan='5'></td>

                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div id="hb_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in ov.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="25%">@{{c.device_name}}</td>
                                                            <td width="20%">@{{c.dt_tracker}}</td>
                                                            <td width="10%">@{{c.speed}}</td>
                                                            <td width="20%">
                                                                <a href="http://maps.google.com/maps?q=@{{c.lat}},@{{c.lng}}&amp;t=m"
                                                                    target="_blank">@{{c.lat}}°, @{{c.lng}}°</a>
                                                            </td>
                                                            <td width="20%"><button type="button"
                                                                    class="btn btn-default load_geo_address"
                                                                    data-lat="@{{c.lat}}" data-lng="@{{c.lng}}">Show
                                                                    Address</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="acceleration_report_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Device
                                            </h5>
                                            <h5 class="card-title text-center">@{{acceleration_result.length}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Acceleration Times</h5>
                                            <h5 class="card-title text-center">@{{total_acceleration_time}}</h5>

                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="acceleration_chart_container"></div>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="acceleration_report_table">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="25%">Device name</th>
                                            <th width="20%">Acceleration Time</th>
                                            <th width="10%">Speed(kph) </th>
                                            <th width="20%">Coordinate</th>
                                            <th width="20%">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="ov in acceleration_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{ov.d_name}} <a href="javascript:;" id="hb_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_hb_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td colspan='5'></td>

                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div id="hb_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in ov.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="25%">@{{c.device_name}}</td>
                                                            <td width="20%">@{{c.dt_tracker}}</td>
                                                            <td width="10%">@{{c.speed}}</td>
                                                            <td width="20%">
                                                                <a href="http://maps.google.com/maps?q=@{{c.lat}},@{{c.lng}}&amp;t=m"
                                                                    target="_blank">@{{c.lat}}°, @{{c.lng}}°</a>
                                                            </td>
                                                            <td width="20%"><button type="button"
                                                                    class="btn btn-default load_geo_address"
                                                                    data-lat="@{{c.lat}}" data-lng="@{{c.lng}}">Show
                                                                    Address</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="collision_report_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Device
                                            </h5>
                                            <h5 class="card-title text-center">0</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Collision Times</h5>
                                            <h5 class="card-title text-center">0</h5>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="collision_chart_container"></div>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="collision_report_table">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="25%">Device name</th>
                                            <th width="20%">Collision Time</th>
                                            <th width="10%">Speed(kph) </th>
                                            <th width="20%">Coordinate</th>
                                            <th width="20%">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="ov in collision_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{ov.d_name}} <a href="javascript:;" id="col_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_col_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td colspan='5'></td>

                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div id="col_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in ov.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="25%">@{{c.device_name}}</td>
                                                            <td width="20%">@{{c.dt_tracker}}</td>
                                                            <td width="10%">@{{c.speed}}</td>
                                                            <td width="20%">
                                                                <a href="http://maps.google.com/maps?q=@{{c.lat}},@{{c.lng}}&amp;t=m"
                                                                    target="_blank">@{{c.lat}}°, @{{c.lng}}°</a>
                                                            </td>
                                                            <td width="20%"><button type="button"
                                                                    class="btn btn-default load_geo_address"
                                                                    data-lat="@{{c.lat}}" data-lng="@{{c.lng}}">Show
                                                                    Address</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="traveled_report_section">

                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="traveled_report_chart_container"></div>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="mileage_report_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>Date</th>
                                            <th>Mileage (kmh)</th>
                                            <th>Speeding (times) </th>
                                            <th>Parking (times)</th>
                                            <th>Fuel (L)</th>
                                            <th>Fuel Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="r in report_result">
                                        <tr>
                                            <td width="5%">@{{$index+1}}</td>
                                            <td width="20%">@{{r.device_name}} <a href="javascript:;"
                                                    id="trvl_@{{$index+1}}"><span><i class="fa fa-plus"
                                                            id="row_class_trvl_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td width="30%">@{{r.start_date}} to @{{r.end_date}}</td>
                                            <td width="9%">@{{r.route_length}}</td>
                                            <td width="9%">@{{r.drives.length}}</td>
                                            <td width="9%">@{{r.stops.length}}</td>
                                            <td width="9%">@{{(r.my_fuel_consumption*r.route_length)}} L</td>
                                            <td width="9%">&#2547;
                                                @{{(r.my_fuel_consumption*r.route_length*r.my_fuel_cost)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8">
                                                <div id="trvl_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in r.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="20%"></td>
                                                            <td width="30%">@{{c[0].selected_date}}</td>
                                                            <td width="9%">@{{c[0].route_length}}</td>
                                                            <td width="9%">@{{c[0].drives.length}}</td>
                                                            <td width="9%">@{{c[0].stops.length}}</td>
                                                            <td width="9%">
                                                                @{{(r.my_fuel_consumption*c[0].route_length)}} L</td>
                                                            <td width="9%">&#2547;
                                                                @{{(r.my_fuel_consumption*c[0].route_length*r.my_fuel_cost)}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <!--end: Datatable -->

                            </div>

                        </div>

                        <div class="d-none report_section" id="traveled_overview_section">

                            <div class="row px-3 custom-row">
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center"></i>Device
                                                Quantity
                                            </h5>
                                            <h5 class="card-title text-center">{{$total_device_qty}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Traveled (KM)</h5>
                                            <h5 class="card-title text-center">@{{overall_traveled_overview}}</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Speeding</h5>
                                            <h5 class="card-title text-center">@{{overall_speeding}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Parking </h5>
                                            <h5 class="card-title text-center">@{{overall_parking}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Fuel Consumption</h5>
                                            <h5 class="card-title text-center">@{{overall_fuel_consumption}} L</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Fuel Cost</h5>
                                            <h5 class="card-title text-center">&#2547; @{{overall_fuel_cost}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="traveled_overview_chart_container"></div>
                                <table
                                    class="table table-striped mt-3 table-bordered table-hover table-checkable reporting_table mt-3"
                                    id="traveled_overview_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>Date</th>
                                            <th>Mileage (kmh)</th>
                                            <th>Speeding (times) </th>
                                            <th>Parking (times)</th>
                                            <th>Fuel (L)</th>
                                            <th>Fuel Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="r in traveled_overview_result">
                                        <tr>
                                            <td width="5%">@{{$index+1}}</td>
                                            <td width="20%">@{{r.device_name}} <a href="javascript:;"
                                                    id="ovrvw_trvl_@{{$index+1}}"><span><i class="fa fa-plus"
                                                            id="row_class_ovrvw_trvl_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td width="30%">@{{r.start_date}} to @{{r.end_date}}</td>
                                            <td width="9%">@{{r.route_length}}</td>
                                            <td width="9%">@{{r.drives.length}}</td>
                                            <td width="9%">@{{r.stops.length}}</td>
                                            <td width="9%">@{{(r.my_fuel_consumption*r.route_length)}} L</td>
                                            <td width="9%">&#2547;
                                                @{{(r.my_fuel_consumption*r.route_length*r.my_fuel_cost)}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" style="padding: 0.5rem 0">
                                                <div id="ovrvw_trvl_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in r.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="20%"></td>
                                                            <td width="30%">@{{c[0].selected_date}}</td>
                                                            <td width="9%">@{{c[0].route_length}}</td>
                                                            <td width="9%">@{{c[0].drives.length}}</td>
                                                            <td width="9%">@{{c[0].stops.length}}</td>
                                                            <td width="9%">
                                                                @{{(r.my_fuel_consumption*c[0].route_length)}} L</td>
                                                            <td width="9%">&#2547;
                                                                @{{(r.my_fuel_consumption*c[0].route_length*r.my_fuel_cost)}}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="overspeed_report_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Device
                                            </h5>
                                            <h5 class="card-title text-center">@{{overspeed_result.length}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Overspeed(times)</h5>
                                            <h5 class="card-title text-center">@{{total_total_overspeed_time}}</h5>

                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Speeding (Times)</h5>
                                            <h5 class="card-title text-center">0</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Parking (Times)</h5>
                                            <h5 class="card-title text-center">0</h5>
                                        </div>
                                    </div>

                                </div> -->

                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <div id="overspeed_report_chart_container"></div>
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="overspeed_report_table">
                                    <thead>
                                        <tr class="bg-secondary">
                                            <th width="5%">SL</th>
                                            <th width="25%">Device name</th>
                                            <th width="20%">GPS Time</th>
                                            <th width="10%">Speed(kph) </th>
                                            <th width="20%">Coordinate</th>
                                            <th width="20%">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="ov in overspeed_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{ov.d_name}} <a href="javascript:;" id="ovrspd_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_ovrspd_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td></td>
                                            <td colspan='3'> @{{ov.child.length}} times</td>

                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <div id="ovrspd_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in ov.child track by $index">
                                                            <td width="5%">@{{$index+1}}</td>
                                                            <td width="25%">@{{c.device_name}}</td>
                                                            <td width="20%">@{{c.dt_tracker}}</td>
                                                            <td width="10%">@{{c.speed}}</td>

                                                            <td width="20%">
                                                                <a href="http://maps.google.com/maps?q=@{{c.lat}},@{{c.lng}}&amp;t=m"
                                                                    target="_blank">@{{c.lat}}°, @{{c.lng}}°</a>
                                                            </td>
                                                            <td width="20%"><button type="button"
                                                                    class="btn btn-default load_geo_address"
                                                                    data-lat="@{{c.lat}}" data-lng="@{{c.lng}}">Show
                                                                    Address</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!--end: Datatable -->

                            </div>


                        </div>

                        <div class="d-none report_section" id="notification_log_section">

                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="notification_log_table">
                                    <thead>
                                        <tr>
                                            <th width="20px">SL</th>
                                            <th>Date</th>
                                            <th>Device name</th>
                                            <th>Notification name</th>
                                            <th>Coordinate</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="schedule_command_section">
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body text-dark">
                                        <ul class="nav nav-tabs position-relative">
                                            <li class="nav-item"><a data-toggle="tab" href="#schedule_for_command"
                                                    class="active nav-link">Schedule for command</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#schedule_command_history"
                                                    class="nav-link">History</a></li>
                                            <!-- <li class="nav-item"><a data-toggle="tab" href="#information" class="nav-link">Information</a></li> -->
                                            <a href="javascript:;"
                                                class="add_schedule_command btn btn-warning btn-sm custom-warning-btn">
                                                <i class="fas fa-plus mr-2"></i>New</a>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="schedule_for_command" role="tabpanel">

                                                <div class="kt-portlet__body">

                                                    <!--begin: Datatable -->
                                                    <table
                                                        class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                                        id="schedule_command_table">
                                                        <thead>
                                                            <tr>

                                                                <th>SL</th>
                                                                <th>Name</th>
                                                                <th>Command</th>
                                                                <th>Latest update</th>
                                                                <th>Device quantity</th>
                                                                <th>Status</th>
                                                                <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                    </table>

                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="schedule_command_history" role="tabpanel">

                                                <div class="kt-portlet__body">
                                                    <form action="" id="filterForm">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Enter name">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-12 py-3">
                                                                <select name="fuel_type" id="fuelType"
                                                                    class="form-control kt-select2-command">
                                                                    <option value="0">Select command</option>
                                                                    <option value="1">Octane</option>
                                                                    <option value="2">Diesel</option>
                                                                    <option value="3">Gas</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                                                                <input type="text" name="start_date"
                                                                    class="form-control text-center datepicker"
                                                                    id="start_date" placeholder="Enter start date"
                                                                    autocomplete="off" />
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                                                                <input type="text" name="end_date"
                                                                    class="form-control text-center datePicker2"
                                                                    id="end_date" placeholder="Enter end date"
                                                                    autocomplete="off" />
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-12 py-3">
                                                                <input type="reset" class="btn btn-danger btn-sm mr-3">
                                                                <button type="submit" id="check"
                                                                    class="btn btn-success btn-sm">Check</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="kt-portlet__body">

                                                    <!--begin: Datatable -->
                                                    <table
                                                        class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                                        id="schedule_command_history_table">
                                                        <thead>
                                                            <tr>

                                                                <th>SL</th>
                                                                <th>Name</th>
                                                                <th>Command</th>
                                                                <th>Latest update</th>
                                                                <th>Device quantity</th>
                                                                <th>Status</th>
                                                                <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td>2</td>
                                                                <td>63629-4697</td>
                                                                <td>Indonesia</td>
                                                                <td>Cihaur</td>
                                                                <td>01652 Fulton Trail</td>
                                                                <td>63629-4697</td>
                                                                <td>Indonesia</td>
                                                            </tr>
                                                            <tr>

                                                                <td>3</td>
                                                                <td>68084-123</td>
                                                                <td>Argentina</td>
                                                                <td>Puerto Iguazú</td>
                                                                <td>2 Pine View Park</td>
                                                                <td>68084-123</td>
                                                                <td>Argentina</td>
                                                            <tr>

                                                                <td>4</td>
                                                                <td>67457-428</td>
                                                                <td>Indonesia</td>
                                                                <td>Talok</td>
                                                                <td>3050 Buell Terrace</td>
                                                                <td>67457-428</td>
                                                                <td>Indonesia</td>
                                                            </tr>
                                                            <tr>

                                                                <td>5</td>
                                                                <td>31722-529</td>
                                                                <td>Austria</td>
                                                                <td>Sankt Andrä-Höch</td>
                                                                <td>3038 Trailsway Junction</td>
                                                                <td>31722-529</td>
                                                                <td>Austria</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-none report_section" id="schedule_report_section">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
                                    <span class="kt-portlet__head-icon">
                                        <i class="kt-font-brand flaticon2-line-chart"></i>
                                    </span>
                                    <h3 class="kt-portlet__head-title">
                                        Schedule Report List
                                    </h3>
                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <a href="#javascript:;" id="addScheduleReport" class="btn btn-success btn-sm"><i
                                            class="la la-plus mr-2"></i>Add schedule
                                    </a>

                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="schedule_report_table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Report name</th>
                                            <th>Report type</th>
                                            <th>Send email</th>
                                            <th>Device</th>
                                            <th>Time period</th>
                                            <th>Schedule</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="service_up_down_section">
                            <div class="row px-3 custom-row">
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Total Device
                                            </h5>
                                            <h5 class="card-title text-center">@{{total_device_count}}</h5>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/b.png")}}'">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Service Uptime (Online)</h5>
                                            <h5 class="card-title text-center">@{{total_uptime}}</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card custom-card"
                                        style="background-image: url('{{asset("assets/media/bg/v.png")}}'">
                                        <div class="card-body custom-card-body">
                                            <h5 class="card-title text-center">Service Downtime (Offline)</h5>
                                            <h5 class="card-title text-center">@{{total_downtime}}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__body">
                                <div id="service_up_down_donut_container"></div>
                                <hr>
                                <div id="service_up_down_chart_container"></div>
                                <!--begin: Datatable -->
                                <table class="table table-striped mt-3 table-bordered table-hover table-checkable"
                                    id="service_up_down_table">
                                    <thead>
                                        <tr>
                                            <th width="10%">SL</th>
                                            <th width="30%">Device</th>
                                            <th width="20%">Date & Time</th>
                                            <th width="20%">Service</th>
                                            <th width="20%">Duration </th>
                                        </tr>
                                    </thead>
                                    <tbody ng-repeat="s in service_up_down_result">
                                        <tr>
                                            <td>@{{$index+1}}</td>
                                            <td>@{{s.d_name}} <a href="javascript:;" id="uptime_@{{$index+1}}"><span><i
                                                            class="fa fa-plus" id="row_class_uptime_@{{$index+1}}">
                                                        </i></span></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <div id="uptime_extra_@{{$index+1}}" style="display:none;">
                                                    <table class="table table-striped mt-3 table-bordered table-hover">
                                                        <tr ng-repeat="c in s.child track by $index">
                                                            <td width="10%">@{{$index+1}}</td>
                                                            <td width="30%">@{{c.min_time}}</td>
                                                            <td width="20%">@{{c.max_time}}</td>
                                                            <td width="20%">Up</td>
                                                            <td width="20%">@{{c.uptime_duration}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>

                                <!--end: Datatable -->



                            </div>
                        </div>

                        <div class="d-none report_section" id="trip_report_section">
                            <div class="kt-portlet__body" id="printable_trip_report">
                                <div id="trip_chart"></div>
                                <div id="trip_content"></div>

                                <!--end: Datatable -->

                            </div>

                        </div>

                        <div class="d-none report_section" id="trip_with_map_history_section">
                            <div class="kt-portlet__body" id="printable_trip_with_map_history">
                                <div id="trip_with_map_history_chart"></div>
                                <div id="trip_with_map_history_content">

                                </div>

                                <!--end: Datatable -->

                            </div>
                        </div>

                        <div class="d-none report_section" id="fuel_report_section">
                            <div class="kt-portlet__body">
                                <div id="fuel_chart_container"></div>
                            </div>
                        </div>

                        <div class="d-none" id="export_repor_section">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">

                                </div>
                                <div class="kt-portlet__head-toolbar">
                                    <input type="hidden" id="export_current_data_rel">
                                    <a href="javascript:;" id="print_current_section"
                                        class="btn btn-info btn-sm mr-2">Print
                                    </a>
                                    <a href="javascript:;" onClick="CreatePDFfromHTML('trip_content')"
                                        class="btn btn-danger btn-sm mr-2">PDF
                                    </a>
                                    <a href="javascript:;" id="excel_current_section"
                                        class="btn btn-success btn-sm">Excel
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Best Sellers-->
                </div>
            </div>

            <!--End::Row-->

            <div class="d-none report_section" id="dashboard_section">
                <div class="row">
                    <div class="col-lg-6" style="height:350px">

                        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid custom-gif-bg"
                            style="background-image: url('{{asset("assets/media/gif/car_gif.gif")}}')">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                            <div class="kt-portlet__head ">
                                <div class="kt-portlet__head-label">
                                    <h5 class="kt-portlet__head-title">At a glance</h5>
                                </div>
                            </div>

                            <div class="kt-portlet__body">
                                <div class="row custom-at-a-glance">
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"></i> Travel Time (KM)
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_travel_time}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center">Engine Run Time
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_engine_run_time}}
                                                </h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Engine Idle Time
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_engine_stop_time}}
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"></i> Stop Count</h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_stop}}</h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Overspeed Count</h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_overspeed}}</h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Fuel Consumption
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_fuel_consumption}}
                                                    L</h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"></i> Engine
                                                    Acceleration</h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_acceleration}}
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Harsh Breaking</h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_harsh_break}}</h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="card custom-card"
                                            style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Collision Count
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_total_collision}}</h5>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  <div class="row">
                    <div class="col-lg-12">

                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Fleet management
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">

                                <div class="row custom-at-a-glance2">
                                    <div class="col-md-3">
                                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"></i> Fuel Cost
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_result.total_fuel_cost}}</h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center"> Others Expense
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_result.total_other_expense}}</h5>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center">Paper Expiring
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_result.total_paper_expiring}}</h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title text-center">Upcomimg Maintenance
                                                </h5>
                                                <h5 class="card-title text-center">@{{dashboard_result.total_upcoming_maintenance}}</h5>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-6">

                        <!--begin:: Widgets/Profit Share-->
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h4 class="kt-widget14__title">
                                        Driver Info
                                    </h4>
                                </div>
                                <div class="kt-widget14__content">
                                    <!-- <img class="custom-image" id="driver_img" src="{{asset('assets/media/users/100_3.jpg')}}" alt="Image"> -->
                                    <div class="kt-widget14__chart">
                                        <img class="custom-image" id="driver_img"
                                            src="{{asset('assets/media/users/100_3.jpg')}}" alt="Image"
                                            style="border-radius:10px">
                                    </div>
                                    <div class="kt-widget14__legends">
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet kt-bg-success"></span>
                                            <span class="kt-widget14__stats">37% Sport Tickets</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet kt-bg-warning"></span>
                                            <span class="kt-widget14__stats">47% Business Events</span>
                                        </div>
                                        <div class="kt-widget14__legend">
                                            <span class="kt-widget14__bullet kt-bg-brand"></span>
                                            <span class="kt-widget14__stats">19% Others</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end:: Widgets/Profit Share-->
                    </div>
                    <div class="col-lg-6">

                        <!--begin:: Widgets/Revenue Change-->
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h3 class="kt-widget14__title">
                                        Driving Behaviour
                                    </h3>
                                </div>
                                <div class="kt-widget14__content">
                                    <div id="dashboard_donut_container"></div>
                                </div>
                            </div>
                        </div>

                        <!--end:: Widgets/Revenue Change-->
                    </div>
                    <div class="col-12">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14__content">
                                <div id="dashboard_chart_container"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Content -->
        <div class="d-none" id="load_schedule_report_content">

        </div>
    </div>



    <!-- Modal -->
    <div class="modal" id="scheduleCommandModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" style="width:50%">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Add Schedule Command</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="saveFuelLogForm">
                    <div class="modal-body  text-dark">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row" style="border-bottom: 1px solid #ddd">
                                    <label class="col-sm-12 col-form-label">Configuration</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Command name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="refill_date" class="form-control"
                                            placeholder="Please enter name" autocomplete="off" />
                                        <small id="refill_date-error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-12 col-form-label">Command type</label>
                                    <div class="col-sm-12">
                                        <select name="vehicle_no" id="vehicle_no" class="form-control kt-select2-2">
                                            <option value="0">Select</option>

                                        </select>
                                        <small id="vehicle_no-error" class="text-danger"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="kt-checkbox kt-checkbox--solid">
                                            <input type="checkbox" name="daily_weekly"> Daily
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">From</label>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="start_hour" id="start_hour"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="start_hour" id="start_min"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">To</label>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="end_hour" id="end_hour" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}"
                                                        {{($i==23) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="end_min" id="end_min" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=59; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}"
                                                        {{($i==59) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="kt-checkbox kt-checkbox--solid">
                                            <input type="checkbox" name="daily_weekly"> Weekly
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-12 d-none">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">From</label>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="start_hour" id="start_hour"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="start_hour" id="start_min"
                                                    class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}">
                                                        {{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-4 col-form-label">To</label>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="end_hour" id="end_hour" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=23; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}"
                                                        {{($i==23) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="col-sm-4 custom-select-2">
                                                <select name="end_min" id="end_min" class="form-control kt-select2-2">
                                                    @for($i=0; $i<=59; $i++) <option value="{{($i<=9) ? '0'.$i: $i}}"
                                                        {{($i==59) ? 'selected': ''}}>{{($i<=9) ? '0'.$i: $i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group row" style="border-bottom: 1px solid #ddd">
                                    <label class="col-sm-12 col-form-label">Device List</label>
                                </div>
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <!-- <div class="custom-buttons ml-1">
                                    <a href="javascript:;" class="custom-buttons-list" title="Reload" ">
                                        <i class=" fas fa-sync-alt mr-1 pl-2"></i>
                                    </a>
                                    <a href="javascript:;" class="custom-buttons-list" title="Add object">
                                        <i class="fas fa-plus pr-2"></i>
                                    </a>
                                </div> -->
                                    <div class="kt-quick-search__form custom-kt-quick-search__form">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                        class="flaticon2-search-1 custom-search-icon"></i></span>
                                            </div>
                                            <input type="text" class="form-control kt-quick-search__input"
                                                placeholder="Search device">
                                            <div class="input-group-append"><span class="input-group-text"><i
                                                        class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300"
                                        data-mobile-height="200">
                                    </div>


                                </div>

                                <div class="accordion mt-2" id="accordionExample">
                                    <div class="">
                                        <div class="group-heading" id="headingOne">
                                            <h5 class="demo-heading">
                                                <label class="kt-checkbox kt-checkbox--solid">
                                                    <input type="checkbox" id="group-checkbox">
                                                    <span></span>
                                                </label>
                                                <a class="custom-card-title" data-toggle="collapse" href="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">Defult
                                                    group
                                                </a>
                                                <a class="collaplse-arrow custom-link-color" id="collaplse-arrow_all"
                                                    data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne"><i id="arrow-sign_all "
                                                        class="arrow-sign fas fa-caret-down"></i>
                                                </a>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show  groupwise_device_list"
                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="">
                                                <ul class="list-group">
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5232</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5284</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                    <li
                                                        class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <label class="kt-checkbox kt-checkbox--solid">
                                                                <input type="checkbox" class="group-checked">
                                                                <span></span>
                                                            </label>
                                                            <span class="custom-data-span">Dm KA 52-5236</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form content end -->
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm"
                            data-dismiss="modal">Cancel</button>
                        <button type="button" id="submitFuelLog"
                            class="btn btn-success btn-sm float-right">Save</button>
                        <!-- <button type="button" id="submitFuelLog" class="btn btn-success btn-sm float-right" value="Save"> -->
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="scheduleReportModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Add Schedule report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" id="seduleReportForm">
                    @csrf
                    <div class="modal-body">
                        <div class="kt-section__body text-dark">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" row ">
                                        <h6 class=" ml-3 custom-link-color">Report</h6>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Report name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="report_name" name="report_name"
                                                placeholder="Enter report name">
                                            <small id="report_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Report type</label>
                                        <div class="col-lg-8">
                                            <select class="form-control kt-select2" id="report_type" name="report_type">
                                                <option value="">Select</option>
                                            </select>
                                            <small id="report_type-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Device</label>
                                        <div class="col-lg-8">
                                            <input type="hidden" id="device_item_list" name="device">

                                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                                data-clickable-groups="true" data-collapse-groups="true"
                                                data-width="100%" id="scheduleDevice">
                                                <option value="">Select</option>
                                            </select>
                                            <small id="device-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class=" row form-group d-none" id="sensore_field">
                                        <label class="col-form-label col-lg-4">Sensor</label>
                                        <div class="col-lg-8">
                                            <input type="hidden" id="sensor_item_list" name="sensor">

                                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                                data-clickable-groups="true" data-collapse-groups="true"
                                                data-width="100%" id="sensorList">
                                                <option value="">Select</option>
                                            </select>
                                            <small id="sensor-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Zone</label>
                                        <div class="col-lg-8">
                                            <input type="hidden" id="zone_item_list" name="zone">
                                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                                data-clickable-groups="true" data-collapse-groups="true"
                                                data-width="100%" id="zoneList">
                                                <option value="">Select</option>
                                            </select>
                                            <small id="zone-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Data Item</label>
                                        <div class="col-lg-8">
                                            <input type="hidden" id="data_item_list" name="data_item">
                                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                                data-clickable-groups="true" data-collapse-groups="true"
                                                data-width="100%" id="dataItem">
                                            </select>
                                            <small id="data_item-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Report Status</label>
                                        <div class="col-lg-8">
                                            <select class="form-control kt-select2" id="report_status"
                                                name="report_status">
                                                <option value="1">Running</option>
                                                <option value="2">Pause</option>
                                                <option value="0">Stop</option>
                                            </select>
                                            <small id="report_status-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" row ">
                                        <h6 class=" ml-3 custom-link-color">Schedule</h6>
                                    </div>

                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Report format</label>
                                        <div class="col-lg-8">
                                            <select class="form-control kt-select2" id="report_format"
                                                name="report_format">
                                                <option value="1">HTML</option>
                                                <option value="2">PDF</option>
                                                <option value="3">XLS</option>
                                            </select>
                                            <small id="report_format-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class=" row form-group">
                                        <label class="col-form-label col-lg-4">Stop time</label>
                                        <div class="col-lg-8">
                                            <select class="form-control kt-select2" id="stop_time" name="stop_time">
                                                <option value="1">> 1 min</option>
                                                <option value="2">> 2 min</option>
                                                <option value="5">> 5 min</option>
                                                <option value="10">> 10 min</option>
                                                <option value="20">> 20 min</option>
                                                <option value="30">> 30 min</option>
                                                <option value="60">> 1 hour</option>
                                                <option value="120">> 2 hours</option>
                                                <option value="300">> 5 hours</option>
                                            </select>
                                            <small id="stop_time-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Speed limit</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="speed_limit"
                                                    name="speed_limit" placeholder="Enter speed limit">
                                                <div class="input-group-append"><span
                                                        class="input-group-text">kmh</span>
                                                </div>
                                            </div>
                                            <small id="speed_limit-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Send to email</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="send_email" name="send_email"
                                                placeholder="Enter send email">
                                            <small id="send_email-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Daily</label>
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                                <input type="radio" class="schedule_for_report" name="schedule"
                                                    value="daily">
                                                <span></span>
                                            </label>

                                        </div>
                                        <label class=" col-form-label col-md-2">Weekly</label>
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                                <input type="radio" class="schedule_for_report" id="schedule"
                                                    name="schedule" value="weekly" checked>
                                                <span></span>
                                            </label>

                                        </div>
                                        <label class=" col-form-label col-md-2">Monthly</label>
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                                <input type="radio" class="schedule_for_report" name="schedule"
                                                    value="monthly">
                                                <span></span>
                                            </label>

                                        </div>
                                    </div>

                                    <div class=" form-group row">
                                        <label class="col-form-label col-md-4">Show coordinates</label>
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                                <input type="checkbox" id="show_coordinates" name="show_coordinates">
                                                <span></span>
                                            </label>
                                        </div>
                                        <label class=" col-form-label col-md-4">Show addresses</label>
                                        <div class="col-md-2">
                                            <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                                <input type="checkbox" id="show_addresses" name="show_addresses">
                                                <span></span>
                                            </label>

                                        </div>
                                    </div>

                                    <div class=" row ">
                                        <h6 class=" ml-3 custom-link-color">Time Period</h6>
                                    </div>

                                    <div class=" row form-group">
                                        <label class="col-form-label col-md-4">Filter</label>
                                        <div class="col-md-8">
                                            <select class="form-control kt-select2" id="filter" name="filter">
                                                <option value="0">Today</option>
                                                <option value="1">Yesterday</option>
                                                <option value="2">Last 3 days</option>
                                                <option value="3">This week</option>
                                                <option value="4">Last week</option>
                                                <option value="5">This month</option>
                                                <option value="6">Last month</option>
                                            </select>
                                            <small id="filter-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Time from
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group date">
                                                <input type="text" name="start_date" id="schedule_start_date"
                                                    class="form-control datePicker1_1" autocomplete="off" />
                                            </div>
                                            <small id="start_date-error" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group ">
                                                <input type="text" id="start_time" name="start_time"
                                                    class="form-control timepicker" value="12:00:00 AM" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4">Time to </label>
                                        <div class="col-md-4">
                                            <div class="input-group date">
                                                <input type="text" name="end_date" id="schedule_end_date"
                                                    class="form-control datePicker2_1" autocomplete="off" />
                                            </div>
                                            <small id="end_date-error" class="text-danger"></small>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group ">
                                                <input type="text" id="end_time" name="end_time"
                                                    class="form-control timepicker" value="11:59:59 PM" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                    </div>
                </form>
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
    <script src="{{asset('assets/js/angular.min.js')}}"></script>
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
    <script src="{{asset('assets/js/optional/bootstrap-multiselect.js')}}"></script>

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
    <script src="{{asset('assets/js/pages/select2.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-contextmenu.js')}}"></script>
    <script src="{{asset('assets/js/pages/jquery.table2excel.js')}}"></script>
    <script src="{{asset('assets/js/pages/jquery.tableToExcel.js')}}"></script>
    <script src="{{asset('assets/js/business/treeview.js')}}"></script>
    <script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/jquery-ui.js')}}"></script>

    <!--end::Page Scripts -->

    <!-- begin:: datatables -->
    <script src="{{asset('assets/js/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/datatables/paginations.js')}}"></script>
    <!-- end:: datatables -->

    <script>
    var app = angular.module('reportApp', []);
    app.controller('reportCtrl', function($scope, $http, $window, $interval) {
        console.log("angular is working");
        $scope.overall_traveled_overview = 0;
        $scope.overall_speeding = 0;
        $scope.overall_parking = 0;
        $scope.overall_fuel_consumption = 0;
        $scope.overall_fuel_cost = 0;

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }


        angular.element(document).ready(function() {
            $scope.dashboard_result = {};
            $scope.dashboard_result.total_acceleration = 0;
            $scope.dashboard_result.total_collision = 0;
            $scope.dashboard_result.total_engine_run_time = "0 s";
            $scope.dashboard_result.total_engine_stop_time = "0 s";
            $scope.dashboard_result.total_fuel_consumption = 0;
            $scope.dashboard_result.total_fuel_cost = 0;
            $scope.dashboard_result.total_harsh_break = 0;
            $scope.dashboard_result.total_other_expense = 0;
            $scope.dashboard_result.total_overspeed = 0;
            $scope.dashboard_result.total_paper_expiring = 0;
            $scope.dashboard_result.total_stop = 0;
            $scope.dashboard_result.total_travel_time = 0;
            $scope.dashboard_result.total_upcoming_maintenance = 0;

            $scope.dashboard_total_acceleration = 0;
            $scope.dashboard_total_collision = 0;
            $scope.dashboard_total_engine_run_time = 0;
            $scope.dashboard_total_engine_stop_time = 0;
            $scope.dashboard_total_fuel_consumption = 0;
            $scope.dashboard_total_fuel_cost = 0;
            $scope.dashboard_total_harsh_break = 0;
            $scope.dashboard_total_other_expense = 0;
            $scope.dashboard_total_overspeed = 0;
            $scope.dashboard_total_paper_expiring = 0;
            $scope.dashboard_total_stop = 0;
            $scope.dashboard_total_travel_time = 0;
            $scope.dashboard_total_upcoming_maintenance = 0;

            $scope.total_device_count = 0;
            $scope.total_uptime = '0';
            $scope.total_downtime = '0';


            $scope.$apply();
            window.trip_summary = [];
            var trip_summary_data;
            var report_type = getParameterByName('report_type');
            var report_name = getParameterByName('report_name');
            var imei = getParameterByName('imei');
            if (report_name != undefined && report_type != undefined && imei != undefined) {
                var page_id = '#' + report_name;
                var page_view = '#' + report_name + '_section';
                var menu_id = '#' + report_type;
                $(page_id).parent().addClass('kt-menu__item--active');
                $(".kt-menu__item--submenu").not(menu_id).removeClass('kt-menu__item--open');
                $(menu_id).addClass('kt-menu__item--open');
                $(page_view).removeClass('d-none');
                if (report_name == 'device_manage' || report_name == 'schedule_command') {
                    $('#filterSection').addClass('d-none');
                } else {
                    $('#filterSection').removeClass('d-none');
                }
                var breadcrumb = report_name.replace('_', ' ');
                $('#breadcrumb').html(breadcrumb);
                $("#current_data_rel").val(report_name);
                $("#export_current_data_rel").val(report_name);
                $("#device_list").val(imei);
                console.log(imei);
                $("#device_list").trigger('change');

            } else if (report_name != undefined && report_type != undefined && imei == undefined) {
                var page_id = '#' + report_name;
                var page_view = '#' + report_name + '_section';
                var menu_id = '#' + report_type;
                $(page_id).parent().addClass('kt-menu__item--active');
                $(".kt-menu__item--submenu").not(menu_id).removeClass('kt-menu__item--open');
                $(menu_id).addClass('kt-menu__item--open');
                $(page_view).removeClass('d-none');
                if (report_name == 'device_manage' || report_name == 'schedule_command') {
                    $('#filterSection').addClass('d-none');
                } else {
                    $('#filterSection').removeClass('d-none');
                }
                var breadcrumb = report_name.replace('_', ' ');
                $('#breadcrumb').html(breadcrumb);
                $("#current_data_rel").val(report_name);
                $("#export_current_data_rel").val(report_name);

            } else if (report_name != undefined && report_type == undefined && imei == undefined) {
                var page_id = '#' + report_name;
                var page_view = '#' + report_name + '_section';
                $(page_id).parent().addClass('kt-menu__item--active');
                $(".kt-menu__item--submenu").removeClass('kt-menu__item--open');
                $(page_view).removeClass('d-none');
                if (report_name == 'device_manage' || report_name == 'schedule_command') {
                    $('#filterSection').addClass('d-none');
                    $('#export_repor_section').addClass('d-none');
                } else if (report_name == 'schedule_report') {
                    schedule_report_datalist();
                    $('#export_repor_section').addClass('d-none');
                } else {
                    $('#filterSection').removeClass('d-none');
                }
                var breadcrumb = report_name.replace('_', ' ');
                $('#breadcrumb').html(breadcrumb);
                $("#current_data_rel").val(report_name);
                $("#export_current_data_rel").val(report_name);

            } else {

                $("#dashboard").parent().addClass('kt-menu__item--active');
                $(".kt-menu__item--submenu").removeClass('kt-menu__item--open');
                $('#dashboard_section').removeClass('d-none');
                $('#export_repor_section').removeClass('d-none');
                $('#filterSection').removeClass('d-none');
                $("#current_data_rel").val('dashboard');
                $("#export_current_data_rel").val('dashboard');
            }


            $(".report_menu_item").each(function(index) {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    var page_section = '#' + $(this).data('rel') + '_section';
                    $(".report_menu_item").not($(this)).parent().removeClass(
                        'kt-menu__item--active');

                    $(this).parent().addClass('kt-menu__item--active');
                    $('.report_section').not(page_section).addClass('d-none');
                    $(page_section).removeClass('d-none');
                    if ($(this).data('rel') == 'device_manage') {
                        $('#filterSection').addClass('d-none');
                        $('#export_repor_section').addClass('d-none');
                        device_manage();
                        device_at_a_glance();
                    } else if ($(this).data('rel') == 'schedule_command') {
                        $('#filterSection').addClass('d-none');
                        $('#export_repor_section').addClass('d-none');
                    } else if ($(this).data('rel') == 'device_status_log') {
                        device_status_log();
                        $('#filterSection').addClass('d-none');
                        $('#export_repor_section').addClass('d-none');
                    } else if ($(this).data('rel') == 'schedule_report') {
                        schedule_report_datalist();
                        $('#export_repor_section').addClass('d-none');
                    } else if ($(this).data('rel') == 'alert_details') {
                        $('#alert_type_selection').toggleClass('d-none d-flex');
                    } else {
                        $('#filterSection').removeClass('d-none');
                        $('#export_repor_section').removeClass('d-none');
                    }
                    var breadcrumb = $(this).data('rel').replace('_', ' ');
                    $('#breadcrumb').html(breadcrumb);
                    $("#current_data_rel").val($(this).data('rel'));
                    $("#export_current_data_rel").val($(this).data('rel'));
                });
            });

            $("body").on('click', '.load_geo_address', function() {
                var address_div = $(this).parent();
                address_div.html('Loading...');
                $.get("../dashboard/findAddress/" + $(this).data('lat') + "/" + $(this).data(
                        'lng'))
                    .done(function(res) {
                        address_div.html(JSON.parse(res));
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        address_div.html('na');
                    });
            });

            $('.kt-select2').select2({
                placeholder: "Select"
            });
            $('#device_list').select2({
                closeOnSelect: false,
                placeholder: "Select device"
            });

            $('.kt-select2-command').select2({
                placeholder: "Select command"
            });

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

            $(".timepicker").timepicker({
                defaultTime: "12:00:00 AM",
                minuteStep: 1,
                showSeconds: true,
                showMeridian: true,
            });

            $('.datePicker1').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            }).on('changeDate', function() {
                $('#end_date').focus();
                console.log('closed');

            });

            $('.datePicker2').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $(".timepicker_1").timepicker({
                minuteStep: 1,
                defaultTime: "",
                showSeconds: true,
                showMeridian: false,
                snapToStep: true,
            });

            $('.custom-button-class').removeClass('btn-secondary');

            var start_date = moment().format('YYYY-MM-DD');
            var end_date = moment().format('YYYY-MM-DD');
            $('#start_date').val(start_date);
            $('#end_date').val(end_date);


        });

        $('.add_schedule_command').click(function() {
            $('#scheduleCommandModal').modal('show')
        })

        $('#addScheduleReport').click(function() {
            event.preventDefault();
            var typeId = $('#report_type').val();
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ url('dashboard/getReportTypeData') }}",
                success: function(response) {
                    $('#report_type').html(response.htmlContent);
                    $('#scheduleDevice').html(response.htmlContent2);
                    $('#zoneList').html(response.htmlContent3);
                    $('.mt-multiselect').multiselect({
                        enableClickableOptGroups: true,
                        enableCollapsibleOptGroups: true,
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        enableCaseInsensitiveFiltering: true
                    });
                    $('#scheduleReportModal').modal('show')

                },
                error: function(reject) {
                    errorMsg();
                }
            });

        })

        $('#report_type').change(function(event) {
            event.preventDefault();
            var typeId = $('#report_type').val();

            if (typeId == 7) {
                $('#sensore_field').removeClass('d-none');
            } else {
                $('#sensore_field').addClass('d-none');
            }

            $.ajax({
                type: "GET",
                dataType: "html",
                url: "{{ url('dashboard/getReportTypeDataItem') }}/" + typeId,
                success: function(response) {
                    $('#dataItem').html(response).multiselect('rebuild');

                },
                error: function(reject) {
                    errorMsg();
                }
            });

        });

        $('#scheduleDevice').change(function(event) {
            event.preventDefault();
            var typeId = $('#report_type').val();

            if (typeId == 7) {
                var devices = $('#scheduleDevice').val().join();
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ url('dashboard/getSensorTypeData') }}/" + devices,
                    success: function(response) {
                        $('#sensorList').html(response.htmlContent).multiselect('rebuild');
                    },
                    error: function(reject) {
                        errorMsg();
                    }
                });
            }

        });


        $('#filter').change(function(event) {
            var start_date = '';
            var end_date = '';
            var data = $("#filter").val();
            if (data == 0) {
                start_date = moment().format('DD MMM YYYY');
                end_date = moment().format('DD MMM YYYY');

            } else if (data == 1) {
                start_date = moment().subtract(1, 'days').format('DD MMM YYYY');
                end_date = moment().subtract(1, 'days').format('DD MMM YYYY');

            } else if (data == 2) {
                start_date = moment().subtract(2, 'days').format('DD MMM YYYY');
                end_date = moment().format('DD MMM YYYY');

            } else if (data == 3) {
                start_date = moment().startOf('week').format('DD MMM YYYY');
                end_date = moment().endOf('week').format('DD MMM YYYY');
            } else if (data == 4) {
                start_date = moment().subtract(1, 'week').startOf('week').format(
                    'DD MMM YYYY');
                end_date = moment().subtract(1, 'week').endOf('week').format('DD MMM YYYY');

            } else if (data == 5) {
                start_date = moment().startOf('month').format('DD MMM YYYY');
                end_date = moment().endOf('month').format('DD MMM YYYY');

            } else if (data == 6) {
                start_date = moment().subtract(1, 'months').startOf('month').format(
                    'DD MMM YYYY');
                end_date = moment().subtract(1, 'months').endOf('month').format(
                    'DD MMM YYYY');

            }

            $('#schedule_start_date').val(start_date);
            $('#schedule_end_date').val(end_date);
        });

        $('#seduleReportForm').submit(function(event) {
            event.preventDefault();
            var device = $('#scheduleDevice').val().join();
            $('#device_item_list').val(device);
            var sensor = $('#sensorList').val().join();
            $('#sensor_item_list').val(sensor);
            var zone = $('#zoneList').val().join();
            $('#zone_item_list').val(zone);
            var dataItem = $('#dataItem').val().join();
            $('#data_item_list').val(dataItem);
            var id = 0;
            $("[id$=-error]").text('');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/saveSeduleReportData') }}/" + id,
                data: $('#seduleReportForm').serialize(),
                success: function(response) {
                    successMsg('Schedule report created successfully.');
                    $('#scheduleReportModal').modal('hide');
                    $('#schedule_report_table').DataTable().ajax.reload();
                    $('#seduleReportForm')[0].reset();
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

        $(".dayFilter").each(function(index) {
            $(this).on('click', function(e) {
                var start_date = '';
                var end_date = '';
                var data = $(this).data('rel')
                if (data == 0) {
                    start_date = moment().format('YYYY-MM-DD');
                    end_date = moment().format('YYYY-MM-DD');

                } else if (data == 1) {
                    start_date = moment().subtract(1, 'days').format('YYYY-MM-DD');
                    end_date = moment().subtract(1, 'days').format('YYYY-MM-DD');

                } else if (data == 2) {
                    start_date = moment().subtract(2, 'days').format('YYYY-MM-DD');
                    end_date = moment().format('YYYY-MM-DD');

                } else if (data == 3) {
                    start_date = moment().startOf('week').format('YYYY-MM-DD');
                    end_date = moment().endOf('week').format('YYYY-MM-DD');
                } else if (data == 4) {
                    start_date = moment().subtract(1, 'week').startOf('week').format(
                        'YYYY-MM-DD');
                    end_date = moment().subtract(1, 'week').endOf('week').format('YYYY-MM-DD');

                } else if (data == 5) {
                    start_date = moment().startOf('month').format('YYYY-MM-DD');
                    end_date = moment().endOf('month').format('YYYY-MM-DD');

                } else if (data == 6) {
                    start_date = moment().subtract(1, 'months').startOf('month').format(
                        'YYYY-MM-DD');
                    end_date = moment().subtract(1, 'months').endOf('month').format(
                        'YYYY-MM-DD');

                }


                $('#start_date').val(start_date);
                $('#end_date').val(end_date);
            });
        });

        $scope.showSingleReport = function(device_imei, device_name, start_date, end_date) {
            /* $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('dashboard/singlereport/mileage/2') }}",
                data: {
                    'device_imei': device_imei,
                    'device_name': device_name,
                    'start_date': start_date,
                    'end_date':  end_date,
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                },
                success: function(response) {
                    $scope.single_report_result = response;
                    $scope.$apply();
                    console.log($scope.single_report_result);
                },
                error: function(reject) {
                    errorMsg();

                }
            }); */
        }
        $scope.showReport = function() {
            // var device_val = $("#device_list").val();
            // var device;
            // if(device_val > 0){
            //     device_val =
            // }
            var currrent_section = $("#current_data_rel").val() + '_section';
            var current_report = $("#current_data_rel").val();
            var ajax_url = "";
            var post_data = {};
            var data_type = "json";
            if (current_report == 'traveled_overview') {
                ajax_url = "{{ url('dashboard/showreport/mileage/2') }}";
                post_data = {
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'traveled_report') {
                ajax_url = "{{ url('dashboard/showreport/mileage/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'overspeed_report') {
                ajax_url = "{{ url('dashboard/showreport/overspeed/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'harsh_breaking') {
                ajax_url = "{{ url('dashboard/showreport/harshbreak/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'acceleration_report') {
                ajax_url = "{{ url('dashboard/showreport/acceleration/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'collision_report') {
                ajax_url = "{{ url('dashboard/showreport/collision/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'service_up_down') {
                ajax_url = "{{ url('dashboard/showreport/service_up_down/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'driving_behaviour') {
                ajax_url = "{{ url('dashboard/showreport/drivingbehaviour/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'trip_report') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/trip/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'trip_with_map_history') {
                $("#trip_with_map_history_content").html('');
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/report_with_map/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'dashboard') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/report_dashboard/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'alert_overview') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/alert_overview/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'alert_report') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/alert_report/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'engine_overview') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/engine_overview/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'engine_report') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/engine_report/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'geocoding_report') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/geocoding_report/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'alert_details') {
                data_type = "json";
                ajax_url = "{{ url('dashboard/showreport/alert_details/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'alert_type': $("#alert_type").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'fuel_report') {
                ajax_url = "{{ url('dashboard/showreport/fuel/2') }}";
                post_data = {
                    'device_list': $("#device_list").val(),
                    'start_date': $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    'end_date': $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: "{{ csrf_token() }}",
                    _method: "POST"
                };
            } else if (current_report == 'notification_log') {

                notification_log_data();
            } else if (current_report == 'schedule_report') {

                schedule_report_datalist();
            }

            load_spinner('show', 'show_loader', '');
            $.ajax({
                type: "POST",
                dataType: data_type,
                url: ajax_url,
                data: post_data,
                success: function(response) {
                    if (current_report == 'traveled_report') {
                        $scope.report_result = response;
                        var data_for_graph_single = [];
                        for (var x = 0; x < response.length; x++) {
                            data_for_graph_single.push({
                                device_name: response[x].device_name,
                                total_travel: response[x].route_length,
                                total_speeding: response[x].drives.length,
                                total_parking: response[x].stops.length
                            });
                        }

                        var traveled_report_chart = c3.generate({
                            bindto: '#traveled_report_chart_container',
                            data: {
                                json: data_for_graph_single,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_travel', 'total_speeding',
                                        'total_parking'
                                    ],
                                },
                                axes: {
                                    'total_parking': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_parking': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });
                    } else if (current_report == 'traveled_overview') {
                        $scope.traveled_overview_result = response;
                        $scope.overall_traveled_overview = $scope.getTotal(response)
                            .total_distance;
                        $scope.overall_speeding = $scope.getTotal(response).total_speeding;
                        $scope.overall_parking = $scope.getTotal(response).total_parking;
                        $scope.overall_fuel_consumption = $scope.getTotal(response)
                            .total_fuel_consumption;
                        $scope.overall_fuel_cost = $scope.getTotal(response).total_fuel_cost;
                        console.log($scope.traveled_overview_result);
                        var data_for_graph = [];
                        for (var x = 0; x < response.length; x++) {
                            data_for_graph.push({
                                device_name: response[x].device_name,
                                total_travel: response[x].route_length,
                                total_speeding: response[x].drives.length,
                                total_parking: response[x].stops.length
                            });
                        }

                        var traveled_overview_chart = c3.generate({
                            bindto: '#traveled_overview_chart_container',
                            data: {
                                json: data_for_graph,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_travel', 'total_speeding',
                                        'total_parking'
                                    ],
                                },
                                axes: {
                                    'total_parking': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_parking': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });

                    } else if (current_report == 'overspeed_report') {
                        $scope.overspeed_result = []; // response;
                        const groupBy = (array, key) => {
                            return array.reduce((result, currentValue) => {
                                (result[currentValue[key]] = result[currentValue[
                                    key]] || []).push(currentValue);
                                return result;
                            }, {});
                        };

                        // Group by color as key to the person array
                        const dataGroupByDevice = groupBy(response, 'device_name');
                        Object.keys(dataGroupByDevice).forEach(function(key) {
                            $scope.overspeed_result.push({
                                'd_name': key,
                                'child': dataGroupByDevice[key]
                            });
                        });

                        console.log($scope.overspeed_result);
                        $scope.total_total_overspeed_time = 0;
                        var data_for_graph_overspeed = [];
                        for (var x = 0; x < $scope.overspeed_result.length; x++) {
                            var my_speed = 0;
                            for (var y = 0; y < $scope.overspeed_result[x].child.length; y++) {
                                my_speed += parseInt($scope.overspeed_result[x].child[y].speed);
                            }
                            var avg_speed = parseInt(my_speed / $scope.overspeed_result[x].child
                                .length);
                            $scope.total_total_overspeed_time += parseInt($scope
                                .overspeed_result[x].child.length);
                            data_for_graph_overspeed.push({
                                device_name: $scope.overspeed_result[x].d_name,
                                total_overspeed_times: $scope.overspeed_result[x].child
                                    .length,
                                total_avg_speed: avg_speed
                            });
                        }

                        var overspeed_report_chart = c3.generate({
                            bindto: '#overspeed_report_chart_container',
                            data: {
                                json: data_for_graph_overspeed,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_avg_speed', 'total_overspeed_times'],
                                },
                                axes: {
                                    'total_overspeed_times': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_overspeed_times': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });
                    } else if (current_report == 'harsh_breaking') {
                        $scope.harshbreak_result = []; // response;
                        const groupBy = (array, key) => {
                            return array.reduce((result, currentValue) => {
                                (result[currentValue[key]] = result[currentValue[
                                    key]] || []).push(currentValue);
                                return result;
                            }, {});
                        };

                        // Group by color as key to the person array
                        const dataGroupByDevice = groupBy(response, 'device_name');
                        Object.keys(dataGroupByDevice).forEach(function(key) {
                            $scope.harshbreak_result.push({
                                'd_name': key,
                                'child': dataGroupByDevice[key]
                            });
                        });

                        console.log($scope.harshbreak_result);
                        $scope.total_harshbreak_time = 0;
                        var data_for_graph_harshbreak = [];
                        for (var x = 0; x < $scope.harshbreak_result.length; x++) {
                            var my_speed = 0;
                            for (var y = 0; y < $scope.harshbreak_result[x].child.length; y++) {
                                my_speed += parseInt($scope.harshbreak_result[x].child[y]
                                    .speed);
                            }
                            var avg_speed = parseInt(my_speed / $scope.harshbreak_result[x]
                                .child.length);
                            $scope.total_harshbreak_time += parseInt($scope
                                .harshbreak_result[x].child.length);
                            data_for_graph_harshbreak.push({
                                device_name: $scope.harshbreak_result[x].d_name,
                                total_harshbreak_times: $scope.harshbreak_result[x]
                                    .child
                                    .length,
                                total_avg_speed: avg_speed
                            });
                        }

                        var harshbreak_chart = c3.generate({
                            bindto: '#harshbreak_chart_container',
                            data: {
                                json: data_for_graph_harshbreak,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_avg_speed', 'total_overspeed_times'],
                                },
                                axes: {
                                    'total_harshbreak_times': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_harshbreak_times': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });
                    } else if (current_report == 'acceleration_report') {
                        $scope.acceleration_result = []; // response;
                        const groupBy = (array, key) => {
                            return array.reduce((result, currentValue) => {
                                (result[currentValue[key]] = result[currentValue[
                                    key]] || []).push(currentValue);
                                return result;
                            }, {});
                        };

                        // Group by color as key to the person array
                        const dataGroupByDevice = groupBy(response, 'device_name');
                        Object.keys(dataGroupByDevice).forEach(function(key) {
                            $scope.acceleration_result.push({
                                'd_name': key,
                                'child': dataGroupByDevice[key]
                            });
                        });

                        $scope.total_acceleration_time = 0;
                        var data_for_graph_acceleration = [];
                        for (var x = 0; x < $scope.acceleration_result.length; x++) {
                            var my_speed = 0;
                            for (var y = 0; y < $scope.acceleration_result[x].child
                                .length; y++) {
                                my_speed += parseInt($scope.acceleration_result[x].child[y]
                                    .speed);
                            }
                            var avg_speed = parseInt(my_speed / $scope.acceleration_result[x]
                                .child.length);
                            $scope.total_acceleration_time += parseInt($scope
                                .acceleration_result[x].child.length);
                            data_for_graph_acceleration.push({
                                device_name: $scope.acceleration_result[x].d_name,
                                total_acceleration_times: $scope.acceleration_result[x]
                                    .child
                                    .length,
                                total_avg_speed: avg_speed
                            });
                        }

                        var acceleration_chart = c3.generate({
                            bindto: '#acceleration_chart_container',
                            data: {
                                json: data_for_graph_acceleration,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_avg_speed',
                                        'total_acceleration_times'
                                    ],
                                },
                                axes: {
                                    'total_acceleration_times': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_acceleration_times': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });
                    } else if (current_report == 'collision_report') {
                        $scope.collision_result = []; // response;
                        const groupBy = (array, key) => {
                            return array.reduce((result, currentValue) => {
                                (result[currentValue[key]] = result[currentValue[
                                    key]] || []).push(currentValue);
                                return result;
                            }, {});
                        };

                        // Group by color as key to the person array
                        const dataGroupByDevice = groupBy(response, 'device_name');
                        Object.keys(dataGroupByDevice).forEach(function(key) {
                            $scope.collision_result.push({
                                'd_name': key,
                                'child': dataGroupByDevice[key]
                            });
                        });

                        console.log($scope.collision_result);
                        $scope.total_collision_time = 0;
                        var data_for_graph_collision = [];
                        for (var x = 0; x < $scope.collision_result.length; x++) {
                            var my_speed = 0;
                            for (var y = 0; y < $scope.collision_result[x].child.length; y++) {
                                my_speed += parseInt($scope.collision_result[x].child[y]
                                    .speed);
                            }
                            var avg_speed = parseInt(my_speed / $scope.collision_result[x]
                                .child.length);
                            $scope.total_collision_time += parseInt($scope
                                .collision_result[x].child.length);
                            data_for_graph_collision.push({
                                device_name: $scope.collision_result[x].d_name,
                                total_collision_times: $scope.collision_result[x].child
                                    .length,
                                total_avg_speed: avg_speed
                            });
                        }

                        var collision_chart = c3.generate({
                            bindto: '#collision_chart_container',
                            data: {
                                json: data_for_graph_collision,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_avg_speed', 'total_collision_times'],
                                },
                                axes: {
                                    'total_collision_times': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_collision_times': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + ' km';
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " times";
                                        }
                                    }
                                }
                            }
                        });
                    } else if (current_report == 'service_up_down') {
                        $scope.service_up_down_result = []; // response;
                        const groupBy = (array, key) => {
                            return array.reduce((result, currentValue) => {
                                (result[currentValue[key]] = result[currentValue[
                                    key]] || []).push(currentValue);
                                return result;
                            }, {});
                        };

                        // Group by color as key to the person array
                        const dataGroupByDevice = groupBy(response, 'device_name');
                        Object.keys(dataGroupByDevice).forEach(function(key) {
                            $scope.service_up_down_result.push({
                                'd_name': key,
                                'child': dataGroupByDevice[key]
                            });
                        });
                        console.log($scope.service_up_down_result);
                        $scope.total_service_up_time = 0;
                        var data_for_graph_service_up_down = [];
                        var overall_uptime = 0;
                        var overall_downtime = 0;
                        for (var x = 0; x < $scope.service_up_down_result.length; x++) {
                            var my_uptime = 0;
                            var my_downtime = 0;
                            for (var y = 0; y < $scope.service_up_down_result[x].child
                                .length; y++) {
                                my_uptime += parseInt($scope.service_up_down_result[x].child[y]
                                    .uptime_in_seconds);
                                my_downtime += parseInt($scope.service_up_down_result[x].child[
                                    y].downtime_in_seconds);
                            }
                            overall_uptime += my_uptime;
                            overall_downtime += my_downtime;
                            data_for_graph_service_up_down.push({
                                device_name: $scope.service_up_down_result[x].d_name,
                                total_service_up_time: my_uptime,
                                total_service_downtime: my_downtime
                            });
                        }
                        console.log('overall uptime: ' + overall_uptime, 'overall down: ' +
                            overall_downtime);
                        $scope.total_uptime = convertHm(overall_uptime);
                        $scope.total_downtime = convertHm(overall_downtime);
                        $scope.uptime_for_donut = overall_uptime;
                        $scope.downtime_for_donut = overall_downtime;
                        $scope.total_device_count = $scope.service_up_down_result.length;

                        var service_uptime_chart = c3.generate({
                            bindto: '#service_up_down_chart_container',
                            data: {
                                json: data_for_graph_service_up_down,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_service_up_time',
                                        'total_service_downtime'
                                    ],
                                },
                                axes: {
                                    'total_service_downtime': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_service_downtime': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return convertHm(v, true);
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return convertHm(v, true);
                                        }
                                    }
                                }
                            }
                        });
                        var chart = c3.generate({
                            bindto: '#service_up_down_donut_container',
                            data: {
                                columns: [
                                    ['Uptime', $scope.uptime_for_donut],
                                    ['Downtime', $scope.downtime_for_donut],
                                ],
                                type: 'donut'
                                /*  onclick: function(d, i) {
                                     console.log("onclick", d, i);
                                 },
                                 onmouseover: function(d, i) {
                                     console.log("onmouseover", d, i);
                                 },
                                 onmouseout: function(d, i) {
                                     console.log("onmouseout", d, i);
                                 } */
                            },
                            donut: {
                                title: "Uptime Vs Downtime"
                            }
                        });
                    } else if (current_report == 'driving_behaviour') {
                        if (response.length > 0) {
                            var driving_behavior_graph = [];
                            $scope.driving_behaviour_result = response;
                            $scope.overall_overspeed = 0;
                            $scope.overall_harshbreak = 0;
                            $scope.overall_acceleration = 0;
                            $scope.overall_collision = 0;
                            for (var i = 0; i < $scope.driving_behaviour_result.length; i++) {
                                $scope.overall_overspeed += parseInt($scope
                                    .driving_behaviour_result[i].total_overspeed);
                                $scope.overall_harshbreak += parseInt($scope
                                    .driving_behaviour_result[i].total_harshbreak);
                                $scope.overall_acceleration += parseInt($scope
                                    .driving_behaviour_result[i].total_acceleration);
                                $scope.overall_collision += parseInt($scope
                                    .driving_behaviour_result[i].total_collision);

                                driving_behavior_graph.push({
                                    device_name: $scope.driving_behaviour_result[i]
                                        .device_name,
                                    total_overspeed: parseInt($scope
                                        .driving_behaviour_result[i].total_overspeed
                                    ),
                                    total_harshbreak: parseInt($scope
                                        .driving_behaviour_result[i]
                                        .total_harshbreak),
                                    total_acceleration: parseInt($scope
                                        .driving_behaviour_result[i]
                                        .total_acceleration),
                                    total_collision: parseInt($scope
                                        .driving_behaviour_result[i].total_collision
                                    )
                                });
                            }

                            var driving_behavior_chart = c3.generate({
                                bindto: '#driving_behavior_chart_container',
                                data: {
                                    json: driving_behavior_graph,
                                    keys: {
                                        x: 'device_name',
                                        value: ['total_overspeed', 'total_harshbreak',
                                            'total_acceleration', 'total_collision'
                                        ],
                                    },

                                    type: 'bar'
                                },
                                axis: {
                                    x: {
                                        type: 'category'
                                    },
                                    y: {
                                        tick: {
                                            format: function(v, id, i, j) {
                                                return v;
                                            }
                                        }
                                    }
                                }
                            });


                            //$scope.total_device_count = $scope.service_up_down_result.length;
                            var chart_behavior = c3.generate({
                                bindto: '#driving_behaviour_donut_container',
                                data: {
                                    columns: [
                                        ['Overspeed', $scope.overall_overspeed],
                                        ['Harshbreak', $scope.overall_harshbreak],
                                        ['Acceleration', $scope
                                            .overall_acceleration
                                        ],
                                        ['Collision', $scope.overall_collision],
                                    ],
                                    type: 'donut'
                                },
                                donut: {
                                    title: "Driving Behaviour"
                                }
                            });
                        }


                    } else if (current_report == 'trip_report') {
                        // $("#trip_content").html('');
                        //$("#trip_content").html(response);
                        var table_loop = "";
                        var data_for_graph_trip = [];
                        for (var i = 0; i < response.length; i++) {
                            data_for_graph_trip.push({
                                device_name: response[i].device_name,
                                total_travel: response[i].total_distance,
                                engine_runtime: response[i].engine_runtime,
                                engine_idle: response[i].engine_idle
                            });
                            table_loop += response[i].summary_table;
                        }

                        $("#trip_content").html('');
                        $("#trip_content").html(table_loop);

                        var trip_chart = c3.generate({
                            bindto: '#trip_chart',
                            data: {
                                json: data_for_graph_trip,
                                keys: {
                                    x: 'device_name',
                                    value: ['engine_runtime', 'engine_idle',
                                        'total_travel'
                                    ],
                                },
                                axes: {
                                    'total_travel': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_travel': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return convertHm(v);
                                            //return v;
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v + " km";
                                        }
                                    }
                                }
                            }
                        });

                    } else if (current_report == 'trip_with_map_history') {
                        var history_loop = "";
                        var data_for_graph_history = [];
                        var map;
                        for (var i = 0; i < response.length; i++) {
                            history_loop += response[i].map_data_content;
                        }

                        $("#trip_with_map_history_content").html(history_loop);


                    } else if (current_report == 'engine_overview') {
                        $scope.engine_overview_result = response;

                        var data_for_graph_engine_overview = [];
                        for (var i = 0; i < response.engine_overview.length; i++) {
                            data_for_graph_engine_overview.push({
                                device_name: response.engine_overview[i].name,
                                total_off: response.engine_overview[i].total_engine_off,
                                total_on: response.engine_overview[i].total_engine_on
                            });
                        }

                        var engine_overview_chart = c3.generate({
                            bindto: '#engine_overview_chart',
                            data: {
                                json: data_for_graph_engine_overview,
                                keys: {
                                    x: 'device_name',
                                    value: ['total_on', 'total_off'],
                                },
                                axes: {
                                    'total_off': 'y2'
                                },
                                type: 'bar',
                                types: {
                                    'total_off': 'bar'
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category'
                                },
                                y: {
                                    tick: {
                                        format: function(v, id, i, j) {
                                            //return convertHm(v);
                                            return v;
                                        }
                                    }
                                },
                                y2: {
                                    show: true,
                                    tick: {
                                        format: function(v, id, i, j) {
                                            return v;
                                        }
                                    }
                                }
                            }
                        });

                    } else if (current_report == 'engine_report') {
                        $scope.engine_report_result = response.event_list;
                        $scope.total_engine_report_on = response.total_on;
                        $scope.total_engine_report_off = response.total_off;
                    } else if (current_report == 'alert_details') {
                        $scope.alert_details_result = response;
                    } else if (current_report == 'alert_overview') {
                        $scope.alert_overview_list = response;
                        var alert_overview_list = "<tr><th>SL</th><th>Device</th><th>IMEI</th>";
                        for (var x = 0; x < response.event_list.length; x++) {
                            alert_overview_list += '<th>' + response.event_list[x].name +
                                "</th>";
                        }
                        alert_overview_list += "</tr>";

                        for (var i = 0; i < response.my_events.length; i++) {
                            alert_overview_list += "<tr><td>" + parseInt(i + 1);
                            alert_overview_list += "</td>";

                            Object.values(response.my_events[i]).forEach(val => {
                                alert_overview_list += "<td>" + val + "</td>";
                            });

                            alert_overview_list += "</tr>";
                        }
                        //$scope.my_last_events;
                        $("#all_event_list").html(alert_overview_list);
                    } else if (current_report == 'alert_report') {
                        $scope.alert_report_result = response;

                        var data_for_graph_alert_report = [];
                        var event_names = [];
                        var events_values = ['Vehicle Events'];
                        for (var i = 0; i < response.event_list.length; i++) {
                            event_names.push(response.event_list[i].name);
                        }
                        for (var x = 0; x < response.my_events.length; x++) {
                            events_values.push(response.my_events[x]);
                        }

                        var alert_report_chart = c3.generate({
                            bindto: '#alert_report_chart_container',
                            data: {
                                columns: [events_values],
                                type: 'bar'
                            },
                            axis: {
                                x: {
                                    //max: (event_names.length),
                                    type: 'category',
                                    categories: event_names
                                },
                                y: {
                                    tick: {

                                        format: function(v, id, i, j) {
                                            return v + ' times';
                                        }
                                    }
                                }
                            },
                            bar: {
                                width: {
                                    ratio: 0.5 // this makes bar width 50% of length between ticks
                                }
                                // or
                                //width: 100 // this makes bar width 100px
                            }
                        });

                    } else if (current_report == 'dashboard') {

                        if (response.length > 0) {
                            var dashboard_graph = [];
                            $scope.dashboard_result = response;
                            $scope.my_travel_time = 0;
                            $scope.my_engine_run_time = 0;
                            $scope.my_engine_stop_time = 0;
                            $scope.my_stop = 0;
                            $scope.my_overspeed = 0;
                            $scope.my_fuel_consumption = 0;
                            $scope.my_acceleration = 0;
                            $scope.my_harsh_break = 0;
                            $scope.my_collision = 0;

                            $scope.dashboard_total_acceleration = 0;
                            $scope.dashboard_total_collision = 0;
                            $scope.dashboard_total_engine_run_time = 0;
                            $scope.dashboard_total_engine_stop_time = 0;
                            $scope.dashboard_total_fuel_consumption = 0;
                            $scope.dashboard_total_fuel_cost = 0;
                            $scope.dashboard_total_harsh_break = 0;
                            $scope.dashboard_total_other_expense = 0;
                            $scope.dashboard_total_overspeed = 0;
                            $scope.dashboard_total_paper_expiring = 0;
                            $scope.dashboard_total_stop = 0;
                            $scope.dashboard_total_travel_time = 0;
                            $scope.dashboard_total_upcoming_maintenance = 0;

                            for (var i = 0; i < $scope.dashboard_result.length; i++) {
                                $scope.dashboard_total_travel_time += ($scope.dashboard_result[
                                    i].travel_time != undefined) ? parseInt($scope
                                    .dashboard_result[i].travel_time) : 0;
                                $scope.dashboard_total_engine_run_time += ($scope
                                        .dashboard_result[i].engine_runtime != undefined) ?
                                    parseInt($scope.dashboard_result[i].engine_runtime) : 0;
                                $scope.dashboard_total_engine_stop_time += ($scope
                                        .dashboard_result[i].engine_idle_time != undefined) ?
                                    parseInt($scope.dashboard_result[i].engine_idle_time) : 0;
                                $scope.dashboard_total_stop += ($scope.dashboard_result[i]
                                    .total_stop_count != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_stop_count) : 0;
                                $scope.dashboard_total_overspeed += ($scope.dashboard_result[i]
                                    .total_overspeed != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_overspeed) : 0;
                                $scope.dashboard_total_harsh_break += ($scope.dashboard_result[
                                    i].total_harsh_break != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_harsh_break) : 0;
                                $scope.dashboard_total_acceleration += ($scope.dashboard_result[
                                    i].total_acceleration != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_acceleration) : 0;
                                $scope.dashboard_total_collision += ($scope.dashboard_result[i]
                                    .total_collision != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_collision) : 0;

                                var total_distance = ($scope.dashboard_result[i].travel_time !=
                                    undefined) ? parseInt($scope.dashboard_result[i]
                                    .travel_time) : 0;
                                var total_fuel_consumption = ($scope.dashboard_result[i]
                                    .my_fuel_consumption != undefined) ? parseFloat($scope
                                    .dashboard_result[i].my_fuel_consumption) : 0;
                                var my_total_fuel_cosumption = (total_distance *
                                    total_fuel_consumption);
                                $scope.dashboard_total_fuel_consumption +=
                                    my_total_fuel_cosumption;

                                $scope.dashboard_total_fuel_cost += ($scope.dashboard_result[i]
                                    .total_fuel_cost != undefined) ? parseInt($scope
                                    .dashboard_result[i].total_fuel_cost) : 0;

                                dashboard_graph.push({
                                    device_name: $scope.dashboard_result[i].device_name,
                                    travel_time: ($scope.dashboard_result[i]
                                        .travel_time != undefined) ? parseInt($scope
                                        .dashboard_result[i].travel_time) : 0,
                                    engine_runtime: ($scope.dashboard_result[i]
                                            .engine_runtime != undefined) ? parseInt(
                                            $scope.dashboard_result[i].engine_runtime) :
                                        0,
                                    engine_idle_time: ($scope.dashboard_result[i]
                                        .engine_idle_time != undefined) ? parseInt(
                                        $scope.dashboard_result[i].engine_idle_time
                                    ) : 0,
                                    total_stop_count: ($scope.dashboard_result[i]
                                        .total_stop_count != undefined) ? parseInt(
                                        $scope.dashboard_result[i].total_stop_count
                                    ) : 0,
                                    total_overspeed: ($scope.dashboard_result[i]
                                        .total_overspeed != undefined) ? parseInt(
                                        $scope.dashboard_result[i].total_overspeed
                                    ) : 0,
                                    total_harsh_break: ($scope.dashboard_result[i]
                                        .total_harsh_break != undefined) ? parseInt(
                                        $scope.dashboard_result[i].total_harsh_break
                                    ) : 0,
                                    total_acceleration: ($scope.dashboard_result[i]
                                            .total_acceleration != undefined) ?
                                        parseInt($scope.dashboard_result[i]
                                            .total_acceleration) : 0,
                                    total_collision: ($scope.dashboard_result[i]
                                        .total_collision != undefined) ? parseInt(
                                        $scope.dashboard_result[i].total_collision
                                    ) : 0
                                });
                            }
                            console.log($scope.dashboard_total_engine_run_time, $scope
                                .dashboard_total_engine_stop_time);

                            $scope.dashboard_total_engine_run_time = convertHm($scope
                                .dashboard_total_engine_run_time, true);
                            $scope.dashboard_total_engine_stop_time = convertHm($scope
                                .dashboard_total_engine_stop_time, true);

                            var dashboard_graph_chart = c3.generate({
                                bindto: '#dashboard_chart_container',
                                data: {
                                    json: dashboard_graph,
                                    keys: {
                                        x: 'device_name',
                                        value: ['travel_time', 'engine_runtime',
                                            'engine_idle_time'
                                        ],
                                    },
                                    axes: {
                                        'engine_runtime': 'y2',
                                        'engine_idle_time': 'y2'
                                    },
                                    type: 'bar',
                                    types: {
                                        'engine_runtime': 'bar',
                                        'engine_idle_time': 'bar'
                                    }
                                },
                                axis: {
                                    x: {
                                        type: 'category'
                                    },
                                    y: {
                                        tick: {
                                            format: function(v, id, i, j) {
                                                return v + ' km';
                                            }
                                        }
                                    },
                                    y2: {
                                        show: true,
                                        tick: {
                                            format: function(v, id, i, j) {
                                                return convertHm(v);
                                            }
                                        }
                                    }
                                }
                            });


                            //$scope.total_device_count = $scope.service_up_down_result.length;
                            var chart_dashboard_behavior = c3.generate({
                                bindto: '#dashboard_donut_container',
                                data: {
                                    columns: [
                                        ['Overspeed', $scope
                                            .dashboard_total_overspeed
                                        ],
                                        ['Harshbreak', $scope
                                            .dashboard_total_harsh_break
                                        ],
                                        ['Acceleration', $scope
                                            .dashboard_total_acceleration
                                        ],
                                        ['Collision', $scope
                                            .dashboard_total_collision
                                        ],
                                    ],
                                    type: 'donut'
                                },
                                donut: {
                                    title: "Driving Behaviour"
                                }
                            });
                        }

                    } else if (current_report == 'geocoding_report') {
                        $scope.geocoding_result = response;

                    } else if (current_report == 'fuel_report') {
                        $scope.fuel_result = response;

                        var fuel_chart = c3.generate({
                            bindto: '#fuel_chart_container',
                            data: {
                                columns: [
                                    ['data1', 300, 350, 300, 0, 0, 0],
                                    ['data2', 130, 100, 140, 200, 150, 50]
                                ],
                                types: {
                                    data1: 'area',
                                    data2: 'area-spline'
                                }
                            }
                        });


                    }
                    //console.log(response);
                    $scope.$apply();
                    //$("#"+currrent_section).removeClass('d-none');
                    //$('.report_section').not($("#"+currrent_section)).addClass('d-none');

                    $("a[id^=trvl_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        console.log($(this).attr('id'));
                        console.log($(this).attr('id').substr(5));
                        $("#trvl_extra_" + $(this).attr('id').substr(5)).slideToggle(
                            "slow");
                        event.preventDefault();
                    });

                    $("a[id^=ovrspd_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        $("#ovrspd_extra_" + $(this).attr('id').substr(7)).slideToggle(
                            "slow");
                        event.preventDefault();
                    });
                    $("a[id^=uptime_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        $("#uptime_extra_" + $(this).attr('id').substr(7)).slideToggle(
                            "slow");
                        event.preventDefault();
                    });
                    $("a[id^=hb_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        $("#hb_extra_" + $(this).attr('id').substr(3)).slideToggle(
                            "slow");
                        event.preventDefault();

                    });

                    $("a[id^=db_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        $("#db_extra_" + $(this).attr('id').substr(3)).slideToggle(
                            "slow");
                        event.preventDefault();

                    });
                    $("a[id^=ovrvw_trvl_]").click(function(event) {
                        var icon_id = $("#row_class_" + $(this).attr('id'));
                        console.log(icon_id);
                        if (icon_id.hasClass('fa-plus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-plus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-minus');
                        } else if ($("#row_class_" + $(this).attr('id')).hasClass(
                                'fa-minus')) {
                            $("#row_class_" + $(this).attr('id')).removeClass(
                                'fa-minus');
                            $("#row_class_" + $(this).attr('id')).addClass('fa-plus');
                        }
                        $("#ovrvw_trvl_extra_" + $(this).attr('id').substr(11))
                            .slideToggle("slow");
                        event.preventDefault();
                    });
                    load_spinner('hide', 'show_loader', '');
                },
                error: function(reject) {
                    if (current_report != 'notification_log') {
                        errorMsg();
                    }
                    load_spinner('hide', 'show_loader', '');
                }
            });
        }



        $scope.getTotal = function(item_array) {
            var total_distance = 0;
            var total_speeding = 0;
            var total_parking = 0;
            var total_fuel_consumption = 0;
            var total_fuel_cost = 0;
            for (var i = 0; i < item_array.length; i++) {
                if (item_array[i].route_length != undefined) {
                    var my_consumption = parseFloat(item_array[i].route_length * item_array[i]
                        .my_fuel_consumption);
                    total_fuel_consumption = parseFloat(total_fuel_consumption) + parseFloat(
                        my_consumption);
                }

                if (item_array[i].route_length != undefined) {
                    var my_fuel_cost = parseFloat(item_array[i].route_length * item_array[i]
                        .my_fuel_consumption * item_array[i].my_fuel_cost);
                    total_fuel_cost = parseFloat(total_fuel_cost) + parseFloat(my_fuel_cost);
                }


                total_distance += (item_array[i].route_length != undefined) ? parseInt(item_array[i]
                    .route_length) : 0;
                total_speeding += (item_array[i].drives != undefined) ? item_array[i].drives.length : 0;
                total_parking += (item_array[i].stops != undefined) ? item_array[i].stops.length : 0;
                console.log(total_fuel_cost);
            }
            return {
                'total_distance': total_distance,
                'total_speeding': total_speeding,
                'total_parking': total_parking,
                'total_fuel_consumption': parseFloat(total_fuel_consumption).toFixed(2),
                'total_fuel_cost': parseFloat(total_fuel_cost).toFixed(2)
            };
        }

    });


    function device_manage() {

        var table = $('#device_manage_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ url('dashboard/imeiList') }}",
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
                    data: 'imei',
                    name: 'imei',
                    className: 'text-center'
                },
                {
                    data: 'sim_number',
                    name: 'sim_number',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'speeding_value',
                    name: 'speeding_value',
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
        table.buttons().container().appendTo('#device_manage_table_length');

    }

    function device_at_a_glance() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('dashboard/device_at_a_glance')}}",

            success: function(result) {
                console.log(result);
                $("#t_dvc").html(result.t_dvc);
                $("#t_a_dvc").html(result.t_a_dvc);
                $("#t_h_dvc").html(result.t_h_dvc);
                $("#t_s_dvc").html(result.t_s_dvc);
            },
        });
    }

    function device_status_log() {

        var table = $('#device_status_log_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{ url('dashboard/imeiStatusLog') }}",
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
                    data: 'imei',
                    name: 'imei',
                    className: 'text-center'
                },
                {
                    data: 'sim_number',
                    name: 'sim_number',
                    className: 'text-center'
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
        table.buttons().container().appendTo('#device_status_log_table_length');

    }


    function notification_log_data() {
        var table = $('#notification_log_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "POST",
                url: "{{ url('dashboard/showreport/notification/2') }}",
                data: {
                    device_list: $('#device_list').val(),
                    start_date: $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    end_date: $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: '{!! csrf_token() !!}',
                    _method: 'POST',
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'dt_tracker',
                    name: 'dt_tracker'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'event_desc',
                    name: 'event_desc'
                },
                {
                    data: 'coordinate',
                    name: 'coordinate',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'address',
                    name: 'address',
                    orderable: false,
                    searchable: false
                },
            ],
            "aoColumnDefs": [{
                "aTargets": [5],
                "mRender": function(data, type, full) {
                    var rowData = data.split(",");
                    return '<button type="button" class="btn btn-default load_geo_address" data-lat="' +
                        rowData[0] + '" data-lng="' + rowData[1] + '" > Show Address</button>';
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
        table.buttons().container().appendTo('#notification_log_table_length');
    }

    function schedule_report_datalist() {

        var table = $('#schedule_report_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "POST",
                url: "{{ url('dashboard/showreport/schedule_report/2') }}",
                data: {
                    device_list: $('#device_list').val(),
                    start_date: $("#start_date").val() + ' ' + $("#start_hour").val() + ':' + $(
                        "#start_min").val() + ':00',
                    end_date: $("#end_date").val() + ' ' + $("#end_hour").val() + ':' + $(
                            "#end_min")
                        .val() + ':00',
                    _token: '{!! csrf_token() !!}',
                    _method: 'POST',
                },
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
                    data: 'report_name',
                    name: 'report_name'
                },
                {
                    data: 'report_type_name',
                    name: 'report_type_name'
                },
                {
                    data: 'send_email',
                    name: 'send_email'
                },
                {
                    data: 'device',
                    name: 'device',
                    className: 'text-center'
                },
                {
                    data: 'start_date',
                    name: 'start_date',
                    className: 'text-center'
                },
                {
                    data: 'schedule',
                    name: 'schedule',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
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
        table.buttons().container().appendTo('#schedule_report_table_length');

    }

    function view_schedule_report_data(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('dashboard/view_schedule_report_data')}}/" + id,
            success: function(result) {
                $("#load_schedule_report_content").html(result);
                $("#main_content_section").addClass('d-none');
                $("#load_schedule_report_content").removeClass('d-none');
            },
            error: function(reject) {
                errorMsg();
            }
        });
    }

    $(document).ready(function() {
        $('#print_current_section').on("click", function() {
            var printSection = $("#export_current_data_rel").val() + "_section";
            console.log(printSection);
            $("#" + printSection).printThis();
        });

        $("#excel_current_section").click(function() {
            var excelSection = $("#export_current_data_rel").val() + "_section";
            var reportName = $("#export_current_data_rel").val();
            console.log(excelSection);
            $("#" + excelSection).table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: reportName, //do not include extension
                fileext: ".xls" // file extension
            });

            // $("#" + excelSection).tblToExcel({
            //     filename: reportName,
            // });
        });

    });

    //Create PDf from HTML...
    function CreatePDFfromHTML(mydiv) {
        console.log(mydiv);
        var HTML_Width = $("#" + mydiv).width();
        var HTML_Height = $("#" + mydiv).height();
        /* var HTML_Width = $("#"+mydiv).width();
        var HTML_Height = $("#"+mydiv).height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.save("VTS_report.pdf");

        html2canvas($("#"+mydiv)[0]).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("VTS_report.pdf");
            //$("#"+mydiv).hide();
        }); */
        /* var divContents = $("#"+mydiv).html();
        var printWindow = window.open('', '', 'height='+HTML_Height+',width='+HTML_Width+'');
        printWindow.document.write('<html><head><title>Trip Report</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print(); */
        var pdf = new jsPDF();
        pdf.addHTML(document.body, function() {
            pdf.save('VTS_report.pdf');
        });
    }



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

    function load_spinner(type, hide_element, show_element) {
        if (type == 'hide') {
            $("#" + hide_element).removeClass('show');
            $("#" + hide_element).addClass('d-none');
            //$("#" + show_element).removeClass('d-none');
            //$("#" + show_element).addClass('show');
        }
        if (type == 'show') {
            // $("#" + show_element).removeClass('show');
            // $("#" + show_element).addClass('d-none');
            $("#" + hide_element).removeClass('d-none');
            $("#" + hide_element).addClass('show');
        }

    }


    $(function() {
        $(document).tooltip();
    });

    function convertHm(datamin, show_day = null) {
        var timetext = "";
        if (datamin > 0) {
            if (show_day != null && Math.floor(datamin / 86400) > 0) {
                timetext = timetext + (Math.floor(datamin / 86400)) + "d ";
            }
            if (Math.floor(datamin / 3600) > 0) {
                timetext = timetext + (Math.floor(datamin / 3600)) + "h ";
            }
            if (datamin % 60 > 0) {
                timetext = timetext + " " + (datamin % 60) + "min";
            }
        }
        return timetext;
    }
    </script>
</body>

<!-- end::Body -->

</html>