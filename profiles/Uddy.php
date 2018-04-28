<?php

if(!isset($_GET['id'])){
   require '../db.php';
 }else{
    require 'db.php';
 }


try{
   $sql = 'SELECT * FROM secret_word';
   $q = $conn->query($sql);
   $q->setFetchMode(PDO::FETCH_ASSOC);
   $data = $q->fetch();
   $secret_word= $data['secret_word'];
} catch (PDOException $e){
       throw $e;
   }


$result2 = $conn->query("Select * from interns_data where username = 'Uddy'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>My Portfolio</title>
   
</head>
<style>
     img{
        border-radius: 50%;
        width:30rem;;
        height:120px;
        border-image: 3px solid grey; 
    } 
    .jumbotron{
        background-color: #044252;
        height: 800px;
    }
    .txt{
        color:white;
        margin-top: 230px;
        font-size: 17pt;
        f
    }
   
</style>
<body>
    <div class="jumbotron ">
         <div class="row">
            <div class="col-md-6">
                <img src="https://res.cloudinary.com/djdsmtbvk/image/upload/v1524210950/IMG_20170926_095728.jpg" alt="" class="img-fluid">

            </div>
            <div class="col-md-6 ">
                <p class="txt"><span style=""><b>Hi I'm Amiable,</b></span><br>A student of the University of Uyo, Akwa Ibom state.An undergraduate in computer 
                    science currently undergoing my industrial training at Start Innovation
                    Center.My passion is using technology based solutions to solve real life challenges.

                </p>

            </div>
            
        </div> 
    
            
      </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>