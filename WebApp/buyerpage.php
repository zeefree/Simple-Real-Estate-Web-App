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

    if ( ! array_key_exists("username", $_POST) )
    {
        $_SESSION
        // no username in $_POST? they need a login form!
        ?>
  
            
    <?php
        require_once("./forms/newuserfieldset.php");
    }      

    // otherwise, handle the submitted login form 
    //    (or try to) -- and show the user some
    //    lovely employee information

    else
    {
        //get login function
        require_once("./functions/oraclecon.php");
        require_once("./functions/createnewuser.php");

        $username = strip_tags($_POST['username']);

        // the ONLY thing I am doing with this is
        //    trying to log in -- so I HOPE this is OK

        $password = $_POST['password'];

        // set up connection string

        $conn = oraclecon($username, $password);

        $password = NULL; // I won't be using this anymore

        $firstname = strip_tags($_POST["fname"]);

        $lastname = strip_tags($_POST["lname"]);

        createnewbuyer($conn, $firstname, $lastname);

        // if I get here -- I connected!

       

    }
    
    require_once("328footer.html");
?>  

</body>
</html>
