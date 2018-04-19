<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
  <?php
		require 'db.php';

		$profile_details = $conn->query("Select * from secret_word LIMIT 1");
		$profile_details = $profile_details->fetch(PDO::FETCH_OBJ);
		$secret_word = $profile_details->secret_word;

		$profile_username = $conn->query("Select * from interns_data where username = 'jegedeolamide99'");
		$user = $profile_username->fetch(PDO::FETCH_OBJ);
	?>
  <style>
    html{padding:0;margin:0;border:0;}
    body{padding:0;margin:0;border:0;color: #333e51;font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",sans-serif;background:white;}
    main > div{
      display: block;
      padding: 60px 30px;
    }
    img{
      height: 100px;
      width: 100px;
      border-radius: 50%;
      display: inline-block;
      margin: 0 0 15px;
      cursor: none;
    }
    h1{
      font-size: 24px;
      font-weight: 500;
      line-height: 30px;
      margin: 0 0 20px;
    }
    h1::selection,p::selection{
      background: rgba(22, 132, 137, 0.75);
      color: white;
    }
    p{
      font-size: 18px;
      font-weight: 400;
      line-height: 26px;
      margin: 0 0 30px;
    }
    .profile__pic{
      display: inline-block;
      padding: 0;
      margin: 0;
    }
    .social a{
      text-decoration: none;
      display: inline-block;
      margin-right: 20px;
    }
    .social a path{
      height: 25px;
      width: auto;
      fill: #333e51;
      transition: fill ease .3s
    }
    .social a:hover path,
    .social a:focus path{
      fill: #168489;
    }

    @media (min-width: 567px) {
      .profile__container{
        padding: 80px 60px;
      }
    }
    @media (min-width: 768px) {
      .profile__container{
        max-width: 600px;
        margin: 0 auto;
        padding: 100px 60px;
      }
      img{
        height: 110px;
        width: 110px;
        transition: .3s;
      }
      img:hover{
        filter: brightness(100%) contrast(90%);
      }
    }
  </style>
</head>
<body>
  <main role="main">
    <div class="profile__container">
      <div class="profile__pic">
        <img src="<?php echo $user->image_filename ?>" alt="Jegede Olamide profile pic"/>
        <h1>Hi there, I'm <?php echo $user->name ?> (@<?php echo $user->username ?>). I'm a Frontend developer and UI designer</h1>
        <p>I love working on projects that require analytical and conceptual thinking. <br>
        Also a lover of aesthetic and minimal designs. <br>
        </p>
        <div class="social">
          <a href="https://github.com/jegedeolamide99" target="_blank" title="Github"><i class="fab fa-github"></i></a>
          <a href="https://codepen.io/jegedeolamide99" target="_blank" title="Codepen"><i class="fab fa-codepen"></i></a>
          <a href="https://www.linkedin.com/in/olamide-jegede-87a293114//" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="mailto:jegedeolamide99@gmail.com" target="_blank" title="Email"><i class="far fa-envelope"></i></a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
