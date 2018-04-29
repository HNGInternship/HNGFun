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
<link id="css" rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>
<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>
<script type="text/javascript" src="../js/main.js"></script>

<style>
  body {
    font-family: 'Rationale', sans-serif;
    background-color:gray;
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
  .my{
    padding-left:30%;
  }

</style>
</head>

<body>


<div class="oj-flex oj-sm-align-items-center oj-sm-margin-2x">
  <div class="oj-flex">
    <div class="my">
            <p class="h2"><b>Hello Friend!</b></p>
            <div class="oj-sm-align-items-center">
                <img src="http://res.cloudinary.com/dxv1e5ph1/image/upload/v1524143885/profile.jpg" class="img-thumbnail img-fluid rounded-circle w-10 h-10"  alt="etibless">
                  </div>
                  </div>

                  <div style="padding:0 0 0 220px; text-shadow:1px 1px 3px #353435;"> 
    
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
</html>