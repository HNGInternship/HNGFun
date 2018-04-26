<!DOCTYPE html>
<html lang="en">
<head>
  <?php

    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'vewere'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Victor's Profile</title>
  <link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		#profile {
      background-color: #513e3e;
      margin-top: 3%;
      height: 450px;
      margin-bottom: 3%;
    }
    
		.text {
      font-family: "Rajdhani", sans-serif;
      color: #ffffff;
      text-align: center;
      display: vertical;
		}

		body {
			margin: 0px;
			background-color: #958080;
			height: 100%;
		}
    
    img {
      border-radius: 50%;
      border: 6px solid #958080;
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10%;
    }

</style>
</head>
<body>

<div class="oj-flex">

  <div class="oj-flex oj-flex-item oj-sm-1 oj-md-3 oj-lg-4">
  </div>

  <div id="profile" class="oj-flex-item oj-sm-10 oj-md-6 oj-lg-4"> 
    <div class="oj-flex">           
      <div class="oj-flex-item oj-sm-2">
      </div>

      <div class="oj-flex-item oj-sm-8" role="img">
        <img src="http://res.cloudinary.com/vewere/image/upload/q_52/v1523878772/vewere-profile-pic.jpg" width="168px" height="168px">
      </div>
            
      <div class="oj-flex-item oj-sm-2">
      </div>
    </div>

    <div class="oj-flex">

      <div class="oj-flex-item oj-sm-3 oj-md-3 oj-lg-3">
      </div>

      <div class="oj-flex-item oj-sm-6 oj-md-6 oj-lg-6">
        <p><h1 class="text" style="font-weight: medium;"><strong>Ewere Victor</strong></h1></p>
        <p style="margin-top: 0%;"><h2 class="text" style="color: #000000;"><strong>@vewere</strong></h2></p>
        <br>
        <p><h4 class="text">Problem Solver | Student at University of Ibadan</h4></p>
      </div>

      <div class="oj-flex-item oj-sm-3 oj-md-3 oj-lg-3">
      </div>

    </div>

  </div>

  <div class="oj-flex oj-flex-item oj-sm-1 oj-md-3 oj-lg-4">
  </div>
  
  
</div>
 

</body>
</html>