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
 * This file keeps track of upgrades to the sber enrolment plugin
 *
 * @package    enrol_sber
 * @copyright  2022 Eugene Mamaev {mamaeves@mail.ru}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function xmldb_enrol_sber_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2022011502) {

        // Define field orderid to be added to enrol_sber.
        $table = new xmldb_table('enrol_sber');
        $field = new xmldb_field('orderid', XMLDB_TYPE_CHAR, '36', null, null, null, null, 'timeupdated');

        // Conditionally launch add field orderid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Sber savepoint reached.
        upgrade_plugin_savepoint(true, 2022011502, 'enrol', 'sber');
    }

    if ($oldversion < 2022011503) {

        // Define field ordernumber to be added to enrol_sber.
        $table = new xmldb_table('enrol_sber');
        $field = new xmldb_field('ordernumber', XMLDB_TYPE_CHAR, '36', null, null, null, null, 'orderid');

        // Conditionally launch add field ordernumber.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Sber savepoint reached.
        upgrade_plugin_savepoint(true, 2022011503, 'enrol', 'sber');
    }

    return true;
}
