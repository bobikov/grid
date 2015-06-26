<?php include "config.php" ?>

	<?php  
	$dele = $_POST['dele'];
	$query = mysqli_query($db, "DELETE FROM `chat1` WHERE `msg_id` = '$dele'" );

	

	?>
