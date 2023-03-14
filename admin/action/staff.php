<?php
require("../layout/db.php");
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST['name']);
$mail = test_input($_POST['email']);
$sid = test_input($_POST['sid']);
$password = test_input($_POST['password']);

$sql = "INSERT INTO staff (name , email ,sid,password)
VALUES ('$name' ,'$mail' ,'$sid' ,'$password' )";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/home.php?page=1&msg=Staff Details Added Successfully !");
    die();
} else {
    header("Location: /admin/home.php?page=1&err=Something went Wrong!");
    die();
}


?>