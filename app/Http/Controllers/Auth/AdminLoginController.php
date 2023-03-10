<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\UserAgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{

    public $userAgentController;

    public function __construct(UserAgentController $userAgentController)
    {
        $this->userAgentController = $userAgentController;
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        $system_config = DB::select("select sc.*, lt.template_slug, lt.template_logo, lt.template_bg, lt.template_heading  from system_config sc left join login_templates lt on lt.id = sc.login_template_id where sc.id = 1");
        $page = $system_config[0]->template_slug;
        $data['system_config'] = $system_config[0];

        return view('auth.' . $page)->with($data);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return $this->respondInvalidRequest($validator->errors());
        }

        $company_prefix = explode('.', $request->username)[0];
        if (isset(explode('.', $request->username)[1])) {
            $user_name = explode('.', $request->username)[1];
            $check_db = DB::select("select * from companies where company_prefix='" . $company_prefix . "'");

            if (count($check_db) > 0) {
                $my_connection = DB::connection($check_db[0]->connection_name);

                // dd($my_connection);

                \Session::put('my_db_connection', $check_db[0]->connection_name);

                echo $this->admin_user_login($my_connection, $check_db[0]->connection_name, $user_name, $request->password, $request->remember);
            } else {
                return 'nothing happend';
            }
        } else {
            //call dealer/customer login function
            \Session::put('my_db_connection', 'mysql');
            echo $this->system_user_login($request->username, $request->password, $request->remember);
        }
    }

    private function system_user_login($username, $password, $remember)
    {
        $first_check = getTableWhere('users', array('username' => $username));
        if (count($first_check) > 0) {
            $user = $first_check[0];
            $log_data = [
                'user_id' => $user->id,
                'ip_address' => $this->userAgentController->getDetails('ip'),
                'browser' => $this->userAgentController->getBrowser(),
                'device_model' => $this->userAgentController->getOS(),
                'location' => $this->userAgentController->getDetails('loc'),
                'organization' => $this->userAgentController->getDetails('org'),
                'city' => $this->userAgentController->getDetails('city'),
                'region' => $this->userAgentController->getDetails('region'),
                'country' => $this->userAgentController->getDetails('country'),
                'details' => $this->userAgentController->getDetails('details'),
                'log_type' => 1,
                'created_at' => gmdate('Y-m-d H:i:s', strtotime('+6 hours'))
            ];

            if ($user->user_status == 1) {
                if (Hash::check($password, $user->password)) {

                    if ($user->user_type == 1) {
                        if (Auth::guard('system_admin')->attempt(['username' => $username, 'password' => $password], $remember)) {
                            $group_permission_data = DB::select("SELECT m.module_id, t.menu_name, m.can_list, m.can_view, m.can_create, m.can_update, m.can_delete FROM user_permission m left join tbl_menus t on t.module_id = m.module_id where m.group_id=" . $user->group_id . "  group by m.module_id");
                            \Session::put('permission_data', $group_permission_data);

                            $permitted_menu = generate_sidebar_menu();
                            \Session::put('permitted_menu_list', $permitted_menu);
                            echo 3;
                        } else {
                            echo 0;
                        }
                    } else if ($user->user_type == 2) {
                        if (Auth::guard('enduser')->attempt(['username' => $username, 'password' => $password], $remember)) {
                            echo 3;
                        } else {
                            echo 0;
                        }
                    } else {
                        echo 0;
                    }
                    $log_data['status'] = 1;
                    $log_data['note'] = 'success';
                } else {
                    $log_data['status'] = 0;
                    $log_data['note'] = 'password_mismatch';
                    echo 1;
                }
            } else {
                $log_data['status'] = 2;
                $log_data['note'] = 'not_active';
                echo 2;
            }
            DB::table('admin_logs')->insert($log_data);
        } else {
            echo 0;
        }
    }

    private function admin_user_login($my_connection, $connection_name, $username, $password, $remember)
    {
        $first_check = $my_connection->select("select * from users where username='" . $username . "'");

        if (count($first_check) > 0) {
            $user = $first_check[0];
            $log_data = [
                'user_id' => $user->id,
                'ip_address' => $this->userAgentController->getDetails('ip'),
                'browser' => $this->userAgentController->getBrowser(),
                'device_model' => $this->userAgentController->getOS(),
                'location' => $this->userAgentController->getDetails('loc'),
                'organization' => $this->userAgentController->getDetails('org'),
                'city' => $this->userAgentController->getDetails('city'),
                'region' => $this->userAgentController->getDetails('region'),
                'country' => $this->userAgentController->getDetails('country'),
                'details' => $this->userAgentController->getDetails('details'),
                'log_type' => 1,
                'created_at' => gmdate('Y-m-d H:i:s', strtotime('+6 hours'))
            ];

            if ($user->user_status == 1) {

                if (Hash::check($password, $user->password)) {

                    if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $remember)) {

                        echo 4;
                    } else {
                        echo 0;
                    }
                    $log_data['status'] = 1;
                    $log_data['note'] = 'success';
                } else {
                    $log_data['status'] = 0;
                    $log_data['note'] = 'password_mismatch';
                    return 1;
                }
            } else {
                $log_data['status'] = 2;
                $log_data['note'] = 'not_active';
                return 2;
            }
            $my_connection->table('admin_logs')->insert($log_data);
        } else {
            return 0;
        }
    }
}
