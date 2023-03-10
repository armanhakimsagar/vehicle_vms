<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use App\Models\GsObject;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Config;
use Schema;
class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.business.home');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function business()
    {
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user

        $first_child = DB::select('select id from customers where parent_id=0 order by id asc limit 1');
        $data['first_child'] = $first_child[0]->id;
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

        $data['dealerTree'] = json_encode(createTreeview(0, $menus, 'json'));
        $search_tree = createTreeview(0, $menus, 'auto');
        $data['searchTree'] = json_encode(nestedToSingle($search_tree),true);
        $data['global_status_list'] = getTableWhere("combo_data", array('type'=>1))->toArray();
        return view('admin.business.business')->with($data);
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
        //$data = DB::select(" select d.*, s.name as server_name, m.name as model_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model where d.customer_id=" . $id . " order by d.id desc");
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
        $info = array(
            'device_name' => $request->device_name,
            'plate_number' => $request->plate_number,
            'sim_number' => $request->sim_number
        );
        $done = DB::table('gs_objects')->where('id', $request->id)->update($info);
        if ($done) {
            echo 1;
        } else {
            echo 0;
        }
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

        /* echo $request->id.PHP_EOL;
        echo '<pre>'.var_export($info,true).'</pre>';
        die(); */

        $done = DB::table('customers')->where('id', $request->id)->update($info);
        if ($done>=0) {
            echo 1;
            $api_username = Config::get('app.MEHSUPERUSER');
            $api_pass = Config::get('app.MEHSUPERPASS');
            $api_data = [];
            $api_data['api_username'] = $api_username;
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
            
        } else {
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
            $query_string = "INSERT INTO device_log(device_id,device_status,previous_customer,current_customer,update_by) VALUES";
            for($i=0; $i<count($request->device_with_crmexist); $i++){
                $query_string.="('".$request->device_with_crmexist[$i]['id']."', '".$request->device_with_crmexist[$i]['crm_exist']."', '".$request->device_with_crmexist[$i]['previous_customer']."', '".$request->moving_to_user."', '". Auth::user()->toArray()['id']."')";
                if($i<count($request->device_with_crmexist)-1){
                    $query_string.=", ";
                }
                else{
                    $query_string.=";";
                }
            }

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

    public function devices($userid)
    {
        $final_data = array();
        $data = DB::select(" select d.*, s.name as server_name, m.name as model_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model where d.customer_id=" . $userid . " order by d.id desc");
        foreach ($data as $d) {
            if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                $gs_tables = DB::select("select lat, lng, angle,speed, params from gs_object_data_" . $d->imei . " order by id desc limit 1");
                if ($gs_tables) {
                    $d->lat = $gs_tables[0]->lat;
                    $d->lng = $gs_tables[0]->lng;
                    $d->angle = $gs_tables[0]->angle;
                    $d->speed = $gs_tables[0]->speed;
                    $d->params = $gs_tables[0]->params;
                } else {
                    $d->lat = 0;
                    $d->lng = 0;
                    $d->angle = 0;
                    $d->speed = 0;
                    $d->params = '';
                }
            } else {
                $d->lat = 0;
                $d->lng = 0;
                $d->angle = 0;
                $d->speed = 0;
                $d->params = '';
            }
            array_push($final_data, $d);
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

    public function showMonitor_admin()
    {
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        $data['customer_id'] = 0; // 0 means all user will be listed in the tree
        return view('monitor.v1.admin_monitor')->with($data);
    }

    public function showMonitor($id)
    {
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        $data['customer_id'] = $id;
        return view('monitor.v1.admin_monitor')->with($data);
    }

    public function monitor()
    {
        return view('layouts.admin.dealer-monitor.monitor1');
    }
    public function report()
    {
        return view('admin.dealer-report.report');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
