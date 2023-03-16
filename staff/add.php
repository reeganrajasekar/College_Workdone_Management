<?php
require("../admin/layout/db.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$sid = $_SESSION["id"];
$class = test_input($_POST['class']);
$details = test_input($_POST['details']);
$date = test_input($_POST['date']);

$sql = "INSERT INTO workdone (sid,class,details,status,date)
VALUES ('$sid','$class' ,'$details','Waiting List','$date')";

if ($conn->query($sql) === TRUE) {
    header("Location: /staff?page=1&msg=Workdone detail Added Successfully !");
    die();
} else {
    header("Location: /staff?page=1&err=Something went Wrong!");
    die();
}


?>