@extends('layouts.business.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
           <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('admin.dashboard')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Business </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-secondary">Today</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">Month</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">Year</a>
                    <a href="#" class="btn kt-subheader__btn-primary">
                        Actions

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle-="kt-tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-link"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--brand kt-badge--rounded">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm kt-hidden" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>

                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="row">
            <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                <div class="kt-portlet">
                    
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">Account Information</a></li>
                                    <!-- <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">Contact details</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Web</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-3" class="nav-link">Platform info</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-4" class="nav-link">Account details</a></li> -->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <table class="table table-bordered table-success">
                                                    <tbody>
                                                        <tr>
                                                            <td  colspan="3">
                                                                <div class="kt-header-menu custom-header-menu">
                                                                    <ul class="nav">
                            
                                                                        <li class="nav-item ">
                                                                            <a href="javascript:;" class="nav-link">
                                                                                <span class="kt-menu__link-text custom-kt-menu__link-text">Go Max Tracker</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item ">
                                                                            <a href="javascript:;" class="nav-link">
                                                                            <span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="far fa-edit mr-1"></i>Edit</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="fas fa-tv mr-1"></i>Monitor</span></a>
                                                                        </li>
                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="far fa-bell mr-1"></i>Notification</span></a>
                                                                        </li>
                                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-kt-menu__link-text custom-link"><i class="far fa-envelope mr-1"></i>Send Message</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Account:</lable> Gm0124657</span>
                                                            </td>
                                                            <td>
                                                                <span><lable class="custom-table-td">Roll:</lable> Distributor</span>
                                                            </td>
                                                            <td>
                                                                <span><lable class="custom-table-td">Divce Quantity:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Contact:</lable> 0124657</span>
                                                            </td>
                                                            <td>
                                                                <span><lable class="custom-table-td">Phone:</lable> 01245678</span>
                                                            </td>
                                                            <td>
                                                                <span><lable class="custom-table-td">Address:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <span><lable class="custom-table-td">Balance:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-lg-3">
                                                <table class="table table-bordered table-success ">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Monthly Due:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Invoice Due:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Total Due:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span><lable class="custom-table-td">Platform User ID:</lable> 25</span>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a data-toggle="tab" href="#divce" class="active nav-link">Divce</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#sub-account" class="nav-link">Sub-Account</a></li>
                                            <li class="nav-item"><a data-toggle="tab" href="#information" class="nav-link">Information</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="divce" role="tabpanel">
                                                <div class="kt-header-menu custom-header-menu">
                                                    <ul class="nav">
                                                        <li class="nav-item ">
                                                            <a href="javascript:;" class="nav-link">
                                                                <span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-dollar-sign mr-1"></i>Batch Sale</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item ">
                                                            <a href="javascript:;" class="nav-link">
                                                                <span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-arrows-alt mr-1"></i>Batch Move</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-link-text custom-link"><i class="far fa-clock mr-1"></i>Batch Modify Expiry Date</span></a>
                                                        </li>
                                                        <li class="nav-item "><a href="javascript:;" class="nav-link"><span class="kt-menu__link-text custom-link-text custom-link"><i class="fas fa-file-invoice mr-1"></i>Batch Recharge</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!--begin: Datatable -->
                                                <div class="kt-datatable" id="local_data"></div>
                                                <!--end: Datatable -->
                                            </div>
                                            <div class="tab-pane" id="sub-account" role="tabpanel">
                                                <div class="kt-portlet__body">

                                                    <!--begin: Datatable -->
                                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="sub_account_table">
                                                        <thead>
                                                            <tr>
                                                                <th>Record ID</th>
                                                                <th>Order ID</th>
                                                                <th>Country</th>
                                                                <th>Ship City</th>
                                                                <th>Ship Address</th>
                                                                <th>Company Agent</th>
                                                                <th>Company Name</th>
                                                                <th>Ship Date</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>61715-075</td>
                                                                <td>China</td>
                                                                <td>Tieba</td>
                                                                <td>746 Pine View Junction</td>
                                                                <td>Nixie Sailor</td>
                                                                <td>Gleichner, Ziemann and Gutkowski</td>
                                                                <td>2/12/2018</td>
                                                                <td>3</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>63629-4697</td>
                                                                <td>Indonesia</td>
                                                                <td>Cihaur</td>
                                                                <td>01652 Fulton Trail</td>
                                                                <td>Emelita Giraldez</td>
                                                                <td>Rosenbaum-Reichel</td>
                                                                <td>8/6/2017</td>
                                                                <td>6</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>68084-123</td>
                                                                <td>Argentina</td>
                                                                <td>Puerto Iguazú</td>
                                                                <td>2 Pine View Park</td>
                                                                <td>Ula Luckin</td>
                                                                <td>Kulas, Cassin and Batz</td>
                                                                <td>5/26/2016</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>67457-428</td>
                                                                <td>Indonesia</td>
                                                                <td>Talok</td>
                                                                <td>3050 Buell Terrace</td>
                                                                <td>Evangeline Cure</td>
                                                                <td>Pfannerstill-Treutel</td>
                                                                <td>7/2/2016</td>
                                                                <td>1</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>31722-529</td>
                                                                <td>Austria</td>
                                                                <td>Sankt Andrä-Höch</td>
                                                                <td>3038 Trailsway Junction</td>
                                                                <td>Tierney St. Louis</td>
                                                                <td>Dicki-Kling</td>
                                                                <td>5/20/2017</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>64117-168</td>
                                                                <td>China</td>
                                                                <td>Rongkou</td>
                                                                <td>023 South Way</td>
                                                                <td>Gerhard Reinhard</td>
                                                                <td>Gleason, Kub and Marquardt</td>
                                                                <td>11/26/2016</td>
                                                                <td>5</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>43857-0331</td>
                                                                <td>China</td>
                                                                <td>Baiguo</td>
                                                                <td>56482 Fairfield Terrace</td>
                                                                <td>Englebert Shelley</td>
                                                                <td>Jenkins Inc</td>
                                                                <td>6/28/2016</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>64980-196</td>
                                                                <td>Croatia</td>
                                                                <td>Vinica</td>
                                                                <td>0 Elka Street</td>
                                                                <td>Hazlett Kite</td>
                                                                <td>Streich LLC</td>
                                                                <td>8/5/2016</td>
                                                                <td>6</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>0404-0360</td>
                                                                <td>Colombia</td>
                                                                <td>San Carlos</td>
                                                                <td>38099 Ilene Hill</td>
                                                                <td>Freida Morby</td>
                                                                <td>Haley, Schamberger and Durgan</td>
                                                                <td>3/31/2017</td>
                                                                <td>2</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>52125-267</td>
                                                                <td>Thailand</td>
                                                                <td>Maha Sarakham</td>
                                                                <td>8696 Barby Pass</td>
                                                                <td>Obed Helian</td>
                                                                <td>Labadie, Predovic and Hammes</td>
                                                                <td>1/26/2017</td>
                                                                <td>1</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td>54092-515</td>
                                                                <td>Brazil</td>
                                                                <td>Canguaretama</td>
                                                                <td>32461 Ridgeway Alley</td>
                                                                <td>Sibyl Amy</td>
                                                                <td>Treutel-Ratke</td>
                                                                <td>3/8/2017</td>
                                                                <td>4</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>12</td>
                                                                <td>0185-0130</td>
                                                                <td>China</td>
                                                                <td>Jiamachi</td>
                                                                <td>23 Walton Pass</td>
                                                                <td>Norri Foldes</td>
                                                                <td>Strosin, Nitzsche and Wisozk</td>
                                                                <td>4/2/2017</td>
                                                                <td>3</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>13</td>
                                                                <td>21130-678</td>
                                                                <td>China</td>
                                                                <td>Qiaole</td>
                                                                <td>328 Glendale Hill</td>
                                                                <td>Myrna Orhtmann</td>
                                                                <td>Miller-Schiller</td>
                                                                <td>6/7/2016</td>
                                                                <td>3</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>14</td>
                                                                <td>40076-953</td>
                                                                <td>Portugal</td>
                                                                <td>Burgau</td>
                                                                <td>52550 Crownhardt Court</td>
                                                                <td>Sioux Kneath</td>
                                                                <td>Rice, Cole and Spinka</td>
                                                                <td>10/11/2017</td>
                                                                <td>4</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>15</td>
                                                                <td>36987-3005</td>
                                                                <td>Portugal</td>
                                                                <td>Bacelo</td>
                                                                <td>548 Morrow Terrace</td>
                                                                <td>Christa Jacmar</td>
                                                                <td>Brakus-Hansen</td>
                                                                <td>8/17/2017</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>16</td>
                                                                <td>67510-0062</td>
                                                                <td>South Africa</td>
                                                                <td>Pongola</td>
                                                                <td>02534 Hauk Trail</td>
                                                                <td>Shandee Goracci</td>
                                                                <td>Bergnaum, Thiel and Schuppe</td>
                                                                <td>7/24/2016</td>
                                                                <td>5</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>17</td>
                                                                <td>36987-2542</td>
                                                                <td>Russia</td>
                                                                <td>Novokizhinginsk</td>
                                                                <td>19427 Sloan Road</td>
                                                                <td>Jerrome Colvie</td>
                                                                <td>Kreiger, Glover and Connelly</td>
                                                                <td>3/4/2016</td>
                                                                <td>3</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>18</td>
                                                                <td>11673-479</td>
                                                                <td>Brazil</td>
                                                                <td>Conceição das Alagoas</td>
                                                                <td>191 Stone Corner Road</td>
                                                                <td>Michaelina Plenderleith</td>
                                                                <td>Legros-Gleichner</td>
                                                                <td>2/21/2018</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>19</td>
                                                                <td>47781-264</td>
                                                                <td>Ukraine</td>
                                                                <td>Yasinya</td>
                                                                <td>1481 Sauthoff Place</td>
                                                                <td>Lombard Luthwood</td>
                                                                <td>Haag LLC</td>
                                                                <td>1/21/2016</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>20</td>
                                                                <td>42291-712</td>
                                                                <td>Indonesia</td>
                                                                <td>Kembang</td>
                                                                <td>9029 Blackbird Point</td>
                                                                <td>Leonora Chevin</td>
                                                                <td>Mann LLC</td>
                                                                <td>9/6/2017</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>21</td>
                                                                <td>64679-154</td>
                                                                <td>Mongolia</td>
                                                                <td>Sharga</td>
                                                                <td>102 Holmberg Park</td>
                                                                <td>Tannie Seakes</td>
                                                                <td>Blanda Group</td>
                                                                <td>7/31/2016</td>
                                                                <td>6</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>22</td>
                                                                <td>49348-055</td>
                                                                <td>China</td>
                                                                <td>Guxi</td>
                                                                <td>45 Butterfield Street</td>
                                                                <td>Yardley Wetherell</td>
                                                                <td>Gerlach-Schultz</td>
                                                                <td>4/3/2017</td>
                                                                <td>2</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>23</td>
                                                                <td>47593-438</td>
                                                                <td>Portugal</td>
                                                                <td>Viso</td>
                                                                <td>97 Larry Center</td>
                                                                <td>Bryn Peascod</td>
                                                                <td>Larkin and Sons</td>
                                                                <td>5/22/2016</td>
                                                                <td>6</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>24</td>
                                                                <td>54569-0175</td>
                                                                <td>Japan</td>
                                                                <td>Minato</td>
                                                                <td>077 Hoffman Center</td>
                                                                <td>Chrissie Jeromson</td>
                                                                <td>Brakus-McCullough</td>
                                                                <td>11/26/2017</td>
                                                                <td>2</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>25</td>
                                                                <td>0093-1016</td>
                                                                <td>Indonesia</td>
                                                                <td>Merdeka</td>
                                                                <td>3150 Cherokee Center</td>
                                                                <td>Gusti Clamp</td>
                                                                <td>Stokes Group</td>
                                                                <td>4/12/2018</td>
                                                                <td>6</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>26</td>
                                                                <td>0093-5142</td>
                                                                <td>China</td>
                                                                <td>Jianggao</td>
                                                                <td>289 Badeau Alley</td>
                                                                <td>Otis Jobbins</td>
                                                                <td>Ruecker, Leffler and Abshire</td>
                                                                <td>3/6/2018</td>
                                                                <td>4</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>27</td>
                                                                <td>51523-026</td>
                                                                <td>Germany</td>
                                                                <td>Erfurt</td>
                                                                <td>132 Chive Way</td>
                                                                <td>Lonnie Haycox</td>
                                                                <td>Feest Group</td>
                                                                <td>4/24/2018</td>
                                                                <td>1</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>28</td>
                                                                <td>49035-522</td>
                                                                <td>Australia</td>
                                                                <td>Eastern Suburbs Mc</td>
                                                                <td>074 Algoma Drive</td>
                                                                <td>Heddi Castelli</td>
                                                                <td>Kessler and Sons</td>
                                                                <td>1/12/2017</td>
                                                                <td>5</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>29</td>
                                                                <td>58411-198</td>
                                                                <td>Ethiopia</td>
                                                                <td>Kombolcha</td>
                                                                <td>91066 Amoth Court</td>
                                                                <td>Tuck O'Dowgaine</td>
                                                                <td>Simonis, Rowe and Davis</td>
                                                                <td>5/6/2017</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>30</td>
                                                                <td>27495-006</td>
                                                                <td>Portugal</td>
                                                                <td>Arrifes</td>
                                                                <td>3 Fairfield Junction</td>
                                                                <td>Vernon Cosham</td>
                                                                <td>Kreiger-Nicolas</td>
                                                                <td>2/8/2017</td>
                                                                <td>4</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>31</td>
                                                                <td>55154-8284</td>
                                                                <td>Philippines</td>
                                                                <td>Talisay</td>
                                                                <td>09 Sachtjen Junction</td>
                                                                <td>Bryna MacCracken</td>
                                                                <td>Hyatt-Witting</td>
                                                                <td>7/22/2017</td>
                                                                <td>2</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>32</td>
                                                                <td>62678-207</td>
                                                                <td>Libya</td>
                                                                <td>Zuwārah</td>
                                                                <td>82 Thackeray Pass</td>
                                                                <td>Freda Arnall</td>
                                                                <td>Dicki, Morar and Stiedemann</td>
                                                                <td>7/22/2016</td>
                                                                <td>3</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>33</td>
                                                                <td>68428-725</td>
                                                                <td>China</td>
                                                                <td>Zhangcun</td>
                                                                <td>3 Goodland Terrace</td>
                                                                <td>Pavel Kringe</td>
                                                                <td>Goldner-Lehner</td>
                                                                <td>4/2/2017</td>
                                                                <td>4</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>34</td>
                                                                <td>0363-0724</td>
                                                                <td>Morocco</td>
                                                                <td>Temara</td>
                                                                <td>9550 Weeping Birch Crossing</td>
                                                                <td>Felix Nazaret</td>
                                                                <td>Waters, Quigley and Keeling</td>
                                                                <td>6/4/2016</td>
                                                                <td>5</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>35</td>
                                                                <td>37000-102</td>
                                                                <td>Paraguay</td>
                                                                <td>Los Cedrales</td>
                                                                <td>1 Ridge Oak Way</td>
                                                                <td>Penrod Allanby</td>
                                                                <td>Rodriguez Group</td>
                                                                <td>3/5/2018</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>36</td>
                                                                <td>55289-002</td>
                                                                <td>Philippines</td>
                                                                <td>Dologon</td>
                                                                <td>9 Vidon Terrace</td>
                                                                <td>Hubey Passby</td>
                                                                <td>Lemke-Hermiston</td>
                                                                <td>6/29/2017</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>37</td>
                                                                <td>15127-874</td>
                                                                <td>Tanzania</td>
                                                                <td>Nanganga</td>
                                                                <td>33 Anniversary Parkway</td>
                                                                <td>Magdaia Rotlauf</td>
                                                                <td>Hettinger, Medhurst and Heaney</td>
                                                                <td>2/18/2018</td>
                                                                <td>3</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>38</td>
                                                                <td>49349-123</td>
                                                                <td>Indonesia</td>
                                                                <td>Pule</td>
                                                                <td>77292 Bonner Plaza</td>
                                                                <td>Alfonse Lawrance</td>
                                                                <td>Schuppe-Harber</td>
                                                                <td>4/14/2017</td>
                                                                <td>1</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>39</td>
                                                                <td>17089-415</td>
                                                                <td>Palestinian Territory</td>
                                                                <td>Za‘tarah</td>
                                                                <td>42806 Ridgeview Terrace</td>
                                                                <td>Kessiah Chettoe</td>
                                                                <td>Mraz LLC</td>
                                                                <td>3/4/2017</td>
                                                                <td>5</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>40</td>
                                                                <td>51327-510</td>
                                                                <td>Philippines</td>
                                                                <td>Esperanza</td>
                                                                <td>4 Linden Court</td>
                                                                <td>Natka Fairbanks</td>
                                                                <td>Mueller-Greenholt</td>
                                                                <td>6/21/2017</td>
                                                                <td>3</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>41</td>
                                                                <td>0187-2201</td>
                                                                <td>Brazil</td>
                                                                <td>Rio das Ostras</td>
                                                                <td>5722 Buhler Place</td>
                                                                <td>Shaw Puvia</td>
                                                                <td>Veum LLC</td>
                                                                <td>6/10/2017</td>
                                                                <td>3</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>42</td>
                                                                <td>16590-890</td>
                                                                <td>Indonesia</td>
                                                                <td>Krajan Gajahmati</td>
                                                                <td>54 Corry Street</td>
                                                                <td>Alden Dingate</td>
                                                                <td>Heidenreich Inc</td>
                                                                <td>10/27/2016</td>
                                                                <td>5</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>43</td>
                                                                <td>75862-001</td>
                                                                <td>Indonesia</td>
                                                                <td>Pineleng</td>
                                                                <td>4 Messerschmidt Point</td>
                                                                <td>Cherish Peplay</td>
                                                                <td>McCullough-Gibson</td>
                                                                <td>11/23/2017</td>
                                                                <td>2</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>44</td>
                                                                <td>24559-091</td>
                                                                <td>Philippines</td>
                                                                <td>Amuñgan</td>
                                                                <td>5470 Forest Parkway</td>
                                                                <td>Nedi Swetman</td>
                                                                <td>Gerhold Inc</td>
                                                                <td>3/23/2017</td>
                                                                <td>5</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>45</td>
                                                                <td>0007-3230</td>
                                                                <td>Russia</td>
                                                                <td>Bilyarsk</td>
                                                                <td>5899 Basil Place</td>
                                                                <td>Ashley Blick</td>
                                                                <td>Cummings-Goodwin</td>
                                                                <td>10/1/2016</td>
                                                                <td>4</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>46</td>
                                                                <td>50184-1029</td>
                                                                <td>Peru</td>
                                                                <td>Chocope</td>
                                                                <td>65560 Daystar Center</td>
                                                                <td>Saunders Harmant</td>
                                                                <td>O'Kon-Wiegand</td>
                                                                <td>11/7/2017</td>
                                                                <td>3</td>
                                                                <td>2</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>47</td>
                                                                <td>10819-6003</td>
                                                                <td>France</td>
                                                                <td>Rivesaltes</td>
                                                                <td>4981 Springs Center</td>
                                                                <td>Mellisa Laurencot</td>
                                                                <td>Jacobs Group</td>
                                                                <td>10/30/2017</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>48</td>
                                                                <td>62750-003</td>
                                                                <td>Mongolia</td>
                                                                <td>Jargalant</td>
                                                                <td>94 Rutledge Way</td>
                                                                <td>Orland Myderscough</td>
                                                                <td>Gutkowski Inc</td>
                                                                <td>11/2/2016</td>
                                                                <td>5</td>
                                                                <td>3</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>49</td>
                                                                <td>68647-122</td>
                                                                <td>Philippines</td>
                                                                <td>Cardona</td>
                                                                <td>4765 Service Hill</td>
                                                                <td>Devi Iglesias</td>
                                                                <td>Ullrich-Dibbert</td>
                                                                <td>7/21/2016</td>
                                                                <td>1</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                            <tr>
                                                                <td>50</td>
                                                                <td>36987-3093</td>
                                                                <td>China</td>
                                                                <td>Jiantou</td>
                                                                <td>373 Northwestern Plaza</td>
                                                                <td>Bliss Tummasutti</td>
                                                                <td>Legros-Cummings</td>
                                                                <td>11/27/2017</td>
                                                                <td>5</td>
                                                                <td>1</td>
                                                                <td nowrap></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <!--end: Datatable -->
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="information" role="tabpanel">
                                                <!--begin::Form-->
                                                <form class="kt-form kt-form--label-right">
                                                    <div class="kt-portlet__body">
                                                        
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-md-2 col-form-label">Text</label>
                                                            <div class="col-md-8 col-lg-6">
                                                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                                            <div class="col-md-8 col-lg-6">
                                                                <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                                                            <div class="col-md-8 col-lg-6">
                                                                <input class="form-control" type="number" value="1-(555)-555-5555" id="example-tel-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-number-input" class="col-md-2 col-form-label">Number</label>
                                                            <div class="col-md-8 col-lg-6">
                                                                <input class="form-control" type="number" id="example-number-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__foot">
                                                        <div class="kt-form__actions">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                </div>
                                                                <div class="col-md-8 col-lg-6">
                                                                    <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                                    <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">URL *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Credit Card</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">URL *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Credit Card</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">URL *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Credit Card</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-eg11-4" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">URL *</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                                    <div class="input-group-append"><span class="input-group-text">.via.com</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="kt-input-icon kt-input-icon--left">
                                                    <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Credit Card</label>
                                            <div class="col-lg-5 col-md-9 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 col-md-9 col-sm-12">
                                                <button type="submit" class="btn btn-brand btn-sm float-right">Save</button>
                                            </div>
                                        </div>
                                    </div> -->
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


<script>
    $(document).ready(function() {
        //  $('#divce_table').DataTable( {
           
        // } );


        $('#sub_account_table').DataTable( {
           
        } );
    } );
</script>
@endsection