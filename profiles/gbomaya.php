<!DOCTYPE html>
<?php
   require './db.php'
?>
<?php
 /* $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word=$data['secret_word'];
  $result2 = $conn->query("Select * from interns_data where username = 'gbomaya'");
  $user = $result2->fetch(PDO::FETCH_OBJ); */

?>
<?php
   try {
       $sql = 'SELECT * FROM secret_word';
       $q = $conn->query($sql);
       $q->setFetchMode(PDO::FETCH_ASSOC);
       $data = $q->fetch();
   } catch (PDOException $pe) {
       throw $pe;
   }
   $secret_word = $data['secret_word'];

   ?>
<?php
   
   /*$data = $conn->query("SELECT * FROM `secret_word`");
   $data = $data->fetch(PDO:: FETCH_OBJ);
   $secret_word =  $data['secret_word']; */
   

   ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <style>
     body {background-color: black;
            width: 700px;
            font: 1000;
            color: azure;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;  
            text-align: center 
          }
     header {
         font-weight: 700;
         text-align:left;
         font-style: normal;
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-position: 30px;
     }
     .img-container>img {
        height: inherit;
        border-radius:50%;
        }
     #head {
         height: 500px;
         width: 500px
     }
     h1{
         font-size: 70px
     }
    
     footer {
     display: flex;
     align-items: center;
     justify-content: space-around;
     background-color: #607d8b;
     color: #fff;
     padding: 20px 0;
 }
 footer ul li {
     display: flex;
 }
 footer p {
     text-transform: uppercase;
     font-size: 14px;
     opacity: 0.6;
     align-self: center;
 }
 @media (max-width: 1100px) {
     footer {
         flex-direction: column;
     }
      footer p {
          text-align: center;
          margin-bottom: 20px;
      }
      footer ul li {
          margin: 0 8px;
      }
 }
    </style>
</head>
<body>
    <header> GBOMAYA </header>
    <div class="img-container">
        <img class="profile-image" src="http://res.cloudinary.com/gbomaya/image/upload/v1524099560/me.jpg"/>
    </div>
    <div id="head">
     <p><h1> Jeremiah Babasanmi   </h1> </p>
         <p> I want to create solutions </p>
     </div>
        <br>
        <br>
    <div>
     <h2>  I am a recently Graduated Pharmacist...I love what i do, but i also believe the knowledge of Programming can help me integrate my knowledge into creating More solutions</h2>
    </div>

     <footer>
        <p>Connect with me via Social Media</p>
        <p>Powered by Gbomaya Designs &copy;</p>
        <ul>
            <li><a href="https://www.twitter.com/gbomaya/"><i class="fa fa-twitter fa-2x"></i></a></li>
            <li><a href="https://github.com/gbomaya/"><i class="fa fa-github fa-2x"></i></a></li>
        </ul>
    </footer>
</body>
</html>
