<?php
// first we require the database connection. this file declares a variable called $conn,
// and we will use it.
require __DIR__.'/../db.php';
// u can print the connection just to see what it is
//  var_dump($conn);

// next we define out query like the task said. we select all database rows from the "secret_word" table
$sql = 'SELECT * FROM secret_word';

// this is executing our query
$q = $conn->query($sql);

// this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
$q->setFetchMode(PDO::FETCH_ASSOC);

// this is finally sending the query to the database
$data = $q->fetch();

// just to see the data from the database
//  var_dump($data);

// finally we create the variable they said we should create in the task, and assign this variable to our secret word

$secret_word = $data['secret_word'];

// just to see the secret work
//  var_dump($secret_word);

// let's define a query to get our personal user data from the database
// remember after registering, our details are now saved.
$sqlForUser = "SELECT * FROM interns_data WHERE interns_data.username = 'rachel' LIMIT 1";

// this is executing our query
$qForUser = $conn->query($sqlForUser);

// this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
$qForUser->setFetchMode(PDO::FETCH_ASSOC);

// this is finally sending the query to the database
$userData = $qForUser->fetch();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open
		+Sans|Kaushan+Script">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <style type="text/css">
    h1 {
      font-family: Advent Pro;
      font-weight: bold;
    }
    body{
      font-family: Advent Pro;
      letter-spacing: 2px;
      background-color: transparent !important;
    }
    a {
      color:black;
      font-size: 25px;
      padding: 5px
    }
    h5, h6 {
      font-weight: bold;
      font-family: Advent Pro;
    }
    h1 {
      color: white;
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(225, 225, 225, 0.5), 0 6px 20px 0 rgba(225, 225, 225, 0.5);
    }
    .card-body {
      height: auto !important;

    }
    .bg {
      background: linear-gradient(rgba(0, 0, 0, 0.816), rgba(0, 0, 0, 0.816)),url('<?=$userData['image_filename']?>') no-repeat center center fixed !important; 
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
      width: 100% !important;
      height: auto !important;
      top: 0 !important;
      left: 0 !important;
    }
  </style>
  <title>Rachel's Profile</title>
</head>

<body>
  <div class="bg"> 
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1><?=$userData['name']?></h1>
  </div>

    <div class="container row mt-4 justify-content-center mx-auto">
      <div class="text-center col-sm-5">
        <div class="card mb-4 box-shadow text-center">
        <img class="card-img-top" src='<?=$userData['image_filename']?>' alt="Card image cap">
          <div class="card-body">
            <h6 class="mt-2">BIO</h6>
            <p class="card-text">I found fufilment in programming and I've been stuck on ever since, I'm a full stack web developer and an aspiring 'badass' designer. I love photograpy and I believe the only constant thing in life should be learning.</p>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item">
              <h6>SLACK USERNAME</h6>@<?=$userData['username']?></li>
              <li class="list-group-item">
                <h6>CONNECT</h6>
                <a href="https://github.com/RachelAbaniwo"><i class="fa fa-github"></i></a>
                <a href="https://www.linkedin.com/in/rachel-abaniwo/"><i class="fa fa-linkedin"></i></a>
                <a href="https://twitter.com/raeabaniwo"><i class="fa fa-twitter"></i></a>
              </li>
            </ul>
          </div>
      </div>
    </div>

    
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
      <script>
  $('.profile>.container').removeClass('container')
 </script>
</body>

</html>