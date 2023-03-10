<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use App\Models\MasterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class EnduserMasterSettingController extends Controller
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
        $query = $this->my_connection->select("select ms.*, mst.name as mst_name, mst.module_id, m.name as module_name  from master_settings ms left join master_settings_type mst on mst.id = ms.type left join tbl_modules m on m.id = mst.module_id order by ms.id desc");
        return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>
                <button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    function show_nested_child(Request $request, $child, $key)
    {
        $dId = $request['divId'];
        $data = $this->my_connection->select("select * from " . $child . " where " . $key . "=" . $dId);
        $htmlContent = '';
        $htmlContent = "<option value=''>Select</option>";
        foreach ($data as $d) {
            $htmlContent .= "<option value='$d->id'>$d->name</option>";
        }
        echo $htmlContent;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveData(Request $request, $id)
    {
        try {

            // dd($request->all());

            $validator = Validator::make($request->all(), [
                'type' => 'required',
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            if ($id > 0) {
                $masterSetting = MasterSetting::find($id);
            } else {
                $masterSetting = new MasterSetting();
            }
            $masterSetting->type = $request->type;
            $masterSetting->name = $request->name;
            $masterSetting->description = $request->description;
            $masterSetting->status = $request->status;
            $masterSetting->save();
            $this->my_connection->commit();
            return $masterSetting;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleData($id)
    {
        // $find = $this->my_connection->table('master_settings')->find($id);
        $find = $this->my_connection->select("select ms.*, mst.name as mst_name, mst.module_id, m.name as module_name  from master_settings ms left join master_settings_type mst on mst.id = ms.type left join tbl_modules m on m.id = mst.module_id where ms.id=" . $id);

        return response()->json($find[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
