<!DOCTYPE html>
<html>
	<head>
		<title>Test</title>
		<script src="jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="search.css">
	</head>
	<body>
		<div id="navbar"><a href="/"><img src="cacsmlogo.gif"></a>
				<a href="search.html"><img src="images2hi.gif"></a>
				<a href="mapsindex.html"><img src="maps2hi.gif"></a>
				<a href="designindex.html"><img src="design2hi.gif"></a>
				<a href="topicsindex.html"><img src="topics2hi.gif"></a>
				<a href="vocabindex.html"><img src="vocab2hi.gif"></a>
				<a href="siteindex.html"><img src="siteinfo2hi.gif"></a>
				<span class="stretch"></span>
		</div>
		<div id="main">
			<?php
				require_once('orm/Image.php');

				if(is_null($_GET['file'])){

				} else{
					$file = $_GET['file'];
					$image = Image::findByFile($file); //get file
					
					//get all values
					$title = $image->getTitle();
					$type = $image->getType();
					$material = $image->getMaterial();
					$period = $image->getPeriod();
					$find = $image->getFind();
					$country = $image->getCountry();
					$date = $image->getDate();
					$collection = $image->getCollection();

					//fill in all info
					print("<label class='left'><strong><em>" . $title . "</em></strong></label><div id='right'>");
					print("<div class='right'><em class='gray'>Type of Object: </em>" . $type . "</div>");
					print("<div class='right'><em class='gray'>Material: </em>" . $material . "</div>");
					print("<div class='right'><em class='gray'>Period: </em>" . $period . "</div>");
					print("<div class='right'><em class='gray'>Country: </em>" . $country . "</div>");
					print("<div class='right'><em class='gray'>Find Spot: </em>" . $find . "</div>");
					print("<div class='right'><em class='gray'>Date: </em>" . $date . "</div>");
					print("<div class='right'><em class='gray'>Collection: </em>" . $collection . "</div>");
					print("</div><div id='image'><img src='uploads/" . $file . "'></div>");
				 }
				 //create link to edit the photo
				print("<div id='edit'><a href='admin/edit.php?file=" . $file . "'>Edit Info</a></div>");
			 ?>
			 
		</div>
	</body>
</html>