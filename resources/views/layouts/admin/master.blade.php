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
    <link href="{{asset('assets/css/optional/bootstrap-multiselect.css')}}" rel="stylesheet" />

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">


    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>


</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- sideber is included in navber------------ -->

    <!-- begin:: Header -->
    @include('layouts.admin.navber')

    <!-- end:: Header -->


    @yield('content')

    <!-- Begin:: Footer -->

    <!-- end:: Footer -->



    <!-- end:: Page -->

    <!-- begin::Quick Panel -->
    @include('layouts.admin.quickpanel')
    <!-- end::Quick Panel -->



    <!-- begin::Sticky Toolbar -->

    <!-- end::Sticky Toolbar -->

    <!-- begin::Demo Panel -->
    @include('layouts.admin.demopanel')
    <!-- end::Demo Panel -->

    <!--Begin:: Chat-->
    @include('layouts.admin.chat')
    <!--ENd:: Chat-->


    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>



    <!-- Modals -->
    <div class="modal fade" id="smsModal" data-backdrop="static" data-keyboard="false">
        <div id="dialog" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">Add SMS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="saveSmsForm">
                    <div class="modal-body  text-dark">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class=" row form-group">
                            <label for="name" class="col-lg-3 col-form-label">SMS Balance </label>
                            <div class="col-lg-9">
								<span class="form-control">Remaining balance 5000</span>
                            </div>
                        </div>

                        <div class=" row form-group">
                            <label for="username" class="col-lg-3 col-form-label">Assign Client </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="assign_client">
                                <small id="assign_client-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class=" row form-group">
                            <label for="username" class="col-lg-3 col-form-label">Add SMS Balance </label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="add_sms_balance">
                                <small id="add_sms_balance-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class=" row form-group">
                            <label for="username" class="col-lg-3 col-form-label">Remark </label>
                            <div class="col-lg-9">
							<textarea  name="remark" class="form-control" rows="2"></textarea>
                                <small id="remark-error" class="text-danger"></small>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="form-button">
                        <button type="button" id="cancle" class="btn btn-danger btn-sm"
                            data-dismiss="modal">Cancel</button>

                        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
                    </div>

                </form>
            </div>
        </div>
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
    <script src="{{asset('assets/js/pages/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/bootstrap-switch.js')}}"></script>

    <!--end::Page Scripts -->

    <!-- begin:: datatables -->
    <script src="{{asset('assets/js/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/datatables/paginations.js')}}"></script>
    <!-- end:: datatables -->

    <script>
    $("#add_sms_client").click(function(event) {
        event.preventDefault();
        $("#smsModal").modal("show");
    });

    $(document).ready(function() {
        $('.mt-multiselect').multiselect({
            enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            enableCaseInsensitiveFiltering:true
        });

        var url = window.location.href;
        // Will only work if string in href matches with location
        $('.kt-menu__item a[href="' + url + '"]').addClass('current_menu');
        $('.kt-menu__item a[href="' + url + '"]').parents('li').addClass(
            'kt-menu__item--active kt-menu__item--open');
        // Will also work for relative and absolute hrefs
        $('.kt-menu__item a').filter(function() {
            return this.href == url;
        }).addClass('current_menu');
    });

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

    $(document).ready(function() {
        $('.custom-button-class').removeClass('btn-secondary ');
    });
    </script>

</body>

<!-- end::Body -->

</html>