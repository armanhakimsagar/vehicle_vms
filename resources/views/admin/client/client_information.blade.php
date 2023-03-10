        <!-- begin: client view -->
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid client-details">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Client Details</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="javascript:;" class="custom-nav-link mr-3"><i class="fas fa-tv mr-2"></i>Monitor</a>
                    <a href="javascript:;" class="custom-nav-link mr-3"><i class="far fa-bell mr-2"></i>Notification</a>
                    <a href="javascript:;" class="custom-nav-link mr-3"><i class="far fa-envelope mr-2"></i>Send Message</a>
                    <a href="#" id="clientEdit" class="custom-nav-link"><i class="far fa-edit mr-2"></i>Edit</a>
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
                                        <span class="form-control"> {{$client->customer_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Company Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                    <span class="form-control"> {{$client->name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Father Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->father_name}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Mother Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->mother_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Date of Birth </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control">{{date('d M Y', strtotime($client->date_of_birth))}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Spouse Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->spouse_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Spouse Phone </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->spouse_phone}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Occupation </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->occupation}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">NID No </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->nid_no}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Passport No </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->passport_no}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Gender </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->gender==1)
                                        <span class="form-control">Male</span>
                                        @elseif($client->gender==2)
                                        <span class="form-control">Female</span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Division </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->division)
                                        <span class="form-control"> {{$client->divisions->name}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">District </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->district)
                                        <span class="form-control"> {{$client->districts->name}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Thana </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->thana)
                                        <span class="form-control"> {{$client->thanas->name}}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Present Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->present_address}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Permanent  Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->permanent_address}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Billing  Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->billing_address}}</span>
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
                                        <span class="form-control"> {{$client->customer_due_limit}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">SMS Phone </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->phone}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Contact One  </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->contact_1}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Contact Two </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->contact_2}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Email</label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->email}}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">A/C Opening Date </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{date('d M yy', strtotime($client->ac_opening_date))}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Account Note </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                    <span class="form-control"> {{$client->accounts_note}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Platform Username </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->hosting_company}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">System Username </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$client->username}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Account Role </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->actor_type==1)
                                        <span class="form-control">Distributor</span>
                                        @elseif($client->actor_type==2)
                                        <span class="form-control">Enduser</span>
                                        @elseif($client->actor_type==0)
                                        <span class="form-control">Only Viewer</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">CRM To Platform Connection  </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($client->active==1)
                                        <span class="btn btn-success btn-sm ml-3">Connected</span>
                                        @elseif($client->active==0)
                                        <span class="btn btn-warning btn-sm ml-3">Disconnected</span>
                                        @endif

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
                    <h3 class="kt-portlet__head-title">Edit Client Information</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                        <a href="#" id="closeEdit" class="custom-nav-link"><i class="far fa-times-circle mr-2"></i>Close</a>
                </div>
            </div>
            <form class="kt-form kt-form--label-right" id="clientEditForm">
                @csrf
                @method('PATCH')
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body text-dark">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-0" class="active nav-link">General</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-1" class="nav-link">Contact details</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-2" class="nav-link">Web</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-3" class="nav-link">Platform info</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg1-4" class="nav-link">Account details</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-eg1-0" role="tabpanel">
                                    <div class="form-group row">
                                        <input type="hidden" id="id" value="{{$client->id}}">
                                        <label class=" col-form-label col-lg-4 col-sm-12">Customer Group :</label>
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
                                        <label class="col-form-label col-lg-4 col-sm-12">Customer ID :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="customer_id" value="{{$client->customer_id}}">
                                            <small id="customer_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Distributor :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="distributor">
                                                <option value="">Select</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select>
                                            <small id="distributor-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Employee :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="employee">
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}" {{ ( $user->id == $client->employee_id) ? 'selected' : '' }}>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="employee-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Customer Name :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="customer_name" value="{{$client->customer_name}}">
                                            <small id="customer_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company Name :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="company_name" value="{{$client->name}}">
                                            <small id="company_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Father Name :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="father_name" value="{{$client->father_name}}">
                                            <small id="father_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Mother Name :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="mother_name"  value="{{$client->mother_name}}">
                                            <small id="mother_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Date of Birth :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group date">
                                                <input type="text" name="date_of_birth" class="form-control" id="date_of_birth"  value="{{$client->date_of_birth}}"/>
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
                                        <label class="col-form-label col-lg-4 col-sm-12">Spouse Name :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="spouse_name" value="{{$client->spouse_name}}">
                                            <small id="spouse_name-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Spouse Phone :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="spouse_phone" value="{{$client->spouse_phone}}">
                                            <small id="spouse_phone-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Occupation :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="occupation" value="{{$client->occupation}}">
                                            <small id="occupation-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Division :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">

                                            <select class="form-control kt-select2-2" id="division_id" name="division_id">
                                                @foreach($divisions as $div)
                                                <option value="{{$div->id}}" {{ ( $div->id == $client->division) ? 'selected' : '' }}>{{$div->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="division_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">District :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2 districtList" id="district_id" name="district_id">
                                                @foreach($districts as $dis)
                                                <option value="{{$dis->id}}" {{ ( $dis->id == $client->district) ? 'selected' : '' }}>{{$dis->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="district_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Thana :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2 thanaList" id="thana_id" name="thana_id">
                                                @foreach($thanas as $tha)
                                                <option value="{{$tha->id}}" {{ ( $tha->id == $client->thana) ? 'selected' : '' }}>{{$tha->name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="thana_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">NID No :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="nid_no" value="{{$client->nid_no}}">
                                            <small id="nid_no-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Passport No :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="passport_no" value="{{$client->passport_no}}">
                                            <small id="passport_no-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Gender :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="gender">

                                                <option value="1" {{($client->gender==1) ? 'selected' : ''}}>Male</option>
                                                <option value="2" {{($client->gender==2) ? 'selected' : ''}}>Female</option>
                                            </select>
                                            <small id="gender-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg1-1" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Present Address :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="present_address" rows="3">{{$client->present_address}}</textarea>
                                            <small id="present_address-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Permanent  Address :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="permanent_address" rows="3">{{$client->permanent_address}}</textarea>
                                            <small id="permanent_address-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Billing  Address :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="billing_address" rows="3">{{$client->billing_address}}</textarea>
                                            <small id="billing_address-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">SMS Phone :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="sms_phone"  value="{{$client->phone}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                                            </div>
                                            <small id="sms_phone-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Emergency Phone :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="emergency_phone" placeholder="Enter emergency phone">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                            </div>
                                            <small id="emergency_phone-error" class="text-danger"></small>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Contact One  :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="contact_1"  value="{{$client->contact_1}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                            </div>
                                            <small id="contact_1-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Contact Two :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="contact_2"  value="{{$client->contact_2}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                                            </div>
                                            <small id="contact_2-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company Email :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="company_email"  value="{{$client->email}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-at"></i></span></div>
                                            </div>
                                            <small id="company_email-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company  Address :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="company_address" rows="3">{{$client->address}}</textarea>
                                            <small id="company_address-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company Fax :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="company_fax"  value="{{$client->fax}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fas fa-fax"></i></span></div>
                                            </div>
                                            <small id="company_fax-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company City :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="company_city"  value="{{$client->city}}">
                                            <small id="company_city-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class=" col-form-label col-lg-4 col-sm-12">Company Country :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="company_country">
                                                <option value="1" {{($client->country==1) ? 'selected' : ''}}>Bangladesh</option>
                                                <option value="2" {{($client->country==2) ? 'selected' : ''}}>Others</option>
                                            </select>
                                            <small id="company_country-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company VAT :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="company_vat" value="{{$client->vat}}">
                                            <small id="company_vat-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class=" col-form-label col-lg-4 col-sm-12">Language :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="language">
                                                <option value="1" {{($client->language==1) ? 'selected' : ''}}>Bangla</option>
                                                <option value="2" {{($client->language==2) ? 'selected' : ''}}>English</option>
                                                <option value="3" {{($client->language==3) ? 'selected' : ''}}>Others</option>
                                            </select>
                                            <small id="language-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Currency :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="currency">
                                                <option value="bdt" {{($client->currency=='bdt') ? 'selected' : ''}}>BDT</option>
                                                <option value="usd" {{($client->currency=='usd') ? 'selected' : ''}}>USD</option>
                                            </select>
                                            <small id="currency-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Latitude :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="latitude" value="{{$client->latitude}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-google"></i></span></div>
                                            </div>
                                            <small id="latitude-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Longitude :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="longitude" value="{{$client->longitude}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-google"></i></span></div>
                                            </div>
                                            <small id="longitude-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Short Note :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="short_note" rows="3">{{$client->short_note}}</textarea>
                                            <small id="short_note-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg1-2" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Company Website :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="company_website" value="{{$client->website}}">
                                            <small id="company_website-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Skype ID :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="skype_id" value="{{$client->skype_id}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-skype"></i></span></div>
                                            </div>
                                            <small id="skype_id-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Facebook URL :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="facebook_url" value="{{$client->facebook}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-facebook"></i></span></div>
                                            </div>
                                            <small id="facebook_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Twitter URL :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="twitter_url" value="{{$client->twitter}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-twitter"></i></span></div>
                                            </div>
                                            <small id="twitter_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Linkedin URL :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="linkedin_url" value="{{$client->linkedin}}">
                                                <div class="input-group-append"><span class="input-group-text"><i class="fab fa-linkedin"></i></span></div>
                                            </div>
                                            <small id="linkedin_url-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg1-3" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Platform Username :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="platform_username" value="{{$client->hosting_company}}">
                                            <small id="platform_username-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Platform Password :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="password" class="form-control"  id="platform_password" name="platform_password" placeholder="Enter new platform password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="plat-pass-tggl"><i id="icon-plat" class="fas fa-lock"></i></span>
                                                </div>
                                            </div>
                                            <small id="platform_password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">System Username :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="system_username" value="{{$client->username}}">
                                            <small id="system_username-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">System Password :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="system_password" name="system_password" placeholder="Enter new system password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="sys-pass-tggl"><i id="icon-sys" class="fas fa-lock"></i></span>
                                                </div>
                                            </div>
                                            <small id="system_password-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Port :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="port" value="{{$client->port}}">
                                            <small id="port-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-eg1-4" role="tabpanel">
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Package Type :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="package_type">
                                                <option value="1" {{($client->package_type==1) ? 'selected' : ''}}>Prepaid</option>
                                                <option value="2" {{($client->package_type==2) ? 'selected' : ''}}>Postpaid</option>
                                            </select>
                                            <small id="package_type-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Customer Due Limit :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <input type="text" class="form-control" name="customer_due_limit" value="{{$client->customer_due_limit}}">
                                            <small id="customer_due_limit-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Collection Dealer :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="collection_dealer">
                                                <option value="">Select</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select>
                                            <small id="collection_dealer-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Collection Method :</label>
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
                                        <label class="col-form-label col-lg-4 col-sm-12">Billing Date :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <div class="input-group date">
                                                <input type="text" name="billing_date" class="form-control" id="kt_datepicker_3" value="{{$client->billing_date}}"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small id="billing_date-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Reporter :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="reporter">
                                                <option value="">Select</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select>
                                            <small id="reporter-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Follower :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="follower">
                                                <option value="">Select</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select>
                                            <small id="follower-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Accounts Note :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <textarea class="form-control"  name="accounts_note" rows="3">{{$client->accounts_note}}</textarea>
                                            <small id="accounts_note-error" class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Global Status :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2 kt-select2-2" name="global_status">
                                                <option value="0" {{($client->global_status==0) ? 'selected' : ''}}>Inactive</option>
                                                <option value="1" {{($client->global_status==1) ? 'selected' : ''}}>Active</option>
                                                <option value="2" {{($client->global_status==2) ? 'selected' : ''}}>Overdue</option>
                                                <option value="3" {{($client->global_status==3) ? 'selected' : ''}}>On Hold</option>
                                                <option value="4" {{($client->global_status==4) ? 'selected' : ''}}>Stop</option>
                                            </select>
                                            <small id="global_status-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">Role</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            <select class="form-control kt-select2-2" name="role">
                                                <option value="1" {{($client->actor_type==1) ? 'selected' : ''}}>Distributor</option>
                                                <option value="2" {{($client->actor_type==2) ? 'selected' : ''}}>Enduser</option>
                                                <option value="0" {{($client->actor_type==0) ? 'selected' : ''}}>Only Viewer</option>
                                            </select>
                                            <small id="role-error" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-4 col-sm-12">CRM Status :</label>
                                        <div class="col-lg-7 col-md-8 col-sm-12">
                                            @if($client->active==1)
                                            <input name="crm_status" data-switch="true" type="checkbox" checked="checked"  data-on-text="AC" data-off-text="N AC" data-on-color="success" data-off-color="warning">
                                            @elseif($client->active==0)
                                            <input name="crm_status" data-switch="true" type="checkbox"  data-on-text="AC" data-off-text="N AC" data-on-color="success" data-off-color="warning">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mt-5">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            <button type="submit" id="clientEditSubmit" class="btn btn-brand btn-sm float-right">Update</button>
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

    <script>
        $(document).ready(function(e){
            $('.client-edit').css('display', 'none');

            $('.kt-select2-2').select2({
                placeholder: "Select"
            });

            $('[data-switch=true]').bootstrapSwitch();

            $('#date_of_birth').datepicker({
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                autoclose: true,
                format: 'dd M yyyy'
            });
        });


        $('#clientEdit').click(function (e) {
            e.preventDefault();

            $('.client-details').css('display', 'none');
            $('.client-edit').css('display', 'block');
        });

        $('#closeEdit').click(function (e) {
            e.preventDefault();

            $('.client-details').css('display', 'block');
            $('.client-edit').css('display', 'none');

        });


        $(document).on('change','#division_id',function(){
            var divId = $('#division_id').val();
            $.ajax({
                type: "GET",
                dataType: "html",
                url: "{{url('getDistrict')}}",
                data:{divId:divId},
                success: function (result) {
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


        $(document).on('change','#district_id',function(){
            var disId = $('#district_id').val();
            $.ajax({
                type: "GET",
                dataType: "html",
                url: "{{url('getThana')}}",
                data:{disId:disId},
                success: function (result) {
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

        $(document).ready(function(){
            $('#clientEditSubmit').click( function(event){
                var button = document.getElementById('client_information');
                var id = $('#id').val();
                event.preventDefault();
                $("[id$=-error]").text('');
                $.ajax({
                    type: "PATCH",
                    dataType: "json",
                    url: "{{ url('client') }}/"+id,
                    data: $('#clientEditForm').serialize(),
                    success: function (response) {
                        console.log('Client Updated');
                        successMsg('Client Updated successfully.');
                        button.click();
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
        });


        $(document).ready(function(){
            $('#plat-pass-tggl').click( function(){
                $('#icon-plat').toggleClass('fa-unlock');
                var pass= $('#platform_password');
                if( pass.attr('type')==='password'){
                    pass.attr('type', 'text');
                } else{
                    pass.attr('type', 'password');
                }
            });

            $('#sys-pass-tggl').click( function(){
                $('#icon-sys').toggleClass('fa-unlock');
                var passConf= $('#system_password');
                if( passConf.attr('type')==='password'){
                    passConf.attr('type', 'text');
                } else{
                    passConf.attr('type', 'password');
                }
            });
        });
    </script>
