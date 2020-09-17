
<table border="1px" style="float: left;" width="45%" id="dataTable">
	<tr>
		<th>Id</th>
		<th>Day</th>
		<th>Amount(A+B)</th>
		<th>Principal(A)</th>
		<th>Interest(B)</th>
		<th>Loan Balance</th>
	</tr>
	<?php 
require 'config.php';
$loan_amount = $_POST['loan_amount'];
$loan_period = $_POST['loan_period'];
$pay_day = $_POST['get_pay'];
$loan_start_date = $_POST['loan_start_date'];
//$paymentdate = $_POST['paymentdate'];
require 'temp_pay_day.php';

if($loan_period!="" && $loan_amount!="" && $pay_day!="" && $loan_start_date!=""){
	$loan_query = "tb_".$loan_amount;

	$month = $month-1;

	$query = "Select {$loan_query} from loan_amount where id = '{$loan_period}'";

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$monthly_payable = $row[$loan_query];
	$totalamount = $row[$loan_query]*$loan_period;
	$interest = (int)$totalamount-(int)$loan_amount;
	$interest_rate = ($interest*100)/$loan_amount;	
	$principal = $loan_amount/$loan_period;
	$monthly_interest = $monthly_payable-$principal;
	for ($i=1; $i <=$loan_period ; $i++) { 
		$month += 1;
		$totalamount -= $monthly_payable;
     ?>
	<tr>
		<td width="16%"><?php echo $i; ?></td>
		<td width="17%"><?php echo $pay_day."-".$month."-".$year; ?></td>
		<td width="17%"><?php echo number_format($monthly_payable); ?></td>
		<td width="17%"><?php echo number_format($principal); ?></td>
		<td width="17%"><?php echo number_format($monthly_interest); ?></td>
		<td width="17%"><?php echo number_format($totalamount); ?></td>
	</tr>
<?php } }?>
</table>