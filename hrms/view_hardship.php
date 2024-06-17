<?php
include 'db_connect.php';
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *FROM hardship_list where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<div class="card">
	<div class="card-body">
	<form action=" " id="manage_hardship">
      </div>
	    <table class="table table-striped table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName (English)</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Department</th>
						<th class="text-center">Hardship Type</th>
						<th class="text-center">Effective Date(Full)</th>
						<th class="text-center">Application Date</th>
						<th class="text-center">Effective Date</th>
						<th class="text-center">Nature of Work</th>
						<th class="text-center">Accommodation</th>
						<th class="text-center">Effective Date(Full)</th>
						<th class="text-center">Location</th>
						<th class="text-center">Room Number</th>
						<th class="text-center">Personal Contact</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$qry = $conn->query("SELECT *FROM hardship_list where id = '{$_GET['id']}'");
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
        				<td class="text-center"><b><?php echo $hard_type ?></b></td>
						<td class="text-center"><b><?php echo $hs_full ?></b></td>
        				<td class="text-center"><b><?php echo $app_date ?></b></td>
						<td class="text-center"><b><?php echo $eff_date ?></b></td>
        				<td class="text-center"><b><?php echo $now ?></b></td>
        				<td class="text-center"><b><?php echo $accommodate ?></b></td>
						<td class="text-center"><b><?php echo $ed_full ?></b></td>
						<td class="text-center"><b><?php echo $zone ?></b></td>
        				<td class="text-center"><b><?php echo $room ?></b></td>
        				<td class="text-center"><b><?php echo $personal_con ?></b></td>
					</tr>
			</tbody>
	</form>
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