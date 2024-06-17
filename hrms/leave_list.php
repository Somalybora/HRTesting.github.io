<?php

?>

<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
		<div class="card-tools">
		<span><a class="btn btn-primary" href="export_leave.php?"><i class="fas fa-download"></i> Export to CSV Excel</a></span>
			</div>
			<div class="card-tools">
				<a class="btn btn-info border-secondary mr-2" href="./index.php?page=new_leave"><i class="fa fa-plus"></i> Add New Leave</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" style="width:100%" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Days Requested</th>
						<th class="text-center">Leave Type</th>
						<th class="text-center">From Date</th>
						<th class="text-center">To Date</th>
						<th class="text-center">Balance Due</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					$qry = $conn->query("SELECT *FROM leave_list");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class="text-center"><b><?php echo $row['staff_id'] ?></b></td>
						<td class="text-center"><b><?php echo $row['fullname'] ?></b></td>
						<td class="text-center"><b><?php echo $row['position'] ?></b></td>
						<td class="text-center"><b><?php echo $row['section'] ?></b></td>
						<td class="text-center"><b><?php echo $row['days_requested'] ?></b></td>
						<td class="text-center"><b><?php echo $row['leave_type'] ?></b></td>
						<td class="text-center"><b><?php echo $row['start_date'] ?></b></td>
						<td class="text-center"><b><?php echo $row['end_date'] ?></b></td>
						<td class="text-center"><b><?php echo $row['balance_due'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_leave" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_leave&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_leave" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

$(document).ready(function(){
    $('#list').dataTable();

    $('.view_leave').click(function(){
        uni_modal("<i class='fa fa-card'></i> Leave Details","view_leave.php?id="+$(this).attr('data-id'),('large'));
    });

    $('.delete_leave').click(function(){
        _conf("Are you sure to delete this Leave?","delete_leave",[$(this).attr('data-id')]);
    });

    $('#export').click(function(){
        window.location.href = 'export_leave_list.php';
    });
});
	function delete_leave($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_leave',
			method:'POST',
			data:{id: id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success');
					setTimeout(function(){
						location.reload()
					},1500)
				}
				else {
                        alert_toast("Failed to delete data", 'error');
                    }
			}
		})
	}
</script>
