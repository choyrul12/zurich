<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?php include("partial/checksession.php"); ?>
<?PHP $module_title = ""; ?>
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
						<!--<button type="button" class="menu-btn"><div class="patty"></div></button>-->
					</div>
					<div class="col-8 d-flex flex-column justify-content-center text-center">
						<h1 class="page-title"><?PHP echo $module_title; ?></h1>
					</div>
					<div class="col-2 text-right">
						<!--<a href="#"><img src="asset/img/user.svg" width="32px"></a>-->
					</div>
				</div>
			</div>
		</div>
		<?PHP //include('sidebar.php'); ?>
		
		<div class="main-content content320">
			<div class="logo">
				<img src="asset/img/logo.svg" width="320">
			</div>
			<div class="form-wrapper mg-top50">
				
				<a href = "login.php" class="btn btn-block btn-lg btn-custom-primary btn-link">LOGIN</a>

				<a href = "register.php" class="btn btn-block btn-lg btn-custom-primary btn-link">REGISTER</a>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/script.js"></script>
</body>
</html>