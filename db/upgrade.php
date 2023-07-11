<?php

defined('MOODLE_INTERNAL') || die();


function xmldb_block_course_contacts_upgrade($oldversion): bool {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if($oldversion < 2020050111){
       $sql = "UPDATE {block_instances}
                 SET configdata = :configdata
                WHERE blockname = :blockname";
       $DB->execute($sql,['configdata' => 'Tzo4OiJzdGRDbGFzcyI6MTY6e3M6NToiZW1haWwiO3M6MToiMCI7czo3OiJtZXNzYWdlIjtzOjE6IjEiO3M6NToicGhvbmUiO3M6MToiMCI7czoxMToiZGVzY3JpcHRpb24iO3M6MToiMCI7czoxNjoiaGlkZV9ibG9ja19ndWVzdCI7czoxOiIxIjtzOjExOiJlbWFpbF9ndWVzdCI7czoxOiIwIjtzOjEzOiJtZXNzYWdlX2d1ZXN0IjtzOjE6IjAiO3M6MTE6InBob25lX2d1ZXN0IjtzOjE6IjAiO3M6MTc6ImRlc2NyaXB0aW9uX2d1ZXN0IjtzOjE6IjAiO3M6Njoic29ydGJ5IjtzOjE6IjAiO3M6NzoiaW5oZXJpdCI7czoxOiIwIjtzOjExOiJ1c2VfYWx0bmFtZSI7czoxOiIwIjtzOjY6InJvbGVfMSI7czoxOiIwIjtzOjY6InJvbGVfMyI7czoxOiIwIjtzOjY6InJvbGVfNCI7czoxOiIwIjtzOjY6InJvbGVfNSI7czoxOiIwIjt9','blockname' => 'course_contacts']);
    }

    return true;
}