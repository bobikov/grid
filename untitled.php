			<?php 
			$query = mysqli_query($db, "SELECT * FROM `chat1` ORDER BY `ID` DESC");
			$query = mysqli_query($db, "SELECT * FROM `Reports`");
			while ($result = mysqli_fetch_array($query)){
				echo "<article id='" . $result['ID'] . "'><i class='fa fa-close' style='margin-left: 100%; cursor: pointer;' id='delpost_" . $result['ID'] ."'></i><div class='date'>20 <br> may</div><h2>" . $result['Subject'] . "</h2>". $result['Message'] . "<hr></article>";
			}
			 ?>