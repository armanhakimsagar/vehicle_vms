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
                    <a href="" class="kt-subheader__breadcrumbs-link">Sms Settings</a>
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
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                      Sms Settings
                    </h3>
                </div>
                @if($data->count()==0)
                <div class="kt-portlet__head-toolbar">
                    <a href="{{route('sms.settings.create')}}" id="addMasterSetting" class="btn btn-success btn-sm"><i class="la la-plus mr-2"></i>Add New</a>
                </div>
                @endif 
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="user_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Provider Name</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>


<!-- Modals -->
<div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false">
  <div id="dialog" class="modal-dialog">
    <div class="modal-content">
      <div id="load_modal_content">
        


      <div class="modal-header bg-info">
    <h5 class="modal-title">Send Sms</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="saveUserForm" method="post" action="{{ route('send_sms') }}">
    <div class="modal-body  text-dark">
        @csrf
        <!-- Form content start -->
        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Number </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="mobile" required>
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Body </label>
            <div class="col-lg-9">
                <textarea rows="5" cols="5" class="form-control" name="message" required></textarea>
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Send">
    </div>
</form>




      </div>
    </div>
  </div>
</div>

<script>

$(document).on('submit', 'form#saveUserForm', function(event) {

successMsg('Template created successfully.');
});

$(function () {      

var table= $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('sms_settings_index') }}",
        data: function (d) {
            d._token = '{!! csrf_token() !!}';
        }
    },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
        {data: 'provider_name', name: 'provider_name'},
        {data: 'status', name: 'status'},
        {data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false},
    ],
    
    dom: 'Blfrtip',
    buttons: [
        {
            extend: 'copy',
            text: '<i class="far fa-copy custom-icon"></i>',
            className: 'custom-button-class ml-3 mr-2',
            exportOptions: {
                columns: ':visible :not(:last-child)'
            }
        },
        {
            extend: 'csv',
            text: '<i class="flaticon2-paper custom-icon"></i>',
            className: 'custom-button-class mr-2',
            exportOptions: {
                columns: ':visible :not(:last-child)'
            }
        },
        {
            extend: 'excel',
            text: '<i class="far fa-file-excel custom-icon"></i>',
            className: 'custom-button-class mr-2',
            exportOptions: {
                columns: ':visible :not(:last-child)'
            }
        },
        {
            extend: 'pdf',
            text: '<i class="far fa-file-pdf custom-icon"></i>',
            className: 'custom-button-class mr-2',
            exportOptions: {
                columns: ':visible :not(:last-child)'
            }
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print custom-icon"></i>',
            className: 'custom-button-class mr-2',
            exportOptions: {
                columns: ':visible :not(:last-child)'
            }
        }
    ]
});
table.buttons().container().appendTo('#user_table_length');

});
    

</script>
@endsection