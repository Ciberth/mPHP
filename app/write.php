<?php

require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Could not connect to the database, error: " . mysqli_connect_error());

$name = $_POST['name'];
$price = $_POST['price'];

echo $name . " " . $price . " will be written to db!".

$query = "INSERT INTO items (id, name, price) VALUES (NULL, $name , $price)";

$result = mysqli_query($conn, $query);

mysqli_close($conn);

?>
