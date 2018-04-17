<?php
  date_default_timezone_set('Africa/Lagos');
  $result = $conn->query("SELECT * FROM secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("SELECT * FROM interns_data WHERE username = 'sarah'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $user->name?></title>
  <link href="https://fonts.googleapis.com/css?family=Snippet|Averia+Sans+Libre" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: inherit;
    }

    html {
      font-size: 100%;
      box-sizing: border-box;
      height: 100%;
    }

    body {
      font-family: Roboto, sans-serif;
      font-size: 1.4rem;
      line-height: 1;
      height: 100%;
      background: lightsmoke;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .constrain {
      margin: 0 auto;
      height: 100%;
      width: 80%;
      max-width: 2000px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
    }

    .name {
      font-family: 'Averia Sans Libre', sans-serif;
      font-size: 4rem;
      font-weight: 700;
      color: #DB0A5B;
      letter-spacing: 1px;
    }

    .labels {
      font-family: 'Snippet', sans-serif;
      font-size: 1rem;
      font-weight: bold;
      letter-spacing: 1px;
      color: #555;
      margin-top: 15px;
    }

    .socials {
      width: 80%;
      margin-top: 10px;
      margin-bottom: 60px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .socials .fa-icon {
      font-size: 1.2rem;
      flex-basis: 33%;
      margin: 8px auto;
      color: #555;
      transition: all .5s ease;
    }

    .socials .fa-icon:hover {
      color: #0e0e19;
    }

    .header {
      font-size: 1.2rem;
      color: #555;
      margin-bottom: 30px;
      margin-top: 50px;
    }

    .profile-dp {
      border-radius: 50%;
    }

    @media only screen and (min-width: 600px) {
      .socials .fa-icon {
        flex-basis: 0;
      }
      .name {
        font-size: 4.1rem;
        font-weight: bolder;
      }
      .labels {
        font-size: 1.4rem;
      }
    }

    @media only screen and (min-width: 700px) {
      .name {
        font-size: 5.1rem;
        font-weight: bolder;
      }
      .labels {
        font-size: 1.8rem;
      }
    }

    @media only screen and (min-width: 800px) {
      .name {
        font-size: 6rem;
        font-weight: bolder;
      }
      .labels {
        font-size: 1.9rem;
      }
    }

    @media only screen and (min-width: 1200px) {
      .name {
        font-size: 8rem;
        font-weight: bolder;
      }
      .labels {
        font-size: 2.8rem;
      }
    }
  </style>
</head>

<body>

    <div class="constrain">
      <header class="header">
        <span class="date">
          <?php echo date("D M d, Y"); ?>
        </span> |
        <span class="time">
          <?php echo date("g:i a"); ?>
        </span>
      </header>
      <img src="https://res.cloudinary.com/temipet/image/upload/c_scale,w_300/v1523998638/fine_sarah.jpg" alt="A really fine pic of Sarah" class="profile-dp">
      <section class="title">
        <h1 class="name">Sarah Temitope</h1>
        <p class="labels">Budding Designer ✿ Lover of Life</p>
      </section>
      <section class="socials">
        <a href="https://www.instagram.com/elegant_garlie0" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-instagram"></i>
        </a>
        <a href="https://www.twitter.com/sarahtemy" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-twitter"></i>
        </a>
        <a href="https://www.facebook.com/temipet" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-facebook-f"></i>
        </a>
        <a href="https://www.github.com/temipet" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-github-alt"></i>
        </a>
        <a href="https://ng.linkedin.com/in/adeboye-sarah-956a40143" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-linkedin"></i>
        </a>
        <a href="mailto:talk2oluwasarah@gmail.com" class="fa-icon" target="_blank">
          <i class="fa fa-fw fa-envelope"></i>
        </a>
      </section>
    </div>
</body>

</html>