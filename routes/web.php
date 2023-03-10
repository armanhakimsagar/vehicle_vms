<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Enduser\UserController;

/*
|--
| Web Routes
|--
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

 */



Auth::routes();

Route::namespace('Auth')->group(function () {
    Route::get('admin/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'AdminLoginController@login')->name('admin.login.submit');

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'DealerLoginController@login')->name('dealer.login.submit');
});

// Admin routing section--------------

Route::group(['namespace' => 'Admin', 'middleware' => ['auth:system_admin']], function () {

    Route::get('/', function () {
        return view('admin.home');
    });

    // Area Info
    Route::get('getDistrict', 'AreaController@getDistrict');
    Route::get('getThana', 'AreaController@getThana');

    Route::get('/home', 'HomeController@index')->name('systemadmin.dashboard');

    Route::get('/admin_login_history', 'AdminController@loginHistory');
    Route::get('/tu_status_log', 'AdminController@tuStatusLog');
    Route::get('/system_config', 'AdminController@system_config');
    Route::post('/system_config/{types}', 'AdminController@update_system_config');
    Route::get('/login_template', 'AdminController@login_template');
    Route::post('/store_template/{id}', 'AdminController@store_template');
    Route::get('/single_login_template/{id}', 'AdminController@single_login_template');
    Route::get('/menu_config', 'AdminController@menu_config');
    Route::post('/menu_config_update', 'AdminController@menu_config_update');


    // Route::post('role/get-list','RoleController@getData');

    // Depertment
    Route::resource('department', 'DepertmentController');


    // User
    Route::resource('user', 'UserController');
    Route::post('userUpdate/{id}', 'UserController@update');
    Route::get('user_reset_password/{id}', 'UserController@resetPassForm');
    Route::post('user_reset_password/{id}', 'UserController@resetPass');
    // Profile
    Route::resource('profile', 'ProfileController');
    Route::get('profiles/{pages?}', 'ProfileController@showPages');
    Route::post('profile/change-pass', 'ProfileController@storeChangePass');

    // Product
    Route::resource('product', 'ProductController');
    Route::post('product/get-list', 'ProductController@getData');

    // Server
    Route::resource('server', 'ServerController');

    // Device
    Route::resource('device', 'DeviceController');

    // Protocale
    Route::resource('protocale', 'ProtocaleController');



    //end:: distributor------------

    //begin:: enduser------------

    // Enduser
    Route::resource('enduser/home', 'EnduserController');

    // Monitor
    Route::resource('monitor', 'MonitorController');

    // Report
    Route::resource('report', 'ReportController');

    Route::post('report/generateReport', 'ReportController@generate_report');
    Route::resource('gateway', 'GatewayController');
    Route::resource('usergroup', 'UserGroupController');
    Route::resource('menu', 'MenuController');
    Route::get('permission_management', 'UserController@permission_management');
    Route::get('get_permission/{id}', 'UserController@get_permission');
    Route::post('save_permission', 'UserController@save_permission');
    Route::get('test_gateway/{type}', 'GatewayController@test_gateway');
    //end:: enduser------------
    Route::get('/complain', 'AdminComplainController@index');
    Route::post('/complain/saveComplain/{id}', 'AdminComplainController@saveData');
    Route::post('/complain/getComplainData', 'AdminComplainController@list');
    Route::get('/complain/getComplainData/{type}/{id}', 'AdminComplainController@getComplainData');
    Route::post('/complain/complain_at_a_glance', 'AdminComplainController@at_a_glance');
});


//enduser routing section------------------

Route::group(['namespace' => 'Enduser', 'middleware' => 'auth:admin'], function () {

    Route::get('sms/settings/test/{number}','SmsController@testSMS');
    Route::get('sms/settings', 'SmsController@index')->name('sms_settings_index');
    Route::get('sms/settings/create', 'SmsController@create')->name('sms.settings.create');
    Route::post('sms/settings/store', 'SmsController@store')->name('sms.settings.store');
    Route::get('sms/settings/edit/{id}', 'SmsController@edit')->name('sms.settings.edit');
    Route::PUT('sms/settings/update/{id}', 'SmsController@update')->name('sms.settings.update');



    Route::get('category-index', 'SmsCategoryController@index')->name('cat.index');
    Route::get('category-create', 'SmsCategoryController@create');
    Route::post('category-store', 'SmsCategoryController@store');
    Route::get('/category/edit/{id}', 'SmsCategoryController@edit');
    Route::PUT('category-update/{id}', 'SmsCategoryController@update');


    Route::get('template-index', 'SmsTemplateController@index')->name('temp.index');
    Route::get('template-create', 'SmsTemplateController@create');
    Route::post('template-store', 'SmsTemplateController@store');
    Route::get('/template/edit/{id}', 'SmsTemplateController@edit');
    Route::PUT('template-update/{id}', 'SmsTemplateController@update');








    Route::get('dashboard/p/', 'ProfileController@profile')->name('enduser.profile');
    Route::get('dashboard/p/{pages}/{dataTab?}', 'ProfileController@profilePage');
    Route::post('dashboard/change-info/{type}', 'ProfileController@changeInfo');
    Route::post('dashboard/branding-info/{type}', 'ProfileController@brandingInfo');
    // Area Info
    Route::get('dashboard/dashboard', 'VmsController@index')->name('admin.dashboard');
    Route::get('user/log/out', 'VmsController@logoutUser')->name('admin.log.out');
    Route::get('dashboard/d/{pages}', 'VmsController@vmsPages'); //dashboard


    Route::resource('department', DepartmentController::class);
    Route::resource('permit', PermissionController::class);
    Route::resource('assign-permit', AssignPermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::get('dashboard/getDistrict', 'AreaController@getDistrict');
    Route::get('dashboard/getThana', 'AreaController@getThana');
    Route::post('dashboard/commonFunction', 'CommonFunctionController@commonData');
    Route::get('dashboard/assigend_staff/{id}', 'CommonFunctionController@assigedStaff');
    Route::get('dashboard/fetch_modal_content/{type}', 'CommonFunctionController@getContent');
    Route::get('dashboard/fetch_filtered_data/{type}', 'CommonFunctionController@fetchFilteredData');
    Route::post('dashboard/saveDocTypeData/{id}', 'VmsController@saveDocType');
    Route::post('dashboard/saveMainTypeData/{id}', 'VmsController@saveMainType');
    Route::post('dashboard/dashboard_at_a_glance', 'VmsController@at_a_glance');
    Route::post('dashboard/docDatalist', 'VmsController@DocDatalist');
    Route::post('dashboard/mainDatalist', 'VmsController@MainDatalist');
    Route::get('dashboard/docTypeList', 'VmsController@docTypeList');
    Route::get('dashboard/mainTypeList', 'VmsController@mainTypeList');
    Route::get('dashboard/itemCategoryList', 'VmsController@itemCategoryList');
    Route::get('dashboard/editPartsCategory/{id}', 'VmsController@editPartsCategory');
    Route::post('dashboard/saveItemCategory/{id}', 'VmsController@saveItemCategory');
    Route::get('dashboard/itemCategory', 'VmsController@itemCategory');
    Route::get('dashboard/itemList', 'VmsController@itemList');
    Route::get('dashboard/editItem/{id}', 'VmsController@editItems');
    Route::post('dashboard/saveItem/{id}', 'VmsController@saveItem');
    Route::get('dashboard/driverData', 'DriverController@index');
    Route::get('dashboard/driver_at_a_glance', 'DriverController@at_a_glance');
    Route::post('dashboard/saveDriverData/{id}', 'DriverController@saveData');
    Route::get('dashboard/driver-detail/{id}', 'DriverController@show');
    Route::get('dashboard/getDriverDataByImie/{id}', 'DriverController@driverInfo');
    Route::post('dashboard/documentDatatable', 'DocumentController@index');
    Route::post('dashboard/saveDocumentData/{id}', 'DocumentController@saveData');
    Route::get('dashboard/editDocumentData/{id}', 'DocumentController@edit');
    Route::get('dashboard/getDocTypeData/{id}', 'DocumentController@getDocTypeData');
    Route::post('dashboard/maintenanceDatatable', 'MaintenanceController@index');
    Route::post('dashboard/saveMaintenanceData/{id}', 'MaintenanceController@saveData');
    Route::get('dashboard/editMaintenanceData/{id}', 'MaintenanceController@edit');
    Route::get('dashboard/vehicleData/{type?}/{id?}', 'VehicleController@index');
    Route::get('dashboard/vehicle_at_a_glance', 'VehicleController@at_a_glance');
    Route::get('dashboard/get_vehicle_list', 'VehicleController@getList');
    Route::post('dashboard/saveVehicleData/{id}', 'VehicleController@saveData');
    Route::get('dashboard/vehicle-detail/{type}/{id}', 'VehicleController@show');
    Route::get('dashboard/vehicle_info/{type}/{id}', 'VehicleController@vehicle_info');
    Route::get('dashboard/vehicle_wise_datatable/{type}/{id}', 'VehicleController@vehicle_wise_datatable');
    Route::post('dashboard/vehicle_insp_check', 'VehicleController@vehicle_insp_check');
    Route::post('dashboard/vehicle-assign-staff/{id}', 'VehicleController@updateAssignedStaff');
    Route::get('dashboard/vehicleStaffDatalist', 'VehicleStaffController@index');
    Route::get('dashboard/vehicle_staff_at_a_glance', 'VehicleStaffController@at_a_glance');
    Route::post('dashboard/saveVehicleStaffData/{id}', 'VehicleStaffController@saveData');
    Route::get('dashboard/vehicle_staff_detail/{id}', 'VehicleStaffController@show');
    Route::get('dashboard/getVehicleGroupData', 'VehicleGroupController@index');
    Route::post('dashboard/saveVehicleGroup/{id}', 'VehicleGroupController@saveData');
    Route::get('dashboard/vehicle-group-detail/{id}', 'VehicleGroupController@show');
    Route::get('dashboard/vehicle-assign-group/{id}', 'VehicleGroupController@assignGroup');
    Route::post('dashboard/vehicle-assign-group/{id}', 'VehicleGroupController@updateAssignGroup');
    Route::post('dashboard/customer_datalist', 'CustomerController@index');
    Route::post('dashboard/saveCustomer/{id}', 'CustomerController@saveData');
    Route::get('dashboard/customer_detail/{id}', 'CustomerController@show');
    Route::get('dashboard/customer_info/{pages}/{id}', 'CustomerController@customer_info');
    Route::post('dashboard/vendor_datalist', 'VendorController@index');
    Route::post('dashboard/saveVendor/{id}', 'VendorController@saveData');
    Route::get('dashboard/vendor_detail/{id}', 'VendorController@show');
    Route::get('dashboard/pdf', 'VendorController@pdf');
    Route::get('dashboard/angularjs', 'VendorController@angularjs');
    Route::post('dashboard/fuelLogData', 'FuelLogController@index');
    Route::post('dashboard/fuel_at_a_glance', 'FuelLogController@at_a_glance');
    Route::post('dashboard/saveFuelCostData/{id}', 'FuelLogController@saveData');
    Route::post('dashboard/saveFuelByObject/{id}', 'FuelLogController@saveFuelLogData');
    Route::post('dashboard/filter_fuel_data', 'FuelLogController@filter_data');
    Route::get('dashboard/fuel-log-detail/{id}', 'FuelLogController@edit');
    Route::get('dashboard/getVehicleInfo/{id}/{selected?}', 'FuelLogController@getInfo');
    Route::get('dashboard/getFuelLogData/{id}', 'FuelLogController@getFuelLogData');
    Route::post('dashboard/expenseLogData', 'ExpenseLogController@index');
    Route::post('dashboard/saveExpenseCostData/{id}', 'ExpenseLogController@saveData');
    Route::post('dashboard/saveExpenseByObject/{id}', 'ExpenseLogController@saveExpenseLogData');
    Route::get('dashboard/getExpenseLogData/{id}', 'ExpenseLogController@getExpenseLogData');
    Route::get('dashboard/expense-log-detail/{id}', 'ExpenseLogController@edit');
    Route::post('dashboard/expense_at_a_glance', 'ExpenseLogController@at_a_glance');
    Route::get('dashboard/home', 'EnduserController@index'); //edited by tofayel
    Route::get('dashboard/myActivitiesDataList', 'EnduserController@getActivitiesData');
    Route::get('dashboard/devices/{id}', 'EnduserController@devices');
    Route::get('dashboard/getImei/{id}', 'EnduserController@getImei');
    Route::get('dashboard/single_tu_status_log/{id}', 'EnduserController@singleImeiStatusLog');
    Route::post('dashboard/saveImei', 'EnduserController@saveImei');
    Route::post('dashboard/saveCommand', 'EnduserController@saveCommand');
    Route::get('dashboard/showTree/{id}', 'EnduserController@showTree');
    Route::get('dashboard/v1/monitor', 'EnduserController@showMonitor')->name('enduser.monitor');
    Route::get('dashboard/v2/monitor', 'EnduserController@showMonitor_v2')->name('enduser.v2.monitor');
    Route::get('dashboard/playback/{imei?}', 'EnduserController@playback')->name('enduser.playback');
    Route::get('dashboard/geofence', 'EnduserController@geofence');
    Route::get('dashboard/get_geofence/{id?}', 'EnduserController@get_geofence');
    Route::post('dashboard/savegeofence', 'EnduserController@saveGeofence');
    Route::post('dashboard/removegeofence', 'EnduserController@removeGeofence');
    Route::post('dashboard/showplayback', 'EnduserController@showPlayback');
    Route::post('dashboard/showplaybackv2', 'EnduserController@playback_v2');
    Route::get('dashboard/report', 'EnduserController@showReport')->name('enduser.report'); //added by tofayel
    Route::get('dashboard/report/{type?}', 'EnduserController@reportType');
    Route::get('dashboard/report_dashboard', 'ExpenseLogController@reportDashboard');
    Route::post('dashboard/showreport/{type}/{device}', 'EnduserController@show_report');
    Route::get('dashboard/imeiList', 'EnduserController@imeiList');
    Route::get('dashboard/device_at_a_glance', 'EnduserController@device_at_a_glance');
    Route::get('dashboard/imeiStatusLog', 'EnduserController@imeiStatuslog');
    Route::get('dashboard/getDeviceEventData/{imei}', 'EnduserController@getDeviceEventData');
    Route::post('dashboard/singlereport/{type}/{device}', 'EnduserController@show_single_report');
    Route::get('/devicecommand/{model}', 'EnduserController@getDeviceCommand');
    Route::post('dashboard/saveComplain/{id}', 'ComplainController@saveData');
    Route::post('dashboard/saveComplainType/{id}', 'ComplainController@saveTypeData');
    Route::post('dashboard/getComplainData', 'ComplainController@datatable');
    Route::get('dashboard/getComplainTypeDataData', 'ComplainController@complainTypeDatatable');
    Route::get('dashboard/getComplainData/{id}', 'ComplainController@getComplainData');
    Route::get('dashboard/complain_details/{id}', 'ComplainController@show');
    Route::get('dashboard/complain_info/{pages}/{id}', 'ComplainController@complain_info');
    Route::post('dashboard/complain_at_a_glance', 'ComplainController@at_a_glance');
    Route::get('dashboard/lastEvent', 'EnduserController@last_event');
    Route::get('dashboard/getEventList/{id}/{show?}', 'EnduserController@getEvents');
    Route::get('dashboard/getGeofenceList/{id}', 'EnduserController@getGeofences');
    Route::get('dashboard/getLoginActivity/{id}', 'EnduserController@getLoginActivity');
    Route::get('dashboard/findAddress/{lat}/{lng}', 'EnduserController@showMyAddress');
    Route::post('dashboard/saveMasterSettingData/{id}', 'EnduserMasterSettingController@saveData');
    Route::get('dashboard/masterSettingDatatable', 'EnduserMasterSettingController@index');
    Route::get('inspection/get_data/{id?}', 'InspectionController@inspection_data');
    Route::post('dashboard/saveInspectionCategoryData/{id}', 'InspectionController@saveInspectionCategory');
    Route::get('dashboard/inspection_cat_data', 'InspectionController@inspCatDatalist');
    Route::get('dashboard/inspection_cat_detail/{id}', 'InspectionController@inspCatDetail');
    Route::post('dashboard/saveInspectionItemData/{id}', 'InspectionController@saveInspectionItem');
    Route::get('dashboard/inspection_item_data', 'InspectionController@inspItemDatalist');
    Route::get('dashboard/inspection_item_detail/{id}', 'InspectionController@inspItemDetail');
    Route::post('dashboard/saveVehicleInspection/{id}', 'InspectionController@saveVehicleInspection');
    Route::get('dashboard/vehicle_inspection_add', 'InspectionController@addVehicleInspection');
    Route::get('dashboard/vehicle_inspection_detail/{id}', 'InspectionController@editVehicleInspection');
    Route::get('dashboard/assign_vehicle_for_insp/{id}', 'InspectionController@assignVehicle');
    Route::post('dashboard/assign_vehicle_for_insp/{id}', 'InspectionController@vehicleList');
    Route::post('dashboard/assign_vehicle_for_insp_data', 'InspectionController@saveAassignVehicleList');
    Route::post('dashboard/vehicle_insp_check_save', 'InspectionController@insp_check_save');
    Route::get('dashboard/masterSettingSingleData/{id}', 'EnduserMasterSettingController@singleData');
    Route::get('dashboard/masterSettingSingleData/{id}', 'EnduserMasterSettingController@singleData');
    Route::post('dashboard/saveMasterSettingTypeData/{id}', 'EnduserMasterSettingTypeController@saveData');
    Route::get('dashboard/masterSettingTypeDatatable', 'EnduserMasterSettingTypeController@index');
    Route::get('dashboard/masterSettingTypeSingleData/{id}', 'EnduserMasterSettingTypeController@singleData');
    Route::get('dashboard/getNestedChild/{child}/{key}', 'EnduserMasterSettingController@show_nested_child');
    Route::get('dashboard/user_login_history/{type?}', 'LogsController@userLoginHistory');
    Route::get('dashboard/getReportTypeData', 'ReportController@getReportType');
    Route::get('dashboard/getReportTypeDataItem/{id}', 'ReportController@reportTypeDataItem');
    Route::get('dashboard/getSensorTypeData/{id?}', 'ReportController@sensorTypeData');
    Route::post('dashboard/saveSeduleReportData/{id}', 'ReportController@saveSeduleReportData');
    Route::post('dashboard/schedule_report_datalist', 'ReportController@seduleReportDatalist');
    Route::get('dashboard/view_schedule_report_data/{id}', 'ReportController@seduleReportView');
    Route::get('dashboard/getScheduleData/{id}', 'ReportController@getScheduleData');
    Route::post('dashboard/test_mail', 'SettingsController@send_email');
    Route::get('dashboard/setting/{pages}', 'SettingsController@settingPages');
    Route::post('dashboard/saveSettings/{meta_key}', 'SettingsController@saveData');
    Route::get('dashboard/getPaymentGatewayData', 'PaymentGatewayController@index');
    Route::post('dashboard/savePaymentGateway/{id}', 'PaymentGatewayController@saveData');
    Route::get('dashboard/payment_gateway_details/{id}', 'PaymentGatewayController@showGateway');
    Route::post('dashboard/savePaymentMethod/{id}', 'PaymentGatewayController@saveMethod');
    Route::get('dashboard/payment_method_details/{id}', 'PaymentGatewayController@showMethod');
    Route::get('dashboard/accounts/{pages}', 'AccountsController@accountsPages');
    Route::get('dashboard/account_setup_datatable', 'AccountsController@accountSetupDatalist');
    Route::get('dashboard/depositOrExpense_datatable/{type}', 'AccountsController@depositOrExpenseDatalist');
    Route::get('dashboard/transfer_datatable', 'AccountsController@transferDatalist');
    Route::post('dashboard/ledger_datalist', 'AccountsController@ledgerDatalist');
    Route::post('dashboard/regular_balance_datalist', 'AccountsController@regularBalanceDatalist');
    Route::post('dashboard/save_account_setup_data/{id}', 'AccountsController@savaAccountSetup');
    Route::post('dashboard/save_depositOrExpense_data/{type}/{id}', 'AccountsController@saveDepositOrExpense');
    Route::post('dashboard/save_transfer_data/{id}', 'AccountsController@saveTransfer');
    Route::get('dashboard/account_setup_data/{id}', 'AccountsController@showAccountSetup');
    Route::get('dashboard/deposit_or_expense_data/{id}', 'AccountsController@showDepositOrExpense');
    Route::get('dashboard/export_to_excel', 'AccountsController@export_to_excel');
    Route::get('dashboard/transfer_data/{id}', 'AccountsController@showTransfer');
    Route::get('dashboard/tripDatatable', 'TripController@tripDatatable');
    Route::post('dashboard/saveTripData/{id}', 'TripController@saveData');
    Route::post('dashboard/updateTripDetailsData/{id}', 'TripController@updateTripDetailsData');
    Route::get('dashboard/get_trip_details_list', 'TripController@tripDetailsList');
    Route::get('dashboard/trip_view/{id}', 'TripController@tripShow');
    Route::get('dashboard/trip_details_show/{id}', 'TripController@tripDetailsShow');

    // User
    Route::resource('dashboard/user', 'UserController');
    Route::post('dashboard/user/update/{id}', 'UserController@update');
    Route::get('dashboard/user_reset_password/{id}', 'UserController@resetPassForm');
    Route::post('user_reset_password/{id}', 'UserController@resetPass');
});
