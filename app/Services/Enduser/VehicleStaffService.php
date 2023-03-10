<?php

namespace App\Services\Enduser;

use File;
use App\Models\VehicleStaff;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class VehicleStaffService
{

    public function __construct()
    {
        //
    }

    public function datatable($query)
    {
        $datalist = Datatables::of($query)
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
            ->editColumn('staff_image', function ($row) {
                if ($row->staff_image) {
                    return $img = "<img  style='width:48px; height:48px; border-radius:50%' src='" . url('public/uploads/driver/' . $row->staff_image) . "' alt='Image'/>";
                } else {
                    return $img = "<img  style='width:48px; height:48px; border-radius:50%' src='" . url('assets/media/users/default.jpg') . "' alt='Image'/>";
                }
            })
            ->editColumn('staff_name', function ($row) {
                $status = ($row->status == 1) ? "Active" : "Inactive";
                $color = ($row->status == 1) ? "success" : "danger";

                $staff = $row->staff_name . ' -' . '<span class="ml-2 badge badge-pill badge-' . $color . '">' . $status . '</span>';
                return $staff;
            })

            ->rawColumns(['staff_image', 'staff_name', 'assiged_to_vehicle', 'action'])
            ->make(true);

        return $datalist;
    }

    public function storeValidate(Request $request, $id)
    {
        $validationRule = [
            'staff_id' => 'required|unique:vehicle_staff,staff_id',
            'staff_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required',
            'nid_no' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
        ];

        if ($id > 0) {
            $validationRule['staff_id'] = ['required', Rule::unique('vehicle_staff', 'staff_id')->ignore($id)];
        }
        if ($request->staff_type == 2) {
            $validationRule['driving_licence'] = 'required';
        }
        $validator = Validator::make($request->all(), $validationRule);

        return $validator;
    }

    public function storeData(Request $request, $id)
    {
        try {

            if ($id > 0) {
                $vehicle_staff = VehicleStaff::find($id);
                $oldImg = $vehicle_staff->staff_image;
            } else {
                $vehicle_staff = new VehicleStaff();
                $vehicle_staff->customer_id = Auth::user()->id;
            }
            $photo = $request->file('photo');
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
            $vehicle_staff->staff_id = $request->staff_id;
            $vehicle_staff->staff_name = $request->staff_name;
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
            createCOA([
                'title' => $vehicle_staff->staff_name,
                'code_no' => 'STF' . sprintf("%06d", $vehicle_staff->id),
                'parent_id' => 9,
                'account_type' => 'E',
                'transactional' => 1,
                'status' => 1,
                'description' => 'Staff/Payroll related transaction'
            ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
