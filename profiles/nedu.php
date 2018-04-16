<!DOCTYPE html>
<html lang="en">
  <?php
   $file1 = realpath(__DIR__.'/..')."/footer.php";
   try {
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
  } catch (PDOException $e) {
    die(var_dump($e));
  }

  try {
    $result2 = $conn->query("Select * from interns_data where username = 'nedu'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
  } catch (Exception $e) {
    die(var_dump($e));
  }

  ?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HNG FUN</title>

    <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


      <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
      <link href="../css/style2.css" rel="stylesheet">
      <link href="../css/style1.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/learn.css" rel="stylesheet">
<!--	  <link href="css/carousel.css" rel="stylesheet">-->
      <link href="../css/landing-page.min.css" rel="stylesheet">

      <style>
        .imgClass {
          height:300px;
          width:300px;
          margin-left:30px;
        }
        p{
          color:white;
          margin-left:30px;
        }
        .secondContainer{
          background-color:black;
        }
        
        @media screen and (min-width: 768px) {
          .imgClass{
            margin-left:200px;
            width:400px;
            height:400px;
          }
          p{
            margin-left:200px;
          }

      </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="learn.php">Learn</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="listing.php">Interns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonies.php">Testimonies</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Rest of the page content-->
<div class="secondContainer">
  <div>
      <img class="imgClass" src="<?php echo $user->image_filename;?>" alt="nedu's image"/>
  </div>
  <div>
    <p>Full Name : <?php echo $user->name; ?></p>
    <p>Username : <?php echo $user->username; ?></p>
    <p>Skill : Web developer</p>
  </div>
  <div>
   <p><?php include_once $file1;?></p>
  </div>
</div>
</body>
</html>