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
.usernamecs{margin-top:10px;}
</style>
</head>
<body>
<?php

  try{
  //get secret_word 
  $sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
  $secret_word = $data['secret_word'];
  
  //get my details    
  $sql = 'SELECT * FROM secret_word';
    $sql = "SELECT * FROM `interns_data` WHERE username = 'mikoloxtra' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
  $image_filename = $data['image_filename'];
    $username = $data['username'];
  }catch(PDOException $e){
    $secret_word = "sample_secret_word";
    $name = "Ajetunmobi Michael";
    $username = "mikoloxtra";
    $image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
  }

?>
<h2 class="usernamecs" style="text-align:center"><?php echo $name; ?></h2>

<div class="card">
  <img class="image" src="<?php echo $image_filename; ?>" style="width:100%">
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
