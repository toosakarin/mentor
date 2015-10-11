<?php

include_once './model/Table.php';

abstract class UserTable extends Table {
	
	public static $TB_USER = "User";
	public static $FD_ID = "id";
	public static $FD_ACCOUNT = "account";
	public static $FD_PASSWORD = "password";
	public static $FD_CREATE_DATE = "create_date";
	public static $FD_DEVICE_ID = "device_id";
	
	public abstract function getUser($account);
	
	public abstract function getAllUser();
	
	public abstract function getOnlineUser();
	
// 	public abstract function addUser(User $user);
	
// 	public abstract function upateUser(User $user);
	
// 	public abstract function deleteUser(User $user);
}

?>