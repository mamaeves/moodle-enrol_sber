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
 * @copyright  2022 Eugene Mamaev
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


$string['sber:config'] = 'Configure sber enrol instances';
$string['sber:manage'] = 'Manage enrolled users';
$string['sber:unenrol'] = 'Unenrol users from course';
$string['sber:unenrolself'] = 'Unenrol self from the course';
$string['sberaccepted'] = 'Принимается оплата через Сбер';
$string['pluginname'] = 'Сбер';
$string['pluginname_desc'] = 'The sber module allows you to set up paid courses.  If the cost for any course is zero, then students are not asked to pay for entry.  There is a site-wide cost that you set here as a default for the whole site and then a course setting that you can set for each course individually. The course cost overrides the site cost.';
$string['sendpaymentbutton'] = 'Оплатить через Сбер';
$string['status'] = 'Разрешить оплату через Сбер';
$string['status_desc'] = 'Allow users to use sber to enrol into a course by default.';
$string['transactions'] = 'sber transactions';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';

$string['mailadmins'] = 'Уведомить админа';
$string['mailstudents'] = 'Уведомить студентов';
$string['mailteachers'] = 'Уведомить учителей';

$string['expiredaction'] = 'Действие при истечении срока зачисления';
$string['expiredaction_help'] = 'Выберите действие, которое выполниться при истечении срока зачисления на курс.';
$string['cost'] = 'Стоимость';
$string['currency'] = 'Валюта';
$string['defaultrole'] = 'Роль по умолчанию';
$string['defaultrole_desc'] = 'Выберите роль, которая должна быть назначена пользователю, оплатившему доступ к курсу';
$string['enrolperiod'] = 'Длительность зачисления';
$string['enrolperiod_help'] = 'Длительность зачисления';
$string['enrolperiod_desc'] = 'Длительность доступа к курсу. 0 - без органичений';
$string['assignrole'] = 'Назначаемая роль';
$string['enrolstartdate'] = 'Дата начала';
$string['enrolstartdate_help'] = 'Пользователи могут записаться, начиная с указанной даты';
$string['enrolenddate'] = 'Дата окончания';
$string['enrolenddate_help'] = 'Пользователи могут записаться только до указанной даты';
$string['username'] = 'Логин';
$string['password'] = 'Пароль';
$string['registerurl'] = 'URL регистрации заказа';
$string['orders'] = 'Заказы';
