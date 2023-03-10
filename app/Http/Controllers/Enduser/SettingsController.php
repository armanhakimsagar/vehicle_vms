<?php

namespace App\Http\Controllers\Enduser;

use App\Classes\EmailClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class SettingsController extends Controller
{
    private $my_connection;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settingPages($pages = null)
    {

        $data = [];
        if ($pages == 'master_setting' || $pages == 'master_setting_type') {
            $data['master_setting_module'] = $this->my_connection->table('tbl_modules')->get();
            $data['master_setting_types'] = $this->my_connection->table('master_settings_type')->get();
        } else if ($pages == 'email_setting') {
            $email_settings = $this->my_connection->table('settings')->where('meta_key', 'email_settings')->first();
            $data['email_settings'] = json_decode($email_settings->meta_value, true);
        } else if ($pages == 'business_setting') {
            $business_settings = $this->my_connection->table('settings')->where('meta_key', 'business_settings')->first();
            $data['business_settings'] = json_decode($business_settings->meta_value, true);
        } else if ($pages == 'localization') {
            $localization = $this->my_connection->table('settings')->where('meta_key', 'localization')->first();
            $data['localization'] = json_decode($localization->meta_value, true);
        } else if ($pages == 'payment_method') {
            $data['methods'] =  $this->my_connection->table('payment_method')->get();
        }
        return view('enduser.dashboard.setting.' . $pages)->with($data);
    }

    public function saveData(Request $request, $meta_key)
    {
        // dd($request->all());
        try {
            $validationRule = [];

            if ($meta_key == 'email_settings') {
                $validationRule = [
                    'send_email_by' => 'required',
                    'system_email' => 'required|email',
                    'smtp_host' => 'required',
                    'smtp_username' => 'required',
                    'smtp_password' => 'required',
                    'smtp_port' => 'required',
                    'smtp_secure' => 'required',
                ];
            } else if ($meta_key == 'localization') {
                $validationRule = [
                    'currency' => 'required',
                ];
            } else if ($meta_key == 'business_settings') {
                $validationRule = [
                    'business_name' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email',
                    'address_1' => 'required',
                    'city' => 'required',
                    'phone' => 'required|numeric',
                ];
            }

            $validator = Validator::make($request->all(), $validationRule);

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $this->my_connection->beginTransaction();

            if ($meta_key == 'email_settings') {
                $data = [
                    'mail_by' => $request->send_email_by,
                    'sender' => $request->system_email,
                    'smtp_host' => $request->smtp_host,
                    'smtp_username' => $request->smtp_username,
                    'smtp_password' => $request->smtp_password,
                    'smtp_port' => $request->smtp_port,
                    'smtp_secure' => $request->smtp_secure,
                ];
            } else if ($meta_key == 'localization') {
                $data = [
                    'default_language' => $request->default_language,
                    'date_format' => $request->date_format,
                    'time_format' => $request->time_format,
                    'currency_format' => $request->currency_format,
                    'currency' => $request->currency
                ];
            } else if ($meta_key == 'business_settings') {
                $data = [
                    'business_type' => $request->business_type,
                    'business_name' => $request->business_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'website' => $request->website,
                    'tin' => $request->tin,
                    'vat' => $request->vat,
                    'bin' => $request->bin,
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip' => $request->zip,
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'mobile' => $request->mobile,
                    'fax' => $request->fax,
                    'logo_image' => $request->old_logo_image,
                ];

                $photo = $request->file('logo_image');
                $old_photo = $request->old_logo_image;
                if ($photo) {
                    $imgName = date("Ymd_His");
                    $ext = strtolower($photo->getClientOriginalExtension());
                    $fullName = $imgName . '.' . $ext;
                    $uploadPath = 'public/uploads/business_logo/';
                    $uploadTo = $photo->move($uploadPath, $fullName);
                    $data['logo_image'] = $fullName;

                    $image_path = $uploadPath . $old_photo;
                    if (File::exists($image_path) && $old_photo != null) {
                        File::delete($image_path);
                    }
                }
            }

            $final =  json_encode($data);
            $this->my_connection->update("update settings set meta_value='" . $final . "' where meta_key='" . $meta_key . "'");
            $this->my_connection->commit();
            return true;
        } catch (\Exception $e) {
            $this->my_connection->rollBack();
            return false;
        }
    }

    public function send_email(Request $request)
    {
        /* $email_data = new EmailClass();
        $email_data->mail_settings();
        $to_email = $request->email;
        \Mail::send('enduser.email_content', ['message'=>'I am just testing email from vms'], function ($message) {
            $message->to("meneva92@gmail.com")->subject('Test Email from VMS');
        }); */


        //echo var_export($email_data->mail_settings(),true);
        $email_data = new EmailClass();
        $to = 'jeweltest@gomaxtracker.com';
        $subject = "Email test from VMS";
        $message = "";
        $headers = "From info@gomaxautomation.com";
        $email_data->sendEmail($to, $subject, $message, $headers);
    }
}
