<?php 
session_start();
$userid = $_SESSION['userid'];
require 'config.php';

function isexists()
{	$userid = $_SESSION['userid'];
    require 'config.php';
	mysqli_query($con,"SELECT * from loan_info where user_id='{$userid}'");
	return mysqli_affected_rows($con);
}
date_default_timezone_set("Asia/Seoul");
$date_time = date("Y-m-d H:i:s");

$loan_amount = $_POST['loan_amount'];
$loan_period = $_POST['loan_period'];

if($loan_period!="" && $loan_amount!=""){
	$loan_query = "tb_".$loan_amount;

	$query = "Select {$loan_query} from loan_amount where id = '{$loan_period}'";

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$monthly_payable = $row[$loan_query];
	$totalamount = $row[$loan_query]*$loan_period;
	$interest = (int)$totalamount-(int)$loan_amount;
	$interest_rate = ($interest*100)/$loan_amount;

	if(isexists()>0){
		mysqli_query($con,"UPDATE loan_info set loan_amount='{$loan_amount}',loan_period='{$loan_period}',total_interest='{$interest}', total_amount='{$totalamount}',loan_rate='{$interest_rate}',monthly_amount='{$monthly_payable}',time='{$date_time}' where user_id='{$userid}'");
	}else{
		mysqli_query($con,"INSERT into loan_info (user_id,total_amount,loan_rate,monthly_amount) values('{$userid}','{$totalamount}','{$interest_rate}','{$monthly_payable}')");

	}

	echo json_encode(array("totalamount"=>$totalamount." won",
		"interest"=>$interest." won",
		"interest_rate"=>$interest_rate." %",
		"monthly_payable"=>$monthly_payable." won"
	));
}


?>