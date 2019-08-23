<?php

$con = mysqli_connect("localhost", "root", "", "kankoo");
mysqli_query ($con, 'SET NAMES utf8'); 


$user2_id = $_POST ["user2_id"];
$user2_pw = $_POST["user2_pw"];
$user2_ShopName = $_POST["user2_ShopName"];
$user2_BRN = $_POST["user2_BRN"];


$statement = mysqli_prepare($con, "INSERT INTO user2 VALUES (?, ?, ?, ?)");
if($statement === false) { 
	echo('Statement prepare failed : ' . mysqli_error($con)); 
	exit(); 
}

$bind = mysqli_stmt_bind_param($statement, "ssss", $user2_id, $user2_pw, $user2_ShopName, $user2_BRN);
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
	$response["user2_id"] = $user2_id;
	$response["user2_pw"] = $user2_pw;
	$response["user2_ShopName"] = $user2_ShopName;
	$response["user2_BRN"] = $user2_BRN;

}

echo json_encode($response);

?>
