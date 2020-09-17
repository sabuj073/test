<?php 
session_start();
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
	die();
}
$userid = $_SESSION['userid'];
require 'php/config.php';
$query = mysqli_query($con,"SELECT * from signup WHERE id = '{$userid}'");
$result = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<style>
	input[type=text],input[type=email], select {
		width: 100% !important;
		padding: 12px 20px !important;
		margin: 8px 0;
		display: inline-block !important;
		border: 1px solid #ccc !important;
		border-radius: 4px !important;
		box-sizing: border-box !important;
	}
	input[type=number] {
		width: 30% !important;
		padding: 12px 20px !important;
		margin: 8px 0 !important;
		display: inline-block !important;
		border: 1px solid #ccc !important;
		border-radius: 4px !important;
		box-sizing: border-box !important;
	}


	#submit {
		width: 100% !important;
		background-color: #4CAF50 !important;
		color: white !important;
		padding: 14px 20px !important;
		margin: 8px 0 !important;
		border: none;
		border-radius: 4px !important;
		cursor: pointer !important;
	}

	#submit:hover {
		background-color: #45a049;
	}

	#div_data {
		border-radius: 5px !important;
		background-color: #f2f2f2 !important;
		padding: 20px !important;
		width: 80%;
		margin: 50px auto !important;
	}
</style>

<head>
	<meta charset="utf-8"/>

	<!-- Google web fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

	<!-- The main CSS file -->
	<link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
	<?php require 'includes/header.php'; ?>
	<div id="div_data">
		Name
		<input type="text" id="name" name="name" placeholder="Your name.." value="<?php echo $result['name']; ?>">

		Email
		<input type="email" id="email" name="email" placeholder="Your email.." value="<?php echo $result['email']; ?>">

		Phone Number
		<input type="text" id="number" name="number" placeholder="Your number..">

		Alien number<br>
		<input type="number" id="al_num1" name="al_num1" >&nbsp;<span style="font-size: 20px;">-</span>&nbsp;<input type="number" id="al_num2" name="al_num2"><br>
		Documents<br><br>


		

		<input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>">


		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Drop Here

				<a>Browse</a>
				<input type="file" name="upl" multiple />
				<input type="hidden" name="dir" value="<?php echo $_SESSION['userid']; ?>">
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>
		<button id="submit" onclick="store()">Submit</button>
	</div>

	<?php require 'includes/footer.php'; ?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="assets/js/jquery.knob.js"></script>

	<!-- jQuery File Upload Dependencies -->
	<script src="assets/js/jquery.ui.widget.js"></script>
	<script src="assets/js/jquery.iframe-transport.js"></script>
	<script src="assets/js/jquery.fileupload.js"></script>

	<!-- Our main JS file -->
	<script src="assets/js/script.js"></script>


	<!-- Only used for the demos. Please ignore and remove. --> 
	<script src="http://cdn.tutorialzine.com/misc/enhance/v1.js" async></script>

</body>
</html>
<?php echo "$userid"; ?>
<script type="text/javascript">
	function store() {
		var name = $("#name").val();
		var mail = $("#email").val();
		var number = $("#number").val();
		var al_num1 = $("#al_num1").val();
		var al_num2 = $("#al_num2").val();
		var userid = $("#userid").val();
		if(name!=""){
			if(mail!=""){
				if(number!=""){
					if(al_num1!=""){
						if(al_num2!=""){
							$.ajax({
								url: "php/st_user_data.php",
								type: "POST",
								data: {
									userid:userid,
									name: name,
									mail: mail,
									number: number,
									al_num1: al_num1,
									al_num2:al_num2,			
								},
								cache: false,
								success: function(dataResult){
									alert('Data Submitted !'); 
									window.location.href = "loan.php";


								}
							});


						}else{
							alert("Please fill all the fields");
						}
					}else{
						alert("Please fill all the fields");
					}
				}
				else{
					alert("Please fill all the fields");
				}
			}
			else{
				alert("Please fill all the fields");
			}
		}else{
			alert("Please fill all the fields");
		}
		

	}
</script>