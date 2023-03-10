<?php

namespace App\Services\Enduser;

use Carbon\Carbon;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;

class VendorService
{
    public $vendor;

    /**
     * DoctorController constructor.
     * @param $doctor
     * @param $doctorService
     */
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function datatable($data)
    {
        $datalist = Datatables::of($data)
            ->addColumn('checkVendor', function ($row) {
                $vendor_id = $row->id;
                return $row->id;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>";
            })
            ->editColumn('vendor_name', function ($row) {

                if ($row->global_status == 0) {
                    $vendor = $row->vendor_name . '<span class=" ml-2 badge badge-pill badge-warning">Inactive</span>';
                } else if ($row->global_status == 1) {
                    $vendor = $row->vendor_name . '<span class=" ml-2 badge badge-pill badge-success">Active</span>';
                } else if ($row->global_status == 2) {
                    $vendor = $row->vendor_name . '<span class=" ml-2 badge badge-pill badge-info"> Overdue</span>';
                } else if ($row->global_status == 3) {
                    $vendor = $row->vendor_name . '<span class=" ml-2 badge badge-pill badge-info color-purple"> On Hold</span>';
                } else if ($row->global_status == 4) {
                    $vendor = $row->vendor_name . '<span class=" ml-2 badge badge-pill badge-danger">Stop</span>';
                }

                $mystatus = "";
                if ($row->active == 1) {
                    $mystatus = '<span class=" ml-2 kt-badge kt-badge--success custom-kt-badge"> &nbsp; </span>';
                } else {
                    $mystatus = '<span class=" ml-2 kt-badge kt-badge--danger custom-kt-badge"> &nbsp; </span>';
                }
                return $mystatus . ' ' . $vendor;
            })
            ->rawColumns(['vendor_name', 'action'])
            ->make(true);

        return $datalist;
    }

    public function storeValidate(Request $request, $id)
    {
        $validationRule = [
            'vendor_type' => 'required',
            'vendor_name' => 'required',
            'company_name' => 'required',
            'nid_no' => 'required|numeric',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'sms_phone' => 'required|digits:11',
            'contact_one' => 'required|digits:11',
            'company_email' => 'required|email',
            'ac_opening_date' => 'required',
            'global_status' => 'required',
        ];

        $validate = Validator::make($request->all(), $validationRule);

        return $validate;
    }

    public function storeData(Request $request, $id)
    {
        $spouse_name = ($request->spouse_name != '') ? $request->spouse_name : 'NA';
        $spouse_phone = ($request->spouse_phone != '') ? $request->spouse_phone : 'NA';
        $present_address = ($request->present_address != '') ? $request->present_address : 'NA';
        $permanent_address = ($request->permanent_address != '') ? $request->permanent_address : 'NA';
        $passport_no = ($request->passport_no != '') ? $request->passport_no : 'NA';
        $accounts_note = ($request->accounts_note != '') ? $request->accounts_note : 'NA';
        $distributor = ($request->distributor != '') ? $request->distributor : 0;
        $employee = ($request->employee != '') ? $request->employee : 1;
        $ac_opening_date = ($request->ac_opening_date != '') ? Carbon::parse($request->ac_opening_date)->format('Y-m-d H:i:s') : gmdate('Y-m-d H:i:s', strtotime(' +6 hour'));

        if ($id > 0) {
            $vendor = Vendor::find($id);
        } else {
            $vendor = new Vendor();
        }

        $vendor->vendor_group_id = $request->vendor_group;
        $vendor->vendor_type = $request->vendor_type;
        $vendor->vendor_id = $request->vendor_id;
        $vendor->distributor_id = $distributor;
        $vendor->employee_id = $employee;
        $vendor->vendor_name = $request->vendor_name;
        $vendor->name = $request->company_name;
        $vendor->father_name = $request->father_name;
        $vendor->mother_name = $request->mother_name;
        $vendor->date_of_birth =  Carbon::parse($request->date_of_birth)->format('Y-m-d H:i:s');
        $vendor->spouse_name = $spouse_name;
        $vendor->spouse_phone = $spouse_phone;
        $vendor->occupation = $request->occupation;
        $vendor->division = $request->division;
        $vendor->district = $request->district;
        $vendor->thana = $request->thana;
        $vendor->nid_no = $request->nid_no;
        $vendor->passport_no = $passport_no;
        $vendor->gender = $request->gender;
        $vendor->present_address = $present_address;
        $vendor->permanent_address = $permanent_address;
        $vendor->billing_address = $request->billing_address;
        $vendor->phone = $request->sms_phone;
        $vendor->mobile = $request->emergency_phone;
        $vendor->contact_1 = $request->contact_one;
        $vendor->contact_2 = $request->contact_two;
        $vendor->email = $request->company_email;
        $vendor->address = $request->company_address;
        // $vendor->fax = $request->company_fax;
        // $vendor->city = $request->company_city;
        // $vendor->country = $request->company_country;
        // $vendor->zipcode = '';
        // $vendor->language = $request->language;
        // $vendor->currency = $request->currency;
        $vendor->vat = $request->company_vat;
        $vendor->latitude = $request->latitude;
        $vendor->longitude = $request->longitude;
        $vendor->short_note = $request->short_note;
        // $vendor->website = $request->company_website;      
        // $vendor->skype_id = $request->skype_id;
        // $vendor->linkedin = $request->linkedin_url;
        // $vendor->facebook = $request->facebook_url;
        // $vendor->twitter = $request->twitter_url;
        // $vendor->hosting_company = $request->platform_username; 
        // if($request->platform_password){
        //     $vendor->hostname = Hash::make($request->platform_password);
        // }
        // $vendor->username = $request->system_username;
        // if($request->system_password){
        //     $vendor->password = Hash::make($request->system_password);
        // }
        // $vendor->port = $request->port;
        // $vendor->package_type = $request->package_type;
        // $vendor->vendor_due_limit = $request->vendor_due_limit;
        // $vendor->collection_dealer = 0;
        // $vendor->collection_method = $request->collection_method;
        // $vendor->billing_date = $billing_date;
        $vendor->ac_opening_date = $ac_opening_date;
        $vendor->reporter = $request->reporter;
        $vendor->follower = $request->follower;
        $vendor->accounts_note = $accounts_note;
        $vendor->global_status = $request->global_status;
        $vendor->actor_type = $request->role;
        $vendor->active = 1;
        $vendor->vendor_status = 1;
        // $vendor->profile_photo = '';
        $vendor->leads_id = 0;
        $vendor->primary_contact = '0';
        $vendor->parent_id = 0;
        $vendor->retailer_id = 0;
        $vendor->apps_token = 0;
        $save = $vendor->save();

        if($id==0){
            $vendor_id = "VND".sprintf("%06d",$vendor->id);
            $vendor = Vendor::find($vendor->id);
            $vendor->vendor_id = $vendor_id;
            $vendor->save();
        }
        createCOA([
            'title' => $vendor->vendor_name,
            'code_no' => 'VND'.sprintf("%06d",$vendor->id),
            'parent_id' => 8,
            'account_type' => 'E',
            'transactional' => 1,
            'status' => 1,
            'description' => 'Vendor related transaction'
        ]);
        return $save;
    }
}
