<?php
//Fetch User Details
try {
    $query = "SELECT * FROM interns_data WHERE username ='OluwaseyiSam'";
    $resultSet = $conn->query($query);
    $resultData = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $resultData['username'];
$fullName = $resultData['name'];
$picture = $resultData['image_filename'];

//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $resultData  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $resultData['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $resultData['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile | <?php echo $username;?> </title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="../css/style2.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/learn.css" rel="stylesheet">
    <link href="../css/landing-page.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #f2f2f2;
        font-family: "Lato";
        font-weight: 300;
        font-size: 16px;
        color: #555;
        -webkit-font-smoothing: antialiased;
        -webkit-overflow-scrolling: touch;
    }

    /* Titles */
    h1, h2, h3, h4, h5, h6 {
        font-family: "Raleway";
        font-weight: 300;
        color: #333;
    }

    /* Paragraph & Typographic */
    p {
        line-height: 28px;
        margin-bottom: 25px;
    }

    #intro {
        background: #007bff;
        padding-top: 60px;
        padding-bottom: 60px;
        color: white;
    }

    #intro h5, p {
        color: white;
    }
    #intro a {
        text-decoration: none;
        color: white;
    }

    #intro i {
        color: white;
        font-size: 20px;
        padding-right: 20px;
        vertical-align: middle;
    }
</style>

<body data-spy="scroll" data-offset="0" data-target="#nav">
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
                    <a class="nav-link" href="/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/learn.php">Learn</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/listing.php">Interns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/testimonies.php">Testimonies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="section-topbar">
    <br>

    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <img height='200' width='200' class='img-thumbnail img-circle img-responsive' src='<?php echo $picture; ?>' />
                <h1><?php echo $fullName; ?></h1>
                <h3>Web/Android Developer | Sheyilaaw98@gmail.com</h3>
            </div><!--/.col-lg-12 -->
        </div><!--/.row -->
    </div><!--/.container -->

    <section id="about"></section>
    <div id="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-1">
                    <h5 class='text-center'>ABOUT</h5>
                    <p>I am a Web & Android developer with less than one year of professional experience.
                        I'm interested in all kinds of software development ,
                        but my major focus is on developing for Web & Mobile.
                        I also have skills in other fields like front end / icon design or system development.</p>
                </div>
                <div class="col-lg-6 col-lg-offset-1">
                    <h5 class='text-center'>CONTACT</h5>
                    <p>
                        <a><i class="fa fa-phone"></i>+2348175851897</a><br>
                        <a href="https://facebook.com/kvng.sheyi"><i class="fa fa-facebook"></i><?php echo $fullName; ?></a><br>
                        <a href="https://www.linkedin.com/in/oluwaseyi-adeogun-28bb48147/"><i class="fa fa-linkedin"></i><?php echo $fullName; ?></a><br>
                        <a href="https://github.com/Sheyilaaw"><i class="fa fa-github"></i>Sheyilaaw</a><br>
                    </p>
                </div>
            </div>





        </div><!--/.row -->
    </div><!--/.container -->
</div><!--/ #intro -->

<!-- Bootstrap core JavaScript-->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
