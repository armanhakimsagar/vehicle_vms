        <!-- begin: client view -->
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid client-details">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Profile Information</h3>
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
                                        <span class="form-control"> {{$profile->customer_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Company Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                    <span class="form-control"> {{$profile->name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Father Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->father_name}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Mother Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->mother_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Date of Birth </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->date_of_birth}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Spouse Name </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->spouse_name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Spouse Phone </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->spouse_phone}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Occupation </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->occupation}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">NID No </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->nid_no}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Passport No </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->passport_no}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Gender </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($profile->gender==1)
                                        <span class="form-control">Male</span>
                                        @elseif($profile->gender==2)
                                        <span class="form-control">Female</span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Division </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->divisions->name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">District </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                    <span class="form-control"> {{$profile->districts->name}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Thana </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->thanas->name}}</span>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Present Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->present_address}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Permanent  Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->permanent_address}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Billing  Address </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->billing_address}}</span>
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
                                        <span class="form-control"> {{$profile->customer_due_limit}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">SMS Phone </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->phone}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Contact One  </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->contact_1}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Contact Two </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->contact_2}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Email</label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->email}}</span>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">A/C Opening Date </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{date('d M yy', strtotime($profile->ac_opening_date))}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Account Note </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                    <span class="form-control"> {{$profile->accounts_note}}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Platform Username </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->hosting_company}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">System Username </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        <span class="form-control"> {{$profile->username}}</span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">Account Role </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($profile->actor_type==1)
                                        <span class="form-control">Distributor</span>
                                        @elseif($profile->actor_type==2)
                                        <span class="form-control">Enduser</span>
                                        @elseif($profile->actor_type==0)
                                        <span class="form-control">Only Viewer</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-4 col-sm-3">CRM To Platform Connection  </label>
                                    <div class="col-lg-7 col-md-8 col-sm-9">
                                        @if($profile->active==1)
                                        <span class="btn btn-success btn-sm">Connected</span>
                                        @elseif($profile->active==0)
                                        <span class="btn btn-warning btn-sm">Disconnected</span>
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


    <script>
       
    </script>