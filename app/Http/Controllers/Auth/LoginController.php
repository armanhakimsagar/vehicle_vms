<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('auth:dealer')->except('logout');
    }
    public function showLoginForm(){
        $system_config = DB::select("select sc.*, lt.template_slug, lt.template_logo, lt.template_bg, lt.template_heading  from system_config sc left join login_templates lt on lt.id = sc.login_template_id where sc.id = 1");
        $page = $system_config[0]->template_slug;
        $data['system_config'] = $system_config[0];

        return view('auth.'.$page)->with($data);
    }
}
