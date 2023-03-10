<div class="modal-header bg-info">
    <h5 class="modal-title">Enter Package Type</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="savePackageTypeForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <input type="hidden" id="id_index_no" value="{{$idIndex}}">
        <input type="hidden" name="module_id" value="5">
        <input type="hidden" name="type" value="13">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                <small id="name-error" class="text-danger"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Description</label>
            <div class="col-lg-9">
                <textarea class="form-control" name="description" id="description" rows="2" placeholder="Enter description"></textarea>
                <small id="description-error" class="text-danger"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Other Value</label>
            <div class="col-lg-9">
                <textarea class="form-control" name="others_value" id="others_value" rows="2" placeholder="Enter other value"></textarea>
                <small id="others_value-error" class="text-danger"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Status</label>
            <div class="col-lg-9">
                <select name="status" id="status" class="form-control kt-select2-2">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <small id="status-error" class="text-danger"></small>
            </div>
        </div>

    </div>

    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
    </div>

</form>

<script>
    $(document).ready(function() {
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('.datepicker').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });

    });

    $('#savePackageTypeForm').submit(function(event) {

        event.preventDefault();
        let id = 0;
        let idIndex = $("#id_index_no").val().split("_");

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveMasterSettingData')}}/" + id,
            data: $('#savePackageTypeForm').serialize(),
            success: function(response) {
                successMsg('Package type added successfully.');
                if (idIndex.length == 1) {
                    fetchOptionList('#trip_package_type_' + idIndex[0], 'master_settings', 'name', 'where type=13', response.id);
                } else {
                    fetchOptionList('#down_trip_package_type_' + idIndex[0], 'master_settings', 'name', 'where type=13', response.id);
                }
                $('#CommonModal').modal('hide');
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
</script>