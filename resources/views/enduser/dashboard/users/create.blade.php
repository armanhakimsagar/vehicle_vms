<div class="modal-header bg-info">
    <h5 class="modal-title">Add User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="saveUserForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <!-- Form content start -->
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Name </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="username" class="col-lg-3 col-form-label">Username </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="username">
                <small id="username-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="employment_id" class="col-lg-3 col-form-label">Employment ID</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="employment_id">
                <small id="employment_id-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="password" class="col-lg-3 col-form-label">Password </label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text" id="pass-tggl"><i id="icon" class="fas fa-eye"></i></div>
                    </div>
                </div>
                <small id="password-error" class="text-danger" for="password"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="password_confirmation" class="col-lg-3 col-form-label">Confirm Password </label>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text" id="conf-pass-tggl"><i id="icon-conf" class="fas fa-eye"></i></div>
                    </div>
                </div>
                <small id="password-error" class="text-danger" for="password"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="email" class="col-lg-3 col-form-label">Email</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="email">
                <small id="email-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Phone</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="phone">
                <small id="phone-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Mobile</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="mobile">
                <small id="mobile-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Skype ID</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="skype_id">
                <small id="skype_id-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">Group</label>
            <div class="col-lg-9">
                <select name="group" class="form-control kt-select2-2">
                    <option value="">Select One</option>
                    @foreach($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
                <small id="group-error" class="text-danger" for="group"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="depertment" class="col-lg-3 col-form-label">Depertment</label>
            <div class="col-lg-9">
                <select name="depertment" class="form-control kt-select2-2">
                    <option value="">Select One</option>
                    @foreach($depertments as $depertment)
                    <option value="{{$depertment->id}}">{{$depertment->name}}</option>
                    @endforeach
                </select>
                <small id="depertment-error" class="text-danger" for="depertment"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="role" class="col-lg-3 col-form-label">User Status</label>
            <div class="col-lg-9">
                <select name="user_status" class="form-control kt-select2-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <small id="user_status-error" class="text-danger" for="role"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="role" class="col-lg-3 col-form-label">Profile Photo</label>
            <div class="col-lg-4">
                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                    <div>
                        <img class="kt-avatar__holder" id="img-crop" src="{{asset('assets/media/users/default.jpg')}}" alt="">
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

        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
    </div>

</form>

<script>
    $(document).ready(function(e) {

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.kt-avatar__holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });


    $(document).on('submit', 'form#saveUserForm', function(event) {

        event.preventDefault();
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/user') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('User created successfully.');
                $('#user_table').DataTable().ajax.reload();
                $('#userModal').modal('hide');
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

    $(document).ready(function() {
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('#pass-tggl').click(function() {
            $('#icon').toggleClass('fa-eye-slash');
            var pass = $('#password');
            if (pass.attr('type') === 'password') {
                pass.attr('type', 'text');
            } else {
                pass.attr('type', 'password');
            }
        });

        $('#conf-pass-tggl').click(function() {
            $('#icon-conf').toggleClass('fa-eye-slash');
            var passConf = $('#password_confirmation');
            if (passConf.attr('type') === 'password') {
                passConf.attr('type', 'text');
            } else {
                passConf.attr('type', 'password');
            }
        });
    });
</script>