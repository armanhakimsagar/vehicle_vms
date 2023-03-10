<?php
	
	//$user_id = \Auth::user()->id;
	
	function load_last_event($user_id,$last_event_id){
		$q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='".$user_id."' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '".$user_id."')";

		if ($last_event_id == -1)
		{
			$q .= " ORDER BY event_id DESC LIMIT 1";
		}
		else
		{
			$q .= " AND `event_id`>'".$last_event_id."' ORDER BY event_id ASC";
		}

		$res = \DB::select($q);
		if(count($res)>0){
			foreach($res as $r){
				if($r->name==''){
					$r->name = getObjectName($r->imei);
				}
				$r->dt_server = gmdate($r->dt_server, strtotime('+ 6 hour'));
				$r->dt_tracker = gmdate($r->dt_tracker, strtotime('+ 6 hour'));
			}
		}
		return $res;
	}

	function load_event_data($user_id,$event_id){
		$q = "SELECT * FROM `gs_user_last_events_data` WHERE `user_id`='".$user_id."' AND `event_id`='".$event_id."' AND `imei` IN (SELECT imei FROM gs_objects WHERE customer_id = '".$user_id."') LIMIT 1";

		$res = \DB::select($q);
		if(count($res)>0){
			foreach($res as $r){
				if($r->name==''){
					$r->name = getObjectName($r->imei);
				}
				$r->speed = convSpeedUnits($r->speed, 'km', 'km');
				$r->altitude = convAltitudeUnits($r->altitude, 'km', 'km');
			
				$params = json_decode($r->params,true);
			
				$result = array('name' => $r->name,
					'imei' => $r->imei,
					'event_desc' => $r->event_desc,
					'dt_server' => gmdate($r->dt_server, strtotime('+ 6 hour')),
					'dt_tracker' => gmdate($r->dt_tracker, strtotime('+ 6 hour')),
					'lat' => $r->lat,
					'lng' => $r->lng,
					'altitude' => $r->altitude,
					'angle' => $r->angle,
					'speed' => $r->speed,
					'params' => $params);	
			}
		}
		return $result;
	}

?>