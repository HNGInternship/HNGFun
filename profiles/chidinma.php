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
		.container{
			height: 400px;
			width: 500px;
			background-color: #A394CD;
		}
		img  {width: 100px;
			height: 100px;
			border-radius: 40%;
			margin-top: 30px;
			margin-left:10px;
		}
		.aboutme{
			width: 500px;
			height: 150px;
			background-color: #D1CBCF;
			align-self: center;
			margin-top: 70px;
			margin-bottom: -20px;

		}
		.email{
			width: 250px;
			height: 40px;
			background-color: #F2F2F2;
			border-radius: 20px;
			padding-top: 5px;
			margin-left: 20px;
			border-bottom: 2px;
			margin-top: 20px;
		}
		.phone {
			width: 250px;
			height: 40px;
			background-color: #F2F2F2;
			border-radius: 20px;
			margin-left: 20px;
			margin-top: 2px;
			padding-top: 1px;

		}
		h4 {font-style: italic;
			color: #052638;
			text-align: left;
			margin-top: -15px;
			margin-left:20px;
			}
		h3 {
			font-style: italic;
			margin-top: 50px;
			margin-left:20px;
		}
		h2{
			margin-left:20px;
		}
		.fab-fa-twitter-square{font-size:7px;}

		.twitter{
			margin-top: 10px;
			margin-left: 15px;
		}
			
		</style>
		
		
		
	</head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<body>
		<div class = "container">
			<div>
			<img src = "http://res.cloudinary.com/chidinma/image/upload/v1525710987/IMG_20161231_171852.jpg" alt="Chidinma's_pix" width=200 height=200>
			</div>
			<p>
				<h2> ORJI CHIDINMA N. </h2>
			</p>
			<p><h4>Tech enthusiast, Intern @HNGInternship, <br/> web development student. </h4> <p>
			<div class = "aboutme">
				<div class = "email"> <p> email: <u>chypearlnel@gmail.com</u></p>
				</div>
				<div class = "phone"> <p> Phone no: 09022181787 </p>
				</div>
				<div class= "twitter"> Twitter
					<a href="https://twitter.com/Pearlynma"> <i class="fab fa-twitter-square" ></i> </a>
				</div>
			</div>
		</div>
	</body>
</html>
