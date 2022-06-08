<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("../partial/settings.php"); ?>
<?php include("../partial/db.php"); ?>
<?php include("../partial/class.upload.php"); ?>
<?PHP 
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=user.xls");
header("Pragma: no-cache");
header("Expires: 0");
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


	$header = "Name"."\t".
			"Email"."\t".
			"IdAgen"."\t".
			"Phone"."\t";
	$line = "";

		$queryexport = "SELECT Name, Email, IdAgen, Phone FROM tbuser where Phone IS NOT NULL AND Status = 'A'";

		$row = mysql_fetch_assoc($queryexport);

		$result = mysql_query($queryexport);
		//$header = '';

		/*for ($i = 0; $i < $count; $i++){
				$header .= mysql_field_name($result, $i)."\t";
			}*/

		while($row = mysql_fetch_row($result)){
			$line = '';

			foreach($row as $value){
		      if(!isset($value) || $value == ""){
		             $value = "\t";
		      }else{
	             $value = str_replace('"', '""', $value);
	             $value = '="' . $value . '"' . "\t";
	          }
		      $line .= $value;
		  	}
			$data .= trim($line)."\n";
			$data = str_replace("\r", "", $data);

			if ($data == "") {
				$data = "\nno matching records found\n";
			}
		}
		echo $header."\n".$data;

	}


	if($action == "2"){


	$header = "Name"."\t".
			"Email"."\t".
			"IdAgen"."\t".
			"Phone"."\t";
	$line = "";

		$queryexport = "SELECT Name, Email, IdAgen, Phone FROM tbuser where Status = 'A'";

		$row = mysql_fetch_assoc($queryexport);

		$result = mysql_query($queryexport);
		//$header = '';

		/*for ($i = 0; $i < $count; $i++){
				$header .= mysql_field_name($result, $i)."\t";
			}*/

		while($row = mysql_fetch_row($result)){
			$line = '';

			foreach($row as $value){
		      if(!isset($value) || $value == ""){
		             $value = "\t";
		      }else{
	             $value = str_replace('"', '""', $value);
	             $value = '="' . $value . '"' . "\t";
	          }
		      $line .= $value;
		  	}
			$data .= trim($line)."\n";
			$data = str_replace("\r", "", $data);

			if ($data == "") {
				$data = "\nno matching records found\n";
			}
		}
		echo $header."\n".$data;

	}

} else {
	/*No Action*/
}




?>