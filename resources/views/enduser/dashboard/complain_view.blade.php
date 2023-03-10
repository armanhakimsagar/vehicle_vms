@extends('layouts.enduser.dashboard.master')

@section('content')
<style>
    .kt-widget__items {
        position: relative
    }

    .kt-widget.kt-widget--user-profile-1 .kt-widget__body .kt-widget__items .kt-widget__item {
        margin: 0.7rem 0;
    }

    .complain_menu_item::before {
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
<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Complain View</a>
                </div>
            </div>
        </div>
    </div>
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

                            <div class="kt-portlet__body kt-portlet__body--fit-y">

                                <!--begin::Widget -->
                                <div class="kt-widget kt-widget--user-profile-1">

                                    <div class="kt-widget__body">
                                        <div class="kt-widget__content">
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label"></span>
                                                <span class="kt-widget__data"></span>
                                            </div>
                                        </div>
                                        <div class="kt-widget__items">
                                            <a href="javascript:;" class="kt-widget__item kt-widget__item--active complain_menu_item " data-rel="complain_information">
                                                <span class="kt-widget__section">

                                                    <span class="kt-widget__desc">
                                                    Complain Information
                                                    </span>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <!--end::Widget -->
                            </div>
                        </div>

                    </div>

                    <!--End:: App Aside-->

                    <!--Begin:: App Content-->
                    <div id="load_complain_info" style="width: 100%;">

                    </div>
                </div>
            </div>
        </div>

        <!--End::Row-->


    </div>
</div>
<!-- end:: Content -->


<script>
    $(document).ready(function(e) {
        load_complain_info('complain_information');

    });

    $(".complain_menu_item").each(function(index) {
        $(this).on('click', function(e) {
            e.preventDefault();
            load_complain_info($(this).data('rel'));
            $('.complain_menu_item').not($(this)).removeClass('kt-widget__item--active');
            $(this).addClass('kt-widget__item--active');
        });
    });

    function load_complain_info(page_name = null) {
        $("#load_complain_info").html(
            '<center><div style="position: absolute; left: 50%; top: 35%;"><img src={{asset("assets/images/loading.gif")}} style="width:110px; height:auto;"></div></center>'
        ).load("{{ url('dashboard/complain_info')}}/" + page_name + "/{{$complain_id}}");
    }
</script>
@endsection