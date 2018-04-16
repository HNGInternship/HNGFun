<?php
  require ('db.php');
?>

<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'jobitez'");
   $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jobitez | Profie</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'monaco';
    }

    .card{
      box-shadow: 0px 0px 2px #2196f3;
      width: 50%;
    }

    .h2{
        color: #563d7c;
    }

    .h3{
        color: #42a5f5;
    }
    .h4{
        color: #64b5f6;
    }
    p{
        color: #90caf9;
    }

  </style>
</head>

<body class="bg-light">

  <div class="main d-flex justify-content-center align-content-center ">
    <div class="card mt-5 py-5">
      <div class="my-3">
        <p class="text-center h2"><b>Welcome, Everyone!</b></p>
        <p class="text-center h4">My name is OKORIE CHIJIOKE JOB</p>    
        <p class="text-center h4">My username is <b><i>jobitez</b></p>
        <p class="text-center">below is my profile picture</p>
        <div class="d-flex justify-content-center">
          <img src="https://res.cloudinary.com/hng-intenship/image/upload/v1523716114/my_airtel_no_20180329_200329.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="jobitez">
        </div>
        <p class="text-center h4 mt-3">And I am an intermediate <b class="h3">Developer</b></p>


      
      </div>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>