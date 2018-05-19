<?php
include('../../db.php');


$query = "SELECT * FROM users";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
while($row){
	echo $row['first_name'];
	echo $row['email'];
}

else{
	echo "nothing found";
}
?>