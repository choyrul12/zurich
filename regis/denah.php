<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP 
$platinum_bg_color = "#FE840E";
$titanium_bg_color = "#8D9440";
$color_ticking = "red";

$Seat = "";

$occupied_array = array();
$sql = "SELECT * FROM tbuser WHERE Register = 1";
$query = mysql_query($sql);
while($data = mysql_fetch_array($query)) {
	$occupied_array[] = $data['Seat'];
}

$count_user_voyage = 0;
$sqlCount = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE Register = 1 AND Seat like 'V%' ";
$queryCount = mysql_query($sqlCount);
while($dataCount = mysql_fetch_array($queryCount)) {
	$count_user_voyage = $dataCount['CountRow'];
}

$count_user_platinum = 0;
$sqlCount = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE Register = 1 AND Seat like 'P%' ";
$queryCount = mysql_query($sqlCount);
while($dataCount = mysql_fetch_array($queryCount)) {
	$count_user_platinum = $dataCount['CountRow'];
}

$count_user_titanium = 0;
$sqlCount = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE Register = 1 AND Seat like 'T%' ";
$queryCount = mysql_query($sqlCount);
while($dataCount = mysql_fetch_array($queryCount)) {
	$count_user_titanium = $dataCount['CountRow'];
}


?>
<!DOCTYPE html>
<html lang="en-US">
	<head>	
	<!-- Bootstrap core CSS -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.active{
			background-color:#F3E779;
		}
		.occupied{
			background-color:#C62168;
		}
		.free{
			background-color:#C0C0C0;
		}
		.blank{
			background-color:#000;
		}
	</style>
	</head> 
	<body style = "background-color: #000000; overflow:hidden;">
		<div style = "overflow:hidden; width:2048px; height:1240px; left:0px; top:0px; position:absolute;">
			<div style = "width:2048px; height:1240px; background-color: #FFFFFF;">
				
				<div style = "position:absolute; background-color:red; left:100px; top: 10px; width: 600px; height: 60px; text-align:center; font-size:40px; font-weight:bolder; color:#FFFFFF; ">
					SEAT LOCATION
				</div>
				
				<div style = "position:absolute; left:800px; top: 10px; width: 1140px; height: 60px; text-align:right; font-size:40px; font-weight:bolder; color:#000000; ">
					<a href = "admin.php">
						<div style = "position:absolute; right: 0px; top: 0px;width:350px; height:59px; font-size:35px; font-weight:bolder; color:#ffffff; text-align:center; font-family:'Helvetica'; padding-top:5px; background-color: #9E1030; border-radius: 15px;">
							ADMIN
						</div>
					</a>
				</div>
				
				<div style = "position:absolute; background-color:#000000; left:100px; top: 80px; width: 1840px; height: 40px;  text-align:center; font-size:25px; font-weight:bolder; color:#FFFFFF;">
					STAGE
				
				</div>
				
				<div style = "position:absolute; background-color:blue; left:100px; top: 122px; width: 1840px; height: 200px;">
				
					<div style="position:absolute; left:1850px; top: 50px; text-align: center; font-weight: bolder; font-size:30px;">
						Count <?PHP echo $count_user_voyage; ?>
					</div>


					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VA")?"active":((in_array("VA.01", $occupied_array)||in_array("VA.02", $occupied_array)||in_array("VA.03", $occupied_array)||in_array("VA.04", $occupied_array)||in_array("VA.05", $occupied_array)||in_array("VA.06", $occupied_array)||in_array("VA.07", $occupied_array)||in_array("VA.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 70px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					A
					<!--
					<div class = "<?PHP echo ("VA.01"==$Seat)?"active":((in_array("VA.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VA.02"==$Seat)?"active":((in_array("VA.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VA.03"==$Seat)?"active":((in_array("VA.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VA.04"==$Seat)?"active":((in_array("VA.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VA.05"==$Seat)?"active":((in_array("VA.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VA.06"==$Seat)?"active":((in_array("VA.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VA.07"==$Seat)?"active":((in_array("VA.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VA.08"==$Seat)?"active":((in_array("VA.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>

					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VB")?"active":((in_array("VB.01", $occupied_array)||in_array("VB.02", $occupied_array)||in_array("VB.03", $occupied_array)||in_array("VB.04", $occupied_array)||in_array("VB.05", $occupied_array)||in_array("VB.06", $occupied_array)||in_array("VB.07", $occupied_array)||in_array("VB.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 280px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					B
					<!--
					<div class = "<?PHP echo ("VB.01"==$Seat)?"active":((in_array("VB.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VB.02"==$Seat)?"active":((in_array("VB.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VB.03"==$Seat)?"active":((in_array("VB.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VB.04"==$Seat)?"active":((in_array("VB.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VB.05"==$Seat)?"active":((in_array("VB.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VB.06"==$Seat)?"active":((in_array("VB.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VB.07"==$Seat)?"active":((in_array("VB.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VB.08"==$Seat)?"active":((in_array("VB.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VC")?"active":((in_array("VC.01", $occupied_array)||in_array("VC.02", $occupied_array)||in_array("VC.03", $occupied_array)||in_array("VC.04", $occupied_array)||in_array("VC.05", $occupied_array)||in_array("VC.06", $occupied_array)||in_array("VC.07", $occupied_array)||in_array("VC.08", $occupied_array)||in_array("VC.09", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 490px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					C
					<!--
					<div class = "<?PHP echo ("VC.01"==$Seat)?"active":((in_array("VC.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VC.02"==$Seat)?"active":((in_array("VC.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VC.03"==$Seat)?"active":((in_array("VC.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VC.04"==$Seat)?"active":((in_array("VC.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VC.05"==$Seat)?"active":((in_array("VC.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VC.06"==$Seat)?"active":((in_array("VC.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VC.07"==$Seat)?"active":((in_array("VC.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VC.08"==$Seat)?"active":((in_array("VC.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
				
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VD")?"active":((in_array("VD.01", $occupied_array)||in_array("VD.02", $occupied_array)||in_array("VD.03", $occupied_array)||in_array("VD.04", $occupied_array)||in_array("VD.05", $occupied_array)||in_array("VD.06", $occupied_array)||in_array("VD.07", $occupied_array)||in_array("VD.08", $occupied_array)||in_array("VD.09", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 700px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					D
					<!--
					<div class = "<?PHP echo ("VD.01"==$Seat)?"active":((in_array("VD.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VD.02"==$Seat)?"active":((in_array("VD.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VD.03"==$Seat)?"active":((in_array("VD.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VD.04"==$Seat)?"active":((in_array("VD.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VD.05"==$Seat)?"active":((in_array("VD.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VD.06"==$Seat)?"active":((in_array("VD.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VD.07"==$Seat)?"active":((in_array("VD.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VD.08"==$Seat)?"active":((in_array("VD.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VE")?"active":((in_array("VE.01", $occupied_array)||in_array("VE.02", $occupied_array)||in_array("VE.03", $occupied_array)||in_array("VE.04", $occupied_array)||in_array("VE.05", $occupied_array)||in_array("VE.06", $occupied_array)||in_array("VE.07", $occupied_array)||in_array("VE.08", $occupied_array)||in_array("VE.09", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 1030px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					E
					<!--
					<div class = "<?PHP echo ("VE.01"==$Seat)?"active":((in_array("VE.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VE.02"==$Seat)?"active":((in_array("VE.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VE.03"==$Seat)?"active":((in_array("VE.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VE.04"==$Seat)?"active":((in_array("VE.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VE.05"==$Seat)?"active":((in_array("VE.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VE.06"==$Seat)?"active":((in_array("VE.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VE.07"==$Seat)?"active":((in_array("VE.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VE.08"==$Seat)?"active":((in_array("VE.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VF")?"active":((in_array("VF.01", $occupied_array)||in_array("VF.02", $occupied_array)||in_array("VF.03", $occupied_array)||in_array("VF.04", $occupied_array)||in_array("VF.05", $occupied_array)||in_array("VF.06", $occupied_array)||in_array("VF.07", $occupied_array)||in_array("VF.08", $occupied_array)||in_array("VF.09", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 1240px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					F
					<!--
					<div class = "<?PHP echo ("VF.01"==$Seat)?"active":((in_array("VF.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VF.02"==$Seat)?"active":((in_array("VF.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VF.03"==$Seat)?"active":((in_array("VF.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VF.04"==$Seat)?"active":((in_array("VF.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VF.05"==$Seat)?"active":((in_array("VF.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VF.06"==$Seat)?"active":((in_array("VF.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VF.07"==$Seat)?"active":((in_array("VF.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VF.08"==$Seat)?"active":((in_array("VF.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VG")?"active":((in_array("VG.01", $occupied_array)||in_array("VG.02", $occupied_array)||in_array("VG.03", $occupied_array)||in_array("VG.04", $occupied_array)||in_array("VG.05", $occupied_array)||in_array("VG.06", $occupied_array)||in_array("VG.07", $occupied_array)||in_array("VG.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 1450px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					G
					<!--
					<div class = "<?PHP echo ("VG.01"==$Seat)?"active":((in_array("VG.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VG.02"==$Seat)?"active":((in_array("VG.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VG.03"==$Seat)?"active":((in_array("VG.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VG.04"==$Seat)?"active":((in_array("VG.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VG.05"==$Seat)?"active":((in_array("VG.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VG.06"==$Seat)?"active":((in_array("VG.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VG.07"==$Seat)?"active":((in_array("VG.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VG.08"==$Seat)?"active":((in_array("VG.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
					<div class = "<?PHP echo (substr($Seat, 0, 2)=="VH")?"active":((in_array("VH.01", $occupied_array)||in_array("VH.02", $occupied_array)||in_array("VH.03", $occupied_array)||in_array("VH.04", $occupied_array)||in_array("VH.05", $occupied_array)||in_array("VH.06", $occupied_array)||in_array("VH.07", $occupied_array)||in_array("VH.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; top: 50px; left: 1660px; width:100px; height:100px; border-radius: 50px; font-size:50px; font-weight:bolder; text-align:center; padding-top:10px;">
					H
					<!--
					<div class = "<?PHP echo ("VH.01"==$Seat)?"active":((in_array("VH.01", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: -40px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">1</div>
					<div class = "<?PHP echo ("VH.02"==$Seat)?"active":((in_array("VH.02", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">2</div>
					<div class = "<?PHP echo ("VH.03"==$Seat)?"active":((in_array("VH.03", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -122px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">3</div>
					<div class = "<?PHP echo ("VH.04"==$Seat)?"active":((in_array("VH.04", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -103px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">4</div>
					<div class = "<?PHP echo ("VH.05"==$Seat)?"active":((in_array("VH.05", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: -50px; margin-left: 110px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">5</div>
					<div class = "<?PHP echo ("VH.06"==$Seat)?"active":((in_array("VH.06", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: 79px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">6</div>
					<div class = "<?PHP echo ("VH.07"==$Seat)?"active":((in_array("VH.07", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 25px; margin-left: 30px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">7</div>
					<div class = "<?PHP echo ("VH.08"==$Seat)?"active":((in_array("VH.08", $occupied_array))?"occupied":"free"); ?>" style = "position:absolute; margin-top: 5px; margin-left: -19px; width:30px; height:30px; border-radius: 15px; font-size:20px; font-weight:bolder; text-align:center;">8</div>					
					-->
					</div>
					
				</div>
				
				<div style = "position:absolute; left:100px; top: 330px; width: 1840px; height: 930px;">
				
					<div style="position:absolute; left:1850px; top: 150px; text-align: center; font-weight: bolder; font-size:30px;">
						Count <?PHP echo $count_user_platinum; ?>
					</div>

					<div style="position:absolute; left:1850px; top: 600px; text-align: center; font-weight: bolder; font-size:30px;">
						Count <?PHP echo $count_user_titanium; ?>
					</div>


					<table width = '100%'  border='1'  style = "text-align:center; font-size:22px; font-weight:bolder; table-layout: fixed ;">
						<tr>
							<td colspan = '49' style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PLATINUM</td>
						</tr>
						<tr>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("PA.01"==$Seat)?"active":((in_array("PA.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PA.02"==$Seat)?"active":((in_array("PA.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PA.03"==$Seat)?"active":((in_array("PA.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PA.04"==$Seat)?"active":((in_array("PA.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PA.05"==$Seat)?"active":((in_array("PA.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PA.06"==$Seat)?"active":((in_array("PA.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PA</td>
							<td class = "<?PHP echo ("PA.07"==$Seat)?"active":((in_array("PA.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PA.08"==$Seat)?"active":((in_array("PA.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PA.09"==$Seat)?"active":((in_array("PA.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PA.10"==$Seat)?"active":((in_array("PA.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PA.11"==$Seat)?"active":((in_array("PA.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td class = "<?PHP echo ("PA.12"==$Seat)?"active":((in_array("PA.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PA.13"==$Seat)?"active":((in_array("PA.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PA.14"==$Seat)?"active":((in_array("PA.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PA.15"==$Seat)?"active":((in_array("PA.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PA.16"==$Seat)?"active":((in_array("PA.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PA.17"==$Seat)?"active":((in_array("PA.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PA.18"==$Seat)?"active":((in_array("PA.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PA</td>
							<td class = "<?PHP echo ("PA.19"==$Seat)?"active":((in_array("PA.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PA.20"==$Seat)?"active":((in_array("PA.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PA.21"==$Seat)?"active":((in_array("PA.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PA.22"==$Seat)?"active":((in_array("PA.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PA.23"==$Seat)?"active":((in_array("PA.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("PA.24"==$Seat)?"active":((in_array("PA.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PA.25"==$Seat)?"active":((in_array("PA.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PA.26"==$Seat)?"active":((in_array("PA.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PA.27"==$Seat)?"active":((in_array("PA.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PA.28"==$Seat)?"active":((in_array("PA.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PA.29"==$Seat)?"active":((in_array("PA.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PA.30"==$Seat)?"active":((in_array("PA.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PA</td>
							<td class = "<?PHP echo ("PA.31"==$Seat)?"active":((in_array("PA.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PA.32"==$Seat)?"active":((in_array("PA.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PA.33"==$Seat)?"active":((in_array("PA.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PA.34"==$Seat)?"active":((in_array("PA.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PA.35"==$Seat)?"active":((in_array("PA.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("PA.36"==$Seat)?"active":((in_array("PA.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PA.37"==$Seat)?"active":((in_array("PA.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PA.38"==$Seat)?"active":((in_array("PA.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PA.39"==$Seat)?"active":((in_array("PA.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PA.40"==$Seat)?"active":((in_array("PA.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PA.41"==$Seat)?"active":((in_array("PA.41", $occupied_array))?"occupied":""); ?>">41</td>
						</tr>
						
						<tr>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("PB.01"==$Seat)?"active":((in_array("PB.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PB.02"==$Seat)?"active":((in_array("PB.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PB.03"==$Seat)?"active":((in_array("PB.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PB.04"==$Seat)?"active":((in_array("PB.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PB.05"==$Seat)?"active":((in_array("PB.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PB.06"==$Seat)?"active":((in_array("PB.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PB</td>
							<td class = "<?PHP echo ("PB.07"==$Seat)?"active":((in_array("PB.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PB.08"==$Seat)?"active":((in_array("PB.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PB.09"==$Seat)?"active":((in_array("PB.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PB.10"==$Seat)?"active":((in_array("PB.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PB.11"==$Seat)?"active":((in_array("PB.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td class = "<?PHP echo ("PB.12"==$Seat)?"active":((in_array("PB.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PB.13"==$Seat)?"active":((in_array("PB.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PB.14"==$Seat)?"active":((in_array("PB.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PB.15"==$Seat)?"active":((in_array("PB.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PB.16"==$Seat)?"active":((in_array("PB.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PB.17"==$Seat)?"active":((in_array("PB.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PB.18"==$Seat)?"active":((in_array("PB.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PB</td>
							<td class = "<?PHP echo ("PB.19"==$Seat)?"active":((in_array("PB.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PB.20"==$Seat)?"active":((in_array("PB.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PB.21"==$Seat)?"active":((in_array("PB.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PB.22"==$Seat)?"active":((in_array("PB.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PB.23"==$Seat)?"active":((in_array("PB.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("PB.24"==$Seat)?"active":((in_array("PB.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PB.25"==$Seat)?"active":((in_array("PB.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PB.26"==$Seat)?"active":((in_array("PB.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PB.27"==$Seat)?"active":((in_array("PB.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PB.28"==$Seat)?"active":((in_array("PB.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PB.29"==$Seat)?"active":((in_array("PB.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PB.30"==$Seat)?"active":((in_array("PB.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PB</td>
							<td class = "<?PHP echo ("PB.31"==$Seat)?"active":((in_array("PB.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PB.32"==$Seat)?"active":((in_array("PB.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PB.33"==$Seat)?"active":((in_array("PB.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PB.34"==$Seat)?"active":((in_array("PB.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PB.35"==$Seat)?"active":((in_array("PB.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("PB.36"==$Seat)?"active":((in_array("PB.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PB.37"==$Seat)?"active":((in_array("PB.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PB.38"==$Seat)?"active":((in_array("PB.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PB.39"==$Seat)?"active":((in_array("PB.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PB.40"==$Seat)?"active":((in_array("PB.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PB.41"==$Seat)?"active":((in_array("PB.41", $occupied_array))?"occupied":""); ?>">41</td>
						</tr>
						
						<tr>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("PC.01"==$Seat)?"active":((in_array("PC.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PC.02"==$Seat)?"active":((in_array("PC.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PC.03"==$Seat)?"active":((in_array("PC.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PC.04"==$Seat)?"active":((in_array("PC.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PC.05"==$Seat)?"active":((in_array("PC.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PC.06"==$Seat)?"active":((in_array("PC.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PC</td>
							<td class = "<?PHP echo ("PC.07"==$Seat)?"active":((in_array("PC.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PC.08"==$Seat)?"active":((in_array("PC.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PC.09"==$Seat)?"active":((in_array("PC.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PC.10"==$Seat)?"active":((in_array("PC.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PC.11"==$Seat)?"active":((in_array("PC.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td class = "<?PHP echo ("PC.12"==$Seat)?"active":((in_array("PC.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PC.13"==$Seat)?"active":((in_array("PC.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PC.14"==$Seat)?"active":((in_array("PC.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PC.15"==$Seat)?"active":((in_array("PC.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PC.16"==$Seat)?"active":((in_array("PC.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PC.17"==$Seat)?"active":((in_array("PC.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PC.18"==$Seat)?"active":((in_array("PC.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PC</td>
							<td class = "<?PHP echo ("PC.19"==$Seat)?"active":((in_array("PC.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PC.20"==$Seat)?"active":((in_array("PC.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PC.21"==$Seat)?"active":((in_array("PC.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PC.22"==$Seat)?"active":((in_array("PC.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PC.23"==$Seat)?"active":((in_array("PC.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("PC.24"==$Seat)?"active":((in_array("PC.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PC.25"==$Seat)?"active":((in_array("PC.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PC.26"==$Seat)?"active":((in_array("PC.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PC.27"==$Seat)?"active":((in_array("PC.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PC.28"==$Seat)?"active":((in_array("PC.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PC.29"==$Seat)?"active":((in_array("PC.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PC.30"==$Seat)?"active":((in_array("PC.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PC</td>
							<td class = "<?PHP echo ("PC.31"==$Seat)?"active":((in_array("PC.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PC.32"==$Seat)?"active":((in_array("PC.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PC.33"==$Seat)?"active":((in_array("PC.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PC.34"==$Seat)?"active":((in_array("PC.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PC.35"==$Seat)?"active":((in_array("PC.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("PC.36"==$Seat)?"active":((in_array("PC.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PC.37"==$Seat)?"active":((in_array("PC.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PC.38"==$Seat)?"active":((in_array("PC.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PC.39"==$Seat)?"active":((in_array("PC.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PC.40"==$Seat)?"active":((in_array("PC.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PC.41"==$Seat)?"active":((in_array("PC.41", $occupied_array))?"occupied":""); ?>">41</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PD.01"==$Seat)?"active":((in_array("PD.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PD.02"==$Seat)?"active":((in_array("PD.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PD.03"==$Seat)?"active":((in_array("PD.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PD.04"==$Seat)?"active":((in_array("PD.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PD.05"==$Seat)?"active":((in_array("PD.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PD.06"==$Seat)?"active":((in_array("PD.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PD.07"==$Seat)?"active":((in_array("PD.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PD.08"==$Seat)?"active":((in_array("PD.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PD.09"==$Seat)?"active":((in_array("PD.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PD.10"==$Seat)?"active":((in_array("PD.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PD.11"==$Seat)?"active":((in_array("PD.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PD</td>
							<td class = "<?PHP echo ("PD.12"==$Seat)?"active":((in_array("PD.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PD.13"==$Seat)?"active":((in_array("PD.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PD.14"==$Seat)?"active":((in_array("PD.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PD.15"==$Seat)?"active":((in_array("PD.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PD.16"==$Seat)?"active":((in_array("PD.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PD.17"==$Seat)?"active":((in_array("PD.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PD.18"==$Seat)?"active":((in_array("PD.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PD.19"==$Seat)?"active":((in_array("PD.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PD.20"==$Seat)?"active":((in_array("PD.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PD.21"==$Seat)?"active":((in_array("PD.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PD.22"==$Seat)?"active":((in_array("PD.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PD.23"==$Seat)?"active":((in_array("PD.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PD</td>
							<td class = "<?PHP echo ("PD.24"==$Seat)?"active":((in_array("PD.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PD.25"==$Seat)?"active":((in_array("PD.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PD.26"==$Seat)?"active":((in_array("PD.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PD.27"==$Seat)?"active":((in_array("PD.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PD.28"==$Seat)?"active":((in_array("PD.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PD.29"==$Seat)?"active":((in_array("PD.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PD.30"==$Seat)?"active":((in_array("PD.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PD.31"==$Seat)?"active":((in_array("PD.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PD.32"==$Seat)?"active":((in_array("PD.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PD.33"==$Seat)?"active":((in_array("PD.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PD.34"==$Seat)?"active":((in_array("PD.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PD.35"==$Seat)?"active":((in_array("PD.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PD</td>
							<td class = "<?PHP echo ("PD.36"==$Seat)?"active":((in_array("PD.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PD.37"==$Seat)?"active":((in_array("PD.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PD.38"==$Seat)?"active":((in_array("PD.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PD.39"==$Seat)?"active":((in_array("PD.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PD.40"==$Seat)?"active":((in_array("PD.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PD.41"==$Seat)?"active":((in_array("PD.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PD.42"==$Seat)?"active":((in_array("PD.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PD.43"==$Seat)?"active":((in_array("PD.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PD.44"==$Seat)?"active":((in_array("PD.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PD.45"==$Seat)?"active":((in_array("PD.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PD.46"==$Seat)?"active":((in_array("PD.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PE.01"==$Seat)?"active":((in_array("PE.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PE.02"==$Seat)?"active":((in_array("PE.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PE.03"==$Seat)?"active":((in_array("PE.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PE.04"==$Seat)?"active":((in_array("PE.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PE.05"==$Seat)?"active":((in_array("PE.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PE.06"==$Seat)?"active":((in_array("PE.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PE.07"==$Seat)?"active":((in_array("PE.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PE.08"==$Seat)?"active":((in_array("PE.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PE.09"==$Seat)?"active":((in_array("PE.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PE.10"==$Seat)?"active":((in_array("PE.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PE.11"==$Seat)?"active":((in_array("PE.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PE</td>
							<td class = "<?PHP echo ("PE.12"==$Seat)?"active":((in_array("PE.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PE.13"==$Seat)?"active":((in_array("PE.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PE.14"==$Seat)?"active":((in_array("PE.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PE.15"==$Seat)?"active":((in_array("PE.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PE.16"==$Seat)?"active":((in_array("PE.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PE.17"==$Seat)?"active":((in_array("PE.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PE.18"==$Seat)?"active":((in_array("PE.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PE.19"==$Seat)?"active":((in_array("PE.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PE.20"==$Seat)?"active":((in_array("PE.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PE.21"==$Seat)?"active":((in_array("PE.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PE.22"==$Seat)?"active":((in_array("PE.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PE.23"==$Seat)?"active":((in_array("PE.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PE</td>
							<td class = "<?PHP echo ("PE.24"==$Seat)?"active":((in_array("PE.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PE.25"==$Seat)?"active":((in_array("PE.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PE.26"==$Seat)?"active":((in_array("PE.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PE.27"==$Seat)?"active":((in_array("PE.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PE.28"==$Seat)?"active":((in_array("PE.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PE.29"==$Seat)?"active":((in_array("PE.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PE.30"==$Seat)?"active":((in_array("PE.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PE.31"==$Seat)?"active":((in_array("PE.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PE.32"==$Seat)?"active":((in_array("PE.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PE.33"==$Seat)?"active":((in_array("PE.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PE.34"==$Seat)?"active":((in_array("PE.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PE.35"==$Seat)?"active":((in_array("PE.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PE</td>
							<td class = "<?PHP echo ("PE.36"==$Seat)?"active":((in_array("PE.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PE.37"==$Seat)?"active":((in_array("PE.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PE.38"==$Seat)?"active":((in_array("PE.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PE.39"==$Seat)?"active":((in_array("PE.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PE.40"==$Seat)?"active":((in_array("PE.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PE.41"==$Seat)?"active":((in_array("PE.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PE.42"==$Seat)?"active":((in_array("PE.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PE.43"==$Seat)?"active":((in_array("PE.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PE.44"==$Seat)?"active":((in_array("PE.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PE.45"==$Seat)?"active":((in_array("PE.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PE.46"==$Seat)?"active":((in_array("PE.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PF.01"==$Seat)?"active":((in_array("PF.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PF.02"==$Seat)?"active":((in_array("PF.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PF.03"==$Seat)?"active":((in_array("PF.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PF.04"==$Seat)?"active":((in_array("PF.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PF.05"==$Seat)?"active":((in_array("PF.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PF.06"==$Seat)?"active":((in_array("PF.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PF.07"==$Seat)?"active":((in_array("PF.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PF.08"==$Seat)?"active":((in_array("PF.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PF.09"==$Seat)?"active":((in_array("PF.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PF.10"==$Seat)?"active":((in_array("PF.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PF.11"==$Seat)?"active":((in_array("PF.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PF</td>
							<td class = "<?PHP echo ("PF.12"==$Seat)?"active":((in_array("PF.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PF.13"==$Seat)?"active":((in_array("PF.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PF.14"==$Seat)?"active":((in_array("PF.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PF.15"==$Seat)?"active":((in_array("PF.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PF.16"==$Seat)?"active":((in_array("PF.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PF.17"==$Seat)?"active":((in_array("PF.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PF.18"==$Seat)?"active":((in_array("PF.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PF.19"==$Seat)?"active":((in_array("PF.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PF.20"==$Seat)?"active":((in_array("PF.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PF.21"==$Seat)?"active":((in_array("PF.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PF.22"==$Seat)?"active":((in_array("PF.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PF.23"==$Seat)?"active":((in_array("PF.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PF</td>
							<td class = "<?PHP echo ("PF.24"==$Seat)?"active":((in_array("PF.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PF.25"==$Seat)?"active":((in_array("PF.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PF.26"==$Seat)?"active":((in_array("PF.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PF.27"==$Seat)?"active":((in_array("PF.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PF.28"==$Seat)?"active":((in_array("PF.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PF.29"==$Seat)?"active":((in_array("PF.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PF.30"==$Seat)?"active":((in_array("PF.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PF.31"==$Seat)?"active":((in_array("PF.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PF.32"==$Seat)?"active":((in_array("PF.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PF.33"==$Seat)?"active":((in_array("PF.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PF.34"==$Seat)?"active":((in_array("PF.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PF.35"==$Seat)?"active":((in_array("PF.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PF</td>
							<td class = "<?PHP echo ("PF.36"==$Seat)?"active":((in_array("PF.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PF.37"==$Seat)?"active":((in_array("PF.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PF.38"==$Seat)?"active":((in_array("PF.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PF.39"==$Seat)?"active":((in_array("PF.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PF.40"==$Seat)?"active":((in_array("PF.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PF.41"==$Seat)?"active":((in_array("PF.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PF.42"==$Seat)?"active":((in_array("PF.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PF.43"==$Seat)?"active":((in_array("PF.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PF.44"==$Seat)?"active":((in_array("PF.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PF.45"==$Seat)?"active":((in_array("PF.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PF.46"==$Seat)?"active":((in_array("PF.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PG.01"==$Seat)?"active":((in_array("PG.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PG.02"==$Seat)?"active":((in_array("PG.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PG.03"==$Seat)?"active":((in_array("PG.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PG.04"==$Seat)?"active":((in_array("PG.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PG.05"==$Seat)?"active":((in_array("PG.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PG.06"==$Seat)?"active":((in_array("PG.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PG.07"==$Seat)?"active":((in_array("PG.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PG.08"==$Seat)?"active":((in_array("PG.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PG.09"==$Seat)?"active":((in_array("PG.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PG.10"==$Seat)?"active":((in_array("PG.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PG.11"==$Seat)?"active":((in_array("PG.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PG</td>
							<td class = "<?PHP echo ("PG.12"==$Seat)?"active":((in_array("PG.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PG.13"==$Seat)?"active":((in_array("PG.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PG.14"==$Seat)?"active":((in_array("PG.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PG.15"==$Seat)?"active":((in_array("PG.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PG.16"==$Seat)?"active":((in_array("PG.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PG.17"==$Seat)?"active":((in_array("PG.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PG.18"==$Seat)?"active":((in_array("PG.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PG.19"==$Seat)?"active":((in_array("PG.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PG.20"==$Seat)?"active":((in_array("PG.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PG.21"==$Seat)?"active":((in_array("PG.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PG.22"==$Seat)?"active":((in_array("PG.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PG.23"==$Seat)?"active":((in_array("PG.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PG</td>
							<td class = "<?PHP echo ("PG.24"==$Seat)?"active":((in_array("PG.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PG.25"==$Seat)?"active":((in_array("PG.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PG.26"==$Seat)?"active":((in_array("PG.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PG.27"==$Seat)?"active":((in_array("PG.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PG.28"==$Seat)?"active":((in_array("PG.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PG.29"==$Seat)?"active":((in_array("PG.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PG.30"==$Seat)?"active":((in_array("PG.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PG.31"==$Seat)?"active":((in_array("PG.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PG.32"==$Seat)?"active":((in_array("PG.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PG.33"==$Seat)?"active":((in_array("PG.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PG.34"==$Seat)?"active":((in_array("PG.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PG.35"==$Seat)?"active":((in_array("PG.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PG</td>
							<td class = "<?PHP echo ("PG.36"==$Seat)?"active":((in_array("PG.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PG.37"==$Seat)?"active":((in_array("PG.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PG.38"==$Seat)?"active":((in_array("PG.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PG.39"==$Seat)?"active":((in_array("PG.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PG.40"==$Seat)?"active":((in_array("PG.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PG.41"==$Seat)?"active":((in_array("PG.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PG.42"==$Seat)?"active":((in_array("PG.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PG.43"==$Seat)?"active":((in_array("PG.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PG.44"==$Seat)?"active":((in_array("PG.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PG.45"==$Seat)?"active":((in_array("PG.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PG.46"==$Seat)?"active":((in_array("PG.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PH.01"==$Seat)?"active":((in_array("PH.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PH.02"==$Seat)?"active":((in_array("PH.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PH.03"==$Seat)?"active":((in_array("PH.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PH.04"==$Seat)?"active":((in_array("PH.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PH.05"==$Seat)?"active":((in_array("PH.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PH.06"==$Seat)?"active":((in_array("PH.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PH.07"==$Seat)?"active":((in_array("PH.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PH.08"==$Seat)?"active":((in_array("PH.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PH.09"==$Seat)?"active":((in_array("PH.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PH.10"==$Seat)?"active":((in_array("PH.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PH.11"==$Seat)?"active":((in_array("PH.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PH</td>
							<td class = "<?PHP echo ("PH.12"==$Seat)?"active":((in_array("PH.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PH.13"==$Seat)?"active":((in_array("PH.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PH.14"==$Seat)?"active":((in_array("PH.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PH.15"==$Seat)?"active":((in_array("PH.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PH.16"==$Seat)?"active":((in_array("PH.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PH.17"==$Seat)?"active":((in_array("PH.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PH.18"==$Seat)?"active":((in_array("PH.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PH.19"==$Seat)?"active":((in_array("PH.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PH.20"==$Seat)?"active":((in_array("PH.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PH.21"==$Seat)?"active":((in_array("PH.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PH.22"==$Seat)?"active":((in_array("PH.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PH.23"==$Seat)?"active":((in_array("PH.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PH</td>
							<td class = "<?PHP echo ("PH.24"==$Seat)?"active":((in_array("PH.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PH.25"==$Seat)?"active":((in_array("PH.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PH.26"==$Seat)?"active":((in_array("PH.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PH.27"==$Seat)?"active":((in_array("PH.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PH.28"==$Seat)?"active":((in_array("PH.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PH.29"==$Seat)?"active":((in_array("PH.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PH.30"==$Seat)?"active":((in_array("PH.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PH.31"==$Seat)?"active":((in_array("PH.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PH.32"==$Seat)?"active":((in_array("PH.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PH.33"==$Seat)?"active":((in_array("PH.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PH.34"==$Seat)?"active":((in_array("PH.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PH.35"==$Seat)?"active":((in_array("PH.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PH</td>
							<td class = "<?PHP echo ("PH.36"==$Seat)?"active":((in_array("PH.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PH.37"==$Seat)?"active":((in_array("PH.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PH.38"==$Seat)?"active":((in_array("PH.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PH.39"==$Seat)?"active":((in_array("PH.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PH.40"==$Seat)?"active":((in_array("PH.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PH.41"==$Seat)?"active":((in_array("PH.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PH.42"==$Seat)?"active":((in_array("PH.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PH.43"==$Seat)?"active":((in_array("PH.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PH.44"==$Seat)?"active":((in_array("PH.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PH.45"==$Seat)?"active":((in_array("PH.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PH.46"==$Seat)?"active":((in_array("PH.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("PI.01"==$Seat)?"active":((in_array("PI.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PI.02"==$Seat)?"active":((in_array("PI.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PI.03"==$Seat)?"active":((in_array("PI.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PI.04"==$Seat)?"active":((in_array("PI.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PI.05"==$Seat)?"active":((in_array("PI.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PI.06"==$Seat)?"active":((in_array("PI.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PI.07"==$Seat)?"active":((in_array("PI.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PI.08"==$Seat)?"active":((in_array("PI.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PI.09"==$Seat)?"active":((in_array("PI.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PI.10"==$Seat)?"active":((in_array("PI.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("PI.11"==$Seat)?"active":((in_array("PI.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PI</td>
							<td class = "<?PHP echo ("PI.12"==$Seat)?"active":((in_array("PI.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PI.13"==$Seat)?"active":((in_array("PI.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PI.14"==$Seat)?"active":((in_array("PI.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PI.15"==$Seat)?"active":((in_array("PI.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PI.16"==$Seat)?"active":((in_array("PI.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PI.17"==$Seat)?"active":((in_array("PI.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PI.18"==$Seat)?"active":((in_array("PI.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PI.19"==$Seat)?"active":((in_array("PI.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PI.20"==$Seat)?"active":((in_array("PI.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("PI.21"==$Seat)?"active":((in_array("PI.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("PI.22"==$Seat)?"active":((in_array("PI.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("PI.23"==$Seat)?"active":((in_array("PI.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PI</td>
							<td class = "<?PHP echo ("PI.24"==$Seat)?"active":((in_array("PI.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("PI.25"==$Seat)?"active":((in_array("PI.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("PI.26"==$Seat)?"active":((in_array("PI.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("PI.27"==$Seat)?"active":((in_array("PI.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("PI.28"==$Seat)?"active":((in_array("PI.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("PI.29"==$Seat)?"active":((in_array("PI.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("PI.30"==$Seat)?"active":((in_array("PI.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("PI.31"==$Seat)?"active":((in_array("PI.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("PI.32"==$Seat)?"active":((in_array("PI.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("PI.33"==$Seat)?"active":((in_array("PI.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("PI.34"==$Seat)?"active":((in_array("PI.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("PI.35"==$Seat)?"active":((in_array("PI.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PI</td>
							<td class = "<?PHP echo ("PI.36"==$Seat)?"active":((in_array("PI.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("PI.37"==$Seat)?"active":((in_array("PI.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("PI.38"==$Seat)?"active":((in_array("PI.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("PI.39"==$Seat)?"active":((in_array("PI.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("PI.40"==$Seat)?"active":((in_array("PI.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("PI.41"==$Seat)?"active":((in_array("PI.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("PI.42"==$Seat)?"active":((in_array("PI.42", $occupied_array))?"occupied":""); ?>">42</td>
							<td class = "<?PHP echo ("PI.43"==$Seat)?"active":((in_array("PI.43", $occupied_array))?"occupied":""); ?>">43</td>
							<td class = "<?PHP echo ("PI.44"==$Seat)?"active":((in_array("PI.44", $occupied_array))?"occupied":""); ?>">44</td>
							<td class = "<?PHP echo ("PI.45"==$Seat)?"active":((in_array("PI.45", $occupied_array))?"occupied":""); ?>">45</td>
							<td class = "<?PHP echo ("PI.46"==$Seat)?"active":((in_array("PI.46", $occupied_array))?"occupied":""); ?>">46</td>
						</tr>
						
						<tr>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PJ</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("PJ.01"==$Seat)?"active":((in_array("PJ.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("PJ.02"==$Seat)?"active":((in_array("PJ.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("PJ.03"==$Seat)?"active":((in_array("PJ.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("PJ.04"==$Seat)?"active":((in_array("PJ.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("PJ.05"==$Seat)?"active":((in_array("PJ.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("PJ.06"==$Seat)?"active":((in_array("PJ.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("PJ.07"==$Seat)?"active":((in_array("PJ.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("PJ.08"==$Seat)?"active":((in_array("PJ.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("PJ.09"==$Seat)?"active":((in_array("PJ.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("PJ.10"==$Seat)?"active":((in_array("PJ.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PJ</td>
							<td class = "<?PHP echo ("PJ.11"==$Seat)?"active":((in_array("PJ.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td class = "<?PHP echo ("PJ.12"==$Seat)?"active":((in_array("PJ.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("PJ.13"==$Seat)?"active":((in_array("PJ.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("PJ.14"==$Seat)?"active":((in_array("PJ.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("PJ.15"==$Seat)?"active":((in_array("PJ.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("PJ.16"==$Seat)?"active":((in_array("PJ.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("PJ.17"==$Seat)?"active":((in_array("PJ.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("PJ.18"==$Seat)?"active":((in_array("PJ.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("PJ.19"==$Seat)?"active":((in_array("PJ.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("PJ.20"==$Seat)?"active":((in_array("PJ.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">PJ</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
						</tr>
						
						<tr>
							<td colspan = '49' style = "background-color:<?PHP echo $titanium_bg_color; ?>;">TITANIUM</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TA.01"==$Seat)?"active":((in_array("TA.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TA.02"==$Seat)?"active":((in_array("TA.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TA.03"==$Seat)?"active":((in_array("TA.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TA.04"==$Seat)?"active":((in_array("TA.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TA.05"==$Seat)?"active":((in_array("TA.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TA.06"==$Seat)?"active":((in_array("TA.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TA.07"==$Seat)?"active":((in_array("TA.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TA.08"==$Seat)?"active":((in_array("TA.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TA.09"==$Seat)?"active":((in_array("TA.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TA.10"==$Seat)?"active":((in_array("TA.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TA.11"==$Seat)?"active":((in_array("TA.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TA</td>
							<td class = "<?PHP echo ("TA.12"==$Seat)?"active":((in_array("TA.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TA.13"==$Seat)?"active":((in_array("TA.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TA.14"==$Seat)?"active":((in_array("TA.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TA.15"==$Seat)?"active":((in_array("TA.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TA.16"==$Seat)?"active":((in_array("TA.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TA.17"==$Seat)?"active":((in_array("TA.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TA.18"==$Seat)?"active":((in_array("TA.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TA.19"==$Seat)?"active":((in_array("TA.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TA.20"==$Seat)?"active":((in_array("TA.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TA.21"==$Seat)?"active":((in_array("TA.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TA</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TA.22"==$Seat)?"active":((in_array("TA.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TA.23"==$Seat)?"active":((in_array("TA.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TA.24"==$Seat)?"active":((in_array("TA.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TA.25"==$Seat)?"active":((in_array("TA.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TA.26"==$Seat)?"active":((in_array("TA.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TA.27"==$Seat)?"active":((in_array("TA.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TA.28"==$Seat)?"active":((in_array("TA.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TA.29"==$Seat)?"active":((in_array("TA.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TA.30"==$Seat)?"active":((in_array("TA.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TA.31"==$Seat)?"active":((in_array("TA.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TA</td>
							<td class = "<?PHP echo ("TA.32"==$Seat)?"active":((in_array("TA.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TA.33"==$Seat)?"active":((in_array("TA.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TA.34"==$Seat)?"active":((in_array("TA.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TA.35"==$Seat)?"active":((in_array("TA.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TA.36"==$Seat)?"active":((in_array("TA.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TA.37"==$Seat)?"active":((in_array("TA.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TA.38"==$Seat)?"active":((in_array("TA.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TA.39"==$Seat)?"active":((in_array("TA.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TA.40"==$Seat)?"active":((in_array("TA.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TA.41"==$Seat)?"active":((in_array("TA.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TA.42"==$Seat)?"active":((in_array("TA.42", $occupied_array))?"occupied":""); ?>">42</td>
							
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TB.01"==$Seat)?"active":((in_array("TB.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TB.02"==$Seat)?"active":((in_array("TB.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TB.03"==$Seat)?"active":((in_array("TB.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TB.04"==$Seat)?"active":((in_array("TB.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TB.05"==$Seat)?"active":((in_array("TB.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TB.06"==$Seat)?"active":((in_array("TB.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TB.07"==$Seat)?"active":((in_array("TB.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TB.08"==$Seat)?"active":((in_array("TB.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TB.09"==$Seat)?"active":((in_array("TB.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TB.10"==$Seat)?"active":((in_array("TB.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TB.11"==$Seat)?"active":((in_array("TB.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TB</td>
							<td class = "<?PHP echo ("TB.12"==$Seat)?"active":((in_array("TB.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TB.13"==$Seat)?"active":((in_array("TB.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TB.14"==$Seat)?"active":((in_array("TB.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TB.15"==$Seat)?"active":((in_array("TB.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TB.16"==$Seat)?"active":((in_array("TB.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TB.17"==$Seat)?"active":((in_array("TB.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TB.18"==$Seat)?"active":((in_array("TB.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TB.19"==$Seat)?"active":((in_array("TB.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TB.20"==$Seat)?"active":((in_array("TB.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TB.21"==$Seat)?"active":((in_array("TB.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TB</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TB.22"==$Seat)?"active":((in_array("TB.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TB.23"==$Seat)?"active":((in_array("TB.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TB.24"==$Seat)?"active":((in_array("TB.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TB.25"==$Seat)?"active":((in_array("TB.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TB.26"==$Seat)?"active":((in_array("TB.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TB.27"==$Seat)?"active":((in_array("TB.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TB.28"==$Seat)?"active":((in_array("TB.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TB.29"==$Seat)?"active":((in_array("TB.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TB.30"==$Seat)?"active":((in_array("TB.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TB.31"==$Seat)?"active":((in_array("TB.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TB</td>
							<td class = "<?PHP echo ("TB.32"==$Seat)?"active":((in_array("TB.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TB.33"==$Seat)?"active":((in_array("TB.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TB.34"==$Seat)?"active":((in_array("TB.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TB.35"==$Seat)?"active":((in_array("TB.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TB.36"==$Seat)?"active":((in_array("TB.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TB.37"==$Seat)?"active":((in_array("TB.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TB.38"==$Seat)?"active":((in_array("TB.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TB.39"==$Seat)?"active":((in_array("TB.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TB.40"==$Seat)?"active":((in_array("TB.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TB.41"==$Seat)?"active":((in_array("TB.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TB.42"==$Seat)?"active":((in_array("TB.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TC.01"==$Seat)?"active":((in_array("TC.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TC.02"==$Seat)?"active":((in_array("TC.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TC.03"==$Seat)?"active":((in_array("TC.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TC.04"==$Seat)?"active":((in_array("TC.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TC.05"==$Seat)?"active":((in_array("TC.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TC.06"==$Seat)?"active":((in_array("TC.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TC.07"==$Seat)?"active":((in_array("TC.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TC.08"==$Seat)?"active":((in_array("TC.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TC.09"==$Seat)?"active":((in_array("TC.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TC.10"==$Seat)?"active":((in_array("TC.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TC.11"==$Seat)?"active":((in_array("TC.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TC</td>
							<td class = "<?PHP echo ("TC.12"==$Seat)?"active":((in_array("TC.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TC.13"==$Seat)?"active":((in_array("TC.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TC.14"==$Seat)?"active":((in_array("TC.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TC.15"==$Seat)?"active":((in_array("TC.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TC.16"==$Seat)?"active":((in_array("TC.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TC.17"==$Seat)?"active":((in_array("TC.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TC.18"==$Seat)?"active":((in_array("TC.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TC.19"==$Seat)?"active":((in_array("TC.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TC.20"==$Seat)?"active":((in_array("TC.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TC.21"==$Seat)?"active":((in_array("TC.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TC</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TC.22"==$Seat)?"active":((in_array("TC.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TC.23"==$Seat)?"active":((in_array("TC.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TC.24"==$Seat)?"active":((in_array("TC.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TC.25"==$Seat)?"active":((in_array("TC.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TC.26"==$Seat)?"active":((in_array("TC.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TC.27"==$Seat)?"active":((in_array("TC.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TC.28"==$Seat)?"active":((in_array("TC.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TC.29"==$Seat)?"active":((in_array("TC.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TC.30"==$Seat)?"active":((in_array("TC.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TC.31"==$Seat)?"active":((in_array("TC.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TC</td>
							<td class = "<?PHP echo ("TC.32"==$Seat)?"active":((in_array("TC.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TC.33"==$Seat)?"active":((in_array("TC.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TC.34"==$Seat)?"active":((in_array("TC.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TC.35"==$Seat)?"active":((in_array("TC.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TC.36"==$Seat)?"active":((in_array("TC.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TC.37"==$Seat)?"active":((in_array("TC.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TC.38"==$Seat)?"active":((in_array("TC.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TC.39"==$Seat)?"active":((in_array("TC.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TC.40"==$Seat)?"active":((in_array("TC.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TC.41"==$Seat)?"active":((in_array("TC.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TC.42"==$Seat)?"active":((in_array("TC.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TD.01"==$Seat)?"active":((in_array("TD.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TD.02"==$Seat)?"active":((in_array("TD.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TD.03"==$Seat)?"active":((in_array("TD.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TD.04"==$Seat)?"active":((in_array("TD.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TD.05"==$Seat)?"active":((in_array("TD.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TD.06"==$Seat)?"active":((in_array("TD.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TD.07"==$Seat)?"active":((in_array("TD.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TD.08"==$Seat)?"active":((in_array("TD.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TD.09"==$Seat)?"active":((in_array("TD.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TD.10"==$Seat)?"active":((in_array("TD.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TD.11"==$Seat)?"active":((in_array("TD.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TD</td>
							<td class = "<?PHP echo ("TD.12"==$Seat)?"active":((in_array("TD.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TD.13"==$Seat)?"active":((in_array("TD.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TD.14"==$Seat)?"active":((in_array("TD.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TD.15"==$Seat)?"active":((in_array("TD.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TD.16"==$Seat)?"active":((in_array("TD.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TD.17"==$Seat)?"active":((in_array("TD.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TD.18"==$Seat)?"active":((in_array("TD.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TD.19"==$Seat)?"active":((in_array("TD.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TD.20"==$Seat)?"active":((in_array("TD.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TD.21"==$Seat)?"active":((in_array("TD.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TD</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TD.22"==$Seat)?"active":((in_array("TD.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TD.23"==$Seat)?"active":((in_array("TD.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TD.24"==$Seat)?"active":((in_array("TD.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TD.25"==$Seat)?"active":((in_array("TD.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TD.26"==$Seat)?"active":((in_array("TD.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TD.27"==$Seat)?"active":((in_array("TD.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TD.28"==$Seat)?"active":((in_array("TD.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TD.29"==$Seat)?"active":((in_array("TD.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TD.30"==$Seat)?"active":((in_array("TD.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TD.31"==$Seat)?"active":((in_array("TD.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TD</td>
							<td class = "<?PHP echo ("TD.32"==$Seat)?"active":((in_array("TD.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TD.33"==$Seat)?"active":((in_array("TD.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TD.34"==$Seat)?"active":((in_array("TD.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TD.35"==$Seat)?"active":((in_array("TD.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TD.36"==$Seat)?"active":((in_array("TD.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TD.37"==$Seat)?"active":((in_array("TD.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TD.38"==$Seat)?"active":((in_array("TD.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TD.39"==$Seat)?"active":((in_array("TD.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TD.40"==$Seat)?"active":((in_array("TD.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TD.41"==$Seat)?"active":((in_array("TD.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TD.42"==$Seat)?"active":((in_array("TD.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TE.01"==$Seat)?"active":((in_array("TE.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TE.02"==$Seat)?"active":((in_array("TE.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TE.03"==$Seat)?"active":((in_array("TE.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TE.04"==$Seat)?"active":((in_array("TE.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TE.05"==$Seat)?"active":((in_array("TE.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TE.06"==$Seat)?"active":((in_array("TE.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TE.07"==$Seat)?"active":((in_array("TE.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TE.08"==$Seat)?"active":((in_array("TE.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TE.09"==$Seat)?"active":((in_array("TE.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TE.10"==$Seat)?"active":((in_array("TE.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TE.11"==$Seat)?"active":((in_array("TE.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TE</td>
							<td class = "<?PHP echo ("TE.12"==$Seat)?"active":((in_array("TE.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TE.13"==$Seat)?"active":((in_array("TE.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TE.14"==$Seat)?"active":((in_array("TE.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TE.15"==$Seat)?"active":((in_array("TE.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TE.16"==$Seat)?"active":((in_array("TE.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TE.17"==$Seat)?"active":((in_array("TE.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TE.18"==$Seat)?"active":((in_array("TE.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TE.19"==$Seat)?"active":((in_array("TE.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TE.20"==$Seat)?"active":((in_array("TE.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TE.21"==$Seat)?"active":((in_array("TE.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TE</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TE.22"==$Seat)?"active":((in_array("TE.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TE.23"==$Seat)?"active":((in_array("TE.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TE.24"==$Seat)?"active":((in_array("TE.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TE.25"==$Seat)?"active":((in_array("TE.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TE.26"==$Seat)?"active":((in_array("TE.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TE.27"==$Seat)?"active":((in_array("TE.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TE.28"==$Seat)?"active":((in_array("TE.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TE.29"==$Seat)?"active":((in_array("TE.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TE.30"==$Seat)?"active":((in_array("TE.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TE.31"==$Seat)?"active":((in_array("TE.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TE</td>
							<td class = "<?PHP echo ("TE.32"==$Seat)?"active":((in_array("TE.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TE.33"==$Seat)?"active":((in_array("TE.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TE.34"==$Seat)?"active":((in_array("TE.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TE.35"==$Seat)?"active":((in_array("TE.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TE.36"==$Seat)?"active":((in_array("TE.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TE.37"==$Seat)?"active":((in_array("TE.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TE.38"==$Seat)?"active":((in_array("TE.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TE.39"==$Seat)?"active":((in_array("TE.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TE.40"==$Seat)?"active":((in_array("TE.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TE.41"==$Seat)?"active":((in_array("TE.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TE.42"==$Seat)?"active":((in_array("TE.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TF.01"==$Seat)?"active":((in_array("TF.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TF.02"==$Seat)?"active":((in_array("TF.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TF.03"==$Seat)?"active":((in_array("TF.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TF.04"==$Seat)?"active":((in_array("TF.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TF.05"==$Seat)?"active":((in_array("TF.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TF.06"==$Seat)?"active":((in_array("TF.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TF.07"==$Seat)?"active":((in_array("TF.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TF.08"==$Seat)?"active":((in_array("TF.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TF.09"==$Seat)?"active":((in_array("TF.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TF.10"==$Seat)?"active":((in_array("TF.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TF.11"==$Seat)?"active":((in_array("TF.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TF</td>
							<td class = "<?PHP echo ("TF.12"==$Seat)?"active":((in_array("TF.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TF.13"==$Seat)?"active":((in_array("TF.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TF.14"==$Seat)?"active":((in_array("TF.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TF.15"==$Seat)?"active":((in_array("TF.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TF.16"==$Seat)?"active":((in_array("TF.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TF.17"==$Seat)?"active":((in_array("TF.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TF.18"==$Seat)?"active":((in_array("TF.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TF.19"==$Seat)?"active":((in_array("TF.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TF.20"==$Seat)?"active":((in_array("TF.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TF.21"==$Seat)?"active":((in_array("TF.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TF</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TF.22"==$Seat)?"active":((in_array("TF.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TF.23"==$Seat)?"active":((in_array("TF.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TF.24"==$Seat)?"active":((in_array("TF.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TF.25"==$Seat)?"active":((in_array("TF.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TF.26"==$Seat)?"active":((in_array("TF.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TF.27"==$Seat)?"active":((in_array("TF.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TF.28"==$Seat)?"active":((in_array("TF.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TF.29"==$Seat)?"active":((in_array("TF.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TF.30"==$Seat)?"active":((in_array("TF.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TF.31"==$Seat)?"active":((in_array("TF.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TF</td>
							<td class = "<?PHP echo ("TF.32"==$Seat)?"active":((in_array("TF.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TF.33"==$Seat)?"active":((in_array("TF.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TF.34"==$Seat)?"active":((in_array("TF.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TF.35"==$Seat)?"active":((in_array("TF.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TF.36"==$Seat)?"active":((in_array("TF.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TF.37"==$Seat)?"active":((in_array("TF.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TF.38"==$Seat)?"active":((in_array("TF.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TF.39"==$Seat)?"active":((in_array("TF.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TF.40"==$Seat)?"active":((in_array("TF.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TF.41"==$Seat)?"active":((in_array("TF.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TF.42"==$Seat)?"active":((in_array("TF.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TG.01"==$Seat)?"active":((in_array("TG.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TG.02"==$Seat)?"active":((in_array("TG.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TG.03"==$Seat)?"active":((in_array("TG.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TG.04"==$Seat)?"active":((in_array("TG.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TG.05"==$Seat)?"active":((in_array("TG.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TG.06"==$Seat)?"active":((in_array("TG.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TG.07"==$Seat)?"active":((in_array("TG.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TG.08"==$Seat)?"active":((in_array("TG.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TG.09"==$Seat)?"active":((in_array("TG.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TG.10"==$Seat)?"active":((in_array("TG.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TG.11"==$Seat)?"active":((in_array("TG.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TG</td>
							<td class = "<?PHP echo ("TG.12"==$Seat)?"active":((in_array("TG.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TG.13"==$Seat)?"active":((in_array("TG.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TG.14"==$Seat)?"active":((in_array("TG.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TG.15"==$Seat)?"active":((in_array("TG.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TG.16"==$Seat)?"active":((in_array("TG.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TG.17"==$Seat)?"active":((in_array("TG.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TG.18"==$Seat)?"active":((in_array("TG.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TG.19"==$Seat)?"active":((in_array("TG.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TG.20"==$Seat)?"active":((in_array("TG.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TG.21"==$Seat)?"active":((in_array("TG.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TG</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TG.22"==$Seat)?"active":((in_array("TG.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TG.23"==$Seat)?"active":((in_array("TG.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TG.24"==$Seat)?"active":((in_array("TG.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TG.25"==$Seat)?"active":((in_array("TG.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TG.26"==$Seat)?"active":((in_array("TG.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TG.27"==$Seat)?"active":((in_array("TG.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TG.28"==$Seat)?"active":((in_array("TG.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TG.29"==$Seat)?"active":((in_array("TG.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TG.30"==$Seat)?"active":((in_array("TG.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TG.31"==$Seat)?"active":((in_array("TG.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TG</td>
							<td class = "<?PHP echo ("TG.32"==$Seat)?"active":((in_array("TG.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TG.33"==$Seat)?"active":((in_array("TG.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TG.34"==$Seat)?"active":((in_array("TG.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TG.35"==$Seat)?"active":((in_array("TG.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TG.36"==$Seat)?"active":((in_array("TG.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TG.37"==$Seat)?"active":((in_array("TG.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TG.38"==$Seat)?"active":((in_array("TG.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TG.39"==$Seat)?"active":((in_array("TG.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TG.40"==$Seat)?"active":((in_array("TG.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TG.41"==$Seat)?"active":((in_array("TG.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TG.42"==$Seat)?"active":((in_array("TG.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TH.01"==$Seat)?"active":((in_array("TH.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TH.02"==$Seat)?"active":((in_array("TH.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TH.03"==$Seat)?"active":((in_array("TH.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TH.04"==$Seat)?"active":((in_array("TH.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TH.05"==$Seat)?"active":((in_array("TH.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TH.06"==$Seat)?"active":((in_array("TH.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TH.07"==$Seat)?"active":((in_array("TH.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TH.08"==$Seat)?"active":((in_array("TH.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TH.09"==$Seat)?"active":((in_array("TH.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TH.10"==$Seat)?"active":((in_array("TH.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TH.11"==$Seat)?"active":((in_array("TH.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TH</td>
							<td class = "<?PHP echo ("TH.12"==$Seat)?"active":((in_array("TH.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TH.13"==$Seat)?"active":((in_array("TH.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TH.14"==$Seat)?"active":((in_array("TH.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TH.15"==$Seat)?"active":((in_array("TH.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TH.16"==$Seat)?"active":((in_array("TH.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TH.17"==$Seat)?"active":((in_array("TH.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TH.18"==$Seat)?"active":((in_array("TH.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TH.19"==$Seat)?"active":((in_array("TH.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TH.20"==$Seat)?"active":((in_array("TH.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TH.21"==$Seat)?"active":((in_array("TH.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TH</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TH.22"==$Seat)?"active":((in_array("TH.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TH.23"==$Seat)?"active":((in_array("TH.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TH.24"==$Seat)?"active":((in_array("TH.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TH.25"==$Seat)?"active":((in_array("TH.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TH.26"==$Seat)?"active":((in_array("TH.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TH.27"==$Seat)?"active":((in_array("TH.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TH.28"==$Seat)?"active":((in_array("TH.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TH.29"==$Seat)?"active":((in_array("TH.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TH.30"==$Seat)?"active":((in_array("TH.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TH.31"==$Seat)?"active":((in_array("TH.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TH</td>
							<td class = "<?PHP echo ("TH.32"==$Seat)?"active":((in_array("TH.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TH.33"==$Seat)?"active":((in_array("TH.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TH.34"==$Seat)?"active":((in_array("TH.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TH.35"==$Seat)?"active":((in_array("TH.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TH.36"==$Seat)?"active":((in_array("TH.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TH.37"==$Seat)?"active":((in_array("TH.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TH.38"==$Seat)?"active":((in_array("TH.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TH.39"==$Seat)?"active":((in_array("TH.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TH.40"==$Seat)?"active":((in_array("TH.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TH.41"==$Seat)?"active":((in_array("TH.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TH.42"==$Seat)?"active":((in_array("TH.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TI.01"==$Seat)?"active":((in_array("TI.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TI.02"==$Seat)?"active":((in_array("TI.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TI.03"==$Seat)?"active":((in_array("TI.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TI.04"==$Seat)?"active":((in_array("TI.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TI.05"==$Seat)?"active":((in_array("TI.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TI.06"==$Seat)?"active":((in_array("TI.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TI.07"==$Seat)?"active":((in_array("TI.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TI.08"==$Seat)?"active":((in_array("TI.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TI.09"==$Seat)?"active":((in_array("TI.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TI.10"==$Seat)?"active":((in_array("TI.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TI.11"==$Seat)?"active":((in_array("TI.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TI</td>
							<td class = "<?PHP echo ("TI.12"==$Seat)?"active":((in_array("TI.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TI.13"==$Seat)?"active":((in_array("TI.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TI.14"==$Seat)?"active":((in_array("TI.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TI.15"==$Seat)?"active":((in_array("TI.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TI.16"==$Seat)?"active":((in_array("TI.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TI.17"==$Seat)?"active":((in_array("TI.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TI.18"==$Seat)?"active":((in_array("TI.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TI.19"==$Seat)?"active":((in_array("TI.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TI.20"==$Seat)?"active":((in_array("TI.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TI.21"==$Seat)?"active":((in_array("TI.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TI</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TI.22"==$Seat)?"active":((in_array("TI.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TI.23"==$Seat)?"active":((in_array("TI.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TI.24"==$Seat)?"active":((in_array("TI.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TI.25"==$Seat)?"active":((in_array("TI.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TI.26"==$Seat)?"active":((in_array("TI.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TI.27"==$Seat)?"active":((in_array("TI.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TI.28"==$Seat)?"active":((in_array("TI.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TI.29"==$Seat)?"active":((in_array("TI.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TI.30"==$Seat)?"active":((in_array("TI.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TI.31"==$Seat)?"active":((in_array("TI.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TI</td>
							<td class = "<?PHP echo ("TI.32"==$Seat)?"active":((in_array("TI.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TI.33"==$Seat)?"active":((in_array("TI.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TI.34"==$Seat)?"active":((in_array("TI.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TI.35"==$Seat)?"active":((in_array("TI.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TI.36"==$Seat)?"active":((in_array("TI.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TI.37"==$Seat)?"active":((in_array("TI.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TI.38"==$Seat)?"active":((in_array("TI.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TI.39"==$Seat)?"active":((in_array("TI.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TI.40"==$Seat)?"active":((in_array("TI.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TI.41"==$Seat)?"active":((in_array("TI.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TI.42"==$Seat)?"active":((in_array("TI.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TJ.01"==$Seat)?"active":((in_array("TJ.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TJ.02"==$Seat)?"active":((in_array("TJ.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TJ.03"==$Seat)?"active":((in_array("TJ.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TJ.04"==$Seat)?"active":((in_array("TJ.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TJ.05"==$Seat)?"active":((in_array("TJ.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TJ.06"==$Seat)?"active":((in_array("TJ.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TJ.07"==$Seat)?"active":((in_array("TJ.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TJ.08"==$Seat)?"active":((in_array("TJ.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TJ.09"==$Seat)?"active":((in_array("TJ.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TJ.10"==$Seat)?"active":((in_array("TJ.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TJ.11"==$Seat)?"active":((in_array("TJ.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TJ</td>
							<td class = "<?PHP echo ("TJ.12"==$Seat)?"active":((in_array("TJ.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TJ.13"==$Seat)?"active":((in_array("TJ.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TJ.14"==$Seat)?"active":((in_array("TJ.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TJ.15"==$Seat)?"active":((in_array("TJ.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TJ.16"==$Seat)?"active":((in_array("TJ.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TJ.17"==$Seat)?"active":((in_array("TJ.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TJ.18"==$Seat)?"active":((in_array("TJ.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TJ.19"==$Seat)?"active":((in_array("TJ.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TJ.20"==$Seat)?"active":((in_array("TJ.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TJ.21"==$Seat)?"active":((in_array("TJ.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TJ</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TJ.22"==$Seat)?"active":((in_array("TJ.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TJ.23"==$Seat)?"active":((in_array("TJ.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TJ.24"==$Seat)?"active":((in_array("TJ.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TJ.25"==$Seat)?"active":((in_array("TJ.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TJ.26"==$Seat)?"active":((in_array("TJ.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TJ.27"==$Seat)?"active":((in_array("TJ.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TJ.28"==$Seat)?"active":((in_array("TJ.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TJ.29"==$Seat)?"active":((in_array("TJ.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TJ.30"==$Seat)?"active":((in_array("TJ.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TJ.31"==$Seat)?"active":((in_array("TJ.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TJ</td>
							<td class = "<?PHP echo ("TJ.32"==$Seat)?"active":((in_array("TJ.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TJ.33"==$Seat)?"active":((in_array("TJ.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TJ.34"==$Seat)?"active":((in_array("TJ.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TJ.35"==$Seat)?"active":((in_array("TJ.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TJ.36"==$Seat)?"active":((in_array("TJ.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TJ.37"==$Seat)?"active":((in_array("TJ.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TJ.38"==$Seat)?"active":((in_array("TJ.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TJ.39"==$Seat)?"active":((in_array("TJ.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TJ.40"==$Seat)?"active":((in_array("TJ.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TJ.41"==$Seat)?"active":((in_array("TJ.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TJ.42"==$Seat)?"active":((in_array("TJ.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TK.01"==$Seat)?"active":((in_array("TK.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TK.02"==$Seat)?"active":((in_array("TK.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TK.03"==$Seat)?"active":((in_array("TK.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TK.04"==$Seat)?"active":((in_array("TK.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TK.05"==$Seat)?"active":((in_array("TK.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TK.06"==$Seat)?"active":((in_array("TK.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TK.07"==$Seat)?"active":((in_array("TK.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TK.08"==$Seat)?"active":((in_array("TK.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TK.09"==$Seat)?"active":((in_array("TK.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TK.10"==$Seat)?"active":((in_array("TK.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TK.11"==$Seat)?"active":((in_array("TK.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TK</td>
							<td class = "<?PHP echo ("TK.12"==$Seat)?"active":((in_array("TK.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TK.13"==$Seat)?"active":((in_array("TK.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TK.14"==$Seat)?"active":((in_array("TK.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TK.15"==$Seat)?"active":((in_array("TK.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TK.16"==$Seat)?"active":((in_array("TK.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TK.17"==$Seat)?"active":((in_array("TK.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TK.18"==$Seat)?"active":((in_array("TK.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TK.19"==$Seat)?"active":((in_array("TK.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TK.20"==$Seat)?"active":((in_array("TK.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TK.21"==$Seat)?"active":((in_array("TK.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TK</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TK.22"==$Seat)?"active":((in_array("TK.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TK.23"==$Seat)?"active":((in_array("TK.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TK.24"==$Seat)?"active":((in_array("TK.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TK.25"==$Seat)?"active":((in_array("TK.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TK.26"==$Seat)?"active":((in_array("TK.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TK.27"==$Seat)?"active":((in_array("TK.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TK.28"==$Seat)?"active":((in_array("TK.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TK.29"==$Seat)?"active":((in_array("TK.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TK.30"==$Seat)?"active":((in_array("TK.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TK.31"==$Seat)?"active":((in_array("TK.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TK</td>
							<td class = "<?PHP echo ("TK.32"==$Seat)?"active":((in_array("TK.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TK.33"==$Seat)?"active":((in_array("TK.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TK.34"==$Seat)?"active":((in_array("TK.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TK.35"==$Seat)?"active":((in_array("TK.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TK.36"==$Seat)?"active":((in_array("TK.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TK.37"==$Seat)?"active":((in_array("TK.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TK.38"==$Seat)?"active":((in_array("TK.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TK.39"==$Seat)?"active":((in_array("TK.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TK.40"==$Seat)?"active":((in_array("TK.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TK.41"==$Seat)?"active":((in_array("TK.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TK.42"==$Seat)?"active":((in_array("TK.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TL.01"==$Seat)?"active":((in_array("TL.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TL.02"==$Seat)?"active":((in_array("TL.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TL.03"==$Seat)?"active":((in_array("TL.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TL.04"==$Seat)?"active":((in_array("TL.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TL.05"==$Seat)?"active":((in_array("TL.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TL.06"==$Seat)?"active":((in_array("TL.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TL.07"==$Seat)?"active":((in_array("TL.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TL.08"==$Seat)?"active":((in_array("TL.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "<?PHP echo ("TL.09"==$Seat)?"active":((in_array("TL.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TL.10"==$Seat)?"active":((in_array("TL.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TL.11"==$Seat)?"active":((in_array("TL.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TL</td>
							<td class = "<?PHP echo ("TL.12"==$Seat)?"active":((in_array("TL.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TL.13"==$Seat)?"active":((in_array("TL.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TL.14"==$Seat)?"active":((in_array("TL.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TL.15"==$Seat)?"active":((in_array("TL.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TL.16"==$Seat)?"active":((in_array("TL.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TL.17"==$Seat)?"active":((in_array("TL.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TL.18"==$Seat)?"active":((in_array("TL.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "<?PHP echo ("TL.19"==$Seat)?"active":((in_array("TL.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TL.20"==$Seat)?"active":((in_array("TL.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TL.21"==$Seat)?"active":((in_array("TL.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TL</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TL.22"==$Seat)?"active":((in_array("TL.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TL.23"==$Seat)?"active":((in_array("TL.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TL.24"==$Seat)?"active":((in_array("TL.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TL.25"==$Seat)?"active":((in_array("TL.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TL.26"==$Seat)?"active":((in_array("TL.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TL.27"==$Seat)?"active":((in_array("TL.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TL.28"==$Seat)?"active":((in_array("TL.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td class = "<?PHP echo ("TL.29"==$Seat)?"active":((in_array("TL.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TL.30"==$Seat)?"active":((in_array("TL.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TL.31"==$Seat)?"active":((in_array("TL.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TL</td>
							<td class = "<?PHP echo ("TL.32"==$Seat)?"active":((in_array("TL.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TL.33"==$Seat)?"active":((in_array("TL.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TL.34"==$Seat)?"active":((in_array("TL.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TL.35"==$Seat)?"active":((in_array("TL.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TL.36"==$Seat)?"active":((in_array("TL.36", $occupied_array))?"occupied":""); ?>">36</td>
							<td class = "<?PHP echo ("TL.37"==$Seat)?"active":((in_array("TL.37", $occupied_array))?"occupied":""); ?>">37</td>
							<td class = "<?PHP echo ("TL.38"==$Seat)?"active":((in_array("TL.38", $occupied_array))?"occupied":""); ?>">38</td>
							<td class = "<?PHP echo ("TL.39"==$Seat)?"active":((in_array("TL.39", $occupied_array))?"occupied":""); ?>">39</td>
							<td class = "<?PHP echo ("TL.40"==$Seat)?"active":((in_array("TL.40", $occupied_array))?"occupied":""); ?>">40</td>
							<td class = "<?PHP echo ("TL.41"==$Seat)?"active":((in_array("TL.41", $occupied_array))?"occupied":""); ?>">41</td>
							<td class = "<?PHP echo ("TL.42"==$Seat)?"active":((in_array("TL.42", $occupied_array))?"occupied":""); ?>">42</td>
						</tr>
						
						<tr>
							<td class = "<?PHP echo ("TM.01"==$Seat)?"active":((in_array("TM.01", $occupied_array))?"occupied":""); ?>">1</td>
							<td class = "<?PHP echo ("TM.02"==$Seat)?"active":((in_array("TM.02", $occupied_array))?"occupied":""); ?>">2</td>
							<td class = "<?PHP echo ("TM.03"==$Seat)?"active":((in_array("TM.03", $occupied_array))?"occupied":""); ?>">3</td>
							<td class = "<?PHP echo ("TM.04"==$Seat)?"active":((in_array("TM.04", $occupied_array))?"occupied":""); ?>">4</td>
							<td class = "<?PHP echo ("TM.05"==$Seat)?"active":((in_array("TM.05", $occupied_array))?"occupied":""); ?>">5</td>
							<td class = "<?PHP echo ("TM.06"==$Seat)?"active":((in_array("TM.06", $occupied_array))?"occupied":""); ?>">6</td>
							<td class = "<?PHP echo ("TM.07"==$Seat)?"active":((in_array("TM.07", $occupied_array))?"occupied":""); ?>">7</td>
							<td class = "<?PHP echo ("TM.08"==$Seat)?"active":((in_array("TM.08", $occupied_array))?"occupied":""); ?>">8</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TM</td>
							<td class = "<?PHP echo ("TM.09"==$Seat)?"active":((in_array("TM.09", $occupied_array))?"occupied":""); ?>">9</td>
							<td class = "<?PHP echo ("TM.10"==$Seat)?"active":((in_array("TM.10", $occupied_array))?"occupied":""); ?>">10</td>
							<td class = "<?PHP echo ("TM.11"==$Seat)?"active":((in_array("TM.11", $occupied_array))?"occupied":""); ?>">11</td>
							<td class = "<?PHP echo ("TM.12"==$Seat)?"active":((in_array("TM.12", $occupied_array))?"occupied":""); ?>">12</td>
							<td class = "<?PHP echo ("TM.13"==$Seat)?"active":((in_array("TM.13", $occupied_array))?"occupied":""); ?>">13</td>
							<td class = "<?PHP echo ("TM.14"==$Seat)?"active":((in_array("TM.14", $occupied_array))?"occupied":""); ?>">14</td>
							<td class = "<?PHP echo ("TM.15"==$Seat)?"active":((in_array("TM.15", $occupied_array))?"occupied":""); ?>">15</td>
							<td class = "<?PHP echo ("TM.16"==$Seat)?"active":((in_array("TM.16", $occupied_array))?"occupied":""); ?>">16</td>
							<td class = "<?PHP echo ("TM.17"==$Seat)?"active":((in_array("TM.17", $occupied_array))?"occupied":""); ?>">17</td>
							<td class = "<?PHP echo ("TM.18"==$Seat)?"active":((in_array("TM.18", $occupied_array))?"occupied":""); ?>">18</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TM</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TM.19"==$Seat)?"active":((in_array("TM.19", $occupied_array))?"occupied":""); ?>">19</td>
							<td class = "<?PHP echo ("TM.20"==$Seat)?"active":((in_array("TM.20", $occupied_array))?"occupied":""); ?>">20</td>
							<td class = "<?PHP echo ("TM.21"==$Seat)?"active":((in_array("TM.21", $occupied_array))?"occupied":""); ?>">21</td>
							<td class = "<?PHP echo ("TM.22"==$Seat)?"active":((in_array("TM.22", $occupied_array))?"occupied":""); ?>">22</td>
							<td class = "<?PHP echo ("TM.23"==$Seat)?"active":((in_array("TM.23", $occupied_array))?"occupied":""); ?>">23</td>
							<td class = "<?PHP echo ("TM.24"==$Seat)?"active":((in_array("TM.24", $occupied_array))?"occupied":""); ?>">24</td>
							<td class = "<?PHP echo ("TM.25"==$Seat)?"active":((in_array("TM.25", $occupied_array))?"occupied":""); ?>">25</td>
							<td class = "<?PHP echo ("TM.26"==$Seat)?"active":((in_array("TM.26", $occupied_array))?"occupied":""); ?>">26</td>
							<td class = "<?PHP echo ("TM.27"==$Seat)?"active":((in_array("TM.27", $occupied_array))?"occupied":""); ?>">27</td>
							<td class = "<?PHP echo ("TM.28"==$Seat)?"active":((in_array("TM.28", $occupied_array))?"occupied":""); ?>">28</td>
							<td style = "background-color:<?PHP echo $platinum_bg_color; ?>;">TM</td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "blank"></td>
							<td class = "<?PHP echo ("TM.29"==$Seat)?"active":((in_array("TM.29", $occupied_array))?"occupied":""); ?>">29</td>
							<td class = "<?PHP echo ("TM.30"==$Seat)?"active":((in_array("TM.30", $occupied_array))?"occupied":""); ?>">30</td>
							<td class = "<?PHP echo ("TM.31"==$Seat)?"active":((in_array("TM.31", $occupied_array))?"occupied":""); ?>">31</td>
							<td class = "<?PHP echo ("TM.32"==$Seat)?"active":((in_array("TM.32", $occupied_array))?"occupied":""); ?>">32</td>
							<td class = "<?PHP echo ("TM.33"==$Seat)?"active":((in_array("TM.33", $occupied_array))?"occupied":""); ?>">33</td>
							<td class = "<?PHP echo ("TM.34"==$Seat)?"active":((in_array("TM.34", $occupied_array))?"occupied":""); ?>">34</td>
							<td class = "<?PHP echo ("TM.35"==$Seat)?"active":((in_array("TM.35", $occupied_array))?"occupied":""); ?>">35</td>
							<td class = "<?PHP echo ("TM.36"==$Seat)?"active":((in_array("TM.36", $occupied_array))?"occupied":""); ?>">36</td>
						</tr>
						
					</table>
				</div>
				
				
				
				
				
				
			</div>
		</div>		
	</body>
	 <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function () {
			
		});
	</script>
</html>
