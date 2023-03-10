<?php

namespace App\Http\Controllers\Enduser;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class LogsController extends Controller
{
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function userLoginHistory(Request $request, $type = null)
    {
        if ($request->ajax()) {

            if ($type == 'all') {
                $data = $this->my_connection->select("select al.*, u.name, u.username from admin_logs al left join users u on u.id = al.user_id order by al.id desc");
            } else {
                $data = $this->my_connection->select("select al.*, u.name, u.username from admin_logs al left join users u on u.id = al.user_id where al.user_id= " . Auth::user()->id . " order by al.id desc");
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    if ($data->status == 0) {
                        return "Password mismatch";
                    } else if ($data->status == 1) {
                        return "Success";
                    } else if ($data->status == 2) {
                        return "Account inactive";
                    }
                })
                ->editColumn('location', function ($data) {
                    $location = '<a href="https://www.google.com/maps?q=' . $data->location . '&t=m"
        target="_blank">' . $data->city . ', ' . $data->country . '</a>';
                    return $location;
                })
                ->editColumn('created_at', function ($data) {
                    $createdDate = Carbon::parse($data->created_at)->format('d M Y, h:i a');
                    return $createdDate;
                })
                ->rawColumns(['created_at', 'location', 'action'])
                ->make(true);
        }

        return view('enduser.dashboard.logs.user_login_history');
    }
}
