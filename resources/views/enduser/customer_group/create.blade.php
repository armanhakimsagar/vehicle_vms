<div class="modal-header bg-info">
    <h5 class="modal-title">Add Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="saveUserForm" method="post" action="{{url('customer-group-store')}}">
    <div class="modal-body  text-dark">
        @csrf
        <!-- Form content start -->
    

        <div class=" row form-group">
            <label for="name" class="col-lg-3 col-form-label">Group Name </label>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="name" required>
                <small id="name-error" class="text-danger" for="name"></small>
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
 $(document).on('submit', 'form#saveUserForm', function(event) {
                       successMsg('Group created successfully.');
           });
</script>