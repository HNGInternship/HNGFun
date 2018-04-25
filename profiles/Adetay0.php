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
    <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
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
#profilePic{
    
    height:30%;
    width:30%;
    border-radius:2px solid grey;  
}

h1{
    font-family:'Tajawal', sans-serif;
    font-size:2.0rem;
}
p{
font-family:'Tajawal',sans-serif;
font-size:2.0rem;

}
.jumbotron{
    position:absolute;
    margin:5px 5px 5px;
    padding:5px 5px 5px;
    background:url ("http://res.cloudinary.com/adetayo/image/upload/v1524578992/sample.jpg");
    background-size:100%;
    
}
#social{
    top:50px;
    color:blue;
    font-size:1.3rem;

}


</style>
<div class="jumbotron">
  <h1 class="display-4">Hello, Everyone</h1>
  <p class="lead">This is a summary of my profile and skills</p>

<div id="profilePic" class="col-md-4"><img src="http://res.cloudinary.com/adetayo/image/upload/v1524582107/WIN_20171227_09_55_35_Pro.jpg" alt="ade"></div>
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
