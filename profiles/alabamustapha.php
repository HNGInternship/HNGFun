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
				font-family: Roboto Condensed;
			}

			div.time-circle{
				display: block;
				width: 219px;
				height: 219px;
				border-radius: 50%;
				margin: 0 auto;
				background: url(https://res.cloudinary.com/alabamustapha/image/upload/v1523619685/me.jpg) no-repeat;

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
	<div class="profile-body">
		<section class="main">
			<div class="container">
				
				<div class="time-circle">
					<div class="time">
						<?php echo date('h:iA'); ?>
					</div>
				</div>

				<h1 class="intro">Alaba Mustapha O.</h1>
				<h3 class="text-center">Being Kind is better than being right</h3>
			</div>	
		</section>
	</div>
</body>



</html>