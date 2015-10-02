<?php

abstract class Table {
	protected $CONN = NULL;
	
	public abstract function add($obj);
	public abstract function delete($obj);
	public abstract function update($obj);
	
	public function __construct(mysqli $conn) {
		$this->CONN = $conn;
	}
	
	public function getSqlConnection() {
		return $this->CONN;
	}
	public function setSqlConnection($conn) {
		$this->CONN = $conn;
	}

	public function isConnected() {
		$isError = TRUE;
		do {
			if(empty($this->CONN)) break;
			if($this->CONN->connect_error) break;
			
			$isError = FALSE;
		} while(false);
		
		return !$isError;
	}
	
	public function query($cmd) {
		if(empty(cmd)) return;
		if($this->CONN) {
			return $this->CONN.mysql_query($cmd);
		}
	}
}