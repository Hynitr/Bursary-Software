<?php
include("functions/init.php");

if(!isset($_GET['id'])) {
   redirect("./allhistory");
} else {

    $id = $_GET['id'];
    $cls = $_GET['cls'];

    //echo $id."<br/>".$data."<br/>".$name;

    //find if record has a match
    $sql = "DELETE FROM feercrd WHERE `feeid` = '$id'";
    $rsl = query($sql);

    //create a notification
    $_SESSION['notify'] = "Fee Deleted Sucessfully";

    redirect("./allhistory?id=$cls");
    
}
?>