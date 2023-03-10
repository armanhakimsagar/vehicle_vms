<style>
.custom-table-tab {
    height: 365px;
    max-height: 365px;
    overflow-x: hidden;
    overflow-y: auto;
}

.position-relative {
    position: relative;
}

.custom-nav-tabs-line>.nav-item>.nav-link {
    padding: 6px 0;
}

.go-back {
    position: absolute;
    right: 0px;
    top: 0px;
    color: #0575a0;
    font-weight: 600;
    padding: .75rem 1rem;
}

.go-back:hover {
    color: #2aa6d6;
}

.custom-span-color {
    color: #FF9951;
    ;
}

.list-group-item.active {
    color: #343A40 !important;
    background-color: #E9F1FE !important;
    border-color: #E9F1FE !important;
}

.btn-custom {
    width: 60px;
    padding: 6px 5px;
    color: white;
    background: #FF9951;
}

.btn-custom:hover {
    color: white;
    background: #fb8735;
}

.highlighted {
    background-color: yellow;
}

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
    margin-bottom: 10px;
    width: 250px !important;
}

.easy-autocomplete-container {
    left: 0;
    position: absolute;
    width: 250px !important;
    z-index: 2;
}

.kt-portlet .kt-portlet__body {
    padding: 5px;
}


.fixed-table-head>tr>th {
    position: sticky;
    top: -1px;
    background: #fff;
}

.table_parent_list {}
</style>
<script src="{{asset('assets/js/global/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/angular.min.js')}}"></script>
<script src="{{asset('assets/js/angular-filter.js')}}"></script>
<link href="{{asset('assets/css/business/jstree.bundle.css')}}" rel="stylesheet" />
<script src="{{asset('assets/js/jquery.easy-autocomplete.min.js')}}"></script>
<link href="{{asset('assets/css/easy-autocomplete.min.css')}}" rel="stylesheet" />

<div ng-app="dealerTopApp" ng-controller="dealerTopCtrl" ng-cloak>
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed">
        <!-- begin:: Header Menu -->
        <input type="hidden" value="{{Auth::user()->id}}" id="auth_user_id">
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
                class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                <ul class="kt-menu__nav ">

                    <li class="kt-menu__item">
                        <a href="{{route('dealer.dashboard')}}" class="kt-menu__link">
                            <span class="kt-menu__link-text">Home</span>
                        </a>
                    </li>
                    <li class="kt-menu__item ">
                        <a href="{{url('dealer/business')}}" class="kt-menu__link">
                            <span class="kt-menu__link-text">Business</span>
                        </a>
                    </li>
                    <li class="kt-menu__item  ">
                        <a class="kt-menu__link" href="{{url('dealer/monitor/1')}}">
                            <span class="kt-menu__link-text">Monitor</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- end:: Header Menu -->

        <!-- begin:: Header Topbar -->
        <div class="kt-header__topbar">

            <!--begin: Search -->


            <div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
                <form class="kt-quick-search__form custom-search-form">
                    <div class="input-group">
                        <input type="text" id="search_field" ng-model="search_item" class="form-control custom-search"
                            placeholder="IMEI/Account/Name">
                        <div class="input-group-append">
                            <button type="button" id="search_device" ng-click="searchItem('device')"
                                class="btn btn-info custom-info btn-sm">Device</button>
                            <button type="button" id="search_user" ng-click="searchItem('user')"
                                class="btn btn-success custom-success btn-sm">User</button>
                        </div>
                    </div>
                </form>
            </div>


            <!--end: Search -->

            <!--end: Search -->

            <!--begin: Language bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-icon">
                        <img class="" src="{{asset('assets/media/flags/020-flag.svg')}}" alt="" />
                    </span>
                </div>
                <div
                    class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                        <li class="kt-nav__item kt-nav__item--active">
                            <a href="#" class="kt-nav__link">
                                <span class="kt-nav__link-icon"><img
                                        src="{{asset('assets/media/flags/020-flag.svg')}}" alt="" /></span>
                                <span class="kt-nav__link-text">English</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <span class="kt-nav__link-icon"><img
                                        src="{{asset('assets/media/flags/bd_flag.jpg')}}" alt="" /></span>
                                <span class="kt-nav__link-text">Bengali</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--end: Language bar -->

            <!--begin: User Bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="kt-header__topbar-user">
                        @if (Auth::check())
                        <span class="kt-header__topbar-username kt-hidden-mobile">

                            {{ Auth::user()->name }}

                        </span>
                        @if(Auth::user()->profile_photo)
                        <img src="{{asset('public/uploads/user/'.Auth::user()->profile_photo)}}" alt="image">
                        @else
                        <img src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                        @endif
                        @endif

                    </div>
                </div>
                <div
                    class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                    <!--begin: Head -->
                    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                        style="background-image: url(assets/media/misc/bg-1.jpg)">
                        <div class="kt-user-card__avatar">
                            @if (Auth::check())


                            @if(Auth::user()->profile_photo)
                            <img src="{{asset('public/uploads/user/'.Auth::user()->profile_photo)}}" alt="image">
                            @else
                            <img src="{{asset('assets/media/users/default.jpg')}}" alt="image">
                            @endif
                            @endif

                        </div>
                        <div class="kt-user-card__name">
                            @if (Auth::check())
                            {{ Auth::user()->name }}
                            @endif
                        </div>
                        <div class="kt-user-card__badge">
                        </div>
                    </div>

                    <!--end: Head -->

                    <!--begin: Navigation -->
                    <div class="kt-notification">
                        <a href="{{route('profile.index')}}" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Profile
                                </div>
                                <div class="kt-notification__item-time">
                                    Account settings and more
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-mail kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Messages
                                </div>
                                <div class="kt-notification__item-time">
                                    Inbox and tasks
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-rocket-1 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Activities
                                </div>
                                <div class="kt-notification__item-time">
                                    Logs and notifications
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-hourglass kt-font-brand"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Tasks
                                </div>
                                <div class="kt-notification__item-time">
                                    latest tasks and projects
                                </div>
                            </div>
                        </a>
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-cardiogram kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    Billing
                                </div>
                                <div class="kt-notification__item-time">
                                    billing & statements
                                </div>
                            </div>
                        </a>
                        <div class="kt-notification__custom kt-space-between">
                            <a class="btn btn-label btn-label-brand btn-sm btn-bold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Sign Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="demo1/custom/user/login-v2.html" target="_blank"
                                class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
                        </div>
                    </div>

                    <!--end: Navigation -->
                </div>
            </div>

            <!--end: User Bar -->
        </div>
        <script type="text/javascript">
        var app = angular.module('dealerTopApp', ['angular.filter']);
        app.controller('dealerTopCtrl', function($scope, $http, $window) {
            console.log('angular is running');
            angular.element(document).ready(function() {

                $('.kt-select2-2').select2({
                    placeholder: "Select"
                });

                $('.datePickerTop').datepicker({
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd'
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

                $("#sendCommand").attr('disabled', true);

                $scope.device_result = [];
                $scope.user_result = [];
                $("#device_tab_menu").click(function() {
                    $scope.current_item = 'device';
                    $("#search_device_user").text("Device");
                    $("#go_back_user").click();
                });

                $("#user_tab_menu").click(function() {
                    $scope.current_item = 'user';
                    $("#search_device_user").text("User");
                    $("#go_back_device").click();
                });

                $(".account-item").each(function(index) {
                    $(this).on('click', function(e) {
                        e.preventDefault();
                        $("#result_tab").slideUp();
                        $("#sliding_section").removeClass('d-none');

                    });
                });

                $("#go_back_device").click(function() {
                    $("#result_tab").slideDown();
                    $("#sliding_section_device").addClass('d-none');
                });
                $("#go_back_user").click(function() {
                    $("#result_tab").slideDown();
                    $("#sliding_section_user").addClass('d-none');
                });

                $('#search_field').bind("enterKey", function(e) {
                    $("#search_device").trigger('click');
                });
                $('#search_field').keyup(function(e) {
                    if (e.keyCode == 13) {
                        $(this).trigger("enterKey");
                    }
                });

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ url('dealer/showTree') }}/" + $("#auth_user_id").val() +
                        '/topmenu',
                    success: function(response) {
                        $('#deviceMovement_treeview_header_sale').jstree({
                            'plugins': ["search", "sort"],
                            'core': {
                                'data': response.jsonTree
                            }
                        }).on('select_node.jstree', function(e, data) {
                            $("#device_moving_to_header_sale").val(data.node
                                .original.item_details.id);
                            $("#movedevice_search_header_sale").val(data.node
                                .original.item_details.name);
                        });
                        $('#deviceMovement_treeview_header_move').jstree({
                            'plugins': ["search", "sort"],
                            'core': {
                                'data': response.jsonTree
                            }
                        }).on('select_node.jstree', function(e, data) {
                            $("#device_moving_to_header_move").val(data.node
                                .original.item_details.id);
                            $("#movedevice_search_header_move").val(data.node
                                .original.item_details.name);
                        });

                        $('#userMovement_treeview_header_sale').jstree({
                            'plugins': ["search", "sort"],
                            'core': {
                                'data': response.jsonTree
                            }
                        }).on('select_node.jstree', function(e, data) {
                            $("#moving_to_parent_header_sale").val(data.node
                                .original.item_details.id);
                            $("#moveuser_search_header_sale").val(data.node.original
                                .item_details.name);
                        });
                        $('#userMovement_treeview_header_move').jstree({
                            'plugins': ["search", "sort"],
                            'core': {
                                'data': response.jsonTree
                            }
                        }).on('select_node.jstree', function(e, data) {
                            $("#moving_to_parent_header_move").val(data.node
                                .original.item_details.id);
                            $("#moveuser_search_header_move").val(data.node.original
                                .item_details.name);
                        });

                        var device_sale_search_options = {
                            data: response.searchTree,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $(
                                            "#movedevice_search_header_sale")
                                        .getSelectedItemData().id;
                                    //$(".jstree-clicked").scrollIntoView();
                                    //$("#deviceMovement_treeview_header_sale").find('#' + selectedItemValue + "_anchor").scrollIntoView();
                                    //console.log($("#deviceMovement_treeview_header_sale").find('#' + selectedItemValue + "_anchor"));
                                    $("#deviceMovement_treeview_header_sale")
                                        .jstree().deselect_all(true);
                                    $("#deviceMovement_treeview_header_sale")
                                        .jstree("select_node", "#" +
                                            selectedItemValue);
                                    $("#deviceMovement_treeview_header_sale")
                                        .jstree(true)._open_to(selectedItemValue)
                                        .focus();
                                    $("#device_moving_to_header_sale").val(
                                        selectedItemValue).trigger("change");
                                    console.log(selectedItemValue);
                                },
                                onHideListEvent: function() {}
                            }
                        };
                        var device_move_search_options = {
                            data: response.searchTree,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $(
                                            "#movedevice_search_header_move")
                                        .getSelectedItemData().id;
                                    document.getElementById(selectedItemValue +
                                        "_anchor").scrollIntoView();
                                    $("#deviceMovement_treeview_header_move")
                                        .jstree().deselect_all(true);
                                    $("#deviceMovement_treeview_header_move")
                                        .jstree("select_node", "#" +
                                            selectedItemValue);
                                    $("#deviceMovement_treeview_header_move")
                                        .jstree(true)._open_to(selectedItemValue)
                                        .focus();
                                },
                                onHideListEvent: function() {}
                            }
                        };
                        var user_move_search_options = {
                            data: response.searchTree,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $(
                                            "#moveuser_search_header_move")
                                        .getSelectedItemData().id;
                                    document.getElementById(selectedItemValue +
                                        "_anchor").scrollIntoView();
                                    $("#userMovement_treeview_header_move").jstree()
                                        .deselect_all(true);
                                    $("#userMovement_treeview_header_move").jstree(
                                        "select_node", "#" + selectedItemValue);
                                    $("#userMovement_treeview_header_move").jstree(
                                            true)._open_to(selectedItemValue)
                                        .focus();
                                },
                                onHideListEvent: function() {}
                            }
                        };
                        var user_sale_search_options = {
                            data: response.searchTree,
                            getValue: function(element) {
                                return element.name;
                            },
                            list: {
                                match: {
                                    enabled: true
                                },
                                onSelectItemEvent: function() {
                                    var selectedItemValue = $(
                                            "#moveuser_search_header_sale")
                                        .getSelectedItemData().id;
                                    document.getElementById(selectedItemValue +
                                        "_anchor").scrollIntoView();
                                    $("#userMovement_treeview_header_sale").jstree()
                                        .deselect_all(true);
                                    $("#userMovement_treeview_header_sale").jstree(
                                        "select_node", "#" + selectedItemValue);
                                    $("#userMovement_treeview_header_sale").jstree(
                                            true)._open_to(selectedItemValue)
                                        .focus();
                                },
                                onHideListEvent: function() {}
                            }
                        };

                        $("#movedevice_search_header_sale").easyAutocomplete(
                            device_sale_search_options);
                        $("#movedevice_search_header_move").easyAutocomplete(
                            device_move_search_options);
                        $("#moveuser_search_header_sale").easyAutocomplete(
                            user_sale_search_options);
                        $("#moveuser_search_header_move").easyAutocomplete(
                            user_move_search_options);
                    },
                    error: function(reject) {
                        errorMsg();
                    }
                });



            });

            $scope.searchItem = function(item) {

                $scope.device_result = [];
                $scope.user_result = [];
                if (item == 'device') {
                    load_spinner('show', 'show_device_loader', '');
                } else if (item == 'user') {
                    load_spinner('show', 'show_user_loader', '');
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dealer/search_item')}}/" + item,
                    data: {
                        'data': $("#search_field").val(),
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        $("#searchModal").modal("show");
                        if (item == 'device') {
                            $scope.device_result = response;
                            $scope.current_item = 'device';
                            $scope.$apply();

                        } else if (item == 'user') {
                            $scope.user_result = response;
                            $scope.current_item = 'user';
                            $scope.$apply();
                        }

                        if (item == 'device') {
                            $("#device_tab_menu").click();
                            $("#go_back_device").click();
                        } else if (item == 'user') {
                            $("#user_tab_menu").click();
                            $("#go_back_user").click();
                        }
                        if (item == 'device') {
                            load_spinner('hide', 'show_device_loader', '');
                        } else if (item == 'user') {
                            load_spinner('hide', 'show_user_loader', '');
                        }

                    },
                    error: function(reject) {
                        errorMsg();

                    }
                });
            }
            $scope.innerSearchItem = function() {
                $scope.device_result = [];
                $scope.user_result = [];
                if ($scope.current_item == 'device') {
                    load_spinner('show', 'show_device_loader', '');
                } else if ($scope.current_item == 'user') {
                    load_spinner('show', 'show_user_loader', '');
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dealer/search_item')}}/" + $scope.current_item,
                    data: {
                        'data': $("#search_field").val(),
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        if ($scope.current_item == 'device') {
                            $scope.device_result = response;
                            $scope.$apply();

                        } else if ($scope.current_item == 'user') {
                            $scope.user_result = response;
                            $scope.$apply();
                        }
                        if ($scope.current_item == 'device') {
                            $("#device_tab_menu").click();
                            $("#go_back_device").click();
                        } else if ($scope.current_item == 'user') {
                            $("#user_tab_menu").click();
                            $("#go_back_user").click();
                        }

                        if ($scope.current_item == 'device') {
                            load_spinner('hide', 'show_device_loader', '');
                        } else if ($scope.current_item == 'user') {
                            load_spinner('hide', 'show_user_loader', '');
                        }

                    },
                    error: function(reject) {
                        errorMsg();

                    }
                });
            }

            $scope.show_details = function(item, data) {
                if (item == 'device') {
                    $scope.show_details_item = 'device';
                    $scope.current_device = data;
                    showParents($scope.current_device.customer_id);

                    $("#result_tab").slideUp();
                    $("#sliding_section_device").removeClass('d-none');
                } else if (item == 'user') {
                    $scope.show_details_item = 'user';
                    $scope.current_user = data;
                    showParents($scope.current_user.id);
                    $("#result_tab").slideUp();
                    $("#sliding_section_user").removeClass('d-none');
                }
            }

            function parseNodes(nodes) { // takes a nodes array and turns it into a <ol>
                var ol = "<tbody>";
                for (var i = 0; i < nodes.length; i++) {
                    ol += parseNode(nodes[i], i);
                }
                return ol + '</tbody>';
            }

            function parseNode(node, current_index) {
                var current_item;
                if ($scope.show_details_item == 'device') {
                    current_item = $scope.current_device.customer_id;
                }
                if ($scope.show_details_item == 'user') {
                    current_item = $scope.current_user.id;
                }
                var dash_line = "-";
                for (var x = 0; x < current_index; x++) {
                    dash_line += '-';
                }
                var reset_pass = (node.id == current_item) ?
                    '| <a href="#">Reset Pass</a>' : '';
                var li = "<tr>";
                var my_url = "{{URL::to('/dealer/v1/monitor')}}/";
                li += '<td>' + dash_line + ' <span class="double_click_item" data-rel="' + node.only_name +
                    '" data-id="' + node.id + '">' + node.only_name + '</span></td><td>' + node.item_details
                    .username +
                    '</td>' + '<td><a href="' + my_url + node.id + '" target="_blank">Monitor</a>&nbsp; ' +
                    reset_pass + '</td></tr>';
                if (node.children && node.id != current_item) {
                    li += parseNodes(node.children);
                }
                return li;

                /* if (node.children && node.id!=current_item){
                    li +=parseNodes(node.children);
                    return li;
                }
                if (node.id==current_item){
                    return li;
                    break;
                }  */
            }

            $(document).on('dblclick', '.double_click_item', function() {
                window.open("{{URL::to('/dealer/business')}}?user=" + $(this).data('id') + '&name=' + $(
                    this).data('rel'), "_self");
            });

            $scope.device_command_list = function() {
                $scope.my_command_list = [];

                $http.get("{{url('dealer/devicecommand')}}/" + $scope.current_device.device_model).then(
                    function(res) {
                        $scope.my_command_list = res.data;
                        $('#list-tab a').first().trigger('click');
                    });
            }

            $scope.click_push_command = function(cmd) {
                console.log($scope.current_device);
                if (cmd.command_name == 'Reset') {
                    $("#command_password").removeClass('d-none');
                    $("#command_password").addClass('show');
                } else {
                    $("#command_password").removeClass('show');
                    $("#command_password").addClass('d-none');
                }
                $("#command_name_label").text(cmd.command_name);
                $("#selected_device_name").val($scope.current_device.device_name);
                $("#selected_command_name").val(cmd.command_text);
                $("#selected_command_type").val(cmd.command_type);
                $("#sendCommand").attr('disabled', false);

            }

            function showParents(find) {
                if ($scope.show_details_item == 'device') {
                    load_spinner('show', 'show_parents_loader', '');
                }
                if ($scope.show_details_item == 'user') {
                    load_spinner('show', 'show_user_parents_loader', '');
                }
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ url('dealer/showTree') }}/" + $("#auth_user_id").val(),
                    success: function(response) {
                        var array = response;
                        result = JSON.parse(JSON.stringify(array)).filter(function search(a) {
                            var children;
                            if (a.id === find) {
                                return true;
                            }
                            if (!Array.isArray(a.children)) {
                                return false;
                            }
                            children = a.children.filter(search);
                            if (children.length) {
                                a.children = children;
                                return true;
                            }
                        });
                        console.log(result);
                        console.log('current item: ' + $scope.show_details_item);
                        if ($scope.show_details_item == 'device') {
                            $("#device_parent_list").html(parseNodes(result));
                            load_spinner('hide', 'show_parents_loader', '');
                        }
                        if ($scope.show_details_item == 'user') {
                            $("#user_parent_list").html(parseNodes(result));
                            load_spinner('hide', 'show_user_parents_loader', '');
                        }

                    },
                    error: function(reject) {
                        errorMsg();
                    }
                });

            }

            $('#saveCommandForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('dealer/saveCommand') }}",
                    data: {
                        'name': $("#command_name_label").text(),
                        'imei': $scope.current_device.imei,
                        'cmd': $("#selected_command_name").val(),
                        'gateway': 'gprs',
                        'type': $("#selected_command_type").val(),
                        'password': $("#command_confirm_pass").val(),
                        _token: "{{ csrf_token() }}",
                        _method: "POST"
                    },
                    success: function(response) {
                        if (response == 1) {
                            successMsg($("#command_name_label").text() +
                                " command sent successfully");
                        } else {
                            errorMsg();
                        }

                    },
                    error: function(reject) {
                        errorMsg();
                        if (reject.status === 422 || reject.status === 403) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.error.message, function(key, val) {
                                $("small#" + key + "-error").text(val[0]);
                            });
                        }
                    }
                });
            });

            /*  function goto_my_monitor(myid) {
                 window.open("{{URL::to('/dealer/v1/monitor')}}/" + myid, "_blank");
             } */

            function load_spinner(type, hide_element, show_element) {
                if (type == 'hide') {
                    $("#" + hide_element).removeClass('show');
                    $("#" + hide_element).addClass('d-none');
                }
                if (type == 'show') {
                    $("#" + hide_element).removeClass('d-none');
                    $("#" + hide_element).addClass('show');
                }

            }

        });
        app.filter('highlightKeywords', function($sce) {
            // returns all words in a sentence as an array, ignoring extra whitespace
            var stringToArray = function(input) {
                if (input) {
                    return input.match(/\S+/g);
                } else {
                    return [];
                }
            };

            // returns regex that basically says 'match any word that starts with one of my keywords'
            var getRegexPattern = function(keywordArray) {


                var pattern = "(^|\\b)(" + keywordArray.join("|") + ")";

                return new RegExp(pattern, "gi");

            };

            return function(textToHighlight, keywords) {
                var filteredText = textToHighlight;
                if (keywords !== "") {

                    var keywordList = stringToArray(keywords);

                    var pattern = getRegexPattern(keywordList);
                    //console.log(pattern);

                    filteredText = textToHighlight.replace(pattern, '<span class="highlighted">$2</span>');

                }

                return $sce.trustAsHtml(filteredText);
            };
        });

        $(document).ready(function() {
            var url = window.location.href;
            // Will only work if string in href matches with location
            $('.kt-menu__item a[href="' + url + '"]').parents('li').addClass(
                'kt-menu__item--active');
            // Will also work for relative and absolute hrefs
            // $('.kt-menu__item a').filter(function() {
            //     return this.href == url;
            // }).addClass('current_menu');
        });
        </script>
    </div>

    <!-- end:: Header Topbar -->
    <div class="modal" id="searchModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title" id="edit_device_title"> Search Device & User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="height:80vh; overflow: auto;">

                    <div class="kt-form">
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body text-dark">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#device_tab" id="device_tab_menu"
                                                class="active nav-link">Device </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#user_tab" id="user_tab_menu"
                                                class="nav-link">User</a>
                                        </li>

                                    </ul>
                                    <div class="row justify-content-center my-4">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" id="search_field" ng-model="search_item"
                                                    class="form-control custom-search" placeholder="Search here">
                                                <div class="input-group-append">

                                                    <button type="button" id="search_device_user"
                                                        ng-click="innerSearchItem()"
                                                        class="btn btn-info custom-info btn-sm">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="result_tab">
                                        <div class="tab-pane active" id="device_tab" role="tabpanel">
                                            <div id="show_device_loader" class="col-sm-12 text-center d-none"
                                                style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                                <img src="{{asset('assets/images/loading.gif')}}"
                                                    style="width:130px; height:auto;">
                                            </div>

                                            <table style="width:100% background:#ccc;" class="my-2">
                                                <tr>
                                                    <!-- <td style="text-align:left;"><i class="fa fa-search"></i> Search
                                                    </td> -->
                                                    <td style="text-align:right;">Total @{{device_result.length}}
                                                        records matched</td>
                                                </tr>
                                            </table>
                                            <div class="custom-table-tab">

                                                <table class="table table-hover table-stiped table-bordered">
                                                    <thead class="fixed-table-head">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Device Name</th>
                                                            <th>IMEI</th>
                                                            <th>SIM Card</th>
                                                            <th>Model</th>
                                                            <th>Operation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-body">
                                                        <tr
                                                            ng-repeat="d in device_result | filterBy: ['device_name','imei','sim_number','model_name']: search_item">
                                                            <td>@{{$index+1}}</td>
                                                            <td><span ng-if="(d.unit_status==1)"
                                                                    class="kt-badge  kt-badge--success crm_status_badge">
                                                                </span>
                                                                <span ng-if="(d.unit_status==0)"
                                                                    class="kt-badge  kt-badge--warning crm_status_badge">
                                                                </span>
                                                                <span
                                                                    ng-bind-html="d.device_name | highlightKeywords:search_item"></span>
                                                                <span class="kt-badge kt-badge--inline"
                                                                    style="background-color:@{{d.status_color}}">
                                                                    @{{d.status_name}} </span>
                                                            </td>
                                                            <td><span
                                                                    ng-bind-html="d.imei | highlightKeywords:search_item"></span>
                                                            </td>
                                                            <td> <span
                                                                    ng-bind-html="d.sim_number | highlightKeywords:search_item"></span>
                                                            </td>
                                                            <td><span
                                                                    ng-bind-html="d.model_name | highlightKeywords:search_item"></span>
                                                            </td>
                                                            <td> <a href="javascript:;"
                                                                    ng-click="show_details('device',d)">Details</a> |
                                                                Playback</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="user_tab" role="tabpanel">
                                            <div id="show_user_loader" class="col-sm-12 text-center d-none"
                                                style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                                <img src="{{asset('assets/images/loading.gif')}}"
                                                    style="width:130px; height:auto;">
                                            </div>
                                            <table style="width:100% background:#ccc;" class="my-2">
                                                <tr>
                                                    <!-- <td style="text-align:left;"><i class="fa fa-search"></i> Search
                                                    </td> -->
                                                    <td style="text-align:right;">Total @{{user_result.length}} records
                                                        matched</td>
                                                </tr>
                                            </table>
                                            <div class="custom-table-tab">
                                                <table class="table table-hover table-stiped table-bordered">
                                                    <thead class="fixed-table-head">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>User Name</th>
                                                            <th>User ID</th>
                                                            <th>Phone</th>
                                                            <th>Role</th>
                                                            <th>Operation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr
                                                            ng-repeat="u in user_result | filterBy: ['name','username','phone']: search_item">
                                                            <td>@{{$index+1}}</td>
                                                            <td>
                                                                <span ng-if="(u.active==1)"
                                                                    class="kt-badge  kt-badge--success crm_status_badge">
                                                                </span>
                                                                <span ng-if="(u.active==0)"
                                                                    class="kt-badge  kt-badge--warning crm_status_badge">
                                                                </span>
                                                                <span
                                                                    ng-bind-html="u.name | highlightKeywords:search_item"></span>
                                                                <span
                                                                    class="kt-badge kt-badge--@{{u.status_color}}  kt-badge--inline">
                                                                    @{{u.status_name}} </span>
                                                            </td>
                                                            <td><span
                                                                    ng-bind-html="u.username | highlightKeywords:search_item"></span>
                                                            </td>
                                                            <td><span
                                                                    ng-bind-html="u.phone | highlightKeywords:search_item"></span>
                                                            </td>
                                                            <td>@{{(u.actor_type==1)?'Dealer':'End User'}}</td>
                                                            <td> <a href="javascript:;"
                                                                    ng-click="show_details('user',u)">Details</a> |
                                                                Playback</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-none" id="sliding_section_device">
                                        <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line position-relative"
                                            data-remember-tab="tab_id" role="tablist" style="margin:5px">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab"
                                                    href="#kt_builder_membership">Membership</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_details">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_track">Track</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#kt_builder_sale">Sale</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#kt_builder_move">Move</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_playback">Playback</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_recharge">Recharge</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" ng-click="device_command_list()" data-toggle="tab"
                                                    href="#kt_builder_command">Command</a>
                                            </li>
                                            <a href="javascript:;" id="go_back_device" class="go-back"> <i
                                                    class="fas fa-arrow-circle-left mr-1"></i> Back</a>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <!--begin::Tab Pane-->
                                            <div class="tab-pane custom-table-tab active" id="kt_builder_membership">
                                                <div id="show_parents_loader" class="col-sm-12 text-center d-none"
                                                    style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                                    <img src="{{asset('assets/images/loading.gif')}}"
                                                        style="width:130px; height:auto;">
                                                </div>
                                                <table style="width:100%;" class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>UserName</th>
                                                            <th>Operation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <table id="device_parent_list"
                                                            class="table table-hover table-striped table_parent_list">

                                                        </table>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Tab Pane-->
                                            <!--begin::Tab Pane-->
                                            <div class="tab-pane custom-table-tab" id="kt_builder_details">
                                                <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line custom-nav-tabs-line"
                                                    data-remember-tab="tab_id" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab"
                                                            href="#kt_builder_1">Device info</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab"
                                                            href="#kt_builder_2">Sensor config</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab"
                                                            href="#kt_builder_3">Event</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab"
                                                            href="#kt_builder_4">Overview status</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab"
                                                            href="#kt_builder_5">Parameter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " data-toggle="tab" href="#kt_builder_6">Tu
                                                            status log</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-3">
                                                    <!--begin::Tab Pane-->
                                                    <div class="tab-pane active" id="kt_builder_1">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Device
                                                                    Name</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="hidden" class="form-control"
                                                                        name="edit_device_id_header"
                                                                        id="edit_device_id_header"
                                                                        value="@{{current_device.id}}">
                                                                    <input type="text" class="form-control"
                                                                        name="edit_device_name_header"
                                                                        id="edit_device_name_header"
                                                                        value="@{{current_device.device_name}}">
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">TU ID</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control"
                                                                        name="edit_unit_id_header"
                                                                        id="edit_unit_id_header">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Vehicle Plate
                                                                    No</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control"
                                                                        name="edit_plate_no_header"
                                                                        id="edit_plate_no_header">
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">Model</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control"
                                                                        name="edit_model_name_header"
                                                                        id="edit_model_name_header"
                                                                        value="@{{current_device.model_name}}" disabled>
                                                                </div>


                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">IMEI</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text" class="form-control"
                                                                        name="edit_imei_header" id="edit_imei_header"
                                                                        value="@{{current_device.imei}}" disabled>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">SIM No</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="number" class="form-control"
                                                                        name="edit_sim_number_header"
                                                                        value="@{{current_device.sim_number}}"
                                                                        id="edit_sim_number_header">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Opening
                                                                    Date</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"
                                                                            name="edit_opening_date_header"
                                                                            value="@{{current_device.opening_date}}"
                                                                            placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">User Block
                                                                    Date</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"
                                                                            name="platform_expire_date"
                                                                            placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Fuel
                                                                    Consumption</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control"
                                                                            id="edit_fuel_consumption_value_header"
                                                                            name="edit_fuel_consumption_value_header"
                                                                            value="@{{current_device.fuel_consumption}}"
                                                                            placeholder="Enter fuel consumption value" />
                                                                        <div class="input-group-append">
                                                                            <span
                                                                                class="input-group-text">L/100km</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-lg-2 col-form-label">Fuel Tank
                                                                    Volume</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"
                                                                            name="fuel_tank_volume"
                                                                            placeholder="Enter fuel tank volume" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">L</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Average Fuel
                                                                    Price</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"
                                                                            id="edit_ave_fuel_price_header"
                                                                            name="edit_ave_fuel_price_header"
                                                                            value="@{{current_device.average_fuel_price}}"
                                                                            placeholder="Enter average fuel price" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">L</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <label class="col-lg-2 col-form-label">User Due</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <input type="text"
                                                                        class="form-control datePickerTop"
                                                                        name="user_due"
                                                                        value="@{{current_device.user_due}}"
                                                                        placeholder="Enter user due" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-lg-2 col-form-label">Online
                                                                    Time</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control datePickerTop"
                                                                            name="online_time"
                                                                            placeholder="MM/DD/YYYY" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="la la-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label class="col-lg-2 col-form-label">Speeding
                                                                    Value</label>
                                                                <div class="col-lg-4 col-md-9 mb-4">
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"
                                                                            name="edit_speeding_value_header"
                                                                            id="edit_speeding_value_header"
                                                                            value="@{{current_device.speeding_value}}"
                                                                            placeholder="Enter speeding value" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                kmh
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 ">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm float-left"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" id="edit_device_save_header"
                                                                        class="btn btn-success btn-sm float-right">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Tab Pane-->
                                                    <!--begin::Tab Pane-->
                                                    <div class="tab-pane custom-table-tab" id="kt_builder_2">

                                                    </div>
                                                    <div class="tab-pane custom-table-tab" id="kt_builder_3">

                                                    </div>
                                                    <!--end::Tab Pane-->
                                                    <!--begin::Tab Pane-->
                                                    <div class="tab-pane" id="kt_builder_4">

                                                    </div>
                                                    <!--end::Tab Pane-->

                                                </div>
                                            </div>
                                            <div class="tab-pane custom-table-tab" id="kt_builder_sale">
                                                <form id="saveSaleDeviceForm">
                                                    <div class="modal-body  text-dark">
                                                        @csrf
                                                        @method('POST')
                                                        <!-- Form content start -->
                                                        <div class=" row form-group">
                                                            <label for="name" class="col-md-3 col-form-label">Target
                                                                user
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input id="movedevice_search_header_sale"
                                                                    class="form-control" type="text"
                                                                    placeholder="search" style="margin-left:5px;">
                                                                <small id="target_user-error" class="text-danger"
                                                                    for="name"></small>
                                                                <input type="hidden" class="form-control"
                                                                    name="device_moving_to_header_sale"
                                                                    id="device_moving_to_header_sale">
                                                                <div class="input-group"
                                                                    id="deviceMovement_treeview_header_sale"
                                                                    style="height: 30vh;   overflow: auto;">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class=" row form-group">
                                                            <label for="username" class="col-md-3 col-form-label">IMEI
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="imei">
                                                                <small id="imei-error" class="text-danger"></small>
                                                            </div>
                                                        </div>

                                                        <div class=" row form-group">
                                                            <label for="email" class="col-md-3 col-form-label">Device
                                                                name</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email"
                                                                class="col-md-3 col-form-label">Account</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="account">
                                                                <small id="account-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email" class="col-md-3 col-form-label">Sim
                                                                card</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email"
                                                                class="col-md-3 col-form-label">Remark</label>
                                                            <div class="col-md-5">
                                                                <textarea id="move_sale_list" name="move_sale_list"
                                                                    class="form-control" rows="3"></textarea>
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-button">
                                                        <!-- <button type="button" id="cancle" class="btn btn-danger btn-sm">Cancel</button> -->

                                                        <input type="submit" class="btn btn-success btn-sm float-right"
                                                            value="Save">
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane custom-table-tab" id="kt_builder_move">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label text-lg-right">Target
                                                        User</label>
                                                    <div class="col-md-5">
                                                        <input id="moveuser_search_header_move" class="form-control"
                                                            type="text" placeholder="search" style="margin-left:5px;">
                                                        <div class="clearfix">&nbsp;</div>
                                                        <input type="hidden" class="form-control"
                                                            name="device_moving_to_header_move"
                                                            id="device_moving_to_header_move">
                                                        <div class="input-group"
                                                            id="deviceMovement_treeview_header_move"
                                                            style="height: 30vh;   overflow: auto;">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label text-lg-right">IMEI</label>
                                                    <div class="col-md-5">
                                                        <textarea id="moving_imei_list_header"
                                                            name="moving_imei_list_header" class="form-control"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label class="col-lg-3 col-form-label text-lg-right"></label>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <button type="button" id="header_move_device_save"
                                                            onClick="header_save_device_movement()"
                                                            class="btn btn-success btn-sm float-right">Move</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end::Tab Pane-->
                                            <!--begin::Tab Pane-->
                                            <div class="tab-pane custom-table-tab" id="kt_builder_command">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="list-group" id="list-tab" role="tablist"
                                                            style="height: 60vh; overflow: auto;">

                                                            <a ng-repeat="c in my_command_list"
                                                                class="list-group-item list-group-item-action"
                                                                data-toggle="list" href="javascript:;"
                                                                ng-click="click_push_command(c)" role="tab"
                                                                aria-controls="home">@{{c.command_name}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div style="height: 60vh; overflow: auto;">
                                                            <div class="form-group row">
                                                                <label class="col-12 col-form-label float-left">
                                                                    <span class="custom-span-color"> >>
                                                                        <span id="command_name_label"></span>
                                                                    </span>
                                                                </label>
                                                            </div>

                                                            <form id="saveCommandForm">
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">Device
                                                                        Name</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control"
                                                                            id="selected_device_name"
                                                                            disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label">Command</label>
                                                                    <div class="col-8">
                                                                        <input type="text" class="form-control"
                                                                            id="selected_command_name"
                                                                            disabled="disabled" style="color: #ccc;">

                                                                        <input type="hidden" id="selected_command_type">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row d-none"
                                                                    id="command_password">
                                                                    <label class="col-3 col-form-label">Password</label>
                                                                    <div class="col-8">
                                                                        <input type="password" class="form-control"
                                                                            id="command_confirm_pass"
                                                                            placeholder="Please insert your password">
                                                                        <small id="password-error"
                                                                            class="text-danger"></small>
                                                                    </div>
                                                                    <input type="hidden" id="device_model_id">

                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-3 col-form-label"></label>
                                                                    <div class="col-8">
                                                                        <button type="submit" id="sendCommand"
                                                                            class="btn btn-custom btn-sm">
                                                                            Send</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Tab Pane-->

                                        </div>
                                    </div>

                                    <div class="d-none" id="sliding_section_user">
                                        <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line position-relative"
                                            data-remember-tab="tab_id" role="tablist" style="margin:5px">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab"
                                                    href="#kt_builder_membership_user">Membership</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_details_user">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_sale_user">Sale</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab"
                                                    href="#kt_builder_move_user">Move</a>
                                            </li>

                                            <a href="javascript:;" id="go_back_user" class="go-back"> <i
                                                    class="fas fa-arrow-circle-left mr-1"></i> Back</a>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane custom-table-tab active"
                                                id="kt_builder_membership_user">
                                                <div id="show_user_parents_loader" class="col-sm-12 text-center d-none"
                                                    style="position: absolute; left: 0%; display: flex; align-items: center; justify-content: center; z-index: 99999;">
                                                    <img src="{{asset('assets/images/loading.gif')}}"
                                                        style="width:130px; height:auto;">
                                                </div>
                                                <table style="width:100%;" class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>UserName</th>
                                                            <th>Operation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <table id="user_parent_list"
                                                            class="table table-hover table-striped">

                                                        </table>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane custom-table-tab" id="kt_builder_details_user">
                                                <form id="saveUserForm">
                                                    <div class="modal-body  text-dark">
                                                        @csrf
                                                        @method('POST')
                                                        <!-- Form content start -->
                                                        <div class=" row form-group">
                                                            <label for="name" class="col-lg-3 col-form-label">Name
                                                            </label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="name">
                                                                <small id="name-error" class="text-danger"
                                                                    for="name"></small>
                                                            </div>
                                                        </div>

                                                        <div class=" row form-group">
                                                            <label for="username"
                                                                class="col-lg-3 col-form-label">Username </label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="username">
                                                                <small id="username-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="employment_id"
                                                                class="col-lg-3 col-form-label">Employment ID</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control"
                                                                    name="employment_id">
                                                                <small id="employment_id-error"
                                                                    class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="password"
                                                                class="col-lg-3 col-form-label">Password </label>
                                                            <div class="col-lg-9">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text" id="pass-tggl"><i
                                                                                id="icon" class="fas fa-eye"></i></div>
                                                                    </div>
                                                                </div>
                                                                <small id="password-error" class="text-danger"
                                                                    for="password"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="password_confirmation"
                                                                class="col-lg-3 col-form-label">Confirm Password
                                                            </label>
                                                            <div class="col-lg-9">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control"
                                                                        id="password_confirmation"
                                                                        name="password_confirmation">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text"
                                                                            id="conf-pass-tggl"><i id="icon-conf"
                                                                                class="fas fa-eye"></i></div>
                                                                    </div>
                                                                </div>
                                                                <small id="password-error" class="text-danger"
                                                                    for="password"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email"
                                                                class="col-lg-3 col-form-label">Email</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Phone</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="phone">
                                                                <small id="phone-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Mobile</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="mobile">
                                                                <small id="mobile-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Skype ID</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" class="form-control" name="skype_id">
                                                                <small id="skype_id-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="role"
                                                                class="col-lg-3 col-form-label">Role</label>
                                                            <div class="col-lg-9">
                                                                <select name="role" class="form-control kt-select2-2">
                                                                    <option value="">Select One</option>

                                                                </select>
                                                                <small id="role-error" class="text-danger"
                                                                    for="role"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="depertment"
                                                                class="col-lg-3 col-form-label">Depertment</label>
                                                            <div class="col-lg-9">
                                                                <select name="depertment"
                                                                    class="form-control kt-select2-2">
                                                                    <option value="">Select One</option>

                                                                </select>
                                                                <small id="depertment-error" class="text-danger"
                                                                    for="depertment"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="role" class="col-lg-3 col-form-label">User
                                                                Status</label>
                                                            <div class="col-lg-9">
                                                                <select name="user_status"
                                                                    class="form-control kt-select2-2">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                </select>
                                                                <small id="user_status-error" class="text-danger"
                                                                    for="role"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="role" class="col-lg-3 col-form-label">Profile
                                                                Photo</label>
                                                            <div class="col-lg-4">
                                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle"
                                                                    id="kt_apps_user_add_avatar">
                                                                    <div>
                                                                        <img class="kt-avatar__holder" id="img-crop"
                                                                            src="{{asset('assets/media/users/default.jpg')}}"
                                                                            alt="">
                                                                    </div>
                                                                    <label class="kt-avatar__upload"
                                                                        data-toggle="kt-tooltip" title=""
                                                                        data-original-title="Change avatar">
                                                                        <i class="fa fa-pen"></i>
                                                                        <input type="file" name="image" id="image"
                                                                            accept=".png, .jpg, .jpeg">
                                                                    </label>
                                                                    <span class="kt-avatar__cancel"
                                                                        data-toggle="kt-tooltip" title=""
                                                                        data-original-title="Cancel avatar">
                                                                        <i class="fa fa-times"></i>
                                                                    </span>
                                                                </div>
                                                                <small id="image-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <!-- Form content end -->
                                                    </div>
                                                    <div class="form-button">
                                                        <!-- <button type="button" id="cancle" class="btn btn-danger btn-sm">Cancel</button> -->

                                                        <input type="submit" class="btn btn-success btn-sm float-right"
                                                            value="Save">
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane custom-table-tab" id="kt_builder_sale_user">
                                                <form id="saveSaleUserForm">
                                                    <div class="modal-body  text-dark">
                                                        @csrf
                                                        @method('POST')
                                                        <!-- Form content start -->
                                                        <div class=" row form-group">
                                                            <label for="name" class=" col-md-3 col-form-label">Target
                                                                user
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input id="moveuser_search_header_sale"
                                                                    class="form-control" type="text"
                                                                    placeholder="Search" style="margin-left:5px;">
                                                                <div class="clearfix">&nbsp;</div>
                                                                <Input type="hidden" id="moving_to_parent_header_sale">
                                                                <div class="input-group"
                                                                    id="userMovement_treeview_header_sale"
                                                                    style="height: 30vh;   overflow: auto;">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class=" row form-group">
                                                            <label for="username" class="col-md-3 col-form-label">IMEI
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="imei">
                                                                <small id="imei-error" class="text-danger"></small>
                                                            </div>
                                                        </div>

                                                        <div class=" row form-group">
                                                            <label for="email" class="col-md-3 col-form-label">Device
                                                                name</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email"
                                                                class="col-md-3 col-form-label">Account</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="email" class="col-md-3 col-form-label">Sim
                                                                card</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="email">
                                                                <small id="email-error" class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                        <div class=" row form-group">
                                                            <label for="moving_user_list_header_sale"
                                                                class="col-md-3 col-form-label">Remark</label>
                                                            <div class="col-md-5">
                                                                <textarea id="moving_user_list_header_sale"
                                                                    name="moving_user_list_header_sale"
                                                                    class="form-control" rows="3"></textarea>
                                                                <small id="moving_user_list_header_sale-error"
                                                                    class="text-danger"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-button">
                                                        <!-- <button type="button" id="cancle" class="btn btn-danger btn-sm">Cancel</button> -->

                                                        <input type="submit" id="submit"
                                                            class="btn btn-success btn-sm float-right" value="Save">
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="tab-pane custom-table-tab" id="kt_builder_move_user">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label text-lg-right">Target
                                                        User</label>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <input id="moveuser_search_header" class="form-control"
                                                            type="text" placeholder="Search" style="margin-left:5px;">
                                                        <div class="clearfix">&nbsp;</div>
                                                        <Input type="hidden" id="moving_to_parent_header">
                                                        <div class="input-group" id="userMovement_treeview_header_move"
                                                            style="height: 30vh;  overflow: auto;">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label text-lg-right">User</label>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <input type="text" class="form-control" name="user">
                                                        <small id="user-error" class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label class="col-lg-3 col-form-label text-lg-right"></label>
                                                    <div class="col-lg-9 col-xl-4">
                                                        <button type="button" id="move_device_save"
                                                            onClick="save_device_movement()"
                                                            class="btn btn-success btn-sm float-right">Move</button>
                                                    </div>
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
                    <button type="button" class="btn btn-danger btn-sm float-right" data-dismiss="modal">Cancel</button>

                </div>

            </div>
        </div>
    </div>
</div>