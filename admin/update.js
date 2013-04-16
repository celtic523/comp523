$(document).ready(function() {
	var filename = $('#image img').attr('id'); //get file name
	//update on form submit
	$('#update_form').on('submit', function(e){
		e.preventDefault();
		var formdata = $('#update_form').serialize() + "&file=" + filename; //set form data
		$.ajax({  
			url: "update.php",  
			type: "POST",  
			data: formdata,  
			success: function (res) { 
				document.getElementById("response").innerHTML = "Updated: " + "<a href='../info.php?file=" + res + "'>" + res + "</a>"; //create link to update image and info
			},
			error: function(xhr, ajaxOptions, thrownError){
				$("#response").append("<br>Error: " + thrownError); //print error
			}
		}); 
	});
	
	$('#delete').on('click', function(e){
		e.preventDefault();
		var sure = confirm('Are you sure you want to delete this image?');
		if(sure == true){
			$.ajax({  
				url: "delete.php",  
				type: "GET",  
				data: 'file=' + filename,  
				success: function (res) { 
					alert(res);
					$("#response").append("<br>Image deleted. <a href='../search.html'>Return to the search page</a>"); //print success and give link back to search page
				},
				error: function(xhr, ajaxOptions, thrownError){
					$("#response").append("<br>Error: " + thrownError); //print error
				}
			}); 
		} else{
			$("#response").empty();
		}
	});

});