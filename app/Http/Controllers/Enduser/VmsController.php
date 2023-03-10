<?php

namespace App\Http\Controllers\Enduser;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use App\Models\Vms;
use App\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Enduser\VmsService;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class VmsController extends Controller
{
    private $my_connection;
    private $vmsService;

    public function __construct(VmsService $vmsService)
    {
        $this->vmsService = $vmsService;

        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['vehicles'] = Vehicle::all();
        return view('enduser.dashboard.dashboard')->with($data);
    }

    public function logoutUser()
    {

        Auth::logout();
        return redirect('/');
    }

    public function vmsPages($pages = null)
    {
      
        $data = $this->vmsService->getPagesData($pages);
        if($pages=="trip_add"){
            $data['last_trip_id'] = $this->my_connection->table('tbl_trips')->orderBy('id', 'desc')->first()->id;
        } else{
            $data['vehicles'] = Vehicle::all();
        }

        return view('enduser.dashboard.' . $pages)->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function docTypeList()
    {
        $data = $this->my_connection->table('doc_types')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return " <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function mainTypeList()
    {
        $data = $this->my_connection->table('maintenance_types')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return " <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })

            ->rawColumns(['action'])
            ->make(true);
    }

    public function itemCategoryList()
    {
        $data = $this->my_connection->table('item_categories')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return " <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_item($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status==1) {
                    return '<span class="ml-2 badge badge-pill badge-success"> </span>';
                } else {
                    return '<span class="ml-2 badge badge-pill badge-warning"> </span>';
                }
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function editPartsCategory($id)
    {
        $data = $this->my_connection->table('item_categories')->where('id', $id)->get();
        echo json_encode($data[0],true);
    }

    public function saveItemCategory(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();

            if ($id > 0) {

                $data = [
                    'category_name' => $request->category_name,
                    'status' => $request->status,
                ];
                $insert = $this->my_connection->table('item_categories')->where('id', $id)->update($data);
            } else {

                $data = [
                    'category_name' => $request->category_name,
                    'status' => $request->status
                ];
                $insert = $this->my_connection->table('item_categories')->insert($data);
                $id = $this->my_connection->getPdo()->lastInsertId();
            }
            $this->my_connection->commit();
            return $id;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function itemList()
    {

    
        $data = $this->my_connection->select('SELECT i.*,c.category_name FROM tbl_items i left join item_categories c on c.id = i.item_category');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return " <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_item($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status==1) {
                    return '<span class="ml-2 badge badge-pill badge-success"> </span>';
                } else {
                    return '<span class="ml-2 badge badge-pill badge-warning"> </span>';
                }
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function editItems($id)
    {
        $data = $this->my_connection->table('tbl_items')->where('id', $id)->get();
        echo json_encode($data[0],true);
    }

    public function itemCategory(){
        $data = $this->my_connection->table('item_categories')->get();
        echo json_encode($data,true);
    }

    public function saveItem(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'item_category' => 'required',
                'item_name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();

            if ($id > 0) {

                $data = [
                    'item_no' => $request->item_no,
                    'item_category' => $request->item_category,
                    'item_name' => $request->item_name,
                    'item_description' => $request->item_description,
                    'unit_price' => $request->unit_price,
                    'default_qty' => $request->default_qty,
                    'tax_rate' => $request->tax_rate,
                    'status' => $request->status,
                ];
                $insert = $this->my_connection->table('tbl_items')->where('id', $id)->update($data);
            } else {

                $data = [
                    'item_no' => $request->item_no,
                    'item_category' => $request->item_category,
                    'item_name' => $request->item_name,
                    'item_description' => $request->item_description,
                    'unit_price' => $request->unit_price,
                    'default_qty' => $request->default_qty,
                    'tax_rate' => $request->tax_rate,
                    'status' => $request->status,
                ];
                $insert = $this->my_connection->table('tbl_items')->insert($data);
                $id = $this->my_connection->getPdo()->lastInsertId();
            }
            $this->my_connection->commit();
            return $id;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveDocType(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();

            if ($id > 0) {

                $data = [
                    'name' => $request->name,
                ];
                $insert = $this->my_connection->table('doc_types')->where('id', $id)->update($data);
            } else {

                $data = [
                    'customer_id' => Auth::user()->id,
                    'name' => $request->name,
                ];
                $insert = $this->my_connection->table('doc_types')->insert($data);
                $id = $this->my_connection->getPdo()->lastInsertId();
            }
            $this->my_connection->commit();
            return $id;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
    public function saveMainType(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();

            if ($id > 0) {

                $data = [
                    'name' => $request->name,
                ];
                $insert = $this->my_connection->table('maintenance_types')->where('id', $id)->update($data);
            } else {

                $data = [
                    'customer_id' => Auth::user()->id,
                    'name' => $request->name,
                ];
                $insert = $this->my_connection->table('maintenance_types')->insert($data);
                $id = $this->my_connection->getPdo()->lastInsertId();
            }
            $this->my_connection->commit();
            return $id;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vms  $vms
     * @return \Illuminate\Http\Response
     */
    public function show(Vms $vms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vms  $vms
     * @return \Illuminate\Http\Response
     */
    public function edit(Vms $vms)
    {
        //
    }

    public function at_a_glance(Request $request)
    {
        $customer_id = auth()->user()->id;
        $vehicle = '';
        $created = '';
        $refillDate = '';
        $expenseDate = '';

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $vehicle = " and  vehicle_id = " . $request->vehicle_id;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $created = " and  created_at between '" . $request->start_date . "' and '" . $request->end_date . "'";
            $refillDate = " and  refill_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
            $expenseDate = " and  expense_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        }

        $query = "SELECT count(*) as t_vhl, (SELECT count(*) from drivers where customer_id = " . $customer_id . " ) as t_drv, (SELECT count(*) from documents where customer_id =" . $customer_id . $vehicle . $created . " ) as t_doc, (SELECT sum(total_price) from fuel_logs where customer_id = " . $customer_id .  $vehicle . $refillDate . " ) as t_fe, (SELECT sum(cost_value) from expense_logs where customer_id = " . $customer_id . $vehicle . $expenseDate . " ) as t_e  FROM `vehicles` where customer_id = " . $customer_id;

        $result = $this->my_connection->select($query);

        $data['fuel_cost'] = ($result[0]->t_fe == null ? 0 : $result[0]->t_fe);
        $data['others_cost'] = ($result[0]->t_e == null ? 0 : $result[0]->t_e);
        $data['total_driver'] = $result[0]->t_drv;
        $data['total_vehicle'] = $result[0]->t_vhl;
        $data['total_doc'] = $result[0]->t_doc;
        $data['net_cost'] = $data['fuel_cost'] + $data['others_cost'];

        return $data;
    }


    public function DocDatalist(Request $request)
    {
        // dd($request->all());
        $query = "select d.*, v.vehicle_no, dt.name as dt_name from documents d left join vehicles v on v.id = d.vehicle_id left join doc_types dt on dt.id = d.doc_type_id where d.customer_id = " . Auth::user()->id;

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $query .= " and  d.vehicle_id = " . $request->vehicle_id;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  d.created_at between '" . $request->start_date . " 00:00:00' and '" . $request->end_date . " 23:59:00'";
        }
        $query .= " order by d.id desc";

        $data = $this->my_connection->select($query);

        return Datatables::of($data)
            ->addIndexColumn()
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
            ->editColumn('issue_date', function ($row) {
                $issueDate = Carbon::parse($row->issue_date)->format('d M Y');
                return $issueDate;
            })
            ->editColumn('expiry_date', function ($row) {
                $expiryDate = Carbon::parse($row->expiry_date)->format('d M Y');
                return $expiryDate;
            })
            ->editColumn('expiry_aleart', function ($row) {
                $expiryAleart = "Before " . $row->expiry_aleart . " days";
                return $expiryAleart;
            })
            ->rawColumns(['expiry_rem', 'issue_date', 'expiry_date'])
            ->make(true);
    }
    public function MainDatalist(Request $request)
    {
        // dd($request->all());
        $query = "select m.*, v.vehicle_no, mt.name as mt_name from maintenances m left join vehicles v on v.id = m.vehicle_id left join maintenance_types mt on mt.id = m.main_type_id where m.customer_id = " . Auth::user()->id;

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $query .= " and  m.vehicle_id = " . $request->vehicle_id;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  m.next_main_date between '" . $request->start_date . " 00:00:00' and '" . $request->end_date . " 23:59:00'";
        }
        $query .= " order by m.id desc";

        $data = $this->my_connection->select($query);

        return Datatables::of($data)
            ->addIndexColumn()
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
            ->editColumn('last_main_date', function ($row) {
                $lastDate = Carbon::parse($row->last_main_date)->format('d M Y');
                return $lastDate;
            })
            ->editColumn('next_main_date', function ($row) {
                $nextMainDate = Carbon::parse($row->next_main_date)->format('d M Y');
                return $nextMainDate;
            })
            ->editColumn('main_aleart', function ($row) {
                $mainAleart = "Before " . $row->main_aleart . " days";
                return $mainAleart;
            })
            ->rawColumns(['main_rem', 'last_main_date', 'next_main_date'])
            ->make(true);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vms  $vms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vms $vms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vms  $vms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vms $vms)
    {
        //
    }
}
