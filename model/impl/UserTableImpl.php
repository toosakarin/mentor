<?php

include_once './model/UserTable.php';
include_once './model/User.php';
include_once './model/impl/UserImpl.php';
include_once './conn/SimpleResponse.php';


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
	
	
	public function getUser($username) {
		$rtn = NULL;
		$cmd = 'SELECT * FROM ' . UserTable::$TB_USER . ' WHERE '
			. UserTable::$FD_ACCOUNT . "='$username'";
// 		$cmd = 'SELECT' . UserTable::$FD_ACCOUNT . ', ' . UserTable::$FD_PASSWORD
// 			. ' FROM ' . UserTable::$TB_USER;
		
		$result = $this->CONN->query($cmd);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$rtn = new UserImpl();
			$rtn->setId($row[UserTable::$FD_ID]);
			$rtn->setAccount($row[UserTable::$FD_ACCOUNT]);
			$rtn->setPasswoed($row[UserTable::$FD_PASSWORD]);
			$rtn->setDeviceId($row[UserTable::$FD_DEVICE_ID]);
			$rtn->setCreateDate($row[UserTable::$FD_CREATE_DATE]);
		}
		
		return $rtn;
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
	
	/**
	 * Not implemented.
	 * @see UserTable::getOnlineUser()
	 */
	public function getOnlineUser() {
	}
	
	public function add($user) {
		if(!$this->checkUserObj($user)) return;
		if(!$this->isConnected()) return;
		
		$account = $user->getAccount();
		$ps = $user->getPasswoed();
		$device_id = $user->getDeviceId();
		$cmd = "INSERT INTO User (id, " . UserTable::$FD_ACCOUNT . ", ". UserTable::$FD_PASSWORD 
			. ", " . UserTable::$FD_CREATE_DATE . ", " . UserTable::$FD_DEVICE_ID
			. ") VALUES (NULL, '$account', '$ps', CURRENT_TIMESTAMP, '$device_id');";
			
// 		$result = mysql_query($cmd);
// 		if($result)
// 			error_log(print_r("adds new record into User table of db ", TRUE));
		
		$result = $this->CONN->query($cmd);
		
		return $result;
	}
	
	public function update($user) {
		if(!$this->checkUserObj($user)) return;
		
		$id = $user->getId();
		$account = $user->getAccount();
		$ps = $user->getPasswoed();
		$device_id = $user->getDeviceId();
		$cmd = 'UPDATE ' . UserTable::$TB_USER . ' SET ' . 
				UserTable::$FD_ACCOUNT . "='$account', " .
				UserTable::$FD_PASSWORD . "='$ps', " .
				UserTable::$FD_DEVICE_ID . "='$device_id' " .
				'WHERE ' . UserTable::$FD_ID . "=$id";
		
		$result = $this->CONN->query($cmd);
		
		return $result;
	}
	
	public function delete($user) {
		
	}
	
	
}

?>