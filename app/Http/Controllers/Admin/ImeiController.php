<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use App\User;
use App\Models\Customer;
use App\Models\GpsServer;
use App\Models\DeviceModel;
use App\Models\GsObject;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
//use Config;
use Illuminate\Support\Facades\Http;

class ImeiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $summary = DB::select("select count(id) as total_imei, (select count(id) from gs_objects where customer_id>0) as assigned_imei, (select count(id) from gs_objects where customer_id=0) as unassigned_imei, (select count(id) from gs_objects where crm_autosync>0) as crm_connected from gs_objects");

        if($summary){
            $data['total_imei'] = $summary[0]->total_imei;
            $data['assigned_imei'] = $summary[0]->assigned_imei;
            $data['unassigned_imei'] = $summary[0]->unassigned_imei ;
            $data['crm_connected'] = $summary[0]->crm_connected ;
            $data['serverwise_summary'] = DB::select("select count(gs_objects.id) as serverwise_imei, gs_objects.server_id, gps_servers.name as server_name from gs_objects left join gps_servers on gps_servers.id = gs_objects.server_id group by gs_objects.server_id");
        }

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

        $data['dealerTree'] = json_encode(createTreeview(0, $menus, 'json'));
        $search_tree = createTreeview(0, $menus, 'auto');
        $data['searchTree'] = json_encode(nestedToSingle($search_tree), true);

        return view('admin.imei.index')->with($data);
    }

    public function getData($type, $id)
    {
        if ($type == 'table') { // for list of data
            if ($id > 0) {
                $data = DB::select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, (SELECT CASE WHEN other_value=d.sim_status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.sim_status and type=8  limit 1) as sim_status_name, im.name as imei_status,(SELECT CASE WHEN other_value=d.status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.status and type=9  limit 1) as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data im on im.id = d.status where d.customer_id=".$id);
            } else {
                $data = DB::select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, (SELECT CASE WHEN other_value=d.sim_status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.sim_status and type=8  limit 1) as sim_status_name, im.name as imei_status,(SELECT CASE WHEN other_value=d.status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.status and type=9 limit 1) as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data im on im.id = d.status ");
            }
            return Datatables::of($data)
                ->addColumn('checkDevice', function ($row) {
                    $device_id = $row->id;
                    return 'value=' . $device_id . ' data-rel=' . $row->imei;
                })
                ->addIndexColumn()
                ->addColumn('imei_status', function ($row) {
                    if ($row->unit_id > 0) {
                        $imei_status = 'btn-success';
                    } else {
                        $imei_status = 'btn-danger';
                    }
                    return $imei_status;
                })
                ->addColumn('unit_status_name', function ($row) {
                    return $row->unit_status_color.','.$row->unit_status_name;
                    //return '<span class="btn btn-sm" style="background-color:'.$row->unit_status_color.'">'.$row->unit_status_name.'</span>';
                })

                ->addColumn('action', function ($row) {
                    $imei_id = $row->id;
                    $imei_no = $row->imei;
                    $customer_id = $row->customer_id;
                    $crm_exist = $row->crm_exist;
                    return
                        "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($imei_id)'><i class='fas fa-eye'></i></button>
    
                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($imei_id)'><i class='fas fa-edit'></i></button>
    
                    <div class='dropdown custom-dreopdown'>
                        <button class='custom-button-class mr-2' data-toggle='dropdown'><i class='fas fa-cog'></i></button>
                        <ul class='dropdown-menu custom-dreopdown-menu'>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='track($imei_no)'><i class='fas fa-search-location mr-2 mt-1'></i>Track</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='command($imei_no)'><i class='fas fa-code mr-2 mt-1'></i>Command</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='monitor($imei_no)'><i class='fas fa-tv mr-2 mt-1'></i>Monitor</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='imei_transfer($imei_no)'><i class='fas fa-exchange-alt mr-2 mt-1'></i>IMEI transfer</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='playback($imei_no)'><i class='fas fa-history mr-2 mt-1'></i>Playback</a></li>
                        </ul>
                    </div>
    
                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#assignModal' onclick='assign_device($imei_id,$customer_id,$crm_exist)'><i class='fas fa-exchange-alt'></i></button>";
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        else{
            if ($id > 0) {
                $data = DB::select(" select d.*, s.name as server_name, s.hosting_name, s.hosting_country,s.hosting_realip, s.hosting_url, s.hosting_userid,s.hosting_password,s.server_details, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id where d.id=" . $id . " order by d.id desc");
            } else {
                $data = [array('no_data'=>1)];
            }
            $output['imei_details'] = $data[0];
            return view('admin.imei.imei_details')->with($output);
        }
    }

    public function tuStatusLog($id)
    {
         $data = DB::select("select dsl.*, pus.name as ps_name, pus.status_color as p_status_color, cus.name as cs_name, cus.status_color as c_status_color, gs.device_name, gs.imei, gs.sim_number, gs.customer_id, c.customer_name from device_status_log dsl left join unit_status  pus on pus.id = dsl.previous_status left join unit_status cus on cus.id = dsl.current_status left join gs_objects gs  on gs.id = dsl.device_id left join customers c on c.id = gs.customer_id where dsl.device_id =".$id);
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

    public function getLogData($id)
    {
        
        if($id> 0)
        {
            $logData= DB::select('select dl.*, gs.device_name, gs.imei, u.name as username, tb.customer_name as t_by, tf.customer_name as t_from, tf.active as tf_active, tf.global_status as tf_gs, tt.customer_name as t_to, tt.active as tt_active, tt.global_status as tt_gs from device_log dl left join gs_objects gs on gs.id = dl.device_id left join users u on u.id = dl.update_by left join customers tb on tb.id = dl.loggedin_customer left join customers tf on tf.id = dl.previous_customer  left join customers tt on tt.id = dl.current_customer where dl.device_id=' . $id . ' order by dl.id desc');
        }else{
            $logData= DB::select('select dl.*, gs.device_name, gs.imei, u.name as username, tb.customer_name as t_by, tf.customer_name as t_from, tf.active as tf_active, tf.global_status as tf_gs, tt.customer_name as t_to, tt.active as tt_active, tt.global_status as tt_gs from device_log dl left join gs_objects gs on gs.id = dl.device_id left join users u on u.id = dl.update_by left join customers tb on tb.id = dl.loggedin_customer left join customers tf on tf.id = dl.previous_customer  left join customers tt on tt.id = dl.current_customer  order by dl.id desc');
        }
        // dd($logData);
        return Datatables::of($logData)
                        ->addIndexColumn()
                        ->editColumn('username', function ($data) {
                            if ($data->update_by == 0 && $data->loggedin_customer > 0) {
                                $updatedBy = $data->t_by.'<span class=" ml-2 badge badge-pill badge-warning">Dealer</span>';
                            } else {
                                $updatedBy = $data->username.'<span class=" ml-2 badge badge-pill badge-success">Admin</span>';
                            }
                            return $updatedBy;
                        })
                        ->editColumn('t_from', function ($data) {
                            $data->tf_active = ($data->tf_active=='')?0:$data->tf_active;
                            $data->tf_gs = ($data->tf_gs=='')?0:$data->tf_gs;
                            $a_status_color=['btn-danger', 'btn-success'];
                            $g_status_color=['badge-warning', 'badge-success', 'badge-info', 'badge-info color-purple', 'badge-danger'];
                            $g_status=['Inactive', 'Active', 'Overdue', 'On Hold', 'Stop'];
                            $tFrom= '<span class=" mr-1 btn btn-sm '.$a_status_color[$data->tf_active].'"></span>'.$data->t_from.'<span class=" ml-2 badge badge-pill '.$g_status_color[$data->tf_gs].'">'.$g_status[$data->tf_gs].'</span>';
                            return $tFrom;
                        })
                        ->editColumn('t_to', function ($data) {
                            $data->tt_active = ($data->tt_active=='')?0:$data->tt_active;
                            $data->tt_gs = ($data->tt_gs=='')?0:$data->tt_gs;
                            $a_status_color=['btn-danger', 'btn-success'];
                            $g_status_color=['badge-warning', 'badge-success', 'badge-info', 'badge-info color-purple', 'badge-danger'];
                            $g_status=['Inactive', 'Active', 'Overdue', 'On Hold', 'Stop'];
                            $tTo= '<span class=" mr-1 btn btn-sm '.$a_status_color[$data->tt_active].'"></span>'.$data->t_to.'<span class=" ml-2 badge badge-pill '.$g_status_color[$data->tt_gs].'">'.$g_status[$data->tt_gs].'</span>';
                            return $tTo;
                        })
                        ->rawColumns(['username', 't_from', 't_to'])
                        ->make(true);
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
            for($i=0; $i<count($request->moving_devices); $i++){
                $query_string.="('".$request->moving_devices[$i]."', '".$request->previous_crm_exist."', '".$request->previous_customer_id."', '".$request->moving_to_user."', '". Auth::user()->toArray()['id']."')";
                if($i<count($request->moving_devices)-1){
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
    public function saveBatchMove(Request $request)
    { 
        /* echo 'moving to:'.$request->moving_to_user.PHP_EOL;
        echo var_export($request->moving_devices,true);
        die(); */
        
        $info = array(
            'customer_id' => $request->moving_to_user
        );
        $done = DB::table('gs_objects')->whereIn('id', $request->moving_devices)->update($info);

        if ($done>=0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function update_imei(Request $request){
        $info = array(
            'device_name' => $request->device_name,
            'plate_number' => $request->plate_number,
            'expiry_date' => ($request->expiry_date=='')?'':date('Y-m-d',strtotime($request->expiry_date)),
            'note' => $request->note
        );

        $done = DB::table('gs_objects')->whereIn('id', [$request->id])->update($info);

        if ($done) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function imeiTransferLog(Request $request)
    {
        return view('admin.logs.imei_transfer_log');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $customers = Customer::get();
        $servers = GpsServer::get();
        $devices = DeviceModel::get();
        return view('admin.imei.create', compact('users', 'customers', 'servers', 'devices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            $validate = Validator::make($request->all(), [
                'imei_number' => 'required|unique:gs_objects,imei',
                'opening_date' => 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            $opening_date = Carbon::parse($request->opening_date)->format('Y-m-d H:i:s');
            $server_id = ($request->server_name != '') ? $request->server_name : 0;
            $device_model = ($request->device_model != '') ? $request->device_model : 0;
            $transfer_date = ($request->transfer_date != '') ? Carbon::parse($request->transfer_date)->format('Y-m-d H:i:s') : null;
            $expiry_date = ($request->expiry_date != '') ? Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s') : null;
            $online_time = ($request->online_time != '') ? Carbon::parse($request->online_time)->format('Y-m-d H:i:s') : null;
            $crm_autosync = ($request->crm_autosync == 'on') ? 1 : 0;
            $user_due = ($request->user_due != '') ? $request->user_due : 0;

            DB::beginTransaction();
            $imei = new GsObject();
            $imei->imei = $request->imei_number;
            $imei->device_name = $request->device_name;
            $imei->server_id = $server_id;
            $imei->device_model = $device_model;
            $imei->opening_date = $opening_date;
            $imei->crm_autosync = $crm_autosync;
            // $imei->customer_id = $request->customer_name; 
            // $imei->employee_id = $request->employee_name; 
            // $imei->plate_number = $request->plate_number; 
            // $imei->sim_number = $request->sim_number; 
            $imei->sim_type = $request->sim_type;
            $imei->sim_status = $request->sim_status;
            // $imei->transfer_date = $transfer_date; 
            // $imei->expiry_date = $expiry_date; 
            // $imei->online_time = $online_time; 
            // $imei->status = $request->status; 
            $imei->tu_package_type = $request->tu_package_type;
            $imei->user_due = $user_due;
            // $imei->unit_id = $request->tu_id; 
            $imei->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imei = GsObject::leftJoin('gps_servers', 'gps_servers.id', 'gs_objects.server_id')
            ->leftJoin('device_models', 'device_models.id', 'gs_objects.device_model')
            ->select(
                'gs_objects.*',
                'gps_servers.name as server_name',
                'device_models.name as device_model_name'
            )
            ->find($id);
        return view('admin.imei.show', compact('imei'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imei = GsObject::find($id);
        $users = User::get();
        $customers = Customer::get();
        $servers = GpsServer::get();
        $devices = DeviceModel::get();
        return view('admin.imei.edit', compact('imei', 'users', 'customers', 'servers', 'devices'));
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
        try {


            $validate = Validator::make($request->all(), [
                'imei_number' => 'required',
                'opening_date' => 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            $opening_date = Carbon::parse($request->opening_date)->format('Y-m-d H:i:s');
            $server_id = ($request->server_name != '') ? $request->server_name : 0;
            $device_model = ($request->device_model != '') ? $request->device_model : 0;
            $transfer_date = ($request->transfer_date != '') ? Carbon::parse($request->transfer_date)->format('Y-m-d H:i:s') : null;
            $expiry_date = ($request->expiry_date != '') ? Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s') : null;
            $online_time = ($request->online_time != '') ? Carbon::parse($request->online_time)->format('Y-m-d H:i:s') : null;
            $crm_autosync = ($request->crm_autosync == 'on') ? 1 : 0;
            $user_due = ($request->user_due != '') ? $request->user_due : 0;

            DB::beginTransaction();
            $imei = GsObject::find($id);
            $imei->imei = $request->imei_number;
            $imei->device_name = $request->device_name;
            $imei->server_id = $server_id;
            $imei->device_model = $device_model;
            $imei->opening_date = $opening_date;
            $imei->crm_autosync = $crm_autosync;
            // $imei->customer_id = $request->customer_name; 
            // $imei->employee_id = $request->employee_name; 
            // $imei->plate_number = $request->plate_number; 
            // $imei->sim_number = $request->sim_number; 
            // $imei->sim_type = $request->sim_type;
            // $imei->sim_status = $request->sim_status;
            // $imei->transfer_date = $transfer_date; 
            // $imei->expiry_date = $expiry_date; 
            // $imei->online_time = $online_time; 
            // $imei->status = $request->status; 
            // $imei->tu_package_type = $request->tu_package_type;
            $imei->user_due = $user_due;
            // $imei->unit_id = $request->tu_id; 
            $imei->save();
            DB::commit();

            //call CRM API 
            if ($crm_autosync == 1) {
                $api_data = [];
                $api_data['username'] = 'super'; // Config::get('app.MEHSUPERUSER');
                $api_data['password'] = 'gofaizza';  //Config::get('app.MEHSUPERPASS');
                $api_data['imei_no'] = $request->imei_number;
                $api_data['model_id'] = $device_model;
                $api_data['opening_date'] = $opening_date;
                $api_url = 'https://newcrm.gomaxbd.com/api/v1/crm' . '/saveimei'; //Config::get('app.APIURL').'/saveimei';

                $client = new \GuzzleHttp\Client();
                $response = $client->post($api_url, [
                    'headers' => ['Content-Type' => 'application/json'],
                    'body' => json_encode($api_data)
                ]);

                //echo $response->getBody();
            }

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {

        //     DB::beginTransaction();
        //     $imei= GsObject::find($id); //fetch data
        //     $imei->delete(); // Data delete
        //     DB::commit();

        //     return true;

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return false;
        // }
    }
}
