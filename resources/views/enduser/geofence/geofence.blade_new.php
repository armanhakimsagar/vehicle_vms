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
    <script src="{{asset('assets/js/marker.rotate.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.movingRotatedMarker.js')}}"></script>
    <script src="{{asset('assets/js/leaflet.markercluster-src.js')}}"></script>
    <script src="{{asset('assets/js/L.Control.ZoomMin.js')}}"></script>
    <script src="{{asset('assets/js/Leaflet.Control.Custom.js')}}"></script>
    <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvX5ZoFwodbDqQWw1DPTp8Fk9jf3Uuv68"></script>
    <script src="{{asset('assets/js/google.js')}}"></script>
    <script src="{{asset('assets/js/bing_map.js')}}"></script>

    <link rel="stylesheet" href="http://piratefsh.github.io/leaflet.geofencer/bower_components/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('assets/js/geofence/leaflet.contextmenu.css')}}" />

    <script>
        $(function() {


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

            window.layersControl = L.control.layers(baseLayers, null, {
                collapsed: false
            });

            layersControl.addTo(map);
            //zoomControl.addTo(map);
            map.addControl(new L.Control.ZoomMin());
            //map_changing_button.addTo(map);
            map.addLayer(ggl);

            window.deviceGroup = L.layerGroup(); //L.markerClusterGroup(); // L.layerGroup();
            map.addLayer(deviceGroup);

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
    </script>


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
    </style>

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading" ng-app="playbackApp" ng-controller="playbackCtrl" ng-cloak>

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
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                    </g>
                                </svg></span>
                            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                    </g>
                                </svg></span>
                        </button>

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
                                <div class="filtering-area">

                                    <div class="mt-2">
                                        <ul class="list-group">
                                            <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                                <a href="#" class="custom-link-color" id="new-polygon">New Area</a>
                                                <a href="#" class="custom-link-color" id="allow-dragging">Disable Dragging</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar" style="height: calc(100vh - 105px); overflow:auto;">
                                    <!--  <h1>Geofence</h1>
                                    <h2>Coordinates</h2>
                                    <p>Polygon name will turn red if it is self-intersecting</p> -->
                                    <ul class="list-group">
                                        <li class="list-group-item" ng-repeat="p in all_geofences" ng-if="(p.pk_id!=undefined)" ng-click="show_polygon(p.pk_id)" style="cursor: pointer;">@{{p.name}} </li>
                                    </ul>
                                    <ul class="coords d-none"></ul>
                                    <!-- <div>
                                        <button href="#" class="btn" id="new-polygon">New Polygon</button> &nbsp;
                                        <button href="#" class="btn" id="allow-dragging">Disable Dragging</button> &nbsp;
                                        <br />
                                        <br />
                                        <button href="#" class="btn" id="clear-all">Delete All</button>
                                    </div> -->
                                </div>
                            </div>
                            <div class="tab-pane" id="setting" role="tabpanel">

                            </div>
                            <div class="tab-pane" id="place" role="tabpanel">

                            </div>

                        </div>
                    </div>
                </div>


                <!-- end:: Aside Menu -->

            </div>


            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper custom-kt-wrapper" id="kt_wrapper">
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
                                                    <div id="kt_chart_latest_trends_map" class="g-map-2 mapSection geofencer-map"></div>
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
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="add_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Area</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="saveGeofence">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row d-none">
                            <label class="col-lg-3 col-form-label">Geofence ID</label>
                            <div class="col-lg-9">
                                <input type="hidden" name="geofence_id" id="geofence_id" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9">
                                <input type="text" name="geofence_name" id="geofence_name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">coordinates</label>
                            <div class="col-lg-9">
                                <textarea name="geofence_coordinates" id="geofence_coordinates" class="form-control" disabled="disabled" readonly="readonly"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="save_geofence" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="remove_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Remove Area</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="removeMe">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="remove_item" id="remove_item">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="remove_item_button" class="btn btn-success btn-sm float-right">Remove Now</button>
                </div>

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
    <!-- <script src="{{asset('assets/js/global/gmaps.js')}}"></script> -->

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
    <script src="http://piratefsh.github.io/leaflet.geofencer/bower_components/leaflet/dist/leaflet.js"></script>

    <script src="{{asset('assets/js/geofence/leaflet.polydrag.js')}}"></script>
    <script src="{{asset('assets/js/geofence/leaflet.contextmenu.js')}}"></script>
    <script src="http://piratefsh.github.io/leaflet.geofencer/bower_components/jsts/lib/javascript.util.js"></script>
    <script src="{{asset('assets/js/geofence/jsts.js')}}"></script>
    <script src="{{asset('assets/js/geofence/leaflet.geofencer.js')}}"></script>

    <script>
        var app = angular.module('playbackApp', []);
        app.controller('playbackCtrl', function($scope, $http, $window, $interval) {
            console.log("angular is working");

            angular.element(document).ready(function() {

                window.polylinePoints = [];
                window.map_type = "ROADMAP";
                window.ggl;
                var map = null;
                var polygon = null;
                var draggable = true;

                initialize();

                function initialize() {
                    // Create map and polygon for map
                    map = new GeofencingMap('kt_chart_latest_trends_map').map;
                    polygon = new MultiPolygon(map, $('#polygon-name').val());

                    load_polygons();

                    polygon.setCreatePolygonsCallback(updateDetails);
                    polygon.setAllowDragging(draggable)
                    polygon.setEditable(true);

                    $('#allow-dragging').click(function() {
                        draggable = !draggable;
                        polygon.setAllowDragging(draggable);
                        if (draggable) {
                            $(this).html('Disable Dragging')
                        } else {
                            $(this).html('Enable Dragging')
                        }
                    });

                    $('#new-polygon').click(function() {
                        polygon.createNewPolygon();
                    });

                    $('#clear-all').click(function() {
                        polygon.deleteAllPolygons();
                    });

                    $('#update-polygon').click(function() {
                        polygon.setName($('#polygon-name').val());
                        polygon.panToPolygon();
                    });
                }

                function load_polygons() {
                    var customer_id = @php echo $session_data['id'];
                    @endphp;
                    $scope.all_geofences = [];
                    $http.get("{{ url('dashboard/get_geofence') }}/" + customer_id).then(function(res) {
                        var all_geofence_list = res.data;
                        var polys = polygon.getPolygons();
                        for (var x = 0; x < all_geofence_list.length; x++) {
                            var coords = new Array();
                            var splitLatLng = all_geofence_list[x].coordinates.split("|");
                            for (var i = 0; i < splitLatLng.length; i++) {
                                var latlng = splitLatLng[i].trim().substring(1, splitLatLng[i].length - 1).split(",");
                                if (latlng.length > 1) {
                                    coords.push(L.latLng(latlng[0], latlng[1]));
                                }
                            }
                            polygon.addPolygon(coords, true);
                            polys[x].pk_id = all_geofence_list[x].id;
                            polys[x].name = all_geofence_list[x].name;
                            polys[x].status = all_geofence_list[x].status;
                        }
                        $scope.all_geofences = polys;
                    });
                }

                $scope.show_polygon = function(id) {
                    for (var x = 0; x < $scope.all_geofences.length; x++) {
                        if ($scope.all_geofences[x].pk_id == id) {
                            $scope.all_geofences[x].onPolygonClick();
                            break;
                        }
                    }
                }

                function updateDetails(p) {
                    updateCoords();
                }

                function updateCoords(e) {
                    var polys = polygon.getPolygons();
                    var multi_coords = polygon.getPolygonCoordinates();
                    $('.coords').empty();
                    for (var j in multi_coords) {
                        var name = $('<h3>' + polys[j].name + '</h3>').addClass(polys[j].name);
                        name.addClass('area_list');
                        name.attr('data-id', j);
                        //polys[j].pk_id =
                        if (polys[j].selfIntersects()) {
                            name.css('color', 'red')
                        }

                        $('.coords').append(name);
                        var coords = multi_coords[j];
                        for (var i in coords) {
                            var c = $('<li>').html(coords[i].lat + ", " + coords[i].lng);
                            $('.coords').append(c);
                        }
                    }
                }

                $(document).on("click", ".area_list", function() {
                    var polys = polygon.getPolygons();
                    //console.log('data id:'+$(this).data('id'));
                    polys[$(this).data('id')].onPolygonClick();
                });

                $('#add_modal').on('show.bs.modal', function() {
                    var myCoordinates = "";
                    var polys = polygon.getPolygons();
                    var multi_coords = polygon.getPolygonCoordinates();
                    var pkID = $("#geofence_id").val();
                    for (var j in multi_coords) {
                        if (pkID!='' && polys[j].pk_id == pkID) {
                            var coords = multi_coords[j];
                            for (var i in coords) {
                                myCoordinates += "(" + coords[i].lat + ", " + coords[i].lng + ")";
                                if (i < coords.length - 1) {
                                    myCoordinates += "|";
                                }
                            }
                            console.log(myCoordinates);
                            $("#geofence_coordinates").html(myCoordinates);
                            break;
                        }
                    }
                })

                $("#save_geofence").click(function() {
                    load_spinner('show', 'show_loader', 'show_output');
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('dashboard/savegeofence') }}",
                        data: {
                            'id': (document.getElementById("geofence_id") == null) ? 0 : $("#geofence_id").val(),
                            'customer_id': @php echo $session_data['id'];@endphp,
                            'name': $("#geofence_name").val(),
                            'coordinates': $("#geofence_coordinates").val(),
                            _token: "{{ csrf_token() }}",
                            _method: "POST"
                        },
                        success: function(response) {
                            if (response == 1) {
                                load_spinner('hide', 'show_loader', 'show_output');
                                $("#add_modal").modal('hide');
                                successMsg("Area saved successfully");
                                $window.location.reload();
                                //load_polygons();
                            } else {
                                errorMsg();
                                load_spinner('hide', 'show_loader', 'show_output');
                            }

                        },
                        error: function(reject) {
                            errorMsg();
                            load_spinner('hide', 'show_loader', 'show_output');
                        }
                    });
                });
                $("#remove_item_button").click(function() {
                    load_spinner('show', 'show_loader', 'show_output');
                    $.ajax({
                        url: "{{ url('dashboard/removegeofence') }}",
                        type: "POST",
                        data: {
                            id: $("#remove_item").val(),
                            _token: '{!! csrf_token() !!}'
                        },
                        success: function(response) {
                            if (response == 1) {
                                load_spinner('hide', 'show_loader', 'show_output');
                                successMsg("Area removed successfully");
                                $("#remove_modal").modal('hide');
                                $window.location.reload();
                                //load_polygons();
                            } else {
                                errorMsg();
                                load_spinner('hide', 'show_loader', 'show_output');
                            }

                        },
                        error: function(reject) {
                            errorMsg();
                            load_spinner('hide', 'show_loader', 'show_output');
                        }
                    });
                });

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
                    start_date = moment().subtract(6, 'days').format('YYYY-MM-DD');
                    end_date = moment().format('YYYY-MM-DD');

                }
                $('#start_date').val(start_date);
                $('#end_date').val(end_date);
            });
        }); //end of angular module


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
    </script>
</body>

<!-- end::Body -->

</html>