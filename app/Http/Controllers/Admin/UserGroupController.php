<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Hash;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::select("select g.*, (select count(id) from users where group_id=g.id) as total_users from user_groups g order by g.id desc");
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#serverModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

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

        return view('admin.usergroup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.usergroup.create');
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
                'name'=> 'required',
                'description'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = new UserGroup();
            $server->name = $request->name;
            $server->description = $request->description;
            $server->status = $request->status;
            $server->save();
            DB::commit();

            //after insert new group just add permission with default values in permission table
            $all_modules = DB::select("SELECT module_id,menu_name FROM `tbl_menus` group by module_id");

            $all_permissions = DB::select("SHOW COLUMNS FROM `user_permission` where Field NOT IN('id', 'module_id','group_id') ");
    
            foreach ($all_permissions as $p) {
                $permission_head[$p->Field] = 0;
            }
    
            foreach ($all_modules as $k => $v) {
                $all_modules[$k]->childs = $permission_head;
            }
    
            try {
                DB::beginTransaction();
                foreach ($all_modules as $m) {
                    $permission_fields = '';
                    $total_field = 0;
                    foreach ($m->childs as $k => $v) {
                        $permission_fields .= $k . '=' . $v;
                        if ($total_field < count($m->childs) - 1) {
                            $permission_fields .= ',';
                        } else {
                            $permission_fields .= '; ';
                        }
                        $total_field++;
                    }
    
                    DB::statement(" INSERT INTO user_permission(module_id,group_id) VALUES(" . $m->module_id . "," . $server->id . ") ON DUPLICATE KEY UPDATE " . $permission_fields);
                }
                DB::commit();
    
                return true;
            } catch (\Exception $e) {
                DB::rollBack();
                return false;
            }

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
        $usergroup= UserGroup::find($id);
        return view('admin.usergroup.show', compact('usergroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usergroup= UserGroup::find($id);
        return view('admin.usergroup.edit', compact('usergroup'));
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
                'name'=> 'required'
            ]);

            if ($validate->fails()) {
                return $this->respondInvalidRequest($validate->errors());
            }

            DB::beginTransaction();
            $server = UserGroup::find($id);
            $server->name = $request->name;
            $server->description = $request->description;
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
