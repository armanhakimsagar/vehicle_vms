<?php

namespace App\Http\Controllers\Enduser;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

class PaymentGatewayController extends Controller
{
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function index()
    {

        $data = $this->my_connection->table('payment_gateway')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $id = $row->id;

                return "<button type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
            })
            ->editColumn('gateway_logo', function ($row) {
                if ($row->gateway_logo) {
                    return $img = "<img  style='width:48px; height:auto;' src='" . url('public/uploads/gateway_logo/' . $row->gateway_logo) . "' alt='Image'/>";
                } else {
                    return $img = "<img  style='width:48px; height:auto;' src='" . url('assets/media/users/default.jpg') . "' alt='Image'/>";
                }

            })
            ->editColumn('status', function ($row) {
                if ($row->status==1) {
                    return '<span class="ml-2 badge badge-pill badge-success">Active</span>';
                } else {
                    return '<span class="ml-2 badge badge-pill badge-warning">Inactive</span>';
                }
            })
            ->rawColumns(['gateway_logo', 'status','action'])
            ->make(true);
    }

    public function saveData(Request $request, $id)
    {
        // dd($request->all());
        try {
            $validationRule = [
                'title' => 'required',
            ];

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            if ($id > 0) {
                $payment_gateway =  $this->my_connection->table('payment_gateway')->find($id);
                $oldImg = $payment_gateway->gateway_logo;
            }
            $data = [
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
            ];

            $photo = $request->file('logo');
            if ($photo) {
                $imgName = date("Ymd_His");
                $ext = strtolower($photo->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/gateway_logo/';
                $uploadTo = $photo->move($uploadPath, $fullName);
               $data['gateway_logo'] = $fullName;
                if ($id > 0) {
                    $image_path = $uploadPath . $oldImg;
                    if (File::exists($image_path) && $oldImg != null) {
                        File::delete($image_path);
                    }
                }
            }
            if($id>0){
                $this->my_connection->table('payment_gateway')->where('id', $id)->update($data);
            } else{
                $this->my_connection->table('payment_gateway')->insert($data);
            }

            $this->my_connection->commit();
            return true;

        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function saveMethod(Request $request, $id)
    {
        // dd($request->all());
        try {
            $validationRule = [
                'method_name' => 'required',
            ];

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            $data = [
                'method_name'=>$request->method_name,
            ];

            if($id>0){
                $this->my_connection->table('payment_method')->where('id', $id)->update($data);
            } else{
                $this->my_connection->table('payment_method')->insert($data);
            }

            $this->my_connection->commit();
            return true;

        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

     public function showGateway($id)
     {
        $payment_gateway =  $this->my_connection->table('payment_gateway')->find($id);
        return response()->json($payment_gateway);
     }

     public function showMethod($id)
     {
        $payment_method =  $this->my_connection->table('payment_method')->find($id);
        return response()->json($payment_method);
     }
}
