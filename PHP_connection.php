<?php

$con = mysqli_connect("localhost", "root", "", "kankoo");

if(mysqli_connect_errno($con)){
	echo "FAILED to connect to MySQL : ".mysqli_connect_error();
}

mysqli_set_charset($con,"utf8");

$res = mysqli_query($con,"select * from user1");

$result = array();

while($row = mysqli_fetch_array($res)){
	
	array_push($result, 
		array('user1_id'=>$row[0], 'user1_pw'=>$row[1], 'user1_mj'=>$row[2], 'user1_name'=>$row[3], 'user1_stID'=>$row[4]));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

?>