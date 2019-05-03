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
        $person_insert_str = 'insert into person values
                             (:prsn_key, :p_type, :first_name, :last_name)';

        $person_insert_stmt = oci_parse($con, $person_insert_str);   

        $person_type = 'b';
        
        oci_bind_by_name($person_insert_stmt, ":prsn_key", $person_key);

        oci_bind_by_name($person_insert_stmt, ":p_type", $person_type);

        oci_bind_by_name($person_insert_stmt, ":first_name", $fname);

        oci_bind_by_name($person_insert_stmt, ":last_name", $lname);

        oci_execute($person_insert_stmt, OCI_DEFAULT);

        $committed = oci_commit($con);
        if (!$committed) 
        {
            $error = oci_error($con);
            echo 'Commit failed. Oracle reports: ' . $error['message'];
        }

        //Part 3 add phone number
        oci_free_statement($person_insert_stmt);

        $phone_insert_str = 'insert into phone_numbers values
                              (:phone_num, :prsn_id)';
        
        $phone_insert_stmt = oci_parse($con, $phone_insert_str);

        oci_bind_by_name($phone_insert_stmt, ":phone_num", $phonenum);

        oci_bind_by_name($phone_insert_stmt, ":prsn_id", $person_key);

        oci_execute($phone_insert_stmt, OCI_DEFAULT);

        $committed = oci_commit($con);
        if (!$committed) 
        {
            $error = oci_error($con);
            echo 'Commit failed. Oracle reports: ' . $error['message'];
        }
        oci_free_statement($phone_insert_stmt);
        oci_close($con);
        ?>
        <p> You were inserted as <?php echo($person_key)?> </p>
        <?php
}
    

?>