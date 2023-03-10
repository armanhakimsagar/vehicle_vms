@php if($command_id>0){ @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Update Command </h4>
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
                    <form class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body text-dark" style="height: calc(100vh - 210px); overflow: auto;">
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
                                                @php foreach($model_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$command_details->model_id) { echo 'selected="selected"'; } @endphp >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Name</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="command_id" id="command_id">
                                                @php foreach($command_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$command_details->command_id) { echo 'selected="selected"'; } @endphp >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Text</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="command_text" id="command_text" value="{{$command_details->command_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Type</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="command_type" id="command_type" value="{{$command_details->command_type}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Note</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="note" id="note" >{{$command_details->note}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="status" id="status">
                                                @php
                                                $st = [1=>'Active',0=>'Inactive'];
                                                foreach($st as $k => $v){ @endphp
                                                <option value="@php echo $k; @endphp" @php if($command_details->status==$k) { echo 'selected="selected"'; } @endphp >@php echo $v; @endphp</option>
                                                @php } @endphp
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
    <button type="button" id="move_device_save" onClick="save_data({{$command_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } else { @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Add Command </h4>
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
                <form class="kt-form kt-form--label-right">
                        <div class="kt-portlet__body text-dark" style="height: calc(100vh - 210px); overflow: auto;">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row" style="margin-bottom:10px;">
                                        <label class="col-lg-5"></label>
                                        <h6 class="col-lg-5 text-info">Command</h6>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Model</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="model_id" id="model_id">
                                                @php foreach($model_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Name</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="command_id" id="command_id">
                                                @php foreach($command_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Text</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="command_text" id="command_text" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Command Type</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="command_type" id="command_type" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Note</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" name="note" id="note" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="status" id="status">
                                                @php
                                                $st = [1=>'Active',0=>'Inactive'];
                                                foreach($st as $k => $v){ @endphp
                                                <option value="@php echo $k; @endphp" >@php echo $v; @endphp</option>
                                                @php } @endphp
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
    <button type="button" id="move_device_save" onClick="save_data({{$command_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } @endphp
<script>
    $(document).ready(function(e) {

        $('.kt-select2-2').select2({
            //placeholder: "Select"
        });
    });
</script>