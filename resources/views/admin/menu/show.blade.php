<div class="modal-header bg-info">
        <h5 class="modal-title"> Menu Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

        <div class=" row form-group">
            <label for="name" class="col-xl-3 col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$menulist->menu_name}}</span>
            </div>
        </div> 
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Target URL</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$menulist->url_link}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Status</label>
            <div class="col-lg-9 col-xl-6">
                @if($menulist->status==1)
                <span class="form-control">Active</span>
                @elseif($menulist->status==0)
                <span class="form-control">Inactive</span>
                @endif
            </div>
        </div>
      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    </div>
