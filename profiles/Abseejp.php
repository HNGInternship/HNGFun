<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
<?php 
  require 'db.php';

  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
<<<<<<< HEAD
<<<<<<< HEAD
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Abseejp'");
   $profile_name = $result2->fetch(PDO::FETCH_OBJ);
?>

>>>>>>> 6522003747b32681c634e90d86323f4c5a064869
<!DOCTYPE html>
<html>
<head>
	<title>Abseejp</title>
	<style type="text/css">
		.cover{
			
			background-size: cover;
			background-repeat: no-repeat;
			display: table;
			width: 100%;
			padding: 100px;
		}
		.cover-text{
			text-align: center;
			color: white;
			display: table-cell;
			vertical-align: middle;
			color: black;
		}
		img{
			height: 300px; 
			width: 300px;
			border-radius: 100px;
			margin-top: 100px;

		}
		#team{
			background-color:gray;
			background-size:cover;
			background-position: top;
			background-repeat: no-repeat; 
			color: white;
			text-align: center;
			color: black;
			margin-top: 40px;
		}
		#name{
			margin-top: 20px;
			font-size: 60px;
		}
		

	</style>
</head>


<?php 

include('header.php')

 ?>

<body>
	<div class="cover">
		<div class="cover-text">
			<h1>You probably haven't heard of Abseejaypee</h1>
			<p>it is really so amazing how little by little we are being groomed to become world class standard programmers with very outstanding and proficient skills</p>
			<a href="#why-us" role="button" class="btn btn-primary btn-lg">Meet Me</a>
		</div>
	</div>	
	</section>
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg" id="why-us" >
					<h4 id="name">Abseejaypee</h4>
					<?php echo $profile_name->name ?>
					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	
			</div>
		</div>
		
		
	</section>
	<?php 
		include('footer.php');

	 ?>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

=======
<?php 
  require 'db.php';

  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Abseejp'");
   $profile_name = $result2->fetch(PDO::FETCH_OBJ);
=======
   // $secret_word = $result->secret_word;
=======

   $secret_word = $result->secret_word;
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1

   $result2 = $conn->query("Select * from interns_data where username = 'Abseejp'");
   $profile_name = $result2->fetch(PDO::FETCH_OBJ);
?>


<<<<<<< HEAD
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
?>
=======
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1


<!DOCTYPE html>
<html>
<head>
	<title>Abseejp</title>
	<style type="text/css">
		.cover{
			
			background-size: cover;
			background-repeat: no-repeat;
			display: table;
			width: 100%;
			padding: 100px;
		}
		.cover-text{
			text-align: center;
			color: white;
			display: table-cell;
			vertical-align: middle;
			color: black;
		}
		img{
			height: 300px; 
			width: 300px;
			border-radius: 100px;
			margin-top: 100px;

		}
		#team{
			background-color:gray;
			background-size:cover;
			background-position: top;
			background-repeat: no-repeat; 
			color: white;
			text-align: center;
			color: black;
			margin-top: 40px;
		}
		#name{
			margin-top: 20px;
			font-size: 60px;
		}
<<<<<<< HEAD
<<<<<<< HEAD
		

	</style>
</head>


<?php 

include('header.php')

 ?>

<body>
	<div class="cover">
		<div class="cover-text">
			<h1>You probably haven't heard of Abseejaypee</h1>
			<p>it is really so amazing how little by little we are being groomed to become world class standard programmers with very outstanding and proficient skills</p>
			<a href="#why-us" role="button" class="btn btn-primary btn-lg">Meet Me</a>
		</div>
	</div>	
	</section>
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg" id="why-us" >
					<h4 id="name">Abseejaypee</h4>
					<?php echo $profile_name->name ?>
					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	
			</div>
		</div>
		
		
	</section>
	<?php 
		include('footer.php');

	 ?>
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

>>>>>>> 55137f1991d960ef70e414ec49df5e5797cf1b20
=======
<?php 
  require 'db.php';


  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   $secret_word = $result->secret_word;

   $result2 = $conn->query("Select * from interns_data where username = 'Abseejp'");
   $profile_name = $result2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Abseejp</title>
	<style type="text/css">
		.cover{
			
			background-size: cover;
			background-repeat: no-repeat;
			display: table;
			width: 100%;
			padding: 100px;
		}
		.cover-text{
			text-align: center;
			color: white;
			display: table-cell;
			vertical-align: middle;
			color: black;
		}
		img{
			height: 300px; 
			width: 300px;
			border-radius: 100px;
			margin-top: 100px;

		}
		#team{
			background-color:gray;
			background-size:cover;
			background-position: top;
			background-repeat: no-repeat; 
			color: white;
			text-align: center;
			color: black;
			margin-top: 40px;
		}
		#name{
			margin-top: 20px;
			font-size: 60px;
		}
		
=======

		#container {
		  padding: 12px;
		  width: 400px;
		  height: 400px;
		  margin: 10px auto;
		  box-shadow: 4px 4px 2px #a8b2c1;
		  position: relative;
		  overflow: scroll;
		  color: black;
		  background-color: white;
		  color: black
		}

		#controls {

		  width: 400px;
		  margin: 0px auto;
		  background-color: white;
		  /*box-shadow: 4px 4px 2px #a8b2c1;*/
		  border-radius: 1px;
		  height: 120px;
		  margin-bottom: 20px;
		}

		textarea {
		  resize: none;
		  width: 400px;
		  float: left;
		  height: 50px;
		  font-family: arial-bold;
		  padding: 7px;
		  /*box-shadow: 4px 2px  10px black;*/
		  border: 0px;
		  font-size: 30px;
		  border-radius: 1px;
		  background-color: white;
		  color: black;
		}

		#send {
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  font-size: 13px;
		  margin: 5px 12px;
		  /*position: absolute;*/
		  float: right;
		  /*box-shadow: 4px 4px 2px #a8b2c1;*/
		  border-radius: 10px;

		}
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a

=======
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
	</style>
</head>



<<<<<<< HEAD
 ?>

<<<<<<< HEAD
=======
<!-- the php code that works with the Chatbot -->
	<?php 
	
	 ?>
			    	

	
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
=======
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
<body>
	<div class="cover">
		<div class="cover-text">
			<h1>You probably haven't heard of Abseejaypee</h1>
			<p>it is really so amazing how little by little we are being groomed to become world class standard programmers with very outstanding and proficient skills</p>
<<<<<<< HEAD
<<<<<<< HEAD
			<a href="#why-us" role="button" class="btn btn-primary btn-lg">Meet Me</a>
		</div>
	</div>	
	</section>
=======
			<a href="#why-us" role="button" class="btn btn-primary btn-lg btn-hover">Meet Me</a>
		</div>
	</div>	
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
=======
			<a href="#why-us" role="button" class="btn btn-primary btn-lg">Meet Me</a>
		</div>
	</div>	
	</section>
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg" id="why-us" >
					<h4 id="name">Abseejaypee</h4>
<<<<<<< HEAD
<<<<<<< HEAD

					<?php echo $profile_name->name ?>

					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	
			</div>
		</div>
		
		
	</section>
=======
					<?php 
					echo $profile_name->name 
					?>
=======
					<?php echo $profile_name->name ?>
>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	
			</div>
		</div>
		
		
	</section>
	
<<<<<<< HEAD
>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
	<?php 
		include('footer.php');

	 ?>
<<<<<<< HEAD
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
>>>>>>> d323ea78ccb8f9c818a3b91de293a35ad8fe53df
=======
<script type="text/javascript" src="vendor/jquery.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>


<script type="text/javascript">

</script>
</body>
</html>

>>>>>>> 2334e12a33e36677abbf252111b22a82d33bbf6a
=======
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>



>>>>>>> c4cd176945e1e8f6df3bf5ca3e7506726d4861d1
