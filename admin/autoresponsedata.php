<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("Location: index.php");
	die();
}
require 'includes/sidebar.php';
require 'includes/config.php';
if(isset($_POST['button'])){
	$test = $_POST['editor1'];
	mysqli_query($con,"Update email set msg='{$test}'");
	echo "<script>alert('Update Successful')</script>";
}
$result = mysqli_query($con,"SELECT * from email");
$row = mysqli_fetch_assoc($result);

 
?>
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
</head>
<body>
	<div class="container-fluid dashbord">
		<form action="autoresponsedata.php" method="post">
			<textarea name="editor1"><?php echo $row['msg']; ?></textarea>
			<button type="submit" name="button">Save</button>
		</form>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
	</div>
</body>
</html>
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
	body {font-family: Arial, Helvetica, sans-serif;}
	form {border: 3px solid #f1f1f1;}

	input[type=text], input[type=password] {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	button:hover {
		opacity: 0.8;
	}

</style>