<div class="slide-menu-wrapper">
	<div class="slide-menu">
		<div class="menu-close-wrapper">
			<a href="#" class="menu-close"></a>
		</div>
		<div class="profile-info">
			<div class="img-profile">
				<img src="asset/img/group<?PHP echo $_SESSION['SessionGroupId']; ?>.png">
			</div>
			<?PHP if($_SESSION["SessionGroupId"] == '1'): ?>
				<h3 class="profile-id">The Rebels</h3>
			<?PHP elseif($_SESSION["SessionGroupId"] == '2'): ?>
				<h3 class="profile-id">The Jedi Padawan's</h3>
			<?PHP elseif($_SESSION["SessionGroupId"] == '3'): ?>
				<h3 class="profile-id">The Bounty Hunter</h3>
			<?PHP elseif($_SESSION["SessionGroupId"] == '4'): ?>
				<h3 class="profile-id">The Scavenger</h3>
			<?PHP else: ?>
				<h3 class="profile-id">The Rebels</h3>
			<?PHP endif; ?>
			<h2 class="profile-name"><?PHP echo $_SESSION["SessionUserName"]; ?></h2>
			<!--<div class="profile-contact">
				<a class="pi-call"><?PHP echo $_SESSION["SessionUserPhone"]; ?></a>
				<a class="pi-email"><?PHP echo $_SESSION["SessionUserEmail"]; ?></a>
			</div>-->
		</div>
		<ul class="menu-buttons">
			<li>
				<a href="profile.php">Profile</a>	
			</li>
			<li>
				<a href="group.php">Group</a>	
			</li>
			<li>
				<a href="schedule.php">Schedule</a>	
			</li>
			<li>
				<a href="seat_loc.php">Seat Location</a>	
			</li>
		</ul>
	</div>
</div>