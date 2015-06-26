<script>
	$(".enter").click(function(){
		clearInterval(inter);
		if ($('#hhh').val()!=''){
		var kuka= $("#hhh").val();
		
		$.post('php/regii.php', {oko: kuka},
			function(output){

				$(".reg").html(output);
				// $(".main").load("php/ajaxLoad.php");
				var swim = $("#swim").text();
				if (swim){
					setTimeout(function(){$("#swim").removeClass("animated fadeIn");
						$("#swim").addClass("animated fadeOut");}, 500);
					setTimeout(function(){$(".reg").load('php/reg.php');}, 1500);
				}
				else{
				}
			});

		}
		
	});
	$(".exit").click(function(){
					clearInterval(inter);
					$(".main").load("php/ajaxLoad.php");
			
		});

</script>
<?php session_start(); 
if (isset($_SESSION['name'])){
	setcookie('name', '', time() - 3600);
	session_destroy();
}
echo "<input type='text' placeholder='Username' id='hhh' class='animated fadeIn'><div class='enter animated fadeIn'>LOGIN</div>";
 ?>