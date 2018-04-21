<?php
try {
    $profile = 'SELECT * FROM interns_data_ WHERE username="Uthman"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.container {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 700px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: blue;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>
    <h1 style="text-align:center">My Profile Card</h1>

<div class="container">
  <img src="https://res.cloudinary.com/de42yadcm/image/upload/v1523798238/profile.jpg" alt="uthman" style="width:55%; height: 500px;">
  <h1>Ayinde Uthman Eyitayo</h1>
  <p class="title">Web Developer(Backend-php(pdo)) AND Still Learning </p>
  <p>HNG internship</p>
  <div style="margin: 24px 0;">
    
    <a href="https://twitter.com/Uuthman_"><i class="fa fa-twitter"></i></a>  
    <a href="https://github.com/uuthman"><i class="fa fa-github"></i></a>  
    
 </div>
 <p><button>Contact</button></p>
</div>

</body>
</html>