<?php

include_once './conn/Response.php';


class SimpleResponse implements Response {
	
	
	private $status_code;
	
	public function __construct($code) {
		$this->status_code = $code;
	}
	
	public function getEntity() {
		$message = ($this->status_code === Response::RESPONSE_STATUS_SUCCESS) ?
			Response::RESPONSE_MSG_SUCCESS : Response::RESPONSE_MSG_FAILED; 
		$json = array(
				Response::RESPONSE_FD_STATUS => $this->status_code, 
				Response::RESPONSE_FD_DESCRIPTION => $message
		);
		
		return json_encode($json);
	}
}