<?php
//search by type of object
require_once('orm/Image.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(!is_null($_GET['type'])){
		$type = $_GET['type'];
		$images = Image::findByType($type);
	}

    if (is_null($images)) {
      // Something went wrong. Return error.
      header("HTTP/1.1 400 Bad Request");
      print("Error no images in the specified category");
      exit();
    }
	
	$image_files = array();
    foreach ($images as $i) {
      $image_files[] = $i->getFile(); //create array of image files matching search
    }
    header("Content-type: application/json");
    print(json_encode($image_files)); //return results
    exit();
}

?>