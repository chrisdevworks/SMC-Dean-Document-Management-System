<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_page_img'){
	$save = $crud->save_page_img();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == "save_survey"){
	$save = $crud->save_survey();
	if($save)
		echo $save;
}
if($action == "delete_survey"){
	$delete = $crud->delete_survey();
	if($delete)
		echo $delete;
}
if($action == "save_question"){
	$save = $crud->save_question();
	if($save)
		echo $save;
}
if($action == "delete_question"){
	$delsete = $crud->delete_question();
	if($delsete)
		echo $delsete;
}

if($action == "delete_news"){
	$delsete = $crud->delete_news();
	if($delsete)
		echo $delsete;
}

if($action == "delete_takers"){
	$delsete = $crud->delete_takers();
	if($delsete)
		echo $delsete;
}

if($action == "action_update_qsort"){
	$save = $crud->action_update_qsort();
	if($save)
		echo $save;
}
if($action == "save_answer"){
	$save = $crud->save_answer();
	if($save)
		echo $save;
}
if($action == "update_user"){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == "save_news"){
	$save = $crud->save_news();
	if($save)
		echo $save;
}


if($action == "save_appointment"){
	$save = $crud->save_appointment();
	if($save)
		echo $save;
}

if($action == "delete_appnt"){
	$delsete = $crud->delete_appnt();
	if($delsete)
		echo $delsete;
}

if($action == "noti_appnt"){
	$delsete = $crud->noti_appnt();
	if($delsete)
		echo $delsete;
}

if($action == "save_personal"){
	$save = $crud->save_personal();
	if($save)
		echo $save;
}

if($action == "save_student"){
	$save = $crud->save_student();
	if($save)
		echo $save;
}

ob_end_flush();
?>
