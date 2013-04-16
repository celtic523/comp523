<?php
require_once('orm/Image.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //if (is_null($_SERVER['PATH_INFO'])) {
    $file = $_POST['file'];
    if (is_null($file)) {
      header("HTTP/1.1 400 Bad Request");
      print("Please specify file name");
      exit();
    }
    $title = $_POST['title'];
    $type = $_POST['type'];
    $material = $_POST['material'];
	$period = $_POST['period'];
    $find = $_POST['find'];
    $country = $_POST['country'];
	$date = $_POST['date'];
    $collection = $_POST['collection'];
    
    
	$image = Image::create($file, $title, $type, $material, $period, $find, $country, $date, $collection);
    if (is_null($image)) {
      header("HTTP/1.1 400 Bad Request");
      print("Transaction failed at database");
      exit();
    }

    print($image->getJSON());
    exit();
}
  
?>