<?php

namespace App\Http\Controllers\Enduser;

use App\Models\TblTrip;
use App\Http\Controllers\Controller;
use App\Services\Enduser\TripService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    private $my_connection;
    private $tripService;
    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function tripDatatable()
    {
        $trip = $this->my_connection->select("select t.*, v.vehicle_no from tbl_trips t left join vehicles v on v.id = t.vehicle_id order by t.id desc");

        $tripDetail = $this->my_connection->select("select * from trip_details");
        $tripExpense = $this->my_connection->select("select * from trip_expenses");

        if (count($trip) > 0) {
            foreach ($trip as $t) {
                $sub_trip = 0;
                $trip_amount = 0;
                $customer_paid = 0;
                $customer_due = 0;
                $customer_bill_status = 'NA';
                $total_trip_expenses = 0;
                $trip_expenses_due = 0;
                $trip_expenses_status = 'NA';

                if (count($tripDetail) > 0) {
                    foreach ($tripDetail as $td) {
                        if ($td->trip_id == $t->id) {
                            $sub_trip += 1;
                            $trip_amount += $td->net_total_amount;
                            $customer_paid += ($td->net_total_amount - $td->due_amount);
                            $customer_due += $td->due_amount;
                        }
                    }
                }

                if (count($tripExpense) > 0) {
                    foreach ($tripExpense as $te) {
                        if ($te->trip_id == $t->id) {
                            $total_trip_expenses += $te->total_amount;
                            $trip_expenses_due += ($te->total_amount - $te->paid_amount);
                        }
                    }
                }

                if ($trip_amount > 0 && $customer_due == 0) {
                    $customer_bill_status = 'Full paid';
                } else if ($trip_amount > 0 && $customer_due == $trip_amount) {
                    $customer_bill_status = 'Full due';
                } else if ($trip_amount > 0 && $customer_due > 0 && $customer_due < $trip_amount) {
                    $customer_bill_status = 'Parital paid';
                } else if ($trip_amount > 0 && $customer_due < 0) {
                    $customer_bill_status = 'Advance paid';
                }

                if ($total_trip_expenses > 0 && $trip_expenses_due == 0) {
                    $trip_expenses_status = 'Full paid';
                } else if ($total_trip_expenses > 0 && $trip_expenses_due == $total_trip_expenses) {
                    $trip_expenses_status = 'Full due';
                } else if ($total_trip_expenses > 0 && $trip_expenses_due > 0 && $trip_expenses_due < $total_trip_expenses) {
                    $trip_expenses_status = 'Parital paid';
                } else if ($total_trip_expenses > 0 && $trip_expenses_due < 0) {
                    $trip_expenses_status = 'Advance paid';
                }

                $t->sub_trip = $sub_trip;
                $t->trip_amount = $trip_amount;
                $t->customer_paid = $customer_paid;
                $t->customer_due = $customer_due;
                $t->customer_bill_status = $customer_bill_status;
                $t->total_trip_expenses = $total_trip_expenses;
                $t->trip_expenses_due = $trip_expenses_due;
                $t->trip_expenses_status = $trip_expenses_status;
            }
        }

        // dd($trip);
        return $this->tripService->trip_datatable($trip);
    }
    public function saveData(Request $request, $id)
    {

        try {
            // dd($request->all());
            $this->my_connection->beginTransaction();

            //1. insert into tbl_trips
            $trip = $this->tripService->saveTripData($request, $id);
            if ($trip) {
                if ($id > 0) {
                    //2. update trip details
                    $tripDetail = $this->tripService->updateTripDetailData($request, $trip);

                    //3. update trip_expenses
                    $tripExpense = $this->tripService->updateTripExpenseData($request, $trip);
                } else {

                    //2. insert into trip details
                    $tripDetail = $this->tripService->saveTripDetailData($request, $trip);

                    //3. insert into trip_expenses
                    $tripExpense = $this->tripService->saveTripExpenseData($request, $trip);
                }
            }

            $this->my_connection->commit();
            return true;
            // die();

            // $validator = Validator::make($request->all(), [
            //     'item_category' => 'required',
            //     'item_name' => 'required',
            // ]);

            // if ($validator->fails()) {
            //     return $this->respondInvalidRequest($validator->errors());
            // }
            // $this->my_connection->beginTransaction();

            // if ($id > 0) {
            //     $data = [
            //         'item_no' => $request->item_no,
            //         'item_category' => $request->item_category,
            //         'item_name' => $request->item_name,
            //         'item_description' => $request->item_description,
            //         'unit_price' => $request->unit_price,
            //         'default_qty' => $request->default_qty,
            //         'tax_rate' => $request->tax_rate,
            //         'status' => $request->status,
            //     ];
            //     $insert = $this->my_connection->table('tbl_items')->where('id', $id)->update($data);
            // } else {

            //     $data = [
            //         'item_no' => $request->item_no,
            //         'item_category' => $request->item_category,
            //         'item_name' => $request->item_name,
            //         'item_description' => $request->item_description,
            //         'unit_price' => $request->unit_price,
            //         'default_qty' => $request->default_qty,
            //         'tax_rate' => $request->tax_rate,
            //         'status' => $request->status,
            //     ];
            //     $insert = $this->my_connection->table('tbl_items')->insert($data);
            //     $id = $this->my_connection->getPdo()->lastInsertId();
            // }
            // $this->my_connection->commit();
            // return $id;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function tripDetailsList(Request $request)
    {
        $tripDetail = $this->my_connection->select("select td.*, c.customer_name from trip_details td left join customers c on c.id = td.customer_id where td.trip_id=" . $request->trip_id);

        $table =  '<table id="sub_table_' . $request->trip_id . '" class="table table-bordered table-striped"><thead><tr><th scope="col" class="text-center">SL</th><th scope="col">Customer</th><th scope="col" class="text-center">Trip Type</th><th scope="col" class="text-center">Trip Duration</th><th scope="col" class="text-center">Trip Rate</th><th scope="col" class="text-center">Extra Amount</th><th scope="col" class="text-center">Total Amount</th><th scope="col" class="text-center">Discount Amount</th><th scope="col" class="text-center">Net Total Amount</th><th scope="col" class="text-center">Paid Amount</th><th scope="col" class="text-center">Due Amount</th><th scope="col" class="text-center">Action</th></tr></thead><tbody>';

        if (count($tripDetail) > 0) {
            $i = 1;
            foreach ($tripDetail as $td) {
                $table .=  '<tr class="trip_details_row">
                <td class="text-center">' . $i . '</td>
                <td>' . $td->customer_name . '</td>
                <td class="text-center">' . $td->trip_type . '</td>
                <td class="text-center">' . $td->total_duration . '</td>
                <td class="text-center">' . ($td->trip_rate + $td->down_trip_rate) . '</td>
                <td class="text-center">' . ($td->extra_amount + $td->down_extra_amount) . '</td>
                <td class="text-center">' . $td->total_amount . '</td>
                <td class="text-center">' . $td->discount_amount . '</td>
                <td class="text-center">' . $td->net_total_amount . '</td>
                <td class="text-center">' . $td->advance_paid . '</td>
                <td class="text-center">' . $td->due_amount . '</td>
                <td class="text-center"><button type="button" id="trip_details_row_' . $td->id . '" class="custom-button-class mr-2" onclick="view_trip_details(' . $td->id . ')"><i class="fas fa-eye"></i></button></td>
              </tr>';
                $i++;
            }
        }
        $table .=  '</tbody></table>';

        return $table;
    }

    public function tripShow($id)
    {
        $data['trip'] = TblTrip::find($id);

        $data['tripDetail'] = $this->my_connection->select("select td.*, pm.method_name as payment_method_name, c.customer_name from trip_details td left join payment_method pm on pm.id =td.payment_method left join customers c on c.id = td.customer_id where td.trip_id=" . $id);

        $data['tripDetailId'] = $this->my_connection->select('SELECT GROUP_CONCAT(id) as id_list FROM `trip_details` where trip_id= ' . $id)[0];

        $data['tripDetailCount'] = count($data['tripDetail']);

        $data['tripExpense'] = $this->my_connection->select("select * from trip_expenses  where trip_id=" . $id);

        $data['tripExpenseId'] = $this->my_connection->select('SELECT GROUP_CONCAT(id) as id_list FROM `trip_expenses` where trip_id= ' . $id)[0];

        $data['tripExpenseCount'] = count($data['tripExpense']);
        // dd($data);

        return view('enduser.dashboard.trip.trip_view')->with($data);
    }

    public function tripDetailsShow($id)
    {
        $data['tripDetail'] = $this->my_connection->select("select td.*, tt.name as trip_type_name, ct.name as carrying_type_name, dct.name as down_carrying_type_name, tpt.name as trip_package_type_name, dtpt.name as down_trip_package_type_name, pm.method_name as payment_method_name, t.vehicle_id, t.status as trip_status, v.vehicle_no, c.customer_name from trip_details td left join master_settings tt on tt.id = td.trip_type left join master_settings ct on ct.id = td.carrying_type left join master_settings dct on dct.id = td.down_carrying_type left join master_settings tpt on tpt.id =td.trip_package_type left join master_settings dtpt on dtpt.id =td.down_trip_package_type left join payment_method pm on pm.id =td.payment_method left join tbl_trips t on t.id = td.trip_id left join vehicles v on v.id =t.vehicle_id left join customers c on c.id = td.customer_id where td.id=" . $id)[0];

        return view('enduser.dashboard.trip.trip_details_info')->with($data);
    }

    public function updateTripDetailsData(Request $request, $id)
    {
        try {
            $this->my_connection->beginTransaction();
            $tripDetail = $this->tripService->updateTripDetailDataByID($request, $id);
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
}
