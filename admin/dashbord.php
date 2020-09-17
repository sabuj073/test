<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location: index.php");
	die();
} 
/*require 'includes/header.php';*/
require 'includes/config.php';
require 'includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<style type="text/css">
		.dashbord{
			
			padding-top: 40px;
			padding-left: 220px;

		}
		@media screen and (max-width: 600px) {
			.dashbord{
				margin-left: 0px;

			}
		}


	</style>
</head>
<body>

	
	<div class="container-fluid dashbord">
		<u style="color: #FF6357;"><h3>User Data</h3></u>
		<div class="table-responsive demo_view">
			<table class="table" id="datatable">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Email</th>
						<th>Number</th>
						<th>Alien ID</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$id = 0;
					$result = mysqli_query($con,"SELECT * from signup,user_loan_data WHERE signup.id = user_loan_data.userid GROUP BY signup.id");
					while ($row = mysqli_fetch_assoc($result)) {
						$id++;
						?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['number']; ?></td>
							<td><?php echo $row['al_num']; ?></td>
							<td><a href="details.php/?ui=<?php echo $row['userid']; ?>"><button class="button button3">Details</button></a></td>
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
	.button5 {border-radius: 50%;}.

</style>
</style>




<div style="margin-top: 150px;"><?php require '../includes/footer.php' ?></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').DataTable();
} );
</script>