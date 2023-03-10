<?php

namespace App\Http\Controllers\Enduser;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Services\Enduser\MaintenanceService;

class MaintenanceController extends Controller
{
    private $my_connection;
    private $maintenanceService;

    public function __construct(MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
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
        $query = "select m.*, v.vehicle_no, mt.name as mt_name from maintenances m left join vehicles v on v.id =m.vehicle_id left join maintenance_types mt on mt.id = m.main_type_id where m.id > 0 ";

        if($request->vehicle_id !=null && $request->vehicle_id > 0){
            $query.= " and  vehicle_id = ".$request->vehicle_id;
        }
        if($request->main_type  !=null && $request->main_type > 0){
            $query.= " and main_type_id = ".$request->main_type;
        }
        if($request->start_date  !=null && $request->end_date  !=null){

            $query.= " and  next_main_date between '".$request->start_date."' and '".$request->end_date. "'";
        }
        $query.= " order by m.id desc";

        $data = $this->my_connection->select($query);

        $datatable =  $this->maintenanceService->datatable($data);
        return $datatable;
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

            // dd($request->all());

            $validator = Validator::make($request->all(), [
                'vehicle_no' => 'required',
                'maintenance_type' => 'required',
                'maintenance_name' => 'required',
                'last_main_date' => 'required',
                'next_main_date' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            if ($id > 0) {

                $maintenance = Maintenance::find($id);

            } else {

                $maintenance = new Maintenance();
                $maintenance->customer_id = Auth::user()->id;

            }

            DB::beginTransaction();
            // dd($request->all());
            $maintenance->vehicle_id = $request->vehicle_no;
            $maintenance->main_type_id = $request->maintenance_type;
            $maintenance->main_name = $request->maintenance_name;
            $maintenance->last_main_date = Carbon::parse($request->last_main_date)->format('Y-m-d H:i:s');
            $maintenance->next_main_date = Carbon::parse($request->next_main_date)->format('Y-m-d H:i:s');
            $maintenance->main_aleart = $request->maintenance_aleart;
            $maintenance->note = $request->note;
            // dd($maintenance);
            $maintenance->save();

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return false;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Maintenance::find($id);
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
