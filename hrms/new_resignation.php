<?php
if (isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];

    $conn = new mysqli('localhost', 'username', 'password', 'hrms_db');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Database connection failed']));
    }

    $sql = "SELECT fenglish, gender, position, department, section, start_date FROM employee_list WHERE staff_id = ?";
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
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_resign">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="staff_id" class="control-label">Staff ID</label>
							<input type="text" name="staff_id" id="staff_id" class="form-control" required value="<?php echo isset($staff_id) ? $staff_id : '' ?>" onblur="fetchStaffData(this.value)">
						</div>
						<div class="form-group">
							<label for="name" class="control-label">FullName</label>
							<input type="text" name="fenglish" id="fenglish" class="form-control" required value="<?php echo isset($fenglish) ? $fenglish : '' ?>">
						</div>
						<div class="form-group">
							<label for="gender" class="control-label">Gender</label>
							<select name="gender" id="gender" value="<?php echo isset($gender) ? $gender : "" ?>" class="form-control form-control-sm rounded-0" required>
                                    <option <?= isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option <?= isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                </select>
						</div>
						<div class="form-group">
							<label for="position" class="control-label">Position</label>
							<input type="text" name="position" id="position" class="form-control" required value="<?php echo isset($position) ? $position : '' ?>">
						</div>
						<div class="form-group">
							<label for="department" class="control-label">Department</label>
							<select name="department" id="department" value="<?php echo isset($department) ? $department : '' ?>" class="form-control form-control-sm rounded-0" required>
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
							<label for="section" class="control-label">Section</label>
							<select name="section" id="section" value="<?php echo isset($section) ? $section : '' ?>" class="form-control form-control-sm rounded-0" required>
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
							<label for="personal_contact" class="control-label">Phone Number</label>
							<input type="text" name="personal_contact" class="form-control form-control-sm" required value="<?php echo isset($personal_contact) ? $reason : '' ?>">
						</div>
						<div class="form-group">
				<label class="control-label">Starting Date</label>
				<input type="date" name="start_date" id="start_date" value="<?php echo isset($start_date) ? $start_date: '' ?>" class="form-control" required onchange="calculatePeriod()">
			</div>
			<div class="form-group">
				<label class="control-label">Last Working Date</label>
				<input type="date" name="end_date" id="end_date" value="<?php echo isset($end_date) ? $end_date: '' ?>" class="form-control" required onchange="calculatePeriod()">
			</div>
    <div class="form-group" >
        <label for="working_period" ><span>Working Period</span>
        	<input type="text" name="working_period" id="working_period" readonly="true" placeholder="No. of Months"/>
        </label>
   	</div>
			<div class="form-group">
				<label for="date_r" class="control-label">Application Date</label>
				<input type="date" name="date_r" id="date_r" class="form-control form-control-sm" required value="<?php echo isset($date_r) ? $date_r : '' ?>">
			</div>
			<div class="form-group">
			<label for="tos" class="control-label">Type of Submission</label>
			<select name="tos" id="tos" value="<?php echo isset($tos) ? $tos: '' ?>" class="form-control form-control-sm rounded-0" required>
                <option <?= isset($tos) && $tos == 'Resign' ? 'selected' : '' ?>>Resign</option>
                <option <?= isset($tos) && $tos == 'Terminate' ? 'selected' : '' ?>>Terminate</option>
				<option <?= isset($tos) && $tos == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
		</div>
			<div class="form-group">
				<label class="control-label">Reason</label>
				<input type="text" name="reason" id="reason" value="<?php echo isset($reason) ? $reason : "" ?>" class="form-control form-control-sm rounded-0" required></input>
			</div>
				</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=resignation_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
function calculatePeriod() {
    var startDate = new Date(document.getElementById("start_date").value);
    var endDate = new Date(document.getElementById("end_date").value);

    // Calculate the difference in years and months
    var years = endDate.getFullYear() - startDate.getFullYear();
    var months = endDate.getMonth() - startDate.getMonth();

    // Adjust months if the end month is before the start month
    if (months < 0) {
        years--;
        months += 12;
    }

    // Display the result in the input field
    var result = '';
    if (years > 0) {
        result += years + ' year(s) ';
    }
    if (months > 0) {
        result += months + ' month(s)';
    }
    document.getElementById("working_period").value = result.trim();
}
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
					document.querySelector('[name="gender"]').value = response.data.gender;
                    document.querySelector('[name="position"]').value = response.data.position;
                    document.querySelector('[name="department"]').value = response.data.department;
                    document.querySelector('[name="section"]').value = response.data.section;
					document.querySelector('[name="start_date"]').value = response.data.start_date;
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
	$('#manage_resign').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$.ajax({
			url:'ajax.php?action=save_resign',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");
					setTimeout(function(){
						location.replace('index.php/?page=resignation_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Staff apply already exist.</div>");
					$('[name="id"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>