<?php
include 'db_connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Hardship_list.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Staff ID', 'FullName(English)', 'Position', 'Section', 'Department'
 ,'Hardship Type', 'Effective Date(Full)', 'Application Date', 'Effective Date', 'Nature of Work', 'Accommodation', 'Effective Date(Full)', 'Location', 'Room Number'
 , 'Personal Contact'));

$qry = $conn->query("SELECT * FROM hardship_list");
if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){
        fputcsv($output, $row);
    }
}

fclose($output);
exit();
?>