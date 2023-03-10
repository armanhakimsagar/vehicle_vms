<?php

namespace App\Services\Enduser;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\District;
use App\Models\Upazila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public $user;

    public function __construct()
    {
        //
    }

    public function storeData(Request $request)
    {
        $user = new User();
        $image = $request->file('image');
        if ($image) {
            $imgName = date("Ymd_His");
            $ext = strtolower($image->getClientOriginalExtension());
            $fullName = $imgName . '.' . $ext;
            $uploadPath = 'public/uploads/user/';
            $uploadTo = $image->move($uploadPath, $fullName);
            $user->image = $fullName;
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->group_id = $request->group;
        $user->user_type = $request->user_type;
        $user->depertment_id = $request->depertment;
        $user->user_status = $request->user_status;
        $user->skype_id = $request->skype_id;
        $user->employment_id = $request->employment_id;
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    public function updateData(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->employment_id = $request->employment_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $user->group_id = $request->group;
        $user->depertment_id = $request->depertment;
        $user->user_status = $request->user_status;
        $user->skype_id = $request->skype_id;
        $oldImg = $user->image;
        $image = $request->file('image');
        if ($image) {
            $imgName = date("Ymd_His");
            $ext = strtolower($image->getClientOriginalExtension());
            $fullName = $imgName . '.' . $ext;
            $uploadPath = 'public/uploads/user/';
            $uploadTo = $image->move($uploadPath, $fullName);
            $user->image = $fullName;
            $image_path = $uploadPath . $oldImg;
            if (File::exists($image_path) && $oldImg != null) {
                File::delete($image_path);
            }
        }
        $user->save();
        return $user;
    }

    public function storeUserFromCustomer(Request $request, $id)
    {
        if ($id > 0) {
            $user = User::find($id);
        } else {
            $user = new User();
        }

        $user->name = $request->customer_name;
        $user->email = $request->company_email;
        $user->phone = $request->sms_phone;
        $user->mobile = $request->emergency_phone;
        $user->username = $request->system_username;
        if ($request->system_password) {
            $user->password = Hash::make($request->system_password);
        }
        $user->group_id = 0;
        $user->user_type = 2;
        $user->depertment_id = 0;
        $user->user_status = 1;
        $user->save();
        return $user;
    }

    public function storeValidate(Request $request)
    {
        $validationRule = [
            'name' => 'required',
            'username' => 'required|min:4|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'group' => 'required',
            'depertment' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];

        $validate = Validator::make($request->all(), $validationRule);

        return $validate;
    }

    public function updateValidate(Request $request, $id)
    {
        $validationRule = [
            'name' => 'required',
            'username' => ['required', 'min:4', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($id)],
        ];

        $validate = Validator::make($request->all(), $validationRule);

        return $validate;
    }
}
