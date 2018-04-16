
<?php 
  require 'db.php';

  $result = $conn->query("Select * from secret_word LIMIT 1");
   $result = $result->fetch(PDO::FETCH_OBJ);
   // $secret_word = $result->secret_word;

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

	</style>
</head>


<?php 

include('header.php')

 ?>

<!-- the php code that works with the Chatbot -->
	<?php 
	
	 ?>
			    	

	
<body>
	<div class="cover">
		<div class="cover-text">
			<h1>You probably haven't heard of Abseejaypee</h1>
			<p>it is really so amazing how little by little we are being groomed to become world class standard programmers with very outstanding and proficient skills</p>
			<a href="#why-us" role="button" class="btn btn-primary btn-lg btn-hover">Meet Me</a>
		</div>
	</div>	
	<section id="team">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<img src="http://res.cloudinary.com/abseejp/image/upload/v1523617182/abbb.jpg" id="why-us" >
					<h4 id="name">Abseejaypee</h4>
					<?php 
					echo $profile_name->name 
					?>
					<p>Am a Web Developer, A Data Scientist, A Programmer who loves deep thinking, A Writer and Someone who loves innovation</p>
				</div>	

			</div>
			<div id="output"></div>
			
		</div><br><br><br>	
		
	</section>
	<form class="form-control" style="background-color: #416cf8" method="POST" action="Abseejp.php">
			<h1 style="text-align: center; color: black; padding-top: 20px;">My Chatbot</h1>
			<div id="container" style="background-color: white"></div>
			<div id="controls">
		    	<textarea id="textbox" placeholder="Enter Your Message Here...."></textarea>
		    	<button id="send" type="submit" class=" btn btn-lg btn-primary btn-hover">Send</button>
		    	
		  	</div>
	</form>
 
	
	<?php 
		include('footer.php');

	 ?>
<script type="text/javascript" src="vendor/jquery.js"></script>
<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>


<script type="text/javascript">

</script>
</body>
</html>

