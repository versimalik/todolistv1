<?php

$servername = "localhost";
$username = "root";
$password = "root021";
$db_name = "myappdb";

$connection = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($connection->connect_error) {
  die("Koneksi gagal: " . $connection->connect_error);
}

?>