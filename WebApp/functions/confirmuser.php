<?php
function confirm_user($conn, $fname, $lname, $phone)
{
    $confirm_str = 'begin :confirm = confirm_buyer(:firstname, :lastname, :phone_num)';

    $confirm_query = oci_parse($conn, $confirm_str);

    oci_bind_by_name($confirm_query, ":lastname", $lname);
    oci_bind_by_name($confirm_query, ":firstname", $fname);
    oci_bind_by_name($confirm_query, ":phone_num", $phone);
    //There should only be one match as phone numbers are unique
    oci_bind_by_name($confirm_query, ":confirm", $confirmation, 1);

    oci_execute($confirm_query);

    if($confirmation > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}

?>