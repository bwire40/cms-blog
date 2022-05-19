<?php
require_once("DB.php");
include("functions.php");
include("sessions.php");


if (isset($_POST["submit"])) {
    $PostTitle =strtoupper($_POST["PostTitle"]);
    $category=ucwords($_POST["category"]);
    $image=$_FILES["image"]["name"];
    $Target="../upload/".basename($_FILES["image"]["name"]);
    $content=ucfirst($_POST["content"]);

    //dummy admin value
    $admin = $_SESSION["UserName"];

    //date in my current location
    date_default_timezone_set("Africa/Nairobi");
    $currenttime = time();
    $datetime = strftime("%B-%d-%Y %H:%M:%S", $currenttime);

    //check user input

    if (empty($PostTitle) || empty($category) || empty($content)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out!";
        Redirect_to("new_post.php");
    } elseif (strlen($PostTitle) <= 5) {
        $_SESSION["ErrorMessage"] = "Post title should be greater than five characters!";
        Redirect_to("new_post.php");
    } elseif (strlen($content) > 19999) {
        $_SESSION["ErrorMessage"] = "Post description should be less than 1000 characters!";
        Redirect_to("new_post.php");
    }elseif (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $PostTitle)) {
        $_SESSION["ErrorMessage"] = "Check that you have used valid Characters!";
        Redirect_to("new_post.php");
    }
     else {
        //query to insert into category table
        $sql = "insert into post(datetime,title,category,author,image,content) 
        values(:datetimE,:titlE,:categorY,:authoR,:imageNamE,:contenT)";

        $stmt = $ConnectingDB->prepare($sql);

        $stmt->bindValue(':datetimE', $datetime);
        $stmt->bindValue(':titlE', $PostTitle);
        $stmt->bindValue(':categorY', $category);
        $stmt->bindValue(':authoR', $admin);
        $stmt->bindValue(':imageNamE', $image);
        $stmt->bindValue(':contenT', $content);

        $Execute = $stmt->execute();
        move_uploaded_file($_FILES["image"]["tmp_name"],$Target);

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post with id: ".$ConnectingDB->lastInsertId()." Added Successfully!";
            Redirect_to("new_post.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong!";
            Redirect_to("new_post.php");
        }
    }
}
?>
