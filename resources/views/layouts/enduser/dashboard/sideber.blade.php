<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{url('dashboard/d/dashboard')}}">
                @if(Auth::user()->company_light_logo)
                <img src="{{asset('public/uploads/user/logos/'.Auth::user()->company_light_logo)}}" alt="Logo">
                @else
                <img alt="Logo" src="{{asset('public/assets/media/logos/crm-logo-2.png')}}" />
                @endif
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
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  " aria-haspopup="true">
                    <a href="{{ url('dashboard/dashboard')}}" class="kt-menu__link  vms_menu_item" id="dashboard" data-rel="dashboard">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">Dashboard</span>
                    </a>
                </li>
                <li class="kt-menu__section custom-kt-menu__section">
                    <h4 class="kt-menu__section-text">VMS Overview</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <!-- <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true">
                    <a href="{{ url('dashboard/d/dashboard')}}" class="kt-menu__link  vms_menu_item" id="driver" data-rel="driver">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Driver List</span>
                    </a>
                </li> -->
                <li class="kt-menu__item " aria-haspopup="true">
                    <a href="{{ url('dashboard/d/single_vehicle')}}" class="kt-menu__link  vms_menu_item" id="single_vehicle" data-rel="single_vehicle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-car"></i>
                        </span>
                        <span class="kt-menu__link-text">Single vehicle</span>
                    </a>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" id="vehicle_part" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-car"></i>
                        </span>
                        <span class="kt-menu__link-text">Vehicle</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Vehicle</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_add')}}" class="kt-menu__link  vms_menu_item" id="vehicle_add" data-rel="vehicle_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add vehicle</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle')}}" class="kt-menu__link  vms_menu_item" id="vehicle" data-rel="vehicle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle list</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_group')}}" class="kt-menu__link  vms_menu_item" id="vehicle_group" data-rel="vehicle_group">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle group</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item  kt-menu__item--submenu" id="staff_part" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-car"></i>
                        </span>
                        <span class="kt-menu__link-text">Vehicle Staff</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Vehicle Staff</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_staff_add')}}" class="kt-menu__link  vms_menu_item" id="vehicle_staff_add" data-rel="vehicle_staff_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add vehicle staff</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_staff')}}" class="kt-menu__link  vms_menu_item" id="vehicle_staff" data-rel="vehicle_staff">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle staff list</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" id="vendor" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Vendor</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Vendor</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vendor_add')}}" class="kt-menu__link  vms_menu_item" id="vendor_add" data-rel="vendor_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add vendor</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vendor_manage')}}" class="kt-menu__link  vms_menu_item" id="vendor_manage" data-rel="vendor_manage">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Manage vendor</span>
                                </a>
                            </li>
                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vendor_bill_view')}}" class="kt-menu__link  vms_menu_item" id="customer" data-rel="vendor_bill_view">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vendor Bill View</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Customer</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Customer</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/customer_add')}}" class="kt-menu__link  vms_menu_item" id="customer_add" data-rel="customer_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add customer</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/customer')}}" class="kt-menu__link  vms_menu_item" id="customer" data-rel="customer">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Customer list</span>
                                </a>
                            </li>
                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/customer_bill_view')}}" class="kt-menu__link  vms_menu_item" id="customer" data-rel="customer_bill_view">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Customer Bill View</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu" id="maintenance_part" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Maintenance</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Maintenance</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/maintenance')}}" class="kt-menu__link  vms_menu_item" id="maintenance" data-rel="maintenance">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Maintenance list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/maintenance_type')}}" class="kt-menu__link  vms_menu_item" id="maintenance_type" data-rel="maintenance_type">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Maintenance type</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="income_expense" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Income & Expense</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Income & Expense</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/dashboard')}}" class="kt-menu__link  vms_menu_item" id="create_customer"
                                    data-rel="create_customer">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add customer</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/dashboard')}}" class="kt-menu__link  vms_menu_item" id="customer_list"
                                    data-rel="customer_list">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Customer list</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="report" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Report</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Report</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_wise_summary')}}" class="kt-menu__link  vms_menu_item" id="vehicle_wise_summary" data-rel="vehicle_wise_summary">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle wise summary</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_wise_profit')}}" class="kt-menu__link  vms_menu_item" id="vehicle_wise_profit" data-rel="vehicle_wise_profit">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle wise profit</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_wise_report')}}" class="kt-menu__link  vms_menu_item" id="vehicle_wise_report" data-rel="vehicle_wise_report">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle wise report</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/transport_360_view')}}" class="kt-menu__link  vms_menu_item" id="transport_360_view" data-rel="transport_360_view">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Transport 360 view</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="trip" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Trip</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Trip</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/trip_add')}}" class="kt-menu__link  vms_menu_item" id="trip_add" data-rel="trip_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add trip</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/trip')}}" class="kt-menu__link  vms_menu_item" id="trip" data-rel="trip">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Trip list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/trip_schedule')}}" class="kt-menu__link  vms_menu_item" id="trip_schedule" data-rel="trip_schedule">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Trip schedule calender</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/trip_running')}}" class="kt-menu__link  vms_menu_item" id="trip_running" data-rel="trip_running">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Running trip</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/trip_complete')}}" class="kt-menu__link  vms_menu_item" id="trip_complete" data-rel="trip_complete">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Complete trip</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="parts" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Parts</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Parts</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/parts_add')}}" class="kt-menu__link  vms_menu_item" id="parts_add" data-rel="parts_add">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add parts</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/parts_manage')}}" class="kt-menu__link  vms_menu_item" id="parts_manage" data-rel="parts_manage">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Manage parts</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/parts_categories')}}" class="kt-menu__link  vms_menu_item" id="parts_categories" data-rel="parts_categories">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Manage parts categories</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="expense" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Expense</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Expense</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/fuel_log')}}" class="kt-menu__link  vms_menu_item" id="fuel_log" data-rel="fuel_log">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Fuel Log</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/all_expense_log')}}" class="kt-menu__link  vms_menu_item" id="all_expense_log" data-rel="all_expense_log">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">All Expense Log</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/expense_group')}}" class="kt-menu__link  vms_menu_item" id="expense_group" data-rel="expense_group">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Expense Group</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/expense_type')}}" class="kt-menu__link  vms_menu_item" id="expense_type" data-rel="expense_type">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Expense Type</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="maintenance_part" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Maintenance</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Maintenance</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/maintenance')}}" class="kt-menu__link  vms_menu_item" id="maintenance" data-rel="maintenance">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Maintenance list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/maintenance_type')}}" class="kt-menu__link  vms_menu_item" id="maintenance_type" data-rel="maintenance_type">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Maintenance type</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" id="paper_document" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Document</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Document</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/document')}}" class="kt-menu__link  vms_menu_item" id="document" data-rel="document">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Document list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/document_type')}}" class="kt-menu__link  vms_menu_item" id="document_type" data-rel="document_type">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Document type</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <li class="kt-menu__item kt-menu__item--submenu" id="manage_account" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Manage account</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Manage account</span>
                                </span>
                            </li>
                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/user')}}" class="kt-menu__link  vms_menu_item" id="user" data-rel="user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">User List</span>
                                </a>
                            </li> -->
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ route('department.index')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">User Department</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ route('permit.index')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">User permission</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ route('assign-permit.create')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Assign permission</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="complain_management" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Complain Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Complain Management</span>
                                </span>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/complain_add')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Add Complain</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/complain')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Complain List</span>
                                </a>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/complain_type')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Complain Type</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="kt-menu__item kt-menu__item--submenu" id="management" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Management</span>
                                </span>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/user_login_history')}}" class="kt-menu__link  vms_menu_item" id="user_login_history" data-rel="user_login_history">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">User login history</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" id="inspection_management" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Inspection Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Inspection Management</span>
                                </span>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/inspection_category')}}" class="kt-menu__link  vms_menu_item" id="inspection_category" data-rel="inspection_category">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Inspection Category</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/inspection_items')}}" class="kt-menu__link  vms_menu_item" id="inspection_items" data-rel="inspection_items">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Inspection Items</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/vehicle_inspection')}}" class="kt-menu__link  vms_menu_item" id="vehicle_inspection" data-rel="vehicle_inspection">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Vehicle Inspection</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/inspection_logs')}}" class="kt-menu__link  vms_menu_item" id="inspection_logs" data-rel="inspection_logs">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Inspection Logs</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" id="purchase_section" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Purchase</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Purchase</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/purchase')}}" class="kt-menu__link  vms_menu_item" id="purchase" data-rel="purchase">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Purchase List</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/purchase_add')}}" class="kt-menu__link  vms_menu_item" id="purchase" data-rel="purchase">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Purchase Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="kt-menu__item kt-menu__item--submenu" id="invoice_section" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Invoice</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Invoice</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/invoice')}}" class="kt-menu__link  vms_menu_item" id="purchase" data-rel="purchase">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Invoice List</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/invoice_add')}}" class="kt-menu__link  vms_menu_item" id="purchase" data-rel="purchase">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Invoice Add</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
<!--
                <li class="kt-menu__item kt-menu__item--submenu" id="package_management" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Package Management</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Package Management</span>
                                </span>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/')}}" class="kt-menu__link  vms_menu_item" id="profile" data-rel="profile">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">SMS</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/d/')}}" class="kt-menu__link  vms_menu_item" id="admin_user" data-rel="admin_user">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Mobile recharge</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu" id="accounts" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Accounts</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Accounts</span>
                                </span>
                            </li>

                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/accounts/account_setup')}}" class="kt-menu__link  vms_menu_item" id="account_setup" data-rel="account_setup">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Accounts setup</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/accounts/deposit')}}" class="kt-menu__link  vms_menu_item" id="deposit" data-rel="deposit">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Deposit list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/accounts/expense')}}" class="kt-menu__link  vms_menu_item" id="expense" data-rel="expense">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Expense list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/accounts/transfer')}}" class="kt-menu__link  vms_menu_item" id="transfer" data-rel="transfer">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Transfer list</span>
                                </a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">Accounts report</span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{ url('dashboard/accounts/ledger_report')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Ledger report</span>
                                            </a>
                                        </li>
                                        <li class="kt-menu__item " aria-haspopup="true">
                                            <a href="{{ url('dashboard/accounts/regular_balance_sheet')}}" class="kt-menu__link ">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">Regular balance sheet</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <li class="kt-menu__item kt-menu__item--submenu" id="settings" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="kt-menu__link-text">Settings</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">Settings</span>
                                </span>
                            </li>
                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/master_setting')}}" class="kt-menu__link  vms_menu_item" id="master_setting" data-rel="master_setting">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Master setting</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/master_setting_type')}}" class="kt-menu__link  vms_menu_item" id="master_setting_type" data-rel="master_setting_type">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Master setting type</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/business_setting')}}" class="kt-menu__link  vms_menu_item" id="business_setting" data-rel="business_setting">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Business setting</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/email_setting')}}" class="kt-menu__link  vms_menu_item" id="email_setting" data-rel="email_setting">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Email setting</span>
                                </a>
                            </li> -->
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ route('sms_settings_index')}}" class="kt-menu__link  vms_menu_item" id="localization" data-rel="localization">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Sms Settings</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('category-index')}}" class="kt-menu__link  vms_menu_item" id="localization" data-rel="localization">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Sms Category</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('template-index')}}" class="kt-menu__link  vms_menu_item" id="localization" data-rel="localization">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Sms Template</span>
                                </a>
                            </li>
                            <!-- <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/payment_gateway')}}" class="kt-menu__link  vms_menu_item" id="payment_gateway" data-rel="payment_gateway">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Payment gateway</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('dashboard/setting/payment_method')}}" class="kt-menu__link  vms_menu_item" id="payment_method" data-rel="payment_method">
                                    <span class="kt-menu__link-icon">
                                        <i class="fas fa-car"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Payment method</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->

</div>