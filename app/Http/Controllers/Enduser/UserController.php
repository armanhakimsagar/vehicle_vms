<?php

namespace App\Http\Controllers\Enduser;

use App\User;
use App\Models\Depertment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserGroup;
use App\Services\Enduser\UserService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller

{
    private $permission_data;
    private $my_permission;
    private $userService;
    private $my_connection;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        $this->middleware(function ($request, $next) {
            $this->permission_data = \Session::get('permission_data');
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        if ($request->ajax()) {

            $data = User::leftJoin('depertments', 'depertments.id', 'users.depertment_id')->leftJoin('user_groups', 'user_groups.id', 'users.group_id')->select(['users.*', 'user_groups.name as group_name', 'depertments.name as depertment_name'])->orderBy('users.id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#userModal' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>

                  ";
                })
                ->editColumn('user_status', function ($row) {
                    $status_color = ['badge-danger', 'badge-success', 'badge-warning'];
                    $status_name = ['Inactive', 'Active', 'On Hold'];
                    $status = '<span class=" ml-2 badge badge-pill ' . $status_color[$row->user_status] . '">' . $status_name[$row->user_status] . '</span>';
                    return $status;
                })
                ->editColumn('created_at', function ($data) {
                    $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                    return $createdDate;
                })
                ->rawColumns(['created_at', 'user_status', 'action'])
                ->make(true);
        }

        return view('enduser.dashboard.users.index');
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $data['groups'] = UserGroup::all();
        $data['depertments'] = Depertment::all();

        return view('enduser.dashboard.users.create')->with($data);
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

            $validator = $this->userService->storeValidate($request);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $user = $this->userService->storeData($request);
            $this->my_connection->commit();
            return true;

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

    public function show($id)

    {

        $user = User::find($id);

        return view('enduser.dashboard.users.show', compact('user'));
    }




    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $data['user'] = User::find($id);
        $data['groups'] = UserGroup::all();
        $data['depertments'] = Depertment::all();

        return view('enduser.dashboard.users.edit')->with($data);
    }

    public function resetPassForm($id)

    {
        $user = User::find($id);

        return view('enduser.dashboard.users.reset_pass', compact('user'));
    }

    public function resetPass(Request $request, $id)
    {
        try {

            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }
            $this->my_connection->beginTransaction();
            $password = Hash::make($request->password);
            $user = User::find($id);
            $user->password = $password;
            $user->save();
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
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

            $validator = $this->userService->updateValidate($request, $id);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();
            $user = $this->userService->updateData($request, $id);
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
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
        try {

            $this->my_connection->beginTransaction();
            $user = User::find($id); //fetch data
            $user->delete(); // Data delete
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function demo()
    {
        return view('enduser.dashboard.users.demo');
    }

    public function permission_management()
    {
        $all_groups = $this->my_connection->select("select * from user_groups");
        return view('enduser.dashboard.users.permission_management', compact('all_groups'));
    }

    public function get_permission($id)
    {
        $data = [];
        $all_modules = $this->my_connection->select("SELECT module_id,menu_name FROM `tbl_menus` group by module_id");
        $group_permission_data = $this->my_connection->select("SELECT * from user_permission where group_id=" . $id . "  group by module_id");

        $all_permissions = $this->my_connection->select("SHOW COLUMNS FROM `user_permission` where Field NOT IN('id', 'module_id','group_id') ");

        foreach ($all_permissions as $p) {
            $permission_head[$p->Field] = 0;
        }

        foreach ($all_modules as $k) {
            $k->childs = $permission_head;
            foreach ($group_permission_data as $p) {
                if ($p->module_id == $k->module_id) {
                    unset($p->id, $p->group_id);
                    $k->childs = (array) $p;
                    unset($k->childs['module_id']);
                }
            }
        }
        $data['permission_list'] = $all_modules;
        return view('enduser.dashboard.users.permission_list')->with($data);
    }

    public function save_permission()
    {
        $role_id = $_POST['group_id'];
        unset($_POST['group_id']);
        $permission_data = $_POST['all_values'];

        $all_modules = $this->my_connection->select("SELECT module_id,menu_name FROM `tbl_menus` group by module_id");

        $all_permissions = $this->my_connection->select("SHOW COLUMNS FROM `user_permission` where Field NOT IN('id', 'module_id','group_id') ");

        foreach ($all_permissions as $p) {
            $permission_head[$p->Field] = 0;
        }

        foreach ($all_modules as $k => $v) {
            $all_modules[$k]->childs = $permission_head;
            foreach ($permission_data as $p) {
                if (explode('-', $p['id'])[0] == $all_modules[$k]->module_id) {
                    $all_modules[$k]->childs[explode('-', $p['id'])[1]] = $p['val'];
                }
            }
        }

        try {
            $this->my_connection->beginTransaction();
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

                $this->my_connection->statement(" INSERT INTO user_permission(module_id,group_id) VALUES(" . $m->module_id . "," . $role_id . ") ON DUPLICATE KEY UPDATE " . $permission_fields);
            }
            $this->my_connection->commit();

            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
}
