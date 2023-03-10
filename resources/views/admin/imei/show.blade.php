
<div class="modal-header bg-info">
    <h5 class="modal-title"> IMEI Details</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">

    
    <div class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-0" class="active nav-link">IMEI info</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-1" class="nav-link">IMEI server config</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-2" class="nav-link">Enduser config</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-3" class="nav-link">Sensor config</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-4" class="nav-link">Command config</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-5" class="nav-link">Overview status</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg11-6" class="nav-link">Transfer log</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-eg11-0" role="tabpanel">
                            <div class=" row form-group">
                                <label for="name" class="col-xl-3 col-lg-3 col-form-label"> IMEI Number</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{$imei->imei}}</span>
                                </div>
                            </div> 
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Servrev Name</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{$imei->server_name}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Device Model</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{$imei->device_model_name}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">Insert Date</label>
                                <div class="col-lg-9 col-xl-6">
                                    <span class="form-control">{{date('d M yy h:i a', strtotime($imei->opening_date))}}</span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="email" class="col-3 col-form-label">CRM Autosync</label>
                                <div class="col-lg-9 col-xl-6">
                                    @if($imei->crm_autosync==1)
                                    <span class="btn btn-success btn-sm">Yes</span>
                                    @elseif($imei->crm_autosync==0)
                                    <span class="btn btn-warning btn-sm">No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-1" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Name</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="hosting_name" placeholder="Enter hosting name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Country</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="hosting_country" placeholder="Enter hosting country">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Real IP</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="hosting_real_ip" placeholder="Enter hosting real IP">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting URL</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="url" class="form-control" name="hosting_url" placeholder="Enter hosting URL">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting User ID</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="hosting_user_id" placeholder="Enter hosting user ID">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Hosting Password</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="hosting_password" placeholder="Enter hosting password">
                                        <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye"></i></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Server Details</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <textarea class="form-control" id="" name="server_details" placeholder="Enter server details" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-2" role="tabpanel">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">TU ID</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" placeholder="Enter TU ID " name="divce_name">
                                    </div>
                                    <label class="col-lg-2 col-form-label">Divce Name</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" placeholder="Enter divce name" name="divce_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Model</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <select name="model" class="form-control kt-select2-3">
                                            <option value="">Select</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                        </select>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Vehicle Plate No</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" name="vehicle_plate_no" placeholder="Enter vehicle plate number">
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">IMEI</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control" name="imei" placeholder="Enter IMEI number">
                                    </div>
                                    <label class="col-lg-2 col-form-label">SIM No</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="number" class="form-control" name="sim_no" placeholder="Enter SIM number">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Insert Date</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="kt_datepicker_3" name="ex-factory_date" placeholder="MM/DD/YYYY"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-lg-2 col-form-label">User Block Date</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="kt_datepicker_3" name="platform_expire_date" placeholder="MM/DD/YYYY"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Fuel Consumption</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="fuel_consumption_value" placeholder="Enter fuel consumption value"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">L/100km</span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-lg-2 col-form-label">Fuel Tank Volume</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control"  name="fuel_tank_volume" placeholder="Enter fuel tank volume"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">L</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Online Time</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="kt_datepicker_3"name="online_time" placeholder="MM/DD/YYYY"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-lg-2 col-form-label">User Due</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <input type="text" class="form-control"  name="user_due" placeholder="Enter user due"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label">Speeding Value</label>
                                    <div class="col-lg-4 col-md-9 mb-4">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" name="speeding_value" placeholder="Enter speeding value"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    kmh
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg11-3" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Vehicle Plate No</label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="server_api_key" placeholder="Enter vehicle plate number">
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
                            
                            <div class="kt-portlet custom-kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
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
                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="transfer_log_table">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Device name</th>
                                            <th>IMEI</th>
                                            <th>IMEI status</th>
                                            <th>TF to</th>
                                            <th>TF from</th>
                                            <th>Username </th>
                                            </tr>
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
<div class="modal-footer">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
</div>

<script>
   
   $(function () {     

        var table= $('#transfer_log_table').DataTable({
            // processing: true,
            // serverSide: true,
            // ajax: {
            //     type: "GET",
            //     url: "{{url('admin/imei/getData')}}/"+id,
            //     data: function (d) {
            //         d._token = '{!! csrf_token() !!}';
            //     }
            // },
            // columns: [
            //     {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
            //     {data: 'imei', name: 'imei'},
            //     {data: 'server_name', name: 'server_name', className: 'text-center'},
            //     {data: 'model_name', name: 'model_name'},
            //     {data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
            // ],
            
            dom: 'Blfrtip',
            buttons: [
                {
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
</script>