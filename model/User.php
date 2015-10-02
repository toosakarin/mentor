<?php

interface User {
	public function getId();
	
	public function getDeviceId();
	
	public function getAccount();
	
	public function getPasswoed();
	
	public function getCreateDate();
	
	public function setId($id);
	
	public function setDeviceId($device_id);
	
	public function setAccount($account);
	
	public function setPasswoed($password);
	
	public function setCreateDate($date);
}

?>
