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
	<link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <!-- DATA TABLE CSS -->
    <link href="css/table.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.3.1.0.js"></script>     
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/admin.js"></script>

    <style type="text/css">
      body {
		padding-top: 60px; background-color:#FFFFFF;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        
  	<!-- Google Fonts call. Font Used Open Sans -->
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <!--<script type="text/javascript" src="js/datatables/jquery.dataTables.js"></script>-->
	
	
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
	
	
  			<script type="text/javascript" charset="utf-8">
  			    $(document).ready(function () {
					 $('#datatable').DataTable( {
						"processing": true,
						"serverSide": true,
						"ajax": "datatable/user.php"
					} );
  			    });
	</script>    
  </head>
  <body>
<?php include("../partial/db.php"); ?>
<!-- Process Area -->
<?PHP
/*START CONSTANT*/
$_Title = "User Data";
$_ModuleName = "user";
$_FileName = "user.php";
/*END CONSTANT*/

//$sqlData = "SELECT COUNT(Id) AS CountData FROM tbuser WHERE Phone IS NOT NULL AND Status = 'A'";
$sqlData = "SELECT COUNT(Id) AS CountData FROM tbuser WHERE WebRegis = '1' AND Status = 'A'";
$queryData = mysql_query($sqlData); 
$totalRegis = 0;   
while($dataData = mysql_fetch_array($queryData)){ 
  $totalRegis = $dataData['CountData'];
}

?>

<!-- End Process Area -->
  
  	<!-- NAVIGATION MENU -->
	<?PHP include('menu.php'); ?>

    <div class="container">

      <!-- CONTENT -->
	<div class="row">
		<div class="col-sm-12 col-lg-12">

		<h4><strong><?PHP echo $_Title; ?></strong></h4>
    <a class="btn btn-success" href = "user_add.php">Add</a>
    
		<table id="datatable" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Id Agen</th>
                <th>Register</th>
				<th>Action</th>
            </tr>
        </thead>
		
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Id Agen</th>
                <th>Register</th>
				<th>Action</th>
            </tr>
        </tfoot>
        <tbody>
		</tbody></table>
		<br><br>
    Total Registered : <?PHP echo $totalRegis; ?>
    <br>
    <a class="btn btn-success" href = "export.php?action=1">Export</a>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-success" href = "export.php?action=2">Export All</a>
		</div><!--/span12 -->
      </div><!-- /row -->
     </div> <!-- /container -->
</body></html>