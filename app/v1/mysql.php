<?php

require 'mysql_configure.php';

$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$databasename = "mtest";
$db_found = mysqli_select_db($db_handle, $databasename);

if($db_found) {
	print "<h1>Metadata:</h1>";
	print "Db " . $databasename . " found!<br>";
	
	$version = mysqli_get_server_version($db_handle);
	$info = mysqli_get_server_info($db_handle);
	$stats = mysqli_get_host_info($db_handle);	

	print "Version: " . $version . "<br>";
	print "Info: " . $info . "<br>";
	print "Host info: " . $stats . "<br>";

	print "<h1>Contents of db:</h1>";
	$query = "SELECT * FROM items";
	$resultquery = mysqli_query($db_handle, $query);

	while($db_field = mysqli_fetch_assoc($resultquery)) {
		print "<hr>";
		print "ID: " . $db_field['id'] . "<br>";
		print "Item: " . $db_field['name'] . "<br>";
		print "Price: " . $db_field['price'] . "<br>";
		print "<hr>";
	} 	

} else {
	print "Db " . $databasename . " not found";
}


mysqli_close($db_handle);

?>
