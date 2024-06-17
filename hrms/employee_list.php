<?php include'db_connect.php' ?>
<div class="col-lg-16">
	<div class="container-fluid card-outline card-navy shadow rounded-0">
		<div class="card-header">
		<div class="card-tools">
		<span><a class="btn btn-primary" href="export_employee.php?"><i class="fas fa-download"></i> Export to CSV Excel</a></span>
			</div>
			<div class="card-tools">
				<span><a class="btn btn-info border-secondary mr-2" href="./index.php?page=new_employee"><i class="fa fa-plus"></i> Add New Employee</a></span>
			</div>
		</div>
		<div class="card-body ">
			<table class="table table-striped table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Staff ID</th>
						<th class="text-center">FullName-Khmer</th>
						<th class="text-center">FullName-English</th>
						<th class="text-center">Gender</th>
						<th class="text-center">Position</th>
						<th class="text-center">Section</th>
						<th class="text-center">Department</th>
						<th class="text-center">Status</th>
						<th class="text-center">Personal Contact(Line1)</th>
						<th class="text-center">Telegram Contact</th>
						<th hidden="text-center">Resignation</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM employee_list");
					//$employees = $conn->query("SELECT e.*,r.tob AS resign From `employee_list` e INNER JOIN `resign` r ON e.resign_id = r.id ".(isset($staff_id) ? $staff_id: '')." order by r.tob asc");
					while($row= $qry->fetch_assoc()):
							$departments = $conn->query("SELECT section,department FROM department_list Where id = $id");
							$dept_arr[0]= "Unset";
							while($row=$departments->fetch_assoc()){
								$dept_arr[$row['id']] =$row['department']['section'];
							}
					?>

					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class="text-center"><b><?php echo $staff_id ?></b></td>
						<td class="text-center"><b><?php echo $fullname_khmer ?></b></td>
						<td class="text-center"><b><?php echo $fullname_english?></b></td>
						<td class="text-center"><b><?php echo $gender ?></b></td>
						<td class="text-center"><b><?php echo $position ?></b></td>
						<td class="text-center"><b><?php echo $section ?></b></td>
						<td class="text-center"><b><?php echo isset($dept_arr[$row['department_id']]) ? $dept_arr[$row['department_id']] : 'Unknow Department' ?></b></td>
						<td class="text-center"><b><?php echo $tob == $employment_status ?></b></td>
						<td class="text-center"><b><?php echo $pc_line1 ?></b></td>
						<td class="text-center"><b><?php echo $tel_con ?></b></td>
						<td hidden="text-center"><b><?php echo $tob ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_employee" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_employee&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_employee" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
                      document.getElementById('tob').addEventListener('change', function() {
                        var toB = this.value;
                        var employmentStatus = document.getElementById('employment_status');
                        if (typeOfSubmission === 'resign') {
                          var staffId = document.getElementById('staff_id').value;
                          if (staffId) {
                            employmentStatus.value = 'Apply Resign';
                          } else {
                            employmentStatus.value = 'Inactive';
                          }
                        }
                      });
                    </script>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_employee').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Employee Details","view_employee.php?id="+$(this).attr('data-id'),('large'))
	})
	$('.delete_employee').click(function(){
	_conf("Are you sure to delete this Employee?","delete_employee",[$(this).attr('data-id')])
	})
	})
	function delete_employee($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_employee',
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