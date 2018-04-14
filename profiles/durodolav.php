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
      $db = new mysqli('localhost','root', 'ayokunumi', 'hng');
      $sql = $db->query("SELECT * FROM interns_data WHERE username = 'Durodolav'")->fetch_assoc();   
      $result = $db->query("SELECT * FROM interns_data");
      $secret_word = $db->query("SELECT * FROM secret_word");
      ?>
      <?php
        $sql2 = "SELECT secret_word FROM secret_word";
        $result2 = mysqli_query($db, $sql2);
        if (mysqli_num_rows($result2) > 0) {
        
        while($row = mysqli_fetch_assoc($result2)) {
        $secret_word = $row["secret_word"];
        global $secret_word;
        $sql = "SELECT secret_word from secret_word";
        foreach ($db->query($sql) as $row) {
        $secret_word = $row['secret_word'];
   
}
        }
      ?>
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
<?php
    }
?>
  </body>
</html>