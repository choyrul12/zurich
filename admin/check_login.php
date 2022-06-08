<?PHP error_reporting(0); ?>
<?PHP
if(isset($_SESSION[$session_name])){
	if($_SESSION[$session_name] == $session_value){
		
	} else {
		header('Location:login.php');
		die();
	}
} else {
	header('Location:login.php');
	die();
}
?>