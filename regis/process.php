<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP
if(isset($_POST["process"])){
	$process = $_POST["process"];
	$error = 0; 
	$success = 0;	
	/*1=telah registrasi ;
	2=tidak ditemukan
	3=belum registrasi
	4=sudah mengambil
	5=No belum telkom
	*/
	if($process == "regis"){ 		
		$Barcode = $_POST["Barcode"];
		$Name = "";
		$Seat = "";
		$Register = "0";
	
		/*if(strlen($Barcode) != 5){
			$error = 1;
			header('Location: index.php?error='.$error);
			exit;
		}
		
		if(substr($Barcode, 0, 2) != "19"){
			$error = 2;
			header('Location: index.php?error='.$error);
			exit;
		}
		
		$Id = intval(substr($Barcode,2, 3));

		$sql = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE Id = '".$Id."'";
		$query = mysql_query($sql);
		while($data = mysql_fetch_array($query)) {
			$count_user = $data['CountRow'];
		}
		
		if($count_user == '0'){
			$error = 3;
			header('Location: index.php?error='.$error);
			exit;
		} 
		
		$sql = "SELECT * FROM tbuser WHERE Id = '".$Id."' LIMIT 1";
		$query = mysql_query($sql);
		while($data = mysql_fetch_array($query)) {
			$Id = $data['Id'];
			$Name = $data['Name'];
			$Seat = $data['Seat'];
			$Register = $data['Register'];
		}		
		
		if($Register == "1"){
			$error = 4;
			header('Location: index.php?error='.$error);
			exit;
		}
		
		$sql = "UPDATE tbuser SET Register = 1, CreatedOn = NOW() WHERE Id = '".$Id."'";
		mysql_query($sql);			
		$success = $Id;	*/
		
		$sql = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE UPPER(Seat) = UPPER('".$Barcode."')";
		$query = mysql_query($sql);
		while($data = mysql_fetch_array($query)) {
			$count_user = $data['CountRow'];
		}
		
		if($count_user == '0'){
			$error = 3;
			header('Location: index.php?error='.$error);
			exit;
		} 
		
		$sql = "SELECT * FROM tbuser WHERE UPPER(Seat) = UPPER('".$Barcode."') LIMIT 1";
		$query = mysql_query($sql);
		while($data = mysql_fetch_array($query)) {
			$Id = $data['Id'];
			$Name = $data['Name'];
			$Seat = $data['Seat'];
			$Register = $data['Register'];
		}	
		
		$sql = "UPDATE tbuser SET Register = 1, CreatedOn = NOW() WHERE Id = '".$Id."'";
		mysql_query($sql);			
		$success = $Id;	
		
		header('Location: seat.php?Id='.$success);
		exit;
	} 
}

if(isset($_GET["process"])){
	$process = $_GET["process"];
	$error = 0; 
	$success = 0;
	
	if($process == "reset"){ 	
		$sql = "UPDATE tbuser SET Register = 0, CreatedOn = null ";
		mysql_query($sql);	

		header('Location: index.php');
		exit;		
	}
}
?>