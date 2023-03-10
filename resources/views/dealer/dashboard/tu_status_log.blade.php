
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('dealer.dashboard')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Admin </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">TU status log </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="javascript:;" class="btn kt-subheader__btn-secondary">Today</a>
                    <a href="javascript:;" class="btn kt-subheader__btn-secondary">Month</a>
                    <a href="javascript:;" class="btn kt-subheader__btn-secondary">Year</a>
                    <a href="javascript:;" class="btn kt-subheader__btn-primary">
                        Actions

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle-="kt-tooltip" title="Quick actions"
                        data-placement="left">
                        <a href="javascript:;" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
                                class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                        id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                        id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right"
                                        title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-link"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--brand kt-badge--rounded">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="javascript:;">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm kt-hidden" href="javascript:;" data-toggle="kt-tooltip"
                                        data-placement="right" title="Click to learn more...">Learn more</a>
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
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head custom-kt-portlet__head" id="filterSection">
                <div class="kt-portlet__head-label">
                    <form action="">
                        <ul class="list-group">
                            <li class="list-group-item custom-list-group-item d-flex align-items-center">
                                <span class="mr-2">Deivce:</span>
                                <span class="mr-2 ">
                                    <select class="custom-form-control form-control kt-select2" id="device_list"
                                        name="device_list" placeholder="Select Device">
                                        <option value="0">Select</option>
                                    </select>
                                </span>
                                <span class="mr-2 mt-2">
                                    <div class="input-group date">From:
                                        <input type="text" name="start_date" id="start_date"
                                            class="ml-2 form-control text-center dateTime datepicker"
                                            autocomplete="off" />
                                        <!-- <input type="text" name="start_date" id="start_date" class="ml-2 form-control text-center date-picker" autocomplete="off" /> -->
                                    </div>
                                </span>
                                <span class="mr-2 my-auto custom-select-2">
                                    <select name="start_hour" id="start_hour" class="form-control kt-select2-2">
                                        @for($i=0; $i<=23; $i++) <option value="{{sprintf('%02d', $i)}}">
                                            {{sprintf("%02d", $i)}}</option>
                                            @endfor
                                    </select>
                                </span>
                                <span class="mr-2 my-auto custom-select-2">
                                    <select name="start_min" id="start_min" class="form-control kt-select2-2">
                                        @for($i=0; $i<=59; $i++) <option value="{{sprintf('%02d', $i)}}">
                                            {{sprintf("%02d", $i)}}</option>
                                            @endfor
                                    </select>
                                </span>
                                <span class="mr-2 mt-2">
                                    <div class="input-group date">To:
                                        <input type="text" name="end_date" id="end_date"
                                            class="ml-2 form-control text-center dateTime datepicker"
                                            autocomplete="off" />
                                    </div>
                                </span>
                                <span class="mr-2 my-auto custom-select-2">
                                    <select name="end_hour" id="end_hour" class="form-control kt-select2-2">
                                        @for($i=0; $i<=23; $i++) <option value="{{sprintf('%02d', $i)}}"
                                            {{($i==23) ? 'selected': ''}}>{{sprintf("%02d", $i)}}
                                            </option>
                                            @endfor
                                    </select>
                                </span>
                                <span class="mr-2 my-auto custom-select-2">
                                    <select name="end_min" id="end_min" class="form-control kt-select2-2">
                                        @for($i=0; $i<=59; $i++) <option value="{{sprintf('%02d', $i)}}"
                                            {{($i==59) ? 'selected': ''}}>{{sprintf("%02d", $i)}}
                                            </option>
                                            @endfor
                                    </select>
                                </span>
                                <span class="mr-2">
                                    <button type="button" name="show_report" id="show_report"
                                        class="check btn btn-warning btn-sm" ng-click="showReport()">Show
                                    </button>
                                </span>

                            </li>
                        </ul>
                    </form>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-brand btn-sm quick-date" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <!-- <i class="flaticon-more-1"></i> -->
                            Quick date
                        </button>
                        <div
                            class=" dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit dropdown-menu-custom">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Report Options
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="0">
                                        <i class="far fa-clock mr-2"></i>
                                        <span class="kt-nav__link-text">Today</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="1">
                                        <i class="fas fa-history mr-2"></i>
                                        <span class="kt-nav__link-text">Yesterday</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="2">
                                        <i class="far fa-clock mr-2"></i>
                                        <span class="kt-nav__link-text">Before 3 Days</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="javascript:;" class="kt-nav__link dayFilter" data-rel="3">
                                        <i class="far fa-calendar-alt mr-2"></i>
                                        <span class="kt-nav__link-text">Last Week</span>
                                    </a>
                                </li>
                            </ul>

                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        TU Status Log
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="dealer_tu_status_log_table">
                    <thead>
                        <tr>
                            <!-- <th width="2%" data-orderable="false">
                                                            <label
                                                                class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" />
                                                                <span></span>
                                                            </label>
                                                        </th> -->
                            <th>SL</th>
                            <th>Customer name</th>
                            <th>Device name</th>
                            <th>IMEI</th>
                            <th>Sim</th>
                            <th>Previous Status</th>
                            <th>Previous Status Date</th>
                            <th>Current Status</th>
                            <th>Current Status Days</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <!-- end:: Content -->

</div>

<script>
$(function() {

    var table = $('#dealer_tu_status_log_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "{{ url('dealer/tu_status_log') }}",
            data: function(d) {
                d._token = '{!! csrf_token() !!}';
            }
        },
        columns: [
            // {
            //     data: 'checkDevice',
            //     name: 'checkDevice',
            //     className: 'text-center',
            //     orderable: false,
            //     searchable: false
            // },
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'customer_name',
                name: 'customer_name'
            },
            {
                data: 'device_name',
                name: 'device_name'
            },
            {
                data: 'imei',
                name: 'imei',
                className: 'text-center'
            },
            {
                data: 'sim_number',
                name: 'sim_number',
                className: 'text-center'
            },
            {
                data: 'previous_status',
                name: 'previous_status',
                className: 'text-center'
            },
            {
                data: 'previous_status_date',
                name: 'previous_status_date',
                className: 'text-center'
            },
            {
                data: 'current_status',
                name: 'current_status',
                className: 'text-center'
            },
            {
                data: 'last_update',
                name: 'last_update',
                className: 'text-center'
            },
        ],

        dom: 'Blfrtip',
        buttons: [{
                extend: 'copy',
                text: '<i class="far fa-copy custom-icon"></i>',
                className: 'custom-button-class ml-3 mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'csv',
                text: '<i class="flaticon2-paper custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'excel',
                text: '<i class="far fa-file-excel custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="far fa-file-pdf custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print custom-icon"></i>',
                className: 'custom-button-class mr-2',
                exportOptions: {
                    columns: ':visible :not(:last-child)'
                }
            }
        ]
    });
    table.buttons().container().appendTo('#dealer_tu_status_log_table_length');

});

$(document).ready(function(e) {

    $('.kt-select2').select2({
        placeholder: "Select"
    });


    $('.datetimepicker').datetimepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: 'bottom-left',
        todayBtn: true,
        showMeridian: true,
        format: 'dd M yyyy  HH:ii p'
    });

    $('.custom-button-class').removeClass('btn-secondary');

    var start_date = moment().format('YYYY-MM-DD');
    var end_date = moment().format('YYYY-MM-DD');
    $('#start_date').val(start_date);
    $('#end_date').val(end_date);
});

$(".dayFilter").each(function(index) {
    $(this).on('click', function(e) {
        var start_date = '';
        var end_date = '';
        var data = $(this).data('rel')
        if (data == 0) {
            start_date = moment().format('YYYY-MM-DD');
            end_date = moment().format('YYYY-MM-DD');

        } else if (data == 1) {
            start_date = moment().subtract(1, 'days').format('YYYY-MM-DD');
            end_date = moment().subtract(1, 'days').format('YYYY-MM-DD');

        } else if (data == 2) {
            start_date = moment().subtract(3, 'days').format('YYYY-MM-DD');
            end_date = moment().format('YYYY-MM-DD');

        } else if (data == 3) {
            start_date = moment().subtract(6, 'days').format('YYYY-MM-DD');
            end_date = moment().format('YYYY-MM-DD');

        }
        /* else if (data == 4) {
                           start_date = moment().subtract(1, 'month').startOf('month').format('YYYY-MM-DD');
                           end_date = moment().subtract(1, 'month').endOf('month').format('YYYY-MM-DD');

                       } */

        $('#start_date').val(start_date);
        $('#end_date').val(end_date);
    });
});
</script>