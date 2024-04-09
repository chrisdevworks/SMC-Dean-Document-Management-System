<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

// =========================================================

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

// =========================================================

if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'edit_user'){
	$save = $crud->edit_user();
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


// =========================================================



if($action == "save_documents"){
	$save = $crud->save_documents();
	if($save)
		echo $save;
}

if($action == "delete_documents"){
	$delsete = $crud->delete_documents();
	if($delsete)
		echo $delsete;
}


// =========================================================

if($action == "backupdb"){
	$save = $crud->backupdb();
	if($save)
		echo $save;
}


// =========================================================

if($action == "save_office"){
	$save = $crud->save_office();
	if($save)
		echo $save;
}

if($action == "delete_office"){
	$save = $crud->delete_office();
	if($save)
		echo $save;
}


// =========================================================

if($action == "save_classification"){
	$save = $crud->save_classification();
	if($save)
		echo $save;
}

if($action == "delete_classification"){
	$save = $crud->delete_classification();
	if($save)
		echo $save;
}

// =========================================================

if($action == "save_type"){
	$save = $crud->save_type();
	if($save)
		echo $save;
}

if($action == "delete_type"){
	$save = $crud->delete_type();
	if($save)
		echo $save;
}


// =========================================================

if($action == "receive_docs"){
	$save = $crud->receive_docs();
	if($save)
		echo $save;
}

if($action == "receive_docs_home"){
	$save = $crud->receive_docs_home();
	if($save)
		echo $save;
}

if($action == "release_docs"){
	$save = $crud->release_docs();
	if($save)
		echo $save;
}

// =========================================================

if($action == "endpoint_docs"){
	$save = $crud->endpoint_docs();
	if($save)
		echo $save;
}










ob_end_flush();
