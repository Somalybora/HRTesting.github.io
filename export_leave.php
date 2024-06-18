<?php
include 'db_connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Leave_list.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Staff ID', 'FullName', 'Position', 'Section', 'Department', 'Leave Type', 'From Date', 'To Date', 'Days Requested', 'Balance Due', 'Reason', 'Document Attachment', 'Remark'));

$qry = $conn->query("SELECT * FROM leave_list");
if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){
        fputcsv($output, $row);
    }
}

fclose($output);
exit();
?>