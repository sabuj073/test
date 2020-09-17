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

function pay($pay_day){
	if ($pay_day>0 && $pay_day<5) {
		return 5;
	}elseif ($pay_day>=5 && $pay_day<10) {
		return 10;
	}elseif ($pay_day>=10 && $pay_day<15) {
		return 15;
	}elseif ($pay_day>=15 && $pay_day<20) {
		return 20;
	}elseif ($pay_day>=20 && $pay_day<25) {
		return 25;
	}elseif ($pay_day>=25 && $pay_day<=31) {
		return 1;
	}
}


date_default_timezone_set("Asia/Seoul");
$date_time = date("Y-m-d H:i:s");
$pay_day = $_POST['get_pay'];
/*$pay_day = 20;*/
$use_pay = $pay_day;
$loan_start_date = $_POST['loan_start_date'];
/*$loan_start_date = "2020-05-14";*/
if($loan_start_date!="" && $pay_day!=""){
	$pay_day = pay($pay_day);
	$year = date('Y', strtotime($loan_start_date));
	$month = date('m', strtotime($loan_start_date));
	$date = date('d', strtotime($loan_start_date));
	$date +=11;
	if($pay_day<$date)
	{
		$month = $month+1;
		$data_date = $pay_day."-".$month."-".$year;
		$repayment_date = date("d-M-Y", strtotime($data_date));
		if(isexists()>0){
				mysqli_query($con,"UPDATE loan_info set  pay_day='{$use_pay}',repayment_date='{$pay_day}',first_payment_day='{$repayment_date}',time='{$date_time}' where user_id='{$userid}' ");
		}else{
				mysqli_query($con,"INSERT into loan_info(user_id,pay_day,repayment_date,first_payment_day) values('{$userid}','{$use_pay}','{$pay_day}','{$repayment_date}')");
		}
		echo json_encode(array("pay_day"=>$pay_day." th",
			"loan_pay_day"=>date("d-M-Y", strtotime($data_date)),
			"date"=>$repayment_date
		));
	}else{

		$data_date = $pay_day."-".$month."-".$year;
		$repayment_date = date("d-M-Y", strtotime($data_date));
		if(isexists()>0){
				mysqli_query($con,"UPDATE loan_info set  pay_day='{$use_pay}',repayment_date='{$pay_day}',first_payment_day='{$repayment_date}',time='{$date_time}' where user_id='{$userid}' ");
		}else{
			mysqli_query($con,"INSERT into loan_info(user_id,pay_day,repayment_date) values('{$userid}','{$pay_day}','{$repayment_date}')");
		}
		echo json_encode(array("pay_day"=>$pay_day." th",
			"loan_pay_day"=>date("d-M-Y", strtotime($data_date)),
			"date"=>$date_time
		));
	}
}
else{
	if(isexists()>0){
			$pay_day = pay($pay_day);
			mysqli_query($con,"UPDATE loan_info set pay_day='{$use_pay}',repayment_date='{$pay_day}',time='{$date_time}' where user_id='{$userid}' ");
		}else{
			$pay_day = pay($pay_day);
			mysqli_query($con,"INSERT into loan_info(user_id,pay_day,repayment_date) values('{$userid}','{$use_pay}','{$pay_day}')");
		}
	echo json_encode(array("pay_day"=>$pay_day." th"
));
}

?>