<?php 
session_start();
unset($_SESSION['userid']);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
	die();
}
 ?>