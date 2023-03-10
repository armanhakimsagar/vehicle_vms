<?php

namespace App\Http\Controllers\Enduser;

use App\Models\FuelLog;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class FuelLogController extends Controller
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
        $query = "select fl.*, vs.staff_name, vs.staff_id, v.vehicle_no from fuel_logs fl left join vehicle_staff vs on vs.id = fl.vehicle_staff_id left join vehicles v on v.id = fl.vehicle_id where fl.id > 0 ";

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $query .= " and  vehicle_id = " . $request->vehicle_id;
        }
        if ($request->fuel_type  != null && $request->fuel_type > 0) {
            $query .= " and fuel_type = " . $request->fuel_type;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  refill_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        }
        $query .= " order by fl.id desc";

        $data = $this->my_connection->select($query);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('vehicle_staff_id', function ($row) {
                return $driver = $row->vehicle_staff_id . ' - ' . $row->staff_name;
            })
            ->editColumn('fuel_type', function ($row) {
                if ($row->fuel_type == 1) {
                    $fuelType = 'Octane';
                } else if ($row->fuel_type == 2) {
                    $fuelType = 'Diesel';
                } else if ($row->fuel_type == 3) {
                    $fuelType = 'Gas';
                } else if ($row->fuel_type == 4) {
                    $fuelType = 'Petrol';
                }

                return $fuelType;
            })
            ->editColumn('refill_date', function ($row) {
                $refillDate = Carbon::parse($row->refill_date)->format('d M Y');
                return $refillDate;
            })
            ->rawColumns(['vehicle_staff_id', 'refill_date', 'action'])
            ->make(true);
    }


    public function at_a_glance(Request $request)
    {
        $current_date = " and refill_date = '" . date('Y-m-d') . "'";
        $thisMonth =  " and  refill_date between '" . date('Y-m-01 H:i:s') . "' and '" . date('Y-m-t 23:59:59') . "'";
        $lastMonth =  " and  refill_date between '" . date('Y-m-01 H:i:s', strtotime("-1 month")) . "' and '" . date('Y-m-t 23:59:59', strtotime("-1 month")) . "'";

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $vehicle_id = " and  vehicle_id = " . $request->vehicle_id;
        } else {
            $vehicle_id = "";
        }
        if ($request->fuel_type  != null && $request->fuel_type > 0) {
            $fuel_type = " and fuel_type = " . $request->fuel_type;
        } else {
            $fuel_type = "";
        }
        if ($request->start_date  != null && $request->end_date  != null) {
            $date = " and  refill_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        } else {
            $date = "";
        }

        $result = $this->my_connection->select("SELECT sum(refill_unit) as total_r_u, (SELECT sum(total_price) from fuel_logs where id > 0 " . $vehicle_id . $fuel_type . $date . " ) as total_p, (SELECT sum(total_price) from fuel_logs where id > 0 " . $vehicle_id . $fuel_type . $current_date . " ) as todays_amount, (SELECT sum(total_price) from fuel_logs where id > 0 " . $vehicle_id . $fuel_type . $thisMonth . " ) as this_month_amount, (SELECT sum(total_price) from fuel_logs where id > 0 " . $vehicle_id . $fuel_type . $lastMonth . " ) as last_month_amount from fuel_logs where id > 0 " . $vehicle_id . $fuel_type . $date);

        $total_r_u = $result[0]->total_r_u;
        $total_p = $result[0]->total_p;
        $todays_amount = $result[0]->todays_amount;
        $this_month_amount = $result[0]->this_month_amount;
        $last_month_amount = $result[0]->last_month_amount;

        if ($total_r_u != null || $total_r_u != 0) {
            $average_u_p = $total_p / $total_r_u;
            $data['average_u_p'] = number_format($average_u_p, 2);
        } else {
            $average_u_p = "NA";
            $data['average_u_p'] = $average_u_p;
        }

        $data['total_r_u'] = number_format($total_r_u, 2);
        $data['total_p'] = number_format($total_p, 2);
        $data['todays_amount'] = number_format($todays_amount, 2);
        $data['this_month_amount'] = number_format($this_month_amount, 2);
        $data['last_month_amount'] = number_format($last_month_amount, 2);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveData(Request $request, $id)
    {
        try {

            // dd($request->all());

            $validator = Validator::make($request->all(), [
                'refill_date' => 'required',
                'vehicle_no' => 'required',
                'fuel_type' => 'required',
                'refill_unit' => 'required',
                'unit_price' => 'required',
                'total_price' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            if ($id > 0) {

                $fuelLog = FuelLog::find($id);
            } else {

                $fuelLog = new FuelLog();
                $fuelLog->customer_id = Auth::user()->id;
                // dd($fuelLog);

            }

            DB::beginTransaction();
            // dd($request->all());
            $fuelLog->refill_date = Carbon::parse($request->refill_date)->format('Y-m-d');
            $fuelLog->vehicle_id = $request->vehicle_no;
            $fuelLog->object_id = $request->object_id;
            $fuelLog->vehicle_staff_id = $request->vehicle_staff;
            $fuelLog->fuel_type = $request->fuel_type;
            $fuelLog->refill_unit = $request->refill_unit;
            $fuelLog->unit_price = $request->unit_price;
            $fuelLog->total_price = $request->total_price;
            $fuelLog->station_name = $request->station_name;
            $fuelLog->receipt_no = $request->receipt_no;
            $fuelLog->note = $request->note;
            $fuelLog->save();

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function saveFuelLogData(Request $request, $id)
    {
        try {

            // dd($id);
            $getData = Vehicle::where('object_id', $id)->get();

            if (count($getData) > 0) {
                // dd($getData[0]->id);
                $validator = Validator::make($request->all(), [
                    'refill_date' => 'required',
                    'fuel_type' => 'required',
                    'refill_unit' => 'required',
                    'unit_price' => 'required',
                    'total_price' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }

                DB::beginTransaction();
                $fuelLog = new FuelLog();
                $fuelLog->refill_date = Carbon::parse($request->refill_date)->format('Y-m-d');
                // dd($getData->id);
                $fuelLog->customer_id = Auth::user()->id;
                $fuelLog->vehicle_id = $getData[0]->id;
                $fuelLog->object_id = $getData[0]->object_id;
                $fuelLog->driver_pid = $getData[0]->driver_pid;
                $fuelLog->fuel_type = $request->fuel_type;
                $fuelLog->refill_unit = $request->refill_unit;
                $fuelLog->unit_price = $request->unit_price;
                $fuelLog->total_price = $request->total_price;
                $fuelLog->station_name = $request->station_name;
                $fuelLog->receipt_no = $request->receipt_no;
                $fuelLog->note = $request->note;
                // dd($fuelLog);
                $fuelLog->save();

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

    public function getInfo($id, $selected = null)
    {
        $info = $this->my_connection->select("select v.vehicle_staff_id, v.object_id from vehicles v where v.id =" . $id);
        $assign_staff = '<option value="">Select</option>';

        if ($info[0]->vehicle_staff_id) {
            $staff = $this->my_connection->select("select vs.id, vs.staff_name, vs.staff_id from vehicle_staff vs where vs.staff_type = 2 and vs.id in(" . $info[0]->vehicle_staff_id . ")");
            if (count($staff) > 0) {
                foreach ($staff as $s) {
                    $assign_staff .=  '<option value="' . $s->id . '"';
                    if ($selected && $selected == $s->id) {
                        $assign_staff .= ' selected="selected"';
                    }
                    $assign_staff .=  '>' . $s->staff_name . ' - ' . $s->staff_id . '</option>';
                }
            }
        }

        $data['object_id'] = $info[0]->object_id;
        $data['assign_staff'] = $assign_staff;
        return $data;
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

    public function getFuelLogData($id)
    {
        $getData = Vehicle::where('object_id', $id)->get();

        if (count($getData) > 0) {
            $fuel_logs = FuelLog::where('object_id', $id)->orderBy('id', 'desc')->take(5)->get();

            $htmlContent = '';
            if (count($fuel_logs) > 0) {
                foreach ($fuel_logs as $log) {
                    $fuelName = '';
                    if ($log->fuel_type == 1) {
                        $fuelName = "Octane";
                    } else if ($log->fuel_type == 2) {
                        $fuelName = "Deisel";
                    } else if ($log->fuel_type == 3) {
                        $fuelName = "Gas";
                    }


                    $htmlContent .= '<tr >
                                        <td >' . date('d M Y', strtotime($log->refill_date)) . '</td>
                                        <td > ' . $fuelName . ' </td>
                                        <td > ' . $log->total_price  . ' </td>
                                    </tr>';
                }
            } else {
                $htmlContent .= '<span>Fuel log empty</span>';
            }
            // dd($htmlContent);
            return $htmlContent;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuel_log = FuelLog::find($id);
        $data['fuel_log'] = $fuel_log;
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
    public function destroy($id)
    {
        //
    }
}
