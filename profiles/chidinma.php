<?php


require_once '../config.php';


try {
   $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
} catch (PDOException $pe) {
   die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
}


try{
  $sql = 'SELECT * FROM secret_word';
  $q = $conn->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $data = $q->fetch();
  $secret_word= $data['secret_word'];
} catch (PDOException $e){
      throw $e;
  }


$result2 = $conn->query("Select * from interns_data where username = 'chidinma'");
$user = $result2->fetch(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>

<html>
	<head>
		<Title> Chidinma </Title>
		<style> 
		
		
		
		img  {width: 100px;
			height: 100px;
			border-radius: 40%;
			margin-top: 80px;
			margin-left:10px;
		}
		
		h4 {font-style: italic;
			color: #052638;
			text-align: left;
			margin-top: -15px;
			margin-left:20px;
			}
		h5 {
			margin-top: 1px;
			margin-left:20px;
			padding-top: 2px;
		}
		h2{
			margin-left:20px;
			text-align: left;
		}
		.fab-fa-twitter-square{font-size:7px;}

			
		</style>
		
		
		
	</head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<body>
		<div class = "container">
			<div>
			<img src = "http://res.cloudinary.com/chidinma/image/upload/v1525710987/IMG_20161231_171852.jpg" alt="Chidinma's_pix" width=200 height=200>

			<p>
				<h2> ORJI CHIDINMA N. </h2>
			</p>
			<p><h4>Tech enthusiast, Intern @HNGInternship, <br/> web development student. </h4> <p>
			</div>
			
				 <p> <h5> email: <u>chypearlnel@gmail.com</u></h5></p>
				 <p><h5> Phone no: 09022181787 </h5></p>
				
				<p> <h5>Twitter
					<a href="https://twitter.com/Pearlynma"> <i class="fab fa-twitter-square" ></i> </a></h5>
				</p>
		</div>
	</body>
</html>
