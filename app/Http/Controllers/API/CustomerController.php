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
class CustomerController extends Controller
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

    public function saveCustomer(Request $request)
    {
        //echo $request->sim_no;
        if ($request->api_username == 'super' && $request->api_password == 'gofaijja') {
            
            $sql_string = "INSERT INTO customers(actor_type,name,email,hosting_company,username,phone,mobile,customer_name,father_name,mother_name,date_of_birth,nid_no,active,billing_address,global_status) VALUES(" .
                "'2'," .
                "'" . $request->name . "'," .
                "'" . $request->email . "'," .
                "'" . $request->hosting_company . "'," .
                "'" . $request->username . "'," .
                "'" . $request->phone . "'," .
                "'" . $request->mobile . "'," .
                "'" . $request->customer_name . "'," .
                "'" . $request->father_name . "'," .
                "'" . $request->mother_name . "'," .
                "'" . $request->date_of_birth . "'," .
                "'" . $request->nid_no . "'," .
                "'" . $request->active . "'," .
                "'" . $request->billing_address . "'," .
                "'" . $request->global_status . "'" .
                ") ON DUPLICATE KEY UPDATE actor_type=VALUES(actor_type), name=VALUES(name), email=VALUES(email), hosting_company=VALUES(hosting_company), username=VALUES(username), phone=VALUES(phone), mobile=VALUES(mobile), customer_name=VALUES(customer_name), father_name=VALUES(father_name), mother_name=VALUES(mother_name), date_of_birth=VALUES(date_of_birth), nid_no=VALUES(nid_no), active=VALUES(active), billing_address=VALUES(billing_address), global_status=VALUES(global_status)";
            $done = DB::statement($sql_string);

            if ($done) {
                echo 1;
                echo $sql_string;
            } else {
                echo 0;
            }

        } else {
            echo 'bad request';
        }
    }
    public function updateBilling(Request $request)
    {
        //echo $request->sim_no;
        if ($request->api_username == 'super' && $request->api_password == 'gofaijja') {
            
            $info = array(
                'monthly_due' => $request->monthly_due,
                'invoice_due' => $request->invoice_due
            );
            $done = DB::table('customers')->where(array('username'=>$request->username,'customer_id'=>$request->customer_id))->update($info);
            if ($done) {
                echo 1;
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
