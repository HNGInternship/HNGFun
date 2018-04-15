<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        .card{
            margin: auto 0;
            width: 60%;
        }

     button {
  border: none;
  display: inline-block;
  padding: 8px;
  color:grey;
  background-color: #000;
  text-align: center;
  width: 100%;
  font-size: 16px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
    </style>
</head>
<body>

<div class="card">
  <img src="<?php echo $image_filename; ?>" alt="profile" style="width:100%">
  <h1><?php echo $name; ?></h1>
  <h2>@<?php echo $username; ?></h2>
  <p>Web Developer from Ogun State</p>
  <div style="margin: 24px 0;">
    <a href="https://twitter.com/oluwolley"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/iam_ahead/"><i class="fa fa-instagram"></i></a>  
    <a href="https://www.fb.com/S.Hammed"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
 <?php
    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    $secret_word = $data['secret_word'];
    ?>
</body>
</html>


