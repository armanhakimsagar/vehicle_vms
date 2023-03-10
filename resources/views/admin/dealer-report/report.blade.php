@extends('layouts.admin.dealer-report.master')
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
                    <a href="{{url('report')}}" class="kt-subheader__breadcrumbs-link">Report </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">Moving Overview </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 1-->

        <!--Begin::Row-->
        <div class="row">
            <div class=" col-sm-12 order-lg-3 order-xl-1">
                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head custom-kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <div class="row">
                                <form action="">
                                    @csrf
                                    <label for="example-date-input" class="mr-2 my-2 " id=""> 
                                    Divce:
                                    </label>
                                    <select class="custom-form-control form-control kt-select2 my-2 " multiple="multiple">               
                                        <option value="0">All</option>
                                        <option value="1">Divce</option>
                                        <option value="2">Hello</option>
                                    </select>
                                    <label class="kt-radio kt-radio--bold kt-radio--brand my-2   mr-2 ml-2" >
                                        <input type="radio" name="radio" checked="checked" id="daily"> Daily
                                        <span></span>
                                    </label>
                                    <label class="kt-radio kt-radio--bold kt-radio--brand mr-2 my-2 ">
                                        <input type="radio" name="radio" id="period"> Period
                                        <span></span>
                                    </label>
                                
                                    <label for="example-date-input" class="mr-2 my-2  date">
                                        <div class="input-group date">From: 
                                            <input type="text" class="ml-2 dateTime form-control"  id="kt_datepicker_3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-input-text">
                                                    <i class="la la-calendar glyphicon-th"></i>
                                                </span>
                                            </div>
                                        </div>
                                    
                                    </label>
                                    <label for="example-date-input" class="mr-2 my-2 ">
                                        <div class="input-group date">To: 
                                            <input type="text" class="ml-2 dateTime form-control" id="kt_datepicker_3" />
                                            <div class="input-group-append">
                                                <span class="input-group-text custom-input-text">
                                                    <i class="la la-calendar glyphicon-th"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </label>
                                    <input type="submit" name="" value="Show Report" class="check btn btn-sm">
                                </form>
                            </div>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-brand btn-sm quick-date" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <i class="flaticon-more-1"></i> -->
                                    Quick date
                                </button>
                                <div class=" dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit dropdown-menu-custom">

                                    <!--begin::Nav-->
                                    <ul class="kt-nav">
                                        <li class="kt-nav__head">
                                            Report Options
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="fas fa-history mr-2"></i>
                                                <span class="kt-nav__link-text">Yesterday</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="far fa-clock mr-2"></i>
                                                <span class="kt-nav__link-text">This week</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="far fa-clock mr-2"></i>
                                                <span class="kt-nav__link-text">Last week</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="far fa-calendar-alt mr-2"></i>
                                                <span class="kt-nav__link-text">This month</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="far fa-calendar-alt mr-2"></i>
                                                <span class="kt-nav__link-text">Last month</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!--end::Nav-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3 custom-row">
                        <div class="col-md-3">
                            <div class="card custom-card">
                                <div class="card-body custom-card-body">
                                    <h5 class="card-title text-center"><i class="fas fa-car mr-2"></i>Divce Quantity</h5>
                                    <h5 class="card-title text-center">0</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card custom-card">
                                <div class="card-body custom-card-body">
                                    <h5 class="card-title text-center"><i class="fas fa-tachometer-alt mr-2"></i>Total Mileage (KM)</h5>
                                    <h5 class="card-title text-center">0</h5>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card custom-card">
                                <div class="card-body custom-card-body">
                                    <h5 class="card-title text-center">Total Speeding (Times)</h5>
                                    <h5 class="card-title text-center">0</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card custom-card">
                                <div class="card-body custom-card-body">
                                    <h5 class="card-title text-center">Total Parking (Times)</h5>
                                    <h5 class="card-title text-center">0</h5>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="kt-portlet__body">
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="report_table">
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Order ID</th>
                                    <th>Country</th>
                                    <th>Ship City</th>
                                    <th>Ship Address</th>
                                    <th>Company Agent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>61715-075</td>
                                    <td>China</td>
                                    <td>Tieba</td>
                                    <td>746 Pine Viewport</td>
                                    <td>Nixie Sailor</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>61715-065</td>
                                    <td>India</td>
                                    <td>Mumbie</td>
                                    <td>746 Pine View Junction</td>
                                    <td>Nixie Sailor</td>
                                </tr>
                            </tbody>
                        </table>

                        <!--end: Datatable -->

                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>

        <!--End::Row-->

        <!--End::Dashboard 1-->
    </div>

<!-- end:: Content -->

</div>


<script>

    $(document).ready(function() {
        var table =$('#report_table').DataTable( {
            dom: 'Blfrtip',

            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fa fa-copy"></i>',
                    className: 'btn btn-sm btn-primary ml-3 mr-1',
                },
                {
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv"></i>',
                    className: 'btn btn-sm btn-info mr-1',
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i>',
                    className: 'btn btn-sm btn-success mr-1',
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i>',
                    className: 'btn btn-sm btn-danger mr-1',
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>',
                    className: 'btn btn-sm btn-info mr-1',
                }
            ]
        } );
        table.buttons().container().appendTo('#report_table_length');
    } );


    $("#period").click(function () {

        var dateTime= $('.dateTime');
        if( dateTime.attr('id')==='kt_datepicker_3'){
            dateTime.attr("value", "29 Jun 2020 00:30");
            dateTime.attr("id", "kt_datetimepicker_3");
        }
    });

    $("#daily").click(function () {

        var dateTime= $('.dateTime');
        if( dateTime.attr('id')==='kt_datetimepicker_3'){
            dateTime.attr("value", "20 Jun 2020");
            dateTime.attr("id", "kt_datepicker_3");
        }
    });


</script>
@endsection