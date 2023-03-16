<?php
require("../layout/db.php");

$id = $_POST['id'];

$sql = "DELETE FROM workdone WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/workdone.php?page=1&msg=Workdone Deleted Successfully !");
    die();
} else {
    header("Location: /admin/workdone.php?page=1&err=Something went Wrong!");
    die();
}
?>