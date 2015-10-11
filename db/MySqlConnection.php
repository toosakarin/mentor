<?php

class MySqlConnection {
	
	private static $TAG = "MySqlConnection";
	
	private static $DB_HOST		= "localhost";
	private static $DB_USER		= "jack";
	private static $DB_PS		= "25082797";
	private static $DB_DATABASE	= "magic_mentor";
	
	private static $INSTANCE;
	
	private function __construct() {
		
	}
	
	public static function getInstance() {
		if(!empty($INSTANCE))
			MySqlConnection::close(MySqlConnection::$INSTANCE);
		
		MySqlConnection::$INSTANCE = 
			new mysqli(MySqlConnection::$DB_HOST, 
					MySqlConnection::$DB_USER, 
					MySqlConnection::$DB_PS, 
					MySqlConnection::$DB_DATABASE);
		
		if(MySqlConnection::$INSTANCE->connect_error) {
			DEBUG::dumpLog(MySqlConnection::$TAG, "can't connect to db!");
		}
		
		return MySqlConnection::$INSTANCE;
	}
	
	public static function close(mysqli $conn) {
		$conn->close();
		$conn = NULL;
	}
	
}

?>