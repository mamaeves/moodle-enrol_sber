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
 * Strings for component 'enrol_sber', language 'en'.
 *
 * @package    enrol_sber
 * @copyright  2022 Eugene Mamaev {mamaeves@mail.ru}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


$string['sber:config'] = 'Configure sber enrol instances';
$string['sber:manage'] = 'Manage enrolled users';
$string['sber:unenrol'] = 'Unenrol users from course';
$string['sber:unenrolself'] = 'Unenrol self from the course';
$string['sberaccepted'] = 'sber payments accepted';
$string['pluginname'] = 'Sber';
$string['pluginname_desc'] = 'The sber module allows you to set up paid courses.  If the cost for any course is zero, then students are not asked to pay for entry.  There is a site-wide cost that you set here as a default for the whole site and then a course setting that you can set for each course individually. The course cost overrides the site cost.';
$string['sendpaymentbutton'] = 'Send payment via Sber';
$string['status'] = 'Allow sber enrolments';
$string['status_desc'] = 'Allow users to use sber to enrol into a course by default.';
$string['transactions'] = 'sber transactions';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';

$string['mailadmins'] = 'Notify admin';
$string['mailstudents'] = 'Notify students';
$string['mailteachers'] = 'Notify teachers';

$string['expiredaction'] = 'Enrolment expiry action';
$string['expiredaction_help'] = 'Select action to carry out when user enrolment expires. Please note that some user data and settings are purged from course during course unenrolment.';

$string['cost'] = 'Enrol cost';
$string['currency'] = 'Currency';
$string['defaultrole'] = 'Default role assignment';
$string['defaultrole_desc'] = 'Select role which should be assigned to users during PayPal enrolments';
$string['enrolperiod'] = 'Enrolment duration';
$string['enrolperiod_help'] = 'Length of time that the enrolment is valid, starting with the moment the user is enrolled. If disabled, the enrolment duration will be unlimited.';
$string['enrolperiod_desc'] = 'Default length of time that the enrolment is valid. If set to zero, the enrolment duration will be unlimited by default.';
$string['assignrole'] = 'Assign role';
$string['enrolstartdate'] = 'Start date';
$string['enrolstartdate_help'] = 'If enabled, users can be enrolled from this date onward only.';
$string['enrolenddate'] = 'End date';
$string['enrolenddate_help'] = 'If enabled, users can be enrolled until this date only.';
$string['username'] = 'Username';
$string['password'] = 'Password';
$string['registerurl'] = 'Register URL';
$string['orders'] = 'Orders';

$string['privacy:metadata:enrol_sber:enrol_sber'] = 'Information about the Sber transactions for Sber enrolments.';
$string['privacy:metadata:enrol_sber:enrol_sber:courseid'] = 'The ID of the course that is sold.';
$string['privacy:metadata:enrol_sber:enrol_sber:instanceid'] = 'The ID of the enrolment instance in the course.';
$string['privacy:metadata:enrol_sber:enrol_sber:item_name'] = 'The full name of the course that its enrolment has been sold.';
$string['privacy:metadata:enrol_sber:enrol_sber:memo'] = 'A note field.';
$string['privacy:metadata:enrol_sber:enrol_sber:payment_status'] = 'The status of the payment.';
$string['privacy:metadata:enrol_sber:enrol_sber:timeupdated'] = 'The time of Moodle being notified by Sber about the payment.';
$string['privacy:metadata:enrol_sber:enrol_sber:userid'] = 'The ID of the user who bought the course enrolment.';
$string['privacy:metadata:enrol_sber:sber_ru'] = 'The Sber enrolment plugin transmits user data from Moodle to the Sber website.';
$string['privacy:metadata:enrol_sber:sber_ru:email'] = 'Email address of the user who is buying the course.';
$string['privacy:metadata:enrol_sber:sber_ru:first_name'] = 'First name of the user who is buying the course.';
$string['privacy:metadata:enrol_sber:sber_ru:last_name'] = 'Last name of the user who is buying the course.';
