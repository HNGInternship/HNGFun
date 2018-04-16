<?php
   try {
       $sql = 'SELECT * FROM secret_word';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q->fetch();
   } catch (PDOException $e) {
       throw $e;
   }
   $secret_word = $data['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Rhodium+Libre" rel="stylesheet">
    <title>Blessing Akpan</title>
</head>
<style>
    body{
        font-family: 'Rhodium Libre', serif;
    }
    #head{
        background: blue;
        min-height: 400px;
        text-align:center;
    }
    img{
        border-radius:50%;
        background-color: beige;
        width:350px;
        height:300px;
        margin-top:3em;
    }
    h1{
        font-size: 2.5em;
        /* padding:0px; */
        margin-bottom:0px;
    }
    #content{
        text-align:center;
    }
    p{
        margin:0px;
        font-size: 20px;
        font-weight: bold;
    }
</style>
<body>
    <div id="head">
        <img src="http://res.cloudinary.com/dlvlxep3r/image/upload/v1523715773/interactive_bee.jpg" alt="image">
    </div>
    <div id="content">
        <h1>AKPAN, BLESSING MICHAEL</h1>
        <p>Writer | Android Developer | HNG Intern</p>
        <p>Akwa Ibom, Nigeria</p>
    </div>
    <div>Social Media</div>
    <div id="socialicons">
    <div style="margin: 24px 0;">
        <a href="https://facebook.com/interactiveBee"><i class="fa fa-facebook"></i></a>
        <a href="https://twitter.com/interactive_bee"><i class="fa fa-twitter"></i></a>
        <a href="https://github.com/BeeAkpan"><i class="fa fa-github"></i></a>
        
  </div>
</body>
</html>