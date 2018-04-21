<?php

 require 'db.php';

  $result = $conn->query("Select * from secret_word LIMIT 1");

  $result = $result->fetch(PDO::FETCH_OBJ);

  $secret_word = $result->secret_word;



  $result2 = $conn->query("Select * from interns_data where username = 'olubori'");

  $user = $result2->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <style>
     .aboutme{
       width: 500px;
       margin-left: 500px;
       margin-right: auto;
       padding-top: 50px;
       background-color: rgba(136, 7, 7, 0.438);

     }
     .me{
         color: white;
         font-size: 20px;
         font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         text-align: center;
     }
    </style>
</head>
<body>
    <div class="aboutme">
   <center> <img src="https://res.cloudinary.com/dtafmyxnn/image/upload/v1524231568/Emem.jpg" alt="Emmy" width="300" height="250"/><br />
       <div class="me"><b> I am Ememobong Daniel Bob</b><br /> 
        I am a Nigerian<br />
        I am a graduate of Information Technology/Business Information Systems<br />
        I am an optimist and a go-getter<br />
        I desire to be a web developer<br />
        I desire to be a techpreneur.</div><br /></center>
    </div>
</body>
</html>


