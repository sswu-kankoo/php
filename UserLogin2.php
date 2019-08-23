<?php
	$con = mysqli_connect("localhost", "root", "", "kankoo");
	$user2_id = $_POST ["user2_id"];
	$user2_pw = $_POST["user2_pw"];

	$statement = mysqli_prepare($con, "SELECT * FROM user2 WHERE user2_id = ? AND user2_pw = ?");
	mysqli_stmt_bind_param($statement, "ss", $user2_id, $user2_pw);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	//mysqli_stmt_bind_result($statement, $user1_id, $user1_pw, $user1_mj, $user1_name, $user1_stID);

	$response = array();
	//$response["success"] = true;

	//false?

	if (mysqli_stmt_fetch($statement)) {
		$response["success"] = true;
		$response["user2_id"] = $user2_id;
		$response["user2_pw"] = $user2_pw;
		//$response["user1_mj"] = $user1_mj;
		//$response["user1_name"] = $user1_name;
		//$response["user1_stID"] = $user1_stID;
		echo json_encode($response);

	} else{
		$response["success"] = false;
		echo json_encode($response);
	}


?>