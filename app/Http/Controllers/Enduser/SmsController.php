<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Http;
use DB;

class SmsController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = DB::table('sms_settings')->orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            $data = DB::table('sms_settings')->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                            <a title="Edit" href="' . route('sms.settings.edit', $row->id) . '"> <i style="color:orange" class="fa fa-edit"></i></a>
                                <button style="border:1px solid orange" data-toggle="modal" data-target="#userModal" onclick="edit_data($id)"  ><i style="color:orange" class="fa fa-cog"></i>Test</button>      ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('enduser.settings.sms.index', compact('data'));
    }


    public function sendSMS(Request $request)
    {
        $settings = DB::table('sms_settings')->orderBy('id', 'DESC')->first();

        if($settings->status=='YES'){


            $url = "http://bdsmartpay.com/sms/smsapi.php";
            $data = array(
                'username' => $settings->user_id,
                'password' => $settings->password,
                'sms_title' => urlencode("GO MAX GPS"),
                'message' => urlencode($request->message),
                'mobile' => $request->mobile
            );
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            $result =  curl_exec($curl);


            DB::table('sms_log')->insert([
                'number'=>$request->mobile,
                'message'=>$request->message,
                'status'=>$settings->status,
            ]);

            return redirect()->route('sms_settings_index')
            ->with('success', 'Sms send successfully');


        }else{

            return redirect()->route('sms_settings_index')
            ->with('error', 'Sms send failed');

        }
   
    }


    public function smsLog(Request $request){
        if ($request->ajax()) {
            $data = DB::table('sms_log')->orderBy('id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('enduser.settings.sms.sms_log');
    }



    public function create()
    {
        return view('enduser.settings.sms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'provider_name' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);



        DB::table('sms_settings')->insert([
            'provider_name' => $request->provider_name,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'status' => $request->status,
        ]);

        return redirect()->route('sms_settings_index')
            ->with('success', 'Sms Settings created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'provider_name' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $input = [
            'provider_name' => $request->provider_name,
            'user_id' => $request->user_id,
            'password' => $request->password,
            'status' => $request->status,
        ];

        $user = DB::table('sms_settings')->where('id', $id)->update($input);

        return redirect()->route('sms_settings_index')
            ->with('success', 'Sms Settings updated successfully');
    }


    public function edit($id)
    {
        $user = DB::table('sms_settings')->where('id', $id)->first();
        return view('enduser.settings.sms.edit', compact('user'));
    }
}
