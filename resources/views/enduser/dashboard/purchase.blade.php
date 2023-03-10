@extends('layouts.enduser.dashboard.master')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor " id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <a href="" class="kt-subheader__breadcrumbs-link">Purchase</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid driver_data_list">

        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">

                    <h3 class="kt-portlet__head-title">
                        Purchase list
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <a href="#MainTypeModal" class="btn btn-success btn-sm" data-toggle="modal"><i class="la la-plus mr-2"></i>Add</a>

                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="main_type_list_table">
                    <thead>
                        <tr>
                            <th width="30px">SL</th>
                            <th>Name</th>
                            <th width="40px">Action</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>

<!-- Modal -->
<div class="modal" id="MainTypeModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Add Maintenance Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveMainTypeForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="driver_name" class="col-lg-3 col-form-label"> Name</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="name" name="name">
                            <small id="name-error" class="text-danger"></small>

                        </div>
                    </div>
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" id="submitMainType" class="btn btn-success btn-sm float-right">Save</button>
                    <!-- <button type="button" id="submitMainType" class="btn btn-success btn-sm float-right" value="Save"> -->
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.custom-button-class').removeClass('btn-secondary ');
    });
</script>
@endsection