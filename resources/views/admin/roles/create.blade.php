
        <div class="modal-header bg-info">
            <h5 class="modal-title">Add Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form id="saveRoleForm">
            <div class="modal-body  text-dark">
                @csrf
                @method('POST')
                <!-- Form content start -->
                <div class=" row form-group">
                    <label for="role_name" class="col-lg-3 col-form-label">Role Name </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="role_name">
                        <small id="role_name-error" class="text-danger" ></small>
                    </div>
                </div> 
                <div class=" row form-group">
                    <label for="role" class="col-lg-3 col-form-label">Guard Name</label>
                    <div class="col-lg-9">
                        <select name="guard_name" class="form-control kt-select2-2">
                            <option value="admin">Admin</option>
                            <option value="web">Web</option>
                        </select>
                        <small id="guard_name-error" class="text-danger"></small>
                    </div>
                </div>
            </div>
            <div class="form-button">
                <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                
                <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
            </div>

        </form>
      
<script>


    $(document).on('submit','form#saveRoleForm',function(event){

        event.preventDefault();
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('role.store') }}",
            data: $('#saveRoleForm').serialize(),
            success: function (response) {
                console.log('Role created');
                successMsg('Role created successfully.');
                $('#roleModal').modal('hide');
                $('#role_table').DataTable().ajax.reload();

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

    $(document).ready(function(){
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

    });
</script>

