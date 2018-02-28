<?php

require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Could not connect to the database, error: " . mysqli_connect_error());

$result = mysqli_query($conn, "SELECT * FROM items");

while($row = $result->mysqli_fetch_array()) {
	echo $row['id'] . ": " $row['name'] . " and costs " . $row['price'] . " euro.";
	echo "<br />";

}

mysqli_close($conn);

?>
