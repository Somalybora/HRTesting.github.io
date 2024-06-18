<?php

include 'db_connect.php';

if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *FROM leave_list where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
		<form action="view_leave, id" id="manage_leave">
      		</div>
	    <table class="table tabe-hover table-bordered" id="id">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Department</th>
						<th class="text-center">Type of Leave</th>
						<th class="text-center">From Date</th>
						<th class="text-center">To Date</th>
						<th class="text-center">Reason</th>
						<th class="text-center">Document Attachment</th>
						<th class="text-center">Days</th>
						<th class="text-center">Balance Due</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$qry = $conn->query("SELECT *FROM leave_list where id = '{$_GET['id']}'");
				if($qry->num_rows > 0){
				    $res = $qry->fetch_array();
					$i=1;
				    foreach($res as $k => $v){
				        if(!is_numeric($k))
				        $$k = $v;
				    }
   				}
			?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class="text-center"><b><?php echo $staff_id ?></b></td>
						<td class="text-center"><b><?php echo $fullname ?></b></td>
						<td class="text-center"><b><?php echo $position ?></b></td>
						<td class="text-center"><b><?php echo $section ?></b></td>
						<td class="text-center"><b><?php echo $department ?></b></td>
						<td class="text-center"><b><?php echo $leave_type ?></b></td>
						<td class="text-center"><b><?php echo $start_date ?></b></td>
						<td class="text-center"><b><?php echo $end_date ?></b></td>
						<td class="text-center"><b><?php echo $reason ?></b></td>
						<td class="text-center"><b><?php echo $doc_att ?></b></td>
						<td class="text-center"><b><?php echo $days_requested ?></b></td>
						<td class="text-center"><b><?php echo $balance_due ?></b></td>
					</tr>
			</tbody>
	</form>
	</div>
</div>
</div>

<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>