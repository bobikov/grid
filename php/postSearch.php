<?php include "config.php" ?>
<?php 
	$sword=$_POST['sword'];

	$query=mysqli_query($db, "SELECT subject FROM news WHERE subject LIKE '%" . $sword . "%' ");

	while ($row = mysqli_fetch_array($query)){

		echo $row['subject'];
	}



 ?>