<?php
$servername = "192.168.121.187";
$username = "first_year";
$password = "first_year";
$dbname = "first_year_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
} 

?>
