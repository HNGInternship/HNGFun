<!DOCTYPE html>
<html>
<head>
	<?php
	   require_once './db.php';
	   $result = $conn->query("Select * from secret_word LIMIT 1");
	   $result = $result->fetch(PDO::FETCH_OBJ);
	   $secret_word = $result->secret_word;

	   $result2 = $conn->query("Select * from interns_data_ where username = 'adeyefa'");
	   $user = $result2->fetch(PDO::FETCH_OBJ);
	?>
	<title>  <?php echo $user->name ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
		body{
			background-color: #D4F4F4;
		}
		h1{
			text-align: center;
			color: red;
		}
		p{
			text-align: center;
			font-size: 80px;
			color: red;
		}
		#p1{
			text-align: center;
			font-size: 40px;
		}
		#fav{
			size: 5px;
		}
		#info{
			text-align: center;
			font-size: 30px;
		}
		#bar{
			background-color: white;
		}
		.sidebar{
			background-color: #FD4F5F;
			width: 465px;
			height: 590px;
		}
		.bbb{
			background-color: #3DFFDF;
			width: 790px;
			height: 590px;
			float: right;
		}
		.iii{
			background-color: white;
		}
		.right{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: relative;
			margin-left: 100px;
		}
		.row{
			border-bottom: 3px solid #E1E1E1;
			margin-bottom: 10px;
			padding: 7px;
		}
		.form{
			background-color: rgb(52,185,96,0.9);
			color: #FFF;
			padding: 7px;
			position: absolute;
		}
		input{
			width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		}
		input[type=text] {
		    width: 100%;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 22px;
		    background-position: 10px 10px; 
		    background-repeat: no-repeat;
		    padding: 12px 20px 12px 40px;
		}

		input[type=submit]{
		    border: none;
		    padding: 16px 32px;
		    margin: 4px 2px;
		    cursor: pointer;
		}
		.head{
			background-color: #0EEFF1;
			text-align: center;
		}
		h2{
			font-weight: bolder;
			font-size: 40px;
		}
		.col{
			background-color: white;
		}
	</style>
</head>
<body>
	<h1>
		WELCOME TO MY PROFILE PAGE
	</h1>
	<div class="iii">
		<div class="bbb">

	    	<div class="main">
				<p>
					HELLO WORLD
				</p>
				<p id="p1">
					I am  <?php echo $user->name ?>
				</p>
				<p id="info">
					A Web developer, blogger and Software engineer
				</p>
				<p id="fav">
					<a href="https://github.com/sainttobs"><i class="fa fa-github"></i></i></a>
					<a href="https://twitter.com/9jatechguru"><i class="fa fa-twitter"></i></i></a>
					<a href="https://web.facebook.com/toba.adeyefa"><i class="fa fa-facebook"></i></i></a>	
				</p>
			</div>
	    </div>	
		<div class="sidebar">
			<div class="head">
				<h2> Chat With MATRIX</h3>
			</div>
			<div class="row-holder">
				<div class="row2">
					<div class="form">
						<form action="Adeyefa.php" method="post">
							<input type="text" name="question" placeholder="type your question here"><input type="submit" name="submit">
						</form>
					</div>
				</div>
				<?php
					if (isset($_POST['submit'])) {
						$split = explode(" ", $_POST['question']);
						if ($split[0] == "train:") {
							unset($split[0]);
							$join = implode(" ", $split);
							$four  = explode("#", $join);
							$question = $four[0];
							$answer = $four[1];
							try {
								$sql = "INSERT INTO mybot(question,answer) VALUES ('$question','$answer')";
								$conn->exec($sql);
							} catch (PDOException $e) {
								echo $sql . "<br>" . $e->getMessage();
							}
						}

					}
				?>
			</div>	
	    </div>
	</div>	
</body>
</html> 