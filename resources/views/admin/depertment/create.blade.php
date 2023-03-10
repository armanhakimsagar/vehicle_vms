
        <div class="modal-header bg-info">
            <h5 class="modal-title">Add Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form id="saveDepForm">
            <div class="modal-body  text-dark">
                @csrf
                @method('POST')
                <!-- Form content start -->
                <div class=" row form-group">
                    <label for="name" class="col-lg-3 col-form-label">Name </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="name">
                        <small id="name-error" class="text-danger" for="name"></small>
                    </div>
                </div> 
            </div>
            <div class="form-button">
                <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                
                <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
            </div>

        </form>
      
<script>


    $(document).on('submit','form#saveDepForm',function(event){

        event.preventDefault();
        $("[id$=-error]").text('');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('department.store') }}",
            data: $('#saveDepForm').serialize(),
            success: function (response) {
                successMsg('Department created successfully.');
                $('#depertmentModal').modal('hide');
                $('#depertment_table').DataTable().ajax.reload();

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

</script>

