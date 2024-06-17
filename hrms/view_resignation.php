<?php
include 'db_connect.php';
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *FROM resign_list where id = '{$_GET['id']}'");
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
		<form action="" id="manage_resign">
      		</div>
	    <table class="table table-striped table-bordered" id="id">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName</th>
						<th class="text-center">Gender</th>
						<th class="text-center">Position</th>
						<th class="text-center">Department</th>
						<th class="text-center">Section</th>
						<th class="text-center">Phone Number</th>
						<th class="text-center">Starting Date</th>
						<th class="text-center">Lasting Working Date</th>
						<th class="text-center">Working Period</th>
						<th class="text-center">Balance Due</th>
						<th class="text-center">Reason of Resignation</th>
						<th class="text-center">Application Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$qry = $conn->query("SELECT *FROM resign_list where id = '{$_GET['id']}'");
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
						<td class="text-center"><b><?php echo $fenglish ?></b></td>
						<td class="text-center"><b><?php echo $gender ?></b></td>
						<td class="text-center"><b><?php echo $position ?></b></td>
						<td class="text-center"><b><?php echo $section ?></b></td>
						<td class="text-center"><b><?php echo $department ?></b></td>
						<td class="text-center"><b><?php echo $personal_contact ?></b></td>
						<td class="text-center"><b><?php echo $start_date ?></b></td>
						<td class="text-center"><b><?php echo $end_date ?></b></td>
						<td class="text-center"><b><?php echo $working_period ?></b></td>
						<td class="text-center"><b><?php echo $tob ?></b></td>
						<td class="text-center"><b><?php echo $reason ?></b></td>
						<td class="text-center"><b><?php echo $date_r ?></b></td>
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