<?php

namespace App\Services\Enduser;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class DocumentService
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
            ->addColumn('expiry_rem', function ($row) {

                $expiryDate = new Carbon($row->expiry_date);
                $now = Carbon::today();
                $diff = $expiryDate->diff($now)->days;

                if ($now > $expiryDate) {
                    $diff = '-' . $diff;
                }
                if ($row->expiry_aleart == null) {
                    $expiry_aleart = 45;
                } else {
                    $expiry_aleart = $row->expiry_aleart;
                }

                if ($diff <= $expiry_aleart && $diff >= 0) {
                    $left = "<span class='badge badge-pill badge-warning'>" . $diff . " days</span>";
                } else if ($diff < 0) {
                    $left = "<span class='badge badge-pill badge-danger'>" . $diff . " days</span>";
                } else if ($diff >= $expiry_aleart) {
                    $left = "<span class='badge badge-pill badge-success'>" . $diff . " days</span>";
                }
                return $left;
            })
            ->editColumn('expiry_date', function ($row) {
                $expiryDate = Carbon::parse($row->expiry_date)->format('d M Y');
                return $expiryDate;
            })
            ->editColumn('issue_date', function ($row) {
                $issueDate = Carbon::parse($row->issue_date)->format('d M Y');
                return $issueDate;
            })
            ->editColumn('last_renewal_date', function ($row) {
                $renewalDate = Carbon::parse($row->last_renewal_date)->format('d M Y');
                return $renewalDate;
            })
            ->editColumn('expiry_aleart', function ($row) {
                $expiryAleart = "Before " . $row->expiry_aleart . " days";
                return $expiryAleart;
            })
            ->rawColumns(['expiry_rem', 'issue_date', 'expiry_date', 'action'])
            ->make(true);

        return $datalist;
    }
}
