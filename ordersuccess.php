<?php

require_once('../../config.php');
require_once($CFG->libdir.'/enrollib.php');

$orderid = required_param('orderId',PARAM_ALPHANUMEXT);

$sberrec=$DB->get_record('enrol_sber',['orderid' => $orderid]);

$username = get_config('enrol_sber','username');
$password = get_config('enrol_sber','password');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"orderId=".$orderid."&userName=".$username."&password=".$password);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close ($ch);

$data=json_decode($response);

if ($data->errorCode == 0) {
    if ($data->orderStatus == 2) {
        
        $DB->execute("update {enrol_sber} set payment_status=:payment_status where ordernumber=:order_number", ['payment_status'=>$data->orderStatus,'order_number'=>$data->orderNumber]);
        
        $plugin_instance = $DB->get_record("enrol", array("id" => $sberrec->instanceid, "enrol" => "sber", "status" => 0), "*", MUST_EXIST);
        $plugin = enrol_get_plugin('sber');
        
        if ($plugin_instance->enrolperiod) {
            $timestart = time();
            $timeend   = $timestart + $plugin_instance->enrolperiod;
        } else {
            $timestart = 0;
            $timeend   = 0;
        }
         
        $userid=$sberrec->userid;
        // Enrol user
        $plugin->enrol_user($plugin_instance, $userid, $plugin_instance->roleid, $timestart, $timeend);
        
        $context = context_course::instance($sberrec->courseid, MUST_EXIST);
        $PAGE->set_context($context);
        
        require_login();
        
        if (!empty($SESSION->wantsurl)) {
            $destination = $SESSION->wantsurl;
            unset($SESSION->wantsurl);
        } else {
            $destination = "$CFG->wwwroot/course/view.php?id=$sberrec->courseid";
        }
        
        if (is_enrolled($context, NULL, '', true)) { 
            $course=$DB->get_record('course',['id'=>$sberrec->courseid]);
            $fullname = format_string($course->fullname, true, array('context' => $context));
            redirect($destination, get_string('paymentthanks', '', $fullname));
            
        }
    }
    
}
