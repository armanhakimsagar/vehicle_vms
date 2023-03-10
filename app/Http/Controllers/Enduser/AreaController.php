<?php

namespace App\Http\Controllers\Enduser;

use DB;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function getDistrict(Request $request){
        $dId = $request['divId'];
        $districts = District::select('id', 'name')->where('division_id', $dId)->orderBy('name', 'asc')->get();
        $htmlContent = '';
        $htmlContent = "<option value=''>Select</option>";
        foreach ($districts as $district) {
            $htmlContent .= "<option value='$district->id'>$district->name</option>";
        }

        echo $htmlContent;
        return;
    }

    public function getThana(Request $request){
        $dId = $request['disId'];
        $thanas = Upazila::select('id', 'name')->where('district_id', $dId)->orderBy('name', 'asc')->get();

        $htmlContent = '';
        $htmlContent = "<option value=''>Select One</option>";
        foreach ($thanas as $thana) {
            $htmlContent .= "<option value='$thana->id'>$thana->name</option>";
        }

        echo $htmlContent;
        return;

    }
}
