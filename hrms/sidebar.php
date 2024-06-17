<aside class="main-sidebar sidebar-dark-primary">
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 3 || $_SESSION['login_type'] == 4 || $_SESSION['login_type'] == 0): ?>
        <h3 class="text-center p-0 m-0"><b><span class=""><img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img"></span>  HRMS</b></h3>
        <?php endif; ?>
    </a>
    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">

         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if($_SESSION['login_type'] == 2|| $_SESSION['login_type'] ==0 || $_SESSION['login_type'] == 3): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_employee">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Employees
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_employee" class="nav-link nav-new_employee tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=employee_list" class="nav-link nav-employee_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p> Employee List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2|| $_SESSION['login_type'] ==0 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 3 || $_SESSION['login_type'] == 4): ?>
          <li class="nav-item dropdown">
            <a href="index.php?page=department" class="nav-link nav-department">
            <i class="nav-icon far fa-building"></i>
              <p>
                Departments
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2|| $_SESSION['login_type'] == 0 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 4): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_leave">
            <i class="nav-icon fas fa-file"></i>
              <p>
                Leave
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_leave" class="nav-link nav-new_leave tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=leave_list" class="nav-link nav-leave_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 0 || $_SESSION['login_type'] == 3): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=edit_resignation" class="nav-link edit_resignation">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Resignation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_resignation" class="nav-link nav-new_resignation tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=resignation_list" class="nav-link nav-resignation_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if($_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 0 || $_SESSION['login_type'] == 4 || $_SESSION['login_type'] == 1): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_hardship">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Hardship
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_hardship" class="nav-link nav-new_hardship tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=hardship_list" class="nav-link nav-hardship_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2 ): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
       </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
  	})
  </script>
  <style>
    .user-img {
        height: 35px;
        width: 35px;
        object-fit: cover;
    }
  </style>
  <script>
    function updatePermissions() {
  var role = $('#role').val();
  var permissionsContainer = $('#permissionsContainer');
  permissionsContainer.empty();

  $.ajax({
    url: 'ajax.php?action=get_permissions', // Fetch permissions from server
    data: { role: role },
    success: function(data) {
      var permissions = JSON.parse(data); // Parse permissions data
      permissions.forEach(function(permission) {
        permissionsContainer.append(
          `<div class="permission">
            <div class="row">
              <div class="col-md-6">
                <p>${permission.name}</p>
              </div>
              <div class="col-md-6">
                <input type="checkbox" name="permissions[]" value="${permission.id}" checked>
              </div>
            </div>
          </div>`
        );
      });
    }
  });
}

$(document).ready(function() {
  updatePermissions();

  var login_type = '<?php echo $_SESSION['login_type']; ?>';
  if (login_type == 2) { // Admin
    $('.nav-link.nav-home').show();
    $('.nav-link.nav-edit_employee').show();
    $('.nav-link.nav-department').show();
    $('.nav-link.nav-edit_hardship').show();
    $('.nav-link.nav-edit_user').show();
    $('.nav-link.nav-edit_resignation').show();
    $('.nav-link.nav-edit_leave').show();
  } else if (login_type == 1) { // Leave User
    $('.nav-link.nav-home').show();
    $('.nav-link.nav-edit_leave').show();
    $('.nav-link.nav-edit_employee').hide();
    $('.nav-link.nav-department').hide();
    $('.nav-link.nav-edit_hardship').show();
    $('.nav-link.nav-edit_user').hide();
    $('.nav-link.nav-edit_resignation').show();
  } else if (login_type == 3) { // Onboarding User
    $('.nav-link.nav-home').show();
    $('.nav-link.nav-edit_employee').show();
    $('.nav-link.nav-department').hide();
    $('.nav-link.nav-edit_hardship').hide();
    $('.nav-link.nav-edit_user').hide();
    $('.nav-link.nav-edit_resignation').show();
  }
  else if (login_type == 4) { // Onboarding User
    $('.nav-link.nav-home').show();
    $('.nav-link.nav-edit_employee').hide();
    $('.nav-link.nav-department').hide();
    $('.nav-link.nav-edit_hardship').shows();
    $('.nav-link.nav-edit_user').hide();
    $('.nav-link.nav-edit_leave').show();
    $('.nav-link.nav-edit_resignation').hide();
  } else if (login_type == 0) { // Super Role
    $('.nav-link.nav-home').show();
    $('.nav-link.nav-edit_leave').show();
    $('.nav-link.nav-edit_employee').show();
    $('.nav-link.nav-department').show();
    $('.nav-link.nav-edit_hardship').show();
    $('.nav-link.nav-edit_user').hide();
    $('.nav-link.nav-edit_resignation').show();
  }
});
  </script>