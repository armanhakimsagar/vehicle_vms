<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Imei</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="imeiEditForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('PATCH')
        <input type="hidden" class="form-control" name="id" id="id" value="{{$imei->id}}">
        <!-- Form content start -->
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Imei Numder </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="imei_number" id="imei_number" value="{{$imei->imei}}">
                <small id="imei_number-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Device Name </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="device_name" id="device_name" value="{{$imei->device_name}}">
                <small id="device_name-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Server Name</label>
            <div class="col-lg-9">
                <select name="server_name" class="form-control kt-select2-2" id="server_name">
                    <option value="">Select</option>
                    @foreach($servers as $server)
                    <option value="{{$server->id}}" {{($imei->server_id==$server->id) ? 'selected': ''}}>{{$server->name}}</option>
                    @endforeach
                </select>
                <small id="server_name-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Device Model</label>
            <div class="col-lg-9">
                <select name="device_model" class="form-control kt-select2-2" id="device_model">
                    <option value="">Select</option>
                    @foreach($devices as $device)
                    <option value="{{$device->id}}" {{($imei->device_model==$device->id) ? 'selected': ''}}>{{$device->name}}</option>
                    @endforeach
                </select>
                <small id="device_model-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Opening Date </label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="opening_date" class="form-control" id="datetimepicker" value="{{date('d M yy h:i a', strtotime($imei->opening_date))}}"/>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="la la-calendar"></i>
                        </span>
                    </div>
                </div>
                <small id="opening_date-error" class="text-danger"></small>
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
        
        <button type="button" id="imeiEditSubmit" class="btn btn-success btn-sm float-right">Save Change</button>
    </div>

</form>
<script>

    $(document).ready(function(){
        $('#imeiEditSubmit').click( function(event){
            
            var id = $('#id').val();
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "PATCH",
                dataType: "json",
                url: "{{ url('imei') }}/"+id,
                data: $('#imeiEditForm').serialize(),
                success: function (response) {
                    console.log('Imei Updated');
                    successMsg('IMEI Updated successfully.');
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

        $('#datetimepicker').datetimepicker({
            todayHighlight: true,
            autoclose: true,
            pickerPosition: 'bottom-left',
            todayBtn: true,
            showMeridian: true,
            format:'dd M yyyy  HH:ii p'
        });
    });
</script>
