<?php
//include "../db.php";
$query = ("SELECT * FROM interns_data_ WHERE username='ombukuro'");
$row = $conn->query($query);
$result = $row->fetch();
$username = $result['username'];
$image_filename = $result['image_filename'];
$name = $result['name'];

$query1 = "SELECT * FROM secret_word";
  $secret_word = $conn->query($query1);
  $result1 = $secret_word->fetch();
  $secret_word = $result1['secret_word'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ayebakuro Ombu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <!-- Custom fonts for this template -->
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    
    
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>    
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-4" >
                <div class="card">
                    <img class="card-img-top img-responsive" src="<?php echo $image_filename;?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $name;?><br><small><?php echo $username;?></small></h4>                        
                        <hr>
                        <h6>About</h6>
                        <p class="card-text">FrontEnd Developer, WordPress Developer, and all round nice guy</p>
                        <h6>Location</h6>
                        <p class="card-text">Remote</p>
                        <a href="https://twitter.com/iceboss3d"><i class="fa fa-twitter fa-lg"></i></a><span></span>
                        <a href="https://instagram.com/iceboss3d"><i class="fa fa-instagram fa-lg"></i></a><span></span>
                        <a href="https://github.com/iceboss3d"><i class="fa fa-github fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
