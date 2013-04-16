<?php
	//deletes image based on file given
	require_once('orm/Image.php');

	if(!is_null($_GET['file'])){
		$file = $_GET['file'];
		$images = Image::findByFile($file);
	}

    if (is_null($images)) {
      // Not found. Return error.
      header("HTTP/1.1 404 Not Found");
      print("Image not found");
      exit();
    }
	
	//delete
	$image = $images->delete();
	if(!is_null($image)){
		print("Image Deleted");
		exit();
	} else{
	  // Something went wrong. Return error.
      header("HTTP/1.1 400 Bad Request");
      print("Image not deleted");
      exit();
	}
?>