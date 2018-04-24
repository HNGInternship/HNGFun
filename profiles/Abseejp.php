
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
	<script type="text/javascript" src="vendor/jquery/jquery.js"></script>
	<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript">

		$(document).ready(function() {
			$('#send').on("click", function(){
				var value = $('#question').val();
				$.ajax({
					url: 'answer.php',
					data: {'question': value},
					type: 'post',
					success: function(res){
						$(".chat_bot_conserv").append('<li style = "text-shadow: 1px 1px #333;">'+ res +'</li><br>') ;
					}
				});
			});
		});

</script>
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
		  width: 800px;
		  height: 400px;
		  margin: 10px auto;
		  box-shadow: 4px 4px #a8b2c1;
		  position: relative;
		  color: black;
		  overflow-y: scroll;
		  background-image:url('https://cdn.pixabay.com/photo/2018/02/18/20/29/computer-3163436_960_720.png');
		  background-size:contain;
		}

		#controls {
		  width: 400px;
		  margin: 0px auto;
		  background-color: #90CAF9;
		  border-radius:5px; 
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
		.chat_bot_conserv{
			list-style-type: none;
			display: block;
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
	
			<h1 style="text-align: center; color: black; padding-top: 20px;">My Chatbot</h1>
			<div id="container">
				<div class="chat_bot">
					<ul class="chat_bot_conserv">
						
					</ul>
				</div>
			</div>
			<div id="controls">
				<div class="form-group" style="text-align: center;">
					<input type="text" class="form-control" name="question" id="question" placeholder="Type Here.........">	
				</div>
				<button id="send" style="float:right;" class="btn btn-lg btn-primary btn-hover" name="send">Send</button>
		  	</div>
	
 
 		
 		
	
	<?php 
		include('footer.php');

	 ?>




</body>
</html>

