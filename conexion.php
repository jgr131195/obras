<?php
// datos para la conexion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','obras');
define('DB_USER','root');
define('DB_PASS','');

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
