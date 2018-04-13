<!DOCTYPE html>
<html>
<head>
	<title>HNGInternship 4.0</title>
	<style type="text/css">
		
			body{
				width: 100%;
				max-height: 500px;
				background: url(../images/bg.jpeg) no-repeat;
				background-size: cover;
				font-family: Roboto Condensed;
			}

			div.time-circle{
				display: block;
				width: 219px;
				height: 219px;
				border-radius: 50%;
				margin: 0 auto;
				background: #56CCF2;
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

			<h1 class="intro">Being Kind is better than being right</h1>
		</div>	
	</section>
</body>



</html>