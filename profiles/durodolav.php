<?php 
  require 'db.php';
?>

<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;
   $sql = $conn->query("SELECT * FROM interns_data WHERE username = 'Durodolav'");   
   $result = $conn->query("SELECT * FROM interns_data WHERE username = 'Durodolav'");

   $result2 = $conn->query("Select * from interns_data where username = 'durodolav'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>my profile</title>
    <style type="text/css">
      body{
        background-color: #fff;
        text-align: center;
      }
      .pix{
        max-width: 300px;
      }
      .up{
        padding-top: 50px;
      }
    </style>
  </head>
  <body>
     

  <?php 
    
    foreach ($result as $result) {

  ?>
  
    <h1 class="up">Hello,</h1>
    <div>
      <img class="pix" src="<?php echo $result['image_filename'];?>">
    </div>
          <h1>Am <?php echo $result['name'];?></h1>
                <p class="you">a web developer  in Lagos Nigeria</p>
                <div class="fontsa">
                  <i class="fab fa-facebook-square fa-3x"></i>
                  <i class="fab fa-twitter-square fa-3x"></i>
                  <i class="fab fa-instagram fa-3x"></i>
                  <i class="fab fa-google-plus-square fa-3x"></i>
                  <i class="fab fa-github-square fa-3x"></i>
                </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <?php
    }
  ?>
</body>

</html>