<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    // require '../db.php';

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'vewere'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Victor's Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
  
  <style>
    .text {
      font-family: "Rajdhani", sans-serif;
      text-align: center;
    }

    .gray {
      color: #c4c4c4;
    }

    .white {
      color: #ffffff;
    }

    h1 {
      margin-top: 10px;
      margin-bottom: 0px
    }

    h3, h4 {
      margin: 0px;
    }

    #top {
      margin-top: 4%;
      padding-top: 20px;
      padding-bottom: 80px;
      height: 294px;
      background: #f67575;
    }

    #bottom {
      height: 84px;
      background: #c4c4c4;
    }

    #image-div{
      position: relative;
      width: 180px;
      height: 180px;
      display: table;
      margin: 0 auto;     
    }

    img {
      border-radius: 50%;
    }

    .chat-area {
      height: 180px;
    }

  </style>
</head>
<body>
<div class="container" >
  <div class="row">
    <div class="col-lg-offset-4 col-lg-4 shadow-lg" id="top">
      <div id="image-div">
        <img src="<?php echo $user->image_filename; ?>" height=180px width=180px>
      </div>
      <h1 class="text white"><?php echo $user->name; ?></h1>
      <h3 class="text"><strong>@<?php echo $user->username; ?></strong></h3>
    </div>
  </div>
    
  <div class="row">  
    <div class="col-lg-offset-4 col-lg-4 shadow-lg" id="bottom">
      <br>
      <h4 class="text">Problem Solver | Student at</h4>
      <h4 class="text">University of Ibadan</h4>
    </div>
  </div>



</div>

</body>
</html>