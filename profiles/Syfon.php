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


$result2 = $conn->query("Select * from interns_data where username = 'Syfon'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>



<!doctype html>
<html lang="en">
  <head>
    <title>My Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="c:\Users\Jnr\Desktop\bootstrap4beta\css\bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My portfolio</title>
    <style>
.card-img-top{
    height:38rem;
}

.card-body{
    background-color: rgb(1, 1, 41);
    padding-left:300px;
}
.rounded-circle{
    border-radius:50%;
    height: 200px;
    width:200px;
    position: absolute;
    top:40px;
    left: 40%;
}
.fa {
    padding: 50px;
    font-size: 40px;
    width: 50px;
    text-decoration: none;
 
}

    </style>
    
</head>
  <body>
    <div id="container">
                <div class="card" style="width: ; height: 44rem;">
                        <img class="card-img-top" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg" alt="Card image cap">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle">
                        
                          <center> 
                            <h5>Sifon Isaac</h5><br>
                            <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                        </center>
                            <div class="card-body">
                                <div class="row">
                                  <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                                    <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                                    <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
                                  <a href="https://github.com/Syfon01" class="fa fa-github"></a>
                                  <a href="" class="fa fa-slack"></a>
                                    
                              </div>
                    </div>
    </div>