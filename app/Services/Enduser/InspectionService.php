<?php

namespace App\Services\Enduser;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class InspectionService
{

    public function insp_datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                $action = '';
                if ($row->datalist_type == 'inspection') {
                    $action = "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button  type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>
                    <a  href='" . url('dashboard/assign_vehicle_for_insp/' . $id) . "' target='_blank' class='custom-button-class mr-2' onclick='assign_vehicle($id)'><i class='fas fa-list-ul'></i></a>";
                } else if ($row->datalist_type == 'vehicle') {
                    $action = "<button  type='button' class='custom-button-class mr-2' onclick='check_inspection($id)'><i class='fas fa-list-ul'></i></button>";
                }

                return $action;
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status =  "<span class='badge badge-pill badge-success'>Active</span>";
                } else {
                    $status = "<span class='badge badge-pill badge-danger'>Inactive</span>";
                }
                return $status;
            })
            ->editColumn('inspection_date', function ($row) {

                return date('d M Y', strtotime($row->inspection_date));
            })
            ->rawColumns(['status', 'item_details', 'action'])
            ->make(true);
        return $datalist;
    }
}
