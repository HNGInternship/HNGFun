
<html lang="en">
	<?php
	   $result = $conn->query("Select * from secret_word LIMIT 1");
	   $result = $result->fetch(PDO::FETCH_OBJ);
	   $secret_word = $result->secret_word;

	   $result2 = $conn->query("Select * from interns_data where username = 'foluwa'");
	   $user = $result2->fetch(PDO::FETCH_OBJ);
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<title><?php echo $user->name ?>-Hng Intern</title>
		<script type="text/javascript">
				var i = 0;
		        var text = "Hi am" + <?php echo $user->name ?> + ", am a Web Developer";
		        var speed = 50;
		        var j = text.length;
		        function textType() {
		          if (i < text.length) {
		            document.getElementById("typingEffect").innerHTML += text.charAt(i);
		            i++;
		            setTimeout(textType, speed);
		          }
		        }
		</script>
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
				font-size: 50px;
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
			}
			#myimage {
				border-radius: 50%;
				display: block; 
				margin-left: auto;
				 margin-right: auto; 
				 width: 50%; 
			}
			#headerTime {
				text-align: right;
				color: #f4e8af;
			}

		</style>
	</head>
	<body class="container-fluid" onload="textType()" width="1oo%;" height="100%;">
		<header class="row" style="color:blue;">
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4" id="headerTime"><?php echo date("l jS \of F Y h:i:s A"); ?></div>
		</header>
		<main>
			<section id="imageSection">
				<img id="myimage" src="foludp.jpg" alt="foluwa's picture" style="width:250px;height:300px;">
				<section id="typingEffect"></section>
			</section>
			<section id="socialMedia">
				<div id="socialicons">
					<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
					<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
					<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
					<a href="https://github.com/foluwa"><i class="fa fa-github"></i></a>
					<a href="https://slack.com/foluwa"><i class="fa fa-slack"></i></a>
				</div>
			</section>
			<footer>Foluwa @ <a href="https://hotels.ng">Hotels.ng</a></footer>
		</main>
		<?php
		   try {
		       $sql = 'SELECT * FROM secret_word';
		       $q = $conn->query($sql);
		       $q->setFetchMode(PDO::FETCH_ASSOC);
		       $data = $q->fetch();
		   } catch (PDOException $e) {
		       throw $e;
		   }
		   $secret_word = $data['secret_word'];
       ?>
	</body>
</html>