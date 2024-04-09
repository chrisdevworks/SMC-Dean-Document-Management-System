<?php 

// $conn= new mysqli('localhost','root','','smc_dms')or die("Could not connect to mysql".mysqli_error($con));

function connectdb(){
	$mysql_server = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "smc_dms";

	$connect = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);

	if($connect->connect_error){
		die("Connection failed: " . $connect->connect_error);
	}
    // echo "Connected successfully";
	$connect->set_charset("utf8");

	return $connect;
}