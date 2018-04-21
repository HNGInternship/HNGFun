<?php
  try {
    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;
  } catch (PDOException $e) {
    die(var_dump($e));
  }

  try {
    $result2 = $conn->query("Select * from interns_data where username = 'toriboi'");
    $user = $result2->fetch(PDO::FETCH_OBJ);
  } catch (Exception $e) {
    die(var_dump($e));
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>toriboi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style media="screen">
      body {
        background-color: #eee;
      }

      #t-container {
        font-family: 'ubuntu';
        width: 400px;
        margin: auto;
        margin-top: 150px;
        background-color: #aaa;
        border-radius: 30px;
      }

      #t-image {
        position: relative;
        margin: auto;
        height: 100px;
      }

      img {
        position: absolute;
        top: -100px;
        left: 100px;
        border-radius: 50%;
      }

      #t-desc {
        text-align: center;
      }

      p {
        padding: 0 20px 50px 20px;
        color: #fff
      }

      #t-social-media {
        margin-bottom: 20px;
      }

      .t {
        font-size: 40px;
        margin: 10px;
        text-decoration: none;
        width: 50px;
      }

      .t-twitter:hover {
        color: #1DA1F2;
      }

      .t-facebook:hover {
        color: #3B5998;
      }

      .t-github:hover {
        color: #333;
      }

      .t:hover {
        box-shadow: 5px 5px 5px #333;
        text-decoration: none;
      }
    </style>

  </head>
  <body>
    <div id="t-container">
      <div id="t-image">
        <img src="<?php echo $user->image_filename ?>" alt="" width="200" height="200">
      </div>
      <div id="t-desc">
        <h1 style="font-family:'ubuntu';"><?php echo $user->name ?></h1>
        <h2 style="font-family:'ubuntu';">HNG 4.0 Intern</h2>
        <p>
          I'm <?php echo $user->name ?>, aka <?php echo $user->username ?>,  a student of Federal University of Technology, Owerri, FUTO, from the department of computer science 400 level.
          I am very passionate about tech. I do a little PHP, JS and i also play around with the ARDUINO. I have an insatiable desire to learn.
          I love playing games, expecially soccer.
        </p>

        <div id="t-social-media">
          <span><a href="https://twitter.com/toriiboy" class="fa fa-twitter t-twitter t"></a></span>
          <span><a href="https://web.facebook.com/toriboi" class="fa fa-facebook t-facebook t"></a></span>
          <span><a href="https://github.com/toriboi" class="fa fa-github t-github t"></a></span>
        </div>
      </div>
    </div>
  </body>
</html>
