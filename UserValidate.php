<?php

$con = mysqli_connect("localhost", "root", "", "kankoo");

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];

$statement = mysqli_prepare($con, "SELECT * FROM user WHERE user_id = ?");
mysqli_stmt_bind_param($statement, "s", $user_id);
mysqli_stmt_execute($statement);
mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $user_id);

$response = array();
$response["success"] = true;

while (mysqli_stmt_fetch($statement)) {
	$resonse["success"] = "false";
	$response["user_id"] = $user_id;
	
}

echo json_encode($response);

?>