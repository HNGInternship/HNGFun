<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>JEGEDE DAVID- Hng Intern</title>
		<script type="text/javascript">
				var i = 0;
        var text = "Jegede David, am a Web Developer";
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
				background-color: #FF0000;
				background: linear-gradient(to bottom right, #87ceeb, #ffffff);
			}
			footer {
				padding-top: 300px;
				text-align: center;
				font-size: 30px;
			}
			#typingEffect {
				padding-top: 70px;
				font-size: 70px;
			}
			#socialMedia {
				padding-top: 40px;
				font-size: 30px;
				text-align: center;
			}
			#socialicons {
				padding-top: 20px;
			}

		</style>
	</head>
	<body class="container" onload="textType()">

		<main >
			<section id="typingEffect"></section>
			<section></section>
			<section id="socialMedia">
				<div>Social Media</div>
				<div id="socialicons">
					<a href="https://facebook.com/david_jegede91@yahoo.com"><i class="fa fa-facebook"></i></a>
					<img src="http://res.cloudinary.com/hng4-0/image/upload/v1523637470/dav.jpg">
					
				</div>
			</section>
		</main>
		
		<footer> Jegede David @ 2018</footer>
	</body>
</html>
