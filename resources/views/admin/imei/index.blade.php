@extends('layouts.admin.master')

@section('content')
<link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
<script src="{{asset('assets/js/jquery.easy-autocomplete.min.js')}}"></script>
<link href="{{asset('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" />
<style>
    .kt-menu__nav {
        padding: 0px 0px 0px 13px !important;
    }

    .easy-autocomplete input {
        border-color: #ccc;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
        color: #555;
        float: none;
        padding: 6px 12px;
        width: 250px !important;
    }

    .easy-autocomplete-container {
        left: 0;
        position: absolute;
        width: 250px !important;
        z-index: 2;
    }

    .crm_status_badge {
        height: 10px;
        width: 10px;
    }
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{url('/')}}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">IMEI</a>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-primary">
                        Actions

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-link"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
                                            <span class="kt-badge kt-badge--success">5</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>

                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">At a glance</h5>
                </div>
            </div>


            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/misc/bg-1.jpg")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center"></i>Total IMEI</h5>
                                <h5 class="card-title text-center">{{$total_imei}}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card" style="background-image: url('{{asset("assets/media/bg/b.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Assigned Total</h5>
                                <h5 class="card-title text-center">{{$assigned_imei}}</h5>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/v.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">Unassigned Total</h5>
                                <h5 class="card-title text-center">{{$unassigned_imei}}</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/br.png")}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">CRM Connected</h5>
                                <h5 class="card-title text-center">{{$crm_connected}}</h5>
                            </div>
                        </div>

                    </div>
                    @php
                        $i = 0;
                        $img =['r.png', 'bg-7.jpg'];
                    @endphp
                    @foreach($serverwise_summary as $sv)
                    <div class="col-md-2">
                        <div class="card custom-card"  style="background-image: url('{{asset("assets/media/bg/".$img[$i])}}')">
                            <div class="card-body custom-card-body">
                                <h5 class="card-title text-center">@if($sv->server_name=='') {{ 'N/A'}} @else {{$sv->server_name}} @endif</h5>
                                <h5 class="card-title text-center">{{$sv->serverwise_imei}}</h5>
                            </div>
                        </div>

                    </div>
                    @php $i++ @endphp
                    @endforeach
                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid ">
            <div class="kt-portlet__head ">
                <div class="kt-portlet__head-label">
                    <h5 class="kt-portlet__head-title">Filter IMEI list</h5>
                </div>
            </div>
            <div class="kt-portlet__body">
                <form action="" id="filterForm">
                    <div class="form-group row">
                        <div class="col-lg-3 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-2">
                                <option value="">Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-2">
                                <option selected value="0">Server</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-2">
                                <option selected value="0">Assigned</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 py-3">
                            <select class="form-control kt-select2-2">
                                <option selected value="0">Model</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                            </select>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <!-- <button type="reset" id="reset" class="btn btn-danger btn-sm mr-3">Reset</button>
                            <button type="submit" class="btn btn-success btn-sm">Show client list</button> -->
                        <input type="reset" class="btn btn-danger btn-sm mr-3">
                        <input type="submit" value="Show IMEI list" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>

        </div>
        <div class="kt-portlet kt-portlet--height-fluid custom-kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        IMEI List
                    </h3>
                    <a href="#" onClick="batch_move()" class=" add_imei btn btn-brand btn-sm ml-3 btn-elevate btn-icon-sm"><i class='fas fa-exchange-alt mr-2'></i>Batch Move </a>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="#imeiModal" data-toggle='modal' class=" add_imei btn btn-brand btn-sm btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add IMEI
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="imei_table">
                    <thead>
                        <tr>
                            <th width="2%" data-orderable="false">
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" id="all_selected_device" />
                                    <span></span>
                                </label>
                            </th>
                            <th>SL</th>
                            <th>TU ID</th>
                            <th>Device Name</th>
                            <th>IMEI</th>
                            <th>IMEI Status</th>
                            <th>Server</th>
                            <th>Model</th>
                            <th>Sim No</th>
                            <th>Sim Type</th>
                            <th>Sim Status</th>
                            <th>CRM Assigned</th>
                            <th>Platform Assigned</th>
                            <th>CRM Status</th>
                            <th>TU Status</th>
                            <th width="70px">Actions</th>
                        </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>


<!-- Modals -->
<div class="modal fade" id="imeiModal" data-backdrop="static" data-keyboard="false">
    <div id="dialog" class="modal-dialog">
        <div class="modal-content">
            <div id="load_modal_content">
                <!-- Dynamic Content -->
            </div>
        </div>
    </div>
</div>
<div class="modal" id="assignModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="edit_device_title"> Assign Device </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-lg-2 col-form-label">Target User</label>
                                        <div class="col-sm-9">
                                            <input id="movedevice_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                                            <div class="clearfix">&nbsp;</div>
                                            <input type="hidden" class="form-control" name="device_moving_to" id="device_moving_to">
                                            <input type="hidden" class="form-control" name="previous_crm_exist" id="previous_crm_exist">
                                            <input type="hidden" class="form-control" name="previous_customer_id" id="previous_customer_id">
                                            <div class="input-group" id="deviceMovement_treeview" style="height: calc(100vh - 270px);   overflow: auto;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="form-button">
                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                <button type="button" id="move_device_save" onClick="save_device_movement()" class="btn btn-success btn-sm float-right">Save</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="batch_move_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="batch_device_title"> Move Device </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @csrf
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body text-dark">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-lg-2 col-form-label">Target User</label>
                                        <div class="col-sm-9">
                                            <input id="batch_movedevice_search" class="form-control" type="text" placeholder="search" style="margin-left:5px;">
                                            <div class="clearfix">&nbsp;</div>
                                            <input type="hidden" class="form-control" name="batch_device_moving_to" id="batch_device_moving_to">
                                            <div class="input-group" id="batch_deviceMovement_treeview" style="height: calc(100vh - 270px);   overflow: auto;">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-2 col-form-label">IMEI</label>
                                        <div class="col-lg-4 col-md-9 mb-4">
                                            <textarea id="moving_imei_list" name="moving_imei_list" class="form-control">

                                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="form-button">
                <button type="button" class="btn btn-danger btn-sm float-left" data-dismiss="modal">Cancel</button>
                <button type="button" id="move_batch_save" onClick="save_batch_movement()" class="btn btn-success btn-sm float-right">Save</button>
            </div>

        </div>
    </div>
</div>

<script>
    $(function() {
        load_table();
    });

    function load_table() {
        var id = 0;
        var table = $('#imei_table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                type: "GET",
                url: "{{url('admin/imei/getData')}}/table/" + id,
                data: function(d) {
                    d._token = '{!! csrf_token() !!}';
                }
            },
            columnDefs: [{
                    orderable: false,
                    className: 'all_device_checkbox',
                    targets: 0
                }],
                select: {
                    style: 'os',
                    selector: 'td:first-child'
                },
            columns: [{
                    data: 'checkDevice',
                    name: 'checkDevice',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'unit_id',
                    name: 'unit_id'
                },
                {
                    data: 'device_name',
                    name: 'device_name'
                },
                {
                    data: 'imei',
                    name: 'imei'
                },
                {
                    data: 'imei_status_name',
                    name: 'imei status in crm(used,damage etc)'
                },
                {
                    data: 'server_name',
                    name: 'server_name',
                    className: 'text-center'
                },
                {
                    data: 'model_name',
                    name: 'model_name'
                },
                {
                    data: 'sim_number',
                    name: 'sim_number'
                },
                {
                    data: 'sim_type',
                    name: 'sim_type'
                },
                {
                    data: 'sim_status_name',
                    name: 'sim_status_name'
                },
                {
                    data: 'crm_customer_name',
                    name: 'crm_customer_name'
                },
                {
                    data: 'customer_name',
                    name: 'customer_name'
                },
                {
                    data: 'imei_status',
                    name: 'imei_status',
                    className: 'text-center'
                },
                {
                    data: 'unit_status_name',
                    name: 'unit_status_name'
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
            ],

            "aoColumnDefs": [
                {
                "aTargets": [13],
                "mRender": function(data, type, full) {
                    return '<span class="btn ' + data + ' btn-sm"> </span>';
                }
            },{
                "aTargets": [14],
                "mRender": function(data, type, full) {
                    var rowData = data.split(",");
                    return '<span class="btn btn-sm" style="color:#fff; background-color:'+rowData[0]+'">'+rowData[1]+'</span>';
                    //return '<span class="btn btn-sm" style="background-color:'+rowData[1]+'</span>';
                    //return data;
                    console.log(data);
                }
            },{
                "aTargets": [0],
                "mRender": function(data, type, full) {
                    return '<input type="checkbox" class="selected_device" '+data+'>';
                }
            }],

            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copy',
                    text: '<i class="far fa-copy custom-icon"></i>',
                    className: 'custom-button-class ml-3 mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="flaticon2-paper custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="far fa-file-excel custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="far fa-file-pdf custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print custom-icon"></i>',
                    className: 'custom-button-class mr-2',
                    exportOptions: {
                        columns: ':visible :not(:last-child)'
                    }
                }
            ]
        });
        table.buttons().container().appendTo('#imei_table_length');
        $("#all_selected_device").click(function() {
            $("input[class='selected_device']").attr("checked", this.checked);
        });
    }

    $(function() {

        $('.add_imei').click(function(e) {
            e.preventDefault();
            $('#dialog').removeClass('modal-xl');
            $('#load_modal_content').load('{{route("imei.create")}}');
        });
    });

    function view_data(id) {
        $('#dialog').addClass('custom-modal-width');
        $('#load_modal_content').load('{{url("admin/imei/getData/n")}}/' + id);
    }

    function edit_data(id) {
        $('#dialog').removeClass('custom-modal-width');
        $('#load_modal_content').load('{{url("imei")}}/' + id + '/edit');

    }

    var selected_batch_items = [];

    function assign_device(id, customerID, crmExist) {
        selected_batch_items = [];
        $("#previous_customer_id").val(customerID);
        $("#previous_crm_exist").val(crmExist);
        selected_batch_items.push(id);
        $('#deviceMovement_treeview').jstree({
            'plugins': ["search", "sort"],
            'core': {
                'data': @php echo $dealerTree;@endphp
            }
        }).on('select_node.jstree', function(e, data) {
            $("#device_moving_to").val(data.node.original.item_details.id);
            $("#movedevice_search").val(data.node.original.item_details.name);
        });
    }

    function save_device_movement() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('admin/movedevice') }}",
            data: {
                'previous_customer_id': $("#previous_customer_id").val(),
                'previous_crm_exist': $("#previous_crm_exist").val(),
                'moving_to_user': $("#device_moving_to").val(),
                'moving_devices': selected_batch_items,
                _token: "{{ csrf_token() }}",
                _method: "POST"
            },
            success: function(response) {
                if (response == 1) {
                    successMsg('Device has been moved successfully');
                    $("#assignModal").modal('hide');
                    load_table();
                } else {
                    errorMsg();
                }
            },
            error: function(reject) {
                errorMsg();

            }
        });
    }

    function batch_move() {
        console.log('batch move call');
        selected_batch_items_v2 = [];
        selected_device_with_status = [];
        var selected_imei_list = "";
        $('#imei_table input:checked').each(function() {
            if ($(this).val() != 'on') {
                selected_batch_items_v2.push($(this).val());
                /* selected_device_with_status.push({
                    id: $(this).val(),
                    previous_customer: $(this).data('customer'),
                    crm_exist: $(this).data('crmexist')
                }); */
                selected_imei_list += $(this).data('rel') + '\n';
            }
        });

        $("#moving_imei_list").html(selected_imei_list);
        //load_treeview(2);
        $("#batch_move_modal").modal('show');
    }

    function save_batch_movement() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('admin/batch_imei_movement') }}",
            data: {
                'moving_to_user': $("#batch_device_moving_to").val(),
                'moving_devices': selected_batch_items_v2,
                _token: "{{ csrf_token() }}",
                _method: "POST"
            },
            success: function(response) {
                if (response == 1) {
                    successMsg('Device has been moved successfully');
                    $("#batch_move_modal").modal('hide');
                    load_table();
                } else {
                    errorMsg();
                }
            },
            error: function(reject) {
                errorMsg();

            }
        });
    }

    function updateImei(imei_id) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('admin/imei/updateImei') }}",
            data: {
                'id': imei_id,
                'device_name': $("#editable_device_name").val(),
                'plate_number': $("#editable_plate_number").val(),
                'expiry_date': $("#editable_expiry_date").val(),
                'note': $("#editable_imei_note").val(),
                _token: "{{ csrf_token() }}",
                _method: "POST"
            },
            success: function(response) {
                if (response == 1) {
                    successMsg('IMEI has been updated successfully');
                    $("#imeiModal").modal('hide');
                    load_table();
                } else {
                    errorMsg();
                }
            },
            error: function(reject) {
                errorMsg();

            }
        });
    }

    $(document).ready(function() {
        var search_device_options = {
            data: @php echo $searchTree;@endphp,
            getValue: function(element) {
                return element.name;
            },
            list: {
                match: {
                    enabled: true
                },
                onSelectItemEvent: function() {
                    var selectedItemValue = $("#movedevice_search").getSelectedItemData().id;
                    $("#device_moving_to").val(selectedItemValue).trigger("change");
                },
                onHideListEvent: function() {}
            }
        };

        $("#movedevice_search").easyAutocomplete(search_device_options);

        var search_batch_device_options = {
            data: @php echo $searchTree;@endphp,
            getValue: function(element) {
                return element.name;
            },
            list: {
                match: {
                    enabled: true
                },
                onSelectItemEvent: function() {
                    var selectedItemValue = $("#batch_movedevice_search").getSelectedItemData().id;
                    $("#batch_device_moving_to").val(selectedItemValue).trigger("change");
                },
                onHideListEvent: function() {}
            }
        };

        $("#batch_movedevice_search").easyAutocomplete(search_batch_device_options);

        $('#batch_deviceMovement_treeview').jstree({
            'plugins': ["search", "sort"],
            'core': {
                'data': @php echo $dealerTree;@endphp
            }
        }).on('select_node.jstree', function(e, data) {
            $("#batch_device_moving_to").val(data.node.original.item_details.id);
            $("#batch_movedevice_search").val(data.node.original.item_details.name);
        });
    });

    $(document).on('click', '.delete_data', function(e) {
        e.preventDefault();
        var el = this;
        var id = $(this).data('id');
        // Confirm box
        bootbox.confirm({
            title: "Delete Confirmation",
            message: "Do you really want to delete this IMEI?",
            callback: function(result) {
                if (result) {
                    // AJAX Request
                    $.ajax({
                        url: "{{url('imei')}}/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: '{!! csrf_token() !!}'
                        },
                        success: function(response) {
                            // Removing row from HTML Table
                            if (response) {
                                $(el).closest('tr').css('background', '#FC1361');
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                    successMsg('IMEI deleted successfully.');
                                    $('#imei_table').DataTable().ajax.reload(null, false);
                                });
                            } else {
                                errorMsg();
                            }
                        }
                    });
                }
            }
        });
    });
</script>
<script src="{{asset('assets/js/business/jstree.bundle.js')}}"></script>
@endsection