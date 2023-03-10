@php if($master_id>0){ @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Update Master Settings </h4>
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
                    <form action="" id="master_settings_form">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Master Type</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_type" id="master_type">
                                    @php foreach($master_type_list as $m){ @endphp
                                    <option value="@php echo $m->id; @endphp" @php if($m->id==$master_details->type){echo 'selected="selected"'; } @endphp>@php echo $m->name; @endphp</option>
                                    @php } @endphp
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Display Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_name" id="master_name" value="{{$master_details->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_full_name" id="master_full_name" value="{{$master_details->full_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9" style="text-align: left;">
                                <textarea class="form-control" id="master_description" name="master_description" rows="3"> {{$master_details->description}} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Others Value</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_others_value" id="master_others_value" value="{{$master_details->others_value}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_status" id="master_status">
                                    @php $status = array(1=>'Active',0=>'Inactive');
                                    foreach($status as $k => $v){
                                    @endphp
                                    <option value="@php echo $k; @endphp" @php if($k==$master_details->status){echo 'selected="selected"'; } @endphp>@php echo $v; @endphp</option>
                                    @php } @endphp
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
    <button type="button" id="move_device_save" onClick="save_data({{$master_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php }  else { @endphp
<!-- Modal Header -->
<div class="modal-header bg-info">
    <h4 class="modal-title" id="edit_device_title"> Add Master Settings </h4>
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
                    <form action="" id="master_settings_form">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Master Type</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_type" id="master_type">
                                    @php foreach($master_type_list as $m){ @endphp
                                    <option value="@php echo $m->id; @endphp">@php echo $m->name; @endphp</option>
                                    @php } @endphp
                                </select>
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
                                <input type="text" class="form-control" name="master_full_name" id="master_full_name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9" style="text-align: left;">
                                <textarea class="form-control" id="master_description" name="master_description" rows="3">  </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Others Value</label>
                            <div class="col-sm-9 ">
                                <input type="text" class="form-control" name="master_others_value" id="master_others_value" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9 ">
                                <select class="form-control kt-select2-2" name="master_status" id="master_status">
                                    @php $status = array(1=>'Active',0=>'Inactive');
                                    foreach($status as $k => $v){
                                    @endphp
                                    <option value="@php echo $k; @endphp" >@php echo $v; @endphp</option>
                                    @php } @endphp
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
    <button type="button" id="move_device_save" onClick="save_data({{$master_id}})" class="btn btn-success btn-sm float-right">Save</button>
</div>
@php } @endphp
<script>
    $(document).ready(function(e) {

        $('.kt-select2-2').select2({
            //placeholder: "Select"
        });
    });
</script>