
<div class="modal-header bg-info">
    <h5 class="modal-title">Edit User</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form action="" id="editDepForm">
    <div class="modal-body">
        @csrf
        @method('PATCH')
        <!-- Form content start -->
        <input type="hidden" id="id" value="{{$dep->id}}">
        <div class="row form-group">
            <label for="name" class="col-3 col-form-label">Name</label>
            <div class="col-lg-9 col-xl-6">
                <input type="text" class="form-control" name="name" value="{{$dep->name}}">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>
       

        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <input type="submit" id="submit" value="Save Change" class="btn btn-success btn-sm float-right">
    </div>

</form>
      
<script>

    $(document).on('submit','form#editDepForm',function(event){

        event.preventDefault();
        var id = $('#id'). val();
        $('#submit').val('Saving...');
        $("[id$=-error]").text('');

        $.ajax({
            type: "PATCH",
            dataType: "json",
            url: "{{ url('department') }}/"+id,
            data: $('#editDepForm').serialize(),
            success: function (response) {
                successMsg('Department Updated successfully.');
                $('#depertment_table').DataTable().ajax.reload();
                $('#depertmentModal').modal('hide');
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

    $(document).ready(function (e) {

        $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                $('.kt-avatar__holder').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
        });
    });

    $(document).ready(function(){
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

    });
</script>

