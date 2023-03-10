<style>
    .tableWithInput tbody tr td .form-control {
        padding: 10px;
        border: none !important;
        /* background-color: transparent !important; */
    }
</style>
<div class="modal-header bg-info">
    <h5 class="modal-title">Check Inspection</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="saveInspectionCheckForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <!-- Form content start -->
        <input type="hidden" name="vehicle_id" value="{{$vehicle_id}}">
        <input type="hidden" name="inspection_id" value="{{$inspection->id}}">
        <div class="row">

            <div class="col-lg-12">
                <table class="table table-striped">

                    <tbody>
                        <tr>
                            <th width="140px;">Vehicle No </th>
                            <td><span id="vehicle_no_display"></span></td>
                        </tr>
                        <tr>
                            <th width="140px;">Inspection Date </th>
                            <td>{{date('d M Y',strtotime($inspection->inspection_date))}}</td>
                        </tr>
                        <tr>
                            <th width="140px;">Inspection Name </th>
                            <td>{{$inspection->inspection_name}}</td>
                        </tr>
                        <tr>
                            <th width="140px;">Description </th>
                            <td>{{$inspection->description}}</td>
                        </tr>
                        <tr>
                            <th width="140px;">Items </th>
                            <td>
                                <table class="table tableWithInput">
                                    <thead>
                                        <tr>
                                            <th scope="row">SL</th>
                                            <th scope="row">Item Name</th>
                                            <th scope="row"><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="group-checkable" id="all_insp_done" />
                                                    <span></span> Complete
                                                </label></th>
                                            <th scope="row">Note</th>
                                            <th scope="row">Complete Date</th>
                                            <th scope="row">Complete By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($inspection_details)>0)
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach($inspection_details as $insDet)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$insDet->item_name}}</td>
                                            @if($insDet->followup_exist==1)
                                            <td><input type="checkbox" checked disabled></td>
                                            <td><textarea class="form-control" readonly cols="30" rows="1">{{$insDet->followup_note}}</textarea></td>
                                            @else
                                            <td><input type="checkbox" name="item_id[]" class="selected_item_detail" value="{{$insDet->item_id}}"></td>
                                            <td><textarea name="note[]" class="form-control" cols="30" rows="1"></textarea></td>
                                            
                                            @endif
                                            <td>{{($insDet->posted_date) ? date('d M Y',strtotime($insDet->posted_date)):''}}</td>
                                            <td>{{$insDet->posted_by}}</td>
                                        </tr>
                                        @php $i++ @endphp
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success btn-sm float-right">Save</button>
    </div>

</form>

<script>
    $(document).ready(function() {

        $('#vehicle_no_display').text($('#show_vehicle_no').text());

    });

    $("#all_insp_done").click(function() {
        $("input[class='selected_item_detail']").attr("checked", this.checked);
    });

    $('#saveInspectionCheckForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/vehicle_insp_check_save') }}",
            data: $('#saveInspectionCheckForm').serialize(),
            success: function(response) {
                successMsg('Inspection completed successfully.');
                $('#InspectionCheckModal').modal('hide');
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