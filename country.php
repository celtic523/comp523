<?php
//search by country
require_once('orm/Image.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 
    if(!is_null($_GET['country'])){
		$country = $_GET['country'];
		$images = Image::findByCountry($country);
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
    print(json_encode($image_files)); //return files
    exit();
}
?>