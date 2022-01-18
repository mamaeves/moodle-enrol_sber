<?php
require_once('../../config.php');

$instanceid = required_param('instanceid',PARAM_INT);

$instance = $DB->get_record('enrol',['id'=>$instanceid]);

$amount = $instance->cost*100;

$orderNumber = required_param('orderNumber',PARAM_ALPHANUMEXT);
$returnUrl = required_param('returnUrl',PARAM_URL);

$username = get_config('enrol_sber','username');
$password = get_config('enrol_sber','password');

$registerUrl=get_config('enrol_sber', 'registerurl');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$registerUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"amount=".$amount."&orderNumber=".$orderNumber."&returnUrl=".$returnUrl."&userName=".$username."&password=".$password);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close ($ch);

if ($json=json_decode($response)) {
    //print_r($json);
    $orderId=$json->orderId;
    $formUrl=$json->formUrl;
    
    $sberrec=new stdClass();
    $sberrec->courseid = $instance->courseid;
    $sberrec->userid = $USER->id;
    $sberrec->instanceid = $instance->id;
    $sberrec->amount = $amount/100;
    $sberrec->orderid = $orderId;
    $sberrec->ordernumber = $orderNumber;
    $sberrec->timeupdated = time();
    
    if (!$DB->record_exists('enrol_sber', ['courseid'=>$instance->courseid,'userid'=>$USER->id,'instanceid'=>$instance->id,'ordernumber'=>$orderNumber])) {
        $DB->insert_record('enrol_sber', $sberrec);
    }
    
    redirect($formUrl);
    
}