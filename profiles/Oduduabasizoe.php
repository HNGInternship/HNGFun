<?php
require 'db.php';
try {
    $intern_data = $conn->prepare("SELECT * FROM interns_data WHERE username = 'Oduduabasizoe'");
    $intern_data->execute();
    $result = $intern_data->setFetchMode(PDO::FETCH_ASSOC);
    $result = $intern_data->fetch();


    $secret_code = $conn->prepare("SELECT * FROM secret_word");
    $secret_code->execute();
    $code = $secret_code->setFetchMode(PDO::FETCH_ASSOC);
    $code = $secret_code->fetch();
    $secret_word = $code['secret_word'];
 } catch (PDOException $e) {
     throw $e;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<style>
    .p {
        color:blueviolet;
        font-size: 20px;
    }
</style>
<body>
    <!DOCTYPE html>
    <html>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
    
    <div class="w3-container">
      <h2 class="title uppercase" id="article-title">ODUDUABASI ZOE'S PROFILE</h2>
    <div class="container">
      <div class="card" style="width:50%">
         <div class="row">
             <div class="col-md-6">

        <img class="card-img-left img-fluid " src="http://res.cloudinary.com/smart-power-plus-engineering-services/image/upload/v1524147702/SmartZoe.png" alt="Odudu-Abasi" >
    </div>
        <div class="col-md-6">
          <p>I AM
          <strong>ODUDU-ABASI ASUQUO</strong> <em>meet me</em><br>
          Christian<br>
          Civil Engineer<br>
          Software Developer<br>
          Event Planner<br>
          Simply am the Best at whatever I chose to do!!!</p>
          </div>
          </div>
          
          <p></p>

          <div class="w3-container w3-right">
              <ul>
              <li>Nickname: <strong>Powergirl</strong></li>
              <li>Mission Statement:<br><em>
                To function as a team builder in a world class working environment where I can make significant contributions and add value through hard work and dedication and at the same time attain personal growth and development in such a way that progress is made continually</em>  </li> </ul>
            <li>Favorite Quote:Philippians 2 vs 13<br>
            <em>For it is God which worketh in you both to will and to do of his good pleasure</em></li>
            <li>Hobbies: <br>
                Singing and Dancing<br>
            Slaying in the HolyGhost<br>
        Reading<br>
        Travelling<br>
        Being Happy<br>
    </li> 
        </div>
      </div>
    
    
    </body>
    </html>
    







    





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>