<div class="user_view">
    <div class="modal-header bg-info">
        <h5 class="modal-title"> User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <label for="name" class="col-lg-3 col-form-label">Photo</label>
            <div class="col-lg-9 ">
                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                    <div>
                    @if($user->image)
                        <img class="kt-avatar__holder" src="{{asset('public/uploads/user/'.$user->image)}}" alt="">
                    @else
                        <img class="kt-avatar__holder" src="{{asset('assets/media/users/100_6.jpg')}}" alt="">
                    @endif
                    </div>
                </div>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Employment ID</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->employment_id}}</span>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->name}}</span>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Username</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->username}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Phone</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->phone}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Mobile</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->mobile}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Email</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->email}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Skype ID</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->skype_id}}</span>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Role</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->role->name}}</span>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Depertment</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{$user->depertment->name}}</span>
            </div>
        </div>
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">User Status</label>
            <div class="col-lg-9 ">
                @if($user->user_status==1)
                <span class="form-control">Active</span>
                @else
                <span class="form-control">Inactive</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Created</label>
            <div class="col-lg-9 ">
                <span class="form-control">{{date('d M yy h:i a', strtotime($user->created_at))}}</span>
            </div>
        </div>

    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="button" id="reset-password" class="btn btn-success btn-sm float-right reset-password">Rest Password</button>

    </div>
</div>

<div class="reset_pass">

    <div class="modal-header bg-info">
        <h5 class="modal-title">Reset User Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="" id="resetPassForm">
        <div class="modal-body">
            @csrf
            <!-- Form content start -->
            <input type="hidden" id="id" value="{{$user->id}}">
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
</div>

<script>

 $(document).ready(function(e){
        $('.reset_pass').css('display', 'none');
    });


    $('#reset-password').click(function (e) {
        e.preventDefault();

        $('.user_view').css('display', 'none');
        $('.reset_pass').css('display', 'block');
    });

    $(document).on('submit','form#resetPassForm',function(event){

        event.preventDefault();
        var id = $('#id'). val();
        $('#submit').val('Saving...');
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('user_reset_password') }}/"+id,
            data: $('#resetPassForm').serialize(),
            success: function (response) {
                successMsg('User updated successfully.');
                $('#userModal').modal('hide');
                $('#user_table').DataTable().ajax.reload(null, false);
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