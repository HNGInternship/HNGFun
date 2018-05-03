<!DOCTYPE html>
<html>
<head>
<?php
        $profile_query = "SELECT name, username, image_filename FROM interns_data WHERE username = '$profile_name' LIMIT 1";
        $profile_result = $conn->query($profile_query);
        $profile_result->setFetchMode(PDO::FETCH_ASSOC);
        $profile_details = $profile_result->fetch();


        $secret_word_query = "SELECT secret_word FROM secret_word LIMIT 1";
        $secret_word_result = $conn->query($secret_word_query);
        $secret_word_result->setFetchMode(PDO::FETCH_ASSOC);
        $secret = $secret_word_result->fetch();
        $secret_word = $secret['secret_word'];
    ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: auto;
    text-align: center;
    top: 50%;
    height: 40%;
    position: relative;
   
}
.rest {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 600px;
    margin: auto;
    text-align: center;
    height: 60%;
    position: relative;
    font-family: salsa;
    font-size: 18px;
    bottom: 10%;
    color: black;

}


}
.title {
    color: grey;
    font-size: 18px;
}
.me {
    color: grey;
    font-size: 18px;
    text-align: center;
    font-family: salsa;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 5px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    position: absolute;
    left: 0;
    bottom: 0;
  
}

}

.t {
    text-decoration: none;
    font-size: 22px;
    color: black;
}
.f  {
    text-decoration: none;
    font-size: 22px;
    color: black;
}
.l  {
    text-decoration: none;
    font-size: 22px;
    color: black;
}

button:hover, a:hover {
    opacity: 0.7;
    
}
body {
    background-image: url("https://res.cloudinary.com/cheederah/image/upload/v1525161738/Background.jpg");
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
}
    </style>
</head>
<body class="background">
<div>
.
</div>
<div>
.
<br>
.
</div>

<div class="card">
  <img src=<?php echo $profile_details['image_filename']?> alt="Chidera" style="width:100% height:100%">
  </div>
  <div class="rest">
  <h1><?php echo $profile_details['name']?></h1>
  <p class="title">Web Developer, Student
  <br>
  Slack-username: <?php echo $profile_details['username']?>
  </p>
  <p class:"me">
Bio: "Whatever the mind can concieve and believe <br>it can achieve",this is my favorite quote.<br>Hi i'm Chidera and i love to code.
  </p>

  <p>University of Ibadan</p>
  Skills: HTML| CSS | JAVASCRIPT | PHP <br>
  
  <a href="https://twitter.com/miss_cheederah" class="t"><i class="fa fa-twitter"></i></a> 
  <a href="www.linkedin.com/in/ogu-chidera-617b9614a" class="l"><i class="fa fa-linkedin"></i></a> 
  <a href="https://www.facebook.com/chidera.ogu.5" class="f"><i class="fa fa-facebook"></i></a> <br>
  
  <br>
  <p><button>Email: misscheederah@gmail.com</button></p>

</div>
    
</body>
</html>
 