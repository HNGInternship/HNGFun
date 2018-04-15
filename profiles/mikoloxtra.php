<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{background-color: cyan;}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: tomato;
}

.title {
  color: white;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
  background-color: cyan;
}
.image{border-radius: 100%;}
</style>
</head>
<body>
<?php

  $sql = "SELECT intern_id, name, username, image_filename FROM interns_data_ WHERE username='mikoloxtra'";
  $result =mysqli_query($mysqli, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $name = $row['name'];
      $username = $row['username'];
      $profileimg =$row['image_filename'];
    }
  }
?>
<?php 
    $sql = "SELECT * FROM secret_word";
    $result =mysqli_query($mysqli, $sql);
    $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $secretword = $row['secret_word'];
    }
  }
?>
<h2 style="text-align:center"><?php echo $name; ?></h2>

<div class="card">
  <img class="image" src="<?php echo $profileimg; ?>" style="width:100%">
  <h1><?php echo $username; ?></h1>
  <p class="title">UI/UX , Programmer & Intern @</p>
  <p>HNG Internship</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-github"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>
</body>
</html>
