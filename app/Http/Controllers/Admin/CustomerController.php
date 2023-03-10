<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Hash;
use App\User;
use PDF;
use Carbon\Carbon;
use App\Models\District;
use App\Models\Upazila;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class CustomerController extends Controller
{
    public $customer;

    public function __construct(Customer $customer)
    {
        $this->$customer = $customer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

        $summary = DB::select("select count(id) as total_cust from customers ");

        if ($summary) {
            $total_customer = $summary[0]->total_cust;
            $statusewise_summary = DB::select("select count(customers.id) as total_customer, combo_data.name as status_name from customers left join combo_data on combo_data.id = customers.global_status where combo_data.type=1 group by customers.global_status ");
        }

        $menus = array(
            'items' => array(),
            'parents' => array()
        );

        // Builds the array lists with data from the SQL result
        foreach ($result as $items) {
            // Create current menus item id into array
            $menus['items'][$items->id] = $items;
            // Creates list of all items with children
            $menus['parents'][$items->parent_id][] = $items->id;
        }
        $dealerTree = json_encode(createTreeview(0, $menus, 'json'));

        $search_tree = createTreeview(0, $menus, 'auto');
        $searchTree = json_encode(nestedToSingle($search_tree), true);

        if ($request->ajax()) {
            $data = Customer::leftJoin('districts', 'districts.id', 'customers.district')->select('customers.*', 'districts.name as distName')->orderBy('customers.id', 'DESC')->get();
            return Datatables::of($data)
                ->addColumn('checkCustomer', function ($row) {
                    $customer_id = $row->id;
                    //return '<input type="checkbox" class="selected_customer" value="' . $customer_id . '">';
                    return $row->id;
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;
                    return
                        "<a  href='" . url('client/' . $id) . "' target='_blank' class='view_data custom-button-class mr-2' data-id='$id'><i class='fas fa-eye'></i></a>
                    <a  href='' class='custom-button-class mr-2' data-id='$id'><i class='fas fa-tv mr-1'></i></a>
                    <div class='dropdown custom-dreopdown' style='display:inline-block'>
                        <button class='custom-button-class mr-2' data-toggle='dropdown'><i class='fas fa-cog'></i></button>
                        <ul class='dropdown-menu custom-dreopdown-menu'>
                            <li><a class='custom-dreopdown-item' id=$id href='javascript:;' onClick='reset_password($id)'>Rest password</a></li>
                            <li><a class='custom-dreopdown-item' id=$id href='javascript:;' onClick='permission($id)'>Permission</a></li>
                        </ul>
                    </div>";
                })
                ->editColumn('customer_name', function ($row) {

                    if ($row->global_status == 0) {
                        $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-warning">Inactive</span>';
                    } else if ($row->global_status == 1) {
                        $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-success">Active</span>';
                    } else if ($row->global_status == 2) {
                        $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-info"> Overdue</span>';
                    } else if ($row->global_status == 3) {
                        $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-info color-purple"> On Hold</span>';
                    } else {
                        $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-danger">Stop</span>';
                    }
                    /* else{
                        $customer = $row->customer_name.'<span class=" ml-2 badge badge-pill badge-'.$row->status_color.'">'.$row->global_status_name.'</span>';
                    } */
                    $mystatus = "";
                    if ($row->active == 1) {
                        $mystatus = '<span class=" ml-2 badge badge-pill badge-success"> &nbsp; </span>';
                    } else {
                        $mystatus = '<span class=" ml-2 badge badge-pill badge-danger"> &nbsp; </span>';
                    }
                    return $mystatus . ' ' . $customer;
                })
                ->editColumn('actor_type', function ($row) {
                    if ($row->actor_type == 1) {
                        $roll = '<span> Distributor</span>';
                    } else if ($row->actor_type == 2) {
                        $roll = '<span> Enduser</span>';
                    } else {
                        $roll = '<span> Only Viewer</span>';
                    }
                    return $roll;
                })
                ->rawColumns(['customer_name', 'actor_type', 'action'])
                ->make(true);
        }
        $districts = getTableWhere('districts', array());
        $users = User::get();
        return view('admin.client.client', compact('districts', 'users', 'dealerTree', 'searchTree', 'total_customer', 'statusewise_summary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $distributor = Customer::where('actor_type', 1)->get();
        $divisions = getTableWhere('divisions', array());
        return view('admin.client.create', compact('users', 'distributor', 'divisions'));
    }

    public function userMovement(Request $request)
    {

        $info = array(
            'parent_id' => $request->moving_to_user
        );
        $done = DB::table('customers')->whereIn('id', $request->moving_users)->update($info);

        if ($done >= 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            $validate = Validator::make($request->all(), [
                'sms_phone' => 'required|digits:11',
                'platform_username' => 'required|unique:customers,hosting_company',
                'system_username' => 'required|unique:customers,username',
                'customer_id' => 'required',
                'customer_name' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'date_of_birth' => 'required',
                'occupation' => 'required',
                'billing_address' => 'required',
                'nid_no' => 'required|numeric',
                'gender' => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'thana_id' => 'required',
                'customer_due_limit' => 'required|numeric',
                'global_status' => 'required',
                'role' => 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            $spouse_name = ($request->spouse_name != '') ? $request->spouse_name : 'NA';
            $spouse_phone = ($request->spouse_phone != '') ? $request->spouse_phone : 'NA';
            $present_address = ($request->present_address != '') ? $request->present_address : 'NA';
            $permanent_address = ($request->permanent_address != '') ? $request->permanent_address : 'NA';
            $passport_no = ($request->passport_no != '') ? $request->passport_no : 'NA';
            $billing_date = ($request->billing_date != '') ? Carbon::parse($request->billing_date)->format('Y-m-d H:i:s') : 'NA';
            $accounts_note = ($request->accounts_note != '') ? $request->accounts_note : 'NA';
            $contact_1 = ($request->contact_1 != '') ? $request->contact_1 : 'NA';
            $contact_2 = ($request->contact_2 != '') ? $request->contact_2 : 'NA';
            $distributor = ($request->distributor != '') ? $request->distributor : 0;
            $employee = ($request->employee != '') ? $request->employee : 1;
            $ac_opening_date = ($request->ac_opening_date != '') ? Carbon::parse($request->ac_opening_date)->format('Y-m-d H:i:s') : gmdate('Y-m-d H:i:s', strtotime(' +6 hour'));
            $active = ($request->crm_status == 'on') ? 1 : 0;


            DB::beginTransaction();
            $customer = new Customer();
            $customer->actor_type = $request->role;
            $customer->primary_contact = '0';
            $customer->parent_id = 0;
            $customer->name = $request->company_name;
            $customer->email = $request->company_email;
            $customer->short_note = $request->short_note;
            $customer->website = $request->company_website;
            $customer->phone = $request->sms_phone;
            $customer->mobile = '';
            $customer->fax = $request->company_fax;
            $customer->address = $request->company_address;
            $customer->city = $request->company_city;
            $customer->zipcode = '';
            $customer->currency = $request->currency;
            $customer->skype_id = $request->skype_id;
            $customer->linkedin = $request->linkedin_url;
            $customer->facebook = $request->facebook_url;
            $customer->twitter = $request->twitter_url;
            $customer->language = $request->language;
            $customer->country = $request->company_country;
            $customer->vat = $request->company_vat;
            //hosting company means platform username
            $customer->hosting_company = $request->platform_username; //
            $customer->hostname = Hash::make($request->platform_password);
            // $customer->hostname = $request-> Hash::make('111222');
            $customer->port = $request->port;
            $customer->username = $request->system_username;
            $customer->password = Hash::make($request->system_password);
            // $customer->password = Hash::make('111222');
            $customer->client_status = 1;
            $customer->profile_photo = '';
            $customer->leads_id = 0;
            $customer->latitude = $request->latitude;
            $customer->longitude = $request->longitude;
            $customer->customer_group_id = 0;
            $customer->customer_id = $request->customer_id;
            $customer->customer_name = $request->customer_name;
            $customer->father_name = $request->father_name;
            $customer->mother_name = $request->mother_name;
            $customer->date_of_birth =  Carbon::parse($request->date_of_birth)->format('Y-m-d H:i:s');
            $customer->spouse_name = $spouse_name;
            $customer->spouse_phone = $spouse_phone;
            $customer->occupation = $request->occupation;
            $customer->present_address = $present_address;
            $customer->permanent_address = $permanent_address;
            $customer->billing_address = $request->billing_address;
            $customer->nid_no = $request->nid_no;
            $customer->passport_no = $passport_no;
            $customer->gender = $request->gender;
            $customer->active = $active;
            $customer->distributor_id = $distributor;
            $customer->retailer_id = 0;
            $customer->division = $request->division_id;
            $customer->district = $request->district_id;
            $customer->thana = $request->thana_id;
            $customer->employee_id = $employee;
            $customer->ac_opening_date = $ac_opening_date;
            $customer->customer_due_limit = $request->customer_due_limit;
            $customer->collection_dealer = 0;
            $customer->collection_method = 0;
            $customer->billing_date = $billing_date;
            $customer->accounts_note = $accounts_note;
            $customer->package_type = $request->package_type;
            $customer->reporter = 0;
            $customer->follower = 0;
            $customer->global_status = $request->global_status;
            $customer->contact_1 = $contact_1;
            $customer->contact_2 = $contact_2;
            $customer->apps_token = 0;

            $customer->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
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
        $client = Customer::find($id);
        $distributor = Customer::where('actor_type', 1)->get();
        $users = User::get();
        $divisions = getTableWhere('divisions', array());
        $districts = District::where('division_id', $client->division)->get();
        $thanas = Upazila::where('district_id', $client->district)->get();
        return view('admin.client.view', compact('client', 'distributor', 'users', 'divisions', 'districts', 'thanas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
        try {

            // dd($active);
            $validate = Validator::make($request->all(), [
                'sms_phone' => 'required|digits:11',
                'platform_username' => ['required', 'min:4', Rule::unique('customers', 'hosting_company')->ignore($id)],
                'system_username' => ['required', 'min:4', Rule::unique('customers', 'username')->ignore($id)],
                'customer_id' => 'required',
                'customer_name' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'date_of_birth' => 'required',
                'occupation' => 'required',
                'billing_address' => 'required',
                'nid_no' => 'required|numeric',
                'gender' => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'thana_id' => 'required',
                'customer_due_limit' => 'required|numeric',
                'global_status' => 'required',
                'role' => 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            $spouse_name = ($request->spouse_name != '') ? $request->spouse_name : 'NA';
            $spouse_phone = ($request->spouse_phone != '') ? $request->spouse_phone : 'NA';
            $present_address = ($request->present_address != '') ? $request->present_address : 'NA';
            $permanent_address = ($request->permanent_address != '') ? $request->permanent_address : 'NA';
            $passport_no = ($request->passport_no != '') ? $request->passport_no : 'NA';
            $billing_date = ($request->billing_date != '' || $request->billing_date != 'NA') ? Carbon::parse($request->billing_date)->format('Y-m-d H:i:s') : 'NA';
            $accounts_note = ($request->accounts_note != '') ? $request->accounts_note : 'NA';
            $contact_1 = ($request->contact_1 != '') ? $request->contact_1 : 'NA';
            $contact_2 = ($request->contact_2 != '') ? $request->contact_2 : 'NA';
            $distributor = ($request->distributor != '') ? $request->distributor : 0;
            $employee = ($request->employee != '') ? $request->employee : 1;
            $active = ($request->crm_status == 'on') ? 1 : 0;

            DB::beginTransaction();
            $customer = Customer::find($id);
            $customer->actor_type = $request->role;
            $customer->name = $request->company_name;
            $customer->email = $request->company_email;
            $customer->short_note = $request->short_note;
            $customer->website = $request->company_website;
            $customer->phone = $request->sms_phone;
            $customer->fax = $request->company_fax;
            $customer->address = $request->company_address;
            $customer->city = $request->company_city;
            $customer->currency = $request->currency;
            $customer->skype_id = $request->skype_id;
            $customer->linkedin = $request->linkedin_url;
            $customer->facebook = $request->facebook_url;
            $customer->twitter = $request->twitter_url;
            $customer->language = $request->language;
            $customer->country = $request->company_country;
            $customer->vat = $request->company_vat;
            $customer->hosting_company = $request->platform_username;
            if ($request->platform_password) {
                $customer->hostname = Hash::make($request->platform_password);
            }
            $customer->port = $request->port;
            $customer->username = $request->system_username;
            if ($request->system_password) {
                $customer->password = Hash::make($request->system_password);
            }
            $customer->latitude = $request->latitude;
            $customer->longitude = $request->longitude;
            $customer->customer_id = $request->customer_id;
            $customer->customer_name = $request->customer_name;
            $customer->father_name = $request->father_name;
            $customer->mother_name = $request->mother_name;
            $customer->date_of_birth =  Carbon::parse($request->date_of_birth)->format('Y-m-d H:i:s');
            $customer->spouse_name = $spouse_name;
            $customer->spouse_phone = $spouse_phone;
            $customer->occupation = $request->occupation;
            $customer->present_address = $present_address;
            $customer->permanent_address = $permanent_address;
            $customer->billing_address = $request->billing_address;
            $customer->nid_no = $request->nid_no;
            $customer->passport_no = $passport_no;
            $customer->gender = $request->gender;
            $customer->active = $active;
            $customer->distributor_id = $distributor;
            $customer->division = $request->division_id;
            $customer->district = $request->district_id;
            $customer->thana = $request->thana_id;
            $customer->employee_id = $employee;
            $customer->customer_due_limit = $request->customer_due_limit;
            $customer->billing_date = $billing_date;
            $customer->accounts_note = $accounts_note;
            $customer->package_type = $request->package_type;
            $customer->global_status = $request->global_status;
            $customer->contact_1 = $contact_1;
            $customer->contact_2 = $contact_2;
            $customer->save();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
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

    public function pdf()
    {
        // $data=[
        //     'heading'=> 'Creating PDF'
        // ];
        $pdf = PDF::loadView('pdf');
        return $pdf->download('report.pdf');
        // dd($data);
        // return view('pdf')->with($data);
    }
}
