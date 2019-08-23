<?php
	$con = mysqli_connect("localhost", "root", "", "kankoo");
	$user1_id = $_POST ["user1_id"];
	$user1_pw=$_POST["user1_pw"];

	$statement = mysqli_prepare($con, "SELECT * FROM user1 WHERE user1_id = ? AND user1_pw = ?");
	mysqli_stmt_bind_param($statement, "ss", $user1_id, $user1_pw);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	//mysqli_stmt_bind_result($statement, $user1_id, $user1_pw, $user1_mj, $user1_name, $user1_stID);

	$response = array();
	//$response["success"] = true;

	//false?

	if (mysqli_stmt_fetch($statement)) {
		$response["success"] = true;
		$response["user1_id"] = $user1_id;
		$response["user1_pw"] = $user1_pw;
		//$response["user1_mj"] = $user1_mj;
		//$response["user1_name"] = $user1_name;
		//$response["user1_stID"] = $user1_stID;
		echo json_encode($response);

	} else{
		$response["success"] = false;
		echo json_encode($response);
	}


?>