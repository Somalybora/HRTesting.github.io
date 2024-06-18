<?php 
include('db_connect.php');
//session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM perfor where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage_perfor">
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
		<label for="" class="control-label">Performance Bonus(for the years)</label>
		<input type="text" name="pbonus" class="form-control form-control-sm" required value="<?php echo isset($pbonus) ? $pbonus : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Band(for the years)</label>
		<input type="text" name="band" class="form-control form-control-sm" required value="<?php echo isset($band) ? $band : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Modification(for the years)</label>
		<input type="text" name="modifi" class="form-control form-control-sm" required value="<?php echo isset($modifi) ? $modifi : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Remark(for each year)</label>
		<input type="text" name="remark" class="form-control form-control-sm" required value="<?php echo isset($remark) ? $remark : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Contract Type</label>
		<select name="contract_type" id="contract_type" value="<?= isset($contract_type) ? $contract_type : "" ?>" class="form-control form-control-sm rounded-0" required>
                <option <?= isset($contract_type) && $contract_type == 'UDC' ? 'selected' : '' ?>>UDC</option>
                <option <?= isset($contract_type) && $contract_type == 'FDC' ? 'selected' : '' ?>>FDC</option>
            </select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Contract Due Date(If FDC)</label>
		<input type="date" name="cd_date" id="cd_date" value="<?= isset($cd_date) ? date("D m, Y"($cd_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Career Movement within CAIC</label>
		<input type="text" name="cmovement" class="form-control form-control-sm" required value="<?php echo isset($cmovement) ? $cmovement : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Disciplinary Record</label>
		<select name="drecord" id="drecord" value="<?= isset($drecord) ? $drecord : "" ?>" class="form-control form-control-sm rounded-0" required>
                <option <?= isset($drecord) && $drecord == 'Yes' ? 'selected' : '' ?>>Yes</option>
                <option <?= isset($drecord) && $drecord == 'No' ? 'selected' : '' ?>>No</option>
            </select>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Probationary Period(in month)</label>
		<input type="text" name="pp_month" class="form-control form-control-sm" required value="<?php echo isset($pp_month) ? $pp_month : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Confirm Pro. Date</label>
		<input type="date" name="cpro_date" id="cpro_date" value="<?= isset($cpro_date) ? date("D m, Y"($cpro_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Latest Starting Date at Group</label>
		<input type="date" name="lstarting_date" id="lstarting_date" value="<?= isset($lstarting_date) ? date("D m, Y"($lstarting_date)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Latest Seniority from Group</label>
		<input type="date" name="lseniority" id="lseniority" value="<?= isset($lseniority) ? date("D m, Y"($lseniority)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Suspension Period</label>
		<input type="text" name="s_period" class="form-control form-control-sm" required value="<?php echo isset($s_period) ? $s_period : '' ?>">
	</div>
	<div class="form-group">
		<label for="" class="control-label">Last Working Day</label>
		<input type="date" name="working_day" id="working_day" value="<?= isset($working_day) ? date("D m, Y"($working_day)) : "" ?>" class="form-control form-control-sm rounded-0" required>
	</div>
	<div class="form-group">
		<label for="" class="control-label">Reasons of Resignation</label>
		<input type="text" name="ror" class="form-control form-control-sm" required value="<?php echo isset($ror) ? $ror : '' ?>">
	</div>
	</form>
</div>
<style>
</style>
<script>
	$('#manage_perfor').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_perfor',
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