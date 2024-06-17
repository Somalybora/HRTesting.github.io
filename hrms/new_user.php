<?php
include 'db_connect.php';
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md border">
						<hr>
						<div class="col-md-4">
						<div class="form-group">
							<label for="firstname" class="control-label">First Name</label>
							<input type="text" name="firstname" class="form-control" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Name</label>
							<input type="text" name="lastname" class="form-control" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
						<span>
						<div class="form-group">
							<label for="" class="control-label"><span>Image</span><span>
							<div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                      <label class="custom-file-label" for="customFile">Choose file</label>
		                    </div>
							</span>
						</label>
						<div class="form-group d-flex justify-content-left align-items-left">
							<img src="<?php echo isset($avatar) ? 'assets/uploads/'.$avatar :'' ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
						</div>
						</span>
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
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control form-control-sm" name="email" required value="<?php echo isset($email) ? $email : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control form-control-sm" name="password" <?php echo !isset($id) ? "required":'' ?>>
							<small><i><?php echo isset($id) ? "Leave this blank if you dont want to change you password":'' ?></i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirm Password</label>
							<input type="password" class="form-control form-control-sm" name="cpass" <?php echo !isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
						</div>
					</div>
					<div class="row">
          <div class="col-md-12">
            <div id="permissions">
              <h4>Permissions</h4>
			  <hr>
              <div id="permissionsContainer" class="col-md-8">
                <!-- Permissions checkboxes will be inserted here by JavaScript -->
              </div>
            </div>
          </div>
        </div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Cancel</button>
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
    function updateLoginSelect() {
        var roleSelect = document.getElementById('role');
        var loginSelect = document.getElementById('login');
        var selectedRoleIndex = roleSelect.selectedIndex;

        // Set the selected index of login select box to match the role select box
        loginSelect.selectedIndex = selectedRoleIndex;
    }
</script>

<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
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
		e.preventDefault()
		var permissions = [];
    $('[data-value]:checked').each(function() {
        permissions.push($(this).data('value'));
    });
	//$('[name="permissions"]').val(JSON.stringify(permissions));
		$('input').removeClass("border-danger")
		start_load()
		if($('[name="password"]').val() != '' && $('[name="cpass"]').val() != ''){
			if($('#pass_match').attr('data-status') != 1){
				if($("[name='password']").val() !=''){
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
		$.ajax({
			url:'ajax.php?action=save_user',
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
						location.replace('index.php?page=user_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
					$('[name="email"]').addClass("border-danger")
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
      'Super Role': ['Dashboard', 'Add New Employee', 'Employee List', 'View Department', 'Add New Leave', 'Leave List', 'Add New Resignation', 'Resignation List', 'Add New Hardship', 'Hardship List', 'Employee Records', 'Leave Records', 'Resignation Records', 'Hardship Records'],
      'Leave User': ['Dashboard','Add New Leave','Leave List', 'Leave Records','Hardship List', 'Hardship Records', 'Add New Hardship'],
      'Admin': ['Dashboard View', 'Add New Employee', 'Employee List', 'View Department', 'Add New Leave', 'Leave List', 'Add New Resignation', 'Resignation List', 'Add New Hardship', 'Hardship List', 'Employee Records', 'Leave Records', 'Resignation Records', 'Hardship Records', 'Add New User', 'User List'],
      'Onboarding User': ['Dashboard','Employee List', 'Add New Employee', 'Employee Records','Resignation Records', 'Add New Resignation', 'Resignation List'],
      'Hardship User': ['Dashboard', 'Add New Leave', 'Leave List','Hardship List', 'Hardship Records', 'Add New Hardship']
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