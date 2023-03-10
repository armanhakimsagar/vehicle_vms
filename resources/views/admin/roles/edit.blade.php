
<div class="modal-header bg-info">
    <h5 class="modal-title">Edit User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="editRoleForm">
    <div class="modal-body">
        @csrf
        @method('PATCH')
        <!-- Form content start -->
        <input type="hidden" id="id" value="{{$role->id}}">
        <div class="row form-group">
            <label for="role_name" class="col-3 col-form-label">Role Name</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="role_name" value="{{$role->name}}">
                <small id="role_name-error" class="text-danger" ></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="role" class="col-lg-3 col-form-label">Guard Name</label>
            <div class="col-lg-9">
                <select name="guard_name" class="form-control kt-select2-2">
                    <option value="admin" {{($role->guard_name=='admin' ? 'selected' : '')}}>Admin</option>
                    <option value="web"  {{($role->guard_name=='web' ? 'selected' : '')}}>Web</option>
                </select>
                <small id="guard_name-error" class="text-danger"></small>
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

    $(document).on('submit','form#editRoleForm',function(event){

        event.preventDefault();
        var id = $('#id'). val();
        $('#submit').val('Saving...');
        $("[id$=-error]").text('');

        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "{{ url('role') }}/"+id,
            data: $('#editRoleForm').serialize(),
            success: function (response) {
                successMsg('Role Updated successfully.');
                $('#roleModal').modal('hide');
                $('#role_table').DataTable().ajax.reload(null, false);
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

