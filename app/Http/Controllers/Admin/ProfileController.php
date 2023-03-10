<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use File;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $profile= Auth::user();
        return view('admin.profile.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile= Auth::user();
        return view('admin.profile.change-info', compact('profile'));
        // return view('profile.change-password', compact('profile'));
    }

    public function showPages($pages=null)
    {
        $profile= Auth::user();
        return view('admin.profile.'.$pages, compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $id=  Auth::user()->id;
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }


            DB::beginTransaction();

            $profile = Auth::user();
            $oldImg = $profile->image;
            $image = $request->file('image');
            if($image){
                $imgName= date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName= $imgName.'.'.$ext;
                $uploadPath='public/uploads/user/';
                $uploadTo=$image->move($uploadPath, $fullName);
                $profile->image= $fullName;
                $image_path = $uploadPath.$oldImg;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $profile->name = $request->name;
            $profile->phone = $request->phone;
            $profile->save();
            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('profile');
        }

    }

    public function changePassForm()
    {
        return view('admin.profile.change-password');
        

    }
    
    public function storeChangePass(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => 'required|min:6|same:password_confirmation|different:current_password',
                'password_confirmation' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();            
            $profile = Auth::user();
            $profile->password = Hash::make($request->new_password);
            $profile->save();
            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('profile');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
