<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;

use App\User;
use PDF;
use Carbon\Carbon;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Services\Enduser\VendorService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


class VendorController extends Controller
{
    public $vendorService;
    private $my_connection;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;

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

        $query = "select v.*, d.name as distName, ms.name as ms_name from vendors v left join districts d on d.id = v.district left join master_settings ms on ms.id = v.vendor_type  where v.active = " . $request->status;

        if ($request->global_status != null) {
            $query .= " and v.global_status = " . $request->global_status;
        }
        if ($request->vendor_type) {
            $query .= " and v.vendor_type = " . $request->vendor_type;
        }
        if ($request->district) {
            $query .= " and v.district = " . $request->district;
        }
        if ($request->thana) {
            $query .= " and v.thana = " . $request->thana;
        }
        if ($request->start_date  != null && $request->end_date  != null) {

            $query .= " and  v.ac_opening_date between '" . $request->start_date . "' and '" . $request->end_date . "'";
        }
        $query .= " order by v.id desc";

        $data = $this->my_connection->select($query);

        $datatable =  $this->vendorService->datatable($data);

        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $distributor = Vendor::where('actor_type', 1)->get();
        $divisions = getTableWhere('divisions', array());
        return view('admin.client.create', compact('users', 'distributor', 'divisions'));
    }

    public function userMovement(Request $request)
    {

        $info = array(
            'parent_id' => $request->moving_to_user
        );
        $done = $this->my_connection->table('vendors')->whereIn('id', $request->moving_users)->update($info);

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

            $validator = $this->vendorService->storeValidate($request, $id);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $validator = $this->vendorService->storeData($request, $id);
            $this->my_connection->commit();
            return true;
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
        $data['vendor'] = Vendor::find($id);
        $data['distributor'] = Vendor::where('actor_type', 1)->get();
        $data['users'] = User::all();
        $data['divisions'] = getTableWhere('divisions', array());
        $data['districts'] = District::where('division_id', $data['vendor']->division)->get();
        $data['thanas'] = Upazila::where('district_id', $data['vendor']->district)->get();
        $data['vendorType'] = $this->my_connection->select("select ms.id, ms.name from master_settings ms where type=9");
        return view('enduser.dashboard.vendor_view')->with($data);
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
        $data['thanas'] = Upazila::take(80)->get();
        $data['heading'] = 'Creating PDF with DOMpdf';
        $data['time'] = date("D d F Y, h:i a", strtotime("+6 hour"));
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('pdf', $data);
        return $pdf->download('thanas.pdf');
        // return view('pdf')->with($data);


    }
    public function angularjs()
    {

        return view('angularjs');
        // return view('pdf')->with($data);


    }
}
