<?php

include_once './DEBUG.php';
include_once './db/MySqlConnection.php';
include_once './model/impl/UserTableImpl.php';

if(isset($_GET['test'])) { //chekcs the paramenter 'test' is exist
	switch ($_GET['test']) {
		case 1: //testRegister
			testRegister();
			break;
			
	}
}
else { 
	echo "<h1>nothing</h1>";
}

function testUserTable() {
	$conn = MySqlConnection::getInstance();
	echo "<br/> done <br/>";
	
	$table = new UserTableImpl($conn);
	
	$result = $table->getAllUser();
	// if ($result->num_rows > 0) {
	// 	// output data of each row
	// 	while($row = $result->fetch_assoc()) {
	// 		echo "id: " . $row["id"]. " - Name: " . $row["account"]. " " . $row["password"]. "<br>";
	// 	}
	// }
	print_r($result);
}

function testRegister() {
	header("Location: ./test/testRegister");
	die();
}