<!DOCTYPE html>
<html>
<?php
//Fetch User Details
try {
    $query = "SELECT * FROM interns_data WHERE username ='john'";
    $resultSet = $conn->query($query);
    $result = $resultSet->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    throw $e;
}
$username = $result['username'];
$fullName = $result['name'];
$picture = $result['image_filename'];
//Fetch Secret Word
try{
    $querySecret =  "SELECT * FROM secret_word LIMIT 1";
    $resultSet   =  $conn->query($querySecret);
    $result  =  $resultSet->fetch(PDO::FETCH_ASSOC);
    $secret_word =  $result['secret_word'];
}catch (PDOException $e){
    throw $e;
}
$secret_word =  $result['secret_word'];

?>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

			a {
			  text-decoration: none;
			  font-size: 22px;
			  color: black;
			}

			 a:hover {
			  opacity: 0.7;
			}
	</style>
</head>
<body>
		
	<h2 style="text-align:center; padding-top: 50px; padding-bottom: 10px">My Profile Card</h2>

	<div class="card">
	  <img src="http://res.cloudinary.com/digitalstead/image/upload/v1523614823/john.jpg" alt="John picture" style="width:100%; height: 250px">
	  <h3 style="padding-top: 10px;"><?php echo $fullName ?></h3>
	  <h6><?php echo 'Slack name:  '. $username ?></h6>
	  <p class="title">FrontEnd Developer</p>
	  <p>Bootstrap, Materialize and Angular</p>
	  <div style="margin: 24px 0; padding-bottom: 20px">
	    <a href="#"><i class="fa fa-twitter"></i></a>  
	    <a href="#"><i class="fa fa-linkedin"></i></a>  
	    <a href="#"><i class="fa fa-facebook"></i></a> 
	    <a href="#"><i class="fa fa-github"></i></a>
	 </div>
	</div>

</body>
</html>
