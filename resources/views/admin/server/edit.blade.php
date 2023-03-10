
<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Server</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="serverEditForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('PATCH')
        <!-- Form content start -->
        <input type="hidden" class="form-control" value="{{$server->id}}" id="id">

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Server Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="server_name" id="name" value="{{$server->name}}">
                <small id="server_name-error" class="text-danger"></small>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Opening Date</label>
            <div class="col-md-9">
                <div class="input-group date">
                    <input type="text" name="opening_date" class="form-control" id="kt_datepicker_3" value="{{$server->opening_date}}"/>
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
            <label class="col-lg-3 col-form-label">Hosting Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="hosting_name" value="{{$server->hosting_name}}">
                <small id="hosting_name-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hosting Country</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="hosting_country" value="{{$server->hosting_country}}">
                <small id="hosting_country-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hosting Real IP</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="hosting_real_ip" value="{{$server->hosting_realip}}">
                <small id="hosting_real_ip-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hosting URL</label>
            <div class="col-lg-9">
                <input type="url" class="form-control" name="hosting_url" value="{{$server->hosting_url}}">
                <small id="hosting_url-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hosting User ID</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="hosting_user_id" value="{{$server->hosting_userid}}">
                <small id="hosting_user_id-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Hosting Password</label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="password" class="form-control" name="hosting_password" placeholder="******">
                    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-eye"></i></span></div>
                </div>
                <small id="hosting_password-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Server Details</label>
            <div class="col-lg-9">
                <textarea class="form-control" id="" name="server_details" placeholder="Enter server details" rows="3">{{$server->server_details}}</textarea>
                <small id="server_details-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Status</label>
            <div class="col-md-9">
                <select name="status" class="form-control kt-select2-2" id="status">
                    <option value="1" {{($server->status==1) ? 'selected' : ''}}>Active</option>
                    <option value="0" {{($server->status==0) ? 'selected' : ''}}>Inactive</option>
                </select>
                <small id="status-error" class="text-danger"></small>
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
            
            var id = $('#id').val();
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "PATCH",
                dataType: "json",
                url: "{{ url('server') }}/"+id,
                data: $('#serverEditForm').serialize(),
                success: function (response) {
                    console.log('Server Updated');
                    successMsg('Server Updated successfully.');
                    $('#server_table').DataTable().ajax.reload();
                    $('#serverModal').modal('hide');
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

        $('#kt_datepicker_3').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });
    });
</script>

