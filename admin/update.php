<?php
	//update entry based off of file given
	require_once('orm/Image.php');
	
	$file = $_POST['file'];
	$title = $_POST['title'];
	$type = $_POST['type']; 
	$material = $_POST['material'];
	$period = $_POST['period']; 
	$find = $_POST['find']; 
	$country = $_POST['country']; 
	$fdate = $_POST['date']; 
	$collection = $_POST['collection'];

	$image = Image::findByFile($file); //get file
	if (is_null($image)) {
	  //entry not found
      header("HTTP/1.1 404 Not Found");
      print("Image not found");
      exit();
    }
	$updated = $image->setAll($title, $type, $material, $period, $find, $country, $fdate, $collection);//update entry
	if (is_null($updated)) {
	  //something went wrong
      header("HTTP/1.1 400 Bad Request");
      print("Could not finish request");
      exit();
    }
	print($file); //return the file name
	exit()

?>