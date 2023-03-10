<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class SmsController extends Controller
{
    //
        public function index(Request $request)
        {
            $data = DB::table('sms_settings')->orderBy('id','DESC')->get();
                if ($request->ajax()) {
                    $data = DB::table('sms_settings')->orderBy('id','DESC')->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a title="Edit" href="'.route('sms.settings.edit',$row->id).'"> <i style="color:orange" class="fa fa-edit"></i></a>  <i style="color:orange" class="fa fa-edit">test</i> ';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                return view('enduser.settings.sms.index');
        }


    public function testSMS(){

    }
    public function create(){
        return view('enduser.settings.sms.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'provider_name' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);



        DB::table('sms_settings')->insert([
            'provider_name'=> $request->provider_name,
            'user_id'=> $request->user_id,
            'password'=> $request->password,
            'status'=> $request->status,
        ]);

        return redirect()->route('sms_settings_index')
                        ->with('success','Sms Settings created successfully');
    }

       public function update(Request $request,$id){
        $this->validate($request, [
            'provider_name' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $input = [
            'provider_name'=> $request->provider_name,
            'user_id'=> $request->user_id,
            'password'=> $request->password,
            'status'=> $request->status,
        ];

        $user = DB::table('sms_settings')->where('id',$id)->update($input);

        return redirect()->route('sms_settings_index')
                        ->with('success','Sms Settings updated successfully');
    }


    public function edit($id)
    {
        $user = DB::table('sms_settings')->where('id',$id)->first();
        return view('enduser.settings.sms.edit',compact('user'));
    }
}
