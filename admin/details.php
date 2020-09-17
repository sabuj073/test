<?php
session_start();
/*$userid = $_SESSION['userid'];*/
if(!isset($_SESSION['admin'])){
	header("Location: ../index.php");
	die();
} 
//require 'includes/header.php';
require 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashbord</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		.dashbord{
			margin-left: 200px;
			padding-top: 40px;

		}
		@media screen and (max-width: 600px) {
			.dashbord{
				margin-left: 0px;

			}
		}

	</style>
</head>
<body>

	<!--  <nav class="" style="background-color: black;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="../index.php">
						<img class="nav" src="../image/logo.png" width="100" style="margin: 5px;"> <font style="color: white;text-decoration: none;font-size: 25px;">Loan</font>
					</a>
				</div>
			</div>
		</nav> -->
		<?php require 'includes/sidebar1.php'; ?>

		<div class="container-fluid dashbord">
			<u style="color: #FF6357;"><h3>User Details</h3></u>
			<div class="table-responsive">
				<table class="table demo_view" id="dataTable" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Number</th>
							<th>Alien Id</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$userid = $_GET['ui']; 
						$id = 0;
						$result = mysqli_query($con,"SELECT * from user_loan_data WHERE userid='{$userid}'");
						while($row = mysqli_fetch_assoc($result)){
							?>
							<tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['number']; ?></td>
								<td><?php echo $row['al_num']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>


		<?php 
		$result = mysqli_query($con,"SELECT * from loan_info where user_id='{$userid}'");
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="container-fluid dashbord">
			<h4 style="float: right;color: #FF6357;">Time- <?php echo $row['time']; ?></h4>
			<u style="color: #FF6357;"><h3>Data</h3></u>
			<div class="table-responsive">
				<table class="table" border="1px">
					<thead>
						<tr>
							<th>STEP 1. Input</th>
							<th>Result Automatic Value</th>
							<th>STEP 2. Input</th>
							<th>Result Automatic Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>

							<td>
								<table class="step-1 table table_demo_data">
									<tbody>
										<tr>
											<th class="table_data_width">Loan start date<span class="text">*</span>
												<td><input type="date"  class="input_style" value="<?php echo $row['loan_start_date']; ?>" readonly></td>
											</tr>
											<tr>
												<th>Visa expiry date<span class="text">*</span></th>
												<td><input type="date" value="<?php echo $row['visa_expiry_date']; ?>"  class="input_style" readonly></td>
											</tr>
											<tr>
												<th>Pay day<span class="text">*</span></th>
												<td><?php echo $row['pay_day']; ?></td>
											</tr>
										</tbody>
									</table>
								</td>




								<td><table class="table table_demo_data">
									<tr>
										<th class="table_data_width">Visa Remaining</th>
										<td><?php echo $row['visa_remaining']; ?>&nbsp;months</div></td>
									</tr>
									<tr>
										<th>Max loan period</th>
										<td><?php echo $row['max_loan_period']; ?>&nbsp;months</div></td>
									</tr>
									<tr>
										<th>Max loan limit</th>
										<td><div id="max_loan_limit">15,000,000 won</div></td>
									</tr>
									<tr>
										<th>Repayment date</th>
										<td><?php echo $row['repayment_date']; ?></div></td>
									</tr>
									<tr>
										<th>1st Repayment day</th>
										<td><?php echo $row['first_payment_day']; ?></div></td>
									</tr>
								</table></td>








								<td>
									<table width="60%" class="table">
										<tr>
											<th class="table_data_width">Loan Period<span class="text">*</span></th>
											<td><?php echo $row['loan_period']; ?> &nbsp;months</td>
										</tr>
										<tr>
											<th>Loan amount<span class="text">*</span></th>
											<td><?php echo number_format($row['loan_amount']); ?>&nbsp;won</td>
										</tr>
										<tr>
											<th>Loan Rate</th>
											<td><?php echo $row['loan_rate']; ?>&nbsp;%</td>
										</tr>
									</table>
								</td>

								<td>
									<table  class="table">
										<tr>
											<th class="table_data_width">Monthly amount</th>
											<td><?php echo number_format($row['monthly_amount']); ?>&nbsp; won</div></td>
										</tr>
										<tr>
											<th>Total Interest</th>
											<td><?php echo number_format($row['total_interest']); ?>&nbsp;won</td>
										</tr>
										<tr>
											<th>Total Amount</th>
											<td><?php echo number_format($row['total_amount']); ?>&nbsp;won</td>
										</tr>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="table-responsive container-fluid dashbord">
				<table class="table demo_view" id="dataTable">
					<thead>
						<tr>
							<th>Id</th>
							<th>Day</th>
							<th>Amount(A+B)</th>
							<th>Principal(A)</th>
							<th>Interest(B)</th>
							<th>Loan Balance</th>
						</tr>
					</thead>
					<tbody>
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
						$result1 = mysqli_query($con,"SELECT * from loan_info where user_id='{$userid}'");
						$row1 = mysqli_fetch_assoc($result1);
						$pay_day = $row1['pay_day'];
						$loan_start_date = $row1['loan_start_date'];
						$loan_amount = $row1['loan_amount'];
						$loan_period = $row1['loan_period'];
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
						<?php } ?>
					</tbody>
				</table>
			</div>


			<div class="container-fluid dashbord">
				<u style="color: #FF6357;"><h3>Images</h3></u>
				<div class="table-responsive">
					<table class="table demo_view" id="dataTable">
						<thead>
						</thead>
						<tbody>
							<?php 
							$post = array();
							$userid = $_GET['ui'];
							$result = mysqli_query($con,"SELECT images from images WHERE userid=".$userid);
							$count = mysqli_affected_rows($con);
							while ($row = mysqli_fetch_assoc($result)) {
								$post[]=$row;
							}
							for ($i=0; $i <$count ; $i ++) { 
								?>
								<tr>
									<td><a href="<?php echo $post[$i]['images']; ?>" target="_blank"><img class="loan_img"  src="<?php echo $post[$i]['images']; ?>"></a></td>
									<?php 
									if($i<$count-1){
										$j = $i+1;
										$i++;
										$image = $post[$j]['images'];
										echo '<td><a target="_blank" href="'.$image.'" target="_blank"><img class="loan_img" src="'.$image.'"></a></td>';
									}
									?>
									<?php 
									if($i<$count-1){
										$j = $i+1;
										$i++;
										$image = $post[$j]['images'];
										echo '<td><a href="'.$image.'" target="_blank"><img class="loan_img" src="'.$image.'"></a></td>';
									}
									?>


								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>





		</body>
		</html>
		<style type="text/css">
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 5px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				margin: 4px 2px;
				cursor: pointer;
			}

			.button1 {border-radius: 2px;}
			.button2 {border-radius: 4px;}
			.button3 {border-radius: 8px;}
			.button4 {border-radius: 12px;}
			.button5 {border-radius: 50%;}
			.loan_img{
				max-height: 300px;
				max-width: 400px;
				border: 1px solid;
			}
		</style>
	</style>
	<style type="text/css">

		body, html {
			height: 100%;
		}

		* {
			box-sizing: border-box;
		}

		.demo_input{
			float: left;
			width:25%;
		}
		.input_style{
			width: 100%;
		}

		.table_head{
			font-size: 20px;
		}
		.text{
			color: #FF6357;
		}
		th{
			background-color:#E5E7E9;
		}
		.bg_color{
			background-color: red;
		}
		#sticky-footer {
			flex-shrink: none;
		}
		.bg-dark{
			background-color: black;
			color: white;
			margin: 0;
			padding-top: 5px;
			padding-bottom: 5px;
			top: 0;
			bottom: 0;
			font-size: 25px;
		}
		a{
			text-decoration: none;
		}
		.button {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}

		.button2 {background-color: #008CBA;} /* Blue */
		.button3 {background-color: #f44336;} /* Red */ 
		.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
		.button5 {background-color: #555555;} /* Black */
		.button6 {background-color: #FF6357;} /* Black */



	</style>




	<?php require '../includes/footer.php' ?> 