<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joshua Afekuro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background: mintcream;
            line-height: 1.5;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
        }

        .container {
            margin: 0 auto;
        }

        .card-text,
        p {
            font-size: 25px;
        }

        .fa {
            padding: 15px;
            font-size: 30px;
            text-decoration: none;
            border-radius: 50%;
            color: slategrey;
        }


        .fa:hover {
            opacity: 0.7;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="container">
        <header>
            <div>
                <h1 class="text-info text-center">Welcome to my profile.</h1>
            </div>
        </header>

        <section>
            <div class="col-md-6 my-3 float-left">
                <div class="card text-white bg-info" style="">
                    <img class="card-img" src="http://res.cloudinary.com/liveejosh/image/upload/v1523639339/IMG-20180306-WA0004.jpg" alt="liveejosh img" width="139" height="400">
                    <div class="card-body">
                        <h2 class="card-header text-center bg-secondary">Joshua Afekuro</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center float-right">
                <p class="text-secondary p-2 mt-5">I am an aspiring web developer.
                    <br>
                    <i>Html5, Css, Bootstrap4, Javascript.</i>
                </p>
                <hr>
                <div class="mt-5">
                    <h5 class="text-info">Hey connect with me on social media.</h5>
                    <p class="card-text"></p>
                    <a href="http://facebook.com/afekuroj" target="_blank" class="fa fa-facebook"> </a>
                    <a href="http://twitter.com/livee_josh" target="_blank" class="fa fa-twitter"> </a>
                    <a href="http://instagram.com/livee_josh" target="_blank" class="fa fa-instagram"> </a>
                    <a href="http://github.com/Liveejosh" target="_blank" class="fa fa-github"> </a>
                </div>
            </div>
        
        </section>

    </div>

    <?php

    $result = $conn->query("Select * from secret_word LIMIT 1");
      $result = $result->fetch(PDO::FETCH_OBJ);
      $secret_word = $result->secret_word;

      $result2 = $conn->query("Select * from interns_data where username = 'LiveeJosh'");
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