$(document).ready(function() {
	var file;
	var form = $("#form");
	$("#file").on('change', function(evt){
		$("#response").empty().append("Preview:");
		file = this.files[0];
		var reader = new FileReader();  
		reader.onloadend = function (e) {   
			var holder = $("#image").empty();
			var img = $("<img src='" + e.target.result + "'>");
			holder.append(img); 
		};  
		reader.readAsDataURL(file);  
	});
	
	form.on('submit', function(evt){
		evt.preventDefault();
		$("#response").empty().append("Uploading . . .");
		var formdata = new FormData(); 
		formdata.append("file", file);
		var fullPath = document.getElementById('file').value;
		if (fullPath) {
			var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
			var filename = fullPath.substring(startIndex);
			if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
				filename = filename.substring(1);
			}
		}
		$.ajax({  
			url: "upload.php",  
			type: "POST",  
			data: formdata,  
			processData: false,  
			contentType: false,  
			success: function (res) {  
				document.getElementById("response").innerHTML = "Uploaded: " + "<a href='../info.php?file=" + filename + "'>" + filename + "</a>"; 
				
			},
			error: function(){
				$("#response").append("<br>Error: Uploading");
			}
		}); 
		
		var fdata = "file=" + filename + "&" + form.serialize();
		$.ajax({
					url: "image.php",
					type: "POST",
					data: fdata,
					//dataType: "json",
					success: function(data){
					},
					error: function(xhr, ajaxOptions, thrownError){
						$("#response").empty().append("<br>Error:" + xhr.status + " " + thrownError);
					}
		});
	});
});

