<?php 
session_start();
require "php/config.php";
if(isset($_SESSION["userid"])){
	header("Location: loan.php");
	die();
}
if(isset($_POST['signup'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$salt = "codeflix";
	$password_encrypted = sha1($password.$salt);


	$sql = "INSERT INTO signup (name, email, password) 
	VALUES ('$name', '$email', '$password_encrypted')";

	if($con->query($sql) === TRUE){
		?>
		<script>
			alert('Registration Sucessfull');
		</script>
		<?php
	}
	else{
		?>
		<script>
			alert('Values did not insert');
		</script>
		<?php
	}

}elseif (isset($_POST['signin'])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$salt = "codeflix";
	$password_encrypted = sha1($password.$salt);


	$sql = mysqli_query($con, "SELECT count(*) as total,id from signup WHERE email = '".$email."' and 
		password = '".$password_encrypted."'");

	$row = mysqli_fetch_array($sql);

	if($row["total"] > 0){
		echo "<script type='text/javascript'>alert('Invalid username/password');</script>";
		$_SESSION["userid"] = $row['id'];
		header("Location: loan.php");
		die();

	}
	else{
		echo "<script type='text/javascript'>alert('Invalid username/password');</script>";
	}
	# code...
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Foreigner Loan in Korea</title>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.png" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="container" id="container">
		<div class="form-container sign-up-container">

			<form action="index.php" method="post">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook"></i></a>
					<a href="#" class="social"><i class="fa fa-google"></i></a>
					<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input type="text" name="name" placeholder="Name">
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<button name="signup">SignUp</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="index.php" method="post">
				<h1>Sign In</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fa fa-facebook"></i></a>
					<a href="#" class="social"><i class="fa fa-google"></i></a>
					<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
				</div>
				<span>or use your account</span>
				<input type="email" name="email" placeholder="Email">
				<input type="password" name="password" placeholder="Password">
				<a href="#">Forgot Your Password</a>

				<button name="signin">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});
		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>


</body>
</html>








