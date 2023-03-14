<?php
$sid = $_POST["sid"];
require("../layout/db.php");


$sql = "SELECT * FROM staff WHERE sid='$sid'";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $staffid = $row['id'];
        $sql1 = "SELECT * FROM workdone WHERE sid='$staffid'";
        $result1 = $conn->query($sql1);
        while ($row1 = $result1->fetch_assoc()) {
            array_push($products, [$row1["class"],$row1["details"],$row1["reg_date"]]);
        }
        
    }
    $columns = [
        'class',
        'Details',
        'Date',
    ];
    
    
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$sid.' report.csv"');
    
    echo implode(',', $columns) . PHP_EOL;
    foreach ($products as $product){
        echo implode(',', $product) . PHP_EOL;
    }
    
}else{
    header("Location: /admin/report.php?err=Staff Details Not Found!");
    die();
}
?>