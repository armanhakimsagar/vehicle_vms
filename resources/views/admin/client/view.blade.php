@extends('layouts.admin.master')
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Client </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Single Client </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Row-->

        <div class="row single_client">
            <div class=" col-sm-12 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title" id="demo">At a glance</h5>
                        </div>
                    </div>


                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center"></i>Total Due</h5>
                                        <h5 class="card-title text-center">0</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center">Monthly Due</h5>
                                        <h5 class="card-title text-center">0</h5>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center">Invoice Due</h5>
                                        <h5 class="card-title text-center">0</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center">Total Unit</h5>
                                        <h5 class="card-title text-center">0</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/r.png")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center">Active Unit</h5>
                                        <h5 class="card-title text-center">0</h5>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/bg-7.jpg")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center">Others Unit</h5>
                                        <h5 class="card-title text-center">0</h5>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                    <!--Begin:: App Aside Mobile Toggle-->
                    <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                        <i class="la la-close"></i>
                    </button>
                    <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" >

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
                                <div class="kt-widget kt-widget--user-profile-1" >
                                    <div class="kt-widget__head">
                                        <div class="kt-widget__media">
                                            <img src="{{asset('assets/media/users/100_3.jpg')}}" alt="image">
                                        </div>
                                        <div class="kt-widget__content">
                                            <input type="hidden" id="id" value="{{$client->id}}">
                                            <div class="kt-widget__section">
                                                <a href="" class="kt-widget__username">
                                                {{$client->customer_name}}
                                                </a>
                                            </div>
                                            <div class="kt-widget__action">
                                                @if($client->global_status==0)
                                                <span class="btn btn-warning btn-sm">Inactive</span>
                                                @elseif($client->global_status==1)
                                                <span class="btn btn-success btn-sm">Active</span>
                                                @elseif($client->global_status==2)
                                                <span class="btn btn-info btn-sm">Overdue</span>
                                                @elseif($client->global_status==3)
                                                <span class="btn btn-primary btn-sm">On Hold</span>
                                                @elseif($client->global_status==4)
                                                <span class="btn btn-danger btn-sm">Stop</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget__body">
                                        <div class="kt-widget__content">

                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Account </span>
                                                <span class="kt-widget__data">{{$client->hosting_company}} </span>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Phone </span>
                                                <span class="kt-widget__data">{{$client->phone}} </span>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Email</span>
                                                <span class="kt-widget__data"> {{$client->email}}</span>
                                            </div>
                                            <div class="kt-widget__info">
                                                <span class="kt-widget__label">Balance</span>
                                                <span class="kt-widget__data"> </span>
                                            </div>

                                        </div>
                                        <div class="kt-widget__items">
                                            <a href="javascript:;" id="client_information" class="kt-widget__item kt-widget__item--active client_menu_item" data-rel="client_information">
                                                <span class="kt-widget__section">
                                                    <span class="kt-widget__icon">
                                                    <i class="fas fa-info"></i></span>
                                                    <span class="kt-widget__desc">
                                                        Client Information
                                                    </span>
                                                </span>
                                            </a>
                                            <a href="javascript:;" id="complain"  class="kt-widget__item client_menu_item" data-rel="complain">
                                                <span class="kt-widget__section">
                                                    <span class="kt-widget__icon">
                                                    <i class="fas fa-assistive-listening-systems"></i></span>
                                                    <span class="kt-widget__desc">
                                                    Complain
                                                    </span>
                                                </span>
                                            </a>
                                            <a href="javascript:;" id="single_client_login_history"  class="kt-widget__item client_menu_item" data-rel="single_client_login_history">
                                                <span class="kt-widget__section">
                                                    <span class="kt-widget__icon">
                                                    <i class="fas fa-bacon"></i></span>
                                                    <span class="kt-widget__desc">
                                                        Client Log
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
                    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                        <div id="load_client_content">

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--End::Row-->


    </div>
    <!-- end:: Content -->

</div>


<script>

    $(document).ready(function(){
        var id = $('#id').val();
        $(".client_menu_item").each(function(index){
            $(this).on('click', function(e){
                e.preventDefault();
                load_client_page($(this).data('rel'), id);
                $(".client_menu_item").not($(this)).removeClass('kt-widget__item--active');
                $(this).addClass('kt-widget__item--active');
            });
        });
        load_client_page('client_information', id);
		$('#client_information').addClass('kt-widget__item--active');
    });

    function load_client_page(page_name=null, id=null){
        $("#load_client_content").load("{{ url('client_info')}}/"+id+"/"+page_name);
    }


</script>
@endsection