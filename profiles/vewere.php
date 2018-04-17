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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
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

    h2 {
      margin-top: 10px;
      margin-bottom: 0px
    }

    h5 {
      margin: 0px;
    }

    #top {
      margin: auto;
      margin-top: 4%;
      padding-top: 20px;
      padding-bottom: 80px;
      width: 300px;
      height: 294px;
      background: #f67575;
      border-radius: 10% 10% 0% 0%;
    }

    #bottom {
      margin: auto;
      width: 300px;
      height: 84px;
      background: #c4c4c4;
      border-radius: 0% 0% 10% 10%;
      /* padding-bottom: 20px; */
    }

    #image-div{
      position: relative;
      width: 180px;
      height: 180px;
      display: table;
      margin: 0 auto;     
    }

    img {
      /*  */
      border-radius: 50%;
    }

  </style>
</head>
<body>
  <div id="top">
    <div id="image-div">
      <img src="<?php echo $user->image_filename; ?>" height=180px width=180px>
    </div>
    <h2 class="text white"><?php echo $user->name; ?></h2>
    <h5 class="text"><strong>@<?php echo $user->username; ?></strong></h5>
  </div>
  
  <div id="bottom">
    <br>
    <h5 class="text">Problem Solver | Student at University of Ibadan</h5>
  </div>
</body>
</html>