<?php

function createnewbuyer($con, $fname, $lname, $phonenum)
{
        //Part 1 get the key that we will use 
        $person_key_call = "begin :nextkey := next_person_key(); end;";

        $person_key_stmt = oci_parse($con, $person_key_call);

        oci_bind_by_name($person_key_stmt, ":nextkey", $person_key, 9);

        oci_execute($person_key_stmt, OCI_DEFAULT);

        oci_free_statement($person_key_stmt);


        //Part 2 insert into person table which has a trigger to make the seller row as well
        $prsn_phn_insert_str = 'begin create_person_with_phone(:prsn_key, :p_type, 
                                :first_name, :last_name, :phone_num); end;';

        $person_type = 'b';                      

        $prsn_phn_stmt = oci_parse($con, $prsn_phn_insert_str);   
        
        oci_bind_by_name($prsn_phn_stmt, ":prsn_key", $person_key);

        oci_bind_by_name($prsn_phn_stmt, ":p_type", $person_type);

        oci_bind_by_name($prsn_phn_stmt, ":first_name", $fname);

        oci_bind_by_name($prsn_phn_stmt, ":last_name", $lname);

        oci_bind_by_name($prsn_phn_stmt, ":phone_num", $phonenum);

        $execute = oci_execute($prsn_phn_stmt, OCI_DEFAULT);


        echo($execute);
        if(! $execute)
        {
            //weren't able to execute don't return a key
            $person_key = "";
        }

        $committed = oci_commit($con);

        //Needed for insertion and while I'm not doing an insertion query, the procedure does
        //So I'm going to leave it here
        if (!$committed) 
        {
            $error = oci_error($con);
            echo 'Commit failed. Oracle reports: ' . $error['message'];
        }

        return $person_key;
}
    

?>