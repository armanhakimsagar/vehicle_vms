<?php

namespace App\Http\Controllers\Enduser;

use App\Models\Vehicle;
use App\Models\VehicleGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class VehicleGroupController extends Controller
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
    public function index()
    {
        // $data =  VehicleGroup::orderBy('id', 'desc')->get();
        $data = $this->my_connection->select("select vg.*, (select count(id) from vehicles where vehicle_group_id = vg.id) as total_assign_vehicle from vehicle_groups vg order by vg.id desc");
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<a  href='" . url('dashboard/d/vehicle?type=group&id=' . $id) . "' target='_blank' title='View' class='view_data custom-button-class mr-2' data-id='$id'><i class='fas fa-eye'></i></a>
            <button type='button' class='custom-button-class mr-2' title='Edit' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>
            <button type='button' class='custom-button-class mr-2' title='Assign Vehicles' onclick='assign_vehicle($id)'><i class='fas fa-list-ul'></i></button>";
            })

            ->rawColumns(['action'])
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
            if ($id > 0) {
                $validator = Validator::make($request->all(), [
                    'name' => ['required', Rule::unique('vehicle_groups', 'name')->ignore($id)],
                ]);

                $vehicle_group = VehicleGroup::find($id);
            } else {

                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:vehicle_groups,name',
                ]);

                $vehicle_group = new VehicleGroup();
                $vehicle_group->customer_id = Auth::user()->id;
            }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $vehicle_group->name = $request->name;
            $vehicle_group->save();

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle_group = VehicleGroup::find($id);

        return $vehicle_group;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignGroup($id)
    {
        $data['vehicleGroup'] = VehicleGroup::find($id);
        $data['vehicleGroups'] = generate_dropdown('html', true, 'vehicle_groups', 'name', 'vehicles', 'vehicle_group_id', 'vehicle_name', 'vehicle_no');
        // $data['vehicles'] = Vehicle::orderBy('vehicle_name', 'asc')->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAssignGroup(Request $request, $id)
    {
        try {
            //  dd( $request->selected_vehicles);
            $validator = Validator::make($request->all(), [
                'choose_vehicle' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();
            $this->my_connection->update("update vehicles set vehicle_group_id=" . $id . " where id in(" . $request->choose_vehicle . ")");
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
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
