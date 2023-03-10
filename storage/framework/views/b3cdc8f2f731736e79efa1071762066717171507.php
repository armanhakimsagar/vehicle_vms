<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title> Login Page</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
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

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="<?php echo e(asset('public/assets/css/pages/login-4.css')); ?>" rel="stylesheet" />

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="<?php echo e(asset('public/assets/css/optional/perfect-scrollbar.css')); ?>" rel="stylesheet" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="<?php echo e(asset('public/assets/css/optional/tether.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-datepicker3.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-timepicker.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/daterangepicker.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/jquery.bootstrap-touchspin.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-select.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-switch.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/select2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/ion.rangeSlider.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/nouislider.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/owl.carousel.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/owl.theme.default.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/dropzone.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/summernote.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/bootstrap-markdown.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/animate.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/toastr.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/morris.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/sweetalert2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/socicon.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/line-awesome.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/flaticon.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/flaticon2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/optional/all.min.css')); ?>" rel="stylesheet" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?php echo e(asset('public/assets/css/global/style.bundle.css')); ?>" rel="stylesheet" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?php echo e(asset('public/assets/css/global/base/light.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/global/menu/light.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/global/brand/dark.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/assets/css/global/aside/dark.css')); ?>" rel="stylesheet" />


    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?php echo e(asset('public/assets/media/logos/favicon.ico')); ?>" />
    <script src="<?php echo e(asset('public/assets/js/global/jquery.min.js')); ?>"></script>

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor custom-login-display" style="background-image: url('<?php echo e(asset("public/uploads/system_config/".$system_config->template_bg)); ?>')">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img class="login_template_logo" src="<?php echo e(asset('public/uploads/system_config/'.$system_config->template_logo)); ?>">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title"><?php echo e($system_config->template_heading); ?></h3>
                                <h3 class="kt-login__title">Login</h3>
                            </div>
                            <div class="d-flex  justify-content-center">
                                <h6 id="error" class="text-danger justify-content-center"></h6>
                            </div>
                            <form class="kt-form" id="systemLoginForm">
                                <?php echo csrf_field(); ?>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
                                </div>
                                <small id="username-error" class="text-danger" for="username"></small>

                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <small id="password-error" class="text-danger" for="password"></small>

                                <div class="row kt-login__extra">
                                    <div class="col">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="remember"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col kt-align-right">
                                        <a href="javascript:;" id="kt_login_forgot2" class="kt-login__link">Forget
                                            Password ?</a>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_signin_submit2" class="btn btn-brand btn-pill kt-login__btn-primary">Login</button>
                                </div>

                            </form>
                        </div>
                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Forgotten Password ?</h3>
                                <div class="kt-login__desc">Enter your email or phone to reset your password:
                                </div>
                            </div>
                            <form class="kt-form" action="">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email or phone" name="email" id="kt_email" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button id="kt_login_forgot_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Request</button>&nbsp;&nbsp;
                                    <button id="kt_login_forgot_cancel" class="btn btn-secondary btn-pill kt-login__btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="login_footer_section">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;"><img class="footer_logo" src="<?php echo e(asset('public/assets/media/logos/LiveSupport.png')); ?>" alt=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;"><img class="footer_logo" src="<?php echo e(asset('public/assets/media/logos/Apple.png')); ?>" alt=""></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;"><img class="footer_logo" src="<?php echo e(asset('public/assets/media/logos/PlayStore.png')); ?>" alt=""></a>
                        </li>

                    </ul>
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
    <script src="<?php echo e(asset('public/assets/js/global/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/js.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/sticky.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/global/wNumb.js')); ?>"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.form.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.blockUI.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-datepicker.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-timepicker.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.bootstrap-touchspin.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-maxlength.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-multiselectsplitter.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-switch.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-switch.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/select2.full.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/ion.rangeSlider.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/typeahead.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/handlebars.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.inputmask.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/inputmask.date.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/inputmask.numeric.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/owl.carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/autosize.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/clipboard.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/summernote.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/markdown.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-markdown.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-markdown.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-notify.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery-validation.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/raphael.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/morris.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/Chart.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/bootstrap-session-timeout.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/idle-timer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/promise.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/sweetalert2.init.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/lib.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/jquery.input.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/js/optional/purify.js')); ?>"></script>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="<?php echo e(asset('public/assets/js/global/scripts.bundle.js')); ?>"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="<?php echo e(asset('public/assets/js/pages/login-general.js')); ?>"></script>

    <!--end::Page Scripts -->

    <script>
        $(document).on('submit', 'form#systemLoginForm', function(event) {

            event.preventDefault();
            $("[id$=-error]").text('');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo e(route('admin.login.submit')); ?>",
                data: $('#systemLoginForm').serialize(),
                success: function(response) {
                    $("small#username-error").removeClass("error-msg");
                    $("small#password-error").removeClass("error-msg");
                    if (response == 0) {
                        $("h6#error").text("Username incorrect!");
                    } else if (response == 1) {
                        $("h6#error").text("Password incorrect!");
                    } else if (response == 2) {
                        $("h6#error").text("Your account is deactiveted! Please contact us.");
                    } else if (response == 3) {
                        swal.fire({
                            type: 'success',
                            title: 'Login successful!',
                            showConfirmButton: false,
                            timer: 3000,
                            customClass: 'success-alert'
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo e(route('systemadmin.dashboard')); ?>"
                        }, 500);
                    } else if (response == 4) {
                        swal.fire({
                            type: 'success',
                            title: 'Login successful!',
                            showConfirmButton: false,
                            timer: 3000,
                            customClass: 'success-alert'
                        });
                        setTimeout(function() {
                            window.location.href = "<?php echo e(url('dashboard/d/dashboard')); ?>"
                        }, 500);
                    }
                },
                error: function(reject) {
                    // errorMsg()
                    if (reject.status === 422 || reject.status === 403) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors.error.message, function(key, val) {
                            console.log(key + ' : ' + val);
                            $("small#" + key + "-error").text(val[0]);
                            $("small#" + key + "-error").addClass("error-msg");
                        });
                    }
                }
            });
        });
    </script>
</body>

<!-- end::Body -->

</html><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>