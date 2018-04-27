<?php
  require ('db.php');
?>

<?php
   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'jobitez'");
   $user = $result2->fetch(PDO::FETCH_OBJ);

   $username = "jobitez";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Jobitez | Profie</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Ubuntu" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> -->
  <link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
  <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>


  <style>
    body {
      font-family: 'monaco';
    }

    .oj-flex{
      box-shadow: 0px 0px 2px #2196f3;
      margin-right: auto;
      margin-left: auto;
      margin-top: 8%;
      margin-bottom: auto;
      width: 25%;
      padding: 30PX;
    }

    .h2{
        color: #563d7c;
        font-size: 24px;
    }

    .h3{
        color: #42a5f5;
        font-size: 22px;    
    }
    .h4{
        color: #64b5f6;
    }
    p{
        color: #90caf9;
    }
    .oj-avatar-image{
      border-radius: 100%;
      display: block;
      max-width: 250px;
      max-height: 200px;
      margin-left: auto;
      margin-right: auto;

    }

  </style>
</head>

<body class="oj-web-applayout-body">
<header role="banner" class="oj-web-applayout-header">
<div class="oj-web-applayout-max-width oj-flex-bar oj-align-items-center">
<div data-bind="css: smScreen() ? 'oj-flex-bar-center-absolute' : 'oj-flex-bar-middle oj-sm-align-items-baseline'">
Jobitez | profile page
</div>
<div class="oj-flex-item">
  
</div>
<div class="oj-flex-bar-end">
Made with Oracle Jet
</div>
</div>
</header>
</body>
<div id="container">
  <div class="demo-flex-display">
    <div id="panelPage">
  <div class="">
      <div class="oj-flex oj-md-justify-content-center">
      <div class="oj-flex-text-align-center">
        <p class="h2"><b>Welcome, Everyone!</b></p>
        <p class="text-center h4">My name is OKORIE CHIJIOKE JOB</p>    
        <p class="text-center h4">My username is <b><i>jobitez</b></p>
        <p class="text-center">below is my profile picture</p>
        <div class="d-flex justify-content-center">
          <img src="https://res.cloudinary.com/hng-intenship/image/upload/v1523716114/my_airtel_no_20180329_200329.jpg" class="oj-avatar-image" alt="jobitez"><br>
        </div>
        <p class="text-center h4 mt-3">And I am an intermediate <b class="h3">Developer</b></p>
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js""></script>