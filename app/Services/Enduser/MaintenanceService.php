<?php

namespace App\Services\Enduser;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class MaintenanceService
{


    public function __construct()
    {
        //
    }

    public function datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->addColumn('main_rem', function ($row) {

                $nextDate = new Carbon($row->next_main_date);
                $now = Carbon::today();
                $diff = $nextDate->diff($now)->days;

                if ($now > $nextDate) {
                    $diff = '-' . $diff;
                }
                if ($row->main_aleart == null) {
                    $main_aleart = 45;
                } else {
                    $main_aleart = $row->main_aleart;
                }

                if ($diff <= $main_aleart && $diff >= 0) {
                    $left = "<span class='badge badge-pill badge-warning'>" . $diff . " days</span>";
                } else if ($diff < 0) {
                    $left = "<span class='badge badge-pill badge-danger'>" . $diff . " days</span>";
                } else if ($diff >= $main_aleart) {
                    $left = "<span class='badge badge-pill badge-success'>" . $diff . " days</span>";
                }
                return $left;
            })
            ->editColumn('next_main_date', function ($row) {
                $nextDate = Carbon::parse($row->next_main_date)->format('d M Y');
                return $nextDate;
            })
            ->editColumn('last_main_date', function ($row) {
                $issueDate = Carbon::parse($row->last_main_date)->format('d M Y');
                return $issueDate;
            })
            ->editColumn('main_aleart', function ($row) {
                $mainAleart = "Before " . $row->main_aleart . " days";
                return $mainAleart;
            })
            ->rawColumns(['main_rem', 'last_main_date', 'next_main_date', 'action'])
            ->make(true);

        return $datalist;
    }
}
