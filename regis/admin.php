<?PHP error_reporting(0); ?>
<?php session_start(); ?>
<?php session_destroy(); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?PHP 
$background = "asset/img/bg_polos.png";

 
$sql = "SELECT * FROM tbuser ";
$query = mysql_query($sql);

$count_user = 0;
$sqlCount = "SELECT COUNT(*) AS CountRow FROM tbuser WHERE Register = 1 ";
$queryCount = mysql_query($sqlCount);
while($dataCount = mysql_fetch_array($queryCount)) {
	$count_user = $dataCount['CountRow'];
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
	
	<link rel="stylesheet" type="text/css" href="asset/css/jquery.dataTables.min.css">
	<style>
	@font-face{
		font-family: "Helvetica";
		src: url("font/Helvetica.ttf");
	}

	</style>
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
				
				<div style = "position:absolute; width:1440px; height:900px; margin-top:250px; margin-left:300px; background-color:transparent;">
				
					<table id="adminTable" class="display" cellspacing="0" width="100%" height="100%" style = "font-size:25px; text-align:center;">
						<thead>
							<tr>
								<th style = "text-align:left;">Name</th>
								<th>Seat</th>
								<th class = "dt-head-center">Register On</th>
								<th class = "dt-head-center">Register</th>
								<!--<th class = "dt-head-center">Action</th>-->
							</tr>
						</thead>
						<tbody style = "font-size:25px;">
						<?PHP while($data = mysql_fetch_array($query)) { ?>
							<tr>
								<td style = "text-align:left;"><?PHP echo $data['Name']; ?></td>
								<td><?PHP echo $data['Seat']; ?></td>
								<td class = "dt-body-center"><?PHP echo $data['CreatedOn']; ?></td>
								<td class = "dt-body-center"><?PHP echo ($data['Register'] == 1)?"Yes":"No"; ?></td>
								<!--<td class = "dt-body-center"><a href = "edit.php?Id=<?PHP echo $data['Id']; ?>">edit</a></td>-->
							</tr>
						<?PHP } ?>
						</tbody>
					</table>
					<span>
					Registered People : <?PHP echo $count_user; ?><br>
					Registered Voyage : <?PHP echo $count_user_voyage; ?><br>
					Registered Platinum : <?PHP echo $count_user_platinum; ?><br>
					Registered Titanium : <?PHP echo $count_user_titanium; ?><br>
					</span>

				</div>
			
			
				<a href = "denah.php">
					<div style = "position:absolute; left:1420px; top: 1000px;width:350px; height:59px; font-size:35px; font-weight:bolder; color:#ffffff; text-align:center; font-family:'Helvetica'; padding-top:5px; background-color: #9E1030; border-radius: 15px;">
						MAP
					</div>
				</a>
			
			</div>
		</div>		
	</body>
	 <!-- Bootstrap core JavaScript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" language="javascript" src="asset/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#adminTable').DataTable({
				"lengthChange": false
				//"columnDefs": [				
					//{ "width": "35%", "targets": 4 }
				//]
			});
		});
	</script>
</html>
