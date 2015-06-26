<?php session_start(); error_reporting(0); ?>
<script>
	$(".exit").click(function(){	
		// alert("df");
		// 
		
		$(".reg").load("php/sessKill.php");
		$(".main").load("php/ajaxLoad.php");
	});

</script>

<?php include "config.php" ?>
	<?php 

		if (isset($_SESSION['name'])){
			$name1 = $_POST['oko'];
			setcookie('name', $name1, time() + 3600);
		}
		else{	

				$name1 = $_POST['oko'];
				$_SESSION['name']=$name1;

		}
		$query = mysqli_query($db, "SELECT user_id FROM Users WHERE Username='$name1'");

		if (mysqli_num_rows($query) == 1) {
		// 	echo "<span style='font-family: arial; color: #B8A8C5; font-size: 16px'> Hello, " .  $name1 . "!!!</span><span class='enter' id='exit'>Exit</span>";

		
		echo "<span style='font-family: arial; font-size: 16px; color: black;'class='animated fadeIn'>" . $name1 . "</span><div class='exit animated fadeIn'>Exit</div>";
			

		}
		
		else {
			echo "<span style='font-family: arial; font-size: 16px; color: black;' class='animated fadeIn' id='swim'>That username is not registred</span>";

	 }
// }
	?>