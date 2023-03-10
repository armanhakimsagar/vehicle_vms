<div class="modal-header bg-info">
    <h5 class="modal-title" id="modal_title">Edit Vehicle Inspection</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="saveVehicleInspectionForm">
    <div class="modal-body  text-dark">
        @csrf
        @method('POST')
        <input type="hidden" id="vehicleInspectionId" value="{{$inspection->id}}">
        <input type="hidden" name="inspection_details_id_list" value="{{$inspectionDetailId->id_list}}">
        <fieldset class="custom_fieldset">
            <legend class="custom_legent ">Inspection Details
            </legend>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Date</label>
                <div class="col-lg-9">
                    <div class="input-group">
                       
                        <input type="text" name="date" id="date" class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" value="{{date('d M Y',strtotime($inspection->inspection_date))}}" />
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="la la-calendar"></i></div>
                        </div>
                    </div>
                    <small id="date-error" class="text-danger"></small>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Title</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{$inspection->inspection_name}}">
                    <small id="title-error" class="text-danger"></small>

                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Description</label>
                <div class="col-lg-9">
                    <textarea class="form-control" name="description" id="description" placeholder="Enter description" rows="2">{{$inspection->description}}</textarea>
                    <small id="description-error" class="text-danger"></small>
                </div>
            </div>
        </fieldset>

        <div id="itemSectionContainer">
            @if($inspectionDetailCount>0)
            @php
            $i = 0;
            @endphp
            @foreach($inspectionDetail as $insDet)
            <div id="section_{{$i}}" class="item_section">
                <fieldset class="custom_fieldset">
                    <legend class="custom_legent ">Item Section
                        <span class="counter_span"></span>
                    </legend>
                    <button type=" button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeItemSection" title="Close This Item"><i class="fas fa-times"></i></button>
                    <input type="hidden" name="inspection_details_id[]" value="{{$insDet->id}}">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Type</label>
                            <select name="type[]" id="type_{{$i}}" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('vehicle_types', 'name', null, $insDet->vehicle_type_id)}}
                            </select>
                            <small id="type_{{$i}}-error" class="text-danger"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label"> Category</label>
                            <select name="category[]" id="category_{{$i}}" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('inspection_categories', 'inspection_name', 'type='.$insDet->vehicle_type_id, $insDet->inspection_cat_id)}}
                            </select>
                            <small id="category_{{$i}}-error" class="text-danger"></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label"> Item</label>
                            <select name="item[]" id="item_{{$i}}" class="form-control kt-select2-2">
                                {{generate_simple_dropdown('inspection_items', 'item_name', 'parent_id='.$insDet->inspection_cat_id, $insDet->item_id)}}
                            </select>
                            <small id="item_{{$i}}-error" class="text-danger"></small>
                        </div>
                    </div>
                </fieldset>
            </div>
            @php $i++ @endphp
            @endforeach
            @endif
        </div>
        <div class="form-group row justify-content-center mt-4">
            <div ">
                <button type=" button" id="addItemSection" class="btn btn-outline-success btn-elevate btn-circle btn-icon" title="Add Trip"><i class="fas fa-plus"></i></button>
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
        initRelatedFunction();
        reset_counter();

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

    $('#saveVehicleInspectionForm').submit(function(event) {
        event.preventDefault();
        let id = $("#vehicleInspectionId").val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('dashboard/saveVehicleInspection') }}/" + id,
            data: $('#saveVehicleInspectionForm').serialize(),
            success: function(response) {
                successMsg('Vehicle inspection updated successfully.');
                $('#VehicleInspectionModal').modal('hide');
                $('#inspection_table').DataTable().ajax.reload(null, false);
            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        $("small#" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    })

    var section_id = "{{$inspectionDetailCount}}";

    $('#addItemSection').click(function(e) {
        e.preventDefault();
        addItemSection(section_id);
        section_id++;
    });


    function addItemSection(section_id) {
        let section =
            '<div id="section_' + section_id + '" class="item_section"><fieldset class="custom_fieldset"><legend class="custom_legent ">Item Section <span class="counter_span"></span></legend> <button type=" button" class="btn btn-outline-danger btn-elevate btn-circle btn-icon closeItemSection" title="Close This Item"><i class="fas fa-times"></i></button><div class="form-row"><div class="form-group col-md-4"> <label class="col-form-label">Type</label> <select name="type[]" id="type_' + section_id + '" class="form-control kt-select2-2"><option value="">Select</option></select> <small id="type_' + section_id + '-error" class="text-danger"></small></div><div class="form-group col-md-4"> <label class="col-form-label"> Category</label> <select name="category[]" id="category_' + section_id + '" class="form-control kt-select2-2"><option value="">Select</option></select> <small id="category_' + section_id + '-error" class="text-danger"></small></div><div class="form-group col-md-4"> <label class="col-form-label"> Item</label> <select name="item[]" id="item_' + section_id + '" class="form-control kt-select2-2"><option value="">Select</option></select> <small id="item_' + section_id + '-error" class="text-danger"></small></div></div></fieldset></div>';

        $("#itemSectionContainer").append(section);

        initRelatedFunction();

        reset_counter();

        let pushInto = "#type_" + section_id;
        fetchOptionList(pushInto, 'vehicle_types', 'name');
    }

    function initRelatedFunction() {

        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('.closeItemSection').each(function(index) {
            $(this).click(function() {
                $(this).parent().parent().remove();
                reset_counter();
            });
        });

        $("select[id^=type_]").change(function() {
            let idIndex = $(this).attr('id').substr(5);
            let pushInto = "#category_" + idIndex;
            let condition = "where type =" + this.value;
            if (this.value) {
                fetchOptionList(pushInto, 'inspection_categories', 'inspection_name', condition);
            }

        });

        $("select[id^=category_]").change(function() {
            let idIndex = $(this).attr('id').substr(9);
            let pushInto = "#item_" + idIndex;
            let condition = "where parent_id =" + this.value;
            if (this.value) {
                fetchOptionList(pushInto, 'inspection_items', 'item_name', condition);
            }

        });

    }

    function fetchOptionList(pushInto, table, column, condition = null, selected = null) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "{{ url('dashboard/commonFunction')}}",
            data: {
                table: table,
                column: column,
                condition: condition,
                selected: selected,
                _token: '{!! csrf_token() !!}',
            },
            success: function(data) {
                $(pushInto).html(data);
            },
            error: function(data) {
                if (data.status === 500) {
                    warningMsg('Data ID not exist!');
                } else {
                    errorMsg();
                }
            }
        });
    }

    function reset_counter() {
        $(".counter_span").each(function(i, obj) {
            $(this).text(parseInt(i + 1));
        });
    }
</script>