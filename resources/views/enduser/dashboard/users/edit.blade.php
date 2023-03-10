<div class="modal-header bg-info">
    <h5 class="modal-title">Edit User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="editUsersForm">
    <div class="modal-body">
        @csrf
        @method('POST')
        <!-- Form content start -->
        <input type="hidden" id="id" value="{{$user->id}}">
        <div class="row form-group">
            <label for="employment_id" class="col-3 col-form-label">Employment ID</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="employment_id" value="{{$user->employment_id}}">
                <small id="employment_id-error" class="text-danger" for="employment_id"></small>
            </div>
        </div>
        <div class="row form-group">
            <label for="name" class="col-3 col-form-label">Name</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>
        <div class="row form-group">
            <label for="name" class="col-3 col-form-label">Username</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="username" value="{{$user->username}}">
                <small id="username-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                <small id="phone-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label">Mobile</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
                <small id="mobile-error" class="text-danger"></small>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Email</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                <small id="email-error" class="text-danger" for="email"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label">Skype ID</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="skype_id" value="{{$user->skype_id}}">
                <small id="skype_id-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">Group</label>
            <div class="col-lg-9">
                <select name="group" class="form-control kt-select2-2">
                    @foreach($groups as $group)
                    <option value="{{$group->id}}" {{($user->group_id==$group->id) ? 'selected': ''}}>{{$group->name}}</option>
                    @endforeach
                </select>
                <small id="group-error" class="text-danger" for="group"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="depertment" class="col-lg-3 col-form-label">Depertment</label>
            <div class="col-lg-9">
                <select name="depertment" class="form-control kt-select2-2">
                    @foreach($depertments as $depertment)
                    <option value="{{$depertment->id}}" {{($user->depertment_id==$depertment->id) ? 'selected': ''}}>{{$depertment->name}}</option>
                    @endforeach
                </select>
                <small id="depertment-error" class="text-danger" for="depertment"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">User Status</label>
            <div class="col-lg-9">
                <select name="user_status" class="form-control kt-select2-2">
                    <option value="1" {{($user->user_status==1) ? 'selected': ''}}>Active</option>
                    <option value="0" {{($user->user_status==0) ? 'selected': ''}}>Inactive</option>
                </select>
                <small id="user_status-error" class="text-danger" for="group"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">Profile Photo</label>
            <div class="col-lg-4">
                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                    <div>
                        @if($user->image)
                        <img class="kt-avatar__holder" id="img-crop" src="{{asset('public/uploads/user/'.$user->image)}}" alt="">
                        @else
                        <img class="kt-avatar__holder" id="img-crop" src="{{asset('assets/media/users/default.jpg')}}" alt="">
                        @endif
                    </div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                        <i class="fa fa-pen"></i>
                        <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg">
                    </label>
                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                        <i class="fa fa-times"></i>
                    </span>
                </div>
                <small id="image-error" class="text-danger"></small>
            </div>
            <!-- <div class="col-lg-5">
                <div id="img-crop" style="display: none"></div>
            </div> -->
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
            url: "{{ url('dashboard/user/update') }}/" + id,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('User updated successfully.');
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
</script>