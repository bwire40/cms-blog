<?php
session_start();
//error message
function ErrorMessage(){
    if(isset($_SESSION["ErrorMessage"])){
        $Output="<div class='alert alert-danger'>";
        $Output.=htmlentities($_SESSION["ErrorMessage"]);
        $Output.="</div>";
        $_SESSION["ErrorMessage"]=null;
        return $Output;
    }
}
//success message
function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
        $Output="<div class='alert alert-success'>";
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</div>";
        $_SESSION["SuccessMessage"]=null;
        return $Output;
    }
}

?>