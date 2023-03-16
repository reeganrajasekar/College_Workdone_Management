<?php
require("../layout/db.php");
$class = $_POST["class"];
$start = $_POST["start"];
$end = $_POST["end"];


$sql = "SELECT * FROM workdone WHERE class='$class' AND status='Approved' AND date between '$start' and '$end'";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sid = $row['sid'];
        $sql1 = "SELECT name from staff WHERE id='$sid'";
        $result1 = $conn->query($sql1);
        while ($row1 = $result1->fetch_assoc()) {
            array_push($products, [$row["class"],$row["details"],$row1["name"],$row1["date"]]);
        }
        
    }
    $columns = [
        'class',
        'Details',
        'Staff Name',
        'Date',
    ];
    
    
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$class.' report.csv"');
    
    echo implode(',', $columns) . PHP_EOL;
    foreach ($products as $product){
        echo implode(',', $product) . PHP_EOL;
    }
    
}else{
    header("Location: /admin/report.php?err=Staff Details Not Found!");
    die();
}
?>