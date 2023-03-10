<?php

namespace App\Services\Common;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\District;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public $customer;

    /**
     * DoctorController constructor.
     * @param $doctor
     * @param $doctorService
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function storeValidate(Request $request, $id, $user_id)
    {
        $validationRule = [
            'customer_name' => 'required',
            'company_name' => 'required',
            'date_of_birth' => 'required',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'platform_username' => 'required|unique:customers,hosting_company',
            'platform_password' => 'required',
            'system_username' => 'required|unique:users,username',
            'system_password' => 'required',
            'sms_phone' => 'required|digits:11|unique:customers,phone',
            'global_status' => 'required',
        ];

        if ($id > 0) {
            $validationRule['platform_username'] = ['required', 'min:4', Rule::unique('customers', 'hosting_company')->ignore($id)];
            $validationRule['system_username'] = ['required', 'min:4', Rule::unique('users', 'username')->ignore($user_id)];
            $validationRule['sms_phone'] = ['required', 'digits:11', Rule::unique('customers', 'phone')->ignore($id)];
            unset($validationRule['platform_password'], $validationRule['system_password']);
            // unset($validationRule['system_password']);
        }

        $validate = Validator::make($request->all(), $validationRule);

        return $validate;
    }

    public function storeData(Request $request, $id, $customer)
    {
        $spouse_name = ($request->spouse_name != '') ? $request->spouse_name : 'NA';
        $spouse_phone = ($request->spouse_phone != '') ? $request->spouse_phone : 'NA';
        $present_address = ($request->present_address != '') ? $request->present_address : 'NA';
        $permanent_address = ($request->permanent_address != '') ? $request->permanent_address : 'NA';
        $passport_no = ($request->passport_no != '') ? $request->passport_no : 'NA';
        $billing_date = ($request->billing_date != '' || $request->billing_date != 'NA') ? Carbon::parse($request->billing_date)->format('Y-m-d H:i:s') : 'NA';
        $accounts_note = ($request->accounts_note != '') ? $request->accounts_note : 'NA';
        $distributor = ($request->distributor != '') ? $request->distributor : 0;
        $employee = ($request->employee != '') ? $request->employee : 1;
        $ac_opening_date = ($request->ac_opening_date != '') ? Carbon::parse($request->ac_opening_date)->format('Y-m-d H:i:s') : gmdate('Y-m-d H:i:s', strtotime(' +6 hour'));
        $active = ($request->crm_status == 'on') ? 1 : 0;

        // if ($id > 0) {
        //     $customer = Customer::find($id);
        // } else {
        //     $customer = new Customer();
        // }

        $customer->user_id = $request->user_id;
        $customer->customer_group_id = $request->customer_group;
        $customer->distributor_id = $distributor;
        $customer->employee_id = $employee;
        $customer->customer_name = $request->customer_name;
        $customer->name = $request->company_name;
        $customer->father_name = $request->father_name;
        $customer->mother_name = $request->mother_name;
        $customer->date_of_birth =  Carbon::parse($request->date_of_birth)->format('Y-m-d H:i:s');
        $customer->spouse_name = $spouse_name;
        $customer->spouse_phone = $spouse_phone;
        $customer->occupation = $request->occupation;
        $customer->division = $request->division;
        $customer->district = $request->district;
        $customer->thana = $request->thana;
        $customer->nid_no = $request->nid_no;
        $customer->passport_no = $passport_no;
        $customer->gender = $request->gender;
        $customer->present_address = $present_address;
        $customer->permanent_address = $permanent_address;
        $customer->billing_address = $request->billing_address;
        $customer->phone = $request->sms_phone;
        $customer->mobile = $request->emergency_phone;
        $customer->contact_1 = $request->contact_one;
        $customer->contact_2 = $request->contact_two;
        $customer->email = $request->company_email;
        $customer->address = $request->company_address;
        // $customer->fax = $request->company_fax;
        // $customer->city = $request->company_city;
        // $customer->country = $request->company_country;
        // $customer->zipcode = '';
        // $customer->language = $request->language;
        // $customer->currency = $request->currency;
        $customer->vat = $request->company_vat;
        $customer->latitude = $request->latitude;
        $customer->longitude = $request->longitude;
        $customer->short_note = $request->short_note;
        // $customer->website = $request->company_website;      
        // $customer->skype_id = $request->skype_id;
        // $customer->linkedin = $request->linkedin_url;
        // $customer->facebook = $request->facebook_url;
        // $customer->twitter = $request->twitter_url;
        $customer->hosting_company = $request->platform_username;
        if ($request->platform_password) {
            $customer->hostname = Hash::make($request->platform_password);
        }
        $customer->username = $request->system_username;
        if ($request->system_password) {
            $customer->password = Hash::make($request->system_password);
        }
        // $customer->port = $request->port;
        // $customer->package_type = $request->package_type;
        $customer->customer_due_limit = $request->customer_due_limit;
        $customer->collection_dealer = 0;
        $customer->collection_method = $request->collection_method;
        $customer->billing_date = $billing_date;
        $customer->ac_opening_date = $ac_opening_date;
        $customer->reporter = $request->reporter;
        $customer->follower = $request->follower;
        $customer->accounts_note = $accounts_note;
        $customer->global_status = $request->global_status;
        $customer->actor_type = $request->role;
        $customer->active = $active;
        $customer->client_status = 1;
        // $customer->profile_photo = '';
        $customer->leads_id = 0;
        $customer->primary_contact = '0';
        $customer->parent_id = 0;
        $customer->retailer_id = 0;
        $customer->apps_token = 0;
        $customer->save();

        if ($id == 0) {
            $customer_id = "CST" . sprintf("%06d", $customer->id);
            $customer = Customer::find($customer->id);
            $customer->customer_id = $customer_id;
            $customer->save();
        }
        createCOA([
            'title' => $customer->customer_name,
            'code_no' => 'CST' . sprintf("%06d", $customer->id),
            'parent_id' => 7,
            'account_type' => 'A',
            'transactional' => 1,
            'status' => 1,
            'description' => 'Customer related transaction'
        ]);
        return $customer;
    }

    public function getPagesData($pages, $id)
    {
        $data['customer'] = Customer::find($id);
        $data['distributor'] = Customer::where('actor_type', 1)->get();
        $data['users'] = User::get();
        $data['divisions'] = getTableWhere('divisions', array());
        $data['districts'] = District::where('division_id', $data['customer']->division)->get();
        $data['thanas'] = Upazila::where('district_id', $data['customer']->district)->get();

        return $data;
    }
}
