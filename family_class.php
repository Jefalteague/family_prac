<?php
/*persistance class for working with family table in database*/
class Family_db {
	public static function get_families($dsn, $username, $password, $options) { 
		$instance = Connect_DB::get_instance($dsn, $username, $password, $options);
		$db = $instance->get_connection();
	
		$query = 'SELECT * FROM family';
		$statement = $db->prepare($query);
		$statement->execute();
	
		$family_array = array();
		
		foreach($statement as $row) {
			
			$family = new Family($row['family_id'], $row['science_name'], $row['common_name']);
			$family_array[] = $family;
			
		}
		return $family_array;
	}
}

/*view class for working with presentation at runtime*/
class Family {
	
	private $family_id;
	private $science_name;
	private $common_name;
	
	function __construct($family_id, $science_name, $common_name) {
		$this->family_id = $family_id;
		$this->science_name = $science_name;
		$this->common_name = $common_name;
	}
	
	public function get_family_id() {
		return $this->family_id;
	}
	
	public function get_science_name() {
		return $this->science_name;
	}
	
	public function get_common_name() {
		return $this->common_name;
	}
}

class Genera_db {
	public static function get_genera($dsn, $username, $password, $options) {
		$instance = Connect_DB::get_instance($dsn, $username, $password, $options);
		$db = $instance->get_connection();
		
		$query = 'SELECT * FROM genera';
		$statement = $db->prepare($query);
		$statement->execute();
		
		$genera_array = array();
		
		foreach($statement as $row) {
			$genus = new Genus($row['genus_id'], $row['science_name'], $row['common_name']);
			$genera_array[] =  $genus;
		}
		return $genera_array;
	}
	
}

class Genus {
	
	private $genus_id;
	private $science_name;
	private $common_name;
	
	function __construct($gen_id, $gen_sci_name, $gen_com_name) {
		$this->id = $gen_id;
		$this->science_name = $gen_sci_name;
		$this->common_name = $gen_com_name;
	}
	
	public function get_genus_id() {
		return $this->id;
	}
	
	public function get_science_name() {
		return $this->science_name;
	}
	
	public function get_common_name() {
		return $this->common_name;
	}
}

?>