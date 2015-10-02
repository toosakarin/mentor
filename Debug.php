<?php

class DEBUG {
	public static $IS_DEBUG = TRUE;
	
	public static function dumpLog($class, $log) {
		error_log(print_r($class . $log, TRUE));
	}
}