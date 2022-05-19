<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {
    $Username = $_POST["username"];
    $Name = ucfirst($_POST["name"]);
    $Email = ucfirst($_POST["email"]);
    $Password = $_POST["pass"];
    $ConfirmPassword = $_POST["confirmpassword"];

    
    if ($Password!=$ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Password and Confirm Password should match!";
        Redirect_to("signup.php");
    }else{
        //password hashing and salting
    $pass=password_hash($Password,PASSWORD_DEFAULT);
    }


    //date in my current location
    date_default_timezone_set("Africa/Nairobi");
    $currenttime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);

    //checking user input

    if (empty($Username)||empty($Email)||empty($Name)||empty($Password)||empty($ConfirmPassword)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("signup.php");
    } elseif (strlen($Password) < 4) {
        $_SESSION["ErrorMessage"] = "Password should be greater than 4 characters!";
        Redirect_to("signup.php");
    }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
        $_SESSION["ErrorMessage"] = "Only Letters and Numbers are allowed";
        Redirect_to("signup.php");
    }elseif (check_usernameExistsOrNot_in_users($Username)) {
        $_SESSION["ErrorMessage"] = "Username Exists! Choose another one!";
        Redirect_to("signup.php");
    }
     else {
        //query to insert into Admins table
        $sql = "insert into users(datetime,name,email,username,password) 
        values(:datetimE,:NamE,:EmaiL,:UsernamE,:Password)";

        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':datetimE', $datetime);
        $stmt->bindValue(':NamE', $Name);
        $stmt->bindValue(':EmaiL', $Email);
        $stmt->bindValue(':UsernamE', $Username);
        $stmt->bindValue(':Password', $pass);

        $Execute = $stmt->execute();

        if ($Execute) {
            $_SESSION["SuccessMessage"] = " Hi ".$Username."! Registration successfull";
            Redirect_to("signup.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("signup.php");
        }
    }
}
