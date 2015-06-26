<?php session_start(); error_reporting(0); ?>
<script>
	$(document).ready(function(){
		// var all = d3.selectAll(".main textarea");

		// 			all.each(function(d){
		// 					if (all.property("value").length > 10){

  // 									all.property("rows", Math.floor(all.property("value").length/40));
  // 								}
  // 						return d;


  var last;
	$(".main article #reply").click(function(){
	// var a = $(this).attr("id");
	var a = $($(this).parent()).parent();
	var parent= a.attr('id');
	var pat = /\d+/g;
	
	var dd = pat.exec($(a).attr("id")).toString();

		if(last){
		$("#"+last).next("article").remove();
		}
		last = parent;
	

		$("<article><br><textarea class='commenttext' autofocus></textarea><br><div class='sendbut' id='sbb'>Send</div></article>").insertAfter(a);

		$(".main article #sbb").click(function(){
				var msg=$(this).add("textarea").val();
				var date = moment().format("MMMM, Do");

			if (msg){
				

			
			$.post('php/postAjax.php', {parent: parent, msg: msg},
					function(data){
				$(".main").load("php/ajaxLoad.php");});
			}
			else{
				$("<div class='bubble'>Type something</div>").appendTo($(this).parent());
				// sweetAlert("type something");
				$(".bubble").fadeTo("fast", 1);
				setTimeout(function(){
			
					$(".bubble").fadeTo("slow", 0.);
					// $(".bubble").remove();
				},
					500);
				if ($(".bubble").css("opacity")==".0"){
					$(".bubble").remove();
				}
			}
		})
	});

	var all = $(".main textarea").each(function(index){
			if ($(this).val().length > 10){
  				$(this).prop("rows", Math.floor($(this).val().length/62));
  			}
	});

		$(".main article").each(function(){
	if($(this).data("parent")){
		// $(this).css("background", "red");
		
		$(this).insertAfter("#"+$(this).data("parent"));
		$("#"+$(this).attr("id")+" .date").remove();
		
	};
	});
 });
	
	$(".main article #delpost").click(function(){
	// var a = $(this).attr("id");
	var a = $($(this).parent()).parent();
	var pat = /\d+/g;
	var dd = pat.exec($(a).attr("id")).toString();
	// var item = $(this).parent();
	// alert(a.tagName);
	// digits();
	// $(a).addClass("animated rollOut");
	$.post('php/deletePost.php', {dele: dd},
		function(data){
		// 	$('#main').html(output).show();
		$("#"+dd).remove();
		// setTimeout((function(){$(a).remove();}), 500);
		// alert(dd);
		});
	
});	
	var save = document.createElement('div');
	savetext = document.createTextNode("Save");
	var temp;
	var size;
	$("#artmenu #edit").click(function(){

			$("#"+temp+" textarea").attr("disabled", "on");
			$("#"+temp+" textarea").css("border", "none");
			$("#"+temp+" textarea").remove();
			$(save).remove();
			$(savetext).remove();
			
			// var a = $(this).attr("id");
			var a = $($(this).parent()).parent();
			
			var pat=/\d+/g;
			var dd = pat.exec($(a).attr("id")).toString();
			temp = dd;
			size = $(a).css('height');
			$("<textarea disabled cols='20' rows='3'></textarea>").insertBefore("#"+dd+" hr");
			$("#"+dd+" textarea").val($("#"+dd+" p").text());
			$("#"+dd+" p").text('');
			$("#"+dd+" textarea").removeAttr("disabled");
			$("#"+dd+" textarea").css("border", "1px #C4C4C4 solid");
			$("#"+dd+" textarea").css("height", size);
			$("#"+dd+" textarea").css("padding", "5px");
			$("#"+dd+" textarea").attr('spellcheck', 'false');
			$("#"+dd+" textarea").focus();
			
				save.className = "savebut";
				
				save.id = "save";
				save.appendChild(savetext);
				$(save).insertAfter($("#"+dd+" textarea"));
				var obj3 = $("#"+dd+" textarea");

	// alert($("#"+dd+" textarea").prop("rows"));
	$("#save").click(function(){
		var a = $(this).parent();
		var pat = /\d+/g;
		var dd = pat.exec($(a).attr("id")).toString();
		var value = $("#"+dd+" textarea").val();
		
		$.post('php/savePost.php', {idpost: dd, msg: value},
			function(data){
			// 	$("#"+dd+" textarea").val(data);
				$(".main").load("php/ajaxLoad.php");
				
			}
		
	);

});
	autosize($("textarea"));

});
// $(window).resize(function(){
// 	// if ($("body").innerWidth()<=768){
// 	// 	$("body").css("background", "#D44372");
// 	// }
// if ($("body").innerWidth()<=480){
// 	$("body").css("background", "yellow");
// 	// $(".main").after($("aside"));
// }
// if ($("body").innerWidth()>768){
// 	$("body").css("background", "white");
// }
// // alert($(window).innerWidth());
// });
	


	$(".exit").click(function(){
					clearInterval(inter);
					$(".main").load("php/ajaxLoad.php");			
		});
	var data = ["bm1.png", "kisa1.png","kisa2.png","kisa5.png", "kisa7.png", "kisa6.png", "kisa8.png"];
		var i = 0;
	d3.select(".main_warning").append("div")
	.attr("id", "wrapper")
	.style("width", 408*data.length+"px")
	.style("height", "300px");
	// .style("border", "1px black solid");

	d3.select("#wrapper").selectAll("div")
							.data(data)
							.enter().append("div")
							.style("background", function(d){ return "url(img/"+d+")"});
	d3.selectAll(".main_warning #wrapper div")
		.style("float", "left")
		.style("display", "inline")
		.style("background-size", "cover")
		.style("width", "408px")
		.style("height", "300px");
		// .text("Login");
		var time = 0;

	var inter = setInterval(int, 3000);
	function int (){
		time += 408;
				d3.select("#wrapper")
					.transition()
					.ease("sin-out")
					.duration(1000)
					.style("margin-left", "-"+time+"px");
		if (time==data.length*408-408){
				time=-408;
				
		}
	}
	// $(".main article:odd").css("background", "#EDFFF9");
</script>
<?php include "config.php" ?>
<?php 
	if (isset($_SESSION['name'])){
		$user=$_SESSION['name'];
	$query = mysqli_query($db, "SELECT * FROM `chat1` ORDER BY `msg_id` DESC");
	// $query = mysqli_query($db, "SELECT `chat1`.`msg_id`, `chat1`.`message`, `replies`.`reply` FROM `chat1` INNER JOIN `replies` on `chat1`.`msg_id`<>`replies`.`msg_id` or `chat1`.`msg_id`=`replies`.`msg_id` ");
		while ($res = mysqli_fetch_array($query)){
			
			
				echo "<article id='" . $res['msg_id'] . "' data-parent=" . $res['parent'] . " >
			<div class='usernames'>Posted by " . $res['From_n'] . "</div>
				<div id='artmenu'>
					<span class='fa fa-mail-reply fa-1x' id='reply' ></span><span class='fa fa-edit fa-1x' id='edit'></span><span class='fa fa-close fa-1x' id='delpost'></span></div>
					<div class='date'>" . $res['Date'] . "</div><h2>" . $res['Subject'] . "</h2><p>" . $res['Message'] . "</p>
				<hr>
				</article>";
	
			}
			
	}
	else {
		echo "<div class='main_warning animated tada'><div style='position: absolute; text-align: center; left: 40px; top: 20px; opacity: .6'>Login <br> or <br> Sign Up
			
		</div></div>";
	};

 ?>
	
