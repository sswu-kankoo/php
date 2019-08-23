<?php

$con = mysqli_connect("localhost", "root", "", "kankoo");

$user1_id = $_POST["user1_id"];
$user1_pw = $_POST["user1_pw"];
$user1_mj = $_POST["user1_mj"];
$user1_name = $_POST["user1_name"];
$user1_stID = $_POST["user1_stID"];


$statement = mysqli_prepare($con, "INSERT INTO user1 VALUES (?, ?, ?, ?, ?)");
if($statement === false) { 
	echo('Statement prepare failed : ' . mysqli_error($con)); 
	exit(); 
}


$bind = mysqli_stmt_bind_param($statement, "sssss", $user1_id, $user1_pw, $user1_mj, $user1_name, $user1_stID);
if($bind === false) {
	echo('Statement bind failed : ' . mysqli_error($con)); 
	exit(); 
}



mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);

$response = array();

$response["success"] = true;

while(mysqli_stmt_fetch($statement)){
	$response["success"] = true;
	$response["user1_id"] = $user1_id;
	$response["user1_pw"] = $user1_pw;
	$response["user1_mj"] = $user1_mj;
	$response["user1_name"] = $user1_name;
	$response["user1_stID"] = $user1_stID;
}

echo json_encode($response);

?>
