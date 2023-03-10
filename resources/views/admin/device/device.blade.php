
@extends('layouts.admin.master')

@section('content')

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Server </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Device Model </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card custom-card"  style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total Model</h5>
                                <h5 class="card-title text-center" id="total_d">0</h5>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Device Model List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#deviceModal" data-toggle='modal' class="add_device btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add Device
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="device_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Server Name</th>
                            <th>Server Address</th>
                            <th>Status</th>
                            <th width="70px">Actions</th>
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
<div class="modal fade" id="deviceModal" data-backdrop="static" data-keyboard="false">
  <div id="dialog" class="modal-dialog">
    <div class="modal-content">
      <div id="load_modal_content">
          <!-- Dynamic Content -->
      </div>
    </div>
  </div>
</div>


<script>
    $(function () {

        var table= $('#device_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('device.index') }}",
                data: function (d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'server_name', name: 'server_name'},
                {data: 'server_address', name: 'server_address'},
                {data: 'status', name: 'status', className: 'text-center'},
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
        table.buttons().container().appendTo('#device_table_length');

    });

    $(function () {

        $('.add_device').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('device.create')}}",
                type: "GET",
                success: function (data) {
                    $('#load_modal_content').html(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

    function view_data(id){
        $.ajax({
            url: "{{url('device')}}/"+id,
            type: "GET",

            success: function (data) {
                $('#load_modal_content').html(data);
            },
            error: function (data) {
                warningMsg();
                console.log('Error:', data);
            }
        });
    }

    function edit_data(id){
        $.ajax({
            url: "{{url('device')}}/"+id+"/edit",
            type: "GET",

            success: function (data) {
                $('#load_modal_content').html(data);
            },
            error: function (data) {
                console.log('Error:', data);
                if( data.status === 500) {
                    warningMsg('Data ID not exist!');
                }
            }
        });
    }

    $(document).on('click', '.delete_data', function (e) {
        e.preventDefault();
        var el = this;
        var id = $(this).data('id');
        // Confirm box
        bootbox.confirm({
            title: "Delete Confirmation",
            message: "Do you really want to delete this device?",
            callback: function(result) {
                if(result){
                    // AJAX Request
                    $.ajax({
                        url: "{{url('device')}}/"+id,
                        type: "DELETE",
                        data: { id:id,
                            _token :'{!! csrf_token() !!}' },
                        success: function(response){
                            // Removing row from HTML Table
                            if(response){
                                $(el).closest('tr').css('background','#FC1361');
                                $(el).closest('tr').fadeOut(800,function(){
                                $(this).remove();
                                successMsg('Device deleted successfully.');
                                $('#device_table').DataTable().ajax.reload(null, false);
                                });
                            }else{
                                errorMsg();
                            }
                        }
                    });
                }
            }
        });
    });

</script>
@endsection