<?php session_start(); ?>
<?php
if(isset($_SESSION["SessionUserId"]) && $_SESSION["SessionUserId"] != ""){
	$location = "profile.php";
	header('Location:'.$location);
	die();
}
?>
