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

$string['sber:config'] = 'Настраивать оплату через Сбер';
$string['sber:manage'] = 'Управлять записанными пользователями';
$string['sber:unenrol'] = 'Отчислять пользователей с курса';
$string['sber:unenrolself'] = 'Отчислять самого себя с курса';
$string['sberaccepted'] = 'Принимается оплата через Сбер';
$string['pluginname'] = 'Сбер';
$string['pluginname_desc'] = 'Позволяет настроить запись на курса через оплату через Сбербанк. Если стоимость курса 0, то оплата не берется.';
$string['sendpaymentbutton'] = 'Оплатить через Сбер';
$string['status'] = 'Разрешить оплату через Сбер';
$string['status_desc'] = 'Разрешить пользователям использовать оплату через Сбер для записи на курс по умолчанию.';
$string['transactions'] = 'Транзакции через Сбер';
$string['unenrolselfconfirm'] = 'Вы действительно хотите отчислиться из курса "{$a}"?';

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

$string['privacy:metadata'] = 'Плагин не хранит персональных данных пользователей';
