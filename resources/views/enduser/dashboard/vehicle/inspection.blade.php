<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Inspection
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover table-checkable" id="inspection_table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Item Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="InspectionCheckModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div id="load_modal_content"></div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#vehicle_no_display').text($('#show_vehicle_no').text());

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        // $('.datePicker1').datepicker({
        //     todayBtn: "linked",
        //     clearBtn: true,
        //     todayHighlight: true,
        //     autoclose: true,
        //     format: 'yyyy-mm-dd'
        // }).on('changeDate', function() {
        //     $('#end_date').focus();
        //     console.log('closed');

        // });
        // $('.datePicker2').datepicker({
        //     todayBtn: "linked",
        //     clearBtn: true,
        //     todayHighlight: true,
        //     autoclose: true,
        //     format: 'yyyy-mm-dd'
        // });

        $('.datepicker').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });



        $('.custom-button-class').removeClass('btn-secondary ');
    });

    $(function() {

        var table = $('#inspection_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "{{ url('dashboard/vehicle_wise_datatable/inspection/'.$vehicle_id) }}",
                data: function(d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'inspection_date',
                    name: 'inspection_date',
                    className: 'text-center'
                },
                {
                    data: 'inspection_name',
                    name: 'inspection_name',
                },
                {
                    data: 'description',
                    name: 'description'
                },

                {
                    data: 'item_details',
                    name: 'item_details'
                },
                {
                    data: 'status',
                    name: 'Status',
                    className: 'text-center',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
            ],

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
            ],
        });
        table.buttons().container().appendTo('#inspection_table_length');

    });

    $("#all_insp_done").click(function() {
        $("input[class='selected_item_detail']").attr("checked", this.checked);
    });

    function check_inspection(id) {

        $.ajax({
            type: "html",
            url: "{{ url('dashboard/vehicle_insp_check') }}",
            type: "POST",
            data: {
                inspection_id: id,
                vehicle_id: '{{$vehicle_id}}',
                _token: '{!! csrf_token() !!}',
            },
            success: function(data) {
                $('#load_modal_content').html(data);
                $('#InspectionCheckModal').modal('show');

            },
            error: function(data) {
                console.log('Error:', data);
            }
        });

    }


    $('.back_to_data_list').click(function(e) {
        e.preventDefault();
        $(".vehicle_data_list").css('display', 'block');
        $('.vehicle_detail').css('display', 'none');

    });
</script>