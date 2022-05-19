<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {
    $Category = ucfirst($_POST["CategoryTitle"]);
    $admin =$_SESSION["UserName"];

    //date in my current location
    date_default_timezone_set("Africa/Nairobi");
    $currenttime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);

    //checking user input

    if (empty($Category)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("categories.php");
    } elseif (strlen($Category) <= 2) {
        $_SESSION["ErrorMessage"] = "Category title should be greater than 2 characters!";
        Redirect_to("categories.php");
    } elseif (strlen($Category) > 49) {
        $_SESSION["ErrorMessage"] = "Category title should be 50 characters or less!";
        Redirect_to("categories.php");
    }elseif (!preg_match("/^[a-zA-Z. ]*$/", $CategoryTitle)) {
        $_SESSION["ErrorMessage"] = "Only Letters and whitespaces are allowed";
        Redirect_to("categories.php");
    }
     else {
        //query to insert into category table
        $sql = "insert into category(title,author,datetime) 
        values(:categoryName,:adminName,:datetimE)";

        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':categoryName', $Category);
        $stmt->bindValue(':adminName', $admin);
        $stmt->bindValue(':datetimE', $datetime);

        $Execute = $stmt->execute();

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Category with id: ".$ConnectingDB->lastInsertId()." Added Successfully!";
            Redirect_to("categories.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("categories.php");
        }
    }
}
