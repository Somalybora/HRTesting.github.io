<?php
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$type = array("employee_list","leave_list","users");
$user = $conn->query("SELECT * FROM {$type[$_SESSION['login_type']]} where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
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
<?php
// Start the session
session_start();

// Check if session values exist
if (isset($_SESSION['form_data'])) {
    // Retrieve form data from session variables
    $form_data = $_SESSION['form_data'];
    // Extract individual form field values
    $staff_id = isset($form_data['staff_id']) ? $form_data['staff_id'] : '';
    $fullname = isset($form_data['fullname']) ? $form_data['fullname'] : '';
    $position = isset($form_data['position']) ? $form_data['position'] : '';
    $section = isset($form_data['section']) ? $form_data['section'] : '';
    $department = isset($form_data['department']) ? $form_data['department'] : '';
    $leave_type = isset($form_data['leave_type']) ? $form_data['leave_type'] : '';
    $start_date = isset($form_data['start_date']) ? $form_data['start_date'] : '';
    $end_date = isset($form_data['end_date']) ? $form_data['end_date'] : '';
    $days_requested = isset($form_data['days_requested']) ? $form_data['days_requested'] : '';
    $half_day = isset($form_data['half_day']) ? $form_data['half_day'] : '';
    $balance_due = isset($form_data['balance_due']) ? $form_data['balance_due'] : '';
    $doc_att = isset($form_data['doc_att']) ? $form_data['doc_att'] : '';
    $reason = isset($form_data['reason']) ? $form_data['reason'] : '';
} else {
    // If session values don't exist, initialize form fields with empty values
    $staff_id = '';
    $fullname = '';
    $position = '';
    $section = '';
    $department = '';
    $leave_type = '';
    $start_date = '';
    $end_date = '';
    $days_requested = '';
    $half_day = '';
    $balance_due = '';
    $doc_att = '';
    $reason = '';
}
?>

<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage_leave">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="staff_id">Staff ID</label>
			<input type="text" name="staff_id" class="form-control" required value="<?php echo isset($staff_id) ? $staff_id : '' ?>" onblur="fetchStaffData(this.value)">
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
							<label for="" class="control-label">Section</label>
							<select name="section" id="section" value="<?= isset($meta['section']) ? $meta['section']: '' ?>" class="form-control form-control-sm rounded-0" required>
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
							<select name="department" id="department" value="<?= isset($meta['department']) ? $meta['department']: '' ?>" class="form-control form-control-sm rounded-0" required>
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
				<select name="leave_type" id="leave_type" value="<?= isset($leave_type) ? $leave_type : "" ?>" class="form-control form-control-sm rounded-0" required>
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

	<div id="document_fields" class="form-group">
	<div class="form-group">
		<label for="" class="control-label"> Document Attechment</label>
		<input type="text" name="doc_att" id="doc_att" class="form-control" required value="<?php echo isset($meta['doc_att']) ? $meta['doc_att']:'' ?>">
	</div>
	</div>
		<div class="form-group">
			<label for="" class="control-label">Reason</label>
			<input type="text" name="reason" class="form-control" required value="<?php echo isset($meta['reason']) ? $meta['reason']: '' ?>">
		</div>
	</form>
</div>
<style>
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
        document.getElementById('brecord').value = balanceDue;
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
		e.preventDefault();
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
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
			    $('#msg').html('<div class="alert alert-danger">Staff apply already exist</div>')
					end_load()
				}
			}
		})
	})
</script>