
    <!-- begin:: Content -->
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Complain List
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                <thead>
                    <tr>
                    <th>SL</th>
                    <th>Date & Time</th>
                    <th>Complain</th>
                    <th>Status</th>
                    <th>Action </th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>

    <!-- end:: Content -->


    <script>

        $(function() {
            // var id = 0;
            var table = $('#complain_table').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: {
                //     type: "GET",
                //     url: "{{url('admin/imei/getData')}}/" + id,
                //     data: function(d) {
                //         d._token = '{!! csrf_token() !!}';
                //     }
                // },
                // columns: [{
                //         data: 'DT_RowIndex',
                //         name: 'DT_RowIndex',
                //         className: 'text-center'
                //     },
                //     {
                //         data: 'unit_id',
                //         name: 'unit_id'
                //     },
                //     {
                //         data: 'device_name',
                //         name: 'device_name'
                //     },
                //     {
                //         data: 'imei',
                //         name: 'imei'
                //     },
                //     {
                //         data: 'server_name',
                //         name: 'server_name',
                //         className: 'text-center'
                //     },
                //     {
                //         data: 'model_name',
                //         name: 'model_name'
                //     },
                //     {
                //         data: 'sim_number',
                //         name: 'sim_number'
                //     },
                //     {
                //         data: 'customer_name',
                //         name: 'customer_name'
                //     },
                //     {
                //         data: 'crm_exist',
                //         name: 'crm_exist'
                //     },
                //     {
                //         data: 'status',
                //         name: 'status'
                //     },
                //     {
                //         data: 'action',
                //         name: 'action',
                //         className: 'text-center',
                //         orderable: false,
                //         searchable: false
                //     },
                // ],

                dom: 'Blfrtip',
                buttons: [{
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
            table.buttons().container().appendTo('#complain_table_length');

        });
    </script>