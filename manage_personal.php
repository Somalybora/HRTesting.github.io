<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM personal_contact where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage_personal">
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
			<label for="position">Positiion</label>
			<input type="text" name="position" id="position" class="form-control" value="<?php echo isset($meta['position']) ? $meta['position']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Place of Birth(Khmer)</label>
			<input type="text" name="pob_khmer" class="form-control" required value="<?php echo isset($meta['pob_khmer']) ? $meta['pob_khmer']: '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Place of Birth(English)</label>
			<input type="text" name="pob_english" class="form-control" required value="<?php echo isset($meta['pob_english']) ? $meta['pob_english']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Nationality</label>
			<input type="text" name="nationality" class="form-control" required value="<?php echo isset($meta['nationality']) ? $meta['nationality']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Cambodia NID No.</label>
			<input type="text" name="cnn" class="form-control" required value="<?php echo isset($meta['cnn']) ? $meta['cnn']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Passport No.</label>
			<input type="text" name="passport" class="form-control" required value="<?php echo isset($meta['passport']) ? $meta['passport']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">CNB Bank Account</label>
			<input type="text" name="cnb" class="form-control" required value="<?php echo isset($meta['cnb']) ? $meta['cnb']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Current Address(Khmer)</label>
			<input type="text" name="ca_khmer" class="form-control" required value="<?php echo isset($meta['ca_khmer']) ? $meta['ca_khmer']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Current Address(English)</label>
			<input type="text" name="ca_english" class="form-control" required value="<?php echo isset($meta['ca_english']) ? $meta['ca_english']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Personal Contact(Line1)</label>
			<input type="text" name="pc_line1" class="form-control" required value="<?php echo isset($meta['pc_line1']) ? $meta['pc_line1']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Personal Contact(Line2)</label>
			<input type="text" name="pc_line2" class="form-control" required value="<?php echo isset($meta['pc_line2']) ? $meta['pc_line2']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Telegram Contact</label>
			<input type="text" name="tel_con" class="form-control" required value="<?php echo isset($meta['tel_con']) ? $meta['tel_con']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Personal Email</label>
			<input type="text" name="pemail" class="form-control" required value="<?php echo isset($meta['pemail']) ? $meta['pemail']:'' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Professional Email(Bank)</label>
			<input type="text" name="pemail_bank" class="form-control" required value="<?php echo isset($meta['pemail_bank']) ? $meta['pemail_bank']:'' ?>">
		</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_personal').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_personal',
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