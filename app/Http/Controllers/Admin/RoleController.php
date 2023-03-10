<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    // function __construct()

    // {

    //     $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);

    //     $this->middleware('permission:role-create', ['only' => ['create', 'store']]);

    //     $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);

    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index( Request $request)
    {
        if ($request->ajax()) {

            $data = Role::orderBy('roles.id', 'DESC')->get();
                return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id= $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#roleModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
                })
                ->editColumn('guard_name', function ($row) {
                    $guardName = ($row->guard_name=='admin') ? 'Admin' : 'Web';
                    return $guardName;
                })
                ->rawColumns(['guard_name', 'action'])
                ->make(true);

        }
        return view('admin.roles.index');
    }
    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        // $permission = Permission::get();
        return view('admin.roles.create');
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        try {

            $validator = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,name',
            ]);
    
            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();
            $role = new Role;
            $role->name = $request->role_name;
            $role->guard_name = $request->guard_name;
            $role->save();
            DB::commit();
            return true;

        } catch (\Exception $e) {
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

        $role = Role::find($id);

        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")

            ->where("role_has_permissions.role_id", $id)

            ->get();



        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $role = Role::find($id);

        // $permission = Permission::get();

        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)

        //     ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')

        //     ->all();



        return view('admin.roles.edit', compact('role'));
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

        try {

            $validator = Validator::make($request->all(), [
                'role_name' => ['required', Rule::unique('roles', 'name')->ignore($id)],
            ]);
    
            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();
            $role = Role::find($id);
            $role->name = $request->role_name;
            $role->guard_name = $request->guard_name;
            $role->save();
            DB::commit();
            return true;

        } catch (\Exception $e) {
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

        DB::table("roles")->where('id', $id)->delete();

        return redirect()->route('roles.index')

            ->with('success', 'Role deleted successfully');
    }
}
