<?php
namespace App\Classes;
class BDGateway
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
    }

    public function topup_request($mobile,$operator,$recharge_amount,$account_type,$order_number){
        $clientObj = new HttpClient();
        $mobile = $mobile;
        $operator = $operator; // code: GP,BL, RB, AT,TT,GP ST(grameenphone skito)
        $amount = $recharge_amount;
        $account_type = $account_type;
        $username = 'support@gomaxtracker.com';
        $password = '1100';
        $pin = '1100';
        $response =  $clientObj->quickPost('http://bdsmartpay.com/sms/topupapi.php', 
        array(
            'mobile' => $mobile,
            'operator' => $operator,
            'amount' => $amount,
            'account_type' => $account_type,
            'username' => $username,
            'password' => $password,
            'pin' => $pin,
            'order_number' => $order_number
        ));

        //$response = (array)json_decode(base64_decode($response));
    }

    public function topup_status($order_number){
        $clientObj = new HttpClient();
        $username = 'support@gomaxtracker.com';
        $password = '1100';
        $pin = '1100';
        $response = $clientObj->quickPost('http://bdsmartpay.com/sms/topupstatusapi.php',
        array(
            'username' => $username,
            'password' => $password,
            'pin' => $pin,
            'order_number' => $order_number
        ));

        //$response = (array)json_decode(base64_decode($response));
    }

    public function topup_balance(){
        $clientObj = new HttpClient();
        $username = 'support@gomaxtracker.com';
        $password = '1100';
        $pin = '1100';
        $response = $clientObj->quickPost('http://bdsmartpay.com/sms/topupbalanceapi.php',
        array(
            'username' => $username,
            'password' => $password,
            'pin' => $pin
        ));
        //$response = (array)json_decode(base64_decode($response));
        //echo var_export($response,true);
    }
}
