<?php  

require "config.php";

if($conn->connect_error){
	die("connection failed");
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$salt = "codeflix";
$password_encrypted = sha1($password.$salt);


$sql = "INSERT INTO signup (name, email, password) 
VALUES ('$name', '$email', '$password_encrypted')";

if($conn->query($sql) === TRUE){
	?>
	<script>
		alert('Registration Sucessfull');
	</script>
	<?php header("Location: signlog.html");
        die(); ?>
	<?php
}
else{
	?>
	<script>
		alert('Values did not insert');
	</script>
	<?php
}


?>




















