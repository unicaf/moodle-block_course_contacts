<?php

defined('MOODLE_INTERNAL') || die();


function xmldb_block_course_contacts_upgrade($oldversion): bool {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if($oldversion < 2020050112){

        $table = "block_instances";
        $records = $DB->get_records($table,['blockname'=>"course_contacts"],"","id,configdata");
        $records = json_decode(json_encode($records),true);
        $keys = array_keys($records);
        for($i = 0; $i < count($records); $i++){
                foreach ($records[$keys[$i]] as  $record => $value) {

                    if ($record === "configdata"  && (!empty($value))){


                        $decode = base64_decode($value);

                        $decode = unserialize($decode);

                        $decode->email = "0";
                        $decode->message = "1";

                        $serialize = serialize($decode);

                        $encode = base64_encode($serialize);

                        $value = $encode;

                        $records[$keys[$i]][$record] = $value;
                    }
                    $DB->update_record($table,$records[$keys[$i]],true);
                }

            }



        }


    return true;
}