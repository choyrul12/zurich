<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP 
$background = "asset/img/bg_scan.png";
$error = "";
if(isset($_GET['error'])) {
	$error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>	
	<!-- Bootstrap core CSS -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head> 
	<body style = "background-color: #000000; overflow:hidden;">
		<div style = "overflow:hidden; width:2048px; height:1240px; left:0px; top:0px; position:absolute;">
			
			<div style = "width:2048px; height:1240px; background-image: url('<?PHP echo $background; ?>'); background-color: #000000;">
				
				<a href = "index.php">
				<div style = "position:absolute; width:500px; height:200px; left:0px;">
				</div>
				</a>
				<a href = "admin.php">
				<div style = "position:absolute; width:500px; height:200px; right:0px;">
				</div>
				</a>
				
				<div style = "position:absolute; width:700px; height:500px; margin-top:335px; margin-left:674px; background-color:transparent; text-align:center;">
					
					<form id = "main-login" action = "process.php" method = "POST">
						<input type = "hidden" name = "process" value = "regis">
						<input type = "hidden" name = "source" value = "<?PHP echo basename($_SERVER["SCRIPT_FILENAME"]); ?>">
						<div class = "row">
							<div class = "col-sm-12 col-md-12 col-lg-12">
								<input type = "text" name = "Barcode" placeholder = "" class = "form-control" style = "font-size:100px; text-align:center; ">
							</div>					
						</div>
					
			
					</form>	
		
		
		
				</div>
				
				
				
				
				
				
			</div>
		</div>		
	</body>
	 <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function () {
			<?PHP if($error == "1"): ?>
				alert("Invalid Barcode Length!");
			<?PHP elseif($error == "2"): ?>
				alert("Invalid Barcode!");
			<?PHP elseif($error == "3"): ?>
				alert("User Not Found!");
			<?PHP elseif($error == "4"): ?>
				alert("User has been registered!");
			<?PHP endif; ?>
			
			$( "input[name='Barcode']" ).focus();
			$("input").blur(function(){
			  $( "input[name='Barcode']" ).focus();
			});
			$("input").focusout(function(){
			  $( "input[name='Barcode']" ).focus();
			});
			$( "input[name='Barcode']" ).on( "keydown", function(event) {
			  if(event.which == 13) {
					$("#main-login").submit();
			  }
			});
		});
	</script>
</html>
