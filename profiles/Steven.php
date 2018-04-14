<?php
    require_once('../db.php');

    try {
    $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not query the database:" . $e->getMessage());
      }
    $result = $q->fetch();
    $secret_word = $result['secret_word'];

    ?>
    

<!DOCTYPE html>
<html>
<head>
  <title>Steven</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
  <style>
    body {
      background-image: url("http://res.cloudinary.com/chikodi/image/upload/v1523699895/back.jpg");
      background-size: cover;
    }
    
    .fa:hover {
        color: blue;
    }

    .fa {
      float: right;
      font-size: 25px;
      color: gray;
      padding: 10px;
      text-align: center;
    }
      
  </style>

</head>

<body>
<section>
  <div class="container">
    <div class="row">
      <div class="col-xl-8 mx-auto">
        <div class="text-center">
          <img src="http://res.cloudinary.com/chikodi/image/upload/c_mfit,w_960/v1523617871/steven.jpg" alt="Steven Victor" class="rounded circle" height="250" width="250" style="margin-top: 40px;">
        </div>
        <h2 style="text-align: center; color: white; margin-top: 10px;">Steven Victor</h2>
        <div style="text-align: center; color: white; margin-top: 10px;">
          Web Developer, skilled in HTML, CSS, JavaScript, PHP, Laravel, VueJS, 
        </div>
        <div class="row">
        <div style="margin-top: 10px">
          
        </div>
          <div class="col-sm-2">
            <a href="https://twitter.com/@stevensunflash"><span class="fa fa-twitter"></span></a>
          </div>
          <div class="col-sm-2">
              <a href="https://github.com/victorsteven"><span class="fa fa-github"></span></a>
        </div>
        <div class="col-sm-2">
            <a href="https://www.linkedin.com/in/stevenchikodi/"><span class="fa fa-linkedin"></span></a>
        </div>
        <div class="col-sm-2">
            <a href="https://slack.com/hnginternship4/@Steven"><span class="fa fa-slack"></span></a>
        </div>
        <div class="col-sm-2">
            <a href="https://www.instagram.com/stevensunflash/"><span class="fa fa-instagram"></span></a>
        </div>
        
      </div>
    </div>
  </div>
  </div>
</section>

<script>
 
</script>


</body>
</html>

