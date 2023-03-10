<div class="modal-header bg-info">
        <h5 class="modal-title"> Server Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

        <div class=" row form-group">
            <label for="name" class="col-xl-3 col-lg-3 col-form-label">Name</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->name}}</span>
            </div>
        </div> 
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Opening Date</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->opening_date}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Hosting Name</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->hosting_name}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Hosting Country</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->hosting_country}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Hosting Real IP</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->hosting_realip}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Hosting URL</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->hosting_url}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Server Details</label>
            <div class="col-lg-9 col-xl-6">
                <span class="form-control">{{$server->server_details}}</span>
            </div>
        </div>
        <div class="row form-group">
            <label for="email" class="col-3 col-form-label">Status</label>
            <div class="col-lg-9 col-xl-6">
                @if($server->status==1)
                <span class="form-control">Active</span>
                @elseif($server->status==0)
                <span class="form-control">Inactive</span>
                @endif
            </div>
        </div>
      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    </div>
