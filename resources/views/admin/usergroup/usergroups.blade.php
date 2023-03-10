
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
                        User Group </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        List </a>
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
                        User Group List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            
                            <a href="#serverModal" data-toggle='modal' class="add_server btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add Group
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="server_table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Group Name</th>
                            <th>Description</th>
                            <th>Total Users</th>
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
<div class="modal fade" id="serverModal" data-backdrop="static" data-keyboard="false">
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

        var table= $('#server_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('usergroup.index') }}",
                data: function (d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'total_users', name: 'Total Users', className: 'text-center'},
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
        table.buttons().container().appendTo('#server_table_length');

    });

    $(function () {

        $('.add_server').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{route('usergroup.create')}}",
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
            url: "{{url('usergroup')}}/"+id,
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
            url: "{{url('usergroup')}}/"+id+"/edit",
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
            message: "Do you really want to delete this server?", 
            callback: function(result) {       
                if(result){
                    // AJAX Request
                    $.ajax({
                        url: "{{url('usergroup')}}/"+id,
                        type: "DELETE",
                        data: { id:id,
                            _token :'{!! csrf_token() !!}' },
                        success: function(response){
                            // Removing row from HTML Table
                            if(response){
                                $(el).closest('tr').css('background','#FC1361');
                                $(el).closest('tr').fadeOut(800,function(){
                                $(this).remove();
                                successMsg('Server deleted successfully.');
                                $('#server_table').DataTable().ajax.reload(null, false);
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