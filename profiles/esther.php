<?php
require ('../db.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile page</title>
    <style media="screen">
    body{
  background-image: url("https://res.cloudinary.com/esther/image/upload/v1523846760/notepad-3316995_1920.jpg");
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  margin: 0px;
  padding: 0px;
 }
.navbar{
  width: 100%
  padding: 20px;
  position: fixed;
  top: 0px;
  transition: .5s;
}
.navbar ul li{
  list-style-type: none;
  display: inline-block;
  padding: 10px 15px;
  color: white;
  font-size: 24px;
  font-family: sans-serif;
  cursor: pointer;
  float: right;
  border-radius: 10px;
  transition: .5s;
}
.navbar ul li:hover{
  background: orange;
}
.navbar,
.text-center{
  text-align: center;
}
      .personal-image img{
        border-radius: 50%;
        width: 200px;
        height: 200px;
      }
      .personal-image p{
        border-left: 3px black;
        border-right: 3px black;
        font-size: 30px;
        text-align: center;
        font-family: Playball;
        margin: 0;
        padding: 0;
      }
      .personal-image h4{
        font-size: 35px;
        text-align: center;
        margin-top: 0em;
      }
      .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
      margin-top: 10%;
      }
      .personal-image h4 {
        font-family:  sans-serif;
        margin-bottom: 0em;
      }
      .personal-image p{
        font-family: Arial;
        margin-top: 0em;
        padding-top: 0em;
        color: #000;
        margin-bottom: 0em;
      }
      .social-page{
        margin-top: 0em;
      }
      .social-page img{
        width: 30px;
        height: 30px;
        padding-bottom: 0;
      }
.text-center{
  text-align: center;
}
.box{
  display: inline-block;
  background-color: grey;
  width: 100%;
  height: 50px;
}
.box p{
  font-size: 20px;
  text-align: center;
  padding-top: 10px;
}
</style>
  </head>
  <body>
<div class="personal-image">
  <img src="https://res.cloudinary.com/esther/image/upload/v1523975518/mine.jpg" alt="my image" class="center">
        <p>Hi there, I'm</p>
        <h4>Esther Itolima</h4>
        <p>Am a tech enthusiasts and also a frontend web developer</p>
        <div class="social-page text-center">
          <a href="https://www.facebook.com/itolimaesther"><img src="https://res.cloudinary.com/esther/image/upload/v1523978383/facebook.png"></a>
          <a href="https://twitter.com/Itolimaesther"><img src="https://res.cloudinary.com/esther/image/upload/v1523978402/twitter.png"></a>
          <a href="https://www.linkedin.com/in/itolimaesther/"><img src="https://res.cloudinary.com/esther/image/upload/v1523978414/linkedin.png" ></a>
        </div>
      </div>
<?php

$result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'esther'");
  $user = $result2->fetch(PDO::FETCH_OBJ);

  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }

?>

</body>
</html>
