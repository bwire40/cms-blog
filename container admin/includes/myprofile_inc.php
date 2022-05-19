<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");

//fetching existing admin record
$AdminId = $_SESSION["UserId"];
$ConnectingDB;
$sql = "select * from admins where id='$AdminId'";
$stmt = $ConnectingDB->query($sql);
while ($Datarows = $stmt->fetch()) {
    $ExistingName = $Datarows["aname"];
    $ExistingHeadline = $Datarows["headline"];
    $ExistingBio = $Datarows["bio"];
    $Existingimage = $Datarows["image"];
    $ExistingUsername = $Datarows["username"];
}

if (isset($_POST["submit"])) {
    $Aname = ucfirst($_POST["name"]);
    $Headline = ucwords($_POST["headline"]);
    $Bio = ucfirst($_POST["bio"]);
    $image = $_FILES["image"]["name"];
    $Target = "../images/" . basename($_FILES["image"]["name"]);

    //check user input
    if (strlen($Headline) > 50) {
        $_SESSION["ErrorMessage"] = "Headline should be less than 50 characters!";
        Redirect_to("MyProfile.php");
    } elseif (strlen($Bio) > 1000) {
        $_SESSION["ErrorMessage"] = "Bio should be less than 1000 characters!";
        Redirect_to("MyProfile.php");
    } elseif (!preg_match("/^[a-zA-Z0-9. ]*$/", $Aname)) {
        $_SESSION["ErrorMessage"] = "Only letters and whitespaces allowed for Name!";
        Redirect_to("MyProfile.php");
    } elseif (!preg_match("/^[a-zA-Z0-9.,;: ]*$/", $Bio)) {
        $_SESSION["ErrorMessage"] = "Only letters and whitespaces allowed!";
        Redirect_to("MyProfile.php");
    } else {

        //query to update admin DB when evverything is fine

        if (!empty($image)) {
            //query to Update into category table
            $sql = "update admins set aname='$Aname', headline='$Headline',bio='$Bio',image='$image' where id='$AdminId'";
        } else {
            //query to Update into category table
            $sql = "update admins set aname='$Aname', headline='$Headline',bio='$Bio' where id='$AdminId'";
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
