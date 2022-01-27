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

$instanceid = required_param('instanceid', PARAM_INT);

$instance = $DB->get_record('enrol', ['id' => $instanceid]);

$amount = $instance->cost * 100;

$orderNumber = required_param('orderNumber', PARAM_ALPHANUMEXT);
$returnUrl = required_param('returnUrl', PARAM_URL);

$username = get_config('enrol_sber', 'username');
$password = get_config('enrol_sber', 'password');

$registerUrl = get_config('enrol_sber', 'registerurl');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $registerUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "amount=".$amount."&orderNumber=".$orderNumber."&returnUrl=".$returnUrl."&userName=".$username."&password=".$password);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close ($ch);

if ($json = json_decode($response)) {

    $orderId = $json->orderId;
    $formUrl = $json->formUrl;

    $sberrec = new stdClass();
    $sberrec->courseid = $instance->courseid;
    $sberrec->userid = $USER->id;
    $sberrec->instanceid = $instance->id;
    $sberrec->amount = $amount / 100;
    $sberrec->orderid = $orderId;
    $sberrec->ordernumber = $orderNumber;
    $sberrec->timeupdated = time();

    if (!$DB->record_exists('enrol_sber', ['courseid' => $instance->courseid, 'userid' => $USER->id, 'instanceid' => $instance->id, 'ordernumber' => $orderNumber])) {
        $DB->insert_record('enrol_sber', $sberrec);
    }

    redirect($formUrl);

}
