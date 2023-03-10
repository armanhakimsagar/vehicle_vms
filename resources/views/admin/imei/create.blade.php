
<div class="modal-header bg-info">
    <h5 class="modal-title">Add Imei</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="imeiForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <!-- Form content start -->
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">IMEI Number </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="imei_number" id="imei_number">
                <small id="imei_number-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Device Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="device_name" id="device_name">
                <small id="device_name-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Server Name</label>
            <div class="col-lg-9">
                <select name="server_name" class="form-control kt-select2-2" id="server_name">
                    <option value="0">Select</option>
                    @foreach($servers as $server)
                   <option value="{{$server->id}}">{{$server->name}}</option>
                   @endforeach
                </select>
                <small id="server_name-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Device Model</label>
            <div class="col-lg-9">
                <select name="device_model" class="form-control kt-select2-2" id="device_model">
                    <option value="0">Select</option>
                    @foreach($devices as $dev)
                   <option value="{{$dev->id}}">{{$dev->name}}</option>
                   @endforeach
                </select>
                <small id="device_model-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Opening Date </label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="opening_date" class="form-control datetimepicker" value="{{date('d M yy h:i a')}}"/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
                <small id="opening_date-error" class="text-danger"></small>
            </div>
        </div>
        
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Customer Name</label>
            <div class="col-lg-9">
                <select name="customer_name" class="form-control kt-select2-2" id="customer_name">
                    <option value="0">Select</option>
                   @foreach($customers as $cus)
                   <option value="{{$cus->id}}">{{$cus->customer_name}}</option>
                   @endforeach
                </select>
                <small id="customer_name-error" class="text-danger"></small>
            </div>
        </div>          
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Employee Name</label>
            <div class="col-lg-9">
                <select name="employee_name" class="form-control kt-select2-2" id="employee_name">
                    <option value="0">Select</option>
                    @foreach($users as $user)
                   <option value="{{$user->id}}">{{$user->name}}</option>
                   @endforeach
                </select>
                <small id="employee_name-error" class="text-danger"></small>
            </div>
        </div>   
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Plate Number </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="plate_number" id="plate_number">
                <small id="plate_number-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Sim Number </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="sim_number" id="sim_number">
                <small id="sim_number-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Sim Type</label>
            <div class="col-lg-9">
                <select name="sim_type" class="form-control kt-select2-2" id="sim_type">
                    <option value="1">Prepaid</option>
                    <option value="2">Postpaid</option>
                </select>
                <small id="sim_type-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Sim Status</label>
            <div class="col-lg-9">
                <select name="sim_status" class="form-control kt-select2-2" id="sim_status">
                    <option value="0">Unused</option>
                    <option value="1">Used</option>
                    <option value="2">Repair</option>
                </select>
                <small id="sim_status-error" class="text-danger"></small>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Transfer Date </label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="transfer_date" class="form-control datetimepicker"/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
                <small id="transfer_date-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Expiry Date </label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="expiry_date" class="form-control datetimepicker" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
                <small id="expiry_date-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Online Time </label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="online_time" class="form-control datetimepicker" />
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
                <small id="online_time-error" class="text-danger"></small>
            </div>
        </div>  
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Status</label>
            <div class="col-lg-9">
                <select name="status" class="form-control kt-select2-2" id="status">
                    <option value="0">Offline</option>
                    <option value="1">Online</option>
                </select>
                <small id="status-error" class="text-danger"></small>
            </div>
        </div>   
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Tu Package Type</label>
            <div class="col-lg-9">
                <select name="tu_package_type" class="form-control kt-select2-2" id="tu_package_type">
                    <option value="500">500 tk</option>
                    <option value="400">400 tk</option>
                    <option value="300">300 tk</option>
                </select>
                <small id="tu_package_type-error" class="text-danger"></small>
            </div>
        </div>   
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">User due </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="user_due" id="user_due">
                <small id="user_due-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">TU ID </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="tu_id" id="tu_id">
                <small id="tu_id-error" class="text-danger"></small>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-form-label col-lg-3">CRM Autosync</label>
            <div class="col-md-9">
                <input name="crm_autosync" data-switch="true" type="checkbox" checked="checked"  data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="warning">
            </div>
        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        
        <button type="button" class="btn btn-success btn-sm float-right btn-save">Save</button>
    </div>

</form>

<script>

    $(document).ready(function(){
        $('.btn-save').click( function(event){
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('imei.store') }}",
                data: $('#imeiForm').serialize(),
                success: function (response) {
                    console.log('Imei created');
                    successMsg('Imei created successfully.');
                    $('#imei_table').DataTable().ajax.reload();
                    $('#imeiModal').modal('hide');
                },
                error: function (reject) {
                    errorMsg();
                    if( reject.status === 422 || reject.status === 403 ) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors.error.message, function (key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                        });
                    }
                }
            });
        });
    });
        
    $(document).ready(function(e){

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('[data-switch=true]').bootstrapSwitch();

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

