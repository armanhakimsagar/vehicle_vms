<?php
namespace App\Classes;
class EmailClass
{
    private $my_connection;

    public function __construct()
    {
        //$this->middleware(function ($request, $next) {
            $this->my_connection = \DB::connection(\Session::get('my_db_connection'));
            //return $next($request);
        //});
    }

    public function send_smtp_mail(){
        $data = $this->my_connection->select('select meta_value from settings where meta_key="email_settings"')[0];
        echo json_encode($data,true);
    }

    public function sendEmail($to=null,$subject=null,$message=null,$headers=null,$parameters=null){
        $settings_data = $this->my_connection->select('select meta_value from settings where meta_key="business_settings"')[0];
        $from = json_decode($settings_data->meta_value,true)['email'];
        if(mail($to,$subject,$message,$headers)){
            echo 1;
        }
        else{
            echo 0;
        }
    }
   
}
