<?php

function confirm_seller($conn, $fnmae, $lname, $phone)
{
    $confirm_str = 'begin :confirm := confirm_seller(:firstname, :lastname, :phone_num); end;';

    $confirm_query = oci_parse($conn, $confirm_str);

    oci_bind_by_name($confirm_query, ":lastname", $lname);
    oci_bind_by_name($confirm_query, ":firstname", $fname);
    oci_bind_by_name($confirm_query, ":phone_num", $phone);
    //There should only be one match as phone numbers are unique
    oci_bind_by_name($confirm_query, ":confirm", $confirmation, 1);

    oci_execute($confirm_query);

    oci_free_statement($confirm_query);

    if($confirmation > 0)
    {
        $person_id_str = 'select prsn_id
                          from phone_numbers ph
                          where ph.phone_num = :phone_number';
        
        $person_id_query = oci_parse($conn, $person_id_str);

        oci_bind_by_name($person_id_query, ":phone_number", $phone);

        oci_execute($person_id_query);

        //There will be only one buut it seems safer to just do it this way
        while(oci_fetch($person_id_query))
        {
            $prs_id = oci_result($person_id_query, 'PRSN_ID');
        }

        return $prs_id;

        oci_free_statement($person_id_query);

    }   
    else
    {
        return "";
    }
    
}

function confirm_buyer($conn, $fname, $lname, $phone)
{
    $confirm_str = 'begin :confirm := confirm_buyer(:firstname, :lastname, :phone_num); end;';

    $confirm_query = oci_parse($conn, $confirm_str);

    oci_bind_by_name($confirm_query, ":lastname", $lname);
    oci_bind_by_name($confirm_query, ":firstname", $fname);
    oci_bind_by_name($confirm_query, ":phone_num", $phone);
    //There should only be one match as phone numbers are unique
    oci_bind_by_name($confirm_query, ":confirm", $confirmation, 1);

    oci_execute($confirm_query);

    oci_free_statement($confirm_query);

    if($confirmation > 0)
    {
        $person_id_str = 'select prsn_id
                          from phone_numbers ph
                          where ph.phone_num = :phone_number';
        
        $person_id_query = oci_parse($conn, $person_id_str);

        oci_bind_by_name($person_id_query, ":phone_number", $phone);

        oci_execute($person_id_query);

        //There will be only one buut it seems safer to just do it this way
        while(oci_fetch($person_id_query))
        {
            $prs_id = oci_result($person_id_query, 'PRSN_ID');
        }

        return $prs_id;

        oci_free_statement($person_id_query);

    }   
    else
    {
        return "";
    }
    
}

?>