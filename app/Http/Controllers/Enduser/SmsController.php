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
        $data = DB::table('sms_settings')->orderBy('id', 'DESC')->first();
        $url = "http://bdsmartpay.com/sms/smsapi.php";

        $data = array(
            'username' => $data->user_id,
            'password' => $data->password,
            'sms_title' => urlencode("GO MAX GPS"),
            'message' => urlencode($request->message),
            'mobile' => $request->mobile
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        $result =  curl_exec($curl);

        /*
        $data = DB::table('sms_settings')->orderBy('id', 'DESC')->first();

        $sms_title = urlencode("GO MAX GPS");
        $username= $data->user_id;
        $password = $data->password;
        $mobile = $request->mobile;
        $message = urlencode($request->message);

        $url="https://bdsmartpay.com/sms/smsapi.php?username=$username&password=$password&sms_title=$sms_title&mobile=$mobile&message=$message";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                $result =  curl_exec($curl);
        */
        return view('enduser.settings.sms.create');
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
