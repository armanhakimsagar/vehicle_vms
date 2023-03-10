
        <div class="modal-header bg-info">
            <h5 class="modal-title">Add Sensor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form method="post" id="saveSensorForm">
            <div class="modal-body text-dark">
                @csrf
                @method('POST')
                <!-- Form content start -->
                <div class=" row form-group">
                    <label for="name" class="col-xl-3 col-lg-3 col-form-label">Value Type</label>
                    <div class="col-lg-9 col-xl-6">
                        <select name="" id="" class="form-control kt-select2-2" >
                            <option value="">Select</option>
                            <option value="">01</option>
                            <option value="">02</option>
                        </select>
                        <small id="name-error" class="text-danger" for="name"></small>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Sensor Type</label>
                    <div class="col-lg-9 col-xl-6">
                        <input type="text" class="form-control" name="phone" id="phone" >
                        <small id="phone-error" class="text-danger"></small>
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

    $(document).ready(function(){
        $('.btn-save').click( function(event){
            event.preventDefault();
            $("[id$=-error]").text('');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('user.store') }}",
                data: $('#saveSensorForm').serialize(),
                success: function (response) {
                    console.log('User created');
                    successMsg('User created successfully.');
                    $('#userList').DataTable().ajax.reload();
                    $('#userModal').modal('hide');
                },
                error: function (reject) {
                    errorMsg();
                    if( reject.status === 422 || reject.status === 403 ) {
                        var errors = $.parseJSON(reject.responseText);
                        $.each(errors.error.message, function (key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-error").text(val[0]);
                        });
                    }
                }
            });
        });
    });


</script>

