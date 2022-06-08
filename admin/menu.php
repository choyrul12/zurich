<?PHP error_reporting(0); ?>
<div class="navbar-nav navbar-inverse navbar-fixed-top">
	<div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#"><img src="images/logo30.png" alt=""></a>
	</div> 
	  <div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<li class="<?PHP echo $_ModuleName=='user'?'active':''; ?>"><a href="user.php"><i class="icon-home icon-white"></i> User</a></li>
		</ul>
	  </div><!--/.nav-collapse -->
	</div>
</div>