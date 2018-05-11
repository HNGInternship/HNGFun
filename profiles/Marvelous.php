<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;
   $result2 = $conn->query("Select * from interns_data where username = 'somiari'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
	?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Username</title>
<style>
.img
{
   align ="center"; 
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: Georgia, 'Times New Roman', Times, serif;
  background: wheat;
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
  background-color: #000;
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

button:hover, a:hover 
{
  opacity: 0.7;
  }
  h1{
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-size: 100%;
    text-align: center;
    color:black;
    font-weight: bold;
}
body
{
  background-image: url("./images/back.jpg");
  text-align:center; font-family: Georgia, 'Times New Roman', Times, serif;
  
}
</style>
</head>
<body>

<div class="card">
<img src="http://res.cloudinary.com/marvelous/image/upload/b_rgb:3b2f2f,c_fill,h_2653,w_2456/a_0/v1524660197/DSC_0772.jpg" alt="Marvelous" style="width:100%">
<h1>Ikechi Marvelous</h1>
  <p class="title">Programmer</p>
  <p>Slack: Marvelous</p>
  
  <p class="title">Full stack Programmer</p>
 
  <div style="margin: 24px 0;">
  <a target="_blank" title="follow me on twitter" href="http://www.twitter.com/MarvelIkechi"><img alt="follow me on twitter" src="http://res.cloudinary.com/marvelous/image/upload/v1525257457/twitter_40x40.png" border=0></a>
  <a target="_blank" title="find us on Facebook" href="https://www.facebook.com/marvelike"><img alt="follow me on facebook" src="http://res.cloudinary.com/marvelous/image/upload/v1525257457/facebook_40x40.png" border=0></a>
  <a target="_blank" title="follow me on LinkedIn" href="https://www.linkedin.com/in/marvelous-ikechi-8000a7155"><img alt="follow me on LinkedIn" src="http://res.cloudinary.com/marvelous/image/upload/v1525257457/linkedin.png" border=0></a>
  <a target="_blank" title="follow me on Git" href="https://www.github.com/marvelike"><img alt="follow me on Git" src="http://res.cloudinary.com/marvelous/image/upload/v1525257457/git.png" border=0></a>
  
 </div>

<p><button>Contact<a href="time.php"></a></button></p>

</div>
</body>
</html>
