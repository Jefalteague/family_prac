<?php
/*a singleton for a dbconnection: https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php*/
class Connect_DB {

	private static $instance;
	private $connection;
	private $dsn;
	private $username;
	private $password;
	private $options;
	
	private function __construct($dsn, $username, $password, $options) {
		
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		$this->options = $options;
		
		try {
			$this->connection = new PDO($this->dsn, $this->username, $this->password, $this->options);
		}
		
		catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo $error_message;
			exit();
		}
		
	}
	
	public static function get_instance($dsn, $username, $password, $options) {
		
		if (empty(self::$instance)) {
			self::$instance = new Connect_DB($dsn, $username, $password, $options);
		}
		return self::$instance;
		
	}
	
	public function get_connection() {
		
		return $this->connection;
		
	}
	
}

?>