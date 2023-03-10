<?php

namespace App\Http\Controllers\Dealer;
use Hash;
use File;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Config;
use Schema;
use Carbon\Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Enduser\EnduserController;
use App\Http\Controllers\Controller;

class DealerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo 'dealer homepage';
       return view('layouts.dealer.master');
    }
    public function homePages($home=null, $data_tab)
    {
        $id  = Auth::user()->id;
        $profile  = Customer::find($id);
        //$mytree = $this->showTree($id);
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $menus = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the SQL result
        foreach ($result as $items) {
            // Create current menus item id into array
            $menus['items'][$items->id] = $items;
            // Creates list of all items with children
            $menus['parents'][$items->parent_id][] = $items->id;
        }
        $my_total_child = createTreeview($id, $menus, 'summary');
        $total_clients_under_me = getSumFromArray($my_total_child,$my_total_child[0]['id']);
        //echo json_encode($my_total_child,true);
        $clients_id = getCountFromArray($my_total_child,$my_total_child[0]['id']);
        //echo $clients_id.$id;
        $device_list ='';

        // $device_list = DB::select("select customer_id, status,combo_data.name as status_name, count(*) as total_device from gs_objects left join combo_data on combo_data.id = gs_objects.status  where customer_id IN(".$clients_id.$id.") and combo_data.type=1 group by status");
        //die();
        return view('dealer.dashboard.'.$home, compact('profile','total_clients_under_me','device_list', 'data_tab'));
    }

      
    public function changeInfo(Request $request, $type)
    {
        try{
            $auth = Auth::user();
            $customer = Customer::find($auth->id);
            if($type=='photo') {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg',
                ]);
    
                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }
                DB::beginTransaction();
               
                $oldImg = $customer->profile_photo;
                $image = $request->file('image');
                if($image){
                    $imgName= date("Ymd_His");
                    $ext = strtolower($image->getClientOriginalExtension());
                    $fullName= $imgName.'.'.$ext;
                    $uploadPath='public/uploads/user/';
                    $uploadTo=$image->move($uploadPath, $fullName);
                    $customer->profile_photo= $fullName;
                    $image_path = $uploadPath.$oldImg;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $customer->save();
                DB::commit();
                return true;
            }

            if($type=='password') {
                $validator = Validator::make($request->all(), [
                    'current_password' => ['required', new MatchOldPassword],
                    'new_password' => 'required|min:6|same:password_confirmation|different:current_password',
                    'password_confirmation' => 'required|min:6',
                ]);
    
                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }
    
                DB::beginTransaction();      
                $customer->password = Hash::make($request->new_password);
                $customer->save();
                DB::commit();
    
                return true;
            }


        }catch (\Exception $e) {
            DB::rollBack();
            return false;
            
        }
    }

    public function brandingInfo(Request $request, $type)
    {
        try{
           
            $auth = Auth::user();
            $customer = Customer::find($auth->id);
            
            if($type=="company_light_logo"){
                $image = $request->file('light_logo');
                $oldImg = $customer->company_light_logo;

                $validator = Validator::make($request->all(), [
                    'light_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            } else if($type=="company_dark_logo"){
                $image = $request->file('dark_logo');
                $oldImg = $customer->company_dark_logo;

                $validator = Validator::make($request->all(), [
                    'dark_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            }
            // else if($type=="favicon"){
            //     $image = $request->file('favicon');
            //     $oldImg = $customer->favicon;

            //      $validator = Validator::make($request->all(), [
            //         'favicon' => 'required|mimes:jpeg,png,jpg,gif,ico',
            //     ]);
            // }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();

            if($image){
                $imgName= $auth->username."_".date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName= $imgName.'.'.$ext;
                $uploadPath='public/uploads/user/logos/';
                $uploadTo=$image->move($uploadPath, $fullName);
                $image_path = $uploadPath.$oldImg;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }

                if($type=="company_light_logo"){
                    $customer->company_light_logo = $fullName;
                } else if($type=="company_dark_logo"){
                    $customer->company_dark_logo = $fullName;
                } else if($type=="favicon"){
                    $customer->favicon = $fullName;
                }

                $customer->save();
            }

            DB::commit();
            return true;

        }catch (\Exception $e) {
            DB::rollBack();
            return false;
            
        }
    }

    public function getLogData()
    {
        
        $logData= DB::select('select dl.*, gs.device_name, gs.imei, tf.customer_name as t_from, tf.active as tf_active, tf.global_status as tf_gs, tt.customer_name as t_to, tt.active as tt_active, tt.global_status as tt_gs from device_log dl left join gs_objects gs on gs.id = dl.device_id left join customers tf on tf.id = dl.previous_customer  left join customers tt on tt.id = dl.current_customer where dl.loggedin_customer=' . auth()->user()->id . ' order by dl.id desc');
        
        return Datatables::of($logData)
                        ->addIndexColumn()
                        ->editColumn('t_from', function ($data) {
                            $a_status_color=['btn-danger', 'btn-success'];
                            $g_status_color=['badge-warning', 'badge-success', 'badge-info', 'badge-info color-purple', 'badge-danger'];
                            $g_status=['Inactive', 'Active', 'Overdue', 'On Hold', 'Stop'];
                            $tFrom= '<span class=" mr-1 btn btn-sm '.$a_status_color[$data->tf_active].'"></span>'.$data->t_from.'<span class=" ml-2 badge badge-pill '.$g_status_color[$data->tf_gs].'">'.$g_status[$data->tf_gs].'</span>';
                            return $tFrom;
                        })
                        ->editColumn('t_to', function ($data) {
                            $a_status_color=['btn-danger', 'btn-success'];
                            $g_status_color=['badge-warning', 'badge-success', 'badge-info', 'badge-info color-purple', 'badge-danger'];
                            $g_status=['Inactive', 'Active', 'Overdue', 'On Hold', 'Stop'];
                            $tTo= '<span class=" mr-1 btn btn-sm '.$a_status_color[$data->tt_active].'"></span>'.$data->t_to.'<span class=" ml-2 badge badge-pill '.$g_status_color[$data->tt_gs].'">'.$g_status[$data->tt_gs].'</span>';
                            return $tTo;
                        })
                        ->rawColumns(['t_from', 't_to'])
                        ->make(true);
    }
    public function business()
    {
        $data['api_credentials'] = Config::get('app.MEHSUPERUSER').'/'.Config::get('app.MEHSUPERPASS');
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        $data['device_status_list'] = DB::select("select id, name from unit_status");
        $first_child = DB::select('select id from customers where parent_id=' . $data['session_data']['id'] . ' order by id asc limit 1');
        $data['first_child'] = (isset($first_child[0]->id))?$first_child[0]->id:$data['session_data']['id'];
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $menus = array(
            'items' => array(),
            'parents' => array()
        );


        // Builds the array lists with data from the SQL result
        foreach ($result as $items) {
            // Create current menus item id into array
            $menus['items'][$items->id] = $items;
            // Creates list of all items with children
            $menus['parents'][$items->parent_id][] = $items->id;
        }

        $data['mymenus'] = $menus;
        $data['myparent'] = $data['session_data']['id'];

        $data['dealerTree'] = json_encode(createTreeview($data['session_data']['id'], $menus, 'json'));
        $search_tree = createTreeview($data['session_data']['id'], $menus, 'auto');
        $data['searchTree'] = json_encode(nestedToSingle($search_tree), true);
        $data['global_status_list'] = getTableWhere("combo_data", array('type'=>1))->toArray();

        return view('dealer.business.business')->with($data);
    }

    public function showTree($id)
    {

        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $menus = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the SQL result
        foreach ($result as $items) {
            // Create current menus item id into array
            $menus['items'][$items->id] = $items;
            // Creates list of all items with children
            $menus['parents'][$items->parent_id][] = $items->id;
        }

        echo json_encode(createTreeview($id, $menus, 'json'));
    }

    public function getDealerInfo($id)
    {
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status where c.id=' . $id);

        echo json_encode($result[0], true);
    }

    public function getDevice($id)
    {
        /* 
            click on overview status tab will show some info readonly
            overview Status
            just view information:
            CRM to Platform IMEI Connection: green/red - crm_exist>0
            Server to Platform IMEI: green/red(badge label : connected/disconnected) : platform(gs_objects_<imei>) e exsit or not
            TU = IMEI : connected/disconnected(green/red) = unit_id>0
            Device(IMEI) Status: online/offline(from realtime data.... st=m, st=true etc...)gs_objects_<imei>
            servert to platform and device status will call gs_object<imei>table 
        */
       // $data = DB::select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, sm.name as sim_status_name, im.name as imei_status,i.name as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data sm on sm.id = d.sim_status left join combo_data im on im.id = d.status left join combo_data i on (i.other_value=d.status OR d.status IS NULL) where d.customer_id=" . $id . "  order by d.id desc");
        $data = DB::select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, (SELECT CASE WHEN other_value=d.sim_status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.sim_status and type=8  limit 1) as sim_status_name, im.name as imei_status,(SELECT CASE WHEN other_value=d.status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.status and type=9 limit 1) as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data im on im.id = d.status where d.customer_id=".$id);

        return Datatables::of($data)
            ->addColumn('checkDevice', function ($row) {
                $device_id = $row->id;
                return '<input type="checkbox" class="selected_device" value="' . $device_id . '" data-rel="' . $row->imei . '" data-customer="'.$row->customer_id.'" data-crmexist="'.$row->crm_exist.'" >';
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $device_id = $row->id;

                return "<button class='custom-button-class mr-2 dropdown-toggle' type='button' data-toggle='dropdown'>Settings<span class='caret'></span></button><ul class='dropdown-menu'> <li><a href='#' onclick='edit_device($device_id)'> <i class='fas fa-eye'></i> View </a></li>  <li><a href='#'><i class='fas fa-cogs'></i> Settings</a></li></ul>
            <button style=' type='button' class='custom-button-class mr-2'  onclick='edit_device($device_id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status = '<span class="btn btn-success btn-sm"></span>';
                } else {
                    $status = '<span class="btn btn-danger btn-sm"></span>';
                }
                return $status;
            })
            ->editColumn('imei', function ($row) {
                return $row->crm_customer_id.','.$row->imei.','.$row->imei_status_name;
            })
            ->editColumn('sim_number', function ($row) {
                return $row->sim_number.' - '.$row->sim_status_name;
            })
            ->editColumn('unit_status_name', function ($row) {
                return $row->unit_status_color.','.$row->unit_status_name;
            })
            ->rawColumns(['checkDevice', 'status', 'action'])
            ->make(true);
    }

    public function getImei($id)
    {
        $data = DB::select("select d.*, s.name as server_name, m.name as model_name  from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model where d.id=" . $id);

        $data[0]->server_to_platform_status = (Schema::hasTable('gs_object_data_' . $data[0]->imei)) ? 1 : 0;
        $data[0]->device_status = 0; // will come from gs_object_data_<imei> params columns() real time
        echo json_encode($data[0], true);
    }

    public function saveImei(Request $request)
    {
        $last_record = DB::select("select status, updated_at from gs_objects where id =". $request->id)[0];
        // dd($request);
        $info = array(
            'device_name' => $request->device_name,
            'plate_number' => $request->plate_number,
            'sim_number' => $request->sim_number,
            'status' => $request->status,
            'voltage' => $request->voltage,
        );
        $done = DB::table('gs_objects')->where('id', $request->id)->update($info);
        // dd($done);

        if ($done >= 0) {
            $insert = array(
                'device_id' => $request->id,
                'previous_status' => $last_record->status,
                'previous_status_date' => $last_record->updated_at,
                'current_status' => $request->status,
                'last_update' => gmdate('Y-m-d H:i:s', strtotime('+6 hours')),
            );
            // dd($insert);
            // dd("hello");

            $sql = DB::table('device_status_log')->insert($insert);
            echo 1;
        } else {
            dd("hello world");

            echo 0;
        }
    }
    public function resetPassword(Request $request)
    {
        $new_pass = Hash::make($request->password);
        $info = array(
            'password' => Hash::make($request->password)
        );
        $done = DB::table('customers')->where('id', $request->id)->update($info);
        if ($done>=0) {
            echo 1;
            $api_data = [];
            $api_data['api_username'] = Config::get('app.MEHSUPERUSER');
            $api_data['api_password'] = Config::get('app.MEHSUPERPASS');
            $api_data['username'] = $request->username;
            $api_data['password'] = $new_pass;
            $api_url = Config::get('app.APIURL') . '/resetPassword'; //Config::get('app.APIURL').'/saveimei';

            $client = new \GuzzleHttp\Client();
            $response = $client->post($api_url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($api_data)
            ]);

        } else {
            echo 0;
        }
    }

    public function saveUserMovement(Request $request)
    {
        /* echo 'moving user: '.$request->moving_user;
        echo 'parent id: '.$request->parent_id;
        die(); */
        $info = array(
            'parent_id' => $request->parent_id
        );
        $done = DB::table('customers')->where('id', $request->moving_user)->update($info);

        if ($done) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function saveDeviceMovement(Request $request)
    {
        $query_string = "";
        
        $info = array(
            'customer_id' => $request->moving_to_user
        );
        $done = DB::table('gs_objects')->whereIn('id', $request->moving_devices)->update($info);

        if ($done) {
            $query_string = "INSERT INTO device_log(device_id,device_status,previous_customer,current_customer,update_by,loggedin_customer) VALUES";
            for($i=0; $i<count($request->device_with_crmexist); $i++){
                $query_string.="('".$request->device_with_crmexist[$i]['id']."', '".$request->device_with_crmexist[$i]['crm_exist']."', '".$request->device_with_crmexist[$i]['previous_customer']."', '".$request->moving_to_user."', '0', '".Auth::user()->toArray()['id']."')";
                if($i<count($request->device_with_crmexist)-1){
                    $query_string.=", ";
                }
                else{
                    $query_string.=";";
                }
            }
            //echo $query_string;
            $log_ok = DB::statement($query_string);
            if($log_ok){
                echo 1;
            }
            else{
                echo 0;
            }
        } else {
            echo 0;
        }
        /* $info = array(
            'customer_id' => $request->moving_to_user
        );
        $done = DB::table('gs_objects')->whereIn('id', $request->moving_devices)->update($info);

        if ($done) {
            echo 1;
        } else {
            echo 0;
        } */
    }

    public function saveCustomer(Request $request)
    {
        
        $info = array(
            'name' => $request->name,
            'email' => $request->email,
            'hosting_company' => $request->hosting_company,
            'username' => $request->username,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'customer_name' => $request->customer_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'date_of_birth' => $request->date_of_birth,
            'nid_no' => $request->nid_no,
            'active' => $request->active,
            'billing_address' => $request->billing_address,
            'global_status' => $request->global_status
        );


        $done = DB::table('customers')->where('id', $request->id)->update($info);
        if ($done>=0) {
            echo 1;
            $api_username = Config::get('app.MEHSUPERUSER');
            $api_pass = Config::get('app.MEHSUPERPASS');
            
            $api_data = [];
            $api_data['api_username'] =  $api_username;
            $api_data['api_password'] = $api_pass;
            $api_data['actor_type'] = 2; // will be decided later
            $api_data['name'] = $request->name;
            $api_data['email'] = $request->email;
            $api_data['hosting_company'] = $request->hosting_company;
            $api_data['username'] = $request->username;
            $api_data['phone'] = $request->phone;
            $api_data['mobile'] = $request->mobile;
            $api_data['customer_name'] = $request->customer_name;
            $api_data['father_name'] = $request->father_name;
            $api_data['mother_name'] = $request->mother_name;
            $api_data['date_of_birth'] = $request->date_of_birth;
            $api_data['nid_no'] = $request->nid_no;
            $api_data['active'] = $request->active;
            $api_data['billing_address'] = $request->billing_address;
            $api_data['global_status'] = $request->global_status;
            $api_url = Config::get('app.APIURL') . '/savecustomer'; //Config::get('app.APIURL').'/saveimei';

            $client = new \GuzzleHttp\Client();
            $response = $client->post($api_url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($api_data)
            ]);

            //echo $response->getBody();
            //echo 1;
            //return true;
        } else {
            echo 0;
        }
    }

    public function getDeviceCommand($model_id)
    {
        $data = DB::select("select c.*, m.full_name as command_name from gps_commands c left join master_settings m on m.id = c.command_id where c.model_id=" . $model_id);
        if ($data >= 0) {
            echo json_encode($data, true);
        }
        //echo json_encode(getTableWhere('gps_commands', array('model_id'=>$model_id)),true);
    }
    
    public function saveCommand(Request $request)
    {
        if($request->cmd=="RESET#"){
            $validator = Validator::make($request->all(), [
                'password' => ['required', new MatchOldPassword],
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
        }
        
        $info = array(
            'name' => $request->name,
            'imei' => $request->imei,
            'cmd' => $request->cmd,
            'dt_cmd' => gmdate('Y-m-d H:i:s', strtotime('+6 hour')),
            'type' => $request->type,
            'gateway' => $request->gateway,
            'user_id' => Auth::user()->id,
            'status' => 0,
        );

        $done = DB::table('gs_object_cmd_exec')->insert($info);
        if ($done >= 0) {
            //call server api for execution
            // all server deatils will come from gps_servers table
            // for the time being we just pass hard coded api
            //http://www.gomaxtracker.net/func/fn_cmd.php
           
            $api_data = array(
                'cmd'=>'exec_cmd_gprs_v2',
                'imei'=>$request->imei,
                'name'=>'Custom',
                'type'=>$request->type,
                'cmd_'=>$request->cmd,
                'user_id' => Auth::user()->id
            );
            echo 1;
            /* $url = 'http://www.gomaxtracker.net/func/platform_commands.php';
            $api_call = httpPost($url, $api_data);
            dd($api_call); */
            /* if($response=='OK'){
                echo 1;
            }
            else{
                echo 0;
            } */
        } else {
            echo 0;
        }
    }

    public function devices($userid)
    {

        $final_data = array();
        $data = DB::select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, (SELECT CASE WHEN other_value=d.sim_status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.sim_status and type=8  limit 1) as sim_status_name, im.name as imei_status,(SELECT CASE WHEN other_value=d.status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.status and type=9 limit 1) as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data im on im.id = d.status where d.customer_id=" . $userid . " order by d.id desc");
        $sensor_list = [];

        //to store all events in every 10 secs call and execute after the last item in the device loop
        $temp_event_array = [];
        $data_counter = 0;
        foreach ($data as $d) {
            $d->st = 'f';
            $d->ststr = 'DISABLED';
            if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                $gs_tables = DB::select("select dt_server,dt_tracker, lat, lng, altitude, angle,speed, params,dt_last_stop,dt_last_idle, dt_last_move from gs_object_data_" . $d->imei . " order by dt_tracker desc limit 1");

                if (count($gs_tables) > 0) {
                    $sensor_list = DB::select("SELECT s.*, n.name as sensor_parameter_name, t.name as sensor_type_name FROM gps_sensors s left join master_settings n on n.id = s.sensor_parameter_id left join master_settings t on t.id=s.sensor_type_id where s.model_id='" . $d->device_model . "'");
                    $dt_last_stop = Carbon::parse($gs_tables[0]->dt_last_stop);
                    $dt_last_idle = Carbon::parse($gs_tables[0]->dt_last_idle);
                    $dt_last_move = Carbon::parse($gs_tables[0]->dt_last_move);
                    //$totalDuration =  $dt_last_stop->diff(gmdate("Y-m-d H:i:s"))->format('%S') . "";
                    if (($gs_tables[0]->dt_last_stop > 0) || ($gs_tables[0]->dt_last_move > 0)) {
                        // stopped and moving
                        if ($gs_tables[0]->dt_last_stop >= $gs_tables[0]->dt_last_move) {
                            $d->st = 's';
                            $d->ststr = 'STOPPED' . ' ' . $dt_last_stop->diff(gmdate("Y-m-d H:i:s"))->format('%H:%i:%S') . "";
                        } else {
                            $d->st = 'm';
                            $d->ststr = 'MOVING' . ' ' . $dt_last_move->diff(gmdate("Y-m-d H:i:s"))->format('%H:%i:%S') . "";
                        }

                        // idle
                        if (($gs_tables[0]->dt_last_stop <= $gs_tables[0]->dt_last_idle) && ($gs_tables[0]->dt_last_move <= $gs_tables[0]->dt_last_idle)) {
                            $d->st = 'i';
                            $d->ststr = 'IDLE' . ' ' . $dt_last_idle->diff(gmdate("Y-m-d H:i:s"))->format('%H:%i:%S') . "";
                        }
                    }

                    //sensor list
                    $device_sensor = json_decode($gs_tables[0]->params, true);

                    foreach ($device_sensor as $k => $v) {
                        for ($i = 0; $i < count($sensor_list); $i++) {
                            $sensor_list[$i]->name = $sensor_list[$i]->sensor_parameter_name;
                            if ($k == $sensor_list[$i]->sensor_parameter_name) {
                                //check for type string/value/percentage
                                if ($sensor_list[$i]->result_type_id == 10) {
                                    $def_value = ($sensor_list[$i]->highest_value - $sensor_list[$i]->lowest_value);
                                    if ($def_value > 0) {
                                        $sensor_list[$i]->sensor_value = round((($v * 100) / $def_value));
                                    }
                                }
                                if ($sensor_list[$i]->result_type_id == 9) {
                                    $sensor_list[$i]->sensor_value = ($v == 1) ? $sensor_list[$i]->sensor_1_text : $sensor_list[$i]->sensor_0_text;
                                }

                                if ($sensor_list[$i]->result_type_id == 8) {
                                    $sensor_list[$i]->sensor_value = $v;
                                }
                            }
                        }
                    }

                    $gs_tables_prev = DB::select("select dt_server,dt_tracker, lat, lng, altitude, angle,speed, params from gs_object_data_" . $d->imei . " order by dt_tracker desc limit 1 offset 1");

                    if (count($gs_tables_prev) > 0) {
                        $startTime = Carbon::parse($gs_tables_prev[0]->dt_tracker);
                        $endTime = Carbon::parse($gs_tables[0]->dt_tracker);
                        $totalDuration = $startTime->diff($endTime)->format('%S') . "";
                        $d->device_status = ($totalDuration <= 7200) ? 1 : 0; // 1 = online, 0 = offline
                        
                        $d->device_status = 0;
                        $d->over_speed = 0;
                    }

                        $d->zone_in = 0;
                        $d->zone_out = 0;

                    /*======================= */

                    $d->duration = $totalDuration;
                    $d->dt_server = $gs_tables[0]->dt_server;
                    $d->dt_tracker = $gs_tables[0]->dt_tracker;
                    $d->dt_last_stop = $gs_tables[0]->dt_last_stop;
                    $d->dt_last_idle = $gs_tables[0]->dt_last_idle;
                    $d->dt_last_move = $gs_tables[0]->dt_last_move;
                    $d->lat = $gs_tables[0]->lat;
                    $d->lng = $gs_tables[0]->lng;
                    $d->angle = $gs_tables[0]->angle;
                    $d->speed = number_format($gs_tables[0]->speed, 1);
                    $d->params = $gs_tables[0]->params;
                    $d->sensor_list = $sensor_list;
                } else {
                    $d->device_status = 0;
                    $d->duration = 0;
                    $d->dt_server = '';
                    $d->dt_tracker = '';
                    $d->dt_last_stop = '';
                    $d->dt_last_idle = '';
                    $d->dt_last_move = '';
                    $d->lat = 0;
                    $d->lng = 0;
                    $d->angle = 0;
                    $d->speed = 0;
                    $d->params = '';
                    $d->over_speed = 0;
                    $d->zone_in = 0;
                    $d->zone_out = 0;
                    $d->sensor_list = $sensor_list;
                }
            } else {
                $d->device_status = 0;
                $d->duration = 0;
                $d->dt_server = '';
                $d->dt_tracker = '';
                $d->dt_last_stop = '';
                $d->dt_last_idle = '';
                $d->dt_last_move = '';
                $d->lat = 0;
                $d->lng = 0;
                $d->angle = 0;
                $d->speed = 0;
                $d->params = '';
                $d->over_speed = 0;
                $d->zone_in = 0;
                $d->zone_out = 0;
                $d->sensor_list = $sensor_list;
            }
            array_push($final_data, $d);
            $data_counter++;

        }

        echo json_encode($final_data, true);
    }


    public function showMonitor_v2()
    {
        // default monitor is v2(dealer_monitor.blade.php file)
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        $data['customer_id'] = $data['session_data']['id'];
        return view('monitor.v1.dealer_monitor')->with($data);
    }

    public function showMonitor($id=null)
    {   
       //$data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        //$data['customer_id'] = ($id==null)? $data['session_data']['id'] : $id ;
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        if($id>0){
            $data['session_data']['id'] = $id;
        }
        
        $data['command_list'] = getTableWhere('master_settings', array('type' => 6));
        $data['modelwise_command'] = json_encode(getTableWhere('gps_commands', array()), true);
        $data['vehicles'] = Vehicle::all();
        $data['complain_types'] = DB::select("select t.id, t.name as t_name from ticket_type t ");

        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status where c.id=' . $data['session_data']['id']);

        $data['customer_details'] = $result[0];

        $menus = array(
            'items' => array(),
            'parents' => array()
        );

        $result_all_tree = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        foreach ($result_all_tree as $items) {
            $menus['items'][$items->id] = $items;
            $menus['parents'][$items->parent_id][] = $items->id;
        }

        $search_tree = createTreeview($data['session_data']['id'], $menus, 'auto');
        $data['searchTree'] = json_encode(nestedToSingle($search_tree), true);

        $crm_status = ($result[0]->active == 1) ? '<span class = "kt-badge  kt-badge--success crm_status_badge" > </span>' : '<span class="kt-badge  kt-badge--warning crm_status_badge"> </span >';
        $global_status = ' <span class = "kt-badge  kt-badge--' . $result[0]->status_color . ' kt-badge--inline"> ' . $result[0]->global_status_name . ' </span>';

        $data['parent_string'] = $crm_status . $result[0]->name . $global_status . '(' . $result[0]->total_child_device . '/' . $result[0]->total_device . ')';

        $data['customer_id'] = $data['session_data']['id'];
        return view('monitor.v1.dealer_monitor')->with($data);
    }

    public function monitor($id)
    {
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color from customers c left join combo_data s on s.id = c.global_status where c.id=' . $id);

        $data['customer_id'] = $id;
        $data['customer_info'] = $result;

        return view('dealer_customer_monitor')->with($data);
    }

    public function activities()
    {
        return view('dealer_activities');
    }

    public function getActivitiesData()
    {

        $data = DB::select("select cl.*, c.customer_name, c.username from customer_logs cl left join customers c on c.id = cl.customer_id where cl.customer_id =" . Auth::user()->id . " order by cl.id desc");
        return Datatables::of($data)
            ->addIndexColumn()

            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return "Password Mismatch";
                } else if ($data->status == 1) {
                    return "Success";
                } else if ($data->status == 2) {
                    return "Account Inactive";
                }
            })
            ->editColumn('created_at', function ($data) {
                $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                return $createdDate;
            })
            ->rawColumns(['created_at', 'action'])
            ->make(true);
    }

    public function getClientActivitiesData()
    {


        $data = DB::select("select cl.*, c.customer_name, c.username from customer_logs cl left join customers c on c.id = cl.customer_id where cl.customer_id IN (select id from customers where parent_id = " . Auth::user()->id . ") order by cl.id desc");
        return Datatables::of($data)
            ->addIndexColumn()

            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return "Password Mismatch";
                } else if ($data->status == 1) {
                    return "Success";
                } else if ($data->status == 2) {
                    return "Account Inactive";
                }
            })
            ->editColumn('created_at', function ($data) {
                $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                return $createdDate;
            })
            ->rawColumns(['created_at', 'action'])
            ->make(true);
    }

    public function tuStatusLog()
    {
        $data = DB::select("select dsl.*, pus.name as ps_name, pus.status_color as p_status_color, cus.name as cs_name, cus.status_color as c_status_color, gs.device_name, gs.imei, gs.sim_number, gs.customer_id, c.customer_name from device_status_log dsl left join unit_status  pus on pus.id = dsl.previous_status left join unit_status cus on cus.id = dsl.current_status left join gs_objects gs  on gs.id = dsl.device_id left join customers c on c.id = gs.customer_id where c.parent_id =".Auth::user()->id);
        return Datatables::of($data)
        // ->addColumn('checkDevice', function ($row) {
        //     $device_id = $row->id;
        //     return 'value=' . $device_id . ' data-rel=' . $row->imei;
        // })
        ->addIndexColumn()
        ->editColumn('previous_status', function ($row) {
            $ps = "<span class='badge badge-pill' style='background-color:".$row->p_status_color.";'>".$row->ps_name."</span>";
                return $ps;
        })
        ->editColumn('current_status', function ($row) {
            $cs = "<span class='badge badge-pill' style='background-color:".$row->c_status_color.";'>".$row->cs_name."</span>";
                return $cs;
        })
        ->editColumn('previous_status_date', function ($row) {
            $PSDate= Carbon::parse($row->previous_status_date)->format('d M Y, h:i a');
                return $PSDate;
        })
        ->editColumn('last_update', function ($row) {

            $startTime = Carbon::parse(time());
            $endTime = Carbon::parse($row->last_update);
            $totalDuration = $startTime->diff($endTime)->format('%d')." Days Ago";

            return $totalDuration;
        })
        ->rawColumns(['previous_status', 'current_status', 'previous_status_date', 'last_update'])
        ->make(true);
    }

    public function showMyAddress($lat,$lng){
        echo json_encode(get_geo_address($lat,$lng));
    }

    public function last_event($user_id=null)
    {
        //$user_id = Auth::user()->toArray()['id'];
        $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $user_id . "' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '" . $user_id . "') AND dt_tracker>= (CONVERT_TZ(NOW(), @@session.time_zone, '+6:00')) - INTERVAL 1 MINUTE order by event_id desc";

        $res = DB::select($q);
        if (count($res) > 0) {
            foreach ($res as $r) {
                if ($r->name == '') {
                    $r->name = getObjectName($r->imei);
                }
                $r->dt_server = gmdate($r->dt_server, strtotime('+ 6 hour'));
                $r->dt_tracker = gmdate($r->dt_tracker, strtotime('+ 6 hour'));
            }
        }
        echo json_encode($res, true);
    }
    public function getEvents($id, $show = null)
    {

        if ($show == 'all') {
            $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $id . "' order by event_id desc";
            $res = DB::select($q);
            return Datatables::of($res)
                ->addIndexColumn()
                ->addColumn('coordinate', function ($row) {
                    return '<a href="http://maps.google.com/maps?q=' . $row->lat . ', ' . $row->lng . '&amp;t=m" target="_blank">' . $row->lat . ' °, ' . $row->lng . ' °</a>';
                })
                ->editColumn('dt_tracker', function ($row) {
                    return Carbon::parse($row->dt_tracker)->format('d M Y, h:i a');
                })
                ->rawColumns(['coordinate', 'dt_tracker'])
                ->make(true);
        } else {
            $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $id . "' order by event_id desc LIMIT 20";
            $res = DB::select($q);
            echo json_encode($res, true);
        }
    }
    public function getGeofences($id)
    {
        $q = "SELECT * FROM `geofences` WHERE `customer_id`='" . $id . "' order by id desc LIMIT 20";
        $res = DB::select($q);
        echo json_encode($res, true);
    }
    public function driverInfo($id)
    {
        $findDriver = DB::select("select v.driver_pid, d.* from vehicles v left join drivers d on d.id = v.driver_pid where v.object_id =".$id);
        if($findDriver!=null){
            $driver = $findDriver[0];
            return response()->json($driver);
        }else{
            echo 0;
        }
    }

    public function show_report(Request $request, $type = null, $device = null,$user_id=null)
    {
        $user['session_data']['id'] = $user_id;
        //$user['session_data'] = Auth::user()->toArray();
        $start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
        $end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
        $final_data = [];

        if ($type == 'drivingbehaviour') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $device_list .= explode("_", $request->device_list)[0];

                $final_data = DB::select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(" . $device_list . ")");
            } else {
                $final_data = DB::select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(select imei from gs_objects where customer_id=" . $user['session_data']['id'] . ")");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'mileage') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                foreach ($request->device_list as $d) {
                    $device_imei = explode("_", $d)[0];
                    $device_name = explode("_", $d)[1];
                    if (Schema::hasTable('gs_object_data_' . $device_imei)) {
                        $data = getRoute($device_imei, $start_date, $end_date, 1, true);
                        $data['imei_no'] = $device_imei;
                        $data['device_name'] = $device_name;
                        $data['start_date'] = $start_date;
                        $data['end_date'] = $end_date;
                        $data['route_length'] = (isset($data['route_length'])) ? $data['route_length'] : 0;
                        $data['imei_no'] = $device_imei;
                        $data['device_name'] = $device_name;
                        $data['start_date'] = $start_date;
                        $data['end_date'] = $end_date;
                        $data['my_fuel_consumption'] = '0.25';
                        $all_dates = getDatesFromRange($start_date, $end_date, 'Y-m-d');

                        foreach ($all_dates as $cur_date) {
                            $start = $cur_date . ' 00:00:00';
                            $end = $cur_date . ' 23:59:00';
                            $data['child'][] = $this->get_single_record($device_imei, $start, $end);
                        }
                        $final_data[] = $data;
                    }
                }

                echo json_encode($final_data, true);
            } else {
                $all_device = DB::select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");

                foreach ($all_device as $d) {
                    if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                        $device_imei = $d->imei;
                        $device_name = $d->device_name;
                        $data = getRoute($device_imei, $start_date, $end_date, 1, true);
                        //$data = $this->get_single_record($device_imei,$start_date,$end_date);
                        $data['imei_no'] = $device_imei;
                        $data['device_name'] = $device_name;
                        $data['start_date'] = $start_date;
                        $data['end_date'] = $end_date;
                        $data['route_length'] = (isset($data['route_length'])) ? $data['route_length'] : 0;
                        $data['my_fuel_consumption'] = $d->fuel_consumption;
                        $all_dates = getDatesFromRange($start_date, $end_date, 'Y-m-d');

                        foreach ($all_dates as $cur_date) {
                            $start = $cur_date . ' 00:00:00';
                            $end = $cur_date . ' 23:59:00';
                            $data['child'][] = $this->get_single_record($device_imei, $start, $end);
                        }
                        $final_data[] = $data;
                    }
                }
                echo json_encode($final_data, true);
            }
        } else if ($type == 'trip') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $res = "";
                //$data = [];
                foreach ($request->device_list as $d) {
                    if (Schema::hasTable('gs_object_data_' . explode("_", $d)[0])) {
                        $device_imei = explode("_", $d)[0];
                        $device_name = (explode("_", $d)[1] == '') ? 'NA' : explode("_", $d)[1];
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        //$res .= $this->reportsGenerateDrivesAndStops($device_name, $device_imei, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                        $data[] = $this->reportsGenerateWithGraph($device_name, $device_imei, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                //echo $res;
                echo json_encode($data, true);
            } else {
                $all_device = DB::select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
                $res = "";
                foreach ($all_device as $d) {
                    if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                        $device_imei = $d->imei;
                        $device_name = ($d->device_name == '') ? 'NA' : $d->device_name;
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        $data[] = $this->reportsGenerateWithGraph($device_name, $device_imei, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                echo json_encode($data, true);
            }
        } else if ($type == 'alert_overview') {
            $last_events = [];
            $result = "<table class='table table-hover table-striped table-bordered'>";
            $result .= "<tr><th>SL</th><th>Device</th>";
            $all_user_events = DB::select("select * from gs_user_events where user_id=" . $user['session_data']['id']);
            $my_events = ", ";
            if (count($all_user_events) > 0) {
                $x = 0;
                foreach ($all_user_events as $e) {
                    if ($e->type == 'sensor') {
                        $type_query = " and event_desc='" . $e->name . "' and imei=e.imei) as total_" . str_replace(" ", "_", $e->name);
                    } else {
                        $type_query = " and type='" . $e->type . "' and imei=e.imei) as total_" . $e->type;
                    }

                    $my_events .= " (select count(*) from gs_user_last_events_data  where user_id=" . $user['session_data']['id'] . $type_query;
                    $x++;
                    if ($x < count($all_user_events)) {
                        $my_events .= ", ";
                    }
                    $result .= "<th>" . $e->name . "</th>";
                }

                if (isset($request->device_list) && $request->device_list[0] != 0) {
                    $device = "";
                    $i = 0;
                    foreach ($request->device_list as $d) {
                        $dl = explode("_", $d)[0];
                        $i++;
                        if ($i < count($request->device_list)) {
                            $device .= $dl . ", ";
                        } else {
                            $device .= $dl;
                        }
                    }

                    $last_events = DB::select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                } else {
                    $last_events = DB::select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                }

                //echo "select name " . $my_events . " from gs_user_last_events_data where user_id=".$user['session_data']['id']." and dt_tracker between '".$start_date."' and '".$end_date."' group by imei";

                echo json_encode(['event_list' => $all_user_events, 'my_events' => $last_events], true);
            }
            //echo json_encode($last_events, true);
        } else if ($type == 'alert_report') {
            $last_events = [];
            $result = "<table class='table table-hover table-striped table-bordered'>";
            $result .= "<tr><th>SL</th><th>Device</th>";
            $all_user_events = DB::select("select * from gs_user_events where user_id=" . $user['session_data']['id']);
            $my_events = ", ";
            if (count($all_user_events) > 0) {
                $x = 0;
                foreach ($all_user_events as $e) {
                    if ($e->type == 'sensor') {
                        $type_query = " and event_desc='" . $e->name . "' and imei=e.imei) as total_" . str_replace(" ", "_", $e->name);
                    } else {
                        $type_query = " and type='" . $e->type . "' and imei=e.imei) as total_" . $e->type;
                    }

                    $my_events .= " (select count(*) from gs_user_last_events_data  where user_id=" . $user['session_data']['id'] . $type_query;
                    $x++;
                    if ($x < count($all_user_events)) {
                        $my_events .= ", ";
                    }
                    $result .= "<th>" . $e->name . "</th>";
                }

                if (isset($request->device_list) && $request->device_list[0] != 0) {
                    $device = "";
                    $i = 0;
                    foreach ($request->device_list as $d) {
                        $dl = explode("_", $d)[0];
                        $i++;
                        if ($i < count($request->device_list)) {
                            $device .= $dl . ", ";
                        } else {
                            $device .= $dl;
                        }
                    }

                    $last_events = DB::select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                } else {
                    $last_events = DB::select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                }

                //echo "select name " . $my_events . " from gs_user_last_events_data where user_id=".$user['session_data']['id']." and dt_tracker between '".$start_date."' and '".$end_date."' group by imei";

                // Create a new collection instance.
                $collection = new Collection($last_events);

                $sumArray = array();
                $test = [];
                
                foreach ($last_events as $k => $subArray) {
                    foreach ($subArray as $id => $value) {
                        if($id!='name' && $id!='imei'){
                            $test[] = $collection->sum($id);
                        } 
                    }
                    break; 
                }

                //echo json_encode($test,true);

                echo json_encode(['event_list' => $all_user_events, 'my_events' => $test], true);
            }
            //echo json_encode($last_events, true);
        }
        else if ($type == 'alert_details') {
            $alert_list = "";
            if (isset($request->alert_type) && $request->alert_type[0] != 0) {
                $i = 0;
                foreach ($request->alert_type as $a) {
                    $alert_list .= "'".$a."'";
                    $i++;
                    if ($i < count($request->alert_type)) {
                        $alert_list .= ',';
                    }
                    //echo $a;
                }
                //echo $alert_list;
            }
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list)) {
                        $device_list .= ',';
                    }
                }

                $alert_query_list = ($alert_list!='')?" and event_desc IN('".$alert_list."')":'';

                $final_data = DB::select("SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device_list . ") ".$alert_query_list);
                
                echo "SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device_list . ") ".$alert_query_list;
            } else {
               
                $alert_query_list = ($alert_list!='')?" and event_desc IN('".$alert_list."')":'';

                $final_data = DB::select("SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " ".$alert_query_list);
                echo "SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " ".$alert_query_list;
            }

            echo json_encode($final_data, true);
        }
        else if ($type == 'engine_overview') { 
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $dl = explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list)) {
                        $device .= $dl . ", ";
                    } else {
                        $device .= $dl;
                    }
                }

                $last_events = DB::select("select e.name, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and imei=e.imei) as total_engine_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and imei=e.imei) as total_engine_off from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
            } else {
                $last_events = DB::select("select e.name, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and imei=e.imei) as total_engine_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and imei=e.imei) as total_engine_off from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
            }

            $i = 0;
            $total_engine_on = 0;
            $total_engine_off = 0;

            if (count($last_events) > 0) {
                foreach ($last_events as $e) {
                    $total_engine_on += $e->total_engine_on;
                    $total_engine_off += $e->total_engine_off;
                }
            }

            echo json_encode(['total_device' => count($last_events), 'total_engine_on' => $total_engine_on, 'total_engine_off' => $total_engine_off, 'engine_overview' => $last_events], true);
        }
         else if ($type == 'engine_report') { 
            $last_events = [];
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $dl = explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list)) {
                        $device .= $dl . ", ";
                    } else {
                        $device .= $dl;
                    }
                }

                $last_events = DB::select("SELECT *, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_off FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and event_desc IN('Engine On','Engine Off') and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "'");
            } else {
                $last_events = DB::select("SELECT *, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_off FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and event_desc IN('Engine On','Engine Off') and dt_tracker between '" . $start_date . "' and '" . $end_date . "'");
            }

            $total_on = (count($last_events)>0)?$last_events[0]->total_on:0;
            $total_off = (count($last_events)>0)?$last_events[0]->total_off:0;
            echo json_encode(['event_list'=>$last_events,'total_on'=>$total_on,'total_off'=>$total_off],true);
        } else if ($type == 'fuel') {

            echo json_encode($final_data, true);
        } else if ($type == 'notification') {

            $q = "SELECT * FROM gs_user_last_events_data WHERE user_id = '" .  $user['session_data']['id'] . "'";

            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $dl = explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list)) {
                        $device .= $dl . ", ";
                    } else {
                        $device .= $dl;
                    }
                }

                $q .= " AND imei IN (" . $device . ")";
            }
            $q .= " AND dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' order by event_id desc";

            $res = DB::select($q);
            return Datatables::of($res)
                ->addIndexColumn()
                ->addColumn('coordinate', function ($row) {
                    return '<a href="http://maps.google.com/maps?q=' . $row->lat . ', ' . $row->lng . '&amp;t=m" target="_blank">' . $row->lat . ' °, ' . $row->lng . ' °</a>';
                })
                ->editColumn('dt_tracker', function ($row) {
                    return Carbon::parse($row->dt_tracker)->format('d M Y, h:i a');
                })
                ->rawColumns(['coordinate', 'dt_tracker'])
                ->addColumn('address', function ($row) {
                    return $row->lat.','.$row->lng;
                    //return '<button type="button" class="btn btn-default load_geo_address" data-lat="'.$row->lat.'" data-lng="'.$row->lng.'">Show Address</button>';
                })
                ->make(true);
        } else if ($type == 'report_dashboard') {
            //$final_data = [];
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $data = [];
                foreach ($request->device_list as $d) {
                    if (Schema::hasTable('gs_object_data_' . explode("_", $d)[0])) {
                        $device_imei = explode("_", $d)[0];
                        $device_name = (explode("_", $d)[1] == '') ? 'NA' : explode("_", $d)[1];
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        //$res .= $this->reportsGenerateDrivesAndStops($device_name, $device_imei, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                        $my_fuel_consumption = '0.25';
                        $data[] = $this->reportsDashboardData($device_name, $device_imei, $my_fuel_consumption, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                
            } 
            else if ($type == 'driver_behaviour') { 
                if (isset($request->device_list) && $request->device_list[0] != 0) {
                    $device = "";
                    $i = 0;
                    foreach ($request->device_list as $d) {
                        $dl = explode("_", $d)[0];
                        $i++;
                        if ($i < count($request->device_list)) {
                            $device .= $dl . ", ";
                        } else {
                            $device .= $dl;
                        }
                    }
    
                    $last_events = DB::select("SELECT COUNT(*) as total_over_speed, (SELECT COUNT(*) FROM gs_user_last_events_data where imei in( ".$device.") and event_desc in ('Harsh Break') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_harsh_break, (SELECT COUNT(*) FROM gs_user_last_events_data where imei in( ".$device.") and event_desc in ('Acceleration') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_acceleration FROM gs_user_last_events_data where imei in ( ".$device.") and event_desc in ('Over Speed') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "'");
                } else {
                    $last_events = DB::select("SELECT COUNT(*) as total_over_speed, (SELECT COUNT(*) FROM gs_user_last_events_data where user_id=".$user['session_data']['id']." and event_desc in ('Harsh Break') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_harsh_break, (SELECT COUNT(*) FROM gs_user_last_events_data where user_id=".$user['session_data']['id']." and event_desc in ('Acceleration') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_acceleration FROM gs_user_last_events_data where user_id=".$user['session_data']['id']." and event_desc in ('Over Speed') and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "'");
                }
    
                $i = 0;
                $total_overspeed = 0;
                $total_harsh_break = 0;
                $total_acceleration = 0;
    
                if (count($last_events) > 0) {
                    $total_overspeed = $last_events[0]->total_overspeed;
                    $total_harsh_break = $last_events[0]->total_harsh_break;
                    $total_acceleration = $last_events[0]->total_acceleration;
                }
    
                echo json_encode(['total_overspeed' => $total_overspeed, 'total_harsh_break' => $total_harsh_break, 'total_acceleration' => $total_acceleration], true);
            }
            else {
                $all_device = DB::select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
                $res = "";
                foreach ($all_device as $d) {
                    if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                        $device_imei = $d->imei;
                        $device_name = ($d->device_name == '') ? 'NA' : $d->device_name;
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        $my_fuel_consumption = $d->fuel_consumption;
                        $data[] = $this->reportsDashboardData($device_name, $device_imei,$my_fuel_consumption, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
            }
            $total_travel_time = 0;
            $total_engine_run_time=0;
            $total_engine_stop_time=0;
            $total_stop = 0;
            $total_overspeed=0;
            $total_fuel_consumption=0;
            $total_acceleration = 0;
            $total_harsh_break=0;
            $total_collision=0;
            $total_fuel_consumption= 0;
            $total_fuel_cost = 0;
            $total_other_expense = 0;
            $total_paper_expiring = 0;
            $total_upcoming_maintenance = 0;

            if(count($data)>0){
                foreach($data as $f){
                    $total_travel_time+= $f['travel_time'];
                    $total_engine_run_time+= $f['engine_runtime'];
                    $total_engine_stop_time+= $f['engine_idle_time'];
                    $total_stop+= $f['total_stop_count'];
                    $total_overspeed+= $f['total_overspeed'];
                    $total_acceleration+= $f['total_acceleration'];
                    $total_harsh_break+= $f['total_harshbreak'];
                    $total_collision+= $f['total_collision'];
                    $total_fuel_consumption+= $f['my_fuel_consumption'];
                }
            }

            $final_data = array(
                'total_travel_time'=>$total_travel_time,
                'total_engine_run_time'=>getTimeDetails($total_engine_run_time,true),
                'total_engine_stop_time'=>getTimeDetails($total_engine_stop_time,true),
                'total_stop'=>$total_stop,
                'total_overspeed'=>$total_overspeed,
                'total_acceleration'=>$total_acceleration,
                'total_harsh_break'=>$total_harsh_break,
                'total_collision'=>$total_collision,
                'total_fuel_consumption'=>$total_fuel_consumption,
                'total_fuel_cost'=>$total_fuel_cost,
                'total_other_expense'=>$total_other_expense,
                'total_paper_expiring'=>$total_paper_expiring,
                'total_upcoming_maintenance'=>$total_upcoming_maintenance
            );
            echo json_encode($final_data, true);
        }
    }

    function reportsGenerateDrivesAndStops($device_name = null, $imei, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];
        $result = "";
        $result .= '<h5>' . $device_name . '</h5>';

        $data = getRoute($imei, $dtf, $dtt, $stop_duration, true);

        if (count($data['route']) < 2) {
            return ' '; //return 'nothing found'; //'<table><tr><td>' . $la['NOTHING_HAS_BEEN_FOUND_ON_YOUR_REQUEST'] . '</td></tr></table>';
        }

        $result .= '<table id="trip_report_excel" style="width:100%;"><tr><td>';

        $result .= '<table class="table table-hover table-bordered text-center"><tr class="bg-secondary">' .
            '<th>Travel Time</th>' .
            '<th>Stop Duration</th>' .
            '<th>Distance</th>' .
            '<th>Top Speed</th>' .
            '<th>Avg Speed</th>' .
            '<th>Fuel Consumption</th>' .
            '<th>Cost/km</th>' .
            '<th>Cost/mpg</th>' .
            '<th>Fuel Cost</th>' .
            '<th>Engine Works</th>' .
            '<th>Engine Idle</th>' .
            '</tr><tr>' .
            '<td>' . $data['drives_duration'] . '</td>' .
            '<td>' . $data['stops_duration'] . '</td>' .
            '<td>' . $data['route_length'] . '</td>' .
            '<td>' . $data['top_speed'] . '</td>' .
            '<td>' . $data['avg_speed'] . '</td>' .
            '<td>' . $data['fuel_consumption'] . '</td>' .
            '<td>' . $data['fuel_consumption_per_100km'] . '</td>' .
            '<td>' . $data['fuel_consumption_mpg'] . '</td>' .
            '<td>' . $data['fuel_cost'] . '</td>' .
            '<td>' . $data['engine_work'] . '</td>' .
            '<td>' . $data['engine_idle'] . '</td>' .
            '</tr></table>';

        $result .= '<table class="report table-bordered" width="100%"><tr class="bg-secondary" align="center">';

        if (in_array("status", $data_items)) {
            $result .= '<th rowspan="2">Status</th>';
        }

        if (in_array("start", $data_items)) {
            $result .= '<th rowspan="2">Start</th>';
        }

        if (in_array("end", $data_items)) {
            $result .= '<th rowspan="2">End</th>';
        }

        if (in_array("duration", $data_items)) {
            $result .= '<th rowspan="2">Duration</th>';
        }

        $result .= '<th colspan="3">Stop Position</th>';

        if (in_array("fuel_consumption", $data_items)) {
            $result .= '<th rowspan="2">Fuel Consumption</th>';
        }

        if (in_array("avg_fuel_consumption", $data_items)) {
            if ($_SESSION["unit_capacity"] == 'l') {
                $result .= '<th rowspan="2">km</th>';
            } else {
                $result .= '<th rowspan="2">mpg</th>';
            }
        }

        if (in_array("fuel_cost", $data_items)) {
            $result .= '<th rowspan="2">Fuel Cost</th>';
        }

        if (in_array("engine_idle", $data_items)) {
            $result .= '<th rowspan="2">Engine Idle</th>';
        }

        if (in_array("driver", $data_items)) {
            $result .= '<th rowspan="2">Driver</th>';
        }

        if (in_array("trailer", $data_items)) {
            $result .= '<th rowspan="2">Trailer</th>';
        }

        $result .= '</tr>';

        $result .= '<tr class="bg-secondary" align="center">
				<th>Distance</th>
				<th>Top Speed</th>
				<th>Avg Speed</th>
				</tr>';

        $dt_sort = array();
        for ($i = 0; $i < count($data['stops']); ++$i) {
            $dt_sort[] = $data['stops'][$i][6];
        }
        for ($i = 0; $i < count($data['drives']); ++$i) {
            $dt_sort[] = $data['drives'][$i][4];
        }
        sort($dt_sort);

        for ($i = 0; $i < count($dt_sort); ++$i) {
            for ($j = 0; $j < count($data['stops']); ++$j) {
                if ($data['stops'][$j][6] == $dt_sort[$i]) {
                    $lat = sprintf("%01.6f", $data['stops'][$j][2]);
                    $lng = sprintf("%01.6f", $data['stops'][$j][3]);

                    $result .= '<tr align="center">';

                    if (in_array("status", $data_items)) {
                        $result .= '<td> STOPPED</td>';
                    }

                    if (in_array("start", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][6] . '</td>';
                    }

                    if (in_array("end", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][7] . '</td>';
                    }

                    if (in_array("duration", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][8] . '</td>';
                    }

                    $result .= '<td colspan="3"><a href="http://maps.google.com/maps?q=' . $lat . ', ' . $lng . '&amp;t=m" target="_blank">' . $lat . ' °, ' . $lng . ' °</a></td>';

                    if (in_array("fuel_consumption", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][9] . ' unit </td>';
                    }

                    if (in_array("avg_fuel_consumption", $data_items)) {
                        $result .= '<td></td>';
                    }

                    if (in_array("fuel_cost", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][10] . ' BDT </td>';
                    }

                    if (in_array("engine_idle", $data_items)) {
                        $result .= '<td>' . $data['stops'][$j][11] . '</td>';
                    }

                    if (in_array("driver", $data_items)) {
                        $params = $data['route'][$data['stops'][$j][1]][6];
                        $driver = []; //getObjectDriver($user_id, $imei, $params);
                        $driver['driver_name'] = 'NA';
                        /* if ($driver['driver_name'] == '') {
                            $driver['driver_name'] = 'NA';
                        } */

                        $result .= '<td>' . $driver['driver_name'] . '</td>';
                    }

                    if (in_array("trailer", $data_items)) {
                        $params = $data['route'][$data['stops'][$j][1]][6];
                        $trailer = []; // getObjectTrailer($user_id, $imei, $params);
                        $trailer['trailer_name'] = 'NA';
                        /* if ($trailer['trailer_name'] == '') {
                            $trailer['trailer_name'] = $la['NA'];
                        } */

                        $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                    }

                    $result .= '</tr>';
                }
            }
            for ($j = 0; $j < count($data['drives']); ++$j) {
                if ($data['drives'][$j][4] == $dt_sort[$i]) {
                    $result .= '<tr align="center">';

                    if (in_array("status", $data_items)) {
                        $result .= '<td>' . 'MOVING' . '</td>';
                    }

                    if (in_array("start", $data_items)) {
                        $result .= '<td>' . $data['drives'][$j][4] . '</td>';
                    }

                    if (in_array("end", $data_items)) {
                        $result .= '<td>' . $data['drives'][$j][5] . '</td>';
                    }

                    if (in_array("duration", $data_items)) {
                        $result .= '<td>' . $data['drives'][$j][6] . '</td>';
                    }

                    $result .= '<td>' . $data['drives'][$j][7] . ' kmh </td>
							<td>' . $data['drives'][$j][8] . ' kmh </td>
							<td>' . $data['drives'][$j][9] . ' kmh</td>';

                    if (in_array("fuel_consumption", $data_items)) {
                        $result .= '<td>' . $data['drives'][$j][10] . ' L</td>';
                    }

                    if (in_array("avg_fuel_consumption", $data_items)) {
                        if ($_SESSION["unit_capacity"] == 'l') {
                            $result .= '<td>' . $data['drives'][$j][13] . ' L</td>';
                        } else {
                            $result .= '<td>' . $data['drives'][$j][14] . ' mi </td>';
                        }
                    }

                    if (in_array("fuel_cost", $data_items)) {
                        $result .= '<td>' . $data['drives'][$j][11] . ' $ </td>';
                    }

                    if (in_array("engine_idle", $data_items)) {
                        $result .= '<td></td>';
                    }

                    if (in_array("driver", $data_items)) {
                        $params = $data['route'][$data['drives'][$j][1]][6];
                        $driver = []; //getObjectDriver($user_id, $imei, $params);
                        $driver['driver_name'] = 'NA';
                        /* if ($driver['driver_name'] == '') {
                            $driver['driver_name'] = $la['NA'];
                        } */

                        $result .= '<td>' . $driver['driver_name'] . '</td>';
                    }

                    if (in_array("trailer", $data_items)) {
                        $params = $data['route'][$data['drives'][$j][1]][6];
                        $trailer = []; //getObjectTrailer($user_id, $imei, $params);
                        $trailer['trailer_name'] = 'NA';
                        /* if ($trailer['trailer_name'] == '') {
                            $trailer['trailer_name'] = $la['NA'];
                        } */

                        $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                    }

                    $result .= '</tr>';
                }
            }
        }
        $result .= '</table><hr>';
        $result .= '</td></tr></table>';

        return $result;
    }
    function reportsGenerateWithGraph($device_name = null, $imei, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];
        $final_result = array();
        $result = "";
        $result .= '<h5>' . $device_name . '</h5>';

        $data = getRoute($imei, $dtf, $dtt, $stop_duration, true);

        if (count($data['route']) < 2) {
            return $final_result = array(
                'device_name' => $device_name,
                'total_distance' => 0,
                'engine_runtime' => 0,
                'engine_idle' => 0,
                'summary_table' => ''
            );
        } else {
            $result .= '<table id="trip_report_excel" style="width:100%;"><tr><td>';
            $result .= '<table class="table table-hover table-bordered text-center"><tr class="bg-secondary">' .
                '<th>Travel Time</th>' .
                '<th>Stop Duration</th>' .
                '<th>Distance</th>' .
                '<th>Top Speed</th>' .
                '<th>Avg Speed</th>' .
                '<th>Fuel Consumption</th>' .
                '<th>Cost/km</th>' .
                '<th>Cost/mpg</th>' .
                '<th>Fuel Cost</th>' .
                '<th>Engine Works</th>' .
                '<th>Engine Idle</th>' .
                '</tr><tr>' .
                '<td>' . $data['drives_duration'] . '</td>' .
                '<td>' . $data['stops_duration'] . '</td>' .
                '<td>' . $data['route_length'] . '</td>' .
                '<td>' . $data['top_speed'] . '</td>' .
                '<td>' . $data['avg_speed'] . '</td>' .
                '<td>' . $data['fuel_consumption'] . '</td>' .
                '<td>' . $data['fuel_consumption_per_100km'] . '</td>' .
                '<td>' . $data['fuel_consumption_mpg'] . '</td>' .
                '<td>' . $data['fuel_cost'] . '</td>' .
                '<td>' . $data['engine_work'] . '</td>' .
                '<td>' . $data['engine_idle'] . '</td>' .
                '</tr></table>';

            $result .= '<table class="report table-bordered" width="100%"><tr class="bg-secondary" align="center">';

            if (in_array("status", $data_items)) {
                $result .= '<th rowspan="2">Status</th>';
            }

            if (in_array("start", $data_items)) {
                $result .= '<th rowspan="2">Start</th>';
            }

            if (in_array("end", $data_items)) {
                $result .= '<th rowspan="2">End</th>';
            }

            if (in_array("duration", $data_items)) {
                $result .= '<th rowspan="2">Duration</th>';
            }

            $result .= '<th colspan="3">Stop Position</th>';

            if (in_array("fuel_consumption", $data_items)) {
                $result .= '<th rowspan="2">Fuel Consumption</th>';
            }

            if (in_array("avg_fuel_consumption", $data_items)) {
                if ($_SESSION["unit_capacity"] == 'l') {
                    $result .= '<th rowspan="2">km</th>';
                } else {
                    $result .= '<th rowspan="2">mpg</th>';
                }
            }

            if (in_array("fuel_cost", $data_items)) {
                $result .= '<th rowspan="2">Fuel Cost</th>';
            }

            if (in_array("engine_idle", $data_items)) {
                $result .= '<th rowspan="2">Engine Idle</th>';
            }

            if (in_array("driver", $data_items)) {
                $result .= '<th rowspan="2">Driver</th>';
            }

            if (in_array("trailer", $data_items)) {
                $result .= '<th rowspan="2">Trailer</th>';
            }

            $result .= '</tr>';

            $result .= '<tr align="center">
                    <th>Distance</th>
                    <th>Top Speed</th>
                    <th>Avg Speed</th>
                    </tr>';

            $dt_sort = array();
            for ($i = 0; $i < count($data['stops']); ++$i) {
                $dt_sort[] = $data['stops'][$i][6];
            }
            for ($i = 0; $i < count($data['drives']); ++$i) {
                $dt_sort[] = $data['drives'][$i][4];
            }
            sort($dt_sort);

            for ($i = 0; $i < count($dt_sort); ++$i) {
                for ($j = 0; $j < count($data['stops']); ++$j) {
                    if ($data['stops'][$j][6] == $dt_sort[$i]) {
                        $lat = sprintf("%01.6f", $data['stops'][$j][2]);
                        $lng = sprintf("%01.6f", $data['stops'][$j][3]);

                        $result .= '<tr align="center">';

                        if (in_array("status", $data_items)) {
                            $result .= '<td> STOPPED</td>';
                        }

                        if (in_array("start", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][6] . '</td>';
                        }

                        if (in_array("end", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][7] . '</td>';
                        }

                        if (in_array("duration", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][8] . '</td>';
                        }

                        $result .= '<td colspan="3"><a href="http://maps.google.com/maps?q=' . $lat . ', ' . $lng . '&amp;t=m" target="_blank">' . $lat . ' °, ' . $lng . ' °</a></td>';

                        if (in_array("fuel_consumption", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][9] . ' unit </td>';
                        }

                        if (in_array("avg_fuel_consumption", $data_items)) {
                            $result .= '<td></td>';
                        }

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][10] . ' BDT </td>';
                        }

                        if (in_array("engine_idle", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][11] . '</td>';
                        }

                        if (in_array("driver", $data_items)) {
                            $params = $data['route'][$data['stops'][$j][1]][6];
                            $driver = []; //getObjectDriver($user_id, $imei, $params);
                            $driver['driver_name'] = 'NA';
                            /* if ($driver['driver_name'] == '') {
                                $driver['driver_name'] = 'NA';
                            } */

                            $result .= '<td>' . $driver['driver_name'] . '</td>';
                        }

                        if (in_array("trailer", $data_items)) {
                            $params = $data['route'][$data['stops'][$j][1]][6];
                            $trailer = []; // getObjectTrailer($user_id, $imei, $params);
                            $trailer['trailer_name'] = 'NA';
                            /* if ($trailer['trailer_name'] == '') {
                                $trailer['trailer_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                        }

                        $result .= '</tr>';
                    }
                }
                for ($j = 0; $j < count($data['drives']); ++$j) {
                    if ($data['drives'][$j][4] == $dt_sort[$i]) {
                        $result .= '<tr align="center">';

                        if (in_array("status", $data_items)) {
                            $result .= '<td>' . 'MOVING' . '</td>';
                        }

                        if (in_array("start", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][4] . '</td>';
                        }

                        if (in_array("end", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][5] . '</td>';
                        }

                        if (in_array("duration", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][6] . '</td>';
                        }

                        $result .= '<td>' . $data['drives'][$j][7] . ' kmh </td>
                                <td>' . $data['drives'][$j][8] . ' kmh </td>
                                <td>' . $data['drives'][$j][9] . ' kmh</td>';

                        if (in_array("fuel_consumption", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][10] . ' L</td>';
                        }

                        if (in_array("avg_fuel_consumption", $data_items)) {
                            if ($_SESSION["unit_capacity"] == 'l') {
                                $result .= '<td>' . $data['drives'][$j][13] . ' L</td>';
                            } else {
                                $result .= '<td>' . $data['drives'][$j][14] . ' mi </td>';
                            }
                        }

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][11] . ' $ </td>';
                        }

                        if (in_array("engine_idle", $data_items)) {
                            $result .= '<td></td>';
                        }

                        if (in_array("driver", $data_items)) {
                            $params = $data['route'][$data['drives'][$j][1]][6];
                            $driver = []; //getObjectDriver($user_id, $imei, $params);
                            $driver['driver_name'] = 'NA';
                            /* if ($driver['driver_name'] == '') {
                                $driver['driver_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $driver['driver_name'] . '</td>';
                        }

                        if (in_array("trailer", $data_items)) {
                            $params = $data['route'][$data['drives'][$j][1]][6];
                            $trailer = []; //getObjectTrailer($user_id, $imei, $params);
                            $trailer['trailer_name'] = 'NA';
                            /* if ($trailer['trailer_name'] == '') {
                                $trailer['trailer_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                        }

                        $result .= '</tr>';
                    }
                }
            }
            $result .= '</table><hr>';
            $result .= '</td></tr></table>';
            $data['engine_work'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_work']);
            $data['engine_idle'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_idle']);
            $final_result = array(
                'device_name' => $device_name,
                'total_distance' => $data['route_length'],
                'engine_runtime' => strtotime($data['engine_work'], 0),
                'engine_idle' => strtotime($data['engine_idle'], 0),
                'summary_table' => $result
            );
            return $final_result;
        }
    }

    function reportsDashboardData($device_name = null, $imei,$my_fuel_consumption, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];
        $final_result = array();
        $result = "";
        $result .= '<h5>' . $device_name . '</h5>';

        $data = getRoute($imei, $dtf, $dtt, $stop_duration, true);

        if (count($data['route']) < 2) {
            return $final_result = array(
                'device_name' => $device_name,
                'total_distance' => 0,
                'engine_runtime' => 0,
                'engine_idle' => 0,
                'summary_table' => ''
            );
        } else {
            $result .= '<table id="trip_report_excel" style="width:100%;"><tr><td>';
            $result .= '<table class="table table-hover table-bordered text-center"><tr class="bg-secondary">' .
                '<th>Travel Time</th>' .
                '<th>Stop Duration</th>' .
                '<th>Distance</th>' .
                '<th>Top Speed</th>' .
                '<th>Avg Speed</th>' .
                '<th>Fuel Consumption</th>' .
                '<th>Cost/km</th>' .
                '<th>Cost/mpg</th>' .
                '<th>Fuel Cost</th>' .
                '<th>Engine Works</th>' .
                '<th>Engine Idle</th>' .
                '</tr><tr>' .
                '<td>' . $data['drives_duration'] . '</td>' .
                '<td>' . $data['stops_duration'] . '</td>' .
                '<td>' . $data['route_length'] . '</td>' .
                '<td>' . $data['top_speed'] . '</td>' .
                '<td>' . $data['avg_speed'] . '</td>' .
                '<td>' . $data['fuel_consumption'] . '</td>' .
                '<td>' . $data['fuel_consumption_per_100km'] . '</td>' .
                '<td>' . $data['fuel_consumption_mpg'] . '</td>' .
                '<td>' . $data['fuel_cost'] . '</td>' .
                '<td>' . $data['engine_work'] . '</td>' .
                '<td>' . $data['engine_idle'] . '</td>' .
                '</tr></table>';

            $result .= '<table class="report table-bordered" width="100%"><tr class="bg-secondary" align="center">';

            if (in_array("status", $data_items)) {
                $result .= '<th rowspan="2">Status</th>';
            }

            if (in_array("start", $data_items)) {
                $result .= '<th rowspan="2">Start</th>';
            }

            if (in_array("end", $data_items)) {
                $result .= '<th rowspan="2">End</th>';
            }

            if (in_array("duration", $data_items)) {
                $result .= '<th rowspan="2">Duration</th>';
            }

            $result .= '<th colspan="3">Stop Position</th>';

            if (in_array("fuel_consumption", $data_items)) {
                $result .= '<th rowspan="2">Fuel Consumption</th>';
            }

            if (in_array("avg_fuel_consumption", $data_items)) {
                if ($_SESSION["unit_capacity"] == 'l') {
                    $result .= '<th rowspan="2">km</th>';
                } else {
                    $result .= '<th rowspan="2">mpg</th>';
                }
            }

            if (in_array("fuel_cost", $data_items)) {
                $result .= '<th rowspan="2">Fuel Cost</th>';
            }

            if (in_array("engine_idle", $data_items)) {
                $result .= '<th rowspan="2">Engine Idle</th>';
            }

            if (in_array("driver", $data_items)) {
                $result .= '<th rowspan="2">Driver</th>';
            }

            if (in_array("trailer", $data_items)) {
                $result .= '<th rowspan="2">Trailer</th>';
            }

            $result .= '</tr>';

            $result .= '<tr align="center">
                    <th>Distance</th>
                    <th>Top Speed</th>
                    <th>Avg Speed</th>
                    </tr>';

            $dt_sort = array();
            for ($i = 0; $i < count($data['stops']); ++$i) {
                $dt_sort[] = $data['stops'][$i][6];
            }
            for ($i = 0; $i < count($data['drives']); ++$i) {
                $dt_sort[] = $data['drives'][$i][4];
            }
            sort($dt_sort);

            for ($i = 0; $i < count($dt_sort); ++$i) {
                for ($j = 0; $j < count($data['stops']); ++$j) {
                    if ($data['stops'][$j][6] == $dt_sort[$i]) {
                        $lat = sprintf("%01.6f", $data['stops'][$j][2]);
                        $lng = sprintf("%01.6f", $data['stops'][$j][3]);

                        $result .= '<tr align="center">';

                        if (in_array("status", $data_items)) {
                            $result .= '<td> STOPPED</td>';
                        }

                        if (in_array("start", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][6] . '</td>';
                        }

                        if (in_array("end", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][7] . '</td>';
                        }

                        if (in_array("duration", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][8] . '</td>';
                        }

                        $result .= '<td colspan="3"><a href="http://maps.google.com/maps?q=' . $lat . ', ' . $lng . '&amp;t=m" target="_blank">' . $lat . ' °, ' . $lng . ' °</a></td>';

                        if (in_array("fuel_consumption", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][9] . ' unit </td>';
                        }

                        if (in_array("avg_fuel_consumption", $data_items)) {
                            $result .= '<td></td>';
                        }

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][10] . ' BDT </td>';
                        }

                        if (in_array("engine_idle", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][11] . '</td>';
                        }

                        if (in_array("driver", $data_items)) {
                            $params = $data['route'][$data['stops'][$j][1]][6];
                            $driver = []; //getObjectDriver($user_id, $imei, $params);
                            $driver['driver_name'] = 'NA';
                            /* if ($driver['driver_name'] == '') {
                                $driver['driver_name'] = 'NA';
                            } */

                            $result .= '<td>' . $driver['driver_name'] . '</td>';
                        }

                        if (in_array("trailer", $data_items)) {
                            $params = $data['route'][$data['stops'][$j][1]][6];
                            $trailer = []; // getObjectTrailer($user_id, $imei, $params);
                            $trailer['trailer_name'] = 'NA';
                            /* if ($trailer['trailer_name'] == '') {
                                $trailer['trailer_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                        }

                        $result .= '</tr>';
                    }
                }
                for ($j = 0; $j < count($data['drives']); ++$j) {
                    if ($data['drives'][$j][4] == $dt_sort[$i]) {
                        $result .= '<tr align="center">';

                        if (in_array("status", $data_items)) {
                            $result .= '<td>' . 'MOVING' . '</td>';
                        }

                        if (in_array("start", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][4] . '</td>';
                        }

                        if (in_array("end", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][5] . '</td>';
                        }

                        if (in_array("duration", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][6] . '</td>';
                        }

                        $result .= '<td>' . $data['drives'][$j][7] . ' kmh </td>
                                <td>' . $data['drives'][$j][8] . ' kmh </td>
                                <td>' . $data['drives'][$j][9] . ' kmh</td>';

                        if (in_array("fuel_consumption", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][10] . ' L</td>';
                        }

                        if (in_array("avg_fuel_consumption", $data_items)) {
                            if ($_SESSION["unit_capacity"] == 'l') {
                                $result .= '<td>' . $data['drives'][$j][13] . ' L</td>';
                            } else {
                                $result .= '<td>' . $data['drives'][$j][14] . ' mi </td>';
                            }
                        }

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td>' . $data['drives'][$j][11] . ' $ </td>';
                        }

                        if (in_array("engine_idle", $data_items)) {
                            $result .= '<td></td>';
                        }

                        if (in_array("driver", $data_items)) {
                            $params = $data['route'][$data['drives'][$j][1]][6];
                            $driver = []; //getObjectDriver($user_id, $imei, $params);
                            $driver['driver_name'] = 'NA';
                            /* if ($driver['driver_name'] == '') {
                                $driver['driver_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $driver['driver_name'] . '</td>';
                        }

                        if (in_array("trailer", $data_items)) {
                            $params = $data['route'][$data['drives'][$j][1]][6];
                            $trailer = []; //getObjectTrailer($user_id, $imei, $params);
                            $trailer['trailer_name'] = 'NA';
                            /* if ($trailer['trailer_name'] == '') {
                                $trailer['trailer_name'] = $la['NA'];
                            } */

                            $result .= '<td>' . $trailer['trailer_name'] . '</td>';
                        }

                        $result .= '</tr>';
                    }
                }
            }
            $result .= '</table><hr>';
            $result .= '</td></tr></table>';
            $data['engine_work'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_work']);
            $data['engine_idle'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_idle']);

            $total_overspeed = 0;
            $total_acceleration=0;
            $total_harshbreak = 0;
            $total_collision = 0;

            $sql_event = DB::select("select count(*) as total_engine_on, (select count(*) from gs_user_last_events_data where type='overspeed' and imei='".$imei."' and dt_tracker between '".$dtf."' and '".$dtt."') as total_overspeed, (select count(*) from gs_user_last_events_data where type='harshbreak' and imei='".$imei."' and dt_tracker between '".$dtf."' and '".$dtt."') as total_harshbreak, (select count(*) from gs_user_last_events_data where type='acceleration' and imei='".$imei."' and dt_tracker between '".$dtf."' and '".$dtt."') as total_acceleration from gs_user_last_events_data where event_desc='Engine On' and imei='".$imei."' and dt_tracker between '".$dtf."' and '".$dtt."'");
            if(count($sql_event)>0){
                $total_overspeed = $sql_event[0]->total_overspeed;
                $total_acceleration= $sql_event[0]->total_acceleration;
                $total_harshbreak = $sql_event[0]->total_harshbreak;
                $total_collision = 0;
            }

            $total_fuel_cost = 0;
            $total_other_expense = 0;
            $total_paper_expiring=0; //count
            $total_upcoming_maintenance = 0;
            $device_id_query = DB::select("SELECT gs.id, v.id as v_id FROM gs_objects gs  left join vehicles v on v.object_id = gs.id where imei ='.".$imei."'");
            if(count($device_id_query)>0){
                //show all summary from vms
                $vms_query = DB::select("select sum(total_price) as total_fuel_cost, (select sum(cost_value) from expense_logs where vehicle_id in(".$device_id_query[0]->v_id.") and expense_date between '".$dtf."' and '".$dtt."') as total_expense, (select count(*) from documents where vehicle_id in(".$device_id_query[0]->v_id.") and expiry_date between '".$dtf."' and '".$dtt."') as expiring_doc, (select count(*) from maintenances where vehicle_id in(".$device_id_query[0]->v_id.") and next_main_date between '".$dtf."' and '".$dtt."') as upcoming_main from fuel_logs where vehicle_id in(".$device_id_query[0]->v_id.") and refill_date between '".$dtf."' and '".$dtt."'");
                if(count($vms_query)>0){
                    $total_fuel_cost = $vms_query[0]->total_fuel_cost;
                    $total_other_expense = $vms_query[0]->total_expense;
                    $total_paper_expiring= $vms_query[0]->expiring_doc;
                    $total_upcoming_maintenance = $vms_query[0]->upcoming_main;
                }
            }

            $final_result = array(
                'device_name' => $device_name,
                'travel_time' => $data['route_length'],
                'engine_runtime' => strtotime($data['engine_work'],0),
                'engine_idle_time' => strtotime($data['engine_idle'],0),
                'total_stop_count' => count($data['stops']),
                'total_overspeed' => $total_overspeed,
                'total_acceleration' => $total_acceleration,
                'total_harshbreak' => $total_harshbreak,
                'total_collision' => $total_collision,
                'my_fuel_consumption' => $my_fuel_consumption,
                'total_fuel_cost'=>$total_fuel_cost,
                'total_other_expense'=>$total_other_expense,
                'total_paper_expiring'=>$total_paper_expiring,
                'total_upcoming_maintenance'=>$total_upcoming_maintenance
            );
            return $final_result;
        }
    }
    public function get_single_record($imei_no, $start_date, $end_date)
    {
        $final_data = [];
        $data = getRoute($imei_no, $start_date, $end_date, 1, true);
        $data['imei_no'] = $imei_no;
        $data['selected_date'] = date('Y-m-d', strtotime($start_date));
        $data['route_length'] = (isset($data['route_length'])) ? $data['route_length'] : 0;
        $final_data[] = $data;
        return $final_data;
    }

    public function dealer_search(Request $request, $type){
        if(!isset($request->data) || $request->data==''){
            $res = [];
            echo json_encode($res,true);
        }
        else{
            $id  = Auth::user()->id;
            $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

            $menus = array(
                'items' => array(),
                'parents' => array()
            );

            // Builds the array lists with data from the SQL result
            foreach ($result as $items) {
                // Create current menus item id into array
                $menus['items'][$items->id] = $items;
                // Creates list of all items with children
                $menus['parents'][$items->parent_id][] = $items->id;
            }
            $my_total_child = createTreeview($id, $menus, 'summary');
            $clients_id = getCountFromArray($my_total_child,$my_total_child[0]['id']);

            if($type=='device'){
                $res = DB::select("select d.*, m.name as model_name from gs_objects d left join device_models m on m.id = d.device_model where d.customer_id IN(".$clients_id.$id.") and d.device_name like '%".$request->data."%'");
                //echo "select d.*, m.name as model_name from gs_objects d left join device_models m on m.id = d.device_model where d.customer_id IN(".$clients_id.$id.") and d.device_name like '%".$request->data."%'";
                //die();
                echo json_encode($res,true);
            }
            else if($type=='user'){
                $res = DB::select("select * from customers where id IN(".$clients_id.$id.") and  name like '%".$request->data."%'");
                //echo "select * from customers where id IN(".$clients_id.$id.") and  name like '%".$request->data."%'";
                //die();
                echo json_encode($res,true);
            }
        }
        
    }
}