<?php 
	require_once('../db.php');


	$sql = "SELECT * FROM `interns_data` WHERE `username`='alabamustapha' LIMIT 1";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);

    $details = $q->fetchAll();
    
    $detail =  array_shift($details);

    $image_url = 'https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg';
	$name = "Alaba Mustapha O.";

    
	    if($detail) {
	                $image_url = $detail['image_filename'];
	                $name = $detail['name'];
	            }   
?><!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<style type="text/css">
		
			body{
				width: 100%;
				max-height: 500px;
				background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619362/bg.jpg) no-repeat;
				background-size: cover;
				font-family: Roboto Condensed;
			}

			div.time-circle{
				display: block;
				width: 219px;
				height: 219px;
				border-radius: 50%;
				margin: 0 auto;
				background: url(<?php echo $image_url; ?>) no-repeat;

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
				 position: absolute;
				 height: 100%;
				 width: 100%;
			}

			.container{
				display: table-cell;
  				vertical-align: middle;
			}
			.text-center{
				text-align: center;
			}

	</style>
</head>
<body>
	
	<section class="main">
		<div class="container">
			
			<div class="time-circle">
				<div class="time">
					<?php echo date('h:iA'); ?>
				</div>
			</div>

			<h1 class="intro"><?php echo $name; ?></h1>
			<h3 class="text-center">Being Kind is better than being right</h3>
		</div>	
	</section>
</body>



</html>