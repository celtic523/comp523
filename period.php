
<?php
	//searches by period
	require_once('orm/Image.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(!is_null($_GET['period'])){
			$period = $_GET['period'];
			$images = Image::findByPeriod($period);
		}

		if (is_null($images)) {
		  // Something went wrong. Return error.
		  header("HTTP/1.1 400 Bad Request");
		  print("Error no images in the specified category");
		  exit();
		}
		$image_files = array();
		foreach ($images as $i) {
		  $image_files[] = $i->getFile(); //create array of files matching search
		}
		header("Content-type: application/json");
		print(json_encode($image_files)); //return files of images
		exit();
}
?>