<?php
function oraclecon($usrname, $pswd)
{

    $db_conn_str =
    "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
                               (HOST = cedar.humboldt.edu)
                               (PORT = 1521))
                    (CONNECT_DATA = (SID = STUDENT)))";

    // let's try to connect and log into Oracle using this

    $conn = oci_connect($usrname, $pswd, $db_conn_str);

    // exiting if connection/log in failed

    if (! $conn)
    {
        ?>
        <p> Could not log into Oracle, sorry </p>

        <?php
        require_once("328footer.html");
        ?>

        </body>
        </html>

        <?php
        exit;
    }
    else
    {
        return $conn;
    }
}

    ?>