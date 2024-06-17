<?php
include 'db_connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Resignation_list.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Staff ID', 'FullName(English)', 'Gender', 'Position', 'Department', 'Section'
 ,'Phone Number', 'Starting Date', 'Lasting Working Date', 'Working Period', 'Balance Due', 'Reason of Resignation', 'Application Date'));

$qry = $conn->query("SELECT * FROM resignation_list");
if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){
        fputcsv($output, $row);
    }
}

fclose($output);
exit();
?>