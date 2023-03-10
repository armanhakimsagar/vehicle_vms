
<div class="col-xl-12">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Change Password<small>change your account password</small></h3>
            </div>
            <div class="kt-portlet__head-toolbar kt-hidden">
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="la la-sellsy"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Quick Actions</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-graph-1"></i>
                                        <span class="kt-nav__link-text">Statistics</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                        <span class="kt-nav__link-text">Events</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                        <span class="kt-nav__link-text">Reports</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-bell-1o"></i>
                                        <span class="kt-nav__link-text">Notifications</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-file-1"></i>
                                        <span class="kt-nav__link-text">Files</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="kt-form kt-form--label-right" id="changePass">
            @csrf
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <input name="current_password" id="current_password" placeholder="Current password" type="password" class="form-control">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="curr_pass_tggl"><i id="curr_icon" class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                                <small id="current_password-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <input name="new_password" id="new_password" placeholder="New password" type="password" class="form-control">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"id="new_pass_tggl"><i id="new_icon" class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                                <small id="new_password-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group form-group-last row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <input name="password_confirmation" id="password_confirmation" placeholder="Confirm password" type="password" class="form-control">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"id="conf_pass_tggl"><i id="conf_icon" class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                                <small id="password_confirmation-error" class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-3 col-xl-3">
                        </div>
                        <div class="col-lg-9 col-xl-9">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save Change">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
 

    $(document).on('submit','form#changePass',function(event){

        event.preventDefault();
        $("[id$=-error]").text('');

        $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('profile/change-pass') }}",
        data: $(this).serialize(),
        success: function (response) {
            successMsg('Password updated successfully.');
            window.location.href = "{{url('profile')}}";
        },
        error: function (reject) {

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
        $('#curr_pass_tggl').click( function(){
            $('#curr_icon').toggleClass('fa-eye-slash');
            var pass= $('#current_password');
            if( pass.attr('type')==='password'){
                pass.attr('type', 'text');
            } else{
                pass.attr('type', 'password');
            }
        });

        $('#new_pass_tggl').click( function(){
            $('#new_icon').toggleClass('fa-eye-slash');
            var pass= $('#new_password');
            if( pass.attr('type')==='password'){
                pass.attr('type', 'text');
            } else{
                pass.attr('type', 'password');
            }
        });

        $('#conf_pass_tggl').click( function(){
            $('#conf_icon').toggleClass('fa-eye-slash');
            var passConf= $('#password_confirmation');
            if( passConf.attr('type')==='password'){
                passConf.attr('type', 'text');
            } else{
                passConf.attr('type', 'password');
            }
        });
    });
</script>
