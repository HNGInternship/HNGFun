<?php


$query = 'SELECT * FROM interns_data WHERE username = "geekmaros" ';

$result = mysqli_query($conn, $query);

$profile = mysqli_fetch_array($result);

#########

$query2 = 'SELECT * from secret_word';

$result2 = mysqli_query($conn, $query2);

$res = mysqli_fetch_array($result2);

$secret_word = $res["secret_word"];


  ?>
<!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<style type="text/css">
			
			body{
				background: url(http://res.cloudinary.com/geekmaros/image/upload/v1523630188/sunset.jpg) no-repeat;
				background-size: cover;
			}
			.profile-body{
				width: 100%;
				max-height: 500px;
				font-family: Roboto Condensed;
			}

			
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
			img{

			}

			h1.intro{
				text-align: center;
				font-style: normal;
				font-weight: bold;
				line-height: normal;
				font-size: 48px;
				color: #30140d;
				padding-top: 120px;
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
			img{
				border: 1px solid #ddd;
   			 	 border-radius: 50px;
   				 padding-left: 5px;
   				 width: 150px;
   				 margin-left: 40px;
   				 margin-top: 90px;

   				
			}

	</style>
</head>
<body>
	<div class="profile-body">
		
		<section class="main">
			<div class="container">
				<h1 class="intro"><?php echo $profile["name"]; ?> <br> @<?php echo $profile["username"]; ?></h1>
				<h3 class="text-center" style="color: #30140d; padding-bottom: 200px;">A Developing Developer</h3>
			</div>

		</section>
		<img src="<?php echo $profile["image_filename"];  ?>">
	</div>

</body>



</html>
