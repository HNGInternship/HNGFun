<?php

require 'db.php';

    $result = $conn->query("SELECT * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("SELECT * from interns_data where username = 'geekmaros'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

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
				color: #61f207;
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
				<img src="<?php echo $user->image_filename;  ?>">
				<h1 class="intro"><?php echo $user->name; ?> <br> @<?php echo $user->username; ?></h1>
				<h3 class="text-center" style="color: #61f207; padding-bottom: 200px;">A Developing Developer</h3>
			</div>

		</section>
		
	</div>

</body>



</html>
