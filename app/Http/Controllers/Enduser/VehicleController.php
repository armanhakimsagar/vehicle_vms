<?php

namespace App\Http\Controllers\Enduser;

use File;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Services\Enduser\VehicleService;
use App\Services\Enduser\ComplainService;
use App\Services\Enduser\MaintenanceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Enduser\VmsController;
use App\Models\TblInspection;
use App\Services\Enduser\DocumentService;
use App\Services\Enduser\InspectionService;
use App\Services\Enduser\VehicleStaffService;
use App\Services\Enduser\VmsService;

class VehicleController extends Controller
{
    private $my_connection;
    private $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
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
    public function index(Request $request, $type = null, $id = null)
    {

        // dd($type, $id);
        if ($type == "group") {
            $query = $this->my_connection->select("select v.*, vg.name as vg_name, vt.name as vt_name,  ms.name as ownership_name, vs.staff_name, vs.phone as vs_phone, vs.status as vs_status, gs.imei, gs.device_name, gs.unit_status as gs_status, cd.name as cd_name, c.other_value as color_name from vehicles v left join vehicle_groups vg on vg.id = v.vehicle_group_id left join vehicle_types vt on vt.id = v.vehicle_type left join master_settings ms on ms.id = v.vehicle_ownership left join vehicle_staff vs on vs.assigned_vehicle = v.id left join gs_objects gs on gs.id = v.object_id left join combo_data cd on cd.id = gs.unit_status left join combo_data c on c.id = gs.unit_status where v.vehicle_group_id =" . $id . " group by v.id order by v.id desc");
        } else {
            $query = $this->my_connection->select("select v.*, vg.name as vg_name, vt.name as vt_name, ms.name as ownership_name, vs.staff_name, vs.phone as vs_phone, vs.status as vs_status, gs.imei, gs.device_name, gs.unit_status as gs_status, cd.name as cd_name, c.other_value as color_name from vehicles v left join vehicle_groups vg on vg.id = v.vehicle_group_id left join vehicle_types vt on vt.id = v.vehicle_type left join master_settings ms on ms.id = v.vehicle_ownership left join vehicle_staff vs on vs.assigned_vehicle = v.id left join gs_objects gs on gs.id = v.object_id left join combo_data cd on cd.id = gs.unit_status left join combo_data c on c.id = gs.unit_status group by v.id order by v.id desc");
        }

        $vehicle_staff = $this->my_connection->select("SELECT vs.id, vs.staff_name, vs.phone, vs.staff_type, vs.status, ms.name as staff_type_name FROM vehicle_staff vs left join master_settings ms on ms.id=vs.staff_type");

        if (count($query) > 0) {
            foreach ($query as $q) {
                $assignStaff = '';
                $staff_array = explode(',', $q->vehicle_staff_id);
                $i = 1;
                foreach ($staff_array as $sa) {
                    foreach ($vehicle_staff as $stf) {
                        $staff_s = ($stf->status == 1) ? "Active" : "Inactive";
                        $s_color = ($stf->status == 1) ? "success" : "danger";
                        if ($stf->id == $sa) {
                            if (count($staff_array) > $i) {
                                $assignStaff .= $i . '. ' . $stf->staff_name . ' - ' . $stf->staff_type_name . ' - ' . $stf->phone .  ' - <span class="mb-1 badge badge-pill badge-' . $s_color . '">' . $staff_s . '</span><br>';
                            } else {
                                $assignStaff .= $i . '. ' . $stf->staff_name . ' - ' . $stf->staff_type_name . ' - ' . $stf->phone .  ' - <span class=" badge badge-pill badge-' . $s_color . '">' . $staff_s . '</span>';
                            }
                        }
                    }
                    $i++;
                }
                $q->staff_data = $assignStaff;
            }
        }

        $datatable = $this->vehicleService->datatable($query);
        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $drivers = Driver::all();
        return view('enduser.vms.vehicle_create', compact('drivers'));
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
            if ($id > 0) {
                $validator = $this->vehicleService->updateValidate($request, $id);
            } else {
                $validator = $this->vehicleService->storeValidate($request);
            }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $this->vehicleService->storeData($request, $id);

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
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
    public function at_a_glance()
    {

        $rasult = $this->my_connection->select("SELECT count(*) as total_v, (SELECT count(*) from vehicles where vehicle_staff_id !='') as assigned_v FROM `vehicles`");

        $data['total_v'] = $rasult[0]->total_v;
        $data['assigned_v'] = $rasult[0]->assigned_v;
        $data['unassigned_v'] = $rasult[0]->total_v - $rasult[0]->assigned_v;
        return $data;
    }

    public function getList()
    {
        $vehicles = Vehicle::get();
        $htmlContent = '';
        $htmlContent = "<option value='0'>Select vehicle</option>";
        foreach ($vehicles as $vehicle) {
            $htmlContent .= "<option value='$vehicle->id'>$vehicle->vehicle_no</option>";
        }

        return $htmlContent;
    }

    public function show($type, $id)
    {
        $data['vehicle'] = Vehicle::find($id);

        $data['type'] = $type;

        return view('enduser.dashboard.vehicle_view')->with($data);
    }

    public function vehicle_info($type, $id)
    {
        $data[] = '';

        if ($type == 'vehicle_information') {
            $data =  $this->vehicleService->vehicle_information($id);
        } else if ($type == 'complain' || $type == 'document' || $type == 'maintenance') {
            $vmsController = new VmsService();
            $data = $vmsController->getPagesData($type);
        }

        $data['vehicle_id'] = $id;

        return view('enduser.dashboard.vehicle.' . $type)->with($data);
    }

    public function vehicle_wise_datatable($type, $id)
    {
        // dd($id);
        $data = '';
        if ($type == 'complain') {
            $query = $this->my_connection->select("select c.*, ct.name as ct_name from complains c left join complain_types ct on ct.id = c.complain_type_id where c.module_id=3 and complain_of= " . $id . " order by c.id desc");
            $complainService = new ComplainService();
            $data =  $complainService->complain_datatable($query);
        } else if ($type == 'vehicle_staff') {
            $query = [];
            $vehicle_staff = $this->my_connection->select("select vehicle_staff_id from vehicles where id = $id")[0];
            if ($vehicle_staff->vehicle_staff_id) {
                $query = $this->my_connection->select("SELECT vs.*, ms.name as staff_type_name FROM vehicle_staff vs left join master_settings ms on ms.id=vs.staff_type where vs.id in($vehicle_staff->vehicle_staff_id) order by vs.id desc");
            }

            $vehicleStaffService = new VehicleStaffService();
            $data =  $vehicleStaffService->datatable($query);
        } else if ($type == 'maintenance') {
            $query = $this->my_connection->select("select m.*, v.vehicle_no, mt.name as mt_name from maintenances m left join vehicles v on v.id =m.vehicle_id left join maintenance_types mt on mt.id = m.main_type_id where m.vehicle_id = " . $id . " order by m.id desc");
            $maintenanceService = new MaintenanceService();
            $data =  $maintenanceService->datatable($query);
        } else if ($type == 'document') {
            $query = $this->my_connection->select("select d.*, v.vehicle_no, dt.name as dt_name from documents d left join vehicles v on v.id = d.vehicle_id left join doc_types dt on dt.id = d.doc_type_id where d.vehicle_id = " . $id . " order by d.id desc");
            $documentService = new DocumentService();
            $data =  $documentService->datatable($query);
        } else if ($type == 'inspection') {
            $query = $this->my_connection->select("SELECT i.* FROM tbl_inspections i WHERE i.status > 0 and find_in_set(" . $id . ", i.assigned_vehicle) > 0 order by i.id desc");
            $inspection_id = $this->my_connection->select("SELECT GROUP_CONCAT(id) as id_list FROM tbl_inspections WHERE status > 0 and find_in_set(" . $id . ", assigned_vehicle) > 0")[0];

            if (count($query) > 0) {
                $inspection_details = $this->my_connection->select("SELECT id.*, ii.item_name FROM `inspection_details` id LEFT JOIN inspection_items ii ON ii.id= id.item_id WHERE inspection_id in (" . $inspection_id->id_list . ") ORDER BY id.id ASC");

                foreach ($query as $q) {
                    $itemDetails = '';
                    $i = "&#x2609";
                    foreach ($inspection_details as $inspDet) {
                        if ($inspDet->inspection_id == $q->id) {
                            $itemDetails .= $i . " " . $inspDet->item_name . "<br>";
                        }
                        // $i++;
                    }
                    $q->datalist_type = 'vehicle';
                    $q->item_details = $itemDetails;
                }
            }
            $inspectionService = new InspectionService();
            $data =  $inspectionService->insp_datatable($query);
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $drivers = Driver::all();
        return view('enduser.vms.vehicle_edit', compact('vehicle', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vehicle_insp_check(Request $request)
    {
        $data['inspection'] = TblInspection::find($request->inspection_id);
        $data['vehicle_id'] = $request->vehicle_id;
        $inspection_details = $this->my_connection->select("SELECT id.*, ii.item_name FROM `inspection_details` id LEFT JOIN inspection_items ii ON ii.id= id.item_id WHERE inspection_id =" . $data['inspection']->id . " ORDER BY id.id ASC");

        foreach ($inspection_details as $inspDet) {
            $inspection_followup = $this->my_connection->select("SELECT ifo.*, pb.name as pb_name from inspection_followups ifo left join users pb on pb.id=ifo.posted_by where ifo.inspection_id=" . $request->inspection_id . " and ifo.vehicle_id = " . $request->vehicle_id . " and ifo.item_id = " . $inspDet->item_id);
            if ($inspection_followup) {
                $inspDet->followup_exist = 1;
                $inspDet->posted_by = $inspection_followup[0]->pb_name;
                $inspDet->posted_date = $inspection_followup[0]->created_at;
                $inspDet->followup_note = $inspection_followup[0]->item_note;
            } else {
                $inspDet->followup_exist = 0;
                $inspDet->posted_by = null;
                $inspDet->posted_date = null;
                $inspDet->followup_note = null;
            }
        }

        $data['inspection_details'] = $inspection_details;
        return view('enduser.dashboard.vehicle.inspection_check')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAssignedStaff(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'choose_staff' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();
            $this->my_connection->update("update vehicles set vehicle_staff_id='" . $request->choose_staff . "' where id=" . $id);
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
}
