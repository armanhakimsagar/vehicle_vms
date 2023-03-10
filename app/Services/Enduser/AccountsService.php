<?php

namespace App\Services\Enduser;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class AccountsService
{
    private $my_final = array();

    public function __construct()
    {
        //
    }

    public function accountSetupDatalist($query)
    {

        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>
            <button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('parent_name', function ($row) {
                if ($row->parent_id > 0) {
                    return $row->parent_name . ' (' . $row->parent_code . ')';
                } else {
                    return '-';
                }
            })
            ->editColumn('transactional', function ($row) {
                if ($row->transactional == 1) {
                    return 'Transactional';
                } else {
                    return 'Group';
                }
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return "<span class='badge badge-pill badge-success'>Active</span>";
                } else {
                    return "<span class='badge badge-pill badge-danger'>Inactive</span>";
                }
            })
            ->rawColumns(['parent_name', 'status', 'action'])
            ->make(true);

        return $datalist;
    }

    public function depositOrExpenseDatalist($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>
            <button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('date', function ($row) {
                return Carbon::parse($row->date)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->make(true);

        return $datalist;
    }

    public function transferDatalist($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('trans_date', function ($row) {
                return Carbon::parse($row->trans_date)->format('d M Y h:i a');
            })
            ->rawColumns(['trans_date', 'action'])
            ->make(true);

        return $datalist;
    }

    public function ledgerDatalist($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('trans_date', function ($row) {
                return Carbon::parse($row->trans_date)->format('d M Y h:i a');
            })
            ->rawColumns(['action'])
            ->make(true);

        return $datalist;
    }

    public function regularBalanceDatalist($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('date', function ($row) {
                return Carbon::parse($row->date)->format('d M Y h:i a');
            })
            ->rawColumns(['date'])
            ->make(true);

        return $datalist;
    }

    public function nestedToSingleArray($arr)
    {
        foreach ($arr as $t) {
            if (isset($t->_children) && !empty($t->_children)) {
                //$my_final[] = $t->_children;
                foreach ($t->_children as $c) {
                    $this->my_final[] = $c;
                }
                $this->nestedToSingleArray($t->_children);
                unset($t->_children);
            }
        }
        return array_merge($arr, $this->my_final);
    }

    public function arrayGrouping($data)
    {
        $array = ['A', 'L', 'I', 'E'];
        $row = array();
        $i = 0;
        foreach ($array as $a) {
            foreach ($data as $d) {
                if ($d->account_type == $a && $d->parent_id == $i) {
                    array_push($row, $d);
                    foreach ($data as $d2) {
                        if ($d2->parent_id == $d->id) {
                            array_push($row, $d2);
                            foreach ($data as $d3) {
                                if ($d3->parent_id == $d2->id) {
                                    array_push($row, $d3);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $row;
    }
}
