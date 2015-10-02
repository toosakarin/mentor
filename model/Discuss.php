<?php

interface Discuss {
	public function getId();
	
	public function getUserId();
	
	public function getDeckId();
	
	public function getSubjectId();
	
	public function getContnet();
	
	public function getDate();
	
	public function setUserId($id);
	
	public function setDeckId($id);
	
	public function setSubjectId($id);
	
	public function setDate();
}

?>