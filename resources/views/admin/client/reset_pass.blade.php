
<div class="modal-header bg-info">
    <h5 class="modal-title">Reset Client Password</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="resetPassForm">
    <div class="modal-body">
        @csrf
        <!-- Form content start -->
        <input type="hidden" id="id" value="{{$client->id}}">
        <div class="row form-group">
            <label for="password" class="col-3 col-form-label">New Password</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="password">
                <small id="password-error" class="text-danger" for="password"></small>
            </div>
        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <input type="submit" id="submit" value="Save Change" class="btn btn-success btn-sm float-right">
    </div>

</form>
      
<script>

    $(document).on('submit','form#resetPassForm',function(event){

        event.preventDefault();
        var id = $('#id'). val();
        $('#submit').val('Saving...');
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('client_reset_password') }}/"+id,
            data: $('#resetPassForm').serialize(),
            success: function (response) {
                successMsg('User updated successfully.');
                $('#clientModal').modal('hide');
                $('#client_table').DataTable().ajax.reload(null, false);
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

</script>

