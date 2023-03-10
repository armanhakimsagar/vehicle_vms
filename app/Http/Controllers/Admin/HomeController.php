<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dropdown_list = generate_dropdown('html',true,'vehicle_groups', 'name', 'vehicles', 'vehicle_group_id', 'vehicle_name','vehicle_no');
        $data['select_list'] = $dropdown_list;

       return view('admin.home')->with($data);
    }
}
