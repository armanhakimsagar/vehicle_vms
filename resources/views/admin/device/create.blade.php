
<div class="modal-header bg-info">
    <h5 class="modal-title">Add Device</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="deviceForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <!-- Form content start -->
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" id="name">
                <small id="name-error" class="text-danger"></small>
            </div>
        </div> 
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Server Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="server_name" id="server_name">
                <small id="server_name-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label  class="col-lg-3 col-form-label">Server Address</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="server_address" id="server_address">
                <small id="server_address-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Status</label>
            <div class="col-md-9">
                <select name="status" class="form-control kt-select2-2" id="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('device.store') }}",
                data: $('#deviceForm').serialize(),
                success: function (response) {
                    console.log('Device created');
                    successMsg('Device created successfully.');
                    $('#device_table').DataTable().ajax.reload();
                    $('#deviceModal').modal('hide');
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

    });
</script>

