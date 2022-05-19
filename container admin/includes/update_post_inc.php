<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");

$searchQueryParameter = $_GET["id"];
$ConnectingDB;

if (isset($_POST["submit"])) {
    $PostTitle = strtoupper($_POST["PostTitle"]);
    $category = ucfirst($_POST["category"]);
    $image = $_FILES["image"]["name"];
    $Target = "../upload/" . basename($_FILES["image"]["name"]);
    $content = ucfirst($_POST["content"]);

    //dummy admin value
    $admin = $_SESSION["UserName"];

    //date in my current location
    date_default_timezone_set("Africa/Nairobi");
    $currenttime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);

    //check user input

    if (empty($PostTitle) || empty($category) || empty($content)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("posts.php");
    } elseif (strlen($PostTitle) <= 5) {
        $_SESSION["ErrorMessage"] = "Post title should be greater than five characters!";
        Redirect_to("posts.php");
    } elseif (strlen($content) > 19999) {
        $_SESSION["ErrorMessage"] = "Post description should be less than 1000 characters!";
        Redirect_to("posts.php");
    } elseif (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $PostTitle)) {
        $_SESSION["ErrorMessage"] = "Check that you have used valid Characters!";
        Redirect_to("posts.php");
    } 
 else {

        if (!empty($image)) {
            //query to Update into category table
            $sql = "update post set title='$PostTitle', category='$category',image='$image',content='$content' where id='$searchQueryParameter'";
            move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        } else {
            //query to Update into category table
            $sql = "update post set title='$PostTitle', category='$category',content='$content' where id='$searchQueryParameter'";
            move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        }

        $Execute = $ConnectingDB->query($sql);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post Updated Successfully!";
            Redirect_to("posts.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("posts.php");
        }
    }
}
