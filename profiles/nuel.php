<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link href="../css/carousel.css" rel="stylesheet">
    <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #eeeeee;
            }

            .heading{
                background-color: #2773ae;
                height: 150px;
                padding-top: 10px;
                
            }

            .image{
                max-width: 200px;
                width: 169px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 57px;
                border-radius: 50%;
                border: 10px solid #f8f8f8;
            }

            .details{
                margin-top: 120px;
                text-align: center;
                color: #444444;
                font-weight: normal;
            }

            .big{
                font-size: 24px;    
            }

            .small{
                font-size: 16px;
                
            }

            a{
                text-decoration: none;
                font-size: 20px;
                padding: 10px 20px;
                color: #ffffff;
                border-radius: 5px;
            }

            .links{
                background-color: #ffffff;
                margin: 120px auto 0 auto;
                text-align: center;
                width: 75%;
                padding: 50px;
                
            }

            .info{
                background-color: #2196f3;
            }

            .warning{
                background-color: #ffd54f;
            }

            .content{
                text-align: center;
                background-color: #fff;
                margin: 120px auto 0 auto;
                padding: 30px;
                width: 75%;    
            }

            code{
                color: #f44336;
                background-color: #ffebee;
                padding: 2px 4px;
                border-radius: 5px;
                font-weight: bold;
            }
        </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">HNG FUN</a>
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
        
    <div class="heading">
        <img src="http://res.cloudinary.com/nuelwhyt/image/upload/v1519399973/start.jpg" alt="profile-image" class="image">
    </div>
    
    <div class="details">
        <p class="big"> Emmanuel Nwabueze</p>
        <p class="small"> Android Developer</p>
        <p class="small"> nuel</p>
    </div>
    
    <div class="links">
        <a href="#" class="warning" onclick="sayHi()">Say Hello</a>
    </div>

    <script>
        function sayHi() {
            alert('Hello,good to see.');
        }
    </script>
    
     <?php


try {
    $select = 'SELECT * FROM secret_word';
    $query = $conn->query($select);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $get = $query->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

</body>
</html>