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
						<a href="index.php"><img src="asset/img/back.png" width="32px"></a>
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
			<div class="form-wrapper">
				<form>
          			<input type = "hidden" name = "source" value = "<?PHP echo basename($_SERVER["SCRIPT_FILENAME"]); ?>">
					<div class="form-group-wrapper">
						<div class="form-group">
							<label for="email">ID Agent/Email</label>
							<input type="email" class="form-control" id="email" name = "IdAgen">
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" id="phone" name = "Phone">
						</div>
						
						<a id = "btn-login" href = "#" class="btn btn-block btn-lg btn-primary">LOGIN</a>
					</div>
				</form>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/script.js"></script>
	<script>
      function submit_login(phone, idagen){
        $.ajax({
            method: "POST",
            url: "api.php",
            data: { 
            action: "login", 
            secret_key: "<?PHP echo $api_key; ?>",
            Phone: phone,
            IdAgen: idagen
            },
            dataType: 'json',
            success: function(json) {
            if(json['status'] == "0"){
              var userid = json['user'].Id;
              window.location='process.php?action=2&Id=' + userid;
            } else {
              alert(json['message']);
            }
          }
        });     
      }
      
      $(document).ready(function(){   
        
        $( "#btn-login" ).click(function() {
          var phone = $("input[name=Phone]").val();
          var idagen = $("input[name=IdAgen]").val();
          submit_login(phone, idagen);
        });
      });
    </script>
</body>
</html>