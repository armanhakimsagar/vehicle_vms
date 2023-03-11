<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Role</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="editUsersForm" method="post">
    <div class="modal-body">
        <?php echo csrf_field(); ?>
    <?php echo e(method_field('PUT')); ?>

           <!-- Form content start -->
           <input type="hidden" id="id" value="<?php echo e($data->id); ?>">


        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Type </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" value="<?php echo e($data->name); ?>">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="submit" id="submit" class="btn btn-success btn-sm float-right">Save Change</button>
        <!-- <input type="submit" id="submit" value="Save Change" class="btn btn-success btn-sm float-right"> -->
    </div>

</form>

<script>

    $('form#editUsersForm').submit(function(event) {

        event.preventDefault();
        var id = $('#id').val();
        $('#submit').val('Saving...');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo e(url('v-type-update', '')); ?>/"+id,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Type updated successfully.');
                $('#userModal').modal('hide');
                $('#user_table').DataTable().ajax.reload(null, false);
            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    $(document).ready(function(e) {

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.kt-avatar__holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    $(document).ready(function() {
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

    });
</script><?php /**PATH /var/www/html/resources/views/enduser/vendor_type/edit.blade.php ENDPATH**/ ?>