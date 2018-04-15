<?php 
  require 'db.php';
?>
<?php
  $result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'adeteju'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<html>
<head>
<title></title>
<style>
body {background-color: 87ceeb;}
h2 {
    border-style: solid;
    border-color: coral;}

</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<img src= "http://res.cloudinary.com/diwu3x3tr/image/upload/v1523637541/rsz_img_20170213_081525_594.jpg" alt="Adeteju" align="center" width="300" height="300" ></center>
<div class="jumbotron jumbotron-fluid" style= "jumbotron{ color: red;}">
  <div class="container">
    <h1 class="display-4">Hi Guys!</h1>
    <p class="lead">This is a summary of my profile and my skills</p>
  </div>
</div>
<div class = "col-md-4">
<h2> PROFILE</h2>
<h3>My Name is Adeteju Adeleye </h4>
</div>
<div class = "col-md-4">
<h2> SKILLS</h2>
<h3> Software Development </h3>
</div>
<div class = "col-md-4" >
<h2> CONTACT </h2>
<h3> Slack: @adeteju </h3>
</div>

</body>
</html>
