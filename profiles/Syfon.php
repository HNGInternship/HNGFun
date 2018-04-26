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

    <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>My portfolio</title>
    <style>
.img{
    height: 25rem;
    width:100%;
}
    
.rounded-circle{
    border-radius:50%;
    height: 20rem;
    width:20rem;
    position: absolute;
    top:40px;
    left: 35rem;
}
.fa {
    padding:20px ;
    font-size: 40px;
    text-decoration: none;
}
}
.details, h1{
    color: white;
    /* oj-flex-item:; */
}
#About{
    background-color: rgb(163, 157, 157);
}

.content {
    margin: 0 auto; 
    width: 80%;
    color: white;
    
}

#foot{
    min-height:10rem;
    background-color: rgb(1, 10, 70);
    padding-left: 35%
}

    </style>
</head>
  <body>

    <section id="profile">
        <div class="oj-flex-item">
                        <img class="img" src="https://res.cloudinary.com/syfon/image/upload/v1523631972/pic.jpg">
                            <img src="https://res.cloudinary.com/syfon/image/upload/v1523630065/syfon.jpg" class="rounded-circle"> 
           
    <section id="About">                   
            <div class="oj-flex">
                            <div class=content>     
                             <center>   <h3>Sifon Isaac</h3><br>
                                <p>Sifon Isaac is a Nigerian from Akwa Ibom State.<br> A web developer and an intern of the HNG program.<br> A graduate of Biochemistry but has a burning desire toward web and digital technology  </p> 
                                </center>
                        </div>
                        </div>
    </section>


        <section id="foot" >                   
            <div class="oj-flex">
                <div class= "oj-flex-item-pad">
                    <a href="https://www.facebook.com/sifon.isaac.3" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/syfonisaac" class="fa fa-twitter"></a>
                    <a href="https://www.linkedin.com/in/sifon-isaac-5a107a79/" class="fa fa-linkedin-square"></a>
                <a href="https://github.com/Syfon01" class="fa fa-github"></a>
                <a href="https://hnginternship4.slack.com" class="fa fa-slack"></a> 

            </div>
        </section>
</div>
</section>

<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>

    </body>