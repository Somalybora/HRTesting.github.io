<?php
$conn = mysqli_connect("localhost","root","test", "hrms_db");

$query = "SELECT * FROM leave_list";
$query = "SELECT * FROM employee_list";
$query = "SELECT * FROM hardship_list";
$query = "SELECT * FROM resignation_list";
$result = mysqli_query($conn, $query);

$num_column = mysqli_num_fields($result);

$csv_header = '';
for($i=0;$i<$num_column;$i++) {
    $csv_header .= '"' . mysqli_fetch_field_direct($result,$i)->name . '",';
}
$csv_header .= "\n";

$csv_row ='';
while($row = mysqli_fetch_row($result)) {
	for($i=0;$i<$num_column;$i++) {
		$csv_row .= '"' . $row[$i] . '",';
	}
	$csv_row .= "\n";
}

/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=employee_list.csv');
echo $csv_header . $csv_row;
exit;
?>