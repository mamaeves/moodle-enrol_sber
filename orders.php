<?php
require("../../config.php");

$context=CONTEXT_SYSTEM::instance();

require_capability('enrol/sber:manage', $context);


$PAGE->set_url(new moodle_url('/enrol/sber/orders.php'));
$PAGE->set_context($context);

$PAGE->navbar->add(get_string('pluginname','enrol_sber'));
$PAGE->navbar->add(get_string('orders','enrol_sber'));

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('orders','enrol_sber'));

$rows = $DB->get_records_sql("select s.*, c.fullname, u.lastname,u.firstname, u.email from {enrol_sber} s, {course} c, {user} u where s.courseid=c.id and u.id=s.userid");

$table = new html_table();

$table->head=array('#',get_string('date'),get_string('course'),get_string('cost'),get_string('lastname'),get_string('firstname'),get_string('email'));

$i=1;
foreach($rows as $r) {
    $table->data[]=array(
        $i,
        date('d.m.Y H:i:s',$r->timeupdated),
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