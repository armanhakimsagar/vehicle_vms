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
           <input type="hidden" id="id" value="<?php echo e($user->id); ?>">
           <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">Sms Receiver</label>
            <div class="col-lg-9">
                <select name="receiver" class="form-control kt-select2-2">
                    <option value="Client" <?php if($user->receiver=='Client'): ?> selected <?php endif; ?>>Client</option>
                    <option value="Trip" <?php if($user->receiver=='Trip'): ?> selected <?php endif; ?>>Trip</option>
                    <option value="Vehicle" <?php if($user->receiver=='Vehicle'): ?> selected <?php endif; ?>>Vehicle</option>
                    <option value="Driver" <?php if($user->receiver=='Driver'): ?> selected <?php endif; ?>>Driver</option>
                    <option value="Supplier" <?php if($user->receiver=='Supplier'): ?> selected <?php endif; ?>>Supplier</option>
                    <option value="User" <?php if($user->receiver=='User'): ?> selected <?php endif; ?>>User</option>
                </select>
                <small id="parent_id-error" class="text-danger" for="parent_id"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Category Name </label>
            <div class="col-lg-9">
            <select name="category" class="form-control kt-select2-2">
                   <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->category_name); ?>" <?php if($user->category==$item->category_name): ?> selected <?php endif; ?>><?php echo e($item->category_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Type </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="types" value="<?php echo e($user->types); ?>">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Title </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="title" value="<?php echo e($user->title); ?>">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Template </label>
            <div class="col-lg-9">
                <textarea rows="5" cols="5" class="form-control" name="template"><?php echo e($user->template); ?></textarea>
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
            url: "<?php echo e(url('template-update', '')); ?>/"+id,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Template updated successfully.');
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
</script><?php /**PATH /var/www/html/resources/views/enduser/settings/template/edit.blade.php ENDPATH**/ ?>