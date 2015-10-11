<?php
include_once('./conn/ResponseAsyn.php');
include_once('./Debug.php');

class GCMSender implements ResponseAsyn {
	
	public static $TAG = "GCMSender";
	
	private static $GOOGLE_API_KEY = "";
	public static $GCM_URL = "https://android.googleapis.com/gcm/send";
	
	public function push($clients, $msg) {
		
		$headers = array(
				'Authorization: key=' . GCMSender::$GOOGLE_API_KEY,
				'Content-Type: application/json'
		);
		$fields = array(
				'registration_ids' => $registatoin_ids,
				'data' => $message,
		);
		
		/**
		 * Sends the gcm request to google service
		 */ 
		$ch = curl_init();
		
		//Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, GCMSender::$GCM_URL);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Disabling SSL Certificate support temporarly
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		
		//Executes post
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		
		//Closes connection
		curl_close($ch);
		
		if(DEBUG::$IS_DEBUG)
			echo $result;
	}
}