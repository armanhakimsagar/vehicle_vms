<?php
namespace App\Classes;
class SMSClass
{
    
    /* sms functions */
    public function send_sms($message, $gsm)
    {
        $clientObj = new HttpClient();
        $mobile = $gsm;
        $username = 'support@gomaxtracker.com';
        $password = '1100';
        $message = $message;
        $sms_title = 'GO MAX GPS';

        $response = $clientObj->quickPost('http://bdsmartpay.com/sms/smsapi.php', array(
            'mobile' => $mobile,
            'message' => urlencode($message),
            'sms_title'   => 'GO MAX VMS',
            'username' => $username,
            'password' => $password
        ));

        //echo $response;
    }

    public function send_sms_nonmasking($message, $gsm)
    {
        $clientObj = new HttpClient();
        $mobile = $gsm;
        $username = 'support@gomaxtracker.com';
        $password = '1100';
        $message = $message;
        $sms_title = '';

        $response = $clientObj->quickPost('http://bdsmartpay.com/sms/smsapi.php', array(
                'mobile' => $mobile,
                'message' => urlencode($message),
                'sms_title'   => '',
                'username' => $username,
                'password' => $password
            ));

       /*  $client = new \GuzzleHttp\Client();
        $response = $client->post('http://bdsmartpay.com/sms/smsapi.php', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(array(
                'mobile' => $mobile,
                'message' => urlencode($message),
                'sms_title'   => '',
                'username' => $username,
                'password' => $password
            ))
        ]); */
               // echo 'sms api response';
        //echo var_export($response,true);
    }
}
