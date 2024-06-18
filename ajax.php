<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
	  echo $save;
  }
  if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
	  echo $save;
  }
  if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
	  echo $save;
  }
if($action == 'save_department'){
	$save = $crud->save_department();
	if($save)
		echo $save;
}
if($action == 'delete_department'){
	$save = $crud->delete_department();
	if($save)
		echo $save;
}
if($action == 'save_hardship'){
	$save = $crud->save_hardship();
	if($save)
		echo $save;
}
if($action == 'delete_hardship'){
	$save = $crud->delete_hardship();
	if($save)
		echo $save;
}
if($action == 'save_employee'){
	$save = $crud->save_employee();
	if($save)
		echo $save;
}
if($action == 'delete_employee'){
	$save = $crud->delete_employee();
	if($save)
		echo $save;
}
if($action == 'save_leave'){
	$save = $crud->save_leave();
	if($save)
		echo $save;
}
if($action == 'delete_leave'){
	$save = $crud->delete_leave();
	if($save)
		echo $save;
}
if($action == 'save_edu'){
	$save = $crud->save_edu();
	if($save)
		echo $save;
}
if($action == 'delete_edu'){
	$save = $crud->delete_edu();
	if($save)
		echo $save;
}
if($action == 'save_family'){
	$save = $crud->save_family();
	if($save)
		echo $save;
}
if($action == 'delete_family'){
	$save = $crud->delete_family();
	if($save)
		echo $save;
}
if($action == 'save_health'){
	$save = $crud->save_health();
	if($save)
		echo $save;
}
if($action == 'delete_health'){
	$save = $crud->delete_health();
	if($save)
		echo $save;
}
if($action == 'save_perfor'){
	$save = $crud->save_perfor();
	if($save)
		echo $save;
}
if($action == 'delete_perfor'){
	$save = $crud->delete_perfor();
	if($save)
		echo $save;
}
if($action == 'save_emergencys'){
	$save = $crud->save_emergencys();
	if($save)
		echo $save;
}
if($action == 'delete_emergencys'){
	$save = $crud->delete_emergencys();
	if($save)
		echo $save;
}
if($action == 'save_personal'){
	$save = $crud->save_personal();
	if($save)
		echo $save;
}
if($action == 'delete_personal'){
	$save = $crud->delete_personal();
	if($save)
		echo $save;
}
if($action == 'save_resign'){
	$save = $crud->save_resign();
	if($save)
		echo $save;
}
if($action == 'delete_resign'){
	$save = $crud->delete_resign();
	if($save)
		echo $save;
}
ob_end_flush();
?>
