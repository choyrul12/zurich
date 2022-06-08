<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?php include("partial/checksessionblank.php"); ?>
<?PHP $module_title = "PROFILE"; ?>
<?PHP 
$sqlData = "SELECT tbuser.* FROM tbuser ".
              "WHERE tbuser.Status = 'A' AND tbuser.Id = '".$_SESSION["SessionUserId"]."' LIMIT 1";
$queryData = mysql_query($sqlData); 
while($dataData = mysql_fetch_array($queryData)){ 
  /*$dataDataArray[] =  array(*/
  $dataArray =  array(
    "Id" => $dataData['Id'], 
    "Title" => $dataData['Title'],
    "Name" => $dataData['Name'],
    "Email" => $dataData['Email'],
    "Age" => $dataData['Age'],
    "Phone" => $dataData['Phone'],
    "Address" => $dataData['Address'],
    "IdAgen" => $dataData['IdAgen'],
    "QrCode" => $dataData['QrCode'],
  );
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?PHP echo $front_page_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

	<div class="wrapper">
		<div class="topnav">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<button type="button" class="menu-btn"><div class="patty"></div></button>
					</div>
					<div class="col-8 d-flex flex-column justify-content-center text-center">
						<h1 class="page-title"><?PHP echo $module_title; ?></h1>
					</div>
					<div class="col-2 text-right">
						<div class="dropdown">
						    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						        <img src="asset/img/user.svg" width="32px">
						    </button>
						    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						        <a class="dropdown-item" href="process.php?action=1">Log Out</a>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?PHP include('sidebar.php'); ?>

		<div class="main-content content320">
			<div class="modal-content text-center static-modal">
	            <div class="modal-body">
	                <h2>CONGRATULATION</h2>
	                <h3>YOU&rsquo;RE REGISTERED</h3>

	                <div class="qr-wrapper">
	                	<img src="upload/qrcode/<?PHP echo $dataArray['QrCode']; ?>">
	                </div>
	                <div>
	                	<p>This QR Code will be your ticket to enter The Rise Of Zurich Force Please save it to your gallery!</p>
	                </div>
	                <a href="upload/qrcode/<?PHP echo $dataArray['QrCode']; ?>" target = "newtab" class="btn">SAVE IMAGE</a>
	            </div>
	        </div>
		</div>

	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="asset/js/popper.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>