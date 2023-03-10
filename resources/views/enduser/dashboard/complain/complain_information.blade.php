<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid complain-view">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Complain Information</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="javascript:;" id="complainEdit" class="btn btn-info btn-sm"><i class="far fa-edit mr-2"></i>Edit</a>

            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <div class="row">
                        <div class="col-lg-9 custom-form-group-border">

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Generated Date</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{date('d M Y h:i a', strtotime($complain->created_at))}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Complain Sector</label>
                                <div class="col-sm-8">
                                    <span class="form-control"> {{$complain->module_name}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Complain Of</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$complain->complain_of_name}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Complain Type</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$complain->ct_name}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Reporter </label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$complain->r_name}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Follower</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$complain->f_name}}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Status</label>
                                <div class="col-sm-8">
                                    @if($complain->status==0)
                                    <span class="form-control"><span class="badge badge-pill badge-danger btn-sm">Pending</span></span>
                                    @elseif($complain->status==1)
                                    <span class="form-control"><span class="badge badge-pill badge-warning btn-sm">In Proccess</span></span>
                                    @elseif($complain->status==2)
                                    <span class="form-control"><span class="badge badge-pill badge-success btn-sm">Solved</span></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Priority</label>
                                <div class="col-sm-8">
                                    @if($complain->priority==0)
                                    <span class="form-control"><span class="badge badge-pill badge-success btn-sm">Low</span></span>
                                    @elseif($complain->priority==1)
                                    <span class="form-control"><span class="badge badge-pill badge-warning btn-sm">Medium</span></span>
                                    @elseif($complain->priority==2)
                                    <span class="form-control"><span class="badge badge-pill badge-danger btn-sm">High</span></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-label col-sm-4">Complain Details</label>
                                <div class="col-sm-8">
                                    <span class="form-control">{{$complain->complain_details}}</span>
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

    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid d-none complain-edit">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Edit Complain Information</h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <a href="#" id="closeEdit" class="btn btn-success btn-sm"><i class="far fa-eye mr-2"></i>View</a>

            </div>
        </div>
        <form class="" id="saveComplainForm">
            @csrf
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first px-3">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label"> Generated Date</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" name="generated_date" value="{{date('d M Y h:i a', strtotime($complain->created_at))}}" disabled>
                            <small id="generated_date-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Sector</label>
                        <div class="col-lg-7">
                            <select name="complain_sector" id="complain_sector" class="form-control kt-select2-2">
                                <option value="">Select</option>
                                @foreach($modules as $m)
                                @if ($m->assigned_id < 5 || $m->assigned_id > 9)
                                    <option value="{{$m->assigned_id}}" {{($m->assigned_id==$complain->module_id) ? ' selected' : ''}}>{{$m->name}}</option>
                                    @endif
                                    @endforeach
                            </select>
                            <small id="complain_sector-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label complain_to_label">Complain Of <span class="text-danger">*</span></label>
                        <div class="col-lg-7">
                            <select name="complain_of" id="complain_of" class="form-control kt-select2-2">
                                <option value="">Select</option>

                            </select>
                            <small id="complain_of-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Group <span class="text-danger">*</span></label>
                        <div class="col-lg-7">
                            <select name="complain_group" id="complain_group" class="form-control kt-select2-2">
                                <option value="">Select</option>

                            </select>
                            <small id="complain_group-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Type <span class="text-danger">*</span></label>
                        <div class="col-lg-7">
                            <select name="complain_type" id="complain_type" class="form-control kt-select2-2">
                                <option value="">Select</option>

                            </select>
                            <small id="complain_type-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Reporter</label>
                        <div class="col-lg-7">
                            <select name="reporter" id="reporter" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('users','name')}}
                            </select>
                            <small id="reporter-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Follower</label>
                        <div class="col-lg-7">
                            <select name="follower" id="follower" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('users','name')}}
                            </select>
                            <small id="follower-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-7">
                            <select name="status" id="status" class="form-control kt-select2-2">
                                <option value="0">Pending</option>
                                <option value="1">In Proccess</option>
                                <option value="2">Solved</option>
                            </select>
                            <small id="status-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Priority</label>
                        <div class="col-lg-7">
                            <select name="priority" id="priority" class="form-control kt-select2-2">
                                <option value="0">Low</option>
                                <option value="1">Medium</option>
                                <option value="2">High</option>
                            </select>
                            <small id="priority-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Details <span class="text-danger">*</span></label>
                        <div class="col-lg-7">
                            <textarea name="complain_details" class=" form-control" cols="30" rows="3" placeholder="Enter complain details">{{$complain->complain_details}}</textarea>
                            <!-- <div class="summernote" id="kt_summernote_1"></div> -->
                            <small id="complain_details-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <div class="col-md-10 col-sm-12">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-brand btn-sm float-right">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    $(document).ready(function(e) {


        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('.datepicker').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });

        let module_id = "{{$complain->module_id}}";
        let complain_of = "{{$complain->complain_of}}";
        let complain_group = "{{$complain->complain_group}}";
        let complain_type = "{{$complain->complain_type_id}}";
        let type_condition = 'where module_id=' + module_id + ' and parent_id=' + complain_group;
        let group_condition = 'where module_id=' + module_id + ' and parent_id=0';

        $("#reporter").val("{{$complain->reporter}}").trigger("change");
        $("#follower").val("{{$complain->follower}}").trigger("change");
        $("#status").val("{{$complain->status}}").trigger("change");
        $("#priority").val("{{$complain->priority}}").trigger("change");

        getComplainOf(module_id, complain_of);
        getComplainType(type_condition, complain_type);
        getComplainGroup(group_condition, complain_group);

    });


    $("#complain_sector").change(function() {

        let value = $("#complain_sector").val();

        if (value > 0) {
            getComplainOf(value);
            getComplainGroup('where module_id=' + value + ' and parent_id=0');
        }

    });

    $("#complain_group").change(function() {

        if (this.value > 0) {
            let condition = 'where parent_id=' + this.value;
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ url('dashboard/commonFunction')}}",
                data: {
                    table: 'complain_types',
                    column: 'name',
                    condition: condition,
                    selected: null,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(response) {
                    $("#complain_type").html(response);
                },
                error: function(reject) {
                    console.log(reject);
                }
            });
        }

    });

    $('#saveComplainForm').submit(function(event) {

        event.preventDefault();
        var id = "{{$complain->id}}";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveComplain')}}/" + id,
            // data: $('#saveComplainForm').serialize(),
            data: $("#saveComplainForm").serialize(),
            success: function(response) {
                successMsg('Complain updated successfully.');
                window.location.href = "{{url('dashboard/complain_details')}}/" + id;
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

    function getComplainOf(value, selected = null) {

        let table;
        let column;
        let condition = null;

        $(".complain_to_label").html($("#complain_sector option:selected").text() +
            ' <span class="text-danger">*</span>');

        if (value == 1) {
            table = 'customers';
            column = 'customer_name';
        } else if (value == 2) {
            table = 'vendors';
            column = 'vendor_name';
        } else if (value == 3) {
            table = 'vehicles';
            column = 'vehicle_no';
        } else if (value == 4) {
            table = 'documents';
            column = 'doc_name';
        } else if (value == 10) {
            table = 'vehicle_staff';
            column = 'staff_name';
        } else if (value == 11) {
            table = 'users';
            column = 'name';
        }

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: table,
                column: column,
                condition: condition,
                selected: selected,
                _token: '{!! csrf_token() !!}',
            },
            success: function(response) {
                $("#complain_of").html(response);
            },
            error: function(reject) {
                console.log(reject);
            }
        });
    }

    function getComplainGroup(condition = null, selected = null) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: 'complain_types',
                column: 'name',
                condition: condition,
                selected: selected,
                _token: '{!! csrf_token() !!}',
            },
            success: function(response) {
                $("#complain_group").html(response);
            },
            error: function(reject) {
                console.log(reject);
            }
        });
    }

    function getComplainType(condition = null, selected = null) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: 'complain_types',
                column: 'name',
                condition: condition,
                selected: selected,
                _token: '{!! csrf_token() !!}',
            },
            success: function(response) {
                $("#complain_type").html(response);
            },
            error: function(reject) {
                console.log(reject);
            }
        });
    }


    $('#complainEdit').click(function(e) {
        $('.complain-view').addClass('d-none');
        $('.complain-edit').removeClass('d-none');
    });

    $('#closeEdit').click(function(e) {
        e.preventDefault();

        $('.complain-view').removeClass('d-none');
        $('.complain-edit').addClass('d-none');

    });
</script>