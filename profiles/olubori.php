<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile - John Olubori David</title>
	<?php 
		include('../config.php');

		$host = DB_HOST;
		$db = DB_DATABASE;
		$db = new PDO("mysql:host={$host};dbname={$db}", DB_USER, "");
		$result = $db->query("Select * from secret_word LIMIT 1");
		$result = $result->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $db->query("Select * from interns_data where username = 'olubori'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
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
			flex-grow: 3;
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

		img{
			width: 30rem;
			height: 30rem;
			border-radius: 50%;
		 }


	</style>
</head>
<body>
<section id="app">
	<header class="bg-grey flex">
		<h3><?php echo $user->name ?> <small>(@<?php echo $user->username ?>)</small></h3>
	</header>
	<main class="flex">
	  <h4>Full stack Developer</h4>
	  <div class="flex time-box">
	  	<img src="<?php echo $user->image_filename ?>" />
	  </div>
	  <h3><?php echo $secret_word ?></h3>
		
	</main>
	<footer class="bg-grey flex">
		<p>&copy; hotels.ng <?php echo date("Y"); ?> </p>
	</footer>
</section>
</body>
</html>

