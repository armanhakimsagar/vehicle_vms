<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Hash;
use App\Models\GatewayIntegration;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = GatewayIntegration::orderBy('id', 'DESC')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#gatewayModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#gatewayModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

                    <a  href='' class='custom-button-class delete_data' data-id='$id'><i class='fas fa-trash'></a>";
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $status = '<span class="btn btn-success btn-sm"></span>';
                    } else {
                        $status = '<span class="btn btn-danger btn-sm"></span>';
                    }
                    return $status;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);

        }

        return view('admin.gateway.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.gateway.create');
    // echo'hello gateway create';
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
                'name'=> 'required',
                'api_endpoint'=> 'required',
                'username'=> 'required',
                'password'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = new GatewayIntegration();
            $server->name = $request->name;
            $server->api_endpoint = $request->api_endpoint;
            $server->username = $request->username;
            $server->password = $request->password;
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
        $gateway= GatewayIntegration::find($id);
        return view('admin.gateway.show', compact('gateway'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gateway= GatewayIntegration::find($id);
        return view('admin.gateway.edit', compact('gateway'));
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
                'name'=> 'required',
                'api_endpoint'=> 'required',
                'username'=> 'required',
                'password'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = GatewayIntegration::find($id);
            $server->name = $request->name;
            $server->api_endpoint = $request->api_endpoint;
            $server->username = $request->username;
            $server->password = $request->password;
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
