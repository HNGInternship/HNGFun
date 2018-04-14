
<?php 
 require_once('../db.php');

// $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
 if (!$conn){
    die('failed to connect'. $conn->connect_errno);
 }



 try {
    $sql = 'SELECT * FROM secret_word LIMIT 1';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}
     
try {
    $sql = "SELECT * FROM interns_data_ WHERE `username` = 'oriechinedu' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $my_data = $q->fetch();
    


} catch (PDOException $e) {

    throw $e;
}

?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></small> <?= $my_data['name'] ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
    <body style="background: url(http://res.cloudinary.com/drjpxke9z/image/upload/v1523626247/oriechinedu-header_nyavtu.jpg) no-repeat center center;background-size: cover;">

        <section class="text-blue text-center" styl>
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="text-center">
                        <img src="<?= $my_data['image_filename']?>" class="rounded-circle" alt="orie chinedu" width="200px" height="200px">
                    </div>
                    <h1 >Hey! <small>This is</small> <?= $my_data['name'] ?></h1> 
                    <p id="intro" style="margin-bottom: 50px; text-shadow: 2px 2px 2px #fff; color: #000;">I am a Web Developer. Proficient in HTML, CSS, JAVASCRIPT,
                    PHP/LARAVEL/VUEJS. A little of Python/Django. I also write technical articles on medium. I am a volunteer coach at Djangogirls.org and generally a tech lover</p>
                        
                        <div class="page-header">
                            <h2 class="text-blue page-header">Let's Get Connected</h2>
                        </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="https://slack.com/hnginternship4/@oriechinedu"><span class="fa fa-slack" style="color: blue; font-size: 48px;"></span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="https://facebook.com/orie.chinedu"><span class="fa fa-facebook" style="color: blue;font-size: 48px;"></span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="https://medium.com/@oriechinedu"><span class="fa fa-medium" style="color: blue; font-size: 48px;"></span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="https://twitter.com/@orie.chinedu"><span class="fa fa-twitter" style="color: blue; font-size: 48px;"></span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="https://linkedin.com/in/chinedu-emmanuel-orie-b8484b147/"><span class="fa fa-linkedin" style="color: blue; font-size: 48px;"></span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="https://github.com/oiechinedu"><span class="fa fa-github" style="color: blue; font-size: 48px;"></span></a>
                        </div>
                </div>
                    </div>   
                <div >
                </div>
                
                </div>
            </div>
            </section>
            <script >
               $('document').ready(function(){

                  $("body").css("opacity", 0).animate({ opacity: 1}, 3000);
               });
            
            </script>
    </body>
</html>

            
