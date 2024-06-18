<?php
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$type = array("employee_list","leave_list","users");
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage_user">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<input type="hidden" name="staff_id" id="staff_id" class="form-control" value="<?php echo isset($staff_id) ? $staff_id: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">First Name</label>
			<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($firstname) ? $firstname: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="name">Last Name</label>
			<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
		</div>
		<div class="form-group">
		<label for="role" class="control-label">Role</label>
		<select name="role" id="role" class="form-control form-control-sm rounded-0" required onchange="updatePermissions()">
                  <option value="Super Role" <?= isset($role) && $role == 'Super Role' ? 'selected' : '' ?>>Super Role</option>
                  <option value="Leave User" <?= isset($role) && $role == 'Leave User' ? 'selected' : '' ?>>Leave User</option>
                  <option value="Admin" <?= isset($role) && $role == 'Admin' ? 'selected' : '' ?>>Admin</option>
                  <option value="Onboarding User" <?= isset($role) && $role == 'Onboarding User' ? 'selected' : '' ?>>Onboarding User</option>
                  <option value="Hardship User" <?= isset($role) && $role == 'Hardship User' ? 'selected' : '' ?>>Hardship User</option>
                </select>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" id="email" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Avatar</label>
			<div class="custom-file">
              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
		</div>
		<div class="form-group d-flex justify-content-center">
			<img src="<?php echo isset($meta['avatar']) ? 'assets/uploads/'.$meta['avatar'] :'' ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
		</div>
		<div class="row">
          <div class="col-md-12">
            <div id="permissions">
              <h4>Permissions</h4>
			  <hr>
              <div id="permissionsContainer" class="col-md-8">
			</div>
            </div>
          </div>
        </div>
	</form>
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
    function updateLoginSelect() {
        var roleSelect = document.getElementById('role');
        var loginSelect = document.getElementById('login');
        var selectedRoleIndex = roleSelect.selectedIndex;

        // Set the selected index of login select box to match the role select box
        loginSelect.selectedIndex = selectedRoleIndex;
    }
</script>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_user').submit(function(e){
		e.preventDefault();
		var permissions = [];
		$('[data-value]:checked').each(function() {
        permissions.push($(this).data('value'));
    });
	//$('[name="permissions"]').val(JSON.stringify(permissions));
		start_load()
		$.ajax({
			url:'ajax.php?action=update_user',
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
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})
	function updatePermissions() {
    var role = $('#role').val();
    var permissionsContainer = $('#permissionsContainer');
    permissionsContainer.empty();

    // Define permissions for each role
    var permissions = {
	  'Super Role': ['Dashboard View', 'Add New Employee', 'Employee List', 'View Department', 'Add New Leave', 'Leave List', 'Add New Resignation', 'Resignation List', 'Add New Hardship', 'Hardship List', 'Employee Records', 'Leave Records', 'Resignation Records', 'Hardship Records'],
      'Leave User': ['Dashboard View','Add New Leave','Leave List', 'Leave Records','Hardship List', 'Hardship Records', 'Add New Hardship'],
      'Admin': ['Dashboard View', 'Add New Employee', 'Employee List', 'View Department', 'Add New Leave', 'Leave List', 'Add New Resignation', 'Resignation List', 'Add New Hardship', 'Hardship List', 'Employee Records', 'Leave Records', 'Resignation Records', 'Hardship Records', 'Add New User', 'User List'],
      'Onboarding User': ['Employee List', 'Add New Employee', 'Employee Records','Resignation Records', 'Add New Resignation', 'Resignation List'],
      'Hardship User': ['Dashboard View', 'Add New Leave', 'Leave List','Hardship List', 'Hardship Records', 'Add New Hardship']
    };

    // Generate checkboxes for the selected role
    if (permissions[role]) {
      permissions[role].forEach(function(permission) {
        permissionsContainer.append(
          `<div class="permission">
            <div class="row">
              <div class="col-md-6">
                <p>${permission}</p>
              </div>
              <div class="col-md-6">
                <input type="checkbox" name="permissions[]" value="${permission}" checked>
              </div>
            </div>
          </div>`
        );
      });
    }
  }

  $(document).ready(function() {
    updatePermissions();
  });
</script>