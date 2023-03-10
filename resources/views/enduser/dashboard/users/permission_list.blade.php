<style>
.control-label {
    text-align: left;
}

.permission_div {
    margin: 5px;
    border: 1px solid #efefef;
    max-width: 48%;
}

.permission_div h4 {
    border-bottom: 1px solid #efefef;
    /* padding-bottom: 7px; */
    padding: 7px;
}

.btn:not(.btn-sm):not(.btn-lg) {
    line-height: 1.2 !important;
}
</style>
<div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
    <div class="kt-portlet__body">
        <div class="row">
            @php

            foreach ($permission_list as $p) { @endphp
            <div class="col-sm-6 permission_div">
                <fieldset>
                    <h4>@php echo $p->menu_name; @endphp Management</h4>
                    <p>&nbsp;</p>
                    @php
                    $mypermission = 0;
                    foreach ($p->childs as $k => $v) {
                    $mypermission = $p->childs[$k];
                    @endphp
                    <div class="form-group row">
                        <label class="control-label col-md-5">@php echo ucfirst(str_replace("_", " ", $k)); @endphp:
                        </label>
                        <div class="col-md-3">
                            <input type="checkbox" class="permission_checkbox" @php if ($mypermission=='1' ) {
                                echo 'value="1"' ; echo 'checked="checked"' ; } else { echo 'value="0"' ; } @endphp
                                data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger"
                                data-on="Yes" data-off="No"
                                name="@php echo $p->module_id; @endphp-@php echo $k; @endphp"
                                id="@php echo $p->module_id; @endphp-@php echo $k; @endphp">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    @php } @endphp
                </fieldset>
            </div>
            @php } @endphp
            <div class="clearfix"></div>
            <div class="col-12">
                <button type="button" id="savePermission" class=" btn btn-success btn-sm">Save Permission</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.permission_checkbox').bootstrapToggle();
    $(".permission_checkbox").change(function() {
        if ($(this).is(':checked')) {
            $(this).val(1);
            console.log('checked', $(this).val());
        } else {
            $(this).val(0);
            console.log('un checked', $(this).val());
        }

    });

    $('#savePermission').click(function() {
        var group_id = $('#group_id').val();
        var all_values = [];
        $(".permission_checkbox").each(function() {
            var myid = $(this).attr('id');
            var myval = ($(this).is(':checked')) ? 1 : 0;
            all_values.push({
                'id': myid,
                'val': myval
            });
        });

        console.log(group_id, all_values);

        $.ajax({
            type: "POST",
            //dataType: "json",
            url: "{{ url('save_permission')}}",
            //data: {'group_id':group_id,'all_values':all_values},
            data: {
                'group_id': group_id,
                'all_values': all_values,
                _token: '{!! csrf_token() !!}'
            },
            success: function(response) {
                successMsg('Permission implemented successfully.');
                $("#searchPermission").click();
            },
            error: function(reject) {
                errorMsg();
            }
        });
    });
});
</script>