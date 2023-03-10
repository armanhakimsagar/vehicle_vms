<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Mockery\Undefined;

class DealerLoginController extends Controller
{
    public function __construct()
    {

    }
    public function showLoginForm()
    {
        return view('auth.dealer-login');
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
            $check_db = DB::select("select * from vms.companies where company_prefix='" . $company_prefix . "'");
            if (count($check_db) > 0) {
                $my_connection = DB::connection($check_db[0]->connection_name);
                \Session::put('my_db_connection', $check_db[0]->connection_name);

                echo $this->tenant_login($my_connection,$check_db[0]->connection_name, $user_name, $request->password, $request->remember);
            } else {
                return 'nothing happend';
            }
        }
        else{
            //call dealer/customer login function
            \Session::put('my_db_connection', 'mysql');
            echo $this->customer_login($request->username, $request->password, $request->remember);
        }
    }

    private function tenant_login($my_connection, $connection_name, $username, $password, $remember)
    {
        $first_check = $my_connection->select("select * from users where username='" . $username . "'");
        if (count($first_check) > 0) {
            $customer = $first_check[0];
            $log_data = [
                'customer_id' => $customer->id,
                'ip_address' => (getUserIp()),
                'browser' => $_SERVER['HTTP_USER_AGENT'],
                'device_model' => getUserAgent(),
                'log_type' => 1,
                'created_at' => gmdate('Y-m-d H:i:s', strtotime('+6 hours'))
            ];

            if ($customer->user_status == 1) {
                if (Hash::check($password, $customer->password)) {
                    if (Auth::guard('tenantuser')->attempt(['username' => $username, 'password' => $password], $remember)) {
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
            $my_connection->table('tenant_logs')->insert($log_data);
        } else {
            return 0;
        }
    }

    private function customer_login($username,$password,$remember)
    {
        $first_check = getTableWhere('customers', array('username' => $username));
        if (count($first_check) > 0) {
            $customer = $first_check[0];
            $log_data = [
                'customer_id' => $customer->id,
                'ip_address' => (getUserIp()),
                'browser' => $_SERVER['HTTP_USER_AGENT'],
                'device_model' => getUserAgent(),
                'log_type' => 1,
                'created_at' => gmdate('Y-m-d H:i:s', strtotime('+6 hours'))
            ];

            if ($customer->active == 1) {
                if (Hash::check($password, $customer->password)) {

                    if ($customer->actor_type == 1) {
                        if (Auth::guard('dealer')->attempt(['actor_type' => 1, 'username' => $username, 'password' => $password], $remember)) {
                            echo 3;
                        } else {
                            echo 0;
                        }
                    }
                    else if ($customer->actor_type == 2) {
                        if (Auth::guard('enduser')->attempt(['actor_type' => 2, 'username' => $username, 'password' => $password], $remember)) {
                            echo 4;
                        } else {
                            echo 0;
                        }
                    }
                    else {
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
            DB::table('customer_logs')->insert($log_data);
        } else {
            echo 0;
        }
    }
}

//DB::table('customer_logs')->insert($log_data);