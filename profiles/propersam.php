<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@propersam's Page</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: font-family: 'Source Sans Pro', sans-serif;
}

#Intro {
    background: linear-gradient(rgba(68, 13, 155, 0.8), 
    rgba(134, 77, 228,0.4)), url('http://res.cloudinary.com/propersam/image/upload/v1523634110/images/background_hngfun.jpg') 0% 0%/cover;
    min-height: 100vh;
}

</style>
<body>
<?php

   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data_ where username = 'propersam'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<div class="whole-page">
<h1 align="center" style="color:#453f6f"> HotelsNG Internship - HNGFUN</h1>
    <hr/>
    <section id="Intro" style="margin-botton:20px">
        <div align="center" style="display:block; padding: 40px 0 10px 0;">
            <img src="http://res.cloudinary.com/propersam/image/upload/v1523634147/images/display_pix.jpg" alt="My Profile Pix" width="300px" height="350px" style="border-radius:100%; border:3px dashed;"/>
        </div>
        <p class="title" align="center" style="display: block; color: rgba(00, 00, 00, 0.8); font-weight:700; font-size: 40px;">
            WELCOME TO AMEH SAMUEL'S PAGE
        </p>
    </section>
    <section id="detail">
    <p style="font-size:18px; text-align:center; padding:20px 0 30px 0"> <strong> Working Hard to make the world a better place.</strong> </p>
    </section>
    <section>
    <p style="text-align:center; font-size: 16px; font-style: italic; font-weight: 650;">"...I have a dream, that one day I will get the source code of human-beings and begin to create humans of my own :D" <br>
    - <strong> propersam </strong> </p>
    </section>
</div>
</body>
</html>