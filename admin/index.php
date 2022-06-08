<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("../partial/settings.php"); ?>
<?PHP
if(isset($_SESSION[$session_name])){
	if($_SESSION[$session_name] == $session_value){
		header('Location:'.$default_page);
		die();
	} else {
		header('Location:login.php');
		die();
	}
} else {
	header('Location:login.php');
	die();
}
?>
