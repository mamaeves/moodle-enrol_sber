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

require("../../config.php");

$context = CONTEXT_SYSTEM::instance();

require_capability('enrol/sber:manage', $context);


$PAGE->set_url(new moodle_url('/enrol/sber/orders.php'));
$PAGE->set_context($context);

$PAGE->navbar->add(get_string('pluginname', 'enrol_sber'));
$PAGE->navbar->add(get_string('orders', 'enrol_sber'));

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('orders', 'enrol_sber'));

$rows = $DB->get_records_sql("select s.*, c.fullname, u.lastname,u.firstname, u.email
                              from {enrol_sber} s, {course} c, {user}u
                              where s.courseid=c.id and u.id=s.userid");

$table = new html_table();

$table->head = array(
                     '#', get_string('date'), get_string('course'), get_string('cost'),
                     get_string('lastname'), get_string('firstname'), get_string('email'));

$i = 1;
foreach ($rows as $r) {
    $table->data[] = array(
        $i,
        date('d.m.Y H:i:s', $r->timeupdated),
        $r->fullname,
        $r->amount,
        $r->lastname,
        $r->firstname,
        $r->email
    );

    $i++;
}

echo html_writer::table($table);

echo $OUTPUT->footer();
