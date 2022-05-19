<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {

    $Username = $_POST["username"];
    $Password = $_POST["password"];



    //checking user input
    if (empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("login.php");
    } else {


        $ConnectingDB;
        $sql = "select * from users where username=:UsernamE";

        $stmt = $ConnectingDB->prepare($sql);
        $stmt->bindValue(':UsernamE', $Username);
        $stmt->execute();
        $Found_Account = $stmt->fetch();

        if (password_verify($Password, $Found_Account["password"])) {

            $_SESSION["USERID"] = $Found_Account["id"];
            $_SESSION["USERNAME"] = $Found_Account["username"];
            $_SESSION["NAME"] = $Found_Account["name"];


            if (isset($_SESSION["TRACKINGURL"])) {
                Redirect_to($_SESSION["TRACKINGURL"]);
            } else {
                Redirect_to("Blog.php");
            }
            $_SESSION["SuccessMessage"] = "Welcome " . $_SESSION["NAME"];
            Redirect_to("Blog.php");
        } else {
            $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
            Redirect_to("login.php");
        }
    }
}
