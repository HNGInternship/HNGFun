<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 --><link rel="stylesheet" href="https://static.oracle.com/cdn/jet/v4.2.0/default/css/alta/oj-alta-min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.fb{color: #3b5998;}
	.tw{color: #1da1f2;}
	.git{color: #333333;}
	.ln{color: #0077b5}
	/*img{
		border-radius: 10%;
		border-style: groove;
		border-color: #fefefe;
		height: 40em;
		width: 20px;
	}
	*/
	img{
		height: 15em;
		width: 15em;
		border: 2px groove #fefefe
	}
	
</style>
<body>
	<?php
		include 'db.php';
				global $conn;
		$query= $conn->query("Select * from secret_word LIMIT 1");
		$result = $query->fetch(PDO::FETCH_OBJ);
		$secret_word = $result->secret_word;

		$result2 = $conn->query("Select * from interns_data where username = 'hammedb'");
		$user = $result2->fetch(PDO::FETCH_OBJ);
	?>
	<div role="main" class="oj-web-applayout-max-width oj-web-applayout-content">

		<div id="avatar-container" class="demo-flex-display oj-flex-items-pad">
				<div id="avater-container" class="oj-flex oj-sm-align-items-center oj-sm-margin-2x oj-sm-justify-content-space-around">
					<!-- <div class="of-flex-item time-circle" style="background-image: url(http://res.cloudinary.com/hammedb/image/upload/v1523977229/PicsArt_02-08-02.22.04guuj.jpg)">
					</div> -->
					<img role="img" class="of-flex-item time-circle" src="http://res.cloudinary.com/hammedb/image/upload/v1523977229/PicsArt_02-08-02.22.04guuj.jpg" height="10px"></div>
				</div>
			</div>
				<div class="about">
				<div class="oj-panel oj-panel-alt1 oj-margin demo-mypanel">
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
							<h4 class="oj-lg-align-items-center name">Hello I'm <b><?php echo $user->name; ?></b></h4>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p>Web developer,Python Lover and a computer Engineering Student from Obafemi Awolowo University.</p>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p class="mail"><span class="fa fa-envelope">hammedb197@gmail.com </span></p>
						</div>
					</div>
					<div class="demo-flex-display oj-flex-items-pad">
						<div class="oj-flex oj-sm-align-items-center oj-sm-justify-content-space-around">
					
							<p>
								<a href="https://www.linkedin.com/in/"><span class="fa fa-linkedin-square fa-3x ln"></span></a>&nbsp;
								<a href="https://web.facebook.com/Hbushroh"><span class="fa fa-facebook-square fa-3x fb"></span></a>&nbsp;
								<a href="https://twitter.com/h_bushroh"><span class="fa fa-twitter-square fa-3x tw"></span></a>&nbsp;
								<a href="https://github.com/Hammedb197/"><span class="fa fa-github fa-3x git"></span></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
