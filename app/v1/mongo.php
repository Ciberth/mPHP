<?php
ini_set('display_errors', 'On');
require 'mongo_configure.php';

//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$manager = new MongoDB\Driver\Manager("mongodb://" . DB_HOST . ":" . DB_PORT); 

print "<h1>Metadata:</h1>";

var_dump($manager);


//$databasename = "mongotest";
//$collectionname = "stuff";

$databasename = DB_NAME;
$collectionname = DB_COLLECTION;

$query = new MongoDB\Driver\Query([]);

print "$databasename."."$collectionname";

//$rows = $manager->executeQuery("$databasename."."$collectionname", $query);
$rows = $manager->executeQuery("mongotest.stuff", $query);

print "<h1>Contents:</h1>";

foreach ($rows as $item) {
	print "<hr>";
	print $item->_id . "<br>";
	print $item->name . "<br>";
	print $item->price . "<br>";
	print "<hr>";
}

?>
