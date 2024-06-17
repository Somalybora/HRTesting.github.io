<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
		<div class="card-tools">
		<span><a class="btn btn-primary" href="export_resignation.php?"><i class="fas fa-download"></i> Export to CSV Excel</a></span>
			</div>
			<div class="card-tools">
				<a class="btn btn-info border-secondary mr-2" href="./index.php?page=new_resignation"><i class="fa fa-plus"></i> Add New Resigner</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Type of Submission</th>
						<th class="text-center">Reason</th>
						<th class="text-center">Application Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					$qry = $conn->query("SELECT *FROM resign_list");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class="text-center"><b><?php echo $row['staff_id'] ?></b></td>
						<td class="text-center"><b><?php echo $row['fenglish'] ?></b></td>
						<td class="text-center"><b><?php echo $row['position'] ?></b></td>
						<td class="text-center"><b><?php echo $row['section'] ?></b></td>
						<td class="text-center"><b><?php echo $row['tob'] ?></b></td>
						<td class="text-center"><b><?php echo $row['reason'] ?></b></td>
						<td class="text-center"><b><?php echo $row['date_r'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_resignation" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_resignation&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_resign" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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

    $('.view_resignation').click(function(){
        uni_modal("<i class='fa fa-card'></i> Resignation Details","view_resignation.php?id="+$(this).attr('data-id'),('large'));
    });

    $('.delete_resign').click(function(){
        _conf("Are you sure to delete this Resignation?","delete_resign",[$(this).attr('data-id')]);
    });

    $('#export').click(function(){
        window.location.href = 'export_resignation_list.php';
    });
});
function delete_resign($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_resign',
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