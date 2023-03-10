<div class="modal-header bg-info">
    <h5 class="modal-title"> IMEI Details {{ $imei_details->unit_id }} - {{ $imei_details->imei }} -
        {{ $imei_details->unit_status }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">

    <input type="hidden" id="imei_id" value="{{$imei_details->id}}">
    <div class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">IMEI
                                info</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">IMEI server
                                config</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Enduser config</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-3" class="nav-link">Sensor config</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-4" class="nav-link">Command config</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-5" class="nav-link">Overview
                                status</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-6" class="nav-link">Transfer log</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-7" class="nav-link">Status log</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                            <div class=" row form-group">
                                <label for="name" class="col-xl-3 col-lg-3 col-form-label"> IMEI Number</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{$imei_details->imei}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Server Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{$imei_details->server_name}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Device Model</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control"> {{$imei_details->model_name}} </span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Insert Date</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span
                                        class="form-control">{{date('d M yy h:i a', strtotime($imei_details->opening_date))}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">CRM Autosync</label>
                                <div class="col-lg-9 col-xl-6">
                                    @if($imei_details->crm_autosync==1)
                                    <span class="btn btn-success btn-sm">Yes</span>
                                    @elseif($imei_details->crm_autosync==0)
                                    <span class="btn btn-warning btn-sm">No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Name</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->hosting_name}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Country</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->hosting_country}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Real IP</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->hosting_realip}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting URL</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->hosting_url}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting User ID</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->hosting_userid}}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Password</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <span class="form-control">{{$imei_details->hosting_password}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Server Details</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <span class="form-control">{{$imei_details->server_details}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Device Name</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" id="editable_device_name"
                                            name="editable_device_name" value="{{$imei_details->device_name}}">
                                    </div>
                                    <label class="col-lg-2 col-form-label">TU ID</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">{{$imei_details->unit_id}}</span>

                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Vehicle Plate No</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" name="editable_plate_number"
                                            id="editable_plate_number" value="{{$imei_details->plate_number}}">
                                    </div>
                                    <label class="col-lg-2 col-form-label">Insert Date</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="kt_datepicker_3"
                                                name="ex-factory_date"
                                                value="{{date('d M yy h:i a', strtotime($imei_details->opening_date))}}" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Model</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" name="model_name"
                                            value="{{$imei_details->model_name}}" disabled="disabled">
                                    </div>
                                    <label class="col-lg-2 col-form-label">Active Date</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="kt_datepicker_4"
                                                name="ex-factory_date"
                                                value="{{date('d M yy h:i a', strtotime($imei_details->opening_date))}}" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <label class="col-lg-2 col-form-label">IMEI</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" name="imei" value="{{$imei_details->imei}}">
                                    </div>
                                    <label class="col-lg-2 col-form-label">SIM No</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="number" class="form-control" name="sim_number" value="{{$imei_details->sim_number}}">
                                    </div> -->
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Device Source</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">@php echo ($imei_details->device_source==1)?'Own
                                            Source':'Other Source'; @endphp</span>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Online Time</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kt_datepicker_5"
                                                name="online_time" placeholder="MM/DD/YYYY" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <label class="col-lg-2 col-form-label">IMEI No</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">{{$imei_details->imei}}(<span
                                                class="badge btn-success "> </span>)</span>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Expiry Date</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="editable_expiry_date"
                                                name="editable_expiry_date" value="{{$imei_details->expiry_date}}" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">SIM Number</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">{{$imei_details->sim_number}} -
                                            {{$imei_details->sim_type}} - {{$imei_details->sim_status}}</span>
                                    </div>
                                    <label for="email" class="col-lg-2 col-form-label">Server Name</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">{{$imei_details->server_name}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">TU Status</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <span class="form-control">{{$imei_details->unit_status}}</span>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Fuel Consumption</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="editable_fuel_consumption"
                                                id="editable_fuel_consumption"
                                                placeholder="Enter fuel consumption value" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">L/100km</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">CRM to IMEI</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <span class="form-control">@php echo ($imei_details->unit_id>0)?'<span
                                                    class="badge btn-success "> Connected</span>':'<span
                                                    class="badge btn-danger ">Disconnected</span>'; @endphp</span>
                                        </div>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Speeding Value</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="speeding_value"
                                                placeholder="Enter speeding value" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    kmh
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-12 col-form-label">Note</label>
                                    <div class="col-sm-12" style="text-align: left;">
                                        <textarea class="form-control" id="editable_imei_note" name="editable_imei_note"
                                            rows="3">
                                        {{$imei_details->note}}
                                    </textarea>
                                    </div>
                                </div>
                                <div class="row float-right" style="padding-top:46px;">
                                    <button type="button" class="btn btn-success btn-sm"
                                        onClick="updateImei({{$imei_details->id}})">Update IMEI</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Vehicle Plate No</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="server_api_key"
                                        placeholder="Enter vehicle plate number">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-4" role="tabpanel">
                            <div class="form-group row">
                                <label class=" col-form-label col-lg-3 col-sm-12">Model</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="server_api_key" placeholder="Enter ">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-5" role="tabpanel">
                            <div class="form-group row">
                                <label class=" col-form-label col-lg-3 col-sm-12">Model</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="server_api_key" placeholder="Enter ">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-6" role="tabpanel">

                            <div
                                class="kt-portlet custom-kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
                                <div class="kt-portlet__head custom-kt-portlet__head2 kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon2-line-chart"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            IMEI Transfer Log
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body custom-kt-portlet__body mt-2">

                                    <!--begin: Datatable -->
                                    <table class="table table-striped- table-bordered table-hover table-checkable"
                                        id="transfer_log_table">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Device Name</th>
                                                <th>IMEI</th>
                                                <th>IMEI Status</th>
                                                <th>TF From</th>
                                                <th>TF To</th>
                                                <th>TF By </th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <!--end: Datatable -->
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab-eg11-7" role="tabpanel">

                            <div
                                class="kt-portlet custom-kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
                                <div class="kt-portlet__head custom-kt-portlet__head2 kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon2-line-chart"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            IMEI Status Log
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body custom-kt-portlet__body mt-2">

                                    <!--begin: Datatable -->
                                    <table class="table table-striped- table-bordered table-hover table-checkable"
                                        id="single_tu_status_log_table">
                                        <thead>
                                            <!-- <th width="2%" data-orderable="false">
                                                            <label
                                                                class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" />
                                                                <span></span>
                                                            </label>
                                                        </th> -->
                                            <th>SL</th>
                                            <th>Device name</th>
                                            <th>Sim</th>
                                            <th>Previous Status</th>
                                            <th>Previous Status Date</th>
                                            <th>Current Status</th>
                                            <th>Current Status Days</th>
                                        </thead>
                                    </table>

                                    <!--end: Datatable -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer float-left">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
</div>

<script>
$(function() {

    var id = $('#imei_id').val();
    // var id = 1193;
    var table = $('#transfer_log_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "{{url('admin/imei/getLogData')}}/" + id,
            data: function(d) {
                d._token = '{!! csrf_token() !!}';
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            },
            {
                data: 'last_update',
                name: 'last_update'
            },
            {
                data: 'device_name',
                name: 'device_name'
            },
            {
                data: 'imei',
                name: 'imei'
            },
            {
                data: 'device_status',
                name: 'device_status',
                className: 'text-center'
            },
            {
                data: 't_from',
                name: 't_from'
            },
            {
                data: 't_to',
                name: 't_to'
            },
            {
                data: 'username',
                name: 'username'
            }
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
    table.buttons().container().appendTo('#transfer_log_table_length');

});

$(function() {
    var id = $('#imei_id').val();
    var table = $('#single_tu_status_log_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "{{ url('single_tu_status_log') }}/" + id,
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
                data: 'device_name',
                name: 'device_name'
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
    table.buttons().container().appendTo('#single_tu_status_log_table_length');

});

$(document).ready(function() {
    $('#editable_expiry_date').datepicker({
        todayHighlight: true,
        autoclose: true,
        pickerPosition: 'bottom-left',
        todayBtn: true,
        showMeridian: true,
        format: 'yyyy-mm-dd'
    });

    $('textarea').each(function() {
        $(this).val($(this).val().trim());
    });
});
</script>