<div class="modal-header bg-info">
    <h5 class="modal-title">Edit Permission</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="editUsersForm" method="post">
    <div class="modal-body  text-dark">
    @csrf
    {{ method_field('PUT') }}
    <input type="hidden" id="id" value="{{$designation->id}}">
        <!-- Form content start -->
        @if($parentPermission->count()>0)
        <div class=" row form-group">
            <label for="group" class="col-lg-3 col-form-label">Select Parent</label>
            <div class="col-lg-9">
                <select name="parent_id" class="form-control kt-select2-2">
                    <option value="">Select Parent</option>
                    @foreach($parentPermission as $group)
                    <option value="{{$group->id}}" @if($group->id==$designation->parent_id) selected @endif>{{$group->name}}</option>
                    @endforeach
                </select>
                <small id="parent_id-error" class="text-danger" for="parent_id"></small>
            </div>
        </div>
        @endif 

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Permission </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" value="{{$designation->name}}">
                <small id="name-error" class="text-danger" for="name"></small>
            </div>
        </div>

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Resource </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="resource" value="{{$designation->resource}}">
                <small id="resource-error" class="text-danger" for="resource"></small>
            </div>
        </div>
        <!-- Form content end -->
    </div>
    <div class="form-button">
        <button type="button" id="cancle" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <input type="submit" id="submit" class="btn btn-success btn-sm float-right" value="Save">
    </div>

</form>

<script>
    $(document).ready(function(e) {

        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.kt-avatar__holder').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });


    $('form#editUsersForm').submit(function(event) {

event.preventDefault();
var id = $('#id').val();
$('#submit').val('Saving...');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('permit.update', '') }}/"+id,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                successMsg('Permission created successfully.');
                $('#user_table').DataTable().ajax.reload();
                $('#userModal').modal('hide');
            },
            error: function(reject) {
                errorMsg();
                if (reject.status === 422 || reject.status === 403) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.error.message, function(key, val) {
                        console.log(key + ' : ' + val);
                        $("small#" + key + "-errors").text(val[0]);
                    });
                }
            }
        });
    });

    $(document).ready(function() {
        $('.kt-select2-2').select2({
            placeholder: "Select"
        });

        $('#pass-tggl').click(function() {
            $('#icon').toggleClass('fa-eye-slash');
            var pass = $('#password');
            if (pass.attr('type') === 'password') {
                pass.attr('type', 'text');
            } else {
                pass.attr('type', 'password');
            }
        });

        $('#conf-pass-tggl').click(function() {
            $('#icon-conf').toggleClass('fa-eye-slash');
            var passConf = $('#password_confirmation');
            if (passConf.attr('type') === 'password') {
                passConf.attr('type', 'text');
            } else {
                passConf.attr('type', 'password');
            }
        });
    });
</script>