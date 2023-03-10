
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
                    <a href="" class="kt-subheader__breadcrumbs-link">Users</a>
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                   
                    <h3 class="kt-portlet__head-title">
                        User List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                          
                            <a href="javascript:;" class=" add_user btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="user_table">
                    <thead>
                        <tr>
                            <th width="25px">SL</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Group</th>
                            <th>Depertment</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Created</th>
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
<div class="modal fade" id="userModal" data-backdrop="static" data-keyboard="false">
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

        var table= $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('dashboard/user') }}",
                data: function (d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'group_name', name: 'Group'},
                {data: 'depertment_name', name: 'depertment_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone', className: 'text-center'},
                {data: 'user_status', name: 'user_status', className: 'text-center'},
                {data: 'created_at', name: 'created_at', className: 'text-center'},
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

    $(function () {

        $('.add_user').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{url('dashboard/user/create')}}",
                type: "GET",
                success: function (data) {    
                    $('#load_modal_content').html(data);
                    $('#userModal').modal('show');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

    function view_data(id){
        $.ajax({
            url: "{{url('dashboard/user')}}/"+id,
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
            url: "{{url('dashboard/user')}}/"+id+"/edit",
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

    function reset_password(id){
        $("#load_modal_content").load("{{ url('user_reset_password') }}/"+id);
    }


</script>

@endsection
