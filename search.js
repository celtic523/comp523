$(document).ready(function() {

	//search by period
	$('#period').on('change', function(e){
		var period = $('#period').val();
		//reset other search boxes
		$('#default_obj').prop('selected', true);
		$('#default_mat').prop('selected', true);
		$('#default_cty').prop('selected', true);
		$.ajax({  
			url: "period.php",  
			type: "GET",  
			data: "period=" + period,
			dataType: "json",
			success: function (data) { 
				$("#response").empty();
				if(data.length == 0){ // no results
					$("#response").append("Error: No images found from this period. Please try again");
				}
				for(var i=0; i<data.length; i++){ //add images to page
					$("#response").append("<div class='photo'><a href='info.php?file=" + data[i] + "'><img src='images/" + data[i] + "' id='" + data[i] + "' class='image'></a></div>");
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				$("#response").append("Error: No images found from this period. Please try again");
			}
		});
	});
	
	//search by type of object
	$('#type').on('change', function(e){
		var type = $('#type').val();
		//reset other search boxes
		$('#default_per').prop('selected', true);
		$('#default_mat').prop('selected', true);
		$('#default_cty').prop('selected', true);
		$.ajax({  
			url: "type.php",  
			type: "GET",  
			data: "type=" + type,
			dataType: "json",
			success: function (data) { 
				$("#response").empty();
				if(data.length == 0){ //no results
					$("#response").append("Error: No images found from this type of object. Please try again");
				}
				for(var i=0; i<data.length; i++){ //ad images to page
					$("#response").append("<div class='photo'><a href='info.php?file=" + data[i] + "'><img src='images/" + data[i] + "' id='" + data[i] + "' class='image'></a></div>");
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				$("#response").append("Error: No images found from this type of object. Please try again");
			}
		});
	});
	
	//search by material
	$('#material').on('change', function(e){
		//reset other search boxes
		$('#default_obj').prop('selected', true);
		$('#default_per').prop('selected', true);
		$('#default_cty').prop('selected', true);
		var material = $('#material').val();
		$.ajax({  
			url: "material.php",  
			type: "GET",  
			data: "material=" + material,
			dataType: "json",
			success: function (data) { 
				$("#response").empty();
				if(data.length == 0){
					$("#response").append("Error: No images found from this material. Please try again"); //no results
				}
				for(var i=0; i<data.length; i++){ //add images to page
					$("#response").append("<div class='photo'><a href='info.php?file=" + data[i] + "'><img src='images/" + data[i] + "' id='" + data[i] + "' class='image'></a></div>");
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				$("#response").append("Error: No images found from this material. Please try again");
			}
		});
	});
	
	//search by country
	$('#country').on('change', function(e){
		//reset other search boxes
		$('#default_obj').prop('selected', true);
		$('#default_mat').prop('selected', true);
		$('#default_per').prop('selected', true);
		var country = $('#country').val();
		$.ajax({  
			url: "country.php",  
			type: "GET",  
			data: "country=" + country,
			dataType: "json",
			success: function (data) { 
				$("#response").empty();
				if(data.length == 0){
					$("#response").append("Error: No images found from this country. Please try again"); //no results
				}
				for(var i=0; i<data.length; i++){ //add images to page
					$("#response").append("<div class='photo'><a href='info.php?file=" + data[i] + "'><img src='images/" + data[i] + "' id='" + data[i] + "' class='image'></a></div>");
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				$("#response").append("Error: No images found from this country. Please try again");
			}
		});
	});
});