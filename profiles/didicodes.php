<!DOCTYPE html>
<html>
<head>  
<title>HNG FUN PROFILE</title>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Bootstrap core CSS -->
     <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


     <!-- Custom fonts for this template -->
   <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>    
</head>
<style type="text/css">

body {
  background: #FFFFFF;
 margin-left:10px;
 margin-right:10px;
}
   .profile-body {
       padding: 20px;
       text-align: center;
       color: #666;
   }
   .text-color{
       color: #337AB7;
   }
   </style>
<body>

<div class="profile">
 <div class="profile-top"></div>
 <div class="text-center">
 <center><img  src="http://res.cloudinary.com/didicodes/image/upload/c_crop,h_491/v1523639579/IMG-20180201-WA0022.jpg" alt="profile-image"></center>
 </div>
 <div class="profile-body">
               <h3>Edidiong Asikpo
                               <br>
                               <small>Android Developer</small>
                               <br>                            
                               <small class="text-color"><b>@Didicodes</b></small>
                           </h3>

                            <h3><br>I've always loved programing since high school<br> Join me as we make the best out of this wonderful opportunity.</h3>
                            <p id="fav">
<a href="https://github.com/edyasikpo"><i class="fa fa-github fa-2x"></i></a>&nbsp;
           <a href="https://twitter.com/didicodes"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;
           <a href="https://facebook.com/Didicodes"><i class="fa fa-facebook fa-2x"></i></a>
           </p>
                           </div>
       </div>
<br>          
<?php

        require_once '../db.php';
        try {
            $select = 'SELECT * FROM secret_word';
            $query = $conn->query($select);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $data = $query->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
        $secret_word = $data['secret_word'];        
?>
</body>
</html>