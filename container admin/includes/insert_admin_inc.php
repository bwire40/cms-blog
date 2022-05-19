<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {
    $Username = $_POST["username"];
    $Name = ucfirst($_POST["name"]);
    $Password = $_POST["password"];
    $ConfirmPassword = $_POST["confirmpassword"];
    $admin =$_SESSION["UserName"];

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

    if (empty($Username)||empty($Name)||empty($Password)||empty($ConfirmPassword)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("ManageAdmins.php");
    } elseif (strlen($Password) < 4) {
        $_SESSION["ErrorMessage"] = "Password should be greater than 4 characters!";
        Redirect_to("ManageAdmins.php");
    } elseif ($Password!=$ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Password and Confirm Password should match!";
        Redirect_to("ManageAdmins.php");
    }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
        $_SESSION["ErrorMessage"] = "Only Letters and Numbers are allowed";
        Redirect_to("ManageAdmins.php");
    }elseif (check_usernameExistsOrNot($Username)) {
        $_SESSION["ErrorMessage"] = "Username Exists! Choose another one!";
        Redirect_to("ManageAdmins.php");
    }
     else {
        //query to insert into Admins table
        $sql = "insert into admins(datetime,username,password,aname,addedby) 
        values(:datetimE,:UsernamE,:Password,:adminName,:AddedBy)";

        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':datetimE', $datetime);
        $stmt->bindValue(':UsernamE', $Username);
        $stmt->bindValue(':Password', $pass);
        $stmt->bindValue(':adminName', $Name);
        $stmt->bindValue(':AddedBy', $admin);

        $Execute = $stmt->execute();

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Admin Added Successfully!";
            Redirect_to("ManageAdmins.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("ManageAdmins.php");
        }
    }
}
