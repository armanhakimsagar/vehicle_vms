@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Sms Setting</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid vehicle_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Sms Setting
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveEmailSetting" action="{{route('sms.settings.store')}}" method="post">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">SMS Provider Name  </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="provider_name"
                                    placeholder="SMS Provider Name" value="">
                                    @error('provider_name')
                                      <small id="system_email-error" class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">User Id  </label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="user_id"
                                    placeholder="User id" value="">
                                    @error('user_id')
                                      <small id="system_email-error" class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password  </label>
                            <div class="col-lg-7">
                                <input type="password" class="form-control" name="password"
                                    placeholder="password" value="">
                                    @error('password')
                                      <small id="system_email-error" class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Status
                            </label>
                            <div class="col-lg-7">
                                <select name="status" class="form-control kt-select2-2">
                                    <option value="YES" >
                                        YES</option>
                                        <option value="NO" >
                                        NO</option>

                                </select>
                                @error('status')
                                      <small id="system_email-error" class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>



<script>

</script>
@endsection