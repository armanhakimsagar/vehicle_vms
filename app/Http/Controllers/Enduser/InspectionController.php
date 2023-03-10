<?php

namespace App\Http\Controllers\Enduser;

use App\Models\InspectionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\Enduser\VehicleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Models\InspectionDetail;
use App\Models\InspectionFollowup;
use App\Models\InspectionItem;
use App\Models\TblInspection;
use App\Services\Enduser\InspectionService;

class InspectionController extends Controller
{
    private $my_connection;
    private $inspectionService;
    private $vehicleService;

    public function __construct(InspectionService $inspectionService, VehicleService $vehicleService)
    {
        $this->inspectionService = $inspectionService;
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

    public function inspection_data(Request $request, $id)
    {
        //$vehicle_id = $request->vehicle_id;
        $query = "select * from tbl_inspections where status>0 ";
        // if ($id > 0) {
        //     $query .= " and id=" . $id;
        // }

        if ($request->vehicle_id != null && $request->vehicle_id > 0) {
            $query .= " and  FIND_IN_SET('" . $request->vehicle_id . "', assigned_vehicle)>0";
        }

        $query .= " order by id desc";

        $query = $this->my_connection->select($query);

        $inspection_id = $this->my_connection->select("SELECT GROUP_CONCAT(id) as id_list FROM tbl_inspections WHERE status > 0 ")[0];

        if (count($query) > 0) {
            $inspection_details = $this->my_connection->select("SELECT id.*, ii.item_name FROM `inspection_details` id LEFT JOIN inspection_items ii ON ii.id= id.item_id WHERE inspection_id in (" . $inspection_id->id_list . ") ORDER BY id.id ASC");

            foreach ($query as $q) {
                $itemDetails = '';
                $i = "&#x2609";
                foreach ($inspection_details as $inspDet) {
                    if ($inspDet->inspection_id == $q->id) {
                        $itemDetails .= $i . " " . $inspDet->item_name . "<br>";
                    }
                }
                // $i++;
                $q->datalist_type = 'inspection';
                $q->item_details = $itemDetails;
            }
        }
        $datatable = $this->inspectionService->insp_datatable($query);
        return $datatable;
    }

    public function vehicleList(Request $request, $id)
    {

        $string = "select v.*, vg.name as vg_name, vt.name as vt_name, ms.name as ownership_name, vs.staff_name, vs.phone as vs_phone, vs.status as vs_status, gs.imei, gs.device_name, gs.unit_status as gs_status, cd.name as cd_name, c.other_value as color_name from vehicles v left join vehicle_groups vg on vg.id = v.vehicle_group_id left join vehicle_types vt on vt.id = v.vehicle_type left join master_settings ms on ms.id = v.vehicle_ownership left join vehicle_staff vs on vs.assigned_vehicle = v.id left join gs_objects gs on gs.id = v.object_id left join combo_data cd on cd.id = gs.unit_status left join combo_data c on c.id = gs.unit_status where v.id > 0 ";

        if ($request->status != null) {
            $string .= " and v.status = " . $request->status;
        }
        if ($request->vehicle_type) {
            $string .= " and v.vehicle_type = " . $request->vehicle_type;
        }
        if ($request->group) {
            $string .= " and v.vehicle_group_id = " . $request->group;
        }
        $string .= " group by v.id order by v.id desc";
        $query = $this->my_connection->select($string);

        $vehicle_staff = $this->my_connection->select("SELECT id, staff_name, phone, staff_type, status FROM `vehicle_staff`");

        $inspection_data = $this->my_connection->select("select * from tbl_inspections where id=" . $id)[0];
        $already_assigned = explode(',', $inspection_data->assigned_vehicle);

        if (count($query) > 0) {
            foreach ($query as $q) {
                $assignStaff = '';
                $staff_array = explode(',', $q->vehicle_staff_id);
                $i = 1;
                if (in_array($q->id, $already_assigned)) {
                    $q->already_assigned = 1;
                } else {
                    $q->already_assigned = 0;
                }
                foreach ($staff_array as $sa) {
                    foreach ($vehicle_staff as $stf) {
                        $staff_s = ($stf->status == 1) ? "Active" : "Inactive";
                        $s_color = ($stf->status == 1) ? "success" : "danger";
                        $s_type = ['NA', 'Supervisor', 'Driver', 'Contractor', 'Helper'];
                        if ($stf->id == $sa) {
                            if (count($staff_array) > $i) {
                                $assignStaff .= $i . '. ' . $stf->staff_name . ' - ' . $s_type[$stf->staff_type] . ' - ' . $stf->phone .  ' - <span class="mb-1 badge badge-pill badge-' . $s_color . '">' . $staff_s . '</span><br>';
                            } else {
                                $assignStaff .= $i . '. ' . $stf->staff_name . ' - ' . $s_type[$stf->staff_type] . ' - ' . $stf->phone .  ' - <span class=" badge badge-pill badge-' . $s_color . '">' . $staff_s . '</span>';
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
    public function inspCatDatalist(Request $request)
    {

        $data = $this->my_connection->select("SELECT ic.*, vt.name as vt_name FROM inspection_categories ic left join vehicle_types vt on vt.id=ic.type order by ic.id desc");

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status =  "<span class='badge badge-pill badge-success'>Active</span>";
                } else {
                    $status = "<span class='badge badge-pill badge-danger'>Inactive</span>";
                }
                return $status;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function inspItemDatalist(Request $request)
    {

        $data = $this->my_connection->select("SELECT ii.*, vt.name as vt_name, ic.inspection_name as ic_name FROM inspection_items ii left join vehicle_types vt on vt.id=ii.type left join inspection_categories ic on ic.id=ii.parent_id order by ii.id desc");

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;
                return
                    "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status =  "<span class='badge badge-pill badge-success'>Active</span>";
                } else {
                    $status = "<span class='badge badge-pill badge-danger'>Inactive</span>";
                }
                return $status;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveInspectionCategory(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'type' => 'required',
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $inspectionCategory = InspectionCategory::find($id);
            } else {
                $inspectionCategory = new InspectionCategory();
            }
            $inspectionCategory->type = $request->type;
            $inspectionCategory->inspection_name = $request->title;
            $inspectionCategory->description = $request->description;
            $inspectionCategory->status = $request->status;
            // dd($inspectionCategory);
            $inspectionCategory->save();
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveInspectionItem(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'type' => 'required',
                'parent' => 'required',
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $inspectionItem = InspectionItem::find($id);
            } else {
                $inspectionItem = new InspectionItem();
            }
            $inspectionItem->type = $request->type;
            $inspectionItem->parent_id = $request->parent;
            $inspectionItem->item_name = $request->title;
            $inspectionItem->description = $request->description;
            $inspectionItem->status = $request->status;
            // dd($inspectionItem);
            $inspectionItem->save();
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveVehicleInspection(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'date' => 'required',
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $inspection = TblInspection::find($id);
            } else {
                $inspection = new TblInspection();
                $inspection->created_by = Auth::user()->id;
            }
            $inspection->inspection_date = Carbon::parse($request->date)->format('Y-m-d');
            $inspection->inspection_name = $request->title;
            $inspection->description = $request->description;
            $inspection->save();
            if ($inspection) {
                if ($id > 0) {
                    $this->updateInspectionDetails($request, $inspection->id);
                } else {
                    $this->saveInspectionDetails($request, $inspection->id);
                }
            }
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveInspectionDetails(Request $request, $id)
    {
        try {

            $this->my_connection->beginTransaction();
            $i = 0;
            foreach ($request->item as $itm) {
                if ($itm) {
                    $inspectionDetail = new InspectionDetail();
                    $inspectionDetail->inspection_id = $id;
                    $inspectionDetail->vehicle_type_id = $request->type[$i];
                    $inspectionDetail->inspection_cat_id = $request->category[$i];
                    $inspectionDetail->item_id = $itm;
                    $inspectionDetail->save();
                }
                $i++;
            }
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function updateInspectionDetails(Request $request, $id)
    {
        try {

            $oldId = [];
            if ($request->inspection_details_id_list) {
                $oldId = explode(",", $request->inspection_details_id_list);
            }
            $i = 0;

            $this->my_connection->beginTransaction();

            if (count($oldId) > 0) {
                foreach ($oldId as $old) {
                    if (isset($request->inspection_details_id)) {

                        if (in_array($old, $request->inspection_details_id)) {
                            $inspectionDetail = InspectionDetail::find($old);
                            $inspectionDetail->vehicle_type_id = $request->type[$i];
                            $inspectionDetail->inspection_cat_id = $request->category[$i];
                            $inspectionDetail->item_id = $request->item[$i];
                            $inspectionDetail->save();
                            $i++;
                        } else {
                            $inspectionDetail = InspectionDetail::find($old);
                            $inspectionDetail->delete();
                        }
                    } else {
                        $inspectionDetail = InspectionDetail::find($old);
                        $inspectionDetail->delete();
                    }
                }
            }

            if (isset($request->item)) {

                for ($x = $i; $x < count($request->item); $x++) {
                    if ($request->category[$x] && $request->item[$x]) {
                        $inspectionDetail = new InspectionDetail();
                        $inspectionDetail->inspection_id = $id;
                        $inspectionDetail->vehicle_type_id = $request->type[$x];
                        $inspectionDetail->inspection_cat_id = $request->category[$x];
                        $inspectionDetail->item_id = $request->item[$x];
                        $inspectionDetail->save();
                    }
                }
            }

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function addVehicleInspection()
    {
        return view('enduser.dashboard.vehicle_inspection_add');
    }

    public function editVehicleInspection($id)
    {
        $data['inspection'] = TblInspection::find($id);
        $data['inspectionDetail'] = InspectionDetail::where('inspection_id', $id)->get();
        $data['inspectionDetailId'] = $this->my_connection->select('SELECT GROUP_CONCAT(id) as id_list FROM `inspection_details` where inspection_id= ' . $id)[0];
        $data['inspectionDetailCount'] = count($data['inspectionDetail']);
        return view('enduser.dashboard.vehicle_inspection_edit')->with($data);
    }

    public function assignVehicle($id)
    {
        $data['inspection'] = TblInspection::find($id);
        return view('enduser.dashboard.vehicle_inspection_assign')->with($data);
    }

    public function saveAassignVehicleList(Request $request)
    {

        try {

            $this->my_connection->beginTransaction();
            $inspection = TblInspection::find($request->inspection_id);
            $inspection->assigned_vehicle = (isset($request->vehicle_list)) ? implode(",", $request->vehicle_list) : null;
            $inspection->save();
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inspCatDetail($id)
    {
        $inspectionCategory = InspectionCategory::find($id);
        return  $inspectionCategory;
    }

    public function inspItemDetail($id)
    {
        $inspectionItem = InspectionItem::find($id);
        return  $inspectionItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insp_check_save(Request $request)
    {
        try {

            $this->my_connection->beginTransaction();
            if (isset($request->item_id)) {
                $i = 0;
                foreach ($request->item_id as $item) {
                    $inspection_followup = new InspectionFollowup();
                    $inspection_followup->inspection_id = $request->inspection_id;
                    $inspection_followup->vehicle_id = $request->vehicle_id;
                    $inspection_followup->item_id = $item;
                    $inspection_followup->item_note = $request->note[$i];
                    $inspection_followup->posted_by = Auth::user()->id;
                    $inspection_followup->save();
                    $i++;
                }
            }
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
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
}
