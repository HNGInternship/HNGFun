<?php
require_once 'db.php';
try {
    $sql = "SELECT * FROM interns_data_ WHERE username ='soosyamoora'";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$name = $data['name'];
$username = $data['username'];
$image = $data['image_filename'];
try {
    $sql2 = 'SELECT * FROM secret_word';
    $q2 = $conn->query($sql2);
    $q2->setFetchMode(PDO::FETCH_ASSOC);
    $data2 = $q2->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $data2['secret_word'];
 ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stage 3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

    <!-- css  -->
    <style>
    body{
        background-color: rgb(228, 198, 198)
    }
    .main {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .img-border{
        border-radius: 150px;
    }
    .img-div{
        margin-top: 50px;
    }
    </style>
    <div class="container main">
            <div>
                    
               <h1 style="text-align: center; margin-top: 100px;"><?php echo date("G:i a"); ?></h1>
                    
            </div>
    </div>
    <div class="container main"> 
        <div class="img-div">
          <img class=" img-border" style="width:300px; height:300px;" src="http://res.cloudinary.com/soosyamoora/image/upload/c_scale,h_662/v1523696804/IMG-20161107-WA0010.jpg" alt="Card image cap">        
        </div>  
    </div>
    <div class="container main">
            <div class="card" style="width: 18rem;background-color:rgb(228, 198, 198)">
                    <div class="card-body">
                      <h4 class="card-title">Profile</h4>
                      <h5><?php echo $name; ?></h5>
                      <p class="card-text">My Name is saadat Aliyu, I am a software Developer.</p>
                      <a href="https://instagram.com/iamsoosy" class="card-link">
                        <img style="width:20px;height:20px;" src="http://res.cloudinary.com/soosyamoora/image/upload/c_scale,h_26/v1523700531/ig.svg" alt="">
                      </a>
                      <a href="https://facebook.com/soosylove" class="card-link">
                        <img style="width:20px;height:20px;" src="http://res.cloudinary.com/soosyamoora/image/upload/c_scale,h_26/v1523700016/fb.svg" alt="">
                      </a>
                    </div>
                  </div>
    </div>
    
</body>
</html>
