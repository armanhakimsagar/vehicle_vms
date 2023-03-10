
<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Gateway</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="gatewayEditForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('PATCH')
        <!-- Form content start -->
        <input type="hidden" class="form-control" value="{{$gateway->id}}" id="id">

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" id="name" value="{{$gateway->name}}">
                <small id="name-error" class="text-danger"></small>
            </div>
        </div> 
        <div class="form-group row">
            <label class="col-form-label col-lg-3">API End Point</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="api_endpoint" value="{{$gateway->api_endpoint}}">
                <small id="api_endpoint-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Username</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="username" value="{{$gateway->username}}">
                <small id="username-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Password</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="password" value="{{$gateway->password}}">
                <small id="password-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Status</label>
            <div class="col-md-9">
                <select name="status" class="form-control kt-select2-2" id="status">
                    <option value="1" {{($gateway->status==1) ? 'selected' : ''}}>Active</option>
                    <option value="0" {{($gateway->status==0) ? 'selected' : ''}}>Inactive</option>
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
                url: "{{ url('gateway') }}/"+id,
                data: $('#gatewayEditForm').serialize(),
                success: function (response) {
                    successMsg('Gateway Updated successfully.');
                    $('#gateway_table').DataTable().ajax.reload();
                    $('#gatewayModal').modal('hide');
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

