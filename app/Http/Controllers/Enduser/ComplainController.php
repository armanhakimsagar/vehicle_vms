<?php

namespace App\Http\Controllers\Enduser;

use App\Models\Complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\ComplainType;
use App\Models\Vehicle;
use App\Services\Enduser\ComplainService;

class ComplainController extends Controller
{
    private $my_connection;
    private $complainService;

    public function __construct(ComplainService $complainService)
    {
        $this->complainService = $complainService;
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        /* 
            select c.*, gs.device_name, gs.imei, ct.name as ct_name, s.name as manual_status_name, r.name as reporter_name, f.name as follower_name, sl.name as solved_by_name from complains c left join gs_objects gs on gs.id = c.object_id left join master_settings ct on ct.id = c.complain_type_id left join master_settings s on s.id = c.manual_status_id left join users r on r.id = c.reporter_id left join users f on f.id = c.follower_id left join users sl on sl.id = c.solved_by where c.customer_id=53 
        */
        $query = "select c.* from v_complain c where c.customer_id= " . Auth::user()->id;

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

        $data = $this->my_connection->select($query);

        // dd($data[0]->status);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>";
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

    public function datatable(Request $request)
    {
        $query = "SELECT c.*, m.name as module_name, ct.name as ct_name, (CASE c.module_id WHEN 1 THEN (select name as complain_of_name from customers where id=c.complain_of) WHEN 2 THEN (select name as complain_of_name from vendors where id=c.complain_of) ELSE (select vehicle_no as complain_of_name from vehicles where id=c.complain_of) END) as complain_of_name FROM complains c left join tbl_modules m on m.id = c.module_id left join complain_types ct on ct.id=c.complain_type_id where c.id > 0";

        if ($request->complain_sector > 0) {
            $query .= " and  c.module_id = " . $request->complain_sector;
        }
        if ($request->complain_status >= 0) {
            $query .= " and  c.status = " . $request->complain_status;
        }
        if ($request->complain_priority >= 0) {
            $query .= " and  c.priority = " . $request->complain_priority;
        }
        if ($request->complain_type_id > 0) {
            $query .= " and c.complain_type_id = " . $request->complain_type_id;
        }
        if ($request->follower_id > 0) {
            $query .= " and c.follower = " . $request->follower_id;
        }
        if ($request->reporter_id > 0) {
            $query .= " and c.reporter = " . $request->reporter_id;
        }

        if ($request->start_date  != null) {
            $start_date = explode("-", $request->start_date);
            $start_start = date('Y-m-d H:i:s', strtotime($start_date[0]));
            $start_end = date('Y-m-d 23:59:59', strtotime($start_date[1]));
            $query .= " and c.created_at BETWEEN '" . $start_start . "' AND '" . $start_end . "'";
        }
        if ($request->end_date  != null) {
            $end_date = explode("-", $request->end_date);
            $start_start = date('Y-m-d H:i:s', strtotime($end_date[0]));
            $start_end = date('Y-m-d 23:59:59', strtotime($end_date[1]));
            $query .= " and c.solved_date BETWEEN '" . $start_start . "' AND '" . $start_end . "'";
        }

        $query .= " order by c.id desc";
        // dd($query);
        $data = $this->my_connection->select($query);

        return $this->complainService->complain_datatable($data);
    }

    public function complainTypeDatatable()
    {
        $query = $this->my_connection->select("select ct.*, m.name as m_name, p.name as p_name from complain_types ct left join tbl_modules m on m.id=ct.module_id left join complain_types p on p.id= ct.parent_id order by ct.id desc");

        return $this->complainService->complain_type_datatable($query);
    }
    public function at_a_glance(Request $request)
    {

        $result = $this->my_connection->select("select count(*) as total_complain, (select count(*) from complains where status = 2) as solved_complain, (select count(*) from complains where status = 1) as progress_complain, (select count(*) from complains where status = 0) as pending_complain from complains");

        $data['total_complain'] =  $result[0]->total_complain;
        $data['solved_complain'] = $result[0]->solved_complain;
        $data['progress_complain'] = $result[0]->progress_complain;
        $data['pending_complain'] = $result[0]->pending_complain;

        return $data;
    }

    public function getComplainData($id)
    {
        // dd($id);
        $complain = $this->my_connection->select("select c.*, gs.device_name, gs.imei, ct.name as ct_name from complains c left join gs_objects gs on gs.id = c.object_id left join ticket_type ct on ct.id = c.complain_type_id where c.object_id= " . $id . " order by c.id desc");

        $htmlContent = '';
        foreach ($complain as $com) {
            $color = ['danger', 'success'];
            $st = ($com->status == 1) ? 'Solved' : 'On Proccess';
            $sd = ($com->status != null) ? date('d M Y, h:i a ', strtotime($com->solved_date)) : "";

            $htmlContent .= '<td >' . date('d M Y, h:i a ', strtotime($com->created_at)) . '</td>
                                <td >' . $com->complain_token . '</td>
                                <td > ' . $com->device_name . ' </td>
                                <td > ' . $com->ct_name . ' </td>
                                <td > ' . $com->complain_details . ' </td>
                                <td ><span class="badge badge-pill badge-' . $color[$com->status] . '"> ' . $st . ' </span></td>
                                <td >' . $sd . '</td>';
            return $htmlContent;
        }
    }

    public function saveData(Request $request, $id)
    {
        // dd($request->all());
        try {

            $validator = Validator::make($request->all(), [
                'complain_sector' => 'required',
                'complain_of' => 'required',
                'complain_type' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            if ($id > 0) {
                $complain = Complain::find($id);
                $complain->updated_at = date('Y-m-d H:i:s', strtotime('+6 hour'));
            } else {
                $complain = new Complain();
                $complain->created_by = Auth::user()->id;
                $complain->created_at = date('Y-m-d H:i:s', strtotime('+6 hour'));
            }
            // dd($request->all());
            $complain->module_id = $request->complain_sector;
            $complain->complain_of = $request->complain_of;
            $complain->complain_group = $request->complain_group;
            $complain->complain_type_id = $request->complain_type;
            $complain->reporter = $request->reporter;
            $complain->follower = $request->follower;
            $complain->status = $request->status;
            $complain->priority = $request->priority;
            $complain->solved_by = ($request->status == 2) ? Auth::user()->id : 0;
            $complain->solved_date = ($request->status == 2) ? date('Y-m-d H:i:s', strtotime('+6 hour')) : null;
            $complain->complain_details = $request->complain_details;
            // dd($complain);
            $complain->save();
            if ($id == 0) {
                $complain_token = "TCK-".$complain->id;
                $complain = Complain::find($complain->id);
                $complain->complain_token = $complain_token;
                $complain->save();
            }
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveTypeData(Request $request, $id)
    {
        // dd($request->all());
        try {

            $validation = [
                'complain_sector' => 'required',
                'type_name' => 'required',
            ];

            if ($request->type_or_group == 'type') {
                $validation['complain_group'] = 'required';
            }

            $validator = Validator::make($request->all(), $validation);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            if ($id > 0) {
                $complainType = ComplainType::find($id);
            } else {
                $complainType = new ComplainType();
            }
            // dd($request->all());
            $complainType->module_id = $request->complain_sector;
            $complainType->parent_id = ($request->type_or_group == 'type') ? $request->complain_group : 0;
            $complainType->name = $request->type_name;
            $complainType->save();

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function complainDatatable($id)
    {
        $data = $this->my_connection->select("select * from complains where vehicle_id=" . $id . "order by id desc");
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>";
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
            ->rawColumns(['status', 'created_at', 'object_id', 'solved_date', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $data['complain_id'] = $id;

        return view('enduser.dashboard.complain_view')->with($data);
    }

    public function complain_info($type, $id)
    {
        $data[] = '';

        if ($type == 'complain_information') {
            $data =  $this->complainService->complain_information($id);
        }

        $data['complain_id'] = $id;
        return view('enduser.dashboard.complain.' . $type)->with($data);
    }
}
