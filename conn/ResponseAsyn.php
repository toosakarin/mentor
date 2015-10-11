<?php

interface ResponseAsyn {
	public function push($clients, $msg);
}