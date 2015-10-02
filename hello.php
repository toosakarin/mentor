<?php

include_once './DEBUG.php';
include_once './db/MySqlConnection.php';
include_once './model/impl/UserTableImpl.php';

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

?>