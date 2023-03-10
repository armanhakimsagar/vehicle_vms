<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
//use Illuminate\support\Facades\Schema;
use Schema;

class MasterSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        return view('admin.master_settings.master_settings');
    }
    public function notification()
    {
        //echo 'dealer homepage';
        return view('admin.event.notification');
    }
    public function event()
    {
        return view('admin.event.event');
    }

    public function command()
    {
        //echo 'dealer homepage';
        return view('admin.command_type.command');
    }
    public function sensor_master()
    {
        //echo 'dealer homepage';
        return view('admin.master_settings.sensor_master');
    }

    public function getData($type = null, $id = null)
    {
        if ($id > 0) {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " order by m.id desc");
        } else {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id order by m.id desc ");
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
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
    public function getNotificationData($type = null, $id = null)
    {
        if ($id > 0) {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and m.type = 5 order by m.id desc");
        } else {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.type = 5 order by m.id desc ");
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
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
    public function getCommandData($type = null, $id = null)
    {
        if ($id > 0) {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and m.type = 6 order by m.id desc");
        } else {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.type = 6 order by m.id desc ");
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
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
    public function getSensorMasterData($type = null, $id = null)
    {
        if ($id > 0) {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and m.type in (1, 2, 3) order by m.id desc");
        } else {
            $data = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.type in (1, 2, 3) order by m.id desc ");
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
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

    public function add_edit_data($id)
    {
        if ($id > 0) {
            $result = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " order by m.id desc");
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
        //echo '<pre>'.var_export($result[0],true).'</pre>';
        $master_settings_type = DB::select("select * from master_settings_type where status=1 order by id asc");

        $data['master_details'] = $result[0];
        $data['master_type_list'] = $master_settings_type;
        $data['master_id'] = $id;
        return view('admin.master_settings.edit_master_settings')->with($data);
    }
    public function add_edit_notification($id)
    {
        if ($id > 0) {
            $result = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and type = 5 order by m.id desc");
        } else {
            $result = array (
                0 => 
               array(
                   'id' => 0,
                   'type' => 5,
                   'name' => '',
                   'full_name' => '',
                   'description' => '',
                   'others_value' => NULL,
                   'status' => 0
                ),
            );
        }
        //echo '<pre>'.var_export($result[0],true).'</pre>';
        $master_settings_type = DB::select("select * from master_settings_type where status = 1 and id = 5");

        $data['master_details'] = $result[0];
        $data['master_type_list'] = $master_settings_type[0];
        $data['master_id'] = $id;
        
        // dd($data);
        return view('admin.event.edit_notification')->with($data);
    }
    public function add_edit_command($id)
    {
        if ($id > 0) {
            $result = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and type = 6 order by m.id desc");
        } else {
            $result = array (
                0 => 
               array(
                   'id' => 0,
                   'type' => 6,
                   'name' => '',
                   'full_name' => '',
                   'description' => '',
                   'others_value' => NULL,
                   'status' => 0
                ),
            );
        }
        //echo '<pre>'.var_export($result[0],true).'</pre>';
        $master_settings_type = DB::select("select * from master_settings_type where status = 1 and id = 6");

        $data['master_details'] = $result[0];
        $data['master_type_list'] = $master_settings_type[0];
        $data['master_id'] = $id;
        
        // dd($data);
        return view('admin.command_type.edit_command')->with($data);
    }
    public function add_edit_event($id)
    {
        if ($id > 0) {
            $result = DB::select("select m.*, t.name as type_name  from master_settings m left join master_settings_type t on m.type = t.id where m.id=" . $id . " and type = 6 order by m.id desc");
        } else {
            $result = array (
                0 => 
               array(
                   'id' => 0,
                   'type' => 6,
                   'name' => '',
                   'full_name' => '',
                   'description' => '',
                   'others_value' => NULL,
                   'status' => 0
                ),
            );
        }
        //echo '<pre>'.var_export($result[0],true).'</pre>';
        $master_settings_type = DB::select("select * from master_settings_type where status = 1 and id = 6");

        $data['master_details'] = $result[0];
        $data['master_type_list'] = $master_settings_type[0];
        $data['master_id'] = $id;
        
        // dd($data);
        return view('admin.event.edit_event')->with($data);
    }

    public function save_data(Request $request)
    {
        $info = array(
            'type' => $request->type,
            'name' => $request->name,
            'full_name' => $request->full_name,
            'description' => $request->description,
            'others_value' => $request->others_value,
            'status' => $request->status
        );
        //echo $request->id.PHP_EOL;
        //echo var_export($info,true);

        if ($request->id > 0) {
            $done = DB::table('master_settings')->where('id', $request->id)->update($info);
        } else {
            $done = DB::table('master_settings')->insert($info);
        }

        if ($done) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
