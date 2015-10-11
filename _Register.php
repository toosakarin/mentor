<?php
include_once './model/impl/UserImpl.php';
include_once './model/impl/UserTableImpl.php';
include_once './db/MySqlConnection.php';
include_once './Debug.php';

$rtn = parsePOST();
echo "<br/>";
echo "register was done with rtn=" . $rtn;


function parsePOST() {
	$tag_user_name = "user_name";
	$tag_user_pass = "user_password";
	$tag_device_id = "user_device_id";
	
	//Gets the post data of json
	$_post = file_get_contents("php://input"); //get post data 
	$_post = base64_decode($_post); //decode data with base64
	$_post = json_decode($_post, true); //transfor data to json 
// 	$_post = json_decode(file_get_contents("php://input"), true);
// 	$_post = file_get_contents("php://input");
// 	$_post = urldecode($_post);
	if(DEBUG::$IS_DEBUG)
		print_r($_post);
	
	$isError = true;
	if($_post !== NULL) { 
		echo 1;
		//Puts the user data into object
		$user = new UserImpl();
		$user->setAccount($_post[$tag_user_name]);
		$user->setPasswoed($_post[$tag_user_pass]);
		$user->setDeviceId($_post[$tag_device_id]);
		
		//Registers this user to database
		$db_conn = MySqlConnection::getInstance();
		$user_tb = new UserTableImpl($db_conn);
		$user_tb->add($user);
		
		$isError = false;
	}
	
	return !$isError;
}