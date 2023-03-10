<?php

namespace App\Http\Controllers\Enduser;

use App\Models\ScheduleReport;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    private $my_connection;

    public function __construct()
    {
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
    public function index()
    {
        return view('report.report');
    }

    function generate_report(Request $request)
    {
        /* $name = $request->name;
        $type = $request->type;
        $format = $request->format;
        $show_coordinates = $request->show_coordinates;
        $show_addresses = $request->show_addresses;
        $zones_addresses = $request->zones_addresses;
        $stop_duration = $request->stop_duration;
        $speed_limit = $request->speed_limit;
        $imei_list = $request->imei; // imei list with comma ( 1234,4556,6556)
        $zone_ids = $request->zone_ids;
        $sensor_names = $request->sensor_names;
        //$data_items = $request->data_items;
        $data_items = 'route_length, engine_hour, driver,fuel_cost'; // all items with comma
        $other = $request->other;
        $dtf = $request->dtf;
        $dtt = $request->dtt; */

        $name = "My Report on ".date('Y-m-d');
        $type = 'mileage_overview';
        $format = 'pdf';
        $show_coordinates = true;
        $show_addresses = false;
        $zones_addresses = false;
        $stop_duration = '10';
        $speed_limit = '10';
        $imei_list = '353701091639910,355139089339540'; // imei list with comma ( 1234,4556,6556)
        $zone_ids = '';
        $sensor_names = '';
        //$data_items = $request->data_items;
        $data_items = ['route_start','route_end','route_length','move_duration','stop_duration','stop_count','top_speed','avg_speed','overspeed_count','fuel_consumption','avg_fuel_consumption','fuel_cost','engine_work','engine_idle','odometer','trailer', 'engine_hours', 'driver,fuel_cost']; // all items with comma
        $other = '';
        $dtf = '2020-01-01 00:00:00';
        $dtt = '2020-07-20 23:00:00';

        $imeis = explode(",", $imei_list);

        //echo 'test is ok';

        $this->reportsGenerateLoop($type, $imeis, $dtf, $dtt, $speed_limit, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses, $zone_ids, $sensor_names, $data_items, $other);
    }

    function reportsGenerateLoop($type, $imeis, $dtf, $dtt, $speed_limit, $stop_duration, $show_coordinates, $show_addresses, $zones_addresses, $zone_ids, $sensor_names, $data_items, $other)
    {
        $result = '';
        for ($i = 0; $i < count($imeis); ++$i) {
            $imei = $imeis[$i];
            if ($type == 'mileage_overview') {
                // mileage report
                $result .= '<h3> MILEAGE_DAILY </h3>';
                $result .= reportsAddReportHeader($imei, $dtf, $dtt);
                //$result .= $this->reportsGenerateMileageDaily($imei, convUserUTCTimezone($dtf), convUserUTCTimezone($dtt), $data_items);
                $result .= $this->reportsGenerateMileageDaily($imei, $dtf, $dtt, $data_items);
                $result .= '<br/><hr/>';

            }
            
            else if ($type == 'moving_overview') {
                // moving overview report
            }
            
            else {
                //general report
            }
        }
        // for general merged report 

       //share the data with view
       view()->share('result',$result);
       $pdf = PDF::loadView('report.pdf_report', $result);

        // download PDF file with download method
        return $pdf->download('pdf_mileage_overview.pdf');
       //echo $result;
    }

    function reportsGenerateMileageDaily($imei, $dtf, $dtt, $data_items) //MILEAGE_DAILY
    {

        $result = '';

        // get date ranges
        $dates = array();
        $current = strtotime($dtf);
        $last = strtotime($dtt);

        while ($current < $last) {
            $date = gmdate('Y-m-d H:i:s', $current);

            if (count($dates) == 0) {
                $dates[] = $date;
            } else {
                $dates[] = convUserUTCTimezone(substr(convUserTimezone($date), 0, 10));
            }

            $current = strtotime('+1 day', $current);
        }

        array_push($dates, $dtt);

        $rows = '';

        $total_route_length = 0;
        $total_fuel_consumption = 0;
        $total_fuel_cost = 0;
        $total_engine_hours = 0;

        for ($i = 0; $i < count($dates) - 1; ++$i) {
            $result .= $dates[$i] . '</br>';

            $data = getRoute($imei, $dates[$i], $dates[$i + 1], 1, true);

            if (count($data['route']) > 0) {

                $rows .= '<tr align="center">';

                if (in_array("time", $data_items)) {
                    $rows .= '<td>' . substr($data['route'][0][0], 0, 10) . '</td>';
                }

                if (in_array("start", $data_items)) {
                    $rows .= '<td>' . $data['route'][0][0] . '</td>';
                }

                if (in_array("end", $data_items)) {
                    $rows .= '<td>' . $data['route'][count($data['route']) - 1][0] . '</td>';
                }

                if (in_array("route_length", $data_items)) {
                    $rows .= '<td>' . ($data['route_length']/1000) . ' km </td>';
                    $total_route_length += ($data['route_length']/1000);
                }

                if (in_array("fuel_consumption", $data_items)) {
                    $rows .= '<td>' . $data['fuel_consumption'] . ' ltr </td>';
                    $total_fuel_consumption += $data['fuel_consumption'];
                }

                if (in_array("avg_fuel_consumption", $data_items)) {
                    if ($_SESSION["unit_capacity"] == 'l') {
                        $rows .= '<td>' . $data['fuel_consumption_per_100km'] . ' ltr </td>';
                    } else {
                        $rows .= '<td>' . $data['fuel_consumption_mpg'] . ' km </td>';
                    }
                }

                if (in_array("fuel_cost", $data_items)) {
                    $rows .= '<td>' . $data['fuel_cost'] . ' BDT </td>';
                    $total_fuel_cost += $data['fuel_cost'];
                }

                if (in_array("engine_hours", $data_items)) {
                    $rows .= '<td>' . getTimeDetails($data['engine_work_time'], true) . '</td>';
                    $total_engine_hours += $data['engine_work_time'];
                }

                if (in_array("driver", $data_items)) {
                    $params = $data['route'][0][6];
                    $driver =  []; //getObjectDriver($user_id, $imei, $params);
                    /* if ($driver['driver_name'] == '') {
                        $driver['driver_name'] = $la['NA'];
                    } */
                    $driver['driver_name'] = 'NA';

                    $rows .= '<td>' . $driver['driver_name'] . '</td>';
                }

                if (in_array("trailer", $data_items)) {
                    $params = $data['route'][0][6];
                    $trailer = []; // getObjectTrailer($user_id, $imei, $params);
                    /* if ($trailer['trailer_name'] == '') {
                        $trailer['trailer_name'] = $la['NA'];
                    } */
                    $trailer['trailer_name'] = 'NA';

                    $rows .= '<td>' . $trailer['trailer_name'] . '</td>';
                }

                $rows .= '</tr>';
            }
        }

        if ($rows == '') {
            return '<table><tr><td>NOTHING_HAS_BEEN_FOUND_ON_YOUR_REQUEST </td></tr></table>';
        } else {
            $result = '<table class="report" width="100%"><tr align="center">';

            if (in_array("time", $data_items)) {
                $result .= '<th>TIME</th>';
            }

            if (in_array("start", $data_items)) {
                $result .= '<th>START</th>';
            }

            if (in_array("end", $data_items)) {
                $result .= '<th>END</th>';
            }

            if (in_array("route_length", $data_items)) {
                $result .= '<th> Distance </th>';
            }

            if (in_array("fuel_consumption", $data_items)) {
                $result .= '<th>FUEL_CONSUMPTION</th>';
            }

            if (in_array("avg_fuel_consumption", $data_items)) {
                if ($_SESSION["unit_capacity"] == 'l') {
                    $result .= '<th>AVG_FUEL_CONSUMPTION_100_KM</th>';
                } else {
                    $result .= '<th>AVG_FUEL_CONSUMPTION_MPG</th>';
                }
            }

            if (in_array("fuel_cost", $data_items)) {
                $result .= '<th>FUEL_COST</th>';
            }

            if (in_array("engine_hours", $data_items)) {
                $result .= '<th> ENGINE_HOURS </th>';
            }

            if (in_array("driver", $data_items)) {
                $result .= '<th> DRIVER </th>';
            }

            if (in_array("trailer", $data_items)) {
                $result .= '<th> TRAILER </th>';
            }

            $result .= '</tr>';

            $result .= $rows;

            if (in_array("total", $data_items)) {
                $result .= '<tr align="center">';

                if (in_array("time", $data_items)) {
                    $result .= '<td></td>';
                }

                if (in_array("start", $data_items)) {
                    $result .= '<td></td>';
                }

                if (in_array("end", $data_items)) {
                    $result .= '<td></td>';
                }

                if (in_array("route_length", $data_items)) {
                    $result .= '<td>' . $total_route_length . ' km </td>';
                }

                if (in_array("fuel_consumption", $data_items)) {
                    $result .= '<td>' . $total_fuel_consumption . ' ltr </td>';
                }

                if (in_array("avg_fuel_consumption", $data_items)) {
                    if ($_SESSION["unit_capacity"] == 'l') {
                        $total_avg_fuel_consumption = 0;

                        if (($total_fuel_consumption > 0) && ($total_route_length > 0)) {
                            $total_avg_fuel_consumption = ($total_fuel_consumption / $total_route_length) * 100;
                            $total_avg_fuel_consumption = round($total_avg_fuel_consumption * 100) / 100;
                        }

                        $result .= '<td>' . $total_avg_fuel_consumption . 'ltr </td>';
                    } else {
                        $total_avg_fuel_consumption = 0;

                        if (($total_fuel_consumption > 0) && ($total_route_length > 0)) {
                            $total_avg_fuel_consumption = ($total_route_length / $total_fuel_consumption);
                            $total_avg_fuel_consumption = round($total_avg_fuel_consumption * 100) / 100;
                        }

                        $result .= '<td>' . $total_avg_fuel_consumption . 'ltr </td>';
                    }
                }

                if (in_array("fuel_cost", $data_items)) {
                    $result .= '<td>' . $total_fuel_cost . ' BDT </td>';
                }

                if (in_array("engine_hours", $data_items)) {
                    $result .= '<td>' . getTimeDetails($total_engine_hours, true) . '</td>';
                }

                if (in_array("driver", $data_items)) {
                    $result .= '<td></td>';
                }

                if (in_array("trailer", $data_items)) {
                    $result .= '<td></td>';
                }

                $result .= '</tr>';
            }

            $result .= '</table>';
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getReportType()
    {
        $report_types =  $this->my_connection->select("select rt.id, rt.name from report_types rt where parent_id>0");
        $device_list =  $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" .Auth::user()->id. " and unit_id>0 ORDER BY id DESC");
        $zone_list =  $this->my_connection->select("SELECT zone_id, zone_name FROM gs_user_zones WHERE user_id =" .Auth::user()->id);

        $htmlContent = '';
        $htmlContent = "<option value=''>Select</option>";
        foreach ($report_types as $report_type) {
            $htmlContent .= "<option value='$report_type->id'>$report_type->name</option>";
        }

        $htmlContent2 = '';
        foreach ($device_list as $d_list) {
            $d_id = $d_list->id.'_'.$d_list->server_id.'_'.$d_list->device_model;
            $htmlContent2 .= "<option value='$d_id'>$d_list->device_name</option>";
        }

        $htmlContent3 = '';
        foreach ($zone_list as $z_list) {
            $htmlContent3 .= "<option value='$z_list->zone_id'>$z_list->zone_name</option>";
        }
        $data['htmlContent'] = $htmlContent;
        $data['htmlContent2'] = $htmlContent2;
        $data['htmlContent3'] = $htmlContent3;
        // echo json_encode($data,true);
        // return $data;
        return response()->json($data);
    }

    public function reportTypeDataItem($id, $data_item_old=null)
    {
        $dataItems =  $this->my_connection->table("report_types")->select("data_item")->find($id);    
        $dataItemValue= explode(",", $dataItems->data_item);
        $htmlContent = '';
        foreach ($dataItemValue as $d_val) {
            $d_list = str_replace('_', ' ', $d_val);
            $d_list = ucwords($d_list);
            $htmlContent .= "<option value='$d_val' ";
            if($data_item_old !=null){
                foreach($data_item_old as $d_old){
                    if($d_old==$d_val){
                        $htmlContent .= "selected='selected'";
                    }
                }
            }
            $htmlContent .= ">$d_list</option>";
        }
        return $htmlContent;
    }

    public function sensorTypeData($id=null, $sensor_old=null, $device_old=null)
    {
        $htmlContent = '';

        if($id !=null){
            $device_id_list='';
            $model_id_list='';
            $server_id_list='';

            if(strrchr($id, ",")){
                $deviceList = explode(",", $id);
                $i = 0;
                foreach($deviceList as $d_list){
                    $server_model_id = explode("_", $d_list);
                    $i++;
                    if($i < count($deviceList)){
                        $device_id_list .= $server_model_id[0].",";    
                        $server_id_list .= $server_model_id[1].",";    
                        $model_id_list .= $server_model_id[2].",";    

                    } else{
                        $device_id_list .= $server_model_id[0];
                        $server_id_list .= $server_model_id[1];
                        $model_id_list .= $server_model_id[2];
                    }                 
                }
                $device_id_list = implode(',',array_unique(explode(',',$device_id_list)));
                $server_id_list = implode(',',array_unique(explode(',',$server_id_list)));
                $model_id_list = implode(',',array_unique(explode(',',$model_id_list)));

            } else {
                $server_model_id = explode("_", $id);
                $device_id_list .= $server_model_id[0];
                $server_id_list .= $server_model_id[1];
                $model_id_list .= $server_model_id[2];
            }

            //Query for sensor list
            $sensor =  $this->my_connection->select("SELECT gs.*, st.name as sensor_type_name FROM gps_sensors gs  left join master_settings st on st.id = gs.sensor_type_id  where gs.model_id IN(".$server_id_list.") and gs.server_id IN(".$model_id_list.")");
         
            foreach ($sensor as $sen) {
                $htmlContent .= "<option value='$sen->sensor_parameter_id' ";
                if($sensor_old !=null){
                    foreach($sensor_old as $s_old){
                        if($s_old==$sen->sensor_parameter_id){
                            $htmlContent .= "selected='selected'";
                        }
                    }
                }

                $htmlContent .= ">$sen->sensor_type_name</option>";
            }
            
        }

        if($sensor_old !=null){
            return $htmlContent;
        } else if($device_old !=null){
            return $device_id_list;
        } else{
            $data['htmlContent'] = $htmlContent;
            return response()->json($data);
        }
     
    }

    public function saveSeduleReportData(Request $request, $id)
    {
        try {
            $validationRule = [
                'report_name' => 'required',
                'report_type' => 'required',
                'device' => 'required',
                'data_item' => 'required',
                'send_email' => 'required|email',
            ];
            if($request->speed_limit){
                $validationRule['speed_limit'] ="required|numeric";
            }
            if($request->report_type==7){
                $validationRule['sensor'] ="required";
            }

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $show_coordinates = ($request->show_coordinates=='on') ? 1 : 0;
            $show_addresses = ($request->show_addresses=='on') ? 1 : 0;
            $start = ($request->start_date) ? Carbon::parse($request->start_date.$request->start_time)->format('Y-m-d H:i:s'): null;
            $end = ($request->end_date) ? Carbon::parse($request->end_date.$request->end_time)->format('Y-m-d H:i:s'): null;

            if ($id > 0) {         
                $scheduleReport = ScheduleReport::find($id);
            } else {
                $scheduleReport = new ScheduleReport();
                $scheduleReport->customer_id = Auth::user()->id;
            }

            $this->my_connection->beginTransaction();
            $scheduleReport->report_name = $request->report_name;
            $scheduleReport->report_type = $request->report_type;
            $scheduleReport->sensor = ($request->report_type==7) ? $request->sensor:null;
            $scheduleReport->device = $request->device;
            $scheduleReport->zone = $request->zone;
            $scheduleReport->data_item = $request->data_item;
            $scheduleReport->status = $request->report_status;
            $scheduleReport->report_format = $request->report_format;
            $scheduleReport->stop_time = $request->stop_time;
            $scheduleReport->speed_limit = $request->speed_limit;
            $scheduleReport->send_email = $request->send_email;
            $scheduleReport->schedule = $request->schedule;
            $scheduleReport->show_coordinates = $show_coordinates;
            $scheduleReport->show_addresses = $show_addresses;
            $scheduleReport->filter = $request->filter;
            $scheduleReport->start_date = $start;
            $scheduleReport->end_date = $end;
            $scheduleReport->save();
            $this->my_connection->commit();
            return true;

        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function seduleReportView( $id)
    {
        $scheduleReport = ScheduleReport::leftJoin('report_types', 'report_types.id', 'schedule_reports.report_type')->select('schedule_reports.*', 'report_types.name as report_type_name')->find($id);

        $data_item_list = ucwords(str_replace(',', ', ', str_replace('_', ' ', $scheduleReport->data_item)));

        $device_id_list = $this->sensorTypeData($scheduleReport->device, null, 1);

        $device_list =  $this->my_connection->select("SELECT device_name FROM gs_objects WHERE id IN(".$device_id_list.")");

        $zone_list =  $this->my_connection->select("SELECT  zone_name FROM gs_user_zones WHERE zone_id IN(".$scheduleReport->zone.")");

        $device_name ='';
        $zone_name ='';
        $sensor_name ='';
        $x=1;
        $y=1;
        $z=1;

        foreach($device_list as $d_name){
            if($x < count($device_list)){
                $device_name .=$d_name->device_name.", ";
            } else{
                $device_name .=$d_name->device_name;
            }
            $x++;
        }

        foreach($zone_list as $z_name){
            if($y < count($zone_list)){
                $zone_name .=$z_name->zone_name.", ";
            } else{
                $zone_name .=$z_name->zone_name;
            }
            $y++;
        }

        if($scheduleReport->sensor){
            $sensor_id_list = implode(',',array_unique(explode(',',$scheduleReport->sensor)));

            $sensor_list =  $this->my_connection->select("SELECT gs.sensor_type_id, gs.sensor_parameter_id, st.name as sensor_type_name FROM gps_sensors gs  left join master_settings st on st.id = gs.sensor_type_id  where gs.sensor_parameter_id IN(".$sensor_id_list.")");
    
            foreach($sensor_list as $s_name){
                if($z < count($sensor_list)){
                    $sensor_name .=$s_name->sensor_type_name.",";
                } else{
                    $sensor_name .=$s_name->sensor_type_name;
                }
                $z++;
            }
            $sensor_name = implode(',',array_unique(explode(',',$sensor_name)));
        }

        $data['scheduleReport'] = $scheduleReport;
        $data['data_item_list'] = $data_item_list;
        $data['device_name'] = $device_name;
        $data['zone_name'] = $zone_name;
        $data['sensor_name'] = $sensor_name;

        return view("layouts.report.schedule_report_view")->with($data);
    }

    public function getScheduleData($id)
    {
        $scheduleReport = ScheduleReport::find($id);
        $report_types =  $this->my_connection->select("select rt.id, rt.name from report_types rt where parent_id>0");
        $device_list =  $this->my_connection->select("SELECT * FROM gs_objects WHERE customer_id=" .Auth::user()->id. " and unit_id>0 ORDER BY id DESC");
        $zone_list =  $this->my_connection->select("SELECT zone_id, zone_name FROM gs_user_zones WHERE user_id =" .Auth::user()->id);
        $device = $scheduleReport->device;
        $zone = $scheduleReport->zone;
        $sensor = $scheduleReport->sensor;
        $data_item = $scheduleReport->data_item;

        if(strrchr($device, ",")){
            $device =explode(",", $device);
        } else {
            $device = [ $device];
        }
        
        if(strrchr($zone, ",")){
            $zone =explode(",", $zone);
        } else {
            $zone = [ $zone];
        }

        if($sensor !=null){
            if(strrchr($sensor, ",")){
                $sensor =explode(",", $sensor);
            } else {
                $sensor = [ $sensor];
            }
        }
        if($data_item !=null){
            if(strrchr($data_item, ",")){
                $data_item =explode(",", $data_item);
            } else {
                $data_item = [ $data_item];
            }
        }

        $htmlContent = '';
        $htmlContent = "<option value=''>Select</option>";
        foreach ($report_types as $report_type) {
            if($scheduleReport->report_type==$report_type->id){
                $htmlContent .= "<option value='$report_type->id' selected='selected'>$report_type->name</option>";
            } else{
                $htmlContent .= "<option value='$report_type->id'>$report_type->name</option>";
            }
        }

        $htmlContent2 = '';
        foreach ($device_list as $d_list) {
            $d_id = $d_list->id.'_'.$d_list->server_id.'_'.$d_list->device_model;
            $device_name=$d_list->device_name;
            $htmlContent2 .= "<option value='$d_id' ";
            foreach($device as $div){
                if($div==$d_id){
                    $htmlContent2 .= "selected='selected'";
                } 
            }
            $htmlContent2 .=">$device_name</option>";
           
        }

        $htmlContent3 = '';
        foreach ($zone_list as $z_list) {
            $htmlContent3 .= "<option value='$z_list->zone_id' ";
            foreach($zone as $z){
                if($z==$z_list->zone_id){
                    $htmlContent3 .= "selected='selected'";
                } 
            }
            $htmlContent3 .= ">$z_list->zone_name</option>";
        }

        $htmlContent4 = '';
        if($sensor !=null){
            $htmlContent4 .= $this->sensorTypeData($scheduleReport->device, $sensor);
        }

        $htmlContent5 = '';
        if($data_item !=null){
            $htmlContent5 .= $this->reportTypeDataItem($scheduleReport->report_type, $data_item);
        }

        $data['htmlContent'] = $htmlContent;
        $data['htmlContent2'] = $htmlContent2;
        $data['htmlContent3'] = $htmlContent3;   
        $data['htmlContent4'] = $htmlContent4;   
        $data['htmlContent5'] = $htmlContent5;   
        return response()->json($data);
    }
}
