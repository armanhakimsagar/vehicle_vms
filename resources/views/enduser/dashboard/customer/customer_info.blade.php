<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Row-->

    <div class="row single_client">
        <div class="col-sm-12 order-lg-3 order-xl-1">
            <!-- begin: client view -->
            <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid client-details">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Customer Information</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="javascript:;" class="custom-nav-link mr-3"><i class="fas fa-tv mr-2"></i>Monitor</a>
                        <a href="javascript:;" class="custom-nav-link mr-3"><i
                                class="far fa-bell mr-2"></i>Notification</a>
                        <a href="javascript:;" class="custom-nav-link mr-3"><i class="far fa-envelope mr-2"></i>Send
                            Message</a>
                        <!-- <a href="#" id="clientEdit" class="custom-nav-link"><i class="far fa-edit mr-2"></i>Edit</a> -->
                        <a href="javascript:;" id="clientEdit" class="btn btn-info btn-sm mr-3"><i
                                class="far fa-edit mr-2"></i>Edit</a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list"><i
                                class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body text-dark">
                            <div class="row">
                                <div class="col-lg-6 custom-form-group-border">

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Customer Name </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control" style="height:40px"> {{$customer->customer_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Company Name </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control" style="height:40px"> {{$customer->name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Father Name </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->father_name}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Mother Name </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->mother_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Date of Birth </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span
                                                class="form-control">{{date('d M yy', strtotime($customer->date_of_birth))}}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Spouse Name </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->spouse_name}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Spouse Phone </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->spouse_phone}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Occupation </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->occupation}}</span>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">NID No </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->nid_no}}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Passport No </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->passport_no}}</span>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Gender </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            @if($customer->gender==1)
                                            <span class="form-control">Male</span>
                                            @elseif($customer->gender==2)
                                            <span class="form-control">Female</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Division </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            @if($customer->division)
                                            <span class="form-control"> {{$customer->divisions->name}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">District </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            @if($customer->district)
                                            <span class="form-control"> {{$customer->districts->name}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Thana </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            @if($customer->thana)
                                            <span class="form-control"> {{$customer->thanas->name}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Present Address </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->present_address}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Permanent Address </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->permanent_address}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Billing Address </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->billing_address}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 custom-form-group-border">

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Invoice Due </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Monthly Due</label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Total Due</label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3"> Due Limit </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->customer_due_limit}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">SMS Phone </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->phone}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Contact One </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->contact_1}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Contact Two </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->contact_2}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Email</label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->email}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">A/C Opening Date </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control">
                                                {{date('d M yy', strtotime($customer->ac_opening_date))}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Account Note </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->accounts_note}}</span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">Platform Username </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->hosting_company}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-4 col-sm-3">System Username </label>
                                        <div class="col-lg-7 col-md-8 col-sm-9">
                                            <span class="form-control"> {{$customer->username}}</span>

                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end: client view -->

            <!-- begin: client edit -->

            <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid client-edit">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Edit Customer Information</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <!-- <a href="#" id="closeEdit" class="custom-nav-link"><i
                                class="far fa-times-circle mr-2"></i>Close</a> -->
                        <a href="#" id="closeEdit" class="btn btn-success btn-sm mr-3"><i
                                class="far fa-eye mr-2"></i>View</a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list"><i
                                class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
                <form class="kt-form kt-form--label-right" id="customerEditForm">
                    @csrf
                    @method('POST')
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-0"
                                            class="active nav-link">General</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-1" class="nav-link">Contact
                                            details</a></li>
                                    <!-- <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-2" class="nav-link">Web</a>
                                </li> -->
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-3"
                                            class="nav-link">Platform
                                            info</a></li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-4" class="nav-link">Account
                                            details</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-eg1-0" role="tabpanel">
                                        <div class="form-group row">
                                            <input type="hidden" id="id" value="{{$customer->id}}">
                                            <label class=" col-form-label col-lg-3 col-sm-12">Customer Group <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="customer_group">
                                                    <option value="">Select</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                </select>
                                                <small id="customer_group-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Customer ID</label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="customer_id"
                                                    value="{{$customer->customer_id}}" disabled>
                                                <small id="customer_id-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Employee </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="employee">
                                                    @foreach($users as $user)
                                                    <option value="{{$user->id}}"
                                                        {{ ( $user->id == $customer->employee_id) ? 'selected' : '' }}>
                                                        {{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="employee-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Customer Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="customer_name"
                                                    value="{{$customer->customer_name}}">
                                                <small id="customer_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Company Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="company_name"
                                                    value="{{$customer->name}}">
                                                <small id="company_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Father Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="father_name"
                                                    value="{{$customer->father_name}}">
                                                <small id="father_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Mother Name </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="mother_name"
                                                    value="{{$customer->mother_name}}">
                                                <small id="mother_name-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Date of Birth <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group date">
                                                    <input type="text" name="date_of_birth" class="form-control datepicker" value="{{$customer->date_of_birth}}" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <small id="date_of_birth-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Division <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">

                                                <select class="form-control kt-select2-2" id="division"
                                                    name="division">
                                                    @foreach($divisions as $div)
                                                    <option value="{{$div->id}}"
                                                        {{ ( $div->id == $customer->division) ? 'selected' : '' }}>
                                                        {{$div->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="division-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">District <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2 districtList" id="district"
                                                    name="district">
                                                    @foreach($districts as $dis)
                                                    <option value="{{$dis->id}}"
                                                        {{ ( $dis->id == $customer->district) ? 'selected' : '' }}>
                                                        {{$dis->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="district-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Thana <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2 thanaList" id="thana_id"
                                                    name="thana">
                                                    @foreach($thanas as $tha)
                                                    <option value="{{$tha->id}}"
                                                        {{ ( $tha->id == $customer->thana) ? 'selected' : '' }}>
                                                        {{$tha->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <small id="thana-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">NID No <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="nid_no"
                                                    value="{{$customer->nid_no}}">
                                                <small id="nid_no-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Gender </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="gender">

                                                    <option value="1" {{($customer->gender==1) ? 'selected' : ''}}>Male
                                                    </option>
                                                    <option value="2" {{($customer->gender==2) ? 'selected' : ''}}>Female
                                                    </option>
                                                </select>
                                                <small id="gender-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-eg1-1" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Present Address </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="present_address"
                                                    rows="3">{{$customer->present_address}}</textarea>
                                                <small id="present_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Permanent Address </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="permanent_address"
                                                    rows="3">{{$customer->permanent_address}}</textarea>
                                                <small id="permanent_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Billing Address <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="billing_address"
                                                    rows="3">{{$customer->billing_address}}</textarea>
                                                <small id="billing_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">SMS Phone <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="sms_phone"
                                                        value="{{$customer->phone}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span></div>
                                                </div>
                                                <small id="sms_phone-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Emergency Phone </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="emergency_phone" placeholder="Enter emergency phone">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                            </div>
                                            <small id="emergency_phone-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Contact One <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="contact_one"
                                                        value="{{$customer->contact_1}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fas fa-phone"></i></span></div>
                                                </div>
                                                <small id="contact_one-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Contact Two </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="contact_two"
                                                        value="{{$customer->contact_2}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fas fa-phone"></i></span></div>
                                                </div>
                                                <small id="contact_two-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Company Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="company_email"
                                                        value="{{$customer->email}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fas fa-at"></i></span></div>
                                                </div>
                                                <small id="company_email-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Company Address </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="company_address"
                                                    rows="3">{{$customer->address}}</textarea>
                                                <small id="company_address-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Latitude </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="latitude"
                                                        value="{{$customer->latitude}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fab fa-google"></i></span></div>
                                                </div>
                                                <small id="latitude-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Longitude </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="longitude"
                                                        value="{{$customer->longitude}}">
                                                    <div class="input-group-append"><span class="input-group-text"><i
                                                                class="fab fa-google"></i></span></div>
                                                </div>
                                                <small id="longitude-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Short Note </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="short_note"
                                                    rows="3">{{$customer->short_note}}</textarea>
                                                <small id="short_note-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="tab-eg1-2" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Company Website </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="company_website"
                                                value="{{$customer->website}}">
                                            <small id="company_website-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Skype ID </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="skype_id"
                                                    value="{{$customer->skype_id}}">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fab fa-skype"></i></span></div>
                                            </div>
                                            <small id="skype_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Facebook URL </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="facebook_url"
                                                    value="{{$customer->facebook}}">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fab fa-facebook"></i></span></div>
                                            </div>
                                            <small id="facebook_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Twitter URL </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="twitter_url"
                                                    value="{{$customer->twitter}}">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fab fa-twitter"></i></span></div>
                                            </div>
                                            <small id="twitter_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3 col-sm-12">Linkedin URL </label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="linkedin_url"
                                                    value="{{$customer->linkedin}}">
                                                <div class="input-group-append"><span class="input-group-text"><i
                                                            class="fab fa-linkedin"></i></span></div>
                                            </div>
                                            <small id="linkedin_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div> -->
                                    <div class="tab-pane" id="tab-eg1-3" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Platform Username <span class="text-danger">*</span> </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="platform_username"
                                                    value="{{$customer->hosting_company}}">
                                                <small id="platform_username-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Platform Password </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="platform_password"
                                                        name="platform_password"
                                                        placeholder="Enter new platform password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="plat-pass-tggl"><i
                                                                id="icon-plat" class="fas fa-lock"></i></span>
                                                    </div>
                                                </div>
                                                <small id="platform_password-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">System Username <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="system_username"
                                                    value="{{$customer->username}}">
                                                <small id="system_username-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">System Password </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="system_password"
                                                        name="system_password" placeholder="Enter new system password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="sys-pass-tggl"><i
                                                                id="icon-sys" class="fas fa-lock"></i></span>
                                                    </div>
                                                </div>
                                                <small id="system_password-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Port </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="port"
                                                    value="{{$customer->port}}">
                                                <small id="port-error" class="text-danger"></small>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="tab-pane" id="tab-eg1-4" role="tabpanel">
                                        <!-- <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Package Type </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="package_type">
                                                    <option value="1" {{($customer->package_type==1) ? 'selected' : ''}}>
                                                        Prepaid</option>
                                                    <option value="2" {{($customer->package_type==2) ? 'selected' : ''}}>
                                                        Postpaid</option>
                                                </select>
                                                <small id="package_type-error" class="text-danger"></small>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Customer Due Limit <span class="text-danger">*</span>
                                                </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <input type="text" class="form-control" name="customer_due_limit"
                                                    value="{{$customer->customer_due_limit}}">
                                                <small id="customer_due_limit-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Collection Method <span class="text-danger">*</span> </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="collection_method">
                                                    <option value="">Select</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                </select>
                                                <small id="collection_method-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">A/C Opening Date <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <div class="input-group date">
                                                    <input type="text" name="ac_opening_date" class="form-control datepicker" value="{{$customer->ac_opening_date}}" autocomplete="off"/>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <small id="ac_opening_date-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Reporter </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="reporter">
                                                    <option value="0">Select</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                                <small id="reporter-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Follower </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2" name="follower">
                                                    <option value="0">Select</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                </select>
                                                <small id="follower-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Accounts Note </label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <textarea class="form-control" name="accounts_note"
                                                    rows="3">{{$customer->accounts_note}}</textarea>
                                                <small id="accounts_note-error" class="text-danger"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-3 col-sm-12">Global Status <span class="text-danger">*</span></label>
                                            <div class="col-lg-7 col-md-8 col-sm-12">
                                                <select class="form-control kt-select2-2 kt-select2-2"
                                                    name="global_status">
                                                    <option value="0" {{($customer->global_status==0) ? 'selected' : ''}}>
                                                        Inactive</option>
                                                    <option value="1" {{($customer->global_status==1) ? 'selected' : ''}}>
                                                        Active</option>
                                                    <option value="2" {{($customer->global_status==2) ? 'selected' : ''}}>
                                                        Overdue</option>
                                                    <option value="3" {{($customer->global_status==3) ? 'selected' : ''}}>
                                                        On
                                                        Hold</option>
                                                    <option value="4" {{($customer->global_status==4) ? 'selected' : ''}}>
                                                        Stop
                                                    </option>
                                                </select>
                                                <small id="global_status-error" class="text-danger"></small>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row mt-5">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                <button type="submit" id="clientEditSubmit"
                                                    class="btn btn-brand btn-sm float-right">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <!-- end: client edit -->
        </div>
    </div>
</div>


<script>
$(document).ready(function(e) {
    $('.client-edit').css('display', 'none');

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });

    $('[data-switch=true]').bootstrapSwitch();

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        todayHighlight: true,
        autoclose: true,
        format: 'dd M yyyy'
    });
});


$('#clientEdit').click(function(e) {
    e.preventDefault();

    $('.client-details').css('display', 'none');
    $('.client-edit').css('display', 'block');
});

$('#closeEdit').click(function(e) {
    e.preventDefault();

    $('.client-details').css('display', 'block');
    $('.client-edit').css('display', 'none');

});

$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".customer_data_list").css('display', 'block');
    $('.customer_detail').css('display', 'none');

});

$(document).on('change', '#division', function() {
    var divId = $('#division').val();
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('dashboard/getDistrict')}}",
        data: {
            divId: divId
        },
        success: function(result) {
            if (result) {
                $('.districtList').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});


$(document).on('change', '#district', function() {
    var disId = $('#district').val();
    $.ajax({
        type: "GET",
        dataType: "html",
        url: "{{url('dashboard/getThana')}}",
        data: {
            disId: disId
        },
        success: function(result) {
            if (result) {
                $('.thanaList').html(result);
                return false;
            } else {
                return false;
            }
        }
    });
    return false;
});

$('#customerEditForm').submit(function(event) {
    event.preventDefault();
    $("[id$=-error]").text('');
    var id = $('#id').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveCustomer') }}/" + id,
        data: $('#customerEditForm').serialize(),
        success: function(response) {
            successMsg('Customer updated successfully.');
            view_data(id);
            $('#customer_table').DataTable().ajax.reload(null, false);
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
    return false;
});

$(document).ready(function() {
    $('#plat-pass-tggl').click(function() {
        $('#icon-plat').toggleClass('fa-unlock');
        var pass = $('#platform_password');
        if (pass.attr('type') === 'password') {
            pass.attr('type', 'text');
        } else {
            pass.attr('type', 'password');
        }
    });

    $('#sys-pass-tggl').click(function() {
        $('#icon-sys').toggleClass('fa-unlock');
        var passConf = $('#system_password');
        if (passConf.attr('type') === 'password') {
            passConf.attr('type', 'text');
        } else {
            passConf.attr('type', 'password');
        }
    });
});
</script>