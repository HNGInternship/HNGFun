<!-- StarT YOUR PROFILE CODE HERE -->
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
        
        .mainSection {
            width:auto;
            height: auto;
            background-color: brown;
            display: flex;
        }    
        
        .image {
            background-image: url('http://res.cloudinary.com/emmanuelstudentpage/image/upload/v1524679014/sam.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            width: 500px;
            height: 400px;
            margin: 50px;
        
             }
        .para {
            font-size: 25px;
            color: green;
            
        }
        
     .detail {
        width: 500px;
         height: 250px;
         color: black;
         font-size: 20px;
         margin-top: 65px
         
     }
        
    </style>
</head>
<body>
   <div class="mainSection">
   
    <div class="image">
      </div>
       <div class="detail"><p class="para"> I am Samuel Onyedikachi Onukoagu</p>
       <p>
        I am a Nigerian.
           </p>
           <p>
     I love all things techie which is why I am diving into programming.
           </p>
           <p>
     I am  ambitious, a good team-player.
           </p>
           
        </div>
    </div>
    
    
</body>
</html>
