<?php
include_once './model/impl/UserImpl.php';
include_once './model/impl/UserTableImpl.php';
include_once './db/MySqlConnection.php';
include_once './Debug.php';


$_post = file_get_contents("php://input"); //get post data
$_post = base64_decode($_post); //decode data with base64
$_post = json_decode($_post, true); //transfor data to json
login($_post);

function login($_post) {
	$fd_un = 'username';
	$fd_pw = 'password';
	$fd_did = 'device_id';
	
	$_isError = true;
	do {
		// 	if(!isset($_POST[$fd_un])) break;
		// 	if(!isset($_POST[$fd_pw])) break;
		// 	if(!isset($_POST[$fd_did])) break;
	
		// 	$username = $_POST['username'];
		// 	$password = $_POST['password'];
		// 	$device_id = $_POST['device_id'];
		
		if($_post === NULL) {
			die('can not find any post parameters');
			break;
		}
		
		$username = $_post[$fd_un];
		$password = $_post[$fd_pw];
		$device_id = $_post[$fd_did];
	
	
		$db_conn = MySqlConnection::getInstance();
		$user_tb = new UserTableImpl($db_conn);
	
		$user = $user_tb->getUser($username);
		if($user === NULL) {
			die('can not find any user with given username');
			break;
		}
		if($password !== $user->getPasswoed()) {
			echo 'password failed!';
			die('die:password failed');
			break;
		}
	
		/**
		 * Do some login process
		 */
		
		//Updates the device id of gcm token 
		$user->setDeviceId($device_id);
		$user_tb->update($user);
		
		//Updates session for setting admin flag
		session_start();
		$_SESSION['admin'] = true;
		$_SESSION['device_id'] = $device_id;
	
		$s_timeout = 6 * 3600; //keeps 6 hours
		setcookie(session_name(), session_id(), time() + $s_timeout, "/");
	
		$_isError = false;
	} while(false);
	
	/**
	 * Responses the request for client
	 */
	$status_code = ($_isError) ?
		Response::RESPONSE_STATUS_FAILED : Response::RESPONSE_STATUS_SUCCESS;
	$response = new SimpleResponse($status_code);
	$response = $response->getEntity();
	header('Content-Type: application/json');
	echo $response;
}




