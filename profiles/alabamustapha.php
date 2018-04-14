<?php

//connecting to db manually

// require_once $_SERVER['DOCUMENT_ROOT'] . '/HNGFun' . '/config.php'; //tweak

// $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

// if ($mysqli->connect_errno) {
//    $name = "Alaba Mustapha O.";
//    $image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
// }else{
	
// 	$sql = "SELECT * FROM `interns_data` WHERE username = 'alabamustapha' LIMIT 1";	
	
// 	$record = $mysqli->query($sql);
	
// 	$detail = $record->fetch_object();

// 	$name = $detail->name;

// 	$image_filename = $detail->image_filename;

// 	$sql = "SELECT * FROM `secret_word` LIMIT 1";	

// 	$record = $mysqli->query($sql);
	
// 	$secret_word = $record->fetch_object()->secret_word;
// }
// 


//using previous connction
	try{
	//get secret_word	
	$sql = 'SELECT * FROM secret_word';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
	$secret_word = $data['secret_word'];
	
	//get my details		
	$sql = 'SELECT * FROM secret_word';
    $sql = "SELECT * FROM `interns_data` WHERE username = 'alabamustapha' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
    
    $name = $data['name'];
	$image_filename = $data['image_filename'];
	}catch(PDOException $e){
		$secret_word = "sample_secret_word";
		$name = "Alaba Mustapha O.";
		$image_filename = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<style type="text/css">
			
			body{
				background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619362/bg.jpg) no-repeat;
				background-size: cover;
			}
			.profile-body{
				width: 100%;
				max-height: 500px;
				/*background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619362/bg.jpg) no-repeat;*/
				background-size: cover;
				font-family: Roboto Condensed;
			}

			div.time-circle{
				display: block;
				width: 219px;
				height: 219px;
				border-radius: 50%;
				margin: 0 auto;
				/*background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg) no-repeat;*/

			}

			div.time{
				/*position: relative;*/
				font-style: normal;
				font-weight: bold;
				line-height: normal;
				font-size: 48px;
				color: #FFFFFF;
				padding-top: 75px;
				text-align: center;
			}

			h1.intro{
				text-align: center;
				font-style: normal;
				font-weight: bold;
				line-height: normal;
				font-size: 48px;
				color: #000000;
			}

			.main{
				 display: table;
				 padding-top: 30px;
				 box-sizing: border-box;
				 /*position: absolute;*/
				 height: 100%;
				 width: 100%;
			}

			.profile-container{
				display: table-cell;
  				vertical-align: middle;
			}
			.text-center{
				text-align: center;
			}
	</style>
</head>
<body>
	<div class="profile-body">
		<section class="main">
			<div class="profile-container">
				
				<div class="time-circle" style="background-image: url(<?=$image_filename?>)">
					<div class="time">
						
					</div>
				</div>

				<h1 class="intro"><?=$name?> </h1>
				<h3 class="text-center">Being Kind is better than being right</h3>
			</div>	
		</section>
	</div>
</body>
</html>