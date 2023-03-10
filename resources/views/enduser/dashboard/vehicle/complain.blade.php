<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Complain List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:;" class=" add_complain btn btn-brand btn-sm btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Complain Token</th>
                        <th>Complain Type</th>
                        <th>Complain Details</th>
                        <th>Created Date</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Solved Date</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="complainModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Generate complain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveComplainForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Generate Date</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" id="generate_date" class="form-control" readonly />
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="la la-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <input type="hidden" name="complain_sector" value="3">
                        <input type="hidden" id="complain_id" value="0">
                        <input type="hidden" name="complain_of" value="{{$vehicle_id}}">

                        <label for="name" class="col-lg-3 col-form-label">Vehicle</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="vehicle_no_display" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Group</label>
                        <div class="col-lg-9">
                            <select name="complain_group" id="complain_group" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('complain_types','name', 'module_id=3 and parent_id=0')}}
                            </select>
                            <small id="complain_group-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Complain Type</label>
                        <div class="col-lg-9">
                            <select name="complain_type" id="complain_type" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('complain_types','name', 'module_id=3 and parent_id>0')}}
                            </select>
                            <small id="complain_type-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Reporter</label>
                        <div class="col-lg-9">
                            <select class="form-control kt-select2-2" name="reporter" id="reporte">
                                {{generate_simple_dropdown('users','name')}}

                            </select>
                            <small id="reporter-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Follower</label>
                        <div class="col-lg-9">
                            <select class="form-control kt-select2-2" name="follower" id="follower">
                                {{generate_simple_dropdown('users','name')}}

                            </select>
                            <small id="follower-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                            <select name="status" id="status" class="form-control kt-select2-2">
                                <option value="0">Pending</option>
                                <option value="1">In Proccess</option>
                                <option value="2">Solved</option>
                            </select>
                            <small id="status-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Priority</label>
                        <div class="col-lg-9">
                            <select name="priority" id="priority" class="form-control kt-select2-2">
                                <option value="0">Low</option>
                                <option value="1" selected>Medium</option>
                                <option value="2">High</option>
                            </select>
                            <small id="priority-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="father_name" class="col-lg-3 col-form-label">Problem Details</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="complain_details" id="complain_details" rows="3"></textarea>
                            <small id="complain_details-error" class="text-danger"></small>
                        </div>
                    </div>

                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

                    <button type="button" id="submitComplainForm" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $('#vehicle_no_display').val($('#show_vehicle_no').text());
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

    });

    $(function() {
        // var id = 0;
        var table = $('#complain_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{url('dashboard/vehicle_wise_datatable/complain/'.$vehicle_id)}}",
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
                    data: 'complain_token',
                    name: 'complain_token',
                    className: 'text-center'
                },
                {
                    data: 'ct_name',
                    name: 'ct_name'
                },
                {
                    data: 'complain_details',
                    name: 'complain_details'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'priority',
                    name: 'priority',
                    className: 'text-center'
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center'
                },
                {
                    data: 'solved_date',
                    name: 'solved_date',
                    className: 'text-center'
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
            ]
        });
        table.buttons().container().appendTo('#complain_table_length');

    });



    $(".add_complain").click(function() {
        var current = moment().format("DD MMM YYYY, hh:mm a");
        $('#generate_date').val(current);
        $('#complainModal').modal('show');

    });

    $("#complain_group").change(function() {

        if (this.value > 0) {
            let condition = 'where parent_id=' + this.value;
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ url('dashboard/commonFunction')}}",
                data: {
                    table: 'complain_types',
                    column: 'name',
                    condition: condition,
                    selected: null,
                    _token: '{!! csrf_token() !!}',
                },
                success: function(response) {
                    $("#complain_type").html(response);
                },
                error: function(reject) {
                    console.log(reject);
                }
            });
        }

    });

    $("#submitComplainForm").click(function(event) {

        event.preventDefault();

        var id = $("#complain_id").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveComplain') }}/" + id,
            data: $('#saveComplainForm').serialize(),
            success: function(response) {
                successMsg('Complain generated successfully.');
                $('#complainModal').modal('hide');
                $('#complain_table').DataTable().ajax.reload();
                $('#saveComplainForm')[0].reset();

            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    $('.back_to_data_list').click(function(e) {
        e.preventDefault();
        $(".vehicle_data_list").css('display', 'block');
        $('.vehicle_detail').css('display', 'none');

    });
</script>