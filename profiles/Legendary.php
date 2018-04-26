
<?php
	
	
	require 'db.php';

   $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Legendary'");
   $user = $result2->fetch(PDO::FETCH_OBJ);

 ?>

<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
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
}
</style>
</head>
<body>
<br>
<br>
<h2 style="text-align:center">User Profile </h2>

<div class="card">
  <img src="http://res.cloudinary.com/uyo-obong/image/upload/v1524685035/legendary.jpg" alt="Akpan" style="width:100%">
  <h1><?php
 echo $user->name ?></h1>
  <p class="title">CEO & Founder, of</p>
  <p>Excellentloaded.com</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button>Contact</button></p>
</div>





	<?php 
		include('footer.php');

	 ?>
</body>
</html>
