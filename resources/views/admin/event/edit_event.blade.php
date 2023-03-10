<!-- Modal Header -->
<div class="d-none">
    <div class="modal-header bg-info">
        <h4 class="modal-title" id="edit_device_title"> Update Command </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Modal body -->
    <div class="modal-body" style="min-height:65vh">
        @csrf
        <div class="kt-form kt-form--label-right">
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="kt-section__body text-dark">
                        <form class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body text-dark">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group row" style="margin-bottom:10px;">
                                            <label class="col-lg-5"></label>
                                            <h6 class="col-lg-5 text-info">Commands</h6>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Model</label>
                                            <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="model_id" id="model_id">
                                                    <option value="0">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Command Name</label>
                                            <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="command_id"
                                                    id="command_id">
                                                    <option value="0">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Command Text</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="command_text"
                                                    id="command_text" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Command Type</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="command_type"
                                                    id="command_type" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Note</label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="note" id="note"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-6 col-form-label">Status</label>
                                            <div class="col-lg-6">
                                                <select class="form-control kt-select2-2" name="status" id="status">
                                                    <option value="0">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group row" style="margin-bottom:10px;">
                                            <label class="col-lg-6"></label>
                                            <h6 class="col-lg-5 text-info">Calibration</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group row" style="margin-bottom:10px;">
                                            <label class="col-lg-6"></label>
                                            <h6 class="col-lg-5 text-info">Dictionary</h6>
                                        </div>
                                    </div>
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
        <button type="button" id="move_device_save" onClick="save_data()"
            class="btn btn-success btn-sm float-right">Save</button>
    </div>
</div>
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Add Event </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Modal body -->
<div class="modal-body" style="min-height:65vh">
    @csrf
    <div class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="kt-section__body text-dark">
                    <form class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body text-dark">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row" style="margin-bottom:10px;">
                                        <label class="col-lg-5"></label>
                                        <h6 class="col-lg-5 text-info">Event</h6>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Event Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="status" id="status">
                                                <option value="0">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <div class=" row d-flex justify-content-center">
                                        <div class="">
                                            <h6 class="text-info">Parameters and sensors</h6>
                                        </div>
                                        <div class=" col-sm-12" style="padding-right: 35px;">
                                            <div class="row" style="min-height:280px;background:#eee;">
                                                <div class="col-sm-6">
                                                    <div class="row d-flex justify-content-center custom-heading-section">
                                                        <div>
                                                            <h6 class="custom-heading-6">Source</h6>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="row d-flex justify-content-center custom-heading-section">
                                                        <div>
                                                            <h6 class="custom-heading-6">Value</h6>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group row custom-form-control-part">
                                                
                                                <div class="col-sm-4 custom-select-2">
                                                    <select class="form-control kt-select2-2">
                                                        <option value="0">Select</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 custom-select-2">
                                                    <select class="form-control kt-select2-2">
                                                        <option value="0">0</option>
                                                        <option value="0">0</option>
                                                        <option value="0">0</option>
                                                        <option value="0">0</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 " style="padding-left: 12px;">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

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
    <button type="button" id="move_device_save" onClick="save_data()"
        class="btn btn-success btn-sm float-right">Save</button>
</div>
<script>
$(document).ready(function(e) {

    $('.kt-select2-2').select2({
        //placeholder: "Select"
    });
});
</script>