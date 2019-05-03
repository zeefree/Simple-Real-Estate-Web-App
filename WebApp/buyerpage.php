<?php
    session_start();
    
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title> Buyer Page </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />
    <link href="try-oracle.css" type="text/css" rel="stylesheet" />
</head> 

<body>

<h1> Humboldt Simplified Listings </h1>

<?php
    // do you need to ask for username and password?
    ?>
    <form id="logout" method="post" action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <input type="submit" name="logout" value="logout"/>
    </form>
    
    <?php
    require_once("./functions/oraclecon.php");

    if ( ! array_key_exists("state", $_SESSION))
    {
        require_once("./forms/oracleform.php");
        $_SESSION["state"] = "oraclelogin";
        // no username in $_POST? they need a login form!
    }
    elseif(array_key_exists("logout", $_POST))
    {
        
        ?>
        <p> you have logged out </p>
        <?php
        require_once("328footer.html");
        session_destroy();
        $_POST = array();

    }
    elseif( $_SESSION["state"] == "oraclelogin")
    {
        if (array_key_exists("username", $_POST))
        {
            require_once("./functions/oraclecon.php");

            $username = strip_tags($_POST['username']);

            $password = $_POST['password'];
        
            //test connection
            $conn = oraclecon($username, $password);

            oci_close($conn);

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            $_SESSION["state"] = "typeofuser";
            require_once("./forms/buyergreet.php");
        }
        else
        {
            //Got to next state without the form, so I'll allow them to try again
            require_once("./forms/oracleform.php");
        }
        

    }
    elseif( $_SESSION["state"] == "typeofuser")
    {
        if(array_key_exists("usertype", $_POST))
        {
            if($_POST["usertype"] = "newuser")
            {
                require_once("./forms/userform.php");
                $_SESSION["state"] = "newuser";
            }
            elseif($_POST["usertype"] = "returnuser")
            {
                $_SESSION["state"] = "returnuser";
            }
            else
            {
                //How the heck they get here?
                //Go back to the form
                $_SESSION["state"] = "typeofuser";
                require_once("./forms/buyergreet.php");
            }
        }
        else
        {
            //Go back to the form
            $_SESSION["state"] = "typeofuser";
            require_once("./forms/buyergreet.php");
        }
    }
    elseif( $_SESSION["state"] == "newuser")
    {
        if(array_key_exists("fname", $_POST))
        {
            
            require_once("./functions/createnewuser.php");

            $conn = oraclecon($_SESSION["username"], $_SESSION["password"]);

            createnewbuyer($conn, $_POST["fname"], $_POST["lname"], $_POST["phonenum"]);

            require_once("./functions/checklisting.php");

            filter_listing_form($conn);

            oci_close($conn);
            $_SESSION["state"] = "buildingquery"; 
        }
    }
    elseif( $_SESSION["state"] == "buildingquery")
    {
        require_once("./functions/getbuildinglist.php");

        $conn = oraclecon($_SESSION["username"], $_SESSION["password"]);

        //generate a list of buildings using the previous given city value as a filter
        getbuildinglist($conn, $_POST["city"]);
        
    }
    
    require_once("328footer.html");
?>  

</body>
</html>
