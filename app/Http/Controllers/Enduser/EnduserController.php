<?php

namespace App\Http\Controllers\Enduser;

use Schema;
use File;
use App\Models\Customer;
use App\Models\Vehicle;
use Carbon\Carbon;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class EnduserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.enduser.dashboard.master');
    }

    public function get_geofence_data($customer_id, $imei)
    {
        $res = $this->my_connection->select("SELECT * FROM geofences WHERE customer_id=" . $customer_id . " and find_in_set('" . $imei . "',imei_no)");
        if ($res) {
            return $res[0]->coordinates;
        } else {
            return false;
        }
    }

    public function devices($userid)
    {

        $final_data = array();
        $data = $this->my_connection->select("select d.*, s.name as server_name, m.name as model_name, c.name as customer_name, crm.name as crm_customer_name, u.name as unit_status_name, u.status_color as unit_status_color, (SELECT CASE WHEN other_value=d.sim_status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.sim_status and type=8  limit 1) as sim_status_name, im.name as imei_status,(SELECT CASE WHEN other_value=d.status THEN name ELSE '' END as 'status_name' FROM combo_data where other_value=d.status and type=9 limit 1) as imei_status_name from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model left join customers c on c.id = d.customer_id left join customers crm on crm.id = d.crm_customer_id left join unit_status u on u.id = d.unit_status left join combo_data im on im.id = d.status where d.customer_id=" . $userid . " order by d.id desc");
        $sensor_list = [];

        //to store all events in every 10 secs call and execute after the last item in the device loop
        $temp_event_array = [];
        foreach ($data as $d) {
            $d->st = 'f';
            $d->ststr = 'DISABLED';
            if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                $gs_tables = $this->my_connection->select("select dt_server,dt_tracker, lat, lng, altitude, angle,speed, params,dt_last_stop,dt_last_idle, dt_last_move from gs_object_data_" . $d->imei . " order by dt_tracker desc limit 1");

                if (count($gs_tables) > 0) {
                    $sensor_list = $this->my_connection->select("SELECT s.*, n.name as sensor_parameter_name, t.name as sensor_type_name FROM gps_sensors s left join master_settings n on n.id = s.sensor_parameter_id left join master_settings t on t.id=s.sensor_type_id where s.model_id='" . $d->device_model . "' and s.server_id=".$d->server_id);
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
                        if ($k == 'acc') {
                            $d->engine_on = $v;
                        }
                        if ($k == 'bats') {
                            $d->battery_status = $v;
                        }
                        if ($k == 'batl') {
                            $d->battery_level = $v;
                        }
                    }

                    $gs_tables_prev = $this->my_connection->select("select dt_server,dt_tracker, lat, lng, altitude, angle,speed, params from gs_object_data_" . $d->imei . " order by dt_tracker desc limit 1 offset 1");

                    if (count($gs_tables_prev) > 0) {
                        $startTime = Carbon::parse($gs_tables_prev[0]->dt_tracker);
                        $endTime = Carbon::parse($gs_tables[0]->dt_tracker);
                        $totalDuration = $startTime->diff($endTime)->format('%S') . "";
                        $d->device_status = ($totalDuration <= 7200) ? 1 : 0; // 1 = online, 0 = offline
                    } else {
                        $d->device_status = 0;
                    }

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
                    $d->zone_in = 0;
                    $d->zone_out = 0;
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
        }

        echo json_encode($final_data, true);
    }

    public function showReport()
    {
        // dd('hello report page');
        $data['session_data'] = Auth::user()->toArray();

        $data['device_list'] = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $data['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
        $data['alert_list'] = $this->my_connection->select("SELECT * FROM gs_user_events WHERE user_id=" . $data['session_data']['id'] . " ORDER BY event_id ASC");
        $data['total_device_qty'] = count($data['device_list']);
        return view('layouts.report.main')->with($data);
    }

    public function profile()
    {
        return view('layouts.enduser.profile.master');
    }

    public function profilePage($pages = null, $data_tab = null)
    {
        $auth_id = Auth::user()->id;
        $data['data_tab'] = $data_tab;
        if ($pages == 'profile') {
            $query = $this->my_connection->select("select count(*) as total_device, (select count(*) from gs_objects where customer_id =" . $auth_id . " and unit_status = 1) as active_device, (select count(*) from gs_objects where customer_id =" . $auth_id . " and unit_status = 0) as inactive_device, (select count(*) from gs_objects where customer_id =" . $auth_id . " and unit_status = 4) as servicing_device, (select count(*) from gs_objects where customer_id =" . $auth_id . " and unit_status = 3) as overdue_device, (select count(*) from gs_objects where customer_id =" . $auth_id . " and unit_status = 10) as sold_device from gs_objects where customer_id =" . $auth_id);

            $data['total_device'] =  $query[0]->total_device;
            $data['active_device'] = $query[0]->active_device;
            $data['inactive_device'] = $query[0]->inactive_device;
            $data['servicing_device'] = $query[0]->servicing_device;
            $data['overdue_device'] = $query[0]->overdue_device;
            $data['sold_device'] = $query[0]->sold_device;
        } else if ($pages == 'complain') {
            $query = $this->my_connection->select("select count(*) as total_complain, (select count(*) from complains where customer_id =" . $auth_id . " and status = 1) as solved_complain, (select count(*) from complains where customer_id =" . $auth_id . " and status = 0) as proccess_complain from complains where customer_id =" . $auth_id);

            $data['total_complain'] =  $query[0]->total_complain;
            $data['solved_complain'] = $query[0]->solved_complain;
            $data['proccess_complain'] = $query[0]->proccess_complain;
        }
        $data['devices'] = $this->my_connection->select("select gs.id, gs.imei, gs.device_name, gs.unit_status, cd.name as cd_name from gs_objects gs left join combo_data cd on cd.id = gs.unit_status where gs.customer_id =" . $auth_id);

        $data['tickets'] = $this->my_connection->select("select t.id, t.name as t_name from ticket_type t ");

        $data['profile'] = Customer::find($auth_id);
        return view('enduser.profile.' . $pages)->with($data);
    }

    public function changeInfo(Request $request, $type)
    {
        try {
            $auth = Auth::user();
            $customer = Customer::find($auth->id);
            if ($type == 'photo') {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg',
                ]);

                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }
                DB::beginTransaction();

                $oldImg = $customer->profile_photo;
                $image = $request->file('image');
                if ($image) {
                    $imgName = date("Ymd_His");
                    $ext = strtolower($image->getClientOriginalExtension());
                    $fullName = $imgName . '.' . $ext;
                    $uploadPath = 'public/uploads/user/';
                    $uploadTo = $image->move($uploadPath, $fullName);
                    $customer->profile_photo = $fullName;
                    $image_path = $uploadPath . $oldImg;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $customer->save();
                DB::commit();
                return true;
            }

            if ($type == 'password') {
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

        } catch (\Exception $e) {
            DB::rollBack();
            return false;

        }
    }

    public function brandingInfo(Request $request, $type)
    {
        try {

            $auth = Auth::user();
            $customer = Customer::find($auth->id);

            if ($type == "company_light_logo") {
                $image = $request->file('light_logo');
                $oldImg = $customer->company_light_logo;

                $validator = Validator::make($request->all(), [
                    'light_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            } else if ($type == "company_dark_logo") {
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

            if ($image) {
                $imgName = $auth->username . "_" . date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/user/logos/';
                $uploadTo = $image->move($uploadPath, $fullName);
                $image_path = $uploadPath . $oldImg;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                if ($type == "company_light_logo") {
                    $customer->company_light_logo = $fullName;
                } else if ($type == "company_dark_logo") {
                    $customer->company_dark_logo = $fullName;
                } else if ($type == "favicon") {
                    $customer->favicon = $fullName;
                }

                $customer->save();
            }

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;

        }
    }
    public function getActivitiesData()
    {

        $data = $this->my_connection->select("select cl.*, c.customer_name, c.username from customer_logs cl left join customers c on c.id = cl.customer_id where cl.customer_id =" . Auth::user()->id . " order by cl.id desc");
        return Datatables::of($data)
            ->addIndexColumn()

            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return "Password mismatch";
                } else if ($data->status == 1) {
                    return "Success";
                } else if ($data->status == 2) {
                    return "Account inactive";
                }
            })
            ->editColumn('created_at', function ($data) {
                $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                return $createdDate;
            })
            ->rawColumns(['created_at', 'action'])
            ->make(true);
    }
    public function imeiList()
    {
        $data = $this->my_connection->select("select gs.*, cd.name as cd_name, cd.other_value from gs_objects gs left join combo_data cd on cd.id = gs.unit_status where gs.customer_id =" . Auth::user()->id);
        return Datatables::of($data)
            // ->addColumn('checkDevice', function ($row) {
            //     $device_id = $row->id;
            //     return 'value=' . $device_id . ' data-rel=' . $row->imei;
            // })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $imei_id = $row->id;
                $imei_no = $row->imei;
                $customer_id = $row->customer_id;
                $crm_exist = $row->crm_exist;
                return
                    "<div class='d-flex' style='float: left'><button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($imei_id)'><i class='fas fa-eye'></i></button></div>

                    <div class='dropdown custom-dreopdown d-flex'>
                        <button class='custom-button-class mr-2' data-toggle='dropdown'><i class='fas fa-cog'></i></button>
                        <ul class='dropdown-menu custom-dreopdown-menu'>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='track($imei_no)'><i class='fas fa-search-location mr-2 mt-1'></i>Track</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='command($imei_no)'><i class='fas fa-code mr-2 mt-1'></i>Command</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='monitor($imei_no)'><i class='fas fa-tv mr-2 mt-1'></i>Monitor</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='imei_transfer($imei_no)'><i class='fas fa-exchange-alt mr-2 mt-1'></i>IMEI transfer</a></li>
                            <li><a class='custom-dreopdown-item' id=$imei_no href='javascript:;' onClick='playback($imei_no)'><i class='fas fa-history mr-2 mt-1'></i>Playback</a></li>
                        </ul>
                    </div>";
            })
            ->editColumn('status', function ($row) {
                return "<span class=' badge badge-pill badge-" . $row->other_value . "'>" . $row->cd_name . "</span>";
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function imeiStatuslog()
    {
        $data = $this->my_connection->select("select dsl.*, pus.name as ps_name, pus.status_color as p_status_color, cus.name as cs_name, cus.status_color as c_status_color, gs.device_name, gs.imei, gs.sim_number, gs.customer_id from device_status_log dsl left join unit_status  pus on pus.id = dsl.previous_status left join unit_status cus on cus.id = dsl.current_status left join gs_objects gs  on gs.id = dsl.device_id where gs.customer_id =" . Auth::user()->id);
        return Datatables::of($data)
            // ->addColumn('checkDevice', function ($row) {
            //     $device_id = $row->id;
            //     return 'value=' . $device_id . ' data-rel=' . $row->imei;
            // })
            ->addIndexColumn()
            ->editColumn('previous_status', function ($row) {
                $ps = "<span class='badge badge-pill' style='background-color:" . $row->p_status_color . ";'>" . $row->ps_name . "</span>";
                return $ps;
            })
            ->editColumn('current_status', function ($row) {
                $cs = "<span class='badge badge-pill' style='background-color:" . $row->c_status_color . ";'>" . $row->cs_name . "</span>";
                return $cs;
            })
            ->editColumn('previous_status_date', function ($row) {
                $PSDate = Carbon::parse($row->previous_status_date)->format('d M Y, h:i a');
                return $PSDate;
            })
            ->editColumn('last_update', function ($row) {

                $startTime = Carbon::parse(time());
                $endTime = Carbon::parse($row->last_update);
                $totalDuration = $startTime->diff($endTime)->format('%d') . " days";

                return $totalDuration;
            })
            ->rawColumns(['previous_status', 'current_status', 'previous_status_date', 'last_update'])
            ->make(true);
    }
    public function singleImeiStatusLog($id)
    {
        $data = $this->my_connection->select("select dsl.*, pus.name as ps_name, pus.status_color as p_status_color, cus.name as cs_name, cus.status_color as c_status_color, gs.device_name, gs.imei, gs.sim_number, gs.customer_id, c.customer_name from device_status_log dsl left join unit_status  pus on pus.id = dsl.previous_status left join unit_status cus on cus.id = dsl.current_status left join gs_objects gs  on gs.id = dsl.device_id left join customers c on c.id = gs.customer_id where dsl.device_id =" . $id);
        return Datatables::of($data)
            // ->addColumn('checkDevice', function ($row) {
            //     $device_id = $row->id;
            //     return 'value=' . $device_id . ' data-rel=' . $row->imei;
            // })
            ->addIndexColumn()
            ->editColumn('previous_status', function ($row) {
                $ps = "<span class='badge badge-pill' style='background-color:" . $row->p_status_color . ";'>" . $row->ps_name . "</span>";
                return $ps;
            })
            ->editColumn('current_status', function ($row) {
                $cs = "<span class='badge badge-pill' style='background-color:" . $row->c_status_color . ";'>" . $row->cs_name . "</span>";
                return $cs;
            })
            ->editColumn('previous_status_date', function ($row) {
                $PSDate = Carbon::parse($row->previous_status_date)->format('d M Y, h:i a');
                return $PSDate;
            })
            ->editColumn('last_update', function ($row) {

                $startTime = Carbon::parse(time());
                $endTime = Carbon::parse($row->last_update);
                $totalDuration = $startTime->diff($endTime)->format('%d') . " Days Ago";

                return $totalDuration;
            })
            ->rawColumns(['previous_status', 'current_status', 'previous_status_date', 'last_update'])
            ->make(true);
    }

    function device_at_a_glance()
    {
        $customer_id = Auth::user()->id;
        $query = $this->my_connection->select("SELECT count(*) as t_dvc, (SELECT count(*) from gs_objects where customer_id = " . $customer_id . " and unit_status = 1) as t_a_dvc, (SELECT count(*) from gs_objects where customer_id = " . $customer_id . " and unit_status = 2) as t_h_dvc, (SELECT count(*) from gs_objects where customer_id = " . $customer_id . " and unit_status = 4 ) as t_s_dvc FROM `gs_objects` where customer_id = " . $customer_id);

        $data['t_dvc'] = $query[0]->t_dvc;
        $data['t_a_dvc'] = $query[0]->t_a_dvc;
        $data['t_h_dvc'] = $query[0]->t_h_dvc;
        $data['t_s_dvc'] = $query[0]->t_s_dvc;
        return $data;
    }

    function getDeviceEventData($imei)
    {
        $event_data = $this->my_connection->select("select event_desc, dt_tracker, lat, lng, speed from gs_user_last_events_data where imei in (" . $imei . ")  order by event_id desc limit 10");

        $htmlContent = '';
        $i = 0;
        if (count($event_data) > 0) {
            foreach ($event_data as $event) {
                $i++;

                $htmlContent .= '<tr >
                                    <td >' . $i . '</td>
                                    <td >' . date('d M Y h:i a', strtotime($event->dt_tracker)) . '</td>
                                    <td >' . $event->event_desc . '</td>
                                    <td > <a href="http://maps.google.com/maps?q=' . $event->lat . ',' . $event->lng . '&amp;t=m" target="_blank">' . $event->lat . '°,' . $event->lng . '°</a></td>
                                    <td > ' . number_format($event->speed, 2)  . ' km</td>
                                </tr>';
            }
        } else {
            $htmlContent .= '<span>No event data found</span>';
        }
        // dd($htmlContent);
        return $htmlContent;
    }
    public function showTree($id)
    {

        $result = $this->my_connection->select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $menus = array(
            'items' => array(),
            'parents' => array(),
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

    public function showMonitor()
    {
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user
        $data['command_list'] = getTableWhere('master_settings', array('type' => 6));
        $data['modelwise_command'] = json_encode(getTableWhere('gps_commands', array()), true);
        $data['vehicles'] = Vehicle::all();
        $data['complain_types'] = $this->my_connection->select("select t.id, t.name as t_name from ticket_type t ");

        $result = $this->my_connection->select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status where c.id=' . $data['session_data']['id']);

        $data['customer_details'] = $result[0];

        $menus = array(
            'items' => array(),
            'parents' => array()
        );

        $result_all_tree = $this->my_connection->select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

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
        $data['test_jewel'] = array();
        //$data['imei_status'] = checkObjectActive('355710099736998');
        return view('enduser.monitor.v1.customer_monitor')->with($data);
    }

    public function getDeviceCommand($model_id)
    {
        $data = $this->my_connection->select("select c.*, m.full_name as command_name from gps_commands c left join master_settings m on m.id = c.command_id where c.model_id=" . $model_id);
        if ($data >= 0) {
            echo json_encode($data, true);
        }
        //echo json_encode(getTableWhere('gps_commands', array('model_id'=>$model_id)),true);
    }

    public function showPlayback(Request $request)
    {
        $result = $this->my_connection->select("select lat, lng from gs_object_data_" . $request->device_id . " where dt_tracker between '" . $request->start_date . "' and '" . $request->end_date . "' and speed>0 group by dt_tracker");
        /* $data['start_lat'] = $result[0]->lat;
        $data['start_lng'] = $result[0]->lng;
        $data['end_lat'] = $result[count($result)-1]->lat;
        $data['end_lng'] = $result[count($result)-1]->lng; */
        //echo json_encode($data,true);
        echo json_encode($result, true);
    }

    public function playback_v2(Request $request)
    {
        $show_coordinates = true;
        $show_addresses = false;
        $zones_addresses = false;
        $stop_duration = '10';
        $data = $this->reportPlayback('', $request->device_id, $request->start_date, $request->end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
        echo json_encode($data, true);
    }

    public function showMonitor_v2()
    {
        return view('enduser.monitor.v2.customer_monitor');
    }
    public function playback($imei = null)
    {
        $data['my_ip'] = getUserIP();
        $data['session_data'] = Auth::user()->toArray(); // fetch all data of loggedin user

        if ($imei != null) {
            $findImei = $this->my_connection->select("select id, imei,device_name from gs_objects where imei='" . $imei . "'");
            if ($findImei != null) {
                $data['selected_device'] = $findImei[0];
            } else {
                $data['selected_device'] = '';
            }
        } else {
            $data['selected_device'] = '';
        }

        $data['device_list'] = $this->my_connection->select("select id, imei,device_name from gs_objects where customer_id=" . $data['session_data']['id']);

        return view('enduser.playback.playback')->with($data);
    }

    public function getImei($id)
    {
        $data = $this->my_connection->select("select d.*, s.name as server_name, m.name as model_name  from gs_objects d left join gps_servers s on s.id = d.server_id left join device_models m on m.id = d.device_model where d.id=" . $id);

        $data[0]->server_to_platform_status = (Schema::hasTable('gs_object_data_' . $data[0]->imei)) ? 1 : 0;
        $data[0]->device_status = 0; // will come from gs_object_data_<imei> params columns() real time
        echo json_encode($data[0], true);
    }

    public function saveImei(Request $request)
    {
        $info = array(
            'device_name' => $request->device_name,
            'plate_number' => $request->plate_number,
            'sim_number' => $request->sim_number,
            'speeding_value' => $request->speeding_value,
            'average_fuel_price' => $request->average_fuel_price,
            'fuel_consumption' => $request->fuel_consumption,
        );
        $done = $this->my_connection->table('gs_objects')->where('id', $request->id)->update($info);
        if ($done >= 0) {
            echo 1;
        } else {
            echo 0;
        }
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

        $done = $this->my_connection->table('gs_object_cmd_exec')->insert($info);
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

    public function show_report(Request $request, $type = null, $device = null)
    {

        $user['session_data'] = Auth::user()->toArray();
        $start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
        $end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
        $final_data = [];

        if ($type == 'overspeed') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list) - 1) {
                        $device_list .= ',';
                    }
                }
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(" . $device_list . ")");
            } else {
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(select imei from gs_objects where customer_id=" . $user['session_data']['id'] . ")");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'harshbreak') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list) - 1) {
                        $device_list .= ',';
                    }
                }
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='harshbreak' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(" . $device_list . ")");
            } else {
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='harshbreak' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(select imei from gs_objects where customer_id=" . $user['session_data']['id'] . ")");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'acceleration') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list) - 1) {
                        $device_list .= ',';
                    }
                }
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='acceleration' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(" . $device_list . ")");
            } else {
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='acceleration' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(select imei from gs_objects where customer_id=" . $user['session_data']['id'] . ")");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'collision') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list) - 1) {
                        $device_list .= ',';
                    }
                }
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='collision' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(" . $device_list . ")");
            } else {
                $final_data = $this->my_connection->select("SELECT gs.*, d.device_name FROM `gs_user_last_events_data` gs left join gs_objects d on d.imei = gs.imei where user_id=" . $user['session_data']['id'] . " and type='collision' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' and gs.imei IN(select imei from gs_objects where customer_id=" . $user['session_data']['id'] . ")");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'service_up_down') {
            if (isset($request->device_list) && $request->device_list[0] != 0) {
                $device_list = "";
                $i = 0;
                foreach ($request->device_list as $d) {
                    $device_list .= explode("_", $d)[0];
                    $i++;
                    if ($i < count($request->device_list) - 1) {
                        $device_list .= ',';
                    }
                }
                $final_data = $this->my_connection->select("SELECT imei,name as device_name, DATE_FORMAT(MIN(dt_tracker),'%Y-%m-%d') as min_day, MIN(dt_tracker) as min_time, DATE_FORMAT(MAX(dt_tracker),'%Y-%m-%d') as max_day, Max(dt_tracker) as max_time, COUNT(*) AS Occurrences FROM gs_user_last_events_data where imei IN(" . $device_list . ") and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' GROUP BY imei, DATE(DATE_SUB(dt_tracker, INTERVAL 24 HOUR))");
            } else {
                $final_data = $this->my_connection->select("SELECT imei,name as device_name, DATE_FORMAT(MIN(dt_tracker),'%Y-%m-%d') as min_day, MIN(dt_tracker) as min_time, DATE_FORMAT(MAX(dt_tracker),'%Y-%m-%d') as max_day, Max(dt_tracker) as max_time, COUNT(*) AS Occurrences FROM gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' GROUP BY imei, DATE(DATE_SUB(dt_tracker, INTERVAL 24 HOUR))");
            }

            $dates_between_given_period = getDatesFromRange($start_date, $end_date, 'Y-m-d');




            foreach ($final_data as $f) {
                /*  foreach($dates_between_given_period as $d){
                    if($d!=$f->min_day){
                        $f->min_time = date('Y-m-d 00:00:00',strtotime($d));
                        $f->max_time = date('Y-m-d 23:59:00',strtotime($d));
                        $f->uptime_duration = 0;
                    }
                    else{
                        $f->min_time = $f->min_time;
                        $f->max_time = $f->max_time;

                    }
                }  */
                //str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), getTimeDifferenceDetails($f->min_time, $f->max_time));
                $f->uptime_duration = getTimeDifferenceDetails($f->min_time, $f->max_time);
                $f->uptime_in_seconds = (strtotime($f->max_time) - strtotime($f->min_time));
                $f->downtime_in_seconds = (86400 - $f->uptime_in_seconds);
                $f->downtime_duration = gmdate("H:i:s", $f->downtime_in_seconds);
            }

            /* $dates_between_given_period = getDatesFromRange($start_date, $end_date, 'Y-m-d');
            $total_days = count($dates_between_given_period); //

            $unique_imei = array_unique(array_column($final_data, 'imei'));

            $test = [];
            foreach($unique_imei as $imei){
                //$test[$imei] = array_count_values(array_column($final_data, 'imei'))[$imei];
                foreach($final_data as $f){
                    if($f->imei==$imei){
                        $test[$imei]['total_uptime'] = array_count_values(array_column($final_data, 'imei'))[$imei];
                        $test[$imei]['uptime_records'] = $f;
                    }
                }


            } */
            //i.e: imei:123455 = 4 times uptime from total_days.. therefore total uptime: (4*100)/total_days

            echo json_encode($final_data, true);
        } else if ($type == 'drivingbehaviour') {
            if (isset($request->from_monitor)) {
                $device_list = "";
                $device_list .= explode("_", $request->device_list)[0];

                $final_data = $this->my_connection->select(" SELECT (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_overspeed, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='harshbreak' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_harshbreak, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='acceleration' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_acceleration, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='collision' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_collision FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "'");
            } else {
                if (isset($request->device_list) && $request->device_list[0] != 0) {
                    foreach ($request->device_list as $d) {
                        $device_imei = explode("_", $d)[0];
                        $device_name = explode("_", $d)[1];
                        $data[] = $this->showdrivingBehaviour($device_imei, $device_name, $start_date, $end_date);
                    }
                    //$final_data = $data;
                } else {
                    $all_device = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");

                    foreach ($all_device as $d) {
                        if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                            $device_imei = $d->imei;
                            $device_name = $d->device_name;
                            $data[] = $this->showdrivingBehaviour($device_imei, $device_name, $start_date, $end_date);
                        }
                    }
                }
                $final_data = $data;
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
                        $data['my_fuel_cost'] = 89;
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
                $all_device = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");

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
                        $data['my_fuel_cost'] = $d->average_fuel_price;
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
                        $my_fuel_consumption = '0.25';
                        $my_fuel_cost = 89;
                        //$res .= $this->reportsGenerateDrivesAndStops($device_name, $device_imei, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                        $data[] = $this->reportsGenerateWithGraph($device_name, $device_imei,$my_fuel_consumption,$my_fuel_cost, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                //echo $res;
                echo json_encode($data, true);
            } else {
                $all_device = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
                $res = "";
                foreach ($all_device as $d) {
                    if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                        $device_imei = $d->imei;
                        $device_name = ($d->device_name == '') ? 'NA' : $d->device_name;
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        $data[] = $this->reportsGenerateWithGraph($device_name, $device_imei,$d->fuel_consumption, $d->average_fuel_price, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                echo json_encode($data, true);
            }
        } else if ($type == 'report_with_map') {
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
                        $my_fuel_consumption = '0.25';
                        $my_fuel_cost = 89;
                        $data[] = $this->tripWithMap($device_name, $device_imei,$my_fuel_consumption,$my_fuel_cost, $request->start_date, $request->end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                //echo $res;
                echo json_encode($data, true);
            } else {
                $all_device = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
                $res = "";
                foreach ($all_device as $d) {
                    if (Schema::hasTable('gs_object_data_' . $d->imei)) {
                        $device_imei = $d->imei;
                        $device_name = ($d->device_name == '') ? 'NA' : $d->device_name;
                        $show_coordinates = true;
                        $show_addresses = false;
                        $zones_addresses = false;
                        $stop_duration = '10';
                        $data[] = $this->tripWithMap($device_name, $device_imei,$d->fuel_consumption,$d->average_fuel_price, $request->start_date, $request->end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
                echo json_encode($data, true);
            }
        } else if ($type == 'alert_overview') {
            $last_events = [];
            $result = "<table class='table table-hover table-striped table-bordered'>";
            $result .= "<tr><th>SL</th><th>Device</th>";
            $all_user_events = $this->my_connection->select("select * from gs_user_events where user_id=" . $user['session_data']['id']);
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

                    $last_events = $this->my_connection->select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                } else {
                    $last_events = $this->my_connection->select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                }

                //echo "select name " . $my_events . " from gs_user_last_events_data where user_id=".$user['session_data']['id']." and dt_tracker between '".$start_date."' and '".$end_date."' group by imei";

                echo json_encode(['event_list' => $all_user_events, 'my_events' => $last_events], true);
            }
            //echo json_encode($last_events, true);
        } else if ($type == 'alert_report') {
            $last_events = [];
            $result = "<table class='table table-hover table-striped table-bordered'>";
            $result .= "<tr><th>SL</th><th>Device</th>";
            $all_user_events = $this->my_connection->select("select * from gs_user_events where user_id=" . $user['session_data']['id']);
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

                    $last_events = $this->my_connection->select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                } else {
                    $last_events = $this->my_connection->select("select e.name,e.imei " . $my_events . " from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
                }

                // Create a new collection instance.
                $collection = new Collection($last_events);

                $sumArray = array();
                $test = [];

                foreach ($last_events as $k => $subArray) {
                    foreach ($subArray as $id => $value) {
                        if ($id != 'name' && $id != 'imei') {
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
        if ($type == 'alert_details') {
            if (!isset($request->alert_type)) {
                $alert_list = '';
                $alert_query_list = "";
            } else {
                $alert_list = '';
                $i = 0;
                foreach ($request->alert_type as $a) {
                    $alert_list .= "'" . $a . "'";
                    $i++;
                    if ($i < count($request->alert_type)) {
                        $alert_list .= ',';
                    }
                }
                $alert_query_list = ($alert_list != '0') ? " and event_desc IN(" . $alert_list . ")" : "";
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

                $final_data = $this->my_connection->select("SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device_list . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' " . $alert_query_list);
            } else {

                $final_data = $this->my_connection->select("SELECT * FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' " . $alert_query_list);
            }

            echo json_encode($final_data, true);
        }
        if ($type == 'geocoding_report') {
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

                $final_data = $this->my_connection->select(" select *,(select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type='zone_in' and dt_tracker between '" . $start_date . "' and '" . $end_date . "' and imei IN(" . $device_list . ")) as total_zone_in, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type='zone_out' and dt_tracker between '" . $start_date . "' and '" . $end_date . "' and imei IN(" . $device_list . ")) as total_zone_out from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type IN('zone_in','zone_out') and dt_tracker between '" . $start_date . "' and '" . $end_date . "' and imei IN(" . $device_list . ") ");
            } else {

                $final_data = $this->my_connection->select("select *,(select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type='zone_in' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_zone_in, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type='zone_out' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_zone_out from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and type IN('zone_in','zone_out') and dt_tracker between '" . $start_date . "' and '" . $end_date . "'");
            }

            echo json_encode($final_data, true);
        } else if ($type == 'engine_overview') {
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

                $last_events = $this->my_connection->select("select e.name, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and imei=e.imei) as total_engine_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and imei=e.imei) as total_engine_off from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
            } else {
                $last_events = $this->my_connection->select("select e.name, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and imei=e.imei) as total_engine_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and imei=e.imei) as total_engine_off from gs_user_last_events_data e where user_id=" . $user['session_data']['id'] . " and dt_tracker between '" . $start_date . "' and '" . $end_date . "' group by imei");
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
        } else if ($type == 'engine_report') {
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

                $last_events = $this->my_connection->select("SELECT *, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_off FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and event_desc IN('Engine On','Engine Off') and imei IN(" . $device . ") and dt_tracker between '" . $start_date . "' and '" . $end_date . "'");
            } else {
                $last_events = $this->my_connection->select("SELECT *, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine On' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_on, (select count(*) from gs_user_last_events_data where user_id=" . $user['session_data']['id'] . " and event_desc='Engine Off' and dt_tracker between '" . $start_date . "' and '" . $end_date . "') as total_off FROM `gs_user_last_events_data` where user_id=" . $user['session_data']['id'] . " and event_desc IN('Engine On','Engine Off') and dt_tracker between '" . $start_date . "' and '" . $end_date . "'");
            }

            $total_on = (count($last_events) > 0) ? $last_events[0]->total_on : 0;
            $total_off = (count($last_events) > 0) ? $last_events[0]->total_off : 0;
            echo json_encode(['event_list' => $last_events, 'total_on' => $total_on, 'total_off' => $total_off], true);
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

            $res = $this->my_connection->select($q);
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
                    return $row->lat . ',' . $row->lng;
                    //return '<button type="button" class="btn btn-default load_geo_address" data-lat="'.$row->lat.'" data-lng="'.$row->lng.'">Show Address</button>';
                })
                ->make(true);
        } else if ($type == 'schedule_report') {

            $q = "SELECT sr.*, rt.name as report_type_name FROM schedule_reports sr left join report_types rt on rt.id = sr.report_type WHERE customer_id = '" .  $user['session_data']['id'] . "' order by sr.id desc";

            $res = DB::select($q);
            return Datatables::of($res)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;

                    return "<button type='button' class='custom-button-class mr-2' onclick='view_schedule_report_data($id)'><i class='fas fa-eye'></i></button>";
                })
                ->editColumn('device', function ($row) {
                    return count(explode(",", $row->device));
                })
                ->editColumn('status', function ($row) {
                    if($row->status==1){
                        $status = '<span class="badge badge-pill badge-success">Running</span>';
                    } else if ($row->status==2){
                        $status = '<span class="badge badge-pill badge-warning">Pause</span>';
                    } else if ($row->status==0){
                        $status = '<span class="badge badge-pill badge-danger">Stop</span>';
                    }
                    return $status;
                })
                ->editColumn('start_date', function ($row) {
                    return Carbon::parse($row->start_date)->format('d M Y, h:i a');
                })
                ->rawColumns(['action', 'start_date','status'])
                ->make(true);
        } else if ($type == 'report_dashboard') {
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
            } else {
                $all_device = $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" . $user['session_data']['id'] . " and unit_id>0 ORDER BY id DESC");
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
                        $data[] = $this->reportsDashboardData($device_name, $device_imei, $my_fuel_consumption, $start_date, $end_date, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses);
                    }
                }
            }
            echo json_encode($data, true);
        }
    }

    function showdrivingBehaviour($device_list, $device_name, $start_date, $end_date)
    {
        $final_data = $this->my_connection->select(" SELECT imei,name as device_name, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='overspeed' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_overspeed, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='harshbreak' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_harshbreak, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='acceleration' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_acceleration, (select count(*) FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and type='collision' and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "') as total_collision FROM `gs_user_last_events_data` where imei IN(" . $device_list . ") and dt_tracker BETWEEN '" . $start_date . "' and '" . $end_date . "' group by imei");

        if (count($final_data) > 0) {
            $final_result = array(
                'device_name' => $final_data[0]->device_name,
                'total_overspeed' => $final_data[0]->total_overspeed,
                'total_harshbreak' => $final_data[0]->total_harshbreak,
                'total_acceleration' => $final_data[0]->total_acceleration,
                'total_collision' => $final_data[0]->total_collision
            );
        } else {
            $final_result = array(
                'device_name' => $device_name,
                'total_overspeed' => 0,
                'total_harshbreak' => 0,
                'total_acceleration' => 0,
                'total_collision' => 0
            );
        }
        return $final_result;
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
    function reportsGenerateWithGraph($device_name = null, $imei, $fuel_consumption=null, $fuel_cost=null, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
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
                '<th>Fuel Cost</th>' .
                '<th>Engine Works</th>' .
                '<th>Engine Idle</th>' .
                '</tr><tr>' .
                '<td>' . $data['drives_duration'] . '</td>' .
                '<td>' . $data['stops_duration'] . '</td>' .
                '<td>' . $data['route_length'] . '</td>' .
                '<td>' . $data['top_speed'] . '</td>' .
                '<td>' . $data['avg_speed'] . '</td>' .
                '<td>' . ($fuel_consumption*$data['route_length']) . ' L</td>' .
                '<td>&#2547; ' . $fuel_cost . '</td>' .
                '<td>&#2547; ' . ($fuel_consumption*$data['route_length']*$fuel_cost) . '</td>' .
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

            /* if (in_array("avg_fuel_consumption", $data_items)) {
                if ($_SESSION["unit_capacity"] == 'l') {
                    $result .= '<th rowspan="2">km</th>';
                } else {
                    $result .= '<th rowspan="2">mpg</th>';
                }
            } */

            if (in_array("fuel_cost", $data_items)) {
                $result .= '<th rowspan="2">Fuel Cost</th>';
            }

           /*  if (in_array("engine_idle", $data_items)) {
                $result .= '<th rowspan="2">Engine Idle</th>';
            } */

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
                            $result .= '<td> </td>';
                        }

                        /* if (in_array("avg_fuel_consumption", $data_items)) {
                            $result .= '<td></td>';
                        } */

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td></td>';
                        }

                        /* if (in_array("engine_idle", $data_items)) {
                            $result .= '<td>' . $data['stops'][$j][11] . '</td>';
                        } */

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

                        $result .= '<td>' . $data['drives'][$j][7] . ' km </td>
                                <td>' . $data['drives'][$j][8] . ' kmh </td>
                                <td>' . $data['drives'][$j][9] . ' kmh</td>';

                        if (in_array("fuel_consumption", $data_items)) {
                            $result .= '<td>' . ($data['drives'][$j][7]*$fuel_consumption) . ' L</td>';
                        }

                        /* if (in_array("avg_fuel_consumption", $data_items)) {
                            if ($_SESSION["unit_capacity"] == 'l') {
                                $result .= '<td>' . $data['drives'][$j][13] . ' L</td>';
                            } else {
                                $result .= '<td>' . $data['drives'][$j][14] . ' mi </td>';
                            }
                        } */

                        if (in_array("fuel_cost", $data_items)) {
                            $result .= '<td>&#2547; ' . ($data['drives'][$j][7]*$fuel_consumption*$fuel_cost) . ' </td>';
                        }

                        /* if (in_array("engine_idle", $data_items)) {
                            $result .= '<td></td>';
                        } */

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
    function reportsWithMap($device_name = null, $imei, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
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

    function reportsDashboardData($device_name = null, $imei, $my_fuel_consumption, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];
        $final_result = array();

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

            $data['engine_work'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_work']);
            $data['engine_idle'] = str_replace(array("d", "h", "m", "s"), array("day", "hour", "minute", "second"), $data['engine_idle']);

            $total_overspeed = 0;
            $total_acceleration = 0;
            $total_harshbreak = 0;
            $total_collision = 0;

            $sql_event = $this->my_connection->select("SELECT imei,name as device_name, (select count(*)FROM gs_user_last_events_data where imei='" . $imei . "' and type='overspeed' and dt_tracker between '" . $dtf . "' and '" . $dtt . "') as total_overspeed, (SELECT COUNT(*) FROM gs_user_last_events_data where imei='" . $imei . "' and type='harshbreak' and dt_tracker between '" . $dtf . "' and '" . $dtt . "') as total_harsh_break, (SELECT COUNT(*) FROM gs_user_last_events_data where imei='" . $imei . "' and type='acceleration' and dt_tracker between '" . $dtf . "' and '" . $dtt . "') as total_acceleration, (SELECT COUNT(*) FROM gs_user_last_events_data where imei='" . $imei . "' and type='collision' and dt_tracker between '" . $dtf . "' and '" . $dtt . "') as total_collision, (SELECT COUNT(*) FROM gs_user_last_events_data where imei='" . $imei . "' and event_desc='Engine On' and dt_tracker between '" . $dtf . "' and '" . $dtt . "') as total_engine_on FROM `gs_user_last_events_data` where imei='" . $imei . "' and dt_tracker between '" . $dtf . "' and '" . $dtt . "' group by imei");
            if (count($sql_event) > 0) {
                $total_overspeed = $sql_event[0]->total_overspeed;
                $total_acceleration = $sql_event[0]->total_acceleration;
                $total_harshbreak = $sql_event[0]->total_harsh_break;
                $total_collision = $sql_event[0]->total_collision;
            }

            $total_fuel_cost = 0;
            $total_other_expense = 0;
            $total_paper_expiring = 0; //count
            $total_upcoming_maintenance = 0;
            $device_id_query = $this->my_connection->select("SELECT gs.id, v.id as v_id FROM gs_objects gs  left join vehicles v on v.object_id = gs.id where gs.imei =" . $imei);

            if ($device_id_query[0]->v_id != null) {
                //show all summary from vms
                $vms_query = $this->my_connection->select("select sum(total_price) as total_fuel_cost, (select sum(cost_value) from expense_logs where vehicle_id in(" . $device_id_query[0]->v_id . ") and expense_date between '" . $dtf . "' and '" . $dtt . "') as total_expense, (select count(*) from documents where vehicle_id in(" . $device_id_query[0]->v_id . ") and expiry_date between '" . $dtf . "' and '" . $dtt . "') as expiring_doc, (select count(*) from maintenances where vehicle_id in(" . $device_id_query[0]->v_id . ") and next_main_date between '" . $dtf . "' and '" . $dtt . "') as upcoming_main from fuel_logs where vehicle_id in(" . $device_id_query[0]->v_id . ") and refill_date between '" . $dtf . "' and '" . $dtt . "'");

                $total_fuel_cost = ($vms_query[0]->total_fuel_cost == null) ? 0 : $vms_query[0]->total_fuel_cost;
                $total_other_expense = ($vms_query[0]->total_expense == null) ? 0 : $vms_query[0]->total_expense;
                $total_paper_expiring = $vms_query[0]->expiring_doc;
                $total_upcoming_maintenance = $vms_query[0]->upcoming_main;
                //  dd($total_fuel_cost);

            }

            $final_result = array(
                'device_name' => $device_name,
                'travel_time' => (isset($data['route_length'])) ? $data['route_length'] : 0,
                'engine_runtime' => (isset($data['engine_work'])) ? strtotime($data['engine_work'], 0) : 0,
                'engine_idle_time' => (isset($data['engine_idle'])) ? strtotime($data['engine_idle'], 0) : 0,
                'total_stop_count' => (isset($data['stops'])) ? count($data['stops']) : 0,
                'total_overspeed' => $total_overspeed,
                'total_acceleration' => $total_acceleration,
                'total_harshbreak' => $total_harshbreak,
                'total_collision' => $total_collision,
                'my_fuel_consumption' => $my_fuel_consumption,
                'total_fuel_cost' => $total_fuel_cost,
                'total_other_expense' => $total_other_expense,
                'total_paper_expiring' => $total_paper_expiring,
                'total_upcoming_maintenance' => $total_upcoming_maintenance
            );
            // dd($final_result['total_fuel_cost']);

            return $final_result;
        }
    }

    function reportPlayback($device_name = null, $imei, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];

        $data = [];

        $data = getRoute($imei, $dtf, $dtt, $stop_duration, true);
        if (count($data) > 0) {
            $dt_sort = array();
            for ($i = 0; $i < count($data['stops']); ++$i) {
                $dt_sort[] = $data['stops'][$i][6];
            }
            for ($i = 0; $i < count($data['drives']); ++$i) {
                $dt_sort[] = $data['drives'][$i][4];
            }
            sort($dt_sort);

            $starting_time = (count($data['drives']) > 0) ? $data['drives'][0][3] : '';
            $total_starting_length = (isset($data['route_length'])) ? $data['route_length'] : 0;
            $result = "<table class='table-hover table-bordered table-striped' style='font-size: 10px;'><tr style='font-weight:bold;'><td><img src='" . asset('assets/images/route_start.png') . "' style='width: 35px; height: 35px;'></td><td colspan='2' style='font-weight:bold;'>" . $starting_time . "</td><td>" . $total_starting_length . "km</td></tr><tr><td></td><td>Time</td><td>Duration</td><td>Distance</td></tr>";

            for ($i = 0; $i < count($dt_sort); ++$i) {
                for ($j = 0; $j < count($data['stops']); ++$j) {
                    if ($data['stops'][$j][6] == $dt_sort[$i]) {
                        $event_time = $data["stops"][$j][6] . ' - ' . $data["stops"][$j][7];
                        $event_duration = $data["stops"][$j][8];
                        $event_lat = $data["stops"][$j][2];
                        $event_lng = $data["stops"][$j][3];
                        $event_angle = $data["stops"][$j][5];
                        $event_speed = $data["stops"][$j][4];
                        $object = '{"time":' . $event_time . ',"duration":' . $event_duration . ',"lat":' . $event_lng . ',"lng":' . $event_angle . ',"angle":' . $event_angle . ',"speed":' . $event_speed . '}';
                        //$result .= '<tr align="center" onClick=show_in_map(\''.$object.'\')>';
                        $result .= '<tr align="center" onClick="show_in_map(' . $event_lat . ',' . $event_lng . ')">';
                        $result .= '<td><img src="' . asset('assets/images/playback_stop_icon.png') . '" style="width: 25px; height: 25px;"></td>';
                        $result .= '<td>' . $data['stops'][$j][6] . '</td>';
                        $result .= '<td>' . $data['stops'][$j][8] . '</td>';
                        $result .= '<td> </td>';
                        $result .= '</tr>';
                    }
                }
                for ($j = 0; $j < count($data['drives']); ++$j) {
                    if ($data['drives'][$j][4] == $dt_sort[$i]) {
                        $result .= '<tr align="center">';
                        $result .= '<td><img src="' . asset('assets/images/playback_moving_icon.png') . '" style="width: 25px; height: 25px;"></td>';
                        $result .= '<td>' . $data['drives'][$j][4] . '</td>';
                        $result .= '<td>' . $data['drives'][$j][6] . '</td>';
                        $result .= '<td>' . $data['drives'][$j][7] . ' km</td>';
                        $result .= '</tr>';
                    }
                }
            }

            $ending_time = (count($data['stops']) > 0) ? $data['stops'][count($data['stops']) - 1][7] : '';

            $result .= "<tr style='font-weight:bold;'><td><img src='" . asset('assets/images/route_end.png') . "' style='width: 35px; height: 35px;'></td><td colspan='2'>" . $ending_time . "</td><td></td></tr>";
            $result .= "</table>";
            $data['playback_list'] = $result;

            $data['imei'] = $imei;
            if (!is_null($device_name)) {
                $data['device_name'] = $device_name;
            }
        }
        return $data;
    }

    function tripWithMap($device_name = null, $imei,$fuel_consumption,$fuel_cost, $dtf, $dtt, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses) //DRIVES_AND_STOPS
    {
        $data_items = ['route_start', 'route_end', 'route_length', 'move_duration', 'stop_duration', 'stop_count', 'top_speed', 'avg_speed', 'overspeed_count', 'fuel_consumption', 'avg_fuel_consumption', 'fuel_cost', 'engine_work', 'engine_idle', 'odometer', 'trailer', 'engine_hours', 'driver,fuel_cost', 'status', 'start', 'end', 'duration'];

        $data = [];

        $data = getRoute($imei, $dtf, $dtt, $stop_duration, true);
        if (count($data) > 0) {
            $dt_sort = array();
            for ($i = 0; $i < count($data['stops']); ++$i) {
                $dt_sort[] = $data['stops'][$i][6];
            }
            for ($i = 0; $i < count($data['drives']); ++$i) {
                $dt_sort[] = $data['drives'][$i][4];
            }
            sort($dt_sort);

            $starting_time = (count($data['drives']) > 0) ? $data['drives'][0][3] : '';
            $total_starting_length = (isset($data['route_length'])) ? $data['route_length'] : 0;

            $map_data = "<center><h3>" . $device_name . "</h3></center>";
            if (isset($data['route']) && count($data['route']) > 0) {
                $map_data .= "<div id='map_" . $imei . "' style='height:300px; margin-bottom: 25px;'> </div>";
                $map_data .= "<script>";
                $map_data .= "var route_map_" . $imei . " = L.map('map_" . $imei . "').setView([23.8103, 90.4125], 16); ";
                $map_data .= "L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(route_map_" . $imei . "); var polylinePoints_" . $imei . " = []; ";
                $my_polyline = "";
                for ($x = 0; $x < count($data['route']); $x++) {
                    $my_polyline .= "[" . $data['route'][$x][1] . ", " . $data['route'][$x][2] . "]";
                    if ($x < count($data['route']) - 1) {
                        $my_polyline .= ", ";
                    }
                }
                if ($my_polyline != '') {
                    $map_data .= " polylinePoints_" . $imei . " = [" . $my_polyline . "]; ";
                    $map_data .= " L.polyline(polylinePoints_" . $imei . ", {color: 'blue'}).addTo(route_map_" . $imei . ");";
                    $map_data .= " route_map_" . $imei . ".fitBounds(polylinePoints_" . $imei . "); ";
                }

                $map_data .= " var start_icon, end_icon, device_icon_image; start_icon = L.icon({iconUrl: '" . asset('assets/images/route_start.png') . "', iconSize: [30, 30], iconAnchor: [15, 30], popupAnchor: [-2, -25]});  parking_icon = L.icon({iconUrl: '" . asset('assets/images/playback_stop_icon.png') . "', iconSize: [30, 30],iconAnchor: [15, 30],popupAnchor: [3, 0]}); end_icon = L.icon({iconUrl: '" . asset('assets/images/route_end.png') . "', iconSize: [30, 30],        iconAnchor: [15, 30],popupAnchor: [-2, -25]}); ";
                $map_data .= " L.marker([" . $data['route'][0][1] . ", " . $data['route'][0][2] . "], { icon: start_icon}).addTo(route_map_" . $imei . ");";

                for ($i = 0; $i < count($data['stops']); $i++) {
                    $map_data .= " L.marker([" . $data['stops'][$i][2] . ", " . $data['stops'][$i][3] . "], { icon: parking_icon}).addTo(route_map_" . $imei . ");";
                }

                $map_data .= " L.marker([" . $data['route'][0][1] . ", " . $data['route'][0][2] . "], { icon: start_icon}).addTo(route_map_" . $imei . ");";

                $map_data .= " L.marker([" . $data['route'][count($data['route']) - 1][1] . ", " . $data['route'][count($data['route']) - 1][2] . "], { icon: end_icon}).addTo(route_map_" . $imei . ");";

                $map_data .= "</script>";

                $map_data .='<br><table class="table table-hover table-bordered table-striped"><tr><th>Travel Time</th><th>Stop Duration</th><th>Total Distance</th><th>Top Speed</th><th>Avg Speed</th><th>Engine Works</th><th>Engine Idle</th><th>Fuel Consumption</th><th>Fuel Cost</th></tr><tr>';
                $map_data .= '<td>' . $data['drives_duration'] . '</td>';
                $map_data .= '<td>' . $data['stops_duration'] . '</td>';
                $map_data .= '<td>' . $data['route_length'] . '</td>';
                $map_data .= '<td>' . $data['top_speed'] . '</td>';
                $map_data .= '<td>' . $data['avg_speed'] . '</td>';
                $map_data .= '<td>' . $data['engine_work'] . '</td>';
                $map_data .= '<td>' . $data['engine_idle'] . '</td>';
                $map_data .= '<td>' . ($data['route_length']*$fuel_consumption) . ' L</td>';
                $map_data .= '<td>&#2547; ' . ($data['route_length']*$fuel_consumption*$fuel_cost) . '</td>';
                $map_data .= "</tr></table><hr>";

                $result = '<table class="report table-bordered" width="100%"><tr class="bg-secondary" align="center">';

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

                /* if (in_array("avg_fuel_consumption", $data_items)) {
                    if ($_SESSION["unit_capacity"] == 'l') {
                        $result .= '<th rowspan="2">km</th>';
                    } else {
                        $result .= '<th rowspan="2">mpg</th>';
                    }
                } */

                if (in_array("fuel_cost", $data_items)) {
                    $result .= '<th rowspan="2">Fuel Cost</th>';
                }

            /*  if (in_array("engine_idle", $data_items)) {
                    $result .= '<th rowspan="2">Engine Idle</th>';
                } */

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
                                $result .= '<td> </td>';
                            }

                            /* if (in_array("avg_fuel_consumption", $data_items)) {
                                $result .= '<td></td>';
                            } */

                            if (in_array("fuel_cost", $data_items)) {
                                $result .= '<td></td>';
                            }

                            /* if (in_array("engine_idle", $data_items)) {
                                $result .= '<td>' . $data['stops'][$j][11] . '</td>';
                            } */

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

                            $result .= '<td>' . $data['drives'][$j][7] . ' km </td>
                                    <td>' . $data['drives'][$j][8] . ' kmh </td>
                                    <td>' . $data['drives'][$j][9] . ' kmh</td>';

                            if (in_array("fuel_consumption", $data_items)) {
                                $result .= '<td>' . ($data['drives'][$j][7]*$fuel_consumption) . ' L</td>';
                            }

                            /* if (in_array("avg_fuel_consumption", $data_items)) {
                                if ($_SESSION["unit_capacity"] == 'l') {
                                    $result .= '<td>' . $data['drives'][$j][13] . ' L</td>';
                                } else {
                                    $result .= '<td>' . $data['drives'][$j][14] . ' mi </td>';
                                }
                            } */

                            if (in_array("fuel_cost", $data_items)) {
                                $result .= '<td>&#2547; ' . ($data['drives'][$j][7]*$fuel_consumption*$fuel_cost) . ' </td>';
                            }

                            /* if (in_array("engine_idle", $data_items)) {
                                $result .= '<td></td>';
                            } */

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
                $map_data .=$result;
            } else {
                $map_data .= "<center><h5>No Data found for this device</h5><center><br><hr>";
            }

            $data['map_data_content'] = $map_data;
            $data['imei'] = $imei;
            if (!is_null($device_name)) {
                $data['device_name'] = $device_name;
            }
        }
        return $data;
    }

    public function show_single_report(Request $request)
    {
        $start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
        $end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
        $final_data = [];
        $device_imei = $request->device_imei;
        $device_name = $request->device_name;
        $data = getRoute($device_imei, $start_date, $end_date, 1, true);
        $data['imei_no'] = $device_imei;
        $data['device_name'] = $device_name;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $final_data[] = $data;
        echo json_encode($final_data, true);
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

    public function geofence()
    {
        $data['session_data'] = Auth::user()->toArray();
        return view('enduser.geofence.geofence_new')->with($data);
    }

    /* public function get_geofence($id = null)
    {
        if (!is_null($id)) {
            $result = $this->my_connection->select("select * from geofences where customer_id=" . $id);
        } else {
            $result = $this->my_connection->select("select * from geofences order by id desc");
        }
        echo json_encode($result, true);
    } */
    public function get_geofence($id = null)
    {
        if (!is_null($id)) {
            $result = $this->my_connection->select("select * from gs_user_zones where user_id=" . $id);
        } else {
            $result = $this->my_connection->select("select * from gs_user_zones order by zone_id desc");
        }
        echo json_encode($result, true);
    }

    /* public function saveGeofence(Request $request)
    {
        $info = array(
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'coordinates' => $request->coordinates,
            'status' => 1,
        );

        if ($request->id > 0) {
            $done = $this->my_connection->table('geofences')->where('id', $request->id)->update($info);
        } else {
            $done = $this->my_connection->table('geofences')->insert($info);
        }

        if ($done >= 0) {
            echo 1;
        } else {
            echo 0;
        }
    } */
    public function saveGeofence(Request $request)
    {
        $info = array(
            'user_id' => $request->customer_id,
            'group_id' => 0,
            'zone_name' => $request->name,
            'zone_color' => '#FF0000',
            'zone_visible' => true,
            'zone_name_visible' => true,
            'zone_area' => 0,
            'zone_vertices' => $request->coordinates
        );

        if ($request->id > 0) {
            $done = $this->my_connection->table('gs_user_zones')->where('zone_id', $request->id)->update($info);
        } else {
            $done = $this->my_connection->table('gs_user_zones')->insert($info);
        }

        if ($done >= 0) {
            $user_zones = $this->my_connection->select("SELECT GROUP_CONCAT(zone_id) as customer_zones FROM `gs_user_zones` where user_id=" . $request->customer_id);
            if (count($user_zones) > 0) {
                $this->my_connection->statement("UPDATE gs_user_events SET zones='" . $user_zones[0]->customer_zones . "' where type IN('zone_in','zone_out') and user_id=" . $request->customer_id);
            }

            echo 1;
        } else {
            echo 0;
        }
    }

    public function removeGeofence(Request $request)
    {
        if ($request->id && $request->id > 0) {
            $done = $this->my_connection->delete('DELETE FROM gs_user_zones WHERE zone_id=' . $request->id);
            if ($done >= 0) {
                $user_zones = $this->my_connection->select("SELECT GROUP_CONCAT(zone_id) as customer_zones FROM `gs_user_zones` where user_id=" . $request->customer_id);
                if (count($user_zones) > 0) {
                    $this->my_connection->statement("UPDATE gs_user_events SET zones='" . $user_zones[0]->customer_zones . "' where type IN('zone_in','zone_out') and user_id=" . $request->customer_id);
                }
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y)
    {
        $i = $j = $c = 0;
        for ($i = 0, $j = $points_polygon - 1; $i < $points_polygon; $j = $i++) {
            if ((($vertices_y[$i] > $latitude_y != ($vertices_y[$j] > $latitude_y)) &&
                ($longitude_x < ($vertices_x[$j] - $vertices_x[$i]) * ($latitude_y - $vertices_y[$i]) / ($vertices_y[$j] - $vertices_y[$i]) + $vertices_x[$i]))) {
                $c = !$c;
            }
        }
        return $c;
    }

    public function last_event()
    {
        $user_id = Auth::user()->toArray()['id'];
        $q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='" . $user_id . "' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '" . $user_id . "') AND dt_tracker>= (CONVERT_TZ(NOW(), @@session.time_zone, '+6:00')) - INTERVAL 1 MINUTE order by event_id desc";

        $res = $this->my_connection->select($q);
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
            $res = $this->my_connection->select($q);
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
            $res = $this->my_connection->select($q);
            echo json_encode($res, true);
        }
    }
    public function getGeofences($id)
    {
        $q = "SELECT * FROM `geofences` WHERE `customer_id`='" . $id . "' order by id desc LIMIT 20";
        $res = $this->my_connection->select($q);
        echo json_encode($res, true);
    }
    public function getLoginActivity($id)
    {
        $q = "SELECT * FROM `customer_logs` WHERE `customer_id`='" . $id . "' order by id desc LIMIT 20";
        $res = $this->my_connection->select($q);
        $data = "";
        if (count($res) > 0) {
            foreach ($res as $r) {
                if ($r->status == 1) {
                    $icon_type = '<i class="fa fa-check kt-font-success"></i>';
                    $attemp_status = '';
                } else if ($r->status == 0) {
                    $icon_type = '<i class="fa fa-key kt-font-danger"></i>';
                    $attemp_status = '';
                } else {
                    $icon_type = '<i class="fa fa-ban kt-font-default"></i>';
                    $attemp_status = '';
                }

                $data .= '<a href="../account_details?page_type=my_activities" target="_blank" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    ' . $icon_type . '
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title"> IP:
                        ' . $r->ip_address . ' - ' . $r->device_model . '
                    </div>
                    <div class="kt-notification__item-time">Time:
                        ' . $r->created_at . ' ' . $attemp_status . '
                    </div>
                </div>
            </a>';
            }
        }
        echo $data;
    }

    public function showMyAddress($lat, $lng)
    {
        echo json_encode(get_geo_address($lat, $lng));
    }
}