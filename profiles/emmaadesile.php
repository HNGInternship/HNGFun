<?php
  if (empty($conn)) {
    include('../db.php');
  }

  //intern info query
  try {
      $sql = 'SELECT name, username, image_filename FROM interns_data WHERE intern_id = \'emmaadesile\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
  } catch (PDOException $error) {
      throw $error;
  }

  //secret_word query
  try {
    $sql = 'SELECT secret_word FROM secret_word';
    $q1 = $conn->query($sql);
    $q1->setFetchMode(PDO::FETCH_ASSOC);
    $data1 = $q1->fetch();
} catch (PDOException $error) {
    throw $error;
}
$secret_word = $data1['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>My profile page</title>

  <style>
    body{
      /* background: url('http://res.cloudinary.com/dn6fnuhxr/image/upload/v1523801308/starry_night.jpg'); */
      background: #262C35;
      font-family: 'Helvetica', 'Alto';
      box-sizing: border-box;
      background-position: cover;
      color: white;
      font-size: 1.1rem;
      padding-top: 6rem;
    }

    p {
      -webkit-margin-before: 1em;
      -webkit-margin-after: 1em;
      -webkit-margin-start: 0px;
      -webkit-margin-end: 0px;
      }

    img {
      width: 100%;
    }

    .profile {
      max-width: 700px;
      padding-left: 20px;
      padding-right: 20px;
      margin: auto;
      text-align: left;
      display: grid;
      grid-template-columns: 1fr;
      place-items: center;
      align-content: center;
      min-height: 600px;
      line-height: 30px;
    }

    a {
      text-decoration: none;
      text-underline: none;
    }

    .profile__image {
      width: 120px;
    }

    .profile__image img {
      border-radius: 50%;
    }

    .social-media a{
      padding: 0 10px;
      color: white;
      transition: color;
    }

    .social-media a:hover, .social-media a:active{
      color: #EC268F;
      transition: .2s all ease-in-out;
    }
    .profile__logo {
      width: 80px;
    }

    .link {
      padding: 5px;
      color: #EC268F;
      border-radius: 5px;
    }

  </style>
</head>
<body>
  
  <div class="profile">
    <div class="profile__logo">
      <img src="http://res.cloudinary.com/dn6fnuhxr/image/upload/v1523654382/logo.png" alt="profile_logo">
    </div>
      <p>Hello! My name is Emmanuel Adesile and I'm a Fullstack developer based in Lagos, Nigeria. I also have a knack for UI/UX design. I like to make beautifully crafted websites that meet industry standards.
      </p>

      <p>My skillset inlcudes HTML, CSS, Bootstrap, JavaScript, Node, Python, Angular and MySQL. I do well with version control using git. I also design with Figma and Photoshop
      </p>

      <p>My code is hosted on <a href="http://www.github.com/emmaadesile" class="link">github</a>. When I'm not coding, I usually on <a href="http://www.twitter.com/emma_adesile" class="link">twitter</a> exploring the world of social media. Got a project for me? You can shoot me an <a href="mailto:emma2adesile@gmail.com" class="link">email</a>
      </p>


      <div class="profile__image">
        <img src="http://res.cloudinary.com/dn6fnuhxr/image/upload/v1523640452/manny_2.jpg" alt="profile_image">
      </div>

      <div class="social-media">  
        <a href="https://www.linkedin.com/in/emmaadesile/"><i class="fa fa-linkedin" target="_blank"></i></a>
        <a href="http://www.twitter.com/emma_adesile"><i class="fa fa-twitter" target="_blank"></i></a>
        <a href="http://www.github.com/emmaadesile" target="_blank"><i class="fa fa-github"></i></a>
      </div>   
      <p>&copy; Handcrafted by Emmanuel Adesile</p>
  <div>
</body>
</html>
