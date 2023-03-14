<?php 
require("./db.php");

// 
$sql = "CREATE TABLE staff(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500) NOT NULL,
    email VARCHAR(500) NOT NULL,
    password VARCHAR(500) NOT NULL,
    sid VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table staff created successfully<br>";
} else {
    echo "Error creating table: ";
}

$sql = "CREATE TABLE workdone(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sid INT(6) NOT NULL,
    class VARCHAR(500) NOT NULL,
    details VARCHAR(500) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table workdone created successfully<br>";
} else {
    echo "Error creating table: ";
}

?>