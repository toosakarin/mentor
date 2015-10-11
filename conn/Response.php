<?php

interface Response {
	
	const RESPONSE_STATUS_SUCCESS = 1;
	const RESPONSE_STATUS_FAILED = 0;
	
	const RESPONSE_FD_STATUS = 'success';
	const RESPONSE_FD_DESCRIPTION = 'message';
	
	const RESPONSE_MSG_SUCCESS = 'request was success';
	const RESPONSE_MSG_FAILED = 'request was failed';
	
	public function getEntity();
}