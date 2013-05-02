<?php

class Image
{
	private $id;
	private $file;
	private $title;
	private $type;
	private $material;
	private $period;
	private $find;
	private $country;
	private $fdate;
	private $collection;
	
	private function __construct($id, $file, $title, $type, $material, $period, $find, $country, $fdate, $collection) {
		$this->id = $id;
		$this->file = $file;
		$this->title = $title;
		$this->type = $type;
		$this->material = $material;
		$this->period = $period;
		$this->find = $find;
		$this->country = $country;
		$this->fdate = $fdate;
		$this->collection = $collection;
	}
	
	//called to insert into database
	public static function create($file, $title, $type, $material, $period, $find, $country, $fdate, $collection) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		if(is_null($mysqli)){
			return "connection not made";
		}
		$result = $mysqli->query("INSERT INTO image VALUES (0, '" .  $file . "', '" . $title . "', '" . $type . "', '" . $material . "', '" . $period . "', '" . $find . "', '" . $country . "', '" . $fdate . "', '" . $collection ."')");
		if ($result) {
			$new_id = $mysqli->insert_id;
			return new Image($new_id, $file, $title, $type, $material, $period, $find, $country, $fdate, $collection);
		}
		return null;
	}

	public static function findByID($id) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM image WHERE id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$image_info = $result->fetch_array();
			return new Image(intval($image_info['id']),
					       $image_info['file'],
					       $image_info['title'],
					       $image_info['type'],
						   $image_info['material'],
						   $image_info['period'],
						   $image_info['find'],
					       $image_info['country'],
						   $image_info['date'],
						   $image_info['collection']);
		}
		return null;
	}
	
	public static function findByFile($file) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM image WHERE file = '" . $file . "'");
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$image_info = $result->fetch_array();
			return new Image(intval($image_info['id']),
					       $image_info['file'],
					       $image_info['title'],
					       $image_info['type'],
						   $image_info['material'],
						   $image_info['period'],
						   $image_info['find'],
					       $image_info['country'],
						   $image_info['date'],
						   $image_info['collection']);
		}
		return null;
	}
	
	public static function findByType($type) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM `image` WHERE type='" . $type . "'");
		if($result){
			$images = array();
			$i = 0;
			$j = $next_row = $result->num_rows;
			while($i < $j){
				$next_row = $result->fetch_row();
				$images[] = Image::findByID($next_row[0]);
				$i = $i + 1;
			}
			return $images;
		}
		return null;
	}
	
	public static function findByMaterial($material) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM `image` WHERE material='" . $material . "'");
		if($result){
			$images = array();
			$i = 0;
			$j = $next_row = $result->num_rows;
			while($i < $j){
				$next_row = $result->fetch_row();
				$images[] = Image::findByID($next_row[0]);
				$i = $i + 1;
			}
			return $images;
		}
		return null;
	}
	
	public static function findByPeriod($period) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM `image` WHERE period='" . $period . "'");
		if($result){
			$images = array();
			$i = 0;
			$j = $next_row = $result->num_rows;
			while($i < $j){
				$next_row = $result->fetch_row();
				$images[] = Image::findByID($next_row[0]);
				$i = $i + 1;
			}
			return $images;
		}
		return null;
	}
	
	public static function findByCountry($country) {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT * FROM `image` WHERE country='" . $country . "'");
		if($result){
			$images = array();
			$i = 0;
			$j = $next_row = $result->num_rows;
			while($i < $j){
				$next_row = $result->fetch_row();
				$images[] = Image::findByID($next_row[0]);
				$i = $i + 1;
			}
			return $images;
		}
		return null;
	}

	public static function getAll(){
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("SELECT id FROM photo");
		$images = array();
		foreach($result as $r){
			$next_row = $result->fetch_row();
			if($next_row){
				$images[] = User::findByID($next_row[0]);
			}
		}
		return $images;
	}


	public function getID() {
		return $this->id;
	}
	
	public function getFile() {
		return $this->file;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle($new_val) {
		$this->title = $new_val;
		return $this->update();
	}

	public function getType() {
		return $this->type;
	}
	
	public function setType($new_val) {
		$this->type = $new_val;
		return $this->update();
	}
	
	public function getMaterial(){
		return $this->material;
	}

	public function setMaterial($new_val) {
		$this->material = $new_val;
		return $this->update();
	}
	
	public function getPeriod(){
		return $this->period;
	}
	
	public function setPeriod($new_val) {
		$this->period = $new_val;
		return $this->update();
	}
	
	public function getFind() {
		return $this->find;
	}
	
	public function setFind($new_val) {
		$this->find = $new_val;
		return $this->update();
	}

	public function getCountry() {
		return $this->country;
	}
	
	public function setCountry($new_val) {
		$this->type = $new_val;
		return $this->update();
	}
	
	public function getDate(){
		return $this->fdate;
	}

	public function setDate($new_val) {
		$this->fdate = $new_val;
		return $this->update();
	}
	
	public function getCollection(){
		return $this->collection;
	}
	
	public function setCollection($new_val) {
		$this->collection = $new_val;
		return $this->update();
	}
	
	//called to update
	public function setAll($title, $type, $material, $period, $find, $country, $fdate, $collection) {
		$this->title = $title;
		$this->type = $type;
		$this->material = $material;
		$this->period = $period;
		$this->find = $find;
		$this->country = $country;
		$this->fdate = $fdate;
		$this->collection = $collection;
		return $this->update();
	}

	public function getJSON() {
	  $json_rep = array();
	  $json_rep['id'] = $this->id;
	  $json_rep['file'] = $this->file;
	  $json_rep['title'] = $this->title;
	  $json_rep['type'] = $this->type;
	  $json_rep['material'] = $this->material;
	  $json_rep['period'] = $this->period;
	  $json_rep['find'] = $this->find;
	  $json_rep['country'] = $this->country;
	  $json_rep['fdate'] = $this->fdate;
	  $json_rep['collection'] = $this->collection;
	  return $json_rep;
	}

	//called to delete from database
	public function delete() {
	  $mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
	  $result = $mysqli->query("DELETE FROM `image` WHERE `id` = " . $this->id);
	  return $result;
	}

	//called by setters to submit updates to database
	private function update() {
		$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
		$result = $mysqli->query("UPDATE image SET title = '" . mysqli_real_escape_string($mysqli, $this->title) . "', type = '" . mysqli_real_escape_string($mysqli, $this->type) . "', material = '" . 
									mysqli_real_escape_string($mysqli, $this->material) . "', period = '" . mysqli_real_escape_string($mysqli, $this->period) . "', find = '" . mysqli_real_escape_string($mysqli, $this->find) . 
									"', country = '" . mysqli_real_escape_string($mysqli, $this->country) . "', date = '" . mysqli_real_escape_string($mysqli, $this->fdate) . 
									"', collection = '" . mysqli_real_escape_string($mysqli, $this->collection) . "' WHERE id = " . $this->id);
		return $result;
	}
}
?>