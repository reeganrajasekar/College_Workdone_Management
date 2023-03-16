<?php
require("../layout/db.php");

$id = $_POST['id'];

$sql = "UPDATE workdone SET status='Approved' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/workdone.php?page=1&msg=Workdone Approved Successfully !");
    die();
} else {
    header("Location: /admin/workdone.php?page=1&err=Something went Wrong!");
    die();
}
?>