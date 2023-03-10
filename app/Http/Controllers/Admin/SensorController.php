<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sensor.sensor');
        
    }

    public function getData($id)
    {
        if ($id > 0) {
            $data = DB::select("SELECT s.*, m.name as model_name, sv.name as server_name, sn.name as sensor_name, st.name as sensor_type_name, sp.name sensor_parameter_name, sd.name as sensor_default_name, r.name as result_type_name FROM gps_sensors s left join device_models m on m.id=s.model_id left join gps_servers sv on sv.id = s.server_id left join master_settings sn on sn.id = s.sensor_name_id left join master_settings st on st.id = s.sensor_type_id left join master_settings sp on sp.id = s.sensor_parameter_id left join master_settings sd on sd.id = s.sensor_default_id left join master_settings r on r.id = s.result_type_id  where s.id=" . $id . " order by s.id desc");
        } else {
            $data = DB::select("SELECT s.*, m.name as model_name, sv.name as server_name, sn.name as sensor_name, st.name as sensor_type_name, sp.name sensor_parameter_name, sd.name as sensor_default_name, r.name as result_type_name FROM gps_sensors s left join device_models m on m.id=s.model_id left join gps_servers sv on sv.id = s.server_id left join master_settings sn on sn.id = s.sensor_name_id left join master_settings st on st.id = s.sensor_type_id left join master_settings sp on sp.id = s.sensor_parameter_id left join master_settings sd on sd.id = s.sensor_default_id left join master_settings r on r.id = s.result_type_id  order by s.id desc ");
        }

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('sensor_default', function ($row) {
                if ($row->sensor_default_id == 1) {
                    return 1;
                } else {
                    return 0;
                }
            })
            ->editColumn('sensor_datalist', function ($row) {
                if ($row->is_data_list == 1) {
                    return 1;
                } else {
                    return 0;
                }
            })
            ->editColumn('sensor_popup', function ($row) {
                if ($row->is_popup == 1) {
                    return 1;
                } else {
                    return 0;
                }
            })
            ->editColumn('ignore_ignition', function ($row) {
                if ($row->ignore_ignition == 1) {
                    return 1;
                } else {
                    return 0;
                }
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status = '<span class="btn btn-success btn-sm"></span>';
                } else {
                    $status = '<span class="btn btn-danger btn-sm"></span>';
                }
                return $status;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model_list = DB::select("select * from device_models where status=1 order by id asc");
        $server_list = DB::select("select * from gps_servers where status=1 order by id asc");
        $sensor_name = DB::select("select * from master_settings where type=1 and status=1 order by id asc");
        $sensor_type = DB::select("select * from master_settings where type=2 and status=1 order by id asc");
        $sensor_parameter = DB::select("select * from master_settings where type=3 and status=1 order by id asc");
        $sensor_result_type = DB::select("select * from master_settings where type=4 and status=1 order by id asc");
        $data['sensor_name_list'] = $sensor_name ;
        $data['sensor_type_list'] = $sensor_type ;
        $data['sensor_parameter_list'] = $sensor_parameter ;
        $data['sensor_result_type_list'] = $sensor_result_type ;
        $data['model_list'] = $model_list ;
        $data['server_list'] = $server_list ;
        return view('admin.sensor.create')->with($data);
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

    public function add_edit_data($id)
    {
        if ($id > 0) {
            $result = DB::select("select s.*  from gps_sensors s where s.id=" . $id . " order by s.id desc");
        } else {
            $result = array (
                0 => 
               array(
                   'id' => 0,
                   'type' => 0,
                   'name' => '',
                   'full_name' => '',
                   'description' => '',
                   'others_value' => NULL,
                   'status' => 0
                ),
            );
        }
        $model_list = DB::select("select * from device_models where status=1 order by id asc");
        $server_list = DB::select("select * from gps_servers where status=1 order by id asc");
        $sensor_name = DB::select("select * from master_settings where type=1 and status=1 order by id asc");
        $sensor_type = DB::select("select * from master_settings where type=2 and status=1 order by id asc");
        $sensor_parameter = DB::select("select * from master_settings where type=3 and status=1 order by id asc");
        $sensor_result_type = DB::select("select * from master_settings where type=4 and status=1 order by id asc");
        $data['sensor_name_list'] = $sensor_name ;
        $data['sensor_type_list'] = $sensor_type ;
        $data['sensor_parameter_list'] = $sensor_parameter ;
        $data['sensor_result_type_list'] = $sensor_result_type ;
        $data['model_list'] = $model_list ;
        $data['server_list'] = $server_list ;
        $list = array(array('id'=>1,'name'=>'Default'),array('id'=>2,'name'=>'Custom'));

        $data['sensor_default_list'] = json_decode(json_encode($list,true));

        $data['sensor_details'] = $result[0];

        $data['sensor_id'] = $id;
        return view('admin.sensor.edit_sensor')->with($data);
    }

    public function save_data(Request $request)
    {
        $info = array(
            'model_id' => $request->model_id,
            'server_id' => $request->server_id,
            'sensor_name_id' => $request->sensor_name_id,
            'sensor_type_id' => $request->sensor_type_id,
            'sensor_parameter_id' => $request->sensor_parameter_id,
            'sensor_default_id' => $request->sensor_default_id,
            'result_type_id' => $request->result_type_id,
            'is_data_list' => $request->is_data_list,
            'is_popup' => $request->is_popup,
            'high_level_value' => $request->high_level_value,
            'unit_of_measurement' => $request->unit_of_measurement,
            'sensor_1_text' => $request->sensor_1_text,
            'sensor_0_text' => $request->sensor_0_text,
            'formula' => $request->formula,
            'lowest_value' => $request->lowest_value,
            'highest_value' => $request->highest_value,
            'ignore_ignition' => $request->ignore_ignition,
            'status' => $request->status
        );
        //echo $request->id.PHP_EOL;
       // echo '<pre>'.var_export($info,true).'</pre>';
       // die();
       
        if ($request->id > 0) {
            $done = DB::table('gps_sensors')->where('id', $request->id)->update($info);
        } else {
            $done = DB::table('gps_sensors')->insert($info);
        }

        if ($done) {
            echo 1;
        } else {
            echo 0;
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
