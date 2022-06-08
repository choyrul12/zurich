<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP 
$background = "asset/img/bg_done.png";
$refresh_second_rate = 5;
$type = 1;

$Id = ""; $Name = ""; $Seat = "";
if(isset($_GET['Id'])) {
	$Id = $_GET['Id'];
}
if($type == 2){
	$sql = "SELECT * FROM tbuser WHERE Id = '".$Id."' LIMIT 1";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)) {
		$Name = $data['Name'];
		$Seat = $data['Seat'];
	}	
}

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>	
	<!-- Bootstrap core CSS -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head> 
	<style>
	@font-face{
		font-family: "Helvetica";
		src: url("font/Helvetica.ttf");
	}

	</style>
	<body style = "background-color: #000000; overflow:hidden;">
		<div style = "overflow:hidden; width:2048px; height:1240px; left:0px; top:0px; position:absolute;">
			<div style = "width:2048px; height:1240px; background-image: url('<?PHP echo $background; ?>'); background-color: #000000;">
				
				<div style = "width:2048px; position:absolute; left:0px; top: 700px; font-size:120px; text-align:center; font-family:'Helvetica';">
				<?PHP echo $Name; ?>
				</div>
			</div>
		</div>		
	</body>
	 <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function () {
			$( "body" ).click(function() {
				window.location='index.php';
			});
			setTimeout(function(){ 
				window.location='index.php';
			}, <?PHP echo $refresh_second_rate; ?>000);
		});
	</script>
</html>
