<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.command.command');
        
    }

    public function getData($id)
    {
        if ($id > 0) {
            $data = DB::select("SELECT c.*, m.name as model_name, s.name as command_name FROM gps_commands c left join device_models m ON m.id = c.model_id left join master_settings s on s.id = c.command_id where c.id=".$id);
        } else {
            $data = DB::select("SELECT c.*, m.name as model_name, s.name as command_name FROM gps_commands c left join device_models m ON m.id = c.model_id left join master_settings s on s.id = c.command_id order by c.id desc ");
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model_list = DB::select("select * from device_models where status=1 order by id asc");
        $data['model_list'] = $model_list ;
        return view('admin.command.create')->with($data);
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
            $result = DB::select("select s.*  from gps_commands s where s.id=" . $id . " order by s.id desc");
        } else {
            $result = array (
                0 => 
               array(
                   'id' => 0,
                   'model_id' => 0,
                   'command_id' => 0,
                   'command_text' => '',
                   'command_type' => '',
                   'note' => '',
                   'status' => 0
                ),
            );
        }
        $model_list = DB::select("select * from device_models where status=1 order by id asc");
        $command_list = DB::select("select * from master_settings where type=6 and status=1 order by id asc");
        $data['model_list'] = $model_list ;
        $data['command_list'] = $command_list ;
        $data['command_details'] = $result[0];
        $data['command_id'] = $id;
        return view('admin.command.edit_command')->with($data);
    }

    public function save_data(Request $request)
    {
        $info = array(
            'model_id' => $request->model_id,
            'command_id' => $request->command_id,
            'command_text' => $request->command_text,
            'command_type' => $request->command_type,
            'note' => $request->note,
            'status' => $request->status
        );
       
        if ($request->id > 0) {
            $done = DB::table('gps_commands')->where('id', $request->id)->update($info);
        } else {
            $done = DB::table('gps_commands')->insert($info);
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
