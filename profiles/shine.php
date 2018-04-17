<?php
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
<!DOCTYPE html>
<html lang="en">
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


  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../index.php">HNG FUN</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../learn.php">Learn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../listing.php">Interns</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../testimonies.php">Testimonies</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
try {
    $sql = "SELECT * FROM interns_data WHERE username ='shine'";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
} catch (PDOException $e) {
    throw $e;
}
$name = $data['name'];
$username = $data['username'];
$image = $data['image_filename'];
?>

    <style>

        body{
            background-image: url("http://res.cloudinary.com/dowmiccxo/image/upload/v1523832701/stage3.png");
            background-size: cover;
            color: #f0f4f4!important;

        }
        .navbar-light .navbar-brand {
            color: #f0f4f4!important;}
        .nav-link {
            color:#f0f4f4!important;}
        .text-muted {
            color:#f0f4f4!important;}


    </style>
    <br><br><br>
       <h1 style="text-align:center">HNG Internship Profile</h1>
                  
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <img src="<?php echo $image; ?>" alt="ijeomah Arinze C" style="width:100%;padding-left: 200px">
    </div>
        <div class="col-lg-6">
            <h1>Name:</h1>
            <p> <?php echo $name; ?></p>
            <h1>Profession:</h1>
            <p>Software Developer</p>
            <h1>Skills:</h1>
            <p>PHP, HTML, CSS, Javascript, Bootstrap, SQL</p>
            <h1>LinkedIn:</h1>
            <p>https://www.linkedin.com/in/arinze-ijeomah-682a61122  </p>
            <h1>Email:</h1>
            <p>ijeomaharinze@gmail.com</p>

        </div>
    </div>