<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("../partial/settings.php"); ?>
<?php include("check_login.php"); ?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title><?PHP echo $admin_page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
	<link rel="icon" href="images/icon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
	<link href="css/add-remove-textbox.css" rel="stylesheet">
	
	<script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.addremovetextbox.min.js"></script>
    <style type="text/css">
      body {
        padding-top: 60px; background-color:#FFFFFF;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
  <body>
<?php include("../partial/db.php"); ?>
<!-- Process Area -->
<?PHP
/*START CONSTANT*/
$_Title = "User Detail";
$_ModuleName = "user";
$_FileName = "user.php";
/*END CONSTANT*/

if(isset($_GET["a"])){
	$suceess_flag = $_GET["a"]; 
}
if($suceess_flag == "0"){
	if(isset($_GET["e"])){
		$error_code = $_GET["e"]; 
	}
}

$Id = $_GET['Id'];
$sqlContent = "SELECT tbuser.* FROM tbuser ".
			"WHERE tbuser.Status = 'A' ".
			"AND tbuser.Id = ".$Id." LIMIT 1";
$queryContent = mysql_query($sqlContent);
while($dataContent = mysql_fetch_array($queryContent)){
	$Title = strtoupper($dataContent['Title']);
	$Name = $dataContent['Name'];
	$Email = $dataContent['Email'];
	$Phone = $dataContent['Phone'];
	$IdAgen = $dataContent['IdAgen'];
}
?>
  	<!-- NAVIGATION MENU -->
	<?PHP include('menu.php'); ?>

    <div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-3">
			
			</div>
			<div class="col-sm-6 col-lg-6" style = "text-align:center;">
			<?PHP if($error_code != ""): ?>
				<?PHP if($error_code=="2"): ?>
					<span style = "color:red; font-weight:bold;">Nama Group Sudah Digunakan.</span>
				<?PHP elseif($error_code=="3"): ?>
					<span style = "color:red; font-weight:bold;">Email Sudah Digunakan.</span>
				<?PHP elseif($error_code=="4"): ?>
					<span style = "color:red; font-weight:bold;">Password tak boleh kosong.</span>
				<?PHP endif; ?>
			<?PHP endif; ?>
			</div>
			<div class="col-sm-3 col-lg-3">
			
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3 col-lg-3">
			
			</div>
        	<div class="col-sm-6 col-lg-6">
        		<div id="register-wraper">
        		    <form id="register-form" class="form" action = "process.php" method = "POST">
						<input name="action" type = "hidden" value = "4">
						<input name="Id" type = "hidden" value = "<?PHP echo $Id; ?>">
        		        <legend><?PHP echo $_Title; ?></legend>
        		        <div class="body">
        		        	<label for="name">Name</label>
    		        		<input name="Name" class="input-huge" type="text" value = "<?PHP echo $Name; ?>">
							
							<label for="name">Email</label>
    		        		<input name="Email" class="input-huge" type="text" value = "<?PHP echo $Email; ?>">
							
							<label for="name">Id Agen</label>
    		        		<input name="IdAgen" class="input-huge" type="text" value = "<?PHP echo $IdAgen; ?>">
							
							<label for="name">Phone</label>
    		        		<input name="Phone" class="input-huge" type="text" value = "<?PHP echo $Phone; ?>">
							
        		        </div>
						<div class="footer">
							<input type = "submit" class="btn btn-success" value = "Save" />
							<a class="btn btn-danger" href = "<?PHP echo $_FileName; ?>">Back</a>
							<br><br>
							
						</div>
					</form>
        		</div>
        	</div>
			<div class="col-sm-3 col-lg-3">
			
			</div>
        </div>
    </div>
	
</body></html>