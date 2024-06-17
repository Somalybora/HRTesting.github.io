<?php
	include 'db_connect.php';
?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<div class="card-tools">
		<span><a class="btn btn-primary" href="export_hardship.php?"><i class="fas fa-download"></i> Export to CSV Excel</a></span>
			</div>
			<div class="card-tools">
				<a class="btn btn-info border-secondary mr-2" href="./index.php?page=new_hardship"><i class="fa fa-plus"></i> Add New Hardship</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="12%">
					<col width="15%">
					<col width="12%">
					<col width="15%">
					<col width="12%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">Full Name</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Hardship Type</th>
						<th class="text-center">Accommodation</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * ,concat(' ',', ',' ',' ',' ') as name FROM hardship_list order by concat(fullname,', ',' ',' ',' ') asc");
					while($row= $qry->fetch_assoc()):
					?>

					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class="text-center"><b><?php echo $row['staff_id'] ?></b></td>
						<td class="text-center"><b><?php echo $row['fullname'] ?></b></td>
						<td class="text-center"><b><?php echo $row['position'] ?></b></td>
						<td class="text-center"><b><?php echo $row['section'] ?></b></td>
						<td class="text-center"><b><?php echo $row['hard_type'] ?></b></td>
						<td class="text-center"><b><?php echo $row['accommodate'] ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_hardship" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_hardship&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_hardship" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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

    $('.view_hardship').click(function(){
        uni_modal("<i class='fa fa-card'></i> Hardship Details","view_hardship.php?id="+$(this).attr('data-id'),('large'));
    });

    $('.delete_hardship').click(function(){
        _conf("Are you sure to delete this Hardship?","delete_hardship",[$(this).attr('data-id')]);
    });

    $('#export').click(function(){
        window.location.href = 'export_hardship_list.php';
    });
});
	function delete_hardship($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_hardship',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>