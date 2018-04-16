<?php
 
try {
   $profile = 'SELECT * FROM interns_data_ WHERE username="nedy"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
} catch (PDOException $e) {
    throw $e;
}
$secret_word = $get['secret_word'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Profie | Nedy</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Ubuntu';
    }

    .card{
      box-shadow: 0px 0px 10px #b4b4b4;
      width: 50%;
    }

  </style>
</head>

<body class="bg-light">

  <div class="main d-flex justify-content-center align-content-center ">
    <div class="card mt-5 py-5">
      <div class="my-3">
        <p class="text-center text-primary h3">Hi, there!</p>
        <p class="text-center text-danger h3">My name is <b>Nedy</b></p>
        <p class="text-center text-secondary">below is my picture</p>
        <div class="d-flex justify-content-center">
          <img src="https://res.cloudinary.com/nedy123/image/upload/v1515053242/my_d.p_paeru8.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="avatar">
        </div>
        <p class="text-center text-primary h4 mt-3">And I am a <b class="h2">Developer</b></p>
      </div>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>