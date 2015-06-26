<?php session_start() ?>
<script>

	$(".enter").click(function(){
		clearInterval(inter);
		if ($('#hhh').val()!=''){
		var kuka = $("#hhh").val();
		

		$.post('php/regii.php', {oko: kuka},
			function(output){
				$(".reg").html(output);
				$(".main").load("php/ajaxLoad.php");
				var swim = $("#swim").text();
				if (swim){
					setTimeout(function(){$("#swim").removeClass("animated fadeIn");
						$("#swim").addClass("animated fadeOut");}, 500);
					setTimeout(function(){$(".reg").load('php/reg.php');}, 1500);
				}
				else{
						$(".main").load("php/ajaxLoad.php");
				}
			});

		}

	});
	$(".exit").click(function(){
		clearInterval(inter);
		if ($('#hhh').val()!=''){
		var kuka= $("#hhh").val();
		
		$.post('php/regii.php', {oko: kuka},
			function(output){
				$(".reg").load("php/sessKill.php");
				$(".main").load("php/ajaxLoad.php");
				
			});

		}
	
	});
	// $("#hhh").keydown(function(event){
	// 		if (event.which == 13){
	// 			var kuka= $("#hhh").val();
	// 			$.post('php/regii.php', {oko: kuka},
	// 		function(output){
	// 			$(".reg").html(output);
	// 			var swim = $("#swim").text();
	// 			if (swim){
	// 				setTimeout(function(){$("#swim").removeClass("animated fadeIn");
	// 					$("#swim").addClass("animated fadeOut");}, 500);
	// 				// setTimeout(function(){$(".reg").load('php/reg.php');}, 1500);
	// 			}
	// 		});
	// 		}
	// 	});
</script>
<?php include "config.php";?>
		<?php 

			if (isset($_SESSION['name'])){

				echo "<span style='font-family: arial; font-size: 16px; color: black;'class='animated fadeIn'>Hi, " . $_SESSION['name'] . "</span><div class='exit animated fadeIn'>Exit</div>";
			}
			else{
			echo "<input type='text' placeholder='Username' id='hhh' class='animated fadeIn'><div class='enter animated fadeIn'>LOGIN</div>";
		};
		 ?>