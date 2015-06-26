<?php session_start(); error_reporting(0); ?>
<?php include "config.php" ?>

	<?php 
			if(isset($_SESSION['name'])){
			$subj = $db->real_escape_string($_POST['subj']);
			$msg = $db->real_escape_string($_POST['msg']);
			$date = $_POST['date'];
			$user = $_SESSION['name'];
			$parent = $_POST['parent'];

			$query = mysqli_query($db, "INSERT INTO chat1 (`From_n`, `Message`, `Subject`, `Date`, `parent`) VALUES ('$user', '$msg', '$subj', '$date', '$parent' ) ");

			$query1 = mysqli_query($db, "SELECT * FROM chat1 WHERE msg_id=LAST_INSERT_ID()");
			while ($res = mysqli_fetch_array($query1)){

			
				echo "<article id='" . $res['msg_id'] . "'><div class='usernames'>Posted by " . $res['From_n'] . "</div><div id='artmenu'><span class='fa fa-mail-reply' id='reply'></span><span class='fa fa-edit fa-1x' id='edit'></span><span class='fa fa-close fa-1x' id='delpost'></span></div><div class='date'>20 <br> may</div><h2>" . $res['Subject'] . "</h2><br><p>". $res['Message'] . "</p><hr></article>";
		}
	}
	else {
		echo "Login, please";
	}
	?>
