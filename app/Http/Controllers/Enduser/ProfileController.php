<?php

namespace App\Http\Controllers\Enduser;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\Branding;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }

    public function profile()
    {
        return view('layouts.enduser.profile.master');
    }

    public function profilePage($pages = null, $data_tab = null)
    {
        $auth_id = Auth::user()->id;
        $data['data_tab'] = $data_tab;
        if ($pages == 'profile') {

            $data['branding'] = Branding::find(1);

            $data['total_device'] =  0;
            $data['active_device'] = 0;
            $data['inactive_device'] = 0;
            $data['servicing_device'] = 0;
            $data['overdue_device'] = 0;
            $data['sold_device'] = 0;
        } else if ($pages == 'complain') {

            $data['total_complain'] = '';
            $data['solved_complain'] = '';
            $data['proccess_complain'] = '';
        }
        $data['devices'] = $this->my_connection->select("select gs.id, gs.imei, gs.device_name, gs.unit_status, cd.name as cd_name from gs_objects gs left join combo_data cd on cd.id = gs.unit_status where gs.customer_id =" . $auth_id);

        $data['tickets'] = $this->my_connection->select("select t.id, t.name as t_name from ticket_type t ");

        $data['profile'] = User::find($auth_id);
        return view('enduser.profile.' . $pages)->with($data);
    }

    public function changeInfo(Request $request, $type)
    {
        try {

            $profile = User::find($request->profile_id);

            if ($type == 'info') {

                $validationRule = [
                    'name' => 'required',
                    'phone' => 'required|numeric',
                ];

                if ($request->file('image')) {
                    $validationRule['image'] = 'required|image|mimes:jpeg,png,jpg';
                }

                $validator = Validator::make($request->all(), $validationRule);

                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }

                $this->my_connection->beginTransaction();

                $oldImg = $profile->image;
                $image = $request->file('image');
                if ($image) {
                    $imgName = date("Ymd_His");
                    $ext = strtolower($image->getClientOriginalExtension());
                    $fullName = $imgName . '.' . $ext;
                    $uploadPath = 'public/uploads/user/';
                    $uploadTo = $image->move($uploadPath, $fullName);
                    $profile->image = $fullName;
                    $image_path = $uploadPath . $oldImg;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $profile->name = $request->name;
                $profile->phone = $request->phone;
                $profile->save();
                $this->my_connection->commit();
                return true;
            }

            if ($type == 'password') {
                $validator = Validator::make($request->all(), [
                    'current_password' => ['required', new MatchOldPassword],
                    'new_password' => 'required|min:6|same:password_confirmation|different:current_password',
                    'password_confirmation' => 'required|min:6',
                ]);

                if ($validator->fails()) {
                    return $this->respondInvalidRequest($validator->errors());
                }

                $this->my_connection->beginTransaction();
                $profile->password = Hash::make($request->new_password);
                $profile->save();
                $this->my_connection->commit();

                return true;
            }
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function brandingInfo(Request $request, $type)
    {
        try {

            $find_branding = Branding::find(1);
            if ($find_branding) {
                $branding = $find_branding;
            } else {
                $branding = new Branding();
            }

            if ($type == "company_light_logo") {
                $image = $request->file('light_logo');
                $oldImg = $branding->company_light_logo;

                $validator = Validator::make($request->all(), [
                    'light_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            } else if ($type == "company_dark_logo") {
                $image = $request->file('dark_logo');
                $oldImg = $branding->company_dark_logo;

                $validator = Validator::make($request->all(), [
                    'dark_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            if ($image) {
                $imgName = date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/user/logos/';
                $uploadTo = $image->move($uploadPath, $fullName);

                if ($find_branding) {
                    $image_path = $uploadPath . $oldImg;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                if ($type == "company_light_logo") {
                    $branding->company_light_logo = $fullName;
                } else if ($type == "company_dark_logo") {
                    $branding->company_dark_logo = $fullName;
                } else if ($type == "favicon") {
                    $branding->favicon = $fullName;
                }

                $branding->save();
            }

            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }
}
