<?php 
include('db_connect.php');
//session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM health where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage_health">
		<input type="hidden" name="id" value="<?php echo isset($id) ? ($id): '' ?>">
		<div class="form-group">
			<label for="staff_id">Staff ID</label>
			<input type="text" name="staff_id" id="staff_id" class="form-control" value="<?php echo isset($staff_id) ? $staff_id: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($fullname) ? $fullname: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="position">NSSF ID Card No.</label>
			<input type="text" name="nssf" id="nssf" class="form-control" value="<?php echo isset($nssf) ? $nssf: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="position">Vaccination Card No.</label>
			<input type="text" name="vcard" id="vcard" class="form-control" value="<?php echo isset($vcard) ? $vcard: '' ?>" required>
		</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_health').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_health',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Staff applyStaff apply already exist</div>')
					end_load()
				}
			}
		})
	})

</script>