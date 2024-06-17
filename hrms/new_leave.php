
<?php
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
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_leave">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="staff_id" class="control-label">Staff ID</label>
							<input type="text" name="staff_id" class="form-control" required value="<?php echo isset($staff_id) ? $staff_id : '' ?>" onblur="fetchStaffData(this.value)">
						</div>
						<div class="form-group">
							<label for="name" class="control-label">FullName</label>
							<input type="text" name="fullname" class="form-control" required value="<?php echo isset($fullname) ? $fullname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Position</label>
							<input type="text" name="position" class="form-control" required value="<?php echo isset($position) ? $position : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Section</label>
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
							<label for="" class="control-label">Department</label>
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
				<label for="" class="control-label">Leave Type</label>
				<select name="leave_type" id="leave_type" value="<?php echo isset($leave_type) ? $leave_type : "" ?>" class="form-control form-control-sm rounded-0" required>
                        <option <?= isset($leave_type) && $leave_type == 'Annual Leave' ? 'selected' : '' ?>>Annual Leave</option>
                        <option <?= isset($leave_type) && $leave_type == 'Paternity Leave' ? 'selected' : '' ?>>Paternity Leave</option>
                        <option <?= isset($leave_type) && $leave_type == 'Marriage' ? 'selected' : '' ?>>Marriage</option>
                        <option <?= isset($leave_type) && $leave_type == 'Compassionate Leave' ? 'selected' : '' ?>>Compassionate Leave</option>
                        <option <?= isset($leave_type) && $leave_type == 'Maternity' ? 'selected' : '' ?>>Maternity</option>
                        <option <?= isset($leave_type) && $leave_type == 'Educational Leave' ? 'selected' : '' ?>>Educational Leave</option>
                        <option <?= isset($leave_type) && $leave_type == 'Unpaid Leave' ? 'selected' : '' ?>>Unpaid Leave</option>
                        <option <?= isset($leave_type) && $leave_type == 'Sick Leave' ? 'selected' : '' ?>>Sick Leave</option>
                    </select>
			</div>
            <div class="form-group">
				<label class="control-label">From Date</label>
				<input type="date" name="start_date" id="start_date" value="<?= isset($start_date) ? $start_date: '' ?>" class="form-control" required onchange="calculateDays()">
				<span><input type="checkbox" name="half_day_am" id="half_day_am" onchange="calculateDays()"> AM</span>
				<span><input type="checkbox" name="half_day_pm" id="half_day_pm" onchange="calculateDays()"> PM</span>
			</div>
			<div class="form-group">
				<label class="control-label">To Date</label>
				<input type="date" name="end_date" id="end_date" value="<?= isset($end_date) ? $end_date: '' ?>" class="form-control" required onchange="calculateDays()">
				<span><input type="checkbox" name="half_day_am_to" id="half_day_am_to" onchange="calculateDays()"> AM</span>
				<span><input type="checkbox" name="half_day_pm_to" id="half_day_pm_to" onchange="calculateDays()"> PM</span>
			</div>
    <div class="form-group" >
        <label for="days_requested" ><span>Days Requested </span>
        	<input type="text" name="days_requested" id="days_requested" onchange="calculateDays()" placeholder="No. of Days"/>
        </label>
   	</div>
	   <div class="form-group">
    <label for="balance_due" class="control-label">Balance Due</label>
    <input type="text" name="balance_due" id="balance_due" class="form-control" required value="">
</div>
<div class="form-group" id="doc_att_wrapper">
    <label for="doc_att" class="control-label">Document Attachment</label>
	<div class="custom-file">
	  <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
	  <label class="custom-file-label" for="customFile">Choose file</label>
	</div>
</div>
		<div class="form-group">
			<label for="" class="control-label">Reason</label>
			<input type="text" name="reason" class="form-control" required value="<?php echo isset($meta['reason']) ? $meta['reason']: '' ?>">
		</div>
					</div>
				</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button id='submit' class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=leave_list'">Cancel</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        var leaveTypeSelect = document.getElementById('leave_type');
        var docAttWrapper = document.getElementById('doc_att_wrapper');

        leaveTypeSelect.addEventListener('change', function () {
            if (leaveTypeSelect.value === 'Annual Leave') {
                docAttWrapper.style.display = 'none';
            } else {
                docAttWrapper.style.display = 'block';
            }
        });

        // Initialize the display based on the initial value
        if (leaveTypeSelect.value === 'Annual Leave') {
            docAttWrapper.style.display = 'none';
        }
	})
</script>
	<script>
    function calculateDays() {
    var startDate = new Date(document.getElementById('start_date').value);
    var endDate = new Date(document.getElementById('end_date').value);
    var daysDifference = 0;

    // Loop through each day between start_date and end_date
    for (var date = startDate; date <= endDate; date.setDate(date.getDate() + 1)) {
        // Check if the current day is a weekday (Monday to Saturday)
        if (date.getDay() !== 0 && date.getDay() !== 6) {
            daysDifference += 1; // Full day is counted
            // Check if AM half-day is requested
            if (document.getElementById('half_day_am').checked) {
                daysDifference += 0.5;
            }
            // Check if PM half-day is requested
            if (document.getElementById('half_day_pm').checked) {
                daysDifference += 0.5;
            }
			if (document.getElementById('half_day_am').checked) {
                daysDifference -= 0.5;
            }
            // Check if PM half-day is requested
            if (document.getElementById('half_day_pm').checked) {
                daysDifference -= 0.5;
            }
        } else if (date.getDay() === 6) { // Saturday
            // If it's Saturday, count half day if requested
            if (document.getElementById('half_day_am_to').checked) {
                daysDifference += 0.5;
            }
            if (document.getElementById('half_day_pm_to').checked) {
                daysDifference += 0.5;
            }
        }
    }

    // Adjust for half day if checked (for weekdays)
    if (document.getElementById('half_day_am').checked || document.getElementById('half_day_pm').checked) {
        daysDifference -= 0.5; // Subtract one half day if both AM and PM are checked
    }

    // Update the 'days_requested' input field
    document.getElementById('days_requested').value = daysDifference;

    // Calculate Balance Due
    calculateBalanceDue();
}
    function calculateBalanceDue() {
        var leaveType = document.getElementById('leave_type').value;
        var daysRequested = parseFloat(document.getElementById('days_requested').value);
        var leaveDays = {
            'Annual Leave': 18,
            'Paternity Leave': 5,
            'Marriage': 5,
            'Compassionate Leave': 3,
            'Maternity': 90,
            'Educational Leave': 7,
            'Unpaid Leave': 7,
            'Sick Leave': 7
        };
        var totalLeaveDays = leaveDays[leaveType];
        var balanceDue = totalLeaveDays - daysRequested;
        document.getElementById('balance_due').value = balanceDue;
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
    $('#manage_leave').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$.ajax({
			url:'ajax.php?action=save_leave',
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
						location.replace('index.php?page=leave_list')
					},1500)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>From Date apply already exist.</div>");
					//$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>