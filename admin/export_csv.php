<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("../partial/settings.php"); ?>
<?php include("../partial/db.php"); ?>
<?php include("../partial/class.upload.php"); ?>
<?PHP 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=registered_user.csv');
?>
<?PHP
$err_code = "";
$location = "index.php";
/*

*/
if(isset($_GET["action"])){
	$action = $_GET["action"];	
	$today_time = date("YmdHis");
	if($action == "1"){

$sqlData = "SELECT * FROM tbuser where Phone IS NOT NULL";
		$queryData = mysql_query($sqlData);
		
		$output = fopen('php://output', 'w');
		
		fputcsv($output, array('Nama', 'Email', 'IdAgen', 'Phone'));
		while($dataData = mysql_fetch_array($queryData)){ 
			fputcsv($output, array(
			$dataData['Name'], 
			$dataData['Email'], 
			$dataData['IdAgen'], 
			$dataData['Phone']
			));
		}
	}
	

} else {
	/*No Action*/
}




?>