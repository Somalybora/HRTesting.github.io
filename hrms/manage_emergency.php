<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM emergencys where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage_emergency">
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
			<label for="" class="control-label">Emergency Contact Person(Name in Khmer)</label>
			<input type="text" name="ecp_khmer" id="ecp_khmer" value="<?= isset($ecp_khmer) ? $ecp_khmer : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Emergency Contact Person(Name in English)</label>
			<input type="text" name="ecp_english" id="ecp_english" value="<?= isset($ecp_english) ? $ecp_english : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Emergency Contact(Line1)</label>
			<input type="text" name="ec_line1" id="ec_line1" value="<?= isset($ec_line1) ? $ec_line1 : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Emergency Contact(Line2)</label>
			<input type="text" name="ec_line2" id="ec_line2" value="<?= isset($ec_line2) ? $ec_line2 : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Relationship</label>
			<input type="text" name="relationship" id="relationship" value="<?= isset($relationship) ? $relationship : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Emergency Contact Person(Current Address)</label>
			<input type="text" name="ecp_ca" id="ecp_ca" value="<?= isset($ecp_ca) ? $ecp_ca : "" ?>" class="form-control form-control-sm rounded-0" required>
		</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_emergencys').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_emergencys',
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