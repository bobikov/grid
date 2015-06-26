<?php include "config.php" ?>
	<?php 

		$idpost = $db->real_escape_string($_POST['idpost']);
		$msg = $db->real_escape_string($_POST['msg']);

		$query = mysqli_query($db, "UPDATE `chats`.`chat1` SET `Message` = '$msg' WHERE `chat1`.`msg_id` = '$idpost'");


		echo $msg;


	 ?>