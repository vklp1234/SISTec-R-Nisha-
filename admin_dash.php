<?php
include("config.php");
$qry1 = "select count(role) participants from register where role='participants'";
$qry2 = "select count(*) events from event ;";
$qry3 = "select count(role) users from register where role='users'";
$run1 = mysqli_query($con,$qry1);
$run2 = mysqli_query($con,$qry2);
$run3 = mysqli_query($con,$qry3);
$row1 = mysqli_fetch_assoc($run1);
$row2 = mysqli_fetch_assoc($run2);
$row3 = mysqli_fetch_assoc($run3);


?>
	<div class="row">
		<div class="col-md-4 col-lg-4 col-xs-12">
			<div  style="    background: linear-gradient(to bottom, rgba(252, 190, 27, 1) 1%, rgba(248, 86, 72, 1) 99%);">
				<div style="padding: 5px;" align="center" >
					<i  class="fa fa-users fa-3x"></i>
				</div>
				<p align="center" style="color: white;">Total Users <?php echo $row3['users'];?></p>
			</div>
			
		</div>
		<div  class="col-md-4 col-lg-4 col-xs-12">
			<div style="    background: linear-gradient(to bottom, rgba(183,71,247,1) 0%,rgba(108,83,220,1) 100%);">
				<div style="padding: 5px;" align="center">
					<i  class="fa fa-list fa-3x"></i>
				</div>
				<p align="center" style="color: white;">Total Participants <?php echo $row1['participants'];?></p>
			</div>
			
		</div>
		<div  class="col-md-4 col-lg-4 col-xs-12">
			<div style="background: linear-gradient(to bottom, rgba(255, 86, 65, 1) 0%, rgba(253, 50, 97, 1) 100%);">
				<div style="padding: 5px;" align="center">
					<i  class="fa fa-calendar fa-3x"></i>
				</div>
				<p align="center" style="color: white;">Total Events <?php echo $row2['events'];?></p>
			</div>
			
		</div>
	</div>
