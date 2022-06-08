<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP 
$Id = ""; $Name = ""; $NoHp = ""; $Photo = "";
$Campus = ""; $Faculty = ""; $Subject = ""; $NoHpBaru = ""; $NoReg = ""; $Seat = "";
$Title = "";
$Message = "";
$Display = 1;
$DisplayMessage = "";

if(isset($_GET["d"])) { 
	$Display = $_GET["d"];
	
	$sql = "SELECT * FROM tbdisplayinfo WHERE Id = '".$Display."' LIMIT 1";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)) {
		$DisplayMessage = $data['Message'];
	}
}

if(isset($_GET["s"])) { 
	$Id = $_GET["s"];
	$sql = "SELECT * FROM tbdisplay WHERE Id = '".$Id."' AND Status = 0 AND Display = '".$Display."' ORDER BY ID DESC LIMIT 1";
	$query = mysql_query($sql);
	while($data = mysql_fetch_array($query)) {
		$Id = $data['Id'];
		$Name = $data['Name'];
		$NoHp = $data['NoHp'];
		$Photo = $data['Photo'];
		$Title = $data['Title'];
		$Message = $data['Message'];
		$Campus = $data['Campus'];
		$Faculty = $data['Faculty'];
		$Subject = $data['Subject'];
		$NoHpBaru = $data['NoHpBaru'];
		$NoReg = $data['NoReg'];
		$Seat = $data['Seat'];
	}
	
	$sql = "UPDATE tbdisplay SET Status = 1 WHERE Id = '".$Id."' AND Status = 0 AND Display = '".$Display."'";
	$query = mysql_query($sql);	
}


$display_bg = "display_idle.jpg";
if(isset($_GET["s"])){
	$display_bg = "displayz.jpg";
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>	
	<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" />		
	<link href="asset/css/fontstyle.css" rel="stylesheet" />
	<script src="asset/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="asset/bootstrap/js/bootstrap.min.js"></script>
	</head> 
	<body style = "background-color: #120507; overflow:hidden;">
		<div style = "overflow:hidden; width:2048px; height:1280px; left:0px; top:0px; position:absolute;">
			<div style = "width:1280px; height:768px; background-image: url('asset/<?PHP echo $display_bg; ?>'); background-color: #120507;">
				<div style = "width:1280px; height:40px; margin-top:0px; background-color:transparent;text-align:center;">
					<br><br><br>
					<span style = "font-weight:bolder; font-size:160px;  width:1280px; color:#1691A8;">
						<?PHP if(isset($_GET["s"])) : ?>
						Welcome
						<?PHP endif; ?>
					</span>
				</div>
			
			</div>
			<div style = "width:1280px; height:522px; top:246px; position:absolute;">
				<div class="row" style = "top:400px; ">
				      
				</div>
				<?PHP if(isset($_GET["s"])) : ?>
				<div style = "width:1280px; height:450px; position:absolute; top:20px; ">
					<div class="row">
						<div class="col">
							<div style = "margin-left:10px; width:1280px; height:500px; text-align:center;">
								<div class="row" style = "padding:10px; font-size:25px;">
									<div class="col">
										<!--<span style = "font-weight:bolder; font-size:30px;"><?PHP echo $Message; ?><br>
										</span>-->
										
										
										<div class="row" style = "padding:10px;margin-top:-10px;">
											<div class="col">
												<span style = "font-weight:bold;font-size:80px; color:#FFFFFF; background-color:#1691A8; padding:10px; border-radius: 15px;">
												 <?PHP echo $Name; ?></span>
											</div>
											
											<div class="col"style = "padding:10px;margin-top:-50px;">
												<!-- <span style = "font-weight:bold;">Universitas</span> 
												-->
												<br><br><span style = "font-weight:bold; font-size:70px; color:#1691A8;"><?PHP //echo substr($Campus, 0, 25); ?>Group <?PHP echo $NoReg; ?></span>
											</div>
											
											<div class="col"style = "padding:10px; text-align:right;margin-top:65px; margin-right:455px;">
												<!--<br><div style = "text-align:center; margin-left:690px; font-weight:bolder; font-size:80px; color:#1691A8;"> <?PHP echo $NoReg; ?></div>-->
											</div>
											
											<!--<div class="col" style = "padding:10px;margin-top:-100px;">
												<span style = "font-weight:bold;font-size:50px">
												<br> 
												<?PHP if($NoHpBaru != "" || $NoHpBaru != null): ?>
												<?PHP echo $NoHpBaru;?>
												<?PHP else: ?>
												<?PHP echo $NoHp; ?>
												<?PHP endif; ?>
												</span>
											</div>-->
											<!--<div class="col">
												 <span style = "font-weight:bold;">Fakultas</span>
												<br> <?PHP echo $Faculty; ?>
											</div> -->
											
											<!--
											
											<div class="col">
												<span style = "font-weight:bold;">Subject</span>
												<br> <?PHP echo $Subject; ?>
											</div>
											-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?PHP else: ?>
				<div style = "width:1280px; height:450px; position:absolute; top:20px; ">
					<div class="row">
						<div class="col">
							<div style = "margin-left:10px; width:1280px; height:500px; text-align:center;">
								<div class="row" style = "padding:10px; font-size:25px;">
									<div class="col">
										<!--<span style = "font-weight:bolder; font-size:30px;"><?PHP echo $Message; ?><br>
										</span>-->
										
										
										<div class="row" style = "padding:10px;margin-top:-10px;">
											<div class="col"style = "padding:10px;margin-top:-50px;">
												<!-- <span style = "font-weight:bold;">Universitas</span> 
												-->
												<br><br><span style = "font-weight:bolder; font-size:110px; color:#1691A8;">
												REGISTRATION
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?PHP endif; ?>
			</div>
		</div>		
	</body>
	<script>
		var idleTime = 0;
		$(document).ready(function () {
			var idleInterval = setInterval(timerIncrement, 5000); // 5 second

			$(this).mousemove(function (e) {
				idleTime = 0;
			});
			$(this).keypress(function (e) {
				idleTime = 0;
			});
		});

		function timerIncrement() {		
			idleTime = idleTime + 1;
			if (idleTime > 5) { // 20 sec (4x)
				window.location='display.php?d=<?PHP echo $Display; ?>';
			} else {
				$.post("process.php", { process: 'check', Display: '<?PHP echo $Display; ?>'},
					function(data){
						if(data != "0"){
							window.location='display.php?d=<?PHP echo $Display; ?>&s='+data;
						}
					})
					.done(function() {})
					.fail(function() {})
					.always(function() {});
				}
		}
	</script>
</html>
