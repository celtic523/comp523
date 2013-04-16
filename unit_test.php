<?php
require_once('simpletest/autorun.php');
require_once('orm/Image.php');

class TestOfUploading extends UnitTestCase {
    function testCreating() {
		$file = 'file.jpg';
		$title = 'title';
		$type = 'type';
		$material = 'material';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		$image = Image::create($file, $title, $type, $material, $period, $find, $country, $date, $collection);
		$this->assertNotNull($image); 
		$id = $image->getID();
		$this->assertIsA($id, 'integer');
		$f = $image->getFile();
		$this->assertNotNull($f);
		$ti = $image->getTitle();
		$this->assertNotNull($ti);
		$ty = $image->getType();
		$this->assertNotNull($ty);
		$m = $image->getMaterial();
		$this->assertNotNull($m);
		$p = $image->getPeriod();
		$this->assertNotNull($p);
		$fs = $image->getFind();
		$this->assertNotNull($fs);
		$c = $image->getCountry();
		$this->assertNotNull($c);
		$d = $image->getDate();
		$this->assertNotNull($d);
		$c = $image->getCollection();
		$this->assertNotNull($c);
		
    }
}

class TestOfSearching extends UnitTestCase {	
	function testSearching() {
		$file = 'file.jpg';
		$title = 'title';
		$type = 'type';
		$material = 'material';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$image = Image::findByType($type);
		$this->assertNotNull($image);
		$image = Image::findByMaterial($material);
		$this->assertNotNull($image);
		$image = Image::findByPeriod($period);
		$this->assertNotNull($image);
		$image = Image::findByCountry($country);
		$this->assertNotNull($image);
		
    }
}

class TestOfUpdating extends UnitTestCase {	
	function testUpdating() {
		$file = 'file.jpg';
		$title = 'title1';
		$type = 'type1';
		$material = 'material1';
		$period = 'period1';
		$find = 'find1';
		$country = 'country1';
		$date = 'date1';
		$collection = 'collection1';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$updated = $image->setAll($title, $type, $material, $period, $find, $country, $date, $collection);
		$this->assertNotNull($updated);
    }
}

class TestOfDeleting extends UnitTestCase {	
	function testDeleting() {
		$file = 'file.jpg';
		$title = 'title';
		$type = 'type';
		$material = 'material';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$deleted = $image->delete();
		$this->assertNotNull($deleted);
		$image = Image::findByFile($file);
		$this->assertNull($image);
	}
}
?>