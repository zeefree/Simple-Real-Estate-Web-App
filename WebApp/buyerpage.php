<?php
    session_start();
    $_SESSION["state"] = "start";
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

    if ( $_SESSION["state"] == "start")
    {
        require_once("./forms/newuserfieldset.php");
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
