<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile - John Olubori David</title>
	<style type="text/css">
		html, body{
			height: 100%;
			margin: 0px;
		}

		#app {
		  height: 100%;
		  display: flex;
		  flex-direction: column;
		  justify-content: space-between;
		}
		header > h3, footer > p {
			margin: auto;
		}

		footer > p {
          font-size: 18px;
          font-weight: bold;
		}
		header {
			flex-grow: 2;
		}
		header > h3 {
			font-size: 32px;
			
		}
		main {
			flex-grow: 5;
			flex-direction: column;
			align-items: center;
			padding-top: 4rem;
		}
		main > h4 {
			color: #B02A2A;
			font-size: 18px;
			font-weight: bold;
		}
		.flex {
			display: flex;
		}
		.bg-grey{
		 background: #EEEEEE;
		}

		.time-box {
			justify-content: space-between;
			margin-top: 3rem;
		}
		.time-element {
			background-color: #C4C4C4;
		}

		.time-box div > p {
			font-size: 54px;
			font-weight: bolder;
			margin: 2rem;
		}


	</style>
</head>
<body>
<section id="app">
	<header class="bg-grey flex">
		<h3>WELCOME TO HNG INTERNSHIP 4.0</h3>
	</header>
	<main class="flex">
		<?php 
			$date = time();
		?>
	  <h4><?php echo date('l, F d Y', $date); ?></h4>
	  <div class="flex time-box">
	  	<div class="time-element">
	  	  <p><?php echo date('H', $date); ?></p>
	  	</div>
	  	<div>
	  	  <p>:</p>
	  	</div>
	  	<div class="time-element">
	  	  <p><?php echo date('i', $date); ?></p>
	  	</div>
	  </div>
		
	</main>
	<footer class="bg-grey flex">
		<p>&copy; hotels.ng <?php echo date("Y"); ?> </p>
	</footer>
</section>
</body>
</html>

