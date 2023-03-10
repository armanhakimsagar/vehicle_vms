<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Vehicle Staff
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#AssignStaffModal" data-toggle='modal' class=" add_complain btn btn-brand btn-sm btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Assign Staff
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="vehicle_staff_table">
                <thead>
                    <tr>
                    <tr>
                        <th>SL</th>
                        <th width="56px">Photo</th>
                        <th>Staff ID</th>
                        <th>Staff name</th>
                        <th>Staff type</th>
                        <th>Phone</th>
                    </tr>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="AssignStaffModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="modal_title">Assign Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="saveAssignStaffForm">
                <div class="modal-body  text-dark">
                    @csrf
                    @method('POST')
                    <!-- Form content start -->
                    <div class="form-group row">
                        <label for="name" class="col-lg-3 col-form-label">Vehicle No </label>
                        <div class="col-lg-9">
                            <input type="hidden" id="assign_to_vehicle_id" value="{{$vehicle_id}}">
                            <input type="text" id="vehicle_no_display" class="form-control" readonly>
                            <small id="vehicle_no-error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Choose Staff</label>
                        <div class="col-lg-9">
                            <select class="mt-multiselect btn btn-default mt-noicon" multiple="multiple" data-clickable-groups="true" data-collapse-groups="true" data-width="100%" id="selected_staff">
                                {{generate_staff_dropdown_by_type_group($vehicle_id)}}
                            </select>
                            <small id="choose_staff-error" class="text-danger"></small>
                        </div>
                    </div>
                    <!-- Form content end -->
                </div>
                <div class="form-button">
                    <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#vehicle_no_display').val($('#show_vehicle_no').text());

        $('.mt-multiselect').multiselect({
            enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            enableCaseInsensitiveFiltering: true
        });
    });

    $(function() {

        var table = $('#vehicle_staff_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('dashboard/vehicle_wise_datatable/vehicle_staff/'.$vehicle_id) }}",
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
                    data: 'staff_image',
                    name: 'staff_image',
                    className: 'text-center'
                },
                {
                    data: 'staff_id',
                    name: 'staff_id',
                },
                {
                    data: 'staff_name',
                    name: 'staff_name'
                },
                {
                    data: 'staff_type_name',
                    name: 'staff_type_name',
                    className: 'text-center'
                },
                {
                    data: 'phone',
                    name: 'phone',
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
        table.buttons().container().appendTo('#vehicle_staff_table_length');

    });

    $('#saveAssignStaffForm').submit(function(event) {

        event.preventDefault();
        var id = $('#assign_to_vehicle_id').val();
        $("[id$=-error]").text('');
        var selected_staff = $('#selected_staff').val().join(',');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/vehicle-assign-staff')}}/" + id,
            data: {
                id: id,
                choose_staff: selected_staff,
                _token: "{!! csrf_token() !!}"
            },
            success: function(response) {
                successMsg('Vehicle staff assigned successfully.');
                $('#AssignStaffModal').modal('hide');
                $('#vehicle_staff_table').DataTable().ajax.reload(null, false);
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