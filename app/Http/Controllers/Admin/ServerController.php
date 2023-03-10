<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Hash;
use App\Models\GpsServer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = GpsServer::orderBy('id', 'DESC')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

                    <a  href='' class='custom-button-class delete_data' data-id='$id'><i class='fas fa-trash'></a>";
                })
                ->editColumn('status', function ($row) {
                    if ($row['status'] == 1) {
                        $status = '<span class="btn btn-success btn-sm"></span>';
                    } else {
                        $status = '<span class="btn btn-danger btn-sm"></span>';
                    }
                    return $status;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);

        }

        return view('admin.server.server');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.server.create');
    // echo'hello server create';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validate = Validator::make($request->all(), [
                'server_name'=> 'required',
                'opening_date'=> 'required',
                'hosting_name'=> 'required',
                'hosting_country'=> 'required',
                'hosting_real_ip'=> 'required',
                'hosting_url'=> 'required',
                'hosting_user_id'=> 'required',
                'hosting_password'=> 'required',
                'server_details'=> 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = new GpsServer();
            $server->name = $request->server_name;
            $server->opening_date = $request->opening_date;
            $server->hosting_name = $request->hosting_name;
            $server->hosting_country = $request->hosting_country;
            $server->hosting_realip = $request->hosting_real_ip;
            $server->hosting_url = $request->hosting_url;
            $server->hosting_userid = $request->hosting_user_id;
            $server->hosting_password = $request->hosting_password;
            $server->server_details = $request->server_details;
            $server->status = $request->status;
            $server->save();
            DB::commit();
            return true;

        } catch(Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $server= GpsServer::find($id);
        return view('admin.server.show', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $server= GpsServer::find($id);
        return view('admin.server.edit', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $validate = Validator::make($request->all(), [
                'server_name'=> 'required',
                'opening_date'=> 'required',
                'hosting_name'=> 'required',
                'hosting_country'=> 'required',
                'hosting_real_ip'=> 'required',
                'hosting_url'=> 'required',
                'hosting_user_id'=> 'required',
                'server_details'=> 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = GpsServer::find($id);
            $server->name = $request->server_name;
            $server->opening_date = $request->opening_date;
            $server->hosting_name = $request->hosting_name;
            $server->hosting_country = $request->hosting_country;
            $server->hosting_realip = $request->hosting_real_ip;
            $server->hosting_url = $request->hosting_url;
            $server->hosting_userid = $request->hosting_user_id;
            if($request->hosting_password){
                $server->hosting_password = $request->hosting_password;
            }
            $server->server_details = $request->server_details;
            $server->status = $request->status;
            $server->save();
            DB::commit();
            return true;

        } catch(Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  try {

        //     DB::beginTransaction();
        //     $server= GpsServer::find($id); //fetch data
        //     $server->delete(); // Data delete
        //     DB::commit();
            
        //     return true;

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return false;
        // }
    }
}
