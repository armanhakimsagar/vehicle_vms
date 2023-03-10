@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Complain Add</a>
                </div>
            </div>
        </div>
    </div>


    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add Complain
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveComplainForm">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Generated Date</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="generated_date" value="{{date('d M Y h:i', strtotime('+6 hour'))}}" disabled>
                                <small id="generated_date-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Complain Sector</label>
                            <div class="col-lg-7">
                                <select name="complain_sector" id="complain_sector" class="form-control kt-select2-2">
                                    <option value="">Select</option>
                                    @foreach ($modules as $m)
                                    @if ($m->assigned_id < 5 || $m->assigned_id > 9)
                                        <option value="{{$m->assigned_id }}">{{$m->name}}</option>
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
                                    <option value="1" selected>Medium</option>
                                    <option value="2">High</option>
                                </select>
                                <small id="priority-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Complain Details <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <textarea name="complain_details" class=" form-control" cols="30" rows="3" placeholder="Enter complain details"></textarea>
                                <small id="complain_details-error" class="text-danger"></small>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-8">
                            <div class="form-button">

                                <button type="button" id="reset" class="btn btn-danger btn-sm">Reset</button>

                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->


<script>
    $(document).ready(function() {

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
    });

    $("#complain_sector").change(function() {
        let table;
        let column;
        let condition = null;
        $(".complain_to_label").html($("#complain_sector option:selected").text() +
            ' <span class="text-danger">*</span>');
        if (this.value == 1) {
            table = 'customers';
            column = 'customer_name';
        } else if (this.value == 2) {
            table = 'vendors';
            column = 'vendor_name';
        } else if (this.value == 3) {
            table = 'vehicles';
            column = 'vehicle_no';
        } else if (this.value == 4) {
            table = 'documents';
            column = 'doc_name';
        } else if (this.value == 10) {
            table = 'vehicle_staff';
            column = 'staff_name';
        } else if (this.value == 11) {
            table = 'users';
            column = 'name';
        }

        if (this.value > 0) {
            getComplainGroup('where module_id=' + this.value + ' and parent_id=0');
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ url('dashboard/commonFunction')}}",
                data: {
                    table: table,
                    column: column,
                    condition: condition,
                    selected: null,
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
        var id = 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveComplain')}}/" + id,
            // data: $('#saveComplainForm').serialize(),
            data: $("#saveComplainForm").serialize(),
            success: function(response) {
                successMsg('Complain created successfully.');
                window.location.href = "{{url('dashboard/d/complain_add')}}";
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

    function getComplainGroup(condition) {
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
                $("#complain_group").html(response);
            },
            error: function(reject) {
                console.log(reject);
            }
        });
    }
</script>
@endsection