@php if($master_id>0){ @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Update Notification </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Modal body -->
<div class="modal-body">
    @csrf
    <div class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <form action="" id="notification_form">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Master Type</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" value="{{$master_type_list->name}}"
                                    disabled="disabled">
                                <input type="hidden" name="master_type" id="master_type"
                                    value="{{$master_type_list->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Display Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_name" id="master_name"
                                    value="{{$master_details->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_full_name" id="master_full_name"
                                    value="{{$master_details->full_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9" style="text-align: left;">
                                <textarea class="form-control" id="master_description" name="master_description"
                                    rows="3"> {{$master_details->description}} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Others Value</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_others_value"
                                    id="master_others_value" value="{{$master_details->others_value}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_status" id="master_status">
                                    <option value="1" {{($master_details->id==1)? 'selected': ''}}>Active</option>
                                    <option value="0" {{($master_details->id==0)? 'selected': ''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal footer -->
<div class="form-button">
    <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
    <button type="button" id="move_device_save" onClick="save_data({{$master_id}})"
        class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } else { @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Add Notification </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Modal body -->
<div class="modal-body">
    @csrf
    <div class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <form action="" id="notification_form">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Master Type</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" value="{{$master_type_list->name}}"
                                    disabled="disabled">
                                <input type="hidden" name="master_type" id="master_type"
                                    value="{{$master_type_list->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Display Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_name" id="master_name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_full_name" id="master_full_name"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9" style="text-align: left;">
                                <textarea class="form-control" id="master_description" name="master_description"
                                    rows="3">  </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Others Value</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_others_value"
                                    id="master_others_value" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_status" id="master_status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal footer -->
<div class="form-button">
    <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
    <button type="button" id="move_device_save" onClick="save_data({{$master_id}})"
        class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } @endphp
<script>
$(document).ready(function(e) {

    $('.kt-select2-2').select2({
        //placeholder: "Select"
    });
});
</script>