<?php 
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



$pay_day = $_POST['get_pay'];
$loan_start_date = $_POST['loan_start_date'];
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
	}
}


?>