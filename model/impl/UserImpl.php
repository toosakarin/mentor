<?php

include_once './model/User.php';

class UserImpl implements User {
	
	private $id;
	private $user;
	private $password;
	private $create_date;
	private $device_id;

	
	public function getId() {
		return $this->id;
	}
	
	public function getDeviceId() {
		return $this->device_id;
	}
	
	public function getAccount() {
		return $this->user;
	}
	
	public function getPasswoed() {
		return $this->password;
	}
	
	public function getCreateDate() {
		return $this->create_date;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setDeviceId($device_id) {
		$this->device_id = $device_id;
	}
	
	public function setAccount($account) {
		$this->user = $account;
	}
	
	public function setPasswoed($password) {
		$this->password = $password;
	}
	
	public function setCreateDate($date) {
		$this->create_date = $date;
	}
	
}