
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>Metronic | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
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
		<link href="{{asset('assets/css/optional/fullcalendar.bundle.css')}}" rel="stylesheet"/>

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="{{asset('assets/css/optional/perfect-scrollbar.css')}}" rel="stylesheet"/>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="{{asset('assets/css/optional/tether.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-datepicker3.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-datetimepicker.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-timepicker.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/daterangepicker.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/jquery.bootstrap-touchspin.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-select.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-switch.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/select2.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/ion.rangeSlider.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/nouislider.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/owl.carousel.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/owl.theme.default.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/dropzone.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/summernote.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/bootstrap-markdown.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/animate.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/toastr.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/morris.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/sweetalert2.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/socicon.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/line-awesome.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/flaticon.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/flaticon2.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/optional/all.min.css')}}" rel="stylesheet"/>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{asset('assets/css/monitor/style.bundle.css')}}" rel="stylesheet"/>

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
		<script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="demo3/index.html">
					<img alt="Logo" src="{{asset('assets/media/logos/logo-2-sm.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				@include('layouts.monitor.sideber')

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->

                    @include('layouts.monitor.nevber')
					<!-- end:: Header -->
					<div class="  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

							<!--Begin::Row-->
							<div class="row">
                                <div class="kt-widget15">
                                    <div class="kt-widget15__map">
                                        <div id="kt_chart_latest_trends_map" style="height:100vh;"></div>
                                    </div>
                                </div>

							</div>

							<!--End::Row-->
						</div>

						<!-- end:: Content -->
					</div>
				</div>
			</div>
		</div>

        <!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
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
        <script src="{{asset('assets/js/enduser/scripts.bundle.js')}}"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="{{asset('assets/js/global/fullcalendar.bundle.js')}}"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
		<script src="{{asset('assets/js/global/gmaps.js')}}"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
        <script src="{{asset('assets/js/enduser/dashboard.js')}}"></script>

		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>