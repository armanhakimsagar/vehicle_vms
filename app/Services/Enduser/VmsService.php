<?php

namespace App\Services\Enduser;

use App\Models\Complain;
use App\Models\Driver;
use App\Models\InspectionCategory;
use App\Models\InspectionItem;
use File;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class VmsService
{

    public function __construct()
    {
        //
    }

    public function getPagesData($pages)
    {

        $data[] = '';
        if ($pages == 'vehicle_add') {
            $data['vehicleType'] = VehicleType::all();

            $data['vehicleGroup'] = VehicleGroup::all();

            $data['ownershipType'] = my_database()->select("select ms.id, ms.name from master_settings ms where type=2");
        } else if ($pages == 'customer_add') {
            $data['divisions'] = my_database()->table('divisions')->orderBy('name')->get();
        } else if ($pages == 'complain_add') {
            $data['modules'] = my_database()->table('tbl_modules')->orderBy('name')->get();
        } else if ($pages == 'vendor_add') {
            $data['divisions'] = my_database()->table('divisions')->orderBy('name')->get();

            $data['vendorType'] = my_database()->select("select ms.id, ms.name from master_settings ms where type=9");
        } else if ($pages == 'document') {
            // dd(my_database());
            $data['doc_type'] = my_database()->table('doc_types')->get();
        } else if ($pages == 'maintenance') {
            $data['main_type'] = my_database()->table('maintenance_types')->get();
        } else if ($pages == 'single_vehicle' || $pages == 'vehicle_staff_add') {
            $data['vehicles_list'] = my_database()->select("select v.*, vs.staff_name, vs.phone as vs_phone, gs.imei, gs.unit_status, cd.name as cd_name from vehicles v left join vehicle_staff vs on vs.id = v.vehicle_staff_id left join gs_objects gs on gs.id = v.object_id left join combo_data cd on cd.id = gs.unit_status order by v.id desc");
        } else if ($pages == 'complain') {
            $data['modules'] = my_database()->table('tbl_modules')->orderBy('name')->get();
        } else if ($pages == 'master_setting' || $pages == 'master_setting_type') {
            $data['master_setting_module'] = my_database()->table('tbl_modules')->get();
        } else if ($pages == 'inspection_category') {
            $data['vehicleType'] = VehicleType::all();
        } else if ($pages == 'inspection_items') {
            $data['vehicleType'] = VehicleType::all();
            $data['inspectionCategory'] = InspectionCategory::all();
        } 

        return $data;
    }
}
