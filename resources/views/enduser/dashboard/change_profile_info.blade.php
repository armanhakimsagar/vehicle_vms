<div class="col-xl-12">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Personal Information <small>update your personal informaiton</small></h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon2-gear"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__section kt-nav__section--first">
                                    <span class="kt-nav__section-text">Export Tools</span>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-print"></i>
                                        <span class="kt-nav__link-text">Print</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-copy"></i>
                                        <span class="kt-nav__link-text">Copy</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                        <span class="kt-nav__link-text">Excel</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-text-o"></i>
                                        <span class="kt-nav__link-text">CSV</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                        <span class="kt-nav__link-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="kt-form kt-form--label-right" id="edit-profile-form">
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body">
                        @csrf

                        <input type="hidden" id="id" value="{{$profile->id}}">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"></label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                    <div>
                                        <img class="kt-avatar__holder" src="{{asset('public/uploads/user/'.$profile->image)}}" alt="">
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
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control" type="text" name="name" id="name" value="{{$profile->name}}">
                            <small id="name-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$profile->phone}}">
                                </div>
                                <small id="phone-error" class="text-danger"></small>
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
                            <input type="submit" id="submit" class="btn btn-brand btn-sm float-right" value="Save Change">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<script>

    $(document).ready(function (e) {
    
        $('#image').change(function(){
                
            let reader = new FileReader();

            reader.onload = (e) => { 

            $('.kt-avatar__holder').attr('src', e.target.result); 
            }

            reader.readAsDataURL(this.files[0]); 
        
        });
    
    });

      

    $(document).on('submit','form#edit-profile-form',function(event){

        event.preventDefault();
        $('#submit').val('Saving...');
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('profile.store') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                successMsg('Profile updated successfully.');
                window.location.href = "{{url('profile')}}";
            },
            error: function (reject) {
                $('#submit').val('Save Change');

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