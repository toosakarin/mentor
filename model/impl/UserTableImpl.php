<?php

include_once './model/UserTable.php';
include_once './model/User.php';
include_once './model/impl/UserImpl.php';


class UserTableImpl extends UserTable {
	
	private static $TAG = "UserTableImpl";
	
	
	
	
	private function checkUserObj(User $user) {
		$isError = TRUE;
		do {
			if(empty($user)) break;
			if(empty($user->getAccount())) break;
			if(empty($user->getPasswoed())) break;
				
			$isError = FALSE;
		} while (false);
	
		return !$isError;
	}
	
	
	public function getUser($account) {
		
	}
	
	public function getAllUser() {
		$cmd = "SELECT * FROM " . UserTable::$TB_USER;
// 		$result = $this->CONN.mysql_query($cmd);
		
		$result = $this->CONN->query($cmd); 
		
		if($result->num_rows > 0)
			echo "getAllUser success!";
		
		$rtn = array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$user = new UserImpl();
				$user->setId($row[UserTable::$FD_ID]);
				$user->setAccount($row[UserTable::$FD_ACCOUNT]);
				$user->setPasswoed($row[UserTable::$FD_PASSWORD]);
				$user->setDeviceId($row[UserTable::$FD_DEVICE_ID]);
				$user->setCreateDate($row[UserTable::$FD_CREATE_DATE]);
				
				$rtn[] = $user;
				
				if(DEBUG::$IS_DEBUG)
					echo "id: " . $row["id"]. " - Name: " . $row["account"]. " " . $row["password"]. "<br>";
			}
		}
		
		
		return $rtn;
	}
	
	
	public function add($user) {
		if(!$this->checkUserObj($user)) return;
		if(!$this->isConnected()) return;
		
		$account = $user->getAccount();
		$ps = $user->getPasswoed();
		$cmd = "INSERT INTO User (id, " . UserTable::$FD_ACCOUNT . ", ". UserTable::$FD_PASSWORD 
			. ", " . UserTable::$FD_CREATE_DATE . ", " . UserTable::$FD_DEVICE_ID
			. ") VALUES (NULL, '$account', '$ps', CURRENT_TIMESTAMP, NULL);";
			
// 		$result = mysql_query($cmd);
// 		if($result)
// 			error_log(print_r("adds new record into User table of db ", TRUE));
		
		$result = $this->CONN->query($query);
		
		return $result;
	}
	
	public function update($user) {
		if(!$this->checkUserObj($user)) return;
		
		$id = $user->getId();
		$account = $user->getAccount();
		$ps = $user->getPasswoed();
		$device_id = $user->getDeviceId();
		$cmd = "UPDATE " . UserTable::$TB_USER . " SET " . 
				UserTable::$FD_ACCOUNT . "='$account,'" .
				UserTable::$FD_PASSWORD . "='$ps'," .
				UserTable::$FD_DEVICE_ID . "='$device_id' " .
				"WHEERE " . UserTable::$FD_ID . "='$id'";
		
		$result = mysql_query($cmd);
		
	}
	
	public function delete($user) {
		
	}
	
	
}

?>