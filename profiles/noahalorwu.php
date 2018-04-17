<?php
  $result = $conn->query("select * from secret_word LIMIT 1");
  $result = $result->fetch(PDO::FETCH_OBJ);
  $secret_word = $result->secret_word;

  $result2 = $conn->query("Select * from interns_data where username = 'noahalorwu'");
  $user = $result2->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noah Alorwu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
  background-color:#ef5350;


}
.profile {
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top: 100px;
  color: white;


}

.title {
  color: white;
  font-size: 18px;
}


a {
  text-decoration: none;
  font-size: 40px;
  color: black;
  margin: auto;
}
 

</style>
</head>
<body>

<div class="profile">
  <img src="http://res.cloudinary.com/noahalorwu/image/upload/v1523904795/DSC_4950.jpg" alt="Noah Alorwu" style="width:100%">
  <h1> <?php echo $user->name; ?></h1>
  <p class="title">Android | JAVA | Python | Django | WordPress</p>
  <div style="margin: 20px 0;"> 
    <a href="https://github.com/plasmadray"><i class="fa fa-github"></i></a> 
    <a href="htpps://twitter.com/plasmadray"><i class="fa fa-twitter"></i></a>  
    <a href="https://linkedin.com/in/noahalorwu"><i class="fa fa-linkedin"></i></a>  
    <a href="https://facebook.com/noahalorwu"><i class="fa fa-facebook"></i></a> 
 </div>

</div>
</body>
</html>
