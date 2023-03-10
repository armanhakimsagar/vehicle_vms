<!-- begin:: Content -->
<style>
    .kt-widget__items {
        position: relative
    }

    .kt-widget.kt-widget--user-profile-1 .kt-widget__body .kt-widget__items .kt-widget__item {
        margin: 0.7rem 0;
    }

    .vehicle_menu_item::before {
        position: absolute;
        display: block;
        width: 4px;
        border-radius: 4px;
        height: 40px;
        left: 0;
        background: #5867dd;
        content: "";
    }
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Row-->

    <div class="row single_client">
        <div class=" col-sm-12 order-lg-3 order-xl-1">


            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

                    <!--begin:: Widgets/Applications/User/Profile1-->
                    <div class="kt-portlet " style="height: calc(100% - 20px);">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit-y">

                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <?php if($vehicle->vehicle_photo): ?>
                                        <img src="<?php echo e(asset('public/uploads/vehicle/'.$vehicle->vehicle_photo)); ?>" alt="image">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('public/assets/media/cars/private.jpg')); ?>" alt="image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="kt-widget__content">
                                        <input type="hidden" id="vehicle_view_type" value="<?php echo e($type); ?>">
                                        <div class="kt-widget__section">
                                            <a href="javascript:;" class="kt-widget__username" id="show_vehicle_no" style="font-size:14px; color:#8e91a0; font-weight:bold;"><?php echo e($vehicle->vehicle_no); ?>

                                            </a>
                                        </div>
                                        <div class="kt-widget__action">
                                            <?php if($vehicle->status==1): ?>
                                            <span class="btn btn-success btn-sm">Active</span>
                                            <?php elseif($vehicle->status==0): ?>
                                            <span class="btn btn-warning btn-sm">Inactive</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label"></span>
                                            <span class="kt-widget__data"></span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__items">
                                        <a href="javascript:;" class="kt-widget__item kt-widget__item--active vehicle_menu_item " data-rel="vehicle_information">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Vehicle Information
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="complain">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Complain
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="vehicle_staff" id="vehicle_staff_page">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Vehicle Staff
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="maintenance">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Maintenance
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="document">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Document
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="inspection">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Inspection List
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="vehicle_emi">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Vehicle EMI
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="trip_schedule">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Trip Schedule
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="trip_history">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    Trip History
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:;" class="kt-widget__item vehicle_menu_item " data-rel="gps_location">
                                            <span class="kt-widget__section">

                                                <span class="kt-widget__desc">
                                                    GPS Location
                                                </span>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>

                    <!--end:: Widgets/Applications/User/Profile1-->
                </div>

                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div id="load_vehicle_info" style="width: 100%;">

                </div>
            </div>
        </div>
    </div>

    <!--End::Row-->


</div>
<!-- end:: Content -->


<script>
    $(document).ready(function(e) {
        load_vehicle_info('vehicle_information');

    });

    $(".vehicle_menu_item").each(function(index) {
        $(this).on('click', function(e) {
            e.preventDefault();
            load_vehicle_info($(this).data('rel'));
            $('.vehicle_menu_item').not($(this)).removeClass('kt-widget__item--active');
            $(this).addClass('kt-widget__item--active');
        });
    });

    function load_vehicle_info(page_name = null) {
        $("#load_vehicle_info").html(
            '<center><div style="position: absolute; left: 50%; top: 35%;"><img src=<?php echo e(asset("assets/images/loading.gif")); ?> style="width:110px; height:auto;"></div></center>'
        ).load("<?php echo e(url('dashboard/vehicle_info')); ?>/" + page_name + "/<?php echo e($vehicle->id); ?>");
    }
</script><?php /**PATH /var/www/html/resources/views/enduser/dashboard/vehicle_view.blade.php ENDPATH**/ ?>