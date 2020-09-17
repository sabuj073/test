<?php 
	
	require "config.php";
	$userid = $_POST['userid'];
	$name = $_POST['name'];
	$email = $_POST['mail'];
	$number = $_POST['number'];
	$al_num = $_POST['al_num1'].' - '.$_POST['al_num2'];

	mysqli_query($con,"SELECT * from user_loan_data WHERE userid = '{$userid}'");
	$row = mysqli_affected_rows($con);
	if($row>0){
		mysqli_query($con,"UPDATE user_loan_data set name = '{$name}',email='{$email}',number='{$number}',al_num='{$al_num}' WHERE userid='{$userid}'");
	}else{
	mysqli_query($con,"INSERT into user_loan_data VALUES(null,'{$userid}','{$name}','{$email}','{$number}','{$al_num}')");
}

	$result = mysqli_query($con,"SELECT * from email");
	$row = mysqli_fetch_assoc($result);
	$msg = "Dear ".$name.",<br>".$row['msg'];
	$msg = wordwrap($msg,70);
	
$subject = 'Foreigner Loan in Korea';
$headers="";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
date_default_timezone_set("Asia/Seoul");
$date_time = date("Y-m-d H:i:s");

mail($email,$subject,$msg,$headers);

mysqli_query($con,"INSERT into confirmation VALUES(null,'{$userid}','{$msg}','{$date_time}')");

 ?>