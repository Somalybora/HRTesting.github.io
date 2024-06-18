<?php 
include('db_connect.php');
//session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM famaily where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage_family">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id: '' ?>">
		<div class="form-group">
			<label for="staff_id">Staff ID</label>
			<input type="text" name="staff_id" id="staff_id" class="form-control" value="<?php echo isset($staff_id) ? $staff_id: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo isset($fullname) ? $fullname: '' ?>" required>
		</div>
		<div class="form-group">
		<label for="" class="control-label">Marital Status</label>
		<select name="marital_status" id="marital_status" value="<?= isset($marital_status) ? $marital_status : "" ?>" class="form-control form-control-sm rounded-0" required onchange="toggleFamilyFields()">
                <option <?= isset($marital_status) && $marital_status == 'Single' ? 'selected' : '' ?>>Single</option>
                <option <?= isset($marital_status) && $marital_status == 'Married' ? 'selected' : '' ?>>Married</option>
                <option <?= isset($marital_status) && $marital_status == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
				<option <?= isset($marital_status) && $marital_status == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
            </select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Spouse FullName(Khmer)</label>
		<input type="text" name="sp_khmer" class="form-control form-control-sm" required value="<?php echo isset($sp_khmer) ? $sp_khmer : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Spouse FullName(English)</label>
		<input type="text" name="sp_english" class="form-control form-control-sm" required value="<?php echo isset($sp_english) ? $sp_english : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Date of Birth(Spouse)</label>
		<input type="date" name="dob_spouse" id="dob_spouse" value="<?= isset($dob_spouse) ? date("D m, Y"($dob_spouse)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Nationality</label>
		<input type="text" name="sp_nation" id="sp_nation" value="<?= isset($sp_nation) ? date("D m, Y"($sp_nation)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Spouse Occupation</label>
		<input type="text" name="soccup" class="form-control form-control-sm" required value="<?php echo isset($soccup) ? $soccup : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Spouse Contact No.(Line1)</label>
		<input type="text" name="spc_line1" class="form-control form-control-sm" required value="<?php echo isset($spc_line1) ? $spc_line1 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Spouse Contact No.(Line2)-Optional</label>
		<input type="text" name="spc_line2" class="form-control form-control-sm" required value="<?php echo isset($spc_line2) ? $spc_line2 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">No. of Children</label>
		<input type="text" name="noc" class="form-control form-control-sm" required value="<?php echo isset($noc_1) ? $noc : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">1st Children FullName(Khmer)</label>
		<input type="text" name="cfull_khmer1" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer1) ? $cfull_khmer1 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">1st Children FullName(English)</label>
		<input type="text" name="cfull_english1" class="form-control form-control-sm" required value="<?php echo isset($cfull_english1) ? $cfull_english1 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">1st Child Date of Birth</label>
		<input type="date" name="dob_c1" id="dob_c1" value="<?= isset($dob_c1) ? date("D m, Y"($dob_c1)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">1st Children Occupation</label>
		<input type="text" name="coccup1" class="form-control form-control-sm" required value="<?php echo isset($coccup1) ? $coccup1 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">2nd Children FullName(Khmer)</label>
		<input type="text" name="cfull_khmer2" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer2) ? $cfull_khmer2 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">2nd Children FullName(English)</label>
		<input type="text" name="cfull_english1" class="form-control form-control-sm" required value="<?php echo isset($cfull_english2) ? $cfull_english2 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">2nd Child Date of Birth</label>
		<input type="date" name="dob_c2" id="dob_c2" value="<?= isset($dob_c2) ? date("D m, Y"($dob_c2)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">2nd Children Occupation</label>
		<input type="text" name="coccup2" class="form-control form-control-sm" required value="<?php echo isset($coccup2) ? $coccup2 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">3rd Children FullName(Khmer)</label>
		<input type="text" name="cfull_khmer3" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer3) ? $cfull_khmer3 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">3rd Children FullName(English)</label>
		<input type="text" name="cfull_english3" class="form-control form-control-sm" required value="<?php echo isset($cfull_english3) ? $cfull_english3 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">3rd Child Date of Birth</label>
		<input type="date" name="dob_c3" id="dob_c3" value="<?= isset($dob_c3) ? date("D m, Y"($dob_c3)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">3rd Children Occupation</label>
		<input type="text" name="coccup3" class="form-control form-control-sm" required value="<?php echo isset($coccup3) ? $coccup3 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">4th Children FullName(Khmer)</label>
		<input type="text" name="cfull_khmer4" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer4) ? $cfull_khmer4 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">4th Children FullName(English)</label>
		<input type="text" name="cfull_english4" class="form-control form-control-sm" required value="<?php echo isset($cfull_english4) ? $cfull_english4 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">4th Child Date of Birth</label>
		<input type="date" name="dob_c4" id="dob_c4" value="<?= isset($dob_c4) ? date("D m, Y"($dob_c4)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">4th Children Occupation</label>
		<input type="text" name="coccup4" class="form-control form-control-sm" required value="<?php echo isset($coccup4) ? $coccup4 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">5th Children FullName(Khmer)</label>
		<input type="text" name="cfull_khmer5" class="form-control form-control-sm" required value="<?php echo isset($cfull_khmer5) ? $cfull_khmer5 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">5th Children FullName(English)</label>
		<input type="text" name="cfull_english5" class="form-control form-control-sm" required value="<?php echo isset($cfull_english5) ? $cfull_english5 : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">5th Child Date of Birth</label>
		<input type="date" name="dob_c5" id="dob_c5" value="<?= isset($dob_c5) ? date("D m, Y"($dob_c5)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">5th Children Occupation</label>
		<input type="text" name="coccup5" class="form-control form-control-sm" required value="<?php echo isset($coccup5) ? $coccup5 : '' ?>">
	</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_family').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_family',
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