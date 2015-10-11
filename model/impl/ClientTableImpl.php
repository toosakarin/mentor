<?php

include_once './model/ClientTable.php';

class ClientTableImpl extends ClientTable {
	
	const TAG = "ClientTableImpl";
	
	public function getClientList() {
		$sql = 'SELECT device_id FROM User WHERE device_id IS NOT NULL';

		$sql_result = $this->CONN->query($sql);
		if($result->num_rows > 0) {
			$rtn = array();
			while($row = $sql_result->fetch_assoc()) {
				$rtn[] = $row[0];
			}
			return $rtn;
		}
		
		return NULL;
	}
	
	/**
	 * @deprecated
	 */
	public function add($obj) {
		
	}
	/**
	 * @deprecated
	 */
	public function update($obj) {
		
	}
	/**
	 * @deprecated
	 */
	public function delete($obj) {
		
	}
	
}