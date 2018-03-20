<?php

echo "ttest";

$db_user = "root";
$db_pass = "0aff6e84-cbf3-4234-8a8b-93f590b68bb5";
$db_host = "10.10.138.49";
$db_db = "test";

$db_handle = mysqli_connect($db_host, $db_user, $db_pass, $db_db) or die("Unable to connect to MySQL");

echo " error: " . mysqli_connect_errno() . PHP_EOL;

echo "Connected to Mysql<br>";

//$result = mysql_query("SELECT id, name, price FROM items");

//while($row = mysql_fetch_array($result)) {
//	echo "ID:" . $row{'id'} . " Name:" . $row{'name'} . " Price:" . $row{'price'} . "<br>";
//}


$query = "SELECT * FROM items";
mysqli_query($db_handle, $query) or die('euhm');


mysqli_close($db_handle);


?>
