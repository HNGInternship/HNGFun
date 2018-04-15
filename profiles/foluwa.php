
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
		<title>?php echo $user->name ?>-Hng Intern</title>
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
				background: linear-gradient(to bottom right, #937e79,  #87ceeb);
			}
			a{
				padding-left: 20px;
				padding-right: 20px;
			}
			footer {
				padding-top: 300px;
				text-align: center;
				font-size: 25px;
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
			#myimage {
				border-radius: 50%;
				display: block; margin-left: auto; margin-right: auto; width: 50%; 
			}
			#headerTime {
				text-align: right;
				color: #f4e8af;
			}

		</style>
	</head>
	<body class="container-fluid" onload="textType()">
		<header>
			 <div class="row">
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4"></div>
				  <div class="col-sm-4" id="headerTime"><?php echo date("l jS \of F Y h:i:s A"); ?></div>
			 </div>
		</header>
		<main>
			<section>
				<img id="myimage" src="http://res.cloudinary.com/dv7xj0ovh/image/upload/v1523625641/foludp_ryerff.jpg" alt="foluwa's picture" style="width:250px;height:300px;">
			</section>
			<section id="typingEffect"></section>
			<section id="socialMedia">
				<div>Social Media</div>
				<div id="socialicons">
					<a href="https://facebook.com/akintola.moronfoluwar"><i class="fa fa-facebook"></i></a>
					<a href="https://instagram.com/fantastic_foluwa"><i class="fa fa-instagram"></i></a>
					<a href="https://twitter.com/fantasticfoluwa"><i class="fa fa-twitter"></i></a>
				</div>
			</section>
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
		<br style="width:50%;" />
		<footer> Foluwa @ 2018</footer>
	</body>
</html>