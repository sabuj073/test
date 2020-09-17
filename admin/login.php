<?php 
session_start();
	require "includes/config.php";
	$username = $_POST['uname'];
	$password = $_POST['psw'];
	$result = mysqli_query($con,"SELECT * from admin where username = '{$username}' and password = md5('{$password}') ");
	$affected = mysqli_affected_rows($con);
	if($affected>0){
		$row = mysqli_fetch_assoc($result);
		echo json_encode(array('status' => 'valid' ));
		$_SESSION['admin']=$row['name'];
	}else{
		echo json_encode(array('status' => 'invalid' ));
	}
 ?>