
<?php

$secret_word = "";
$secret_query = "SELECT * FROM secret_word WHERE id = 1";
$data = "SELECT * FROM interns_data WHERE intern_id = 15";
$query1 = mysqli_query($conn, "SELECT * FROM interns_data WHERE intern_id = 15");
while($res = mysqli_fetch_array($query1)){
$name = $res['name'];
$username = $res['username'];
$image_filename = $res['image_filename'];
}
$query2 = mysqli_query($conn, "SELECT * FROM secret_word WHERE id = 1");
while($res = mysqli_fetch_array($query2)){
    $secret_word = $res['secret_word'];
}
?>


<!DOCTYPE html>
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

<div class="card">
  <img src="http://res.cloudinary.com/nwakristi/image/upload/v1526298391/nwakristi.jpg" alt="Michael Ebuka" style="width:100%">
   <h1>Michael Ebuka</h1>
  <p class="title">Full Stack Developer</p>
  <p>hotels.ng</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-facebook"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-instagram"></i></a>  
    
 </div>
 <p><button></button></p>
</div>

</body>
</html>
