<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profile page</title>
    <style media="screen">
    body{
  background-image: url("https://res.cloudinary.com/gyrationtechs/image/upload/v1526053526/bg.jpg");
  
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
        font-size: 20px;
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
        color: #a90909;
	font-weight: bold;
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
  font-size: 16px;
  text-align: center;
  padding-top: 10px;
  color: #430f0f;
}

.box span {
text-align: center;
  padding-top: 10px;
  color: #430f0f;
}
p {
font-size: 18px;
color: #430f0f
}

.personal-image span {
font-size: 14px;
text-align: center;
font-family: verdana;
color: #fff;
left: 30%; 
right: 30%;

}
</style>
  </head>
  <body>
<div class="personal-image">
  <img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526012343/David.jpg" alt="my image" class="center">
        
        <h4 style="color: #fff">David Ozokoye</h4>
        <p>Front End Web developer / AI (chabot) developer / HNG Intern </p><br>
        <div class="social-page text-center">
	<span> What's up, I'm David a Web developer based in Nigeria. I am a fan of technology, design and entrepreneurship. <br> I'm also interested in web development and programming. Get in touch with me via any of my social handle below.</span> <br><br>
          <a href="https://www.facebook.com/davis5nd"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051537/fb.png"></a>
          <a href="https://www.twitter.com/gyrationtech"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051669/twitter.png"></a>
          <a href="https://www.linkedin.com/in/david-ozokoye"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526051162/link.jpg" ></a>
          <a href="https://www.github.com/gyrationtechs"><img src="https://res.cloudinary.com/gyrationtechs/image/upload/v1526052030/git.png"></a>
 </div>
      </div>
<?php

$result = $conn->query("Select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'david'");
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
