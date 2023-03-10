<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class AdminComplainController extends Controller
{

    public function index(Request $request)
    {
        $data['devices'] = DB::select("select gs.id, gs.imei, gs.device_name, gs.unit_status, cd.name as cd_name from gs_objects gs left join combo_data cd on cd.id = gs.unit_status");

        $data['tickets'] = DB::select("select t.id, t.name as t_name from master_settings t left join master_settings_type m on m.id = t.type where m.module_id=6 and t.others_value=1 ");
        $data['complain_status_list'] = DB::select("select t.id, t.name as t_name from master_settings t left join master_settings_type m on m.id = t.type where m.module_id=6 and t.others_value=2 ");
        $data['district_list'] = DB::select("select id,name from districts");
        $data['customer_list'] = DB::select("select id,name from customers");
        $data['user_list'] = DB::select("select * from users");
        return view('admin.complain.complain')->with($data);
    }

    public function list(Request $request)
    {
        /* 
            select c.*, gs.device_name, gs.imei, ct.name as ct_name, s.name as manual_status_name, r.name as reporter_name, f.name as follower_name, sl.name as solved_by_name from complains c left join gs_objects gs on gs.id = c.object_id left join master_settings ct on ct.id = c.complain_type_id left join master_settings s on s.id = c.manual_status_id left join users r on r.id = c.reporter_id left join users f on f.id = c.follower_id left join users sl on sl.id = c.solved_by where c.customer_id=53 
        */
        $query = "select c.* from v_complain c where id>0 ";

        if ($request->status != null) {
            $query .= " and  c.status = " . $request->status;
        }
        if ($request->problem_type_id  != null && $request->problem_type_id > 0) {
            $query .= " and c.complain_type_id = " . $request->problem_type_id;
        }
        if ($request->manual_status_id  != null && $request->manual_status_id > 0) {
            $query .= " and c.manual_status_id = " . $request->manual_status_id;
        }
        if ($request->district_id  != null && $request->district_id > 0) {
            //$query.= " and c.manual_status_id = ".$request->district_id;
        }
        if ($request->follower_id  != null && $request->follower_id > 0) {
            $query .= " and c.follower_id = " . $request->follower_id;
        }
        if ($request->reporter_id  != null && $request->reporter_id > 0) {
            $query .= " and c.reporter_id = " . $request->reporter_id;
        }

        if ($request->start_date  != null) {
            $start_date = explode("-", $request->start_date);
            $start_start = date('Y-m-d', strtotime($start_date[0]));
            $start_end = date('Y-m-d', strtotime($start_date[1]));
            $query .= " and c.start_date BETWEEN '" . $start_start . "' AND '" . $start_end . "'";
        }
        if ($request->end_date  != null) {
            $end_date = explode("-", $request->end_date);
            $start_start = date('Y-m-d', strtotime($end_date[0]));
            $start_end = date('Y-m-d', strtotime($end_date[1]));
            $query .= " and c.end_date BETWEEN '" . $start_start . "' AND '" . $start_end . "'";
        }

        $query .= " order by c.id desc";

        $data = DB::select($query);

        // dd($data[0]->status);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button> <button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                $color = ['danger', 'success'];
                $st = ($row->status == 1) ? 'Solved' : 'In Proccess';
                return $status = "<span class='badge badge-pill badge-" . $color[$row->status] . "'>" . $st . "</span>";
            })
            ->editColumn('start_date', function ($row) {
                $start_date = ($row->start_date != '') ? date('Y-m-d', strtotime($row->start_date)) : '';
                //$row->total_open_days = ($row->total_open_days=='')?0:$row->total_open_days;
                return $start_date . ',' . get_status_time($row->total_open_days);
            })

            ->editColumn('created_at', function ($row) {
                $createdDate = Carbon::parse($row->created_at)->format('d M Y, h:i a');
                return $createdDate;
            })
            ->editColumn('solved_date', function ($row) {
                $solvedDate = Carbon::parse($row->solved_date)->format('d M Y, h:i a');
                return $solvedDate;
            })
            ->editColumn('object_id', function ($row) {

                $gps = $row->device_name . ' - ' . $row->imei;
                return $gps;
            })
            ->rawColumns(['status', 'created_at', 'object_id', 'solved_date', 'action'])
            ->make(true);
    }

    public function at_a_glance(Request $request)
    {

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $vehicle_id = " and object_id = " . $request->vehicle_id;
        } else {
            $vehicle_id = "";
        }
        if ($request->problem_type_id  != null && $request->problem_type_id > 0) {
            $problem_type = " and complain_type_id = " . $request->problem_type_id;
        } else {
            $problem_type = "";
        }
        if ($request->start_date  != null && $request->end_date  != null) {
            $date = " and  created_at between '" . $request->start_date . "' and '" . $request->end_date . "'";
        } else {
            $date = "";
        }

        $result = DB::select("select count(*) as total_complain, (select count(*) from complains where status = 1) as solved_complain, (select count(*) from complains where status = 0) as progress_complain from complains  where id>0 " . $vehicle_id . $problem_type . $date);

        $data['total_complain'] =  $result[0]->total_complain;
        $data['solved_complain'] = $result[0]->solved_complain;
        $data['progress_complain'] = $result[0]->progress_complain;

        return $data;
    }

    public function getComplainData($type, $id)
    {
        $result = DB::select("select * from v_complain where id=".$id);
        if($type=='edit'){
            if(count($result)>0){
                return json_encode($result[0],true);
            } else{
                 return [];
            }

        } else if($type=='view'){
            $data['devices'] = DB::select("select gs.id, gs.imei, gs.device_name, gs.unit_status, cd.name as cd_name from gs_objects gs left join combo_data cd on cd.id = gs.unit_status");

            $data['tickets'] = DB::select("select t.id, t.name as t_name from master_settings t left join master_settings_type m on m.id = t.type where m.module_id=6 and t.others_value=1 ");

            $data['complain_status_list'] = DB::select("select t.id, t.name as t_name from master_settings t left join master_settings_type m on m.id = t.type where m.module_id=6 and t.others_value=2 ");

            $data['district_list'] = DB::select("select id,name from districts");

            $data['customer_list'] = DB::select("select id,name from customers");

            $data['user_list'] = DB::select("select * from users");

            $data['complain'] = $result[0];

            return view('admin.complain.complain_view')->with($data);
        }
       
    }

    public function saveData(Request $request, $id)
    {
        // dd($request->all());
        try {

            $validator = Validator::make($request->all(), [
                'customer_id' => 'required',
                'problem_type' => 'required',
                'reporter_id' => 'required',
                'follower_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();

            if ($id > 0) {
                $complain = Complain::find($id);
            } else {
                $complain = new Complain();
                $complain->customer_id = $request->customer_id;
                $complain->complain_token = Str::random(20);;
            }
            // dd($request->all());
            $complain->complain_type_id = $request->problem_type;
            $complain->object_id = $request->device_name;
            $complain->reporter_id = $request->reporter_id;
            $complain->follower_id = $request->follower_id;
            $complain->complain_details = $request->complain_details;
            $complain->status = ($request->status) ? $request->status:0;
            $complain->start_date = gmdate('Y-m-d H:i:s', strtotime('+6 hours'));
            $complain->created_at = gmdate('Y-m-d H:i:s', strtotime('+6 hours'));
            // dd($complain);
            $complain->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
