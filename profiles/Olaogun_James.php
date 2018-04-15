<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
			.james-cont {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.james-title {
  color: grey;
  font-size: 18px;
}

.james-number {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3bea45;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.james-sociala {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.james-number:hover, a:hover {
  opacity: 0.7;
}
	</style>
</head>
<body>

<?php
$profile_name = $_GET['id'];
require 'db.php';




$secret_q = "SELECT * FROM secret_word  LIMIT 1";
$result = $conn->query($secret_q);
$result = $result->fetch(PDO::FETCH_OBJ);
$secret_word = $result->secret_word;

$details = "SELECT * FROM interns_data  WHERE username = 'Olaogun_James' ";
$result2 = $conn->query($details);
$my_details = $result2->fetch(PDO::FETCH_OBJ);

 

?>
<div class="james-cont">
  <img src="<?php echo $my_details->image_filename  ?>" alt="James" style="width:100%">
  <h1><?php echo $my_details->name  ?></h1>
  <p class="james-title">Student and Tech Enthusiast</p>
  <p>Tai Solarin University of Education</p>
  <div style="margin: 24px 0;">
    <a href="https://twitter.com/James_Olaogun" class="james-social"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.linkedin.com/in/olaogun-james-654024144/" class="james-social"><i class="fa fa-linkedin"></i></a>  
    <a href="https://web.facebook.com/olaogun.jamez" class="james-social"><i class="fa fa-facebook"></i></a> 
 </div>
 <p><button class="james-number">08178313562</button></p>
</div>


</body>
</html>
