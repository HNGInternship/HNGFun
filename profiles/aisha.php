<?php
require('db.php');
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$result = mysqli_query($connect, "SELECT * FROM secret_word");
<<<<<<< HEAD
$secret_word = mysqli_fetch_assoc($result)['secret_word'];
=======
$secret_word = mysqli_fetch_assoc($result);
>>>>>>> Update profile
$result = mysqli_query($connect, "SELECT * FROM interns_data WHERE username = 'aisha'");
if($result) $my_data = mysqli_fetch_assoc($result);
else {echo "An error occored";}
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

<h2 style="text-align:center">User Profile </h2>

<div class="card">
<<<<<<< HEAD
  <img src="http://res.cloudinary.com/aamoka/image/upload/c_scale,r_8,w_247/v1524226007/aisha.jpg">
=======
  <img src="http://res.cloudinary.com/aamoka/image/upload/c_scale,r_26,w_166/v1524226007/aisha.jpg">
>>>>>>> Update profile
  <h1>Aisha Amoka</h1>
  <p class="title">System analyst & Founder, Makifa Network</p>
  <p>Abuja</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>

</body>
</html>