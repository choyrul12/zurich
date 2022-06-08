<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?php include("partial/checksessionblank.php"); ?>
<?PHP $module_title = "DASHBOARD"; ?>
<?PHP 

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
			<div class="logo">
				<img src="asset/img/logo.svg" width="320">
			</div>
			<div class="form-wrapper mg-top50">
				<a href = "profile.php" class="btn btn-block btn-lg btn-custom-primary btn-link">PROFILE</a>
				<a href = "group.php" class="btn btn-block btn-lg btn-custom-primary btn-link">GROUP</a>
				<a href = "schedule.php" class="btn btn-block btn-lg btn-custom-primary btn-link">SCHEDULE</a>
				<a href = "seat_loc.php" class="btn btn-block btn-lg btn-custom-primary btn-link">SEAT LOCATION</a>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="asset/js/popper.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>