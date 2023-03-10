<?php

namespace App\Services\Enduser;

use App\Models\Driver;
use File;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class VehicleService
{
    public $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function datatable($query)
    {
        $datalist = Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('checkBox', function ($row) {
                $id = $row->id;
                $checkBox = '';
                if (isset($row->already_assigned)) {
                    if ($row->already_assigned == 1) {
                        $checkBox = '<input type="checkbox" class="selected_vehicle" checked value="' . $id . '">';
                    } else {
                        $checkBox = '<input type="checkbox" class="selected_vehicle" value="' . $id . '">';
                    }
                }
                return $checkBox;
            })
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>
";
            })
            ->editColumn('vehicle_photo', function ($row) {
                if ($row->vehicle_photo) {
                    return $img = "<img  style='width:60px; height:auto;' src='" . url('public/uploads/vehicle/' . $row->vehicle_photo) . "' alt='Image'/>";
                } else {
                    return $img = "<img  style='width:60px; height:auto;' src='" . url('public/assets/media/cars/private.jpg') . "' alt='Image'/>";
                }
            })
            ->editColumn('vehicle_no', function ($row) {
                $color = [' kt-badge--warning', ' kt-badge--success'];
                return $vehicleNo = $row->vehicle_no . "<span class='kt-badge " . $color[$row->status] . " custom-kt-badge ml-2'" . "</span>";
            })
            ->editColumn('vehicle_type', function ($row) {
                return $vehicleNo = $row->vt_name;
            })
            // ->editColumn('staff_name', function ($row) {
            //     $status_s = ($row->vs_status == 1) ? "Active" : "Inactive";
            //     $s_color = ($row->vs_status == 1) ? "success" : "danger";
            //     if ($row->vehicle_staff_id) {
            //         return $staff = $row->staff_name . ' - ' . '<span class="ml-2 badge badge-pill badge-' . $s_color . '">' . $status_s . '</span>' . ' - ' . $row->vs_phone;
            //     } else {
            //         return "-";
            //     }
            // })
            ->rawColumns(['vehicle_photo', 'vehicle_no', 'vehicle_type', 'object_id', 'staff_data', 'checkBox', 'action'])
            ->make(true);
        return $datalist;
    }

    public function storeValidate(Request $request)
    {
        $validationRule = [
            'vehicle_name' => 'required',
            'vehicle_plate_no' => 'required|unique:vehicles,vehicle_no',
            'vehicle_type' => 'required',
            'vehicle_engine_no' => 'required|unique:vehicles,vehicle_engine_no',
            'vehicle_year' => 'required',
            'vehicle_ownership' => 'required',
            'status' => 'required',
        ];
        $vehichePhoto = $request->file('vehicle_photo');
        if ($vehichePhoto) {
            $validationRule['vehicle_photo'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }
        $validator = Validator::make($request->all(), $validationRule);

        return $validator;
    }

    public function updateValidate(Request $request, $id)
    {
        $validationRule = [
            'vehicle_name' => 'required',
            'vehicle_plate_no' => ['required', Rule::unique('vehicles', 'vehicle_no')->ignore($id)],
            'vehicle_engine_no' => ['required', Rule::unique('vehicles', 'vehicle_engine_no')->ignore($id)],
            'vehicle_year' => 'required',
        ];
        $vehichePhoto = $request->file('vehicle_photo');
        if ($vehichePhoto) {
            $validationRule['vehicle_photo'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $validator = Validator::make($request->all(), $validationRule);

        return $validator;
    }
    public function storeData(Request $request, $id)
    {
        if ($id > 0) {
            $vehicle = Vehicle::find($id);
            $oldImg = $vehicle->vehicle_photo;
        } else {
            $vehicle = new Vehicle();
            $vehicle->customer_id = Auth::user()->id;
        }
        $image = $request->file('vehicle_photo');
        if ($image) {
            $imgName = date("Ymd_His");
            $ext = strtolower($image->getClientOriginalExtension());
            $fullName = $imgName . '.' . $ext;
            $uploadPath = 'public/uploads/vehicle/';
            $uploadTo = $image->move($uploadPath, $fullName);
            $vehicle->vehicle_photo = $fullName;
            if ($id > 0) {
                $image_path = $uploadPath . $oldImg;
                if (File::exists($image_path) && $oldImg != null) {
                    File::delete($image_path);
                }
            }
            // dd($request->all());
        }
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_no = $request->vehicle_plate_no;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->model_name = $request->model_name;
        $vehicle->vehicle_color = $request->vehicle_color;
        $vehicle->vehicle_year = $request->vehicle_year;
        $vehicle->vehicle_engine_no = $request->vehicle_engine_no;
        $vehicle->vehicle_ownership = $request->vehicle_ownership;
        $vehicle->vehicle_group_id = $request->vehicle_group;
        $vehicle->avarage_mileage = $request->avarage_mileage;
        // $vehicle->object_id = $request->assign_gps;
        // $vehicle->driver_pid = $request->driver_pid;
        $vehicle->status = $request->status;
        //  dd($vehicle);
        $save = $vehicle->save();
        return $save;
    }

    public function vehicle_information($id)
    {
        $findVehicle = my_database()->select("select v.*, vg.name as vg_name, vt.name as vt_name, ms.name as ownership_name, vs.staff_name, vs.phone as vs_phone, vs.status as vs_status,  gs.imei, gs.device_name, gs.unit_status, cd.name as imei_status, cd.other_value from vehicles v left join vehicle_groups vg on vg.id = v.vehicle_group_id left join vehicle_types vt on vt.id = v.vehicle_type left join master_settings ms on ms.id = v.vehicle_ownership left join vehicle_staff vs on vs.id = v.vehicle_staff_id left join gs_objects gs on gs.id = v.object_id left join combo_data cd on cd.id = gs.unit_status where v.id =" . $id);

        $data['vehicle'] = $findVehicle[0];

        $data['vehicleType'] = VehicleType::all();

        $data['vehicleGroup'] = VehicleGroup::all();

        $data['ownershipType'] = my_database()->select("select ms.id, ms.name from master_settings ms where type=2");

        $data['gs_objects'] = my_database()->select("select gs.id as gs_id, gs.imei, gs.device_name, gs.unit_status, cd.name as cd_name from gs_objects gs left join combo_data cd on cd.id = gs.unit_status where gs.customer_id =" . Auth::user()->id);

        return $data;
    }

    public function vehicle_wise_datatable($type, $id)
    {
        $data = '';

        return $data;
    }
}
