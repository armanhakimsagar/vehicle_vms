<style>
.custom-textarea {
    border: none;
    margin: 2px 0;
}
</style>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Row-->

    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid vehicle-view">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Schedule Report Information</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="javascript:;" id="vehicleEdit" class="btn btn-info btn-sm"><i
                        class="far fa-edit mr-2"></i>Edit</a>
                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <div class="row">
                        <div class="col-md-6 custom-form-group-border">

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Report Name</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$scheduleReport->report_name}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Report Type </label>
                                <div class="col-sm-8">
                                    <span class="form-control"> {{$scheduleReport->report_type_name}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Device </label>
                                <div class="col-sm-8">
                                    <textarea disabled class="form-control custom-textarea" cols="30"
                                        rows="2">{{$device_name}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row {{($scheduleReport->report_type==7) ? '':'d-none'}}">
                                <label class="col-label col-sm-4">Sensor </label>
                                <div class="col-sm-8">
                                    <textarea disabled class="form-control custom-textarea" cols="30"
                                        rows="2">{{$sensor_name}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Zone </label>
                                <div class="col-sm-8">
                                    <textarea disabled class="form-control custom-textarea" cols="30"
                                        rows="2">{{$zone_name}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Data Item </label>
                                <div class="col-sm-8">
                                    <textarea disabled class="form-control custom-textarea" cols="30"
                                        rows="2">{{$data_item_list}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Send Email </label>
                                <div class="col-sm-8">
                                    <span class="form-control"> {{$scheduleReport->send_email}} </span>

                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 custom-form-group-border">
                            
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Report Format </label>
                                <div class="col-sm-8">
                                    @if($scheduleReport->report_format==1)
                                    <span class="form-control">HTML</span>
                                    @elseif($scheduleReport->report_format==2)
                                    <span class="form-control">PDF</span>
                                    @elseif($scheduleReport->report_format==3)
                                    <span class="form-control"> XLS </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Speed Limit </label>
                                <div class="col-sm-8">
                                    <span class="form-control"> {{$scheduleReport->speed_limit}} </span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Stop Time </label>
                                <div class="col-sm-8">
                                    @if($scheduleReport->stop_time==1)
                                    <span class="form-control"> > 1 min</span>
                                    @elseif($scheduleReport->stop_time==2)
                                    <span class="form-control"> > 2 min</span>
                                    @elseif($scheduleReport->stop_time==5)
                                    <span class="form-control"> > 5 min</span>
                                    @elseif($scheduleReport->stop_time==10)
                                    <span class="form-control"> > 10 min</span>
                                    @elseif($scheduleReport->stop_time==20)
                                    <span class="form-control"> > 20 min</span>
                                    @elseif($scheduleReport->stop_time==30)
                                    <span class="form-control"> > 30 min</span>
                                    @elseif($scheduleReport->stop_time==60)
                                    <span class="form-control"> > 1 hour</span>
                                    @elseif($scheduleReport->stop_time==120)
                                    <span class="form-control"> > 2 hour</span>
                                    @elseif($scheduleReport->stop_time==300)
                                    <span class="form-control"> > 5 hour</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Scedule</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$scheduleReport->schedule}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Show Coordinates</label>
                                <div class="col-sm-8">
                                    @if($scheduleReport->show_coordinates==1)
                                    <span class="form-control"> Yes</span>
                                    @elseif($scheduleReport->show_coordinates==0)
                                    <span class="form-control"> No</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Show Address</label>
                                <div class="col-sm-8">
                                    @if($scheduleReport->show_addresses==1)
                                    <span class="form-control"> Yes</span>
                                    @elseif($scheduleReport->show_addresses==0)
                                    <span class="form-control"> No</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Time From</label>
                                <div class="col-sm-8">
                                    <span
                                        class="form-control">{{date('d M yy h:i a', strtotime($scheduleReport->start_date))}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Time To</label>
                                <div class="col-sm-8">
                                    <span
                                        class="form-control">{{date('d M yy h:i a', strtotime($scheduleReport->end_date))}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-label col-sm-4">Report Status </label>
                                <div class="col-sm-8">
                                    @if($scheduleReport->status==1)
                                    <span class="badge badge-pill badge-success btn-sm ml-3">Running</span>
                                    @elseif($scheduleReport->status==2)
                                    <span class="badge badge-pill badge-warning btn-sm ml-3">Pause</span>
                                    @elseif($scheduleReport->status==0)
                                    <span class="badge badge-pill badge-danger btn-sm ml-3">Stop</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end: client view -->

    <!-- begin: client edit -->

    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none vehicle-edit">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Edit Schedule Report</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="#" id="closeEdit" class="btn btn-success btn-sm"><i class="far fa-eye mr-2"></i>View</a>
                <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                        class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>

            </div>
        </div>
        <form class="" id="editScheduleReportForm">
            @csrf
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" row ">
                                <h6 class=" ml-3 custom-link-color">Report</h6>
                            </div>
                            <input type="hidden" id="edit_id" value="{{$scheduleReport->id}}">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Report name</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="report_name" name="report_name"
                                        placeholder="Enter report name" value="{{$scheduleReport->report_name}}">
                                    <small id="report_name-error-edited" class="text-danger"></small>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Report type</label>
                                <div class="col-lg-8">
                                    <select class="form-control kt-select2" id="edit_report_type" name="report_type">
                                        <option value="">Select</option>
                                    </select>
                                    <small id="report_type-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Device</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="edit_device_item_list" name="device">

                                    <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                        data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                        id="edit_device_list">
                                        <option value="">Select</option>
                                    </select>
                                    <small id="device-error-edited" class="text-danger"></small>
                                </div>
                            </div>
                            <div class=" row form-group {{($scheduleReport->report_type==7) ? '':'d-none'}}"
                                id="edit_sensore_field">
                                <label class="col-form-label col-lg-4">Sensor</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="edit_sensor_item_list" name="sensor">

                                    <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                        data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                        id="edit_sensor_list">
                                        <option value="">Select</option>
                                    </select>
                                    <small id="sensor-error-edited" class="text-danger"></small>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Zone</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="edit_zone_item_list" name="zone">
                                    <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                        data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                        id="edit_zone_list">
                                        <option value="">Select</option>
                                    </select>
                                    <small id="zone-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Data Item</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="edited_data_item_list" name="data_item">
                                    <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple"
                                        data-clickable-groups="true" data-collapse-groups="true" data-width="100%"
                                        id="edit_data_item_list">
                                    </select>
                                    <small id="data_item-error-edited" class="text-danger"></small>
                                </div>
                            </div>
                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Report Status</label>
                                <div class="col-lg-8">
                                    <select class="form-control kt-select2" name="report_status">
                                        <option value="1" {{($scheduleReport->status==1) ? 'selected':''}}>Running
                                        </option>
                                        <option value="2" {{($scheduleReport->status==2) ? 'selected':''}}>Pause
                                        </option>
                                        <option value="0" {{($scheduleReport->status==0) ? 'selected':''}}>Stop</option>
                                    </select>
                                    <small id="report_status-error-edited" class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" row ">
                                <h6 class=" ml-3 custom-link-color">Schedule</h6>
                            </div>

                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Report format</label>
                                <div class="col-lg-8">
                                    <select class="form-control kt-select2" name="report_format">
                                        <option value="1" {{($scheduleReport->report_format==1) ? 'selected':''}}>HTML
                                        </option>
                                        <option value="2" {{($scheduleReport->report_format==2) ? 'selected':''}}>PDF
                                        </option>
                                        <option value="3" {{($scheduleReport->report_format==3) ? 'selected':''}}>XLS
                                        </option>
                                    </select>
                                    <small id="report_format-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class=" row form-group">
                                <label class="col-form-label col-lg-4">Stop time</label>
                                <div class="col-lg-8">
                                    <select class="form-control kt-select2" name="stop_time">
                                        <option value="1" {{($scheduleReport->stop_time==1) ? 'selected':''}}>> 1 min
                                        </option>
                                        <option value="2" {{($scheduleReport->stop_time==2) ? 'selected':''}}>> 2 min
                                        </option>
                                        <option value="5" {{($scheduleReport->stop_time==5) ? 'selected':''}}>> 5 min
                                        </option>
                                        <option value="10" {{($scheduleReport->stop_time==10) ? 'selected':''}}>> 10 min
                                        </option>
                                        <option value="20" {{($scheduleReport->stop_time==20) ? 'selected':''}}>> 20 min
                                        </option>
                                        <option value="30" {{($scheduleReport->stop_time==30) ? 'selected':''}}>> 30 min
                                        </option>
                                        <option value="60" {{($scheduleReport->stop_time==60) ? 'selected':''}}>> 1 hour
                                        </option>
                                        <option value="120" {{($scheduleReport->stop_time==120) ? 'selected':''}}>> 2
                                            hours</option>
                                        <option value="300" {{($scheduleReport->stop_time==300) ? 'selected':''}}>> 5
                                            hours</option>
                                    </select>
                                    <small id="stop_time-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Speed limit</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="speed_limit"
                                            placeholder="Enter speed limit" value="{{$scheduleReport->speed_limit}}">
                                        <div class="input-group-append"><span class="input-group-text">kmh</span>
                                        </div>
                                    </div>
                                    <small id="speed_limit-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Send to email</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="send_email"
                                        placeholder="Enter send email" value="{{$scheduleReport->send_email}}">
                                    <small id="send_email-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Daily</label>
                                <div class="col-md-2">
                                    <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                        <input type="radio" class="schedule_for_report" name="schedule" value="daily"
                                            {{($scheduleReport->schedule=='daily') ? 'checked':''}}>
                                        <span></span>
                                    </label>

                                </div>
                                <label class=" col-form-label col-md-2">Weekly</label>
                                <div class="col-md-2">
                                    <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                        <input type="radio" class="schedule_for_report" name="schedule" value="weekly"
                                            {{($scheduleReport->schedule=='weekly') ? 'checked':''}}>
                                        <span></span>
                                    </label>

                                </div>
                                <label class=" col-form-label col-md-2">Monthly</label>
                                <div class="col-md-2">
                                    <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                        <input type="radio" class="schedule_for_report" name="schedule" value="monthly"
                                            {{($scheduleReport->schedule=='monthly') ? 'checked':''}}>
                                        <span></span>
                                    </label>

                                </div>
                            </div>

                            <div class=" form-group row">
                                <label class="col-form-label col-md-4">Show coordinates</label>
                                <div class="col-md-2">
                                    <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                        <input type="checkbox" id="show_coordinates" name="show_coordinates"
                                            {{($scheduleReport->show_coordinates==1) ? 'checked':''}}>
                                        <span></span>
                                    </label>
                                </div>
                                <label class=" col-form-label col-md-4">Show addresses</label>
                                <div class="col-md-2">
                                    <label class="kt-checkbox kt-checkbox--bold  kt-checkbox--brand">
                                        <input type="checkbox" id="show_addresses" name="show_addresses"
                                            {{($scheduleReport->show_addresses==1) ? 'checked':''}}>
                                        <span></span>
                                    </label>

                                </div>
                            </div>

                            <div class=" row ">
                                <h6 class=" ml-3 custom-link-color">Time Period</h6>
                            </div>

                            <div class=" row form-group">
                                <label class="col-form-label col-md-4">Filter</label>
                                <div class="col-md-8">
                                    <select class="form-control kt-select2" id="edit_filter" name="filter">
                                        <option value="0">Today</option>
                                        <option value="1">Yesterday</option>
                                        <option value="2">Last 3 days</option>
                                        <option value="3">This week</option>
                                        <option value="4">Last week</option>
                                        <option value="5">This month</option>
                                        <option value="6">Last month</option>
                                    </select>
                                    <small id="filter-error-edited" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Time from
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <input type="text" name="start_date" id="edit_start_date"
                                            class="form-control datePicker1_1" autocomplete="off"
                                            value="{{date('d M yy', strtotime($scheduleReport->start_date))}}" />
                                    </div>
                                    <small id="start_date-error-edited" class="text-danger"></small>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group ">
                                        <input type="text" name="start_time" class="form-control timepicker"
                                            value="{{date('h:i:s a', strtotime($scheduleReport->start_date))}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-4">Time to </label>
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <input type="text" name="end_date" id="edit_end_date"
                                            class="form-control datePicker2_1" autocomplete="off"
                                            value="{{date('d M yy', strtotime($scheduleReport->end_date))}}" />
                                    </div>
                                    <small id="end_date-error-edited" class="text-danger"></small>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group ">
                                        <input type="text" name="end_time" class="form-control timepicker"
                                            value="{{date('h:i:s a', strtotime($scheduleReport->end_date))}}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class=" col-sm-12">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-brand btn-sm float-right">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!--End::Row-->


</div>


<script>
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

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });

    $(".timepicker").timepicker({
        defaultTime: "12:00:00 AM",
        minuteStep: 1,
        showSeconds: true,
        showMeridian: true,
    });

    $('.datePicker1_1').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    }).on('changeDate', function() {
        $('.datePicker2_1').focus();

    });

    $('.datePicker2_1').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });

    $(".timepicker_1").timepicker({
        minuteStep: 1,
        defaultTime: "",
        showSeconds: true,
        showMeridian: false,
        snapToStep: true,
    });

    fatch_schedule_related_data();
});

function fatch_schedule_related_data() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "{{ url('dashboard/getScheduleData') }}/" + "{{$scheduleReport->id}}",
        success: function(response) {
            $('#edit_report_type').html(response.htmlContent);
            $('#edit_device_list').html(response.htmlContent2);
            $('#edit_zone_list').html(response.htmlContent3);
            $('#edit_sensor_list').html(response.htmlContent4);
            $('#edit_data_item_list').html(response.htmlContent5);
            $('.mt-multiselect').multiselect({
                enableClickableOptGroups: true,
                enableCollapsibleOptGroups: true,
                enableFiltering: true,
                includeSelectAllOption: true,
                enableCaseInsensitiveFiltering: true
            });
        },
        error: function(reject) {
            errorMsg();
        }
    });
}

$('#vehicleEdit').click(function(e) {
    $('.vehicle-view').addClass('d-none');
    $('.vehicle-edit').removeClass('d-none');
});

$('#closeEdit').click(function(e) {
    e.preventDefault();

    $('.vehicle-view').removeClass('d-none');
    $('.vehicle-edit').addClass('d-none');

});

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $("#main_content_section").removeClass('d-none');
    $('#load_schedule_report_content').addClass('d-none');

});


$('#edit_report_type').change(function(event) {
    event.preventDefault();
    var typeId = $('#edit_report_type').val();

    if (typeId == 7) {
        $('#edit_sensore_field').removeClass('d-none');
        fatch_sensor_list();
    } else {
        $('#edit_sensore_field').addClass('d-none');
    }

    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{ url('dashboard/getReportTypeDataItem') }}/" + typeId,
        success: function(response) {
            $('#edit_data_item_list').html(response).multiselect('rebuild');

        },
        error: function(reject) {
            errorMsg();
        }
    });

});

$('#edit_device_list').change(function(event) {
    event.preventDefault();
    fatch_sensor_list();

});

function fatch_sensor_list() {
    var typeId = $('#edit_report_type').val();

    if (typeId == 7) {
        var devices = $('#edit_device_list').val().join();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('dashboard/getSensorTypeData') }}/" + devices,
            success: function(response) {
                $('#edit_sensor_list').html(response.htmlContent).multiselect('rebuild');
            },
            error: function(reject) {
                errorMsg();
            }
        });
    }
}

$('#edit_filter').change(function(event) {
    var start_date = '';
    var end_date = '';
    var data = $("#edit_filter").val();
    if (data == 0) {
        start_date = moment().format('DD MMM YYYY');
        end_date = moment().format('DD MMM YYYY');

    } else if (data == 1) {
        start_date = moment().subtract(1, 'days').format('DD MMM YYYY');
        end_date = moment().subtract(1, 'days').format('DD MMM YYYY');

    } else if (data == 2) {
        start_date = moment().subtract(2, 'days').format('DD MMM YYYY');
        end_date = moment().format('DD MMM YYYY');

    } else if (data == 3) {
        start_date = moment().startOf('week').format('DD MMM YYYY');
        end_date = moment().endOf('week').format('DD MMM YYYY');
    } else if (data == 4) {
        start_date = moment().subtract(1, 'week').startOf('week').format(
            'DD MMM YYYY');
        end_date = moment().subtract(1, 'week').endOf('week').format('DD MMM YYYY');

    } else if (data == 5) {
        start_date = moment().startOf('month').format('DD MMM YYYY');
        end_date = moment().endOf('month').format('DD MMM YYYY');

    } else if (data == 6) {
        start_date = moment().subtract(1, 'months').startOf('month').format(
            'DD MMM YYYY');
        end_date = moment().subtract(1, 'months').endOf('month').format(
            'DD MMM YYYY');

    }

    $('#edit_start_date').val(start_date);
    $('#edit_end_date').val(end_date);
});


$('#editScheduleReportForm').submit(function(event) {
    event.preventDefault();
    var device = $('#edit_device_list').val().join();
    $('#edit_device_item_list').val(device);
    var sensor = $('#edit_sensor_list').val().join();
    $('#edit_sensor_item_list').val(sensor);
    var zone = $('#edit_zone_list').val().join();
    $('#edit_zone_item_list').val(zone);
    var dataItem = $('#edit_data_item_list').val().join();
    $('#edited_data_item_list').val(dataItem);
    var id = $('#edit_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveSeduleReportData') }}/" + id,
        data: $('#editScheduleReportForm').serialize(),
        success: function(response) {
            successMsg('Schedule report updated successfully.');
            view_schedule_report_data(id)
            $('#schedule_report_table').DataTable().ajax.reload(null, false);
        },
        error: function(reject) {
            errorMsg();
            if (reject.status === 422 || reject.status === 403) {
                var errors = $.parseJSON(reject.responseText);
                $.each(errors.error.message, function(key, val) {
                    console.log(key + ' : ' + val);
                    $("small#" + key + "-error-edited").text(val[0]);
                });
            }
        }
    });
    return false;
});
</script>