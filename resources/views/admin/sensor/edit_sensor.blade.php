@php if($sensor_id>0){ @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Update Sensor </h4>
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
                        <div class="kt-portlet__body text-dark" style="height: calc(100vh - 210px); overflow-y: auto;  overflow-x: hidden;">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row" style="margin-bottom:10px;">
                                        <label class="col-lg-5"></label>
                                        <h6 class="col-lg-5 text-info">Sensor</h6>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Model</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="model_id" id="model_id">
                                                @php foreach($model_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->model_id) { echo 'selected="selected"'; } @endphp >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Server</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="server_id" id="server_id">
                                                @php foreach($server_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->server_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Name</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_name_id" id="sensor_name_id">
                                                @php foreach($sensor_name_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->sensor_name_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_type_id" id="sensor_type_id">
                                                @php foreach($sensor_type_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->sensor_type_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Parameter</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_parameter_id" id="sensor_parameter_id">
                                                @php foreach($sensor_parameter_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->sensor_parameter_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Default</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_default_id" id="sensor_default_id">
                                            @php foreach($sensor_default_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->sensor_default_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Result Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="result_type_id" id="result_type_id">
                                                @php foreach($sensor_result_type_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" @php if($m->id==$sensor_details->result_type_id) { echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Data List</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="is_data_list" id="is_data_list" class="form-control" @php if($sensor_details->is_data_list==1) { echo 'checked'; } @endphp >
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Popup</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="is_popup" id="is_popup" class="form-control" @php if($sensor_details->is_popup==1) { echo 'checked'; } @endphp>
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Fuel Level High</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="high_level_value"  id="high_level_value" class="form-control" @php if($sensor_details->high_level_value==1) { echo 'checked'; } @endphp>
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Units of measurement</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="unit_of_measurement" id="unit_of_measurement" value="{{$sensor_details->unit_of_measurement}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">If sensor "1" (text)</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="sensor_1_text" id="sensor_1_text" value="{{$sensor_details->sensor_1_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">If sensor "0" (text)</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="sensor_0_text" id="sensor_0_text" value="{{$sensor_details->sensor_0_text}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Formula</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="formula" id="formula" value="{{$sensor_details->formula}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Lowest Value</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="lowest_value" id="lowest_value" value="{{$sensor_details->lowest_value}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Highest Value</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="highest_value" id="highest_value" value="{{$sensor_details->highest_value}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Ignore if ignition is off</label>
                                        <div class="col-lg-6">
                                        <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="ignore_ignition" id="ignore_ignition" class="form-control" @php if($sensor_details->ignore_ignition==1) { echo 'checked'; } @endphp>
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="status" id="status">
                                                @php
                                                $st = [1=>'Active',0=>'Inactive'];
                                                foreach($st as $k => $v){ @endphp
                                                <option value="@php echo $k; @endphp" @php if($sensor_details->status==$k) { echo 'selected="selected"'; } @endphp >@php echo $v; @endphp</option>
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
    <button type="button" id="move_device_save" onClick="save_data({{$sensor_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } else { @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Add Sensor </h4>
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
                        <div class="kt-portlet__body text-dark" style="height: calc(100vh - 210px); overflow-y: auto;  overflow-x: hidden;">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row" style="margin-bottom:10px;">
                                        <label class="col-lg-5"></label>
                                        <h6 class="col-lg-5 text-info">Sensor</h6>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Model</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="model_id" id="model_id">
                                                <option value="0">Select Model</option>
                                                @php foreach($model_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Server</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="server_id" id="server_id">
                                            <option value="0">Select Server</option>
                                                @php foreach($server_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Name</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_name_id" id="sensor_name_id">
                                            <option value="0">Select Sensor Name</option>
                                                @php foreach($sensor_name_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_type_id" id="sensor_type_id">
                                            <option value="0">Select Sensor Type</option>
                                                @php foreach($sensor_type_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Parameter</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_parameter_id" id="sensor_parameter_id">
                                            <option value="0">Select Parameter</option>
                                                @php foreach($sensor_parameter_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Sensor Default</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="sensor_default_id" id="sensor_default_id">
                                            <option value="0">Select Default Type</option>
                                            @php foreach($sensor_default_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Result Type</label>
                                        <div class="col-lg-6">
                                            <select class="form-control kt-select2-2" name="result_type_id" id="result_type_id">
                                            <option value="0">Select Result Type</option>
                                                @php foreach($sensor_result_type_list as $m){ @endphp
                                                <option value="@php echo $m->id; @endphp" >@php echo $m->name; @endphp</option>
                                                @php } @endphp
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Data List</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="is_data_list" id="is_data_list" class="form-control" >
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Popup</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="is_popup" id="is_popup" class="form-control">
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Fuel Level High</label>
                                        <div class="col-lg-6">
                                            <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="high_level_value"  id="high_level_value" class="form-control" >
                                                    <span class=""></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Units of measurement</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="unit_of_measurement" id="unit_of_measurement" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">If sensor "1" (text)</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="sensor_1_text" id="sensor_1_text" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">If sensor "0" (text)</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="sensor_0_text" id="sensor_0_text" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Formula</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="formula" id="formula" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Lowest Value</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="lowest_value" id="lowest_value" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Highest Value</label>
                                        <div class="col-lg-6">
                                        <input type="text" class="form-control" name="highest_value" id="highest_value" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Ignore if ignition is off</label>
                                        <div class="col-lg-6">
                                        <div class="kt-checkbox-list">
                                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                    <input type="checkbox" name="ignore_ignition" id="ignore_ignition" class="form-control" >
                                                    <span class=""></span>
                                                </label>
                                            </div>
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
    <button type="button" id="move_device_save" onClick="save_data({{$sensor_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } @endphp
<script>
    $(document).ready(function(e) {

        $('.kt-select2-2').select2({
            //placeholder: "Select"
        });
    });
</script>