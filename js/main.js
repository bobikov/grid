


d3.select("#slide").on("click", function(){

	if (d3.select("aside").style("left") == "-212px") {
		d3.select("aside")
			.transition()
			.duration(400)
			.delay(0)
			.ease("in")
			.style("left", "0px");
		d3.select("nav")
			.transition()
			.duration(400)
			.delay(0)
			.ease("in")		
			.style("left", "212px")
			.style("position", "fixed");
			
		d3.select("main")
			.transition()
			.duration(400)
			.delay(0)
			.ease("out")	
			.style("left", "212px");
	

				
		
	}
	else {
			d3.select("nav")
				.transition()
				.duration(400)
				.delay(0)
				.ease("out")	
				.style("left", "0px");
			d3.select("aside")
				.transition()
				.duration(400)
				.delay(0)
				.ease("out")
				.style("left", "-212px");
			d3.select("main")
				.transition()
				.duration(400)
				.delay(0)
				.ease("out")	
				.style("left", "0px");

	}

});

