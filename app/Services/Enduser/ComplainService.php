<?php

namespace App\Services\Enduser;

use App\Models\Complain;
use App\Models\Driver;
use File;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ComplainService
{
    

    public function __construct()
    {
       // 
    }

    public function complain_datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<a href='" . url('dashboard/complain_details/' . $id) . "' target='_blank' class='custom-button-class mr-2'><i class='fas fa-eye'></i></a>";
            })

            ->editColumn('status', function ($row) {
                $color = ['danger', 'warning', 'success'];
                $st = ['Pending', 'In Proccess', 'Solved'];
                return $status = "<span class='badge badge-pill badge-" . $color[$row->status] . "'>" . $st[$row->status] . "</span>";
            })

            ->editColumn('priority', function ($row) {
                $color = ['success', 'warning', 'danger'];
                $st = ['Low', 'Medium', 'High'];
                return $status = "<span class='badge badge-pill badge-" . $color[$row->priority] . "'>" . $st[$row->priority] . "</span>";
            })

            ->editColumn('created_at', function ($row) {
                $createdDate = Carbon::parse($row->created_at)->format('d M Y, h:i a');
                return $createdDate;
            })
            ->editColumn('solved_date', function ($row) {
                if ($row->solved_date) {
                    $solvedDate = Carbon::parse($row->solved_date)->format('d M Y, h:i a');
                } else {
                    $solvedDate = "-";
                }

                return $solvedDate;
            })
            ->rawColumns(['status', 'priority', 'complain_details', 'created_at', 'solved_date', 'action'])
            ->make(true);

        return $datalist;
    }

    public function complain_type_datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>";
            })
            ->editColumn('p_name', function ($row) {
                return ($row->p_name) ? $row->p_name : '-';
            })

            ->rawColumns(['action'])
            ->make(true);

        return $datalist;
    }

    public function complain_information($id)
    {
        $query = my_database()->select("SELECT c.*, m.name as module_name, ct.name as ct_name, r.name as r_name, f.name as f_name, (CASE c.module_id WHEN 1 THEN (select name as complain_of_name from customers where id=c.complain_of) WHEN 2 THEN (select name as complain_of_name from vendors where id=c.complain_of) ELSE (select vehicle_no as complain_of_name from vehicles where id=c.complain_of) END) as complain_of_name FROM complains c left join tbl_modules m on m.id = c.module_id left join complain_types ct on ct.id=c.complain_type_id left join users r on r.id=c.reporter left join users f on f.id=c.follower where c.id=" . $id . " order by c.id desc");

        $data['complain'] = $query[0];

        $data['modules'] = my_database()->table('tbl_modules')->orderBy('name')->get();
        return $data;
    }
}
