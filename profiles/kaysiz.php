<<<<<<< HEAD
<?php
  
  $secret_word_query = $conn->prepare("SELECT * FROM secret_word LIMIT 1");
  $secret_word_query->execute();
  $secret_word_result = $secret_word_query->fetch();
  $secret_word = $secret_word_result['secret_word'];
=======
<?php 
  require 'db.php';

  $secret_word_result=$conn->query("SELECT * FROM secret_word LIMIT 1");
  $secret_word_result = $secret_word_result->fetch(PDO:: FETCH_ASSOC);
  $secret_word = $secret_word_result->secret_word;
>>>>>>> 0e8b994c2194c59374b39a32a5d4f48708ec3a7c

  $profile_result=$conn->query("SELECT * FROM interns_data where username = 'kaysiz'");
  $profile_result = $profile_result->fetch(PDO:: FETCH_ASSOC);
  $name = $profile_result->name;
  $profile_pic = $profile_result->image_filename;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kaysiz</title>
    <style>
       html, body {
        background: url(http://res.cloudinary.com/kaysiz/image/upload/v1523657757/miroslav-skopek-526075-unsplash_xvr8db.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;   
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        margin: 0px;
        padding: 0px;
        }

        .wrapper {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            background-color: azure;
            max-width: 50%;
            display: flex;
            flex-direction: row;
            height: 50%;
        }

        .left, .right {
        
        margin: 5px;
        max-width: 50%;
        flex: 1;
        display: flex;
        flex-direction: column;
        }

        .left {
        align-items: center;
        }

        .profile-picture {
        border-radius: 50%;
        }
        .social-links {
        list-style: none;
        padding-left: 0px;
        font-size: 18px;
        }

        .social-links li {
        display: inline-block;
        margin-right: 8px;
        }

        .social-links a {
        text-decoration: none;
        padding: 4px;
        }

        .social-links a:hover {
        background-color: rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
<div class="wrapper">
    
    <div class="left">
      <img class="profile-picture" src="<?= $profile_pic;?>" width="200"/>
      <h2 class="name"><?= $name;?></h2>
      <h4 class="subtitle">Full-Stack Web Developer</h4>
    </div>
    
    <div class="right">
      <p class="bio">
        Full-Stack Web developer, proficient in PHP, Python, Javasvript(Vue, Angular). Passionate about learning and teaching. 
      </p>
      <ul class="social-links">
        <li><a href="https://github.com/kaysiz" target="_blank">Github</a></li>
        <li><a href="https://www.linkedin.com/in/kudakwashe-siziva-42a06949/" target="_blank">LinkedIn</a></li>
      </ul>
    </div>
    
</div>
</body>
</html>