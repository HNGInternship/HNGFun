<?php

require 'db.php';


   $result = $conn->query("SELECT * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("SELECT * from interns_data where username = 'Adetay0'");
   $user = $result2->fetch(PDO::FETCH_OBJ);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">

    <title>Adetay0 </title>
</head>
<body>
<style>
body{
    margin:0;
    padding:0;
    width:100%;
    height:100%;
    background: url ("http://res.cloudinary.com/adetayo/image/upload/v1524582510/00730_HD.jpg");
    background-cover:no-repeat;

}
#name{
    font-family: 'Niconne', cursive;
    font-size:1.2rem;

}


</style>
<div class="jumbotron">
  <h1 class="display-4">Hello, Everyone</h1>
  <p class="lead">This is a summary of my profile and skills</p>

<div id="profilePic"></div>
<div id="name"><?= $user->name?>  @<?= $user->username?></div>
<div id="skills">Web developer</div>
<div id="social">
<center>
<a href="https://twitter.com/babalasisi">
<span>

<i class="fab fa-twitter"></i>
</span>
</a>
<a href="https://github.com/adetyaz">
<span>
<i class="fab fa-github"></i>
</span>



</a>

</center>

</div>

</div>


</style>
    



</body>
</html>
