<?php

namespace App\Http\Controllers\Enduser;

use App\Models\ExpenseLog;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class ExpenseLogController extends Controller
{
    private $my_connection;

    public function __construct()
    {
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
    public function index(Request $request)
    {
        $query = "select el.*, vs.staff_name, vs.staff_id, v.vehicle_no from expense_logs el left join vehicle_staff vs on vs.id = el.vehicle_staff_id left join vehicles v on v.id = el.vehicle_id where el.id > 0 ";

        if($request->vehicle_id !=null && $request->vehicle_id > 0){
            $query.= " and  vehicle_id = ".$request->vehicle_id;
        }
        if($request->expense_type  !=null && $request->expense_type > 0){
            $query.= " and expense_type = ".$request->expense_type;
        }
        if($request->start_date  !=null && $request->end_date  !=null){

            $query.= " and  expense_date between '".$request->start_date."' and '".$request->end_date. "'";
        }
        $query.= " order by el.id desc";

        $data = $this->my_connection->select($query);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('staff_name', function ($row) {
                return  $row->staff_id . ' - ' . $row->staff_name;
            })
            ->editColumn('expense_type', function ($row) {
                $types= ['type', 'Fuel', 'Maintenance and repairs', 'Insurance', 'License and Registration fees', 'Service labour costs', 'Replacement parts', 'Parking and tolls', 'Road Tax', 'Tyres', 'GPS expense', 'Battery expense', 'Miscellaneous expense'];
                $expenseType = $types[$row->expense_type];
                return $expenseType;
            })
            ->editColumn('expense_date', function ($row) {
                $expenseDate = Carbon::parse($row->expense_date)->format('d M Y');
                return $expenseDate;
            })
            ->rawColumns(['staff_name', 'expense_date', 'expense_type', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function saveData(Request $request, $id)
    {
        try {

            // dd($request->all());

            $validator = Validator::make($request->all(), [
                'expense_date' => 'required',
                'vehicle_no' => 'required',
                'expense_type' => 'required',
                'cost_value' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            if ($id > 0) {

                $expenseLog = ExpenseLog::find($id);

            } else {

                $expenseLog = new ExpenseLog();
                $expenseLog->customer_id = Auth::user()->id;
                // dd($expenseLog);

            }

            DB::beginTransaction();
            // dd($request->all());
            $expenseLog->expense_date = Carbon::parse($request->expense_date)->format('Y-m-d');
            $expenseLog->vehicle_id = $request->vehicle_no;
            $expenseLog->object_id = $request->object_id;
            $expenseLog->vehicle_staff_id = $request->vehicle_staff;
            $expenseLog->expense_type = $request->expense_type;
            $expenseLog->cost_value = $request->cost_value;
            $expenseLog->note = $request->note;
            $expenseLog->save();

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function saveExpenseLogData(Request $request, $id)
    {
        try {

            // dd($id);
            $getData = Vehicle::where('object_id', $id)->get();

            if (count($getData) > 0) {
                // dd($getData[0]->id);
                $validator = Validator::make($request->all(), [
                    
                    'expense_type' => 'required',
                    'cost_value' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }

                DB::beginTransaction();
                $expenseLog = new ExpenseLog();
                $expenseLog->customer_id = Auth::user()->id;
                $expenseLog->expense_date = Carbon::parse($request->expense_date)->format('Y-m-d');
                $expenseLog->vehicle_id = $getData[0]->id;
                $expenseLog->object_id = $getData[0]->object_id;
                $expenseLog->driver_pid = $getData[0]->driver_pid;
                $expenseLog->expense_type = $request->expense_type;
                $expenseLog->cost_value = $request->cost_value;
                $expenseLog->note = $request->note;
                $expenseLog->save();

                DB::commit();
                return true;
            } else {
                echo 0;
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getExpenseLogData($id)
    {
        $getData = Vehicle::where('object_id', $id)->get();

        if (count($getData) > 0) {
            $expense_logs = ExpenseLog::where('object_id', $id)->orderBy('id', 'desc')->take(5)->get();

            $htmlContent = '';
            if (count($expense_logs) > 0) {
                foreach ($expense_logs as $log) {
                    $types= ['type', 'Fuel', 'Maintenance and repairs', 'Insurance', 'License and Registration fees', 'Service labour costs', 'Replacement parts', 'Parking and tolls', 'Road Tax', 'Tyres', 'GPS expense', 'Battery expense', 'Miscellaneous expense'];
                $expenseType = $types[$log->expense_type];
                
                $htmlContent .= '<tr >
                                <td >' . date('d M Y', strtotime($log->expense_date)) . '</td>
                                <td > ' . $expenseType . ' </td>
                                <td > ' . $log->cost_value  . ' </td>
                                </tr>';
                }
            }else{
                $htmlContent .= '<span>Expense log empty</span>';
            }
            // dd($htmlContent);
            return $htmlContent;
        } else {
            echo 0;
        }

    }

    public function at_a_glance(Request $request)
    {
        $current_date = " and expense_date = '".date('Y-m-d')."'";
        $thisMonth =  " and  expense_date between '".date('Y-m-01 H:i:s')."' and '".date('Y-m-t 23:59:59'). "'";
        $lastMonth =  " and  expense_date between '".date('Y-m-01 H:i:s', strtotime("-1 month"))."' and '".date('Y-m-t 23:59:59', strtotime("-1 month")). "'";

        if($request->vehicle_id !=null && $request->vehicle_id > 0){
            $vehicle_id = " and  vehicle_id = ".$request->vehicle_id;
        }else{
            $vehicle_id ="";
        }
        if($request->expense_type  !=null && $request->expense_type > 0){
            $expense_type = " and expense_type = ".$request->expense_type;
        }else{
            $expense_type ="";
        }

        $result = $this->my_connection->select("SELECT sum(cost_value) as todays_amount, (SELECT sum(cost_value) from expense_logs where id > 0 " .$vehicle_id . $expense_type .$thisMonth." ) as this_month_amount, (SELECT sum(cost_value) from expense_logs where id > 0 " .$vehicle_id . $expense_type .$lastMonth." ) as last_month_amount from expense_logs where id > 0 " .$vehicle_id . $expense_type.$current_date);

        $todays_amount = $result[0]->todays_amount;
        $this_month_amount = $result[0]->this_month_amount;
        $last_month_amount = $result[0]->last_month_amount;

        $data['todays_amount'] = number_format($todays_amount, 2);
        $data['this_month_amount'] = number_format($this_month_amount, 2);
        $data['last_month_amount'] = number_format($last_month_amount, 2);

       return $data;

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
        $expense_log = ExpenseLog::find($id);
        $data['expense_log'] = $expense_log;
        return $data;
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
    public function reportDashboard()
    {
        return view('layouts.report.report_dashboard');
    }
}
