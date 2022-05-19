<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");
$searchQueryParameter = $_GET["id"];

if (isset($_POST["Submit"])) {

    $Name = ucfirst($_SESSION["NAME"]);
    $Email = $_POST["commenterEmail"];
    $Comment = ucfirst($_POST["comment"]);
    $Status="OFF";
    $ApprovedBy="Pending";

    //date in my current location
    date_default_timezone_set("Africa/Nairobi");
    $currenttime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);



    //checking user input

    if (empty($Name) || empty($Email) || empty($Comment)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        
    } elseif (strlen($Name) < 3) {
        $_SESSION["ErrorMessage"] = "Name should be greater than 2 characters!";
        
    } elseif (strlen($Comment) > 500) {
        $_SESSION["ErrorMessage"] = "The Comment length should be less than 500 characters!";
        
    } elseif (!preg_match("/^[a-zA-Z. ]*$/", $Name)) {
        $_SESSION["ErrorMessage"] = "Only Letters and whitespaces are allowed in the Name Section!";
        
    } elseif (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $Email)) {
        $_SESSION["ErrorMessage"] = "Incorrect Email Format!";
        
    } else {

        //query to insert into comment table
        $sql = "insert into comments(datetime,name,email,comment,status,approvedby,post_id) 
        values(:datetimE,:CommenterName,:CommenterEmail,:commenT,:statuS,:ApprovedbY,:postIdFromUrl)";

        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':datetimE', $datetime);
        $stmt->bindValue(':CommenterName', $Name);
        $stmt->bindValue(':CommenterEmail', $Email);
        $stmt->bindValue(':commenT', $Comment);
        $stmt->bindValue(':statuS', $Status);
        $stmt->bindValue(':ApprovedbY', $ApprovedBy);
        $stmt->bindValue(':postIdFromUrl', $searchQueryParameter);

        $Execute = $stmt->execute();

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Thank you for your Thoughts!";
            Redirect_to("Blog.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong! Try Again!";
        }
    }
}
