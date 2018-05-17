<!DOCTYPE 
html>
<html>

<head>
<!--<link rel="stylesheet" href="https://res.cloudinary.com/uuujuuu/image/upload/v1526014279/IMG_0681.jpg"> -->

<style>
body{
 background-image: url(boats.jpg);
 background-size: cover;
}

.card {
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 max-width: 300px;
 margin: auto;
 text-align: center;
 font-family: arial;
}

.title {
 color: black;
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
<?php
    if(!defined('DB_USER')){
    require "../../config.php"; 
    try {
        $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
    } catch (PDOException $pe) {
        die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
    }
  }
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="Uuujuuu"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $my_data = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>
<body>
    <br>
    <br>
    <br>

<h2 style="text-align:center">Profile</h2>

<div class="card">
 <img src="https://res.cloudinary.com/uuujuuu/image/upload/v1526014279/IMG_0681.jpg" alt="Uuujuuu" style="width:100%">
 <h1> <?=$my_data['name'] ?> </h1>
 Username: <?=$my_data['username'] ?>
 <p class="title">Front End Web Developer</p>
 <div style="margin: 24px 0;">

   <a href="#"><i class="fa fa-twitter"></i></a>  
   <a href="#"><i class="fa fa-linkedin"></i></a  
   <a href="#"><i class="fa fa-facebook"></i></a>

</div>
<p><button>Contact</button></p>
</div>



</body>
</html>