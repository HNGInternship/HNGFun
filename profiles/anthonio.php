<?php
$query = $conn->query("SELECT * FROM secret_word");
$result = $query->fetch(PDO::FETCH_ASSOC);
$secret_word = $result['secret_word'];
?>
<!doctype html>
<html>

<head>
<title>anthonio</title>
<style>
body {
    position: relative;
    background-image: url("https://res.cloudinary.com/anthoo/image/upload/v1523648446/IMG_6068.jpg");
    background-repeat:no-repeat;
    background-size:100% 100vh;
    font-family: Brandon Grotesque;
    color: white;
   
}

h3 {
	 text-align: center;
     
     font-family: Brandon Grotesque;
     color: white;
     left: 0;
     height: 100%;
     width: 100%;
     display: flex;
     position: fixed;
     align-items: center;
     justify-content: center;
     
    

 }

  img {
  	 
     width: 180px;
     height: 181px;
     position: fixed;
     border-radius: 462px;
     
}
 
</style>
</head>

<body>


 <h3>
 <img src="https://res.cloudinary.com/anthoo/image/upload/v1523649711/IMG_5019.jpg">

 <br><br><br><br><br><br> <br><br><br><br><br><br>
 MADUADICHIE Anthonio<br>Web Developer<br>Photographer<br>Graphics Designer<br>Intern at Hotel.ng
</h3>
 



</body>
 <?php
require 'db.php';
$username = "anthonio";
$data = $conn->query("SELECT * FROM  interns_data WHERE username = '".$username."' ");
$my_data = $data->fetch(PDO::FETCH_BOTH);
$name = $my_data['name'];
$username =$my_data['username'];
$img = $my_data['image_filename'];
?>
  
</html>