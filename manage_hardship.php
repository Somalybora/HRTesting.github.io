<?php
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM hardship_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
if (isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];

    $conn = new mysqli('localhost', 'username', 'password', 'hrms_db');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed']));
    }

    $sql = "SELECT fenglish, position, department, section FROM employee_list WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Staff ID not found']);
    }

    $stmt->close();
    $conn->close();
} else {
   // echo json_encode(['' => false, 'message' => '']);
}
?>
<div class="container-fluid">
	<form action="" id="manage_hardship">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="" class="control-label">Staff ID</label>
			<input type="text" name="staff_id" class="form-control" required value="<?php echo isset($staff_id) ? $staff_id : '' ?>" onblur="fetchStaffData(this.value)">
		</div>
		<div class="form-group">
			<label for="fenglish" class="control-label">FullName (English)</label>
			<input type="text" class="form-control form-control-sm" name="fenglish" id="fenglish" value="<?php echo isset($fenglish) ? $fenglish : '' ?>">
		</div>
		<div class="form-group">
				<label for="position" class="control-label">Position</label>
				<input type="text" name="position" class="form-control form-control-sm" required value="<?php echo isset($position) ? $position : '' ?>">
				</div>
						<div class="form-group">
							<label for="section" class="control-label">Section</label>
							<select name="section" id="section" value="<?php echo isset($section) ? $section : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($section) && $section == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                    <option <?= isset($section) && $section == 'Batching Plant' ? 'selected' : '' ?>>Batching Plant</option>
                                    <option <?= isset($section) && $section == 'Building Inspection' ? 'selected' : '' ?>>Building Inspection</option>
                                    <option <?= isset($section) && $section == 'CAIC External Work' ? 'selected' : '' ?>>CAIC External Work</option>
                                    <option <?= isset($section) && $section == 'HR' ? 'selected' : '' ?>>HR</option>
                                    <option <?= isset($section) && $section == 'Claim Management' ? 'selected' : '' ?>>Claim Management</option>
                                    <option <?= isset($section) && $section == 'Dredging Plant' ? 'selected' : '' ?>>Dredging Plant</option>
                                    <option <?= isset($section) && $section == 'General Construction & Infrastructure' ? 'selected' : '' ?>>General Consstruction & Infrastructure</option>
                                    <option <?= isset($section) && $section == 'Lake Sand' ? 'selected' : '' ?>>Lake Sand</option>
                                    <option <?= isset($section) && $section == 'Land Dispute Resolution' ? 'selected' : '' ?>>Land Dispute Resolution</option>
                                    <option <?= isset($section) && $section == 'Landside' ? 'selected' : '' ?>>Landside</option>
                                    <option <?= isset($section) && $section == 'Machinery' ? 'selected' : '' ?>>Machinery</option>
                                    <option <?= isset($section) && $section == 'N/A' ? 'selected' : '' ?>>N/A</option>
                                    <option <?= isset($section) && $section == 'Payroll' ? 'selected' : '' ?>>Payroll</option>
                                    <option <?= isset($section) && $section == 'Project Manager' ? 'selected' : '' ?>>Project Manager</option>
                                    <option <?= isset($section) && $section == 'Quantity Surveyor' ? 'selected' : '' ?>>Quantity Surveyor</option>
                                    <option <?= isset($section) && $section == 'Safety' ? 'selected' : '' ?>>Safety</option>
                                    <option <?= isset($section) && $section == 'Security' ? 'selected' : '' ?>>Security</option>
                                    <option <?= isset($section) && $section == 'Site Formation' ? 'selected' : '' ?>>Site Formation</option>
                                    <option <?= isset($section) && $section == 'Worker Wage' ? 'selected' : '' ?>>Worker Wage</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="department" class="control-label">Department</label>
							<select name="department" id="department" value="<?php echo isset($department) ? $department : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($department) && $department == 'Finance' ? 'selected' : '' ?>>Finance</option>
                                    <option <?= isset($department) && $department == 'ICT' ? 'selected' : '' ?>>ICT</option>
                                    <option <?= isset($department) && $department == 'Procurement' ? 'selected' : '' ?>>Procurement</option>
                                    <option <?= isset($department) && $department == 'Payroll Office' ? 'selected' : '' ?>>Payroll Office</option>
                                    <option <?= isset($department) && $department == 'HR' ? 'selected' : '' ?>>HR</option>
                                    <option <?= isset($department) && $department == 'In House Project' ? 'selected' : '' ?>>In House Project</option>
                                    <option <?= isset($department) && $department == 'Ground Handling' ? 'selected' : '' ?>>Ground Handling</option>
                                    <option <?= isset($department) && $department == 'Pre-Operation Phase' ? 'selected' : '' ?>>Pre-Operation Phase</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="hard_type" class="control-label">Hardship Type</label>
							<select name="hard_approval" id="hard_type" value="<?= isset($hard_type) ? $hard_type : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($hard_type) && $hard_type == 'Full Hardship' ? 'selected' : '' ?>>Full Hardship</option>
                                    <option <?= isset($hard_type) && $hard_type == 'Half Hardship' ? 'selected' : '' ?>>Half Hardship</option>
									<option <?= isset($hard_type) && $hard_type == 'None' ? 'selected' : '' ?>>None</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Effective Date(Full)</label>
							<input type="date" name="hs_full" id="hs_full" value="<?= isset($hs_full) ? $hs_full : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="app_date" class="control-label">Application Date</label>
							<input type="date" name="app_date" id="app_date" value="<?= isset($app_date) ? $app_date : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Effective Date</label>
							<input type="date" name="eff_date" id="eff_date" value="<?= isset($eff_date) ? $eff_date : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Nature of Work</label>
							<select name="now" id="now" value="<?= isset($now) ? $now : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($now) && $now == 'Engineer' ? 'selected' : '' ?>>Engineer</option>
                                    <option <?= isset($now) && $now == 'Non-Engineer' ? 'selected' : '' ?>>Non-Engineer</option>
                            </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Accommodation</label>
							<select name="accommodate" id="accommodate" value="<?= isset($accommodate) ? $accommodate : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($accommodate) && $accommodate == 'Full' ? 'selected' : '' ?>>Full</option>
                                    <option <?= isset($accommodate) && $accommodate == 'Half' ? 'selected' : '' ?>>Half</option>
									<option <?= isset($accommodate) && $accommodate == 'None' ? 'selected' : '' ?>>None</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Effective Date(Full)</label>
							<input type="date" name="ed_full" id="ed_full" value="<?= isset($ed_full) ? $ed_full : "" ?>" class="form-control form-control-sm rounded-0" required>
						</div>
						<div class="form-group">
							<label class="control-label">Location</label>
							<select name="zone" id="zone" value="<?= isset($zone) ? $zone : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($zone) && $zone == 'CAIC' ? 'selected' : '' ?>>CAIC</option>
                                    <option <?= isset($zone) && $zone == 'Sinohaidro' ? 'selected' : '' ?>>Sinohaidro</option>
									<option <?= isset($zone) && $zone == 'MCC' ? 'selected' : '' ?>>MCC</option>
                                </select>
						</div>
						<div class="form-group">
							<label class="control-label">Room Number</label>
							<input type="text" name="room" id="room" class="form-control form-control-sm" required value="<?php echo isset($room) ? $room : '' ?>">
						</div>
						<div class="form-group">
							<label class="control-label">Personal Contact</label>
							<input type="text" name="personal_con" class="form-control form-control-sm" required value="<?php echo isset($personal_con) ? $personal_con : '' ?>">
						</div>
	</form>
</div>
<script>
    const appDateInput = document.getElementById('app_date');

    // Handle user input (assuming user enters in D M, Y format)
    appDateInput.addEventListener('change', function() {
        const enteredDate = this.value;
        const formattedDate = formatDateToDMY(enteredDate); // Call a function to format

        // Update the displayed value (optional)
        this.value = formattedDate;
    });

    // Function to format the date to D M, Y
    function formatDateToDMY(dateString) {
        const parts = dateString.split(' ');
        if (parts.length !== 3) {
            return ""; // Handle invalid format
        }

        const day = parts[0];
        const month = parts[1];
        const year = parts[2];

        // You can add validation for month (1-12) and year (e.g., length 4) here

        return '${day} ${month}, ${year}';
    }
</script>
<script>
        function handleHardshipChange() {
            var hardType = document.getElementById('hard_type').value;
            var hsFull = document.getElementById('hs_full');
            if (hardType === 'Full Hardship') {
                hsFull.parentElement.style.display = 'block';
                hsFull.required = true;
            } else {
                hsFull.parentElement.style.display = 'none';
                hsFull.required = false;
            }
        }

        function handleAccommodationChange() {
            var accommodate = document.getElementById('accommodate').value;
            var edFull = document.getElementById('ed_full');
            if (accommodate === 'Full') {
                edFull.parentElement.style.display = 'block';
                edFull.required = true;
            } else {
                edFull.parentElement.style.display = 'none';
                edFull.required = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            handleHardshipChange();
            handleAccommodationChange();
            document.getElementById('hard_type').addEventListener('change', handleHardshipChange);
            document.getElementById('accommodate').addEventListener('change', handleAccommodationChange);
        });
    </script>
<script>
	function fetchStaffData(staffId) {
    if (staffId) {
        $.ajax({
            url: 'fetch_staff_data.php',
            method: 'POST',
            data: {staff_id: staffId},
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    document.querySelector('[name="fenglish"]').value = response.data.fenglish;
                    document.querySelector('[name="position"]').value = response.data.position;
                    document.querySelector('[name="department"]').value = response.data.department;
                    document.querySelector('[name="section"]').value = response.data.section;
                } else {
                    alert('Staff ID not found');
                }
            },
            error: function() {
                alert('An error occurred while fetching staff data');
            }
        });
    }
}
	$(document).ready(function(){
		$('#manage_hardship').submit(function(e){
			e.preventDefault();
			start_load()
			$.ajax({
				url:'ajax.php?action=save_hardship',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload()
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> hardship already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>