<?php
require ('db.php');
?>

<?php
 $result = $conn->query("Select * from secret_word LIMIT 1");
 $result = $result->fetch(PDO::FETCH_OBJ);
 $secret_word = $result->secret_word;

 $result2 = $conn->query("Select * from interns_data where username = 'etibless'");
 $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>HNG Profile For etibless</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<style>
  body {
    font-family: 'Rationale', sans-serif;
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
      color: #93f990;
  }

</style>
</head>

<body class="bg-light">

<div class="main d-flex justify-content-center align-content-center ">
  <div class="card mt-5 py-5">
    <div class="my-3">
            <p class="h2"><b>Hello Friend!</b></p>
            <div class="d-flex justify-content-center">
                <img src="http://res.cloudinary.com/dxv1e5ph1/image/upload/v1524143885/profile.jpg" class="img-thumbnail img-fluid rounded-circle w-25 h-25" alt="jobitez">
                  </div>
                  <div style="padding:0 0 0 220px; text-shadow:1px 1px 1px #353435;">
      
      <p class="h4">My name is PRINCEWILL UDO EDWARD</p>    
      <p class="h4">This is my USERNAME: <b><i>etibless</b></p>
      <p >Thank you for stoping by</p>
      <p class="h4"><b>I am an intermediate web Developer.
          <br>A 400 Level Computer Engineering Student
          <br>of University of Uyo, Uyo.</b></p>
        </div>

    
    </div>
  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js""></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" ></script>
</html>