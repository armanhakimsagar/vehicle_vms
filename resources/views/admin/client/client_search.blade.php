@extends('layouts.admin.master')
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Single Client </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


        <!--Begin::Row-->
        <div class="row">
            <div class="col-sm-12 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Single client search</h5>
                        </div>
                    </div>

                    <div class="kt-form kt-form--label-right" id="filterForm">

                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2 col-sm-12">Choose client </label>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <select class="form-control kt-select2-2" id="clientName">
                                        <option value="0">Select</option>
                                        @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-12">
                                    <input type="submit" value="Show client details" id="searchClient" class=" btn btn-success btn-sm">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>
        </div>

        <!--End::Row-->

         <div class="row " id="load_content">

        </div>

    </div>

<!-- end:: Content -->

</div>


<script>
    $(document).ready(function(){
        $('#searchClient').attr('disabled', true);

    });
    $(document).on('change','#clientName',function(){
        if(this.value>0){
            $('#searchClient').attr('disabled', false);
        }else{
            $('#searchClient').attr('disabled', true);
        }
    });

    $(document).on('click', '#searchClient', function (e) {
        e.preventDefault();
        var id = $('#clientName').val();
        $("#load_content").html("<center><img src='{{asset('public/asset/media/logos/crm-logo.png')}}></center>").load("{{ url('single-client') }}/"+id);
    });
</script>

@endsection
