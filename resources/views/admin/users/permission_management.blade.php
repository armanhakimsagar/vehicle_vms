@extends('layouts.admin.master')
@section('content')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left"
                    id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Permission Management </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        @csrf
        <!--Begin::Row-->
        <div class="row">
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-form kt-form--label-right" id="filterForm">
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2 col-sm-12">Choose Role/Group </label>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <select class="form-control kt-select2-2" id="group_id" name="group_id">
                                        <option value="0">Select</option>
                                        @foreach($all_groups as $g)
                                        <option value="{{$g->id}}">{{$g->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12">
                                    <input type="submit" value="Show Group Permission" id="searchPermission"
                                        class=" btn btn-success btn-sm">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>

        <!--End::Row-->

        <div class="row " >
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <div id="load_content">

                </div>
            </div>
        </div>

    </div>

    <!-- end:: Content -->

</div>


<script>
$(document).ready(function() {
    $('#searchPermission').attr('disabled', true);
    /*  var id = $('#group_id').val();
        $("#load_content").html("<center><img src='{{asset('public/asset/media/logos/crm-logo.png')}}></center>").load("{{ url('get_permission') }}/"+id);
 */
});
$(document).on('change', '#group_id', function() {
    if (this.value > 0) {
        $('#searchPermission').attr('disabled', false);
    } else {
        $('#searchPermission').attr('disabled', true);
    }
});

$(document).on('click', '#searchPermission', function(e) {
    e.preventDefault();
    var id = $('#group_id').val();
    $("#load_content").html("<center><img src='{{asset('public/asset/media/logos/crm-logo.png')}}></center>")
        .load("{{ url('get_permission') }}/" + id);
});
</script>

@endsection