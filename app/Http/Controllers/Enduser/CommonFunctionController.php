<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonFunctionController extends Controller
{
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function commonData(Request $request)
    {

        $string = "select id, " . $request->column . " as column_name from " . $request->table;
        if ($request->condition) {
            $string .= " " . $request->condition;
        }
        $string .= " order by " . $request->column . " asc";
        $query = $this->my_connection->select($string);

        $htmlContent = "<option value=''>Select</option>";

        if ($query) {
            foreach ($query as $q) {
                $htmlContent .= "<option value='$q->id'";

                if ($request->selected && $request->selected == $q->id) {
                    $htmlContent .= "selected";
                }

                $htmlContent .= ">$q->column_name</option>";
            }
        }

        return  $htmlContent;
    }

    public function assigedStaff($id)
    {
        $query = $this->my_connection->select("select * from vehicle_staff where assigned_vehicle = " . $id . " order by staff_type asc");

        return  $query;
    }

    public function getContent(Request $request, $type)
    {
        $data['idIndex'] = $request->idIndex;
        return view('enduser.dashboard.modal_content.' . $type)->with($data);
    }

    public function fetchFilteredData(Request $request, $type)
    {
        $item = $request->q;
        // dd($request->all());

        $data = [];
        if ($type == 'carrying_type') {
            $query = "SELECT *, name as text FROM master_settings WHERE  name LIKE '%" . $item . "%' AND type=15";
        } else if ($type == 'trip_package') {
            $query = "SELECT *, name as text FROM master_settings WHERE  name LIKE '%" . $item . "%' AND type=13";
        } else if ($type == 'vehicle') {
            $query = "SELECT *, vehicle_no as text FROM vehicles WHERE booked=0  AND vehicle_no LIKE '%" . $item . "%'";
        } else if ($type == 'customer') {
            $query = "SELECT *, name as text FROM customers WHERE name LIKE '%" . $item . "%'";
        }
        $data = $this->my_connection->select($query);
        echo json_encode($data, true);
    }
}
