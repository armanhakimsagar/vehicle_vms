<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\DeviceModel;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DeviceModel::orderBy('id', 'DESC')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#deviceModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#deviceModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

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

        return view('admin.device.device');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.device.create');
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
                'server_name'=> 'required',
                'server_address'=> 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $device = new DeviceModel();
            $device->name = $request->name;
            $device->server_name = $request->server_name;
            $device->server_address = $request->server_address;
            $device->status = $request->status;
            $device->save();
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
        $device= DeviceModel::find($id);
        return view('admin.device.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device= DeviceModel::find($id);
        return view('admin.device.edit', compact('device'));
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
                'server_name'=> 'required',
                'server_address'=> 'required',
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $device = DeviceModel::find($id);
            $device->name = $request->name;
            $device->server_name = $request->server_name;
            $device->server_address = $request->server_address;
            $device->status = $request->status;
            $device->save();
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
        //     $device= DeviceModel::find($id); //fetch data
        //     $device->delete(); // Data delete
        //     DB::commit();
            
        //     return true;

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return false;
        // }
    }
}
