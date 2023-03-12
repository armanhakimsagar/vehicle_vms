<?php

namespace App\Http\Controllers\Enduser;

use File;
use App\Models\VehicleStaff;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Services\Enduser\VehicleStaffService;

class VehicleStaffController extends Controller
{
    private $my_connection;
    private $vehicleStaffService;

    public function __construct(VehicleStaffService $vehicleStaffService)
    {
        $this->vehicleStaffService = $vehicleStaffService;
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


 
        $query = $this->my_connection->select("select vs.*, v.vehicle_no, v.status as v_status, ms.name as staff_type_name from vehicle_staff vs left join vehicles v on v.id = vs.assigned_vehicle left join master_settings ms on ms.id=vs.staff_type order by vs.id desc");
        if (count($query) > 0) {
            foreach ($query as $q) {
                $assiged_to_vehicle = '';
                $vehicles = $this->my_connection->select("select v.vehicle_no, v.status from vehicles v where find_in_set($q->id, vehicle_staff_id) order by v.vehicle_no asc");
                if (count($vehicles) > 0) {
                    $i = 1;
                    foreach ($vehicles as $v) {
                        $vehicle_s = $v->status == 1 ? "Active" : "Inactive";
                        $s_color = $v->status == 1 ? "success" : "danger";
                        $assiged_to_vehicle .= $i . '. ' . $v->vehicle_no . ' -' . '<span class="ml-2 mb-1 badge badge-pill badge-' . $s_color . '">' . $vehicle_s . '</span><br>';
                        $i++;
                    }
                }

                $q->assiged_to_vehicle = $assiged_to_vehicle;
            }
        }

        $datatable = $this->vehicleStaffService->datatable($query);
        return $datatable;
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
    public function at_a_glance()
    {

        $rasult = $this->my_connection->select("SELECT count(*) as total_staff, (SELECT count(*) from vehicle_staff where staff_type =1 ) as total_supervisor, (SELECT count(*) from vehicle_staff where staff_type =2 ) as total_driver, (SELECT count(*) from vehicle_staff where staff_type =3 ) as total_contractor FROM vehicle_staff");

        $data['total_staff'] = $rasult[0]->total_staff;
        $data['total_supervisor'] = $rasult[0]->total_supervisor;
        $data['total_driver'] = $rasult[0]->total_driver;
        $data['total_contractor'] = $rasult[0]->total_contractor;

        return $data;
    }

    // public function saveData(Request $request, $id)
    // {
    //         $validator = $this->vehicleStaffService->storeValidate($request, $id);
    //         if ($validator->fails()) {
    //             return $this->respondInvalidRequest($validator->errors());
    //         }
    //         $save = $this->vehicleStaffService->storeData($request, $id);
    //         return true;
    // }


    public function saveData(Request $request, $id)
    {

        $validator = $this->vehicleStaffService->storeValidate($request, $id);
        if ($validator->fails()) {
            return $this->respondInvalidRequest($validator->errors());
        }

          

            if($id>0){
                $vehicle_staff = VehicleStaff::find($id);


                $photo = $request->file('photo');
                $oldImg = $vehicle_staff->staff_image;
                if ($photo) {
                    $imgName = date("Ymd_His");
                    $ext = strtolower($photo->getClientOriginalExtension());
                    $fullName = $imgName . '.' . $ext;
                    $uploadPath = 'public/uploads/driver/';
                    $uploadTo = $photo->move($uploadPath, $fullName);
                    $vehicle_staff->staff_image = $fullName;
                    if ($id > 0) {
                        $image_path = $uploadPath . $oldImg;
                        if (File::exists($image_path) && $oldImg != null) {
                            File::delete($image_path);
                        }
                    }
                }



            }else{
                $vehicle_staff = new VehicleStaff;
                $photo = $request->file('photo');
                if ($photo) {
                    $imgName = date("Ymd_His");
                    $ext = strtolower($photo->getClientOriginalExtension());
                    $fullName = $imgName . '.' . $ext;
                    $uploadPath = 'public/uploads/driver/';
                    $uploadTo = $photo->move($uploadPath, $fullName);
                    $vehicle_staff->staff_image = $fullName;
                }
            }

       
            $vehicle_staff->customer_id = auth()->user()->id;
            $vehicle_staff->staff_id = $request->staff_id;
            $vehicle_staff->staff_name = $request->staff_name;
            $vehicle_staff->staff_type = $request->staff_type?:0;
            $vehicle_staff->father_name = $request->father_name;
            $vehicle_staff->mother_name = $request->mother_name;
            $vehicle_staff->phone = $request->phone;
            $vehicle_staff->contact_one = $request->contact_one;
            $vehicle_staff->contact_two = $request->contact_two;
            $vehicle_staff->email = $request->email;
            $vehicle_staff->date_of_birth = $request->date_of_birth;
            $vehicle_staff->nid_no = $request->nid_no;
            $vehicle_staff->present_address = $request->present_address;
            $vehicle_staff->permanent_address = $request->permanent_address;
            $vehicle_staff->staff_type = $request->staff_type;
            $vehicle_staff->driving_licence = $request->driving_licence;
            $vehicle_staff->work_experience = $request->work_experience;
            $vehicle_staff->previous_organisation = $request->previous_organisation;
            $vehicle_staff->assigned_vehicle = $request->assigned_vehicle;
            $vehicle_staff->assigned_date = $request->assigned_date;
            $vehicle_staff->status = $request->status;
            $vehicle_staff->save();
            return true;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $vehicle_staff = VehicleStaff::find($id);
        $findVehicleStaff = $this->my_connection->select("select vs.*, v.vehicle_no, v.status as v_status from vehicle_staff vs left join vehicles v on v.id = vs.assigned_vehicle where vs.id =" . $id);
        $data['vehicle_staff'] = $findVehicleStaff[0];
        $data['vehicles'] = Vehicle::all();

        return view('enduser.dashboard.vehicle_staff_view')->with($data);
    }

    public function VehicleStaffInfo($id)
    {
  

        $findVehicleStaff = $this->my_connection->select("select v.vehicle_staff_pid, vs.* from vehicles v left join vehicle_staff d on vs.id = v.vehicle_staff_pid where v.object_id =" . $id);
        if ($findVehicleStaff != null) {
            $vehicle_staff = $findVehicleStaff[0];
            return response()->json($vehicle_staff);
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
        //
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
