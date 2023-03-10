<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{route('admin.dashboard')}}">
                <img alt="Logo" src="{{asset('assets/media/logos/crm-logo-black.png')}}" />
            </a>
        </div>
        <!-- <div class="kt-aside__brand-tools">
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

        </div> -->
    </div>

    <!-- end:: Aside -->


    <!-- begin:: Aside Menu -->

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <div class="custom-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a data-toggle="tab" href="#objects" class="active nav-link">Objects</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#events" class="nav-link">Events</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#places" class="nav-link">Places</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#history" class="nav-link">History</a></li>
                </ul>
                <!-- <div class="custom-sort">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="custom-sort-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort mr-1"></i>Sort

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(32px, 33px, 0px);">
                            <a class="dropdown-item" href="#"><i class="la la-plus"></i> New Report</a>
                            <a class="dropdown-item" href="#"><i class="la la-user"></i> Add Customer</a>
                            <a class="dropdown-item" href="#"><i class="la la-cloud-download"></i> New Download</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="objects" role="tabpanel">
                    <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                        <form method="get" class="kt-quick-search__form custom-kt-quick-search__form">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                            </div>
                        </form>
                        <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                        </div>

                        <div class="custom-buttons ml-1">
                            <a href="#" class="custom-buttons-list" title="Reload">
                                <i class="fas fa-sync-alt mr-1 pl-2"></i>
                            </a>
                            <a href="#" class="custom-buttons-list" title="Add object">
                            <i class="fas fa-plus pr-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="group-heading mt-2" >
                        <ul class="list-group">
                            <li class="list-group-item filter-list-group-item  d-flex justify-content-between  align-items-center">
                                <a href="#" class="custom-link-color">All (15) </a>
                                <a href="#" class="custom-link-color">Online (10) </a>
                                <a href="#" class="custom-link-color">Offline (5)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="accordion mt-2" id="objectAccordion">
                        <div class="">
                            <div class="group-heading" id="headingOne">
                                <h5 class="demo-heading ">

                                    <label class="kt-checkbox kt-checkbox--solid">
                                        <input type="checkbox" id="group-checkbox">
                                        <span></span>
                                    </label>
                                    <a href="#collapse1-1" class="custom-card-title" data-toggle="collapse" >
                                    Default Group
                                    </a>
                                    <a href="#collapse1-1" id="collaplse-arrow" class="custom-link-color"  data-toggle="collapse" >
                                    <i id="arrow-sign " class="fas fa-caret-down"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse1-1" class="collapse show" aria-labelledby="headingOne" data-parent="#objectAccordion">
                                <div class="" >
                                    <ul class="list-group">
                                        <li class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                <label class="kt-checkbox kt-checkbox--solid">
                                                    <input type="checkbox" class="group-checked">
                                                    <span></span>
                                                </label>
                                                <i class="fas fa-car-side mr-2"></i>
                                                <a href="javascript:;" class="custom-link custom-link-text">Cras justo odio <span class="custom-data-span">10 Jun 2020</span></a>
                                            </span>
                                            <span>
                                                <a href="javascript:;" class="custom-link">0 kmh</a>
                                                <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                <a href="#" class="ml-2" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                <span class="kt-nav__link-text">Reports</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                <span class="kt-nav__link-text">Messages</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                <span class="kt-nav__link-text">Charts</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                <span class="kt-nav__link-text">Members</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </span>
                                        </li>
                                        <li class="list-group-item custom-list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                <label class="kt-checkbox kt-checkbox--solid">
                                                    <input type="checkbox" class="group-checked">
                                                    <span></span>
                                                </label>
                                                <i class="fas fa-car-side mr-2"></i>
                                                <a href="javascript:;" class="custom-link custom-link-text">Cras justo odio <span class="custom-data-span">10 Jun 2020</span></a>
                                            </span>
                                            <span>
                                                <a href="javascript:;" class="custom-link">0 kmh</a>
                                                <span class="ml-2"><i class="fas fa-wifi"></i></span>
                                                <a href="#" class="ml-2" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" >
                                                    <ul class="kt-nav">
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                <span class="kt-nav__link-text">Reports</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                <span class="kt-nav__link-text">Messages</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                <span class="kt-nav__link-text">Charts</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                <span class="kt-nav__link-text">Members</span>
                                                            </a>
                                                        </li>
                                                        <li class="kt-nav__item">
                                                            <a href="#" class="kt-nav__link">
                                                                <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                <span class="kt-nav__link-text">Settings</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="events" role="tabpanel">
                    <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                        <form method="get" class="kt-quick-search__form custom-kt-quick-search__form">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                            </div>
                        </form>
                        <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                        </div>

                        <div class="custom-buttons ml-1">
                            <a href="#" class="custom-buttons-list" title="Reload">
                                <i class="fas fa-sync-alt mr-1 pl-2"></i>
                            </a>
                            <a href="#" class="custom-buttons-list" title="Delete all evens">
                                <i class="fas fa-trash pr-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="group-heading mt-2" >
                        <ul class="list-group">
                            <li class="list-group-item filter-list-group-item  d-flex justify-content-between  align-items-center">
                                <a href="#" class="custom-link-color">Time <i class="fas fa-caret-down ml-2"></i></a>
                                <a href="#" class="custom-link-color">Object</a>
                                <a href="#" class="custom-link-color">Event</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="places" role="tabpanel">
                    <div class="custom-tabs">
                        <ul class="nav nav-tabs custom-nav-tabs">
                            <li class="nav-item"><a data-toggle="tab" href="#market" class="active nav-link">Markets (0)</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#route" class="nav-link">Routes (0)</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#zone" class="nav-link">Zones (0)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="market" role="tabpanel">
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    </div>

                                    <div class="custom-buttons ml-1">
                                        <a href="#" class="custom-buttons-list" title="Reload">
                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Add matket">
                                            <i class="fas fa-plus mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Groups">
                                            <i class="fas fa-object-group mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Import">
                                            <i class="fas fa-download mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Export">
                                            <i class="fas fa-upload mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Delete all markets">
                                            <i class="fas fa-trash pr-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="group-heading mt-2" id="headingOne">
                                    <h5 class="demo-heading ">

                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                        <a href="#" class="custom-card-title">
                                        Name
                                        </a>
                                        <a href="#" id="collaplse-arrow" class="custom-link-color">
                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="route" role="tabpanel">
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    </div>

                                    <div class="custom-buttons ml-1">
                                        <a href="#" class="custom-buttons-list" title="Reload">
                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Add route">
                                            <i class="fas fa-plus mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Groups">
                                            <i class="fas fa-object-group mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Import">
                                            <i class="fas fa-download mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Export">
                                            <i class="fas fa-upload mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Delete all routes">
                                            <i class="fas fa-trash pr-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="group-heading mt-2" id="headingOne">
                                    <h5 class="demo-heading ">

                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                        <a href="#" class="custom-card-title">
                                        Name
                                        </a>
                                        <a href="#" id="collaplse-arrow" class="custom-link-color">
                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="zone" role="tabpanel">
                                <div class="kt-quick-search kt-quick-search--inline custom-search-section">
                                    <form method="get" class="kt-quick-search__form custom-kt-quick-search__form2">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1 custom-search-icon"></i></span></div>
                                            <input type="text" class="form-control kt-quick-search__input" placeholder="Search address">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                        </div>
                                    </form>
                                    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                    </div>

                                    <div class="custom-buttons ml-1">
                                        <a href="#" class="custom-buttons-list" title="Reload">
                                            <i class="fas fa-sync-alt mr-2 pl-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Add zone">
                                            <i class="fas fa-plus mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Groups">
                                            <i class="fas fa-object-group mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Import">
                                            <i class="fas fa-download mr-2"></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Export">
                                            <i class="fas fa-upload mr-2 "></i>
                                        </a>
                                        <a href="#" class="custom-buttons-list" title="Delete all zones">
                                            <i class="fas fa-trash pr-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="group-heading mt-2" id="headingOne">
                                    <h5 class="demo-heading ">

                                        <span><i class="fas fa-eye mr-2 custom-link-color"></i></span>
                                        <a href="#" class="custom-card-title">
                                        Name
                                        </a>
                                        <a href="#" id="collaplse-arrow" class="custom-link-color">
                                        <i id="arrow-sign " class="fas fa-caret-down"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="history" role="tabpanel">
                    <div class="filtering-area">
                        <form action="">
                            <div class=" row form-group">
                                <label for="role" class="col-lg-4 col-form-label">Object</label>
                                <div class="col-lg-8">
                                    <select name="" class="form-control kt-select2-2">
                                        <option value="1">Selece one</option>
                                        <option value="2">Select two</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label for="role" class="col-lg-4 col-form-label">Filter</label>
                                <div class="col-lg-8">
                                    <select name="" class="form-control kt-select2-2">
                                        <option value="1">Selece one</option>
                                        <option value="2">Select two</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label for="role" class="col-lg-4 col-form-label">Time from</label>
                                <div class="col-lg-8">
                                    <div class="input-group date">
                                        <input type="text" name="time_to" class="form-control datetimepicker" placeholder="Select starting time" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label for="role" class="col-lg-4 col-form-label">Time to</label>
                                <div class="col-lg-8">
                                    <div class="input-group date">
                                        <input type="text" name="time_to" class="form-control datetimepicker" placeholder="Select ending time" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label for="role" class="col-lg-4 col-form-label">Stops</label>
                                <div class="col-lg-8">
                                    <select name="" class="form-control kt-select2-2">
                                        <option value="1">Selece one</option>
                                        <option value="2">Select two</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <ul class="list-group">
                                    <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                        <a href="#" class="custom-link-color">Show</a>
                                        <a href="#" class="custom-link-color">Hide</a>
                                        <a href="#" class="custom-link-color">Import</a>
                                        <a href="#" class="custom-link-color">Export</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-2">
                                <ul class="list-group">
                                    <li class="list-group-item  d-flex justify-content-between  align-items-center">
                                        <a href="#" class="custom-link-color">Time</a>
                                        <a href="#" class="custom-link-color">Information</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- end:: Aside Menu -->

</div>

<script>
    $(document).ready(function(e){

        $('.datetimepicker').datetimepicker({
            todayHighlight: true,
            autoclose: true,
            pickerPosition: 'bottom-left',
            todayBtn: true,
            showMeridian: true,
            format:'dd M yyyy  HH:ii p'
        });
    });
</script>