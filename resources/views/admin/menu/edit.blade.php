<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Menu</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form method="post" id="serverEditForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('PATCH')
        <!-- Form content start -->
        <input type="hidden" class="form-control" value="{{$menulist->id}}" id="id">
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Module</label>
            <div class="col-lg-9">
                <select id="module_id" name="module_id" class="form-control kt-select2" style="width:100%;">
                    <option value="0">Select Module</option>
                    @php
                    foreach ($module_list as $m) {
                    @endphp
                    <option value="@php echo $m->assigned_id; @endphp" @php if($menulist->module_id==$m->assigned_id){echo 'selected="selected"';} @endphp>@php echo $m->name; @endphp</option>
                    @php } @endphp
                </select>
                <small id="description-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="menu_name" class="col-lg-3 col-form-label">Menu Name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="menu_name" id="menu_name" value="{{$menulist->menu_name}}">
                <small id="menu_name-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="label" class="col-lg-3 col-form-label">Menu Label</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="label" id="label" value="{{$menulist->label}}">
                <small id="label-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="menu_icon" class="col-lg-3 col-form-label">Menu Icon</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="menu_icon" id="menu_icon" value="{{$menulist->menu_icon}}">
                <small id="menu_icon-error" class="text-danger"></small>
            </div>
        </div>
        <div class=" row form-group">
            <label for="url_link" class="col-lg-3 col-form-label">Target URL</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="url_link" id="url_link" value="{{$menulist->url_link}}">
                <small id="url_link-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Description</label>
            <div class="col-lg-9">
                <select id="parent_id" name="parent_id" class="form-control kt-select2" style="width:100%;">
                    <option value="0">Select Parent</option>
                    @php
                    foreach ($parent_list as $p) {
                    @endphp
                    <option value="@php echo $p->id; @endphp" @php if($menulist->parent_id==$p->id){echo 'selected="selected"';} @endphp>@php echo $p->menu_name; @endphp</option>
                    @php } @endphp
                </select>
                <small id="description-error" class="text-danger"></small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Status</label>
            <div class="col-md-9">
                <select name="status" class="form-control kt-select2-2" id="status">
                    <option value="1" {{($menulist->status==1) ? 'selected' : ''}}>Active</option>
                    <option value="0" {{($menulist->status==0) ? 'selected' : ''}}>Inactive</option>
                </select>
                <small id="status-error" class="text-danger"></small>
            </div>
        </div>

        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>

        <button type="button" class="btn btn-success btn-sm float-right btn-save">Save</button>
    </div>

</form>

<script>
    $(document).ready(function() {
        $('.btn-save').click(function(event) {

            var id = $('#id').val();
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "PATCH",
                dataType: "json",
                url: "{{ url('menu') }}/" + id,
                data: $('#serverEditForm').serialize(),
                success: function(response) {
                    successMsg('Menu Updated successfully.');
                    $('#server_table').DataTable().ajax.reload();
                    $('#serverModal').modal('hide');
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
    });

    $(document).ready(function(e) {

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('#kt_datepicker_3').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd M yyyy'
        });
    });
</script>