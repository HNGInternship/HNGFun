<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hng_fun";
// Create connection
$conn = new mysqli($servername,$username,$password, $dbname);

// Check connection
if ($conn->connect_error)
  {
  die ("Failed to connect to MySQL: " . $conn->connect_error);
  }

?>