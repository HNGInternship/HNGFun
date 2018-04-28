
<?php

require_once "../config.php";
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    $sql = 'SELECT * FROM interns_data WHERE username="tridax"';
    $r = $conn->query($sql);

    $row = $r->fetch_assoc();

    $name = $row["name"];
    $username = $row["username"];
    $image_filename = $row["image_filename"];

    $secret = 'SELECT secret_word FROM secret_word LIMIT 1';
    $r_secret = $conn->query($secret);
    
    $secret_word = $r_secret->fetch_assoc()["secret_word"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="hng intern">
    <meta name="author" content="akinsanya adeoluwa">
    <link rel="shortcut icon" href="" type="image/png">
    <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="http://bitcoinaffiliate.herokuapp.com/assets/css.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <title>Portfolio | HNG FUN</title>
  </head>
  
<div class="container">
    <div class="row">
      <div class="col-md-12 text-center ">
        <div class="panel panel-default">
            <div class="userprofile social ">
                <div class="userpic"> <img src="<?php echo $image_filename ?>" alt="" width="140" height="140" class="userpicimg"> </div>
                <br />
                <b><h3 class="username"><?php echo $name?></h3></b>
                <h4 class="username"><?php echo $username?></h4>
                <p>Web Developer, Lagos, Nigeria</p>
                <div class="socials tex-center"> <a href="#" class="btn btn-circle btn-primary ">
                    <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
                    <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                    <i class="fa fa-linkedin"></i></a> <a href="https://linkedin.com/in/tridax" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="col-md-12 border-top border-bottom">
                <h3>Skills</h3>
                
                <right>
                        <span class="label label-success">PHP</span>
                        <span class="label label-success">MYSQL</span>
                        <span class="label label-success">HTML/CSS</span>
                        <span class="label label-success">Python</span>
                    </right>
                
                <hr />
            </div>
            <br />
            <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>


</html>



                    