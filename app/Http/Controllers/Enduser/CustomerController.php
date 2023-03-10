<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;

use App\User;
use PDF;
use Carbon\Carbon;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Customer;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Services\Common\CustomerService;
use App\Services\Enduser\UserService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class CustomerController extends Controller
{
    public $customerService;
    private $my_connection;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;

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
    public function index(Request $request)
    {
        // dd($request->all());
        $query = "select c.*, d.name as distName from customers c left join districts d on d.id = c.district where c.active = " . $request->status;

        if ($request->global_status != null) {
            $query .= " and c.global_status = " . $request->global_status;
        }
        if ($request->employee) {
            $query .= " and c.employee_id = " . $request->employee;
        }
        if ($request->district) {
            $query .= " and c.district = " . $request->district;
        }
        if ($request->thana) {
            $query .= " and c.thana = " . $request->thana;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  c.ac_opening_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        }
        $query .= " order by c.id desc";
        // dd($query);
        $data = $this->my_connection->select($query);

        return Datatables::of($data)
            ->addColumn('checkCustomer', function ($row) {
                $customer_id = $row->id;
                //return '<input type="checkbox" class="selected_customer" value="' . $customer_id . '">';
                return $row->id;
            })
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>
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
                } else if ($row->global_status == 4) {
                    $customer = $row->customer_name . '<span class=" ml-2 badge badge-pill badge-danger">Stop</span>';
                }
                /* else{
                    $customer = $row->customer_name.'<span class=" ml-2 badge badge-pill badge-'.$row->status_color.'">'.$row->global_status_name.'</span>';
                } */
                $mystatus = "";
                if ($row->active == 1) {
                    $mystatus = '<span class=" ml-2 kt-badge kt-badge--success custom-kt-badge"> &nbsp; </span>';
                } else {
                    $mystatus = '<span class=" ml-2 kt-badge kt-badge--danger custom-kt-badge"> &nbsp; </span>';
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
        $done = $this->my_connection->table('customers')->whereIn('id', $request->moving_users)->update($info);

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
    public function saveData(Request $request, $id)
    {
        try {
            $user_id = 0;
            $customer_insert = '';
            if ($id > 0) {
                $customer = Customer::find($id);
                $user_id = $customer->user_id;
            } else {
                $customer = new Customer();
            }

            $validator = $this->customerService->storeValidate($request, $id, $user_id);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $userService = new UserService();
            $user_insert = $userService->storeUserFromCustomer($request, $user_id);
            if ($user_insert) {
                $request->user_id = $user_insert->id;
                $customer_insert = $this->customerService->storeData($request, $id, $customer);
            }
            $this->my_connection->commit();
            return $customer_insert;
        } catch (Exception $e) {
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
        $data['customer'] = Customer::find($id);

        return view('enduser.dashboard.customer_view')->with($data);
    }

    public function customer_info($pages, $id)
    {
        $data[] = '';

        if ($pages == 'customer_info') {
            $data =  $this->customerService->getPagesData($pages, $id);
        }

        $data['current_customer_id'] = $id;

        return view('enduser.dashboard.customer.' . $pages)->with($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
