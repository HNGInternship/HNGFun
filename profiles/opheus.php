<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config.php"); 

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT intern_id, name, username, image_filename FROM interns_data_ WHERE username='opheus' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$name = $row["name"];
		$username = $row["username"];
		$imagelink = $row["image_filename"];
    }
} else {
    echo "NO USER FOUND";
}



mysqli_close($conn);


$sql2 = "SELECT secret_word FROM secret_word";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
		$secret_word = $row["secret_word"];
    }
} else {
    echo "NO SECRET KEY";
}
?> 
