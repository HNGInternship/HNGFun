<?php

include("../config.php"); 

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

mysqli_close($conn);



?> 
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>

<div class="card">
  <img src="<?php echo $imagelink; ?>" alt="John" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2>
  <p class="title">Web Designer &#38; Developer, UI/UX Designer</p>
  <p>Delta State Univeristy (B.Sc Physics)</p>
  <p>Nigeria</p>
  <div style="margin: 24px 0;">
    <a href="https://t.me/opheus"><i class="fa fa-telegram"></i></a> 
    <a href="https://twitter.com/orpheusohms"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/orpheusohms/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/j.ominiabohs"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>

</body>
</html>
