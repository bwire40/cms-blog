<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");

//fetching existing User records
$UserId = $_SESSION["USERID"];
$ConnectingDB;
$sql = "select * from users where id='$UserId'";
$stmt = $ConnectingDB->query($sql);
while ($Datarows = $stmt->fetch()) {
    $ExistingName = $Datarows["name"];
    $ExistingHeadline = $Datarows["headline"];
    $ExistingBio = $Datarows["bio"];
    $Existingimage = $Datarows["image"];
    $ExistingUsername = $Datarows["username"];
}

if (isset($_POST["submit"])) {
    $Name = ucfirst($_POST["name"]);
    $Headline = ucwords($_POST["headline"]);
    $Bio = ucfirst($_POST["bio"]);
    $image = $_FILES["image"]["name"];
    $Target = "../img/" . basename($_FILES["image"]["name"]);

    //check user input
    if (strlen($Headline) > 50) {
        $_SESSION["ErrorMessage"] = "Headline should be less than 50 characters!";
        Redirect_to("MyProfile.php");
    } elseif (strlen($Bio) > 1000) {
        $_SESSION["ErrorMessage"] = "Bio should be less than 1000 characters!";
        Redirect_to("MyProfile.php");
    } elseif (!preg_match("/^[a-zA-Z0-9. ]*$/", $Name)) {
        $_SESSION["ErrorMessage"] = "Only letters and whitespaces allowed for Name!";
        Redirect_to("MyProfile.php");
    } elseif (!preg_match("/^[a-zA-Z0-9.,;: ]*$/", $Bio)) {
        $_SESSION["ErrorMessage"] = "Only letters and whitespaces allowed!";
        Redirect_to("MyProfile.php");
    } else {

        //query to update admin DB when evverything is fine

        if (!empty($image)) {
            //query to Update into category table
            $sql = "update users set name='$Name', headline='$Headline',bio='$Bio',image='$image' where id='$UserId'";
        } else {
            //query to Update into category table
            $sql = "update users set name='$Name', headline='$Headline',bio='$Bio' where id='$UserId'";
        }

        $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Details Updated Successfully!";
            Redirect_to("MyProfile.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("MyProfile.php");
        }
    }
}

?>
