<?php
session_start();
$userid = $_SESSION['userid'];
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

require "php/config.php";

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

$dir = $_POST['dir'];
if(!is_dir("uploads/".$dir)){
	mkdir("uploads/".$dir);
}else{
	echo "exists";
}


if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$dir.'/'.$_FILES['upl']['name'])){
		$filename = '../../uploads/'.$dir.'/'.$_FILES['upl']['name'];

		mysqli_query($con,"INSERT into images values(null,'{$userid}','{$filename}')");

		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;