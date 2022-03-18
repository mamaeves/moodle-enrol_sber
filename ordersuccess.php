<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * sber enrolment plugin - support for user self unenrolment.
 *
 * @package    enrol_sber
 * @copyright  2022 Eugene Mamaev  {mamaeves@mail.ru}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir.'/enrollib.php');
require_once($CFG->libdir . '/filelib.php');

$orderid = required_param('orderId', PARAM_ALPHANUMEXT);

$sberrec = $DB->get_record('enrol_sber', ['orderid' => $orderid]);

$username = get_config('enrol_sber', 'username');
$password = get_config('enrol_sber', 'password');

$c = new curl();

$postfields = "orderId=".$orderid."&userName=".$username."&password=".$password;

$options = array(
        'returntransfer' => true,
        'timeout' => 30,
        'CURLOPT_HTTP_VERSION' => CURL_HTTP_VERSION_1_1,
);

$response = $c->post("https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do", $postfields, $options);

$data = json_decode($response);

if ($data->errorCode == 0) {
    if ($data->orderStatus == 2) {

        $DB->execute("update {enrol_sber} set payment_status=:payment_status where ordernumber=:order_number",
        ['payment_status' => $data->orderStatus, 'order_number' => $data->orderNumber]);

        $plugin_instance = $DB->get_record("enrol",
                            array("id" => $sberrec->instanceid,
                                  "enrol" => "sber",
                                  "status" => 0
                             ), "*", MUST_EXIST);

        $plugin = enrol_get_plugin('sber');

        if ($plugin_instance->enrolperiod) {
            $timestart = time();
            $timeend   = $timestart + $plugin_instance->enrolperiod;
        } else {
            $timestart = 0;
            $timeend   = 0;
        }

        $userid = $sberrec->userid;
        // Enrol user.
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

        if (is_enrolled($context, null, '', true)) {
            $course = $DB->get_record('course', ['id' => $sberrec->courseid]);
            $fullname = format_string($course->fullname, true, array('context' => $context));
            redirect($destination, get_string('paymentthanks', '', $fullname));

        }
    }

}
