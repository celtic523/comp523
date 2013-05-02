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
		//test inserting a normal image
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
		$image = Image::findByType($type);
		$this->assertNotNull($image);
    }
}

class TestOfDeleting extends UnitTestCase {	
	function testDeleting() {
		$file = 'file.jpg';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$deleted = $image->delete();
		$this->assertNotNull($deleted);
		$image = Image::findByFile($file);
		$this->assertNull($image);
	}
}

class TestOfUploading2 extends UnitTestCase {
    function testCreating() {
		$file = 'file.jpg';
		$title = 'hello@world';
		$type = 'type';
		$material = 'material';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		//test inserting an image with @ in a text field
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

class TestOfSearching2 extends UnitTestCase {	
	function testSearching() {
		$file = 'file.jpg';
		$title = 'hello@world';
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

class TestOfUpdating2 extends UnitTestCase {	
	function testUpdating() {
		$file = 'file.jpg';
		$title = 'title1';
		$type = 'type@';
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
		$image = Image::findByType($type);
		$this->assertNotNull($image);
    }
}

class TestOfDeleting2 extends UnitTestCase {	
	function testDeleting() {
		$file = 'file.jpg';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$deleted = $image->delete();
		$this->assertNotNull($deleted);
		$image = Image::findByFile($file);
		$this->assertNull($image);
	}
}

class TestOfUploading3 extends UnitTestCase {
    function testCreating() {
		$file = 'file.jpg';
		$title = 'hello!world';
		$type = 'type';
		$material = 'material';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		//test inserting an image with ! in a text field
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

class TestOfSearching3 extends UnitTestCase {	
	function testSearching() {
		$file = 'file.jpg';
		$title = 'hello!world';
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

class TestOfUpdating3 extends UnitTestCase {	
	function testUpdating() {
		$file = 'file.jpg';
		$title = 'title1';
		$type = 'type!';
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
		$image = Image::findByType($type);
		$this->assertNotNull($image);
    }
}

class TestOfDeleting3 extends UnitTestCase {	
	function testDeleting() {
		$file = 'file.jpg';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$deleted = $image->delete();
		$this->assertNotNull($deleted);
		$image = Image::findByFile($file);
		$this->assertNull($image);
	}
}

class TestOfUploading4 extends UnitTestCase {
    function testCreating() {
		$file = 'file.jpg';
		$title = 'hello?world';
		$type = 'ty<>pe';
		$material = 'mat/erial';
		$period = 'period';
		$find = 'find';
		$country = 'country';
		$date = 'date';
		$collection = 'collection';
		//test inserting an image with @ in a text field
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

class TestOfSearching4 extends UnitTestCase {	
	function testSearching() {
		$file = 'file.jpg';
		$title = 'hello?world';
		$type = 'ty<>pe';
		$material = 'mat/erial';
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

class TestOfUpdating4 extends UnitTestCase {	
	function testUpdating() {
		$file = 'file.jpg';
		$title = 'ti$tle1';
		$type = 'ty+pe!';
		$material = 'material1';
		$period = 'peri>od1';
		$find = 'find1';
		$country = 'cou@ntry1';
		$date = 'date1';
		$collection = 'collection1';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$updated = $image->setAll($title, $type, $material, $period, $find, $country, $date, $collection);
		$this->assertNotNull($updated);
		$image = Image::findByType($type);
		$this->assertNotNull($image);
    }
}

class TestOfDeleting4 extends UnitTestCase {	
	function testDeleting() {
		$file = 'file.jpg';
		$image = Image::findByFile($file);
		$this->assertNotNull($image);
		$deleted = $image->delete();
		$this->assertNotNull($deleted);
		$image = Image::findByFile($file);
		$this->assertNull($image);
	}
}
?>