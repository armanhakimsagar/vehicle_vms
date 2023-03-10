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
                    <a href="" class="kt-subheader__breadcrumbs-link">Transfer</a>
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
                        Add Transfer
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveTransferForm">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-7">
                                <label class=" col-form-label"> From</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Type <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select id="from_type" name="from_type" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=0')
                                    @endphp
                                </select>
                                <small id="from_type-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Account <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select id="from_account" name="from_account" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=1')
                                    @endphp

                                </select>
                                <small id="from_account-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"></label>
                            <div class="col-lg-7">
                                <label class=" col-form-label"> To</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Type <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select id="to_type" name="to_type" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=0')
                                    @endphp

                                </select>
                                <small id="to_type-error" class="text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Account <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select id="to_account" name="to_account" class="form-control kt-select2-2">
                                    @php generate_simple_dropdown('chart_of_accounts', 'title', 'transactional=1')
                                    @endphp

                                </select>
                                <small id="to_account-error" class="text-danger"></small>
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Amount</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="amount" id="amount"
                                    placeholder="Enter amount">
                                <small id="amount-error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Date</label>
                            <div class="col-lg-7">
                                <div class="input-group">
                                    <input type="text" name="date" id="transfer_date" class="form-control datepicker"
                                        placeholder="Enter date" autocomplete="off" />
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="la la-calendar"></i></div>
                                    </div>
                                </div>
                                <small id="date-error" class="text-danger"></small>
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

    <!-- end:: Content -->
</div>

<script>
$(document).ready(function() {
    $('#vehicle_photo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.vehicle_photo_holder').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

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

$('#from_type').change(function(event) {
    event.preventDefault();
    var typeId = $('#from_type').val();
    var where = "parent_id=" + typeId + " and transactional=1";

    if (typeId > 0) {

        $.ajax({
            url: "{{url('customer/commonFunction/chart_of_accounts/title')}}/" + where,
            type: "GET",
            dataType: "html",
            success: function(data) {
                $('#from_account').html(data);
            },
            error: function(data) {
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                } else {
                    errorMsg();
                }
            }
        });
    }

});

$('#to_type').change(function(event) {
    event.preventDefault();
    var typeId = $('#to_type').val();
    var where = "parent_id=" + typeId + " and transactional=1";

    if (typeId > 0) {

        $.ajax({
            url: "{{url('customer/commonFunction/chart_of_accounts/title')}}/" + where,
            type: "GET",
            dataType: "html",
            success: function(data) {
                $('#to_account').html(data);
            },
            error: function(data) {
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                } else {
                    errorMsg();
                }
            }
        });
    }

});

$('#saveTransferForm').submit(function(event) {

    event.preventDefault();
    var id = 0;
    $("[id$=-error]").text('');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('customer/save_transfer_data')}}/" + id,
        data: $('#saveTransferForm').serialize(),
        success: function(response) {
            successMsg('Transfer successful.');
            window.location.href = "{{url('customer/accounts/transfer_add')}}";

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
</script>
@endsection