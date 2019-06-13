<?php
include("config.php");
$tmp = $_GET['mob'];
$query = " update register set status='2' where mobile_no='$tmp';";
if(!$run1 = mysqli_query($con,$query))
{
	?>
	<script type="text/javascript">
		alert("id not found");
	</script>
	<?php
}
else{

	?>
	<script type="text/javascript">
		alert("Id dismis");
		window.open("showregistered.php","_self");
	</script>
	<?php
}




?>