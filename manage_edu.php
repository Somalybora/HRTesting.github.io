<?php
include('db_connect.php');
//session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM edu where id={$_GET['id']}")->fetch_array();
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage_edu">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="staff_id">Staff ID</label>
			<input type="text" name="staff_id" id="staff_id" class="form-control" value="<?php echo isset($meta['staff_id']) ? $meta['staff_id']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($meta['fullname']) ? $meta['fullname']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="position">Highest Academic Degree</label>
			<input type="text" name="had" id="had" class="form-control" value="<?php echo isset($meta['had']) ? $meta['had']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Major(English)</label>
			<input type="text" name="major" class="form-control" required value="<?php echo isset($meta['major']) ? $meta['major']: '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">University/Institute</label>
			<input type="text" name="uni_ins" class="form-control" required value="<?php echo isset($meta['uni_ins']) ? $meta['uni_ins']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Education</label>
			<input type="text" name="edu" class="form-control" required value="<?php echo isset($meta['edu']) ? $meta['edu']:'' ?>">
		</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_edu').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_edu',
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