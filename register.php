<?php session_start(); ?>
<?PHP error_reporting(0); ?>
<?php include("partial/db.php"); ?>
<?php include("partial/settings.php"); ?>
<?php include("partial/checksession.php"); ?>
<?PHP $module_title = ""; ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>The Rise Of Zurich Force</title>
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
					<div class="radio-group-wrapper">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="usertype" id="customCheckAgent" value="0">
						  	<label class="form-check-label" for="customCheckAgent">Agent</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="usertype" id="customCheckEmployee" value="1">
						  	<label class="form-check-label" for="customCheckEmployee">Employee</label>
						</div>
					</div>
					<div class="form-group-wrapper">
						<div class="form-group agent-row">
							<label for="agentid">ID Agent</label>
							<input type="text" class="form-control" id="agentid" name = "IdAgen">
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group employee-row">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name = "Email">
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="fullname">Full Name</label>
							<input type="text" class="form-control" id="fullname" name = "Name">
							<small class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" class="form-control" id="phone" name = "Phone">
						</div>
						
						<a id = "btn-register" href = "#" class="btn btn-block btn-lg btn-primary btn-link">REGISTER</a>
					</div>
				</form>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/js/script.js"></script>
	<script>
      function showEmployee(){
        $('.agent-row').css('display','none');
        $('.employee-row').css('display','block');
        $('#customCheckEmployee').attr('checked', true);
        $('#customCheckEmployee').prop('checked', true); 
        $('#customCheckAgent').attr('checked', false);  
        $('#customCheckAgent').prop('checked', false); 
      }

      function showAgent(){
        $('.employee-row').css('display','none');
        $('.agent-row').css('display','block');
        $('#customCheckAgent').attr('checked', true); 
        $('#customCheckAgent').prop('checked', true); 
        $('#customCheckEmployee').attr('checked', false); 
        $('#customCheckEmployee').prop('checked', false); 
      }

      showEmployee();

      $('#customCheckAgent').click(function() {
        showAgent();
      });
      $('#customCheckEmployee').click(function() {
        showEmployee();
      });

      $( "#btn-register" ).click(function() {
        var agent = 0;
        var employee = 0;        
        if($('#customCheckAgent:checked').length > 0){
          agent = 1;
        }
        if($('#customCheckEmployee:checked').length > 0){
          employee = 1;
        }
        var age = '';
        var email = $("input[name=Email]").val();
        var address = '';
        var name = $("input[name=Name]").val();
        var idagen = $("input[name=IdAgen]").val();
        var phone = $("input[name=Phone]").val();
        
        $.ajax({
            method: "POST",
            url: "api.php",
            data: { 
              action: "register", 
              secret_key: "<?PHP echo $api_key; ?>",
              Age: age,
              Name: name,
              Email: email,
              Address: address,
              IdAgen: idagen,
              Phone: phone,
              Agent: agent,
              Employee: employee
            },
            dataType: 'json',
            success: function(json) {
            if(json['status'] == "0"){
              var userid = json['user'].Id;
              window.location='process.php?action=3&Id=' + userid;
            } else {
              alert(json['message']);
            }
          }
        });   
      });
    </script>
</body>
</html>