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
                    <a href="" class="kt-subheader__breadcrumbs-link">Localization</a>
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
                        {{show_local_format('date_time_format', '2019-11-04 14:40:00')}}, {{show_local_format('currency', '5000')}}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form id="saveLocalization">
                    <div class="text-dark kt-form kt-form--label-right">
                        @csrf
                        @method('POST')
                        <!-- Form content start -->
                        <div class="form-body">

                            <div class="form-group row ">
                                <label class="col-form-label col-md-3">Default Language</label>
                                <div class="col-md-7">
                                    <select name="default_language" id="default_language"
                                        class="form-control kt-select2 ">
                                        <option value="English"
                                            {{($localization['default_language']=='English') ? 'selected':''}}>English
                                        </option>
                                        <option value="Bengali"
                                            {{($localization['default_language']=='Bengali') ? 'selected':''}}>Bengali
                                        </option>
                                        <option value="Dutch"
                                            {{($localization['default_language']=='Dutch') ? 'selected':''}}>Dutch
                                        </option>
                                        <option value="German"
                                            {{($localization['default_language']=='German') ? 'selected':''}}>German
                                        </option>
                                        <option value="Spanish"
                                            {{($localization['default_language']=='Spanish') ? 'selected':''}}>Spanish
                                        </option>
                                        <option value="French"
                                            {{($localization['default_language']=='French') ? 'selected':''}}>French
                                        </option>
                                        <option value="Arabic"
                                            {{($localization['default_language']=='Arabic') ? 'selected':''}}>Arabic
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Date Format</label>
                                <div class="col-md-7">
                                    <select name="date_format" class="form-control kt-select2 ">
                                        <option value="d M Y"
                                            {{($localization['date_format']=='d M Y') ? 'selected':''}}>25 Apr 2020
                                        </option>
                                        <option value="D, d M Y"
                                            {{($localization['date_format']=='D, d M Y') ? 'selected':''}}>Thu, 25 Apr
                                            2020</option>
                                        <option value="d/m/Y"
                                            {{($localization['date_format']=='d/m/Y') ? 'selected':''}}>25/04/2020
                                        </option>
                                        <option value="m-d-y"
                                            {{($localization['date_format']=='m-d-y') ? 'selected':''}}>04-25-20
                                        </option>
                                        <option value="m.d.y"
                                            {{($localization['date_format']=='m.d.y') ? 'selected':''}}>04.25.20
                                        </option>
                                        <option value="Y/m/d"
                                            {{($localization['date_format']=='Y/m/d') ? 'selected':''}}>2020/04/25
                                        </option>
                                        <option value="Y-m-d"
                                            {{($localization['date_format']=='Y-m-d') ? 'selected':''}}>2020-04-25
                                        </option>
                                        <option value="Y.m.d"
                                            {{($localization['date_format']=='Y.m.d') ? 'selected':''}}>2020.04.25
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Time Format</label>
                                <div class="col-md-7">
                                    <select name="time_format" class="form-control kt-select2 ">
                                        <option value="h:i a"
                                            {{($localization['time_format']=='h:i a') ? 'selected':''}}>01:30 pm
                                        </option>
                                        <option value="H:i" {{($localization['time_format']=='H:i') ? 'selected':''}}>
                                            13:30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Currency Format</label>
                                <div class="col-md-7">
                                    <select name="currency_format" class="form-control kt-select2 ">
                                        <option value="0" {{($localization['currency_format']=='0') ? 'selected':''}}>
                                            100</option>
                                        <option value="1" {{($localization['currency_format']=='1') ? 'selected':''}}>
                                            100.0</option>
                                        <option value="2" {{($localization['currency_format']=='2') ? 'selected':''}}>
                                            100.00</option>
                                        <option value="3" {{($localization['currency_format']=='3') ? 'selected':''}}>
                                            100.000</option>
                                        <option value="4" {{($localization['currency_format']=='4') ? 'selected':''}}>
                                            100.0000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Currency</label>
                                <div class="col-md-7">
                                    <!-- <input name="currency" placeholder="Currency" class="form-control" type="text"
                                        value=" {{$localization['currency']}}"> -->
                                        <select name="currency" id="currency" class="form-control kt-select2 ">
                                        
                                        @php dropdown_with_multi_option('currencies', 'code', 'country', $localization['currency'])
                                        @endphp
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Form content end -->
                    </div>
                    <div class="row">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-8">
                            <div class="form-button">
                                <button type="button" id="resetLocalization"
                                    class="btn btn-danger btn-sm">Reset</button>
                                <button type="submit" class="btn btn-success btn-sm float-right">Save Changes</button>
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

    $('.kt-select2-2').select2({
        placeholder: "Select"
    });
});

$('#resetLocalization').click(function() {
    $('#saveLocalization')[0].reset();
    $('.kt-select2').trigger('change');
});

$('#saveLocalization').submit(function(event) {

    event.preventDefault();
    var meta_key = 'localization';
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('dashboard/saveSettings')}}/" + meta_key,
        data: $('#saveLocalization').serialize(),
        success: function(response) {
            successMsg('Localization updated successfully.');
            window.location.href = "{{url('dashboard/setting/localization')}}";
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