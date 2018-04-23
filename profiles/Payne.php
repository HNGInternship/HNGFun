<?php
require'db.php';
$result = $conn->query("Select * from secret_word LIMIT 1");
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;
$result2 = $conn->query("Select * from interns_data where username='payne'");
$user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Payne's profile</title>
  <link rel="stylesheet" type="text/css" href="https://dl.dropbox.com/s/hnv73t0qrwloeen/main.css?dl=0">
</head>
<body>
	<div id="remember">
  <img src="http://res.cloudinary.com/payne/image/upload/v1523618155/first_cloud_upload.png" alt="payne" />
  <h1 id="first_heading">👋<b>Hello</b></h1> 
<p id="first_paragraph">My name is Peter Amugen, a front end programmer and budding designer</p>
<br> <hr> <br>
  <footer>
  	<tr id="Work">
  		<th><a href="amugenp@gmail.com" class="boing">Email</a></th>
  		<th><a href="https://github.com/PetyrPayne" class="boing">Github</a></th>
  		<th><a href="https://web.facebook.com/Payyne" class="boing">Facebook</a></th>
  	</tr>
  </table>
  </footer>
</div>
</body>
</html>
