

<?php 
//DATE
 $d = date("h:i:sa"); 
 if(!defined('DB_USER')){
			require "../../config.php";		
			try {
			    $conn = new PDO("mysql:host=". DB_HOST. ";dbname=". DB_DATABASE , DB_USER, DB_PASSWORD);
			} catch (PDOException $pe) {
			    die("Could not connect to the database " . DB_DATABASE . ": " . $pe->getMessage());
			}
		}
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    	$stmt = $conn->prepare("SELECT * FROM secret_word");
		$stmt->execute();	
		$count	= $stmt->rowCount();
	
	//get the secret word
	 if($count >0){
				 while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       $id = $row['id'];
				       $secret_word= $row['secret_word']; 
				 }
			} 
	$username = "foluwa";
	$stmt= $conn->prepare("SELECT * FROM interns_data WHERE username=? LIMIT 1");
	$stmt->execute(array($username));	
	$count2	= $stmt->rowCount();
?>
<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	  $mem = $_POST['question'];
	  $mem = preg_replace('([\s]+)', ' ', trim($mem));
	  $mem = preg_replace("([?.])", "", $mem);
		$arr = explode(" ", $mem);
		if($arr[0] == "train:"){
			unset($arr[0]);
			$q = implode(" ",$arr);
			$queries = explode("#", $q);
			$quest = $queries[0];
			$ans = $queries[1];
			 $sql = "INSERT INTO nbot(question, response) VALUES ('" . $quest . "', '" . $ans . "')";
			 $conn->exec($sql);
	     header('Content-type: text/json');
	     $arrayName = array('result' => 'Would you like to test now');
	     echo json_encode($arrayName);
	     return;
	    }
	    else {
	      header('Content-type: text/json');
	       $arrayName = array('result' => "Couldnt get that,Kindly try again");
	       echo json_encode($arrayName);
	       return;
	   }
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<title>Foluwa-Hng Intern</title>
		<style type="text/css">
			body{
				background-color: #87ceeb;
				background: linear-gradient(to bottom right, #DDA0DD,  #87ceeb);
			}
			header{
				padding-top: 20px;
			}
			footer{
				padding-top: 25px;
				text-align: center;
				font-size: 25px;
				color: blue;
			}
			a{
				padding-left: 20px;
				padding-right: 20px;
			}
			footer > a {
				color: #0000ff;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 30px;
				font-weight: 40px;
				font-style: Arial,Verdana,Courier;
			}
			#socialMedia {
				padding-top: 30px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}
			#imageSection {
				padding-top: 50px;
				border: 2px solid black;
			}
			#myimage {
				border-radius: 50%;
				display: block; 
				margin-left: auto;
				 margin-right: auto; 
				 width: 50%; 
			}
			input[type=text] {
			    width: 100%;
			    padding: 12px 20px;
			    margin: 8px 0;
			    box-sizing: border-box;
			    border: 2px solid red;
			    border-radius: 4px;
			    background-color: skyblue;
    			color: white;
		    }
			#botSection{
				
			}
			#headerTime {
				text-align: right;
				color: #f4e8af;
			}
			#botInput{ 
				height: 7px;
				width: 14px;
			}
			#botSubmit{
				height: 7px;
				width: 14px;
			}
			#mychats {
				list-style-type: none;
				padding: 0;
				margin: 0;
				width: 10em;
			}
			.vertical-menu {
			    width: 200px;
			    height:300px;
			    overflow-y: auto;
			}
			.botSend{
				position: absolute; 
				color:red;
			}

			.humanSend {
				position: absolute; 
				color: green;
				right: 0px;
			}
			.humanSender {
				position: absolute; 
				color: green;
				right: 0px;
				margin: 1em 0;
				margin-top: auto;
			}

			.vertical-menu li {
			    /*background-color: #00ff00;*/
			    margin-top: 50px;
			    text-decoration: none;
			    width: auto;
			    list-style-type: none;
			    border-radius: 4px;
			    background-color: yellow;
			}
		</style>
	</head>
	<body class="container-fluid"  width="100%;" height="100%;">
		<header class="row" style="color:blue;">
				  <div class="col-sm-12 text-right" id="headerTime"><?php echo date("l jS \of F Y h:i:s A"); ?></div>
		</header>
		<main>
			<div class="row">
				<div class="col-sm-6">
						<section id="imageSection">
							<img id="myimage" src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg" alt="foluwa's picture" style="width:300px;height:350px;">
							<section id="typingEffect">
								<div>Akintola Moronfoluwa</div>
								<div id="socialMedia">
									<div id="socialicons">
										<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
										<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
										<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
										<a href="https://github.com/foluwa"><i class="fa fa-github"></i></a>
										<a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a>
									</div>
								</div>
							</section>
						</section>		
				</div>
				<div class="col-sm-6" style="height=1000px;border:2px solid green;postion:relative;"> 
						<section id="botSection" style="border: 2px solid black;font-size: 10px;text-align: right;">
							<div>MyBOT</div>
							<div style="border:2px solid red;align-contents:right;">
								<div class="vertical-menu" style="width:500px;display:flex;">
									 <ul id="mychats">
	  									<li class="botSend" style="margin-top:0px;left:0px;">Hi, I am  Zoe, here to help you<br> 
	  										<strong><?php echo $d ?></strong>
	  									</li>
	  									<li class="humanSend">My text here goes directly<br>
	  										<strong><?php echo $d ?></strong>
	  									</li> 
	  								 </ul>
								</div>
									<form id="botForm" method="POST" style="position:absolute;bottom:0;display:flex;padding: 10px;">
										<label for="botInput"></label>
										<input type="text" name="botInput" width="70%" height="40px" placeholder="Your text goes here..." align="right"/>
										<button type="submit" id="send" name="send" align="right">Send</button>
									</form>
						</section>	
					</div>
				</div>
			<footer>Foluwa @ <a href="https://hotels.ng">Hotels.ng</a></footer>
		</main>
		<script>
				$(document).ready(function(){
				var Form = $('#botForm');
				Form.submit(function(e){
					e.preventDefault();
					var MBox = $('input[name=botInput]');
					var question = MBox.val();
					$("#mychats").append("<br><li class='humanSender' style='color:blue;'>" + question + "<br> <?php echo $d;?></li>");
					$.ajax({
						url: "foluwa.php",
						type: "post",
						data: {question: question},
						dataType: "json",
						success: function(response){
			        $("#mychats").append("<li class='botSend'>" + response.result + "</li>");
						},
						error: function(error){
							console.log(error);
			        //alert(error);
						}
					})

	});
});

		</script>
	</body>
</html>
