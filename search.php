<?php 


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Search</title>
	<link rel="stylesheet" href="css/search.css">
 </head>
 <body>
 	<div class="searcher">
 		<form action="" >
 			<input type="text" id="text" autocomplete="off" autofocus>
			<!-- <label for="text"></label> -->
			<div href="" id="submit">Search</div>
 		</form>
		 	
 	</div>

	<ul class="searcher">
	
 	</ul>
 	<script src="bower_components/jquery/dist/jquery.js"></script>
 	<script src="d3/d3.js"></script>
 	<script>
 	$("#text").keyup(function(){
 		if ($("#text").val() !== '')
 			
 			
 			{	
 				
 				var dd = $("#text").val();
 				$.post('php/postSearch.php', {sword: dd}, function(data){$("<li>"+data+"</li>").prependTo($("ul"));});
 				$("li").remove();
 			}
 			else if ($("#text").val() == ''){
 				$("li").remove();
 			}
 	});

 </script>
 </body>
 </html>