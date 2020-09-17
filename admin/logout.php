<?php 
session_start();
unset($_SESSION['admin']);
if(!isset($_SESSION['admin'])){
	header("Location: index.php");
	die();
}
 ?>