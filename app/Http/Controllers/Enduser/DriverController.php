<?php

namespace App\Http\Controllers\Enduser;

use App\Models\Driver;
use App\Models\Vehicle;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class DriverController extends Controller
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

        $data = $this->my_connection->select("select d.*, v.vehicle_no, v.status as v_status from drivers d left join vehicles v on v.id = d.assigned_vehicle where d.customer_id =" . Auth::user()->id . " order by d.id desc");
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

            <div class='dropdown custom-dreopdown' style='display:inline-block'>
                <button class='custom-button-class mr-2' data-toggle='dropdown'><i class='fas fa-cog'></i></button>
                <ul class='dropdown-menu custom-dreopdown-menu'>
                    <li><a class='custom-dreopdown-item' id=$id data-toggle='modal' href='#userModal' onClick='reset_password($id)'>Rest password</a></li>
                    <li><a class='custom-dreopdown-item' id=$id href='javascript:;' onClick='permission($id)'>Permission</a></li>
                </ul>
            </div>";
            })
            ->editColumn('driver_image', function ($row) {
                if ($row->driver_image) {
                    return $img = "<img  style='width:48px; height:48px; border-radius:50%' src='" . url('public/uploads/driver/' . $row->driver_image) . "' alt='Image'/>";
                } else {
                    return $img = "<img  style='width:48px; height:48px; border-radius:50%' src='" . url('assets/media/users/default.jpg') . "' alt='Image'/>";
                }

            })
            ->editColumn('vehicle_no', function ($row) {
                $vehicle_s = ($row->v_status == 1) ? "Active" : "Inactive";
                $s_color = ($row->v_status == 1) ? "success" : "danger";
                if ($row->vehicle_no) {
                    return $vehicle = $row->vehicle_no . ' - ' . '<span class="ml-2 badge badge-pill badge-' . $s_color . '">' . $vehicle_s . '</span>';
                } else {
                    return "NA";
                }

            })
            ->rawColumns(['driver_image', 'vehicle_no', 'action'])
            ->make(true);
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

        $customer_id = auth()->user()->id;

        $rasult = $this->my_connection->select("SELECT count(*) as total_d, (SELECT count(*) from drivers where customer_id = " . $customer_id . " and assigned_vehicle > 0 ) as assigned_d, (SELECT count(*) from drivers where customer_id =" . $customer_id . " and assigned_vehicle = 0 ) as unassigned_d FROM drivers where customer_id = " . $customer_id);

        $data['total_d'] = $rasult[0]->total_d;
        $data['assigned_d'] = $rasult[0]->assigned_d;
        $data['unassigned_d'] = $rasult[0]->unassigned_d;

        return $data;
    }
    public function saveData(Request $request, $d_id)
    {

        try {
            if ($d_id > 0) {
                $validator = Validator::make($request->all(), [
                    'driver_id' => 'required',
                    'driver_name' => 'required',
                    'father_name' => 'required',
                    'mother_name' => 'required',
                    'phone' => ['required', 'numeric', Rule::unique('drivers')->ignore($d_id)],
                    'date_of_birth' => 'required',
                    'present_address' => 'required',
                    'permanent_address' => 'required',
                    'driving_licence' => 'required',
                ]);
                $driver = Driver::find($d_id);
                $oldImg = $driver->driver_image;
            } else {

                $validator = Validator::make($request->all(), [
                    'driver_id' => 'required',
                    'driver_name' => 'required',
                    'father_name' => 'required',
                    'mother_name' => 'required',
                    'phone' => 'required|numeric|unique:drivers,phone',
                    'date_of_birth' => 'required',
                    'present_address' => 'required',
                    'permanent_address' => 'required',
                    'driving_licence' => 'required',
                ]);
                // $customer_id = Auth::user()->id;
                $driver = new Driver();

            }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();

            $image = $request->file('image');
            if ($image) {
                $imgName = date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/driver/';
                $uploadTo = $image->move($uploadPath, $fullName);
                $driver->driver_image = $fullName;
                if ($d_id > 0) {
                    $image_path = $uploadPath . $oldImg;
                    if (File::exists($image_path) && $oldImg != null) {
                        File::delete($image_path);
                    }
                }
                // dd($request->all());
            }

            $driver->customer_id = Auth::user()->id;
            $driver->driver_id = $request->driver_id;
            $driver->driver_name = $request->driver_name;
            $driver->father_name = $request->father_name;
            $driver->mother_name = $request->mother_name;
            $driver->phone = $request->phone;
            $driver->contact_one = $request->contact_one;
            $driver->contact_two = $request->contact_two;
            $driver->email = $request->email;
            $driver->date_of_birth = $request->date_of_birth;
            $driver->nid_no = $request->nid_no;
            $driver->present_address = $request->present_address;
            $driver->permanent_address = $request->permanent_address;
            $driver->driving_licence = $request->driving_licence;
            $driver->work_experience = $request->work_experience;
            $driver->previous_organisation = $request->previous_organisation;
            $driver->assigned_vehicle = $request->assigned_vehicle;
            $driver->assigned_date = $request->assigned_date;
            $driver->status = $request->status;
            // dd($request->all());

            $driver->save();

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
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
        // $driver = Driver::find($id);
        $findDriver = $this->my_connection->select("select d.*, v.vehicle_no, v.status as v_status from drivers d left join vehicles v on v.id = d.assigned_vehicle where d.id =" . $id);
        $driver = $findDriver[0];
        $vehicles = Vehicle::where('customer_id', Auth::user()->id)->get();

        return view('enduser.vms.driver_view', compact('driver', 'vehicles'));
    }

    public function driverInfo($id)
    {
        $findDriver = $this->my_connection->select("select v.driver_pid, d.* from vehicles v left join drivers d on d.id = v.driver_pid where v.object_id =".$id);
        if($findDriver!=null){
            $driver = $findDriver[0];
            return response()->json($driver);
        }else{
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
