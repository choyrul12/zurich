<?php session_start(); ?>
<?php
if((isset($_SESSION["SessionUserId"]) == false) && $_SESSION["SessionUserId"] == ""){
	$location = "index.php";
	header('Location:'.$location);
	die();
}
?>
