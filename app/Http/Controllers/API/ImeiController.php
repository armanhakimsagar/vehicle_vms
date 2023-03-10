<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\User;
use App\Models\Customer;
use App\Models\GpsServer;
use App\Models\DeviceModel;
use App\Models\GsObject;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Config;
class ImeiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'ssytem imei';
        //echo Config::get('app.MEHSUPERUSER');
    }

    public function saveImei(Request $request)
    {
        //echo $request->sim_no;
        if ($request->username == 'super' && $request->password == 'gofaijja') {
            
            $sql_string = "INSERT INTO gs_objects(imei,device_name,server_id,device_model,opening_date,crm_autosync,crm_customer_id,sim_number,sim_type,sim_status,status,tu_package_type,unit_id,unit_status,device_source) VALUES(" .
                "'" . $request->imei_no . "'," .
                "'" . $request->device_name . "'," .
                "'1'," .
                "'" . $request->model_id . "'," .
                "'" . $request->opening_date . "'," .
                "'" . $request->crm_autosync . "'," .
                "'" . $request->customer_id . "'," .
                "'" . $request->sim_number . "'," .
                "'" . $request->sim_type . "'," .
                "'" . $request->sim_status . "'," .
                "'" . $request->status . "'," .
                "'" . $request->tu_package_type . "'," .
                "'" . $request->unit_id . "'," .
                "'" . $request->unit_status . "'," .
                "'" . $request->device_source . "'" .
                ") ON DUPLICATE KEY UPDATE imei=VALUES(imei), device_name=VALUES(device_name), server_id=VALUES(server_id), device_model=VALUES(device_model), opening_date=VALUES(opening_date), crm_autosync=VALUES(crm_autosync), crm_customer_id=VALUES(crm_customer_id), sim_number=VALUES(sim_number), sim_type=VALUES(sim_type), sim_status=VALUES(sim_status), status=VALUES(status), tu_package_type=VALUES(tu_package_type), unit_id=VALUES(unit_id), unit_status=VALUES(unit_status), device_source=VALUES(device_source)";
            $done = DB::statement($sql_string);

            if ($done) {
                echo 1;
                //echo $sql_string;
            } else {
                echo 0;
            }

        } else {
            echo 'bad request';
        }
    }

    


    public function showTree($id)
    {

        $result = DB::select('select c.*, s.name as global_status_name, s.other_value as status_color, (select count(id) from gs_objects as total_device where customer_id=c.id) as total_device, (select count(id) from gs_objects where customer_id IN(select id from customers where parent_id=c.id)) as total_child_device  from customers c left join combo_data s on s.id = c.global_status');

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

        echo json_encode(createTreeview($id, $menus, 'json'));
    }
}
