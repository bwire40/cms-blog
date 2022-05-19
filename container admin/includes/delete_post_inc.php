<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");

$searchQueryParameter = $_GET["id"];
$ConnectingDB;
//fetching the required fields
$sql = "select * from post where id=$searchQueryParameter";
$stmtPost = $ConnectingDB->query($sql);
while ($Datarows = $stmtPost->fetch()) {

    $TitleToBeDeleted = $Datarows["title"];
    $CategoryToBeDeleted= $Datarows["category"];
    $ImageToBeDeleted = $Datarows["image"];
    $ContentToBeDeleted = $Datarows["content"];
}

//deleting the post
if (isset($_POST["submit"])) {
    //query to delete post
    $sql = "DELETE FROM post WHERE id='$searchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if ($Execute) {
        $Target_Path_To_Delete_Image="../upload/$ImageToBeDeleted";
        unlink($Target_Path_To_Delete_Image);
        $_SESSION["SuccessMessage"] = "Post DELETED Successfully!";
        Redirect_to("posts.php");
    } else {
        $_SESSION["ErrorMessage"] = "Something went wrong!";
        Redirect_to("posts.php");
    }
}