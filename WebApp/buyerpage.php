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

<h1> Connecting PHP to Oracle </h1>

<?php
    // do you need to ask for username and password?

    if ( ! array_key_exists("state", $_SESSION))
    {
        require_once("./functions/oraclecon.php");
        $_SESSION["state"] = "oraclelogin";
        // no username in $_POST? they need a login form!
    }
    elseif( $_SESSION["state"] == "oraclelogin")
    {
        $username = strip_tags($_POST['username']);

        $password = $_POST['password'];
        
        //test connection
        $conn = oraclecon($username, $password);

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;

        $_SESSION["state"] = "typeofuser";
        require_once("./forms/buyergreet.php");

    }
    elseif( $_SESSION["state"] == "typeofuser")
    {
        if(array_key_exists("usertype", $_POST))
        {
            if($_POST["usertype"] = "newuser")
            {
                require_once("./forms/newuserform");
                $_SESSION["state"] = "newuser";
            }
            elseif($_POST["usertype"] = "returnuser")
            {
                $_SESSION["state"] = "newuser";
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
            //How the heck they get here?
            //Go back to the form
            $_SESSION["state"] = "typeofuser";
            require_once("./forms/buyergreet.php");
        }
    }
    else
    {
        //get login function
        require_once("./functions/oraclecon.php");
        require_once("./functions/createnewuser.php");
        require_once("./functions/checklisting.php");

        

        //createnewbuyer($conn, $firstname, $lastname);

        filter_listing_form($conn);

        // if I get here -- I connected!

       

    }
    
    require_once("328footer.html");
?>  

</body>
</html>
