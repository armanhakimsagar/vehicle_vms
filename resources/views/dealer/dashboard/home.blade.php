<link href="{{asset('assets/js/graph/c3.css')}}" rel="stylesheet">

<!-- Load d3.js and c3.js -->
<script src="{{asset('assets/js/graph/d3.min.js')}}" charset="utf-8"></script>
<script src="{{asset('assets/js/graph/c3.min.js')}}"></script>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">Home </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Account Information</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="row custom-at-a-glance">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Profile Image -->
                                        <div class="text-center">

                                            @if($profile->profile_photo)
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('public/uploads/user/'.$profile->profile_photo)}}"
                                                alt="image">
                                            @else
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                                            @endif
                                        </div>
                                        <h5 class="profile-username text-center mt-3">{{$profile->customer_name}}
                                        </h5>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Platform Username </b> <span
                                                    class="float-right">{{$profile->hosting_company}}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>System Username </b> <span
                                                    class="float-right">{{$profile->username}}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Roll </b>
                                                @if($profile->actor_type==1)
                                                <span class="float-right">Distributor</span>
                                                @elseif($profile->actor_type==2)
                                                <span class="float-right">Enduser</span>
                                                @elseif($profile->actor_type==0)
                                                <span class="float-right">Only Viewer</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone </b> <span class="float-right">{{$profile->phone}}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address</b> <span
                                                    class="float-right">{{$profile->present_address}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Device Summary (Status wise)</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="row custom-at-a-glance">
                            <div id="dealer_graph_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Account details</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="row custom-at-a-glance">
                            <div class="col-md-3">
                                <div class="card custom-card"
                                    style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                                    <div class="card-body custom-card-body">
                                        <h5 class="card-title text-center"></i>Total Account
                                        </h5>
                                        <h5 class="card-title text-center" id="total_v">{{$total_clients_under_me}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-12">
                <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
                    <div class="kt-portlet__head ">
                        <div class="kt-portlet__head-label">
                            <h5 class="kt-portlet__head-title">Device details</h5>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="row custom-at-a-glance">


                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

</div>


<!-- end:: Content -->
</div>
<script>
$(document).ready(function() {
    var response = @php echo json_encode($device_list, true);
    @endphp;
    var data_for_graph = [];
    for (var x = 0; x < response.length; x++) {
        data_for_graph.push({
            status_name: response[x].status_name,
            total_device: response[x].total_device
        });
    }
    var dealer_chart = c3.generate({
        bindto: '#dealer_graph_chart',
        data: {
            json: data_for_graph,
            keys: {
                x: 'status_name',
                value: ['total_device'],
            },
            type: 'bar'
        },
        axis: {
            x: {
                type: 'category'
            },
            y: {
                tick: {
                    format: function(v, id, i, j) {
                        return v;
                    }
                }
            }
        }
    });
});
</script>