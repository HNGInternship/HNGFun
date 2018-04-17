<?php

include("../config.php"); 

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT intern_id, name, username, image_filename FROM interns_data WHERE username='ibotyle' ";
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
  background-color: #bb4a03;
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
<title>Ibotyle: Awajis Ibotyle Profile</title>
</head>
<body>

<div class="card">
  <img src="<?php echo $imagelink; ?>" alt="Awajis" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2>
  <p class="title">Learner, HNG Internship 4</p>
  <p>I also blog at awajis.com</p>
  <div style="margin: 24px 0;">
    <a href="https://github.com/awajis/"><i class="fa fa-github"></i></a> 
    <a href="https://twitter.com/iamawajis"><i class="fa fa-twitter"></i></a>  
    <a href="https://facebook.com/awajis/"><i class="fa fa-facebook"></i></a> 

 </div>
 <p><a href="https://awajis.com/contact/"><button>Contact</button></a></p>
</div>

</body>
</html>