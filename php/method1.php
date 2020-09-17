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

$loan_start_date = $_POST['loan_start_date'];
$visa_expiry_date = $_POST['visa_expiry_date'];
$date1 = strtotime($_POST['loan_start_date']); 
$date2 = strtotime($_POST['visa_expiry_date']); 

$diff = abs($date2 - $date1); 

$years = floor($diff / (365*60*60*24)); 

$months = floor(($diff - $years * 365*60*60*24) 
	/ (30*60*60*24)); 

$days = floor(($diff - $years * 365*60*60*24 - 
	$months*30*60*60*24)/ (60*60*24)); 

$months = $months+$years*12;

$max_loan = $months - 3;

if(isexists()>0){
	date_default_timezone_set("Asia/Seoul");
	$date_time = date("Y-m-d H:i:s");
	mysqli_query($con,"Update loan_info set loan_start_date='{$loan_start_date}',visa_expiry_date='{$visa_expiry_date}',visa_remaining='{$months}',max_loan_period='{$max_loan}',time='{$date_time}',max_loan_limit='15000000' where user_id='{$userid}'");

}else{
	mysqli_query($con,"INSERT into loan_info (loan_start_date,visa_expiry_date,visa_remaining,max_loan_period,max_loan_limit,user_id) values('{$loan_start_date}','{$visa_expiry_date}','{$months}','{$max_loan}','15000000','{$userid}')");
}

echo json_encode(array("months"=>$months." months",
	"max_loan"=>$max_loan." months"
	
));

?> 