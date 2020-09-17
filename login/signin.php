<?php

require "config.php";


if($conn->connect_error){
	die("connection failed");
}

$email = $_POST["email"];
$password = $_POST["password"];
$salt = "codeflix";
$password_encrypted = sha1($password.$salt);


$sql = mysqli_query($conn, "SELECT count(*) as total,id from signup WHERE email = '".$email."' and 
	password = '".$password_encrypted."'");

$row = mysqli_fetch_array($sql);

if($row["total"] > 0){
	$_SESSION["userid"] = $row['id'];
	header("Location: ../index.php");
    die();
	?>
	
	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}








?>