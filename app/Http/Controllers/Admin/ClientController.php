<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\User;
use Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Customer::orderBy('id', 'DESC')->get();

        return view('admin.client.client_search', compact('clients'));
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
    public function store(Request $request)
    {
        //
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
        return view('admin.client.single_client', compact('client', 'distributor', 'users', 'divisions', 'districts', 'thanas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clientLoginHistory(Request $request)
    {
        if ($request->ajax())
        {
            $data = DB::select("select cl.*, c.customer_name, c.username from customer_logs cl left join customers c on c.id = cl.customer_id  order by cl.id desc");
            return Datatables::of($data)
                ->addIndexColumn()
    
                ->editColumn('status', function ($data) {
                    if ($data->status == 0) {
                        return "Password mismatch";
                    } else if ($data->status == 1) {
                        return "Success";
                    } else if ($data->status == 2) {
                        return "Account inactive";
                    }
                })
                ->editColumn('created_at', function ($data) {
                    $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                    return $createdDate;
                })
                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }

        return view('admin.logs.all_client_login_history');
    }

    public function clientPages($id, $pages = null)
    {
        if ($pages == 'client_information') {
            $client = Customer::find($id);
            $distributor = Customer::where('actor_type', 1)->get();
            $users = User::get();
            $divisions = getTableWhere('divisions', array());
            $districts = District::where('division_id', $client->division)->get();
            $thanas = Upazila::where('district_id', $client->district)->get();
            return view('admin.client.' . $pages, compact('client', 'distributor', 'users', 'divisions', 'districts', 'thanas'));
        } else {
            return view('admin.client.' . $pages);
        }

    }

    public function passResetForm($id)
    {
        $client = Customer::find($id);
        return view('admin.client.reset_pass', compact('client'));
    }
    public function passReset(Request $request, $id)
    {
        try
        {

            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            DB::beginTransaction();
            $client = Customer::find($id);
            $client->password = Hash::make($request->password);
            $client->save();
            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function smsLog()
    {
        return view('admin.logs.client_sms_log');
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
