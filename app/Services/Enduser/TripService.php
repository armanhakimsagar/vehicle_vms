<?php

namespace App\Services\Enduser;

use App\Models\TblTrip;
use App\Models\TripDetail;
use App\Models\TripExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class TripService
{

    public function trip_datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<a  href='" . url('dashboard/trip_view/' . $id) . "' target='_blank' class='custom-button-class mr-2' onclick='assign_vehicle($id)'><i class='fas fa-edit'></i></a>";
            })
            ->addColumn('collapse', function ($row) {
                $id = $row->id;
                return "<button type='button' id='collapsible_row_" . $id . "' class='custom-button-class mr-2' onclick='collapse_data($id)'><i class='fas fa-plus'></i></button>";
            })
            ->addColumn('trip_profit', function ($row) {
                $trip_profit = $row->trip_amount - $row->total_trip_expenses;
                if ($trip_profit > 0) {
                    return $trip_profit . '<span class="kt-badge  kt-badge--success custom-kt-badge ml-2"></span>';
                } else if ($trip_profit == 0) {
                    return $trip_profit . '<span class="kt-badge  kt-badge--warning custom-kt-badge ml-2"></span>';
                } else if ($trip_profit < 0) {
                    return $trip_profit . '<span class="kt-badge  kt-badge--danger custom-kt-badge ml-2"></span>';
                }
            })
            ->editColumn('id', function ($row) {
                $id = $row->id;
                return 'TRP' . sprintf("%05d", $id);
            })
            ->rawColumns(['action', 'collapse', 'trip_profit'])
            ->make(true);
        return $datalist;
    }

    public function saveTripData(Request $request, $id)
    {
        if ($id > 0) {
            $trip = TblTrip::find($id);
        } else {
            $trip = new TblTrip();
            $trip->trip_date = date('Y-m-d');
            $trip->posted_by = Auth::user()->id;
        }
        $trip->vehicle_id = $request->vehicle_id;
        $trip->status = $request->trip_status;
        $trip->save();
        return $trip;
    }

    public function saveTripDetailData(Request $request, $trip)
    {
        for ($i = 0; $i < count($request->trip_day); $i++) {
            $tripDetail = new TripDetail();
            $tripDetail->trip_id = $trip->id;
            $tripDetail->customer_id = $request->customer[$i] ? $request->customer[$i] : 0;
            $tripDetail->trip_type = $request->trip_type[$i] ? $request->trip_type[$i] : 0;
            $tripDetail->total_duration = $request->total_duration[$i] ? $request->total_duration[$i] : 0;
            $tripDetail->contact_name = $request->contact_person_name[$i];
            $tripDetail->contact_phone = $request->contact_person_phone[$i];
            $tripDetail->pickup_location = $request->pickup_location[$i];
            $tripDetail->drop_location = $request->drop_location[$i];
            $tripDetail->pickup_time = $request->pickup_time[$i];
            $tripDetail->drop_time = $request->drop_time[$i];
            $tripDetail->carrying_type = $request->carrying_type[$i] ? $request->carrying_type[$i] : 0;
            $tripDetail->carrying_description = $request->description[$i];
            $tripDetail->trip_package_type = $request->trip_package_type[$i] ? $request->trip_package_type[$i] : 0;
            $tripDetail->trip_rate = $request->trip_rate[$i] ? $request->trip_rate[$i] : 0;
            $tripDetail->extra_amount = $request->extra_amount[$i] ? $request->extra_amount[$i] : 0;
            $tripDetail->down_contact_name = $request->down_contact_person_name[$i];
            $tripDetail->down_contact_phone = $request->down_contact_person_name[$i];
            $tripDetail->down_pickup_location = $request->down_pickup_location[$i];
            $tripDetail->down_drop_location = $request->down_drop_location[$i];
            $tripDetail->down_pickup_time = $request->down_pickup_time[$i];
            $tripDetail->down_drop_time = $request->down_drop_time[$i];
            $tripDetail->down_carrying_type = $request->down_carrying_type[$i] ? $request->down_carrying_type[$i] : 0;
            $tripDetail->down_carrying_description = $request->down_description[$i];
            $tripDetail->down_trip_package_type = $request->down_trip_package_type[$i] ? $request->down_trip_package_type[$i] : 0;
            $tripDetail->down_trip_rate = $request->down_trip_rate[$i] ? $request->down_trip_rate[$i] : 0;
            $tripDetail->down_extra_amount = $request->down_extra_amount[$i] ? $request->down_extra_amount[$i] : 0;
            $tripDetail->total_amount = $request->total_amount[$i] ? $request->total_amount[$i] : 0;
            $tripDetail->discount_amount = $request->discount_amount[$i] ? $request->discount_amount[$i] : 0;
            $tripDetail->net_total_amount = $request->net_total_amount[$i] ? $request->net_total_amount[$i] : 0;
            $tripDetail->advance_paid = $request->advance_paid[$i] ? $request->advance_paid[$i] : 0;
            $tripDetail->due_amount = $request->due_amount[$i] ? $request->due_amount[$i] : 0;
            $tripDetail->payment_method = $request->payment_method[$i] ? $request->payment_method[$i] : 0;
            $tripDetail->payment_status = $request->payment_status[$i];
            $tripDetail->trip_note = $request->note[$i];
            $tripDetail->save();
        }

        return true;
    }

    public function updateTripDetailData(Request $request, $trip)
    {
        try {
            $oldId = [];
            if ($request->trip_detail_id_list) {
                $oldId = explode(",", $request->trip_detail_id_list);
            }
            $i = 0;
            my_database()->beginTransaction();

            if (count($oldId) > 0) {

                foreach ($oldId as $old) {

                    if (isset($request->trip_detail_id)) {

                        if (in_array($old, $request->trip_detail_id)) {
                            $tripDetail = TripDetail::find($old);
                            $tripDetail->customer_id = $request->customer[$i] ? $request->customer[$i] : 0;
                            $tripDetail->trip_type = $request->trip_type[$i] ? $request->trip_type[$i] : 0;
                            $tripDetail->total_duration = $request->total_duration[$i] ? $request->total_duration[$i] : 0;
                            $tripDetail->contact_name = $request->contact_person_name[$i];
                            $tripDetail->contact_phone = $request->contact_person_phone[$i];
                            $tripDetail->pickup_location = $request->pickup_location[$i];
                            $tripDetail->drop_location = $request->drop_location[$i];
                            $tripDetail->pickup_time = $request->pickup_time[$i];
                            $tripDetail->drop_time = $request->drop_time[$i];
                            $tripDetail->carrying_type = $request->carrying_type[$i] ? $request->carrying_type[$i] : 0;
                            $tripDetail->carrying_description = $request->description[$i];
                            $tripDetail->trip_package_type = $request->trip_package_type[$i] ? $request->trip_package_type[$i] : 0;
                            $tripDetail->trip_rate = $request->trip_rate[$i] ? $request->trip_rate[$i] : 0;
                            $tripDetail->extra_amount = $request->extra_amount[$i] ? $request->extra_amount[$i] : 0;
                            $tripDetail->down_contact_name = $request->down_contact_person_name[$i];
                            $tripDetail->down_contact_phone = $request->down_contact_person_name[$i];
                            $tripDetail->down_pickup_location = $request->down_pickup_location[$i];
                            $tripDetail->down_drop_location = $request->down_drop_location[$i];
                            $tripDetail->down_pickup_time = $request->down_pickup_time[$i];
                            $tripDetail->down_drop_time = $request->down_drop_time[$i];
                            $tripDetail->down_carrying_type = $request->down_carrying_type[$i] ? $request->down_carrying_type[$i] : 0;
                            $tripDetail->down_carrying_description = $request->down_description[$i];
                            $tripDetail->down_trip_package_type = $request->down_trip_package_type[$i] ? $request->down_trip_package_type[$i] : 0;
                            $tripDetail->down_trip_rate = $request->down_trip_rate[$i] ? $request->down_trip_rate[$i] : 0;
                            $tripDetail->down_extra_amount = $request->down_extra_amount[$i] ? $request->down_extra_amount[$i] : 0;
                            $tripDetail->total_amount = $request->total_amount[$i] ? $request->total_amount[$i] : 0;
                            $tripDetail->discount_amount = $request->discount_amount[$i] ? $request->discount_amount[$i] : 0;
                            $tripDetail->net_total_amount = $request->net_total_amount[$i] ? $request->net_total_amount[$i] : 0;
                            $tripDetail->advance_paid = $request->advance_paid[$i] ? $request->advance_paid[$i] : 0;
                            $tripDetail->due_amount = $request->due_amount[$i] ? $request->due_amount[$i] : 0;
                            $tripDetail->payment_method = $request->payment_method[$i] ? $request->payment_method[$i] : 0;
                            $tripDetail->payment_status = $request->payment_status[$i];
                            $tripDetail->trip_note = $request->note[$i];
                            $tripDetail->save();
                            $i++;
                        } else {
                            $tripDetail = TripDetail::find($old);
                            $tripDetail->delete();
                        }
                    } else {
                        $tripDetail = TripDetail::find($old);
                        $tripDetail->delete();
                    }
                }
            }

            if (isset($request->trip_day)) {

                for ($x = $i; $x < count($request->trip_day); $x++) {
                    if ($request->customer[$x]) {
                        $tripDetail = new TripDetail();
                        $tripDetail->trip_id = $trip->id;
                        $tripDetail->customer_id = $request->customer[$x] ? $request->customer[$x] : 0;
                        $tripDetail->trip_type = $request->trip_type[$x] ? $request->trip_type[$x] : 0;
                        $tripDetail->total_duration = $request->total_duration[$x] ? $request->total_duration[$x] : 0;
                        $tripDetail->contact_name = $request->contact_person_name[$x];
                        $tripDetail->contact_phone = $request->contact_person_phone[$x];
                        $tripDetail->pickup_location = $request->pickup_location[$x];
                        $tripDetail->drop_location = $request->drop_location[$x];
                        $tripDetail->pickup_time = $request->pickup_time[$x];
                        $tripDetail->drop_time = $request->drop_time[$x];
                        $tripDetail->carrying_type = $request->carrying_type[$x] ? $request->carrying_type[$x] : 0;
                        $tripDetail->carrying_description = $request->description[$x];
                        $tripDetail->trip_package_type = $request->trip_package_type[$x] ? $request->trip_package_type[$x] : 0;
                        $tripDetail->trip_rate = $request->trip_rate[$x] ? $request->trip_rate[$x] : 0;
                        $tripDetail->extra_amount = $request->extra_amount[$x] ? $request->extra_amount[$x] : 0;
                        $tripDetail->down_contact_name = $request->down_contact_person_name[$x];
                        $tripDetail->down_contact_phone = $request->down_contact_person_name[$x];
                        $tripDetail->down_pickup_location = $request->down_pickup_location[$x];
                        $tripDetail->down_drop_location = $request->down_drop_location[$x];
                        $tripDetail->down_pickup_time = $request->down_pickup_time[$x];
                        $tripDetail->down_drop_time = $request->down_drop_time[$x];
                        $tripDetail->down_carrying_type = $request->down_carrying_type[$x] ? $request->down_carrying_type[$x] : 0;
                        $tripDetail->down_carrying_description = $request->down_description[$x];
                        $tripDetail->down_trip_package_type = $request->down_trip_package_type[$x] ? $request->down_trip_package_type[$x] : 0;
                        $tripDetail->down_trip_rate = $request->down_trip_rate[$x] ? $request->down_trip_rate[$x] : 0;
                        $tripDetail->down_extra_amount = $request->down_extra_amount[$x] ? $request->down_extra_amount[$x] : 0;
                        $tripDetail->total_amount = $request->total_amount[$x] ? $request->total_amount[$x] : 0;
                        $tripDetail->discount_amount = $request->discount_amount[$x] ? $request->discount_amount[$x] : 0;
                        $tripDetail->net_total_amount = $request->net_total_amount[$x] ? $request->net_total_amount[$x] : 0;
                        $tripDetail->advance_paid = $request->advance_paid[$x] ? $request->advance_paid[$x] : 0;
                        $tripDetail->due_amount = $request->due_amount[$x] ? $request->due_amount[$x] : 0;
                        $tripDetail->payment_method = $request->payment_method[$x] ? $request->payment_method[$x] : 0;
                        $tripDetail->payment_status = $request->payment_status[$x];
                        $tripDetail->trip_note = $request->note[$x];
                        $tripDetail->save();
                    }
                }
            }

            my_database()->commit();
            return true;
        } catch (\Exception $e) {
            my_database()->rollBack();
            return false;
        }
    }

    public function updateTripDetailDataByID(Request $request, $id)
    {
        $tripDetail = TripDetail::find($id);
        $tripDetail->customer_id = $request->customer ? $request->customer : 0;
        $tripDetail->trip_type = $request->trip_type ? $request->trip_type : 0;
        $tripDetail->total_duration = $request->total_duration ? $request->total_duration : 0;
        $tripDetail->contact_name = $request->contact_person_name;
        $tripDetail->contact_phone = $request->contact_person_phone;
        $tripDetail->pickup_location = $request->pickup_location;
        $tripDetail->drop_location = $request->drop_location;
        $tripDetail->pickup_time = $request->pickup_time;
        $tripDetail->drop_time = $request->drop_time;
        $tripDetail->carrying_type = $request->carrying_type ? $request->carrying_type : 0;
        $tripDetail->carrying_description = $request->description;
        $tripDetail->trip_package_type = $request->trip_package_type ? $request->trip_package_type : 0;
        $tripDetail->trip_rate = $request->trip_rate ? $request->trip_rate : 0;
        $tripDetail->extra_amount = $request->extra_amount ? $request->extra_amount : 0;
        $tripDetail->down_contact_name = $request->down_contact_person_name;
        $tripDetail->down_contact_phone = $request->down_contact_person_name;
        $tripDetail->down_pickup_location = $request->down_pickup_location;
        $tripDetail->down_drop_location = $request->down_drop_location;
        $tripDetail->down_pickup_time = $request->down_pickup_time;
        $tripDetail->down_drop_time = $request->down_drop_time;
        $tripDetail->down_carrying_type = $request->down_carrying_type ? $request->down_carrying_type : 0;
        $tripDetail->down_carrying_description = $request->down_description;
        $tripDetail->down_trip_package_type = $request->down_trip_package_type ? $request->down_trip_package_type : 0;
        $tripDetail->down_trip_rate = $request->down_trip_rate ? $request->down_trip_rate : 0;
        $tripDetail->down_extra_amount = $request->down_extra_amount ? $request->down_extra_amount : 0;
        $tripDetail->total_amount = $request->total_amount ? $request->total_amount : 0;
        $tripDetail->discount_amount = $request->discount_amount ? $request->discount_amount : 0;
        $tripDetail->net_total_amount = $request->net_total_amount ? $request->net_total_amount : 0;
        $tripDetail->advance_paid = $request->advance_paid ? $request->advance_paid : 0;
        $tripDetail->due_amount = $request->due_amount ? $request->due_amount : 0;
        $tripDetail->payment_method = $request->payment_method ? $request->payment_method : 0;
        $tripDetail->payment_status = $request->payment_status;
        $tripDetail->trip_note = $request->note;
        $tripDetail->save();
        return true;
    }

    public function saveTripExpenseData(Request $request, $trip)
    {
        for ($i = 0; $i < count($request->expense_type); $i++) {

            if ($request->expense_type[$i] && $request->expense_total[$i] > 0) {
                $tripExpense = new TripExpense();
                $tripExpense->trip_id = $trip->id;
                $tripExpense->expense_type = $request->expense_type[$i];
                $tripExpense->description = $request->expense_description[$i];
                $tripExpense->quantity = $request->expense_quantity[$i];
                $tripExpense->cost = $request->expense_cost[$i];
                $tripExpense->total_amount = $request->expense_total[$i];
                $tripExpense->paid_amount = $request->expense_paid[$i];
                $tripExpense->save();
            }
        }

        return true;
    }

    public function updateTripExpenseData(Request $request, $trip)
    {
        try {

            $oldId = [];
            if ($request->trip_expense_id_list) {
                $oldId = explode(",", $request->trip_expense_id_list);
            }
            $i = 0;

            my_database()->beginTransaction();

            if (count($oldId) > 0) {

                foreach ($oldId as $old) {

                    if (isset($request->trip_expense_id)) {
                        if (in_array($old, $request->trip_expense_id)) {
                            $tripExpense = TripExpense::find($old);
                            $tripExpense->expense_type = $request->expense_type[$i];
                            $tripExpense->description = $request->expense_description[$i];
                            $tripExpense->quantity = $request->expense_quantity[$i];
                            $tripExpense->cost = $request->expense_cost[$i];
                            $tripExpense->total_amount = $request->expense_total[$i];
                            $tripExpense->paid_amount = $request->expense_paid[$i];
                            $tripExpense->save();
                            $i++;
                        } else {
                            $tripExpense = TripExpense::find($old);
                            $tripExpense->delete();
                        }
                    } else {
                        $tripExpense = TripExpense::find($old);
                        $tripExpense->delete();
                    }
                }
            }

            if (isset($request->expense_type)) {

                for ($x = $i; $x < count($request->expense_type); $x++) {
                    if ($request->expense_type[$x] && $request->expense_total[$x] > 0) {
                        $tripExpense = new TripExpense();
                        $tripExpense->trip_id = $trip->id;
                        $tripExpense->expense_type = $request->expense_type[$x];
                        $tripExpense->description = $request->expense_description[$x];
                        $tripExpense->quantity = $request->expense_quantity[$x];
                        $tripExpense->cost = $request->expense_cost[$x];
                        $tripExpense->total_amount = $request->expense_total[$x];
                        $tripExpense->paid_amount = $request->expense_paid[$x];
                        $tripExpense->save();
                    }
                }
            }

            my_database()->commit();
            return true;
        } catch (\Exception $e) {
            my_database()->rollBack();
            return false;
        }
    }
}
