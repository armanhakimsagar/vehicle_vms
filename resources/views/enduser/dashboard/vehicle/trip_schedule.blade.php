<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Trip Schedule
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#userModal" data-toggle='modal'
                            class=" add_complain btn btn-brand btn-sm btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            New
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm back_to_data_list ml-3"><i
                                class="far fa-arrow-alt-circle-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="complain_table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Code</th>
                        <th>Complain Type</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Device</th>
                        <th>Follower</th>
                        <th>Reporter</th>
                        <th>District</th>
                        <th>Thana</th>
                        <!-- <th>Reminder</th> -->
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>

<script>
$('.back_to_data_list').click(function(e) {
    e.preventDefault();
    $(".vehicle_data_list").css('display', 'block');
    $('.vehicle_detail').css('display', 'none');

});
</script>