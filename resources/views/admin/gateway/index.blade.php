
@extends('layouts.admin.master')

@section('content')
    
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <div class="kt-subheader__breadcrumbs">
                    <a href="" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Gateway </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Gateway List </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Gateway List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            
                            <a href="#gatewayModal" data-toggle='modal' class="add_gateway btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add Gateway
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="gateway_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>API Endpoint</th>
                            <th>Username</th>
                            <th>Password</th>
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
<div class="modal fade" id="gatewayModal" data-backdrop="static" data-keyboard="false">
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

        var table= $('#gateway_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('gateway.index') }}",
                data: function (d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'api_endpoint', name: 'api_endpoint'},
                {data: 'username', name: 'username'},
                {data: 'password', name: 'password'},
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
        table.buttons().container().appendTo('#gateway_table_length');

    });

    $(function () {

        $('.add_gateway').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('gateway.create')}}",
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
            url: "{{url('gateway')}}/"+id,
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
            url: "{{url('gateway')}}/"+id+"/edit",
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
        /* e.preventDefault();
        var el = this;
        var id = $(this).data('id');
        // Confirm box
        bootbox.confirm({
            title: "Delete Confirmation",
            message: "Do you really want to delete this gateway?", 
            callback: function(result) {       
                if(result){
                    // AJAX Request
                    $.ajax({
                        url: "{{url('gateway')}}/"+id,
                        type: "DELETE",
                        data: { id:id,
                            _token :'{!! csrf_token() !!}' },
                        success: function(response){
                            // Removing row from HTML Table
                            if(response){
                                $(el).closest('tr').css('background','#FC1361');
                                $(el).closest('tr').fadeOut(800,function(){
                                $(this).remove();
                                successMsg('Gateway deleted successfully.');
                                $('#gateway_table').DataTable().ajax.reload(null, false);
                                });
                            }else{
                                errorMsg();
                            }
                        }
                    });
                }
            }
        }); */
    });

</script>
@endsection